<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০৪ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/science-page-four') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/science-page-four/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="2"><b>বিতরণ</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Science_বিতরণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রকাশনা</td>
                                <td class="tg-pwj7" colspan="">কতজনকে </td>
                                <td class="tg-pwj7" colspan="">কতটি</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সায়েন্স সিরিজ</td>
                                <td class="tg-0pky" colspan=""><?php echo $series_jon = $science_bitoron['series_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $series_ti = $science_bitoron['series_ti'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান পত্রিকা</td>
                                <td class="tg-0pky" colspan=""><?php echo $paper_jon = $science_bitoron['paper_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $paper_ti = $science_bitoron['paper_ti'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান সম্পর্কিত বই</td>
                                <td class="tg-0pky" colspan=""><?php echo $book_jon = $science_bitoron['book_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $book_ti = $science_bitoron['book_ti'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান ডকুমেন্টারি, ভিডিও, ক্লিপ</td>
                                <td class="tg-0pky" colspan=""><?php echo $documentory_jon = $science_bitoron['documentory_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $documentory_ti = $science_bitoron['documentory_ti'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td class="tg-0pky" colspan=""><?php echo $other_jon = $science_bitoron['other_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_ti = $science_bitoron['other_ti'] ?></td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>আউটপুট যোগাযোগ রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Science_আউটপুট যোগাযোগ রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যাটাগরি</td>
                                <td class="tg-pwj7" colspan="">কতজনের সাথে </td>
                                <td class="tg-pwj7" colspan="">কতবার</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানী/ক্ষুদে বিজ্ঞানী</td>
                                <td class="tg-0pky" colspan=""><?php echo $khude_biggani_jon = $science_output_contact['khude_biggani_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $khude_biggani_bar = $science_output_contact['khude_biggani_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান ব্যক্তিত্ব</td>
                                <td class="tg-0pky" colspan=""><?php echo $biggan_bekti_jon = $science_output_contact['biggan_bekti_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggan_bekti_bar = $science_output_contact['biggan_bekti_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রতিষ্ঠিত বিজ্ঞান লেখক</td>
                                <td class="tg-0pky" colspan=""><?php echo $biggan_lekhok_jon = $science_output_contact['biggan_lekhok_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggan_lekhok_bar = $science_output_contact['biggan_lekhok_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">উদীয়মান বিজ্ঞান উদ্যোক্তা/সংগঠক</td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_jon = $science_output_contact['uddokta_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_bar = $science_output_contact['uddokta_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">উদীয়মান বিজ্ঞান লেখক</td>
                                <td class="tg-0pky" colspan=""><?php echo $udiyouman_lekhok_jon = $science_output_contact['udiyouman_lekhok_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $udiyouman_lekhok_bar = $science_output_contact['udiyouman_lekhok_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানে কাজ করতে আগ্রহী জনশক্তি</td>
                                <td class="tg-0pky" colspan=""><?php echo $interested_manpower_jon = $science_output_contact['interested_manpower_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $interested_manpower_bar = $science_output_contact['interested_manpower_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রকৌশল ও প্রযুক্তি বিশ্ববিদ্যালয়/মেডিকেল ছাত্র</td>
                                <td class="tg-0pky" colspan=""><?php echo $medical_stu_jon = $science_output_contact['medical_stu_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $medical_stu_jon = $science_output_contact['medical_stu_jon'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">এসএসসি/এইচএসসিতে অধ্যয়নরত বিজ্ঞানের ছাত্র</td>
                                <td class="tg-0pky" colspan=""><?php echo $sci_stu_jon = $science_output_contact['sci_stu_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $sci_stu_bar = $science_output_contact['sci_stu_bar'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td class="tg-0pky" colspan=""><?php echo $other_jon = $science_output_contact['other_jon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_bar = $science_output_contact['other_bar'] ?></td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>আউটপুট রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Science_আউটপুট রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্যাটাগরি</td>
                                <td class="tg-pwj7" colspan="2">সেক্টরভিত্তিক জনশক্তি বাছাই সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">মোটিভেশনাল প্রোগ্রাম</td>
                                <td class="tg-pwj7" colspan="2">প্রাতিষ্ঠানিক প্রশিক্ষণ গ্রহণ</td>
                                <td class="tg-pwj7" colspan="2">প্রতিযোগিতামূলক পরীক্ষার ফলাফল</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">টার্গেট</td>
                                <td class="tg-pwj7" colspan="">বাছাই</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">সাংগঠনিক</td>
                                <td class="tg-pwj7" colspan="">সাধারণ</td>
                                <td class="tg-pwj7" colspan="">অংশগ্রহণ</td>
                                <td class="tg-pwj7" colspan="">উত্তীর্ণ</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান লেখক</td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_ter = $science_output_report['lekhok_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_bachai = $science_output_report['lekhok_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_number = $science_output_report['lekhok_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_present = $science_output_report['lekhok_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_shang = $science_output_report['lekhok_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_shadharon = $science_output_report['lekhok_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_attend = $science_output_report['lekhok_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $lekhok_pass = $science_output_report['lekhok_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান উদ্যোক্তা</td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_ter = $science_output_report['uddokta_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_bachai = $science_output_report['uddokta_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_number = $science_output_report['uddokta_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_present = $science_output_report['uddokta_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_shang = $science_output_report['uddokta_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_shadharon = $science_output_report['uddokta_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_attend = $science_output_report['uddokta_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $uddokta_pass = $science_output_report['uddokta_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান সংগঠক</td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_ter = $science_output_report['shongothok_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_bachai = $science_output_report['shongothok_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_number = $science_output_report['shongothok_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_present = $science_output_report['shongothok_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_shang = $science_output_report['shongothok_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_shadharon = $science_output_report['shongothok_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_attend = $science_output_report['shongothok_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $shongothok_pass = $science_output_report['shongothok_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রকৌশলী (স্নাতক)</td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_ter = $science_output_report['prokousholi_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_bachai = $science_output_report['prokousholi_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_number = $science_output_report['prokousholi_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_present = $science_output_report['prokousholi_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_shang = $science_output_report['prokousholi_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_shadharon = $science_output_report['prokousholi_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_attend = $science_output_report['prokousholi_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $prokousholi_pass = $science_output_report['prokousholi_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">আইটি প্রকৌশলী (স্নাতক)</td>
                                <td class="tg-0pky" colspan=""><?php echo $it_ter = $science_output_report['it_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bachai = $science_output_report['it_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_number = $science_output_report['it_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_present = $science_output_report['it_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_shang = $science_output_report['it_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_shadharon = $science_output_report['it_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_attend = $science_output_report['it_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_pass = $science_output_report['it_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানী</td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_ter = $science_output_report['biggani_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_bachai = $science_output_report['biggani_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_number = $science_output_report['biggani_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_present = $science_output_report['biggani_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_shang = $science_output_report['biggani_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_shadharon = $science_output_report['biggani_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_attend = $science_output_report['biggani_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $biggani_pass = $science_output_report['biggani_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">আইটি বিশেষজ্ঞ</td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_ter = $science_output_report['it_bisheshoggo_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_bachai = $science_output_report['it_bisheshoggo_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_number = $science_output_report['it_bisheshoggo_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_present = $science_output_report['it_bisheshoggo_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_shang = $science_output_report['it_bisheshoggo_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_shadharon = $science_output_report['it_bisheshoggo_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_attend = $science_output_report['it_bisheshoggo_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $it_bisheshoggo_pass = $science_output_report['it_bisheshoggo_pass'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td class="tg-0pky" colspan=""><?php echo $other_ter = $science_output_report['other_ter'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_bachai = $science_output_report['other_bachai'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_number = $science_output_report['other_number'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_present = $science_output_report['other_present'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_shang = $science_output_report['other_shang'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_shadharon = $science_output_report['other_shadharon'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_attend = $science_output_report['other_attend'] ?></td>
                                <td class="tg-0pky" colspan=""><?php echo $other_pass = $science_output_report['other_pass'] ?></td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                        <tr>
                            <td class="tg-pwj7" colspan="4"><b>সামিট </b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Science_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" rowspan=''>ধরন</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সাধারণ বিজ্ঞানে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র) </td>
                            <td class="tg-y698">জনশক্তি</td>
                            <td class="tg-0pky type_1">
                            <?php echo $hons_central_manpower_s=$science_summit['hons_central_manpower_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $hons_central_manpower_p=$science_summit['hons_central_manpower_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($hons_central_manpower_s>0 && $hons_central_manpower_p>0)
                            {echo ($hons_central_manpower_p/$hons_central_manpower_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td>
                            <td class="tg-0pky type_1">
                            <?php echo $hons_central_general_s=$science_summit['hons_central_general_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $hons_central_general_p=$science_summit['hons_central_general_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($hons_central_general_s>0 && $hons_central_general_p>0)
                            {echo ($hons_central_general_p/$hons_central_general_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সাধারণ বিজ্ঞানে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                            <td class="tg-y698">জনশক্তি</td>
                            <td class="tg-0pky type_1">
                            <?php echo $hons_shakha_manpower_s=$science_summit['hons_shakha_manpower_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $hons_shakha_manpower_p=$science_summit['hons_shakha_manpower_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($hons_shakha_manpower_s>0 && $hons_shakha_manpower_p>0)
                            {echo ($hons_shakha_manpower_p/$hons_shakha_manpower_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td>
                            <td class="tg-0pky type_1">
                            <?php echo $hons_shakha_general_s=$science_summit['hons_shakha_general_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $hons_shakha_general_p=$science_summit['hons_shakha_general_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($hons_shakha_general_s>0 && $hons_shakha_general_p>0)
                            {echo ($hons_shakha_general_p/$hons_shakha_general_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>ইঞ্জিনিয়ারিং ও আর্কিটেকচারে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র) </td>
                            <td class="tg-y698">জনশক্তি</td>
                            <td class="tg-0pky type_1">
                            <?php echo $eng_central_manpower_s=$science_summit['eng_central_manpower_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $eng_central_manpower_p=$science_summit['eng_central_manpower_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($eng_central_manpower_s>0 && $eng_central_manpower_p>0)
                            {echo ($eng_central_manpower_p/$eng_central_manpower_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td>
                            <td class="tg-0pky type_1">
                            <?php echo $eng_central_general_s=$science_summit['eng_central_general_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $eng_central_general_p=$science_summit['eng_central_general_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($eng_central_general_s>0 && $eng_central_general_p>0)
                            {echo ($eng_central_general_p/$eng_central_general_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698" rowspan='2'>ইঞ্জিনিয়ারিং ও আর্কিটেকচারে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                            <td class="tg-y698">জনশক্তি</td>
                            <td class="tg-0pky type_1">
                            <?php echo $eng_shakha_manpower_s=$science_summit['eng_shakha_manpower_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $eng_shakha_manpower_p=$science_summit['eng_shakha_manpower_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($eng_shakha_manpower_s>0 && $eng_shakha_manpower_p>0)
                            {echo ($eng_shakha_manpower_p/$eng_shakha_manpower_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">সাধারণ</td>
                            <td class="tg-0pky type_1">
                            <?php echo $eng_shakha_general_s=$science_summit['eng_shakha_general_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $eng_shakha_general_p=$science_summit['eng_shakha_general_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($eng_shakha_general_s>0 && $eng_shakha_general_p>0)
                            {echo ($eng_shakha_general_p/$eng_shakha_general_s);}else{echo 0;}?>
                            </td>
                        </tr>

                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>