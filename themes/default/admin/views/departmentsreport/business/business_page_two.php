<?php defined('BASEPATH') or exit('No direct script access allowed');?>



<link href="<?=$assets?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?='ব্যবসায় শিক্ষা বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/business-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) {?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?="সকল শাখা"?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?=admin_url('departmentsreport/business-page-two')?>"><i class="fa fa-building-o"></i> <?="সকল শাখা"?></a></li>
                            <li class="divider"></li>
                            <?php
foreach ($branches as $branch) {
    echo '<li><a href="' . admin_url('departmentsreport/business-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
}
    ?>
                        </ul>
                    </li>
                <?php }?>
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
                                <td class="tg-pwj7" colspan="8"><b>একডেমিক আউটপুট সংক্রান্ত তথ্যাবলী (বিজনেস ও অর্থনীতি বিভাগে অধ্যয়নরত)</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Business_একডেমিক আউটপুট সংক্রান্ত তথ্যাবলী (বিজনেস ও অর্থনীতি বিভাগে অধ্যয়নরত).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                              <td class="tg-pwj7 " rowspan="2" colspan='2'><div><span>ধরন	</span></div></td>
                              <td class="tg-pwj7 " colspan="2"><div><span>কর্মী</span></div></td>
                              <td class="tg-pwj7 " colspan="2"><div><span>সাথী </span></div></td>
                              <td class="tg-pwj7" colspan="2">সদস্য </td>
                              <td class="tg-pwj7 " colspan="2"><div><span>মোট  </span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span> টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span> টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span> টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span> টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> জিপিএ-৫ ধারী</td>
                                <td class="tg-y698  type_1">
                                মাধ্যমিক
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $gpa_maddho_kormi_ter = $business_studies_academic_output['gpa_maddho_kormi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $gpa_maddho_kormi_orj = $business_studies_academic_output['gpa_maddho_kormi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $gpa_maddho_sathi_ter = $business_studies_academic_output['gpa_maddho_sathi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $gpa_maddho_sathi_orj = $business_studies_academic_output['gpa_maddho_sathi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $gpa_maddho_shod_ter = $business_studies_academic_output['gpa_maddho_shod_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $gpa_maddho_shod_orj = $business_studies_academic_output['gpa_maddho_shod_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo ($gpa_maddho_kormi_ter+$gpa_maddho_sathi_ter+$gpa_maddho_shod_ter)?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($gpa_maddho_kormi_orj+$gpa_maddho_sathi_orj+$gpa_maddho_shod_orj)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">উচ্চমাধ্যমিক </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $gpa_ucch_maddho_kormi_ter = $business_studies_academic_output['gpa_ucch_maddho_kormi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $gpa_ucch_maddho_kormi_orj = $business_studies_academic_output['gpa_ucch_maddho_kormi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $gpa_ucch_maddho_sathi_ter = $business_studies_academic_output['gpa_ucch_maddho_sathi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $gpa_ucch_maddho_sathi_orj = $business_studies_academic_output['gpa_ucch_maddho_sathi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $gpa_ucch_maddho_shod_ter = $business_studies_academic_output['gpa_ucch_maddho_shod_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $gpa_ucch_maddho_shod_orj = $business_studies_academic_output['gpa_ucch_maddho_shod_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo ($gpa_ucch_maddho_kormi_ter+$gpa_ucch_maddho_sathi_ter+$gpa_ucch_maddho_shod_ter )?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($gpa_ucch_maddho_kormi_orj+$gpa_ucch_maddho_sathi_orj+$gpa_ucch_maddho_shod_orj )?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> বিজনেস মেধাক্রম (১-৫) </td>
                                <td class="tg-y698">স্নাতক </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bus_1to5_snatok_kormi_ter = $business_studies_academic_output['bus_1to5_snatok_kormi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bus_1to5_snatok_kormi_orj = $business_studies_academic_output['bus_1to5_snatok_kormi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $bus_1to5_snatok_sathi_ter = $business_studies_academic_output['bus_1to5_snatok_sathi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $bus_1to5_snatok_sathi_orj = $business_studies_academic_output['bus_1to5_snatok_sathi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $bus_1to5_snatok_shod_ter = $business_studies_academic_output['bus_1to5_snatok_shod_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $bus_1to5_snatok_shod_orj = $business_studies_academic_output['bus_1to5_snatok_shod_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo ($bus_1to5_snatok_kormi_ter+$bus_1to5_snatok_sathi_ter+$bus_1to5_snatok_shod_ter)?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($bus_1to5_snatok_kormi_orj+$bus_1to5_snatok_sathi_orj+$bus_1to5_snatok_shod_orj)?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">স্নাতকোত্তর </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bus_1to5_snatok_uttor_kormi_ter = $business_studies_academic_output['bus_1to5_snatok_uttor_kormi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bus_1to5_snatok_uttor_kormi_orj = $business_studies_academic_output['bus_1to5_snatok_uttor_kormi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $bus_1to5_snatok_uttor_sathi_ter = $business_studies_academic_output['bus_1to5_snatok_uttor_sathi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $bus_1to5_snatok_uttor_sathi_orj = $business_studies_academic_output['bus_1to5_snatok_uttor_sathi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $bus_1to5_snatok_uttor_shod_ter = $business_studies_academic_output['bus_1to5_snatok_uttor_shod_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $bus_1to5_snatok_uttor_shod_orj = $business_studies_academic_output['bus_1to5_snatok_uttor_shod_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo ($bus_1to5_snatok_uttor_kormi_ter+$bus_1to5_snatok_uttor_sathi_ter+$bus_1to5_snatok_uttor_shod_ter)?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($bus_1to5_snatok_uttor_kormi_orj+$bus_1to5_snatok_uttor_sathi_orj+$bus_1to5_snatok_uttor_shod_orj)?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> অর্থনীতি মেধাক্রম (১-৫)  </td>
                                <td class="tg-y698">স্নাতক </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ortho_1to5_snatok_kormi_ter = $business_studies_academic_output['ortho_1to5_snatok_kormi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ortho_1to5_snatok_kormi_orj = $business_studies_academic_output['ortho_1to5_snatok_kormi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $ortho_1to5_snatok_sathi_ter = $business_studies_academic_output['ortho_1to5_snatok_sathi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $ortho_1to5_snatok_sathi_orj = $business_studies_academic_output['ortho_1to5_snatok_sathi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $ortho_1to5_snatok_shod_ter = $business_studies_academic_output['ortho_1to5_snatok_shod_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $ortho_1to5_snatok_shod_orj = $business_studies_academic_output['ortho_1to5_snatok_shod_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo ($ortho_1to5_snatok_kormi_ter+$ortho_1to5_snatok_sathi_ter+$ortho_1to5_snatok_shod_ter)?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($ortho_1to5_snatok_kormi_orj+$ortho_1to5_snatok_sathi_orj+$ortho_1to5_snatok_shod_orj)?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698">স্নাতকোত্তর </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ortho_1to5_snatok_uttor_kormi_ter = $business_studies_academic_output['ortho_1to5_snatok_uttor_kormi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ortho_1to5_snatok_uttor_kormi_orj = $business_studies_academic_output['ortho_1to5_snatok_uttor_kormi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $ortho_1to5_snatok_uttor_sathi_ter = $business_studies_academic_output['ortho_1to5_snatok_uttor_sathi_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $ortho_1to5_snatok_uttor_sathi_orj = $business_studies_academic_output['ortho_1to5_snatok_uttor_sathi_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $ortho_1to5_snatok_uttor_shod_ter = $business_studies_academic_output['ortho_1to5_snatok_uttor_shod_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $ortho_1to5_snatok_uttor_shod_orj = $business_studies_academic_output['ortho_1to5_snatok_uttor_shod_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo ($ortho_1to5_snatok_uttor_kormi_ter+$ortho_1to5_snatok_uttor_sathi_ter+$ortho_1to5_snatok_uttor_shod_ter)?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($ortho_1to5_snatok_uttor_kormi_orj+$ortho_1to5_snatok_uttor_sathi_orj+$ortho_1to5_snatok_uttor_shod_orj)?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="9"><b>প্রফেশনাল ডিগ্রি সংক্রান্ত</b><h6>(বর্তমান এবং সাবেকদের মধ্যে ব্যবসায় শিক্ষায় প্রফেশনাল ডিগ্রিতে অধ্যয়নরত-সংক্রান্ত তথ্যাবলী) </h6> </td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Business_প্রফেশনাল ডিগ্রি সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মান </td>
                                
                                <td class="tg-pwj7" > M.Phil (এম.ফিল) </td>
                                <td class="tg-pwj7" >Ph.D (পিএইচ.ডি)  </td>
                                <td class="tg-pwj7" >CA (সিএ)  </td>
                                <td class="tg-pwj7" >ACCA (এসিসিএ) </td>
                                <td class="tg-pwj7" >CMA (সিএমএ) </td>
                                <td class="tg-pwj7" >CISA (সিআইএসএ)  </td>
                                <td class="tg-pwj7" >CFA (সিএফএ)  </td>
                                <td class="tg-pwj7" >BIBM (বিআইবিএম) </td>
                                <td class="tg-pwj7" >Others (অন্যান্য) </td>
                                <td class="tg-pwj7" >মোট</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_m_phil = $business_studies_pro_outpur_degree['shod_m_phil'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_phd = $business_studies_pro_outpur_degree['shod_phd'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shod_ca = $business_studies_pro_outpur_degree['shod_ca'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shod_acca = $business_studies_pro_outpur_degree['shod_acca'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shod_cma = $business_studies_pro_outpur_degree['shod_cma'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shod_cisa = $business_studies_pro_outpur_degree['shod_cisa'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shod_cfa = $business_studies_pro_outpur_degree['shod_cfa'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shod_bibm = $business_studies_pro_outpur_degree['shod_bibm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shod_others = $business_studies_pro_outpur_degree['shod_others'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $member = ($shod_m_phil+$shod_phd+$shod_ca+$shod_acca+$shod_cma+$shod_cisa+$shod_cfa+$shod_bibm+$shod_others) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাথী</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_m_phil = $business_studies_pro_outpur_degree['sathi_m_phil'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_phd = $business_studies_pro_outpur_degree['sathi_phd'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_ca = $business_studies_pro_outpur_degree['sathi_ca'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_acca = $business_studies_pro_outpur_degree['sathi_acca'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sathi_cma = $business_studies_pro_outpur_degree['sathi_cma'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $sathi_cisa = $business_studies_pro_outpur_degree['sathi_cisa'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sathi_cfa = $business_studies_pro_outpur_degree['sathi_cfa'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sathi_bibm = $business_studies_pro_outpur_degree['sathi_bibm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $sathi_others = $business_studies_pro_outpur_degree['sathi_others'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $sathi = ($sathi_m_phil+$sathi_phd +$sathi_ca +$sathi_acca + $sathi_cma+$sathi_cisa +$sathi_cfa + $sathi_bibm+$sathi_others ) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">কর্মী</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_m_phil = $business_studies_pro_outpur_degree['kormi_m_phil'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_phd = $business_studies_pro_outpur_degree['kormi_phd'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_ca = $business_studies_pro_outpur_degree['kormi_ca'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_acca = $business_studies_pro_outpur_degree['kormi_acca'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kormi_cma = $business_studies_pro_outpur_degree['kormi_cma'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $kormi_cisa = $business_studies_pro_outpur_degree['kormi_cisa'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $kormi_cfa = $business_studies_pro_outpur_degree['kormi_cfa'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $kormi_bibm = $business_studies_pro_outpur_degree['kormi_bibm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $kormi_others = $business_studies_pro_outpur_degree['kormi_others'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $kormi = ($kormi_m_phil+$kormi_phd +$kormi_ca +$kormi_acca + $kormi_cma+$kormi_cisa +$kormi_cfa + $kormi_bibm+$kormi_others ) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সমর্থক</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shomorthok_m_phil = $business_studies_pro_outpur_degree['shomorthok_m_phil'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shomorthok_phd = $business_studies_pro_outpur_degree['shomorthok_phd'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shomorthok_ca = $business_studies_pro_outpur_degree['shomorthok_ca'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shomorthok_acca = $business_studies_pro_outpur_degree['shomorthok_acca'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shomorthok_cma = $business_studies_pro_outpur_degree['shomorthok_cma'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shomorthok_cisa = $business_studies_pro_outpur_degree['shomorthok_cisa'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shomorthok_cfa = $business_studies_pro_outpur_degree['shomorthok_cfa'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shomorthok_bibm = $business_studies_pro_outpur_degree['shomorthok_bibm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shomorthok_others = $business_studies_pro_outpur_degree['shomorthok_others'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shomorthok = ($shomorthok_m_phil+$shomorthok_phd +$shomorthok_ca +$shomorthok_acca + $shomorthok_cma+$shomorthok_cisa +$shomorthok_cfa + $shomorthok_bibm+$shomorthok_others ) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাবেক</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shabek_m_phil = $business_studies_pro_outpur_degree['shabek_m_phil'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shabek_phd = $business_studies_pro_outpur_degree['shabek_phd'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shabek_ca = $business_studies_pro_outpur_degree['shabek_ca'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shabek_acca = $business_studies_pro_outpur_degree['shabek_acca'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shabek_cma = $business_studies_pro_outpur_degree['shabek_cma'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shabek_cisa = $business_studies_pro_outpur_degree['shabek_cisa'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shabek_cfa = $business_studies_pro_outpur_degree['shabek_cfa'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shabek_bibm = $business_studies_pro_outpur_degree['shabek_bibm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shabek_others = $business_studies_pro_outpur_degree['shabek_others'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $sabek = ($shabek_m_phil+$shabek_phd +$shabek_ca +$shabek_acca + $shabek_cma+$shabek_cisa +$shabek_cfa + $shabek_bibm+$shabek_others) ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">মোট</td>
                                <td class="tg-0pky  type_1">
									<?php echo ($shod_m_phil+$sathi_m_phil+$kormi_m_phil+$shomorthok_m_phil+$shabek_m_phil) ?>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo ($shod_phd+$sathi_phd+$kormi_phd+$shomorthok_phd+$shabek_phd) ?>
                                </td>
                                <td class="tg-0pky  type_2">
									<?php echo ($shod_ca+$sathi_ca+$kormi_ca+$shomorthok_ca+$shabek_ca) ?>
                                </td>
                                <td class="tg-0pky  type_3">
									<?php echo ($shod_acca+$sathi_acca+$kormi_acca+$shomorthok_acca+$shabek_acca) ?>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($shod_cma+$sathi_cma+$kormi_cma+$shomorthok_cma+$shabek_cma) ?>
                                </td>
                                <td class="tg-0pky  type_5">
									<?php echo ($shod_cisa+$sathi_cisa+$kormi_cisa+$shomorthok_cisa+$shabek_cisa) ?>
                                </td>
                                <td class="tg-0pky  type_6">
									<?php echo ($shod_cfa+$sathi_cfa+$kormi_cfa+$shomorthok_cfa+$shabek_cfa) ?>
                                </td>
                                <td class="tg-0pky  type_7">
									<?php echo ($shod_bibm+$sathi_bibm+$kormi_bibm+$shomorthok_bibm+$shabek_bibm) ?>
                                </td>
                                <td class="tg-0pky  type_8">
									<?php echo ($shod_others+$sathi_others+$kormi_others+$shomorthok_others+$shabek_others) ?>
                                </td>
                                <td class="tg-0pky  type_8">
									<?php echo ($member+$sathi+$kormi+$shomorthok+$sabek) ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="11"><b>প্রফেশনাল আউটপুট সংক্রান্ত : প্রফেশনাল ডিগ্রি</b><h6>(বর্তমান এবং সাবেকদের মধ্যে ব্যবসায় শিক্ষায় প্রফেশনাল ডিগ্রিতে অধ্যয়নরতদের আউটপুট -সংক্রান্ত তথ্যাবলী) </h6> </td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Business_প্রফেশনাল আউটপুট সংক্রান্ত : প্রফেশনাল ডিগ্রি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan='2'>মান </td>
                                
                                <td class="tg-pwj7" colspan='2'> M.Phil (এম.ফিল) </td>
                                <td class="tg-pwj7" colspan='2'>Ph.D (পিএইচ.ডি)  </td>
                                <td class="tg-pwj7" colspan='2'>CA (সিএ)  </td>
                                <td class="tg-pwj7" colspan='2'>ACCA (এসিসিএ) </td>
                                <td class="tg-pwj7" colspan='2'>CMA (সিএমএ) </td>
                                <td class="tg-pwj7" colspan='2'>মোট</td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_m_phil_ter = $business_studies_pro_output_pro_degree['shod_m_phil_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_m_phil_orj = $business_studies_pro_output_pro_degree['shod_m_phil_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shod_phd_ter = $business_studies_pro_output_pro_degree['shod_phd_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shod_phd_orj = $business_studies_pro_output_pro_degree['shod_phd_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shod_ca_ter = $business_studies_pro_output_pro_degree['shod_ca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shod_ca_orj = $business_studies_pro_output_pro_degree['shod_ca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shod_acca_ter = $business_studies_pro_output_pro_degree['shod_acca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shod_acca_orj = $business_studies_pro_output_pro_degree['shod_acca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shod_cma_ter = $business_studies_pro_output_pro_degree['shod_cma_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shod_cma_orj = $business_studies_pro_output_pro_degree['shod_cma_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $member_d_ter = ($shod_m_phil_ter+$shod_phd_ter+$shod_ca_ter+$shod_acca_ter+$shod_cma_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $member_d_orj = ($shod_m_phil_orj+$shod_phd_orj+$shod_ca_orj+$shod_acca_orj+$shod_cma_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাথী</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_m_phil_ter = $business_studies_pro_output_pro_degree['sathi_m_phil_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_m_phil_orj = $business_studies_pro_output_pro_degree['sathi_m_phil_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_phd_ter = $business_studies_pro_output_pro_degree['sathi_phd_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_phd_orj = $business_studies_pro_output_pro_degree['sathi_phd_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sathi_ca_ter = $business_studies_pro_output_pro_degree['sathi_ca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $sathi_ca_orj = $business_studies_pro_output_pro_degree['sathi_ca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sathi_acca_ter = $business_studies_pro_output_pro_degree['sathi_acca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sathi_acca_orj = $business_studies_pro_output_pro_degree['sathi_acca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $sathi_cma_ter = $business_studies_pro_output_pro_degree['sathi_cma_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sathi_cma_orj = $business_studies_pro_output_pro_degree['sathi_cma_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $sathi_d_ter = ($sathi_m_phil_ter+$sathi_phd_ter+$sathi_ca_ter+$sathi_acca_ter+$sathi_cma_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $sathi_d_orj = ($sathi_m_phil_orj+$sathi_phd_orj+$sathi_ca_orj+$sathi_acca_orj+$sathi_cma_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">কর্মী</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_m_phil_ter = $business_studies_pro_output_pro_degree['kormi_m_phil_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_m_phil_orj = $business_studies_pro_output_pro_degree['kormi_m_phil_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_phd_ter = $business_studies_pro_output_pro_degree['kormi_phd_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_phd_orj = $business_studies_pro_output_pro_degree['kormi_phd_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kormi_ca_ter = $business_studies_pro_output_pro_degree['kormi_ca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $kormi_ca_orj = $business_studies_pro_output_pro_degree['kormi_ca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $kormi_acca_ter = $business_studies_pro_output_pro_degree['kormi_acca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $kormi_acca_orj = $business_studies_pro_output_pro_degree['kormi_acca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $kormi_cma_ter = $business_studies_pro_output_pro_degree['kormi_cma_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kormi_cma_orj = $business_studies_pro_output_pro_degree['kormi_cma_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $kormi_d_ter = ($kormi_m_phil_ter+$kormi_phd_ter+$kormi_ca_ter+$kormi_acca_ter+$kormi_cma_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $kormi_d_orj = ($kormi_m_phil_orj+$kormi_phd_orj+$kormi_ca_orj+$kormi_acca_orj+$kormi_cma_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সমর্থক</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shomorthok_m_phil_ter = $business_studies_pro_output_pro_degree['shomorthok_m_phil_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shomorthok_m_phil_orj = $business_studies_pro_output_pro_degree['shomorthok_m_phil_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shomorthok_phd_ter = $business_studies_pro_output_pro_degree['shomorthok_phd_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shomorthok_phd_orj = $business_studies_pro_output_pro_degree['shomorthok_phd_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shomorthok_ca_ter = $business_studies_pro_output_pro_degree['shomorthok_ca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shomorthok_ca_orj = $business_studies_pro_output_pro_degree['shomorthok_ca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shomorthok_acca_ter = $business_studies_pro_output_pro_degree['shomorthok_acca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shomorthok_acca_orj = $business_studies_pro_output_pro_degree['shomorthok_acca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shomorthok_cma_ter = $business_studies_pro_output_pro_degree['shomorthok_cma_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shomorthok_cma_orj = $business_studies_pro_output_pro_degree['shomorthok_cma_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shomorthok_d_ter = ($shomorthok_m_phil_ter+$shomorthok_phd_ter+$shomorthok_ca_ter+$shomorthok_acca_ter+$shomorthok_cma_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shomorthok_d_orj = ($shomorthok_m_phil_orj+$shomorthok_phd_orj+$shomorthok_ca_orj+$shomorthok_acca_orj+$shomorthok_cma_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাবেক</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shabek_m_phil_ter = $business_studies_pro_output_pro_degree['shabek_m_phil_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shabek_m_phil_orj = $business_studies_pro_output_pro_degree['shabek_m_phil_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shabek_phd_ter = $business_studies_pro_output_pro_degree['shabek_phd_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shabek_phd_orj = $business_studies_pro_output_pro_degree['shabek_phd_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shabek_ca_ter = $business_studies_pro_output_pro_degree['shabek_ca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shabek_ca_orj = $business_studies_pro_output_pro_degree['shabek_ca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shabek_acca_ter = $business_studies_pro_output_pro_degree['shabek_acca_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shabek_acca_orj = $business_studies_pro_output_pro_degree['shabek_acca_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shabek_cma_ter = $business_studies_pro_output_pro_degree['shabek_cma_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shabek_cma_orj = $business_studies_pro_output_pro_degree['shabek_cma_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shabek_d_ter = ($shabek_m_phil_ter+$shabek_phd_ter+$shabek_ca_ter+$shabek_acca_ter+$shabek_cma_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shabek_d_orj = ($shabek_m_phil_orj+$shabek_phd_orj+$shabek_ca_orj+$shabek_acca_orj+$shabek_cma_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">মোট</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($shod_m_phil_ter+$sathi_m_phil_ter+$kormi_m_phil_ter+$shomorthok_m_phil_ter+$shabek_m_phil_ter) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($shod_m_phil_orj+$sathi_m_phil_orj+$kormi_m_phil_orj+$shomorthok_m_phil_orj+$shabek_m_phil_orj) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($shod_phd_ter+$sathi_phd_ter+$kormi_phd_ter+$shomorthok_phd_ter+$shabek_phd_ter) ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo ($shod_phd_orj+$sathi_phd_orj+$kormi_phd_orj+$shomorthok_phd_orj+$shabek_phd_orj) ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo ($shod_ca_ter+$sathi_ca_ter+$kormi_ca_ter+$shomorthok_ca_ter+$shabek_ca_ter) ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo ($shod_ca_orj+$sathi_ca_orj+$kormi_ca_orj+$shomorthok_ca_orj+$shabek_ca_orj) ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo ($shod_acca_ter+$sathi_acca_ter+$kormi_acca_ter+$shomorthok_acca_ter+$shabek_acca_ter) ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo ($shod_acca_orj+$sathi_acca_orj+$kormi_acca_orj+$shomorthok_acca_orj+$shabek_acca_orj) ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <?php echo ($shod_cma_ter+$sathi_cma_ter+$kormi_cma_ter+$shomorthok_cma_ter+$shabek_cma_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo ($shod_cma_orj+$sathi_cma_orj+$kormi_cma_orj+$shomorthok_cma_orj+$shabek_cma_orj) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo ($member_d_ter+$sathi_d_ter+$kormi_d_ter+$shomorthok_d_ter+$shabek_d_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo ($member_d_orj+$sathi_d_orj+$kormi_d_orj+$shomorthok_d_orj+$shabek_d_orj) ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="11"><b>প্রফেশনাল আউটপুট সংক্রান্ত : (ব্যবসায় শিক্ষা ও অর্থনীতি)</b> </td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Business_প্রফেশনাল আউটপুট সংক্রান্ত : (ব্যবসায় শিক্ষা ও অর্থনীতি).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan='2'>মান </td>
                                <td class="tg-pwj7" colspan='2'>ব্যাংকার (ইসলামী)</td>
                                <td class="tg-pwj7" colspan='2'>পরিসংখ্যানবীদ  </td>
                                <td class="tg-pwj7" colspan='2'>অর্থনীতবিদ  </td>
                                <td class="tg-pwj7" colspan='2'>উদ্যোক্তা </td>
                                <td class="tg-pwj7" colspan='2'>ব্যবসায়ী </td>
                                <td class="tg-pwj7" colspan='2'>মোট</td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                                <td class="tg-pwj7" >টার্গেট</td>
                                <td class="tg-pwj7" >অর্জন</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_banker_ter = $business_studies_pro_output_business['shod_banker_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_banker_orj = $business_studies_pro_output_business['shod_banker_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shod_porishongkhanbid_ter = $business_studies_pro_output_business['shod_porishongkhanbid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shod_porishongkhanbid_orj = $business_studies_pro_output_business['shod_porishongkhanbid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shod_orthonitibid_ter = $business_studies_pro_output_business['shod_orthonitibid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shod_orthonitibid_orj = $business_studies_pro_output_business['shod_orthonitibid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shod_uddokta_ter = $business_studies_pro_output_business['shod_uddokta_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shod_uddokta_orj = $business_studies_pro_output_business['shod_uddokta_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shod_businessman_ter = $business_studies_pro_output_business['shod_businessman_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shod_businessman_orj = $business_studies_pro_output_business['shod_businessman_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $member_p_ter = ($shod_banker_ter+$shod_porishongkhanbid_ter+$shod_orthonitibid_ter+$shod_uddokta_ter+$shod_businessman_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $member_p_orj = ($shod_banker_orj+$shod_porishongkhanbid_orj+$shod_orthonitibid_orj+$shod_uddokta_orj+$shod_businessman_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাথী</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_banker_ter = $business_studies_pro_output_business['sathi_banker_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_banker_orj = $business_studies_pro_output_business['sathi_banker_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_porishongkhanbid_ter = $business_studies_pro_output_business['sathi_porishongkhanbid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_porishongkhanbid_orj = $business_studies_pro_output_business['sathi_porishongkhanbid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sathi_orthonitibid_ter = $business_studies_pro_output_business['sathi_orthonitibid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $sathi_orthonitibid_orj = $business_studies_pro_output_business['sathi_orthonitibid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sathi_uddokta_ter = $business_studies_pro_output_business['sathi_uddokta_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sathi_uddokta_orj = $business_studies_pro_output_business['sathi_uddokta_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $sathi_businessman_ter = $business_studies_pro_output_business['sathi_businessman_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sathi_businessman_orj = $business_studies_pro_output_business['sathi_businessman_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $sathi_p_ter = ($sathi_banker_ter+$sathi_porishongkhanbid_ter+$sathi_orthonitibid_ter+$sathi_uddokta_ter+$sathi_businessman_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $sathi_p_orj = ($sathi_banker_orj+$sathi_porishongkhanbid_orj+$sathi_orthonitibid_orj+$sathi_uddokta_orj+$sathi_businessman_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">কর্মী</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_banker_ter = $business_studies_pro_output_business['kormi_banker_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_banker_orj = $business_studies_pro_output_business['kormi_banker_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_porishongkhanbid_ter = $business_studies_pro_output_business['kormi_porishongkhanbid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_porishongkhanbid_orj = $business_studies_pro_output_business['kormi_porishongkhanbid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kormi_orthonitibid_ter = $business_studies_pro_output_business['kormi_orthonitibid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $kormi_orthonitibid_orj = $business_studies_pro_output_business['kormi_orthonitibid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $kormi_uddokta_ter = $business_studies_pro_output_business['kormi_uddokta_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $kormi_uddokta_orj = $business_studies_pro_output_business['kormi_uddokta_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $kormi_businessman_ter = $business_studies_pro_output_business['kormi_businessman_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kormi_businessman_orj = $business_studies_pro_output_business['kormi_businessman_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $korim_p_ter = ($kormi_banker_ter+$kormi_porishongkhanbid_ter+$kormi_orthonitibid_ter+$kormi_uddokta_ter+$kormi_businessman_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $korim_p_orj = ($kormi_banker_orj+$kormi_porishongkhanbid_orj+$kormi_orthonitibid_orj+$kormi_uddokta_orj+$kormi_businessman_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সমর্থক</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shomorthok_banker_ter = $business_studies_pro_output_business['shomorthok_banker_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shomorthok_banker_orj = $business_studies_pro_output_business['shomorthok_banker_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shomorthok_porishongkhanbid_ter = $business_studies_pro_output_business['shomorthok_porishongkhanbid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shomorthok_porishongkhanbid_orj = $business_studies_pro_output_business['shomorthok_porishongkhanbid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shomorthok_orthonitibid_ter = $business_studies_pro_output_business['shomorthok_orthonitibid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shomorthok_orthonitibid_orj = $business_studies_pro_output_business['shomorthok_orthonitibid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shomorthok_uddokta_ter = $business_studies_pro_output_business['shomorthok_uddokta_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shomorthok_uddokta_orj = $business_studies_pro_output_business['shomorthok_uddokta_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shomorthok_businessman_ter = $business_studies_pro_output_business['shomorthok_businessman_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shomorthok_businessman_orj = $business_studies_pro_output_business['shomorthok_businessman_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shomorthok_p_ter = ($shomorthok_banker_ter+$shomorthok_porishongkhanbid_ter+$shomorthok_orthonitibid_ter+$shomorthok_uddokta_ter+$shomorthok_businessman_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shomorthok_p_orj = ($shomorthok_banker_orj+$shomorthok_porishongkhanbid_orj+$shomorthok_orthonitibid_orj+$shomorthok_uddokta_orj+$shomorthok_businessman_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাবেক</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shabek_banker_ter = $business_studies_pro_output_business['shabek_banker_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shabek_banker_orj = $business_studies_pro_output_business['shabek_banker_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shabek_porishongkhanbid_ter = $business_studies_pro_output_business['shabek_porishongkhanbid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $shabek_porishongkhanbid_orj = $business_studies_pro_output_business['shabek_porishongkhanbid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $shabek_orthonitibid_ter = $business_studies_pro_output_business['shabek_orthonitibid_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $shabek_orthonitibid_orj = $business_studies_pro_output_business['shabek_orthonitibid_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $shabek_uddokta_ter = $business_studies_pro_output_business['shabek_uddokta_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $shabek_uddokta_orj = $business_studies_pro_output_business['shabek_uddokta_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $shabek_businessman_ter = $business_studies_pro_output_business['shabek_businessman_ter'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shabek_businessman_orj = $business_studies_pro_output_business['shabek_businessman_orj'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shabek_p_ter = ($shabek_banker_ter+$shabek_porishongkhanbid_ter+$shabek_orthonitibid_ter+$shabek_uddokta_ter+$shabek_businessman_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $shabek_p_orj = ($shabek_banker_orj+$shabek_porishongkhanbid_orj+$shabek_orthonitibid_orj+$shabek_uddokta_orj+$shabek_businessman_orj) ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">মোট</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($shod_banker_ter+$sathi_banker_ter+$kormi_banker_ter+$shomorthok_banker_ter+$shabek_banker_ter) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($shod_banker_orj+$sathi_banker_orj+$kormi_banker_orj+$shomorthok_banker_orj+$shabek_banker_orj) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($shod_porishongkhanbid_ter+$sathi_porishongkhanbid_ter+$kormi_porishongkhanbid_ter+$shomorthok_porishongkhanbid_ter+$shabek_porishongkhanbid_ter) ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo ($shod_porishongkhanbid_orj+$sathi_porishongkhanbid_orj+$kormi_porishongkhanbid_orj+$shomorthok_porishongkhanbid_orj+$shabek_porishongkhanbid_orj) ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo ($shod_orthonitibid_ter+$sathi_orthonitibid_ter+$kormi_orthonitibid_ter+$shomorthok_orthonitibid_ter+$shabek_orthonitibid_ter) ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo ($shod_orthonitibid_orj+$sathi_orthonitibid_orj+$kormi_orthonitibid_orj+$shomorthok_orthonitibid_orj+$shabek_orthonitibid_orj) ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo ($shod_uddokta_ter+$sathi_uddokta_ter+$kormi_uddokta_ter+$shomorthok_uddokta_ter+$shabek_uddokta_ter) ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo ($shod_uddokta_orj+$sathi_uddokta_orj+$kormi_uddokta_orj+$shomorthok_uddokta_orj+$shabek_uddokta_orj) ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <?php echo ($shod_businessman_ter+$sathi_businessman_ter+$kormi_businessman_ter+$shomorthok_businessman_ter+$shabek_businessman_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo ($shod_businessman_orj+$sathi_businessman_orj+$kormi_businessman_orj+$shomorthok_businessman_orj+$shabek_businessman_orj) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo ($member_p_ter+$sathi_p_ter+$korim_p_ter+$shomorthok_p_ter+$shabek_p_ter) ?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo ($member_p_orj+$sathi_p_orj+$korim_p_orj+$shomorthok_p_orj+$shabek_p_orj) ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>সামিট </b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Business_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698">বিজনেস স্টাডিজে অধ্যায়নরত জনশক্তিদের নিয়ে সামিট (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $business_manpower_central_s=$business_studies_summit['business_manpower_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $business_manpower_central_p=$business_studies_summit['business_manpower_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($business_manpower_central_s>0 && $business_manpower_central_p>0)
                            {echo ($business_manpower_central_p/$business_manpower_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">বিজনেস স্টাডিজে অধ্যায়নরত জনশক্তিদের নিয়ে সামিট (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $business_manpower_shakha_s=$business_studies_summit['business_manpower_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $business_manpower_shakha_p=$business_studies_summit['business_manpower_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($business_manpower_shakha_s>0 && $business_manpower_shakha_p>0)
                            {echo ($business_manpower_shakha_p/$business_manpower_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                       
                    </table>
                    </div>
			   </div>
            </div>
        </div>
    </div>
</div>

