<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০১ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Madrasha_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($madrasah_summit['id']))?$madrasah_summit['id']:'';
                                
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''>ধরন</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>থিওলোজি বিভাগে অধ্যয়নরত স্নাতক ও স্নাতকোত্তর পর্যায়ের ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_manpower_central_s" 
                                    data-title="Enter">
                                    <?php echo $physio_manpower_central_s=(isset( $madrasah_summit['physio_manpower_central_s']))? $madrasah_summit['physio_manpower_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_manpower_central_p" 
                                    data-title="Enter">
                                    <?php echo $physio_manpower_central_p=(isset( $madrasah_summit['physio_manpower_central_p']))? $madrasah_summit['physio_manpower_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($physio_manpower_central_s>0 && $physio_manpower_central_p>0)
                                {echo ($physio_manpower_central_p/$physio_manpower_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_general_central_s" 
                                    data-title="Enter">
                                    <?php echo $physio_general_central_s=(isset( $madrasah_summit['physio_general_central_s']))? $madrasah_summit['physio_general_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_general_central_p" 
                                    data-title="Enter">
                                    <?php echo $physio_general_central_p=(isset( $madrasah_summit['physio_general_central_p']))? $madrasah_summit['physio_general_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($physio_general_central_s>0 && $physio_general_central_p>0)
                                {echo ($physio_general_central_p/$physio_general_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>থিওলোজি বিভাগে অধ্যয়নরত স্নাতক ও স্নাতকোত্তর পর্যায়ের ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_manpower_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $physio_manpower_shakha_s=(isset( $madrasah_summit['physio_manpower_shakha_s']))? $madrasah_summit['physio_manpower_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_manpower_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $physio_manpower_shakha_p=(isset( $madrasah_summit['physio_manpower_shakha_p']))? $madrasah_summit['physio_manpower_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($physio_manpower_shakha_s>0 && $physio_manpower_shakha_p>0)
                                {echo ($physio_manpower_shakha_p/$physio_manpower_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_general_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $physio_general_shakha_s=(isset( $madrasah_summit['physio_general_shakha_s']))? $madrasah_summit['physio_general_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="physio_general_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $physio_general_shakha_p=(isset( $madrasah_summit['physio_general_shakha_p']))? $madrasah_summit['physio_general_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($physio_general_shakha_s>0 && $physio_general_shakha_p>0)
                                {echo ($physio_general_shakha_p/$physio_general_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>কওমি শিক্ষা প্রতিষ্ঠান অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_manpower_central_s" 
                                    data-title="Enter">
                                    <?php echo $kowmi_manpower_central_s=(isset( $madrasah_summit['kowmi_manpower_central_s']))? $madrasah_summit['kowmi_manpower_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_manpower_central_p" 
                                    data-title="Enter">
                                    <?php echo $kowmi_manpower_central_p=(isset( $madrasah_summit['kowmi_manpower_central_p']))? $madrasah_summit['kowmi_manpower_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kowmi_manpower_central_s>0 && $kowmi_manpower_central_p>0)
                                {echo ($kowmi_manpower_central_p/$kowmi_manpower_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_general_central_s" 
                                    data-title="Enter">
                                    <?php echo $kowmi_general_central_s=(isset( $madrasah_summit['kowmi_general_central_s']))? $madrasah_summit['kowmi_general_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_general_central_p" 
                                    data-title="Enter">
                                    <?php echo $kowmi_general_central_p=(isset( $madrasah_summit['kowmi_general_central_p']))? $madrasah_summit['kowmi_general_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kowmi_general_central_s>0 && $kowmi_general_central_p>0)
                                {echo ($kowmi_general_central_p/$kowmi_general_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>কওমি শিক্ষা প্রতিষ্ঠান অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_manpower_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kowmi_manpower_shakha_s=(isset( $madrasah_summit['kowmi_manpower_shakha_s']))? $madrasah_summit['kowmi_manpower_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_manpower_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kowmi_manpower_shakha_p=(isset( $madrasah_summit['kowmi_manpower_shakha_p']))? $madrasah_summit['kowmi_manpower_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kowmi_manpower_shakha_s>0 && $kowmi_manpower_shakha_p>0)
                                {echo ($kowmi_manpower_shakha_p/$kowmi_manpower_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_general_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kowmi_general_shakha_s=(isset( $madrasah_summit['kowmi_general_shakha_s']))? $madrasah_summit['kowmi_general_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kowmi_general_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kowmi_general_shakha_p=(isset( $madrasah_summit['kowmi_general_shakha_p']))? $madrasah_summit['kowmi_general_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kowmi_general_shakha_s>0 && $kowmi_general_shakha_p>0)
                                {echo ($kowmi_general_shakha_p/$kowmi_general_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                           
                          
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Madrasha_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($madrasah_training_program['id']))?$madrasah_training_program['id']:'';
                                
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
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $madrasah_training_program['shikkha_central_s']))? $madrasah_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $madrasah_training_program['shikkha_central_p']))? $madrasah_training_program['shikkha_central_p']:'' ?>
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
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $madrasah_training_program['shikkha_shakha_s']))? $madrasah_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $madrasah_training_program['shikkha_shakha_p']))? $madrasah_training_program['shikkha_shakha_p']:'' ?>
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
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $madrasah_training_program['kormoshala_central_s']))? $madrasah_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $madrasah_training_program['kormoshala_central_p']))? $madrasah_training_program['kormoshala_central_p']:'' ?>
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
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $madrasah_training_program['kormoshala_shakha_s']))? $madrasah_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="madrasah_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $madrasah_training_program['kormoshala_shakha_p']))? $madrasah_training_program['kormoshala_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan='5'><b>জনশক্তি ও দাওয়াত (আলিয়া)</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_জনশক্তি ও দাওয়াত (আলিয়া)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <?php
                            $pk = (isset($madrasah_jonoshokti['id']))?$madrasah_jonoshokti['id']:0;;
                            ?>
                            <tr>

                                <td class="tg-pwj7" rowspan="">জনশক্তি ও দাওয়াত</td>
                                <td class="tg-pwj7" colspan=""style="">পূর্ব সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" colspan="">টার্গেট  </td>
                                <td class="tg-pwj7" colspan="">ঘাটতি  </td>
                                
                            </tr>
                     
                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_prev" data-title="Enter"><?php echo $m_prev=  (isset( $madrasah_jonoshokti['m_prev']))? $madrasah_jonoshokti['m_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_pres" data-title="Enter"><?php echo $m_pres=  (isset( $madrasah_jonoshokti['m_pres']))? $madrasah_jonoshokti['m_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_bri" data-title="Enter"><?php echo $m_bri=  (isset( $madrasah_jonoshokti['m_bri']))? $madrasah_jonoshokti['m_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_ter" data-title="Enter"><?php echo $m_ter=  (isset( $madrasah_jonoshokti['m_ter']))? $madrasah_jonoshokti['m_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_gha" data-title="Enter"><?php echo $m_gha=  (isset( $madrasah_jonoshokti['m_gha']))? $madrasah_jonoshokti['m_gha']:0; ?>
                                </a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_prev" data-title="Enter"><?php echo $a_prev=  (isset( $madrasah_jonoshokti['a_prev']))? $madrasah_jonoshokti['a_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_pres" data-title="Enter"><?php echo $a_pres=  (isset( $madrasah_jonoshokti['a_pres']))? $madrasah_jonoshokti['a_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_bri" data-title="Enter"><?php echo $a_bri=  (isset( $madrasah_jonoshokti['a_bri']))? $madrasah_jonoshokti['a_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_ter" data-title="Enter"><?php echo $a_ter=  (isset( $madrasah_jonoshokti['a_ter']))? $madrasah_jonoshokti['a_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_gha" data-title="Enter"><?php echo $a_gha=  (isset( $madrasah_jonoshokti['m_gha']))? $madrasah_jonoshokti['m_gha']:0; ?>
                                </a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_prev" data-title="Enter"><?php echo $w_prev=  (isset( $madrasah_jonoshokti['w_prev']))? $madrasah_jonoshokti['w_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_pres" data-title="Enter"><?php echo $w_pres=  (isset( $madrasah_jonoshokti['w_pres']))? $madrasah_jonoshokti['w_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_bri" data-title="Enter"><?php echo $w_bri=  (isset( $madrasah_jonoshokti['w_bri']))? $madrasah_jonoshokti['w_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_ter" data-title="Enter"><?php echo $w_ter=  (isset( $madrasah_jonoshokti['w_ter']))? $madrasah_jonoshokti['w_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_gha" data-title="Enter"><?php echo $w_gha=  (isset( $madrasah_jonoshokti['w_gha']))? $madrasah_jonoshokti['w_gha']:0; ?>
                                </a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_prev" data-title="Enter"><?php echo $s_prev=  (isset( $madrasah_jonoshokti['s_prev']))? $madrasah_jonoshokti['s_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_pres" data-title="Enter"><?php echo $s_pres=  (isset( $madrasah_jonoshokti['s_pres']))? $madrasah_jonoshokti['s_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_bri" data-title="Enter"><?php echo $s_bri=  (isset( $madrasah_jonoshokti['s_bri']))? $madrasah_jonoshokti['s_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_ter" data-title="Enter"><?php echo $s_ter=  (isset( $madrasah_jonoshokti['s_ter']))? $madrasah_jonoshokti['s_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_gha" data-title="Enter"><?php echo $s_gha=  (isset( $madrasah_jonoshokti['s_gha']))? $madrasah_jonoshokti['s_gha']:0; ?>
                                </a>
                                </td>

                               
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="f_prev" data-title="Enter"><?php echo $f_prev=  (isset( $madrasah_jonoshokti['f_prev']))? $madrasah_jonoshokti['f_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="f_pres" data-title="Enter"><?php echo $f_pres=  (isset( $madrasah_jonoshokti['f_pres']))? $madrasah_jonoshokti['f_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="f_bri" data-title="Enter"><?php echo $f_bri=  (isset( $madrasah_jonoshokti['f_bri']))? $madrasah_jonoshokti['f_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="f_ter" data-title="Enter"><?php echo $f_ter=  (isset( $madrasah_jonoshokti['f_ter']))? $madrasah_jonoshokti['f_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="f_gha" data-title="Enter"><?php echo $f_gha=  (isset( $madrasah_jonoshokti['f_gha']))? $madrasah_jonoshokti['f_gha']:0; ?>
                                </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($m_prev+$a_prev+$w_prev+$s_prev+$f_prev) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($m_pres+$a_pres+$w_pres+$s_pres+$f_pres) ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($m_bri+$a_bri+$w_bri+$s_bri+$f_bri) ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo ($m_ter+$a_ter+$w_ter+$s_ter+$f_ter) ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($m_gha+$a_gha+$w_gha+$s_gha+$f_gha) ?>
                                </td>
                            </tr>
                           
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                            <td class="tg-pwj7" colspan='5'><b>সংগঠন (আলিয়া)</b></td>
                            <td class="tg-pwj7">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_সংগঠন (আলিয়া)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        <?php
                            $pk = (isset($madrasah_shongothon['id']))?$madrasah_shongothon['id']:0;;
                            ?>
                        <tr>
                            <td class="tg-pwj7" rowspan="">সংগঠন</td>
                            <td class="tg-pwj7" colspan=""style="">পূর্বের সংখ্যা </td>
                            <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                            <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                            <td class="tg-pwj7" colspan="">টার্গেট  </td>
                            <td class="tg-pwj7" colspan="">ঘাটতি  </td>



                        </tr>
                        <tr>
                                <td class="tg-y698">থানা</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="th_prev" data-title="Enter"><?php echo $th_prev=  (isset( $madrasah_shongothon['th_prev']))? $madrasah_shongothon['th_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="th_pres" data-title="Enter"><?php echo $th_pres=  (isset( $madrasah_shongothon['th_pres']))? $madrasah_shongothon['th_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="th_bri" data-title="Enter"><?php echo $th_bri=  (isset( $madrasah_shongothon['th_bri']))? $madrasah_shongothon['th_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="th_ter" data-title="Enter"><?php echo $th_ter=  (isset( $madrasah_shongothon['th_ter']))? $madrasah_shongothon['th_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="th_gha" data-title="Enter"><?php echo $th_gha=  (isset( $madrasah_shongothon['th_gha']))? $madrasah_shongothon['th_gha']:0; ?>
                                </a>
                                </td>
                     
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ওয়ার্ড/জোন  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wo_prev" data-title="Enter"><?php echo $wo_prev=  (isset( $madrasah_shongothon['wo_prev']))? $madrasah_shongothon['wo_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wo_pres" data-title="Enter"><?php echo $wo_pres=  (isset( $madrasah_shongothon['wo_pres']))? $madrasah_shongothon['wo_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wo_bri" data-title="Enter"><?php echo $wo_bri=  (isset( $madrasah_shongothon['wo_bri']))? $madrasah_shongothon['wo_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wo_ter" data-title="Enter"><?php echo $wo_ter=  (isset( $madrasah_shongothon['wo_ter']))? $madrasah_shongothon['wo_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wo_gha" data-title="Enter"><?php echo $wo_gha=  (isset( $madrasah_shongothon['wo_gha']))? $madrasah_shongothon['wo_gha']:0; ?>
                                </a>
                                </td>
                                
                             
                             
                            </tr>

                            <tr>
                                <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_prev" data-title="Enter"><?php echo $up_prev=  (isset( $madrasah_shongothon['up_prev']))? $madrasah_shongothon['up_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_pres" data-title="Enter"><?php echo $up_pres=  (isset( $madrasah_shongothon['up_pres']))? $madrasah_shongothon['up_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_bri" data-title="Enter"><?php echo $up_bri=  (isset( $madrasah_shongothon['up_bri']))? $madrasah_shongothon['up_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_ter" data-title="Enter"><?php echo $up_ter=  (isset( $madrasah_shongothon['up_ter']))? $madrasah_shongothon['up_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_gha" data-title="Enter"><?php echo $up_gha=  (isset( $madrasah_shongothon['up_gha']))? $madrasah_shongothon['up_gha']:0; ?>
                                </a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> সমর্থক সংগঠন </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_prev" data-title="Enter"><?php echo $ss_prev=  (isset( $madrasah_shongothon['ss_prev']))? $madrasah_shongothon['ss_prev']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_pres" data-title="Enter"><?php echo $ss_pres=  (isset( $madrasah_shongothon['ss_pres']))? $madrasah_shongothon['ss_pres']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_bri" data-title="Enter"><?php echo $ss_bri=  (isset( $madrasah_shongothon['ss_bri']))? $madrasah_shongothon['ss_bri']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_ter" data-title="Enter"><?php echo $ss_ter=  (isset( $madrasah_shongothon['ss_ter']))? $madrasah_shongothon['ss_ter']:0; ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_shongothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_gha" data-title="Enter"><?php echo $ss_gha=  (isset( $madrasah_shongothon['ss_gha']))? $madrasah_shongothon['ss_gha']:0; ?>
                                </a>
                                </td>
                            
                                
                            </tr>
                            <tr>
                                <td class="tg-0pky" rowspan="2"> মোট</td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_prev+$wo_prev+$up_prev+$ss_prev)?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_pres+$wo_pres+$up_pres+$ss_pres)?>  
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_bri+$wo_bri+$up_bri+$ss_bri)?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_ter+$wo_ter+$up_ter+$ss_ter)?> 
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($th_gha+$wo_gha+$up_gha+$ss_gha)?> 
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
