<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/school-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/school-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="4"><b>নিয়োজিত জনশক্তি</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'School_জনশক্তি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পূর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>

                                <td class="tg-0pky">
                                    <?php echo $member_prev = $school_manpower['member_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_pres = $school_manpower['member_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_bri = $school_manpower['member_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_gha = $school_manpower['member_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সদস্যপ্রার্থী </td>

                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_prev = $school_manpower['member_prarthi_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_pres = $school_manpower['member_prarthi_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_bri = $school_manpower['member_prarthi_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_gha = $school_manpower['member_prarthi_gha'] ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> সাথী </td>

                                <td class="tg-0pky">
                                    <?php echo $associate_prev = $school_manpower['associate_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_pres = $school_manpower['associate_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_bri = $school_manpower['associate_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_gha = $school_manpower['associate_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সাথীপ্রার্থী </td>

                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_prev = $school_manpower['associate_prarthi_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_pres = $school_manpower['associate_prarthi_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_bri = $school_manpower['associate_prarthi_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_gha = $school_manpower['associate_prarthi_gha'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky">
                                    <?php echo $worker_prev = $school_manpower['worker_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_pres = $school_manpower['worker_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_bri = $school_manpower['worker_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_gha = $school_manpower['worker_gha'] ?>
                                </td>
                            </tr>

                        </table>
                     
                        <!-- Hide this table দাওয়াত -->
                        <table class="tg table table-header-rotated" id="testTable2" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>দাওয়াত</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'School_দাওয়াত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পূর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> সমর্থক </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_prev = $school_dawat['supporter_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_pres = $school_dawat['supporter_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_bri = $school_dawat['supporter_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_gha = $school_dawat['supporter_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> বন্ধু </td>

                                <td class="tg-0pky">
                                    <?php echo $bondhu_prev = $school_dawat['bondhu_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bondhu_pres = $school_dawat['bondhu_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bondhu_bri = $school_dawat['bondhu_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bondhu_gha = $school_dawat['bondhu_gha'] ?>
                                </td>

                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম সমর্থক </td>

                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_prev = $school_dawat['omuslim_supporter_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_pres = $school_dawat['omuslim_supporter_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_bri = $school_dawat['omuslim_supporter_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_gha = $school_dawat['omuslim_supporter_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম বন্ধু </td>

                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_prev = $school_dawat['omuslim_bondhu_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_pres = $school_dawat['omuslim_bondhu_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_bri = $school_dawat['omuslim_bondhu_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_gha = $school_dawat['omuslim_bondhu_gha'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">শুভাকাঙ্ক্ষী </td>

                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_prev = $school_dawat['shuvakankhi_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_pres = $school_dawat['shuvakankhi_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_bri = $school_dawat['shuvakankhi_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_gha = $school_dawat['shuvakankhi_gha'] ?>
                                </td>
                            </tr>

                        </table>

                        <!-- Hide this table সংগঠন -->
                        <table class="tg table table-header-rotated" id="testTable3" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সংগঠন</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'School_সংগঠন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পূর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> থানা </td>

                                <td class="tg-0pky">
                                    <?php echo $thana_prev = $school_shongothon['thana_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $thana_pres = $school_shongothon['thana_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $thana_bri = $school_shongothon['thana_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $thana_gha = $school_shongothon['thana_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> ওয়ার্ড </td>

                                <td class="tg-0pky">
                                    <?php echo $word_prev = $school_shongothon['word_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $word_pres = $school_shongothon['word_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $word_bri = $school_shongothon['word_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $word_gha = $school_shongothon['word_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> উপশাখা </td>

                                <td class="tg-0pky">
                                    <?php echo $uposhakah_prev = $school_shongothon['uposhakah_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $uposhakah_pres = $school_shongothon['uposhakah_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $uposhakah_bri = $school_shongothon['uposhakah_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $uposhakah_gha = $school_shongothon['uposhakah_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক সংগঠন </td>

                                <td class="tg-0pky">
                                    <?php echo $ss_prev = $school_shongothon['ss_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ss_pres = $school_shongothon['ss_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ss_bri = $school_shongothon['ss_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ss_gha = $school_shongothon['ss_gha'] ?>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>প্রশিক্ষণ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'School_প্রশিক্ষণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সাথী টিসি/টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_tc_num = $school_proshikkhon['sathi_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_tc_pre = $school_proshikkhon['sathi_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_tc_pre!=0 && $sathi_tc_num!=0 )? $sathi_tc_pre / $sathi_tc_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> কর্মী টিসি/টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $kormi_tc_num = $school_proshikkhon['kormi_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kormi_tc_pre = $school_proshikkhon['kormi_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($kormi_tc_pre!=0 && $kormi_tc_num!=0 ) ?$kormi_tc_pre / $kormi_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাথী শব্বেদারী </td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_shobbedari_num = $school_proshikkhon['sathi_shobbedari_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_shobbedari_pre = $school_proshikkhon['sathi_shobbedari_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_shobbedari_pre!=0 && $sathi_shobbedari_num!=0 )? $sathi_shobbedari_pre / $sathi_shobbedari_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কর্মী শব্বেদারি </td>

                                <td class="tg-0pky">
                                    <?php echo $kormi_shobbedari_num = $school_proshikkhon['kormi_shobbedari_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kormi_shobbedari_pre = $school_proshikkhon['kormi_shobbedari_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($kormi_shobbedari_pre!=0 && $kormi_shobbedari_num!=0 )? $kormi_shobbedari_pre / $kormi_shobbedari_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $somorthok_tc_num = $school_proshikkhon['somorthok_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $somorthok_tc_pre = $school_proshikkhon['somorthok_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($somorthok_tc_pre!=0 && $somorthok_tc_num!=0 )? $somorthok_tc_pre / $somorthok_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> একাডেমিক টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $academic_tc_num = $school_proshikkhon['academic_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $academic_tc_pre = $school_proshikkhon['academic_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_tc_pre!=0 && $academic_tc_num!=0 )? $academic_tc_pre / $academic_tc_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সামষ্টিক পাঠ </td>

                                <td class="tg-0pky">
                                    <?php echo $sham_path_num = $school_proshikkhon['sham_path_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sham_path_pre = $school_proshikkhon['sham_path_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo($sham_path_pre!=0 && $sham_path_num!=0 )? $sham_path_pre / $sham_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কুরআন তালিম </td>

                                <td class="tg-0pky">
                                    <?php echo $quran_talim_num = $school_proshikkhon['quran_talim_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $quran_talim_pre = $school_proshikkhon['quran_talim_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quran_talim_pre!=0 && $quran_talim_num!=0 )? $quran_talim_pre / $quran_talim_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">আলোচনা চক্র </td>

                                <td class="tg-0pky">
                                    <?php echo $alochona_num = $school_proshikkhon['alochona_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $alochona_pre = $school_proshikkhon['alochona_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($alochona_pre!=0 && $alochona_num!=0 )?$alochona_pre / $alochona_num :0 ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>দাওয়াতীমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'School_দাওয়াতীমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> শিক্ষা সফর </td>

                                <td class="tg-0pky">
                                    <?php echo $tour_num = $school_dawat_program['tour_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $tour_pre = $school_dawat_program['tour_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($tour_pre!=0 && $tour_num!=0 )? $tour_pre / $tour_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সংগীত ঊপস্থাপনা </td>

                                <td class="tg-0pky">
                                    <?php echo $shongit_num = $school_dawat_program['shongit_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shongit_pre = $school_dawat_program['shongit_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($shongit_pre!=0 && $shongit_num!=0 )? $shongit_pre / $shongit_num:0 ?>
                                </td>

                            </tr>


                            <tr>

                                <td class="tg-y698 type_1">সাধারণ জ্ঞানের আসর</td>

                                <td class="tg-0pky">
                                    <?php echo $gk_ashor_num = $school_dawat_program['gk_ashor_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $gk_ashor_pre = $school_dawat_program['gk_ashor_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($gk_ashor_pre!=0 && $gk_ashor_num!=0 )?$gk_ashor_pre / $gk_ashor_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">চা-চক্র, ফল চক্র, বাদাম চক্র</td>

                                <td class="tg-0pky">
                                    <?php echo $cha_chokro_num = $school_dawat_program['cha_chokro_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cha_chokro_pre = $school_dawat_program['cha_chokro_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($cha_chokro_pre!=0 && $cha_chokro_num!=0 )?$cha_chokro_pre / $cha_chokro_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাধারণ সভা</td>

                                <td class="tg-0pky">
                                    <?php echo $sadaron_shova_num = $school_dawat_program['sadaron_shova_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sadaron_shova_pre = $school_dawat_program['sadaron_shova_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($sadaron_shova_pre!=0 && $sadaron_shova_num!=0 )?$sadaron_shova_pre / $sadaron_shova_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">নৌকা ভ্রমণ, গ্রুপ ভ্রমণ</td>

                                <td class="tg-0pky">
                                    <?php echo $boat_travel_num = $school_dawat_program['boat_travel_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $boat_travel_pre = $school_dawat_program['boat_travel_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($boat_travel_pre!=0 && $boat_travel_num!=0 )?$boat_travel_pre / $boat_travel_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">অন্যান্য</td>

                                <td class="tg-0pky">
                                    <?php echo $other_num = $school_dawat_program['other_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $other_pre = $school_dawat_program['other_pre'] ?>
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