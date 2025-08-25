<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/science-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/science-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            text-align: left
                        }

                        .tg .tg-pwj7 {
                            background-color: #efefef;
                            border-color: black;

                            text-align: center .tg .tg-0pky {
                                border-color: black;
                                text-align: left;
                                vertical-align: top
                            }

                            .tg .tg-y698 {
                                background-color: #efefef;
                                border-color: black;
                                text-align: left;
                                vertical-align: top
                            }

                            .tg .tg-0lax {
                                border-color: black;
                                text-align: left;
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
                                <td class="tg-pwj7" colspan="8"><b>শুধুমাত্র বিজ্ঞানে অধ্যয়নরত জনশক্তি ও দায়িত্বশীলদের সংখ্যাতাত্ত্বিক হিসাব </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Science_শুধুমাত্র বিজ্ঞানে অধ্যয়নরত জনশক্তি ও দায়িত্বশীলদের সংখ্যাতাত্ত্বিক হিসাব.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">মান </td>
                                <td class="tg-pwj7" colspan="">মোট <br> জনশক্তি </td>
                                <td class="tg-pwj7" colspan="">মাধ্যমিক </td>
                                <td class="tg-pwj7" colspan="">উচ্চ <br> মাধ্যমিক </td>
                                <td class="tg-pwj7" colspan="">স্নাতক ও <br>স্নাতকোত্তর </td>
                                <td class="tg-pwj7" colspan="">মোট <br> দায়িত্বশীল </td>
                                <td class="tg-pwj7" colspan=""> শাখা সভাপতি <br> ও সেক্রেটারি</td>
                                <td class="tg-pwj7" colspan="">শাখা <br> সেক্রেটারিয়েট </td>
                                <td class="tg-pwj7" colspan="">থানা সভাপতি ও <br> সেক্রেটারি </td>

                            </tr>


                            <?php
                                $mem_ssc =  (isset($total_science_only_science_manpower['mem_ssc'])) ? $total_science_only_science_manpower['mem_ssc'] : 0;
                                $mem_hsc =  (isset($total_science_only_science_manpower['mem_hsc'])) ? $total_science_only_science_manpower['mem_hsc'] : 0;
                                $mem_hons =  (isset($total_science_only_science_manpower['mem_hons'])) ? $total_science_only_science_manpower['mem_hons'] : 0;
                                $mem_shakha_shova =  (isset($total_science_only_science_manpower['mem_shakha_shova'])) ? $total_science_only_science_manpower['mem_shakha_shova'] : 0;
                                $mem_shakha_sec =  (isset($total_science_only_science_manpower['mem_shakha_sec'])) ? $total_science_only_science_manpower['mem_shakha_sec'] : 0;
                                $mem_thana_shova =  (isset($total_science_only_science_manpower['mem_thana_shova'])) ? $total_science_only_science_manpower['mem_thana_shova'] : 0;

                                $associate_ssc =  (isset($total_science_only_science_manpower['associate_ssc'])) ? $total_science_only_science_manpower['associate_ssc'] : 0;
                                $associate_hsc =  (isset($total_science_only_science_manpower['associate_hsc'])) ? $total_science_only_science_manpower['associate_hsc'] : 0;
                                $associate_hons =  (isset($total_science_only_science_manpower['associate_hons'])) ? $total_science_only_science_manpower['associate_hons'] : 0;
                                $associate_shakha_shova =  (isset($total_science_only_science_manpower['associate_shakha_shova'])) ? $total_science_only_science_manpower['associate_shakha_shova'] : 0;
                                $associate_shakha_sec =  (isset($total_science_only_science_manpower['associate_shakha_sec'])) ? $total_science_only_science_manpower['associate_shakha_sec'] : 0;
                                $associate_thana_shova =  (isset($total_science_only_science_manpower['associate_thana_shova'])) ? $total_science_only_science_manpower['associate_thana_shova'] : 0;

                                $worker_ssc =  (isset($total_science_only_science_manpower['worker_ssc'])) ? $total_science_only_science_manpower['worker_ssc'] : 0;
                                $worker_hsc =  (isset($total_science_only_science_manpower['worker_hsc'])) ? $total_science_only_science_manpower['worker_hsc'] : 0;
                                $worker_hons =  (isset($total_science_only_science_manpower['worker_hons'])) ? $total_science_only_science_manpower['worker_hons'] : 0;
                                $worker_shakha_shova =  (isset($total_science_only_science_manpower['worker_shakha_shova'])) ? $total_science_only_science_manpower['worker_shakha_shova'] : 0;
                                $worker_shakha_sec =  (isset($total_science_only_science_manpower['worker_shakha_sec'])) ? $total_science_only_science_manpower['worker_shakha_sec'] : 0;
                                $worker_thana_shova =  (isset($total_science_only_science_manpower['worker_thana_shova'])) ? $total_science_only_science_manpower['worker_thana_shova'] : 0;
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $total_man_sod = $mem_ssc + $mem_hsc + $mem_hons  ;?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_ssc; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_hsc; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_hons; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $total_mem = $mem_shakha_shova + $mem_shakha_sec + $mem_thana_shova ;?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_shakha_shova ;?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_shakha_sec ;?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_thana_shova ;?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">সাথী </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $total_man_sat = $associate_ssc + $associate_hsc + $associate_hons  ;?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $associate_ssc ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $associate_hsc ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $associate_hons ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $total_associate = $associate_shakha_shova +
                                                                $associate_shakha_sec + $associate_thana_shova ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $associate_shakha_shova ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $associate_shakha_sec ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $associate_thana_shova ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> কর্মী </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $total_worker = $worker_ssc + $worker_hsc + $worker_hons ; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $worker_ssc; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $worker_hsc; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $worker_hons; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $total_dat_kor = $worker_shakha_shova + $worker_shakha_sec + $worker_thana_shova; ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $worker_shakha_shova ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $worker_shakha_sec ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $worker_thana_shova ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> মোট </td>

                                <td class="tg-0pky  type_2">
                                    <?php echo $total_man_sod + $total_man_sat + $total_worker ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_ssc + $associate_ssc + $worker_ssc) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_hsc + $associate_hsc + $worker_hsc) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_hons + $associate_hons + $worker_hons) ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                    <?php echo ($total_mem + $total_associate + $total_dat_kor) ?>
                                </td>

                                <td class="tg-0pky  type_2">
                                    <?php echo $mem_shakha_shova + $associate_shakha_shova + $worker_shakha_shova ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_shakha_sec + $associate_shakha_sec + $worker_shakha_sec) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($mem_thana_shova + $associate_thana_shova + $worker_thana_shova) ?>
                                </td>
                            </tr>


                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>শাখা বিজ্ঞান সম্পাদক </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Science_শাখা বিজ্ঞান সম্পাদক.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" colspan="2">শাখা বিজ্ঞান সম্পাদক আছেন কিনা? </td>
                                <td class="tg-pwj7" colspan="2">বিজ্ঞান সম্পাদক বিজ্ঞানে অধ্যয়নরত কিনা? </td>
                                <td class="tg-pwj7" colspan="2">বিজ্ঞান বিভাগের মাসিক বৈঠক </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">হ্যাঁ </td>
                                <td class="tg-pwj7" colspan="">না</td>
                                <td class="tg-pwj7" colspan="">হ্যাঁ </td>
                                <td class="tg-pwj7" colspan="">না</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি	</td>
                            </tr>
                            <tr>
                                <td class="tg-0pky" colspan=""> <?php echo $science_biggan_shompadok['shaka_shompadok']; ?>  </td>
                                <td class="tg-0pky" colspan=""> <?php echo $row_total_science_biggan_shompadok -$science_biggan_shompadok['shaka_shompadok']; ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $science_biggan_shompadok['biggan_shompadok']; ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo $row_total_science_biggan_shompadok-$science_biggan_shompadok['biggan_shompadok'] ; ?> </td>


                                <td class="tg-0pky" colspan=""> <?php echo $science_biggan_shompadok['meeting_number']; ?> </td>
                                <td class="tg-0pky" colspan=""> <?php echo  $science_biggan_shompadok['meeting_presence'] ; ?> </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Science_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_central_s=$science_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$science_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$science_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$science_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$science_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$science_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$science_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$science_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>বিজ্ঞান জনশক্তি প্রতিবেদন </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Science_বিজ্ঞান জনশক্তি প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='2'>বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">তালিকা আছে কতজনের</td>
                                <td class="tg-pwj7" colspan="">যোগাযোগ কতবার</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞান সংশ্লিষ্ট বিষয়ে কাজ করতে আগ্রহী এমন জনশক্তি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['interested_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['interested_manpower_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['interested_manpower_jogajog'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞান বিষয়ে বিভিন্ন ম্যাগাজিনে লেখালেখি করেন এমন জনশক্তি
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['lekhalekhi_kore_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['lekhalekhi_kore_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['lekhalekhi_kore_jogajog'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞানক্ষেত্রে জনপ্রিয় হয়েছেন এমন জনশক্তি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['jonopriyo_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['jonopriyo_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['jonopriyo_jogajog'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>বিজ্ঞান সংগঠন হিসেবে কাজ করছেন এমন জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['shongothok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['shongothok_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['shongothok_jogajog'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" colspan='2'>নিজ উদ্যোগে অলিম্পিয়াড,বিজ্ঞান কুইজ,প্রতিযোগিতা আয়োজন করেছেন এমন জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['quiz_ayojon_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['quiz_ayojon_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['quiz_ayojon_jogajog'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'>স্থানীয়, জাতীয় বা আন্তর্জাতিক বিজ্ঞান বিষয়ক প্রতিযোগিতা</td>
                                <td class="tg-y698 type_1">অংশগ্রহণকারী জনশক্তি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['attend_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['attend_manpower_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['attend_manpower_jogajog'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">পুরস্কারপ্রাপ্ত জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $science_manpower_protibedon['puroshkar_prapto_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['puroshkar_prapto_manpower_talika'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $science_manpower_protibedon['puroshkar_prapto_manpower_jogajog'] ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan=""><b>উচ্চশিক্ষা প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Science_উচ্চশিক্ষা প্রতিবেদন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan=''>বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan=''>বিজ্ঞানে উচ্চশিক্ষায় বিদেশে যাওয়ার প্রস্তুতি নিচ্ছেন এমন জনশক্তি</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_high_study_protibedon['hs_prostuti_nicche'] ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan=''>এ বছর বিজ্ঞানে উচ্চশিক্ষায় বিদেশে গমণকারী জনশক্তি</td>
                                <td class="tg-0pky" colspan=""><?php echo $science_high_study_protibedon['hs_gomonkari'] ?></td>
                            </tr>
                        </table>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>