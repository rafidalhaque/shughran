<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(9) {
        text-align: center;
    }
	
	 
     .manpower_link {
    cursor: pointer;
}
</style>
<script>
    var oTable;
    $(document).ready(function () {
        oTable = $('#PRData').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= admin_url('associate/getPostpone'.($branch_id ? '/'.$branch_id : '')) ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                var oSettings = oTable.fnSettings();
                nRow.id = aData[0];
				$(nRow).attr("status",'1');
				 
                nRow.className = "manpower_link";
                //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                return nRow;
            },
            "aoColumns": [
                {"bSortable": false, "mRender": checkbox},   null, null, <?php if($branch_id ) { echo '{"bVisible": false},'; } else { echo '{"bSortable": true},'; } ?> null,null,null,null,   {"bSortable": false}
            ]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('code');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('name');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?='branch';?>]", filter_type: "text", data: []},
            {column_number: 4, filter_default_label: "[<?='Oath';?>]", filter_type: "text", data: []},
            {column_number: 5, filter_default_label: "[<?='Session';?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?='Responsibility';?>]", filter_type: "text", data: []},
            {column_number: 7, filter_default_label: "[<?='থানা কোড';?>]", filter_type: "text", data: []},
            
             
            
            
        ], "footer");

    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('manpower/manpower_actions'.($branch_id ? '/'.$branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সাথী  মুলতবি   ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">

                <!-- <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                         
                        <li>
                             <a href="<?= admin_url('associate/exportpostpone'.($branch_id ? '/'.$branch_id : '')) ?>" id="excel_export" data-action="export_excel">
                           
                                <i class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>
                        <li class="divider"></li>
                         
                    </ul>
                </li> -->

                <li class="dropdown">
                    <a href="<?= admin_url('associate/exportpostpone'.($branch_id ? '/'.$branch_id : '')) ?>">
                        <i class="icon fa fa-file-excel-o" data-placement="left" title="<?= lang("export_to_excel") ?>"><?= lang("export_to_excel")?></i>
                    </a>
                     
                </li>



                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('associate/postponelist') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('associate/postponelist/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                              <th><?= 'কোড' ?></th>
                            <th><?= 'নাম' ?></th>
                            
							<th><?= "শাখা" ?></th>
							
							
							<th><?= 'শপথ' ?></th>
							<th><?= 'সেশন' ?></th>
							 <th><?= 'দায়িত্ব' ?></th>
							  <th><?= 'থানা কোড' ?></th>
                              
							 <th style="min-width:65px; text-align:center;"><?= 'প্রত্যাহার  ' ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="11" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
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
                             <th style="width:65px; text-align:center;"><?= "Withdraw" ?></th> 
                             
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
