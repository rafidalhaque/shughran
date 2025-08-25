<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<style>@font-face {
  font-family: 'SolaimanLipi';
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot');
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.woff') format('woff'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.ttf') format('truetype'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal; 
}

</style> 
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বিস্তারিত দাওয়াত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
 
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
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				<style>
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, /*.table>tbody>tr>td, .table>tfoot>tr>td {padding:8px 2px;}*/
			.table>tbody>tr>td, .table>tfoot>tr>td { font-size: 15px;
    font-weight: normal; font-family: solaimanLipi;}
				 </style>
				 
				 
                <div class="table-scroll">
				
	
			
            
 <table class="table table-bordered" id="testTable2" data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_detail_' : 'central_dawat_detail'?>">
<tbody>
<tr style="height: 18px;">
<td style="height: 18px; " colspan="13">১। দাওয়াতী গ্রুপ প্রেরণ</td>
<td style=" height: 18px;" colspan="6">২। চলো গ্রামে যাই</td>
</tr>
<tr style="height: 10px;">
<td style="height: 46px; " rowspan="2" width="44">গ্রুপ সংখ্যা</td>
<td style="height: 46px; " rowspan="2" width="46">সদস্য সংখ্যা</td>
<td style="height: 10px; " colspan="2" width="101">দাওয়াত প্রাপ্ত</td>
<td style="height: 10px; " colspan="2" width="85">সমাবেশ</td>
<td style="height: 10px; " width="50">সমর্থক বৃদ্ধি</td>
<td style="height: 10px; " width="48">বন্ধু বৃদ্ধি</td>
<td style="height: 10px; " width="46">সংগঠন বৃদ্ধি</td>
<td style="height: 10px; " width="54"></td>
<td style="height: 10px; " width="51">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 10px; " width="52">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 10px; " width="40">শুভাকাংখী বৃদ্ধি</td>
<td style="height: 10px; " width="45">কতজন গিয়েছেন</td>
<td style="height: 10px; " width="52">কর্মী যোগাযোগ</td>
<td style="height: 10px; " width="47">সুধী যোগাযোগ</td>
<td style="height: 10px; " width="36">শুভাকাঙ্খী বৃদ্ধি</td>
<td style="height: 10px; " width="42">বন্ধু বৃদ্ধি</td>
<td style="height: 10px; " width="44">সমর্থক বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; " width="53">ছাত্র সংখ্যা</td>
<td style="height: 36px; " width="48">জনসংখ্যা</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
<td style="" rowspan="2" width="50">
<?php  $dawatgroupsend =   isset($detailinfo['dawatgroupsendinfo']) ? $detailinfo['dawatgroupsendinfo'] : NULL ; ?>
<?php  echo sum_detail($dawatgroupsend,'supporter_increase'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="48">
<?php  echo sum_detail($dawatgroupsend,'friend_increase'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="46">
<?php  echo sum_detail($dawatgroupsend,'organization_increase'); ?>
</td>


<td style="height: 54px; " rowspan="2" width="54">

</td>


<td style="height: 54px; " rowspan="2" width="51">
<?php  echo sum_detail($dawatgroupsend,'nonmuslim_supporter_increase'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="52">
<?php  echo sum_detail($dawatgroupsend,'nonmuslim_friend_increase'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="40">
<?php  echo sum_detail($dawatgroupsend,'ww_increase'); ?> 
</td>
<td style="height: 54px; " rowspan="2" width="45">

<?php  $letgotovillage =   isset($detailinfo['letgotovillageinfo']) ? $detailinfo['letgotovillageinfo'] : NULL ; ?>
 <?php  echo sum_detail($letgotovillage,'number_went'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="52">
  <?php  echo sum_detail($letgotovillage,'worker_communication'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="47">
  <?php  echo sum_detail($letgotovillage,'ww_communication'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="36">
  <?php  echo sum_detail($letgotovillage,'ww_increase'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="42">
  <?php  echo sum_detail($letgotovillage,'friend_increase'); ?>
</td>
<td style="height: 54px; " rowspan="2" width="44">
 <?php  echo sum_detail($letgotovillage,'supporter_increase'); ?>
</td>
</tr>
<tr style="height: 18px;">


<td style="" width="44">
<?php  echo sum_detail($dawatgroupsend,'group_number'); ?>
</td>
<td style="" width="46">
<?php  echo sum_detail($dawatgroupsend,'member_number'); ?>
</td>
<td style="" width="53">
<?php  echo sum_detail($dawatgroupsend,'dawat_received_std'); ?>
</td>
<td style="" width="48">
<?php  echo sum_detail($dawatgroupsend,'dawat_received_people'); ?>
</td>
<td style="" width="38">
<?php  echo sum_detail($dawatgroupsend,'gather_number'); ?>
</td>
<td style="" width="47">
<?php  echo sum_detail($dawatgroupsend,'gather_avg'); ?>
</td>
</tr>


<tr class="hidden" style="height: 18px;">



<td style="height: 18px; " colspan="19">৩।স্কুল দাওয়াতী দশক রিপোর্ট</td>

</tr>
<tr class="hidden" style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr class="hidden" style="height: 36px;">
<td style="height: 36px; " width="53">সংখ্যা</td>
<td style="height: 36px; " width="48">গড় উপঃ</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr class="hidden" style="height: 18px;">
<td style="height: 18px; ">
<?php  $school_dawat_report =   isset($detailinfo['school_dawat_reportinfo']) ? $detailinfo['school_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($school_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; "><?php  echo sum_detail($school_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($school_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($school_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($school_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($school_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'kishore'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($school_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($school_dawat_report,'ww_increase'); ?></td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; ">&nbsp;</td>
<td style="height: 18px; ">&nbsp;</td>
<td style="height: 18px; ">&nbsp;</td>
<td style="height: 18px; " colspan="19">৩। অনলাইন দাওয়াতি সপ্তাহ  রিপোর্ট</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; " width="53">সংখ্যা</td>
<td style="height: 36px; " width="48">গড় উপঃ</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; ">
<?php  $online_dawat_report =   isset($detailinfo['online_dawat_reportinfo']) ? $detailinfo['online_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($online_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; "><?php  echo sum_detail($online_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($online_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($online_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($online_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($online_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'kishore'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($online_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($online_dawat_report,'ww_increase'); ?></td>

</tr>
<tr style="height: 18px;">

<td style="height: 18px; background-color: #fff;" colspan="19">৪। উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি সপ্তাহ   রিপোর্ট</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; background-color: #fff;" rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; background-color: #fff;" colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; background-color: #fff;" colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; background-color: #fff;" rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; background-color: #fff;" width="53">সংখ্যা</td>
<td style="height: 36px; background-color: #fff;" width="48">গড় উপঃ</td>
<td style="height: 36px; background-color: #fff;" width="38">সংখ্যা</td>
<td style="height: 36px; background-color: #fff;" width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; background-color: #fff;">
<?php  $college_dawat_report =   isset($detailinfo['college_dawat_reportinfo']) ? $detailinfo['college_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($college_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; background-color: #fff;"><?php  echo sum_detail($college_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; background-color: #fff;"><?php  echo sum_detail($college_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; background-color: #fff;"><?php  echo sum_detail($college_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; background-color: #fff;"><?php  echo sum_detail($college_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; background-color: #fff;"><?php  echo sum_detail($college_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'kishore'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; background-color: #fff;"><?php  echo sum_detail($college_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; background-color: #fff;" ><?php  echo sum_detail($college_dawat_report,'ww_increase'); ?></td>

</tr>
<tr style="height: 18px;">

<td style="height: 18px; " colspan="19">৫। দাওয়াতী পক্ষ/ দশক রিপোর্ট</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; " width="53">সংখ্যা</td>
<td style="height: 36px; " width="48">গড় উপঃ</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; ">
<?php  $fortnight_dawat_report =   isset($detailinfo['fortnight_dawat_reportinfo']) ? $detailinfo['fortnight_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($fortnight_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; "><?php  echo sum_detail($fortnight_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($fortnight_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($fortnight_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($fortnight_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($fortnight_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'kishore'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($fortnight_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($fortnight_dawat_report,'ww_increase'); ?></td>

</tr>
<tr style="height: 18px;">

<td style="height: 18px; " colspan="19">৬। বিশ্ববিদ্যালয় ও অনার্স কলেজ দাওয়াতি সপ্তাহ  রিপোর্ট</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; " width="53">সংখ্যা</td>
<td style="height: 36px; " width="48">গড় উপঃ</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
</tr>
<tr style="height: 18px;">
<td style="height: 18px; ">
<?php  $university_dawat_report =   isset($detailinfo['university_dawat_reportinfo']) ? $detailinfo['university_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($university_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; "><?php  echo sum_detail($university_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($university_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($university_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($university_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($university_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'kishore'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($university_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($university_dawat_report,'ww_increase'); ?></td>

</tr>






<tr style="height: 18px;">



<td style="height: 18px; " colspan="19">৭। মাধ্যমিক (স্কুল ও মাদ্রাসা) দাওয়াতী দশক রিপোর্ট</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; " width="53">সংখ্যা</td>
<td style="height: 36px; " width="48">গড় উপঃ</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
</tr>



<tr style="height: 18px;">
<td style="height: 18px; ">
<?php  $secondary_dawat_report =   isset($detailinfo['secondary_dawat_reportinfo']) ? $detailinfo['secondary_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($secondary_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; "><?php  echo sum_detail($secondary_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($secondary_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($secondary_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($secondary_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($secondary_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'kishore'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($secondary_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($secondary_dawat_report,'ww_increase'); ?></td>
</tr>





<tr style="height: 18px;">



<td style="height: 18px; " colspan="19">৮। কওমি ও হাফেজি মাদরাসা দাওয়াতি সপ্তাহ</td>

</tr>
<tr style="height: 36px;">
<td style="height: 72px; " rowspan="2" width="44">সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="46">বন্ধু বৃদ্ধি</td>
<td style="height: 36px; " colspan="2" width="101">সাধারণ সভা</td>
<td style="height: 36px; " colspan="2" width="85">অন্যান্য বৈঠক</td>
<td style="height: 72px; " rowspan="2" width="50">দাওয়াতী কার্ড, বুকলেট</td>
<td style="height: 72px; " rowspan="2" width="48">পরিচিতি বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="46">কিশোর পত্রিকা বাংলা</td>
<td style="height: 72px; " rowspan="2" width="54">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="51">কিশোর পত্রিকা ইংরেজী</td>
<td style="height: 72px; " rowspan="2" width="52">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="40">ছাত্র সংবাদ বিতরণ</td>
<td style="height: 72px; " rowspan="2" width="45">গ্রাহক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="52">প্রেরিত গ্রুপ</td>
<td style="height: 72px; " rowspan="2" width="47">সমর্থক সংগঠন বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="36">অমুসলিম সমর্থক বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="42">অমুসলিম বন্ধু বৃদ্ধি</td>
<td style="height: 72px; " rowspan="2" width="44">শুভাকাংখী বৃদ্ধি</td>
</tr>
<tr style="height: 36px;">
<td style="height: 36px; " width="53">সংখ্যা</td>
<td style="height: 36px; " width="48">গড় উপঃ</td>
<td style="height: 36px; " width="38">সংখ্যা</td>
<td style="height: 36px; " width="47">গড় উপঃ</td>
</tr>



<tr style="height: 18px;">
<td style="height: 18px; ">
<?php  $madrasha_dawat_report =   isset($detailinfo['madrasha_dawat_reportinfo']) ? $detailinfo['madrasha_dawat_reportinfo'] : NULL ; ?>
 <?php  echo sum_detail($madrasha_dawat_report,'supporter_increase'); ?>
</td>
<td style="height: 18px; "><?php  echo sum_detail($madrasha_dawat_report,'friend_increase'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($madrasha_dawat_report,'number_general_gather'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'avg_presence'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($madrasha_dawat_report,'number_other_meeting'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($madrasha_dawat_report,'other_avg'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($madrasha_dawat_report,'card_booklet'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'porichiti'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'kishore'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'kishore_client_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'kishore_eng'); ?></td>
<td style="height: 18px; "><?php  echo sum_detail($madrasha_dawat_report,'kishore_eng_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'chhatrasongbad'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'chhatrasongbad_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'group_sent'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'supporter_org_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'nonmuslim_supporter_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'nonmuslim_friend_increase'); ?></td>
<td style="height: 18px; " ><?php  echo sum_detail($madrasha_dawat_report,'ww_increase'); ?></td>
</tr>

</tbody>
</table>	

			

			   </div>
            </div>
        </div>
    </div>
</div>
 
