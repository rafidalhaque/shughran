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
                class="fa-fw fa fa-barcode"></i><?= 'অন্যান্য - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/others-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/others-page-four') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/others-page-four/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <!-- এক নজরে সপ্তাহ, পক্ষ ও দশক পালনের রিপোর্ট Hide this table  -->
                <table class="tg table table-header-rotated" id="testTable1" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>এক নজরে সপ্তাহ, পক্ষ ও দশক পালনের রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_এক নজরে সপ্তাহ, পক্ষ ও দশক পালনের রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                                <td class="tg-pwj7" colspan="2">হয়েছে কিনা?</td>
                                
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">হ্যাঁ</td>
                                <td class="tg-pwj7" rowspan="">না</td> 
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">১.</td>
                                <td class="tg-pwj7" colspan="">Online দাওয়াতি দশক</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $online_dawati_d_hoyeche = $other_shopta_doshok_pokkho_palon['online_dawati_d_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['online_dawati_d_hoyeche']) ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">২.</td>
                                <td class="tg-pwj7" colspan="">কওমি ও হাফেজি মাদরাসা দাওয়াতি সপ্তাহ</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $kawmi_hafeji_dawat_w_hoyeche = $other_shopta_doshok_pokkho_palon['kawmi_hafeji_dawat_w_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['kawmi_hafeji_dawat_w_hoyeche']) ?>
                                </td>
                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৩.</td>
                                <td class="tg-pwj7" colspan="">স্কুল দাওয়াতি পক্ষ</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $school_dawat_p_hoyeche = $other_shopta_doshok_pokkho_palon['school_dawat_p_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['school_dawat_p_hoyeche']) ?>
                                </td>
                   
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৪.</td>
                                <td class="tg-pwj7" colspan="">বিশ্ববিদ্যালয় ও অনার্স কলেজ  দাওয়াতি দশক</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $uni_col_dawat_d_hoyeche = $other_shopta_doshok_pokkho_palon['uni_col_dawat_d_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['uni_col_dawat_d_hoyeche']) ?>
                                </td>
          
                            </tr>
                           
                            <tr>
                                <td class="tg-pwj7" colspan="">৫.</td>
                                <td class="tg-pwj7" colspan="">উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি দশক</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $diploma_dawat_d_hoyeche = $other_shopta_doshok_pokkho_palon['diploma_dawat_d_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['diploma_dawat_d_hoyeche']) ?>
                                </td>
 
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৬.</td>
                                <td class="tg-pwj7" colspan="">সাংস্কৃতিক দাওয়াতি সপ্তাহ</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $culture_dawat_w_hoyeche = $other_shopta_doshok_pokkho_palon['culture_dawat_w_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['culture_dawat_w_hoyeche']) ?>
                                </td>
 
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৭.</td>
                                <td class="tg-pwj7" colspan="">সাধারণ দাওয়াতি পক্ষ</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $shadharon_dawat_p_hoyeche = $other_shopta_doshok_pokkho_palon['shadharon_dawat_p_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['shadharon_dawat_p_hoyeche']) ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৮.</td>
                                <td class="tg-pwj7" colspan="">অন্যান্য ধর্মাবলম্বী দাওয়াতি সপ্তাহ</td>
                                 <td class="tg-0pky type_1">
                                    <?php echo $onno_dhormo_dawat_w_hoyeche = $other_shopta_doshok_pokkho_palon['onno_dhormo_dawat_w_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_shopta_doshok_pokkho_palon - $other_shopta_doshok_pokkho_palon['onno_dhormo_dawat_w_hoyeche']) ?>
                                </td>

                            </tr>                        
                        </table>
                        <!-- আউটপুট পরিকল্পনা গ্রহণ সংক্রান্ত Hide the table -->
                        <table class="tg table table-header-rotated" id="testTable2" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>আউটপুট পরিকল্পনা গ্রহণ সংক্রান্ত</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Other_আউটপুট পরিকল্পনা গ্রহণ সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-pwj7" rowspan="2">ক্রম</td>
                                <td class="tg-pwj7" rowspan="2">ধরণ</td>
                                <td class="tg-pwj7" colspan="2">হয়েছে কিনা?</td>
                               
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">হ্যাঁ</td>
                                <td class="tg-pwj7" rowspan="">না</td> 
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">১.</td>
                                <td class="tg-pwj7" colspan="">একাডেমিক আউটপুট</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $academic_output_hoyeche = $other_output_plan['academic_output_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_output_plan - $other_output_plan['academic_output_hoyeche']) ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">২.</td>
                                <td class="tg-pwj7" colspan="">প্রফেশনাল আউটপুট</td>
                                <td class="tg-0pky type_1">
                                    <?php echo $pro_output_hoyeche = $other_output_plan['pro_output_hoyeche'] ?>
                                </td>
                                <td class="tg-0pky type_1">
                                    <?php echo ($row_other_output_plan - $other_output_plan['pro_output_hoyeche']) ?>
                                </td>

                            </tr>
                        
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>ছাত্র সংসদ নির্বাচন</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Other_ছাত্র সংসদ নির্বাচন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ক্রম</td>
                                <td class="tg-pwj7" rowspan="">শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan="">প্রতিষ্ঠানের নাম </td>
                                <td class="tg-pwj7" rowspan="">একক নির্বাচন</td>
                                <td class="tg-pwj7" rowspan="">ঐক্যবদ্ধ নির্বাচন</td>
                                <td class="tg-pwj7" rowspan="">কতটি পদে অংশগ্রহণ</td>
                                <td class="tg-pwj7" colspan="" >বিজয় (কয়টি)</td>
                                
                               
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_chatro_sonshod->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['sin_election'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['comb_election'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['attend_poth_s'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['gain_s'] ?>       
                                    </td>
                                
                                </tr>

                        <?php } ?>
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