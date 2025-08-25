<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'দাওয়াহ বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')' ?>

        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/dawah-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/dawah-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/dawah-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            } ?>
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
                                <td class="tg-pwj7 " colspan="3">
                                    <div><b>দায়ী প্রশিক্ষণ কার্যক্রম </b></div>
                                </td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1', '<?php echo 'Dawah_দায়ী প্রশিক্ষণ কার্যক্রম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span>ধরণ </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>প্রোগ্রাম সংখ্যা</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>মোট উপস্থিতি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>গড় </span></div>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-pwj7  type_1">
                                    দায়ী প্রশিক্ষণ কর্মশালা 
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $dayi_workshop_num = $dawah_dayi_training['dayi_workshop_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $dayi_workshop_pre = $dawah_dayi_training['dayi_workshop_pre']; ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo ($dayi_workshop_pre!=0 && $dayi_workshop_num!=0)?($dayi_workshop_pre / $dayi_workshop_num):0; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    দায়ী প্রশিক্ষণ কোর্স 
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $dayi_course_num = $dawah_dayi_training['dayi_course_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $dayi_course_pre = $dawah_dayi_training['dayi_course_pre']; ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo ($dayi_course_pre!=0 && $dayi_course_num!=0)?($dayi_course_pre / $dayi_course_num):0; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    মুয়াল্লিম প্রশিক্ষণ কোর্স
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $muallim_course_num = $dawah_dayi_training['muallim_course_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $muallim_course_pre = $dawah_dayi_training['muallim_course_pre']; ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo  ($muallim_course_pre!=0 && $muallim_course_num!=0)?($muallim_course_pre / $muallim_course_num):0; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    সেমিনার
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $seminer_num = $dawah_dayi_training['seminer_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $seminer_pre = $dawah_dayi_training['seminer_pre']; ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo  ($seminer_pre!=0 && $seminer_num!=0)?$seminer_pre / $seminer_num:0; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    সিম্পোজিয়াম
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $symposium_num = $dawah_dayi_training['symposium_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $symposium_pre = $dawah_dayi_training['symposium_pre']; ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo  ($symposium_pre!=0 && $symposium_num!=0)?$symposium_pre / $symposium_num:0; ?>
                                </td>

                            </tr>


                        </table>
                        <table class="tg table table-header-rotated" id="testTable8">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_8' onclick="doit('xlsx','testTable8', '<?php echo 'Dawah_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $shikkha_central_s=$dawah_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$dawah_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$dawah_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$dawah_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$dawah_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$dawah_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$dawah_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$dawah_training_program['kormoshala_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7 type_1" colspan="2"><b>
                                        যোগাযোগ
                                    </b></td>
                                    <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_2' onclick="doit('xlsx','testTable2', '<?php echo 'Dawah_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">
                                    যাদের সাথে
                                </td>
                                <td class="tg-pwj7 type_1"> সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1"> বার
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-pwj7  type_1">
                                    জাতীয় দায়ী
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $national_dayi_num = $dawah_contact['national_dayi_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $national_dayi_bar = $dawah_contact['national_dayi_bar']; ?>
                                </td>


                            </tr>

                            <tr>

                                <td class="tg-pwj7  type_1">
                                    আন্তর্জাতিক দায়ী
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_dayi_num = $dawah_contact['international_dayi_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $international_dayi_bar = $dawah_contact['international_dayi_bar']; ?>
                                </td>


                            </tr>

                            <tr>

                                <td class="tg-pwj7  type_1">
                                    জাতীয় দাওয়াতমূলক সংগঠন
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $national_dawat_num = $dawah_contact['national_dawat_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $national_dawat_bar = $dawah_contact['national_dawat_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    আন্তর্জাতিক দাওয়াতমূলক সংগঠন
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $international_dawat_num = $dawah_contact['international_dawat_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $international_dawat_bar = $dawah_contact['international_dawat_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    ইসলামিক স্কলার
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $islamic_num = $dawah_contact['islamic_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $islamic_bar = $dawah_contact['islamic_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    আলেম
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $alem_num = $dawah_contact['alem_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $alem_bar = $dawah_contact['alem_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    ওয়ায়েজিন
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $wayezin_num = $dawah_contact['wayezin_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $wayezin_bar = $dawah_contact['wayezin_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    খতিব/ ইমাম
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $khotib_num = $dawah_contact['khotib_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $khotib_bar = $dawah_contact['khotib_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    মুয়াজ্জিন
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $muajjin_num = $dawah_contact['muajjin_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $muajjin_bar = $dawah_contact['muajjin_bar']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    তরুণ দায়ী
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $torun_dayi_num = $dawah_contact['torun_dayi_num']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $torun_dayi_bar = $dawah_contact['torun_dayi_bar']; ?>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7 type_1" colspan=""><b>
                                        অর্থসহ কুরআন বিতরণ কার্যক্রম
                                    </b>
                                </td>
                                <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_6' onclick="doit('xlsx','testTable6', '<?php echo 'Dawah_ অর্থসহ কুরআন বিতরণ কার্যক্রম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">
                                    সাংগঠনিক স্তর
                                </td>
                                <td class="tg-pwj7 type_1"> বিতরণ সংখ্যা
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7  type_1">
                                    শাখাভিত্তিক
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $shakha = $dawah_quran_bitoron['shakha']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7  type_1">
                                    থানাভিত্তিক
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $thana = $dawah_quran_bitoron['thana']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7  type_1">
                                    ওয়ার্ড/ইউনিয়নভিত্তিক
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $ward = $dawah_quran_bitoron['ward']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7  type_1">
                                    উপশাখাভিত্তিক
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $uposhakah = $dawah_quran_bitoron['uposhakah']; ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7 type_1" colspan="5"><b>
                                        অনলাইন তৎপরতা
                                    </b>
                                </td>
                                <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_3' onclick="doit('xlsx','testTable3', '<?php echo 'Dawah_অনলাইন তৎপরতা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">
                                ধরণ
                                </td>
                                <td class="tg-pwj7 type_1"> লাইভ প্রোগ্রাম
                                </td>
                                <td class="tg-pwj7 type_1">
                                    পোস্ট সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1"> দাওয়াতি পোস্টার শেয়ার
                                </td>
                                <td class="tg-pwj7 type_1">
                                    ভিডিও শেয়ার
                                </td>
                                <td class="tg-pwj7 type_1">অন্যান্য
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    ফেসবুক পেইজ/আইডি/গ্রুপ
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $fb_live = $dawah_online['fb_live']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $fb_post = $dawah_online['fb_post']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $fb_post_share = $dawah_online['fb_post_share']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $fb_video_share = $dawah_online['fb_video_share']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $fb_other = $dawah_online['fb_other']; ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    টুইটার
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $twitter_live = $dawah_online['twitter_live']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $twitter_post = $dawah_online['twitter_post']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $twitter_post_share = $dawah_online['twitter_post_share']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $twitter_video_share = $dawah_online['twitter_video_share']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $twitter_other = $dawah_online['twitter_other']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    ইউটিউব চ্যানেল
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $youtube_live = $dawah_online['youtube_live']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $youtube_post = $dawah_online['youtube_post']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $youtube_post_share = $dawah_online['youtube_post_share']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $youtube_video_share = $dawah_online['youtube_video_share']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $youtube_other = $dawah_online['youtube_other']; ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    ওয়েবসাইট
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $website_live = $dawah_online['website_live']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $website_post = $dawah_online['website_post']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $website_post_share = $dawah_online['website_post_share']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $website_video_share = $dawah_online['website_video_share']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $website_other = $dawah_online['website_other']; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7  type_1">
                                    ইন্সটাগ্রাম
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $insta_live = $dawah_online['insta_live']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $insta_post = $dawah_online['insta_post']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $insta_post_share = $dawah_online['insta_post_share']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $insta_video_share = $dawah_online['insta_video_share']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $insta_other = $dawah_online['insta_other']; ?>
                                </td>

                            </tr>
                        </table>
                        
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7 type_1" colspan="3"><b>
                                        দাওয়াত বার (সোমবার) পালন
                                    </b>
                                </td>
                                <td class="tg-pwj7" colspan="1">
                                        <a href="#" id='table_4' onclick="doit('xlsx','testTable4', '<?php echo 'Dawah_দাওয়াত বার (সোমবার) পালন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">
                                    গ্রুপ সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1">
                                    অংশগ্রহণকারী সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1">
                                    সমর্থক বৃদ্ধি
                                </td>
                                <td class="tg-pwj7 type_1">
                                    বন্ধু বৃদ্ধি
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_2">
                                    <?php echo $group = $dawah_dawat_bar['group']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $ongshogrohonkari = $dawah_dawat_bar['ongshogrohonkari']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $somorthok_bri = $dawah_dawat_bar['somorthok_bri']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $bondhu_bri = $dawah_dawat_bar['bondhu_bri']; ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7 type_1" colspan="4"><b>
                                        ভিন্নধর্মাবলম্বীদের মাঝে দাওয়াতি গ্রুপ সংক্রান্ত
                                    </b>
                                </td>
                                <td class="tg-pwj7" colspan="2">
                                        <a href="#" id='table_5' onclick="doit('xlsx','testTable5', '<?php echo 'Dawah_ভিন্নধর্মাবলম্বীদের মাঝে দাওয়াতি গ্রুপ সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">
                                    গ্রুপ সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1">
                                    অংশগ্রহণকারী সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1">
                                    দাওয়াত প্রাপ্ত সংখ্যা
                                </td>
                                <td class="tg-pwj7 type_1">
                                    সমর্থক বৃদ্ধি
                                </td>
                                <td class="tg-pwj7 type_1">
                                    বন্ধু বৃদ্ধি
                                </td>
                                <td class="tg-pwj7 type_1">
                                    শুভাকাঙ্ক্ষী বৃদ্ধি
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_2">
                                    <?php echo $group = $dawah_vinnordhormo['group']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $ongshogrohokari = $dawah_vinnordhormo['ongshogrohokari']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $dawat_prapto = $dawah_vinnordhormo['dawat_prapto']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $somorthok_bri = $dawah_vinnordhormo['somorthok_bri']; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $bondhu_bri = $dawah_vinnordhormo['bondhu_bri']; ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $shuva_bri = $dawah_vinnordhormo['shuva_bri']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>