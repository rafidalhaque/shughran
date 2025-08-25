<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }


    .manpower_link {
        cursor: pointer;
    }
</style>
<?php
$v = "";
/* if($this->input->post('name')){
  $v .= "&name=".$this->input->post('name');
} */
if ($this->input->get('type')) {
    $v = "?type=" . $this->input->get('type');
}

?>
<script>
    var oTable;
    $(document).ready(function () {

        <?php if ($v != "") { ?>
            oTable = $('#PRData').dataTable({
                "aaSorting": [[2, "asc"], [3, "asc"]],
                "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                "iDisplayLength": <?= $Settings->rows_per_page ?>,
                'bProcessing': true, 'bServerSide': true,
                'sAjaxSource': '<?= admin_url('others/getAdministrativeAreaWithoutOrg' . ($branch_id ? '/' . $branch_id : '') . $v) ?>',

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
                    { "bSortable": false, "mRender": checkbox }, null, null, <?php if ($branch_id) {
                        echo '{"bVisible": false},';
                    } else {
                        echo '{"bSortable": true},';
                    } ?> null, { "bSortable": false }
                ]
            }).fnSetFilteringDelay().dtFilter([
                { column_number: 1, filter_default_label: "[<?= lang('name'); ?>]", filter_type: "text", data: [] },
                { column_number: 2, filter_default_label: "[<?= 'Type'; ?>]", filter_type: "text", data: [] },
                { column_number: 3, filter_default_label: "[<?= 'Branch'; ?>]", filter_type: "text", data: [] },
                { column_number: 4, filter_default_label: "[<?= 'Note'; ?>]", filter_type: "text", data: [] },



            ], "footer");

        <?php } ?>

    });
</script>




<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'যেখানে  প্রশাসনিক এলাকাতে  সংগঠন নেই' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">

                <?php if ($branch_id) { ?>
                    <li>

                        <a class="tip" title="Add Administration Area"
                            href="<?= admin_url('others/addadministration/' . $branch_id); ?>" data-toggle='modal'
                            data-target='#myModal'><i class="icon fa fa-plus"></i>প্রশাসনিক এলাকা যোগ করুন </a>

                    </li>
                <?php } ?>


                <li>
                <a class="hidden" href="#" id="excel" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>

                    <a href="#" onclick="doit('xlsx','administrativedetail');  return false;"><i
                            class="icon fa fa-file-excel-o"></i>
                        <?= lang('export_to_excel') ?> </a>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/administrationbutorg') ?>"><i class="fa fa-building-o"></i>
                                    <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch_row) {
                                echo '<li><a href="' . admin_url('others/administrationbutorg/' . $branch_row->id) . '"><i class="fa fa-building"></i>' . $branch_row->name . '</a></li>';
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
                <p class="introtext"><?= lang('list_results'); ?></p>






                <div id="form">

                    <?php echo admin_form_open("others/administrationbutorg" . ($branch_id ? '/' . $branch_id : ''), ['method' => 'get']); ?>
                    <div class="row">


                        <div class="col-sm-1"> <?= lang("Type", "Type"); ?></div>
                        <div class="col-sm-4">
                            <div class="form-group">

                                <select name="type" class="form-control type">
                                    <option>Select</option>
                                    <option <?= $this->input->get('type') == 2 ? 'selected' : '' ?> value="2">Upazilla
                                    </option>
                                    <option <?= $this->input->get('type') == 3 ? 'selected' : '' ?> value="3">Thana
                                    </option>
                                    <option <?= $this->input->get('type') == 4 ? 'selected' : '' ?> value="4">Union
                                    </option>
                                    <option <?= $this->input->get('type') == 5 ? 'selected' : '' ?> value="5">Pouroshova
                                    </option>
                                    <option <?= $this->input->get('type') == 6 ? 'selected' : '' ?> value="6">Ward(Union)
                                    </option>
                                    <option <?= $this->input->get('type') == 7 ? 'selected' : '' ?> value="7">
                                        Ward(Pouroshova)</option>


                                </select>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="controls">
                                    <?php echo form_submit('submit_report', $this->lang->line("submit"), 'class="btn btn-primary"'); ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php echo form_close(); ?>

                </div>
                <hr />


















               

                <div class="table-responsive">
                    <table class="table table-bordered" id="administrativedetail"
                        data-branch="<?= $branch_id ? $branch->name . '_City Thana Organization' : 'সকল শাখা_' . 'City Thana Organization' ?>">
                        <thead>
                            <tr>
                                <th colspan="7">ইউনিয়ন ওয়ার্ড তালিকা</th>
                            </tr>
                            <tr>
                                <th >ক্রমিক</th>
                                <th >Branch</th>
                                <th >জেলা</th>
                                <th >উপজেলা </th>
                                <th >ইউনিয়ন </th>
                                <th >ওয়ার্ড নম্বর</th> 
                                <th>সংগঠন</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php foreach ($district_info as $key => $row) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <?=$row['code']?>
                                        
                                </td>
                                    <td><?= $row['district_name'] ?></td>
                                   
                                    <td><?= $row['thana_upazila_name'] ?></td>
                                    <td>
                                        <?= isset($row['pourashava_union_name']) ? $row['pourashava_union_name'] :''; ?>
                                 </td>
                                    <td><?= $row['ward_name'] ?></td>
 
                                    <td>নেই</td>

                                   
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

                
            </div>
        </div>
    </div>
</div>




<script>

    $(document).ready(function () {
        oTable = $('#administrativedetail').dataTable({
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ]
        });
    });
</script>