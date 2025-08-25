<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                                <td class="tg-pwj7" colspan="5"><b>জনশক্তি</b></td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পুর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>

                                <td class="tg-0pky">
                                    <?php echo $member_prev = $total_school_manpower['member_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_pres = $total_school_manpower['member_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_bri = $total_school_manpower['member_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_gha = $total_school_manpower['member_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সদস্য প্রার্থী </td>

                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_prev = $total_school_manpower['member_prarthi_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_pres = $total_school_manpower['member_prarthi_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_bri = $total_school_manpower['member_prarthi_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $member_prarthi_gha = $total_school_manpower['member_prarthi_gha'] ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> সাথী </td>

                                <td class="tg-0pky">
                                    <?php echo $associate_prev = $total_school_manpower['associate_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_pres = $total_school_manpower['associate_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_bri = $total_school_manpower['associate_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_gha = $total_school_manpower['associate_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সাথী প্রার্থী </td>

                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_prev = $total_school_manpower['associate_prarthi_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_pres = $total_school_manpower['associate_prarthi_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_bri = $total_school_manpower['associate_prarthi_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_prarthi_gha = $total_school_manpower['associate_prarthi_gha'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">কর্মী </td>

                                <td class="tg-0pky">
                                    <?php echo $worker_prev = $total_school_manpower['worker_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_pres = $total_school_manpower['worker_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_bri = $total_school_manpower['worker_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_gha = $total_school_manpower['worker_gha'] ?>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>দাওয়াত</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পুর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> সমর্থক </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_prev = $total_school_dawat['supporter_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_pres = $total_school_dawat['supporter_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_bri = $total_school_dawat['supporter_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $supporter_gha = $total_school_dawat['supporter_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> বন্ধু </td>

                                <td class="tg-0pky">
                                    <?php echo $bondhu_prev = $total_school_dawat['bondhu_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bondhu_pres = $total_school_dawat['bondhu_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bondhu_bri = $total_school_dawat['bondhu_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bondhu_gha = $total_school_dawat['bondhu_gha'] ?>
                                </td>

                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম সমর্থক </td>

                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_prev = $total_school_dawat['omuslim_supporter_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_pres = $total_school_dawat['omuslim_supporter_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_bri = $total_school_dawat['omuslim_supporter_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_supporter_gha = $total_school_dawat['omuslim_supporter_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> অমুসলিম বন্ধু </td>

                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_prev = $total_school_dawat['omuslim_bondhu_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_pres = $total_school_dawat['omuslim_bondhu_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_bri = $total_school_dawat['omuslim_bondhu_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $omuslim_bondhu_gha = $total_school_dawat['omuslim_bondhu_gha'] ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698">শুভাকাঙ্ক্ষী </td>

                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_prev = $total_school_dawat['shuvakankhi_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_pres = $total_school_dawat['shuvakankhi_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_bri = $total_school_dawat['shuvakankhi_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shuvakankhi_gha = $total_school_dawat['shuvakankhi_gha'] ?>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>সংগঠন</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> পুর্বের সংখ্যা</td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7">বৃদ্ধি</td>
                                <td class="tg-pwj7">ঘাটতি</td>
                            </tr>


                            <tr>

                                <td class="tg-y698 type_1"> উপশাখা </td>

                                <td class="tg-0pky">
                                    <?php echo $uposhakah_prev = $total_school_shongothon['uposhakah_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $uposhakah_pres = $total_school_shongothon['uposhakah_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $uposhakah_bri = $total_school_shongothon['uposhakah_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $uposhakah_gha = $total_school_shongothon['uposhakah_gha'] ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক সংগঠন </td>

                                <td class="tg-0pky">
                                    <?php echo $ss_prev = $total_school_shongothon['ss_prev'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ss_pres = $total_school_shongothon['ss_pres'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ss_bri = $total_school_shongothon['ss_bri'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $ss_gha = $total_school_shongothon['ss_gha'] ?>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>প্রশিক্ষণ</b></td>
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
                                    <?php echo $sathi_tc_num = $total_school_proshikkhon['sathi_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_tc_pre = $total_school_proshikkhon['sathi_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_tc_pre!=0 && $sathi_tc_num!=0 )? $sathi_tc_pre / $sathi_tc_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> কর্মী টিসি/টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $kormi_tc_num = $total_school_proshikkhon['kormi_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $kormi_tc_pre = $total_school_proshikkhon['kormi_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($kormi_tc_pre!=0 && $kormi_tc_num!=0 ) ?$kormi_tc_pre / $kormi_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাথী শব্বেদারী </td>

                                <td class="tg-0pky">
                                    <?php echo $sathi_shobbedari_num = $total_school_proshikkhon['sathi_shobbedari_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sathi_shobbedari_pre = $total_school_proshikkhon['sathi_shobbedari_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sathi_shobbedari_pre!=0 && $sathi_shobbedari_num!=0 )? $sathi_shobbedari_pre / $sathi_shobbedari_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সমর্থক টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $somorthok_tc_num = $total_school_proshikkhon['somorthok_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $somorthok_tc_pre = $total_school_proshikkhon['somorthok_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($somorthok_tc_pre!=0 && $somorthok_tc_num!=0 )? $somorthok_tc_pre / $somorthok_tc_num:0  ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> একাডেমিক টিএস </td>

                                <td class="tg-0pky">
                                    <?php echo $academic_tc_num = $total_school_proshikkhon['academic_tc_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $academic_tc_pre = $total_school_proshikkhon['academic_tc_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_tc_pre!=0 && $academic_tc_num!=0 )? $academic_tc_pre / $academic_tc_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সামষ্টিক পাঠ </td>

                                <td class="tg-0pky">
                                    <?php echo $sham_path_num = $total_school_proshikkhon['sham_path_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sham_path_pre = $total_school_proshikkhon['sham_path_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo($sham_path_pre!=0 && $sham_path_num!=0 )? $sham_path_pre / $sham_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কুরআন তালিম </td>

                                <td class="tg-0pky">
                                    <?php echo $quran_talim_num = $total_school_proshikkhon['quran_talim_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $quran_talim_pre = $total_school_proshikkhon['quran_talim_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quran_talim_pre!=0 && $quran_talim_num!=0 )? $quran_talim_pre / $quran_talim_num:0  ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">আলোচনা চক্র </td>

                                <td class="tg-0pky">
                                    <?php echo $alochona_num = $total_school_proshikkhon['alochona_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $alochona_pre = $total_school_proshikkhon['alochona_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($alochona_pre!=0 && $alochona_num!=0 )?$alochona_pre / $alochona_num :0 ?>
                                </td>
                            </tr>
                        </table>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>