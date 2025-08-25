<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বৃদ্ধিকৃতদের আউটপুট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>




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
                                        //print_r($assooutput);
                                        //echo "</pre>";
                                        ?></p>




                <div class="table-responsive">

                    <table class="table table-bordered" id="testTable2" data-branch="<?php echo isset($branch_code) ? $branch_code . '_dawat_output_' : 'central_dawat_output' ?>">
                        <tbody>
                            <tr>
                                <td colspan="2" rowspan="2">বৃদ্ধিকৃতদের মধ্য থেকে আউটপুট ক্যাটাগরিভূক্ত</td>
                                <td colspan="5" rowspan="2">সিংগেল ডিজিট</td>
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
                                <td colspan="2">কর্মী হয়েছেন <?php //echo $detailinfo[0]['worker_improvement']; 
                                                                ?></td>
                                <td colspan="5"><?php echo $detailinfo[0]['worker_single_digit']; ?></td>

                                <td colspan="5"><?php echo $detailinfo[0]['worker_ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_hsc_alim']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_department_position']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_department_position_private']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_influential']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_hc_science']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['worker_madrasha']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_medical_college']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_ideal_college']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_engineeering']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_agri']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_science']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_business']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_arts']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">সমর্থক হয়েছেন <?php //echo $detailinfo[0]['supporter_improvement']; 
                                                                ?></td>
                                <td colspan="5"><?php echo $detailinfo[0]['supporter_single_digit']; ?></td>

                                <td colspan="5"><?php echo $detailinfo[0]['supporter_ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_hsc_alim']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_department_position']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_department_position_private']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_influential']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_hc_science']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['supporter_madrasha']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_medical_college']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_ideal_college']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_engineeering']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_agri']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_science']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_business']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_arts']; ?></td>
                            </tr>
                        </tbody>
                    </table>



















                </div>
            </div>
        </div>
    </div>
</div>