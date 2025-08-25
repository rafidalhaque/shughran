<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শিক্ষা সহযোগিতা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else { 

	if($report_info['type']=='annual'){
		 echo    anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/others/education_assistance'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
							 <a href="#" onclick="doit('xlsx','testTable3');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_table2') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/education_assistance') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/education_assistance/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
				
	
		 

 
 
<table class="table table-bordered" id="testTable3"   data-branch="<?php echo isset($branch_code) ? $branch_code.'_education_assistance_2_' : 'central_education_assistance_2'?>">
 
  <tbody>
    <tr>
      <td colspan="8">শিক্ষা সহযোগিতা</td>
    </tr>
    <tr>
      <td rowspan="10">একাডেমিক সহযোগিতা</td>
      <td rowspan="2">সহযোগিতার ধরন</td>
      <td rowspan="2">কতজনকে সহযোগিতা প্রদান</td>
      <td rowspan="10">অর্থনৈতিক সহযোগিতা</td>
      <td rowspan="2">সহযোগিতার ধরন</td>
      <td colspan="2">কতজনকে সহযোগিতা প্রদান</td>
      <td rowspan="2">টাকার পরিমাণ</td>
    </tr>
    <tr>
      <td>জনশক্তি</td>
      <td>সাধারণ ছাত্র</td>
    </tr>
    <tr>
      <td>প্রশ্ন ব্যাংক</td>
      <td><?=$education_assistance[0]['question_bank']?></td>
      <td>নিয়মিত </td>
      <td><?=$education_assistance[0]['regular']?></td>
      <td><?=$education_assistance[0]['regular_general_std']?></td>
      <td><?=$education_assistance[0]['regular_amount']?></td>
    </tr>
    <tr>
      <td>হ্যান্ডআউট সরবরাহ</td>
      <td><?=$education_assistance[0]['hand_out']?></td>
      <td>উচ্চ শিক্ষা </td>
      <td><?=$education_assistance[0]['higher_education']?></td>
      <td><?=$education_assistance[0]['higher_education_general_std']?></td>
      <td><?=$education_assistance[0]['higher_education_amount']?></td>
    </tr>
    <tr>
      <td>ফ্রি কোচিং </td>
      <td><?=$education_assistance[0]['free_coaching']?></td>
      <td>কর্জে হাসানা </td>
      <td><?=$education_assistance[0]['qard_hasan']?></td>
      <td><?=$education_assistance[0]['qard_hasan_general_std']?></td>
      <td><?=$education_assistance[0]['qard_hasan_amount']?></td>
    </tr>
    <tr>
      <td>লেন্ডিং লাইব্রেরি</td>
      <td><?=$education_assistance[0]['lending_library']?></td>
      <td>পরীক্ষার ফি</td>
      <td><?=$education_assistance[0]['exam_fee']?></td>
      <td><?=$education_assistance[0]['exam_fee_general_std']?></td>
      <td><?=$education_assistance[0]['exam_fee_amount']?></td>
    </tr>
    <tr>
      <td>মডেল টেস্ট</td>
      <td><?=$education_assistance[0]['model_test']?></td>
      <td>কোচিং ফি</td>
      <td><?=$education_assistance[0]['coaching_fee']?></td>
      <td><?=$education_assistance[0]['coaching_fee_general_std']?></td>
      <td><?=$education_assistance[0]['coaching_fee_amount']?></td>
    </tr>
    <tr>
      <td>অনলাইন ক্লাস</td>
      <td><?=$education_assistance[0]['online_class']?></td>
      <td>স্টাইপেন্ড</td>
      <td><?=$education_assistance[0]['stipend']?></td>
      <td><?=$education_assistance[0]['stipend_general_std']?></td>
      <td><?=$education_assistance[0]['stipend_amount']?></td>
    </tr>
    <tr>
      <td>অন্যান্য</td>
      <td><?=$education_assistance[0]['other']?></td>
      <td>অন্যান্য</td>
      <td><?=$education_assistance[0]['other_financial_help']?></td>
      <td><?=$education_assistance[0]['other_financial_help_general_std']?></td>
      <td><?=$education_assistance[0]['other_financial_help_amount']?></td>
    </tr>
    <tr>
      <td>মোট</td>
      <td><?=$education_assistance[0]['question_bank']+$education_assistance[0]['hand_out']+$education_assistance[0]['free_coaching']+$education_assistance[0]['lending_library']+$education_assistance[0]['model_test']+$education_assistance[0]['online_class']+$education_assistance[0]['other']?></td>
      <td>মোট</td>
       <td><?=$education_assistance[0]['regular']+$education_assistance[0]['higher_education']+$education_assistance[0]['qard_hasan']+$education_assistance[0]['exam_fee']+$education_assistance[0]['coaching_fee']+$education_assistance[0]['stipend']+$education_assistance[0]['other_financial_help']?></td>
        <td><?=$education_assistance[0]['regular_general_std']+$education_assistance[0]['higher_education_general_std']+$education_assistance[0]['qard_hasan_general_std']+$education_assistance[0]['exam_fee_general_std']+$education_assistance[0]['coaching_fee_general_std']+$education_assistance[0]['stipend_general_std']+$education_assistance[0]['other_financial_help_general_std']?></td>
       <td><?=$education_assistance[0]['regular_amount']+$education_assistance[0]['higher_education_amount']+$education_assistance[0]['qard_hasan_amount']+$education_assistance[0]['exam_fee_amount']+$education_assistance[0]['coaching_fee_amount']+$education_assistance[0]['stipend_amount']+$education_assistance[0]['other_financial_help_amount']?></td>
      
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
				
				
				
				
                     
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
 
