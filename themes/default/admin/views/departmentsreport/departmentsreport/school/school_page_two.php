<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/school-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/school-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="5"><b>ধর্মীয় ও সামাজিক কার্যক্রম</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> গল্প শুনি</td>

                                <td class="tg-0pky">
                                    <?php echo $golpo_shuni_num = $total_school_dhormio_kaj['golpo_shuni_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $golpo_shuni_pre = $total_school_dhormio_kaj['golpo_shuni_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($golpo_shuni_pre!=0 && $golpo_shuni_num!=0 )?$golpo_shuni_pre / $golpo_shuni_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> স্বাস্থ্য ক্যাম্প</td>

                                <td class="tg-0pky">
                                    <?php echo $health_camp_num = $total_school_dhormio_kaj['health_camp_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $health_camp_pre = $total_school_dhormio_kaj['health_camp_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($health_camp_pre!=0 && $health_camp_num!=0 )?$health_camp_pre / $health_camp_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">পরিস্কার পরিচ্ছন্নতা অভিযান</td>

                                <td class="tg-0pky">
                                    <?php echo $cleaning_num = $total_school_dhormio_kaj['cleaning_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cleaning_pre = $total_school_dhormio_kaj['cleaning_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($cleaning_pre!=0 && $cleaning_num!=0 )?$cleaning_pre / $cleaning_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> শীতবস্ত্র বিতরণ </td>

                                <td class="tg-0pky">
                                    <?php echo $winter_num = $total_school_dhormio_kaj['winter_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $winter_pre = $total_school_dhormio_kaj['winter_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($winter_pre!=0 && $winter_num!=0 )?$winter_pre / $winter_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> দিবস পালন </td>

                                <td class="tg-0pky">
                                    <?php echo $day_num = $total_school_dhormio_kaj['day_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $day_pre = $total_school_dhormio_kaj['day_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($day_pre!=0 && $day_num!=0 )? $day_pre / $day_num:0 ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বৃক্ষরোপন অভিযান</td>

                                <td class="tg-0pky">
                                    <?php echo $tree_plant_num = $total_school_dhormio_kaj['tree_plant_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $tree_plant_pre = $total_school_dhormio_kaj['tree_plant_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($tree_plant_pre!=0 && $tree_plant_num!=0 )? $tree_plant_pre / $tree_plant_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> অন্যান্য</td>

                                <td class="tg-0pky">
                                    <?php echo $other_num = $total_school_dhormio_kaj['other_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $other_pre = $total_school_dhormio_kaj['other_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($other_pre!=0 && $other_num!=0 )? $other_pre / $other_num:0 ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>দাওয়াতীমূলক প্রোগ্রাম</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> শ্রেণি প্রতিনিধি অভিষেক</td>

                                <td class="tg-0pky">
                                    <?php echo $protinidhi_ovishek_num = $total_school_dawat_program['protinidhi_ovishek_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $protinidhi_ovishek_pre = $total_school_dawat_program['protinidhi_ovishek_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($protinidhi_ovishek_pre!=0 && $protinidhi_ovishek_num!=0 )?$protinidhi_ovishek_pre / $protinidhi_ovishek_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> মেধা যাচাই</td>

                                <td class="tg-0pky">
                                    <?php echo $medha_jachai_num = $total_school_dawat_program['medha_jachai_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $medha_jachai_pre = $total_school_dawat_program['medha_jachai_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medha_jachai_pre!=0 && $medha_jachai_num!=0 )?$medha_jachai_pre / $medha_jachai_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <?php echo $protijogita_num = $total_school_dawat_program['protijogita_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $protijogita_pre = $total_school_dawat_program['protijogita_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($protijogita_pre!=0 && $protijogita_num!=0 )? $protijogita_pre / $protijogita_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> শিক্ষা সফর </td>

                                <td class="tg-0pky">
                                    <?php echo $tour_num = $total_school_dawat_program['tour_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $tour_pre = $total_school_dawat_program['tour_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($tour_pre!=0 && $tour_num!=0 )? $tour_pre / $tour_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সংগীত ঊপস্থাপনা </td>

                                <td class="tg-0pky">
                                    <?php echo $shongit_num = $total_school_dawat_program['shongit_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $shongit_pre = $total_school_dawat_program['shongit_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($shongit_pre!=0 && $shongit_num!=0 )? $shongit_pre / $shongit_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">চিত্র প্রদর্শনী</td>

                                <td class="tg-0pky">
                                    <?php echo $art_num = $total_school_dawat_program['art_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $art_pre = $total_school_dawat_program['art_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($art_pre!=0 && $art_num!=0 )?$art_pre / $art_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> বিজ্ঞানী মনীষীদের জীবনী আলোকপাত</td>

                                <td class="tg-0pky">
                                    <?php echo $biggani_alokpat_num = $total_school_dawat_program['biggani_alokpat_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $biggani_alokpat_pre = $total_school_dawat_program['biggani_alokpat_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($biggani_alokpat_pre!=0 && $biggani_alokpat_num!=0 )?$biggani_alokpat_pre / $biggani_alokpat_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সামার ক্যাম্প</td>

                                <td class="tg-0pky">
                                    <?php echo $summer_camp_num = $total_school_dawat_program['summer_camp_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $summer_camp_pre = $total_school_dawat_program['summer_camp_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($summer_camp_pre!=0 && $summer_camp_num!=0 )?$summer_camp_pre / $summer_camp_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">আবৃত্তি/ছড়া</td>

                                <td class="tg-0pky">
                                    <?php echo $abritti_num = $total_school_dawat_program['abritti_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $abritti_pre = $total_school_dawat_program['abritti_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($abritti_pre!=0 && $abritti_num!=0 )?$abritti_pre / $abritti_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">বইমেলা</td>

                                <td class="tg-0pky">
                                    <?php echo $boimela_num = $total_school_dawat_program['boimela_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $boimela_pre = $total_school_dawat_program['boimela_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($boimela_pre!=0 && $boimela_num!=0 )?$boimela_pre / $boimela_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">সাধারণ জ্ঞানের আসর</td>

                                <td class="tg-0pky">
                                    <?php echo $gk_ashor_num = $total_school_dawat_program['gk_ashor_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $gk_ashor_pre = $total_school_dawat_program['gk_ashor_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($gk_ashor_pre!=0 && $gk_ashor_num!=0 )?$gk_ashor_pre / $gk_ashor_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">চা-চক্র</td>

                                <td class="tg-0pky">
                                    <?php echo $cha_chokro_num = $total_school_dawat_program['cha_chokro_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cha_chokro_pre = $total_school_dawat_program['cha_chokro_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($cha_chokro_pre!=0 && $cha_chokro_num!=0 )?$cha_chokro_pre / $cha_chokro_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">অন্যান্য</td>

                                <td class="tg-0pky">
                                    <?php echo $other_num = $total_school_dawat_program['other_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $other_pre = $total_school_dawat_program['other_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($other_pre!=0 && $other_num!=0 )?$other_pre / $other_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">উইন্টার ক্যাম্প</td>

                                <td class="tg-0pky">
                                    <?php echo $winter_camp_num = $total_school_dawat_program['winter_camp_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $winter_camp_pre = $total_school_dawat_program['winter_camp_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($winter_camp_pre!=0 && $winter_camp_num!=0 )?$winter_camp_pre / $winter_camp_num:0 ?>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>কর্মশালা</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> সাথী</td>

                                <td class="tg-0pky">
                                    <?php echo $associate_num = $total_school_workshop['associate_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_pre = $total_school_workshop['associate_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($associate_pre!=0 && $associate_num!=0 )?$associate_pre / $associate_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাথীপ্রার্থী</td>

                                <td class="tg-0pky">
                                    <?php echo $associate_can_num = $total_school_workshop['associate_can_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $associate_can_pre = $total_school_workshop['associate_can_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($associate_can_pre!=0 && $associate_can_num!=0 )? $associate_can_pre / $associate_can_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কর্মী</td>

                                <td class="tg-0pky">
                                    <?php echo $worker_num = $total_school_workshop['worker_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $worker_pre = $total_school_workshop['worker_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($worker_pre!=0 && $worker_num!=0 )? $worker_pre / $worker_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্কুল কার্যক্রম সম্পাদক </td>

                                <td class="tg-0pky">
                                    <?php echo $school_karjokrom_shompadok_num = $total_school_workshop['school_karjokrom_shompadok_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_karjokrom_shompadok_pre = $total_school_workshop['school_karjokrom_shompadok_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($school_karjokrom_shompadok_pre!=0 && $school_karjokrom_shompadok_num!=0 )? $school_karjokrom_shompadok_pre / $school_karjokrom_shompadok_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> স্কুল সাথী </td>

                                <td class="tg-0pky">
                                    <?php echo $school_sathi_num = $total_school_workshop['school_sathi_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_sathi_pre = $total_school_workshop['school_sathi_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($school_sathi_pre!=0 && $school_sathi_num!=0 )?$school_sathi_pre / $school_sathi_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">স্কুল দায়িত্বশীল</td>

                                <td class="tg-0pky">
                                    <?php echo $school_dayittoshil_num = $total_school_workshop['school_dayittoshil_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $school_dayittoshil_pre = $total_school_workshop['school_dayittoshil_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($school_dayittoshil_pre!=0 && $school_dayittoshil_num!=0 )?$school_dayittoshil_pre / $school_dayittoshil_num:0 ?>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>স্পোর্টস</b></td>
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
                                    <?php echo $cricket_num = $total_school_sports['cricket_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $cricket_pre = $total_school_sports['cricket_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($cricket_pre!=0 && $cricket_num!=0 )? round($cricket_pre / $cricket_num,2):0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফুটবল</td>

                                <td class="tg-0pky">
                                    <?php echo $football_num = $total_school_sports['football_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $football_pre = $total_school_sports['football_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($football_pre!=0 && $football_num!=0 )?$football_pre / $football_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ভলিবল</td>

                                <td class="tg-0pky">
                                    <?php echo $volleyball_num = $total_school_sports['volleyball_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $volleyball_pre = $total_school_sports['volleyball_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($volleyball_pre!=0 && $volleyball_num!=0 )?$volleyball_pre / $volleyball_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ব্যাডমিন্টন</td>

                                <td class="tg-0pky">
                                    <?php echo $badmintor_num = $total_school_sports['badmintor_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $badmintor_pre = $total_school_sports['badmintor_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($badmintor_pre!=0 && $badmintor_num!=0 )?$badmintor_pre / $badmintor_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> অন্যান্য</td>

                                <td class="tg-0pky">
                                    <?php echo $other_num = $total_school_sports['other_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $other_pre = $total_school_sports['other_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($other_pre!=0 && $other_num!=0 )? $other_pre / $other_num:0 ?>
                                </td>

                            </tr>

                        </table>
                        
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>