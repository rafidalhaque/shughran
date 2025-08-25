<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বৃদ্ধিকৃতদের আউটপুট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';
                                                            $branch_code = $branch->code; ?>


            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php


            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : ''), 'জুন-নভেম্বর\'' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {
                    echo anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
                        echo   ' <li>' . anchor('admin/dawat/increased_output' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('dawat/increased_output') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/increased_output/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php

                                        //echo "<pre>";
                                        //print_r($detailinfo['university_dawat_reportinfo']);
                                        //echo "</pre>";

                                        ?></p>

                <style>
                    .table-responsive {
                        width: 1100px;
                        font: 18px SolaimanLipi, sans-serif;
                        overflow: auto;
                    }
                </style>


                <div class="table-responsive">






                    <table class="table table-bordered" id="testTable2" data-branch="<?php echo isset($branch_code) ? $branch_code . '_dawat_output_' : 'central_dawat_output' ?>">
                        <tbody>
                            <tr>
                                <td colspan="2" rowspan="2">বৃদ্ধিকৃতদের মধ্য থেকে আউটপুট ক্যাটাগরিভূক্ত</td>
                                <td colspan="5" rowspan="2">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
                                <td colspan="7">সর্বশেষ পরীক্ষায় GPA-5 প্রাপ্ত </td>
                                <td colspan="2">ডিপার্টমেন্টে প্লেসধারী (১-৫)</td>
                                <td rowspan="2">প্রভাবশালী পরিবারের সন্তান</td>
                                <td colspan="2" rowspan="2">মাধ্যমিক ও উচ্চ মাধ্যমিক বিজ্ঞানে অধ্যয়নরত</td>
                                <td colspan="3" rowspan="2">কওমী মাদরাসায় অধ্যয়নরত</td>
                                <td colspan="2" rowspan="2">মেডিকেল কলেজে অধ্যয়নরত</td>
                                <td rowspan="2">আদর্শ কলেজে অধ্যয়নরত </td>





                                <td colspan="5">সরকারী বিশ্ববিদ্যালয়ে অধ্যয়নরত (বিভাগভিত্তিক) </td>
                            </tr>
                            <tr>

                                <td colspan="5">SSC/Dhakil<br />GPA-5</td>
                                <td colspan="2">HSC/Alim<br />GPA-5</td>
                                <td>সরকারি</td>
                                <td>বেসরকারি</td>


                                <td>প্রকৌশল </td>
                                <td>কৃষি শিক্ষা </td>
                                <td>সাধারণ বিজ্ঞান </td>
                                <td>ব্যবসায় শিক্ষা </td>
                                <td>মানবিক </td>
                            </tr>
                            <tr>
                                <td colspan="2">সদস্য হয়েছেন </td>

                                <td colspan="5"><?php echo $memberoutput[0]['single_digit']; ?></td>

                                <td colspan="5"><?php echo $memberoutput[0]['ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $memberoutput[0]['hsc_alim']; ?></td>

                                <td><?php echo $memberoutput[0]['department_position']; ?></td>
                                <td><?php echo $memberoutput[0]['department_position_private']; ?></td>
                                <td><?php echo $memberoutput[0]['influential']; ?></td>
                                <td colspan="2"><?php echo $memberoutput[0]['hc_science']; ?></td>
                                <td colspan="3"><?php echo $memberoutput[0]['madrasha']; ?></td>
                                <td colspan="2"><?php echo $memberoutput[0]['medical_college']; ?></td>
                                <td><?php echo $memberoutput[0]['ideal_college']; ?></td>
                                <td><?php echo $memberoutput[0]['engineeering']; ?></td>
                                <td><?php echo $memberoutput[0]['agri']; ?></td>
                                <td><?php echo $memberoutput[0]['science']; ?></td>
                                <td><?php echo $memberoutput[0]['business']; ?></td>
                                <td><?php echo $memberoutput[0]['arts']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">সাথী হয়েছেন</td>

                                <td colspan="5"><?php echo $assooutput[0]['single_digit']; ?></td>

                                <td colspan="5"><?php echo $assooutput[0]['ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $assooutput[0]['hsc_alim']; ?></td>

                                <td><?php echo $assooutput[0]['department_position']; ?></td>
                                <td><?php echo $assooutput[0]['department_position_private']; ?></td>
                                <td><?php echo $assooutput[0]['influential']; ?></td>
                                <td colspan="2"><?php echo $assooutput[0]['hc_science']; ?></td>
                                <td colspan="3"><?php echo $assooutput[0]['madrasha']; ?></td>
                                <td colspan="2"><?php echo $assooutput[0]['medical_college']; ?></td>
                                <td><?php echo $assooutput[0]['ideal_college']; ?></td>
                                <td><?php echo $assooutput[0]['engineeering']; ?></td>
                                <td><?php echo $assooutput[0]['agri']; ?></td>
                                <td><?php echo $assooutput[0]['science']; ?></td>
                                <td><?php echo $assooutput[0]['business']; ?></td>
                                <td><?php echo $assooutput[0]['arts']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">কর্মী হয়েছেন</td>
                                <td colspan="5"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_single_digit" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_single_digit; ?></a></td>
                                <td colspan="5"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_ssc_dhakil" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_ssc_dhakil; ?></a></td>
                                <td colspan="2"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_hsc_alim" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_hsc_alim; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_department_position" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_department_position; ?></a></td>

                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_department_position_private" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_department_position_private; ?></a></td>

                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_influential" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_influential; ?></a></td>
                                <td colspan="2"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_hc_science" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_hc_science; ?></a></td>
                                <td colspan="3"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_madrasha" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_madrasha; ?></a></td>
                                <td colspan="2"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_medical_college" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_medical_college; ?></a></td>

                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_ideal_college" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_ideal_college; ?></a></td>

                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_engineeering" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_engineeering; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_agri" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_agri; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_science" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_science; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_business" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_business; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="worker_arts" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->worker_arts; ?></a></td>
                            </tr>
                            <tr>
                                <td colspan="2">সমর্থক হয়েছেন</td>
                                <td colspan="5"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_single_digit" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_single_digit; ?></a></td>
                                <td colspan="5"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_ssc_dhakil" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_ssc_dhakil; ?></a></td>
                                <td colspan="2"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_hsc_alim" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_hsc_alim; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_department_position" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_department_position; ?></a></td>

                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_department_position_private" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_department_position_private; ?></a></td>


                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_influential" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_influential; ?></a></td>
                                <td colspan="2"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_hc_science" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_hc_science; ?></a></td>
                                <td colspan="3"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_madrasha" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_madrasha; ?></a></td>
                                <td colspan="2"><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_medical_college" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_medical_college; ?></a></td>

                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_ideal_college" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_ideal_college; ?></a></td>


                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_engineeering" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_engineeering; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_agri" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_agri; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_science" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_science; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_business" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_business; ?></a></td>
                                <td><a href="#" class="editable editable-click" data-type="number" data-table="increase_output" data-pk="<?php echo $detailinfo['increase_outputinfo']->id; ?>" data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter_arts" data-title="Enter"><?php echo $detailinfo['increase_outputinfo']->supporter_arts; ?></a></td>
                            </tr>
                        </tbody>
                    </table>













                </div>
            </div>
        </div>
    </div>
</div>