<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else { 

	if($report_info['type']=='annual'){
		 echo    anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/others/program'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
							<a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_table1') ?> 	</a>	
							<a href="#" onclick="doit('xlsx','testTable3');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_table2') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/program') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
				
	
				 
 


 <table class="table table-bordered"  id="testTable2"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_program_1_' : 'central_program_1'?>">
 <thead>

<tr>
 
<td>সভাসমূহ</td>
<td>সংখ্যা</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
 
 </thead>
<tbody>

 


<?php foreach($programs as $key=>$program) if($key < floor(count($programs)/2)) {?>
<tr>
<td colspan="1"><?php echo $program->program_type?></td>
<td class="type_1"> 
<?php 
$number = sum_record($program_summary,'number',$program->id,'program_id');
 echo $number;
?> 
</td>
<td class="type_2">
<?php 
$total_presence = sum_record($program_summary,'total_presence',$program->id,'program_id');
echo $total_presence;
?>
</td>
<td class="type_3">
<?php echo ($number >0) ? number_format((float)($total_presence/$number), 2, '.', '') : 0;?>


 

</td>
</tr>
<?php }?>

 
</tbody>
</table>


 
				
				
				
				
				
                     
                </div>
           

					</div>
					
					
					<div class="col-lg-6">
               <div class="table-responsive">
				
	
				 
 


 <table class="table table-bordered" id="testTable3"   data-branch="<?php echo isset($branch_code) ? $branch_code.'_program_2_' : 'central_program_2'?>">
 <thead>

<tr>
 
<td>সভাসমূহ</td>
<td>সংখ্যা</td>
<td>মোট উপস্থিতি</td>
<td>গড়	</td>
 
</tr>
 
 </thead>
<tbody>

 


<?php foreach($programs as $key=>$program) if($key >= floor(count($programs)/2)) {?>
<tr>
<td colspan="1"><?php echo $program->program_type?></td>
<td class="type_1"> 
<?php 
$number = sum_record($program_summary,'number',$program->id,'program_id');
 echo $number;
?> 
</td>
<td class="type_2">
<?php 
$total_presence = sum_record($program_summary,'total_presence',$program->id,'program_id');
echo $total_presence;
?>
</td>
<td class="type_3"><?php echo ($number >0) ? number_format((float)($total_presence/$number), 2, '.', '') : 0;?>

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
               
           

		   
		   
		   
		   
		   
		  
		   
		   
		   
					</div>
					
					
					 
				</div>


				
		   </div>
        </div>
    </div>
</div>
 
