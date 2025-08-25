<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'দাওয়াত ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>



            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




            <?php


            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;" . anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : ''), 'জুন-নভেম্বর\'' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {
                    echo anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;" . anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);

                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);

                }

            }



            ?>
            &nbsp;&nbsp;



            <span class="dropdown">

                <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Archive
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="archive">


                    <?php

                    echo ' <li>' . anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo ' <li>' . anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';

                        echo ' <li>' . anchor('admin/dawat' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';


                    }
                    ?>

                </ul>
            </span>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>
                    <a class="hidden" href="#" id="excel" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>

                    <a href="#" onclick="doit('xlsx','rowspan-colspan-table-1');  return false;"><i
                            class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>

                </li>

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('dawat/other') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a>
                            </li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/other/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); ?></p>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive">

                            <table class="table table-bordered" id="data-excel">

                                <tbody>
                                    <tr>
                                        <td colspan="5">
                                            <p>গ্রুপ দাওয়াতি কাজ</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p>দাওয়াতি গ্রুপ&nbsp;</p>
                                        </td>
                                        <td rowspan="2">
                                            <p>কত বার বের হয়েছে?</p>
                                        </td>
                                        <td rowspan="2">বন্ধ বৃদ্ধি</td>
                                        <td rowspan="2">সমর্থক বৃদ্ধি</td>
                                    </tr>
                                    <tr>
                                        <td>সংখ্যা</td>
                                        <td>
                                            <p>বৃদ্ধি</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?=$dawah_activity[0]['group_number']?></td>
                                        <td><?=$dawah_activity[0]['group_increase']?></td>
                                        <td><?=$dawah_activity[0]['dawah_times']?></td>
                                        <td><?=$dawah_activity[0]['supporter_increase']?></td>
                                        <td><?=$dawah_activity[0]['friend_increase']?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td colspan="4">দাওয়াতি গ্রুপ প্রেরণ</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">গ্রুপ প্রেরণ সংখ্যা</td>
                                    <td colspan="2">সমাজভিত্তিক/অন্যান্য গ্রোপ্রেম</td>
                                    <td rowspan="2">সমর্থক সংগঠন বৃদ্ধি</td>
                                </tr>
                                <tr>
                                    <td>সংখ্যা</td>
                                    <td>গড় উপ.</td>
                                </tr>
                                <tr>
                                    <td>
                                        <?=$dawah_activity[0]['number_groups_sent']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['community_based_program_number']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['community_based_program_avg_presence']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['supporter_org_increase']?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="col-lg-4">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td colspan="5">মসজিদভিত্তিক কাজ</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">মোট মসজিদ সংখ্যা</td>
                                    <td colspan="4">কাজের অবস্থা</td>
                                </tr>
                                <tr>
                                    <td>পূর্ব</td>
                                    <td>বর্তমান</td>
                                    <td>বৃদ্ধি</td>
                                    <td>প্রোগ্রাম সংখ্যা</td>
                                </tr>
                                <tr>
                                    <td>
                                        <?=$dawah_activity[0]['total_mosque']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['mosque_activity_prev']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['mosque_activity_current']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['mosque_activity_increase']?>
                                    </td>
                                    <td>
                                        <?=$dawah_activity[0]['mosque_activity_program']?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>

                    </div>


                </div>



                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                               
                                <tbody>
                                    <tr>
                                        <td rowspan="2">দাওয়াতি সপ্তাহ, দশক ও পক্ষ</td>
                                        <td rowspan="2">দাওয়াতি গ্রুপ সংখ্যা</td>
                                        <td rowspan="2">অংশগ্রহণকারী জনশক্তি সংখ্যা</td>
                                        <td rowspan="2">সমর্থক&nbsp; বৃদ্ধি</td>
                                        <td rowspan="2">বন্ধু বৃদ্ধি</td>
                                        <td rowspan="2">অনুসলিম সমর্থক&nbsp; বৃদ্ধি</td>
                                        <td rowspan="2">অনুসলিম বন্ধ বৃদ্ধি</td>
                                        <td rowspan="2">শুভাকাঙ্খী বৃদ্ধি&nbsp;</td>
                                        <td colspan="2">
                                            <p>সাধারণ সভা/দাওয়াতি প্রোগ্রাম</p>
                                        </td>
                                        <td rowspan="2">
                                            <p>পরিচিতি বিতরণ</p>
                                        </td>
                                        <td rowspan="2">
                                            <p>কিশোর পত্রিকা বিতরণ</p>
                                        </td>
                                        <td rowspan="2">গ্রাহক বৃদ্ধি&nbsp;</td>
                                        <td rowspan="2">
                                            <p>সমর্থক&nbsp; সংগঠন বৃদ্ধি</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>সংখ্যা</p>
                                        </td>
                                        <td>
                                            <p>গড় উপ.</p>
                                        </td>
                                    </tr>

                                    <?php foreach($dawat_category as $row) {
                                        $info = dawah_program($row->id, $dawah_group);                                       
                                        ?>
                                    <tr>
                                        <td><?=$row->name?></td>
                                        <td><?=$info['group_dawah_number']?></td>
                                        <td><?=$info['participant_manpower']?></td>
                                        <td><?=$info['supporter_increase']?></td>
                                        <td><?=$info['friend_increase']?></td>
                                        <td><?=$info['non_muslim_supporter_increase']?></td>
                                        <td><?=$info['non_muslim_friend_increase']?></td>
                                        <td><?=$info['wellwisher_increase']?></td>
                                        <td><?=$info['general_program_number']?></td>
                                        <td><?=$info['avg_presence']?></td>
                                        <td><?=$info['identity_distribution']?></td>
                                        <td><?=$info['teen_magazine']?></td>
                                        <td><?=$info['receiver_increase']?></td>
                                        <td><?=$info['supporter_org_increase']?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>