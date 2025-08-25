<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }
	 #PRData td:nth-child(1) {
        width: 5%;
    }
	  #PRData td:nth-child(5) {
        width: 10%;
    }
     .worker_link {
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
          
		  'sAjaxSource': '<?= admin_url('worker/getDecreaseWorker/'.$process->id.($branch_id ? '/'.$branch_id : '').( $this->input->get('type') ? '?type='.$this->input->get('type') : '' ) ) ?>',
		  
		  

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
				//$(nRow).attr("status",'1');
				 
                nRow.className = "worker_link";
                //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                return nRow;
            },
            "aoColumns": [
                {"bSortable": false, "mRender": checkbox},    null, null,  null,   {"bSortable": false}
            ]
        }).fnSetFilteringDelay().dtFilter([
            {column_number: 1, filter_default_label: "[<?=lang('date');?>]", filter_type: "text", data: []},
            {column_number: 2, filter_default_label: "[<?=lang('name');?>]", filter_type: "text", data: []},
            {column_number: 3, filter_default_label: "[<?='branch';?>]", filter_type: "text", data: []}
            
            
            
        ], "footer");

    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('worker/worker_actions'.($branch_id ? '/'.$branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        
<h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'কর্মী  ঘাটতি : '.$process->process . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
				
			 
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
      

     
     &nbsp;&nbsp;
     <span class="dropdown hidden">

     <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Archive
         <span class="caret"></span>
         </button>
         <ul class="dropdown-menu" aria-labelledby="archive">
         <li><a href="#">Annual 2020</a></li>
         <li><a href="#">Half Yearly 2020</a></li>
         <li><a href="#">Annual 2019</a></li>
         <li><a href="#">Half Yearly 2019</a></li>
         
         </ul>



        </h2>
        <div class="box-icon">
            <ul class="btn-tasks">
			 <li>
                            <a href="<?= admin_url('worker/add/'.$process->id) ?>">
                                <i class="icon fa fa-plus-circle"></i> <?= "কর্মী ঘাটতি এন্ট্রি করুন " ?>
                            </a>
                        </li>
                 <li>
                            <a href="<?= admin_url('worker/export/'.$process->id.($branch_id ? '/'.$branch_id : '').( $this->input->get('type') ?  '?type='.$this->input->get('type') : '')) ?>" id="excel_export" data-action="export_excel">
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('worker/workerdecreaselist/'.$process->id) ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            
							<li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('worker/workerdecreaselist/'.$process->id.'?branch_id=' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <th style=" text-align: center;">
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                             <th><?= 'তারিখ ' ?></th>
                            <th><?= 'নাম' ?></th>
                            
							<th><?= "শাখা" ?></th>
							
							
							 
							 
                             
							 <th style="min-width:65px; text-align:center;"><?= 'Action' ?></th>
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
                            
                            
                            <th style="width:65px; text-align:center;"><?= lang("actions") ?></th>
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
