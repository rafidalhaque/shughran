<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= ' অতিরিক্ত দাওয়াত ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';$branch_code = $branch->code; ?>
               
       
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     

                
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/dawat/extra'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
								
							<a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('dawat/extra') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/extra/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
 //print_r($detailinfo['university_dawat_reportinfo']);
 //echo "</pre>";

				?></p>

				 <style>
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				
                <div class="table-responsive">
				
	
	
	
 <table class="table table-bordered" id="testTable2"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_extra_' : 'central_dawat_extra'?>">
<tbody>
<tr>
<td colspan="2" rowspan="2">অতিরিক্ত দাওয়াত </td>
<td  colspan="8" width="155">অংশগ্রহনকারী</td>
<td colspan="3" rowspan="2" width="73">দাওয়াত প্রাপ্ত</td>
<td  colspan="2" rowspan="2" width="23">বন্ধু বৃদ্ধি</td>
<td colspan="2" rowspan="2" width="59">সমর্থক বৃদ্ধি</td>
<td  colspan="7" rowspan="3" width="133">অতিরিক্ত দাওয়াত</td>
<td  rowspan="3" width="33" style="background:#ccc">সংখ্যা</td>
<td  colspan="2" rowspan="3" width="37" >বৃদ্ধি</td>
</tr>
<tr >
<td  colspan="3" style="background:#ccc">পূর্বের সংখ্যা</td>
<td  colspan="3" style="background:#ccc">বর্তমান সংখ্যা</td>
<td >বৃদ্ধি</td>
<td >ঘাটতি</td>
</tr>
<tr >
<td colspan="2" >ব্যক্তিগত দাওয়াতী কাজ</td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_prev" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_prev;?></a></td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_current" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_current;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_increase;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_decrease" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_decrease;?></a></td>

<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_person" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_person;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_friend" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_friend;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="personal_dawat_supporter" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->personal_dawat_supporter;?></a></td>
</tr>
<tr >
<td colspan="2">গ্রুপ দাওয়াতী কাজ</td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_prev" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_prev;?></a></td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_current" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_current;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_increase;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_decrease" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_decrease;?></a></td>

<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_person" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_person;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_friend" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_friend;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_dawat_supporter" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->group_dawat_supporter;?></a></td>

<td  colspan="7">দাওয়াতী গ্রুপ</td>
<td ><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="dawat_group" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->dawat_group;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="dawat_group_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->dawat_group_increase;?></a></td>
</tr>
<tr >
<td  colspan="2" >মুহরামাদের মাঝে কাজ</td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_prev" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_prev;?></a></td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_current" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_current;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_increase;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_decrease" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_decrease;?></a></td>

<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_person" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_person;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click hidden"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_friend" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_friend;?></a></td>	
<td colspan="2"><a href="#"  class="editable editable-click hidden"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharrama_dawat_supporter" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharrama_dawat_supporter;?></a></td>

	<td colspan="7">জনশক্তিদের মোট মুহাররমা কতজন</td>
<td ><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharram_number" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharram_number;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="muharram_number_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->muharram_number_increase;?></a></td>
</tr>
<tr >
<td colspan="2" >আত্মীয় ও প্রতিবেশী</td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_prev" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_prev;?></a></td>
<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_current" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_current;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_increase;?></a></td>
<td><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_decrease" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_decrease;?></a></td>

<td  colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_person" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_person;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_friend" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_friend;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_dawat_supporter" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_dawat_supporter;?></a></td>

<td  colspan="7">জনশক্তিদের মোট আত্মীয় ও প্রতিবেশী কতজন</td>
<td ><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_number" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_number;?></a></td>
<td  colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="extra_dawat" data-pk="<?php echo $detailinfo['extra_dawatinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="relative_number_increase" data-title="Enter"><?php echo $detailinfo['extra_dawatinfo']->relative_number_increase;?></a></td>
</tr>
</tbody>
</table>
	 
		 
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 

