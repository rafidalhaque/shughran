<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্লানিং এন্ড ডেভেলপমেন্ট বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                   
                    <table class="tg table table-header-rotated" id="testTable2">
                        <tr><td class="tg-pwj7" colspan=""> <b>শাখার পরিকল্পনা সংক্রান্ত</b></td>
                        <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Planning_শাখার পরিকল্পনা সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                    </tr>
                            <td class="tg-pwj7" colspan=""> বিষয়</td>
                            <td class="tg-pwj7" colspan=""> মন্তব্য  </td>
                        </tr>
                        <?php
                                $pk = (isset($planning_shakha_plan['id']))?$planning_shakha_plan['id']:"";
                            ?>
                        <tr>
                            <td class="tg-pwj7" rowspan=""> শাখায় পরিকল্পনা কমিটি আছে?  হ্যাঁ/না  	 </td>
                            
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  id="shakhay_porikolpona_comitte" data-idname=""   data-type="select" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                data-name="shakhay_porikolpona_comitte@planning_shakha_plan" 
                                data-title="শাখায় পরিকল্পনা কমিটি আছে?"> </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> পরিকল্পনা কমিটির কতটি বৈঠক হয়েছে? </td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="porikolpona_boithok" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['porikolpona_boithok']))? $planning_shakha_plan['porikolpona_boithok']:'' ?>
                            </a>
                            </td>
                         
                        </tr>
                       <tr>
                            <td class="tg-pwj7" rowspan=""> শাখায় দীর্ঘমেয়াদী পরিকল্পনা নেওয়া হয়েছে কি?  হ্যাঁ/না</td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  id="dirghomeyadi_plan" data-idname=""   data-type="select" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                data-name="dirghomeyadi_plan@planning_shakha_plan" 
                                data-title="শাখায় দীর্ঘমেয়াদী পরিকল্পনা নেওয়া হয়েছে কি?">  </a>
                            </td>
                        </tr>
                 
                        <tr> 
                            <td class="tg-pwj7" colspan=""> জনশক্তির একাডেমিক আউটপুট পরিকল্পনা বাস্তবায়নের হার? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="academic_output" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['academic_output']))? $planning_shakha_plan['academic_output']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> জনশক্তির প্রফেশনাল আউটপুট পরিকল্পনা বাস্তবায়নের হার? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="professional_output" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['professional_output']))? $planning_shakha_plan['professional_output']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> বিশ্ববিদ্যালয়/অনার্স মানের কলেজ কতটি?  </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="uni_maner_college" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['uni_maner_college']))? $planning_shakha_plan['uni_maner_college']:'' ?>
                            </a>
                            </td>

                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> পঞ্চবার্ষিকী পরিকল্পনা নেওয়া হয়েছে কতটিতে? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="5_year_plan" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['5_year_plan']))? $planning_shakha_plan['5_year_plan']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> বার্ষিক পরিকল্পনা পর্যালোচনা হয়েছে কতবার?  </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="year_plan_porjalochona" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['year_plan_porjalochona']))? $planning_shakha_plan['year_plan_porjalochona']:'' ?>
                            </a>
                            </td>

                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> আউটপুট পরিকল্পনা পর্যালোচনা হয়েছে কতবার?? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="output_plan" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['output_plan']))? $planning_shakha_plan['output_plan']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> শাখায় উপশাখা সংখ্যা কতটি? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="uposhakah_s" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['uposhakah_s']))? $planning_shakha_plan['uposhakah_s']:'' ?>
                            </a>
                            </td>
                        </tr>
                        
                        <tr> 
                            <td class="tg-pwj7" colspan=""> কতটি উপশাখায় সাথী মানের সভাপতি আছেন? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="up_p_sathi_maner" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['up_p_sathi_maner']))? $planning_shakha_plan['up_p_sathi_maner']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> এ বছর নিষ্ক্রিয় থেকে সক্রিয় করা হয়েছে কতটি উপশাখা? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="nishkriyo_theke_shokriyo" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['nishkriyo_theke_shokriyo']))? $planning_shakha_plan['nishkriyo_theke_shokriyo']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="">শাখায় বর্তমানে নিষ্ক্রিয় উপশাখা কতটি? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="nishkriyo_up" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['nishkriyo_up']))? $planning_shakha_plan['nishkriyo_up']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> শাখায় ওয়ার্ড সংখ্যা কতটি? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="word_num" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['word_num']))? $planning_shakha_plan['word_num']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> কতটি ওয়ার্ডে সদস্য মানের সভাপতি আছেন? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="word_p_shodossho_maner" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['word_p_shodossho_maner']))? $planning_shakha_plan['word_p_shodossho_maner']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> শাখায় ইউনিয়ন সংখ্যা কতটি? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="union_num" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['union_num']))? $planning_shakha_plan['union_num']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="">কতটি ইউনিয়নে সদস্য মানের সভাপতি আছেন? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="uni_p_shodossho_maner" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['uni_p_shodossho_maner']))? $planning_shakha_plan['uni_p_shodossho_maner']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> শাখায় থানা সংখ্যা কতটি? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="thana_num" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['thana_num']))? $planning_shakha_plan['thana_num']:'' ?>
                            </a>
                            </td>

                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan=""> দুইজনের কম সদস্য কাজ করে কতটি থানায়? </td>
                               <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_shakha_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="2_member_at_least" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_shakha_plan['2_member_at_least']))? $planning_shakha_plan['2_member_at_least']:'' ?>
                            </a>
                            </td>
                        </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                        <tr><td class="tg-pwj7" colspan="2"><b> জনশক্তির বার্ষিক পরিকল্পনা সংক্রান্ত </b></td>
                        <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Planning_জনশক্তির বার্ষিক পরিকল্পনা সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                    </tr>
                        <tr>
                            <td class="tg-pwj7" colspan="2"> জনশক্তি</td>
                            <td class="tg-pwj7" rowspan="2"> ব্যক্তিগত বার্ষিক পরিকল্পনা গ্রহণ করেছেন কতজন  </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" rowspan="">মান </td>
                            <td class="tg-pwj7" colspan=""> সংখ্যা </td>
                        </tr>
                        <?php
                                $pk = (isset($planning_jonoshokti_plan['id']))?$planning_jonoshokti_plan['id']:"";
                            ?>
                        <tr>
                            <td class="tg-pwj7" colspan=""> সদস্য </td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_jonoshokti_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="mem_num" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_jonoshokti_plan['mem_num']))? $planning_jonoshokti_plan['mem_num']:'' ?>
                            </a>
                            </td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_jonoshokti_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="mem_plan" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_jonoshokti_plan['mem_plan']))? $planning_jonoshokti_plan['mem_plan']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> সাথী</td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_jonoshokti_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="associate_num" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_jonoshokti_plan['associate_num']))? $planning_jonoshokti_plan['associate_num']:'' ?>
                            </a>
                            </td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_jonoshokti_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="associate_plan" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_jonoshokti_plan['associate_plan']))? $planning_jonoshokti_plan['associate_plan']:'' ?>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> কর্মী </td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_jonoshokti_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="worker_num" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_jonoshokti_plan['worker_num']))? $planning_jonoshokti_plan['worker_num']:'' ?>
                            </a>
                            </td>
                            <td class="tg-0pky  type_1">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="planning_jonoshokti_plan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="worker_plan" 
                                data-title="Enter"><?php echo $arabic_c=(isset( $planning_jonoshokti_plan['worker_plan']))? $planning_jonoshokti_plan['worker_plan']:'' ?>
                            </a>
                            </td>
                        </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Planning_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($planning_training_program['id']))?$planning_training_program['id']:'';
                                
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
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $planning_training_program['shikkha_central_s']))? $planning_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $planning_training_program['shikkha_central_p']))? $planning_training_program['shikkha_central_p']:'' ?>
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
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $planning_training_program['shikkha_shakha_s']))? $planning_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $planning_training_program['shikkha_shakha_p']))? $planning_training_program['shikkha_shakha_p']:'' ?>
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
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $planning_training_program['kormoshala_central_s']))? $planning_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $planning_training_program['kormoshala_central_p']))? $planning_training_program['kormoshala_central_p']:'' ?>
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
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $planning_training_program['kormoshala_shakha_s']))? $planning_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="planning_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $planning_training_program['kormoshala_shakha_p']))? $planning_training_program['kormoshala_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
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
$('#shakhay_porikolpona_comitte').editable({
    value: <?php echo (isset( $planning_shakha_plan['shakhay_porikolpona_comitte']))? $planning_shakha_plan['shakhay_porikolpona_comitte']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
            console.log(response);
        if(response.flag == 3)
        {
            location.reload();
        }
    },
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
});

$('#dirghomeyadi_plan').editable({
    value: <?php echo (isset( $planning_shakha_plan['dirghomeyadi_plan']))? $planning_shakha_plan['dirghomeyadi_plan']:2; ?>,    
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