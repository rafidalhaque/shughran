<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'অন্যান্য - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            
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

            <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
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
<style type="text/css">
    #export_all_table{
        cursor: pointer;
    }
</style>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                        <!-- এক নজরে সপ্তাহ, পক্ষ ও দশক পালনের রিপোর্ট Hide this table  -->
                        <table class="tg table table-header-rotated" id="testTable1" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>এক নজরে সপ্তাহ, পক্ষ ও দশক পালনের রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Other_এক নজরে সপ্তাহ, পক্ষ ও দশক পালনের রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ক্রম</td>
                                <td class="tg-pwj7" rowspan="">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">হয়েছে কিনা?</td>
                                <td class="tg-pwj7" rowspan="" >না হলে তার কারণ কী?</td>
                               
                            </tr>
                          
                            <?php
                                $pk = (isset($other_shopta_doshok_pokkho_palon['id']))?$other_shopta_doshok_pokkho_palon['id']:'';
                            ?>

                            <tr>
                                <td class="tg-pwj7" colspan="">১.</td>
                                <td class="tg-pwj7" colspan="">Online দাওয়াতি দশক</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="online_dawati_d_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="online_dawati_d_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="online_dawati_d_karon" data-title="Enter">
                                        <?php echo $online_dawati_d_karon =  (isset($other_shopta_doshok_pokkho_palon['online_dawati_d_karon'])) ? $other_shopta_doshok_pokkho_palon['online_dawati_d_karon'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">২.</td>
                                <td class="tg-pwj7" colspan="">কওমি ও হাফেজি মাদরাসা দাওয়াতি সপ্তাহ</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="kawmi_hafeji_dawat_w_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="kawmi_hafeji_dawat_w_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kawmi_hafeji_dawat_w_karon" data-title="Enter">
                                        <?php echo $kawmi_hafeji_dawat_w_karon =  (isset($other_shopta_doshok_pokkho_palon['kawmi_hafeji_dawat_w_karon'])) ? $other_shopta_doshok_pokkho_palon['kawmi_hafeji_dawat_w_karon'] : 0; ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৩.</td>
                                <td class="tg-pwj7" colspan="">স্কুল দাওয়াতি পক্ষ</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="school_dawat_p_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="school_dawat_p_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_dawat_p_karon" data-title="Enter">
                                        <?php echo $school_dawat_p_karon =  (isset($other_shopta_doshok_pokkho_palon['school_dawat_p_karon'])) ? $other_shopta_doshok_pokkho_palon['school_dawat_p_karon'] : 0; ?>
                                    </a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৪.</td>
                                <td class="tg-pwj7" colspan="">বিশ্ববিদ্যালয় ও অনার্স কলেজ  দাওয়াতি দশক</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="uni_col_dawat_d_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="uni_col_dawat_d_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uni_col_dawat_d_karon" data-title="Enter">
                                        <?php echo $uni_col_dawat_d_karon =  (isset($other_shopta_doshok_pokkho_palon['uni_col_dawat_d_karon'])) ? $other_shopta_doshok_pokkho_palon['uni_col_dawat_d_karon'] : 0; ?>
                                    </a>
                                </td>
                              
                            </tr>
                            
                            <tr>
                                <td class="tg-pwj7" colspan="">৫.</td>
                                <td class="tg-pwj7" colspan="">উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি দশক</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="diploma_dawat_d_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="diploma_dawat_d_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="diploma_dawat_d_karon" data-title="Enter">
                                        <?php echo $diploma_dawat_d_karon =  (isset($other_shopta_doshok_pokkho_palon['diploma_dawat_d_karon'])) ? $other_shopta_doshok_pokkho_palon['diploma_dawat_d_karon'] : 0; ?>
                                    </a>
                                </td>
                   
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৬.</td>
                                <td class="tg-pwj7" colspan="">সাংস্কৃতিক দাওয়াতি সপ্তাহ</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="culture_dawat_w_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="culture_dawat_w_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="culture_dawat_w_karon" data-title="Enter">
                                        <?php echo $culture_dawat_w_karon =  (isset($other_shopta_doshok_pokkho_palon['culture_dawat_w_karon'])) ? $other_shopta_doshok_pokkho_palon['culture_dawat_w_karon'] : 0; ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৭.</td>
                                <td class="tg-pwj7" colspan="">সাধারণ দাওয়াতি পক্ষ</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="shadharon_dawat_p_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="shadharon_dawat_p_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shadharon_dawat_p_karon" data-title="Enter">
                                        <?php echo $shadharon_dawat_p_karon =  (isset($other_shopta_doshok_pokkho_palon['shadharon_dawat_p_karon'])) ? $other_shopta_doshok_pokkho_palon['shadharon_dawat_p_karon'] : 0; ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">৮.</td>
                                <td class="tg-pwj7" colspan="">অন্যান্য ধর্মাবলম্বী দাওয়াতি সপ্তাহ</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="onno_dhormo_dawat_w_hoyeche" data-idname="" data-type="select" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="onno_dhormo_dawat_w_hoyeche@other_shopta_doshok_pokkho_palon" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_shopta_doshok_pokkho_palon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="onno_dhormo_dawat_w_karon" data-title="Enter">
                                        <?php echo $onno_dhormo_dawat_w_karon =  (isset($other_shopta_doshok_pokkho_palon['onno_dhormo_dawat_w_karon'])) ? $other_shopta_doshok_pokkho_palon['onno_dhormo_dawat_w_karon'] : 0; ?>
                                    </a>
                                </td>
                               
                            </tr>
                        
                        </table>
                       <!-- আউটপুট পরিকল্পনা গ্রহণ সংক্রান্ত Hide the table -->
                       <table class="tg table table-header-rotated" id="testTable2" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>আউটপুট পরিকল্পনা গ্রহণ সংক্রান্ত</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Other_আউটপুট পরিকল্পনা গ্রহণ সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-pwj7" rowspan="">ক্রম</td>
                                <td class="tg-pwj7" rowspan="">ধরণ</td>
                                <td class="tg-pwj7" colspan="">হয়েছে কিনা?</td>
                                <td class="tg-pwj7" rowspan="" >না হলে তার কারণ কী?</td>
                               
                            </tr>
                            <?php
                                $pk = (isset($other_output_plan['id']))?$other_output_plan['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">১.</td>
                                <td class="tg-pwj7" colspan="">একাডেমিক আউটপুট</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="academic_output_hoyeche" data-idname="" data-type="select" data-table="other_output_plan" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="academic_output_hoyeche@other_output_plan" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_output_plan" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_output_karon" data-title="Enter">
                                        <?php echo $academic_output_karon =  (isset($other_output_plan['academic_output_karon'])) ? $other_output_plan['academic_output_karon'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">২.</td>
                                <td class="tg-pwj7" colspan="">প্রফেশনাল আউটপুট</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" id="pro_output_hoyeche" data-idname="" data-type="select" data-table="other_output_plan" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id); ?>" data-name="pro_output_hoyeche@other_output_plan" data-title="Online দাওয়াতি দশক হয়েছে কিনা?">
                                       
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="text" data-table="other_output_plan" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pro_output_karon" data-title="Enter">
                                        <?php echo $pro_output_karon =  (isset($other_output_plan['pro_output_karon'])) ? $other_output_plan['pro_output_karon'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                        
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>ছাত্র সংসদ নির্বাচন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Other_ছাত্র সংসদ নির্বাচন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-other-chatro-sonshod/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ক্রম</td>
                                
                                <td class="tg-pwj7" rowspan="">প্রতিষ্ঠানের নাম </td>
                                <td class="tg-pwj7" rowspan="">একক নির্বাচন</td>
                                <td class="tg-pwj7" rowspan="">ঐক্যবদ্ধ নির্বাচন</td>
                                <td class="tg-pwj7" rowspan="">কতটি পদে অংশগ্রহণ</td>
                                <td class="tg-pwj7" colspan="" >বিজয় (কয়টি)</td>
                                <td class="tg-pwj7" rowspan="" >Acttions</td>
                               
                            </tr>
                            <?php 
                                $i=0;
                            foreach($other_chatro_sonshod->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                   
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
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-other-chatro-sonshod/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@other_chatro_sonshod@".$row['name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-izx2{border-color:black;background-color:#efefef;}
.tg .tg-pwj7{background-color:#efefef;border-color:black;}
.tg .tg-0pky{border-color:black;vertical-align:top}
.tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
.tg .tg-0lax{border-color:black;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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
 .table-header-rotated td.rotate > div {
  -webkit-transform: translate(10px, 51px) rotate(270deg);
          transform: translate(10px, 51px) rotate(270deg);
  width: 20px;
}
 .table-header-rotated td.rotate > div > span {
   
  padding: 5px 10px;
}
.table-header-rotated td.row-header {
  padding: 0 10px;
  border-bottom: 1px solid #ccc;
}
.table > tbody > tr > td {
	border: 1px solid #ccc;
}
.action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>

$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.fn.editable.defaults.ajaxOptions = {type: "get"}
$('#online_dawati_d_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['online_dawati_d_hoyeche']))? $other_shopta_doshok_pokkho_palon['online_dawati_d_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    },
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
});

$('#kawmi_hafeji_dawat_w_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['kawmi_hafeji_dawat_w_hoyeche']))? $other_shopta_doshok_pokkho_palon['kawmi_hafeji_dawat_w_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

$('#school_dawat_p_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['school_dawat_p_hoyeche']))? $other_shopta_doshok_pokkho_palon['school_dawat_p_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#uni_col_dawat_d_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['uni_col_dawat_d_hoyeche']))? $other_shopta_doshok_pokkho_palon['uni_col_dawat_d_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#madrasah_dawat_d_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['madrasah_dawat_d_hoyeche']))? $other_shopta_doshok_pokkho_palon['madrasah_dawat_d_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#diploma_dawat_d_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['diploma_dawat_d_hoyeche']))? $other_shopta_doshok_pokkho_palon['diploma_dawat_d_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#culture_dawat_w_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['culture_dawat_w_hoyeche']))? $other_shopta_doshok_pokkho_palon['culture_dawat_w_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#shadharon_dawat_p_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['shadharon_dawat_p_hoyeche']))? $other_shopta_doshok_pokkho_palon['shadharon_dawat_p_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#onno_dhormo_dawat_w_hoyeche').editable({
    value: <?php echo (isset( $other_shopta_doshok_pokkho_palon['onno_dhormo_dawat_w_hoyeche']))? $other_shopta_doshok_pokkho_palon['onno_dhormo_dawat_w_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#academic_output_hoyeche').editable({
    value: <?php echo (isset( $other_output_plan['academic_output_hoyeche']))? $other_output_plan['academic_output_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});
$('#pro_output_hoyeche').editable({
    value: <?php echo (isset( $other_output_plan['pro_output_hoyeche']))? $other_output_plan['pro_output_hoyeche']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

});

</script>
<script>

$(document).ready(function(){	
  $("button").on('click',function(){
      console.log("ok");
    var id=$(this).attr('id').split("@");
    var close_tr=$(this).closest('tr');
    if(id[0]=='delete' && confirm("আপনি কি কলামটি মুছে ফেলবেন?" ))
    {
        $.ajax({
        type: "GET",
        token: "<?php echo $this->security->get_csrf_token_name(); ?>",
        url:  "<?php echo admin_url('departmentsreport/delete-row') ?>",
        data: {
            'id':id[3],
            'table':id[1]
        },
        cache: false,
        success: function(data){
            console.log(data);
           close_tr.remove();
        }
        });
    }
    
  });
});

</script>
