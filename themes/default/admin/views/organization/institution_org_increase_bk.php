<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }
	 #PRData th:nth-child(1) { width:5%; }
	 #PRData th:nth-child(2) { width:20%; }
	 #PRData th:nth-child(3) { width:20%; }
	 #PRData th:nth-child(4) { width:20%; }
	  #PRData th:nth-child(5) { width:20%; }
	 #PRData th:nth-child(6) { width:7%; }
 


     .manpower_link {
    cursor: pointer;
}
</style>
<script>
    var oTable;
    $(document).ready(function () {
        oTable = $('#INSData').dataTable({
            "aaSorting": [[0, "asc"]],
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
            
           
        });

    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('organization/organization_actions'.($branch_id ? '/'.$branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সংগঠন বৃদ্ধি তালিকা ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        
        
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                
                

                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if($report_info['type']=='annual'){
        echo anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').( '?' ).('type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
        echo  "&nbsp;|&nbsp;".anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
        echo "&nbsp;|&nbsp;";   echo anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').( '?' ).'type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
    }
    else{
         echo anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
        echo  "&nbsp;|&nbsp;".anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').('?' ).'type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
        
    }
}

else {

    if($report_info['type']=='annual'){
         echo    anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').('?' ).'type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
    }
    else{
      
        echo   anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').('?' ).'type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
        
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

        echo   ' <li>'.anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
        
        for($i = date('Y')-1; $i>=2019; $i-- ){
        echo   ' <li>'.anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
        echo   ' <li>'.anchor('admin/organization/institution_org_increase'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
        

        }
        ?>
     
        </ul>
     </span>
        
            </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
			
			 <?php if($branch_id) {?>
                         <li>
                        
						 <a class="tip" title="Add Institution" href="<?=  admin_url('organization/addinstitution/'.$branch_id); ?>" data-toggle='modal' data-target='#myModal'><i class="icon fa fa-plus"></i> প্রতিষ্ঠান যোগ করুন </a>			 
						 
                         </li>
						 <?php }?>
						 
			
                        <li>
                            <a    href="<?= admin_url('organization/organizationincreaseexport/'.($branch_id ? '/'.$branch_id : '').( $this->input->get('type') ?  '?type='.$this->input->get('type') : '')) ?>" id="excel_export" data-action="export_excel">
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization/institution_org_increase') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/institution_org_increase/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table id="INSData" class="table table-bordered table-condensed table-hover table-striped">
                        <thead>
                        <tr class="primary">
                            
                            <th><?= 'প্রতিষ্ঠানের কোড' ?></th>
                             <th><?= 'প্রতিষ্ঠানের নাম ' ?></th>
                             
                            
							<th><?= "ধরণ" ?></th>
                            <th><?= "উপ ধরণ" ?></th>
							
							
							<th><?= 'শাখা কোড ' ?></th>
                           
                            
						        </tr>
                        </thead>
                        <tbody>
                        
                            <?php 
                            if(count($institution_org_increase) > 0){

                                foreach($institution_org_increase as $row) {
                            ?>
                            <tr>
                            <td><?=$row['ins_code']?></td>
                            <td><?=$row['institution_name']?></td>
                            <td><?=$row['category']?></td>
                            <td><?=$row['sub_category']?></td>
                            <td><?=$row['code']?></td>
                            </tr>
                            <?php  
                                }
                        
                        
                        } 
                            else {
                            ?>
                            <tr> 
                            <td colspan="5" class="dataTables_empty"><?= lang('no_data'); ?></td>
                            </tr>
                            <?php  }
                                ?>


                        </tr>
                        </tbody>

                        
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
