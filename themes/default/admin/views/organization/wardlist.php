<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    #PRData th:nth-child(2),
    #PRData2 th:nth-child(2),
    #PRData5 th:nth-child(2),
    #PRData4 th:nth-child(2) {
        width: 5% !important;
    }

    #PRData th:nth-child(1),
    #PRData2 th:nth-child(1),
    #PRData5 th:nth-child(1),
    #PRData4 th:nth-child(1) {
        width: 5% !important;
    }

    #PRData5 th:nth-child(13) {
        width: 10% !important;
    }

    #PRData5 th:nth-child(15) {
        width: 7% !important;
    }
</style>

<script>
    function ward_type(type) {

        return type == 'Residential' ? 'আবাসিক' : (type == 'Institutional' ? 'প্রাতিষ্ঠানিক' : ( type == 'Departmental' ?   'বিভাগীয়' : ''  ));
    }


    function ward_subtype(type) {
        let subtype =  {
            '1':'প্রশাসনিক এলাকা',
            '2':'মেস',
            '3':'হল/হোস্টেল',
            '4':'কোয়াটার',
            '5':'শিক্ষাপ্রতিষ্ঠান',
            '6':'কোচিং/প্রাইভেট সেন্টার',
            '7':'ট্রেনিং সেন্টার'
        };

        return subtype[type] ? subtype[type] : '';
    }
 



    function yes_no(is_ideal_ward) {
        return is_ideal_ward == 1 ? 'Yes' : 'No';
    }

    var oTable3;

    $(document).ready(function() {
        oTable3 = $('#PRData5').dataTable({
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
            'sAjaxSource': '<?= admin_url('organization/getListward' . ($branch_id ? '/' . $branch_id : '')) ?>',
            
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
                var oSettings = oTable3.fnSettings();
                nRow.id = aData[0];
                $(nRow).attr("status", '1');
                return nRow;
            },
            "aoColumns": [{
                    "bSortable": false,
                    "mRender": checkbox
                },
                
                 null, 
                
                null,
              

                {
                    "mRender": ward_type
                },
                {
                    "mRender": ward_subtype
                },


                null,
                

                null, null, null, null, null, null, null, 
                
                 null,
                null, null,


                {
                    "bSortable": false
                },
                {
                    "bSortable": false
                },
                 
                {
                    "bSortable": false
                }
            ]
        }).fnSetFilteringDelay().dtFilter([{
                column_number: 1,
                filter_default_label: "[<?= 'শাখা'; ?>]",
                filter_type: "text",
                data: []
            },
            {
                column_number: 2,
                filter_default_label: "[<?= 'নাম'; ?>]",
                filter_type: "text",
                data: []
            }
        ], "footer");
    });
</script>

<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('organization/organization_actions' . ($branch_id ? '/' . $branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'ওয়ার্ড তালিকা   ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">

            <?php if($branch_id != null) {?>
                <li class="dropdown">
                    <a href="<?= admin_url('organization/addthana/'.$branch_id.'/2') ?>">
                        <i class="icon fa fa-plus" data-placement="left" title="<?= lang("actions") ?>"><?= ' ওয়ার্ড বৃদ্ধি করুন' ?></i>
                    </a>
                </li>
                <?php } ?>

                <li>	
                            <a href="<?= admin_url('organization/wardexport'.($branch_id ? '/'.$branch_id : '')) ?>" id="excel_export" data-action="export_excel">	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a> 	
                </li>

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("শাখা") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization/wardlist') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/wardlist/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table id="PRData5" class="table table-bordered table-condensed table-hover table-striped">
                        <thead>
                            <tr class="primary">
                                <th style="min-width:30px; width: 30px; text-align: center;">
                                    <input class="checkbox checkth" type="checkbox" name="check" />
                                </th>
                                <th><?= 'শাখা' ?></th>
                                <th><?= 'ওয়ার্ডের নাম' ?></th>
                               

                                <th><?= 'সংগঠনের ধরন' ?></th>
                                <th><?= 'সংগঠনের উপধরন' ?></th>
                                <th><?= 'সাংগঠনিক থানা' ?></th>
                                <th><?= 'জেলা' ?></th>
                                <th><?= 'উপজেলা' ?></th>
                                <th><?= 'ইউনিয়ন' ?></th>
                                <th><?= 'ওয়ার্ড' ?></th>
                                <th><?= 'বিভাগ' ?></th>
                                <th><?= 'উপ বিভাগ' ?></th>
                                <th><?= 'প্রতিষ্ঠান' ?></th>
                                 <th><?= 'উপশাখা' ?></th>
                                <th><?= 'কর্মী' ?></th>
                                <th><?= 'সমর্থক' ?></th>
                                <th><?= 'মন্তব্য' ?></th>
                                
                                <th></th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="19" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
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
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                
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