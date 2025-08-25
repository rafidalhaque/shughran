<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মানবাধিকার বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/manobadhikar-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/manobadhikar-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


<script>
$(document).ready(function(){
    $("#export_all_table").on("click",function(){
        for(let i=1; i<=12;i++)
        {
            $("#table_"+i).click();
        }
    });
});
</script>

                <div class="table-responsive">


				<style type="text/css">
                    #export_all_table{
                        cursor: pointer;
                    }
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-izx2{border-color:black;background-color:#efefef;}
.tg .tg-pwj7{background-color:#efefef;border-color:black;}
.tg .tg-0pky{border-color:black;vertical-align:top}
.tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
.tg .tg-0lax{border-color:black;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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
                    <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Human_rights_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_central_s=$human_rights_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$human_rights_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$human_rights_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$human_rights_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$human_rights_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$human_rights_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$human_rights_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$human_rights_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                              
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan='2'><b>শাখার তথ্য</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Human_rights_শাখার তথ্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                
                                <?php $row_number=$human_rights_branch_info_row; ?>
                            </tr>
                            
                            <tr>
                                <td class="tg-pwj7" rowspan='2' >শাখায় মানবাধিকার বিষয়ক সম্পাদক আছে কিনা?</td>
                                <td class="tg-pwj7" >হ্যাঁ</td>
                                <td class="tg-0pky" > <?php echo $human_rights_org_bool = (isset($human_rights_branch_info['human_rights_org_bool']))?$human_rights_branch_info['human_rights_org_bool']:0 ?> </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" >না</td>
                                <td class="tg-0pky" > <?php  echo $human_rights_org_bool = $row_number-$human_rights_branch_info['human_rights_org_bool']  ?> </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan='3' >শাখার কোনো জনশক্তি স্থানীয়, জাতীয় বা আন্তর্জাতিক মানবাধিকার সংগঠনের সাথে সম্পৃক্ত আছে কিনা?</td>
                                <td class="tg-pwj7" >হ্যাঁ</td>
                                <td class="tg-0pky" > <?php echo $manpower_active_bool =  (isset($human_rights_branch_info['manpower_active_bool']))?$human_rights_branch_info['manpower_active_bool']:0 ?> </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >না</td>
                                <td class="tg-0pky" >  <?php echo $manpower_active_bool = $row_number-$human_rights_branch_info['manpower_active_bool'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >কতজন</td>
                                <td class="tg-0pky" >  <?php echo $manpower_active_number = $human_rights_branch_info['manpower_active_number'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan='2' >শাখায় মানবাধিকার বিষয়ক কমিটি আছে কিনা?</td>
                                <td class="tg-pwj7" >হ্যাঁ</td>
                                <td class="tg-0pky" >  <?php echo $human_rights_committee = (isset($human_rights_branch_info['human_rights_committee']))?$human_rights_branch_info['human_rights_committee']:0 ?> </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" >না</td>
                                <td class="tg-0pky" > <?php echo $human_rights_committee =$row_number - $human_rights_branch_info['human_rights_committee'] ?> </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='4'><b>শাখার কমিটি</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Human_rights_শাখার কমিটি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >কমিটির সদস্য সংখ্যা </td>
                                <td class="tg-pwj7" >সদস্য </td>
                                <td class="tg-pwj7" >সাথী</td>
                                <td class="tg-pwj7" >কর্মী</td>
                                <td class="tg-pwj7" >সমর্থক</td>
                                <td class="tg-pwj7" >শুভাকাঙ্খী</td>
                            </tr>
                            <tr>
                                <td class="tg-0pky type_1">
                                    <?php echo $committee_member = $human_rights_branch_committee['committee_member'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $member = $human_rights_branch_committee['member'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $associate = $human_rights_branch_committee['associate'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $worker = $human_rights_branch_committee['worker'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $supporter = $human_rights_branch_committee['supporter'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shuva = $human_rights_branch_committee['shuva'] ?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan='2'><b>প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Human_rights_প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক কমিটির বৈঠক</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $committee_meeting_num = $human_rights_program['committee_meeting_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $committee_meeting_pre = $human_rights_program['committee_meeting_pre'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক প্রতিনিধি সভা</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $representative_num = $human_rights_program['representative_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $representative_pre = $human_rights_program['representative_pre'] ?>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক কর্মশালা</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $workshop_num = $human_rights_program['workshop_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $workshop_pre = $human_rights_program['workshop_pre'] ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক সংগঠনের সাথে মতাবিনিময়</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $shong_mot_num = $human_rights_program['shong_mot_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shong_mot_pre = $human_rights_program['shong_mot_pre'] ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার কর্মীদের সাথে মতবিনিময়</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $kormi_mot_num = $human_rights_program['kormi_mot_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kormi_mot_pre = $human_rights_program['kormi_mot_pre'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক সেমিনার/ আলোচনা সভা</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $seminer_num = $human_rights_program['seminer_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $seminer_pre = $human_rights_program['seminer_pre'] ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার সম্পর্কিত দিবস পালন</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $hr_days_num = $human_rights_program['hr_days_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hr_days_pre = $human_rights_program['hr_days_pre'] ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan='4'><b>মানবাধিকার লংঘন পরিসংখ্যান</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Human_rights_মানবাধিকার লংঘন পরিসংখ্যান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >বিষয়</td>
                                <td class="tg-pwj7" >   ঘটনার সংখ্যা </td>
                                <td class="tg-pwj7" >নিহত</td>
                                <td class="tg-pwj7" >আহত</td>
                                <td class="tg-pwj7" >আটক</td>     
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">বিচার বহির্ভূত হত্যা</td>

                                <td class="tg-0pky type_1">
                                    <?php echo $bichar_bohi_num = $human_rights_violation['bichar_bohi_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $bichar_bohi_murder = $human_rights_violation['bichar_bohi_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bichar_bohi_wound = $human_rights_violation['bichar_bohi_wound'] ?>
                                </td>
                              
                                <td class="tg-0pky  type_3">
                                <?php echo $bichar_bohi_atok = $human_rights_violation['bichar_bohi_atok'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">রাজনৈতিক সহিংসতা</td>

                                <td class="tg-0pky type_1">
                                    <?php echo $political_num = $human_rights_violation['political_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $political_murder = $human_rights_violation['political_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $political_wound = $human_rights_violation['political_wound'] ?>
                                </td>
                          
                                <td class="tg-0pky  type_3">
                                <?php echo $political_atok = $human_rights_violation['political_atok'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">ধর্ষণ </td>

                                <td class="tg-0pky type_1">
                                    <?php echo $rape_num = $human_rights_violation['rape_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $rape_murder = $human_rights_violation['rape_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $rape_wound = $human_rights_violation['rape_wound'] ?>
                                </td>
                            
                                <td class="tg-0pky  type_3">
                                <?php echo $rape_atok = $human_rights_violation['rape_atok'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">শিশু/নারী নির্যাতন</td>

                                <td class="tg-0pky type_1">
                                    <?php echo $kid_num = $human_rights_violation['kid_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $kid_murder = $human_rights_violation['kid_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kid_wound = $human_rights_violation['kid_wound'] ?>
                                </td>
                         
                                <td class="tg-0pky  type_3">
                                <?php echo $kid_atok = $human_rights_violation['kid_atok'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">গুম</td>

                                <td class="tg-0pky type_1">
                                    <?php echo $gum_num = $human_rights_violation['gum_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $gum_murder = $human_rights_violation['gum_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $gum_wound = $human_rights_violation['gum_wound'] ?>
                                </td>
                        
                                <td class="tg-0pky  type_3">
                                <?php echo $gum_atok = $human_rights_violation['gum_atok'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">সাংবাদিক নির্যাতন</td>

                                   <td class="tg-0pky type_1">
                                    <?php echo $sangbadik_num = $human_rights_violation['sangbadik_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $sangbadik_murder = $human_rights_violation['sangbadik_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sangbadik_wound = $human_rights_violation['sangbadik_wound'] ?>
                                </td>
                            
                                <td class="tg-0pky  type_3">
                                <?php echo $sangbadik_atok = $human_rights_violation['sangbadik_atok'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">সীমান্তে হত্যা</td>

                                   <td class="tg-0pky type_1">
                                    <?php echo $border_num = $human_rights_violation['border_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $border_murder = $human_rights_violation['border_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $border_wound = $human_rights_violation['border_wound'] ?>
                                </td>
                        
                                <td class="tg-0pky  type_3">
                                <?php echo $political_atok = $human_rights_violation['political_atok'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">সংখ্যালঘু নির্যাতন</td>

                                  <td class="tg-0pky type_1">
                                    <?php echo $minority_num = $human_rights_violation['minority_num'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                <?php echo $minority_murder = $human_rights_violation['minority_murder'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $minority_wound = $human_rights_violation['minority_wound'] ?>
                                </td>
             
                                <td class="tg-0pky  type_3">
                                <?php echo $minority_atok = $human_rights_violation['minority_atok'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='6'><b>*শুধুমাত্র নিজ শাখার অধীনস্ত এলাকার মানবাধিকার লংঘনের পরিসংখ্যান প্রদান করুন।</b></td>
                            </tr>
                            <tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan='2'><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Human_rights_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার সম্পর্কিত ব্যক্তিবর্গ	</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >বার</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার কর্মী	</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['hr_worker_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['hr_worker_count'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার সংগঠন	</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['hr_org_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['hr_org_count'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >সুশীল সমাজের প্রতিনিধি (শিক্ষক, বুদ্ধিজীবী)	</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['shushil_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['shushil_count'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আইনজীবী</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['lawyer_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sho_ak = $human_rights_contact['lawyer_count'] ?>
                                </td>
                                
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan='2'><b>বিবিধ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Human_rights_বিবিধ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >বার</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার বিষয়ে আইনী সহায়তা প্রদান করা হয়েছে কতজনকে?	</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $law_help_num = $human_rights_miscellaneous['law_help_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $law_help_count = $human_rights_miscellaneous['law_help_count'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার লংঘনের ঘটনার তদন্ত করা হয়েছে কতটি?</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $hr_violation_num = $human_rights_miscellaneous['hr_violation_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $hr_violation_count = $human_rights_miscellaneous['hr_violation_count'] ?>
                                </td>

                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable7">
                            <tr>
                                <td class="tg-pwj7" colspan='6'><b>আউটপুট রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_7' onclick="doit('xlsx','testTable7','<?php echo 'Human_rights_আউটপুট রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>	
                                <td class="tg-pwj7" rowspan='2'>জনবল সরবরাহের সেক্টর</td>
                                <td class="tg-pwj7" colspan='2'>সেক্টরভিত্তিক জনশক্তি বাছাই সংখ্যা </td>
                                <td class="tg-pwj7" colspan='2'>মোটিভেশনাল প্রোগ্রাম</td>
                                <td class="tg-pwj7" colspan='2'>প্রাতিষ্ঠানিক প্রশিক্ষণ গ্রহণ</td>
                                <td class="tg-pwj7" colspan='2'>প্রতিযোগিতামূলক পরীক্ষার ফলাফল</td>
                            </tr>
                            <tr>				
                                <td class="tg-pwj7" >টার্গেট </td>
                                <td class="tg-pwj7" > বাছাই</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি</td>
                                <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-pwj7" >সাধারণ</td>
                                <td class="tg-pwj7" >অংশগ্রহণ</td>
                                <td class="tg-pwj7" >উত্তীর্ণ সংখ্যা</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার কর্মকর্তা</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_target = $human_rights_output['officer_sec_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_number = $human_rights_output['officer_sec_bachai'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_pre = $human_rights_output['officer_mot_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_org = $human_rights_output['officer_mot_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_general = $human_rights_output['officer_pra_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_attend = $human_rights_output['officer_pra_shadha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_pass = $human_rights_output['officer_xm_attend'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_pass = $human_rights_output['officer_xm_pass'] ?>
                                </td>
                            </tr>
                            <tr>				
                                <td class="tg-pwj7" >ইন্টার্নশিপ</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $officer_target = $human_rights_output['intern_sec_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_number = $human_rights_output['intern_sec_bachai'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_pre = $human_rights_output['intern_mot_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_org = $human_rights_output['intern_mot_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_general = $human_rights_output['intern_pra_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_attend = $human_rights_output['intern_pra_shadha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_pass = $human_rights_output['intern_xm_attend'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $intern_pass = $human_rights_output['intern_xm_pass'] ?>
                                </td>
                            </tr>
                            <tr>				
                                <td class="tg-pwj7" >ভলান্টিয়ার/স্বেচ্ছাসেবক</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_target = $human_rights_output['volunteer_sec_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_number = $human_rights_output['volunteer_sec_bachai'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_pre = $human_rights_output['volunteer_mot_num'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_org = $human_rights_output['volunteer_mot_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_general = $human_rights_output['volunteer_pra_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_attend = $human_rights_output['volunteer_pra_shadha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_pass = $human_rights_output['volunteer_xm_attend'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $volunteer_pass = $human_rights_output['volunteer_xm_pass'] ?>
                                </td>
                            </tr>
                        </table>

                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
