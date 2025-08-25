<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
    $(document).ready(function () {
        oTable = $('#PRData').dataTable({
            "aaSorting": [[2, "asc"], [3, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= admin_url('departmentsreport/getHigherEducationManpower'.($branch_id ? '/'.$branch_id : '')) ?>',
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
				 
               // nRow.className = "manpower_link";
                //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                return nRow;
            },
            "aoColumns": [
                {"bSortable": false, "mRender": checkbox},   null, null,null ,null,null,null,null,null,  {"bSortable": false}
            ]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?='Name';?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?='Branch';?>]", filter_type: "text", data: []},
			{column_number: 3, filter_default_label: "[<?='Country';?>]", filter_type: "text", data: []},
			{column_number: 4, filter_default_label: "[<?='last_responsibility';?>]", filter_type: "text", data: []},
			{column_number: 5, filter_default_label: "[<?='education';?>]", filter_type: "text", data: []},
            {column_number: 6, filter_default_label: "[<?='contact_info';?>]", filter_type: "text", data: []},
			 {column_number: 7, filter_default_label: "[<?='Type';?>]", filter_type: "text", data: []},
			  {column_number: 8, filter_default_label: "[<?='Year';?>]", filter_type: "text", data: []},
            
            
            
        ], "footer");

    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('manpower/manpower_actions'.($branch_id ? '/'.$branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বিদেশে অধ্যয়নরত জনশক্তদিরে তালকিা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
			
			 <?php if($branch_id) {?>
			 
			   <li>
                        
						 <a class="tip" title="Add" href="<?=  admin_url('departmentsreport/addhighereducationmanpower/'.$branch_id); ?>" data-toggle='modal' data-target='#myModal'><i class="icon fa fa-plus"></i> যোগ করুন </a>			 
						 
                         </li>
			 
                
				 <?php }?>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                             <th><?= 'নাম' ?></th>
                             <th><?= 'শাখা' ?></th>
                             
							<th><?= "দেশ " ?></th>
							<th><?= 'পূর্বের দায়িত্ব  ' ?></th>
							<th><?= 'অর্নাস/ মার্স্টাস/পএিইচডি ' ?></th>							
							<th><?= 'যোগাযোগ' ?></th>
 
							  <th><?= 'টাইপ' ?></th>
							 <th><?= 'বছর' ?></th>
							 <th style="width:65px; max-width:65px; text-align:center;"><?= 'Action' ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="10" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                        </tr>
                        </tbody>

                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; max-width: 30px; text-align: center;">
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
                               <th style="width:65px; max-width:65px; text-align:center;"><?= lang("actions") ?></th>
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
