<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }

    #PRData th:nth-child(1) {
        width: 5%;
    }

    #PRData th:nth-child(2) {
        width: 20%;
    }

    #PRData th:nth-child(3) {
        width: 20%;
    }

    #PRData th:nth-child(4) {
        width: 20%;
    }

    #PRData th:nth-child(5) {
        width: 20%;
    }

    #PRData th:nth-child(6) {
        width: 7%;
    }



    .manpower_link {
        cursor: pointer;
    }
</style>
<script>
    function institution_type(int_type) {


        return int_type == 'branch' ? 'শাখা' : (int_type == 'thana' ? 'থানা' : (int_type == 'ward' ? 'ওয়ার্ড' : (int_type == 'unit' ? 'উপশাখা' : '')));

    }


    function org_status(data, row, meta) { 
        return row[8];
    }

    function upashakha_current(data, row, meta) {
console.log(row[10]);
return  row[10];
 
        //return parseInt(row[7]) + parseInt(increase_decrease[0]) -parseInt(increase_decrease[1]) ;

    }


    function upashakha_increase(data, row, meta) {
        const increase_decrease = row[9].split("_");

        if (increase_decrease.length == 0) {
            return '';
        }
        else
            return parseInt(increase_decrease[0]);

    }


    function upashakha_decrease(data, row, meta) {

        const increase_decrease = row[9].split("_");

        if (increase_decrease.length != 2) {
            return '';
        } else
            return parseInt(increase_decrease[1]);

    }





    var oTable;
    $(document).ready(function () {
        oTable = $('#PRData').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= admin_url('organization/getInstitutionWithOrg' . ($branch_id ? '/' . $branch_id : '')) ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({ 'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback });
            },
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
                $(nRow).attr("status", '1');

                // nRow.className = "manpower_link";
                //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                return nRow;
            },
            "aoColumns": [
                { "bSortable": false, "mRender": checkbox }, null, null, {
                    "mRender":
                        function (data, type, row, meta) {

                            return org_status(data, row, meta);
                        }
                }, null, null, null, null,
                {
                    "mRender":
                        function (data, type, row, meta) {

                            return upashakha_current(data, row, meta);
                        }
                }

                ,
                {
                    "mRender":
                        function (data, type, row, meta) {

                            return upashakha_increase(data, row, meta);
                        }
                }

                , {
                    "mRender":
                        function (data, type, row, meta) {

                            return upashakha_decrease(data, row, meta);
                        }
                },

                {

                    "bSortable": false




                }


            ]
        }).fnSetFilteringDelay().dtFilter([
            { column_number: 1, filter_default_label: "[<?= lang('code'); ?>]", filter_type: "text", data: [] },
            { column_number: 2, filter_default_label: "[<?= lang('name'); ?>]", filter_type: "text", data: [] },

            { column_number: 6, filter_default_label: "[<?= 'Branch'; ?>]", filter_type: "text", data: [] },



        ], "footer");

    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('manpower/manpower_actions' . ($branch_id ? '/' . $branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'যে সব প্রতিষ্ঠানে সংগঠন আছে ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">

                <?php if ($branch_id) { ?>
                    <li>

                        <a class="tip" title="Add Institution"
                            href="<?= admin_url('organization/addinstitution/' . $branch_id); ?>" data-toggle='modal'
                            data-target='#myModal'><i class="icon fa fa-plus"></i> প্রতিষ্ঠান যোগ করুন </a>

                    </li>
                <?php } ?>


                <li>
                    <a href="<?= admin_url('organization/institutionwithorgexport' . ($branch_id ? '/' . $branch_id : '')) ?>"
                        id="excel_export" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization/institutionwithorg') ?>"><i
                                        class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/institutionwithorg/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <th style="min-width:30px; max-width: 30px; text-align: center;">
                                    <input class="checkbox checkth" type="checkbox" name="check" />
                                </th>

                                <th><?= 'প্রতিষ্ঠানের কোড ' ?></th>
                                <th><?= 'প্রতিষ্ঠানের নাম ' ?></th>
                                <th><?= 'কোন মানের' ?></th>

                                <th><?= "ধরণ" ?></th>
                                <th><?= "উপ ধরণ" ?></th>


                                <th><?= 'শাখা কোড ' ?></th>

                                <th><?= 'উপশাখা পূর্ব' ?></th>
                                <th><?= 'উপশাখা বর্তমান' ?></th>
                                <th><?= 'উপশাখা বৃদ্ধি' ?></th>
                                <th><?= 'উপশাখা ঘাটতি' ?></th>
                                <th><?= 'উপশাখা ঘাটতি' ?></th>


                                <th style="width:65px; max-width:65px; text-align:center;"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="11" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                            </tr>
                        </tbody>

                        <tfoot class="dtFilter">
                            <tr class="active">
                                <th style="min-width:30px; max-width: 30px; text-align: center;">
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
                                <th style="width:65px; max-width:65px; text-align:center;"></th>

                            </tr>
                        </tfoot>
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