<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header" style="height:95px;">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শাখা প্রশিক্ষণ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/training'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/training'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/training'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>

       
            </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>	
                            <a class="hidden" href="#" id="excel" data-action="export_excel">	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
								
								
							<a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_প্রশিক্ষণ') ?> 	</a>	
							<a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_table2') ?> 	</a>	
								
							<a href="#" onclick="doit('xlsx','testTable3');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_পাঠচক্র') ?> 	</a>	
							<a href="#" onclick="doit('xlsx','testTable4');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_ওয়ার্কশপ') ?> 	</a>	
								
								
                        </li>	

                <?php if (!empty($branches)) { ?>
                     <li style="padding: 0 10px; width:100px;">
					
					
					<select id="nav_branch_id" required="required" class="form-control select" style="width:100%;">
					 <option value=""><?= 'select Branch' ?></option>
					<option value="<?= admin_url('training') ?>"><?= 'সকল শাখা' ?></option>
					
					<?php
                            foreach ($branches as $branch) {
                                echo '<option  value="' . admin_url('training/' . $branch->id) . '">' . $branch->name . '</option>';
                            }
                            ?>
					 
					</select>
					
					
					
					
                        <a data-toggle="dropdown" class="dropdown-toggle hidden" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus hidden" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('training') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('training/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
					<div class="col-lg-6">
                <div class="table-responsive">
				
	
				 
 


 <table class="table table-bordered"  id="testTable1"   data-branch="<?php echo isset($branch_code) ? $branch_code.'_training_1_' : 'central_training_1'?>">
 <thead>

<tr>
 
<td>প্রশিক্ষণ</td>
<td>সংখ্যা</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
 
 </thead>
<tbody>

 


<?php foreach($trainings as $training) if($training->type==1) {?>
<tr >
<td colspan="1"><?php echo $training->training_name?></td>
<td class="type_1"> 
<?php 
$number = sum_record($training_summary,'number',$training->id,'training_id');
 echo $number;
?> 
</td>
 

 
<td class="type_2">
<?php 
$total_presence = sum_record($training_summary,'total_presence',$training->id,'training_id');
 echo $total_presence;
?>
</td>
<td class="type_3"><?php echo ($number >0) ? number_format((float)($total_presence/$number), 2, '.', '') : 0;?></td>
 
 


 </tr>
<?php }?>

 
</tbody>
</table>


 
				
				
				
				
				
                     
                </div>
           

					</div>
					
					
					<div class="col-lg-6">
                <div class="table-responsive">
				
	
				 
 


 <table class="table table-bordered" id="testTable2"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_training_2_' : 'central_training_2'?>">
 <thead>

<tr>
 
<td>বিষয়</td>
<td>সংখ্যা</td>
<td>ডেলিগেট	</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
 
 </thead>
<tbody>
 
 


<?php foreach($trainings as $training) if($training->type==2) {?>
<tr >
<td colspan="1"><?php echo $training->training_name?></td>
<td > 
<?php 
$number = sum_record($training_summary,'number',$training->id,'training_id');
 echo $number;
?> 
</td>
 
<td > 
<?php 
$delegate_number = sum_record($training_summary,'delegate_number',$training->id,'training_id');
echo $delegate_number;
?> 
</td>
 
<td >
<?php 
$total_presence = sum_record($training_summary,'total_presence',$training->id,'training_id');
 echo $total_presence;
?>
</td>
<td >
<?php echo ($number >0) ? number_format((float)($total_presence/$number), 2, '.', '') : 0;?>
 </td>
 
 


 </tr>
<?php }?>

 
 <tr >	
 <td colspan="5"></td>	
 </tr>	


<tr style="background-color: #428BCA; color:#ffffff">
 
<td>ক্লাশ</td>
<td>গ্রুপ সংখ্যা</td>
<td>প্রোগ্রাম সংখ্যা</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
 
   


<?php foreach($trainings as $training) if($training->type==3) {?>
<tr >
<td ><?php echo $training->training_name?></td>
<td > 
<?php 
$number = sum_record($training_summary,'number',$training->id,'training_id');
 echo $number;
?> 
</td>
 
<td > 
<?php 
$delegate_number = sum_record($training_summary,'delegate_number',$training->id,'training_id');
echo $delegate_number;
?> 
</td>
 
<td >
<?php 
$total_presence = sum_record($training_summary,'total_presence',$training->id,'training_id');
 echo $total_presence;
?>
</td>
<td >
<?php echo ($delegate_number >0) ? number_format((float)($total_presence/$delegate_number), 2, '.', '') : 0;?>	
</td>
 
 


 </tr>
<?php }?>

 
</tbody>
</table>


 
					
				
				
				
                     
                </div>
           

					</div>
					
				</div>



				
				
				
				
				
				<div class="row">
					<div class="col-lg-12">
                <div class="table-responsive">
				 
 <table class="table table-bordered" id="testTable3"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_training_3_' : 'central_training_3'?>">
 <thead>

<tr>
 
<td>পাঠচক্র</td>
<td>গ্রুপ সংখ্যা</td>
<td>ডেলিগেট সংখ্যা</td>
<td>অধিবেশন</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
 </thead>
 
<tbody>

 


<?php foreach($trainings as $training) if($training->type==4) {?>
<tr >
<td ><?php echo $training->training_name?></td>
<td > 
<?php 
$number = sum_record($training_summary,'number',$training->id,'training_id');
 echo $number;
?> 
</td>
 

<td > 
<?php 
$delegate_number = sum_record($training_summary,'delegate_number',$training->id,'training_id');
 echo $delegate_number;
?> 
</td> 
 
 
<td > 
<?php 
$session_number = sum_record($training_summary,'session_number',$training->id,'training_id');
 echo $session_number;
?> 
</td> 
 
<td >
<?php 
$total_presence = sum_record($training_summary,'total_presence',$training->id,'training_id');
 echo $total_presence;
?>
</td>
<td >
<?php echo ($session_number >0) ? number_format((float)($total_presence/$session_number), 2, '.', '') : 0;?>	

 </td>
 
 


 </tr>
<?php }?>

 
</tbody>
</table>
       
                </div>
           

		   
		   
		   
		   
		   
		   <div class="table-responsive">
				 
 <table class="table table-bordered" id="testTable4"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_training_4_' : 'central_training_4'?>">
 
 <thead>
<tr>
 
<td>ওয়ার্কশপ</td>
<td>সংখ্যা</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
</thead>
<tbody>

 


<?php foreach($trainings as $training) if($training->type==5) {?>
<tr >
<td ><?php echo $training->training_name?></td>
<td > 
<?php 
$number = sum_record($training_summary,'number',$training->id,'training_id');
 echo $number;
?> 
</td>
 

 
 
 
<td >
<?php 
$total_presence = sum_record($training_summary,'total_presence',$training->id,'training_id');
 echo $total_presence;
?>
</td>
<td > 
<?php echo ($number >0) ? number_format((float)($total_presence/$number), 2, '.', '') : 0;?>	

</td>
 
 


 </tr>
<?php }?>

 
</tbody>
</table>
       
                </div>
		   
		   
		   
					</div>
					
					
					 
				</div>


				
		   </div>
        </div>
    </div>
</div>
 
