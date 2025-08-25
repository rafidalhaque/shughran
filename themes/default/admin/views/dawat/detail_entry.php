<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বিস্তারিত দাওয়াত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';  $branch_code = $branch->code;?>
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/dawat/detail'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
                            <li><a href="<?= admin_url('dawat/detail') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/detail/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
			
			.table-scroll {
  overflow-x: auto;
  width: 1024px;
}
			.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, /*.table>tbody>tr>td, .table>tfoot>tr>td {padding:8px 2px;}*/
			.table>tbody>tr>td, .table>tfoot>tr>td { font-size: 15px;
    font-weight: bold;}
				 </style>
				
				
                <div class="table-scroll" > 
				
 	
	<table class="table table-bordered"  id="testTable2" data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_detail_' : 'central_dawat_detail'?>">
<tbody>
<tr style="height: 18px;">
<td style=" height: 18px; " colspan="12" width="617">১। দাওয়াতী গ্রুপ প্রেরণ</td>
<td style="  height: 18px;" colspan="6" width="266">২। চলো গ্রামে যাই</td>
</tr>
<tr style="height: 10px;">
<td style="height: 46px; " rowspan="2" width="44">গ্রুপ সংখ্যা</td>
<td style=" height: 46px; " rowspan="2" width="46">সদস্য সংখ্যা</td>
<td style=" height: 10px; " colspan="2" width="101">দাওয়াত প্রাপ্ত</td>
<td style="height: 10px; " colspan="2" width="85">সমাবেশ</td>
<td style=" height: 10px; " width="50">সমর্থক বৃদ্ধি</td>
<td style=" height: 10px; " width="48">বন্ধু বৃদ্ধি</td>
<td style=" height: 10px; " width="46">সংগঠন বৃদ্ধি</td>
 
<td style=" height: 10px; " width="51">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 10px; " width="52">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 10px; " width="40">শুভাকাংখী বৃদ্ধি</td>
<td style=" height: 10px; " width="45">কতজন গিয়েছেন</td>
<td style=" height: 10px; " width="52">কর্মী যোগাযোগ</td>
<td style=" height: 10px; " width="47">সুধী যোগাযোগ</td>
<td style=" height: 10px; " width="36">শুভাকাঙ্খী বৃদ্ধি</td>
<td style=" height: 10px; " width="42">বন্ধু বৃদ্ধি</td>
<td style=" height: 10px; " width="44">সমর্থক বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; " width="53">ছাত্র সংখ্যা</td>
<td style=" height: 36px; " width="48">জনসংখ্যা</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
<td style="" rowspan="2" width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->supporter_increase;?></a></td>
<td style=" height: 54px; " rowspan="2" width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->friend_increase;?></a></td>
<td style=" height: 54px; " rowspan="2" width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="organization_increase" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->organization_increase;?></a></td>
 
<td style=" height: 54px; " rowspan="2" width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 54px; " rowspan="2" width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 54px; " rowspan="2" width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->ww_increase;?></a></td>

<td style=" height: 54px; " rowspan="2" width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="letgotovillage" data-pk="<?php echo $detailinfo['letgotovillageinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_went" data-title="Enter"><?php echo $detailinfo['letgotovillageinfo']->number_went;?></a></td>
<td style=" height: 54px; " rowspan="2" width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="letgotovillage" data-pk="<?php echo $detailinfo['letgotovillageinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="worker_communication" data-title="Enter"><?php echo $detailinfo['letgotovillageinfo']->worker_communication;?></a></td>
<td style=" height: 54px; " rowspan="2" width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="letgotovillage" data-pk="<?php echo $detailinfo['letgotovillageinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_communication" data-title="Enter"><?php echo $detailinfo['letgotovillageinfo']->ww_communication;?></a></td>
<td style=" height: 54px; " rowspan="2" width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="letgotovillage" data-pk="<?php echo $detailinfo['letgotovillageinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['letgotovillageinfo']->ww_increase;?></a></td>
<td style=" height: 54px; " rowspan="2" width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="letgotovillage" data-pk="<?php echo $detailinfo['letgotovillageinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['letgotovillageinfo']->friend_increase;?></a></td>
<td style=" height: 54px; " rowspan="2" width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="letgotovillage" data-pk="<?php echo $detailinfo['letgotovillageinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['letgotovillageinfo']->supporter_increase;?></a></td>

</tr>
<tr style="height: 18px;">
<td style="" width="44"><a href="#" data-name="group_number" class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->group_number;?></a></td>
<td style="" width="46"><a href="#" data-name="member_number" class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->member_number;?></a></td>
<td style="" width="53"><a href="#" data-name="dawat_received_std" class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->dawat_received_std;?></a></td>
<td style="" width="48"><a href="#" data-name="dawat_received_people" class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->dawat_received_people;?></a></td>
<td style="" width="38"><a href="#" data-name="gather_number" class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->gather_number;?></a></td>
<td style="" width="47"><a href="#" data-name="gather_avg" class="editable editable-click"   data-type="number" data-table="dawatgroupsend" data-pk="<?php echo $detailinfo['dawatgroupsendinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-title="Enter"><?php echo $detailinfo['dawatgroupsendinfo']->gather_avg;?></a></td>
</tr>



<tr class="hidden" style="height: 18px;">
 
<td style=" height: 18px; " colspan="19">৩। স্কুল দাওয়াতী দশক রিপোর্ট</td>

</tr>
<tr class="hidden" style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr class="hidden" style="height: 36px;">
<td style=" height: 36px; " width="53">সংখ্যা</td>
<td style=" height: 36px; " width="48">গড় উপঃ</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr class="hidden" style="height: 18px;">
<td style="height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->supporter_increase;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->friend_increase;?></a></td>
<td style=" height: 18px; " width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->number_general_gather;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->avg_presence;?></a></td>
<td style=" height: 18px; " width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->other_avg;?></a></td>
<td style=" height: 18px; " width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->card_booklet;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->porichiti;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->kishore;?></a></td>
<td style="height: 18px; " width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; " width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->kishore_eng;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; " width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; " width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->group_sent;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; " width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; " width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="school_dawat_report" data-pk="<?php echo $detailinfo['school_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['school_dawat_reportinfo']->ww_increase;?></a></td>
</tr>













<tr style="height: 18px;">
 
<td style=" height: 18px; " colspan="19">৩। অনলাইন দাওয়াতি সপ্তাহ  রিপোর্ট</td>
 
</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; " width="53">সংখ্যা</td>
<td style=" height: 36px; " width="48">গড় উপঃ</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->supporter_increase;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->friend_increase;?></a></td>
<td style=" height: 18px; " width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['onlineinfo']->number_general_gather;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['onlineinfo']->avg_presence;?></a></td>
<td style=" height: 18px; " width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['onlineinfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['onlineinfo']->other_avg;?></a></td>
<td style=" height: 18px; " width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['onlineinfo']->card_booklet;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['onlineinfo']->porichiti;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['onlineinfo']->kishore;?></a></td>
<td style="height: 18px; " width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; " width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['onlineinfo']->kishore_eng;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; " width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['onlineinfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; " width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['onlineinfo']->group_sent;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; " width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; " width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="online_dawat_report" data-pk="<?php echo $detailinfo['onlineinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['onlineinfo']->ww_increase;?></a></td>
</tr>

















<tr style="height: 18px;">

<td style=" height: 18px; background-color: #fff;" colspan="19">৪। উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি সপ্তাহ   রিপোর্ট </td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; background-color: #fff;" rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; background-color: #fff;" colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; background-color: #fff;" colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; background-color: #fff;" rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; background-color: #fff;" width="53">সংখ্যা</td>
<td style=" height: 36px; background-color: #fff;" width="48">গড় উপঃ</td>
<td style=" height: 36px; background-color: #fff;" width="38">সংখ্যা</td>
<td style=" height: 36px; background-color: #fff;" width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; background-color: #fff;" width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->supporter_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->friend_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->number_general_gather;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->avg_presence;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->other_avg;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->card_booklet;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->porichiti;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->kishore;?></a></td>
<td style="height: 18px; background-color: #fff;" width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php  echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->kishore_eng;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->group_sent;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; background-color: #fff;" width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="college_dawat_report" data-pk="<?php echo $detailinfo['college_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['college_dawat_reportinfo']->ww_increase;?></a></td>
</tr>






 









 
<tr style="height: 18px;">

<td style=" height: 18px; " colspan="19">৫। দাওয়াতী পক্ষ/ দশক রিপোর্ট</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; " width="53">সংখ্যা</td>
<td style=" height: 36px; " width="48">গড় উপঃ</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->supporter_increase;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->friend_increase;?></a></td>
<td style=" height: 18px; " width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->number_general_gather;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->avg_presence;?></a></td>
<td style=" height: 18px; " width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->other_avg;?></a></td>
<td style=" height: 18px; " width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->card_booklet;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->porichiti;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->kishore;?></a></td>
<td style="height: 18px; " width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php  echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; " width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->kishore_eng;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; " width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; " width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->group_sent;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; " width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; " width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="fortnight_dawat_report" data-pk="<?php echo $detailinfo['fortnight_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['fortnight_dawat_reportinfo']->ww_increase;?></a></td>
</tr>











<tr style="height: 18px;">

<td style=" height: 18px; " colspan="19">৬। বিশ্ববিদ্যালয় ও অনার্স কলেজ দাওয়াতি সপ্তাহ  রিপোর্ট </td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; " width="53">সংখ্যা</td>
<td style=" height: 36px; " width="48">গড় উপঃ</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->supporter_increase;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->friend_increase;?></a></td>
<td style=" height: 18px; " width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->number_general_gather;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->avg_presence;?></a></td>
<td style=" height: 18px; " width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->other_avg;?></a></td>
<td style=" height: 18px; " width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->card_booklet;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->porichiti;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->kishore;?></a></td>
<td style="height: 18px; " width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php  echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; " width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->kishore_eng;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; " width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; " width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->group_sent;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; " width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; " width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['university_dawat_reportinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="university_dawat_report" data-pk="<?php echo $detailinfo['university_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter" data-placement="left"><?php echo $detailinfo['university_dawat_reportinfo']->ww_increase;?></a></td>
</tr>










 
<tr style="height: 18px;">

<td style=" height: 18px; " colspan="19">৭।  মাধ্যমিক (স্কুল ও মাদ্রাসা) দাওয়াতী দশক রিপোর্ট </td>

</tr>
 
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; " width="53">সংখ্যা</td>
<td style=" height: 36px; " width="48">গড় উপঃ</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->supporter_increase;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->friend_increase;?></a></td>
<td style=" height: 18px; " width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->number_general_gather;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->avg_presence;?></a></td>
<td style=" height: 18px; " width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->other_avg;?></a></td>
<td style=" height: 18px; " width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->card_booklet;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->porichiti;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->kishore;?></a></td>
<td style="height: 18px; " width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; " width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->kishore_eng;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; " width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; " width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->group_sent;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; " width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; " width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="secondary_dawat_report" data-pk="<?php echo $detailinfo['secondary_dawat_reportinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['secondary_dawat_reportinfo']->ww_increase;?></a></td>
</tr>
 





 
<tr style="height: 18px;">

<td style=" height: 18px; " colspan="19">৮। কওমি ও হাফেজি মাদরাসা দাওয়াতি সপ্তাহ </td>

</tr>
 
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style=" height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style=" height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style=" height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style=" height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style=" height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style=" height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style=" height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style=" height: 36px; " width="53">সংখ্যা</td>
<td style=" height: 36px; " width="48">গড় উপঃ</td>
<td style=" height: 36px; " width="38">সংখ্যা</td>
<td style=" height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->supporter_increase;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="friend_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->friend_increase;?></a></td>
<td style=" height: 18px; " width="53"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_general_gather" data-title="Enter"><?php echo $detailinfo['madrashainfo']->number_general_gather;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="avg_presence" data-title="Enter"><?php echo $detailinfo['madrashainfo']->avg_presence;?></a></td>
<td style=" height: 18px; " width="38"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="number_other_meeting" data-title="Enter"><?php echo $detailinfo['madrashainfo']->number_other_meeting;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="other_avg" data-title="Enter"><?php echo $detailinfo['madrashainfo']->other_avg;?></a></td>
<td style=" height: 18px; " width="50"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="card_booklet" data-title="Enter"><?php echo $detailinfo['madrashainfo']->card_booklet;?></a></td>
<td style=" height: 18px; " width="48"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti" data-title="Enter"><?php echo $detailinfo['madrashainfo']->porichiti;?></a></td>
<td style=" height: 18px; " width="46"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore" data-title="Enter"><?php echo $detailinfo['madrashainfo']->kishore;?></a></td>
<td style="height: 18px; " width="54"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_client_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->kishore_client_increase;?></a></td>
<td style=" height: 18px; " width="51"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng" data-title="Enter"><?php echo $detailinfo['madrashainfo']->kishore_eng;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_eng_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->kishore_eng_increase;?></a></td>
<td style=" height: 18px; " width="40"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad" data-title="Enter"><?php echo $detailinfo['madrashainfo']->chhatrasongbad;?></a></td>
<td style=" height: 18px; " width="45"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasongbad_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->chhatrasongbad_increase;?></a></td>
<td style=" height: 18px; " width="52"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="group_sent" data-title="Enter"><?php echo $detailinfo['madrashainfo']->group_sent;?></a></td>
<td style=" height: 18px; " width="47"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->supporter_org_increase;?></a></td>
<td style=" height: 18px; " width="36"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_supporter_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->nonmuslim_supporter_increase;?></a></td>
<td style=" height: 18px; " width="42"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="nonmuslim_friend_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->nonmuslim_friend_increase;?></a></td>
<td style=" height: 18px; " width="44"><a href="#"  class="editable editable-click"   data-type="number" data-table="madrasha_dawat_report" data-pk="<?php echo $detailinfo['madrashainfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="ww_increase" data-title="Enter"><?php echo $detailinfo['madrashainfo']->ww_increase;?></a></td>
</tr>
 

</tbody>
</table> 
	
	
	
	  
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 

