<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?=  'স্কুল বিভাগ - পেইজ ০৪' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/school-page-four') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/school-page-four/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="2"><b>বিতরণ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'School_বিতরণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">পূর্বের সংখ্যা </td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> কিশোর পত্রিকা বাংলা</td>

                                <td class="tg-0pky">
                                    <?php echo $kishor_potrika_bn_prev = $school_bitoron['kishor_potrika_bn_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kishor_potrika_bn_pres = $school_bitoron['kishor_potrika_bn_pres'] ?>
                                </td>
                            </tr>    
                            <tr>

                                <td class="tg-y698 type_1"> নতুন কিশোর পত্রিকা</td>

                                <td class="tg-0pky">
                                    <?php echo $new_kishor_potrika_bn_prev = $school_bitoron['new_kishor_potrika_bn_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $new_kishor_potrika_bn_pres = $school_bitoron['new_kishor_potrika_bn_pres'] ?>
                                </td>
                            </tr>    

                            <tr>

                                <td class="tg-y698 type_1">কিশোর পত্রিকা ইংরেজি</td>

                                <td class="tg-0pky">
                                    <?php echo $kishor_portrika_en_prev = $school_bitoron['kishor_portrika_en_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kishor_portrika_en_pres = $school_bitoron['kishor_portrika_en_pres'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্টিকার/কার্ড</td>

                                <td class="tg-0pky">
                                    <?php echo $sticker_prev = $school_bitoron['sticker_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sticker_pres = $school_bitoron['sticker_pres'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> ক্লাস রুটিন</td>

                                <td class="tg-0pky">
                                    <?php echo $class_routine_prev = $school_bitoron['class_routine_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $class_routine_pres = $school_bitoron['class_routine_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> দেয়ালিকা</td>

                                <td class="tg-0pky">
                                    <?php echo $deyalika_prev = $school_bitoron['deyalika_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $deyalika_pres = $school_bitoron['deyalika_pres'] ?>
                                </td>
                            </tr>
                           

                            <tr>

                                <td class="tg-y698 type_1"> পরীক্ষার রুটিন</td>

                                <td class="tg-0pky">
                                    <?php echo $exam_routine_prev = $school_bitoron['exam_routine_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $exam_routine_pres = $school_bitoron['exam_routine_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> মাসিক/দ্বিমাসিক সাময়িকি</td>

                                <td class="tg-0pky">
                                    <?php echo $masik_shamoyiki_prev = $school_bitoron['masik_shamoyiki_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $masik_shamoyiki_pres = $school_bitoron['masik_shamoyiki_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">হাসির কাগজ</td>

                                <td class="tg-0pky">
                                    <?php echo $hashir_kagoj_prev = $school_bitoron['hashir_kagoj_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $hashir_kagoj_pres = $school_bitoron['hashir_kagoj_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফুলেল শুভেচ্ছা বাণী</td>

                                <td class="tg-0pky">
                                    <?php echo $fulel_shuvechcha_prev = $school_bitoron['fulel_shuvechcha_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $fulel_shuvechcha_pres = $school_bitoron['fulel_shuvechcha_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সংক্ষিপ্ত পরিচিতি</td>

                                <td class="tg-0pky">
                                    <?php echo $porchiti_prev = $school_bitoron['porchiti_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $porchiti_pres = $school_bitoron['porchiti_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাহিত্য</td>

                                <td class="tg-0pky">
                                    <?php echo $shahitto_prev = $school_bitoron['shahitto_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shahitto_pres = $school_bitoron['shahitto_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ক্যালেন্ডার</td>

                                <td class="tg-0pky">
                                    <?php echo $calendar_prev = $school_bitoron['calendar_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $calendar_pres = $school_bitoron['calendar_pres'] ?>
                                </td>
                            </tr>

                        </table>

                        <!-- Hide this table যোগাযোগ -->
                        <table class="tg table table-header-rotated" id="testTable2" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'School_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7"> কেন্দ্র থেকে</td>
                                <td class="tg-pwj7">শাখা থেকে</td>
                                <td class="tg-pwj7">অন্যান্য</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সার্কুলার</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['circular_kendro_theke']+$school_contact['circular_shaka_theke']+$school_contact['circular_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $circular_kendro_theke = $school_contact['circular_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $circular_shaka_theke = $school_contact['circular_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $circular_other = $school_contact['circular_other'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">চিঠি</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['letter_kendro_theke']+$school_contact['letter_shaka_theke']+$school_contact['letter_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $letter_kendro_theke = $school_contact['letter_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $letter_shaka_theke = $school_contact['letter_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $letter_other = $school_contact['letter_other'] ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ইমেইল</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['email_kendro_theke']+$school_contact['email_shaka_theke']+$school_contact['email_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $email_kendro_theke = $school_contact['email_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $email_shaka_theke = $school_contact['email_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $email_other = $school_contact['email_other'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">এসএমএস</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['sms_kendro_theke']+$school_contact['sms_shaka_theke']+$school_contact['sms_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sms_kendro_theke = $school_contact['sms_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sms_shaka_theke = $school_contact['sms_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sms_other = $school_contact['sms_other'] ?>
                                </td>
                            </tr>

                        </table>

                        <!-- Hide this table সফর -->
                        <table class="tg table table-header-rotated" id="testTable3" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="1"><b>সফর</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'School_সফর.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">কোথা থেকে </td>
                                <td class="tg-pwj7">কতবার </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> কেন্দ্র (সম্পাদক)</td>

                                <td class="tg-0pky">
                                    <?php echo $central_sompadok = $school_sofor['central_sompadok'] ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> কেন্দ্র (বিভাগীয় সদস্য)</td>

                                <td class="tg-0pky">
                                    <?php echo $central_member = $school_sofor['central_member'] ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> শাখা (সভাপতি-সেক্রেটারি)</td>

                                <td class="tg-0pky">
                                    <?php echo $shakha_p_s = $school_sofor['shakha_p_s'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">শাখা (সেক্রেটারিয়েট সদস্য)</td>

                                <td class="tg-0pky">
                                    <?php echo $shakha_sec = $school_sofor['shakha_sec'] ?>
                                </td>

                            </tr>
                        </table>
                       

                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="8"><b>এসএসসি ফলাফল পরিসংখ্যান </b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable2','<?php echo 'School_এসএসসি ফলাফল পরিসংখ্যান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
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
                                $total_s_biggan = $total_s_manobik = $total_s_bebsa = 0;
                                $total_sathi_biggan = $total_sathi_manobik = $total_sathi_bebsa = 0;
                                $total_kormi_biggan = $total_kormi_manobik = $total_kormi_bebsa = 0;
                                $total_somorthok_biggan = $total_somorthok_manobik = $total_somorthok_bebsa = 0;
                                $total_examinee = $total_gpa_5 = $total_a_grade = $total_a_minas_grade = $total_b_grade = $total_c_grade = $total_d_grade = $total_manobik = 0;
                            ?>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>১</td>
                                <td class="tg-y698 type_1" rowspan='3'>সদস্য</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>

                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_mot_examine = $school_ssc_result['shodossho_s_mot_examine']; 
                                       
                                        $total_examinee += $shodossho_s_mot_examine; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_gpa_5 = $school_ssc_result['shodossho_s_gpa_5']; 
                                        $total_s_biggan += $shodossho_s_gpa_5; 
                                        $total_gpa_5 += $shodossho_s_gpa_5; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_a_grade = $school_ssc_result['shodossho_s_a_grade']; 
                                        $total_s_biggan += $shodossho_s_a_grade; 
                                        $total_a_grade += $shodossho_s_a_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_a_minus = $school_ssc_result['shodossho_s_a_minus']; 
                                        $total_s_biggan += $shodossho_s_a_minus; 
                                        $total_a_minas_grade += $shodossho_s_a_minus; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_b_grade = $school_ssc_result['shodossho_s_b_grade']; 
                                        $total_s_biggan += $shodossho_s_b_grade; 
                                        $total_b_grade += $shodossho_s_b_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_c_grade = $school_ssc_result['shodossho_s_c_grade']; 
                                        $total_s_biggan += $shodossho_s_c_grade; 
                                        $total_c_grade += $shodossho_s_c_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_s_d_grade = $school_ssc_result['shodossho_s_d_grade']; 
                                        $total_s_biggan += $shodossho_s_d_grade; 
                                        $total_d_grade += $shodossho_s_d_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_biggan; ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_mot_examine = $school_ssc_result['shodossho_a_mot_examine'] ; 
                                        
                                        $total_examinee += $shodossho_a_mot_examine; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_gpa_5 = $school_ssc_result['shodossho_a_gpa_5'] ; 
                                        $total_s_manobik += $shodossho_a_gpa_5; 
                                        $total_gpa_5 += $shodossho_a_gpa_5; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_a_grade = $school_ssc_result['shodossho_a_a_grade'] ; 
                                        $total_s_manobik += $shodossho_a_a_grade; 
                                        $total_a_grade += $shodossho_a_a_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_a_minus = $school_ssc_result['shodossho_a_a_minus'] ; 
                                        $total_s_manobik += $shodossho_a_a_minus; 
                                        $total_a_minas_grade += $shodossho_a_a_minus; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_b_grade = $school_ssc_result['shodossho_a_b_grade'] ; 
                                        $total_s_manobik += $shodossho_a_b_grade; 
                                        $total_b_grade += $shodossho_a_b_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_c_grade = $school_ssc_result['shodossho_a_c_grade'] ;
                                        $total_s_manobik += $shodossho_a_c_grade; 
                                        $total_c_grade += $shodossho_a_c_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_a_d_grade = $school_ssc_result['shodossho_a_d_grade'] ; 
                                        $total_s_manobik += $shodossho_a_d_grade; 
                                        $total_d_grade += $shodossho_a_d_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_manobik;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_mot_examine = $school_ssc_result['shodossho_c_mot_examine'] ; 
                                        
                                        $total_examinee += $shodossho_c_mot_examine; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_gpa_5 = $school_ssc_result['shodossho_c_gpa_5'] ; 
                                        $total_s_bebsa += $shodossho_c_gpa_5; 
                                        $total_gpa_5 += $shodossho_c_gpa_5; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_a_grade = $school_ssc_result['shodossho_c_a_grade'] ; 
                                        $total_s_bebsa += $shodossho_c_a_grade; 
                                        $total_a_grade += $shodossho_c_a_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_a_minus = $school_ssc_result['shodossho_c_a_minus'] ; 
                                        $total_s_bebsa += $shodossho_c_a_minus; 
                                        $total_a_minas_grade += $shodossho_c_a_minus; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_b_grade = $school_ssc_result['shodossho_c_b_grade'] ; 
                                        $total_s_bebsa += $shodossho_c_b_grade; 
                                        $total_b_grade += $shodossho_c_b_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_c_grade = $school_ssc_result['shodossho_c_c_grade'] ; 
                                        $total_s_bebsa += $shodossho_c_c_grade; 
                                        $total_c_grade += $shodossho_c_c_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shodossho_c_d_grade = $school_ssc_result['shodossho_c_d_grade'] ; 
                                        $total_s_bebsa += $shodossho_c_d_grade; 
                                        $total_d_grade += $shodossho_c_d_grade; 
                                    ?>
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
                                    <?php 
                                        echo $sathi_s_mot_examine = $school_ssc_result['sathi_s_mot_examine']; 
                                      
                                        $total_examinee += $sathi_s_mot_examine; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_s_gpa_5 = $school_ssc_result['sathi_s_gpa_5'] ; 
                                        $total_sathi_biggan += $sathi_s_gpa_5;
                                        $total_gpa_5 += $sathi_s_gpa_5;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_s_a_grade = $school_ssc_result['sathi_s_a_grade'] ; 
                                        $total_sathi_biggan += $sathi_s_a_grade;
                                        $total_a_grade += $sathi_s_a_grade;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_s_a_minus = $school_ssc_result['sathi_s_a_minus'] ; 
                                        $total_sathi_biggan += $sathi_s_a_minus;
                                        $total_a_minas_grade += $sathi_s_a_minus;
                                    ;?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_s_b_grade = $school_ssc_result['sathi_s_b_grade'] ; 
                                        $total_sathi_biggan += $sathi_s_b_grade;
                                        $total_b_grade += $sathi_s_b_grade;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_s_c_grade = $school_ssc_result['sathi_s_c_grade'] ; 
                                        $total_sathi_biggan += $sathi_s_c_grade;
                                        $total_c_grade += $sathi_s_c_grade;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_s_d_grade = $school_ssc_result['sathi_s_d_grade'] ; 
                                        $total_sathi_biggan += $sathi_s_d_grade;
                                        $total_d_grade += $sathi_s_d_grade;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_mot_examine = $school_ssc_result['sathi_a_mot_examine']; 
                                        
                                        $total_examinee += $sathi_a_mot_examine; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_gpa_5 = $school_ssc_result['sathi_a_gpa_5']; 
                                        $total_sathi_manobik += $sathi_a_gpa_5; 
                                        $total_gpa_5 += $sathi_a_gpa_5; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_a_grade = $school_ssc_result['sathi_a_a_grade']; 
                                        $total_sathi_manobik += $sathi_a_a_grade; 
                                        $total_a_grade += $sathi_a_a_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_a_minus = $school_ssc_result['sathi_a_a_minus']; 
                                        $total_sathi_manobik += $sathi_a_a_minus; 
                                        $total_a_minas_grade += $sathi_a_a_minus; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_b_grade = $school_ssc_result['sathi_a_b_grade']; 
                                        $total_sathi_manobik += $sathi_a_b_grade; 
                                        $total_b_grade += $sathi_a_b_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_c_grade = $school_ssc_result['sathi_a_c_grade']; 
                                        $total_sathi_manobik += $sathi_a_c_grade; 
                                        $total_c_grade += $sathi_a_c_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_a_d_grade = $school_ssc_result['sathi_a_d_grade']; 
                                        $total_sathi_manobik += $sathi_a_d_grade; 
                                        $total_d_grade += $sathi_a_d_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_mot_examine = $school_ssc_result['sathi_c_mot_examine']; 
                                   
                                        $total_examinee += $sathi_c_mot_examine; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_gpa_5 = $school_ssc_result['sathi_c_gpa_5']; 
                                        $total_sathi_bebsa += $sathi_c_gpa_5; 
                                        $total_gpa_5 += $sathi_c_gpa_5; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_a_grade = $school_ssc_result['sathi_c_a_grade']; 
                                        $total_sathi_bebsa += $sathi_c_a_grade; 
                                        $total_a_grade += $sathi_c_a_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_a_minus = $school_ssc_result['sathi_c_a_minus']; 
                                        $total_sathi_bebsa += $sathi_c_a_minus; 
                                        $total_a_minas_grade += $sathi_c_a_minus; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_b_grade = $school_ssc_result['sathi_c_b_grade']; 
                                        $total_sathi_bebsa += $sathi_c_b_grade; 
                                        $total_b_grade += $sathi_c_b_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_c_grade = $school_ssc_result['sathi_c_c_grade']; 
                                        $total_sathi_bebsa += $sathi_c_c_grade; 
                                        $total_c_grade += $sathi_c_c_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $sathi_c_d_grade = $school_ssc_result['sathi_c_d_grade']; 
                                        $total_sathi_bebsa += $sathi_c_d_grade; 
                                        $total_d_grade += $sathi_c_d_grade; 
                                    ?>

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
                                    <?php 
                                        echo $kormi_s_mot_examine = $school_ssc_result['kormi_s_mot_examine'] ; 
                                        
                                        $total_examinee += $kormi_s_mot_examine; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_s_gpa_5 = $school_ssc_result['kormi_s_gpa_5'] ; 
                                        $total_kormi_biggan += $kormi_s_gpa_5; 
                                        $total_gpa_5 += $kormi_s_gpa_5; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_s_a_grade = $school_ssc_result['kormi_s_a_grade'] ; 
                                        $total_kormi_biggan += $kormi_s_a_grade; 
                                        $total_a_grade += $kormi_s_a_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_s_a_minus = $school_ssc_result['kormi_s_a_minus'] ; 
                                        $total_kormi_biggan += $kormi_s_a_minus; 
                                        $total_a_minas_grade += $kormi_s_a_minus; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_s_b_grade = $school_ssc_result['kormi_s_b_grade'] ; 
                                        $total_kormi_biggan += $kormi_s_b_grade; 
                                        $total_b_grade += $kormi_s_b_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_s_c_grade = $school_ssc_result['kormi_s_c_grade'] ; 
                                        $total_kormi_biggan += $kormi_s_c_grade; 
                                        $total_c_grade += $kormi_s_c_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_s_d_grade = $school_ssc_result['kormi_s_d_grade'] ; 
                                        $total_kormi_biggan += $kormi_s_d_grade; 
                                        $total_d_grade += $kormi_s_d_grade; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_mot_examine = $school_ssc_result['kormi_a_mot_examine'] ; 
                                   
                                        $total_examinee += $kormi_a_mot_examine;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_gpa_5 = $school_ssc_result['kormi_a_gpa_5'] ; 
                                        $total_kormi_manobik += $kormi_a_gpa_5; 
                                        $total_gpa_5 += $kormi_a_gpa_5; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_a_grade = $school_ssc_result['kormi_a_a_grade'] ; 
                                        $total_kormi_manobik += $kormi_a_a_grade; 
                                        $total_a_grade += $kormi_a_a_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_a_minus = $school_ssc_result['kormi_a_a_minus'] ; 
                                        $total_kormi_manobik += $kormi_a_a_minus; 
                                        $total_a_minas_grade += $kormi_a_a_minus; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_b_grade = $school_ssc_result['kormi_a_b_grade'] ; 
                                        $total_kormi_manobik += $kormi_a_b_grade; 
                                        $total_b_grade += $kormi_a_b_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_c_grade = $school_ssc_result['kormi_a_c_grade'] ; 
                                        $total_kormi_manobik += $kormi_a_c_grade; 
                                        $total_c_grade += $kormi_a_c_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_a_d_grade = $school_ssc_result['kormi_a_d_grade'] ; 
                                        $total_kormi_manobik += $kormi_a_d_grade; 
                                        $total_d_grade += $kormi_a_d_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_mot_examine = $school_ssc_result['kormi_c_mot_examine']; 
                                   
                                        $total_examinee += $kormi_c_mot_examine;  
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_gpa_5 = $school_ssc_result['kormi_c_gpa_5']; 
                                        $total_kormi_bebsa += $kormi_c_gpa_5; 
                                        $total_gpa_5 += $kormi_c_gpa_5; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_a_grade = $school_ssc_result['kormi_c_a_grade']; 
                                        $total_kormi_bebsa += $kormi_c_a_grade; 
                                        $total_a_grade += $kormi_c_a_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_a_minus = $school_ssc_result['kormi_c_a_minus']; 
                                        $total_kormi_bebsa += $kormi_c_a_minus; 
                                        $total_a_minas_grade += $kormi_c_a_minus; 
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_b_grade = $school_ssc_result['kormi_c_b_grade'] ; 
                                        $total_kormi_bebsa += $kormi_c_b_grade;
                                        $total_b_grade += $kormi_c_b_grade;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_c_grade = $school_ssc_result['kormi_c_c_grade'] ; 
                                        $total_kormi_bebsa += $kormi_c_c_grade;
                                        $total_c_grade += $kormi_c_c_grade;
                                    ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $kormi_c_d_grade = $school_ssc_result['kormi_c_d_grade'] ; 
                                        $total_kormi_bebsa += $kormi_c_d_grade;
                                        $total_d_grade += $kormi_c_d_grade;
                                    ?>
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
                                    <?php 
                                        echo $shomorthok_s_mot_examine = $school_ssc_result['shomorthok_s_mot_examine']; 
                                       
                                        $total_examinee += $shomorthok_s_mot_examine; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_s_gpa_5 = $school_ssc_result['shomorthok_s_gpa_5'] ; 
                                        $total_somorthok_biggan += $shomorthok_s_gpa_5;
                                        $total_gpa_5 += $shomorthok_s_gpa_5;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_s_a_grade = $school_ssc_result['shomorthok_s_a_grade'] ; 
                                        $total_somorthok_biggan += $shomorthok_s_a_grade;
                                        $total_a_grade += $shomorthok_s_a_grade;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_s_a_minus = $school_ssc_result['shomorthok_s_a_minus'] ; 
                                        $total_somorthok_biggan += $shomorthok_s_a_minus;
                                        $total_a_minas_grade += $shomorthok_s_a_minus;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_s_b_grade = $school_ssc_result['shomorthok_s_b_grade'] ; 
                                        $total_somorthok_biggan += $shomorthok_s_b_grade;
                                        $total_b_grade += $shomorthok_s_b_grade;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_s_c_grade = $school_ssc_result['shomorthok_s_c_grade'] ; 
                                        $total_somorthok_biggan += $shomorthok_s_c_grade;
                                        $total_c_grade += $shomorthok_s_c_grade;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_s_d_grade = $school_ssc_result['shomorthok_s_d_grade'] ; 
                                        $total_somorthok_biggan += $shomorthok_s_d_grade;
                                        $total_d_grade += $shomorthok_s_d_grade;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?= $total_somorthok_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_mot_examine = $school_ssc_result['shomorthok_a_mot_examine'] ; 
                                       
                                        $total_examinee += $shomorthok_a_mot_examine; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_gpa_5 = $school_ssc_result['shomorthok_a_gpa_5']  ; 
                                        $total_somorthok_manobik += $shomorthok_a_gpa_5;
                                        $total_gpa_5 += $shomorthok_a_gpa_5;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_a_grade = $school_ssc_result['shomorthok_a_a_grade']  ; 
                                        $total_somorthok_manobik += $shomorthok_a_a_grade;
                                        $total_a_grade += $shomorthok_a_a_grade;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_a_minus = $school_ssc_result['shomorthok_a_a_minus']  ; 
                                        $total_somorthok_manobik += $shomorthok_a_a_minus;
                                        $total_a_minas_grade += $shomorthok_a_a_minus;
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_b_grade = $school_ssc_result['shomorthok_a_b_grade'] ; 
                                        $total_somorthok_manobik += $shomorthok_a_b_grade; 
                                        $total_b_grade += $shomorthok_a_b_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_c_grade = $school_ssc_result['shomorthok_a_c_grade'] ; 
                                        $total_somorthok_manobik += $shomorthok_a_c_grade; 
                                        $total_c_grade += $shomorthok_a_c_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_a_d_grade = $school_ssc_result['shomorthok_a_d_grade'] ; 
                                        $total_somorthok_manobik += $shomorthok_a_d_grade; 
                                        $total_d_grade += $shomorthok_a_d_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?=  
                                        $total_somorthok_manobik; 
                                        $total_manobik += $total_somorthok_manobik;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_mot_examine = $school_ssc_result['shomorthok_c_mot_examine']; 
                                         
                                        $total_examinee += $shomorthok_c_mot_examine; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_gpa_5 = $school_ssc_result['shomorthok_c_gpa_5']; 
                                        $total_somorthok_bebsa += $shomorthok_c_gpa_5; 
                                        $total_gpa_5 += $shomorthok_c_gpa_5; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_a_grade = $school_ssc_result['shomorthok_c_a_grade']; 
                                        $total_somorthok_bebsa += $shomorthok_c_a_grade; 
                                        $total_a_grade += $shomorthok_c_a_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_a_minus = $school_ssc_result['shomorthok_c_a_minus']; 
                                        $total_somorthok_bebsa += $shomorthok_c_a_minus; 
                                        $total_a_minas_grade += $shomorthok_c_a_minus; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_b_grade = $school_ssc_result['shomorthok_c_b_grade']; 
                                        $total_somorthok_bebsa += $shomorthok_c_b_grade; 
                                        $total_b_grade += $shomorthok_c_b_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_c_grade = $school_ssc_result['shomorthok_c_c_grade']; 
                                        $total_somorthok_bebsa += $shomorthok_c_c_grade; 
                                        $total_c_grade += $shomorthok_c_c_grade; 
                                    ?>

                                </td>
                                <td class="tg-0pky">
                                    <?php 
                                        echo $shomorthok_c_d_grade = $school_ssc_result['shomorthok_c_d_grade']; 
                                        $total_somorthok_bebsa += $shomorthok_c_d_grade; 
                                        $total_d_grade += $shomorthok_c_d_grade; 
                                    ?>

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
                                    <?php echo $total_examinee;  ?>
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