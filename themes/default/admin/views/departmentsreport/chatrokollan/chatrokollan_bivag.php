<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'ছাত্রকল্যাণ বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/chatrokollan-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/chatrokollan-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/chatrokollan-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="8"><b>ছাত্রকল্যাণ বিভাগীয় পরিসংখ্যান</b></td>
                                <td class="tg-pwj7" colspan="4">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Walfare_ছাত্রকল্যাণ বিভাগীয় পরিসংখ্যান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr> 				
                            <tr>
                                <td class="tg-pwj7" rowspan="2">মান</td>
                                <td class="tg-pwj7" colspan="2">শহীদ </td>
                                <td class="tg-pwj7" colspan="4">পঙ্গুত্ববরণকারী </td>
                                <td class="tg-pwj7" colspan="5">আহত </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" >এখন পর্যন্ত </td>
                                <td class="tg-pwj7" >এ বছর নতুন করে</td>
                                <td class="tg-pwj7" >এখন পর্যন্ত   </td>
                                <td class="tg-pwj7" >এ বছর নতুন করে </td>
                                <td class="tg-pwj7" >চিকিৎসাধীন</td>
                                <td class="tg-pwj7" >বর্তমান সংখ্যা   </td>
                                <td class="tg-pwj7" >এখন পর্যন্ত   </td>
                                <td class="tg-pwj7" >এ বছর নতুন করে </td>
                                <td class="tg-pwj7" >চিকিৎসাধীন</td>
                                <td class="tg-pwj7" >সুস্থতা অর্জন   </td>
                                <td class="tg-pwj7" >বর্তমান সংখ্যা   </td>
                               
                            </tr>
                            <?php
                               $s_total=0;
                               $s_new_this_year=0;
                               $p_total=0;
                               $p_new_this_year=0;
                               $p_treatment=0;
                               $p_bortoman=0;
                               $a_total=0;
                               $a_new_this_year=0;
                               $a_treatment=0;
                               $a_shushtho=0;
                               $a_bortoman=0;

                            ?>
                            <tr>
                                <td class="tg-y698">সদস্য </td>
                                <td class="tg-0pky">
                                    <?php echo $member_s_total = $stu_wellfare_shohid['member_s_total']; $s_total+=$member_s_total; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $member_s_new_this_year = $stu_wellfare_shohid['member_s_new_this_year'];$s_new_this_year+=$member_s_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $member_p_total = $stu_wellfare_shohid['member_p_total']; $p_total+=$member_p_total; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                <?php echo $member_p_new_this_year = $stu_wellfare_shohid['member_p_new_this_year'];$p_new_this_year+=$member_p_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $member_p_treatment = $stu_wellfare_shohid['member_p_treatment'];$p_treatment+=$member_p_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $member_p_bortoman = $stu_wellfare_shohid['member_p_bortoman'];$p_bortoman+=$member_p_bortoman; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                  <?php echo $member_a_total = $stu_wellfare_shohid['member_a_total'];$a_total+=$member_a_total; ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $member_a_new_this_year = $stu_wellfare_shohid['member_a_new_this_year'];$a_new_this_year+=$member_a_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $member_a_treatment = $stu_wellfare_shohid['member_a_treatment'];$a_treatment+=$member_a_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $member_a_shushtho = $stu_wellfare_shohid['member_a_shushtho'];$a_shushtho+=$member_a_shushtho; ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $member_a_bortoman = $stu_wellfare_shohid['member_a_bortoman'];$a_bortoman+=$member_a_bortoman; ?>
                                </td>
                               

                            </tr>
                            <tr>
                                <td class="tg-y698">  সাথী </td>
                                <td class="tg-0pky">
                                    <?php echo $asscociate_s_total = $stu_wellfare_shohid['asscociate_s_total']; $s_total+=$asscociate_s_total; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $asscociate_s_new_this_year = $stu_wellfare_shohid['asscociate_s_new_this_year'];$s_new_this_year+=$asscociate_s_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $asscociate_p_total = $stu_wellfare_shohid['asscociate_p_total']; $p_total+=$asscociate_p_total; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                <?php echo $asscociate_p_new_this_year = $stu_wellfare_shohid['asscociate_p_new_this_year'];$p_new_this_year+=$asscociate_p_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $asscociate_p_treatment = $stu_wellfare_shohid['asscociate_p_treatment'];$p_treatment+=$asscociate_p_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $asscociate_p_bortoman = $stu_wellfare_shohid['asscociate_p_bortoman'];$p_bortoman+=$asscociate_p_bortoman; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                  <?php echo $asscociate_a_total = $stu_wellfare_shohid['asscociate_a_total'];$a_total+=$asscociate_a_total; ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $asscociate_a_new_this_year = $stu_wellfare_shohid['asscociate_a_new_this_year'];$a_new_this_year+=$asscociate_a_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $asscociate_a_treatment = $stu_wellfare_shohid['asscociate_a_treatment'];$a_treatment+=$asscociate_a_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $asscociate_a_shushtho = $stu_wellfare_shohid['asscociate_a_shushtho'];$a_shushtho+=$asscociate_a_shushtho; ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $asscociate_a_bortoman = $stu_wellfare_shohid['asscociate_a_bortoman'];$a_bortoman+=$asscociate_a_bortoman; ?>
                                </td>
                               

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_s_total = $stu_wellfare_shohid['worker_s_total']; $s_total+=$worker_s_total; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $worker_s_new_this_year = $stu_wellfare_shohid['worker_s_new_this_year'];$s_new_this_year+=$worker_s_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $worker_p_total = $stu_wellfare_shohid['worker_p_total']; $p_total+=$worker_p_total; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                <?php echo $worker_p_new_this_year = $stu_wellfare_shohid['worker_p_new_this_year'];$p_new_this_year+=$worker_p_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $worker_p_treatment = $stu_wellfare_shohid['worker_p_treatment'];$p_treatment+=$worker_p_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $worker_p_bortoman = $stu_wellfare_shohid['worker_p_bortoman'];$p_bortoman+=$worker_p_bortoman; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                  <?php echo $worker_a_total = $stu_wellfare_shohid['worker_a_total'];$a_total+=$worker_a_total; ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $worker_a_new_this_year = $stu_wellfare_shohid['worker_a_new_this_year'];$a_new_this_year+=$worker_a_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $worker_a_treatment = $stu_wellfare_shohid['worker_a_treatment'];$a_treatment+=$worker_a_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $worker_a_shushtho = $stu_wellfare_shohid['worker_a_shushtho'];$a_shushtho+=$worker_a_shushtho; ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $worker_a_bortoman = $stu_wellfare_shohid['worker_a_bortoman'];$a_bortoman+=$worker_a_bortoman; ?>
                                </td>
                               

                            </tr>

                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_s_total = $stu_wellfare_shohid['supporter_s_total']; $s_total+=$supporter_s_total; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $supporter_s_new_this_year = $stu_wellfare_shohid['supporter_s_new_this_year'];$s_new_this_year+=$supporter_s_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $supporter_p_total = $stu_wellfare_shohid['supporter_p_total']; $p_total+=$supporter_p_total; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                <?php echo $supporter_p_new_this_year = $stu_wellfare_shohid['supporter_p_new_this_year'];$p_new_this_year+=$supporter_p_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $supporter_p_treatment = $stu_wellfare_shohid['supporter_p_treatment'];$p_treatment+=$supporter_p_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $supporter_p_bortoman = $stu_wellfare_shohid['supporter_p_bortoman'];$p_bortoman+=$supporter_p_bortoman; ?>
                                </td>
                                
                                <td class="tg-0pky">
                                  <?php echo $supporter_a_total = $stu_wellfare_shohid['supporter_a_total'];$a_total+=$supporter_a_total; ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $supporter_a_new_this_year = $stu_wellfare_shohid['supporter_a_new_this_year'];$a_new_this_year+=$supporter_a_new_this_year; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $supporter_a_treatment = $stu_wellfare_shohid['supporter_a_treatment'];$a_treatment+=$supporter_a_treatment; ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $supporter_a_shushtho = $stu_wellfare_shohid['supporter_a_shushtho'];$a_shushtho+=$supporter_a_shushtho; ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $supporter_a_bortoman = $stu_wellfare_shohid['supporter_a_bortoman'];$a_bortoman+=$supporter_a_bortoman; ?>
                                </td>
                               
                            </tr>

                         

                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                <?php echo $s_total;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $s_new_this_year;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $p_total;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $p_new_this_year;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $p_treatment;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $p_bortoman;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $a_total;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $a_new_this_year;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $a_treatment;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $a_shushtho;?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $a_bortoman;?>
                                </td>
                                

                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="10"><b>সহযোগিতা</b></td>
                                <td class="tg-pwj7" colspan="6">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Walfare_সহযোগিতা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>				
                            <tr>
                                <td class="tg-pwj7" rowspan="3">ধরন</td>
                                <td class="tg-pwj7" rowspan="3">মেয়াদ</td>
                                <td class="tg-pwj7" colspan="6">আর্থিক সহযোগিতা</td>
                                <td class="tg-pwj7" colspan="6">চিকিৎসা সহযোগিতা</td>
                                <td class="tg-pwj7" colspan="2" rowspan="2">যোগাযোগ </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="3">পরিমাণ</td>
                                <td class="tg-pwj7" colspan="3">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="3">পরিমাণ</td>
                            </tr>
                            		
		

                            <tr>
                                <td class="tg-pwj7" >শাখা থেকে </td>
                                <td class="tg-pwj7" >কেন্দ্র থেকে</td>
                                <td class="tg-pwj7" >মোট </td>
                                <td class="tg-pwj7" >শাখা থেকে </td>
                                <td class="tg-pwj7" >কেন্দ্র থেকে</td>
                                <td class="tg-pwj7" >মোট </td>
                                <td class="tg-pwj7" >শাখা থেকে </td>
                                <td class="tg-pwj7" >কেন্দ্র থেকে</td>
                                <td class="tg-pwj7" >মোট </td>
                                <td class="tg-pwj7" >শাখা থেকে </td>
                                <td class="tg-pwj7" >কেন্দ্র থেকে</td>
                                <td class="tg-pwj7" >মোট </td>
                                <td class="tg-pwj7" >সংখ্যা</td>
                                <td class="tg-pwj7" >কতবার  </td>
                            </tr>
                            <?php
                                $arthik_s_shaka=0;
                                $arthik_s_kendro=0;
                                $arthik_p_shaka=0;
                                $arthik_p_kendro=0;
                                $treat_s_shaka=0;
                                $treat_s_kendro=0;
                                $treat_p_shaka=0;
                                $treat_p_kendro=0;
                                $cotact_num=0;
                                $cotact_bar=0;

                            ?>
                            <tr>
                                <td class="tg-0pky tg-pwj7" rowspan='2'> শহীদ পরিবার</td>
                                <td class="tg-0pky tg-pwj7"> নিয়মিত</td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_arthik_s_shaka = $stu_wellfare_shohojogita['s_ni_arthik_s_shaka']; $arthik_s_shaka+=$s_ni_arthik_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_arthik_s_kendro = $stu_wellfare_shohojogita['s_ni_arthik_s_kendro']; $arthik_s_kendro+=$s_ni_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_arthik_s_total = $s_ni_arthik_s_shaka+$s_ni_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_arthik_p_shaka = $stu_wellfare_shohojogita['s_ni_arthik_p_shaka']; $arthik_p_shaka+=$s_ni_arthik_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_arthik_p_kendro = $stu_wellfare_shohojogita['s_ni_arthik_p_kendro']; $arthik_p_kendro+=$s_ni_arthik_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $s_ni_arthik_p_total = $s_ni_arthik_p_shaka+$s_ni_arthik_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_treat_s_shaka = $stu_wellfare_shohojogita['s_ni_treat_s_shaka']; $treat_s_shaka+=$s_ni_treat_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_treat_s_kendro = $stu_wellfare_shohojogita['s_ni_treat_s_kendro']; $treat_s_kendro+=$s_ni_treat_s_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $s_ni_treat_s_total = $s_ni_treat_s_shaka+$s_ni_treat_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_treat_p_shaka = $stu_wellfare_shohojogita['s_ni_treat_p_shaka']; $treat_p_shaka+=$s_ni_treat_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_treat_p_kendro = $stu_wellfare_shohojogita['s_ni_treat_p_kendro']; $treat_p_kendro+=$s_ni_treat_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $s_ni_treat_p_total = $s_ni_treat_p_shaka+$s_ni_treat_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_cotact_num = $stu_wellfare_shohojogita['s_ni_cotact_num']; $cotact_num+=$s_ni_cotact_num; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ni_cotact_bar = $stu_wellfare_shohojogita['s_ni_cotact_bar']; $cotact_bar+=$s_ni_cotact_bar; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7"> এককালীন</td>
                                <td class="tg-0pky">
                                    <?php echo $s_ekkalin_arthik_s_shaka = $stu_wellfare_shohojogita['s_ekkalin_arthik_s_shaka']; $arthik_s_shaka+=$s_ekkalin_arthik_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_arthik_s_kendro = $stu_wellfare_shohojogita['s_ekkalin_arthik_s_kendro']; $arthik_s_kendro+=$s_ekkalin_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_arthik_s_total = $s_ekkalin_arthik_s_shaka+$s_ekkalin_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_arthik_p_shaka = $stu_wellfare_shohojogita['s_ekkalin_arthik_p_shaka']; $arthik_p_shaka+=$s_ekkalin_arthik_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_arthik_p_kendro = $stu_wellfare_shohojogita['s_ekkalin_arthik_p_kendro']; $arthik_p_kendro+=$s_ekkalin_arthik_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $s_ekkalin_arthik_p_total = $s_ekkalin_arthik_p_shaka+$s_ekkalin_arthik_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_treat_s_shaka = $stu_wellfare_shohojogita['s_ekkalin_treat_s_shaka']; $treat_s_shaka+=$s_ekkalin_treat_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_treat_s_kendro = $stu_wellfare_shohojogita['s_ekkalin_treat_s_kendro']; $treat_s_kendro+=$s_ekkalin_treat_s_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $s_ekkalin_treat_s_total = $s_ekkalin_treat_s_shaka+$s_ekkalin_treat_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_treat_p_shaka = $stu_wellfare_shohojogita['s_ekkalin_treat_p_shaka']; $treat_p_shaka+=$s_ekkalin_treat_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_treat_p_kendro = $stu_wellfare_shohojogita['s_ekkalin_treat_p_kendro']; $treat_p_kendro+=$s_ekkalin_treat_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $s_ekkalin_treat_p_total = $s_ekkalin_treat_p_shaka+$s_ekkalin_treat_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_cotact_num = $stu_wellfare_shohojogita['s_ekkalin_cotact_num']; $cotact_num+=$s_ekkalin_cotact_num; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $s_ekkalin_cotact_bar = $stu_wellfare_shohojogita['s_ekkalin_cotact_bar']; $cotact_bar+=$s_ekkalin_cotact_bar; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7" rowspan='2'> আহত ও পঙ্গুত্ববরণকারী</td>
                                <td class="tg-0pky tg-pwj7"> নিয়মিত</td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ni_arthik_s_shaka = $stu_wellfare_shohojogita['ahoto_ni_arthik_s_shaka']; $arthik_s_shaka+=$ahoto_ni_arthik_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_arthik_s_kendro = $stu_wellfare_shohojogita['ahoto_ni_arthik_s_kendro']; $arthik_s_kendro+=$ahoto_ni_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_arthik_s_total = $ahoto_ni_arthik_s_shaka+$ahoto_ni_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_arthik_p_shaka = $stu_wellfare_shohojogita['ahoto_ni_arthik_p_shaka']; $arthik_p_shaka+=$ahoto_ni_arthik_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_arthik_p_kendro = $stu_wellfare_shohojogita['ahoto_ni_arthik_p_kendro']; $arthik_p_kendro+=$ahoto_ni_arthik_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ni_arthik_p_total = $ahoto_ni_arthik_p_shaka+$ahoto_ni_arthik_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_treat_s_shaka = $stu_wellfare_shohojogita['ahoto_ni_treat_s_shaka']; $treat_s_shaka+=$ahoto_ni_treat_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_treat_s_kendro = $stu_wellfare_shohojogita['ahoto_ni_treat_s_kendro']; $treat_s_kendro+=$ahoto_ni_treat_s_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ni_treat_s_total = $ahoto_ni_treat_s_shaka+$ahoto_ni_treat_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_treat_p_shaka = $stu_wellfare_shohojogita['ahoto_ni_treat_p_shaka']; $treat_p_shaka+=$ahoto_ni_treat_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_treat_p_kendro = $stu_wellfare_shohojogita['ahoto_ni_treat_p_kendro']; $treat_p_kendro+=$ahoto_ni_treat_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ni_treat_p_total = $ahoto_ni_treat_p_shaka+$ahoto_ni_treat_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_cotact_num = $stu_wellfare_shohojogita['ahoto_ni_cotact_num']; $cotact_num+=$ahoto_ni_cotact_num; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ni_cotact_bar = $stu_wellfare_shohojogita['ahoto_ni_cotact_bar']; $cotact_bar+=$ahoto_ni_cotact_bar; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7"> এককালীন</td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_arthik_s_shaka = $stu_wellfare_shohojogita['ahoto_ekkalin_arthik_s_shaka']; $arthik_s_shaka+=$ahoto_ekkalin_arthik_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_arthik_s_kendro = $stu_wellfare_shohojogita['ahoto_ekkalin_arthik_s_kendro']; $arthik_s_kendro+=$ahoto_ekkalin_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_arthik_s_total = $ahoto_ekkalin_arthik_s_shaka+$ahoto_ekkalin_arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_arthik_p_shaka = $stu_wellfare_shohojogita['ahoto_ekkalin_arthik_p_shaka']; $arthik_p_shaka+=$ahoto_ekkalin_arthik_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_arthik_p_kendro = $stu_wellfare_shohojogita['ahoto_ekkalin_arthik_p_kendro']; $arthik_p_kendro+=$ahoto_ekkalin_arthik_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_arthik_p_total = $ahoto_ekkalin_arthik_p_shaka+$ahoto_ekkalin_arthik_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_treat_s_shaka = $stu_wellfare_shohojogita['ahoto_ekkalin_treat_s_shaka']; $treat_s_shaka+=$ahoto_ekkalin_treat_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_treat_s_kendro = $stu_wellfare_shohojogita['ahoto_ekkalin_treat_s_kendro']; $treat_s_kendro+=$ahoto_ekkalin_treat_s_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_treat_s_total = $ahoto_ekkalin_treat_s_shaka+$ahoto_ekkalin_treat_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_treat_p_shaka = $stu_wellfare_shohojogita['ahoto_ekkalin_treat_p_shaka']; $treat_p_shaka+=$ahoto_ekkalin_treat_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_treat_p_kendro = $stu_wellfare_shohojogita['ahoto_ekkalin_treat_p_kendro']; $treat_p_kendro+=$ahoto_ekkalin_treat_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_treat_p_total = $ahoto_ekkalin_treat_p_shaka+$ahoto_ekkalin_treat_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_cotact_num = $stu_wellfare_shohojogita['ahoto_ekkalin_cotact_num']; $cotact_num+=$ahoto_ekkalin_cotact_num; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $ahoto_ekkalin_cotact_bar = $stu_wellfare_shohojogita['ahoto_ekkalin_cotact_bar']; $cotact_bar+=$ahoto_ekkalin_cotact_bar; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7" colspan='2'> সর্বমোট</td>
                                <td class="tg-0pky">
                                    <?php echo $arthik_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $arthik_s_total = $arthik_s_shaka+$arthik_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo  $arthik_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $arthik_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $arthik_p_total = $arthik_p_shaka+$arthik_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $treat_s_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo $treat_s_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $treat_s_total = $treat_s_shaka+$treat_s_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo  $treat_p_shaka; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo  $treat_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $treat_p_total = $treat_p_shaka+$treat_p_kendro; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo  $cotact_num; ?>
                                </td>
                                  <td class="tg-0pky">
                                    <?php echo  $cotact_bar; ?>
                                </td>

                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>শিক্ষা সহযোগিতা</b></td>
                                <td class="tg-pwj7" colspan="4">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Walfare_শিক্ষা সহযোগিতা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr> 				
                            <tr>
                                <td class="tg-pwj7" rowspan="3">ধরন</td>
                                <td class="tg-pwj7" rowspan="3">মেয়াদ</td>
                                <td class="tg-pwj7" colspan="6">শিক্ষা সহযোগিতা/শিক্ষাবৃত্তি প্রদান</td>
                              
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="3">পরিমাণ</td>
                           
                            </tr>
                            		
		

                            <tr>
                                <td class="tg-pwj7" >শাখা থেকে </td>
                                <td class="tg-pwj7" >কেন্দ্র থেকে</td>
                                <td class="tg-pwj7" >মোট </td>
                                <td class="tg-pwj7" >শাখা থেকে </td>
                                <td class="tg-pwj7" >কেন্দ্র থেকে</td>
                                <td class="tg-pwj7" >মোট </td>
                            </tr>
                            <?php
                                $manpower_niyo_1=0;
                                $manpower_niyo_2=0;
                                $manpower_ekkal_1=0;
                                $manpower_ekkal_2=0;
                            ?>
                            <tr>
                                <td class="tg-0pky tg-pwj7" rowspan='2'> জনশক্তি ও সমর্থক</td>
                                <td class="tg-0pky tg-pwj7"> নিয়মিত</td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_niyo_s_shaka = $stu_wellfare_shikkha_shohojogita['manpower_niyo_s_shaka']; $manpower_niyo_1+=$manpower_niyo_s_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_niyo_s_kendro = $stu_wellfare_shikkha_shohojogita['manpower_niyo_s_kendro']; $manpower_niyo_2+=$manpower_niyo_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_niyo_s_shaka+$manpower_niyo_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_niyo_p_shaka = $stu_wellfare_shikkha_shohojogita['manpower_niyo_p_shaka']; $manpower_ekkal_1+=$manpower_niyo_p_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_niyo_p_kendro = $stu_wellfare_shikkha_shohojogita['manpower_niyo_p_kendro']; $manpower_ekkal_2+=$manpower_niyo_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_niyo_p_shaka+$manpower_niyo_p_kendro; ?>
                                </td>
                   
                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7"> এককালীন</td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_s_shaka = $stu_wellfare_shikkha_shohojogita['manpower_ekkal_s_shaka']; $manpower_niyo_1+=$manpower_ekkal_s_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_s_kendro = $stu_wellfare_shikkha_shohojogita['manpower_ekkal_s_kendro']; $manpower_niyo_2+=$manpower_ekkal_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_s_shaka+$manpower_ekkal_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_p_shaka = $stu_wellfare_shikkha_shohojogita['manpower_ekkal_p_shaka']; $manpower_ekkal_1+=$manpower_ekkal_p_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_p_kendro = $stu_wellfare_shikkha_shohojogita['manpower_ekkal_p_kendro']; $manpower_ekkal_2+=$manpower_ekkal_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_p_shaka+$manpower_ekkal_p_kendro; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7" rowspan='2'> সাধারণ ছাত্র</td>
                                <td class="tg-0pky tg-pwj7"> নিয়মিত</td>
                                <td class="tg-0pky">
                                    <?php echo $general_niyo_s_shaka = $stu_wellfare_shikkha_shohojogita['general_niyo_s_shaka']; $manpower_niyo_1+=$general_niyo_s_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_niyo_s_kendro = $stu_wellfare_shikkha_shohojogita['general_niyo_s_kendro']; $manpower_niyo_2+=$general_niyo_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_niyo_s_shaka+$general_niyo_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_niyo_p_shaka = $stu_wellfare_shikkha_shohojogita['general_niyo_p_shaka']; $manpower_ekkal_1+=$general_niyo_p_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_niyo_p_kendro = $stu_wellfare_shikkha_shohojogita['general_niyo_p_kendro']; $manpower_ekkal_2+=$general_niyo_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $general_niyo_p_shaka+$general_niyo_p_kendro; ?>
                                </td>
                          
                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7"> এককালীন</td>
                                <td class="tg-0pky">
                                    <?php echo $general_ekkal_s_shaka = $stu_wellfare_shikkha_shohojogita['general_ekkal_s_shaka']; $manpower_niyo_1+=$general_ekkal_s_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_ekkal_s_kendro = $stu_wellfare_shikkha_shohojogita['general_ekkal_s_kendro']; $manpower_niyo_2+=$general_ekkal_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_ekkal_s_shaka+$general_ekkal_s_kendro; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_ekkal_p_shaka = $stu_wellfare_shikkha_shohojogita['general_ekkal_p_shaka']; $manpower_ekkal_1+=$general_ekkal_p_shaka; ?>
                                </td>
                                 <td class="tg-0pky">
                                    <?php echo $general_ekkal_p_kendro = $stu_wellfare_shikkha_shohojogita['general_ekkal_p_kendro']; $manpower_ekkal_2+=$general_ekkal_p_kendro; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $general_ekkal_p_shaka+$general_ekkal_p_kendro; ?>
                                </td>
                                
                          
                            </tr>
                            <tr>
                                <td class="tg-0pky tg-pwj7" colspan='2'> সর্বমোট</td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_niyo_1; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_niyo_2; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_niyo_1+$manpower_niyo_2; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_1; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_2; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $manpower_ekkal_1+$manpower_ekkal_2; ?>
                                </td>
                              
                            
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>শহীদ স্মারক/স্মরণিকা পরিসংখ্যান</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Walfare_শহীদ স্মারক/স্মরণিকা পরিসংখ্যান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr> 		
                            <tr>
                                <td class="tg-pwj7" rowspan=''>ক্রম</td>
                                <td class="tg-pwj7" rowspan=''>শাখা আইডি</td>
                                <td class="tg-pwj7">মোট শহীদ সংখ্যা</td>
                                <td class="tg-pwj7">কতজন শহীদকে নিয়ে স্মারক বের হয়েছে</td>
                                <td class="tg-pwj7">বের হলে স্মারকের নাম</td>
                                <td class="tg-pwj7">যাদের নামে বের হয়নি, তাদের নিয়ে বের করার সম্ভাব্য সময়</td>
                            </tr>
                                       
                   <?php 
                                $i=0;
                            foreach($stu_wellfare_shohid_list->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['total_shohid'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['shohid_sharok'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sharoker_nam'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['possible_time'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Walfare_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$stu_wellfare_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$stu_wellfare_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$stu_wellfare_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$stu_wellfare_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$stu_wellfare_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$stu_wellfare_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$stu_wellfare_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$stu_wellfare_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
