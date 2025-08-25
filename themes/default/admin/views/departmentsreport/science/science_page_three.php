<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/science-page-three') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/science-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            text-align: left
                        }

                        .tg .tg-pwj7 {
                            background-color: #efefef;
                            border-color: black;

                            text-align: center .tg .tg-0pky {
                                border-color: black;
                                text-align: left;
                                vertical-align: top
                            }

                            .tg .tg-y698 {
                                background-color: #efefef;
                                border-color: black;
                                text-align: left;
                                vertical-align: top
                            }

                            .tg .tg-0lax {
                                border-color: black;
                                text-align: left;
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

                    <div class="tg-wrap">

                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিজ্ঞান সংক্রান্ত প্রোগ্রামের প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Science_বিজ্ঞান সংক্রান্ত প্রোগ্রামের প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার গাইডলাইন প্রোগ্রাম</td>
                                <td class="tg-0pky" colspan=""> <?php echo $career_guideline_num = $science_program_protibedon['career_guideline_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $career_guideline_pre = $science_program_protibedon['career_guideline_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['career_guideline_num']>0 && $science_program_protibedon['career_guideline_pre']>0)? $science_program_protibedon['career_guideline_pre'] / $science_program_protibedon['career_guideline_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার আড্ডা</td>
                                <td class="tg-0pky" colspan=""> <?php echo $career_adda_num = $science_program_protibedon['career_adda_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $career_adda_pre = $science_program_protibedon['career_adda_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['career_adda_num']>0 && $science_program_protibedon['career_adda_pre']>0)? $science_program_protibedon['career_adda_pre'] / $science_program_protibedon['career_adda_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার সামিট</td>
                                <td class="tg-0pky" colspan=""> <?php echo $career_summit_num = $science_program_protibedon['career_summit_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $career_summit_pre = $science_program_protibedon['career_summit_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['career_summit_num']>0 && $science_program_protibedon['career_summit_pre']>0)? $science_program_protibedon['career_summit_pre'] / $science_program_protibedon['career_summit_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান বিষয়ক কুইজ প্রতিযোগিতা</td>
                                <td class="tg-0pky" colspan=""> <?php echo $quiz_num = $science_program_protibedon['quiz_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $quiz_pre = $science_program_protibedon['quiz_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['quiz_num']>0 && $science_program_protibedon['quiz_pre']>0)? $science_program_protibedon['quiz_pre'] / $science_program_protibedon['quiz_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অলিম্পিয়াড আয়োজন</td>
                                <td class="tg-0pky" colspan=""> <?php echo $olympiad_num = $science_program_protibedon['olympiad_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $olympiad_pre = $science_program_protibedon['olympiad_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['olympiad_num']>0 && $science_program_protibedon['olympiad_pre']>0)? $science_program_protibedon['olympiad_pre'] / $science_program_protibedon['olympiad_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান মেলা</td>
                                <td class="tg-0pky" colspan=""> <?php echo $biggan_mela_num = $science_program_protibedon['biggan_mela_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $biggan_mela_pre = $science_program_protibedon['biggan_mela_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['biggan_mela_num']>0 && $science_program_protibedon['biggan_mela_pre']>0)? $science_program_protibedon['biggan_mela_pre'] / $science_program_protibedon['biggan_mela_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানের সাথে সম্পর্কিত বিভিন্ন দিবস উদযাপন</td>
                                <td class="tg-0pky" colspan=""> <?php echo $day_udjapon_num = $science_program_protibedon['day_udjapon_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $day_udjapon_pre = $science_program_protibedon['day_udjapon_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['day_udjapon_num']>0 && $science_program_protibedon['day_udjapon_pre']>0)? $science_program_protibedon['day_udjapon_pre'] / $science_program_protibedon['day_udjapon_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান সম্পর্কিত ডকুমেন্টারি, শর্টফিল্ম, মুভি শো</td>
                                <td class="tg-0pky" colspan=""> <?php echo $document_num = $science_program_protibedon['document_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $document_pre = $science_program_protibedon['document_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['document_num']>0 && $science_program_protibedon['document_pre']>0)? $science_program_protibedon['document_pre'] / $science_program_protibedon['document_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td class="tg-0pky" colspan=""> <?php echo $other_num = $science_program_protibedon['other_num'] ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $other_pre = $science_program_protibedon['other_pre'] ?> </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['other_num']>0 && $science_program_protibedon['other_pre']>0)? $science_program_protibedon['other_pre'] / $science_program_protibedon['other_num']:0 ?></td>
                            </tr>

                        </table>
                        


                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>একাডেমিক সহযোগিতার প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Science_একাডেমিক সহযোগিতার প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                                <td class="tg-pwj7" colspan="2">আছে কিনা </td>
                                <td class="tg-pwj7" rowspan="2">থাকলে কতটি</td>
                                <td class="tg-pwj7" rowspan="2">শিক্ষার্থী সংখ্যা </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">হ্যাঁ </td>
                                <td class="tg-pwj7" colspan="">না</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানের ছাত্রদের শিক্ষাদানের জন্য একাডেমিক কোচিং</td>
                                <td class="tg-0pky" colspan=""><?php echo $aca_coaching_ache = $science_aca_help_protibedon['aca_coaching_ache'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $row_total_science_aca_help_protibedon - $science_aca_help_protibedon['aca_coaching_ache'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $aca_coaching_num = $science_aca_help_protibedon['aca_coaching_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $aca_coaching_stu_num = $science_aca_help_protibedon['aca_coaching_stu_num'] ?></td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">আইসিটি কোচিং বা কোচিংয়ে আইসিটি কোর্স</td>
                                <td class="tg-0pky" colspan=""><?php echo $ict_coaching_ache = $science_aca_help_protibedon['ict_coaching_ache'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $row_total_science_aca_help_protibedon - $science_aca_help_protibedon['ict_coaching_ache'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $ict_coaching_num = $science_aca_help_protibedon['ict_coaching_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $ict_coaching_stu_num = $science_aca_help_protibedon['ict_coaching_stu_num'] ?></td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">উচ্চ মাধ্যমিক পর্যায়ে বিজ্ঞান ছাত্রদের জন্য আইডিয়াল হোম</td>
                                <td class="tg-0pky" colspan=""><?php echo $ideal_home_ache = $science_aca_help_protibedon['ideal_home_ache'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $row_total_science_aca_help_protibedon - $science_aca_help_protibedon['ideal_home_ache'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $ideal_home_num = $science_aca_help_protibedon['ideal_home_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $ideal_home_stu_num = $science_aca_help_protibedon['ideal_home_stu_num'] ?></td>
                               
                            </tr>
                        </table>

                    
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>সফর প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Science_সফর প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">তত্ত্বাবধান স্তর</td>
                                <td class="tg-pwj7" rowspan="2">বিবরণ </td>
                                <td class="tg-pwj7" colspan="2">কতটি প্রোগ্রাম/কতবার</td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অফলাইন</td>
                                <td class="tg-pwj7" colspan="">অনলাইন</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">কেন্দ্র</td>
                                <td class="tg-pwj7" colspan="">কেন্দ্রীয় বিজ্ঞান সম্পাদকের সফর</td>
                                <td class="tg-0pky" colspan=""><?php echo $shompadok_off = $science_sofor_protibedon['shompadok_off'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shompadok_on = $science_sofor_protibedon['shompadok_on'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">কেন্দ্রীয় বিজ্ঞান বিভাগের সফর</td>
                                <td class="tg-0pky" colspan=""><?php echo $bivag_off = $science_sofor_protibedon['bivag_off'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $bivag_on = $science_sofor_protibedon['bivag_on'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">যোগাযোগ/তত্ত্বাবধান</td>
                                <td class="tg-0pky" colspan=""><?php echo $contact_off = $science_sofor_protibedon['contact_off'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $contact_on = $science_sofor_protibedon['contact_on'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">শাখা</td>
                                <td class="tg-pwj7" colspan="">শাখা সভাপতি/সেক্রেটারির সফর</td>
                                <td class="tg-0pky" colspan=""><?php echo $secretary_off = $science_sofor_protibedon['secretary_off'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $secretary_on = $science_sofor_protibedon['secretary_on'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">শাখা বিজ্ঞান সম্পাদকের থানাভিত্তিক সফর</td>
                                <td class="tg-0pky" colspan=""><?php echo $thana_off = $science_sofor_protibedon['thana_off'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $thana_on = $science_sofor_protibedon['thana_on'] ?></td>
                            </tr>
                        </table>


                    </div>

                    



                </div>
            </div>
        </div>
    </div>
</div>