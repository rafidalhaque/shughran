<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- <link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/> -->
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'শিক্ষা বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php
            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
                } else {
                    echo anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
                    }
                    ?>

                </ul>
            </span>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> </a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#export_all_table").on("click", function() {
                for (let i = 1; i <= 12; i++) {
                    $("#table_" + i).click();
                }
            });
        });
    </script>
    <style type="text/css">
        #export_all_table {
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
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>শিক্ষা কমিটি</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Education_শিক্ষা কমিটি_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">শাখায় শিক্ষা কমিটি আছে কিনা? </td>
                                <td class="tg-pwj7" rowspan="2" style="text-align:center">শিক্ষা কমিটির সদস্য কত? </td>
                                <td class="tg-pwj7" colspan="2">শিক্ষা কমিটির প্রোগ্রাম </td>
                            </tr>
                            <?php
                            $pk = (isset($education_edu_committee['id'])) ? $education_edu_committee['id'] : '';

                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="" style="text-align:center"> সংখ্যা </td>
                                <td class="tg-pwj7" colspan="" style="text-align:center">উপস্থিতি </td>
                            </tr>

                            <tr>

                                <td class="tg-0pky  type_1">
                                    <a href="#" id="status" data-type="select" data-table="education_edu_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/' . $branch_id); ?>" data-name="edu_committee@education_edu_committee" data-token="<?php echo $this->security->get_csrf_token_name(); ?>" data-title="শাখায় শিক্ষা কমিটি আছে কিনা?">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" id="" data-idname="" data-type="number" data-table="education_edu_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="edu_committee_member" data-title="Enter"><?php echo (isset($education_edu_committee['edu_committee_member'])) ? $education_edu_committee['edu_committee_member'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" id="" data-idname="" data-type="number" data-table="education_edu_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="edu_committee_program_number" data-title="Enter"><?php echo (isset($education_edu_committee['edu_committee_program_number'])) ? $education_edu_committee['edu_committee_program_number'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" id="" data-idname="" data-type="number" data-table="education_edu_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="edu_committee_program_present" data-title="Enter"><?php echo (isset($education_edu_committee['edu_committee_program_present'])) ? $education_edu_committee['edu_committee_program_present'] : 0 ?>
                                    </a>
                                </td>
                            </tr>


                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>একাডেমিক হোম </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Education_আইডিয়াল হোম (একাডেমিক ও প্রফেশনাল)_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">একাডেমিক হোমের ধরন</td>
                                <td class="tg-pwj7" colspan="4" style="text-align:center">হোম সংখ্যা </td>
                                <td class="tg-pwj7" colspan="4" style="text-align:center">ছাত্র সংখ্যা </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>পূর্বের সংখ্যা</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>পূর্বের সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>

                            </tr>
                            <?php
                            $pk = (isset($education_ideal_home['id'])) ? $education_ideal_home['id'] : '';

                            ?>



                            <tr>
                                <td class="tg-y698 type_1">এসএসসি/দাখিল পরীক্ষার্থী </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_h_prev" data-title="Enter"><?php echo $ssc_h_prev = (isset($education_ideal_home['ssc_h_prev'])) ? $education_ideal_home['ssc_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_h_pres" data-title="Enter"><?php echo $ssc_h_pres = (isset($education_ideal_home['ssc_h_pres'])) ? $education_ideal_home['ssc_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_h_bri" data-title="Enter"><?php echo $ssc_h_bri = (isset($education_ideal_home['ssc_h_bri'])) ? $education_ideal_home['ssc_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_h_gha" data-title="Enter"><?php echo $ssc_h_gha = (isset($education_ideal_home['ssc_h_gha'])) ? $education_ideal_home['ssc_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_s_prev" data-title="Enter"><?php echo $ssc_s_prev = (isset($education_ideal_home['ssc_s_prev'])) ? $education_ideal_home['ssc_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_s_pres" data-title="Enter"><?php echo $ssc_s_pres = (isset($education_ideal_home['ssc_s_pres'])) ? $education_ideal_home['ssc_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_s_bri" data-title="Enter"><?php echo $ssc_s_bri = (isset($education_ideal_home['ssc_s_bri'])) ? $education_ideal_home['ssc_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_s_gha" data-title="Enter"><?php echo $ssc_s_gha = (isset($education_ideal_home['ssc_s_gha'])) ? $education_ideal_home['ssc_s_gha'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">এইচএসসি/আলিম একাডেমিক </td>

                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_h_prev" data-title="Enter"><?php echo $hsca_h_prev = (isset($education_ideal_home['hsca_h_prev'])) ? $education_ideal_home['hsca_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_h_pres" data-title="Enter"><?php echo $hsca_h_pres = (isset($education_ideal_home['hsca_h_pres'])) ? $education_ideal_home['hsca_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_h_bri" data-title="Enter"><?php echo $hsca_h_bri = (isset($education_ideal_home['hsca_h_bri'])) ? $education_ideal_home['hsca_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_h_gha" data-title="Enter"><?php echo $hsca_h_gha = (isset($education_ideal_home['hsca_h_gha'])) ? $education_ideal_home['hsca_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_s_prev" data-title="Enter"><?php echo $hsca_s_prev = (isset($education_ideal_home['hsca_s_prev'])) ? $education_ideal_home['hsca_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_s_pres" data-title="Enter"><?php echo $hsca_s_pres = (isset($education_ideal_home['hsca_s_pres'])) ? $education_ideal_home['hsca_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_s_bri" data-title="Enter"><?php echo $hsca_s_bri = (isset($education_ideal_home['hsca_s_bri'])) ? $education_ideal_home['hsca_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsca_s_gha" data-title="Enter"><?php echo $hsca_s_gha = (isset($education_ideal_home['hsca_s_gha'])) ? $education_ideal_home['hsca_s_gha'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">এইচএসসি/আলিম পরীক্ষার্থী </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_h_prev" data-title="Enter"><?php echo $hsc_h_prev = (isset($education_ideal_home['hsc_h_prev'])) ? $education_ideal_home['hsc_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_h_pres" data-title="Enter"><?php echo $hsc_h_pres = (isset($education_ideal_home['hsc_h_pres'])) ? $education_ideal_home['hsc_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_h_bri" data-title="Enter"><?php echo $hsc_h_bri = (isset($education_ideal_home['hsc_h_bri'])) ? $education_ideal_home['hsc_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_h_gha" data-title="Enter"><?php echo $hsc_h_gha = (isset($education_ideal_home['hsc_h_gha'])) ? $education_ideal_home['hsc_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_s_prev" data-title="Enter"><?php echo $hsc_s_prev = (isset($education_ideal_home['hsc_s_prev'])) ? $education_ideal_home['hsc_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_s_pres" data-title="Enter"><?php echo $hsc_s_pres = (isset($education_ideal_home['hsc_s_pres'])) ? $education_ideal_home['hsc_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_s_bri" data-title="Enter"><?php echo $hsc_s_bri = (isset($education_ideal_home['hsc_s_bri'])) ? $education_ideal_home['hsc_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_s_gha" data-title="Enter"><?php echo $hsc_s_gha = (isset($education_ideal_home['hsc_s_gha'])) ? $education_ideal_home['hsc_s_gha'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মেডিকেল ভর্তিচ্ছু </td>

                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_h_prev" data-title="Enter"><?php echo $med_h_prev = (isset($education_ideal_home['med_h_prev'])) ? $education_ideal_home['med_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_h_pres" data-title="Enter"><?php echo $med_h_pres = (isset($education_ideal_home['med_h_pres'])) ? $education_ideal_home['med_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_h_bri" data-title="Enter"><?php echo $med_h_bri = (isset($education_ideal_home['med_h_bri'])) ? $education_ideal_home['med_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_h_gha" data-title="Enter"><?php echo $med_h_gha = (isset($education_ideal_home['med_h_gha'])) ? $education_ideal_home['med_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_s_prev" data-title="Enter"><?php echo $med_s_prev = (isset($education_ideal_home['med_s_prev'])) ? $education_ideal_home['med_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_s_pres" data-title="Enter"><?php echo $med_s_pres = (isset($education_ideal_home['med_s_pres'])) ? $education_ideal_home['med_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_s_bri" data-title="Enter"><?php echo $med_s_bri = (isset($education_ideal_home['med_s_bri'])) ? $education_ideal_home['med_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_s_gha" data-title="Enter"><?php echo $med_s_gha = (isset($education_ideal_home['med_s_gha'])) ? $education_ideal_home['med_s_gha'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ইঞ্জিনিয়ারিং ভর্তিচ্ছু </td>

                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_h_prev" data-title="Enter"><?php echo $eng_h_prev = (isset($education_ideal_home['eng_h_prev'])) ? $education_ideal_home['eng_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_h_pres" data-title="Enter"><?php echo $eng_h_pres = (isset($education_ideal_home['eng_h_pres'])) ? $education_ideal_home['eng_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_h_bri" data-title="Enter"><?php echo $eng_h_bri = (isset($education_ideal_home['eng_h_bri'])) ? $education_ideal_home['eng_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_h_gha" data-title="Enter"><?php echo $eng_h_gha = (isset($education_ideal_home['eng_h_gha'])) ? $education_ideal_home['eng_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_s_prev" data-title="Enter"><?php echo $eng_s_prev = (isset($education_ideal_home['eng_s_prev'])) ? $education_ideal_home['eng_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_s_pres" data-title="Enter"><?php echo $eng_s_pres = (isset($education_ideal_home['eng_s_pres'])) ? $education_ideal_home['eng_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_s_bri" data-title="Enter"><?php echo $eng_s_bri = (isset($education_ideal_home['eng_s_bri'])) ? $education_ideal_home['eng_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="eng_s_gha" data-title="Enter"><?php echo $eng_s_gha = (isset($education_ideal_home['eng_s_gha'])) ? $education_ideal_home['eng_s_gha'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বিশ্ববিদ্যালয় ভর্তিচ্ছু </td>


                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_h_prev" data-title="Enter"><?php echo $uni_h_prev = (isset($education_ideal_home['uni_h_prev'])) ? $education_ideal_home['uni_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_h_pres" data-title="Enter"><?php echo $uni_h_pres = (isset($education_ideal_home['uni_h_pres'])) ? $education_ideal_home['uni_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_h_bri" data-title="Enter"><?php echo $uni_h_bri = (isset($education_ideal_home['uni_h_bri'])) ? $education_ideal_home['uni_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_h_gha" data-title="Enter"><?php echo $uni_h_gha = (isset($education_ideal_home['uni_h_gha'])) ? $education_ideal_home['uni_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_s_prev" data-title="Enter"><?php echo $uni_s_prev = (isset($education_ideal_home['uni_s_prev'])) ? $education_ideal_home['uni_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_s_pres" data-title="Enter"><?php echo $uni_s_pres = (isset($education_ideal_home['uni_s_pres'])) ? $education_ideal_home['uni_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_s_bri" data-title="Enter"><?php echo $uni_s_bri = (isset($education_ideal_home['uni_s_bri'])) ? $education_ideal_home['uni_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_s_gha" data-title="Enter"><?php echo $uni_s_gha = (isset($education_ideal_home['uni_s_gha'])) ? $education_ideal_home['uni_s_gha'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">আদর্শ কলেজ ভর্তিচ্ছু</td>

                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_h_prev" data-title="Enter"><?php echo $ideal_h_prev = (isset($education_ideal_home['ideal_h_prev'])) ? $education_ideal_home['ideal_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_h_pres" data-title="Enter"><?php echo $ideal_h_pres = (isset($education_ideal_home['ideal_h_pres'])) ? $education_ideal_home['ideal_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_h_bri" data-title="Enter"><?php echo $ideal_h_bri = (isset($education_ideal_home['ideal_h_bri'])) ? $education_ideal_home['ideal_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_h_gha" data-title="Enter"><?php echo $ideal_h_gha = (isset($education_ideal_home['ideal_h_gha'])) ? $education_ideal_home['ideal_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_s_prev" data-title="Enter"><?php echo $ideal_s_prev = (isset($education_ideal_home['ideal_s_prev'])) ? $education_ideal_home['ideal_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_s_pres" data-title="Enter"><?php echo $ideal_s_pres = (isset($education_ideal_home['ideal_s_pres'])) ? $education_ideal_home['ideal_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_s_bri" data-title="Enter"><?php echo $ideal_s_bri = (isset($education_ideal_home['ideal_s_bri'])) ? $education_ideal_home['ideal_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_s_gha" data-title="Enter"><?php echo $ideal_s_gha = (isset($education_ideal_home['ideal_s_gha'])) ? $education_ideal_home['ideal_s_gha'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">অনার্সের ছাত্রদের নিয়ে </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_h_prev" data-title="Enter"><?php echo $hons_h_prev = (isset($education_ideal_home['hons_h_prev'])) ? $education_ideal_home['hons_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_h_pres" data-title="Enter"><?php echo $hons_h_pres = (isset($education_ideal_home['hons_h_pres'])) ? $education_ideal_home['hons_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_h_bri" data-title="Enter"><?php echo $hons_h_bri = (isset($education_ideal_home['hons_h_bri'])) ? $education_ideal_home['hons_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_h_gha" data-title="Enter"><?php echo $hons_h_gha = (isset($education_ideal_home['hons_h_gha'])) ? $education_ideal_home['hons_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_s_prev" data-title="Enter"><?php echo $hons_s_prev = (isset($education_ideal_home['hons_s_prev'])) ? $education_ideal_home['hons_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_s_pres" data-title="Enter"><?php echo $hons_s_pres = (isset($education_ideal_home['hons_s_pres'])) ? $education_ideal_home['hons_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_s_bri" data-title="Enter"><?php echo $hons_s_bri = (isset($education_ideal_home['hons_s_bri'])) ? $education_ideal_home['hons_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hons_s_gha" data-title="Enter"><?php echo $hons_s_gha = (isset($education_ideal_home['hons_s_gha'])) ? $education_ideal_home['hons_s_gha'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">বিশ্ববিদ্যালয় শিক্ষক তৈরি </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_h_prev" data-title="Enter"><?php echo $teacher_h_prev = (isset($education_ideal_home['teacher_h_prev'])) ? $education_ideal_home['teacher_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_h_pres" data-title="Enter"><?php echo $teacher_h_pres = (isset($education_ideal_home['teacher_h_pres'])) ? $education_ideal_home['teacher_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_h_bri" data-title="Enter"><?php echo $teacher_h_bri = (isset($education_ideal_home['teacher_h_bri'])) ? $education_ideal_home['teacher_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_h_gha" data-title="Enter"><?php echo $teacher_h_gha = (isset($education_ideal_home['teacher_h_gha'])) ? $education_ideal_home['teacher_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_s_prev" data-title="Enter"><?php echo $teacher_s_prev = (isset($education_ideal_home['teacher_s_prev'])) ? $education_ideal_home['teacher_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_s_pres" data-title="Enter"><?php echo $teacher_s_pres = (isset($education_ideal_home['teacher_s_pres'])) ? $education_ideal_home['teacher_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_s_bri" data-title="Enter"><?php echo $teacher_s_bri = (isset($education_ideal_home['teacher_s_bri'])) ? $education_ideal_home['teacher_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_s_gha" data-title="Enter"><?php echo $teacher_s_gha = (isset($education_ideal_home['teacher_s_gha'])) ? $education_ideal_home['teacher_s_gha'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                           
                            <tr>
                                <td class="tg-y698">সমাজসেবা আইডিয়াল হোম </td>

                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_h_prev" data-title="Enter"><?php echo $s_she_h_prev = (isset($education_ideal_home['s_she_h_prev'])) ? $education_ideal_home['s_she_h_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_h_pres" data-title="Enter"><?php echo $s_she_h_pres = (isset($education_ideal_home['s_she_h_pres'])) ? $education_ideal_home['s_she_h_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_h_bri" data-title="Enter"><?php echo $s_she_h_bri = (isset($education_ideal_home['s_she_h_bri'])) ? $education_ideal_home['s_she_h_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_h_gha" data-title="Enter"><?php echo $s_she_h_gha = (isset($education_ideal_home['s_she_h_gha'])) ? $education_ideal_home['s_she_h_gha'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_s_prev" data-title="Enter"><?php echo $s_she_s_prev = (isset($education_ideal_home['s_she_s_prev'])) ? $education_ideal_home['s_she_s_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_s_pres" data-title="Enter"><?php echo $s_she_s_pres = (isset($education_ideal_home['s_she_s_pres'])) ? $education_ideal_home['s_she_s_pres'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_s_bri" data-title="Enter"><?php echo $s_she_s_bri = (isset($education_ideal_home['s_she_s_bri'])) ? $education_ideal_home['s_she_s_bri'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="s_she_s_gha" data-title="Enter"><?php echo $s_she_s_gha = (isset($education_ideal_home['s_she_s_gha'])) ? $education_ideal_home['s_she_s_gha'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7"> মোট</td>

                                <td class="tg-0pky">
                                    <?php echo $total_h_prev = $ssc_h_prev + $hsca_h_prev + $hsc_h_prev + $med_h_prev + $eng_h_prev + $uni_h_prev + $ideal_h_prev + $hons_h_prev + $teacher_h_prev + $s_she_h_prev ; ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $total_h_pres = $ssc_h_pres + $hsca_h_pres + $hsc_h_pres + $med_h_pres + $eng_h_pres + $uni_h_pres + $ideal_h_pres + $hons_h_pres + $teacher_h_pres  + $s_she_h_pres ; ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $total_h_bri = ($ssc_h_bri + $hsca_h_bri + $hsc_h_bri + $med_h_bri + $eng_h_bri + $uni_h_bri + $ideal_h_bri + $hons_h_bri + $teacher_h_bri  + $s_she_h_bri ) ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $total_h_gha = ($ssc_h_gha + $hsca_h_gha + $hsc_h_gha + $med_h_gha + $eng_h_gha + $uni_h_gha + $ideal_h_gha + $hons_h_gha + $teacher_h_gha  + $s_she_h_gha ) ?>
                                </td>


                                <td class="tg-0pky">
                                    <?php echo $total_s_prev = ($ssc_s_prev + $hsca_s_prev + $hsc_s_prev + $med_s_prev + $eng_s_prev + $uni_s_prev + $ideal_s_prev + $hons_s_prev + $teacher_s_prev   + $s_she_s_prev ) ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $total_s_pres = ($ssc_s_pres + $hsca_s_pres + $hsc_s_pres + $med_s_pres + $eng_s_pres + $uni_s_pres + $ideal_s_pres + $hons_s_pres + $teacher_s_pres   + $s_she_s_pres ) ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $total_s_bri = ($ssc_s_bri + $hsca_s_bri + $hsc_s_bri + $med_s_bri + $eng_s_bri + $uni_s_bri + $ideal_s_bri + $hons_s_bri + $teacher_s_bri  + $s_she_s_bri ) ?>
                                </td>


                                <td class="tg-0pky">
                                    <?php echo $total_s_gha = ($ssc_s_gha + $hsca_s_gha + $hsc_s_gha + $med_s_gha + $eng_s_gha + $uni_s_gha + $ideal_s_gha + $hons_s_gha + $teacher_s_gha  + $s_she_s_gha ) ?>
                                </td>

                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>শিক্ষাবৃত্তি/উপকরণ সংক্রান্ত :</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Education_শিক্ষাবৃত্তি/উপকরণ-সংক্রান্ত_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7">কত জনকে</td>
                                <td class="tg-pwj7">টাকা (পরিমাণ)</td>

                            </tr>

                            <?php
                            $pk = (isset($education_scholarship['id'])) ? $education_scholarship['id'] : '';

                            ?>


                            <tr>
                                <td class="tg-y698 type_1">৫ম-১০ম শ্রেণিতে অধ্যয়নরত শিক্ষার্থীদের শিক্ষাবৃত্তি প্রদান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="5_to_10_number" data-title="Enter"><?php echo $number = (isset($education_scholarship['5_to_10_number'])) ? $education_scholarship['5_to_10_number'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="5_to_10_taka" data-title="Enter"><?php echo $taka = (isset($education_scholarship['5_to_10_taka'])) ? $education_scholarship['5_to_10_taka'] : 0 ?>
                                    </a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">একাদশ-দ্বাদশ শ্রেণিতে অধ্যয়নরত শিক্ষার্থীদের শিক্ষাবৃত্তি প্রদান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_number" data-title="Enter"><?php echo $hsc_number = (isset($education_scholarship['hsc_number'])) ? $education_scholarship['hsc_number'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_taka" data-title="Enter"><?php echo $hsc_taka = (isset($education_scholarship['hsc_taka'])) ? $education_scholarship['hsc_taka'] : 0 ?>
                                    </a>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">৫ম-১০ম শ্রেণিতে অধ্যায়নরত শিক্ষার্থীদের শিক্ষা উপকরণ প্রদান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ps_u_s" data-title="Enter"><?php echo $ps_u_s = (isset($education_scholarship['ps_u_s'])) ? $education_scholarship['ps_u_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ps_u_a" data-title="Enter"><?php echo $ps_u_a = (isset($education_scholarship['ps_u_a'])) ? $education_scholarship['ps_u_a'] : 0 ?>
                                    </a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">একাদশ-দ্বাদশ শ্রেণিতে অধ্যায়নরত শিক্ষার্থীদের শিক্ষা উপকরণ প্রদান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="h_u_s" data-title="Enter"><?php echo $h_u_s = (isset($education_scholarship['hsc_number'])) ? $education_scholarship['h_u_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="education_scholarship" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hsc_taka" data-title="Enter"><?php echo $h_u_a = (isset($education_scholarship['h_u_a'])) ? $education_scholarship['h_u_a'] : 0 ?>
                                    </a>
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
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
    }

    .tg .tg-0pky {
        border-color: black;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>
    $(function() {

        $.fn.editable.defaults.ajaxOptions = {
            type: "get"
        }
        $('#status').editable({
            value: <?php echo (isset($education_edu_committee['edu_committee'])) ? $education_edu_committee['edu_committee'] : 3; ?>,
            source: [{
                    value: 1,
                    text: 'হ্যাঁ'
                },
                {
                    value: 0,
                    text: 'না'
                },
                {
                    value: 3,
                    text: 'Enter'
                },

            ],
            success: function(response, newValue) {
                response = JSON.parse(response); //update backbone model
                if (response.flag == 3) {
                    location.reload();
                }
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
    jQuery(document).on('keypress', '#status', function(e) {
        if (e.which == 13) {
            return false;
        }
    });
</script>