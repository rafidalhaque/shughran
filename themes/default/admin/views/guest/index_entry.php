<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link href="https://t0m.github.io/select2-bootstrap-css/select2-bootstrap.css" rel="stylesheet"/>
      



<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সফর ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; $branch_code = $branch->code; ?>
        
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/guest'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/guest'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/guest'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/guest'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>
                
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                   <li class="hidden">	
                            <a href="<?= admin_url('guest/export/'.$branch->id) ?>" >	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
                        </li> 
						
						<li>	
                            <a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>
						
						
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('guest') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('guest/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				<style>
			.table-responsive{width: 100%;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				<div class="row">
					<div class="col-lg-12">
                <div class="table-responsive">
				
	
				 
 <table class="table table-bordered" id="testTable1" data-branch="<?php echo isset($branch_code) ? $branch_code.'_guest_' : 'central_guest'?>">
<tbody>
 
<tr>
<td >নং</td>
<td>সফরকারীর নাম</td>
<td>কতবার</td>
<td>প্রোগ্রামের ধরণ</td>
</tr>
 
 <?php   foreach($guests as $key=>$guest)  if(  (($guest->branch_id==999) || ( $guest->branch_id !=  $branch_id)) ) {  ?>
  
<tr>
<td><?php echo $key+1;?></td>
<td style="text-align:left"><?php echo $guest->guest_name?></td>
<td>
<?php 
 
 $row_info = record_row($guest_summary,'guest_id',$guest->id);
 $number = $row_info['number'];
?> 
<a href="#"  class="editable editable-click"  data-id="<?php echo $guest->id;?>" data-idname="guest_id"   data-type="number" data-table="guest_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('guest/detailupdate');?>" data-name="number" data-title="Enter"><?php echo $row_info['number'];?></a> 
 

</td>

<td>
<a href="#"  class="tags_select2 editable-click"  data-id="<?php echo $guest->id;?>" data-idname="guest_id"    data-type="select2" data-table="guest_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('guest/detailupdate_tag');?>" data-name="notes" data-title="Enter"><?php echo isset($row_info['notes']) ?  $row_info['notes'] : '';?></a> 
 

</td>


</tr>

 <?php  } ?>

 
</tbody>
</table>

 


 
				
				
				
				
				
                     
                </div>
           

					</div>
					
					
					 
					
				</div>



				
				
				
				
				
				<div class="row">
					<div class="col-lg-12">
               
           

		   
		   
		   
		   
		   
		  
		   
		   
		   
					</div>
					
					
					 
				</div>


				
		   </div>
        </div>
    </div>
</div>
 
