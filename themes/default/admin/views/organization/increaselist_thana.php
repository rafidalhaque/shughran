<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }


    .manpower_link {
        cursor: pointer;
    }
</style>
<script>
    var oTable;
    $(document).ready(function() {


        function thana_type(type) {

            return type == 'Residential' ? 'আবাসিক' : 'প্রাতিষ্ঠানিক';
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

            'sAjaxSource': '<?= admin_url('organization/getListThanaIncrease'  . ($branch_id ? '/' . $branch_id : '') . ($this->input->get('type') ? '?type=' . $this->input->get('type') : '') . ($this->input->get('year') ? '&year=' . $this->input->get('year') : '')) ?>',


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

                nRow.className = "manpower_linkOLD";
                //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                return nRow;
            },
            "aoColumns": [
                null, null, null, {
                    "mRender": thana_type
                },
                null, null, null, null, null, null, null
            ]
        }).fnSetFilteringDelay().dtFilter([{
                column_number: 0,
                filter_default_label: "[<?= lang('name'); ?>]",
                filter_type: "text",
                data: []
            },
            {
                column_number: 1,
                filter_default_label: "[<?= lang('code'); ?>]",
                filter_type: "text",
                data: []
            },
            {
                column_number: 2,
                filter_default_label: "[<?= 'branch'; ?>]",
                filter_type: "text",
                data: []
            },




        ], "footer");

    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('organization/organization_actions' . ($branch_id ? '/' . $branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'থানা বৃদ্ধি তালিকা: ' .   ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            <?php


            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . ('type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : ''), 'জুন-নভেম্বর\'' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . 'type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {
                    echo anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . 'type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . 'type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/organization/increaselist_thana' . ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . 'type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
                }
            }



            ?>
            &nbsp;&nbsp;



            <span class="dropdown">

                <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Archive
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="archive">


                    <?php

                    echo   ' <li>' . anchor('admin/organization/increaselist_thana'  . ($branch_id ? '?branch_id=' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/organization/increaselist_thana'  . ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . 'type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/organization/increaselist_thana' .  ($branch_id ? '?branch_id=' . $branch_id : '') . ($branch_id ? '&' : '?') . 'type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
                    }
                    ?>

                </ul>
            </span>





        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">





                <li>
                    <a href="<?= admin_url('organization/thanaincreaseexport/' . ($branch_id ? '/' . $branch_id : '') . ($this->input->get('type') ?  '?type=' . $this->input->get('type') : '') . ($this->input->get('year') ?  '&year=' . $this->input->get('year') : '')) ?>" id="excel_export" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>
                </li>
 
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization/increaselist_thana') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/increaselist_thana' . '?branch_id=' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <th><?= lang("নাম") ?></th>
                                <th><?= 'কোড' ?></th>


                                <th><?= "শাখা" ?></th>
                                <th><?= 'ধরন' ?></th>
                                <th><?= 'তারিখ' ?></th>
                                <th><?= 'সদস্য' ?></th>
                                <th><?= 'সাথী ' ?></th>
                                <th><?= 'কর্মী ' ?></th>
                                <th>সমর্থক </th>
                                <th>ওয়ার্ড </th>
                                <th>উপশাখা </th>



                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                            </tr>
                        </tbody>

                        <tfoot class="dtFilter">
                            <tr class="active">
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