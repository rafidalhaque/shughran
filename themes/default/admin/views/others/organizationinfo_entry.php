<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'সাংগঠনিক বিবরণঃ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';
        $branch_code = $branch->code; ?>




            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php


            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;" . anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : ''), 'জুন-নভেম্বর\'' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {
                    echo anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;" . anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo ' <li>' . anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo ' <li>' . anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';

                        echo ' <li>' . anchor('admin/others/organizationinfo' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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

                    <a href="#" onclick="doit('xlsx','testTable2');  return false;"><i
                            class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/organizationinfo') ?>"><i class="fa fa-building-o"></i>
                                    <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/organizationinfo/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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


                <style>
                    .table-responsive {
                        width: 1100px;
                        font: 18px SolaimanLipi, sans-serif;
                        overflow: auto;
                    }
                </style>


                <div class="table-responsive">




                    <table class="table table-bordered" id="testTable2"
                        data-branch="<?php echo isset($branch_code) ? $branch_code . '_organizationinfo_' : 'central_organizationinfo' ?>">
                        <tbody>
                            <tr>
                                <td colspan="2" rowspan="2">সাংগঠনিক বিবরণ</td>
                                <td rowspan="2">সংখ্যা</td>
                                <td colspan="2" rowspan="2">মোট বৃদ্ধি</td>
                                <td rowspan="2">মোট ঘাটতি</td>
                                <td colspan="6">প্রাতিষ্ঠানিক</td>
                                <td colspan="5">আবাসিক</td>
                                <td colspan="5">বিভাগীয়</td>
                            </tr>

                            <tr>
                                <td>পূর্ব</td>
                                <td>সংখ্যা</td>
                                <td colspan="2">বৃদ্ধি</td>
                                <td colspan="2">ঘাটতি</td>

                                <td>পূর্ব</td>
                                <td colspan="2">সংখ্যা</td>
                                <td>বৃদ্ধি</td>
                                <td>ঘাটতি</td>

                                <td>পূর্ব</td>
                                <td colspan="2">সংখ্যা</td>
                                <td>বৃদ্ধি</td>
                                <td>ঘাটতি</td>
                            </tr>


                            <?php foreach ($organizationinfos as $organizationinfo)
                                if ($organizationinfo->id <= 4 && $organizationinfo->id != 2) { ?>
                                    <tr>
                                        <td colspan="2"><?php echo $organizationinfo->organizationinfo_name ?></td>
                                        <td>
                                            <?php

                                            $level = $organizationinfo->level;
                                            $prev = sum_record($organizationinfo_summary_prev, 'institutional', $organizationinfo->id, 'organizationinfo_id');
                                            $prev2 = sum_record($organizationinfo_summary_prev, 'residential', $organizationinfo->id, 'organizationinfo_id');
                                            $prev3 = sum_record($organizationinfo_summary_prev, 'departmental', $organizationinfo->id, 'organizationinfo_id');

                                            $increase = getValueByMultipleKeys($org_thana_ward_unit, ['org_type' => 'Institutional', 'in_out' => 1, 'level' => $level], 'org_count');
                                            $decrease = getValueByMultipleKeys($org_thana_ward_unit, ['org_type' => 'Institutional', 'in_out' => 2, 'level' => $level], 'org_count');
                                            $increase2 = getValueByMultipleKeys($org_thana_ward_unit, ['org_type' => 'Residential', 'in_out' => 1, 'level' => $level], 'org_count');
                                            $decrease2 = getValueByMultipleKeys($org_thana_ward_unit, ['org_type' => 'Residential', 'in_out' => 2, 'level' => $level], 'org_count');
                                            $increase3 = getValueByMultipleKeys($org_thana_ward_unit, ['org_type' => 'Departmental', 'in_out' => 1, 'level' => $level], 'org_count');
                                            $decrease3 = getValueByMultipleKeys($org_thana_ward_unit, ['org_type' => 'Departmental', 'in_out' => 2, 'level' => $level], 'org_count');



                                            //from current record
                                            $current1 = org_thana_current($org_thana_current, 'Institutional', $organizationinfo->level);


                                            //from calculation
                                            //if ($report_info['prev_record'])   
                                            $calculated1 = $prev + $increase - $decrease;


                                            //from current record
                                            $current2 = org_thana_current($org_thana_current, 'Residential', $organizationinfo->level);

                                            //from calculation
                                            //if ($report_info['prev_record'])   
                                            $calculated2 = $prev2 + $increase2 - $decrease2;

                                            //from current record
                                            $current3 = org_thana_current($org_thana_current, 'Departmental', $organizationinfo->level);

                                            //from calculation                                    
                                            //if ($report_info['prev_record'])  
                                            $calculated3 = $prev3 + $increase3 - $decrease3;




                                            //echo $prev;
                                            if ($report_info['prev_record']) {
                                                // $is_equal = '';
                                    
                                                // if ($organizationinfo->id == 1)
                                                //     $is_equal = ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 != $current_thana) ? 'red' : '';
                                    
                                                // else if ($organizationinfo->id == 2)
                                                //     $is_equal = ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 != $current_ideal_thana) ? 'red' : '';
                                    
                                                //    echo '<span style="color:' . $is_equal . '">' . ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2) . '</span>';
                                    
                                                //calculated
                                                // echo $prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 + $prev3 + $increase3 - $decrease3;
                                            }

                                            //current 
                                            echo $current1 + $current2 + $current3;

                                            ?>
                                        </td>



                                        <td colspan="2"><?php echo $increase + $increase2 + $increase3; ?></td>
                                        <td><?php echo $decrease + $decrease2 + $decrease3; ?></td>
                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev; ?></td>
                                        <td>
                                            <?php



                                            $color = $current1 - $calculated1 != 0 ? 'red' : 'blank';

                                            echo '<span style="color:' . $color . '">' . $current1 . '</span>';


                                            ?>
                                        </td>
                                        <td colspan="2"><?php echo $increase; ?></td>
                                        <td colspan="2"><?php echo $decrease; ?></td>


                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev2; ?></td>
                                        <td colspan="2">

                                            <?php



                                            $color = $current2 - $calculated2 != 0 ? 'red' : 'blank';

                                            echo '<span style="color:' . $color . '">' . $current2 . '</span>';

                                            ?>
                                        </td>


                                        <td><?= $increase2 ?></td>
                                        <td><?= $decrease2 ?></td>




                                        <!-- bivagiyo -->

                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev3; ?></td>


                                        <td colspan="2">

                                            <?php

                                            $color = $current3 - $calculated3 != 0 ? 'red' : 'blank';

                                            echo '<span style="color:' . $color . '">' . $current3 . '</span>';

                                            ?>
                                        </td>


                                        <td><?= $increase3 ?></td>
                                        <td><?= $decrease3 ?></td>

                                    </tr>
                                <?php } ?>






                            <?php foreach ($organizationinfos as $organizationinfo)
                                if ($organizationinfo->id == 2) { ?>
                                    <tr>
                                        <td colspan="2"><?php echo $organizationinfo->organizationinfo_name ?></td>
                                        <td>
                                            <?php

                                            $prev = sum_orginfo($organizationinfo_summary_prev, 'institutional', $organizationinfo->id);
                                            $prev2 = sum_orginfo($organizationinfo_summary_prev, 'residential', $organizationinfo->id);
                                            $prev3 = sum_orginfo($organizationinfo_summary_prev, 'departmental', $organizationinfo->id);


                                            $increase = $idealthanainfo_summary[0]['institutional_increase'];
                                            $decrease = $idealthanainfo_summary[0]['institutional_decrease'];
                                            $increase2 = $idealthanainfo_summary[0]['residential_increase'];
                                            $decrease2 = $idealthanainfo_summary[0]['residential_decrease'];
                                            $increase3 = $idealthanainfo_summary[0]['departmental_increase'];
                                            $decrease3 = $idealthanainfo_summary[0]['departmental_decrease'];



                                            //from current record
                                            $current1 = current_ideal_thana($current_ideal_thana, 'Institutional');
                                            //from calculation                                   
                                            $calculated1 = ($prev + $increase - $decrease);



                                            //from current record
                                            $current2 = current_ideal_thana($current_ideal_thana, 'Residential');
                                            //from calculation                                   
                                            $calculated2 = ($prev2 + $increase2 - $decrease2);

                                            //from current record
                                            $current3 = current_ideal_thana($current_ideal_thana, 'Departmental');
                                            //from calculation                                   
                                            $calculated3 = ($prev3 + $increase3 - $decrease3);



                                            //echo $prev;
                                            if ($report_info['prev_record']) {
                                                $is_equal = '';


                                                $is_equal = ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 + $prev3 + $increase3 - $decrease3 != $current_ideal_thana) ? 'red' : '';
                                                //calculated
                                                // echo '<span style="color:' . $is_equal . '">' . ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 + $prev3 + $increase3 - $decrease3) . '</span>';
                                            }

                                            //current 
                                            echo $current1 + $current2 + $current3;

                                            ?>
                                        </td>


                                        <td colspan="2"><?php echo $increase + $increase2 + $increase3; ?></td>
                                        <td><?php echo $decrease + $decrease2 + $decrease3; ?></td>

                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev; ?></td>
                                        <td>
                                            <?php
                                            //calculated
                                            // if ($report_info['prev_record'])    echo $prev + $increase - $decrease; 
                                    
                                            //current
                                            $color = $current1 - $calculated1 != 0 ? 'red' : 'blank';
                                            echo '<span style="color:' . $color . '">' . $current1 . '</span>';

                                            ?>
                                        </td>
                                        <td colspan="2"><?php echo $increase; ?></td>
                                        <td colspan="2"><?php echo $decrease; ?></td>




                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev2; ?></td>
                                        <td colspan="2">
                                            <?php 
                                            //calculated
                                            //if ($report_info['prev_record'])   echo $prev2 + $increase2 - $decrease2; 
                                           
                                            //current
                                            $color = $current2 - $calculated2 != 0 ? 'red' : 'blank';
                                            echo '<span style="color:' . $color . '">' . $current2 . '</span>';


                                             ?>
                                        </td>
                                        <td><?= $increase2 ?></td>
                                        <td><?= $decrease2 ?></td>




                                        <!-- bivagiyo -->
                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev3; ?></td>
                                        <td colspan="2">
                                            <?php 
                                             //calculated
                                            // if ($report_info['prev_record']) echo $prev3 + $increase3 - $decrease3; 
                                            
                                            //current
                                             //current
                                            $color = $current3 - $calculated3 != 0 ? 'red' : 'blank';
                                            echo '<span style="color:' . $color . '">' . $current3 . '</span>';

                                             ?>
                                        </td>
                                        <td><?= $increase3 ?></td>
                                        <td><?= $decrease3 ?></td>

                                    </tr>
                                <?php } ?>












                            <?php foreach ($organizationinfos as $organizationinfo)
                                if ($organizationinfo->id > 4) { ?>
                                    <tr>
                                        <td colspan="2"><?php echo $organizationinfo->organizationinfo_name ?></td>
                                        <td>
                                            <?php


                                            $row_info = record_row($organizationinfo_summary, 'organizationinfo_id', $organizationinfo->id);
                                            $prev = sum_orginfo($organizationinfo_summary_prev, 'institutional', $organizationinfo->id);
                                            $prev2 = sum_orginfo($organizationinfo_summary_prev, 'residential', $organizationinfo->id);
                                            $prev3 = sum_orginfo($organizationinfo_summary_prev, 'departmental', $organizationinfo->id);


                                            $increase = $row_info['institutional_increase'];
                                            $decrease = $row_info['institutional_decrease'];
                                            $increase2 = $row_info['residential_increase'];
                                            $decrease2 = $row_info['residential_decrease'];
                                            $increase3 = $row_info['departmental_increase'];
                                            $decrease3 = $row_info['departmental_decrease'];


                                            //echo $prev;
                                            if ($report_info['prev_record']) {
                                                // $is_equal = '';
                                    
                                                // if ($organizationinfo->id == 1)
                                                //     $is_equal = ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 != $current_thana) ? 'red' : '';
                                    
                                                // else if ($organizationinfo->id == 2)
                                                //     $is_equal = ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 != $current_ideal_thana) ? 'red' : '';
                                    
                                                // echo '<span style="color:' . $is_equal . '">' . ($prev + $increase - $decrease + $prev2 + $increase2 - $decrease2) . '</span>';
                                    
                                                echo $prev + $increase - $decrease + $prev2 + $increase2 - $decrease2 + $prev3 + $increase3 - $decrease3;
                                            }


                                            ?>
                                        </td>



                                        <td colspan="2"><?php echo $increase + $increase2 + $increase3; ?></td>
                                        <td><?php echo $decrease + $decrease2 + $decrease3; ?></td>
                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev; ?></td>
                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev + $increase - $decrease; ?>
                                        </td>
                                        <td colspan="2">
                                            <a href="#" class="editable editable-click" data-type="number"
                                                data-table="organizationinfo_record" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="institutional_increase"
                                                data-title="Enter"><?php echo $row_info['institutional_increase']; ?></a>
                                        </td>
                                        <td colspan="2">
                                            <a href="#" class="editable editable-click" data-type="number"
                                                data-table="organizationinfo_record" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="institutional_decrease"
                                                data-title="Enter"><?php echo $row_info['institutional_decrease']; ?></a>
                                        </td>




                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev2; ?></td>
                                        <td colspan="2">
                                            <?php if ($report_info['prev_record'])
                                                echo $prev2 + $increase2 - $decrease2; ?>
                                        </td>
                                        <td><a href="#" class="editable editable-click" data-type="number"
                                                data-table="organizationinfo_record" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="residential_increase"
                                                data-title="Enter"><?php echo $row_info['residential_increase']; ?></a>
                                        </td>
                                        <td><a href="#" class="editable editable-click" data-type="number"
                                                data-table="organizationinfo_record" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="residential_decrease"
                                                data-title="Enter"><?php echo $row_info['residential_decrease']; ?></a>
                                        </td>




                                        <!-- bivagiyo -->
                                        <td><?php if ($report_info['prev_record'])
                                            echo $prev3; ?></td>
                                        <td colspan="2">
                                            <?php if ($report_info['prev_record'])
                                                echo $prev3 + $increase3 - $decrease3; ?>
                                        </td>
                                        <td><a href="#" class="editable editable-click" data-type="number"
                                                data-table="organizationinfo_record" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="departmental_increase"
                                                data-title="Enter"><?php echo $row_info['departmental_increase']; ?></a>
                                        </td>
                                        <td><a href="#" class="editable editable-click" data-type="number"
                                                data-table="organizationinfo_record" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="departmental_decrease"
                                                data-title="Enter"><?php echo $row_info['departmental_decrease']; ?></a>
                                        </td>




                                    </tr>
                                <?php } ?>
























                        </tbody>
                    </table>













                </div>
            </div>
        </div>
    </div>
</div>