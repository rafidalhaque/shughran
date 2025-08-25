<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

 





<div class="row" style="margin-bottom: 15px;">
    <div class="col-md-12">


        <?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
        <style type="text/css" media="screen">
            #PRData td:nth-child(1), #PRData td:nth-child(2), #PRData td:nth-child(3) {
                text-align: center;
                width: 5%;
            }

            #PRData td:nth-child(10) {
                text-align: center;
                width: 20%;
            }

            .manpower_link {
                cursor: pointer;
            }
        </style>
        <script>
            var oTable;
            $(document).ready(function() {


                function yes_no(caretaker) {
                    if (caretaker == 1)
                        return 'হ্যাঁ';
                    else
                        return 'না';

                }


                oTable = $('#PRData').dataTable({
                    "aaSorting": [
                        [2, "asc"],
                        [3, "asc"]
                    ],
                    "aLengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "<?= lang('all') ?>"]
                    ],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true,
                    'bServerSide': true,
                    'sAjaxSource': '<?= admin_url('Manpowertransfer/getMembercandidatePendingList' . ($branch_id ? '/' . $branch_id : '')) ?>',
                    'fnServerData': function(sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    'fnRowCallback': function(nRow, aData, iDisplayIndex) {
                        var oSettings = oTable.fnSettings();
                        nRow.id = aData[0];
                        $(nRow).attr("status", '1');
                        //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                        return nRow;
                    },
                    "aoColumns": [{
                        "bSortable": false,
                        "mRender": checkbox
                    }, null, null, null,null, null, null, null, null, null, {
                        "mRender": yes_no
                    }, {
                        "bSortable": false
                    }]
                }).fnSetFilteringDelay().dtFilter([{
                        column_number: 1,
                        filter_default_label: "[<?= 'ছুটির ধরণ'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 2,
                        filter_default_label: "[<?= 'শাখা'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 3,
                        filter_default_label: "[<?= 'সাথী কোড'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 4,
                        filter_default_label: "[<?= 'নাম'; ?>]",
                        filter_type: "text",
                        data: []
                    }
                ], "footer");








            });
        </script>



        <?php if ($Owner || $GP['bulk_actions']) {
            echo admin_form_open('manpowertransfer/manpowertransfer_actions' . ($branch_id ? '/' . $branch_id : ''), 'id="action-form"');
        } ?>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'সদস্যপ্রার্থী ঘাটতি পেন্ডিং তালিকা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">

                        <?php if (!empty($branches)) { ?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= 'সকল শাখা' ?>"></i></a>
                                <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                                    <li><a href="<?= admin_url('membercandidatepending') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                                    <li class="divider"></li>
                                    <?php
                                    foreach ($branches as $branch) {
                                        echo '<li><a href="' . admin_url('membercandidatepending/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext hidden"><?= lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="PRData" class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr class="primary">
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check" />
                                        </th>
                                        <th><?= 'ছুটির ধরণ'  ?></th>
                                        <th><?= 'শাখা'  ?></th>
                                        <th><?= 'সাথী কোড' ?></th>
                                        <th><?= 'নাম' ?></th>

                                        <th>বর্তমান পড়া লেখা <br />(শ্রেণি/বর্ষ)</th>
                                        <th>কামিল/মাস্টার্স <br />শেষ হয়ে <br />থাকলে কত <br />সালে শেষ<br /> হয়েছে</th>

                                        <th>দায়িত্ব</th>
                                        <th>ময়দানে অবস্থান <br />না করলে বর্তমান <br /> অবস্থান/পেশা</th>
                                        <th>ছুটির প্রস্তাবের <br /> যৌক্তিকতা</th>
                                        <th>অঞ্চল <br />তত্ত্বাবধায়কের <br />সাথে <br />যোগাযোগ <br />হয়েছে কিনা?</th>
                                        <th style="min-width:65px; text-align:center;"><?= 'Action' ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                                    </tr>
                                </tbody>

                                <tfoot class="dtFilter">
                                    <tr class="active">
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkft" type="checkbox" name="check" />
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th style="width:65px; text-align:center;"><?= lang("actions") ?></th>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($Owner || $GP['bulk_actions']) { ?>
            <div style="display: none;">
                <input type="hidden" name="form_action" value="" id="form_action" />
                <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
            </div>
            <?= form_close() ?>
        <?php } ?>





























    </div>




</div>