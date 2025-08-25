<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'ব্যবসায় শিক্ষা বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
    
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
<!-- ====== Report serial code ======= --> 
<?php 
// This function renders a department report form with serial number information
// based on the branch, report, department, and user roles provided.
render_dept_report_serial_form($branch_id, $report_info, $department_id, $serial_info, $this->Owner, $this->Admin, $this->departmentuser); 
?>
<!-- ====== /. Report serial code ===== -->

            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">

                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan=""><b>ব্যবসায় শিক্ষা কমিটি</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Business_ব্যবসায় শিক্ষা কমিটি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <?php
                            $pk = (isset($business_studies['id']))?$business_studies['id']:'';
                            ?>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>শাখায় ব্যবসায় শিক্ষা সম্পাদক আছে কি? </span></div></td>
                            <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  id="shikkha_shompadok" data-idname=""   data-type="select" data-table="business_studies" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" data-name="shikkha_shompadok@business_studies" data-title="শাখায় ব্যবসায় শিক্ষা সম্পাদক আছে কি?">
                                </a>
                            </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>ব্যবসায় শিক্ষায় ও অর্থনীতিতে অধ্যয়নরত জনশক্তিদের সংখ্যাতাত্ত্বিক হিসাব</b> </td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Business_ব্যবসায় শিক্ষায় ও অর্থনীতিতে অধ্যয়নরত জনশক্তিদের সংখ্যাতাত্বিক হিসাব_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>

                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>মান </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 " colspan="4"><div><span>ব্যবসায় শিক্ষা</span></div></td>
                                <td class="tg-pwj7 " colspan="2"><div><span>অর্থনীতি  </span></div></td>
                                <td class="tg-pwj7" rowspan="2">এ বছরে মানোন্নয়ন  </td>
                   
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span> মাধ্যমিক</span></div></td>
                                <td class="tg-pwj7 "><div><span> উচ্চমাধ্যমিক</span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতক   </span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতকোত্তর</span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতক   </span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতকোত্তর</span></div></td>
                        
                               
                            </tr>

                            <?php
                            $pk = (isset($business_studies_manpower['id']))?$business_studies_manpower['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_total" data-title="Enter"><?php echo $member_total =  (isset( $business_studies_manpower['member_total']))? $business_studies_manpower['member_total']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_bs_maddhomik" data-title="Enter"><?php echo $member_bs_maddhomik =  (isset( $business_studies_manpower['member_bs_maddhomik']))? $business_studies_manpower['member_bs_maddhomik']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_bs_uccho_maddhomik" data-title="Enter"><?php echo $member_bs_uccho_maddhomik =  (isset( $business_studies_manpower['member_bs_uccho_maddhomik']))? $business_studies_manpower['member_bs_uccho_maddhomik']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_bs_snatok" data-title="Enter"><?php echo $member_bs_snatok =  (isset( $business_studies_manpower['member_bs_snatok']))? $business_studies_manpower['member_bs_snatok']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_bs_snatokottor" data-title="Enter"><?php echo $member_bs_snatokottor =  (isset( $business_studies_manpower['member_bs_snatokottor']))? $business_studies_manpower['member_bs_snatokottor']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_orthoniti_snatok" data-title="Enter"><?php echo $member_orthoniti_snatok =  (isset( $business_studies_manpower['member_orthoniti_snatok']))? $business_studies_manpower['member_orthoniti_snatok']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_orthoniti_snatokottor" data-title="Enter"><?php echo $member_orthoniti_snatokottor =  (isset( $business_studies_manpower['member_orthoniti_snatokottor']))? $business_studies_manpower['member_orthoniti_snatokottor']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="member_ebochore" data-title="Enter"><?php echo $member_ebochore =  (isset( $business_studies_manpower['member_ebochore']))? $business_studies_manpower['member_ebochore']:0; ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_total" data-title="Enter"><?php echo $sathi_total =  (isset( $business_studies_manpower['sathi_total']))? $business_studies_manpower['sathi_total']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bs_maddhomik" data-title="Enter"><?php echo $sathi_bs_maddhomik =  (isset( $business_studies_manpower['sathi_bs_maddhomik']))? $business_studies_manpower['sathi_bs_maddhomik']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bs_uccho_maddhomik" data-title="Enter"><?php echo $sathi_bs_uccho_maddhomik =  (isset( $business_studies_manpower['sathi_bs_uccho_maddhomik']))? $business_studies_manpower['sathi_bs_uccho_maddhomik']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bs_snatok" data-title="Enter"><?php echo $sathi_bs_snatok =  (isset( $business_studies_manpower['sathi_bs_snatok']))? $business_studies_manpower['sathi_bs_snatok']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bs_snatokottor" data-title="Enter"><?php echo $sathi_bs_snatokottor =  (isset( $business_studies_manpower['sathi_bs_snatokottor']))? $business_studies_manpower['sathi_bs_snatokottor']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_orthoniti_snatok" data-title="Enter"><?php echo $sathi_orthoniti_snatok =  (isset( $business_studies_manpower['sathi_orthoniti_snatok']))? $business_studies_manpower['sathi_orthoniti_snatok']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_orthoniti_snatokottor" data-title="Enter"><?php echo $sathi_orthoniti_snatokottor =  (isset( $business_studies_manpower['sathi_orthoniti_snatokottor']))? $business_studies_manpower['sathi_orthoniti_snatokottor']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_ebochore" data-title="Enter"><?php echo $sathi_ebochore =  (isset( $business_studies_manpower['sathi_ebochore']))? $business_studies_manpower['sathi_ebochore']:0; ?></a>
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_total" data-title="Enter"><?php echo $kormi_total =  (isset( $business_studies_manpower['kormi_total']))? $business_studies_manpower['kormi_total']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bs_maddhomik" data-title="Enter"><?php echo $kormi_bs_maddhomik =  (isset( $business_studies_manpower['kormi_bs_maddhomik']))? $business_studies_manpower['kormi_bs_maddhomik']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bs_uccho_maddhomik" data-title="Enter"><?php echo $kormi_bs_uccho_maddhomik =  (isset( $business_studies_manpower['kormi_bs_uccho_maddhomik']))? $business_studies_manpower['kormi_bs_uccho_maddhomik']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bs_snatok" data-title="Enter"><?php echo $kormi_bs_snatok =  (isset( $business_studies_manpower['kormi_bs_snatok']))? $business_studies_manpower['kormi_bs_snatok']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bs_snatokottor" data-title="Enter"><?php echo $kormi_bs_snatokottor =  (isset( $business_studies_manpower['kormi_bs_snatokottor']))? $business_studies_manpower['kormi_bs_snatokottor']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_orthoniti_snatok" data-title="Enter"><?php echo $kormi_orthoniti_snatok =  (isset( $business_studies_manpower['kormi_orthoniti_snatok']))? $business_studies_manpower['kormi_orthoniti_snatok']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_orthoniti_snatokottor" data-title="Enter"><?php echo $kormi_orthoniti_snatokottor =  (isset( $business_studies_manpower['kormi_orthoniti_snatokottor']))? $business_studies_manpower['kormi_orthoniti_snatokottor']:0; ?></a>
                                </td>
                                
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_ebochore" data-title="Enter"><?php echo $kormi_ebochore =  (isset( $business_studies_manpower['kormi_ebochore']))? $business_studies_manpower['kormi_ebochore']:0; ?></a>
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_total +  $sathi_total +  $kormi_total) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_maddhomik +  $sathi_bs_maddhomik +  $kormi_bs_maddhomik) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_uccho_maddhomik +  $sathi_bs_uccho_maddhomik +  $kormi_bs_uccho_maddhomik) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_snatok +  $sathi_bs_snatok +  $kormi_bs_snatok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_snatokottor +  $sathi_bs_snatokottor +  $kormi_bs_snatokottor) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_orthoniti_snatok +  $sathi_orthoniti_snatok +  $kormi_orthoniti_snatok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_orthoniti_snatokottor +  $sathi_orthoniti_snatokottor +  $kormi_orthoniti_snatokottor) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_ebochore +  $sathi_ebochore +  $kormi_ebochore) ?>
                                </td>
                            
                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Business_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($business_studies_training_program['id']))?$business_studies_training_program['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $business_studies_training_program['shikkha_central_s']))? $business_studies_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $business_studies_training_program['shikkha_central_p']))? $business_studies_training_program['shikkha_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                          {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $business_studies_training_program['shikkha_shakha_s']))? $business_studies_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $business_studies_training_program['shikkha_shakha_p']))? $business_studies_training_program['shikkha_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                          {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $business_studies_training_program['kormoshala_central_s']))? $business_studies_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $business_studies_training_program['kormoshala_central_p']))? $business_studies_training_program['kormoshala_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                          {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $business_studies_training_program['kormoshala_shakha_s']))? $business_studies_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="business_studies_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $business_studies_training_program['kormoshala_shakha_p']))? $business_studies_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                          {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                  </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>তালিকা সম্পর্কিত </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Business_তালিকা সম্পর্কিত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7" >মোট সংখ্যা </td>
                                <td class="tg-pwj7" > কর্মী </td>
                                <td class="tg-pwj7" > সাথী  </td>
                                <td class="tg-pwj7">সদস্য  </td>
                                <td class="tg-pwj7"  >তালিকা আছে কতজনের  </td>
                                
                            </tr>
                            <?php
                            $pk = (isset($business_studies_talika['id']))?$business_studies_talika['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায় শিক্ষা বিষয়ে বিভিন্ন ম্যাগাজিনে লেখালেখি করেন এমন জনশক্তি </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bebsha_shikkha_total" data-title="Enter"><?php echo $bebsha_shikkha_total =  (isset( $business_studies_talika['bebsha_shikkha_total']))? $business_studies_talika['bebsha_shikkha_total']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bebsha_shikkha_kormi" data-title="Enter"><?php echo $bebsha_shikkha_kormi =  (isset( $business_studies_talika['bebsha_shikkha_kormi']))? $business_studies_talika['bebsha_shikkha_kormi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bebsha_shikkha_sathi" data-title="Enter"><?php echo $bebsha_shikkha_sathi =  (isset( $business_studies_talika['bebsha_shikkha_sathi']))? $business_studies_talika['bebsha_shikkha_sathi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bebsha_shikkha_shodossho" data-title="Enter"><?php echo $bebsha_shikkha_shodossho =  (isset( $business_studies_talika['bebsha_shikkha_shodossho']))? $business_studies_talika['bebsha_shikkha_shodossho']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bebsha_shikkha_talika_kotojoner" data-title="Enter"><?php echo $bebsha_shikkha_talika_kotojoner =  (isset( $business_studies_talika['bebsha_shikkha_talika_kotojoner']))? $business_studies_talika['bebsha_shikkha_talika_kotojoner']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">স্থানীয়, জাতীয় বা আন্তর্জাতিক ব্যবসায় শিক্ষা বিষয়ক প্রতিযোগিতায় পুরস্কার প্রাপ্ত অথবা অংশগ্রহণকারী জনশক্তি </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthanio_jatio_total" data-title="Enter"><?php echo $sthanio_jatio_total =  (isset( $business_studies_talika['sthanio_jatio_total']))? $business_studies_talika['sthanio_jatio_total']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthanio_jatio_kormi" data-title="Enter"><?php echo $sthanio_jatio_kormi =  (isset( $business_studies_talika['sthanio_jatio_kormi']))? $business_studies_talika['sthanio_jatio_kormi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthanio_jatio_sathi" data-title="Enter"><?php echo $sthanio_jatio_sathi =  (isset( $business_studies_talika['sthanio_jatio_sathi']))? $business_studies_talika['sthanio_jatio_sathi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthanio_jatio_shodossho" data-title="Enter"><?php echo $sthanio_jatio_shodossho =  (isset( $business_studies_talika['sthanio_jatio_shodossho']))? $business_studies_talika['sthanio_jatio_shodossho']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthanio_jatio_talika_kotojoner" data-title="Enter"><?php echo $sthanio_jatio_talika_kotojoner =  (isset( $business_studies_talika['sthanio_jatio_talika_kotojoner']))? $business_studies_talika['sthanio_jatio_talika_kotojoner']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজনেস উদ্যোক্তা হতে আগ্রহী এমন জনশক্তি </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="business_uddokta_total" data-title="Enter"><?php echo $business_uddokta_total =  (isset( $business_studies_talika['business_uddokta_total']))? $business_studies_talika['business_uddokta_total']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="business_uddokta_kormi" data-title="Enter"><?php echo $business_uddokta_kormi =  (isset( $business_studies_talika['business_uddokta_kormi']))? $business_studies_talika['business_uddokta_kormi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="business_uddokta_sathi" data-title="Enter"><?php echo $business_uddokta_sathi =  (isset( $business_studies_talika['business_uddokta_sathi']))? $business_studies_talika['business_uddokta_sathi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="business_uddokta_shodossho" data-title="Enter"><?php echo $business_uddokta_shodossho =  (isset( $business_studies_talika['business_uddokta_shodossho']))? $business_studies_talika['business_uddokta_shodossho']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="business_uddokta_talika_kotojoner" data-title="Enter"><?php echo $business_uddokta_talika_kotojoner =  (isset( $business_studies_talika['business_uddokta_talika_kotojoner']))? $business_studies_talika['business_uddokta_talika_kotojoner']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবীদ হতে আগ্রহী এমন জনশক্তি </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthoniti_bid_total" data-title="Enter"><?php echo $orthoniti_bid_total =  (isset( $business_studies_talika['orthoniti_bid_total']))? $business_studies_talika['orthoniti_bid_total']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthoniti_bid_kormi" data-title="Enter"><?php echo $orthoniti_bid_kormi =  (isset( $business_studies_talika['orthoniti_bid_kormi']))? $business_studies_talika['orthoniti_bid_kormi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthoniti_bid_sathi" data-title="Enter"><?php echo $orthoniti_bid_sathi =  (isset( $business_studies_talika['orthoniti_bid_sathi']))? $business_studies_talika['orthoniti_bid_sathi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthoniti_bid_shodossho" data-title="Enter"><?php echo $orthoniti_bid_shodossho =  (isset( $business_studies_talika['orthoniti_bid_shodossho']))? $business_studies_talika['orthoniti_bid_shodossho']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_talika" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthoniti_bid_talika_kotojoner" data-title="Enter"><?php echo $orthoniti_bid_talika_kotojoner =  (isset( $business_studies_talika['orthoniti_bid_talika_kotojoner']))? $business_studies_talika['orthoniti_bid_talika_kotojoner']:0; ?></a>
                                </td>
                            </tr>

                        </table>
                        
                        <table class="tg table table-header-rotated" id="testTable4">
                    <tr>
                        <td class="tg-pwj7" colspan=""><b>উচ্চশিক্ষা সম্পর্কিত </b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Business_উচ্চশিক্ষা সম্পর্কিত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7 " ><div><span>ব্যবসায় শিক্ষায় উচ্চশিক্ষার্থে বিদেশে যাওয়ার প্রস্তুতি নিচ্ছেন এমন জনশক্তি সংখ্যা </span></div></td>
                    <td class="tg-pwj7 "><div><span> এ বছর ব্যবসায় শিক্ষায় উচ্চশিক্ষার্থে বিদেশে গমণকারী জনশক্তি সংখ্যা </span></div></td>
                    <?php
                            $pk = (isset($business_studies_high_study_shomporkito['id']))?$business_studies_high_study_shomporkito['id']:'';
                            ?>
                    <tr>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_high_study_shomporkito" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="high_study_prep" data-title="Enter"><?php echo $high_study_prep =  (isset( $business_studies_high_study_shomporkito['high_study_prep']))? $business_studies_high_study_shomporkito['high_study_prep']:0; ?></a>
                    </td>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_high_study_shomporkito" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="high_study_gomon" data-title="Enter"><?php echo $high_study_gomon =  (isset( $business_studies_high_study_shomporkito['high_study_gomon']))? $business_studies_high_study_shomporkito['high_study_gomon']:0; ?></a>
                    </td>
                    </tr>
                </table>

                <table class="tg table table-header-rotated" id="testTable5">
                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>বিজনেস ক্লাব সংক্রান্ত  </b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Business_বিজনেস ক্লাব সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7 " ><div><span>আমাদের নিয়ন্ত্রণাধীন বিজনেস ক্লাব সংখ্যা	 </span></div></td>
                    <td class="tg-pwj7 "><div><span>কমিটি আছে কতটিতে? </span></div></td>
                    <td class="tg-pwj7 " ><div><span>ক্লাবের সদস্য সংখ্যা	 	 </span></div></td>
                    <td class="tg-pwj7 "><div><span>অন্যান্য কতটি ক্লাবে জনশক্তি আছে?</span></div></td>
                    <td class="tg-pwj7 " ><div><span>কতজন জনশক্তি সংযুক্ত আছে? 	 </span></div></td>
                    <?php
                            $pk = (isset($business_studies_business_club['id']))?$business_studies_business_club['id']:'';
                            ?>
                    
                    <tr>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_business_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="amader_niyontrone" data-title="Enter"><?php echo $amader_niyontrone =  (isset( $business_studies_business_club['amader_niyontrone']))? $business_studies_business_club['amader_niyontrone']:0; ?></a>
                    </td>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_business_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="committe_ache" data-title="Enter"><?php echo $committe_ache =  (isset( $business_studies_business_club['committe_ache']))? $business_studies_business_club['committe_ache']:0; ?></a>
                    </td>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_business_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="club_mem" data-title="Enter"><?php echo $club_mem =  (isset( $business_studies_business_club['club_mem']))? $business_studies_business_club['club_mem']:0; ?></a>
                    </td>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_business_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onno_club_e_manpower" data-title="Enter"><?php echo $onno_club_e_manpower =  (isset( $business_studies_business_club['onno_club_e_manpower']))? $business_studies_business_club['onno_club_e_manpower']:0; ?></a>
                    </td>
                    <td class="tg-0pky  type_9">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_business_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kotojon_manpower" data-title="Enter"><?php echo $kotojon_manpower =  (isset( $business_studies_business_club['kotojon_manpower']))? $business_studies_business_club['kotojon_manpower']:0; ?></a>
                    </td>
                    </tr>
                </table>
                <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>কয়েকটি বিশেষ প্রোগ্রামের রিপোর্ট  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Business_কয়েকটি বিশেষ প্রোগ্রামের রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7" >কতটি বাস্তবায়িত হয়েছে </td>
                                <td class="tg-pwj7" > উপস্থিতি </td>
                                <td class="tg-pwj7" > মন্তব্য </td>
                            </tr>
                            <?php
                            $pk = (isset($business_studies_bishesh_program['id']))?$business_studies_bishesh_program['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1">ক্যারিয়ার গাইডলাইন প্রোগ্রাম (একাডেমিক, প্রফেশনাল, বিদেশে উচ্চশিক্ষা)</td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="career_guidleline_pro_num" data-title="Enter"><?php echo $career_guidleline_pro_num =  (isset( $business_studies_bishesh_program['career_guidleline_pro_num']))? $business_studies_bishesh_program['career_guidleline_pro_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="career_guidleline_pro_pre" data-title="Enter"><?php echo $career_guidleline_pro_pre =  (isset( $business_studies_bishesh_program['career_guidleline_pro_pre']))? $business_studies_bishesh_program['career_guidleline_pro_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="career_guidleline_pro_com" data-title="Enter"><?php echo $career_guidleline_pro_com =  (isset( $business_studies_bishesh_program['career_guidleline_pro_com']))? $business_studies_bishesh_program['career_guidleline_pro_com']:0; ?></a>
                                </td>
                                
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায় শিক্ষা বিষয়ক কুইজ প্রতিযোগিতা (স্কুল-বিশ্ববিদ্যালয়) </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_stu_quiz_num" data-title="Enter"><?php echo $bus_stu_quiz_num =  (isset( $business_studies_bishesh_program['bus_stu_quiz_num']))? $business_studies_bishesh_program['bus_stu_quiz_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_stu_quiz_pre" data-title="Enter"><?php echo $bus_stu_quiz_pre =  (isset( $business_studies_bishesh_program['bus_stu_quiz_pre']))? $business_studies_bishesh_program['bus_stu_quiz_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_stu_quiz_com" data-title="Enter"><?php echo $bus_stu_quiz_com =  (isset( $business_studies_bishesh_program['bus_stu_quiz_com']))? $business_studies_bishesh_program['bus_stu_quiz_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">স্কিল ডেভেলপমেন্ট প্রোগ্রামসমূহ যেমন : নেটওয়ার্ক ডেভোলপিং, সিভি রাইটিং, ইমেইল রাইটিং, পাওয়ার পয়েন্ট প্রেজেন্টেশন ইত্যাদি  </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skill_dev_pre_num" data-title="Enter"><?php echo $skill_dev_pre_num =  (isset( $business_studies_bishesh_program['skill_dev_pre_num']))? $business_studies_bishesh_program['skill_dev_pre_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skill_dev_pre_pre" data-title="Enter"><?php echo $skill_dev_pre_pre =  (isset( $business_studies_bishesh_program['skill_dev_pre_pre']))? $business_studies_bishesh_program['skill_dev_pre_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skill_dev_pre_com" data-title="Enter"><?php echo $skill_dev_pre_com =  (isset( $business_studies_bishesh_program['skill_dev_pre_com']))? $business_studies_bishesh_program['skill_dev_pre_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">স্নাতক ও স্নাতকোত্তর পর্যায়ের জনশক্তিদের নিয়ে কর্মশালা </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snatok_snatok_uttor_num" data-title="Enter"><?php echo $snatok_snatok_uttor_num =  (isset( $business_studies_bishesh_program['snatok_snatok_uttor_num']))? $business_studies_bishesh_program['snatok_snatok_uttor_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snatok_snatok_uttor_pre" data-title="Enter"><?php echo $snatok_snatok_uttor_pre =  (isset( $business_studies_bishesh_program['snatok_snatok_uttor_pre']))? $business_studies_bishesh_program['snatok_snatok_uttor_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snatok_snatok_uttor_com" data-title="Enter"><?php echo $snatok_snatok_uttor_com =  (isset( $business_studies_bishesh_program['snatok_snatok_uttor_com']))? $business_studies_bishesh_program['snatok_snatok_uttor_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজনেস স্টাডিস অলিম্পিয়াড </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_stu_olympiad_num" data-title="Enter"><?php echo $bus_stu_olympiad_num =  (isset( $business_studies_bishesh_program['bus_stu_olympiad_num']))? $business_studies_bishesh_program['bus_stu_olympiad_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_stu_olympiad_pre" data-title="Enter"><?php echo $bus_stu_olympiad_pre =  (isset( $business_studies_bishesh_program['bus_stu_olympiad_pre']))? $business_studies_bishesh_program['bus_stu_olympiad_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_stu_olympiad_com" data-title="Enter"><?php echo $bus_stu_olympiad_com =  (isset( $business_studies_bishesh_program['bus_stu_olympiad_com']))? $business_studies_bishesh_program['bus_stu_olympiad_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সেমিনার, ওয়ার্কশপ, কেইস স্ট্যাডি</td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sem_workshop_case_study_num" data-title="Enter"><?php echo $sem_workshop_case_study_num =  (isset( $business_studies_bishesh_program['sem_workshop_case_study_num']))? $business_studies_bishesh_program['sem_workshop_case_study_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sem_workshop_case_study_pre" data-title="Enter"><?php echo $sem_workshop_case_study_pre =  (isset( $business_studies_bishesh_program['sem_workshop_case_study_pre']))? $business_studies_bishesh_program['sem_workshop_case_study_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sem_workshop_case_study_com" data-title="Enter"><?php echo $sem_workshop_case_study_com =  (isset( $business_studies_bishesh_program['sem_workshop_case_study_com']))? $business_studies_bishesh_program['sem_workshop_case_study_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">জব ফেয়ার </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="job_fear_num" data-title="Enter"><?php echo $job_fear_num =  (isset( $business_studies_bishesh_program['job_fear_num']))? $business_studies_bishesh_program['job_fear_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="job_fear_pre" data-title="Enter"><?php echo $job_fear_pre =  (isset( $business_studies_bishesh_program['job_fear_pre']))? $business_studies_bishesh_program['job_fear_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="job_fear_com" data-title="Enter"><?php echo $job_fear_com =  (isset( $business_studies_bishesh_program['job_fear_com']))? $business_studies_bishesh_program['job_fear_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজনেস উদ্যোক্তা কর্মশালা </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_uddokta_num" data-title="Enter"><?php echo $bus_uddokta_num =  (isset( $business_studies_bishesh_program['bus_uddokta_num']))? $business_studies_bishesh_program['bus_uddokta_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_uddokta_pre" data-title="Enter"><?php echo $bus_uddokta_pre =  (isset( $business_studies_bishesh_program['bus_uddokta_pre']))? $business_studies_bishesh_program['bus_uddokta_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bus_uddokta_com" data-title="Enter"><?php echo $bus_uddokta_com =  (isset( $business_studies_bishesh_program['bus_uddokta_com']))? $business_studies_bishesh_program['bus_uddokta_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবিদ তৈরির জন্য কর্মশালা</td>
                                < <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_create_workshop_num" data-title="Enter"><?php echo $orthonitibid_create_workshop_num =  (isset( $business_studies_bishesh_program['orthonitibid_create_workshop_num']))? $business_studies_bishesh_program['orthonitibid_create_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_create_workshop_pre" data-title="Enter"><?php echo $orthonitibid_create_workshop_pre =  (isset( $business_studies_bishesh_program['orthonitibid_create_workshop_pre']))? $business_studies_bishesh_program['orthonitibid_create_workshop_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_create_workshop_com" data-title="Enter"><?php echo $orthonitibid_create_workshop_com =  (isset( $business_studies_bishesh_program['orthonitibid_create_workshop_com']))? $business_studies_bishesh_program['orthonitibid_create_workshop_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবিদ তৈরির জন্য বিশেষ প্রোগ্রাম</td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_create_prog_num" data-title="Enter"><?php echo $orthonitibid_create_prog_num =  (isset( $business_studies_bishesh_program['orthonitibid_create_prog_num']))? $business_studies_bishesh_program['orthonitibid_create_prog_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_create_prog_pre" data-title="Enter"><?php echo $orthonitibid_create_prog_pre =  (isset( $business_studies_bishesh_program['orthonitibid_create_prog_pre']))? $business_studies_bishesh_program['orthonitibid_create_prog_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_create_prog_com" data-title="Enter"><?php echo $orthonitibid_create_prog_com =  (isset( $business_studies_bishesh_program['orthonitibid_create_prog_com']))? $business_studies_bishesh_program['orthonitibid_create_prog_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবিদদের সাথে মতবিনিময় প্রোগ্রাম </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_motobinimoy_num" data-title="Enter"><?php echo $orthonitibid_motobinimoy_num =  (isset( $business_studies_bishesh_program['orthonitibid_motobinimoy_num']))? $business_studies_bishesh_program['orthonitibid_motobinimoy_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_motobinimoy_pre" data-title="Enter"><?php echo $orthonitibid_motobinimoy_pre =  (isset( $business_studies_bishesh_program['orthonitibid_motobinimoy_pre']))? $business_studies_bishesh_program['orthonitibid_motobinimoy_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="orthonitibid_motobinimoy_com" data-title="Enter"><?php echo $orthonitibid_motobinimoy_com =  (isset( $business_studies_bishesh_program['orthonitibid_motobinimoy_com']))? $business_studies_bishesh_program['orthonitibid_motobinimoy_com']:0; ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অন্যান্য</td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="other_num" data-title="Enter"><?php echo $other_num =  (isset( $business_studies_bishesh_program['other_num']))? $business_studies_bishesh_program['other_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="other_pre" data-title="Enter"><?php echo $other_pre =  (isset( $business_studies_bishesh_program['other_pre']))? $business_studies_bishesh_program['other_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="business_studies_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="other_com" data-title="Enter"><?php echo $other_com =  (isset( $business_studies_bishesh_program['other_com']))? $business_studies_bishesh_program['other_com']:0; ?></a>
                                </td>
                               
                            </tr>

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
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
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
$('#shikkha_shompadok').editable({
    value: <?php echo (isset( $business_studies['shikkha_shompadok']))? $business_studies['shikkha_shompadok']:2; ?>,    
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

$('#manpower_active_bool').editable({
    value: <?php echo (isset( $business_studies_branch_info['manpower_active_bool']))? $business_studies_branch_info['manpower_active_bool']:2; ?>,    
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

$('#business_studies_committee').editable({
    value: <?php echo (isset( $business_studies_branch_info['business_studies_committee']))? $business_studies_branch_info['business_studies_committee']:2; ?>,    
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
