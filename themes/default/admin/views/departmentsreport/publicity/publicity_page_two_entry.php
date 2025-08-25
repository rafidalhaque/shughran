<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রচার বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
                } else {
                    echo anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Publicity_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <?php
                            $pk = (isset($publicity_training_program['id'])) ? $publicity_training_program['id'] : '';

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
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_central_s" data-title="Enter">
                                        <?php echo $shikkha_central_s = (isset($publicity_training_program['shikkha_central_s'])) ? $publicity_training_program['shikkha_central_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_central_p" data-title="Enter">
                                        <?php echo $shikkha_central_p = (isset($publicity_training_program['shikkha_central_p'])) ? $publicity_training_program['shikkha_central_p'] : '' ?>
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
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_shakha_s" data-title="Enter">
                                        <?php echo $shikkha_shakha_s = (isset($publicity_training_program['shikkha_shakha_s'])) ? $publicity_training_program['shikkha_shakha_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shikkha_shakha_p" data-title="Enter">
                                        <?php echo $shikkha_shakha_p = (isset($publicity_training_program['shikkha_shakha_p'])) ? $publicity_training_program['shikkha_shakha_p'] : '' ?>
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
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_central_s" data-title="Enter">
                                        <?php echo $kormoshala_central_s = (isset($publicity_training_program['kormoshala_central_s'])) ? $publicity_training_program['kormoshala_central_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_central_p" data-title="Enter">
                                        <?php echo $kormoshala_central_p = (isset($publicity_training_program['kormoshala_central_p'])) ? $publicity_training_program['kormoshala_central_p'] : '' ?>
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
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_shakha_s" data-title="Enter">
                                        <?php echo $kormoshala_shakha_s = (isset($publicity_training_program['kormoshala_shakha_s'])) ? $publicity_training_program['kormoshala_shakha_s'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_training_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormoshala_shakha_p" data-title="Enter">
                                        <?php echo $kormoshala_shakha_p = (isset($publicity_training_program['kormoshala_shakha_p'])) ? $publicity_training_program['kormoshala_shakha_p'] : '' ?>
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
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>যোগাযোগ </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Publicity_যোগাযোগ_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" colspan="3">ধরণ</td>
                                <td class="tg-pwj7">মোট সংখ্যা </td>
                                <td class="tg-pwj7">শাখা সভাপতি/সেক্রেটারির যোগাযোগ </td>
                                <td class="tg-pwj7">শাখার প্রচার সম্পাদকের যোগাযোগ</td>

                            </tr>
                            <?php
                            $pk = (isset($publicity_contact['id'])) ? $publicity_contact['id'] : '';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1" colspan="3"> পত্রিকার সম্পাদক</td>
                                <td class="tg-0pky  type_1">
                                    <?php
                                    $potrikar_shompadok_shovapoti =  (isset($publicity_contact['potrikar_shompadok_shovapoti'])) ? $publicity_contact['potrikar_shompadok_shovapoti'] : '';
                                    $potrikar_shompadok_prochar =  (isset($publicity_contact['potrikar_shompadok_prochar'])) ? $publicity_contact['potrikar_shompadok_prochar'] : '';
                                    echo $potrikar_shompadok_shovapoti + $potrikar_shompadok_prochar;
                                    ?>



                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="potrikar_shompadok_shovapoti" data-title="Enter">
                                        <?php echo $potrikar_shompadok_shovapoti =  (isset($publicity_contact['potrikar_shompadok_shovapoti'])) ? $publicity_contact['potrikar_shompadok_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="potrikar_shompadok_prochar" data-title="Enter">
                                        <?php echo $potrikar_shompadok_prochar =  (isset($publicity_contact['potrikar_shompadok_prochar'])) ? $publicity_contact['potrikar_shompadok_prochar'] : '' ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698" colspan="3">মিডিয়া ব্যক্তিত্ব </td>
                                <td class="tg-0pky">
                                    <?php
                                    $midea_bekti_shovapoti =  (isset($publicity_contact['midea_bekti_shovapoti'])) ? $publicity_contact['midea_bekti_shovapoti'] : '';
                                    $midea_bekti_prochar =  (isset($publicity_contact['midea_bekti_prochar'])) ? $publicity_contact['midea_bekti_prochar'] : '';
                                    echo $midea_bekti_shovapoti + $midea_bekti_prochar;
                                    ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="midea_bekti_shovapoti" data-title="Enter">
                                        <?php echo $midea_bekti_shovapoti =  (isset($publicity_contact['midea_bekti_shovapoti'])) ? $publicity_contact['midea_bekti_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="midea_bekti_prochar" data-title="Enter">
                                        <?php echo $midea_bekti_prochar =  (isset($publicity_contact['midea_bekti_prochar'])) ? $publicity_contact['midea_bekti_prochar'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="6">টিভি </td>
                                <td class="tg-y698" rowspan='3'>ইলেকট্রনিক</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                    <?php
                                    $tv_satelite_jela_shovapoti =  (isset($publicity_contact['tv_satelite_jela_shovapoti'])) ? $publicity_contact['tv_satelite_jela_shovapoti'] : '';
                                    $tv_satelite_jela_prochar =  (isset($publicity_contact['tv_satelite_jela_prochar'])) ? $publicity_contact['tv_satelite_jela_prochar'] : '';
                                    echo $tv_satelite_jela_shovapoti +  $tv_satelite_jela_prochar;
                                    ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_satelite_jela_shovapoti" data-title="Enter">
                                        <?php echo $tv_satelite_jela_shovapoti =  (isset($publicity_contact['tv_satelite_jela_shovapoti'])) ? $publicity_contact['tv_satelite_jela_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_satelite_jela_prochar" data-title="Enter">
                                        <?php echo $tv_satelite_jela_prochar =  (isset($publicity_contact['tv_satelite_jela_prochar'])) ? $publicity_contact['tv_satelite_jela_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">

                                <?php
                                    $tv_satelite_stuff_shovapoti =  (isset($publicity_contact['tv_satelite_stuff_shovapoti'])) ? $publicity_contact['tv_satelite_stuff_shovapoti'] : '';
                                    $tv_satelite_stuff_prochar =  (isset($publicity_contact['tv_satelite_stuff_prochar'])) ? $publicity_contact['tv_satelite_stuff_prochar'] : '';
                                    echo $tv_satelite_stuff_shovapoti +  $tv_satelite_stuff_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_satelite_stuff_shovapoti" data-title="Enter">
                                        <?php echo $tv_satelite_stuff_shovapoti =  (isset($publicity_contact['tv_satelite_stuff_shovapoti'])) ? $publicity_contact['tv_satelite_stuff_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_satelite_stuff_prochar" data-title="Enter">
                                        <?php echo $tv_satelite_stuff_prochar =  (isset($publicity_contact['tv_satelite_stuff_prochar'])) ? $publicity_contact['tv_satelite_stuff_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $tv_satelite_thana_shovapoti =  (isset($publicity_contact['tv_satelite_thana_shovapoti'])) ? $publicity_contact['tv_satelite_thana_shovapoti'] : '';
                                    $tv_satelite_thana_prochar =  (isset($publicity_contact['tv_satelite_thana_prochar'])) ? $publicity_contact['tv_satelite_thana_prochar'] : '';
                                    echo $tv_satelite_thana_shovapoti +  $tv_satelite_thana_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_satelite_thana_shovapoti" data-title="Enter">
                                        <?php echo $tv_satelite_thana_shovapoti =  (isset($publicity_contact['tv_satelite_thana_shovapoti'])) ? $publicity_contact['tv_satelite_thana_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_satelite_thana_prochar" data-title="Enter">
                                        <?php echo $tv_satelite_thana_prochar =  (isset($publicity_contact['tv_satelite_thana_prochar'])) ? $publicity_contact['tv_satelite_thana_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan='3'>অনলাইন</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $tv_online_jela_shovapoti =  (isset($publicity_contact['tv_online_jela_shovapoti'])) ? $publicity_contact['tv_online_jela_shovapoti'] : '';
                                    $tv_online_jela_prochar =  (isset($publicity_contact['tv_online_jela_prochar'])) ? $publicity_contact['tv_online_jela_prochar'] : '';
                                    echo $tv_online_jela_shovapoti +  $tv_online_jela_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_online_jela_shovapoti" data-title="Enter">
                                        <?php echo $tv_online_jela_shovapoti =  (isset($publicity_contact['tv_online_jela_shovapoti'])) ? $publicity_contact['tv_online_jela_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_online_jela_prochar" data-title="Enter">
                                        <?php echo $tv_online_jela_prochar =  (isset($publicity_contact['tv_online_jela_prochar'])) ? $publicity_contact['tv_online_jela_prochar'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                <?php
                                    $tv_online_stuff_shovapoti =  (isset($publicity_contact['tv_online_stuff_shovapoti'])) ? $publicity_contact['tv_online_stuff_shovapoti'] : '';
                                    $tv_online_stuff_prochar =  (isset($publicity_contact['tv_online_stuff_prochar'])) ? $publicity_contact['tv_online_stuff_prochar'] : '';
                                    echo $tv_online_stuff_shovapoti +  $tv_online_stuff_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_online_stuff_shovapoti" data-title="Enter">
                                        <?php echo $tv_online_stuff_shovapoti =  (isset($publicity_contact['tv_online_stuff_shovapoti'])) ? $publicity_contact['tv_online_stuff_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_online_stuff_prochar" data-title="Enter">
                                        <?php echo $tv_online_stuff_prochar =  (isset($publicity_contact['tv_online_stuff_prochar'])) ? $publicity_contact['tv_online_stuff_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $tv_online_thana_shovapoti =  (isset($publicity_contact['tv_online_thana_shovapoti'])) ? $publicity_contact['tv_online_thana_shovapoti'] : '';
                                    $tv_online_thana_prochar =  (isset($publicity_contact['tv_online_thana_prochar'])) ? $publicity_contact['tv_online_thana_prochar'] : '';
                                    echo $tv_online_thana_shovapoti +  $tv_online_thana_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_online_thana_shovapoti" data-title="Enter">
                                        <?php echo $tv_online_thana_shovapoti =  (isset($publicity_contact['tv_online_thana_shovapoti'])) ? $publicity_contact['tv_online_thana_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="tv_online_thana_prochar" data-title="Enter">
                                        <?php echo $tv_online_thana_prochar =  (isset($publicity_contact['tv_online_thana_prochar'])) ? $publicity_contact['tv_online_thana_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698" rowspan="6">জাতীয় পত্রিকা </td>
                                <td class="tg-y698" rowspan='3'>প্রিন্টিং</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $jatio_printing_jela_shovapoti =  (isset($publicity_contact['jatio_printing_jela_shovapoti'])) ? $publicity_contact['jatio_printing_jela_shovapoti'] : '';
                                    $jatio_printing_jela_prochar =  (isset($publicity_contact['jatio_printing_jela_prochar'])) ? $publicity_contact['jatio_printing_jela_prochar'] : '';
                                    echo $jatio_printing_jela_shovapoti +  $jatio_printing_jela_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_printing_jela_shovapoti" data-title="Enter">
                                        <?php echo $jatio_printing_jela_shovapoti =  (isset($publicity_contact['jatio_printing_jela_shovapoti'])) ? $publicity_contact['jatio_printing_jela_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_printing_jela_prochar" data-title="Enter">
                                        <?php echo $jatio_printing_jela_prochar =  (isset($publicity_contact['jatio_printing_jela_prochar'])) ? $publicity_contact['jatio_printing_jela_prochar'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                <?php
                                    $jatio_printing_stuff_shovapoti =  (isset($publicity_contact['jatio_printing_stuff_shovapoti'])) ? $publicity_contact['jatio_printing_stuff_shovapoti'] : '';
                                    $jatio_printing_stuff_prochar =  (isset($publicity_contact['jatio_printing_stuff_prochar'])) ? $publicity_contact['jatio_printing_stuff_prochar'] : '';
                                    echo $jatio_printing_stuff_shovapoti +  $jatio_printing_stuff_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_printing_stuff_shovapoti" data-title="Enter">
                                        <?php echo $jatio_printing_stuff_shovapoti =  (isset($publicity_contact['jatio_printing_stuff_shovapoti'])) ? $publicity_contact['jatio_printing_stuff_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_printing_stuff_prochar" data-title="Enter">
                                        <?php echo $jatio_printing_stuff_prochar =  (isset($publicity_contact['jatio_printing_stuff_prochar'])) ? $publicity_contact['jatio_printing_stuff_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $jatio_printing_thana_shovapoti =  (isset($publicity_contact['jatio_printing_thana_shovapoti'])) ? $publicity_contact['jatio_printing_thana_shovapoti'] : '';
                                    $jatio_printing_thana_prochar =  (isset($publicity_contact['jatio_printing_thana_prochar'])) ? $publicity_contact['jatio_printing_thana_prochar'] : '';
                                    echo $jatio_printing_thana_shovapoti +  $jatio_printing_thana_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_printing_thana_shovapoti" data-title="Enter">
                                        <?php echo $jatio_printing_thana_shovapoti =  (isset($publicity_contact['jatio_printing_thana_shovapoti'])) ? $publicity_contact['jatio_printing_thana_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_printing_thana_prochar" data-title="Enter">
                                        <?php echo $jatio_printing_thana_prochar =  (isset($publicity_contact['jatio_printing_thana_prochar'])) ? $publicity_contact['jatio_printing_thana_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan='3'>অনলাইন</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $jatio_online_jela_shovapoti =  (isset($publicity_contact['jatio_online_jela_shovapoti'])) ? $publicity_contact['jatio_online_jela_shovapoti'] : '';
                                    $jatio_online_jela_prochar =  (isset($publicity_contact['jatio_online_jela_prochar'])) ? $publicity_contact['jatio_online_jela_prochar'] : '';
                                    echo $jatio_online_jela_shovapoti +  $jatio_online_jela_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_online_jela_shovapoti" data-title="Enter">
                                        <?php echo $jatio_online_jela_shovapoti =  (isset($publicity_contact['jatio_online_jela_shovapoti'])) ? $publicity_contact['jatio_online_jela_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_online_jela_prochar" data-title="Enter">
                                        <?php echo $jatio_online_jela_prochar =  (isset($publicity_contact['jatio_online_jela_prochar'])) ? $publicity_contact['jatio_online_jela_prochar'] : '' ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                <?php
                                    $jatio_online_stuff_shovapoti =  (isset($publicity_contact['jatio_online_stuff_shovapoti'])) ? $publicity_contact['jatio_online_stuff_shovapoti'] : '';
                                    $jatio_online_stuff_prochar =  (isset($publicity_contact['jatio_online_stuff_prochar'])) ? $publicity_contact['jatio_online_stuff_prochar'] : '';
                                    echo $jatio_online_stuff_shovapoti +  $jatio_online_stuff_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_online_stuff_shovapoti" data-title="Enter">
                                        <?php echo $jatio_online_stuff_shovapoti =  (isset($publicity_contact['jatio_online_stuff_shovapoti'])) ? $publicity_contact['jatio_online_stuff_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_online_stuff_prochar" data-title="Enter">
                                        <?php echo $jatio_online_stuff_prochar =  (isset($publicity_contact['jatio_online_stuff_prochar'])) ? $publicity_contact['jatio_online_stuff_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $jatio_online_thana_shovapoti =  (isset($publicity_contact['jatio_online_thana_shovapoti'])) ? $publicity_contact['jatio_online_thana_shovapoti'] : '';
                                    $jatio_online_thana_prochar =  (isset($publicity_contact['jatio_online_thana_prochar'])) ? $publicity_contact['jatio_online_thana_prochar'] : '';
                                    echo $jatio_online_thana_shovapoti +  $jatio_online_thana_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_online_thana_shovapoti" data-title="Enter">
                                        <?php echo $jatio_online_thana_shovapoti =  (isset($publicity_contact['jatio_online_thana_shovapoti'])) ? $publicity_contact['jatio_online_thana_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="jatio_online_thana_prochar" data-title="Enter">
                                        <?php echo $jatio_online_thana_prochar =  (isset($publicity_contact['jatio_online_thana_prochar'])) ? $publicity_contact['jatio_online_thana_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="5">আঞ্চলিক পত্রিকা </td>
                                <td class="tg-y698" rowspan='3'>প্রিন্টিং</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $ancholik_printing_jela_shovapoti =  (isset($publicity_contact['ancholik_printing_jela_shovapoti'])) ? $publicity_contact['ancholik_printing_jela_shovapoti'] : '';
                                    $ancholik_printing_jela_prochar =  (isset($publicity_contact['ancholik_printing_jela_prochar'])) ? $publicity_contact['ancholik_printing_jela_prochar'] : '';
                                    echo $ancholik_printing_jela_shovapoti +  $ancholik_printing_jela_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_printing_jela_shovapoti" data-title="Enter">
                                        <?php echo $ancholik_printing_jela_shovapoti =  (isset($publicity_contact['ancholik_printing_jela_shovapoti'])) ? $publicity_contact['ancholik_printing_jela_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_printing_jela_prochar" data-title="Enter">
                                        <?php echo $ancholik_printing_jela_prochar =  (isset($publicity_contact['ancholik_printing_jela_prochar'])) ? $publicity_contact['ancholik_printing_jela_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                <?php
                                    $ancholik_printing_stuff_shovapoti =  (isset($publicity_contact['ancholik_printing_stuff_shovapoti'])) ? $publicity_contact['ancholik_printing_stuff_shovapoti'] : '';
                                    $ancholik_printing_stuff_prochar =  (isset($publicity_contact['ancholik_printing_stuff_prochar'])) ? $publicity_contact['ancholik_printing_stuff_prochar'] : '';
                                    echo $ancholik_printing_stuff_shovapoti +  $ancholik_printing_stuff_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_printing_stuff_shovapoti" data-title="Enter">
                                        <?php echo $ancholik_printing_stuff_shovapoti =  (isset($publicity_contact['ancholik_printing_stuff_shovapoti'])) ? $publicity_contact['ancholik_printing_stuff_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_printing_stuff_prochar" data-title="Enter">
                                        <?php echo $ancholik_printing_stuff_prochar =  (isset($publicity_contact['ancholik_printing_stuff_prochar'])) ? $publicity_contact['ancholik_printing_stuff_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $ancholik_printing_thana_shovapoti =  (isset($publicity_contact['ancholik_printing_thana_shovapoti'])) ? $publicity_contact['ancholik_printing_thana_shovapoti'] : '';
                                    $ancholik_printing_thana_prochar =  (isset($publicity_contact['ancholik_printing_thana_prochar'])) ? $publicity_contact['ancholik_printing_thana_prochar'] : '';
                                    echo $ancholik_printing_thana_shovapoti +  $ancholik_printing_thana_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_printing_thana_shovapoti" data-title="Enter">
                                        <?php echo $ancholik_printing_thana_shovapoti =  (isset($publicity_contact['ancholik_printing_thana_shovapoti'])) ? $publicity_contact['ancholik_printing_thana_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_printing_thana_prochar" data-title="Enter">
                                        <?php echo $ancholik_printing_thana_prochar =  (isset($publicity_contact['ancholik_printing_thana_prochar'])) ? $publicity_contact['ancholik_printing_thana_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan='2'>অনলাইন</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $ancholik_online_jela_shovapoti =  (isset($publicity_contact['ancholik_online_jela_shovapoti'])) ? $publicity_contact['ancholik_online_jela_shovapoti'] : '';
                                    $ancholik_online_jela_prochar =  (isset($publicity_contact['ancholik_online_jela_prochar'])) ? $publicity_contact['ancholik_online_jela_prochar'] : '';
                                    echo $ancholik_online_jela_shovapoti +  $ancholik_online_jela_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_online_jela_shovapoti" data-title="Enter">
                                        <?php echo $ancholik_online_jela_shovapoti =  (isset($publicity_contact['ancholik_online_jela_shovapoti'])) ? $publicity_contact['ancholik_online_jela_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_online_jela_prochar" data-title="Enter">
                                        <?php echo $ancholik_online_jela_prochar =  (isset($publicity_contact['ancholik_online_jela_prochar'])) ? $publicity_contact['ancholik_online_jela_prochar'] : '' ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php
                                    $ancholik_online_stuff_shovapoti =  (isset($publicity_contact['ancholik_online_stuff_shovapoti'])) ? $publicity_contact['ancholik_online_stuff_shovapoti'] : '';
                                    $ancholik_online_stuff_prochar =  (isset($publicity_contact['ancholik_online_stuff_prochar'])) ? $publicity_contact['ancholik_online_stuff_prochar'] : '';
                                    echo $ancholik_online_stuff_shovapoti +  $ancholik_online_stuff_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_online_stuff_shovapoti" data-title="Enter">
                                        <?php echo $ancholik_online_stuff_shovapoti =  (isset($publicity_contact['ancholik_online_stuff_shovapoti'])) ? $publicity_contact['ancholik_online_stuff_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_online_stuff_prochar" data-title="Enter">
                                        <?php echo $ancholik_online_stuff_prochar =  (isset($publicity_contact['ancholik_online_stuff_prochar'])) ? $publicity_contact['ancholik_online_stuff_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" colspan='3'>কলামিস্ট</td>
                                <td class="tg-0pky">
                                <?php
                                    $ancholik_online_thana_shovapoti =  (isset($publicity_contact['ancholik_online_thana_shovapoti'])) ? $publicity_contact['ancholik_online_thana_shovapoti'] : '';
                                    $ancholik_online_thana_prochar =  (isset($publicity_contact['ancholik_online_thana_prochar'])) ? $publicity_contact['ancholik_online_thana_prochar'] : '';
                                    echo $ancholik_online_thana_shovapoti +  $ancholik_online_thana_prochar;
                                    ?>
                            </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_online_thana_shovapoti" data-title="Enter">
                                        <?php echo $ancholik_online_thana_shovapoti =  (isset($publicity_contact['ancholik_online_thana_shovapoti'])) ? $publicity_contact['ancholik_online_thana_shovapoti'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ancholik_online_thana_prochar" data-title="Enter">
                                        <?php echo $ancholik_online_thana_prochar =  (isset($publicity_contact['ancholik_online_thana_prochar'])) ? $publicity_contact['ancholik_online_thana_prochar'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>আমাদের সংগ্রহ </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Publicity_আমাদের সংগ্রহ_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">সংগ্রহের ধরণ</td>
                                <td class="tg-y698" colspan="2">শাখার সংগ্রহ </td>
                                <td class="tg-y698" colspan="2">কেন্দ্রে প্রেরণ </td>

                            </tr>


                            <tr>
                                <td class="tg-y698 type_1" colspan=""> বিষয়</td>
                                <td class="tg-y698  type_1"> মোট সংখ্যা</td>
                                <td class="tg-y698 type_1" colspan=""> বিষয়</td>
                                <td class="tg-y698  type_1"> মোট সংখ্যা</td>


                            </tr>
                            <?php
                            $pk = (isset($publicity_amader_collection['id'])) ? $publicity_amader_collection['id'] : '';
                            ?>

                            <tr>
                                <td class="tg-y698" colspan="">ভিডিও </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="video_shakhar_bishoy" data-title="Enter">
                                        <?php echo $video_shakhar_bishoy =  (isset($publicity_amader_collection['video_shakhar_bishoy'])) ? $publicity_amader_collection['video_shakhar_bishoy'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="video_shakar_total" data-title="Enter">
                                        <?php echo $video_shakar_total =  (isset($publicity_amader_collection['video_shakar_total'])) ? $publicity_amader_collection['video_shakar_total'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="video_kendrer_bishoy" data-title="Enter">
                                        <?php echo $video_kendrer_bishoy =  (isset($publicity_amader_collection['video_kendrer_bishoy'])) ? $publicity_amader_collection['video_kendrer_bishoy'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="video_kendrer_total" data-title="Enter">
                                        <?php echo $video_kendrer_total =  (isset($publicity_amader_collection['video_kendrer_total'])) ? $publicity_amader_collection['video_kendrer_total'] : 0; ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698" colspan="">ছবি </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="photo_shakhar_bishoy" data-title="Enter">
                                        <?php echo $photo_shakhar_bishoy =  (isset($publicity_amader_collection['photo_shakhar_bishoy'])) ? $publicity_amader_collection['photo_shakhar_bishoy'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="photo_shakar_total" data-title="Enter">
                                        <?php echo $photo_shakar_total =  (isset($publicity_amader_collection['photo_shakar_total'])) ? $publicity_amader_collection['photo_shakar_total'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="photo_kendrer_bishoy" data-title="Enter">
                                        <?php echo $photo_kendrer_bishoy =  (isset($publicity_amader_collection['photo_kendrer_bishoy'])) ? $publicity_amader_collection['photo_kendrer_bishoy'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="photo_kendrer_total" data-title="Enter">
                                        <?php echo $photo_kendrer_total =  (isset($publicity_amader_collection['photo_kendrer_total'])) ? $publicity_amader_collection['photo_kendrer_total'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" colspan="">বিশেষ নিউজ </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="news_shakhar_bishoy" data-title="Enter">
                                        <?php echo $news_shakhar_bishoy =  (isset($publicity_amader_collection['news_shakhar_bishoy'])) ? $publicity_amader_collection['news_shakhar_bishoy'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="news_shakar_total" data-title="Enter">
                                        <?php echo $news_shakar_total =  (isset($publicity_amader_collection['news_shakar_total'])) ? $publicity_amader_collection['news_shakar_total'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="news_kendrer_bishoy" data-title="Enter">
                                        <?php echo $news_kendrer_bishoy =  (isset($publicity_amader_collection['news_kendrer_bishoy'])) ? $publicity_amader_collection['news_kendrer_bishoy'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_amader_collection" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="news_kendrer_total" data-title="Enter">
                                        <?php echo $news_kendrer_total =  (isset($publicity_amader_collection['news_kendrer_total'])) ? $publicity_amader_collection['news_kendrer_total'] : 0; ?>
                                    </a>
                                </td>

                            <tr>
                                <td class="tg-y698" colspan="">মোট </td>
                                <td class="tg-0pky">

                                </td>
                                <td class="tg-0pky">
                                    <?php echo $video_shakar_total + $photo_shakar_total + $news_shakar_total ?>
                                </td>
                                <td class="tg-0pky">

                                </td>
                                <td class="tg-0pky">
                                    <?php echo $video_kendrer_total + $photo_kendrer_total + $news_kendrer_total; ?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>সৌজন্য প্রদান </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Publicity_সৌজন্য প্রদান_' . $branch_id . '.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">যাদেরকে দেয়া হয়েছে </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপলক্ষ </td>
                                <td class="tg-pwj7" colspan="">কতবার </td>

                            </tr>
                            <?php
                            $pk = (isset($publicity_shoujonno['id'])) ? $publicity_shoujonno['id'] : '';
                            ?>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>সম্পাদক</span></div>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shompadok_num" data-title="Enter">
                                        <?php echo $shompadok_num =  (isset($publicity_shoujonno['shompadok_num'])) ? $publicity_shoujonno['shompadok_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shompadok_upolokkho" data-title="Enter">
                                        <?php echo $shompadok_upolokkho =  (isset($publicity_shoujonno['shompadok_upolokkho'])) ? $publicity_shoujonno['shompadok_upolokkho'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shompadok_bar" data-title="Enter">
                                        <?php echo $shompadok_bar =  (isset($publicity_shoujonno['shompadok_bar'])) ? $publicity_shoujonno['shompadok_bar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>সাংবাদিক</span></div>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shangbadik_num" data-title="Enter">
                                        <?php echo $shangbadik_num =  (isset($publicity_shoujonno['shangbadik_num'])) ? $publicity_shoujonno['shangbadik_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shangbadik_upolokkho" data-title="Enter">
                                        <?php echo $shangbadik_upolokkho =  (isset($publicity_shoujonno['shangbadik_upolokkho'])) ? $publicity_shoujonno['shangbadik_upolokkho'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shangbadik_bar" data-title="Enter">
                                        <?php echo $shangbadik_bar =  (isset($publicity_shoujonno['shangbadik_bar'])) ? $publicity_shoujonno['shangbadik_bar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>কলামিস্ট</span></div>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="collamist_num" data-title="Enter">
                                        <?php echo $collamist_num =  (isset($publicity_shoujonno['collamist_num'])) ? $publicity_shoujonno['collamist_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="collamist_upolokkho" data-title="Enter">
                                        <?php echo $collamist_upolokkho =  (isset($publicity_shoujonno['collamist_upolokkho'])) ? $publicity_shoujonno['collamist_upolokkho'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="collamist_bar" data-title="Enter">
                                        <?php echo $collamist_bar =  (isset($publicity_shoujonno['collamist_bar'])) ? $publicity_shoujonno['collamist_bar'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>মিডিয়া ব্যক্তিত্ব</span></div>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="media_bektitto_num" data-title="Enter">
                                        <?php echo $media_bektitto_num =  (isset($publicity_shoujonno['media_bektitto_num'])) ? $publicity_shoujonno['media_bektitto_num'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="media_bektitto_upolokkho" data-title="Enter">
                                        <?php echo $media_bektitto_upolokkho =  (isset($publicity_shoujonno['media_bektitto_upolokkho'])) ? $publicity_shoujonno['media_bektitto_upolokkho'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="publicity_shoujonno" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="media_bektitto_bar" data-title="Enter">
                                        <?php echo $media_bektitto_bar =  (isset($publicity_shoujonno['media_bektitto_bar'])) ? $publicity_shoujonno['media_bektitto_bar'] : '' ?>
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