<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'দাওয়াত ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';
        $branch_code = $branch->code; ?>

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

                    <a href="#" onclick="doit('xlsx','data-excel');  return false;"><i
                            class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('dawat') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a>
                            </li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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







                    <table class="table table-bordered" id="data-excel"
                        data-branch="<?php echo isset($branch_code) ? $branch_code . '_dawat_' : 'central_dawat' ?>">

                        <thead>
                            <tr style="height: 36px;">
                                <td rowspan="2">দাওয়াত</td>
                                <td rowspan="2">পূর্ব </td>
                                <td rowspan="2">বর্তমান</td>
                                <td colspan="<?= count($institutiontype) + 1 ?>">Increase</td>
                                <td rowspan="2">টার্গেট </td>
                                <td rowspan="2">%</td>
                                <td rowspan="2">ঘাটতি </td>
                            </tr>
                            <tr style="height: 36px;">
                                <td>মোট বৃদ্ধি</td>
                                <?php foreach ($institutiontype as $row) { ?>
                                    <td><?= $row->institution_type ?></td>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>সমর্থক</td>
                                <td><?php echo $lastyeardawat[0]['supporter']; ?></td>
                                <td>
                                    <?php
                                    $supporter_inc = 0;
                                    foreach ($institutiontype as $row) {

                                        $dawat_info = dawat_info($dawat_summary, $row->id);
                                        $supporter_inc += $dawat_info['supporter'];
                                    }
                                    echo $lastyeardawat[0]['supporter'] + $supporter_inc - $dawat_decrease_target[0]['supporter_decrease'];
                                    ?>




                                </td>
                                <td>
                                    <?= $supporter_inc ?>

                                </td>
                                <?php foreach ($institutiontype as $row) {

                                    $dawat_info = dawat_info($dawat_summary, $row->id);


                                    ?>


                                    <td>
                                        <a href="#" class="editable editable-click" data-type="number"
                                            data-table="dawat_summary" data-pk="<?= $dawat_info['id'] ?>"
                                            data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="supporter"
                                            data-title="Enter">
                                            <?= $dawat_info['supporter'] ?>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                    <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="supporter_target" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['supporter_target'] ?>
                                    </a>
                                </td>
                                <td></td>
                                <td>
                                <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="supporter_decrease" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['supporter_decrease'] ?>
                                    </a>    
                                 </td>
                            </tr>
                            <tr>
                                <td>বন্ধু</td>
                                <td><?php echo $lastyeardawat[0]['friend']; ?></td>
                                <td>
                                    <?php
                                    $friend_inc = 0;
                                    foreach ($institutiontype as $row) {

                                        $dawat_info = dawat_info($dawat_summary, $row->id);
                                        $friend_inc += $dawat_info['friend'];
                                    }
                                    echo $lastyeardawat[0]['friend'] + $friend_inc - $dawat_decrease_target[0]['friend_decrease'];
                                    ?>




                                </td>
                                <td>
                                    <?= $friend_inc ?>

                                </td>
                                <?php foreach ($institutiontype as $row) {

                                    $dawat_info = dawat_info($dawat_summary, $row->id);


                                    ?>


                                    <td>
                                        <a href="#" class="editable editable-click" data-type="number"
                                            data-table="dawat_summary" data-pk="<?= $dawat_info['id'] ?>"
                                            data-url="<?php echo admin_url('dawat/detailupdate'); ?>" data-name="friend"
                                            data-title="Enter">
                                            <?= $dawat_info['friend'] ?>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="friend_target" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['friend_target'] ?>
                                    </a>        
                                 </td>
                                <td></td>
                                <td>
                                 <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="friend_decrease" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['friend_decrease'] ?>
                                    </a>       
                                </td>
                            </tr>
                            <tr>
                                <td>অমুসলিম সমর্থক</td>
                                <td><?php echo $lastyeardawat[0]['non_muslim_supporter']; ?></td>
                                <td>
                                    <?php
                                    $non_muslim_supporter_inc = 0;
                                    foreach ($institutiontype as $row) {

                                        $dawat_info = dawat_info($dawat_summary, $row->id);
                                        $non_muslim_supporter_inc += $dawat_info['non_muslim_supporter'];
                                    }
                                    echo $lastyeardawat[0]['non_muslim_supporter'] + $non_muslim_supporter_inc - $dawat_decrease_target[0]['non_muslim_supporter_decrease'];
                                    ?>




                                </td>
                                <td>
                                    <?= $non_muslim_supporter_inc ?>

                                </td>
                                <?php foreach ($institutiontype as $row) {

                                    $dawat_info = dawat_info($dawat_summary, $row->id);


                                    ?>


                                    <td>
                                        <a href="#" class="editable editable-click" data-type="number"
                                            data-table="dawat_summary" data-pk="<?= $dawat_info['id'] ?>"
                                            data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                            data-name="non_muslim_supporter" data-title="Enter">
                                            <?= $dawat_info['non_muslim_supporter'] ?>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                      <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="non_muslim_supporter_target" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['non_muslim_supporter_target'] ?>
                                    </a>  
                                </td>
                                <td></td>
                                <td>
                                    <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="non_muslim_supporter_decrease" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['non_muslim_supporter_decrease'] ?>
                                    </a>  
                                </td>
                            </tr>
                            <tr>
                                <td>অমুসলিম বন্ধু</td>
                                <td><?php echo $lastyeardawat[0]['non_muslim_friend']; ?></td>

                                <td>
                                    <?php
                                    $non_muslim_friend_inc = 0;
                                    foreach ($institutiontype as $row) {

                                        $dawat_info = dawat_info($dawat_summary, $row->id);
                                        $non_muslim_friend_inc += $dawat_info['non_muslim_friend'];
                                    }
                                    echo $lastyeardawat[0]['non_muslim_friend'] + $non_muslim_friend_inc - $dawat_decrease_target[0]['non_muslim_friend_decrease'];
                                    ?>




                                </td>
                                <td>
                                    <?= $non_muslim_friend_inc ?>

                                </td>
                                <?php foreach ($institutiontype as $row) {

                                    $dawat_info = dawat_info($dawat_summary, $row->id);


                                    ?>


                                    <td>
                                        <a href="#" class="editable editable-click" data-type="number"
                                            data-table="dawat_summary" data-pk="<?= $dawat_info['id'] ?>"
                                            data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                            data-name="non_muslim_friend" data-title="Enter">
                                            <?= $dawat_info['non_muslim_friend'] ?>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                      <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="non_muslim_friend_target" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['non_muslim_friend_target'] ?>
                                    </a>  
                                </td>
                                <td></td>
                                <td>
                                      <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="non_muslim_friend_decrease" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['non_muslim_friend_decrease'] ?>
                                    </a>  
                                
                                </td>
                            </tr>
                            <tr>
                                <td>শুভাকাঙ্ক্ষী</td>
                                <td><?php echo $lastyeardawat[0]['wellwisher']; ?></td>

                                <td>
                                    <?php
                                    $wellwisher_inc = $dawat_decrease_target[0]['wellwisher_increase'];
                                    
                                    echo $lastyeardawat[0]['wellwisher'] + $wellwisher_inc - $dawat_decrease_target[0]['wellwisher_decrease'];
                                    ?>




                                </td>
                                <td>
                                   <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="wellwisher_increase" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['wellwisher_increase'] ?>
                                    </a>  
                                </td>
                                <?php foreach ($institutiontype as $row) {
                                        ?>
                                    <td>
                                        
                                    </td>
                                <?php } ?>



                                <td>
                                     <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="wellwisher_target" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['wellwisher_target'] ?>
                                    </a>  
                                    </td>
                                <td></td>
                                <td>
                                     <a href="#" class="editable editable-click" data-type="number"
                                        data-table="dawat_decrease_target" data-pk="<?= $dawat_decrease_target[0]['id'] ?>"
                                        data-url="<?php echo admin_url('dawat/detailupdate'); ?>"
                                        data-name="wellwisher_decrease" data-title="Enter">
                                        <?= $dawat_decrease_target[0]['wellwisher_decrease'] ?>
                                    </a>  
                                 </td>
                            </tr>
                        </tbody>
                    </table>












                </div>
            </div>
        </div>
    </div>
</div>