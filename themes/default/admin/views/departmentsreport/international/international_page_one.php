<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'আন্তর্জাতিক বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php
            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
                } else {
                    echo anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/international-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/international-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); 
                                        ?></p>


                <script>
                    $(document).ready(function() {
                        $("#export_all_table").on("click", function() {
                            for (let i = 1; i <= 12; i++) {
                                $("#table_" + i).click();
                            }
                        });
                    });
                </script>

                <div class="table-responsive">


                    <style type="text/css">
                        #export_all_table {
                            cursor: pointer;
                        }

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

                        @international screen and (max-width: 767px) {
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
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable10">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'International_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
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
                                    <?php echo $shikkha_central_s = $international_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $shikkha_central_p = $international_training_program['shikkha_central_p'] ?>
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
                                    <?php echo $shikkha_shakha_s = $international_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $shikkha_shakha_p = $international_training_program['shikkha_shakha_p'] ?>
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
                                    <?php echo $kormoshala_central_s = $international_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kormoshala_central_p = $international_training_program['kormoshala_central_p'] ?>
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
                                    <?php echo $kormoshala_shakha_s = $international_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kormoshala_shakha_p = $international_training_program['kormoshala_shakha_p'] ?>
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
                                <td class="tg-pwj7" colspan='2'><b>উচ্চশিক্ষা সংক্রান্ত প্রোগ্রামের নাম </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'International_উচ্চশিক্ষা সংক্রান্ত প্রোগ্রামের নাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি/অংশগ্রহণ</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্যারিয়ার গাইডলাইন প্রোগ্রাম (শাখায় আয়োজিত) </td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['cgps_number']; ?></td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['cgps_present']; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্যারিয়ার গাইডলাইন প্রোগ্রামে অংশগ্রহণ (কেন্দ্র আয়োজিত)</td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['cgpsac_number']; ?></td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['cgpsac_present']; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্যারিয়ার গাইডলাইন প্রোগ্রামে অংশগ্রহণ (অন্যান্যদের আয়োজিত)</td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['cgpsao_number']; ?></td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['cgpsao_present']; ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">আন্তর্জাতিক কনফারেন্সে অংশগ্রহণ </td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['intconf_number']; ?></td>
                                <td class="tg-0pky"><?php echo $international_higher_study_program['intconf_present']; ?></td>
                            </tr>
                        </table>


                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='4'><b>জনশক্তির ভাষাশিক্ষা সংক্রান্ত </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'International_জনশক্তির ভাষাশিক্ষা সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ভাষা</td>
                                <td class="tg-pwj7" colspan="2">শাখা আয়োজিত ভাষাশিক্ষা কোর্সের বিবরণ </td>
                                <td class="tg-pwj7" colspan="3">যতজন শিখেছেন </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7">
                                    <div><span>কোর্স সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7">
                                    <div><span>অংশগ্রহনকারী সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7">
                                    <div><span>আমাদের আয়োজিত কোর্স থেকে</span></div>
                                </td>
                                <td class="tg-pwj7">
                                    <div><span>অন্যান্য প্রতিষ্ঠান থেকে </span></div>
                                </td>
                                <td class="tg-pwj7">
                                    <div><span>মোট </span></div>
                                </td>
                            </tr>
                            <?php
                            $a_number = 0;
                            $c_number = 0;
                            $aa_number = 0;
                            $ap_number = 0;
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> আরবি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['arabic_c_number'];
                                    $c_number = $c_number + $international_language_learn['arabic_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['arabic_a_number'];
                                    $a_number = $a_number + $international_language_learn['arabic_a_number']; ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['arabic_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['arabic_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['arabic_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['arabic_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['arabic_aa_number'] + $international_language_learn['arabic_ap_number']; ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698"> ইংরেজি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['english_c_number'];
                                    $c_number = $c_number + $international_language_learn['english_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['english_a_number'];
                                    $a_number = $a_number + $international_language_learn['english_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['english_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['english_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['english_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['english_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['english_aa_number'];
                                    +$international_language_learn['english_ap_number']; ?>
                                </td>



                            </tr>

                            <tr>
                                <td class="tg-y698"> চাইনিজ </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['chin_c_number'];
                                    $c_number = $c_number + $international_language_learn['chin_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['chin_a_number'];
                                    $a_number = $a_number + $international_language_learn['chin_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['chin_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['chin_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['chin_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['chin_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['chin_aa_number'] + $international_language_learn['chin_ap_number']; ?>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">হিন্দি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['hindi_c_number'];
                                    $c_number = $c_number + $international_language_learn['hindi_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['hindi_a_number'];
                                    $a_number = $a_number + $international_language_learn['hindi_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['hindi_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['hindi_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['hindi_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['hindi_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['hindi_aa_number'] + $international_language_learn['hindi_ap_number']; ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">উর্দু</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['urdu_c_number'];
                                    $c_number = $c_number + $international_language_learn['urdu_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['urdu_a_number'];
                                    $a_number = $a_number + $international_language_learn['urdu_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['urdu_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['urdu_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['urdu_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['urdu_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['urdu_aa_number'] + $international_language_learn['urdu_ap_number']; ?>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-y698">ফার্সি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['farsi_c_number'];
                                    $c_number = $c_number + $international_language_learn['farsi_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['farsi_a_number'];
                                    $a_number = $a_number + $international_language_learn['farsi_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['farsi_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['farsi_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['farsi_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['farsi_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['farsi_aa_number'] + $international_language_learn['farsi_ap_number']; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">স্পেনিশ</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['span_c_number'];
                                    $c_number = $c_number + $international_language_learn['span_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['span_a_number'];
                                    $a_number = $a_number + $international_language_learn['span_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['span_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['span_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['span_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['span_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['span_aa_number'] + $international_language_learn['span_ap_number']; ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">ফ্রেঞ্চ</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['fren_c_number'];
                                    $c_number = $c_number + $international_language_learn['fren_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['fren_a_number'];
                                    $a_number = $a_number + $international_language_learn['fren_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['fren_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['fren_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['fren_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['fren_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['fren_aa_number'] + $international_language_learn['fren_ap_number']; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">জার্মান </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['german_c_number'];
                                    $c_number = $c_number + $international_language_learn['german_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['german_a_number'];
                                    $a_number = $a_number + $international_language_learn['german_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['german_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['german_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['german_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['german_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['german_aa_number'] + $international_language_learn['german_ap_number']; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">তুর্কি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['turkey_c_number'];
                                    $c_number = $c_number + $international_language_learn['turkey_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['turkey_a_number'];
                                    $a_number = $a_number + $international_language_learn['turkey_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['turkey_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['turkey_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['turkey_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['turkey_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['turkey_aa_number'] + $international_language_learn['turkey_ap_number']; ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $international_language_learn['other_c_number'];
                                    $c_number = $c_number + $international_language_learn['other_c_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_language_learn['other_a_number'];
                                    $a_number = $a_number + $international_language_learn['other_a_number'];  ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $international_language_learn['other_aa_number'];
                                    $aa_number = $aa_number + $international_language_learn['other_aa_number']; ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <?php echo $international_language_learn['other_ap_number'];
                                    $ap_number = $ap_number + $international_language_learn['other_ap_number']; ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $international_language_learn['other_aa_number'] + $international_language_learn['other_ap_number']; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $c_number; ?>
                                </td>
                                <td class="tg-0pky type_2">
                                    <?php echo $a_number; ?>
                                </td>

                                <td class="tg-0pky type_4">
                                    <?php echo $aa_number; ?>
                                </td>
                                <td class="tg-0pky type_5">
                                    <?php echo $ap_number; ?>
                                </td>
                                <td class="tg-0pky type_6">
                                    <?php echo $aa_number + $ap_number; ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan='6'><b>বিদেশে অধ্যয়নরত ভাইদের আপডেট তালিকা</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'International_বিদেশে অধ্যয়নরত ভাইদের আপডেট তালিকা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7">শাখা আইডি</td>
                                <td class="tg-pwj7">নাম</td>
                                <td class="tg-pwj7">দেশ</td>
                                <td class="tg-pwj7">সর্বশেষ সাংগঠনিক মান</td>
                                <td class="tg-pwj7">সর্বশেষ দায়িত্ব</td>
                                <td class="tg-pwj7">শিক্ষার স্তর </td>
                                <td class="tg-pwj7">অনলাইন নম্বর </td>
                            </tr>

                            <?php
                            $i = 0;
                            foreach ($international_bideshe_study->result_array() as $row) {
                                $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?> </td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?> </td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?> </td>
                                    <td class="tg-0pky  type_2">
                                        <?php echo $row['country'] ?>
                                    </td>

                                    <td class="tg-0pky  type_3">
                                        <?php echo $row['last_sang_man'] ?>
                                    </td>
                                    <td class="tg-0pky  type_4">
                                        <?php echo $row['last_dayitto'] ?>
                                    </td>
                                    <td class="tg-0pky  type_1">
                                        <?php echo $row['education'] ?>
                                    </td>

                                    <td class="tg-0pky  type_1">
                                        <?php echo $row['online_number'] ?>
                                    </td>

                                </tr>

                            <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan='5'><b>বিদেশে উচ্চশিক্ষায় আগ্রহী জনশক্তিদের তালিকা</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'International_বিদেশে উচ্চশিক্ষায় আগ্রহী জনশক্তিদের তালিকা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7">শাখা আইডি</td>
                                <td class="tg-pwj7">নাম</td>
                                <td class="tg-pwj7">সাংগঠনিক মান</td>
                                <td class="tg-pwj7">বিভাগ</td>
                                <td class="tg-pwj7">টার্গেটকৃত দেশ </td>
                                <td class="tg-pwj7">অনলাইন নম্বর </td>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($international_language_interested->result_array() as $row) {
                                $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?> </td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?> </td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?> </td>
                                    <td class="tg-0pky  type_2">
                                        <?php echo $row['sang_man'] ?>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                        <?php echo $row['bivag'] ?>
                                    </td>
                                    <td class="tg-0pky  type_4">
                                        <?php echo $row['target_country'] ?>
                                    </td>
                                    <td class="tg-0pky  type_1">
                                        <?php echo $row['online_number'] ?>
                                    </td>

                                </tr>

                            <?php } ?>
                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>