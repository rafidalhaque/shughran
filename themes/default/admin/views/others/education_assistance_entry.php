<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; $branch_code = $branch->code; ?>
              
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
      <td>
<?php 
$row_info = $education_assistance[0];
?>
      <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="question_bank"
                                                data-title="Enter"><?=$row_info['question_bank']?></a>

         
      </td>
      <td>নিয়মিত </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="regular"
                                                data-title="Enter"><?=$row_info['regular']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="regular_general_std"
                                                data-title="Enter"><?=$row_info['regular_general_std']?></a>
       </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="regular_amount"
                                                data-title="Enter"><?=$row_info['regular_amount']?></a>
       </td>
    </tr>
    <tr>
      <td>হ্যান্ডআউট সরবরাহ</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="hand_out"
                                                data-title="Enter"><?=$row_info['hand_out']?></a>
      </td>
      <td>উচ্চ শিক্ষা </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="higher_education"
                                                data-title="Enter"><?=$row_info['higher_education']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="higher_education_general_std"
                                                data-title="Enter"><?=$row_info['higher_education_general_std']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="higher_education_amount"
                                                data-title="Enter"><?=$row_info['higher_education_amount']?></a>
      </td>
    </tr>
    <tr>
      <td>ফ্রি কোচিং </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="free_coaching"
                                                data-title="Enter"><?=$row_info['free_coaching']?></a>
      </td>
      <td>কর্জে হাসানা </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="qard_hasan"
                                                data-title="Enter"><?=$row_info['qard_hasan']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="qard_hasan_general_std"
                                                data-title="Enter"><?=$row_info['qard_hasan_general_std']?></a>
      </td>
      <td>
      <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="qard_hasan_amount"
                                                data-title="Enter"><?=$row_info['qard_hasan_amount']?></a>  
      </td>
    </tr>
    <tr>
      <td>লেন্ডিং লাইব্রেরি</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="lending_library"
                                                data-title="Enter"><?=$row_info['lending_library']?></a>
      </td>
      <td>পরীক্ষার ফি</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="exam_fee"
                                                data-title="Enter"><?=$row_info['exam_fee']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="exam_fee_general_std"
                                                data-title="Enter"><?=$row_info['exam_fee_general_std']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="exam_fee_amount"
                                                data-title="Enter"><?=$row_info['exam_fee_amount']?></a>
      </td>
    </tr>
    <tr>
      <td>মডেল টেস্ট</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="model_test"
                                                data-title="Enter"><?=$row_info['model_test']?></a>
      </td>
      <td>কোচিং ফি</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="coaching_fee"
                                                data-title="Enter"><?=$row_info['coaching_fee']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="coaching_fee_general_std"
                                                data-title="Enter"><?=$row_info['coaching_fee_general_std']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="coaching_fee_amount"
                                                data-title="Enter"><?=$row_info['coaching_fee_amount']?></a>
      </td>
    </tr>
    <tr>
      <td>অনলাইন ক্লাস</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="online_class"
                                                data-title="Enter"><?=$row_info['online_class']?></a>
      </td>
      <td>স্টাইপেন্ড</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="stipend"
                                                data-title="Enter"><?=$row_info['stipend']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="stipend_general_std"
                                                data-title="Enter"><?=$row_info['stipend_general_std']?></a>
       </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="stipend_amount"
                                                data-title="Enter"><?=$row_info['stipend_amount']?></a>
      </td>
    </tr>
    <tr>
      <td>অন্যান্য</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="other"
                                                data-title="Enter"><?=$row_info['other']?></a>
       </td>
      <td>অন্যান্য</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="other_financial_help"
                                                data-title="Enter"><?=$row_info['other_financial_help']?></a>
       </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="other_financial_help_general_std"
                                                data-title="Enter"><?=$row_info['other_financial_help_general_std']?></a>
       </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_assistance" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="other_financial_help_amount"
                                                data-title="Enter"><?=$row_info['other_financial_help_amount']?></a>
      </td>
    </tr>
    <tr>
      <td>মোট</td>
      <td><?=$row_info['question_bank']+$row_info['hand_out']+$row_info['free_coaching']+$row_info['lending_library']+$row_info['model_test']+$row_info['online_class']+$row_info['other']?></td>
      <td>মোট</td>
       <td><?=$row_info['regular']+$row_info['higher_education']+$row_info['qard_hasan']+$row_info['exam_fee']+$row_info['coaching_fee']+$row_info['stipend']+$row_info['other_financial_help']?></td>
        <td><?=$row_info['regular_general_std']+$row_info['higher_education_general_std']+$row_info['qard_hasan_general_std']+$row_info['exam_fee_general_std']+$row_info['coaching_fee_general_std']+$row_info['stipend_general_std']+$row_info['other_financial_help_general_std']?></td>
       <td><?=$row_info['regular_amount']+$row_info['higher_education_amount']+$row_info['qard_hasan_amount']+$row_info['exam_fee_amount']+$row_info['coaching_fee_amount']+$row_info['stipend_amount']+$row_info['other_financial_help_amount']?></td>
      
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
 
 
					
				
				
				
                     
                </div>
           

					</div>
					
				</div>



				
				
				
				
			 


				
		   </div>
        </div>
    </div>
</div>
 
