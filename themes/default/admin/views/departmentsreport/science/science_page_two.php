<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/science-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/science-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="5"><b>স্কুল ও কলেজভিত্তিক ম্যাগাজিন সার্কুলেশন প্রতিবেদন </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Science_স্কুল ও কলেজভিত্তিক ম্যাগাজিন সার্কুলেশন প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7">শাখা আইডি </td>
                                <td class="tg-pwj7" colspan="">শিক্ষা প্রতিষ্ঠানের নাম </td>
                                <td class="tg-pwj7" colspan="">পাঠক ফোরাম আছে কিনা? </td>
                                <td class="tg-pwj7" colspan="">কতটি ক্লাসে প্রতিনিধি দেয়া হয়েছে? </td>
                                <td class="tg-pwj7" colspan="">ম্যাগাজিন সার্কুলেশন সংখ্যা </td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($science_biggan_school_magazine_circulation->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['protishan_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['pathokforum'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['class_protinidhi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['mg_circulation_num'] ?>       
                                    </td>
            
                                
                                </tr>

                        <?php } ?>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>পাঠক ফোরাম রিপোর্ট </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Science_পাঠক ফোরাম রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">কতটি শিক্ষা প্রতিষ্ঠানে ফোরাম গঠিত হয়েছে?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['school_forum_gothito'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">শাখার মোট কতটি শিক্ষা প্রতিষ্ঠানে ফোরাম আছে?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['forum_purnago_comittee'] ?></td>
                            </tr>
                             <tr>
                                <td class="tg-pwj7" colspan="3">মোট কতটি শিক্ষা প্রতিষ্ঠানে অ্যাম্বাসেডর দেয়া হয়েছে?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['mot_protinidhi'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">শাখার ফোরামসমূহে মোট সদস্য সংখ্যা কত?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['committee_mem_num'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">কতজন রেজিস্ট্রেশন করেছে?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['registration_num'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">কতজন শিক্ষক যুক্ত হয়েছেন?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['teacher_num'] ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td class="tg-pwj7" colspan="3">প্রোগ্রাম হয়েছে কতটি?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['program'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">টি-শার্ট বিতরণ হয়েছে কতটি?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['t-shirt'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">ম্যাগাজিন বিতরণ হয়েছে কতটি?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['magazine'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">পাঠক সম্মেলন</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['pathon_shommelon_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['pathon_shommelon_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['pathon_shommelon_num']>0 && $science_pathok_forum_report['pathon_shommelon_pre']>0)? $science_pathok_forum_report['pathon_shommelon_pre'] / $science_pathok_forum_report['pathon_shommelon_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান কর্মশালা</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['science_workshop_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['science_workshop_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['science_workshop_num']>0 && $science_pathok_forum_report['science_workshop_pre']>0)? $science_pathok_forum_report['science_workshop_pre'] / $science_pathok_forum_report['science_workshop_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">মাসিক বৈঠক</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['mothly_meeting_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['mothly_meeting_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['mothly_meeting_num']>0 && $science_pathok_forum_report['mothly_meeting_pre']>0)? $science_pathok_forum_report['mothly_meeting_pre'] / $science_pathok_forum_report['mothly_meeting_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ম্যাগাজিন পাঠ</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['magazine_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['magazine_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['magazine_num']>0 && $science_pathok_forum_report['magazine_pre']>0)? $science_pathok_forum_report['magazine_pre'] / $science_pathok_forum_report['magazine_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['other_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_pathok_forum_report['other_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['other_num']>0 && $science_pathok_forum_report['other_pre']>0)? $science_pathok_forum_report['other_pre'] / $science_pathok_forum_report['other_num']:0 ?></td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিজ্ঞান ক্লাব প্রতিবেদন </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Science_বিজ্ঞান ক্লাব প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">সাধারণ বিজ্ঞান ক্লাবসমূহের মধ্যে আমাদের নিয়ন্ত্রণাধীন আছে কতটি?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['our_control_club'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">আমাদের পরিচালিত বিজ্ঞান ক্লাব সংখ্যা</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['our_scienece_club'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">আমাদের পরিচালিত কতটি বিজ্ঞান ক্লাবের রেজিস্ট্রেশন আছে?</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['registration_scienece_club'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">ক্লাবে কাজ করেন এমন জনশক্তি সংখ্যা</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['manpower_of_club'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">ক্লাবের সাধারণ সদস্য সংখ্যা</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['general_member'] ?></td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার গাইড লাইন</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['career_guideline_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['career_guideline_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['career_guideline_num']>0 && $science_club_protibedon['career_guideline_pre']>0)?$science_club_protibedon['career_guideline_pre'] / $science_club_protibedon['career_guideline_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">মেধাবী সংবর্ধনা</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['meritorious_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['meritorious_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['meritorious_num']>0 && $science_club_protibedon['meritorious_pre']>0)? $science_club_protibedon['meritorious_pre'] / $science_club_protibedon['meritorious_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">হাতে কলমে বিজ্ঞান</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['hate_kolome_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['hate_kolome_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['hate_kolome_num']>0 && $science_club_protibedon['hate_kolome_pre']>0)? $science_club_protibedon['hate_kolome_pre'] / $science_club_protibedon['hate_kolome_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান কর্মশালা</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['workshop_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['workshop_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['workshop_num']>0 && $science_club_protibedon['workshop_pre']>0)? $science_club_protibedon['workshop_pre'] / $science_club_protibedon['workshop_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান ল্যাবরেটরি</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['lab_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['lab_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['lab_num']>0 && $science_club_protibedon['lab_pre']>0)? $science_club_protibedon['lab_pre'] / $science_club_protibedon['lab_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার সেমিনার</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['seminer_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['seminer_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['seminer_num']>0 && $science_club_protibedon['seminer_pre']>0)? $science_club_protibedon['seminer_pre'] / $science_club_protibedon['seminer_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান অলিম্পিয়াড</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['olympiad_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['olympiad_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['olympiad_num']>0 && $science_club_protibedon['olympiad_pre']>0)? $science_club_protibedon['olympiad_pre'] / $science_club_protibedon['olympiad_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['other_num'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $science_club_protibedon['other_pre'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['other_num']>0 && $science_club_protibedon['other_pre']>0)? $science_club_protibedon['other_pre'] / $science_club_protibedon['other_num']:0 ?></td>
                            </tr>
                        </table>
                        
                        


                    </div>




                </div>
            </div>
        </div>
    </div>
</div>