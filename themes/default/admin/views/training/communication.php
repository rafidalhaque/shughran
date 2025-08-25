<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'যোগাযোগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
               

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/training/communication'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span> 
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>	
                             <a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('training/communication') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('training/communication/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php 

 //echo "<pre>";
 //print_r($detailinfo);
 //echo "</pre>";
				?></p>

				 
				
				
                <div class="table-responsive">
				
	   
 
	 
 
	 
	  <table  class="table table-bordered" id="testTable1"   data-branch="<?php echo isset($branch_code) ? $branch_code.'_communication_' : 'central_communication'?>">
<tbody>
<tr>
<td colspan="2">যোগাযোগ</td>
 
<td colspan="2">কেন্দ্র থেকে প্রাপ্ত</td>
<td colspan="3">শাখা থেকে প্রকাশিত</td>
<td colspan="3">অধঃস্থন সংগঠনে প্রেরিত</td>
<td colspan="2">কেন্দ্রে প্রেরিত</td>
<td colspan="3">সংগঠনের বাইরে থেকে প্রাপ্ত</td>
</tr>
<tr>
<td colspan="2">চিঠি/সার্কুলার</td>
 
<td colspan="2" class="type_1"><?php echo $detailinfo[0]['letter_from_center']; ?></td>
<td colspan="3" class="type_1"><?php echo $detailinfo[0]['letter_from_branch']; ?></td>
<td colspan="3" class="type_1"><?php echo $detailinfo[0]['letter_to_subordinate']; ?></td>
<td colspan="2" class="type_1"><?php echo $detailinfo[0]['letter_to_center']; ?></td>
<td colspan="3" class="type_1"><?php echo $detailinfo[0]['letter_from_outside']; ?></td>
</tr>
<!-- <tr>
<td colspan="2">ই-মেইল</td>

<td colspan="2" class="type_2"><?php echo $detailinfo[0]['email_from_center']; ?></td>
<td colspan="3" class="type_2"><?php echo $detailinfo[0]['email_from_branch']; ?></td>
<td colspan="3" class="type_2"><?php echo $detailinfo[0]['email_to_subordinate']; ?></td>
<td colspan="2" class="type_2"><?php echo $detailinfo[0]['email_to_center']; ?></td>
<td colspan="3" class="type_2"><?php echo $detailinfo[0]['email_from_outside']; ?></td>
</tr> -->
</tbody>
</table>
 
 
 
	 
	 
	 
	 
 		
				
				
				
                   
                

				</div>
            </div>
        </div>
    </div>
</div>
 
