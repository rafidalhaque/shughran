<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিতর্ক বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
                } else {
                    echo anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/departmentsreport/bitorko-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                <td class="tg-pwj7" colspan="6"><b>বিতর্ক বিভাগে নিয়োজিত সাংগঠনিক জনশক্তি</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Debate_বিতর্ক বিভাগে নিয়োজিত সাংগঠনিক জনশক্তি_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3"></td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">পূর্ব </td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">বর্তমান </td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">বৃদ্ধি </td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">ঘাটতি </td>


                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>স্থায়ী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>অস্থায়ী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>স্থায়ী</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>অস্থায়ী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>স্থায়ী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>অস্থায়ী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>স্থায়ী</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>অস্থায়ী </span></div>
                                </td>


                            </tr>

                            <?php
                            $pk = (isset($debate_niojito_sangothonik_jonoshokti['id'])) ? $debate_niojito_sangothonik_jonoshokti['id'] : '';;
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_pb_stha" data-title="Enter"><?php echo $sodosso_pb_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_pb_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_pb_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_pb_ostha" data-title="Enter"><?php echo $sodosso_pb_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_pb_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_pb_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_bm_stha" data-title="Enter"><?php echo $sodosso_bm_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_bm_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_bm_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_bm_ostha" data-title="Enter"><?php echo $sodosso_bm_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_bm_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_bm_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_br_stha" data-title="Enter"><?php echo $sodosso_br_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_br_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_br_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_br_ostha" data-title="Enter"><?php echo $sodosso_br_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_br_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_br_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_ght_stha" data-title="Enter"><?php echo $sodosso_ght_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_ght_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_ght_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sodosso_ght_ostha" data-title="Enter"><?php echo $sodosso_ght_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sodosso_ght_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sodosso_ght_ostha'] : 0; ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_pb_stha" data-title="Enter"><?php echo $sathi_pb_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_pb_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_pb_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_pb_ostha" data-title="Enter"><?php echo $sathi_pb_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_pb_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_pb_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_bm_stha" data-title="Enter"><?php echo $sathi_bm_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_bm_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_bm_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_bm_ostha" data-title="Enter"><?php echo $sathi_bm_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_bm_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_bm_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_br_stha" data-title="Enter"><?php echo $sathi_br_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_br_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_br_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_br_ostha" data-title="Enter"><?php echo $sathi_br_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_br_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_br_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_ght_stha" data-title="Enter"><?php echo $sathi_ght_stha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_ght_stha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_ght_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_ght_ostha" data-title="Enter"><?php echo $sathi_ght_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['sathi_ght_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['sathi_ght_ostha'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_pb_stha" data-title="Enter"><?php echo $kormi_pb_stha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_pb_stha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_pb_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_pb_ostha" data-title="Enter"><?php echo $kormi_pb_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_pb_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_pb_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_bm_stha" data-title="Enter"><?php echo $kormi_bm_stha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_bm_stha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_bm_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_bm_ostha" data-title="Enter"><?php echo $kormi_bm_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_bm_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_bm_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_br_stha" data-title="Enter"><?php echo $kormi_br_stha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_br_stha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_br_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_br_ostha" data-title="Enter"><?php echo $kormi_br_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_br_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_br_ostha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_ght_stha" data-title="Enter"><?php echo $kormi_ght_stha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_ght_stha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_ght_stha'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_niojito_sangothonik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_ght_ostha" data-title="Enter"><?php echo $kormi_ght_ostha =  (isset($debate_niojito_sangothonik_jonoshokti['kormi_ght_ostha'])) ? $debate_niojito_sangothonik_jonoshokti['kormi_ght_ostha'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo $total_pb_stha = ($sodosso_pb_stha + $sathi_pb_stha + $kormi_pb_stha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_pb_ostha = ($sodosso_pb_ostha + $sathi_pb_ostha + $kormi_pb_ostha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_bm_stha = ($sodosso_bm_stha + $sathi_bm_stha + $kormi_bm_stha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_bm_ostha = ($sodosso_bm_ostha + $sathi_bm_ostha + $kormi_bm_ostha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_br_stha = ($sodosso_br_stha + $sathi_br_stha + $kormi_br_stha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_br_ostha = ($sodosso_br_ostha + $sathi_br_ostha + $kormi_br_ostha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_ght_stha = ($sodosso_ght_stha + $sathi_ght_stha + $kormi_ght_stha) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_ght_ostha = ($sodosso_ght_ostha + $sathi_ght_ostha + $kormi_ght_ostha) ?>
                                </td>


                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>বিতার্কিক জনশক্তি </b></td>
                                <td class="tg-pwj7" colspan="6">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Debate_বিতার্কিক জনশক্তি_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="3">পূর্ব </td>
                                <td class="tg-pwj7" colspan="3">বর্তমান </td>
                                <td class="tg-pwj7" colspan="3"> বৃদ্ধি </td>
                                <td class="tg-pwj7" colspan="3">ঘাটতি </td>


                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>সদস্য </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সাথী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>কর্মী</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সদস্য </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সাথী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>কর্মী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সদস্য</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সাথী </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>কর্মী</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সদস্য </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সাথী</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>কর্মী </span></div>
                                </td>

                            </tr>

                            <?php
                            $pk = (isset($debate_bitarkik_jonoshokti['id'])) ? $debate_bitarkik_jonoshokti['id'] : '';;
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> প্রশিক্ষক বিতার্কিক </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_pb_sod" data-title="Enter"><?php echo $pbk_pb_sod =  (isset($debate_bitarkik_jonoshokti['pbk_pb_sod'])) ? $debate_bitarkik_jonoshokti['pbk_pb_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_pb_sat" data-title="Enter"><?php echo $pbk_pb_sat =  (isset($debate_bitarkik_jonoshokti['pbk_pb_sat'])) ? $debate_bitarkik_jonoshokti['pbk_pb_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_pb_kor" data-title="Enter"><?php echo $pbk_pb_kor =  (isset($debate_bitarkik_jonoshokti['pbk_pb_kor'])) ? $debate_bitarkik_jonoshokti['pbk_pb_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_bm_sod" data-title="Enter"><?php echo $pbk_bm_sod =  (isset($debate_bitarkik_jonoshokti['pbk_bm_sod'])) ? $debate_bitarkik_jonoshokti['pbk_bm_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_bm_sat" data-title="Enter"><?php echo $pbk_bm_sat =  (isset($debate_bitarkik_jonoshokti['pbk_bm_sat'])) ? $debate_bitarkik_jonoshokti['pbk_bm_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_bm_kor" data-title="Enter"><?php echo $pbk_bm_kor =  (isset($debate_bitarkik_jonoshokti['pbk_bm_kor'])) ? $debate_bitarkik_jonoshokti['pbk_bm_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_br_sod" data-title="Enter"><?php echo $pbk_br_sod =  (isset($debate_bitarkik_jonoshokti['pbk_br_sod'])) ? $debate_bitarkik_jonoshokti['pbk_br_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_br_sat" data-title="Enter"><?php echo $pbk_br_sat =  (isset($debate_bitarkik_jonoshokti['pbk_br_sat'])) ? $debate_bitarkik_jonoshokti['pbk_br_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_br_kor" data-title="Enter"><?php echo $pbk_br_kor =  (isset($debate_bitarkik_jonoshokti['pbk_br_kor'])) ? $debate_bitarkik_jonoshokti['pbk_br_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_ght_sod" data-title="Enter"><?php echo $pbk_ght_sod =  (isset($debate_bitarkik_jonoshokti['pbk_ght_sod'])) ? $debate_bitarkik_jonoshokti['pbk_ght_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_ght_sat" data-title="Enter"><?php echo $pbk_ght_sat =  (isset($debate_bitarkik_jonoshokti['pbk_ght_sat'])) ? $debate_bitarkik_jonoshokti['pbk_ght_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pbk_ght_kor" data-title="Enter"><?php echo $pbk_ght_kor =  (isset($debate_bitarkik_jonoshokti['pbk_ght_kor'])) ? $debate_bitarkik_jonoshokti['pbk_ght_kor'] : 0; ?></a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">টেলিভিশন বিতার্কিক </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_pb_sod" data-title="Enter"><?php echo $tlvnbk_pb_sod =  (isset($debate_bitarkik_jonoshokti['tlvnbk_pb_sod'])) ? $debate_bitarkik_jonoshokti['tlvnbk_pb_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_pb_sat" data-title="Enter"><?php echo $tlvnbk_pb_sat =  (isset($debate_bitarkik_jonoshokti['tlvnbk_pb_sat'])) ? $debate_bitarkik_jonoshokti['tlvnbk_pb_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_pb_kor" data-title="Enter"><?php echo $tlvnbk_pb_kor =  (isset($debate_bitarkik_jonoshokti['tlvnbk_pb_kor'])) ? $debate_bitarkik_jonoshokti['tlvnbk_pb_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_bm_sod" data-title="Enter"><?php echo $tlvnbk_bm_sod =  (isset($debate_bitarkik_jonoshokti['tlvnbk_bm_sod'])) ? $debate_bitarkik_jonoshokti['tlvnbk_bm_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_bm_sat" data-title="Enter"><?php echo $tlvnbk_bm_sat =  (isset($debate_bitarkik_jonoshokti['tlvnbk_bm_sat'])) ? $debate_bitarkik_jonoshokti['tlvnbk_bm_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_bm_kor" data-title="Enter"><?php echo $tlvnbk_bm_kor =  (isset($debate_bitarkik_jonoshokti['tlvnbk_bm_kor'])) ? $debate_bitarkik_jonoshokti['tlvnbk_bm_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_br_sod" data-title="Enter"><?php echo $tlvnbk_br_sod =  (isset($debate_bitarkik_jonoshokti['tlvnbk_br_sod'])) ? $debate_bitarkik_jonoshokti['tlvnbk_br_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_br_sat" data-title="Enter"><?php echo $tlvnbk_br_sat =  (isset($debate_bitarkik_jonoshokti['tlvnbk_br_sat'])) ? $debate_bitarkik_jonoshokti['tlvnbk_br_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_br_kor" data-title="Enter"><?php echo $tlvnbk_br_kor =  (isset($debate_bitarkik_jonoshokti['tlvnbk_br_kor'])) ? $debate_bitarkik_jonoshokti['tlvnbk_br_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_ght_sod" data-title="Enter"><?php echo $tlvnbk_ght_sod =  (isset($debate_bitarkik_jonoshokti['tlvnbk_ght_sod'])) ? $debate_bitarkik_jonoshokti['tlvnbk_ght_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_ght_sat" data-title="Enter"><?php echo $tlvnbk_ght_sat =  (isset($debate_bitarkik_jonoshokti['tlvnbk_ght_sat'])) ? $debate_bitarkik_jonoshokti['tlvnbk_ght_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tlvnbk_ght_kor" data-title="Enter"><?php echo $tlvnbk_ght_kor =  (isset($debate_bitarkik_jonoshokti['tlvnbk_ght_kor'])) ? $debate_bitarkik_jonoshokti['tlvnbk_ght_kor'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">জাতীয় বিতার্কিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_pb_sod" data-title="Enter"><?php echo $jtobk_pb_sod =  (isset($debate_bitarkik_jonoshokti['jtobk_pb_sod'])) ? $debate_bitarkik_jonoshokti['jtobk_pb_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_pb_sat" data-title="Enter"><?php echo $jtobk_pb_sat =  (isset($debate_bitarkik_jonoshokti['jtobk_pb_sat'])) ? $debate_bitarkik_jonoshokti['jtobk_pb_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_pb_kor" data-title="Enter"><?php echo $jtobk_pb_kor =  (isset($debate_bitarkik_jonoshokti['jtobk_pb_kor'])) ? $debate_bitarkik_jonoshokti['jtobk_pb_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_bm_sod" data-title="Enter"><?php echo $jtobk_bm_sod =  (isset($debate_bitarkik_jonoshokti['jtobk_bm_sod'])) ? $debate_bitarkik_jonoshokti['jtobk_bm_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_bm_sat" data-title="Enter"><?php echo $jtobk_bm_sat =  (isset($debate_bitarkik_jonoshokti['jtobk_bm_sat'])) ? $debate_bitarkik_jonoshokti['jtobk_bm_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_bm_kor" data-title="Enter"><?php echo $jtobk_bm_kor =  (isset($debate_bitarkik_jonoshokti['jtobk_bm_kor'])) ? $debate_bitarkik_jonoshokti['jtobk_bm_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_br_sod" data-title="Enter"><?php echo $jtobk_br_sod =  (isset($debate_bitarkik_jonoshokti['jtobk_br_sod'])) ? $debate_bitarkik_jonoshokti['jtobk_br_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_br_sat" data-title="Enter"><?php echo $jtobk_br_sat =  (isset($debate_bitarkik_jonoshokti['jtobk_br_sat'])) ? $debate_bitarkik_jonoshokti['jtobk_br_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_br_kor" data-title="Enter"><?php echo $jtobk_br_kor =  (isset($debate_bitarkik_jonoshokti['jtobk_br_kor'])) ? $debate_bitarkik_jonoshokti['jtobk_br_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_ght_sod" data-title="Enter"><?php echo $jtobk_ght_sod =  (isset($debate_bitarkik_jonoshokti['jtobk_ght_sod'])) ? $debate_bitarkik_jonoshokti['jtobk_ght_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_ght_sat" data-title="Enter"><?php echo $jtobk_ght_sat =  (isset($debate_bitarkik_jonoshokti['jtobk_ght_sat'])) ? $debate_bitarkik_jonoshokti['jtobk_ght_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jtobk_ght_kor" data-title="Enter"><?php echo $jtobk_ght_kor =  (isset($debate_bitarkik_jonoshokti['jtobk_ght_kor'])) ? $debate_bitarkik_jonoshokti['jtobk_ght_kor'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বিতার্কিক </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_pb_sod" data-title="Enter"><?php echo $bk_pb_sod =  (isset($debate_bitarkik_jonoshokti['bk_pb_sod'])) ? $debate_bitarkik_jonoshokti['bk_pb_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_pb_sat" data-title="Enter"><?php echo $bk_pb_sat =  (isset($debate_bitarkik_jonoshokti['bk_pb_sat'])) ? $debate_bitarkik_jonoshokti['bk_pb_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_pb_kor" data-title="Enter"><?php echo $bk_pb_kor =  (isset($debate_bitarkik_jonoshokti['bk_pb_kor'])) ? $debate_bitarkik_jonoshokti['bk_pb_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_bm_sod" data-title="Enter"><?php echo $bk_bm_sod =  (isset($debate_bitarkik_jonoshokti['bk_bm_sod'])) ? $debate_bitarkik_jonoshokti['bk_bm_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_bm_sat" data-title="Enter"><?php echo $bk_bm_sat =  (isset($debate_bitarkik_jonoshokti['bk_bm_sat'])) ? $debate_bitarkik_jonoshokti['bk_bm_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_bm_kor" data-title="Enter"><?php echo $bk_bm_kor =  (isset($debate_bitarkik_jonoshokti['bk_bm_kor'])) ? $debate_bitarkik_jonoshokti['bk_bm_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_br_sod" data-title="Enter"><?php echo $bk_br_sod =  (isset($debate_bitarkik_jonoshokti['bk_br_sod'])) ? $debate_bitarkik_jonoshokti['bk_br_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_br_sat" data-title="Enter"><?php echo $bk_br_sat =  (isset($debate_bitarkik_jonoshokti['bk_br_sat'])) ? $debate_bitarkik_jonoshokti['bk_br_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_br_kor" data-title="Enter"><?php echo $bk_br_kor =  (isset($debate_bitarkik_jonoshokti['bk_br_kor'])) ? $debate_bitarkik_jonoshokti['bk_br_kor'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_ght_sod" data-title="Enter"><?php echo $bk_ght_sod =  (isset($debate_bitarkik_jonoshokti['bk_ght_sod'])) ? $debate_bitarkik_jonoshokti['bk_ght_sod'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_ght_sat" data-title="Enter"><?php echo $bk_ght_sat =  (isset($debate_bitarkik_jonoshokti['bk_ght_sat'])) ? $debate_bitarkik_jonoshokti['bk_ght_sat'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bk_ght_kor" data-title="Enter"><?php echo $bk_ght_kor =  (isset($debate_bitarkik_jonoshokti['bk_ght_kor'])) ? $debate_bitarkik_jonoshokti['bk_ght_kor'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_pb_sod + $tlvnbk_pb_sod + $jtobk_pb_sod + $bk_pb_sod) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_pb_sat + $tlvnbk_pb_sat + $jtobk_pb_sat + $bk_pb_sat) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_pb_kor + $tlvnbk_pb_kor + $jtobk_pb_kor + $bk_pb_kor) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_bm_sod + $tlvnbk_bm_sod + $jtobk_bm_sod + $bk_bm_sod) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_bm_sat + $tlvnbk_bm_sat + $jtobk_bm_sat + $bk_bm_sat) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_bm_kor + $tlvnbk_bm_kor + $jtobk_bm_kor + $bk_bm_kor) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_br_sod + $tlvnbk_br_sod + $jtobk_br_sod + $bk_br_sod) ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($pbk_br_sat + $tlvnbk_br_sat + $jtobk_br_sat + $bk_br_sat) ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo ($pbk_br_kor + $tlvnbk_br_kor + $jtobk_br_kor + $bk_br_kor) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($pbk_ght_sod + $tlvnbk_ght_sod + $jtobk_ght_sod + $bk_ght_sod) ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo ($pbk_ght_sat + $tlvnbk_ght_sat + $jtobk_ght_sat + $bk_ght_sat) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($pbk_ght_kor + $tlvnbk_ght_kor + $jtobk_ght_kor + $bk_ght_kor) ?>
                                </td>

                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan=''>
                                    <div><b>যোগাযোগ </b></div>
                                </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Debate_যোগাযোগ_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <?php
                            $pk = (isset($debate_contact['id'])) ? $debate_contact['id'] : '';;
                            ?>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>ক্যাটাগরি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>সংখ্যা </span></div>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>প্রশিক্ষক বিতার্কিক </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pro_debate_s" data-title="Enter"><?php echo $pro_debate_s =  (isset($debate_contact['pro_debate_s'])) ? $debate_contact['pro_debate_s'] : 0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>টেলিভিশন বিতার্কিক </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tel_debate_s" data-title="Enter"><?php echo $tel_debate_s =  (isset($debate_contact['tel_debate_s'])) ? $debate_contact['tel_debate_s'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>জাতীয় বিতার্কিক </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="nat_debate_s" data-title="Enter"><?php echo $nat_debate_s =  (isset($debate_contact['nat_debate_s'])) ? $debate_contact['nat_debate_s'] : 0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>বিতার্কিক </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="debate_s" data-title="Enter"><?php echo $debate_s =  (isset($debate_contact['debate_s'])) ? $debate_contact['debate_s'] : 0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>উপদেষ্টা </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="upodesta_s" data-title="Enter"><?php echo $upodesta_s =  (isset($debate_contact['upodesta_s'])) ? $debate_contact['upodesta_s'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>শুভাকাঙ্ক্ষী </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="suvakankhi_s" data-title="Enter"><?php echo $suvakankhi_s =  (isset($debate_contact['suvakankhi_s'])) ? $debate_contact['suvakankhi_s'] : 0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>অন্যান্য </span></div>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_s" data-title="Enter"><?php echo $other_s =  (isset($debate_contact['other_s'])) ? $debate_contact['other_s'] : 0; ?></a>
                                </td>
                                >
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan='7'>
                                    <div><b>বিতর্ক ক্লাবের বিবরণ </b></div>
                                </td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Debate_বিতর্ক ক্লাবের বিবরণ_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>ক্লাব </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>পূর্ব </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>কমিটি আছে কতটিতে?</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ক্লাবের সদস্য সংখ্যা</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>মন্তব্য </span></div>
                                </td>

                            </tr>
                            <?php
                            $pk = (isset($debate_bitorko_club_biboron['id'])) ? $debate_bitorko_club_biboron['id'] : '';;
                            ?>
                           

                            <tr>
                                <td class="tg-pwj7" rowspan="">সাংগঠনিক শাখা ক্লাব সংখ্যা </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_prev" data-title="Enter"><?php echo $shang_shakha_club_prev =  (isset($debate_bitorko_club_biboron['shang_shakha_club_prev'])) ? $debate_bitorko_club_biboron['shang_shakha_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_pres" data-title="Enter"><?php echo $shang_shakha_club_pres =  (isset($debate_bitorko_club_biboron['shang_shakha_club_pres'])) ? $debate_bitorko_club_biboron['shang_shakha_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_bri" data-title="Enter"><?php echo $shang_shakha_club_bri =  (isset($debate_bitorko_club_biboron['shang_shakha_club_bri'])) ? $debate_bitorko_club_biboron['shang_shakha_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_gha" data-title="Enter"><?php echo $shang_shakha_club_gha =  (isset($debate_bitorko_club_biboron['shang_shakha_club_gha'])) ? $debate_bitorko_club_biboron['shang_shakha_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_komiti" data-title="Enter"><?php echo $shang_shakha_club_komiti =  (isset($debate_bitorko_club_biboron['shang_shakha_club_komiti'])) ? $debate_bitorko_club_biboron['shang_shakha_club_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_club" data-title="Enter"><?php echo $shang_shakha_club_club =  (isset($debate_bitorko_club_biboron['shang_shakha_club_club'])) ? $debate_bitorko_club_biboron['shang_shakha_club_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_shakha_club_comments" data-title="Enter"><?php echo $shang_shakha_club_comments =  (isset($debate_bitorko_club_biboron['shang_shakha_club_comments'])) ? $debate_bitorko_club_biboron['shang_shakha_club_comments'] : ""; ?></a>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="tg-pwj7" rowspan="">সাংগঠনিক থানা ক্লাব সংখ্যা</td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_prev" data-title="Enter"><?php echo $shang_thana_club_prev =  (isset($debate_bitorko_club_biboron['shang_thana_club_prev'])) ? $debate_bitorko_club_biboron['shang_thana_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_pres" data-title="Enter"><?php echo $shang_thana_club_pres =  (isset($debate_bitorko_club_biboron['shang_thana_club_pres'])) ? $debate_bitorko_club_biboron['shang_thana_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_bri" data-title="Enter"><?php echo $shang_thana_club_bri =  (isset($debate_bitorko_club_biboron['shang_thana_club_bri'])) ? $debate_bitorko_club_biboron['shang_thana_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_gha" data-title="Enter"><?php echo $shang_thana_club_gha =  (isset($debate_bitorko_club_biboron['shang_thana_club_gha'])) ? $debate_bitorko_club_biboron['shang_thana_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_komiti" data-title="Enter"><?php echo $shang_thana_club_komiti =  (isset($debate_bitorko_club_biboron['shang_thana_club_komiti'])) ? $debate_bitorko_club_biboron['shang_thana_club_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_club" data-title="Enter"><?php echo $shang_thana_club_club =  (isset($debate_bitorko_club_biboron['shang_thana_club_club'])) ? $debate_bitorko_club_biboron['shang_thana_club_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shang_thana_club_comments" data-title="Enter"><?php echo $shang_thana_club_comments =  (isset($debate_bitorko_club_biboron['shang_thana_club_comments'])) ? $debate_bitorko_club_biboron['shang_thana_club_comments'] : ""; ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">জেনারেল ক্লাব সংখ্যা</td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_prev" data-title="Enter"><?php echo $general_club_prev =  (isset($debate_bitorko_club_biboron['general_club_prev'])) ? $debate_bitorko_club_biboron['general_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_pres" data-title="Enter"><?php echo $general_club_pres =  (isset($debate_bitorko_club_biboron['general_club_pres'])) ? $debate_bitorko_club_biboron['general_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_bri" data-title="Enter"><?php echo $general_club_bri =  (isset($debate_bitorko_club_biboron['general_club_bri'])) ? $debate_bitorko_club_biboron['general_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_gha" data-title="Enter"><?php echo $general_club_gha =  (isset($debate_bitorko_club_biboron['general_club_gha'])) ? $debate_bitorko_club_biboron['general_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_komiti" data-title="Enter"><?php echo $general_club_komiti =  (isset($debate_bitorko_club_biboron['general_club_komiti'])) ? $debate_bitorko_club_biboron['general_club_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_club" data-title="Enter"><?php echo $general_club_club =  (isset($debate_bitorko_club_biboron['general_club_club'])) ? $debate_bitorko_club_biboron['general_club_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_club_comments" data-title="Enter"><?php echo $general_club_comments =  (isset($debate_bitorko_club_biboron['general_club_comments'])) ? $debate_bitorko_club_biboron['general_club_comments'] : ''; ?></a>
                                </td>

                            </tr>
                           

                        </table>


                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan='8'>
                                    <div><b>প্রাতিষ্ঠানিক ক্লাবের বিবরণ </b></div> 
                                </td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Debate_বিতর্ক ক্লাবের বিবরণ_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "rowspan="2" >
                                    <div><span>ক্লাব </span></div>
                                </td>
                                <td class="tg-pwj7 " rowspan="2">
                                    <div><span>প্রতিষ্ঠান সংখ্যা</span></div>
                                </td>
                                <td class="tg-pwj7 " colspan="4">
                                    <div><span> ক্লাব সংখ্যা</span></div>
                                </td>
                                
                                <td class="tg-pwj7 " rowspan="2">
                                    <div><span>কমিটি আছে কতটিতে?</span></div>
                                </td>
                                <td class="tg-pwj7 " rowspan="2">
                                    <div><span>ক্লাবের সদস্য সংখ্যা</span></div>
                                </td>
                                <td class="tg-pwj7 " rowspan="2">
                                    <div><span>মন্তব্য </span></div>
                                </td>

                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7 ">
                                    <div><span>পূর্ব </span></div> 
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>
                                

                            </tr>
                            <?php
                            $pk = (isset($debate_bitorko_club_biboron['id'])) ? $debate_bitorko_club_biboron['id'] : '';;
                            ?>
                            
                            
                            <tr>
                                <td class="tg-pwj7" rowspan="">বিশ্ববিদ্যালয়</td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_pres" data-title="Enter"><?php echo $university_pres =  (isset($debate_bitorko_club_biboron['university_pres'])) ? $debate_bitorko_club_biboron['university_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_club_prev" data-title="Enter"><?php echo $university_club_prev =  (isset($debate_bitorko_club_biboron['university_club_prev'])) ? $debate_bitorko_club_biboron['university_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_club_pres" data-title="Enter"><?php echo $university_club_pres =  (isset($debate_bitorko_club_biboron['university_club_pres'])) ? $debate_bitorko_club_biboron['university_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_club_bri" data-title="Enter"><?php echo $university_club_bri =  (isset($debate_bitorko_club_biboron['university_club_bri'])) ? $debate_bitorko_club_biboron['university_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_club_gha" data-title="Enter"><?php echo $university_club_gha =  (isset($debate_bitorko_club_biboron['university_club_gha'])) ? $debate_bitorko_club_biboron['university_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_komiti" data-title="Enter"><?php echo $university_komiti =  (isset($debate_bitorko_club_biboron['university_komiti'])) ? $debate_bitorko_club_biboron['university_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_club" data-title="Enter"><?php echo $university_club =  (isset($debate_bitorko_club_biboron['university_club'])) ? $debate_bitorko_club_biboron['university_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="university_club_comments" data-title="Enter"><?php echo $university_club_comments =  (isset($debate_bitorko_club_biboron['university_club_comments'])) ? $debate_bitorko_club_biboron['university_club_comments'] : ""; ?></a>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="tg-pwj7" rowspan="">কলেজ </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_pres" data-title="Enter"><?php echo $college_pres =  (isset($debate_bitorko_club_biboron['college_pres'])) ? $debate_bitorko_club_biboron['college_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_club_prev" data-title="Enter"><?php echo $college_club_prev =  (isset($debate_bitorko_club_biboron['college_club_prev'])) ? $debate_bitorko_club_biboron['college_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_club_pres" data-title="Enter"><?php echo $college_club_pres =  (isset($debate_bitorko_club_biboron['college_club_pres'])) ? $debate_bitorko_club_biboron['college_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_club_bri" data-title="Enter"><?php echo $college_club_bri =  (isset($debate_bitorko_club_biboron['college_club_bri'])) ? $debate_bitorko_club_biboron['college_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_club_gha" data-title="Enter"><?php echo $college_club_gha =  (isset($debate_bitorko_club_biboron['college_club_gha'])) ? $debate_bitorko_club_biboron['college_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_komiti" data-title="Enter"><?php echo $college_komiti =  (isset($debate_bitorko_club_biboron['college_komiti'])) ? $debate_bitorko_club_biboron['college_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_club" data-title="Enter"><?php echo $college_club =  (isset($debate_bitorko_club_biboron['college_club'])) ? $debate_bitorko_club_biboron['college_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="college_club_comments" data-title="Enter"><?php echo $college_club_comments =  (isset($debate_bitorko_club_biboron['college_club_comments'])) ? $debate_bitorko_club_biboron['college_club_comments'] : ""; ?></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-pwj7" rowspan="">মাদরাসা</td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_pres" data-title="Enter"><?php echo $madrasha_pres =  (isset($debate_bitorko_club_biboron['madrasha_pres'])) ? $debate_bitorko_club_biboron['madrasha_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_club_prev" data-title="Enter"><?php echo $madrasha_club_prev =  (isset($debate_bitorko_club_biboron['madrasha_club_prev'])) ? $debate_bitorko_club_biboron['madrasha_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_club_pres" data-title="Enter"><?php echo $madrasha_club_pres =  (isset($debate_bitorko_club_biboron['madrasha_club_pres'])) ? $debate_bitorko_club_biboron['madrasha_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_club_bri" data-title="Enter"><?php echo $madrasha_club_bri =  (isset($debate_bitorko_club_biboron['madrasha_club_bri'])) ? $debate_bitorko_club_biboron['madrasha_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_club_gha" data-title="Enter"><?php echo $madrasha_club_gha =  (isset($debate_bitorko_club_biboron['madrasha_club_gha'])) ? $debate_bitorko_club_biboron['madrasha_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_komiti" data-title="Enter"><?php echo $madrasha_komiti =  (isset($debate_bitorko_club_biboron['madrasha_komiti'])) ? $debate_bitorko_club_biboron['madrasha_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_club" data-title="Enter"><?php echo $madrasha_club =  (isset($debate_bitorko_club_biboron['madrasha_club'])) ? $debate_bitorko_club_biboron['madrasha_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="madrasha_club_comments" data-title="Enter"><?php echo $madrasha_club_comments =  (isset($debate_bitorko_club_biboron['madrasha_club_comments'])) ? $debate_bitorko_club_biboron['madrasha_club_comments'] : ""; ?></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-pwj7" rowspan="">স্কুল</td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_pres" data-title="Enter"><?php echo $school_pres =  (isset($debate_bitorko_club_biboron['school_pres'])) ? $debate_bitorko_club_biboron['school_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_club_prev" data-title="Enter"><?php echo $school_club_prev =  (isset($debate_bitorko_club_biboron['school_club_prev'])) ? $debate_bitorko_club_biboron['school_club_prev'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_club_pres" data-title="Enter"><?php echo $school_club_pres =  (isset($debate_bitorko_club_biboron['school_club_pres'])) ? $debate_bitorko_club_biboron['school_club_pres'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_club_bri" data-title="Enter"><?php echo $school_club_bri =  (isset($debate_bitorko_club_biboron['school_club_bri'])) ? $debate_bitorko_club_biboron['school_club_bri'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_club_gha" data-title="Enter"><?php echo $school_club_gha =  (isset($debate_bitorko_club_biboron['school_club_gha'])) ? $debate_bitorko_club_biboron['school_club_gha'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_komiti" data-title="Enter"><?php echo $school_komiti =  (isset($debate_bitorko_club_biboron['school_komiti'])) ? $debate_bitorko_club_biboron['school_komiti'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_club" data-title="Enter"><?php echo $school_club=  (isset($debate_bitorko_club_biboron['school_club'])) ? $debate_bitorko_club_biboron['school_club'] : 0; ?></a>
                                </td>

                                <td class="tg-0pky  type_10">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="debate_bitorko_club_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_club_comments" data-title="Enter"><?php echo $school_club_comments =  (isset($debate_bitorko_club_biboron['school_club_comments'])) ? $debate_bitorko_club_biboron['school_club_comments'] : ""; ?></a>
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