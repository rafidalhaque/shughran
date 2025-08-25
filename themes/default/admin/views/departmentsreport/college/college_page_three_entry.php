<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'কলেজ বিভাগ - পেইজ ০২ )' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/college-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                        <!-- first table -->
                        <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'College_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($college_summit['id']))?$college_summit['id']:'';
                                
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''>ধরন</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>ডিপ্লোমায় অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_manpower_central_s" 
                                    data-title="Enter">
                                    <?php echo $deploma_manpower_central_s=(isset( $college_summit['deploma_manpower_central_s']))? $college_summit['deploma_manpower_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_manpower_central_p" 
                                    data-title="Enter">
                                    <?php echo $deploma_manpower_central_p=(isset( $college_summit['deploma_manpower_central_p']))? $college_summit['deploma_manpower_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($deploma_manpower_central_s>0 && $deploma_manpower_central_p>0)
                                {echo ($deploma_manpower_central_p/$deploma_manpower_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_general_central_s" 
                                    data-title="Enter">
                                    <?php echo $deploma_general_central_s=(isset( $college_summit['deploma_general_central_s']))? $college_summit['deploma_general_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_general_central_p" 
                                    data-title="Enter">
                                    <?php echo $deploma_general_central_p=(isset( $college_summit['deploma_general_central_p']))? $college_summit['deploma_general_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($deploma_general_central_s>0 && $deploma_general_central_p>0)
                                {echo ($deploma_general_central_p/$deploma_general_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>ডিপ্লোমায় অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_manpower_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $deploma_manpower_shakha_s=(isset( $college_summit['deploma_manpower_shakha_s']))? $college_summit['deploma_manpower_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_manpower_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $deploma_manpower_shakha_p=(isset( $college_summit['deploma_manpower_shakha_p']))? $college_summit['deploma_manpower_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($deploma_manpower_shakha_s>0 && $deploma_manpower_shakha_p>0)
                                {echo ($deploma_manpower_shakha_p/$deploma_manpower_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_general_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $deploma_general_shakha_s=(isset( $college_summit['deploma_general_shakha_s']))? $college_summit['deploma_general_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="deploma_general_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $deploma_general_shakha_p=(isset( $college_summit['deploma_general_shakha_p']))? $college_summit['deploma_general_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($deploma_general_shakha_s>0 && $deploma_general_shakha_p>0)
                                {echo ($deploma_general_shakha_p/$deploma_general_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>পলিটেকনিক, এগ্রিকালচার, টেক্সটাইল, ফিশারিজ, মেরিন, IHT,  MATS ইত্যাদি প্রতিষ্ঠানে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_manpower_central_s" 
                                    data-title="Enter">
                                    <?php echo $political_manpower_central_s=(isset( $college_summit['political_manpower_central_s']))? $college_summit['political_manpower_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_manpower_central_p" 
                                    data-title="Enter">
                                    <?php echo $political_manpower_central_p=(isset( $college_summit['political_manpower_central_p']))? $college_summit['political_manpower_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($political_manpower_central_s>0 && $political_manpower_central_p>0)
                                {echo ($political_manpower_central_p/$political_manpower_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_general_central_s" 
                                    data-title="Enter">
                                    <?php echo $political_general_central_s=(isset( $college_summit['political_general_central_s']))? $college_summit['political_general_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_general_central_p" 
                                    data-title="Enter">
                                    <?php echo $political_general_central_p=(isset( $college_summit['political_general_central_p']))? $college_summit['political_general_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($political_general_central_s>0 && $political_general_central_p>0)
                                {echo ($political_general_central_p/$political_general_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>পলিটেকনিক, এগ্রিকালচার, টেক্সটাইল, ফিশারিজ, মেরিন, IHT,  MATS ইত্যাদি প্রতিষ্ঠানে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_manpower_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $political_manpower_shakha_s=(isset( $college_summit['political_manpower_shakha_s']))? $college_summit['political_manpower_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_manpower_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $political_manpower_shakha_p=(isset( $college_summit['political_manpower_shakha_p']))? $college_summit['political_manpower_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($political_manpower_shakha_s>0 && $political_manpower_shakha_p>0)
                                {echo ($political_manpower_shakha_p/$political_manpower_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_general_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $political_general_shakha_s=(isset( $college_summit['political_general_shakha_s']))? $college_summit['political_general_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_general_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $political_general_shakha_p=(isset( $college_summit['political_general_shakha_p']))? $college_summit['political_general_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($political_general_shakha_s>0 && $political_general_shakha_p>0)
                                {echo ($political_general_shakha_p/$political_general_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>একাদশ শ্রেণিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_manpower_central_s" 
                                    data-title="Enter">
                                    <?php echo $hsc_manpower_central_s=(isset( $college_summit['hsc_manpower_central_s']))? $college_summit['hsc_manpower_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_manpower_central_p" 
                                    data-title="Enter">
                                    <?php echo $hsc_manpower_central_p=(isset( $college_summit['hsc_manpower_central_p']))? $college_summit['hsc_manpower_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($hsc_manpower_central_s>0 && $hsc_manpower_central_p>0)
                                {echo ($hsc_manpower_central_p/$hsc_manpower_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_general_central_s" 
                                    data-title="Enter">
                                    <?php echo $hsc_general_central_s=(isset( $college_summit['hsc_general_central_s']))? $college_summit['hsc_general_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_general_central_p" 
                                    data-title="Enter">
                                    <?php echo $hsc_general_central_p=(isset( $college_summit['hsc_general_central_p']))? $college_summit['hsc_general_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($hsc_general_central_s>0 && $hsc_general_central_p>0)
                                {echo ($hsc_general_central_p/$hsc_general_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-y698" rowspan='2'>একাদশ শ্রেণিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td> 
                            <td class="tg-y698">জনশক্তি</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_manpower_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $hsc_manpower_shakha_s=(isset( $college_summit['hsc_manpower_shakha_s']))? $college_summit['hsc_manpower_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_manpower_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $hsc_manpower_shakha_p=(isset( $college_summit['hsc_manpower_shakha_p']))? $college_summit['hsc_manpower_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($hsc_manpower_shakha_s>0 && $hsc_manpower_shakha_p>0)
                                {echo ($hsc_manpower_shakha_p/$hsc_manpower_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                 <td class="tg-y698">সাধারণ</td> 
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_general_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $hsc_general_shakha_s=(isset( $college_summit['hsc_general_shakha_s']))? $college_summit['hsc_general_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hsc_general_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $hsc_general_shakha_p=(isset( $college_summit['hsc_general_shakha_p']))? $college_summit['hsc_general_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($hsc_general_shakha_s>0 && $hsc_general_shakha_p>0)
                                {echo ($hsc_general_shakha_p/$hsc_general_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                          
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'College_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($college_training_program['id']))?$college_training_program['id']:'';
                                
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
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $college_training_program['shikkha_central_s']))? $college_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $college_training_program['shikkha_central_p']))? $college_training_program['shikkha_central_p']:'' ?>
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
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $college_training_program['shikkha_shakha_s']))? $college_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $college_training_program['shikkha_shakha_p']))? $college_training_program['shikkha_shakha_p']:'' ?>
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
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $college_training_program['kormoshala_central_s']))? $college_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $college_training_program['kormoshala_central_p']))? $college_training_program['kormoshala_central_p']:'' ?>
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
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $college_training_program['kormoshala_shakha_s']))? $college_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="college_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $college_training_program['kormoshala_shakha_p']))? $college_training_program['kormoshala_shakha_p']:'' ?>
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
                              <td class="tg-pwj7" colspan="10"><b>বিশ্ববিদ্যালয় ভর্তি তত্ত্বাবধান সংক্রান্ত</b></td>
                              <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'College_বিশ্ববিদ্যালয় ভর্তি তত্ত্বাবধান সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ভর্তিচ্ছু জনশক্তিদের মান</td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ভর্তিচ্ছু জনশক্তিদের সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> শাখার পক্ষ থেকে ভর্তিচ্ছু যতজনকে নিয়মিত তত্ত্বাবধায়ন করা হয়েছে </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> জনশক্তিদের অবস্থানরত শাখা বা কোচিংয়ের পক্ষ থেকে যতজনকে নিয়মিত তত্ত্বাবধান করা হয়েছে </span></div></td>
                                <td class="tg-pwj7" colspan="2"> মেডিকেল </td>
                                <td class="tg-pwj7" colspan="2">ইঞ্জিনিয়ারিং </td>
                                <td class="tg-pwj7" colspan="2">বিশ্ববিদ্যালয়   </td>
                                <td class="tg-pwj7" colspan="2">সর্বমোট</td>
                            </tr>

                            <tr>

                                <td class="tg-pwj7 "><div><span>ভর্তিচ্ছু</span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভর্তিচ্ছু </span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভর্তিচ্ছু</span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভর্তিচ্ছু</span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                            </tr>

							<?php $pk = (isset($college_vorti_supervision['id']))?$college_vorti_supervision['id']:'';?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_vorti__num" data-title="Enter">
										<?php echo $member_vorti__num=  (isset( $college_vorti_supervision['member_vorti__num']))?$college_vorti_supervision['member_vorti__num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_vorti__sv" data-title="Enter">
										<?php echo $member_vorti__sv=  (isset( $college_vorti_supervision['member_vorti__sv']))?$college_vorti_supervision['member_vorti__sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_vorti__mp_sv" data-title="Enter">
										<?php echo $member_vorti__mp_sv=  (isset( $college_vorti_supervision['member_vorti__mp_sv']))?$college_vorti_supervision['member_vorti__mp_sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_med_vorticchu" data-title="Enter">
										<?php echo $member_med_vorticchu=  (isset( $college_vorti_supervision['member_med_vorticchu']))?$college_vorti_supervision['member_med_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_med_chance" data-title="Enter">
										<?php echo $member_med_chance=  (isset( $college_vorti_supervision['member_med_chance']))?$college_vorti_supervision['member_med_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_eng_vorticchu" data-title="Enter">
										<?php echo $member_eng_vorticchu=  (isset( $college_vorti_supervision['member_eng_vorticchu']))?$college_vorti_supervision['member_eng_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_eng_chance" data-title="Enter">
										<?php echo $member_eng_chance=  (isset( $college_vorti_supervision['member_eng_chance']))?$college_vorti_supervision['member_eng_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_var_vorticchu" data-title="Enter">
										<?php echo $member_var_vorticchu=  (isset( $college_vorti_supervision['member_var_vorticchu']))?$college_vorti_supervision['member_var_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="member_var_chance" data-title="Enter">
										<?php echo $member_var_chance=  (isset( $college_vorti_supervision['member_var_chance']))?$college_vorti_supervision['member_var_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<?php echo $total_sod_vorti = ($member_med_vorticchu+$member_eng_vorticchu+$member_var_vorticchu)?>
                                </td>
                                <td class="tg-0pky  type_11">
									<?php echo $total_sod_cspch = ($member_med_chance+$member_eng_chance+$member_var_chance)?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_vorti__num" data-title="Enter">
										<?php echo $sathi_vorti__num=  (isset( $college_vorti_supervision['sathi_vorti__num']))?$college_vorti_supervision['sathi_vorti__num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_vorti__sv" data-title="Enter">
										<?php echo $sathi_vorti__sv=  (isset( $college_vorti_supervision['sathi_vorti__sv']))?$college_vorti_supervision['sathi_vorti__sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_vorti__mp_sv" data-title="Enter">
										<?php echo $sathi_vorti__mp_sv=  (isset( $college_vorti_supervision['sathi_vorti__mp_sv']))?$college_vorti_supervision['sathi_vorti__mp_sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_med_vorticchu" data-title="Enter">
										<?php echo $sathi_med_vorticchu=  (isset( $college_vorti_supervision['sathi_med_vorticchu']))?$college_vorti_supervision['sathi_med_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_med_chance" data-title="Enter">
										<?php echo $sathi_med_chance=  (isset( $college_vorti_supervision['sathi_med_chance']))?$college_vorti_supervision['sathi_med_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_eng_vorticchu" data-title="Enter">
										<?php echo $sathi_eng_vorticchu=  (isset( $college_vorti_supervision['sathi_eng_vorticchu']))?$college_vorti_supervision['sathi_eng_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_eng_chance" data-title="Enter">
										<?php echo $sathi_eng_chance=  (isset( $college_vorti_supervision['sathi_eng_chance']))?$college_vorti_supervision['sathi_eng_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_var_vorticchu" data-title="Enter">
										<?php echo $sathi_var_vorticchu=  (isset( $college_vorti_supervision['sathi_var_vorticchu']))?$college_vorti_supervision['sathi_var_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sathi_var_chance" data-title="Enter">
										<?php echo $sathi_var_chance=  (isset( $college_vorti_supervision['sathi_var_chance']))?$college_vorti_supervision['sathi_var_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<?php echo $total_sat_vorti=($sathi_med_vorticchu+$sathi_eng_vorticchu+$sathi_var_vorticchu)?>
                                </td>
                                <td class="tg-0pky  type_11">
									<?php echo $total_sat_cspch=($sathi_med_chance+$sathi_eng_chance+$sathi_var_chance)?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_vorti__num" data-title="Enter">
										<?php echo $kormi_vorti__num=  (isset( $college_vorti_supervision['kormi_vorti__num']))?$college_vorti_supervision['kormi_vorti__num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_vorti__sv" data-title="Enter">
										<?php echo $kormi_vorti__sv=  (isset( $college_vorti_supervision['kormi_vorti__sv']))?$college_vorti_supervision['kormi_vorti__sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_vorti__mp_sv" data-title="Enter">
										<?php echo $kormi_vorti__mp_sv=  (isset( $college_vorti_supervision['kormi_vorti__mp_sv']))?$college_vorti_supervision['kormi_vorti__mp_sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_med_vorticchu" data-title="Enter">
										<?php echo $kormi_med_vorticchu=  (isset( $college_vorti_supervision['kormi_med_vorticchu']))?$college_vorti_supervision['kormi_med_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_med_chance" data-title="Enter">
										<?php echo $kormi_med_chance=  (isset( $college_vorti_supervision['kormi_med_chance']))?$college_vorti_supervision['kormi_med_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_eng_vorticchu" data-title="Enter">
										<?php echo $kormi_eng_vorticchu=  (isset( $college_vorti_supervision['kormi_eng_vorticchu']))?$college_vorti_supervision['kormi_eng_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_eng_chance" data-title="Enter">
										<?php echo $kormi_eng_chance=  (isset( $college_vorti_supervision['kormi_eng_chance']))?$college_vorti_supervision['kormi_eng_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_var_vorticchu" data-title="Enter">
										<?php echo $kormi_var_vorticchu=  (isset( $college_vorti_supervision['kormi_var_vorticchu']))?$college_vorti_supervision['kormi_var_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kormi_var_chance" data-title="Enter">
										<?php echo $kormi_var_chance=  (isset( $college_vorti_supervision['kormi_var_chance']))?$college_vorti_supervision['kormi_var_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<?php echo $total_kor_vorti=($kormi_med_vorticchu+$kormi_eng_vorticchu+$kormi_var_vorticchu)?>
                                </td>
                                <td class="tg-0pky  type_11">
									<?php echo $total_kor_cspch=($kormi_med_chance+$kormi_eng_chance+$kormi_var_chance)?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_vorti__num" data-title="Enter">
										<?php echo $shomorthok_vorti__num=  (isset( $college_vorti_supervision['shomorthok_vorti__num']))?$college_vorti_supervision['shomorthok_vorti__num']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_vorti__sv" data-title="Enter">
										<?php echo $shomorthok_vorti__sv=  (isset( $college_vorti_supervision['shomorthok_vorti__sv']))?$college_vorti_supervision['shomorthok_vorti__sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_vorti__mp_sv" data-title="Enter">
										<?php echo $shomorthok_vorti__mp_sv=  (isset( $college_vorti_supervision['shomorthok_vorti__mp_sv']))?$college_vorti_supervision['shomorthok_vorti__mp_sv']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_med_vorticchu" data-title="Enter">
										<?php echo $shomorthok_med_vorticchu=  (isset( $college_vorti_supervision['shomorthok_med_vorticchu']))?$college_vorti_supervision['shomorthok_med_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_med_chance" data-title="Enter">
										<?php echo $shomorthok_med_chance=  (isset( $college_vorti_supervision['shomorthok_med_chance']))?$college_vorti_supervision['shomorthok_med_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_eng_vorticchu" data-title="Enter">
										<?php echo $shomorthok_eng_vorticchu=  (isset( $college_vorti_supervision['shomorthok_eng_vorticchu']))?$college_vorti_supervision['shomorthok_eng_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_eng_chance" data-title="Enter">
										<?php echo $shomorthok_eng_chance=  (isset( $college_vorti_supervision['shomorthok_eng_chance']))?$college_vorti_supervision['shomorthok_eng_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_var_vorticchu" data-title="Enter">
										<?php echo $shomorthok_var_vorticchu=  (isset( $college_vorti_supervision['shomorthok_var_vorticchu']))?$college_vorti_supervision['shomorthok_var_vorticchu']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_vorti_supervision" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shomorthok_var_chance" data-title="Enter">
										<?php echo $shomorthok_var_chance=  (isset( $college_vorti_supervision['shomorthok_var_chance']))?$college_vorti_supervision['shomorthok_var_chance']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<?php echo $total_som_vorti=($shomorthok_med_vorticchu+$shomorthok_eng_vorticchu+$shomorthok_var_vorticchu)?>
                                </td>
                                <td class="tg-0pky  type_11">
									<?php echo $total_som_cspch=($shomorthok_med_chance+$shomorthok_eng_chance+$shomorthok_var_chance)?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
									<?php echo $total_vcjshs = ($member_vorti__num+$sathi_vorti__num+$kormi_vorti__num+$shomorthok_vorti__num)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_shpthvcjntbkho = ($member_vorti__sv+$sathi_vorti__sv+$kormi_vorti__sv+$shomorthok_vorti__sv)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_vcjdorashcidshpthjntbkho = ($member_vorti__mp_sv+$sathi_vorti__mp_sv+$kormi_vorti__mp_sv+$shomorthok_vorti__mp_sv)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_mk_vcekch = ($member_med_vorticchu+$sathi_med_vorticchu+$kormi_med_vorticchu+$shomorthok_med_vorticchu)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_mk_cspch = ($member_med_chance+$sathi_med_chance+$kormi_med_chance+$shomorthok_med_chance)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_enr_vcekch = ($member_eng_vorticchu+$sathi_eng_vorticchu+$kormi_eng_vorticchu+$shomorthok_eng_vorticchu)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_enr_cspch = ($member_eng_chance+$sathi_eng_chance+$kormi_eng_chance+$shomorthok_eng_chance)?>
                                </td>
                                <td class="tg-0pky">
									<?php echo $total_bibil_vcekch = ($member_var_vorticchu+$sathi_var_vorticchu+$kormi_var_vorticchu+$shomorthok_var_vorticchu)?>
                                </td>
                                <td class="tg-0pky  type_9">
									<?php echo $total_bibil_cspch = ($member_var_chance+$sathi_var_chance+$kormi_var_chance+$shomorthok_var_chance)?>
                                </td>
                                <td class="tg-0pky  type_10">
									<?php echo ($total_sod_vorti+$total_sat_vorti+$total_kor_vorti+$total_som_vorti)?>
                                </td>
                                <td class="tg-0pky  type_11">
									<?php echo ($total_sod_cspch+$total_sat_cspch+$total_kor_cspch+$total_som_cspch)?>
                                </td>
                            </tr>

                        </table>

                        <!-- second table -->
                        <!-- <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                              <td class="tg-pwj7" colspan="8"><b>আইডিয়াল হোম: (একাডেমিক ও ভর্তিচ্ছু )</b></td>
                              <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'College_আইডিয়াল হোম: (একাডেমিক ও ভর্তিচ্ছু)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">আইডিয়াল হোমের ধরন</td>
                                <td class="tg-pwj7 " colspan="5"><div><span>হোম সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " colspan="4"><div><span> ছাত্র সংখ্যা </span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>পূর্বের সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতির কারণ</span></div></td>
                                <td class="tg-pwj7 "><div><span>পূর্বের সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>

                            </tr>

							<?php $pk = (isset($college_ideal_home['id']))?$college_ideal_home['id']:'';?>
                            <tr>
                                <td class="tg-pwj7 type_3">
                                    নিয়মিত এইচএসসি/আলিম পরীক্ষার্থী
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_home_prev_num" data-title="Enter">
										<?php echo $hsc_home_prev_num=  (isset( $college_ideal_home['hsc_home_prev_num']))?$college_ideal_home['hsc_home_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_home_pres_num" data-title="Enter">
										<?php echo $hsc_home_pres_num=  (isset( $college_ideal_home['hsc_home_pres_num']))?$college_ideal_home['hsc_home_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_home_bri" data-title="Enter">
										<?php echo $hsc_home_bri=  (isset( $college_ideal_home['hsc_home_bri']))?$college_ideal_home['hsc_home_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_home_gha" data-title="Enter">
										<?php echo $hsc_home_gha=  (isset( $college_ideal_home['hsc_home_gha']))?$college_ideal_home['hsc_home_gha']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="text" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_home_gha_karon" data-title="Enter">
										<?php echo $hsc_home_gha_karon=  (isset( $college_ideal_home['hsc_home_gha_karon']))?$college_ideal_home['hsc_home_gha_karon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_stu_prev_num" data-title="Enter">
										<?php echo $hsc_stu_prev_num=  (isset( $college_ideal_home['hsc_stu_prev_num']))?$college_ideal_home['hsc_stu_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_stu_pres_num" data-title="Enter">
										<?php echo $hsc_stu_pres_num=  (isset( $college_ideal_home['hsc_stu_pres_num']))?$college_ideal_home['hsc_stu_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_stu_bri" data-title="Enter">
										<?php echo $hsc_stu_bri=  (isset( $college_ideal_home['hsc_stu_bri']))?$college_ideal_home['hsc_stu_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_stu_gha" data-title="Enter">
										<?php echo $hsc_stu_gha=  (isset( $college_ideal_home['hsc_stu_gha']))?$college_ideal_home['hsc_stu_gha']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_3">
                                    মেডিকেল ভর্তিচ্ছু
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_home_prev_num" data-title="Enter">
										<?php echo $med_home_prev_num=  (isset( $college_ideal_home['med_home_prev_num']))?$college_ideal_home['med_home_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_home_pres_num" data-title="Enter">
										<?php echo $med_home_pres_num=  (isset( $college_ideal_home['med_home_pres_num']))?$college_ideal_home['med_home_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_home_bri" data-title="Enter">
										<?php echo $med_home_bri=  (isset( $college_ideal_home['med_home_bri']))?$college_ideal_home['med_home_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_home_gha" data-title="Enter">
										<?php echo $med_home_gha=  (isset( $college_ideal_home['med_home_gha']))?$college_ideal_home['med_home_gha']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="text" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_home_gha_karon" data-title="Enter">
										<?php echo $med_home_gha_karon=  (isset( $college_ideal_home['med_home_gha_karon']))?$college_ideal_home['med_home_gha_karon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_stu_prev_num" data-title="Enter">
										<?php echo $med_stu_prev_num=  (isset( $college_ideal_home['med_stu_prev_num']))?$college_ideal_home['med_stu_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_stu_pres_num" data-title="Enter">
										<?php echo $med_stu_pres_num=  (isset( $college_ideal_home['med_stu_pres_num']))?$college_ideal_home['med_stu_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_stu_bri" data-title="Enter">
										<?php echo $med_stu_bri=  (isset( $college_ideal_home['med_stu_bri']))?$college_ideal_home['med_stu_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="med_stu_gha" data-title="Enter">
										<?php echo $med_stu_gha=  (isset( $college_ideal_home['med_stu_gha']))?$college_ideal_home['med_stu_gha']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_3">
                                    ইঞ্জিনিয়ারিং ভর্তিচ্ছু
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_home_prev_num" data-title="Enter">
										<?php echo $eng_home_prev_num=  (isset( $college_ideal_home['eng_home_prev_num']))?$college_ideal_home['eng_home_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_home_pres_num" data-title="Enter">
										<?php echo $eng_home_pres_num=  (isset( $college_ideal_home['eng_home_pres_num']))?$college_ideal_home['eng_home_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_home_bri" data-title="Enter">
										<?php echo $eng_home_bri=  (isset( $college_ideal_home['eng_home_bri']))?$college_ideal_home['eng_home_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_home_gha" data-title="Enter">
										<?php echo $eng_home_gha=  (isset( $college_ideal_home['eng_home_gha']))?$college_ideal_home['eng_home_gha']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="text" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_home_gha_karon" data-title="Enter">
										<?php echo $eng_home_gha_karon=  (isset( $college_ideal_home['eng_home_gha_karon']))?$college_ideal_home['eng_home_gha_karon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_stu_prev_num" data-title="Enter">
										<?php echo $eng_stu_prev_num=  (isset( $college_ideal_home['eng_stu_prev_num']))?$college_ideal_home['eng_stu_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_stu_pres_num" data-title="Enter">
										<?php echo $eng_stu_pres_num=  (isset( $college_ideal_home['eng_stu_pres_num']))?$college_ideal_home['eng_stu_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_stu_bri" data-title="Enter">
										<?php echo $eng_stu_bri=  (isset( $college_ideal_home['eng_stu_bri']))?$college_ideal_home['eng_stu_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="eng_stu_gha" data-title="Enter">
										<?php echo $eng_stu_gha=  (isset( $college_ideal_home['eng_stu_gha']))?$college_ideal_home['eng_stu_gha']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_3">
                                    বিশ্ববিদ্যালয় ভর্তিচ্ছু
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_home_prev_num" data-title="Enter">
										<?php echo $var_home_prev_num=  (isset( $college_ideal_home['var_home_prev_num']))?$college_ideal_home['var_home_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_home_pres_num" data-title="Enter">
										<?php echo $var_home_pres_num=  (isset( $college_ideal_home['var_home_pres_num']))?$college_ideal_home['var_home_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_home_bri" data-title="Enter">
										<?php echo $var_home_bri=  (isset( $college_ideal_home['var_home_bri']))?$college_ideal_home['var_home_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_home_gha" data-title="Enter">
										<?php echo $var_home_gha=  (isset( $college_ideal_home['var_home_gha']))?$college_ideal_home['var_home_gha']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="text" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_home_gha_karon" data-title="Enter">
										<?php echo $var_home_gha_karon=  (isset( $college_ideal_home['var_home_gha_karon']))?$college_ideal_home['var_home_gha_karon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_stu_prev_num" data-title="Enter">
										<?php echo $var_stu_prev_num=  (isset( $college_ideal_home['var_stu_prev_num']))?$college_ideal_home['var_stu_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_stu_pres_num" data-title="Enter">
										<?php echo $var_stu_pres_num=  (isset( $college_ideal_home['var_stu_pres_num']))?$college_ideal_home['var_stu_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_stu_bri" data-title="Enter">
										<?php echo $var_stu_bri=  (isset( $college_ideal_home['var_stu_bri']))?$college_ideal_home['var_stu_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="var_stu_gha" data-title="Enter">
										<?php echo $var_stu_gha=  (isset( $college_ideal_home['var_stu_gha']))?$college_ideal_home['var_stu_gha']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_3">
                                    কৃষি বিশ্ববিদ্যালয় ভর্তিচ্ছু
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_home_prev_num" data-title="Enter">
										<?php echo $agri_home_prev_num=  (isset( $college_ideal_home['agri_home_prev_num']))?$college_ideal_home['agri_home_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_home_pres_num" data-title="Enter">
										<?php echo $agri_home_pres_num=  (isset( $college_ideal_home['agri_home_pres_num']))?$college_ideal_home['agri_home_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_home_bri" data-title="Enter">
										<?php echo $agri_home_bri=  (isset( $college_ideal_home['agri_home_bri']))?$college_ideal_home['agri_home_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_home_gha" data-title="Enter">
										<?php echo $agri_home_gha=  (isset( $college_ideal_home['agri_home_gha']))?$college_ideal_home['agri_home_gha']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="text" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_home_gha_karon" data-title="Enter">
										<?php echo $agri_home_gha_karon=  (isset( $college_ideal_home['agri_home_gha_karon']))?$college_ideal_home['agri_home_gha_karon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_stu_prev_num" data-title="Enter">
										<?php echo $agri_stu_prev_num=  (isset( $college_ideal_home['agri_stu_prev_num']))?$college_ideal_home['agri_stu_prev_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_stu_pres_num" data-title="Enter">
										<?php echo $agri_stu_pres_num=  (isset( $college_ideal_home['agri_stu_pres_num']))?$college_ideal_home['agri_stu_pres_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_stu_bri" data-title="Enter">
										<?php echo $agri_stu_bri=  (isset( $college_ideal_home['agri_stu_bri']))?$college_ideal_home['agri_stu_bri']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_ideal_home" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="agri_stu_gha" data-title="Enter">
										<?php echo $agri_stu_gha=  (isset( $college_ideal_home['agri_stu_gha']))?$college_ideal_home['agri_stu_gha']:0; ?></a>
                                </td>

                            </tr>

                        </table> -->

                        <!-- third table -->
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                              <td class="tg-pwj7" colspan="9"><b>ব্রিজিং প্রজেক্ট: (তত্ত্বাবধানকারী শাখার জন্য)</b></td>
                              <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'College_ব্রিজিং প্রজেক্ট: (তত্ত্বাবধানকারী শাখার জন্য)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ব্রিজিং প্রজেক্টে শাখার কতজন জনশক্তি(তত্ত্বাবধায়ক)নিযুক্ত হয়েছেন ?</td>
                                <td class="tg-pwj7" colspan="4">নিয়মিত তত্ত্বাবধান  টার্গেট </td>
                                <td class="tg-pwj7" colspan="4">নিয়মিত তত্ত্বাবধান করা হচ্ছে</td>
                                <td class="tg-pwj7" colspan="2">তত্ত্বাবধানকৃতদের সাথে যোগাযোগ</td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>সদস্য	</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক ও সাধারণ ছাত্র</span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য	</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক ও সাধারণ ছাত্র</span></div></td>
                                <td class="tg-pwj7 "><div><span>কতজন	 </span></div></td>
                                <td class="tg-pwj7 "><div><span>কতবার </span></div></td>
                            </tr>
							<?php $pk = (isset($college_bridging_1['id']))?$college_bridging_1['id']:'';?>
                            <tr>
                                <td class="tg-0pky type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shakhar_jonoshokti_nijukto" data-title="Enter">
										<?php echo $shakhar_jonoshokti_nijukto=  (isset( $college_bridging_1['shakhar_jonoshokti_nijukto']))?$college_bridging_1['shakhar_jonoshokti_nijukto']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="target_member" data-title="Enter">
										<?php echo $target_member=  (isset( $college_bridging_1['target_member']))?$college_bridging_1['target_member']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="target_sathi" data-title="Enter">
										<?php echo $target_sathi=  (isset( $college_bridging_1['target_sathi']))?$college_bridging_1['target_sathi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="target_kormi" data-title="Enter">
										<?php echo $target_kormi=  (isset( $college_bridging_1['target_kormi']))?$college_bridging_1['target_kormi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="target_shomorthok" data-title="Enter">
										<?php echo $target_shomorthok=  (isset( $college_bridging_1['target_shomorthok']))?$college_bridging_1['target_shomorthok']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="s_vision_member" data-title="Enter">
										<?php echo $s_vision_member=  (isset( $college_bridging_1['s_vision_member']))?$college_bridging_1['s_vision_member']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="s_vision_sathi" data-title="Enter">
										<?php echo $s_vision_sathi=  (isset( $college_bridging_1['s_vision_sathi']))?$college_bridging_1['s_vision_sathi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="s_vision_kormi" data-title="Enter">
										<?php echo $s_vision_kormi=  (isset( $college_bridging_1['s_vision_kormi']))?$college_bridging_1['s_vision_kormi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="s_vision_shomorkthok" data-title="Enter">
										<?php echo $s_vision_shomorkthok=  (isset( $college_bridging_1['s_vision_shomorkthok']))?$college_bridging_1['s_vision_shomorkthok']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="s_vision_contact_jon" data-title="Enter">
										<?php echo $s_vision_contact_jon=  (isset( $college_bridging_1['s_vision_contact_jon']))?$college_bridging_1['s_vision_contact_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_1" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="s_vision_contact_bar" data-title="Enter">
										<?php echo $s_vision_contact_bar=  (isset( $college_bridging_1['s_vision_contact_bar']))?$college_bridging_1['s_vision_contact_bar']:0; ?></a>
                                </td>


                            </tr>

                        </table>

                        <!-- forth table -->
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                              <td class="tg-pwj7" colspan="9"><b>ব্রিজিং প্রজেক্ট (সকল শাখার জন্য)</b></td>
                              <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'College_ব্রিজিং প্রজেক্ট (সকল শাখার জন্য)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="4">এইচএসসি/আলিম প্রথম বর্ষে কতজন	</td>
                                <td class="tg-pwj7" colspan="4">এইচএসসি/আলিম ২য় বর্ষে কতজন </td>
                                <td class="tg-pwj7" rowspan="2">ব্রিজিং প্রজেক্টের অর্ন্তভূক্ত কতজন</td>
                                <td class="tg-pwj7" rowspan="2">কতজনকে নিয়মিত তত্ত্বাবধান করা হচ্ছে</td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>সদস্য	</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক</span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য	</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                            </tr>

							<?php $pk = (isset($college_bridging_2['id']))?$college_bridging_2['id']:'';?>

                            <tr>
                                <td class="tg-0pky type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_first_mem" data-title="Enter">
										<?php echo $hsc_first_mem=  (isset( $college_bridging_2['hsc_first_mem']))?$college_bridging_2['hsc_first_mem']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_first_asso" data-title="Enter">
										<?php echo $hsc_first_asso=  (isset( $college_bridging_2['hsc_first_asso']))?$college_bridging_2['hsc_first_asso']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_first_worker" data-title="Enter">
										<?php echo $hsc_first_worker=  (isset( $college_bridging_2['hsc_first_worker']))?$college_bridging_2['hsc_first_worker']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_first_suppor" data-title="Enter">
										<?php echo $hsc_first_suppor=  (isset( $college_bridging_2['hsc_first_suppor']))?$college_bridging_2['hsc_first_suppor']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_sec_mem" data-title="Enter">
										<?php echo $hsc_sec_mem=  (isset( $college_bridging_2['hsc_sec_mem']))?$college_bridging_2['hsc_sec_mem']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_sec_asso" data-title="Enter">
										<?php echo $hsc_sec_asso=  (isset( $college_bridging_2['hsc_sec_asso']))?$college_bridging_2['hsc_sec_asso']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_sec_worker" data-title="Enter">
										<?php echo $hsc_sec_worker=  (isset( $college_bridging_2['hsc_sec_worker']))?$college_bridging_2['hsc_sec_worker']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hsc_sec_suppor" data-title="Enter">
										<?php echo $hsc_sec_suppor=  (isset( $college_bridging_2['hsc_sec_suppor']))?$college_bridging_2['hsc_sec_suppor']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bridging_pro" data-title="Enter">
										<?php echo $bridging_pro=  (isset( $college_bridging_2['bridging_pro']))?$college_bridging_2['bridging_pro']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="college_bridging_2" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="supervision" data-title="Enter">
										<?php echo $supervision=  (isset( $college_bridging_2['supervision']))?$college_bridging_2['supervision']:0; ?></a>
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
