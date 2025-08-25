<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>	
                            <a href="<?= admin_url('manpower/exportsummary'.($branch_id ? '/'.$branch_id : '')) ?>">	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('manpower') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('manpower/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"></p>
                <div class="table-responsive">
                    <style type="text/css">
                        .tg  {border-collapse:collapse;border-spacing:0;}
                        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                        .tg .tg-izx2{border-color:black;background-color:#efefef;text-align:left}
                        .tg .tg-pwj7{background-color:#efefef;border-color:black;text-align:left}
                        .tg .tg-0pky{border-color:black;text-align:left;vertical-align:top}
                        .tg .tg-y698{background-color:#efefef;border-color:black;text-align:left;vertical-align:top}
                        .tg .tg-0lax{border-color:black;text-align:left;vertical-align:top}
                        @media screen and (max-width: 767px) {
                            .tg {width: auto !important;}
                            .tg col {width: auto !important;}
                            .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;
                            }
                        }
                        .table-header-rotated {
                            border-collapse: collapse;
                        }
                        .table-header-rotated td {
                            width: 30px;
                        }
                        .no-csstransforms .table-header-rotated td {
                            padding: 5px 10px;
                        }
                        .table-header-rotated td {
                            text-align: center;
                            padding: 10px 5px;
                            border: 1px solid #ccc;
                        }
                        .table-header-rotated td.rotate {
                            height: 140px;
                            white-space: nowrap;
                        }
                        .table-header-rotated td.rotate > div {
                            -webkit-transform: translate(10px, 51px) rotate(270deg);
                            transform: translate(10px, 51px) rotate(270deg);
                            width: 20px;
                        }
                        .table-header-rotated td.rotate > div > span {
                            padding: 5px 10px;
                        }
                        .table-header-rotated td.row-header {
                            padding: 0 10px;
                            border-bottom: 1px solid #ccc;
                        }
                        .table > tbody > tr > td {
                            border: 1px solid #ccc;
                        }
                    </style>
<div class="tg-wrap">
<table class="tg table table-header-rotated" id="testTable2">
  <tr>
    <td class="tg-pwj7" rowspan="3">জনশক্তি </td>
    <td class="tg-pwj7 rotate" rowspan="3"><div><span>পূর্বের সংখ্যা </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="3"><div><span>বর্তমান সংখ্যা</span></div></td>
    <td class="tg-pwj7 " colspan="3">বৃদ্ধি </td>
    <td class="tg-pwj7 rotate" rowspan="3"><div><span>টার্গেট </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="3"><div><span>বাস্তবায়ন হার %</span></div></td>
    <td class="tg-pwj7 " colspan="11"> ঘাটতি </td>
  </tr>
  <tr>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>সংখ্যা </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>মানোন্নয়ন </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>আগমন</span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>সংখ্যা </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>মানোন্নয়ন </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>ছাত্রত্ব শেষ  </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>স্থানান্তর  </span></div></td>
    <td class="tg-pwj7 rotate" rowspan="2"><div><span>বাতিল  </span></div></td>
    <td class="tg-pwj7" colspan="2">বিদেশ</td>
    <td class="tg-izx2 rotate" rowspan="2"><div><span>ইন্তেকাল </span></div></td>
    <td class="tg-izx2 rotate" rowspan="2"><div><span>শাহাদাত </span></div> </td>
    <td class="tg-izx2 rotate" rowspan="2"><div><span>কর্মী মান  অবনতি</span></div> </td>
    <td class="tg-izx2 rotate" rowspan="2"><div><span>postpone</span></div></td>
  </tr>
  <tr>
    <td class="tg-y698 rotate"><div><span>উচ্চ শিক্ষা </span></div></td>
    <td class="tg-y698 rotate"><div><span>চাকুরী</span></div></td>
  </tr>
  <tr>
    <td class="tg-y698">সদস্য </td>
    <td class="tg-0pky  type_1">
	<?php  $member_prev =  $prev_manpower[0]['member'];
	echo $member_prev;
	?>
	 </td>
	
	<?php 
	$member_improvement = (!$memberlog) ? 0 :  calculate($memberlog, 2,1, 'member_number');
	$member_arrival = (!$memberlog) ? 0 :  calculate($memberlog, 15,1, 'member_number');
	
	$member_endstd = (!$memberlog) ? 0 :  calculate($memberlog, 8,2, 'member_number');
	$member_transfer = (!$memberlog) ? 0 :  calculate($memberlog, 15,2, 'member_number');
	$member_cancel = (!$memberlog) ? 0 :  calculate($memberlog, 12,2, 'member_number');
	$member_study_abroad = (!$memberlog) ? 0 :  calculate($memberlog, 11,2, 'member_number');
	$member_job_abroad = (!$memberlog) ? 0 :  calculate($memberlog, 14,2, 'member_number');
	$member_death = (!$memberlog) ? 0 :  calculate($memberlog, 9,2, 'member_number');
	$member_martyr = (!$memberlog) ? 0 :  calculate($memberlog, 10,2, 'member_number');
	$member_demotion = (!$memberlog) ? 0 :  calculate($memberlog, 13,2, 'member_number');
	$total_member_decrease = $member_endstd  + $member_transfer  + $member_cancel  + $member_study_abroad + $member_job_abroad + $member_death + $member_martyr + $member_demotion;
	
	?>
	
    <td class="tg-0pky  type_2">
	<?php 
  echo $member_prev + $member_improvement + $member_arrival - $total_member_decrease;
	?>
	</td>
    <td class="tg-0pky  type_3">
	<?php 
  echo $member_improvement + $member_arrival;
	?>
	</td>
    <td class="tg-0pky  type_4">
	<?php 
  echo $member_improvement;
	?>
	</td>
    <td class="tg-0pky  type_5">
	<?php 
	
	echo $member_arrival;
	?>
	</td>
    <td class="tg-0pky  type_6">
	<?php   
	echo $member_prev;
	?>
	</td>
    <td class="tg-0pky  type_7">
	<?php   
	echo  ($member_prev>0) ? round(100*$member_improvement/$member_prev,2) : 0;;
	?>
	
	</td>
	
	 
	
    <td class="tg-0pky type_8"><?php  echo $total_member_decrease; ?></td>
    <td class="tg-0pky  type_9"></td>
    <td class="tg-0pky  type_10"><?php  echo $member_endstd; ?></td>
    <td class="tg-0pky  type_11">
	<?php echo $member_transfer; ?>
	</td>
    <td class="tg-0pky  type_12">
	<?php  echo $member_cancel; ?>
	</td>
    <td class="tg-0pky  type_13">
	<?php  echo $member_study_abroad; ?>
	</td>
    <td class="tg-0pky  type_14">
	<?php  echo $member_job_abroad; 	?>
	
	</td>
    <td class="tg-0lax  type_15">
	<?php  echo $member_death; 	?>
	</td>
    <td class="tg-0lax  type_16">
	<?php  echo $member_martyr; ?>
	</td>
    <td class="tg-0lax  type_17">
	<?php  echo $member_demotion; ?>
	</td>
    <td class="tg-0lax  type_18">
	<?php echo $postpone[0]->number; ?>
	
	</td>
  </tr>
  
  <?php 
	$membercandidate_improvement = (!$membercandidatelog) ? 0 :  calculate($membercandidatelog, 2,1, 'member_candidate_number');
	$membercandidate_arrival = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 15,1, 'member_candidate_number');
	
	$membercandidate_endstd = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 8,2, 'member_candidate_number');
	$membercandidate_transfer = (!$membercandidatelog) ? 0 :calculate($membercandidatelog, 15,2, 'member_candidate_number');
	$membercandidate_cancel = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 12,2, 'member_candidate_number');
	$membercandidate_study_abroad = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 11,2, 'member_candidate_number');
	$membercandidate_job_abroad = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 14,2, 'member_candidate_number');
	$membercandidate_death =(!$membercandidatelog) ? 0 : calculate($membercandidatelog, 9,2, 'member_candidate_number');
	$membercandidate_martyr = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 10,2, 'member_candidate_number');
	$membercandidate_demotion = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 13,2, 'member_candidate_number');
	$membercandidate_improvement_d = $member_improvement;
	
	$total_membercandidate_decrease = $membercandidate_improvement_d + $membercandidate_endstd  + $membercandidate_transfer  + $membercandidate_cancel  + $membercandidate_study_abroad + $membercandidate_job_abroad + $membercandidate_death + $membercandidate_martyr + $membercandidate_demotion;
	
	
	?>
  
  <tr>
    <td class="tg-y698">সদস্য প্রার্থী </td>
    <td class="tg-0pky">
	<?php  
	$membercandidate_prev = $prev_manpower[0]['member_candidate'];
	echo $membercandidate_prev;
	?></td>
    <td class="tg-0pky">
	<?php 
  echo $membercandidate_prev + $membercandidate_improvement + $membercandidate_arrival - $total_membercandidate_decrease;
	?>
	</td>
    <td class="tg-0pky">
	<?php 
  echo $membercandidate_improvement + $membercandidate_arrival;
	?>
	</td>
    <td class="tg-0pky">
	<?php 
  echo $membercandidate_improvement;
	?>
	</td>
    <td class="tg-0pky">
	<?php 
	
	echo $membercandidate_arrival;
	?>
	</td>
    <td class="tg-0pky">
	<?php 
	
	if(isset($manpower_record[0])) {
	$arr = $manpower_record[0];
	$membercandidate_target = $arr['member_candidate_candidate_target'];
 	$pk =  $arr['id'];
	}
	
	else {
		$membercandidate_target = 0;
		$pk =  "";
	}
  ?>
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="member_candidate_candidate_target" data-title="Enter"><?php echo $membercandidate_target;?></a> 

	</td>
    <td class="tg-0pky">
	<?php   
	echo  ($membercandidate_target>0) ? round(100*$membercandidate_improvement/$membercandidate_target,2) : 0;;
	?>
	
	</td>
	
	 
	
    <td class="tg-0pky"><?php  echo $total_membercandidate_decrease; ?></td>
    <td class="tg-0pky">
	<?php 
  echo $membercandidate_improvement_d;
	?>
	</td>
    <td class="tg-0pky"><?php  echo $membercandidate_endstd; ?></td>
    <td class="tg-0pky">
	<?php echo $membercandidate_transfer; ?>
	</td>
    <td class="tg-0pky">
	<?php  echo $membercandidate_cancel; ?>
	</td>
    <td class="tg-0pky">
	<?php  echo $membercandidate_study_abroad; ?>
	</td>
    <td class="tg-0pky">
	<?php  echo $membercandidate_job_abroad; 	?>
	
	</td>
    <td class="tg-0lax">
	<?php  echo $membercandidate_death; 	?>
	</td>
    <td class="tg-0lax">
	<?php  echo $membercandidate_martyr; ?>
	</td>
    <td class="tg-0lax">
	<?php  echo $membercandidate_demotion; ?>
	</td>
    <td class="tg-0lax">
	<?php echo $postponemc[0]->number; ?>
	
	</td>
  </tr>
  
  
  
  
   <tr>
   <td class="tg-y698">সাথী </td>
    <td class="tg-y698  type_1">
	<?php  $associate_prev =  $prev_manpower[0]['associate'];
	echo $associate_prev;
	?>
	 </td>
	
	<?php 
	$associate_improvement = (!$assolog) ? 0 : calculate($assolog, 2,1, 'associate_number');
	$associate_arrival =(!$assolog) ? 0 : calculate($assolog, 15,1, 'associate_number');
	
	$associate_endstd = (!$assolog) ? 0 : calculate($assolog, 8,2, 'associate_number');
	$associate_transfer = (!$assolog) ? 0 : calculate($assolog, 15,2, 'associate_number');
	$associate_cancel = (!$assolog) ? 0 : calculate($assolog, 12,2, 'associate_number');
	$associate_study_abroad =  (!$assolog) ? 0 : calculate($assolog, 11,2, 'associate_number');
	$associate_job_abroad = (!$assolog) ? 0 :  calculate($assolog, 14,2, 'associate_number');
	$associate_death = (!$assolog) ? 0 : calculate($assolog, 9,2, 'associate_number');
	$associate_martyr = (!$assolog) ? 0 : calculate($assolog, 10,2, 'associate_number');
	$associate_demotion = (!$assolog) ? 0 : calculate($assolog, 13,2, 'associate_number');
	$associate_improvement_d = $member_improvement;
	
	$total_associate_decrease = $associate_improvement_d +  $associate_endstd  + $associate_transfer  + $associate_cancel  + $associate_study_abroad + $associate_job_abroad + $associate_death + $associate_martyr + $associate_demotion;
	
	?>
	
    <td class="tg-y698  type_2">
	<?php 
  echo $associate_prev + $associate_improvement + $associate_arrival - $total_associate_decrease;
	?>
	</td>
    <td class="tg-y698  type_3">
	<?php 
  echo $associate_improvement + $associate_arrival;
	?>
	</td>
    <td class="tg-y698  type_4">
 
	<?php 
  echo $associate_improvement;
	?>
	
	</td>
    <td class="tg-y698  type_5">
	<?php 
	
	echo $associate_arrival;
	?>
	</td>
    <td class="tg-y698 type_6">
	<?php   
	echo $associate_prev + $member_prev;
	?>
	</td>
    <td class="tg-y698  type_7">
	<?php   
	echo  ($associate_prev + $member_prev>0) ? round(100*$associate_improvement/($associate_prev + $member_prev),2) : 0;;
	?>
	
	</td>
	
	 
	
    <td class="tg-y698  type_8"><?php  echo $total_associate_decrease; ?></td>
    <td class="tg-y698  type_9">
	<?php 
  echo $associate_improvement_d;
	?>
	
	</td>
    <td class="tg-y698  type_10"><?php  echo $associate_endstd; ?></td>
    <td class="tg-y698  type_11">
	<?php echo $associate_transfer; ?>
	</td>
    <td class="tg-y698  type_12">
	<?php  echo $associate_cancel; ?>
	</td>
    <td class="tg-y698  type_13">
	<?php  echo $associate_study_abroad; ?>
	</td>
    <td class="tg-y698  type_14">
	<?php  echo $associate_job_abroad; 	?>
	
	</td>
    <td class="tg-y698  type_15">
	<?php  echo $associate_death; 	?>
	</td>
    <td class="tg-y698  type_16">
	<?php  echo $associate_martyr; ?>
	</td>
    <td class="tg-y698  type_17">
	<?php  echo $associate_demotion; ?>
	</td>
    <td class="tg-y698  type_18">
	<?php echo $postpone_asso[0]->number; ?>
	
	</td>
  </tr>
  
  
  
  
  
  
  <?php  $associate_candidate_prev =  $prev_manpower[0]['associate_candidate'];
	
	  
	$associate_candidate_improvement = sum_manpower($manpower_record,'associate_candidate_improvement');
	$associate_candidate_arrival = sum_manpower($manpower_record,   'associate_candidate_arrival');
	
	$associate_candidate_endstd = sum_manpower($manpower_record,   'associate_candidate_endstd');
	$associate_candidate_transfer = sum_manpower($manpower_record,   'associate_candidate_transfer');
	$associate_candidate_cancel = sum_manpower($manpower_record,   'associate_candidate_cancel');
	$associate_candidate_abroad_study = sum_manpower($manpower_record,  'associate_candidate_abroad_study');
	$associate_candidate_abroad_job = sum_manpower($manpower_record,   'associate_candidate_abroad_job');
	$associate_candidate_death = sum_manpower($manpower_record,  'associate_candidate_death');
	$associate_candidate_martyr = sum_manpower($manpower_record,   'associate_candidate_martyr');
	$associate_candidate_demotion = sum_manpower($manpower_record,   'associate_candidate_demotion');
	$associate_candidate_improvement_d = $associate_improvement;
	$total_associate_candidate_decrease = $associate_candidate_improvement_d + $associate_candidate_endstd  + $associate_candidate_transfer  + $associate_candidate_cancel  + $associate_candidate_abroad_study + $associate_candidate_abroad_job + $associate_candidate_death + $associate_candidate_martyr + $associate_candidate_demotion;
	
	$associate_candidate_improvement_target = sum_manpower($manpower_record,'associate_candidate_improvement_target');
	
	?>
  
  
  
  
  
  
  
   <tr>
    <td class="tg-y698">সাথী প্রার্থী</td>
    <td class="tg-0pky"><?php echo $associate_candidate_prev;?></td>
     <td class="tg-0pky  type_2">
	<?php 
  echo $associate_candidate_prev + $associate_candidate_improvement + $associate_candidate_arrival - $total_associate_candidate_decrease;
	?>
	</td>
    <td class="tg-0pky  type_3">
	<?php 
  echo $associate_candidate_improvement + $associate_candidate_arrival;
	?>
	</td>
    <td class="tg-0pky  type_4">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_improvement = $arr['associate_candidate_improvement'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_improvement = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_improvement" data-title="Enter"><?php echo $associate_candidate_improvement;?></a> 
 
	</td>
    <td class="tg-0pky  type_5">
	 
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_arrival = $arr['associate_candidate_arrival'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_arrival = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_arrival" data-title="Enter"><?php echo $associate_candidate_arrival;?></a> 
 	
	
	
	</td>
    <td class="tg-0pky  type_6">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_improvement_target = $arr['associate_candidate_improvement_target'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_improvement_target = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_improvement_target" data-title="Enter"><?php echo $associate_candidate_improvement_target;?></a> 
 	
	
	
	 
	</td>
    <td class="tg-0pky  type_7">
	<?php   
	echo  ($associate_candidate_improvement_target>0) ? round(100*$associate_candidate_improvement/$associate_candidate_improvement_target,2) : 0;;
	?>
	
	</td>
	
	 
	
    <td class="tg-0pky  type_8"><?php  echo $total_associate_candidate_decrease; ?></td>
    <td class="tg-0pky  type_9">
	<?php 
  echo $associate_candidate_improvement_d;
	?>
	
	</td>
    <td class="tg-0pky  type_10">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_endstd = $arr['associate_candidate_endstd'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_endstd = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_endstd" data-title="Enter"><?php echo $associate_candidate_endstd;?></a> 
 	
	 
	
	</td>
    <td class="tg-0pky  type_11">
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_transfer = $arr['associate_candidate_transfer'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_transfer = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_transfer" data-title="Enter"><?php echo $associate_candidate_transfer;?></a> 
	
 </td>
    <td class="tg-0pky type_12">
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_cancel = $arr['associate_candidate_cancel'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_cancel = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_cancel" data-title="Enter"><?php echo $associate_candidate_cancel;?></a> 
	
	
	
	 
	</td>
    <td class="tg-0pky  type_13">
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_abroad_study = $arr['associate_candidate_abroad_study'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_abroad_study = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_abroad_study" data-title="Enter"><?php echo $associate_candidate_abroad_study;?></a> 
	
 </td>
    <td class="tg-0pky  type_14">
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_abroad_job = $arr['associate_candidate_abroad_job'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_abroad_job = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_abroad_job" data-title="Enter"><?php echo $associate_candidate_abroad_job;?></a> 
	
	
 
	</td>
    <td class="tg-0pky  type_15">
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_death = $arr['associate_candidate_death'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_death = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_death" data-title="Enter"><?php echo $associate_candidate_death;?></a> 
		
	
	 
	</td>
    <td class="tg-0pky  type_16">
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_martyr = $arr['associate_candidate_martyr'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_martyr = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_martyr" data-title="Enter"><?php echo $associate_candidate_martyr;?></a> 
		
	
	 
	</td>
    <td class="tg-0pky  type_17">
	<?php  echo $associate_candidate_demotion; ?>
	</td>
    <td class="tg-0pky type_18">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$associate_candidate_postpone = $arr['associate_candidate_postpone'];
 	$pk =  $arr['id'];
	}
	
	else {
		$associate_candidate_postpone = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="associate_candidate_postpone" data-title="Enter"><?php echo $associate_candidate_postpone;?></a> 
	
	 
	
	</td>
  </tr>
  
  
  <?php  $worker_prev =  $prev_manpower[0]['worker'];
	
	  
	$worker_improvement = sum_manpower($manpower_record,'worker_improvement');
	$worker_arrival = sum_manpower($manpower_record,   'worker_arrival');
	
	$worker_endstd = sum_manpower($manpower_record,   'worker_endstd');
	$worker_transfer = sum_manpower($manpower_record,   'worker_transfer');
	$worker_cancel = sum_manpower($manpower_record,   'worker_cancel');
	//$worker_study_abroad = sum_manpower($manpower_record,  'worker_abroad_study');
	//$worker_job_abroad = sum_manpower($manpower_record,   'worker_abroad_job');
	//$worker_death = sum_manpower($manpower_record,  'worker_death');
	//$worker_martyr = sum_manpower($manpower_record,   'worker_martyr');
	
	
	$worker_study_abroad = (!$workerlog) ? 0 : calculate($workerlog, 11,2, 'worker_number');
	$worker_job_abroad = (!$workerlog) ? 0 : calculate($workerlog, 14,2, 'worker_number');
	$worker_death = (!$workerlog) ? 0 : calculate($workerlog, 9,2, 'worker_number');
	$worker_martyr = (!$workerlog) ? 0 : calculate($workerlog, 10,2, 'worker_number');
	
	$worker_demotion = sum_manpower($manpower_record,   'worker_demotion');
	$worker_improvement_d = $associate_improvement;
	$total_worker_decrease = $worker_improvement_d + $worker_endstd  + $worker_transfer  + $worker_cancel  + $worker_study_abroad + $worker_job_abroad + $worker_death + $worker_martyr + $worker_demotion;
	
	$worker_improvement_target = $worker_prev  + $member_prev  + $associate_prev ;
	
	?>
  
  
  
  
  
  
  
   <tr>
    <td class="tg-y698">কর্মী</td>
    <td class="tg-0pky type_1"><?php echo $worker_prev;?></td>
     <td class="tg-0pky  type_2">
	<?php 
  echo $worker_prev + $worker_improvement + $worker_arrival - $total_worker_decrease;
	?>
	</td>
    <td class="tg-0pky  type_3">
	<?php 
  echo $worker_improvement + $worker_arrival;
	?>
	</td>
    <td class="tg-0pky  type_4">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$worker_improvement = $arr['worker_improvement'];
 	$pk =  $arr['id'];
	}
	
	else {
		$worker_improvement = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="worker_improvement" data-title="Enter"><?php echo $worker_improvement;?></a> 
	
		
	
	
	 
	</td>
    <td class="tg-0pky  type_5">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$worker_arrival = $arr['worker_arrival'];
 	$pk =  $arr['id'];
	}
	
	else {
		$worker_arrival = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="worker_arrival" data-title="Enter"><?php echo $worker_arrival;?></a> 
	
	
 
	</td>
    <td class="tg-0pky  type_6">
	
 
	<?php   
	echo $worker_improvement_target;
	?>
	</td>
    <td class="tg-0pky  type_7">
	<?php   
	echo  ($worker_prev>0) ? round(100*$worker_improvement/$worker_prev,2) : 0;;
	?>
	
	</td>
	
	 
	
    <td class="tg-0pky  type_8"><?php  echo $total_worker_decrease; ?></td>
    <td class="tg-0pky  type_9">
	<?php 
  echo $worker_improvement_d;
	?>
	
	</td>
    <td class="tg-0pky  type_10">

<?php 
	
	if(isset($manpower_record[0])) {
	$worker_endstd = $arr['worker_endstd'];
 	$pk =  $arr['id'];
	}
	
	else {
		$worker_endstd = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="worker_endstd" data-title="Enter"><?php echo $worker_endstd;?></a> 
	
	
 </td>
    <td class="tg-0pky  type_11">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$worker_transfer = $arr['worker_transfer'];
 	$pk =  $arr['id'];
	}
	
	else {
		$worker_transfer = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="worker_transfer" data-title="Enter"><?php echo $worker_transfer;?></a> 
	
	
	 
	</td>
    <td class="tg-0pky  type_12">
	
<?php 
	
	if(isset($manpower_record[0])) {
	$worker_cancel = $arr['worker_cancel'];
 	$pk =  $arr['id'];
	}
	
	else {
		$worker_cancel = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="worker_cancel" data-title="Enter"><?php echo $worker_cancel;?></a> 
	
	 
	</td>
    <td class="tg-0pky  type_13"> 
	<?php echo $worker_study_abroad;?>
	 
	</td>
    <td class="tg-0pky  type_14">
 
	
	<?php echo $worker_job_abroad;?>
	 
	
	</td>
    <td class="tg-0pky  type_15">
	
<?php echo $worker_death;?>
	 
	</td>
    <td class="tg-0pky  type_16">
	<?php  echo $worker_martyr; ?>
	</td>
    <td class="tg-0pky  type_17">
<?php 
	
	if(isset($manpower_record[0])) {
	$worker_demotion = $arr['worker_demotion'];
 	$pk =  $arr['id'];
	}
	
	else {
		$worker_demotion = 0;
		$pk =  "";
	}
  ?>	
 
<a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manpower_record" data-pk="<?php echo $pk;?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="worker_demotion" data-title="Enter"><?php echo $worker_demotion;?></a> 
	
	
	 
	</td>
    <td class="tg-0pky  type_18">
 
	
	</td>
  </tr>
  
  
  
  
  <tr>
    <td class="tg-y698">মোট </td>
    <td class="tg-0pky total_1"></td>
    <td class="tg-0pky total_2"></td>
    <td class="tg-0pky total_3"></td>
    <td class="tg-0pky total_4"></td>
    <td class="tg-0pky total_5"></td>
    <td class="tg-0pky total_6"></td>
    <td class="tg-0pky "></td>
    <td class="tg-0pky total_8"></td>
    <td class="tg-0pky total_9"></td>
    <td class="tg-0pky total_10"></td>
    <td class="tg-0pky total_11"></td>
    <td class="tg-0pky total_12"></td>
    <td class="tg-0pky total_13"></td>
    <td class="tg-0pky total_14"></td>
    <td class="tg-0lax total_15"></td>
    <td class="tg-0lax total_16"></td>
    <td class="tg-0lax total_17"></td>
    <td class="tg-0lax total_18"></td>
  </tr> 
   
</table></div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
