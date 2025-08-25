<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'কলেজ বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/college-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
               
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
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
<style type="text/css">
    #export_all_table{
        cursor: pointer;
    }
</style>
    <div class="box-content">
        <div class="row">
<!-- ====== Report serial code ======= --> 
<?php 
// This function renders a department report form with serial number information
// based on the branch, report, department, and user roles provided.
render_dept_report_serial_form($branch_id, $report_info, $department_id, $serial_info, $this->Owner, $this->Admin, $this->departmentuser); 
?>
<!-- ====== /. Report serial code ===== -->
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                        <!-- first table -->
                        <table class="tg table table-header-rotated" id="testTable1">
                          <tr>
                            <td class="tg-pwj7" colspan="11"><b>জনশক্তি ও দাওয়াত :</b></td>
                            <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'College_কলেজ সংগঠন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                          </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                                <td class="tg-pwj7 " rowspan="3"><div><span> বর্তমান সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " rowspan="3"><div><span>মোট বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7" colspan="11" style="text-align:center;">বৃদ্ধি বিবরণ </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="5">ইন্টারমিডিয়েট সেকশন  </td>
                                <td class="tg-pwj7" colspan="6">ডিপ্লোমা </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span class="vertical">এসএসসি/দাখিল জিপিএ-৫.০০</span></div></td>
                                <td class="tg-pwj7 "><div><span>এসএসসি/দাখিল জিপিএ ≥ ৪.০০ </span></div></td>
                                <td class="tg-pwj7 "><div><span>বিজ্ঞান </span></div></td>
                                <td class="tg-pwj7 "><div><span>মানবিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>ব্যবসায় শিক্ষা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>পলিটেকনিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মেরিন ইন্সটিটিউট </span></div></td>
                                <td class="tg-pwj7 "><div><span>টেক্সটাইল কলেজ </span></div></td>
                                <td class="tg-pwj7 "><div><span>কৃষি ইনিস্টিটিউট</span></div></td>
                                <td class="tg-pwj7 "><div><span>আই এইচ টি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ম্যাটস </span></div></td>
                            </tr>

							<?php $pk = (isset($college_manpower_dawat['id']))?$college_manpower_dawat['id']:'';?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_pres_num" data-title="Enter">
										<?php echo $shodossho_pres_num=  (isset( $college_manpower_dawat['shodossho_pres_num']))?$college_manpower_dawat['shodossho_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_bri_mu" data-title="Enter">
										<?php echo $shodossho_bri_mu=  (isset( $college_manpower_dawat['shodossho_bri_mu']))?$college_manpower_dawat['shodossho_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_ssc_a_plus" data-title="Enter">
										<?php echo $shodossho_ssc_a_plus=  (isset( $college_manpower_dawat['shodossho_ssc_a_plus']))?$college_manpower_dawat['shodossho_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_ssc_a_grade" data-title="Enter">
										<?php echo $shodossho_ssc_a_grade=  (isset( $college_manpower_dawat['shodossho_ssc_a_grade']))?$college_manpower_dawat['shodossho_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_science" data-title="Enter">
										<?php echo $shodossho_science=  (isset( $college_manpower_dawat['shodossho_science']))?$college_manpower_dawat['shodossho_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_arts" data-title="Enter">
										<?php echo $shodossho_arts=  (isset( $college_manpower_dawat['shodossho_arts']))?$college_manpower_dawat['shodossho_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_commerce" data-title="Enter">
										<?php echo $shodossho_commerce=  (isset( $college_manpower_dawat['shodossho_commerce']))?$college_manpower_dawat['shodossho_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_poli" data-title="Enter">
										<?php echo $shodossho_poli=  (isset( $college_manpower_dawat['shodossho_poli']))?$college_manpower_dawat['shodossho_poli']:0; ?></a>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_marine_ins" data-title="Enter">
										<?php echo $shodossho_marine_ins=  (isset( $college_manpower_dawat['shodossho_marine_ins']))?$college_manpower_dawat['shodossho_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_text_ins" data-title="Enter">
										<?php echo $shodossho_text_ins=  (isset( $college_manpower_dawat['shodossho_text_ins']))?$college_manpower_dawat['shodossho_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_agri_ins" data-title="Enter">
										<?php echo $shodossho_agri_ins=  (isset( $college_manpower_dawat['shodossho_agri_ins']))?$college_manpower_dawat['shodossho_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_hit_ins" data-title="Enter">
										<?php echo $shodossho_hit_ins=  (isset( $college_manpower_dawat['shodossho_hit_ins']))?$college_manpower_dawat['shodossho_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_mats_ins" data-title="Enter">
										<?php echo $shodossho_mats_ins=  (isset( $college_manpower_dawat['shodossho_mats_ins']))?$college_manpower_dawat['shodossho_mats_ins']:0; ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">প্রশ্নপত্র </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_pres_num" data-title="Enter">
										<?php echo $proshno_pres_num=  (isset( $college_manpower_dawat['proshno_pres_num']))?$college_manpower_dawat['proshno_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_bri_mu" data-title="Enter">
										<?php echo $proshno_bri_mu=  (isset( $college_manpower_dawat['proshno_bri_mu']))?$college_manpower_dawat['proshno_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_ssc_a_plus" data-title="Enter">
										<?php echo $proshno_ssc_a_plus=  (isset( $college_manpower_dawat['proshno_ssc_a_plus']))?$college_manpower_dawat['proshno_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_ssc_a_grade" data-title="Enter">
										<?php echo $proshno_ssc_a_grade=  (isset( $college_manpower_dawat['proshno_ssc_a_grade']))?$college_manpower_dawat['proshno_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_science" data-title="Enter">
										<?php echo $proshno_science=  (isset( $college_manpower_dawat['proshno_science']))?$college_manpower_dawat['proshno_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_arts" data-title="Enter">
										<?php echo $proshno_arts=  (isset( $college_manpower_dawat['proshno_arts']))?$college_manpower_dawat['proshno_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_commerce" data-title="Enter">
										<?php echo $proshno_commerce=  (isset( $college_manpower_dawat['proshno_commerce']))?$college_manpower_dawat['proshno_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_poli" data-title="Enter">
										<?php echo $proshno_poli=  (isset( $college_manpower_dawat['proshno_poli']))?$college_manpower_dawat['proshno_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_marine_ins" data-title="Enter">
										<?php echo $proshno_marine_ins=  (isset( $college_manpower_dawat['proshno_marine_ins']))?$college_manpower_dawat['proshno_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_text_ins" data-title="Enter">
										<?php echo $proshno_text_ins=  (isset( $college_manpower_dawat['proshno_text_ins']))?$college_manpower_dawat['proshno_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_agri_ins" data-title="Enter">
										<?php echo $proshno_agri_ins=  (isset( $college_manpower_dawat['proshno_agri_ins']))?$college_manpower_dawat['proshno_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_hit_ins" data-title="Enter">
										<?php echo $proshno_hit_ins=  (isset( $college_manpower_dawat['proshno_hit_ins']))?$college_manpower_dawat['proshno_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshno_mats_ins" data-title="Enter">
										<?php echo $proshno_mats_ins=  (isset( $college_manpower_dawat['proshno_mats_ins']))?$college_manpower_dawat['proshno_mats_ins']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">আবেদনপত্র  </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_pres_num" data-title="Enter">
										<?php echo $abedon_pres_num=  (isset( $college_manpower_dawat['abedon_pres_num']))?$college_manpower_dawat['abedon_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_bri_mu" data-title="Enter">
										<?php echo $abedon_bri_mu=  (isset( $college_manpower_dawat['abedon_bri_mu']))?$college_manpower_dawat['abedon_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_ssc_a_plus" data-title="Enter">
										<?php echo $abedon_ssc_a_plus=  (isset( $college_manpower_dawat['abedon_ssc_a_plus']))?$college_manpower_dawat['abedon_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_ssc_a_grade" data-title="Enter">
										<?php echo $abedon_ssc_a_grade=  (isset( $college_manpower_dawat['abedon_ssc_a_grade']))?$college_manpower_dawat['abedon_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_science" data-title="Enter">
										<?php echo $abedon_science=  (isset( $college_manpower_dawat['abedon_science']))?$college_manpower_dawat['abedon_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_arts" data-title="Enter">
										<?php echo $abedon_arts=  (isset( $college_manpower_dawat['abedon_arts']))?$college_manpower_dawat['abedon_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_commerce" data-title="Enter">
										<?php echo $abedon_commerce=  (isset( $college_manpower_dawat['abedon_commerce']))?$college_manpower_dawat['abedon_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_poli" data-title="Enter">
										<?php echo $abedon_poli=  (isset( $college_manpower_dawat['abedon_poli']))?$college_manpower_dawat['abedon_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_marine_ins" data-title="Enter">
										<?php echo $abedon_marine_ins=  (isset( $college_manpower_dawat['abedon_marine_ins']))?$college_manpower_dawat['abedon_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_text_ins" data-title="Enter">
										<?php echo $abedon_text_ins=  (isset( $college_manpower_dawat['abedon_text_ins']))?$college_manpower_dawat['abedon_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_agri_ins" data-title="Enter">
										<?php echo $abedon_agri_ins=  (isset( $college_manpower_dawat['abedon_agri_ins']))?$college_manpower_dawat['abedon_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_hit_ins" data-title="Enter">
										<?php echo $abedon_hit_ins=  (isset( $college_manpower_dawat['abedon_hit_ins']))?$college_manpower_dawat['abedon_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abedon_mats_ins" data-title="Enter">
										<?php echo $abedon_mats_ins=  (isset( $college_manpower_dawat['abedon_mats_ins']))?$college_manpower_dawat['abedon_mats_ins']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_pres_num" data-title="Enter">
										<?php echo $sathi_pres_num=  (isset( $college_manpower_dawat['sathi_pres_num']))?$college_manpower_dawat['sathi_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_bri_mu" data-title="Enter">
										<?php echo $sathi_bri_mu=  (isset( $college_manpower_dawat['sathi_bri_mu']))?$college_manpower_dawat['sathi_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_ssc_a_plus" data-title="Enter">
										<?php echo $sathi_ssc_a_plus=  (isset( $college_manpower_dawat['sathi_ssc_a_plus']))?$college_manpower_dawat['sathi_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_ssc_a_grade" data-title="Enter">
										<?php echo $sathi_ssc_a_grade=  (isset( $college_manpower_dawat['sathi_ssc_a_grade']))?$college_manpower_dawat['sathi_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_science" data-title="Enter">
										<?php echo $sathi_science=  (isset( $college_manpower_dawat['sathi_science']))?$college_manpower_dawat['sathi_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_arts" data-title="Enter">
										<?php echo $sathi_arts=  (isset( $college_manpower_dawat['sathi_arts']))?$college_manpower_dawat['sathi_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_commerce" data-title="Enter">
										<?php echo $sathi_commerce=  (isset( $college_manpower_dawat['sathi_commerce']))?$college_manpower_dawat['sathi_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_poli" data-title="Enter">
										<?php echo $sathi_poli=  (isset( $college_manpower_dawat['sathi_poli']))?$college_manpower_dawat['sathi_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_marine_ins" data-title="Enter">
										<?php echo $sathi_marine_ins=  (isset( $college_manpower_dawat['sathi_marine_ins']))?$college_manpower_dawat['sathi_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_text_ins" data-title="Enter">
										<?php echo $sathi_text_ins=  (isset( $college_manpower_dawat['sathi_text_ins']))?$college_manpower_dawat['sathi_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_agri_ins" data-title="Enter">
										<?php echo $sathi_agri_ins=  (isset( $college_manpower_dawat['sathi_agri_ins']))?$college_manpower_dawat['sathi_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_hit_ins" data-title="Enter">
										<?php echo $sathi_hit_ins=  (isset( $college_manpower_dawat['sathi_hit_ins']))?$college_manpower_dawat['sathi_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_mats_ins" data-title="Enter">
										<?php echo $sathi_mats_ins=  (isset( $college_manpower_dawat['sathi_mats_ins']))?$college_manpower_dawat['sathi_mats_ins']:0; ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> সাথী প্রার্থী 	</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_pres_num" data-title="Enter">
										<?php echo $sathi_prarthi_pres_num=  (isset( $college_manpower_dawat['sathi_prarthi_pres_num']))?$college_manpower_dawat['sathi_prarthi_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_bri_mu" data-title="Enter">
										<?php echo $sathi_prarthi_bri_mu=  (isset( $college_manpower_dawat['sathi_prarthi_bri_mu']))?$college_manpower_dawat['sathi_prarthi_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_ssc_a_plus" data-title="Enter">
										<?php echo $sathi_prarthi_ssc_a_plus=  (isset( $college_manpower_dawat['sathi_prarthi_ssc_a_plus']))?$college_manpower_dawat['sathi_prarthi_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_ssc_a_grade" data-title="Enter">
										<?php echo $sathi_prarthi_ssc_a_grade=  (isset( $college_manpower_dawat['sathi_prarthi_ssc_a_grade']))?$college_manpower_dawat['sathi_prarthi_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_science" data-title="Enter">
										<?php echo $sathi_prarthi_science=  (isset( $college_manpower_dawat['sathi_prarthi_science']))?$college_manpower_dawat['sathi_prarthi_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_arts" data-title="Enter">
										<?php echo $sathi_prarthi_arts=  (isset( $college_manpower_dawat['sathi_prarthi_arts']))?$college_manpower_dawat['sathi_prarthi_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_commerce" data-title="Enter">
										<?php echo $sathi_prarthi_commerce=  (isset( $college_manpower_dawat['sathi_prarthi_commerce']))?$college_manpower_dawat['sathi_prarthi_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_poli" data-title="Enter">
										<?php echo $sathi_prarthi_poli=  (isset( $college_manpower_dawat['sathi_prarthi_poli']))?$college_manpower_dawat['sathi_prarthi_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_marine_ins" data-title="Enter">
										<?php echo $sathi_prarthi_marine_ins=  (isset( $college_manpower_dawat['sathi_prarthi_marine_ins']))?$college_manpower_dawat['sathi_prarthi_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_text_ins" data-title="Enter">
										<?php echo $sathi_prarthi_text_ins=  (isset( $college_manpower_dawat['sathi_prarthi_text_ins']))?$college_manpower_dawat['sathi_prarthi_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_agri_ins" data-title="Enter">
										<?php echo $sathi_prarthi_agri_ins=  (isset( $college_manpower_dawat['sathi_prarthi_agri_ins']))?$college_manpower_dawat['sathi_prarthi_agri_ins']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_hit_ins" data-title="Enter">
										<?php echo $sathi_prarthi_hit_ins=  (isset( $college_manpower_dawat['sathi_prarthi_hit_ins']))?$college_manpower_dawat['sathi_prarthi_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_prarthi_mats_ins" data-title="Enter">
										<?php echo $sathi_prarthi_mats_ins=  (isset( $college_manpower_dawat['sathi_prarthi_mats_ins']))?$college_manpower_dawat['sathi_prarthi_mats_ins']:0; ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698">কর্মী   </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_pres_num" data-title="Enter">
										<?php echo $kormi_pres_num=  (isset( $college_manpower_dawat['kormi_pres_num']))?$college_manpower_dawat['kormi_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_bri_mu" data-title="Enter">
										<?php echo $kormi_bri_mu=  (isset( $college_manpower_dawat['kormi_bri_mu']))?$college_manpower_dawat['kormi_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_ssc_a_plus" data-title="Enter">
										<?php echo $kormi_ssc_a_plus=  (isset( $college_manpower_dawat['kormi_ssc_a_plus']))?$college_manpower_dawat['kormi_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_ssc_a_grade" data-title="Enter">
										<?php echo $kormi_ssc_a_grade=  (isset( $college_manpower_dawat['kormi_ssc_a_grade']))?$college_manpower_dawat['kormi_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_science" data-title="Enter">
										<?php echo $kormi_science=  (isset( $college_manpower_dawat['kormi_science']))?$college_manpower_dawat['kormi_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_arts" data-title="Enter">
										<?php echo $kormi_arts=  (isset( $college_manpower_dawat['kormi_arts']))?$college_manpower_dawat['kormi_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_commerce" data-title="Enter">
										<?php echo $kormi_commerce=  (isset( $college_manpower_dawat['kormi_commerce']))?$college_manpower_dawat['kormi_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_poli" data-title="Enter">
										<?php echo $kormi_poli=  (isset( $college_manpower_dawat['kormi_poli']))?$college_manpower_dawat['kormi_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_marine_ins" data-title="Enter">
										<?php echo $kormi_marine_ins=  (isset( $college_manpower_dawat['kormi_marine_ins']))?$college_manpower_dawat['kormi_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_text_ins" data-title="Enter">
										<?php echo $kormi_text_ins=  (isset( $college_manpower_dawat['kormi_text_ins']))?$college_manpower_dawat['kormi_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_agri_ins" data-title="Enter">
										<?php echo $kormi_agri_ins=  (isset( $college_manpower_dawat['kormi_agri_ins']))?$college_manpower_dawat['kormi_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_hit_ins" data-title="Enter">
										<?php echo $kormi_hit_ins=  (isset( $college_manpower_dawat['kormi_hit_ins']))?$college_manpower_dawat['kormi_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_mats_ins" data-title="Enter">
										<?php echo $kormi_mats_ins=  (isset( $college_manpower_dawat['kormi_mats_ins']))?$college_manpower_dawat['kormi_mats_ins']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_pres_num" data-title="Enter">
										<?php echo $shomorthok_pres_num=  (isset( $college_manpower_dawat['shomorthok_pres_num']))?$college_manpower_dawat['shomorthok_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_bri_mu" data-title="Enter">
										<?php echo $shomorthok_bri_mu=  (isset( $college_manpower_dawat['shomorthok_bri_mu']))?$college_manpower_dawat['shomorthok_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_ssc_a_plus" data-title="Enter">
										<?php echo $shomorthok_ssc_a_plus=  (isset( $college_manpower_dawat['shomorthok_ssc_a_plus']))?$college_manpower_dawat['shomorthok_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_ssc_a_grade" data-title="Enter">
										<?php echo $shomorthok_ssc_a_grade=  (isset( $college_manpower_dawat['shomorthok_ssc_a_grade']))?$college_manpower_dawat['shomorthok_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_science" data-title="Enter">
										<?php echo $shomorthok_science=  (isset( $college_manpower_dawat['shomorthok_science']))?$college_manpower_dawat['shomorthok_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_arts" data-title="Enter">
										<?php echo $shomorthok_arts=  (isset( $college_manpower_dawat['shomorthok_arts']))?$college_manpower_dawat['shomorthok_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_commerce" data-title="Enter">
										<?php echo $shomorthok_commerce=  (isset( $college_manpower_dawat['shomorthok_commerce']))?$college_manpower_dawat['shomorthok_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_poli" data-title="Enter">
										<?php echo $shomorthok_poli=  (isset( $college_manpower_dawat['shomorthok_poli']))?$college_manpower_dawat['shomorthok_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_marine_ins" data-title="Enter">
										<?php echo $shomorthok_marine_ins=  (isset( $college_manpower_dawat['shomorthok_marine_ins']))?$college_manpower_dawat['shomorthok_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_text_ins" data-title="Enter">
										<?php echo $shomorthok_text_ins=  (isset( $college_manpower_dawat['shomorthok_text_ins']))?$college_manpower_dawat['shomorthok_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_agri_ins" data-title="Enter">
										<?php echo $shomorthok_agri_ins=  (isset( $college_manpower_dawat['shomorthok_agri_ins']))?$college_manpower_dawat['shomorthok_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_hit_ins" data-title="Enter">
										<?php echo $shomorthok_hit_ins=  (isset( $college_manpower_dawat['shomorthok_hit_ins']))?$college_manpower_dawat['shomorthok_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_mats_ins" data-title="Enter">
										<?php echo $shomorthok_mats_ins=  (isset( $college_manpower_dawat['shomorthok_mats_ins']))?$college_manpower_dawat['shomorthok_mats_ins']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_pres_num" data-title="Enter">
										<?php echo $bondhu_pres_num=  (isset( $college_manpower_dawat['bondhu_pres_num']))?$college_manpower_dawat['bondhu_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_bri_mu" data-title="Enter">
										<?php echo $bondhu_bri_mu=  (isset( $college_manpower_dawat['bondhu_bri_mu']))?$college_manpower_dawat['bondhu_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_ssc_a_plus" data-title="Enter">
										<?php echo $bondhu_ssc_a_plus=  (isset( $college_manpower_dawat['bondhu_ssc_a_plus']))?$college_manpower_dawat['bondhu_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_ssc_a_grade" data-title="Enter">
										<?php echo $bondhu_ssc_a_grade=  (isset( $college_manpower_dawat['bondhu_ssc_a_grade']))?$college_manpower_dawat['bondhu_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_science" data-title="Enter">
										<?php echo $bondhu_science=  (isset( $college_manpower_dawat['bondhu_science']))?$college_manpower_dawat['bondhu_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_arts" data-title="Enter">
										<?php echo $bondhu_arts=  (isset( $college_manpower_dawat['bondhu_arts']))?$college_manpower_dawat['bondhu_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_commerce" data-title="Enter">
										<?php echo $bondhu_commerce=  (isset( $college_manpower_dawat['bondhu_commerce']))?$college_manpower_dawat['bondhu_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_poli" data-title="Enter">
										<?php echo $bondhu_poli=  (isset( $college_manpower_dawat['bondhu_poli']))?$college_manpower_dawat['bondhu_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_marine_ins" data-title="Enter">
										<?php echo $bondhu_marine_ins=  (isset( $college_manpower_dawat['bondhu_marine_ins']))?$college_manpower_dawat['bondhu_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_text_ins" data-title="Enter">
										<?php echo $bondhu_text_ins=  (isset( $college_manpower_dawat['bondhu_text_ins']))?$college_manpower_dawat['bondhu_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_agri_ins" data-title="Enter">
										<?php echo $bondhu_agri_ins=  (isset( $college_manpower_dawat['bondhu_agri_ins']))?$college_manpower_dawat['bondhu_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_hit_ins" data-title="Enter">
										<?php echo $bondhu_hit_ins=  (isset( $college_manpower_dawat['bondhu_hit_ins']))?$college_manpower_dawat['bondhu_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bondhu_mats_ins" data-title="Enter">
										<?php echo $bondhu_mats_ins=  (isset( $college_manpower_dawat['bondhu_mats_ins']))?$college_manpower_dawat['bondhu_mats_ins']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_pres_num" data-title="Enter">
										<?php echo $uposhakha_pres_num=  (isset( $college_manpower_dawat['uposhakha_pres_num']))?$college_manpower_dawat['uposhakha_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_bri_mu" data-title="Enter">
										<?php echo $uposhakha_bri_mu=  (isset( $college_manpower_dawat['uposhakha_bri_mu']))?$college_manpower_dawat['uposhakha_bri_mu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_ssc_a_plus" data-title="Enter">
										<?php echo $uposhakha_ssc_a_plus=  (isset( $college_manpower_dawat['uposhakha_ssc_a_plus']))?$college_manpower_dawat['uposhakha_ssc_a_plus']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_ssc_a_grade" data-title="Enter">
										<?php echo $uposhakha_ssc_a_grade=  (isset( $college_manpower_dawat['uposhakha_ssc_a_grade']))?$college_manpower_dawat['uposhakha_ssc_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_science" data-title="Enter">
										<?php echo $uposhakha_science=  (isset( $college_manpower_dawat['uposhakha_science']))?$college_manpower_dawat['uposhakha_science']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_arts" data-title="Enter">
										<?php echo $uposhakha_arts=  (isset( $college_manpower_dawat['uposhakha_arts']))?$college_manpower_dawat['uposhakha_arts']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_commerce" data-title="Enter">
										<?php echo $uposhakha_commerce=  (isset( $college_manpower_dawat['uposhakha_commerce']))?$college_manpower_dawat['uposhakha_commerce']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_poli" data-title="Enter">
										<?php echo $uposhakha_poli=  (isset( $college_manpower_dawat['uposhakha_poli']))?$college_manpower_dawat['uposhakha_poli']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_marine_ins" data-title="Enter">
										<?php echo $uposhakha_marine_ins=  (isset( $college_manpower_dawat['uposhakha_marine_ins']))?$college_manpower_dawat['uposhakha_marine_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_text_ins" data-title="Enter">
										<?php echo $uposhakha_text_ins=  (isset( $college_manpower_dawat['uposhakha_text_ins']))?$college_manpower_dawat['uposhakha_text_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_agri_ins" data-title="Enter">
										<?php echo $uposhakha_agri_ins=  (isset( $college_manpower_dawat['uposhakha_agri_ins']))?$college_manpower_dawat['uposhakha_agri_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_hit_ins" data-title="Enter">
										<?php echo $uposhakha_hit_ins=  (isset( $college_manpower_dawat['uposhakha_hit_ins']))?$college_manpower_dawat['uposhakha_hit_ins']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_manpower_dawat" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposhakha_mats_ins" data-title="Enter">
										<?php echo $uposhakha_mats_ins=  (isset( $college_manpower_dawat['uposhakha_mats_ins']))?$college_manpower_dawat['uposhakha_mats_ins']:0; ?></a>
                                </td>
                            </tr>

                        </table>

                        <!-- second table -->
                        <table class="tg table table-header-rotated" id="testTable2">
                          <tr>
                          <td class="tg-pwj7" colspan="5"><b>আকর্ষণীয় প্রোগ্রাম  : (ইন্টারমিডিয়েট/ ডিপ্লোমা / পলিটেকনিক শিক্ষার্থীদের নিয়ে ) </b></td>
                            <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'College_আকর্ষণীয় প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                          </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span> প্রোগ্রামের ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত</span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রোগ্রামের ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত </span></div></td>
                            </tr>

							<?php $pk = (isset($college_akorshon_program['id']))?$college_akorshon_program['id']:'';?>
                            <tr>
                                <td class="tg-0pky  type_7">
                                    নবীন বরণ
                                </td>
                                <td class="tg-0pky  type_12">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nobinboron_num" data-title="Enter">
										<?php echo $nobinboron_num=  (isset( $college_akorshon_program['nobinboron_num']))?$college_akorshon_program['nobinboron_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nobinboron_pre" data-title="Enter">
										<?php echo $nobinboron_pre=  (isset( $college_akorshon_program['nobinboron_pre']))?$college_akorshon_program['nobinboron_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    ক্যারিয়ার কাউন্সেলিং
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="c_council_num" data-title="Enter">
										<?php echo $c_council_num=  (isset( $college_akorshon_program['c_council_num']))?$college_akorshon_program['c_council_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="c_council_pre" data-title="Enter">
										<?php echo $c_council_pre=  (isset( $college_akorshon_program['c_council_pre']))?$college_akorshon_program['c_council_pre']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">
                                    শিক্ষাসফর
                                </td>
                                <td class="tg-0pky">
                                
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                   data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                   data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                   data-name="edu_tour_num" data-title="Enter">
									<?php echo $edu_tour_num=  (isset( $college_akorshon_program['edu_tour_num']))?$college_akorshon_program['edu_tour_num']:0; ?></a>
                                
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                   data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                   data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                   data-name="edu_tour_pre" data-title="Enter">
									<?php echo $edu_tour_pre=  (isset( $college_akorshon_program['edu_tour_pre']))?$college_akorshon_program['edu_tour_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    ক্যারিয়ার গাইডলাইন
                                </td>
                                <td class="tg-0pky  type_11">
                                
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                   data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                   data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                   data-name="c_guideline_num" data-title="Enter">
									<?php echo $c_guideline_num=  (isset( $college_akorshon_program['c_guideline_num']))?$college_akorshon_program['c_guideline_num']:0; ?></a>
                                
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                   data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                   data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                   data-name="c_guideline_pre" data-title="Enter">
									<?php echo $c_guideline_pre=  (isset( $college_akorshon_program['c_guideline_pre']))?$college_akorshon_program['c_guideline_pre']:0; ?></a>
                                </td>
                                </tr>
                            <tr>
                                <td class="tg-0pky">
                                    কৃতি ছাত্র সংবর্ধনা
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kriti_stu_num" data-title="Enter">
										<?php echo $kriti_stu_num=  (isset( $college_akorshon_program['kriti_stu_num']))?$college_akorshon_program['kriti_stu_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kriti_stu_pre" data-title="Enter">
										<?php echo $kriti_stu_pre=  (isset( $college_akorshon_program['kriti_stu_pre']))?$college_akorshon_program['kriti_stu_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                ক্রিয়েটিভিটি সার্চ প্রোগ্রাম
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="creative_search_program_num" data-title="Enter">
										<?php echo $creative_search_program_num=  (isset( $college_akorshon_program['creative_search_program_num']))?$college_akorshon_program['creative_search_program_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="creative_search_program_pre" data-title="Enter">
										<?php echo $creative_search_program_pre=  (isset( $college_akorshon_program['creative_search_program_pre']))?$college_akorshon_program['creative_search_program_pre']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky">
                                    কুইজ প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="quiz_num" data-title="Enter">
										<?php echo $quiz_num=  (isset( $college_akorshon_program['quiz_num']))?$college_akorshon_program['quiz_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="quiz_pre" data-title="Enter">
										<?php echo $quiz_pre=  (isset( $college_akorshon_program['quiz_pre']))?$college_akorshon_program['quiz_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    সায়েন্স অলিম্পিয়াড
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sceience_olympiad_num" data-title="Enter">
										<?php echo $sceience_olympiad_num=  (isset( $college_akorshon_program['sceience_olympiad_num']))?$college_akorshon_program['sceience_olympiad_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sceience_olympiad_pre" data-title="Enter">
										<?php echo $sceience_olympiad_pre=  (isset( $college_akorshon_program['sceience_olympiad_pre']))?$college_akorshon_program['sceience_olympiad_pre']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_7">
                                    অদম্য সংবর্ধনা
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="odommo_num" data-title="Enter">
										<?php echo $odommo_num=  (isset( $college_akorshon_program['odommo_num']))?$college_akorshon_program['odommo_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="odommo_pre" data-title="Enter">
										<?php echo $odommo_pre=  (isset( $college_akorshon_program['odommo_pre']))?$college_akorshon_program['odommo_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    ম্যাথ অলিম্পিয়াড
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="math_olympiad_num" data-title="Enter">
										<?php echo $math_olympiad_num=  (isset( $college_akorshon_program['math_olympiad_num']))?$college_akorshon_program['math_olympiad_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="math_olympiad_pre" data-title="Enter">
										<?php echo $math_olympiad_pre=  (isset( $college_akorshon_program['math_olympiad_pre']))?$college_akorshon_program['math_olympiad_pre']:0; ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky  type_7">
                                    শিক্ষা উপকরণ বিতরণ
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="edu_upokoron_num" data-title="Enter">
										<?php echo $edu_upokoron_num=  (isset( $college_akorshon_program['edu_upokoron_num']))?$college_akorshon_program['edu_upokoron_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="edu_upokoron_pre" data-title="Enter">
										<?php echo $edu_upokoron_pre=  (isset( $college_akorshon_program['edu_upokoron_pre']))?$college_akorshon_program['edu_upokoron_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    দিবস পালন
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="dibos_palon_num" data-title="Enter">
										<?php echo $dibos_palon_num=  (isset( $college_akorshon_program['dibos_palon_num']))?$college_akorshon_program['dibos_palon_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="dibos_palon_pre" data-title="Enter">
										<?php echo $dibos_palon_pre=  (isset( $college_akorshon_program['dibos_palon_pre']))?$college_akorshon_program['dibos_palon_pre']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">
                                    বিতর্ক প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bitorko_num" data-title="Enter">
										<?php echo $bitorko_num=  (isset( $college_akorshon_program['bitorko_num']))?$college_akorshon_program['bitorko_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bitorko_pre" data-title="Enter">
										<?php echo $bitorko_pre=  (isset( $college_akorshon_program['bitorko_pre']))?$college_akorshon_program['bitorko_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    মডেল টেস্ট
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="model_test_num" data-title="Enter">
										<?php echo $model_test_num=  (isset( $college_akorshon_program['model_test_num']))?$college_akorshon_program['model_test_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="model_test_pre" data-title="Enter">
										<?php echo $model_test_pre=  (isset( $college_akorshon_program['model_test_pre']))?$college_akorshon_program['model_test_pre']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">
                                    ক্রীড়া প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kria_num" data-title="Enter">
										<?php echo $kria_num=  (isset( $college_akorshon_program['kria_num']))?$college_akorshon_program['kria_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kria_pre" data-title="Enter">
										<?php echo $kria_pre=  (isset( $college_akorshon_program['kria_pre']))?$college_akorshon_program['kria_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    ভাষা শিক্ষা কোর্স
                                </td>
                                <td class="tg-0pky  type_11">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="language_num" data-title="Enter">
										<?php echo $language_num=  (isset( $college_akorshon_program['language_num']))?$college_akorshon_program['language_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_akorshon_program" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="language_pre" data-title="Enter">
										<?php echo $language_pre=  (isset( $college_akorshon_program['language_pre']))?$college_akorshon_program['language_pre']:0; ?></a>
                                </td>
                            </tr>

                        </table>

                        <!-- third table -->
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="16"><b>এইচএসসি ফলাফল পরিসংখ্যান  </b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'College_এইচএসসি ফলাফল পরিসংখ্যান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ক্রম</td>

                                <td class="tg-pwj7" colspan="2">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="2">মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" colspan="2">  জিপিএ 5</td>
                                <td class="tg-pwj7" colspan="2"> এ গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">এ- গ্রেড  </td>
                                <td class="tg-pwj7" colspan="2">বি গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">সি গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">ডি গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">মোট</td>
                            </tr>

							<?php $pk = (isset($college_hsc_result['id']))?$college_hsc_result['id']:'';?>

                            <tr>
                                <td class="tg-y698 type_1"rowspan="3"> ১	</td>
                                <td class="tg-y698 type_1" rowspan="3"> সদস্য	</td>
                                <td class="tg-0pky" >বিজ্ঞান </td>
                                <td class="tg-0pky" colspan="2" >
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_mot_examine" data-title="Enter">
										<?php echo $shodossho_s_mot_examine=  (isset( $college_hsc_result['shodossho_s_mot_examine']))?$college_hsc_result['shodossho_s_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_gpa_5" data-title="Enter">
										<?php echo $shodossho_s_gpa_5=  (isset( $college_hsc_result['shodossho_s_gpa_5']))?$college_hsc_result['shodossho_s_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_a_grade" data-title="Enter">
										<?php echo $shodossho_s_a_grade=  (isset( $college_hsc_result['shodossho_s_a_grade']))?$college_hsc_result['shodossho_s_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_a_minus" data-title="Enter">
										<?php echo $shodossho_s_a_minus=  (isset( $college_hsc_result['shodossho_s_a_minus']))?$college_hsc_result['shodossho_s_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_b_grade" data-title="Enter">
										<?php echo $shodossho_s_b_grade=  (isset( $college_hsc_result['shodossho_s_b_grade']))?$college_hsc_result['shodossho_s_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_c_grade" data-title="Enter">
										<?php echo $shodossho_s_c_grade=  (isset( $college_hsc_result['shodossho_s_c_grade']))?$college_hsc_result['shodossho_s_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_s_d_grade" data-title="Enter">
										<?php echo $shodossho_s_d_grade=  (isset( $college_hsc_result['shodossho_s_d_grade']))?$college_hsc_result['shodossho_s_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $shodossho_s_total_pass=($shodossho_s_gpa_5+$shodossho_s_a_grade+$shodossho_s_a_minus+$shodossho_s_b_grade+$shodossho_s_c_grade+$shodossho_s_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >মানবিক </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_mot_examine" data-title="Enter">
										<?php echo $shodossho_a_mot_examine=  (isset( $college_hsc_result['shodossho_a_mot_examine']))?$college_hsc_result['shodossho_a_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_gpa_5" data-title="Enter">
										<?php echo $shodossho_a_gpa_5=  (isset( $college_hsc_result['shodossho_a_gpa_5']))?$college_hsc_result['shodossho_a_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_a_grade" data-title="Enter">
										<?php echo $shodossho_a_a_grade=  (isset( $college_hsc_result['shodossho_a_a_grade']))?$college_hsc_result['shodossho_a_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_a_minus" data-title="Enter">
										<?php echo $shodossho_a_a_minus=  (isset( $college_hsc_result['shodossho_a_a_minus']))?$college_hsc_result['shodossho_a_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_b_grade" data-title="Enter">
										<?php echo $shodossho_a_b_grade=  (isset( $college_hsc_result['shodossho_a_b_grade']))?$college_hsc_result['shodossho_a_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_c_grade" data-title="Enter">
										<?php echo $shodossho_a_c_grade=  (isset( $college_hsc_result['shodossho_a_c_grade']))?$college_hsc_result['shodossho_a_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_a_d_grade" data-title="Enter">
										<?php echo $shodossho_a_d_grade=  (isset( $college_hsc_result['shodossho_a_d_grade']))?$college_hsc_result['shodossho_a_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $shodossho_a_total_pass=($shodossho_a_gpa_5+$shodossho_a_a_grade+$shodossho_a_a_minus+$shodossho_a_b_grade+$shodossho_a_c_grade+$shodossho_a_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >ব্যবসায় </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_mot_examine" data-title="Enter">
										<?php echo $shodossho_c_mot_examine=  (isset( $college_hsc_result['shodossho_c_mot_examine']))?$college_hsc_result['shodossho_c_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_gpa_5" data-title="Enter">
										<?php echo $shodossho_c_gpa_5=  (isset( $college_hsc_result['shodossho_c_gpa_5']))?$college_hsc_result['shodossho_c_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_a_grade" data-title="Enter">
										<?php echo $shodossho_c_a_grade=  (isset( $college_hsc_result['shodossho_c_a_grade']))?$college_hsc_result['shodossho_c_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_a_minus" data-title="Enter">
										<?php echo $shodossho_c_a_minus=  (isset( $college_hsc_result['shodossho_c_a_minus']))?$college_hsc_result['shodossho_c_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_b_grade" data-title="Enter">
										<?php echo $shodossho_c_b_grade=  (isset( $college_hsc_result['shodossho_c_b_grade']))?$college_hsc_result['shodossho_c_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_c_grade" data-title="Enter">
										<?php echo $shodossho_c_c_grade=  (isset( $college_hsc_result['shodossho_c_c_grade']))?$college_hsc_result['shodossho_c_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shodossho_c_d_grade" data-title="Enter">
										<?php echo $shodossho_c_d_grade=  (isset( $college_hsc_result['shodossho_c_d_grade']))?$college_hsc_result['shodossho_c_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $shodossho_c_total_pass=($shodossho_c_gpa_5+$shodossho_c_a_grade+$shodossho_c_a_minus+$shodossho_c_b_grade+$shodossho_c_c_grade+$shodossho_c_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"rowspan="3"> ২	</td>
                                <td class="tg-y698 type_1" rowspan="3"> সাথী	</td>
                                <td class="tg-0pky" >বিজ্ঞান </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_mot_examine" data-title="Enter">
										<?php echo $sathi_s_mot_examine=  (isset( $college_hsc_result['sathi_s_mot_examine']))?$college_hsc_result['sathi_s_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_gpa_5" data-title="Enter">
										<?php echo $sathi_s_gpa_5=  (isset( $college_hsc_result['sathi_s_gpa_5']))?$college_hsc_result['sathi_s_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_a_grade" data-title="Enter">
										<?php echo $sathi_s_a_grade=  (isset( $college_hsc_result['sathi_s_a_grade']))?$college_hsc_result['sathi_s_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_a_minus" data-title="Enter">
										<?php echo $sathi_s_a_minus=  (isset( $college_hsc_result['sathi_s_a_minus']))?$college_hsc_result['sathi_s_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_b_grade" data-title="Enter">
										<?php echo $sathi_s_b_grade=  (isset( $college_hsc_result['sathi_s_b_grade']))?$college_hsc_result['sathi_s_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_c_grade" data-title="Enter">
										<?php echo $sathi_s_c_grade=  (isset( $college_hsc_result['sathi_s_c_grade']))?$college_hsc_result['sathi_s_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_s_d_grade" data-title="Enter">
										<?php echo $sathi_s_d_grade=  (isset( $college_hsc_result['sathi_s_d_grade']))?$college_hsc_result['sathi_s_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $sathi_s_total_pass=($sathi_s_gpa_5+$sathi_s_a_grade+$sathi_s_a_minus+$sathi_s_b_grade+$sathi_s_c_grade+$sathi_s_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >মানবিক </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_mot_examine" data-title="Enter">
										<?php echo $sathi_a_mot_examine=  (isset( $college_hsc_result['sathi_a_mot_examine']))?$college_hsc_result['sathi_a_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_gpa_5" data-title="Enter">
										<?php echo $sathi_a_gpa_5=  (isset( $college_hsc_result['sathi_a_gpa_5']))?$college_hsc_result['sathi_a_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_a_grade" data-title="Enter">
										<?php echo $sathi_a_a_grade=  (isset( $college_hsc_result['sathi_a_a_grade']))?$college_hsc_result['sathi_a_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_a_minus" data-title="Enter">
										<?php echo $sathi_a_a_minus=  (isset( $college_hsc_result['sathi_a_a_minus']))?$college_hsc_result['sathi_a_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_b_grade" data-title="Enter">
										<?php echo $sathi_a_b_grade=  (isset( $college_hsc_result['sathi_a_b_grade']))?$college_hsc_result['sathi_a_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_c_grade" data-title="Enter">
										<?php echo $sathi_a_c_grade=  (isset( $college_hsc_result['sathi_a_c_grade']))?$college_hsc_result['sathi_a_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_a_d_grade" data-title="Enter">
										<?php echo $sathi_a_d_grade=  (isset( $college_hsc_result['sathi_a_d_grade']))?$college_hsc_result['sathi_a_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $sathi_a_total_pass=($sathi_a_gpa_5+$sathi_a_a_grade+$sathi_a_a_minus+$sathi_a_b_grade+$sathi_a_c_grade+$sathi_a_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >ব্যবসায় </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_mot_examine" data-title="Enter">
										<?php echo $sathi_c_mot_examine=  (isset( $college_hsc_result['sathi_c_mot_examine']))?$college_hsc_result['sathi_c_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_gpa_5" data-title="Enter">
										<?php echo $sathi_c_gpa_5=  (isset( $college_hsc_result['sathi_c_gpa_5']))?$college_hsc_result['sathi_c_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_a_grade" data-title="Enter">
										<?php echo $sathi_c_a_grade=  (isset( $college_hsc_result['sathi_c_a_grade']))?$college_hsc_result['sathi_c_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_a_minus" data-title="Enter">
										<?php echo $sathi_c_a_minus=  (isset( $college_hsc_result['sathi_c_a_minus']))?$college_hsc_result['sathi_c_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_b_grade" data-title="Enter">
										<?php echo $sathi_c_b_grade=  (isset( $college_hsc_result['sathi_c_b_grade']))?$college_hsc_result['sathi_c_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_c_grade" data-title="Enter">
										<?php echo $sathi_c_c_grade=  (isset( $college_hsc_result['sathi_c_c_grade']))?$college_hsc_result['sathi_c_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_c_d_grade" data-title="Enter">
										<?php echo $sathi_c_d_grade=  (isset( $college_hsc_result['sathi_c_d_grade']))?$college_hsc_result['sathi_c_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $sathi_c_total_pass=($sathi_c_gpa_5+$sathi_c_a_grade+$sathi_c_a_minus+$sathi_c_b_grade+$sathi_c_c_grade+$sathi_c_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"rowspan="3"> ৩	</td>
                                <td class="tg-y698 type_1" rowspan="3"> কর্মী	</td>
                                <td class="tg-0pky" >বিজ্ঞান </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_mot_examine" data-title="Enter">
										<?php echo $kormi_s_mot_examine=  (isset( $college_hsc_result['kormi_s_mot_examine']))?$college_hsc_result['kormi_s_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_gpa_5" data-title="Enter">
										<?php echo $kormi_s_gpa_5=  (isset( $college_hsc_result['kormi_s_gpa_5']))?$college_hsc_result['kormi_s_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_a_grade" data-title="Enter">
										<?php echo $kormi_s_a_grade=  (isset( $college_hsc_result['kormi_s_a_grade']))?$college_hsc_result['kormi_s_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_a_minus" data-title="Enter">
										<?php echo $kormi_s_a_minus=  (isset( $college_hsc_result['kormi_s_a_minus']))?$college_hsc_result['kormi_s_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_b_grade" data-title="Enter">
										<?php echo $kormi_s_b_grade=  (isset( $college_hsc_result['kormi_s_b_grade']))?$college_hsc_result['kormi_s_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_c_grade" data-title="Enter">
										<?php echo $kormi_s_c_grade=  (isset( $college_hsc_result['kormi_s_c_grade']))?$college_hsc_result['kormi_s_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_s_d_grade" data-title="Enter">
										<?php echo $kormi_s_d_grade=  (isset( $college_hsc_result['kormi_s_d_grade']))?$college_hsc_result['kormi_s_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $kormi_s_total_pass=($kormi_s_gpa_5+$kormi_s_a_grade+$kormi_s_a_minus+$kormi_s_b_grade+$kormi_s_c_grade+$kormi_s_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >মানবিক </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_mot_examine" data-title="Enter">
										<?php echo $kormi_a_mot_examine=  (isset( $college_hsc_result['kormi_a_mot_examine']))?$college_hsc_result['kormi_a_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_gpa_5" data-title="Enter">
										<?php echo $kormi_a_gpa_5=  (isset( $college_hsc_result['kormi_a_gpa_5']))?$college_hsc_result['kormi_a_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_a_grade" data-title="Enter">
										<?php echo $kormi_a_a_grade=  (isset( $college_hsc_result['kormi_a_a_grade']))?$college_hsc_result['kormi_a_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_a_minus" data-title="Enter">
										<?php echo $kormi_a_a_minus=  (isset( $college_hsc_result['kormi_a_a_minus']))?$college_hsc_result['kormi_a_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_b_grade" data-title="Enter">
										<?php echo $kormi_a_b_grade=  (isset( $college_hsc_result['kormi_a_b_grade']))?$college_hsc_result['kormi_a_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_c_grade" data-title="Enter">
										<?php echo $kormi_a_c_grade=  (isset( $college_hsc_result['kormi_a_c_grade']))?$college_hsc_result['kormi_a_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_a_d_grade" data-title="Enter">
										<?php echo $kormi_a_d_grade=  (isset( $college_hsc_result['kormi_a_d_grade']))?$college_hsc_result['kormi_a_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $kormi_a_total_pass=($kormi_a_gpa_5+$kormi_a_a_grade+$kormi_a_a_minus+$kormi_a_b_grade+$kormi_a_c_grade+$kormi_a_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >ব্যবসায় </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_mot_examine" data-title="Enter">
										<?php echo $kormi_c_mot_examine=  (isset( $college_hsc_result['kormi_c_mot_examine']))?$college_hsc_result['kormi_c_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_gpa_5" data-title="Enter">
										<?php echo $kormi_c_gpa_5=  (isset( $college_hsc_result['kormi_c_gpa_5']))?$college_hsc_result['kormi_c_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_a_grade" data-title="Enter">
										<?php echo $kormi_c_a_grade=  (isset( $college_hsc_result['kormi_c_a_grade']))?$college_hsc_result['kormi_c_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_a_minus" data-title="Enter">
										<?php echo $kormi_c_a_minus=  (isset( $college_hsc_result['kormi_c_a_minus']))?$college_hsc_result['kormi_c_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_b_grade" data-title="Enter">
										<?php echo $kormi_c_b_grade=  (isset( $college_hsc_result['kormi_c_b_grade']))?$college_hsc_result['kormi_c_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_c_grade" data-title="Enter">
										<?php echo $kormi_c_c_grade=  (isset( $college_hsc_result['kormi_c_c_grade']))?$college_hsc_result['kormi_c_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_c_d_grade" data-title="Enter">
										<?php echo $kormi_c_d_grade=  (isset( $college_hsc_result['kormi_c_d_grade']))?$college_hsc_result['kormi_c_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $kormi_c_total_pass=($kormi_c_gpa_5+$kormi_c_a_grade+$kormi_c_a_minus+$kormi_c_b_grade+$kormi_c_c_grade+$kormi_c_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"rowspan="3"> ৪	</td>
                                <td class="tg-y698 type_1" rowspan="3"> সমর্থক	</td>
                                <td class="tg-0pky" >বিজ্ঞান </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_mot_examine" data-title="Enter">
										<?php echo $shomorthok_s_mot_examine=  (isset( $college_hsc_result['shomorthok_s_mot_examine']))?$college_hsc_result['shomorthok_s_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_gpa_5" data-title="Enter">
										<?php echo $shomorthok_s_gpa_5=  (isset( $college_hsc_result['shomorthok_s_gpa_5']))?$college_hsc_result['shomorthok_s_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_a_grade" data-title="Enter">
										<?php echo $shomorthok_s_a_grade=  (isset( $college_hsc_result['shomorthok_s_a_grade']))?$college_hsc_result['shomorthok_s_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_a_minus" data-title="Enter">
										<?php echo $shomorthok_s_a_minus=  (isset( $college_hsc_result['shomorthok_s_a_minus']))?$college_hsc_result['shomorthok_s_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_b_grade" data-title="Enter">
										<?php echo $shomorthok_s_b_grade=  (isset( $college_hsc_result['shomorthok_s_b_grade']))?$college_hsc_result['shomorthok_s_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_c_grade" data-title="Enter">
										<?php echo $shomorthok_s_c_grade=  (isset( $college_hsc_result['shomorthok_s_c_grade']))?$college_hsc_result['shomorthok_s_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_s_d_grade" data-title="Enter">
										<?php echo $shomorthok_s_d_grade=  (isset( $college_hsc_result['shomorthok_s_d_grade']))?$college_hsc_result['shomorthok_s_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $shomorthok_s_total_pass=($shomorthok_s_gpa_5+$shomorthok_s_a_grade+$shomorthok_s_a_minus+$shomorthok_s_b_grade+$shomorthok_s_c_grade+$shomorthok_s_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >মানবিক </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_mot_examine" data-title="Enter">
										<?php echo $shomorthok_a_mot_examine=  (isset( $college_hsc_result['shomorthok_a_mot_examine']))?$college_hsc_result['shomorthok_a_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_gpa_5" data-title="Enter">
										<?php echo $shomorthok_a_gpa_5=  (isset( $college_hsc_result['shomorthok_a_gpa_5']))?$college_hsc_result['shomorthok_a_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_a_grade" data-title="Enter">
										<?php echo $shomorthok_a_a_grade=  (isset( $college_hsc_result['shomorthok_a_a_grade']))?$college_hsc_result['shomorthok_a_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_a_minus" data-title="Enter">
										<?php echo $shomorthok_a_a_minus=  (isset( $college_hsc_result['shomorthok_a_a_minus']))?$college_hsc_result['shomorthok_a_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_b_grade" data-title="Enter">
										<?php echo $shomorthok_a_b_grade=  (isset( $college_hsc_result['shomorthok_a_b_grade']))?$college_hsc_result['shomorthok_a_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_c_grade" data-title="Enter">
										<?php echo $shomorthok_a_c_grade=  (isset( $college_hsc_result['shomorthok_a_c_grade']))?$college_hsc_result['shomorthok_a_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_a_d_grade" data-title="Enter">
										<?php echo $shomorthok_a_d_grade=  (isset( $college_hsc_result['shomorthok_a_d_grade']))?$college_hsc_result['shomorthok_a_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $shomorthok_a_total_pass=($shomorthok_a_gpa_5+$shomorthok_a_a_grade+$shomorthok_a_a_minus+$shomorthok_a_b_grade+$shomorthok_a_c_grade+$shomorthok_a_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" >ব্যবসায় </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_mot_examine" data-title="Enter">
										<?php echo $shomorthok_c_mot_examine=  (isset( $college_hsc_result['shomorthok_c_mot_examine']))?$college_hsc_result['shomorthok_c_mot_examine']:0; ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_gpa_5" data-title="Enter">
										<?php echo $shomorthok_c_gpa_5=  (isset( $college_hsc_result['shomorthok_c_gpa_5']))?$college_hsc_result['shomorthok_c_gpa_5']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_a_grade" data-title="Enter">
										<?php echo $shomorthok_c_a_grade=  (isset( $college_hsc_result['shomorthok_c_a_grade']))?$college_hsc_result['shomorthok_c_a_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"   colspan="2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_a_minus" data-title="Enter">
										<?php echo $shomorthok_c_a_minus=  (isset( $college_hsc_result['shomorthok_c_a_minus']))?$college_hsc_result['shomorthok_c_a_minus']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_b_grade" data-title="Enter">
										<?php echo $shomorthok_c_b_grade=  (isset( $college_hsc_result['shomorthok_c_b_grade']))?$college_hsc_result['shomorthok_c_b_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_c_grade" data-title="Enter">
										<?php echo $shomorthok_c_c_grade=  (isset( $college_hsc_result['shomorthok_c_c_grade']))?$college_hsc_result['shomorthok_c_c_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_hsc_result" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_c_d_grade" data-title="Enter">
										<?php echo $shomorthok_c_d_grade=  (isset( $college_hsc_result['shomorthok_c_d_grade']))?$college_hsc_result['shomorthok_c_d_grade']:0; ?></a>
                                </td>
                                <td class="tg-0pky"  colspan="2" >
									<?php echo $shomorthok_c_total_pass=($shomorthok_c_gpa_5+$shomorthok_c_a_grade+$shomorthok_c_a_minus+$shomorthok_c_b_grade+$shomorthok_c_c_grade+$shomorthok_c_d_grade)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" colspan="3">মোট</td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $mot_examine=($shodossho_s_mot_examine+$shodossho_a_mot_examine+$shodossho_c_mot_examine+$sathi_s_mot_examine+$sathi_a_mot_examine+$sathi_c_mot_examine+$kormi_s_mot_examine+$kormi_a_mot_examine+$kormi_c_mot_examine+$shomorthok_s_mot_examine+$shomorthok_a_mot_examine+$shomorthok_c_mot_examine)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $gpa_5=($shodossho_s_gpa_5+$shodossho_a_gpa_5+$shodossho_c_gpa_5+$sathi_s_gpa_5+$sathi_a_gpa_5+$sathi_c_gpa_5+$kormi_s_gpa_5+$kormi_a_gpa_5+$kormi_c_gpa_5+$shomorthok_s_gpa_5+$shomorthok_a_gpa_5+$shomorthok_c_gpa_5)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $a_grade=($shodossho_s_a_grade+$shodossho_a_a_grade+$shodossho_c_a_grade+$sathi_s_a_grade+$sathi_a_a_grade+$sathi_c_a_grade+$kormi_s_a_grade+$kormi_a_a_grade+$kormi_c_a_grade+$shomorthok_s_a_grade+$shomorthok_a_a_grade+$shomorthok_c_a_grade)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $a_minus=($shodossho_s_a_minus+$shodossho_a_a_minus+$shodossho_c_a_minus+$sathi_s_a_minus+$sathi_a_a_minus+$sathi_c_a_minus+$kormi_s_a_minus+$kormi_a_a_minus+$kormi_c_a_minus+$shomorthok_s_a_minus+$shomorthok_a_a_minus+$shomorthok_c_a_minus)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $b_grade=($shodossho_s_b_grade+$shodossho_a_b_grade+$shodossho_c_b_grade+$sathi_s_b_grade+$sathi_a_b_grade+$sathi_c_b_grade+$kormi_s_b_grade+$kormi_a_b_grade+$kormi_c_b_grade+$shomorthok_s_b_grade+$shomorthok_a_b_grade+$shomorthok_c_b_grade)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $c_grade=($shodossho_s_c_grade+$shodossho_a_c_grade+$shodossho_c_c_grade+$sathi_s_c_grade+$sathi_a_c_grade+$sathi_c_c_grade+$kormi_s_c_grade+$kormi_a_c_grade+$kormi_c_c_grade+$shomorthok_s_c_grade+$shomorthok_a_c_grade+$shomorthok_c_c_grade)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo $d_grade=($shodossho_s_d_grade+$shodossho_a_d_grade+$shodossho_c_d_grade+$sathi_s_d_grade+$sathi_a_d_grade+$sathi_c_d_grade+$kormi_s_d_grade+$kormi_a_d_grade+$kormi_c_d_grade+$shomorthok_s_d_grade+$shomorthok_a_d_grade+$shomorthok_c_d_grade)?>
                                </td>
                                <td class="tg-0pky"  colspan="2">
									<?php echo ($gpa_5+$a_grade+$a_minus+$b_grade+$c_grade+$d_grade)?>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
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
