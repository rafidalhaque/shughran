<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০৪' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="10"><b>জেএসসি ফলাফল পরিসংখ্যান </b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7">জনশক্তি</td>
                                <td class="tg-pwj7">মোট পরীক্ষার্থী</td>
                                <td class="tg-pwj7">জিপিএ-৫</td>
                                <td class="tg-pwj7">এ গ্রেড</td>
                                <td class="tg-pwj7">এ- গ্রেড</td>
                                <td class="tg-pwj7">বি গ্রেড</td>
                                <td class="tg-pwj7">সি গ্রেড</td>
                                <td class="tg-pwj7">ডি গ্রেড</td>
                                <td class="tg-pwj7">মোট</td>
                            </tr>
                            <?php
                                $pk = (isset($school_jsc_result['id']))?$school_jsc_result['id']:'';
                            ?>
                             <?php $total_mot_examine = $total_mem_gpa_5 = $total_mem_a_grade = $total_mem_a_minus = $total_mem_b_grade = $total_mem_c_grade = $total_mem_d_grade = $total_sodosso = $total_all = $total_manobik = 0;  ?>
                            <tr>
                                <td class="tg-y698 type_1">১</td>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_mot_examine" data-title="Enter">
                                        <?php echo $mem_mot_examine =  (isset($school_jsc_result['mem_mot_examine'])) ? $school_jsc_result['mem_mot_examine'] : 0;   $total_mot_examine +=  $mem_mot_examine; 
                                        $total_sodosso += $mem_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_gpa_5" data-title="Enter">
                                        <?php echo $mem_gpa_5 =  (isset($school_jsc_result['mem_gpa_5'])) ? $school_jsc_result['mem_gpa_5'] : 0; $total_sodosso += $mem_gpa_5;
                                        $total_mem_gpa_5 += $mem_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_a_grade" data-title="Enter">
                                        <?php echo $mem_a_grade =  (isset($school_jsc_result['mem_a_grade'])) ? $school_jsc_result['mem_a_grade'] : 0;  $total_sodosso += $mem_a_grade; 
                                        $total_mem_a_grade += $mem_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_a_minus" data-title="Enter">
                                        <?php echo $mem_a_minus =  (isset($school_jsc_result['mem_a_minus'])) ? $school_jsc_result['mem_a_minus'] : 0;  $total_sodosso += $mem_a_minus; 
                                        $total_mem_a_minus += $mem_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_b_grade" data-title="Enter">
                                        <?php echo $mem_b_grade =  (isset($school_jsc_result['mem_b_grade'])) ? $school_jsc_result['mem_b_grade'] : 0;$total_sodosso += $mem_b_grade; 
                                        $total_mem_b_grade += $mem_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_c_grade" data-title="Enter">
                                        <?php echo $mem_c_grade =  (isset($school_jsc_result['mem_c_grade'])) ? $school_jsc_result['mem_c_grade'] : 0; $total_sodosso += $mem_c_grade; 
                                        $total_mem_c_grade += $mem_c_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_d_grade" data-title="Enter">
                                        <?php echo $mem_d_grade =  (isset($school_jsc_result['mem_d_grade'])) ? $school_jsc_result['mem_d_grade'] : 0;$total_sodosso += $mem_d_grade; 
                                        $total_mem_d_grade += $mem_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_sodosso; $total_all += $total_sodosso; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">২</td>
                                <td class="tg-y698 type_1">সাথী</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_mot_examine" data-title="Enter">
                                        <?php echo $sathi_mot_examine =  (isset($school_jsc_result['sathi_mot_examine'])) ? $school_jsc_result['sathi_mot_examine'] : 0;  $total_sathi += $sathi_mot_examine; 
                                        $total_mot_examine +=  $sathi_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_gpa_5" data-title="Enter">
                                        <?php echo $sathi_gpa_5 =  (isset($school_jsc_result['sathi_gpa_5'])) ? $school_jsc_result['sathi_gpa_5'] : 0;   $total_sathi += $sathi_gpa_5; 
                                        $total_mem_gpa_5 += $sathi_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_grade" data-title="Enter">
                                        <?php echo $sathi_a_grade =  (isset($school_jsc_result['sathi_a_grade'])) ? $school_jsc_result['sathi_a_grade'] : 0;   $total_sathi += $sathi_a_grade; 
                                        $total_mem_a_grade += $sathi_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_minus" data-title="Enter">
                                        <?php echo $sathi_a_minus =  (isset($school_jsc_result['sathi_a_minus'])) ? $school_jsc_result['sathi_a_minus'] : 0; $total_sathi += $sathi_a_minus; 
                                        $total_mem_a_minus += $sathi_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_b_grade" data-title="Enter">
                                        <?php echo $sathi_b_grade =  (isset($school_jsc_result['sathi_b_grade'])) ? $school_jsc_result['sathi_b_grade'] : 0;  $total_sathi += $sathi_b_grade; 
                                        $total_mem_b_grade += $sathi_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_grade" data-title="Enter">
                                        <?php echo $sathi_c_grade =  (isset($school_jsc_result['sathi_c_grade'])) ? $school_jsc_result['sathi_c_grade'] : 0;   $total_sathi += $sathi_c_grade; 
                                        $total_mem_c_grade += $sathi_c_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_d_grade" data-title="Enter">
                                        <?php echo $sathi_d_grade =  (isset($school_jsc_result['sathi_d_grade'])) ? $school_jsc_result['sathi_d_grade'] : 0;   $total_sathi += $sathi_d_grade; 
                                        $total_mem_d_grade += $sathi_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_sathi; $total_all += $total_sathi; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">৩</td>
                                <td class="tg-y698 type_1">কর্মী</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_mot_examine" data-title="Enter">
                                        <?php echo $kormi_mot_examine =  (isset($school_jsc_result['kormi_mot_examine'])) ? $school_jsc_result['kormi_mot_examine'] : 0; $total_kormi += $kormi_mot_examine; 
                                        $total_mot_examine +=  $kormi_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_gpa_5" data-title="Enter">
                                        <?php echo $kormi_gpa_5 =  (isset($school_jsc_result['kormi_gpa_5'])) ? $school_jsc_result['kormi_gpa_5'] : 0;  $total_kormi += $kormi_gpa_5; 
                                        $total_mem_gpa_5 += $kormi_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_grade" data-title="Enter">
                                        <?php echo $kormi_a_grade =  (isset($school_jsc_result['kormi_a_grade'])) ? $school_jsc_result['kormi_a_grade'] : 0; $total_kormi += $kormi_a_grade; 
                                        $total_mem_a_grade += $kormi_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_minus" data-title="Enter">
                                        <?php echo $kormi_a_minus =  (isset($school_jsc_result['kormi_a_minus'])) ? $school_jsc_result['kormi_a_minus'] : 0;   $total_kormi += $kormi_a_minus; 
                                        $total_mem_a_minus += $kormi_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_b_grade" data-title="Enter">
                                        <?php echo $kormi_b_grade =  (isset($school_jsc_result['kormi_b_grade'])) ? $school_jsc_result['kormi_b_grade'] : 0; $total_kormi += $kormi_b_grade; 
                                        $total_mem_b_grade += $kormi_b_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_grade" data-title="Enter">
                                        <?php echo $kormi_c_grade =  (isset($school_jsc_result['kormi_c_grade'])) ? $school_jsc_result['kormi_c_grade'] : 0; $total_kormi += $kormi_c_grade; 
                                        $total_mem_c_grade += $kormi_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_d_grade" data-title="Enter">
                                        <?php echo $kormi_d_grade =  (isset($school_jsc_result['kormi_d_grade'])) ? $school_jsc_result['kormi_d_grade'] : 0;$total_kormi += $kormi_d_grade; 
                                        $total_mem_d_grade += $kormi_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_kormi; $total_all += $total_kormi; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">৪</td>
                                <td class="tg-y698 type_1">সমর্থক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_mot_examine =  (isset($school_jsc_result['shomorthok_mot_examine'])) ? $school_jsc_result['shomorthok_mot_examine'] : 0;  $total_shomorthok += $shomorthok_mot_examine; 
                                        $total_mot_examine +=  $shomorthok_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_gpa_5 =  (isset($school_jsc_result['shomorthok_gpa_5'])) ? $school_jsc_result['shomorthok_gpa_5'] : 0;  $total_shomorthok += $shomorthok_gpa_5; 
                                        $total_mem_gpa_5 +=  $shomorthok_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_grade =  (isset($school_jsc_result['shomorthok_a_grade'])) ? $school_jsc_result['shomorthok_a_grade'] : 0;  $total_shomorthok += $shomorthok_a_grade; 
                                        $total_mem_a_grade +=  $shomorthok_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_a_minus =  (isset($school_jsc_result['shomorthok_a_minus'])) ? $school_jsc_result['shomorthok_a_minus'] : 0;  $total_shomorthok += $shomorthok_a_minus; 
                                        $total_mem_a_minus +=  $shomorthok_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_b_grade =  (isset($school_jsc_result['shomorthok_b_grade'])) ? $school_jsc_result['shomorthok_b_grade'] : 0;  $total_shomorthok += $shomorthok_b_grade; 
                                        $total_mem_b_grade +=  $shomorthok_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_grade =  (isset($school_jsc_result['shomorthok_c_grade'])) ? $school_jsc_result['shomorthok_c_grade'] : 0;  $total_shomorthok += $shomorthok_c_grade; 
                                        $total_mem_c_grade +=  $shomorthok_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_jsc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_d_grade =  (isset($school_jsc_result['shomorthok_d_grade'])) ? $school_jsc_result['shomorthok_d_grade'] : 0;  $total_shomorthok += $shomorthok_d_grade; 
                                        $total_mem_d_grade +=  $shomorthok_d_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_shomorthok; $total_all += $total_shomorthok;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>মোট</td>
                                <td class="tg-0pky">
                                    <?= $total_mot_examine; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_mem_gpa_5; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_mem_a_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_mem_a_minus; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_mem_b_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_mem_c_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_mem_d_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_all; ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="11"><b>এসএসসি ফলাফল পরিসংখ্যান </b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7" colspan='2'>জনশক্তি</td>
                                <td class="tg-pwj7">মোট পরীক্ষার্থী</td>
                                <td class="tg-pwj7">জিপিএ-৫</td>
                                <td class="tg-pwj7">এ গ্রেড</td>
                                <td class="tg-pwj7">এ- গ্রেড</td>
                                <td class="tg-pwj7">বি গ্রেড</td>
                                <td class="tg-pwj7">সি গ্রেড</td>
                                <td class="tg-pwj7">ডি গ্রেড</td>
                                <td class="tg-pwj7">মোট</td>
                            </tr>
                            <?php
                                $pk = (isset($school_ssc_result['id']))?$school_ssc_result['id']:'';
                            ?>
                             <?php 
                                $total_s_biggan = $total_s_manobik = $total_s_bebsa = 0; 
                                $total_sathi_biggan = $total_sathi_manobik = $total_sathi_bebsa = 0; 
                                $total_shomorthok_biggan = $total_shomorthok_manobik = $total_shomorthok_bebsa = 0; 
                                $total_somorthok_biggan = $total_somorthok_manobik = $total_somorthok_bebsa = 0; 
                                $total_examinee = $total_gpa_5 = $total_a_grade = $total_a_minas_grade = $total_b_grade = $total_c_grade = $total_d_grade = 0; 
                            ?>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>১</td>
                                <td class="tg-y698 type_1" rowspan='3'>সদস্য</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_mot_examine" data-title="Enter">
                                        <?php echo $shodossho_s_mot_examine =  (isset($school_ssc_result['shodossho_s_mot_examine'])) ? $school_ssc_result['shodossho_s_mot_examine'] : 0;    $total_s_biggan += $shodossho_s_mot_examine; 
                                        $total_examinee += $shodossho_s_mot_examine;    ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_gpa_5" data-title="Enter">
                                        <?php echo $shodossho_s_gpa_5 =  (isset($school_ssc_result['shodossho_s_gpa_5'])) ? $school_ssc_result['shodossho_s_gpa_5'] : 0;    $total_s_biggan += $shodossho_s_gpa_5; 
                                        $total_gpa_5 += $shodossho_s_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_a_grade" data-title="Enter">
                                        <?php echo $shodossho_s_a_grade =  (isset($school_ssc_result['shodossho_s_a_grade'])) ? $school_ssc_result['shodossho_s_a_grade'] : 0;  $total_s_biggan += $shodossho_s_a_grade; 
                                        $total_a_grade += $shodossho_s_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_a_minus" data-title="Enter">
                                        <?php echo $shodossho_s_a_minus =  (isset($school_ssc_result['shodossho_s_a_minus'])) ? $school_ssc_result['shodossho_s_a_minus'] : 0;  $total_s_biggan += $shodossho_s_a_minus; 
                                        $total_a_minas_grade += $shodossho_s_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_b_grade" data-title="Enter">
                                        <?php echo $shodossho_s_b_grade =  (isset($school_ssc_result['shodossho_s_b_grade'])) ? $school_ssc_result['shodossho_s_b_grade'] : 0;  $total_s_biggan += $shodossho_s_b_grade; 
                                        $total_b_grade += $shodossho_s_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_c_grade" data-title="Enter">
                                        <?php echo $shodossho_s_c_grade =  (isset($school_ssc_result['shodossho_s_c_grade'])) ? $school_ssc_result['shodossho_s_c_grade'] : 0; $total_s_biggan += $shodossho_s_c_grade; 
                                        $total_c_grade += $shodossho_s_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_d_grade" data-title="Enter">
                                        <?php echo $shodossho_s_d_grade =  (isset($school_ssc_result['shodossho_s_d_grade'])) ? $school_ssc_result['shodossho_s_d_grade'] : 0;   $total_s_biggan += $shodossho_s_d_grade; 
                                        $total_d_grade += $shodossho_s_d_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_biggan; ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_mot_examine" data-title="Enter">
                                        <?php echo $shodossho_a_mot_examine =  (isset($school_ssc_result['shodossho_a_mot_examine'])) ? $school_ssc_result['shodossho_a_mot_examine'] : 0;  $total_s_manobik += $shodossho_a_mot_examine; 
                                        $total_examinee += $shodossho_a_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_gpa_5" data-title="Enter">
                                        <?php echo $shodossho_a_gpa_5 =  (isset($school_ssc_result['shodossho_a_gpa_5'])) ? $school_ssc_result['shodossho_a_gpa_5'] : 0;  $total_s_manobik += $shodossho_a_gpa_5; 
                                        $total_gpa_5 += $shodossho_a_gpa_5; 
?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_a_grade" data-title="Enter">
                                        <?php echo $shodossho_a_a_grade =  (isset($school_ssc_result['shodossho_a_a_grade'])) ? $school_ssc_result['shodossho_a_a_grade'] : 0;  $total_s_manobik += $shodossho_a_a_grade; 
                                        $total_a_grade += $shodossho_a_a_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_a_minus" data-title="Enter">
                                        <?php echo $shodossho_a_a_minus =  (isset($school_ssc_result['shodossho_a_a_minus'])) ? $school_ssc_result['shodossho_a_a_minus'] : 0;  $total_s_manobik += $shodossho_a_a_minus; 
                                        $total_a_minas_grade += $shodossho_a_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_b_grade" data-title="Enter">
                                        <?php echo $shodossho_a_b_grade =  (isset($school_ssc_result['shodossho_a_b_grade'])) ? $school_ssc_result['shodossho_a_b_grade'] : 0; $total_s_manobik += $shodossho_a_b_grade; 
                                        $total_b_grade += $shodossho_a_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_c_grade" data-title="Enter">
                                        <?php echo $shodossho_a_c_grade =  (isset($school_ssc_result['shodossho_a_c_grade'])) ? $school_ssc_result['shodossho_a_c_grade'] : 0; $total_s_manobik += $shodossho_a_c_grade; 
                                        $total_c_grade += $shodossho_a_c_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_d_grade" data-title="Enter">
                                        <?php echo $shodossho_a_d_grade =  (isset($school_ssc_result['shodossho_a_d_grade'])) ? $school_ssc_result['shodossho_a_d_grade'] : 0;  $total_s_manobik += $shodossho_a_d_grade; 
                                        $total_d_grade += $shodossho_a_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায়</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_mot_examine" data-title="Enter">
                                        <?php echo $shodossho_c_mot_examine =  (isset($school_ssc_result['shodossho_c_mot_examine'])) ? $school_ssc_result['shodossho_c_mot_examine'] : 0;  $total_s_bebsa += $shodossho_c_mot_examine; 
                                        $total_examinee += $shodossho_c_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_gpa_5" data-title="Enter">
                                        <?php echo $shodossho_c_gpa_5 =  (isset($school_ssc_result['shodossho_c_gpa_5'])) ? $school_ssc_result['shodossho_c_gpa_5'] : 0; $total_s_bebsa += $shodossho_c_gpa_5; 
                                        $total_gpa_5 += $shodossho_c_gpa_5;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_a_grade" data-title="Enter">
                                        <?php echo $shodossho_c_a_grade =  (isset($school_ssc_result['shodossho_c_a_grade'])) ? $school_ssc_result['shodossho_c_a_grade'] : 0;  $total_s_bebsa += $shodossho_c_a_grade; 
                                        $total_a_grade += $shodossho_c_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_a_minus" data-title="Enter">
                                        <?php echo $shodossho_c_a_minus =  (isset($school_ssc_result['shodossho_c_a_minus'])) ? $school_ssc_result['shodossho_c_a_minus'] : 0; $total_s_bebsa += $shodossho_c_a_minus; 
                                        $total_a_minas_grade += $shodossho_c_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_b_grade" data-title="Enter">
                                        <?php echo $shodossho_c_b_grade =  (isset($school_ssc_result['shodossho_c_b_grade'])) ? $school_ssc_result['shodossho_c_b_grade'] : 0;  $total_s_bebsa += $shodossho_c_b_grade; 
                                        $total_b_grade += $shodossho_c_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_c_grade" data-title="Enter">
                                        <?php echo $shodossho_c_c_grade =  (isset($school_ssc_result['shodossho_c_c_grade'])) ? $school_ssc_result['shodossho_c_c_grade'] : 0; $total_s_bebsa += $shodossho_c_c_grade; 
                                        $total_c_grade += $shodossho_c_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_d_grade" data-title="Enter">
                                        <?php echo $shodossho_c_d_grade =  (isset($school_ssc_result['shodossho_c_d_grade'])) ? $school_ssc_result['shodossho_c_d_grade'] : 0; $total_s_bebsa += $shodossho_c_d_grade; 
                                        $total_d_grade += $shodossho_c_d_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>২</td>
                                <td class="tg-y698 type_1" rowspan='3'>সাথী</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_mot_examine" data-title="Enter">
                                        <?php echo $sathi_s_mot_examine =  (isset($school_ssc_result['sathi_s_mot_examine'])) ? $school_ssc_result['sathi_s_mot_examine'] : 0;$total_sathi_biggan += $sathi_s_mot_examine; 
                                        $total_examinee += $sathi_s_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_gpa_5" data-title="Enter">
                                        <?php echo $sathi_s_gpa_5 =  (isset($school_ssc_result['sathi_s_gpa_5'])) ? $school_ssc_result['sathi_s_gpa_5'] : 0;  $total_sathi_biggan += $sathi_s_gpa_5;
                                        $total_gpa_5 += $sathi_s_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_a_grade" data-title="Enter">
                                        <?php echo $sathi_s_a_grade =  (isset($school_ssc_result['sathi_s_a_grade'])) ? $school_ssc_result['sathi_s_a_grade'] : 0; $total_sathi_biggan += $sathi_s_a_grade;
                                        $total_a_grade += $sathi_s_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_a_minus" data-title="Enter">
                                        <?php echo $sathi_s_a_minus =  (isset($school_ssc_result['sathi_s_a_minus'])) ? $school_ssc_result['sathi_s_a_minus'] : 0;  $total_sathi_biggan += $sathi_s_a_minus;
                                        $total_a_minas_grade += $sathi_s_a_minus;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_b_grade" data-title="Enter">
                                        <?php echo $sathi_s_b_grade =  (isset($school_ssc_result['sathi_s_b_grade'])) ? $school_ssc_result['sathi_s_b_grade'] : 0; $total_sathi_biggan += $sathi_s_b_grade;
                                        $total_b_grade += $sathi_s_b_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_c_grade" data-title="Enter">
                                        <?php echo $sathi_s_c_grade =  (isset($school_ssc_result['sathi_s_c_grade'])) ? $school_ssc_result['sathi_s_c_grade'] : 0; $total_sathi_biggan += $sathi_s_c_grade;
                                        $total_c_grade += $sathi_s_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_d_grade" data-title="Enter">
                                        <?php echo $sathi_s_d_grade =  (isset($school_ssc_result['sathi_s_d_grade'])) ? $school_ssc_result['sathi_s_d_grade'] : 0;  $total_sathi_biggan += $sathi_s_d_grade;
                                        $total_d_grade += $sathi_s_d_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_mot_examine" data-title="Enter">
                                        <?php echo $sathi_a_mot_examine =  (isset($school_ssc_result['sathi_a_mot_examine'])) ? $school_ssc_result['sathi_a_mot_examine'] : 0;  $total_sathi_manobik += $sathi_a_mot_examine; 
                                        $total_examinee += $sathi_a_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_gpa_5" data-title="Enter">
                                        <?php echo $sathi_a_gpa_5 =  (isset($school_ssc_result['sathi_a_gpa_5'])) ? $school_ssc_result['sathi_a_gpa_5'] : 0;$total_sathi_manobik += $sathi_a_gpa_5; 
                                        $total_gpa_5 += $sathi_a_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_a_grade" data-title="Enter">
                                        <?php echo $sathi_a_a_grade =  (isset($school_ssc_result['sathi_a_a_grade'])) ? $school_ssc_result['sathi_a_a_grade'] : 0;$total_sathi_manobik += $sathi_a_a_grade; 
                                        $total_a_grade += $sathi_a_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_a_minus" data-title="Enter">
                                        <?php echo $sathi_a_a_minus =  (isset($school_ssc_result['sathi_a_a_minus'])) ? $school_ssc_result['sathi_a_a_minus'] : 0;  $total_sathi_manobik += $sathi_a_a_minus; 
                                        $total_a_minas_grade += $sathi_a_a_minus;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_b_grade" data-title="Enter">
                                        <?php echo $sathi_a_b_grade =  (isset($school_ssc_result['sathi_a_b_grade'])) ? $school_ssc_result['sathi_a_b_grade'] : 0; $total_sathi_manobik += $sathi_a_b_grade; 
                                        $total_b_grade += $sathi_a_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_c_grade" data-title="Enter">
                                        <?php echo $sathi_a_c_grade =  (isset($school_ssc_result['sathi_a_c_grade'])) ? $school_ssc_result['sathi_a_c_grade'] : 0; $total_sathi_manobik += $sathi_a_c_grade; 
                                        $total_c_grade += $sathi_a_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_d_grade" data-title="Enter">
                                        <?php echo $sathi_a_d_grade =  (isset($school_ssc_result['sathi_a_d_grade'])) ? $school_ssc_result['sathi_a_d_grade'] : 0; $total_sathi_manobik += $sathi_a_d_grade; 
                                        $total_d_grade += $sathi_a_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায়</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_mot_examine" data-title="Enter">
                                        <?php echo $sathi_c_mot_examine =  (isset($school_ssc_result['sathi_c_mot_examine'])) ? $school_ssc_result['sathi_c_mot_examine'] : 0;  $total_sathi_bebsa += $sathi_c_mot_examine; 
                                        $total_examinee += $sathi_c_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_gpa_5" data-title="Enter">
                                        <?php echo $sathi_c_gpa_5 =  (isset($school_ssc_result['sathi_c_gpa_5'])) ? $school_ssc_result['sathi_c_gpa_5'] : 0; $total_sathi_bebsa += $sathi_c_gpa_5; 
                                        $total_gpa_5 += $sathi_c_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_a_grade" data-title="Enter">
                                        <?php echo $sathi_c_a_grade =  (isset($school_ssc_result['sathi_c_a_grade'])) ? $school_ssc_result['sathi_c_a_grade'] : 0; $total_sathi_bebsa += $sathi_c_a_grade; 
                                        $total_a_grade += $sathi_c_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_a_minus" data-title="Enter">
                                        <?php echo $sathi_c_a_minus =  (isset($school_ssc_result['sathi_c_a_minus'])) ? $school_ssc_result['sathi_c_a_minus'] : 0;   $total_sathi_bebsa += $sathi_c_a_minus; 
                                        $total_a_minas_grade += $sathi_c_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_b_grade" data-title="Enter">
                                        <?php echo $sathi_c_b_grade =  (isset($school_ssc_result['sathi_c_b_grade'])) ? $school_ssc_result['sathi_c_b_grade'] : 0;    $total_sathi_bebsa += $sathi_c_b_grade; 
                                        $total_b_grade += $sathi_c_b_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_c_grade" data-title="Enter">
                                        <?php echo $sathi_c_c_grade =  (isset($school_ssc_result['sathi_c_c_grade'])) ? $school_ssc_result['sathi_c_c_grade'] : 0; $total_sathi_bebsa += $sathi_c_c_grade; 
                                        $total_c_grade += $sathi_c_c_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_d_grade" data-title="Enter">
                                        <?php echo $sathi_c_d_grade =  (isset($school_ssc_result['sathi_c_d_grade'])) ? $school_ssc_result['sathi_c_d_grade'] : 0;  $total_sathi_bebsa += $sathi_c_d_grade; 
                                        $total_d_grade += $sathi_c_d_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>৩</td>
                                <td class="tg-y698 type_1" rowspan='3'>কর্মী</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_mot_examine" data-title="Enter">
                                        <?php echo $kormi_s_mot_examine =  (isset($school_ssc_result['kormi_s_mot_examine'])) ? $school_ssc_result['kormi_s_mot_examine'] : 0;  $total_kormi_biggan += $kormi_s_mot_examine; 
                                        $total_examinee += $kormi_s_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_gpa_5" data-title="Enter">
                                        <?php echo $kormi_s_gpa_5 =  (isset($school_ssc_result['kormi_s_gpa_5'])) ? $school_ssc_result['kormi_s_gpa_5'] : 0;  $total_kormi_biggan += $kormi_s_gpa_5; 
                                        $total_gpa_5 += $kormi_s_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_a_grade" data-title="Enter">
                                        <?php echo $kormi_s_a_grade =  (isset($school_ssc_result['kormi_s_a_grade'])) ? $school_ssc_result['kormi_s_a_grade'] : 0; $total_kormi_biggan += $kormi_s_a_grade; 
                                        $total_a_grade += $kormi_s_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_a_minus" data-title="Enter">
                                        <?php echo $kormi_s_a_minus =  (isset($school_ssc_result['kormi_s_a_minus'])) ? $school_ssc_result['kormi_s_a_minus'] : 0;  $total_kormi_biggan += $kormi_s_a_minus; 
                                        $total_a_minas_grade += $kormi_s_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_b_grade" data-title="Enter">
                                        <?php echo $kormi_s_b_grade =  (isset($school_ssc_result['kormi_s_b_grade'])) ? $school_ssc_result['kormi_s_b_grade'] : 0; $total_kormi_biggan += $kormi_s_b_grade; 
                                        $total_b_grade += $kormi_s_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_c_grade" data-title="Enter">
                                        <?php echo $kormi_s_c_grade =  (isset($school_ssc_result['kormi_s_c_grade'])) ? $school_ssc_result['kormi_s_c_grade'] : 0;$total_kormi_biggan += $kormi_s_c_grade; 
                                        $total_c_grade += $kormi_s_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_d_grade" data-title="Enter">
                                        <?php echo $kormi_s_d_grade =  (isset($school_ssc_result['kormi_s_d_grade'])) ? $school_ssc_result['kormi_s_d_grade'] : 0;                  $total_kormi_biggan += $kormi_s_d_grade; 
                                        $total_d_grade += $kormi_s_d_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_mot_examine" data-title="Enter">
                                        <?php echo $kormi_a_mot_examine =  (isset($school_ssc_result['kormi_a_mot_examine'])) ? $school_ssc_result['kormi_a_mot_examine'] : 0;   $total_kormi_manobik += $kormi_a_mot_examine;
                                        $total_examinee += $kormi_a_mot_examine;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_gpa_5" data-title="Enter">
                                        <?php echo $kormi_a_gpa_5 =  (isset($school_ssc_result['kormi_a_gpa_5'])) ? $school_ssc_result['kormi_a_gpa_5'] : 0;  $total_kormi_manobik += $kormi_a_gpa_5; 
                                        $total_gpa_5 += $kormi_a_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_a_grade" data-title="Enter">
                                        <?php echo $kormi_a_a_grade =  (isset($school_ssc_result['kormi_a_a_grade'])) ? $school_ssc_result['kormi_a_a_grade'] : 0;$total_kormi_manobik += $kormi_a_a_grade; 
                                        $total_a_grade += $kormi_a_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_a_minus" data-title="Enter">
                                        <?php echo $kormi_a_a_minus =  (isset($school_ssc_result['kormi_a_a_minus'])) ? $school_ssc_result['kormi_a_a_minus'] : 0; $total_kormi_manobik += $kormi_a_a_minus; 
                                        $total_a_minas_grade += $kormi_a_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_b_grade" data-title="Enter">
                                        <?php echo $kormi_a_b_grade =  (isset($school_ssc_result['kormi_a_b_grade'])) ? $school_ssc_result['kormi_a_b_grade'] : 0;  $total_kormi_manobik += $kormi_a_b_grade; 
                                        $total_b_grade += $kormi_a_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_c_grade" data-title="Enter">
                                        <?php echo $kormi_a_c_grade =  (isset($school_ssc_result['kormi_a_c_grade'])) ? $school_ssc_result['kormi_a_c_grade'] : 0; $total_kormi_manobik += $kormi_a_c_grade; 
                                        $total_c_grade += $kormi_a_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_d_grade" data-title="Enter">
                                        <?php echo $kormi_a_d_grade =  (isset($school_ssc_result['kormi_a_d_grade'])) ? $school_ssc_result['kormi_a_d_grade'] : 0; $total_kormi_manobik += $kormi_a_d_grade; 
                                        $total_d_grade += $kormi_a_d_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায়</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_mot_examine" data-title="Enter">
                                        <?php echo $kormi_c_mot_examine =  (isset($school_ssc_result['kormi_c_mot_examine'])) ? $school_ssc_result['kormi_c_mot_examine'] : 0;$total_kormi_bebsa += $kormi_c_mot_examine;  
                                        $total_examinee += $kormi_c_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_gpa_5" data-title="Enter">
                                        <?php echo $kormi_c_gpa_5 =  (isset($school_ssc_result['kormi_c_gpa_5'])) ? $school_ssc_result['kormi_c_gpa_5'] : 0; $total_kormi_bebsa += $kormi_c_gpa_5; 
                                        $total_gpa_5 += $kormi_c_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_a_grade" data-title="Enter">
                                        <?php echo $kormi_c_a_grade =  (isset($school_ssc_result['kormi_c_a_grade'])) ? $school_ssc_result['kormi_c_a_grade'] : 0;  $total_kormi_bebsa += $kormi_c_a_grade; 
                                        $total_a_grade += $kormi_c_a_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_a_minus" data-title="Enter">
                                        <?php echo $kormi_c_a_minus =  (isset($school_ssc_result['kormi_c_a_minus'])) ? $school_ssc_result['kormi_c_a_minus'] : 0;  $total_kormi_bebsa += $kormi_c_a_minus; 
                                        $total_a_minas_grade += $kormi_c_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_b_grade" data-title="Enter">
                                        <?php echo $kormi_c_b_grade =  (isset($school_ssc_result['kormi_c_b_grade'])) ? $school_ssc_result['kormi_c_b_grade'] : 0;   $total_kormi_bebsa += $kormi_c_b_grade;
                                        $total_b_grade += $kormi_c_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_c_grade" data-title="Enter">
                                        <?php echo $kormi_c_c_grade =  (isset($school_ssc_result['kormi_c_c_grade'])) ? $school_ssc_result['kormi_c_c_grade'] : 0;  $total_kormi_bebsa += $kormi_c_c_grade;
                                        $total_c_grade += $kormi_c_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_d_grade" data-title="Enter">
                                        <?php echo $kormi_c_d_grade =  (isset($school_ssc_result['kormi_c_d_grade'])) ? $school_ssc_result['kormi_c_d_grade'] : 0;$total_kormi_bebsa += $kormi_c_d_grade;
                                        $total_d_grade += $kormi_c_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>৪</td>
                                <td class="tg-y698 type_1" rowspan='3'>সমর্থক</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_s_mot_examine =  (isset($school_ssc_result['shomorthok_s_mot_examine'])) ? $school_ssc_result['shomorthok_s_mot_examine'] : 0;   $total_somorthok_biggan += $shomorthok_s_mot_examine; 
                                        $total_examinee += $shomorthok_s_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_s_gpa_5 =  (isset($school_ssc_result['shomorthok_s_gpa_5'])) ? $school_ssc_result['shomorthok_s_gpa_5'] : 0;  $total_somorthok_biggan += $shomorthok_s_gpa_5;
                                        $total_gpa_5 += $shomorthok_s_gpa_5;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_a_grade =  (isset($school_ssc_result['shomorthok_s_a_grade'])) ? $school_ssc_result['shomorthok_s_a_grade'] : 0; $total_somorthok_biggan += $shomorthok_s_a_grade;
                                        $total_a_grade += $shomorthok_s_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_s_a_minus =  (isset($school_ssc_result['shomorthok_s_a_minus'])) ? $school_ssc_result['shomorthok_s_a_minus'] : 0;  $total_somorthok_biggan += $shomorthok_s_a_minus;
                                        $total_a_minas_grade += $shomorthok_s_a_minus;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_b_grade =  (isset($school_ssc_result['shomorthok_s_b_grade'])) ? $school_ssc_result['shomorthok_s_b_grade'] : 0; $total_somorthok_biggan += $shomorthok_s_b_grade;
                                        $total_b_grade += $shomorthok_s_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_c_grade =  (isset($school_ssc_result['shomorthok_s_c_grade'])) ? $school_ssc_result['shomorthok_s_c_grade'] : 0;  $total_somorthok_biggan += $shomorthok_s_c_grade;
                                        $total_c_grade += $shomorthok_s_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_d_grade =  (isset($school_ssc_result['shomorthok_s_d_grade'])) ? $school_ssc_result['shomorthok_s_d_grade'] : 0; $total_somorthok_biggan += $shomorthok_s_d_grade;
                                        $total_d_grade += $shomorthok_s_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_somorthok_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_a_mot_examine =  (isset($school_ssc_result['shomorthok_a_mot_examine'])) ? $school_ssc_result['shomorthok_a_mot_examine'] : 0; $total_somorthok_manobik += $shomorthok_a_mot_examine; 
                                        $total_examinee += $shomorthok_a_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_a_gpa_5 =  (isset($school_ssc_result['shomorthok_a_gpa_5'])) ? $school_ssc_result['shomorthok_a_gpa_5'] : 0;  $total_somorthok_manobik += $shomorthok_a_gpa_5;
                                        $total_gpa_5 += $shomorthok_a_gpa_5;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_a_grade =  (isset($school_ssc_result['shomorthok_a_a_grade'])) ? $school_ssc_result['shomorthok_a_a_grade'] : 0;     $total_somorthok_manobik += $shomorthok_a_a_grade;
                                        $total_a_grade += $shomorthok_a_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_a_a_minus =  (isset($school_ssc_result['shomorthok_a_a_minus'])) ? $school_ssc_result['shomorthok_a_a_minus'] : 0;  $total_somorthok_manobik += $shomorthok_a_a_minus;
                                        $total_a_minas_grade += $shomorthok_a_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_b_grade =  (isset($school_ssc_result['shomorthok_a_b_grade'])) ? $school_ssc_result['shomorthok_a_b_grade'] : 0;  $total_somorthok_manobik += $shomorthok_a_b_grade; 
                                        $total_b_grade += $shomorthok_a_b_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_c_grade =  (isset($school_ssc_result['shomorthok_a_c_grade'])) ? $school_ssc_result['shomorthok_a_c_grade'] : 0;  $total_somorthok_manobik += $shomorthok_a_c_grade; 
                                        $total_c_grade += $shomorthok_a_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_d_grade =  (isset($school_ssc_result['shomorthok_a_d_grade'])) ? $school_ssc_result['shomorthok_a_d_grade'] : 0;   $total_somorthok_manobik += $shomorthok_a_d_grade; 
                                        $total_d_grade += $shomorthok_a_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?=  
                                        $total_somorthok_manobik; 
                                        $total_manobik += $total_somorthok_manobik;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায়</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_c_mot_examine =  (isset($school_ssc_result['shomorthok_c_mot_examine'])) ? $school_ssc_result['shomorthok_c_mot_examine'] : 0;  $total_somorthok_bebsa += $shomorthok_c_mot_examine; 
                                        $total_examinee += $shomorthok_c_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_c_gpa_5 =  (isset($school_ssc_result['shomorthok_c_gpa_5'])) ? $school_ssc_result['shomorthok_c_gpa_5'] : 0;   $total_somorthok_bebsa += $shomorthok_c_gpa_5; 
                                        $total_gpa_5 += $shomorthok_c_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_a_grade =  (isset($school_ssc_result['shomorthok_c_a_grade'])) ? $school_ssc_result['shomorthok_c_a_grade'] : 0; $total_somorthok_bebsa += $shomorthok_c_a_grade; 
                                        $total_a_grade += $shomorthok_c_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_c_a_minus =  (isset($school_ssc_result['shomorthok_c_a_minus'])) ? $school_ssc_result['shomorthok_c_a_minus'] : 0; $total_somorthok_bebsa += $shomorthok_c_a_minus; 
                                        $total_a_minas_grade += $shomorthok_c_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_b_grade =  (isset($school_ssc_result['shomorthok_c_b_grade'])) ? $school_ssc_result['shomorthok_c_b_grade'] : 0; $total_somorthok_bebsa += $shomorthok_c_b_grade; 
                                        $total_b_grade += $shomorthok_c_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_c_grade =  (isset($school_ssc_result['shomorthok_c_c_grade'])) ? $school_ssc_result['shomorthok_c_c_grade'] : 0; $total_somorthok_bebsa += $shomorthok_c_c_grade; 
                                        $total_c_grade += $shomorthok_c_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_d_grade =  (isset($school_ssc_result['shomorthok_c_d_grade'])) ? $school_ssc_result['shomorthok_c_d_grade'] : 0;  $total_somorthok_bebsa += $shomorthok_c_d_grade; 
                                        $total_d_grade += $shomorthok_c_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_somorthok_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" colspan='3'>মোট</td>
                                <?php 
                                    $total_of_total = 0; 
                                ?>
                                <td class="tg-0pky">
                                    <?php echo $total_examinee; $total_of_total += $total_examinee; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_gpa_5; $total_of_total += $total_gpa_5; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_a_grade; $total_of_total += $total_a_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_a_minas_grade; $total_of_total += $total_a_minas_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_b_grade; $total_of_total += $total_b_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_c_grade; $total_of_total += $total_c_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_d_grade; $total_of_total += $total_d_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_of_total; ?>
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
        padding: 0; 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>