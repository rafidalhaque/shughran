<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
             
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
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>নিয়োজিত জনশক্তি</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'School_জনশক্তি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পূর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>
                            <?php
                                $pk = (isset($school_manpower['id']))?$school_manpower['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prev" data-title="Enter"><?php echo $member_prev =  (isset($school_manpower['member_prev'])) ? $school_manpower['member_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_pres" data-title="Enter"><?php echo $member_pres =  (isset($school_manpower['member_pres'])) ? $school_manpower['member_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_bri" data-title="Enter"><?php echo $member_bri =  (isset($school_manpower['member_bri'])) ? $school_manpower['member_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_gha" data-title="Enter"><?php echo $member_gha =  (isset($school_manpower['member_gha'])) ? $school_manpower['member_gha'] : '' ?></a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সদস্যপ্রার্থী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_prev" data-title="Enter"><?php echo $member_prarthi_prev =  (isset($school_manpower['member_prarthi_prev'])) ? $school_manpower['member_prarthi_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_pres" data-title="Enter"><?php echo $member_prarthi_pres =  (isset($school_manpower['member_prarthi_pres'])) ? $school_manpower['member_prarthi_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_bri" data-title="Enter"><?php echo $member_prarthi_bri =  (isset($school_manpower['member_prarthi_bri'])) ? $school_manpower['member_prarthi_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="member_prarthi_gha" data-title="Enter"><?php echo $member_prarthi_gha =  (isset($school_manpower['member_prarthi_gha'])) ? $school_manpower['member_prarthi_gha'] : '' ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> সাথী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prev" data-title="Enter"><?php echo $associate_prev =  (isset($school_manpower['associate_prev'])) ? $school_manpower['associate_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_pres" data-title="Enter"><?php echo $associate_pres =  (isset($school_manpower['associate_pres'])) ? $school_manpower['associate_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_bri" data-title="Enter"><?php echo $associate_bri =  (isset($school_manpower['associate_bri'])) ? $school_manpower['associate_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_gha" data-title="Enter"><?php echo $associate_gha =  (isset($school_manpower['associate_gha'])) ? $school_manpower['associate_gha'] : '' ?></a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সাথীপ্রার্থী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_prev" data-title="Enter"><?php echo $associate_prarthi_prev =  (isset($school_manpower['associate_prarthi_prev'])) ? $school_manpower['associate_prarthi_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_pres" data-title="Enter"><?php echo $associate_prarthi_pres =  (isset($school_manpower['associate_prarthi_pres'])) ? $school_manpower['associate_prarthi_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_bri" data-title="Enter"><?php echo $associate_prarthi_bri =  (isset($school_manpower['associate_prarthi_bri'])) ? $school_manpower['associate_prarthi_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_prarthi_gha" data-title="Enter"><?php echo $associate_prarthi_gha =  (isset($school_manpower['associate_prarthi_gha'])) ? $school_manpower['associate_prarthi_gha'] : '' ?></a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_prev" data-title="Enter"><?php echo $worker_prev =  (isset($school_manpower['worker_prev'])) ? $school_manpower['worker_prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_pres" data-title="Enter"><?php echo $worker_pres =  (isset($school_manpower['worker_pres'])) ? $school_manpower['worker_pres'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_bri" data-title="Enter"><?php echo $worker_bri =  (isset($school_manpower['worker_bri'])) ? $school_manpower['worker_bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_gha" data-title="Enter"><?php echo $worker_gha =  (isset($school_manpower['worker_gha'])) ? $school_manpower['worker_gha'] : '' ?></a>
                                </td>
                            </tr>

                        </table>
                        <!-- Hide this table দাওয়াত -->
                        <table class="tg table table-header-rotated" id="testTable2" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>দাওয়াত</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'School_দাওয়াত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পূর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>
                            <?php
                                $pk = (isset($school_dawat['id']))?$school_dawat['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সমর্থক </td>
                                
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_prev" data-title="Enter">
                                        <?php echo $supporter_prev =  (isset($school_dawat['supporter_prev'])) ? $school_dawat['supporter_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_pres" data-title="Enter">
                                        <?php echo $supporter_pres =  (isset($school_dawat['supporter_pres'])) ? $school_dawat['supporter_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_bri" data-title="Enter">
                                        <?php echo $supporter_bri =  (isset($school_dawat['supporter_bri'])) ? $school_dawat['supporter_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="supporter_gha" data-title="Enter">
                                        <?php echo $supporter_gha =  (isset($school_dawat['supporter_gha'])) ? $school_dawat['supporter_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> বন্ধু </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_prev" data-title="Enter">
                                        <?php echo $bondhu_prev =  (isset($school_dawat['bondhu_prev'])) ? $school_dawat['bondhu_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_pres" data-title="Enter">
                                        <?php echo $bondhu_pres =  (isset($school_dawat['bondhu_pres'])) ? $school_dawat['bondhu_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_bri" data-title="Enter">
                                        <?php echo $bondhu_bri =  (isset($school_dawat['bondhu_bri'])) ? $school_dawat['bondhu_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bondhu_gha" data-title="Enter">
                                        <?php echo $bondhu_gha =  (isset($school_dawat['bondhu_gha'])) ? $school_dawat['bondhu_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম সমর্থক </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_prev" data-title="Enter">
                                        <?php echo $omuslim_supporter_prev =  (isset($school_dawat['omuslim_supporter_prev'])) ? $school_dawat['omuslim_supporter_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_pres" data-title="Enter">
                                        <?php echo $omuslim_supporter_pres =  (isset($school_dawat['omuslim_supporter_pres'])) ? $school_dawat['omuslim_supporter_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_bri" data-title="Enter">
                                        <?php echo $omuslim_supporter_bri =  (isset($school_dawat['omuslim_supporter_bri'])) ? $school_dawat['omuslim_supporter_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_supporter_gha" data-title="Enter">
                                        <?php echo $omuslim_supporter_gha =  (isset($school_dawat['omuslim_supporter_gha'])) ? $school_dawat['omuslim_supporter_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম বন্ধু </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_prev" data-title="Enter">
                                        <?php echo $omuslim_bondhu_prev =  (isset($school_dawat['omuslim_bondhu_prev'])) ? $school_dawat['omuslim_bondhu_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_pres" data-title="Enter">
                                        <?php echo $omuslim_bondhu_pres =  (isset($school_dawat['omuslim_bondhu_pres'])) ? $school_dawat['omuslim_bondhu_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_bri" data-title="Enter">
                                        <?php echo $omuslim_bondhu_bri =  (isset($school_dawat['omuslim_bondhu_bri'])) ? $school_dawat['omuslim_bondhu_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="omuslim_bondhu_gha" data-title="Enter">
                                        <?php echo $omuslim_bondhu_gha =  (isset($school_dawat['omuslim_bondhu_gha'])) ? $school_dawat['omuslim_bondhu_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">শুভাকাঙ্ক্ষী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_prev" data-title="Enter">
                                        <?php echo $shuvakankhi_prev =  (isset($school_dawat['shuvakankhi_prev'])) ? $school_dawat['shuvakankhi_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_pres" data-title="Enter">
                                        <?php echo $shuvakankhi_pres =  (isset($school_dawat['shuvakankhi_pres'])) ? $school_dawat['shuvakankhi_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_bri" data-title="Enter">
                                        <?php echo $shuvakankhi_bri =  (isset($school_dawat['shuvakankhi_bri'])) ? $school_dawat['shuvakankhi_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shuvakankhi_gha" data-title="Enter">
                                        <?php echo $shuvakankhi_gha =  (isset($school_dawat['shuvakankhi_gha'])) ? $school_dawat['shuvakankhi_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>

                        </table>

                        <!-- Hide this table সংগঠন -->
                        <table class="tg table table-header-rotated" id="testTable3" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সংগঠন</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'School_সংগঠন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পূর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>
                            <?php
                                $pk = (isset($school_shongothon['id']))?$school_shongothon['id']:'';
                            ?>

                            <tr>

                                <td class="tg-y698 type_1"> থানা </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="thana_prev" data-title="Enter">
                                        <?php echo $thana_prev =  (isset($school_shongothon['thana_prev'])) ? $school_shongothon['thana_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="thana_pres" data-title="Enter">
                                        <?php echo $thana_pres =  (isset($school_shongothon['thana_pres'])) ? $school_shongothon['thana_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="thana_bri" data-title="Enter">
                                        <?php echo $thana_bri =  (isset($school_shongothon['thana_bri'])) ? $school_shongothon['thana_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="thana_gha" data-title="Enter">
                                        <?php echo $thana_gha =  (isset($school_shongothon['thana_gha'])) ? $school_shongothon['thana_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> ওয়ার্ড </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="word_prev" data-title="Enter">
                                        <?php echo $word_prev =  (isset($school_shongothon['word_prev'])) ? $school_shongothon['word_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="word_pres" data-title="Enter">
                                        <?php echo $word_pres =  (isset($school_shongothon['word_pres'])) ? $school_shongothon['word_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="word_bri" data-title="Enter">
                                        <?php echo $word_bri =  (isset($school_shongothon['word_bri'])) ? $school_shongothon['word_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="word_gha" data-title="Enter">
                                        <?php echo $word_gha =  (isset($school_shongothon['word_gha'])) ? $school_shongothon['word_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> উপশাখা </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_prev" data-title="Enter">
                                        <?php echo $uposhakah_prev =  (isset($school_shongothon['uposhakah_prev'])) ? $school_shongothon['uposhakah_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_pres" data-title="Enter">
                                        <?php echo $uposhakah_pres =  (isset($school_shongothon['uposhakah_pres'])) ? $school_shongothon['uposhakah_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_bri" data-title="Enter">
                                        <?php echo $uposhakah_bri =  (isset($school_shongothon['uposhakah_bri'])) ? $school_shongothon['uposhakah_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uposhakah_gha" data-title="Enter">
                                        <?php echo $uposhakah_gha =  (isset($school_shongothon['uposhakah_gha'])) ? $school_shongothon['uposhakah_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক সংগঠন </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_prev" data-title="Enter">
                                        <?php echo $ss_prev =  (isset($school_shongothon['ss_prev'])) ? $school_shongothon['ss_prev'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_pres" data-title="Enter">
                                        <?php echo $ss_pres =  (isset($school_shongothon['ss_pres'])) ? $school_shongothon['ss_pres'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_bri" data-title="Enter">
                                        <?php echo $ss_bri =  (isset($school_shongothon['ss_bri'])) ? $school_shongothon['ss_bri'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_shongothon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ss_gha" data-title="Enter">
                                        <?php echo $ss_gha =  (isset($school_shongothon['ss_gha'])) ? $school_shongothon['ss_gha'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>প্রশিক্ষণ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'School_প্রশিক্ষণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_proshikkhon['id']))?$school_proshikkhon['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> সাথী টিসি/টিএস </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_tc_num" data-title="Enter">
                                        <?php echo $sathi_tc_num =  (isset($school_proshikkhon['sathi_tc_num'])) ? $school_proshikkhon['sathi_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_tc_pre" data-title="Enter">
                                        <?php echo $sathi_tc_pre =  (isset($school_proshikkhon['sathi_tc_pre'])) ? $school_proshikkhon['sathi_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_tc_pre!=0 && $sathi_tc_num!=0 )? $sathi_tc_pre / $sathi_tc_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> কর্মী টিসি/টিএস </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_tc_num" data-title="Enter">
                                        <?php echo $kormi_tc_num =  (isset($school_proshikkhon['kormi_tc_num'])) ? $school_proshikkhon['kormi_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_tc_pre" data-title="Enter">
                                        <?php echo $kormi_tc_pre =  (isset($school_proshikkhon['kormi_tc_pre'])) ? $school_proshikkhon['kormi_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($kormi_tc_pre!=0 && $kormi_tc_num!=0 ) ?$kormi_tc_pre / $kormi_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাথী শব্বেদারী </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_shobbedari_num" data-title="Enter">
                                        <?php echo $sathi_shobbedari_num =  (isset($school_proshikkhon['sathi_shobbedari_num'])) ? $school_proshikkhon['sathi_shobbedari_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_shobbedari_pre" data-title="Enter">
                                        <?php echo $sathi_shobbedari_pre =  (isset($school_proshikkhon['sathi_shobbedari_pre'])) ? $school_proshikkhon['sathi_shobbedari_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_shobbedari_pre!=0 && $sathi_shobbedari_num!=0 )? $sathi_shobbedari_pre / $sathi_shobbedari_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কর্মী শব্বেদারি </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_shobbedari_num" data-title="Enter">
                                        <?php echo $kormi_shobbedari_num =  (isset($school_proshikkhon['kormi_shobbedari_num'])) ? $school_proshikkhon['kormi_shobbedari_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_shobbedari_pre" data-title="Enter">
                                        <?php echo $kormi_shobbedari_pre =  (isset($school_proshikkhon['kormi_shobbedari_pre'])) ? $school_proshikkhon['kormi_shobbedari_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($kormi_shobbedari_pre!=0 && $kormi_shobbedari_num!=0 )? $kormi_shobbedari_pre / $kormi_shobbedari_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক টিএস </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="somorthok_tc_num" data-title="Enter">
                                        <?php echo $somorthok_tc_num =  (isset($school_proshikkhon['somorthok_tc_num'])) ? $school_proshikkhon['somorthok_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="somorthok_tc_pre" data-title="Enter">
                                        <?php echo $somorthok_tc_pre =  (isset($school_proshikkhon['somorthok_tc_pre'])) ? $school_proshikkhon['somorthok_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($somorthok_tc_pre!=0 && $somorthok_tc_num!=0 )? $somorthok_tc_pre / $somorthok_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> একাডেমিক টিএস </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_tc_num" data-title="Enter">
                                        <?php echo $academic_tc_num =  (isset($school_proshikkhon['academic_tc_num'])) ? $school_proshikkhon['academic_tc_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_tc_pre" data-title="Enter">
                                        <?php echo $academic_tc_pre =  (isset($school_proshikkhon['academic_tc_pre'])) ? $school_proshikkhon['academic_tc_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_tc_pre!=0 && $academic_tc_num!=0 )? $academic_tc_pre / $academic_tc_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সামষ্টিক পাঠ </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sham_path_num" data-title="Enter">
                                        <?php echo $sham_path_num =  (isset($school_proshikkhon['sham_path_num'])) ? $school_proshikkhon['sham_path_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sham_path_pre" data-title="Enter">
                                        <?php echo $sham_path_pre =  (isset($school_proshikkhon['sham_path_pre'])) ? $school_proshikkhon['sham_path_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo($sham_path_pre!=0 && $sham_path_num!=0 )? $sham_path_pre / $sham_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কুরআন তালিম </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quran_talim_num" data-title="Enter">
                                        <?php echo $quran_talim_num =  (isset($school_proshikkhon['quran_talim_num'])) ? $school_proshikkhon['quran_talim_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quran_talim_pre" data-title="Enter">
                                        <?php echo $quran_talim_pre =  (isset($school_proshikkhon['quran_talim_pre'])) ? $school_proshikkhon['quran_talim_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quran_talim_pre!=0 && $quran_talim_num!=0 )? $quran_talim_pre / $quran_talim_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">আলোচনা চক্র </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="alochona_num" data-title="Enter">
                                        <?php echo $alochona_num =  (isset($school_proshikkhon['alochona_num'])) ? $school_proshikkhon['alochona_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_proshikkhon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="alochona_pre" data-title="Enter">
                                        <?php echo $alochona_pre =  (isset($school_proshikkhon['alochona_pre'])) ? $school_proshikkhon['alochona_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($alochona_pre!=0 && $alochona_num!=0 )?$alochona_pre / $alochona_num :0 ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>দাওয়াতিমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'School_দাওয়াতীমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_dawat_program['id']))?$school_dawat_program['id']:'';
                            ?>

                            <tr>

                                <td class="tg-y698 type_1"> শিক্ষা সফর </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tour_num" data-title="Enter">
                                        <?php echo $tour_num =  (isset($school_dawat_program['tour_num'])) ? $school_dawat_program['tour_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tour_pre" data-title="Enter">
                                        <?php echo $tour_pre =  (isset($school_dawat_program['tour_pre'])) ? $school_dawat_program['tour_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($tour_pre!=0 && $tour_num!=0 )? $tour_pre / $tour_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সংগীত ঊপস্থাপনা </td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongit_num" data-title="Enter">
                                        <?php echo $shongit_num =  (isset($school_dawat_program['shongit_num'])) ? $school_dawat_program['shongit_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongit_pre" data-title="Enter">
                                        <?php echo $shongit_pre =  (isset($school_dawat_program['shongit_pre'])) ? $school_dawat_program['shongit_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($shongit_pre!=0 && $shongit_num!=0 )? $shongit_pre / $shongit_num:0 ?>
                                </td>
                            </tr>
                    
                            <tr>

                                <td class="tg-y698 type_1">সাধারণ জ্ঞানের আসর</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="gk_ashor_num" data-title="Enter">
                                        <?php echo $gk_ashor_num =  (isset($school_dawat_program['gk_ashor_num'])) ? $school_dawat_program['gk_ashor_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="gk_ashor_pre" data-title="Enter">
                                        <?php echo $gk_ashor_pre =  (isset($school_dawat_program['gk_ashor_pre'])) ? $school_dawat_program['gk_ashor_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($gk_ashor_pre!=0 && $gk_ashor_num!=0 )?$gk_ashor_pre / $gk_ashor_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">চা-চক্র, ফল চক্র, বাদাম চক্র</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="cha_chokro_num" data-title="Enter">
                                        <?php echo $cha_chokro_num =  (isset($school_dawat_program['cha_chokro_num'])) ? $school_dawat_program['cha_chokro_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="cha_chokro_pre" data-title="Enter">
                                        <?php echo $cha_chokro_pre =  (isset($school_dawat_program['cha_chokro_pre'])) ? $school_dawat_program['cha_chokro_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($cha_chokro_pre!=0 && $cha_chokro_num!=0 )?$cha_chokro_pre / $cha_chokro_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাধারণ সভা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sadaron_shova_num" data-title="Enter">
                                        <?php echo $sadaron_shova_num =  (isset($school_dawat_program['sadaron_shova_num'])) ? $school_dawat_program['sadaron_shova_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sadaron_shova_pre" data-title="Enter">
                                        <?php echo $sadaron_shova_pre =  (isset($school_dawat_program['sadaron_shova_pre'])) ? $school_dawat_program['sadaron_shova_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($sadaron_shova_pre!=0 && $sadaron_shova_num!=0 )?$sadaron_shova_pre / $sadaron_shova_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">নৌকা ভ্রমণ, গ্রুপ ভ্রমণ</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="boat_travel_num" data-title="Enter">
                                        <?php echo $boat_travel_num =  (isset($school_dawat_program['boat_travel_num'])) ? $school_dawat_program['boat_travel_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="boat_travel_pre" data-title="Enter">
                                        <?php echo $boat_travel_pre =  (isset($school_dawat_program['boat_travel_pre'])) ? $school_dawat_program['boat_travel_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($boat_travel_pre!=0 && $boat_travel_num!=0 )?$boat_travel_pre / $boat_travel_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">অন্যান্য</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_num" data-title="Enter">
                                        <?php echo $other_num =  (isset($school_dawat_program['other_num'])) ? $school_dawat_program['other_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dawat_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_pre" data-title="Enter">
                                        <?php echo $other_pre =  (isset($school_dawat_program['other_pre'])) ? $school_dawat_program['other_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($other_pre!=0 && $other_num!=0 )?$other_pre / $other_num:0 ?>
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