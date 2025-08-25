<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০৩'  . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">




                    </ul>
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
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); 
                                        ?></p>




                <div class="table-responsive">


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

                    <div class="tg-wrap">

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>বিতরণ</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">পুর্বের সংখ্যা </td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> কিশোর পত্রিকা বাংলা</td>

                                <td class="tg-0pky">
                                    <?php echo $kishor_potrika_bn_prev = $total_school_bitoron['kishor_potrika_bn_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kishor_potrika_bn_pres = $total_school_bitoron['kishor_potrika_bn_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">প্রেরণা</td>

                                <td class="tg-0pky">
                                    <?php echo $prerona_prev = $total_school_bitoron['prerona_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $prerona_pres = $total_school_bitoron['prerona_pres'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কিশোর পত্রিকা ইংরেজি</td>

                                <td class="tg-0pky">
                                    <?php echo $kishor_portrika_en_prev = $total_school_bitoron['kishor_portrika_en_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kishor_portrika_en_pres = $total_school_bitoron['kishor_portrika_en_pres'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্টিকার/কার্ড</td>

                                <td class="tg-0pky">
                                    <?php echo $sticker_prev = $total_school_bitoron['sticker_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sticker_pres = $total_school_bitoron['sticker_pres'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> ক্লাস রুটিন</td>

                                <td class="tg-0pky">
                                    <?php echo $class_routine_prev = $total_school_bitoron['class_routine_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $class_routine_pres = $total_school_bitoron['class_routine_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> দেয়ালিকা</td>

                                <td class="tg-0pky">
                                    <?php echo $deyalika_prev = $total_school_bitoron['deyalika_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $deyalika_pres = $total_school_bitoron['deyalika_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ছড়া পাতা</td>

                                <td class="tg-0pky">
                                    <?php echo $chora_pata_prev = $total_school_bitoron['chora_pata_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $chora_pata_pres = $total_school_bitoron['chora_pata_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> পরীক্ষার রুটিন</td>

                                <td class="tg-0pky">
                                    <?php echo $exam_routine_prev = $total_school_bitoron['exam_routine_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $exam_routine_pres = $total_school_bitoron['exam_routine_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> মাসিক/দ্বিমাসিক সাময়িকী</td>

                                <td class="tg-0pky">
                                    <?php echo $masik_shamoyiki_prev = $total_school_bitoron['masik_shamoyiki_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $masik_shamoyiki_pres = $total_school_bitoron['masik_shamoyiki_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">হাসির কাগজ</td>

                                <td class="tg-0pky">
                                    <?php echo $hashir_kagoj_prev = $total_school_bitoron['hashir_kagoj_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $hashir_kagoj_pres = $total_school_bitoron['hashir_kagoj_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফুলেল শুভেচ্ছা বাণী</td>

                                <td class="tg-0pky">
                                    <?php echo $fulel_shuvechcha_prev = $total_school_bitoron['fulel_shuvechcha_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $fulel_shuvechcha_pres = $total_school_bitoron['fulel_shuvechcha_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সংক্ষিপ্ত পরিচিতি</td>

                                <td class="tg-0pky">
                                    <?php echo $porchiti_prev = $total_school_bitoron['porchiti_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $porchiti_pres = $total_school_bitoron['porchiti_pres'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাহিত্য</td>

                                <td class="tg-0pky">
                                    <?php echo $shahitto_prev = $total_school_bitoron['shahitto_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shahitto_pres = $total_school_bitoron['shahitto_pres'] ?>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>যোগাযোগ</b></td>
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
                                    <?= $total_school_contact['circular_kendro_theke']+$total_school_contact['circular_shaka_theke']+$total_school_contact['circular_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $circular_kendro_theke = $total_school_contact['circular_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $circular_shaka_theke = $total_school_contact['circular_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $circular_other = $total_school_contact['circular_other'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">চিঠি</td>

                                <td class="tg-0pky">
                                    <?= $total_school_contact['letter_kendro_theke']+$total_school_contact['letter_shaka_theke']+$total_school_contact['letter_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $letter_kendro_theke = $total_school_contact['letter_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $letter_shaka_theke = $total_school_contact['letter_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $letter_other = $total_school_contact['letter_other'] ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ইমেইল</td>

                                <td class="tg-0pky">
                                    <?= $total_school_contact['email_kendro_theke']+$total_school_contact['email_shaka_theke']+$total_school_contact['email_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $email_kendro_theke = $total_school_contact['email_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $email_shaka_theke = $total_school_contact['email_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $email_other = $total_school_contact['email_other'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">এসএমএস</td>

                                <td class="tg-0pky">
                                    <?= $total_school_contact['sms_kendro_theke']+$total_school_contact['sms_shaka_theke']+$total_school_contact['sms_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sms_kendro_theke = $total_school_contact['sms_kendro_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sms_shaka_theke = $total_school_contact['sms_shaka_theke'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sms_other = $total_school_contact['sms_other'] ?>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>সফর</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">কোথা থেকে </td>
                                <td class="tg-pwj7">কতবার </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> কেন্দ্র</td>

                                <td class="tg-0pky">
                                    <?php echo $kendro_theke_kotobar = $total_school_sofor['kendro_theke_kotobar'] ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">শাখা</td>

                                <td class="tg-0pky">
                                    <?php echo $shakha_theke_kotobar = $total_school_sofor['shakha_theke_kotobar'] ?>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>বৈঠক</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সাথী বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_boithok_num = $total_school_boithok['sathi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_boithok_pre = $total_school_boithok['sathi_boithok_pre'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাথীপ্রার্থী বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_prarthi_boithok_num = $total_school_boithok['sathi_prarthi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_prarthi_boithok_pre = $total_school_boithok['sathi_prarthi_boithok_pre'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কর্মী বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $kormi_boithok_num = $total_school_boithok['kormi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kormi_boithok_pre = $total_school_boithok['kormi_boithok_pre'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্কুল প্রতিনিধি বৈঠক</td>

                                <td class="tg-0pky">
                                    <?php echo $school_protinidhi_num = $total_school_boithok['school_protinidhi_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_protinidhi_pre = $total_school_boithok['school_protinidhi_pre'] ?>
                                </td>

                            </tr>

                        </table>
                        
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>ক্যারিয়ার ডিজাইন</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7"> মোট উপস্থিতি </td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সুন্দর হাতের লেখা</td>

                                <td class="tg-0pky">
                                    <?php echo $shundor_hater_lekha_num = $total_school_career_design['shundor_hater_lekha_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shundor_hater_lekha_pre = $total_school_career_design['shundor_hater_lekha_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($shundor_hater_lekha_pre!=0 && $shundor_hater_lekha_num!=0 )? $shundor_hater_lekha_pre / $shundor_hater_lekha_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">দেশটাকে গড়তে চাই বেশি করে পড়ছি তাই</td>

                                <td class="tg-0pky">
                                    <?php echo $deshtake_gorte_num = $total_school_career_design['deshtake_gorte_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $deshtake_gorte_pre = $total_school_career_design['deshtake_gorte_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($deshtake_gorte_pre!=0 && $deshtake_gorte_num!=0 )? $deshtake_gorte_pre / $deshtake_gorte_num:0 ?>
                                </td>


                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">মেধার শীর্ষে যারা সেই মেধাবীদের সেরা কারা?</td>

                                <td class="tg-0pky">
                                    <?php echo $medhabi_num = $total_school_career_design['medhabi_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medhabi_pre = $total_school_career_design['medhabi_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($medhabi_pre!=0 && $medhabi_num!=0 )? $medhabi_pre / $medhabi_num:0 ?>
                                </td>



                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">Academic & Moral Development programe</td>

                                <td class="tg-0pky">
                                    <?php echo $moral_development_num = $total_school_career_design['moral_development_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $moral_development_pre = $total_school_career_design['moral_development_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($moral_development_pre!=0 && $moral_development_num!=0 )? $moral_development_pre / $moral_development_num:0 ?>
                                </td>


                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">Spoken English</td>

                                <td class="tg-0pky">
                                    <?php echo $sopken_english_num = $total_school_career_design['sopken_english_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sopken_english_pre = $total_school_career_design['sopken_english_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sopken_english_pre!=0 && $sopken_english_num!=0 )? $sopken_english_pre / $sopken_english_num:0 ?>
                                </td>


                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Computer Course</td>

                                <td class="tg-0pky">
                                    <?php echo $coumputer_course_num = $total_school_career_design['coumputer_course_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $coumputer_course_pre = $total_school_career_design['coumputer_course_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($coumputer_course_pre!=0 && $coumputer_course_num!=0 )? $coumputer_course_pre / $coumputer_course_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Academic Exam</td>

                                <td class="tg-0pky">
                                    <?php echo $academic_exam_num = $total_school_career_design['academic_exam_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $academic_exam_pre = $total_school_career_design['academic_exam_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_exam_pre!=0 && $academic_exam_num!=0 )? $academic_exam_pre / $academic_exam_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Career Guideline programme</td>

                                <td class="tg-0pky">
                                    <?php echo $cg_prog_num = $total_school_career_design['cg_prog_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cg_prog_pre = $total_school_career_design['cg_prog_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($cg_prog_pre!=0 && $cg_prog_num!=0 )? $cg_prog_pre / $cg_prog_num:0 ?>
                                </td>

                            </tr>

                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>