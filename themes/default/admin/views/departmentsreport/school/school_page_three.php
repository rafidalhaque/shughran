<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০৩'  . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/school-page-three') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/school-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>স্পোর্টস</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'School_স্পোর্টস.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> ক্রিকেট</td>

                                <td class="tg-0pky">
                                    <?php echo $cricket_num = $school_sports['cricket_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cricket_pre = $school_sports['cricket_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($cricket_pre!=0 && $cricket_num!=0 )? round($cricket_pre / $cricket_num,2):0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফুটবল</td>

                                <td class="tg-0pky">
                                    <?php echo $football_num = $school_sports['football_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $football_pre = $school_sports['football_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($football_pre!=0 && $football_num!=0 )?$football_pre / $football_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ভলিবল</td>

                                <td class="tg-0pky">
                                    <?php echo $volleyball_num = $school_sports['volleyball_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $volleyball_pre = $school_sports['volleyball_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($volleyball_pre!=0 && $volleyball_num!=0 )?$volleyball_pre / $volleyball_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ব্যাডমিন্টন</td>

                                <td class="tg-0pky">
                                    <?php echo $badmintor_num = $school_sports['badmintor_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $badmintor_pre = $school_sports['badmintor_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($badmintor_pre!=0 && $badmintor_num!=0 )?$badmintor_pre / $badmintor_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> অন্যান্য</td>

                                <td class="tg-0pky">
                                    <?php echo $other_num = $school_sports['other_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $other_pre = $school_sports['other_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($other_pre!=0 && $other_num!=0 )? $other_pre / $other_num:0 ?>
                                </td>

                            </tr>

                        </table>
                      

                       
                        
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>ক্যারিয়ার ডিজাইন</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'School_ক্যারিয়ার ডিজাইন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7"> মোট উপস্থিতি </td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> আকাশ ছোয়ার মন্ত্র শিখি</td>

                                <td class="tg-0pky">
                                    <?php echo $akash_sowa_num = $school_career_design['akash_sowa_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $akash_sowa_pre = $school_career_design['akash_sowa_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($akash_sowa_pre!=0 && $akash_sowa_num!=0 )? $akash_sowa_pre / $akash_sowa_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">দেশটাকে গড়তে চাই বেশি করে পড়ছি তাই</td>

                                <td class="tg-0pky">
                                    <?php echo $deshtake_gorte_num = $school_career_design['deshtake_gorte_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $deshtake_gorte_pre = $school_career_design['deshtake_gorte_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($deshtake_gorte_pre!=0 && $deshtake_gorte_num!=0 )? $deshtake_gorte_pre / $deshtake_gorte_num:0 ?>
                                </td>


                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">মেধার শীর্ষে যারা সেই মেধাবীদের সেরা কারা?</td>

                                <td class="tg-0pky">
                                    <?php echo $medhabi_num = $school_career_design['medhabi_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medhabi_pre = $school_career_design['medhabi_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($medhabi_pre!=0 && $medhabi_num!=0 )? $medhabi_pre / $medhabi_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফ্রি মডেল টেস্ট</td>

                                <td class="tg-0pky">
                                    <?php echo $free_test_num = $school_career_design['free_test_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $free_test_pre = $school_career_design['free_test_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($free_test_pre!=0 && $free_test_num!=0 )? $free_test_pre / $free_test_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">জটিল বিষয়ে বিশেষ ক্লাস</td>

                                <td class="tg-0pky">
                                    <?php echo $complex_tropice_num = $school_career_design['complex_tropice_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $complex_tropice_pre = $school_career_design['complex_tropice_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($complex_tropice_pre!=0 && $complex_tropice_num!=0 )? $complex_tropice_pre / $complex_tropice_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">A+ পাওয়া কি এতই কঠিন?</td>

                                <td class="tg-0pky">
                                    <?php echo $a_plus_num = $school_career_design['a_plus_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $a_plus_pre = $school_career_design['a_plus_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($a_plus_pre!=0 && $a_plus_num!=0 )? $a_plus_pre / $a_plus_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">আমি ডাক্তার হতে চাই</td>

                                <td class="tg-0pky">
                                    <?php echo $doctor_num = $school_career_design['doctor_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $doctor_pre = $school_career_design['doctor_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($doctor_pre!=0 && $doctor_num!=0 )? $doctor_pre / $doctor_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">আমি ইঞ্জিনিয়ার হতে চাই</td>

                                <td class="tg-0pky">
                                    <?php echo $enginner_num = $school_career_design['enginner_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $enginner_pre = $school_career_design['enginner_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($enginner_pre!=0 && $enginner_num!=0 )? $enginner_pre / $enginner_num:0 ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">Academic & Moral Development program</td>

                                <td class="tg-0pky">
                                    <?php echo $moral_development_num = $school_career_design['moral_development_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $moral_development_pre = $school_career_design['moral_development_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($moral_development_pre!=0 && $moral_development_num!=0 )? $moral_development_pre / $moral_development_num:0 ?>
                                </td>


                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">Spoken English</td>

                                <td class="tg-0pky">
                                    <?php echo $sopken_english_num = $school_career_design['sopken_english_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sopken_english_pre = $school_career_design['sopken_english_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sopken_english_pre!=0 && $sopken_english_num!=0 )? $sopken_english_pre / $sopken_english_num:0 ?>
                                </td>


                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Computer Course</td>

                                <td class="tg-0pky">
                                    <?php echo $coumputer_course_num = $school_career_design['coumputer_course_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $coumputer_course_pre = $school_career_design['coumputer_course_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($coumputer_course_pre!=0 && $coumputer_course_num!=0 )? $coumputer_course_pre / $coumputer_course_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Academic Exam</td>

                                <td class="tg-0pky">
                                    <?php echo $academic_exam_num = $school_career_design['academic_exam_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $academic_exam_pre = $school_career_design['academic_exam_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_exam_pre!=0 && $academic_exam_num!=0 )? $academic_exam_pre / $academic_exam_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Career Guideline program</td>

                                <td class="tg-0pky">
                                    <?php echo $cg_prog_num = $school_career_design['cg_prog_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cg_prog_pre = $school_career_design['cg_prog_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($cg_prog_pre!=0 && $cg_prog_num!=0 )? $cg_prog_pre / $cg_prog_num:0 ?>
                                </td>

                            </tr>

                        </table>
                    <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>সামাজিক কার্যক্রম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'School_সামাজিক কার্যক্রম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> স্বাস্থ্য ক্যাম্প</td>

                                <td class="tg-0pky">
                                    <?php echo $health_camp_num = $school_samajik_kaj['health_camp_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $health_camp_pre = $school_samajik_kaj['health_camp_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($health_camp_pre!=0 && $health_camp_num!=0 )?$health_camp_pre / $health_camp_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">পরিস্কার পরিচ্ছন্নতা অভিযান</td>

                                <td class="tg-0pky">
                                    <?php echo $cleaning_num = $school_samajik_kaj['cleaning_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cleaning_pre = $school_samajik_kaj['cleaning_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($cleaning_pre!=0 && $cleaning_num!=0 )?$cleaning_pre / $cleaning_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> শীতবস্ত্র বিতরণ </td>

                                <td class="tg-0pky">
                                    <?php echo $winter_num = $school_samajik_kaj['winter_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $winter_pre = $school_samajik_kaj['winter_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($winter_pre!=0 && $winter_num!=0 )?$winter_pre / $winter_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> দিবস পালন </td>

                                <td class="tg-0pky">
                                    <?php echo $day_num = $school_samajik_kaj['day_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $day_pre = $school_samajik_kaj['day_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($day_pre!=0 && $day_num!=0 )? $day_pre / $day_num:0 ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বৃক্ষরোপন অভিযান</td>

                                <td class="tg-0pky">
                                    <?php echo $tree_plant_num = $school_samajik_kaj['tree_plant_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $tree_plant_pre = $school_samajik_kaj['tree_plant_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($tree_plant_pre!=0 && $tree_plant_num!=0 )? $tree_plant_pre / $tree_plant_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্লাড গ্রুপিং</td>

                                <td class="tg-0pky">
                                    <?php echo $blood_group_num = $school_samajik_kaj['blood_group_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $blood_group_pre = $school_samajik_kaj['blood_group_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($blood_group_pre!=0 && $blood_group_num!=0 )? $blood_group_pre / $blood_group_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> অন্যান্য</td>

                                <td class="tg-0pky">
                                    <?php echo $other_num = $school_samajik_kaj['other_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $other_pre = $school_samajik_kaj['other_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($other_pre!=0 && $other_num!=0 )? $other_pre / $other_num:0 ?>
                                </td>
                            </tr>
                        </table>

                        <!-- Hide this table বৈঠক -->
                        <table class="tg table table-header-rotated" id="testTable4" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>বৈঠক</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'School_বৈঠক.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সাথী বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_boithok_num = $school_boithok['sathi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_boithok_pre = $school_boithok['sathi_boithok_pre'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাথী প্রার্থী বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_prarthi_boithok_num = $school_boithok['sathi_prarthi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_prarthi_boithok_pre = $school_boithok['sathi_prarthi_boithok_pre'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কর্মী বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $kormi_boithok_num = $school_boithok['kormi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kormi_boithok_pre = $school_boithok['kormi_boithok_pre'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্কুল প্রতিনিধি বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $school_protinidhi_num = $school_boithok['school_protinidhi_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_protinidhi_pre = $school_boithok['school_protinidhi_pre'] ?>
                                </td>

                            </tr>

                        </table>

                        <!-- Hide this table কর্মশালা -->
                        <table class="tg table table-header-rotated" id="testTable5" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>কর্মশালা</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'School_কর্মশালা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">প্রোগ্রামের সংখ্যা</td>
                                <td class="tg-pwj7">মোট উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সাথী</td>

                                <td class="tg-0pky">
                                    <?php echo $associate_num = $school_workshop['associate_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_pre = $school_workshop['associate_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($associate_pre!=0 && $associate_num!=0 )?$associate_pre / $associate_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাথী প্রার্থী</td>

                                <td class="tg-0pky">
                                    <?php echo $associate_can_num = $school_workshop['associate_can_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_can_pre = $school_workshop['associate_can_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($associate_can_pre!=0 && $associate_can_num!=0 )? $associate_can_pre / $associate_can_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কর্মী</td>

                                <td class="tg-0pky">
                                    <?php echo $worker_num = $school_workshop['worker_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_pre = $school_workshop['worker_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($worker_pre!=0 && $worker_num!=0 )? $worker_pre / $worker_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্কুল কার্যক্রম সম্পাদক </td>

                                <td class="tg-0pky">
                                    <?php echo $school_karjokrom_shompadok_num = $school_workshop['school_karjokrom_shompadok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_karjokrom_shompadok_pre = $school_workshop['school_karjokrom_shompadok_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($school_karjokrom_shompadok_pre!=0 && $school_karjokrom_shompadok_num!=0 )? $school_karjokrom_shompadok_pre / $school_karjokrom_shompadok_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> স্কুল সাথী </td>

                                <td class="tg-0pky">
                                    <?php echo $school_sathi_num = $school_workshop['school_sathi_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_sathi_pre = $school_workshop['school_sathi_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($school_sathi_pre!=0 && $school_sathi_num!=0 )?$school_sathi_pre / $school_sathi_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">স্কুল দায়িত্বশীল</td>

                                <td class="tg-0pky">
                                    <?php echo $school_dayittoshil_num = $school_workshop['school_dayittoshil_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_dayittoshil_pre = $school_workshop['school_dayittoshil_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($school_dayittoshil_pre!=0 && $school_dayittoshil_num!=0 )?$school_dayittoshil_pre / $school_dayittoshil_num:0 ?>
                                </td>

                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'School_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                           
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> ৯ম ও ১০ম শ্রেণিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $nine_stu_center_manpower_num = $school_summit['nine_stu_center_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $nine_stu_center_manpower_pre = $school_summit['nine_stu_center_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($nine_stu_center_manpower_pre!=0 && $nine_stu_center_manpower_num!=0 )?$nine_stu_center_manpower_pre / $nine_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $nine_stu_center_general_num = $school_summit['nine_stu_center_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $nine_stu_center_general_pre = $school_summit['nine_stu_center_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($nine_stu_center_general_pre!=0 && $nine_stu_center_general_num!=0 )?$nine_stu_center_general_pre / $nine_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> ৯ম ও ১০ম শ্রেণিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $nine_stu_shakha_manpower_num = $school_summit['nine_stu_shakha_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $nine_stu_shakha_manpower_pre = $school_summit['nine_stu_shakha_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($nine_stu_shakha_manpower_pre!=0 && $nine_stu_shakha_manpower_num!=0 )?$nine_stu_shakha_manpower_pre / $nine_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $nine_stu_shakha_general_num = $school_summit['nine_stu_shakha_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $nine_stu_shakha_general_pre = $school_summit['nine_stu_shakha_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($nine_stu_shakha_general_pre!=0 && $nine_stu_shakha_general_num!=0 )?$nine_stu_shakha_general_pre / $nine_stu_shakha_general_num:0 ?>
                                </td>
                            </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable7">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_7' onclick="doit('xlsx','testTable7','<?php echo 'School_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$school_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$school_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$school_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$school_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$school_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$school_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$school_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$school_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>