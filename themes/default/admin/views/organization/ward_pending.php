<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    #PRData th:nth-child(2), #PRData2 th:nth-child(2), #PRData5 th:nth-child(2), #PRData4 th:nth-child(2) { width: 5% !important; }
    #PRData th:nth-child(1), #PRData2 th:nth-child(1), #PRData5 th:nth-child(1), #PRData4 th:nth-child(1) { width: 5% !important; }
    #PRData5 th:nth-child(10) { width: 5% !important; }
    #PRData5 th:nth-child(11) { width: 15% !important; }
</style>

<script>
    function ward_type(type) {
        return type == 'Residential' ? 'আবাসিক' : 'প্রাতিষ্ঠানিক';
    }

    function yes_no(is_ideal_ward) {
        return is_ideal_ward == 1 ? 'Yes' : 'No';
    }

    function increase_decrease(is_ideal_ward) {
        return is_ideal_ward == 1 ? 'বৃদ্ধি' : 'ঘাটতি';
    }

    var oTable3;

    $(document).ready(function () {
        oTable3 = $('#PRData5').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= admin_url('organization/getListPendingWard' . ($branch_id ? '/'.$branch_id : '')) ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable3.fnSettings();
                nRow.id = aData[0];
                $(nRow).attr("status", '1');
                return nRow;
            },
            "aoColumns": [
                {"bSortable": false, "mRender": checkbox}, null, null, null, {"mRender": ward_type}, null, null, null, null, null, null, {"mRender": yes_no}, null, {"mRender": increase_decrease}, {"bSortable": false}
            ]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?='শাখা';?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?='নাম';?>]", filter_type: "text", data: []}
        ], "footer");
    });
</script>

<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('organization/organization_actions' . ($branch_id ? '/'.$branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'ওয়ার্ড পেন্ডিং তালিকা   ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?></h2>
        <div class="box-icon">
            <ul class="btn-tasks">
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("শাখা") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization/ward_pending') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/ward_pending/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                            <th><?= 'শাখা' ?></th>
                            <th><?= 'ওয়ার্ড নাম' ?></th>
                            <th><?= 'ওয়ার্ড কোড' ?></th>
                            <th><?= 'ধরন' ?></th>
                            <th>সদস্য </th>
                            <th>সাথী </th>
                            <th><?= 'কর্মী ' ?></th>
                            <th>সমর্থক </th>
                            <th>ওয়ার্ড  </th>
                            <th>উপশাখা  </th>
                            <th>আদর্শ ওয়ার্ড </th>
                            <th><?= 'নোট' ?></th>
                            <th>বৃদ্ধি/ঘাটতি</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="14" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                        </tr>
                        </tbody>
                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkft" type="checkbox" name="check"/>
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
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>
<?php } ?>
