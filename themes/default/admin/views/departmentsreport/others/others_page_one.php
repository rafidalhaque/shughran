<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }
	
	 
     .manpower_link {
    cursor: pointer;
}
</style>




<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'অন্যান্য - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
			
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/others-page-one') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/others-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                </style>
                <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="12"><b>সাংগঠনিক সফর সংক্রান্ত</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_সাংগঠনিক সফর সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">সদস্য সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3">সাথী সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3" >কর্মী সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3">সুধি সমাবেশ</td>
                                <td class="tg-pwj7" rowspan="3">কার্যকারী পরিষদ সদস্য উপস্থিতি ছিলেন কতটি</td>
                                <td class="tg-pwj7" rowspan="3" >কার্যকারী পরিষদ অন্যান্য দায়িত্বশীল উপস্থিতি ছিলেন কতটি </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"  rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7"  colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্য</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>

                               
                            </tr>




                            <tr>
                                <td class="tg-0pky type_1">
                                    <?php echo $shod_shomabesh_num = $other_shang_sofor['shod_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shod_shomabesh_pre = $other_shang_sofor['shod_shomabesh_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($shod_shomabesh_pre!=0 && $shod_shomabesh_num !=0 )?($shod_shomabesh_pre/$shod_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $sathi_shomabesh_num = $other_shang_sofor['sathi_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_shomabesh_pre = $other_shang_sofor['sathi_shomabesh_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($sathi_shomabesh_pre!=0 && $sathi_shomabesh_num !=0 )?($sathi_shomabesh_pre/$sathi_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $kormi_shomabesh_num = $other_shang_sofor['kormi_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $kormi_shomabesh_pre = $other_shang_sofor['kormi_shomabesh_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($kormi_shomabesh_pre!=0 && $kormi_shomabesh_num !=0 )?($kormi_shomabesh_pre/$kormi_shomabesh_num):0?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $shudhi_shomabesh_num = $other_shang_sofor['shudhi_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shudhi_shomabesh_pre = $other_shang_sofor['shudhi_shomabesh_pre'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($shudhi_shomabesh_pre!=0 && $shudhi_shomabesh_num !=0 )?($shudhi_shomabesh_pre/$shudhi_shomabesh_num):0?>
                                </td>
                         
                                <td class="tg-0pky  type_12">
                                    <?php echo $cup_pre_num = $other_shang_sofor['cup_pre_num'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $cup_other_pre_num = $other_shang_sofor['cup_other_pre_num'] ?>
                                </td>
                           
                            </tr>
                        </table>
                        <!-- উপশাখা মজবুতিকরণ সংক্রান্ত Hide this table  -->
                        <table class="tg table table-header-rotated" id="testTable1" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>উপশাখা মজবুতিকরণ সংক্রান্ত</b>
                                </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_উপশাখা মজবুতিকরণ সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">মোট উপশাখা সংখ্যা </td>
                                <td class="tg-pwj7" rowspan="">বর্তমান সক্রিয় উপশাখা</td>
                                <td class="tg-pwj7" rowspan="">দুর্বল উপশাখার মধ্যে এ বছর সক্রিয় হয়েছে কতটি </td>
                                <td class="tg-pwj7" colspan="" >উপশাখা এখনো দুর্বল আছে কতটি</td>
                               
                            </tr>
                            <tr>
                                <td class="tg-0pky type_1">
                                    <?php echo $total_uposakha = $other_uposhakha_mojbuti['total_uposakha'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $bortoman_shokriyo = $other_uposhakha_mojbuti['bortoman_shokriyo'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $durbol_shokriyou_hoyeche = $other_uposhakha_mojbuti['durbol_shokriyou_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo $durbol_ache = $other_uposhakha_mojbuti['durbol_ache'] ?>
                                </td>
                              
                            </tr>
                        
                        </table>
                        
                </div>
            </div>
        </div>
    </div>
</div>
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
        text-align: left
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
        text-align: center
    }
    .tg .tg-0pky {
        border-color: black;
        text-align: center;
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