<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'পাঠাগার' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';
                                                            $branch_code = $branch->code; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <?php


            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : ''), 'জুন-নভেম্বর\'' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {
                    echo anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo  "&nbsp;|&nbsp;" . anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo    anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo   anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

                    echo   ' <li>' . anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo   ' <li>' . anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';

                        echo   ' <li>' . anchor('admin/training/library' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
                    }
                    ?>

                </ul>
            </span>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>
                    <a href="#" id="excel" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>

                    <a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('training/library') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('training/library/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                        // echo "<pre>";
                                        // print_r($detailinfo['libraryinfo']);
                                        // echo "</pre>";



                                        ?></p>




                <div class="table-responsive">





                    <table class="table table-bordered" id="testTable1" data-branch="<?php echo isset($branch_code) ? $branch_code . '_library_' : 'central_library' ?>">
                        <tbody>
                            <tr>
                                <td>পাঠাগার</td>
                                <td>পূর্বসংখ্যা</td>
                                <td>বর্তমান</td>
                                <td colspan="2">বৃদ্ধি</td>
                                <td colspan="2">ঘাটতি</td>
                                <td colspan="3">জনশক্তি</td>
                                <td colspan="2"><?php echo $totalreader; ?></td>
                                <td colspan="3" style="background:#ccc">অনলাইন পাঠক</td>
                                <td colspan="2">

                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="online_reader" data-title="Enter"><?php echo $detailinfo['libraryinfo']->online_reader; ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td>সংখ্যা</td>
                                <td><?php $prev_library =  isset($prev[0]['library_number']) ? $prev[0]['library_number'] : '';

                                    echo $prev_library; ?></td>


                                <td><?php echo $prev_library + $detailinfo['libraryinfo']->library_increase - $detailinfo['libraryinfo']->library_decrease; ?></td>



                                <!-- <td><?php echo $detailinfo['libraryinfo']->library_increase ?></td> -->




                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="library_increase" data-title="Enter"><?php echo $detailinfo['libraryinfo']->library_increase; ?></a>
                                </td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="library_decrease" data-title="Enter"><?php echo $detailinfo['libraryinfo']->library_decrease; ?></a>
                                </td>
                                <td colspan="3" style="background:#ccc">পাঠক</td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="reader" data-title="Enter"><?php echo $detailinfo['libraryinfo']->reader; ?></a>
                                </td>
                                <td colspan="3">অনলাইনে পঠিত বই</td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="online_read_book" data-title="Enter"><?php echo $detailinfo['libraryinfo']->online_read_book; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>বই সংখ্যা</td>
                                <td><?php $prev_book =  isset($prev[0]['book_number']) ? $prev[0]['book_number'] : '';
                                    echo $prev_book; ?></td>
                                <td><?php echo $prev_book + $detailinfo['libraryinfo']->book_increase - $detailinfo['libraryinfo']->book_decrease; ?></td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="book_increase" data-title="Enter"><?php echo $detailinfo['libraryinfo']->book_increase; ?></a>
                                </td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="book_decrease" data-title="Enter"><?php echo $detailinfo['libraryinfo']->book_decrease; ?></a>
                                </td>
                                <td colspan="3">ইস্যুকৃত বই</td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="issued_book" data-title="Enter"><?php echo $detailinfo['libraryinfo']->issued_book; ?></a>
                                </td>
                                <td colspan="3">অনলাইনে প্রেরিত বই</td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="online_sent_book" data-title="Enter"><?php echo $detailinfo['libraryinfo']->online_sent_book; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>ব্যক্তিগত</td>
                                <td><?php $prev_personal =  isset($prev[0]['personal']) ? $prev[0]['personal'] : '';
                                    echo $prev_personal; ?></td>
                                <td><?php echo $prev_personal + $detailinfo['libraryinfo']->personal_increase - $detailinfo['libraryinfo']->personal_decrease; ?></td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="personal_increase" data-title="Enter"><?php echo $detailinfo['libraryinfo']->personal_increase; ?></a>
                                </td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="personal_decrease" data-title="Enter"><?php echo $detailinfo['libraryinfo']->personal_decrease; ?></a>
                                </td>
                                <td colspan="3">পঠিত বই</td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="read_book" data-title="Enter"><?php echo $detailinfo['libraryinfo']->read_book; ?></a>
                                </td>
                                <td colspan="3">অনলাইনে আপলোড</td>
                                <td colspan="2">
                                    <a href="#" class="editable editable-click" data-type="number" data-table="library" data-pk="<?php echo $detailinfo['libraryinfo']->id; ?>" data-url="<?php echo admin_url('training/detailupdate'); ?>" data-name="online_book_upload" data-title="Enter"><?php echo $detailinfo['libraryinfo']->online_book_upload; ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>















                </div>
            </div>
        </div>
    </div>
</div>