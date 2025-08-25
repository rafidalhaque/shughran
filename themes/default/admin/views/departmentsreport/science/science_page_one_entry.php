<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>



            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
                } else {
                    echo anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
                    }
                    ?>

                </ul>
            </span>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">


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
                                <td class="tg-pwj7" colspan="8"><b>শুধুমাত্র বিজ্ঞানে অধ্যয়নরত জনশক্তি ও দায়িত্বশীলদের সংখ্যাতাত্ত্বিক হিসাব </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1', '<?php echo 'Science_শুধুমাত্র বিজ্ঞানে অধ্যয়নরত জনশক্তি ও দায়িত্বশীলদের সংখ্যাতাত্ত্বিক হিসাব_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">মান </td>
                                <td class="tg-pwj7" colspan="">মোট <br> জনশক্তি </td>
                                <td class="tg-pwj7" colspan="">মাধ্যমিক </td>
                                <td class="tg-pwj7" colspan="">উচ্চ <br> মাধ্যমিক </td>
                                <td class="tg-pwj7" colspan="">স্নাতক ও <br>স্নাতকোত্তর </td>
                                <td class="tg-pwj7" colspan="">মোট <br> দায়িত্বশীল </td>
                                <td class="tg-pwj7" colspan=""> শাখা সভাপতি <br> ও সেক্রেটারি</td>
                                <td class="tg-pwj7" colspan="">শাখা <br> সেক্রেটারিয়েট </td>
                                <td class="tg-pwj7" colspan="">থানা সভাপতি ও <br> সেক্রেটারি </td>

                            </tr>
                            <?php
                            $pk = (isset($science_only_science_manpower['id'])) ? $science_only_science_manpower['id'] : '';
                            ?>
                            <?php
                            $mem_ssc =  (isset($science_only_science_manpower['mem_ssc'])) ? $science_only_science_manpower['mem_ssc'] : 0;
                            $mem_hsc =  (isset($science_only_science_manpower['mem_hsc'])) ? $science_only_science_manpower['mem_hsc'] : 0;
                            $mem_hons =  (isset($science_only_science_manpower['mem_hons'])) ? $science_only_science_manpower['mem_hons'] : 0;
                            $mem_shakha_shova =  (isset($science_only_science_manpower['mem_shakha_shova'])) ? $science_only_science_manpower['mem_shakha_shova'] : 0;
                            $mem_shakha_sec =  (isset($science_only_science_manpower['mem_shakha_sec'])) ? $science_only_science_manpower['mem_shakha_sec'] : 0;
                            $mem_thana_shova =  (isset($science_only_science_manpower['mem_thana_shova'])) ? $science_only_science_manpower['mem_thana_shova'] : 0;

                            $associate_ssc =  (isset($science_only_science_manpower['associate_ssc'])) ? $science_only_science_manpower['associate_ssc'] : 0;
                            $associate_hsc =  (isset($science_only_science_manpower['associate_hsc'])) ? $science_only_science_manpower['associate_hsc'] : 0;
                            $associate_hons =  (isset($science_only_science_manpower['associate_hons'])) ? $science_only_science_manpower['associate_hons'] : 0;
                            $associate_shakha_shova =  (isset($science_only_science_manpower['associate_shakha_shova'])) ? $science_only_science_manpower['associate_shakha_shova'] : 0;
                            $associate_shakha_sec =  (isset($science_only_science_manpower['associate_shakha_sec'])) ? $science_only_science_manpower['associate_shakha_sec'] : 0;
                            $associate_thana_shova =  (isset($science_only_science_manpower['associate_thana_shova'])) ? $science_only_science_manpower['associate_thana_shova'] : 0;

                            $worker_ssc =  (isset($science_only_science_manpower['worker_ssc'])) ? $science_only_science_manpower['worker_ssc'] : 0;
                            $worker_hsc =  (isset($science_only_science_manpower['worker_hsc'])) ? $science_only_science_manpower['worker_hsc'] : 0;
                            $worker_hons =  (isset($science_only_science_manpower['worker_hons'])) ? $science_only_science_manpower['worker_hons'] : 0;
                            $worker_shakha_shova =  (isset($science_only_science_manpower['worker_shakha_shova'])) ? $science_only_science_manpower['worker_shakha_shova'] : 0;
                            $worker_shakha_sec =  (isset($science_only_science_manpower['worker_shakha_sec'])) ? $science_only_science_manpower['worker_shakha_sec'] : 0;
                            $worker_thana_shova =  (isset($science_only_science_manpower['worker_thana_shova'])) ? $science_only_science_manpower['worker_thana_shova'] : 0;
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $total_man_sod = $mem_ssc + $mem_hsc + $mem_hons; ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_ssc" data-title="Enter">
                                        <?php echo $mem_ssc =  (isset($science_only_science_manpower['mem_ssc'])) ? $science_only_science_manpower['mem_ssc'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_hsc" data-title="Enter">
                                        <?php echo $mem_hsc =  (isset($science_only_science_manpower['mem_hsc'])) ? $science_only_science_manpower['mem_hsc'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_hons" data-title="Enter">
                                        <?php echo $mem_hons =  (isset($science_only_science_manpower['mem_hons'])) ? $science_only_science_manpower['mem_hons'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $total_mem = $mem_shakha_shova + $mem_shakha_sec + $mem_thana_shova; ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_shakha_shova" data-title="Enter">
                                        <?php echo $mem_shakha_shova =  (isset($science_only_science_manpower['mem_shakha_shova'])) ? $science_only_science_manpower['mem_shakha_shova'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_shakha_sec" data-title="Enter">
                                        <?php echo $mem_shakha_sec =  (isset($science_only_science_manpower['mem_shakha_sec'])) ? $science_only_science_manpower['mem_shakha_sec'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mem_thana_shova" data-title="Enter">
                                        <?php echo $mem_thana_shova =  (isset($science_only_science_manpower['mem_thana_shova'])) ? $science_only_science_manpower['mem_thana_shova'] : 0; ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">সাথী </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $total_man_sat = $associate_ssc + $associate_hsc + $associate_hons; ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_ssc" data-title="Enter">
                                        <?php echo $associate_ssc =  (isset($science_only_science_manpower['associate_ssc'])) ? $science_only_science_manpower['associate_ssc'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_hsc" data-title="Enter">
                                        <?php echo $associate_hsc =  (isset($science_only_science_manpower['associate_hsc'])) ? $science_only_science_manpower['associate_hsc'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_hons" data-title="Enter">
                                        <?php echo $associate_hons =  (isset($science_only_science_manpower['associate_hons'])) ? $science_only_science_manpower['associate_hons'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $total_associate = $associate_shakha_shova +
                                        $associate_shakha_sec + $associate_thana_shova ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_shakha_shova" data-title="Enter">
                                        <?php echo $associate_shakha_shova =  (isset($science_only_science_manpower['associate_shakha_shova'])) ? $science_only_science_manpower['associate_shakha_shova'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_shakha_sec" data-title="Enter">
                                        <?php echo $associate_shakha_sec =  (isset($science_only_science_manpower['associate_shakha_sec'])) ? $science_only_science_manpower['associate_shakha_sec'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="associate_thana_shova" data-title="Enter">
                                        <?php echo $associate_thana_shova =  (isset($science_only_science_manpower['associate_thana_shova'])) ? $science_only_science_manpower['associate_thana_shova'] : 0; ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> কর্মী </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $total_worker = $worker_ssc + $worker_hsc + $worker_hons; ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_ssc" data-title="Enter">
                                        <?php echo $worker_ssc =  (isset($science_only_science_manpower['worker_ssc'])) ? $science_only_science_manpower['worker_ssc'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_hsc" data-title="Enter">
                                        <?php echo $worker_hsc =  (isset($science_only_science_manpower['worker_hsc'])) ? $science_only_science_manpower['worker_hsc'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_hons" data-title="Enter">
                                        <?php echo $worker_hons =  (isset($science_only_science_manpower['worker_hons'])) ? $science_only_science_manpower['worker_hons'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $total_dat_kor = $worker_shakha_shova + $worker_shakha_sec + $worker_thana_shova; ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_shakha_shova" data-title="Enter">
                                        <?php echo $worker_shakha_shova =  (isset($science_only_science_manpower['worker_shakha_shova'])) ? $science_only_science_manpower['worker_shakha_shova'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_shakha_sec" data-title="Enter">
                                        <?php echo $worker_shakha_sec =  (isset($science_only_science_manpower['worker_shakha_sec'])) ? $science_only_science_manpower['worker_shakha_sec'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_only_science_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="worker_thana_shova" data-title="Enter">
                                        <?php echo $worker_thana_shova =  (isset($science_only_science_manpower['worker_thana_shova'])) ? $science_only_science_manpower['worker_thana_shova'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> মোট </td>

                                <td class="tg-0pky  type_2">
                                    <?php echo $total_man_sod + $total_man_sat + $total_worker ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_ssc + $associate_ssc + $worker_ssc) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_hsc + $associate_hsc + $worker_hsc) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_hons + $associate_hons + $worker_hons) ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                    <?php echo ($total_mem + $total_associate + $total_dat_kor) ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_shakha_shova + $associate_shakha_shova + $worker_shakha_shova ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_shakha_sec + $associate_shakha_sec + $worker_shakha_sec) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_thana_shova + $associate_thana_shova + $worker_thana_shova) ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>শাখা বিজ্ঞান সম্পাদক </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2', '<?php echo 'Science_শাখা বিজ্ঞান সম্পাদক_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <?php
                            $pk = (isset($science_biggan_shompadok['id'])) ? $science_biggan_shompadok['id'] : '';
                            ?>
                            <tr>
                                <td class="tg-pwj7">শাখা বিজ্ঞান সম্পাদক আছেন কিনা? </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" id="shaka_shompadok" data-idname="" data-type="select" data-table="science_biggan_shompadok" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/' . $branch_id); ?>" data-name="shaka_shompadok@science_biggan_shompadok" data-title="শাখা বিজ্ঞান সম্পাদক আছেন কিনা?">
                                    </a>
                                </td>
                                <td class="tg-pwj7">বিজ্ঞান সম্পাদক বিজ্ঞানে অধ্যয়নরত কিনা? </td>
                                <td class="tg-0pky">

                                    <a href="#" class="editable editable-click" id="biggan_shompadok" data-idname="" data-type="select" data-table="science_biggan_shompadok" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/' . $branch_id); ?>" data-name="biggan_shompadok@science_biggan_shompadok" data-title="বিজ্ঞান সম্পাদক বিজ্ঞানে অধ্যয়নরত কিনা?">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2" rowspan="2">বিজ্ঞান বিভাগের মাসিক বৈঠক</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-0lax"><a href="#" class="editable editable-click"   data-idname="" data-type="number" data-table="science_biggan_shompadok" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/' . $branch_id); ?>" data-name="meeting_number@science_biggan_shompadok" data-title="বৈঠক সংখ্যা">
                                <?php echo   (isset($science_biggan_shompadok['meeting_number'])) ? $science_biggan_shompadok['meeting_number'] : 0; ?>
                                        </a></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-0pky"><a href="#" class="editable editable-click"   data-idname="" data-type="number" data-table="science_biggan_shompadok" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/' . $branch_id); ?>" data-name="meeting_presence@science_biggan_shompadok" data-title="বৈঠকে উপস্থিতি">
                                <?php echo   (isset($science_biggan_shompadok['meeting_presence'])) ? $science_biggan_shompadok['meeting_presence'] : 0; ?>
                                    </a></td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_10' onclick="doit('xlsx','testTable10', '<?php echo 'Science_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <?php
                            $pk = (isset($science_training_program['id'])) ? $science_training_program['id'] : '';

                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_central_s" data-title="Enter">
                                        <?php echo $shikkha_central_s = (isset($science_training_program['shikkha_central_s'])) ? $science_training_program['shikkha_central_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_central_p" data-title="Enter">
                                        <?php echo $shikkha_central_p = (isset($science_training_program['shikkha_central_p'])) ? $science_training_program['shikkha_central_p'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php if ($shikkha_central_s > 0 && $shikkha_central_p > 0) {
                                        echo ($shikkha_central_p / $shikkha_central_s);
                                    } else {
                                        echo 0;
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_shakha_s" data-title="Enter">
                                        <?php echo $shikkha_shakha_s = (isset($science_training_program['shikkha_shakha_s'])) ? $science_training_program['shikkha_shakha_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_shakha_p" data-title="Enter">
                                        <?php echo $shikkha_shakha_p = (isset($science_training_program['shikkha_shakha_p'])) ? $science_training_program['shikkha_shakha_p'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php if ($shikkha_shakha_s > 0 && $shikkha_shakha_p > 0) {
                                        echo ($shikkha_shakha_p / $shikkha_shakha_s);
                                    } else {
                                        echo 0;
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_central_s" data-title="Enter">
                                        <?php echo $kormoshala_central_s = (isset($science_training_program['kormoshala_central_s'])) ? $science_training_program['kormoshala_central_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_central_p" data-title="Enter">
                                        <?php echo $kormoshala_central_p = (isset($science_training_program['kormoshala_central_p'])) ? $science_training_program['kormoshala_central_p'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php if ($kormoshala_central_s > 0 && $kormoshala_central_p > 0) {
                                        echo ($kormoshala_central_p / $kormoshala_central_s);
                                    } else {
                                        echo 0;
                                    } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_shakha_s" data-title="Enter">
                                        <?php echo $kormoshala_shakha_s = (isset($science_training_program['kormoshala_shakha_s'])) ? $science_training_program['kormoshala_shakha_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_shakha_p" data-title="Enter">
                                        <?php echo $kormoshala_shakha_p = (isset($science_training_program['kormoshala_shakha_p'])) ? $science_training_program['kormoshala_shakha_p'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php if ($kormoshala_shakha_s > 0 && $kormoshala_shakha_p > 0) {
                                        echo ($kormoshala_shakha_p / $kormoshala_shakha_s);
                                    } else {
                                        echo 0;
                                    } ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>বিজ্ঞান জনশক্তি প্রতিবেদন </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3', '<?php echo 'Science_বিজ্ঞান জনশক্তি প্রতিবেদন_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='2'>বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">তালিকা আছে কতজনের</td>
                                <td class="tg-pwj7" colspan="">যোগাযোগ কতবার</td>
                            </tr>
                            <?php
                            $pk = (isset($science_manpower_protibedon['id'])) ? $science_manpower_protibedon['id'] : '';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞান সংশ্লিষ্ট বিষয়ে কাজ করতে আগ্রহী এমন জনশক্তি</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="interested_manpower_num" data-title="Enter">
                                        <?php echo $interested_manpower_num =  (isset($science_manpower_protibedon['interested_manpower_num'])) ? $science_manpower_protibedon['interested_manpower_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="interested_manpower_talika" data-title="Enter">
                                        <?php echo $interested_manpower_talika =  (isset($science_manpower_protibedon['interested_manpower_talika'])) ? $science_manpower_protibedon['interested_manpower_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="interested_manpower_jogajog" data-title="Enter">
                                        <?php echo $interested_manpower_jogajog =  (isset($science_manpower_protibedon['interested_manpower_jogajog'])) ? $science_manpower_protibedon['interested_manpower_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞান বিষয়ে বিভিন্ন ম্যাগাজিনে লেখালেখি করেন এমন জনশক্তি
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhalekhi_kore_num" data-title="Enter">
                                        <?php echo $lekhalekhi_kore_num =  (isset($science_manpower_protibedon['lekhalekhi_kore_num'])) ? $science_manpower_protibedon['lekhalekhi_kore_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhalekhi_kore_talika" data-title="Enter">
                                        <?php echo $lekhalekhi_kore_talika =  (isset($science_manpower_protibedon['lekhalekhi_kore_talika'])) ? $science_manpower_protibedon['lekhalekhi_kore_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhalekhi_kore_jogajog" data-title="Enter">
                                        <?php echo $lekhalekhi_kore_jogajog =  (isset($science_manpower_protibedon['lekhalekhi_kore_jogajog'])) ? $science_manpower_protibedon['lekhalekhi_kore_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞানক্ষেত্রে জনপ্রিয় হয়েছেন এমন জনশক্তি</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jonopriyo_num" data-title="Enter">
                                        <?php echo $jonopriyo_num =  (isset($science_manpower_protibedon['jonopriyo_num'])) ? $science_manpower_protibedon['jonopriyo_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jonopriyo_talika" data-title="Enter">
                                        <?php echo $jonopriyo_talika =  (isset($science_manpower_protibedon['jonopriyo_talika'])) ? $science_manpower_protibedon['jonopriyo_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jonopriyo_jogajog" data-title="Enter">
                                        <?php echo $jonopriyo_jogajog =  (isset($science_manpower_protibedon['jonopriyo_jogajog'])) ? $science_manpower_protibedon['jonopriyo_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞান সংগঠন হিসেবে কাজ করছেন এমন জনশক্তি </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_num" data-title="Enter">
                                        <?php echo $shongothok_num =  (isset($science_manpower_protibedon['shongothok_num'])) ? $science_manpower_protibedon['shongothok_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_talika" data-title="Enter">
                                        <?php echo $shongothok_talika =  (isset($science_manpower_protibedon['shongothok_talika'])) ? $science_manpower_protibedon['shongothok_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_jogajog" data-title="Enter">
                                        <?php echo $shongothok_jogajog =  (isset($science_manpower_protibedon['shongothok_jogajog'])) ? $science_manpower_protibedon['shongothok_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>নিজ উদ্যোগে অলিম্পিয়াড,বিজ্ঞান কুইজ,প্রতিযোগিতা আয়োজন করেছেন এমন জনশক্তি </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_ayojon_num" data-title="Enter">
                                        <?php echo $quiz_ayojon_num =  (isset($science_manpower_protibedon['quiz_ayojon_num'])) ? $science_manpower_protibedon['quiz_ayojon_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_ayojon_talika" data-title="Enter">
                                        <?php echo $quiz_ayojon_talika =  (isset($science_manpower_protibedon['quiz_ayojon_talika'])) ? $science_manpower_protibedon['quiz_ayojon_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_ayojon_jogajog" data-title="Enter">
                                        <?php echo $quiz_ayojon_jogajog =  (isset($science_manpower_protibedon['quiz_ayojon_jogajog'])) ? $science_manpower_protibedon['quiz_ayojon_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'>স্থানীয়, জাতীয় বা আন্তর্জাতিক বিজ্ঞান বিষয়ক প্রতিযোগিতা</td>
                                <td class="tg-y698 type_1">অংশগ্রহণকারী জনশক্তি</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="attend_manpower_num" data-title="Enter">
                                        <?php echo $attend_manpower_num =  (isset($science_manpower_protibedon['attend_manpower_num'])) ? $science_manpower_protibedon['attend_manpower_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="attend_manpower_talika" data-title="Enter">
                                        <?php echo $attend_manpower_talika =  (isset($science_manpower_protibedon['attend_manpower_talika'])) ? $science_manpower_protibedon['attend_manpower_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="attend_manpower_jogajog" data-title="Enter">
                                        <?php echo $attend_manpower_jogajog =  (isset($science_manpower_protibedon['attend_manpower_jogajog'])) ? $science_manpower_protibedon['attend_manpower_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">পুরস্কারপ্রাপ্ত জনশক্তি </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="puroshkar_prapto_manpower_num" data-title="Enter">
                                        <?php echo $puroshkar_prapto_manpower_num =  (isset($science_manpower_protibedon['puroshkar_prapto_manpower_num'])) ? $science_manpower_protibedon['puroshkar_prapto_manpower_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="puroshkar_prapto_manpower_talika" data-title="Enter">
                                        <?php echo $puroshkar_prapto_manpower_talika =  (isset($science_manpower_protibedon['puroshkar_prapto_manpower_talika'])) ? $science_manpower_protibedon['puroshkar_prapto_manpower_talika'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_manpower_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="puroshkar_prapto_manpower_jogajog" data-title="Enter">
                                        <?php echo $puroshkar_prapto_manpower_jogajog =  (isset($science_manpower_protibedon['puroshkar_prapto_manpower_jogajog'])) ? $science_manpower_protibedon['puroshkar_prapto_manpower_jogajog'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan=""><b>উচ্চশিক্ষা প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4', '<?php echo 'Science_উচ্চশিক্ষা প্রতিবেদন_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan=''>বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                            </tr>
                            <?php
                            $pk = (isset($science_high_study_protibedon['id'])) ? $science_high_study_protibedon['id'] : '';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan=''>বিজ্ঞানে উচ্চশিক্ষায় বিদেশে যাওয়ার প্রস্তুতি নিচ্ছেন এমন জনশক্তি</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_high_study_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hs_prostuti_nicche" data-title="Enter">
                                        <?php echo $hs_prostuti_nicche =  (isset($science_high_study_protibedon['hs_prostuti_nicche'])) ? $science_high_study_protibedon['hs_prostuti_nicche'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan=''>এ বছর বিজ্ঞানে উচ্চশিক্ষায় বিদেশে গমণকারী জনশক্তি</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_high_study_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hs_gomonkari" data-title="Enter">
                                        <?php echo $hs_gomonkari =  (isset($science_high_study_protibedon['hs_gomonkari'])) ? $science_high_study_protibedon['hs_gomonkari'] : '' ?>
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

    .action_class {
        color: white;
    }

    .action_class:hover {
        color: white;
        text-decoration: none;
    }
</style>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.fn.editable.defaults.ajaxOptions = {
            type: "get"
        }
        $('#shaka_shompadok').editable({
            value: <?php echo (isset($science_biggan_shompadok['shaka_shompadok'])) ? $science_biggan_shompadok['shaka_shompadok'] : 2; ?>,
            source: [{
                    value: 1,
                    text: 'হ্যাঁ'
                },
                {
                    value: 0,
                    text: 'না'
                },
                {
                    value: 2,
                    text: 'Enter'
                },

            ],
            success: function(response, newValue) {
                response = JSON.parse(response); //update backbone model
                if (response.flag == 3) {
                    location.reload();
                }
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

        $('#biggan_shompadok').editable({
            value: <?php echo (isset($science_biggan_shompadok['biggan_shompadok'])) ? $science_biggan_shompadok['biggan_shompadok'] : 2; ?>,
            source: [{
                    value: 1,
                    text: 'হ্যাঁ'
                },
                {
                    value: 0,
                    text: 'না'
                },
                {
                    value: 2,
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

        $('#biggan_comittee_gothon').editable({
            value: <?php echo (isset($science_biggan_magazine_circulation['biggan_comittee_gothon'])) ? $science_biggan_magazine_circulation['biggan_comittee_gothon'] : 2; ?>,
            source: [{
                    value: 1,
                    text: 'হ্যাঁ'
                },
                {
                    value: 0,
                    text: 'না'
                },
                {
                    value: 2,
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

    });
</script>
<script>
    $(document).ready(function() {
        $("button").on('click', function() {
            console.log("ok");
            var id = $(this).attr('id').split("@");
            var close_tr = $(this).closest('tr');
            if (id[0] == 'delete' && confirm("আপনি কি কলামটি মুছে ফেলবেন?")) {
                $.ajax({
                    type: "GET",
                    token: "<?php echo $this->security->get_csrf_token_name(); ?>",
                    url: "<?php echo admin_url('departmentsreport/delete-row') ?>",
                    data: {
                        'id': id[3],
                        'table': id[1]
                    },
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        close_tr.remove();
                    }
                });
            }

        });
    });
</script>