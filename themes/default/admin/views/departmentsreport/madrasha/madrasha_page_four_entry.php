<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০৪ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="10"><b>দাখিল ফল পরিসংখ্যান</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_দাখিল ফল পরিসংখ্যান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                               <td class="tg-pwj7" >ক্রম</td>
                              
                                <td class="tg-pwj7" colspan="2" >মান</td>
                                <td class="tg-pwj7" >মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" >  এ+</td>
                                <td class="tg-pwj7" > এ  </td>
                                <td class="tg-pwj7" >এ-   </td>
                                <td class="tg-pwj7" >বি  </td>
                                <td class="tg-pwj7" >সি  </td>
                                <td class="tg-pwj7" >ডি  </td>
                                <td class="tg-pwj7" >অকৃতকার্য</td>
                            </tr>


                            <?php
                            $pk = (isset($madrasah_dakhil_result['id']))?$madrasah_dakhil_result['id']:'';
                            ?>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"rowspan="2"> ১	</td>
                                <td class="tg-y698 type_1" rowspan="2"> সদস্য	</td>
                                <td class="tg-0pky">বিজ্ঞান </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_total" data-title="Enter"><?php echo $m_s_total=  (isset( $madrasah_dakhil_result['m_s_total']))? $madrasah_dakhil_result['m_s_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_a_plus" data-title="Enter"><?php echo $m_s_a_plus=  (isset( $madrasah_dakhil_result['m_s_a_plus']))? $madrasah_dakhil_result['m_s_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_a" data-title="Enter"><?php echo $m_s_a=  (isset( $madrasah_dakhil_result['m_s_a']))? $madrasah_dakhil_result['m_s_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_a_minus" data-title="Enter"><?php echo $m_s_a_minus=  (isset( $madrasah_dakhil_result['m_s_a_minus']))? $madrasah_dakhil_result['m_s_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_b" data-title="Enter"><?php echo $m_s_b=  (isset( $madrasah_dakhil_result['m_s_b']))? $madrasah_dakhil_result['m_s_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_c" data-title="Enter"><?php echo $m_s_c=  (isset( $madrasah_dakhil_result['m_s_c']))? $madrasah_dakhil_result['m_s_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_d" data-title="Enter"><?php echo $m_s_d=  (isset( $madrasah_dakhil_result['m_s_d']))? $madrasah_dakhil_result['m_s_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_fail" data-title="Enter"><?php echo $m_s_fail=  (isset( $madrasah_dakhil_result['m_s_fail']))? $madrasah_dakhil_result['m_s_fail']:0;?></a>
                                </td>  
                                
                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_total" data-title="Enter"><?php echo $m_a_total=  (isset( $madrasah_dakhil_result['m_a_total']))? $madrasah_dakhil_result['m_a_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_a_plus" data-title="Enter"><?php echo $m_a_a_plus=  (isset( $madrasah_dakhil_result['m_a_a_plus']))? $madrasah_dakhil_result['m_a_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_a" data-title="Enter"><?php echo $m_a_a=  (isset( $madrasah_dakhil_result['m_a_a']))? $madrasah_dakhil_result['m_a_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_a_minus" data-title="Enter"><?php echo $m_a_a_minus=  (isset( $madrasah_dakhil_result['m_a_a_minus']))? $madrasah_dakhil_result['m_a_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_b" data-title="Enter"><?php echo $m_a_b=  (isset( $madrasah_dakhil_result['m_a_b']))? $madrasah_dakhil_result['m_a_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_c" data-title="Enter"><?php echo $m_a_c=  (isset( $madrasah_dakhil_result['m_a_c']))? $madrasah_dakhil_result['m_a_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_d" data-title="Enter"><?php echo $m_a_d=  (isset( $madrasah_dakhil_result['m_a_d']))? $madrasah_dakhil_result['m_a_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_fail" data-title="Enter"><?php echo $m_a_fail=  (isset( $madrasah_dakhil_result['m_a_fail']))? $madrasah_dakhil_result['m_a_fail']:0;?></a>
                                </td>
                            </tr>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"rowspan="2"> ২ 	</td>
                                <td class="tg-y698 type_1" rowspan="2"> সাথী	</td>
                                <td class="tg-0pky">বিজ্ঞান </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_total" data-title="Enter"><?php echo $a_s_total=  (isset( $madrasah_dakhil_result['a_s_total']))? $madrasah_dakhil_result['a_s_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_a_plus" data-title="Enter"><?php echo $a_s_a_plus=  (isset( $madrasah_dakhil_result['a_s_a_plus']))? $madrasah_dakhil_result['a_s_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_a" data-title="Enter"><?php echo $a_s_a=  (isset( $madrasah_dakhil_result['a_s_a']))? $madrasah_dakhil_result['a_s_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_a_minus" data-title="Enter"><?php echo $a_s_a_minus=  (isset( $madrasah_dakhil_result['a_s_a_minus']))? $madrasah_dakhil_result['a_s_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_b" data-title="Enter"><?php echo $a_s_b=  (isset( $madrasah_dakhil_result['a_s_b']))? $madrasah_dakhil_result['a_s_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_c" data-title="Enter"><?php echo $a_s_c=  (isset( $madrasah_dakhil_result['a_s_c']))? $madrasah_dakhil_result['a_s_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_d" data-title="Enter"><?php echo $a_s_d=  (isset( $madrasah_dakhil_result['a_s_d']))? $madrasah_dakhil_result['a_s_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_fail" data-title="Enter"><?php echo $a_s_fail=  (isset( $madrasah_dakhil_result['a_s_fail']))? $madrasah_dakhil_result['a_s_fail']:0;?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_total" data-title="Enter"><?php echo $a_a_total=  (isset( $madrasah_dakhil_result['a_a_total']))? $madrasah_dakhil_result['a_a_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_a_plus" data-title="Enter"><?php echo $a_a_a_plus=  (isset( $madrasah_dakhil_result['a_a_a_plus']))? $madrasah_dakhil_result['a_a_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_a" data-title="Enter"><?php echo $a_a_a=  (isset( $madrasah_dakhil_result['a_a_a']))? $madrasah_dakhil_result['a_a_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_a_minus" data-title="Enter"><?php echo $a_a_a_minus=  (isset( $madrasah_dakhil_result['a_a_a_minus']))? $madrasah_dakhil_result['a_a_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_b" data-title="Enter"><?php echo $a_a_b=  (isset( $madrasah_dakhil_result['a_a_b']))? $madrasah_dakhil_result['a_a_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_c" data-title="Enter"><?php echo $a_a_c=  (isset( $madrasah_dakhil_result['a_a_c']))? $madrasah_dakhil_result['a_a_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_d" data-title="Enter"><?php echo $a_a_d=  (isset( $madrasah_dakhil_result['a_a_d']))? $madrasah_dakhil_result['a_a_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_fail" data-title="Enter"><?php echo $a_a_fail=  (isset( $madrasah_dakhil_result['a_a_fail']))? $madrasah_dakhil_result['a_a_fail']:0;?></a>
                                </td>
                            </tr>


                            <tr>
                            
                                <td class="tg-y698 type_1" rowspan="2"> ৩	</td>
                                <td class="tg-y698 type_1" rowspan="2"> কর্মী	</td>
                                
                                <td class="tg-0pky">বিজ্ঞান </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_total" data-title="Enter"><?php echo $w_s_total=  (isset( $madrasah_dakhil_result['w_s_total']))? $madrasah_dakhil_result['w_s_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_a_plus" data-title="Enter"><?php echo $w_s_a_plus=  (isset( $madrasah_dakhil_result['w_s_a_plus']))? $madrasah_dakhil_result['w_s_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_a" data-title="Enter"><?php echo $w_s_a=  (isset( $madrasah_dakhil_result['w_s_a']))? $madrasah_dakhil_result['w_s_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_a_minus" data-title="Enter"><?php echo $w_s_a_minus=  (isset( $madrasah_dakhil_result['w_s_a_minus']))? $madrasah_dakhil_result['w_s_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_b" data-title="Enter"><?php echo $w_s_b=  (isset( $madrasah_dakhil_result['w_s_b']))? $madrasah_dakhil_result['w_s_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_c" data-title="Enter"><?php echo $w_s_c=  (isset( $madrasah_dakhil_result['w_s_c']))? $madrasah_dakhil_result['w_s_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_d" data-title="Enter"><?php echo $w_s_d=  (isset( $madrasah_dakhil_result['w_s_d']))? $madrasah_dakhil_result['w_s_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_fail" data-title="Enter"><?php echo $w_s_fail=  (isset( $madrasah_dakhil_result['w_s_fail']))? $madrasah_dakhil_result['w_s_fail']:0;?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_total" data-title="Enter"><?php echo $w_a_total=  (isset( $madrasah_dakhil_result['w_a_total']))? $madrasah_dakhil_result['w_a_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_a_plus" data-title="Enter"><?php echo $w_a_a_plus=  (isset( $madrasah_dakhil_result['w_a_a_plus']))? $madrasah_dakhil_result['w_a_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_a" data-title="Enter"><?php echo $w_a_a=  (isset( $madrasah_dakhil_result['w_a_a']))? $madrasah_dakhil_result['w_a_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_a_minus" data-title="Enter"><?php echo $w_a_a_minus=  (isset( $madrasah_dakhil_result['w_a_a_minus']))? $madrasah_dakhil_result['w_a_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_b" data-title="Enter"><?php echo $w_a_b=  (isset( $madrasah_dakhil_result['w_a_b']))? $madrasah_dakhil_result['w_a_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_c" data-title="Enter"><?php echo $w_a_c=  (isset( $madrasah_dakhil_result['w_a_c']))? $madrasah_dakhil_result['w_a_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_d" data-title="Enter"><?php echo $w_a_d=  (isset( $madrasah_dakhil_result['w_a_d']))? $madrasah_dakhil_result['w_a_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_fail" data-title="Enter"><?php echo $w_a_fail=  (isset( $madrasah_dakhil_result['w_a_fail']))? $madrasah_dakhil_result['w_a_fail']:0;?></a>
                                </td>
                            </tr>
                            <tr>
                            
                                <td class="tg-y698 type_1"rowspan="2"> ৪	</td>
                                <td class="tg-y698" rowspan="2">সমর্থক  </td>
                                
                                <td class="tg-0pky">বিজ্ঞান </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_total" data-title="Enter"><?php echo $s_s_total=  (isset( $madrasah_dakhil_result['s_s_total']))? $madrasah_dakhil_result['s_s_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_a_plus" data-title="Enter"><?php echo $s_s_a_plus=  (isset( $madrasah_dakhil_result['s_s_a_plus']))? $madrasah_dakhil_result['s_s_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_a" data-title="Enter"><?php echo $s_s_a=  (isset( $madrasah_dakhil_result['s_s_a']))? $madrasah_dakhil_result['s_s_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_a_minus" data-title="Enter"><?php echo $s_s_a_minus=  (isset( $madrasah_dakhil_result['s_s_a_minus']))? $madrasah_dakhil_result['s_s_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_b" data-title="Enter"><?php echo $s_s_b=  (isset( $madrasah_dakhil_result['s_s_b']))? $madrasah_dakhil_result['s_s_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_c" data-title="Enter"><?php echo $s_s_c=  (isset( $madrasah_dakhil_result['s_s_c']))? $madrasah_dakhil_result['s_s_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_d" data-title="Enter"><?php echo $s_s_d=  (isset( $madrasah_dakhil_result['s_s_d']))? $madrasah_dakhil_result['s_s_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_fail" data-title="Enter"><?php echo $s_s_fail=  (isset( $madrasah_dakhil_result['s_s_fail']))? $madrasah_dakhil_result['s_s_fail']:0;?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">মানবিক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_total" data-title="Enter"><?php echo $s_a_total=  (isset( $madrasah_dakhil_result['s_a_total']))? $madrasah_dakhil_result['s_a_total']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_a_plus" data-title="Enter"><?php echo $s_a_a_plus=  (isset( $madrasah_dakhil_result['s_a_a_plus']))? $madrasah_dakhil_result['s_a_a_plus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_a" data-title="Enter"><?php echo $s_a_a=  (isset( $madrasah_dakhil_result['s_a_a']))? $madrasah_dakhil_result['s_a_a']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_a_minus" data-title="Enter"><?php echo $s_a_a_minus=  (isset( $madrasah_dakhil_result['s_a_a_minus']))? $madrasah_dakhil_result['s_a_a_minus']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_b" data-title="Enter"><?php echo $s_a_b=  (isset( $madrasah_dakhil_result['s_a_b']))? $madrasah_dakhil_result['s_a_b']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_c" data-title="Enter"><?php echo $s_a_c=  (isset( $madrasah_dakhil_result['s_a_c']))? $madrasah_dakhil_result['s_a_c']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_d" data-title="Enter"><?php echo $s_a_d=  (isset( $madrasah_dakhil_result['s_a_d']))? $madrasah_dakhil_result['s_a_d']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dakhil_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_fail" data-title="Enter"><?php echo $s_a_fail=  (isset( $madrasah_dakhil_result['s_a_fail']))? $madrasah_dakhil_result['s_a_fail']:0;?></a>
                                </td>
                            </tr>

                            
                      
                            <tr>
                                <td class="tg-0pky" colspan="3">মোট</td>    
                                <td class="tg-0pky" >
                                <?php echo ($m_s_total+$m_a_total+$a_s_total+$a_a_total+$w_s_total+$w_a_total+$s_s_total+$s_a_total) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_a_plus+$m_a_a_plus+$a_s_a_plus+$a_a_a_plus+$w_s_a_plus+$w_a_a_plus+$s_s_a_plus+$s_a_a_plus) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_a+$m_a_a+$a_s_a+$a_a_a+$w_s_a+$w_a_a+$s_s_a+$s_a_a) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_a_minus+$m_a_a_minus+$a_s_a_minus+$a_a_a_minus+$w_s_a_minus+$w_a_a_minus+$s_s_a_minus+$s_a_a_minus) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_b+$m_a_b+$a_s_b+$a_a_b+$w_s_b+$w_a_b+$s_s_b+$s_a_b) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_c+$m_a_c+$a_s_c+$a_a_c+$w_s_c+$w_a_c+$s_s_c+$s_a_c) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_d+$m_a_d+$a_s_d+$a_a_d+$w_s_d+$w_a_d+$s_s_d+$s_a_d) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_s_fail+$m_a_fail+$a_s_fail+$a_a_fail+$w_s_fail+$w_a_fail+$s_s_fail+$s_a_fail) ?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="10"><b>আলিম ফল পরিসংখ্যান</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Madrasha_আলিম ফল পরিসংখ্যান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                               <td class="tg-pwj7" >ক্রম</td>
                              
                                <td class="tg-pwj7" colspan="2" >মান</td>
                                <td class="tg-pwj7" >মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" >  এ+</td>
                                <td class="tg-pwj7" > এ  </td>
                                <td class="tg-pwj7" >এ-   </td>
                                <td class="tg-pwj7" >বি  </td>
                                <td class="tg-pwj7" >সি  </td>
                                <td class="tg-pwj7" >ডি  </td>
                                <td class="tg-pwj7" >অকৃতকার্য</td>
                            </tr>

                            <?php
                            $pk = (isset($madrasah_alim_result['id']))?$madrasah_alim_result['id']:'';
                            ?>

                        
<tr>
                            
                            
                                
                            <td class="tg-y698 type_1"rowspan="2"> ১	</td>
                            <td class="tg-y698 type_1" rowspan="2"> সদস্য	</td>
                            <td class="tg-0pky">বিজ্ঞান </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_total" data-title="Enter"><?php echo $m_s_total=  (isset( $madrasah_alim_result['m_s_total']))? $madrasah_alim_result['m_s_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_a_plus" data-title="Enter"><?php echo $m_s_a_plus=  (isset( $madrasah_alim_result['m_s_a_plus']))? $madrasah_alim_result['m_s_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_a" data-title="Enter"><?php echo $m_s_a=  (isset( $madrasah_alim_result['m_s_a']))? $madrasah_alim_result['m_s_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_a_minus" data-title="Enter"><?php echo $m_s_a_minus=  (isset( $madrasah_alim_result['m_s_a_minus']))? $madrasah_alim_result['m_s_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_b" data-title="Enter"><?php echo $m_s_b=  (isset( $madrasah_alim_result['m_s_b']))? $madrasah_alim_result['m_s_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_c" data-title="Enter"><?php echo $m_s_c=  (isset( $madrasah_alim_result['m_s_c']))? $madrasah_alim_result['m_s_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_d" data-title="Enter"><?php echo $m_s_d=  (isset( $madrasah_alim_result['m_s_d']))? $madrasah_alim_result['m_s_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_s_fail" data-title="Enter"><?php echo $m_s_fail=  (isset( $madrasah_alim_result['m_s_fail']))? $madrasah_alim_result['m_s_fail']:0;?></a>
                            </td>  
                            
                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_total" data-title="Enter"><?php echo $m_a_total=  (isset( $madrasah_alim_result['m_a_total']))? $madrasah_alim_result['m_a_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_a_plus" data-title="Enter"><?php echo $m_a_a_plus=  (isset( $madrasah_alim_result['m_a_a_plus']))? $madrasah_alim_result['m_a_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_a" data-title="Enter"><?php echo $m_a_a=  (isset( $madrasah_alim_result['m_a_a']))? $madrasah_alim_result['m_a_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_a_minus" data-title="Enter"><?php echo $m_a_a_minus=  (isset( $madrasah_alim_result['m_a_a_minus']))? $madrasah_alim_result['m_a_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_b" data-title="Enter"><?php echo $m_a_b=  (isset( $madrasah_alim_result['m_a_b']))? $madrasah_alim_result['m_a_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_c" data-title="Enter"><?php echo $m_a_c=  (isset( $madrasah_alim_result['m_a_c']))? $madrasah_alim_result['m_a_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_d" data-title="Enter"><?php echo $m_a_d=  (isset( $madrasah_alim_result['m_a_d']))? $madrasah_alim_result['m_a_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="m_a_fail" data-title="Enter"><?php echo $m_a_fail=  (isset( $madrasah_alim_result['m_a_fail']))? $madrasah_alim_result['m_a_fail']:0;?></a>
                            </td>
                        </tr>

                        <tr>
                        
                        
                            
                            <td class="tg-y698 type_1"rowspan="2"> ২ 	</td>
                            <td class="tg-y698 type_1" rowspan="2"> সাথী	</td>
                            <td class="tg-0pky">বিজ্ঞান </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_total" data-title="Enter"><?php echo $a_s_total=  (isset( $madrasah_alim_result['a_s_total']))? $madrasah_alim_result['a_s_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_a_plus" data-title="Enter"><?php echo $a_s_a_plus=  (isset( $madrasah_alim_result['a_s_a_plus']))? $madrasah_alim_result['a_s_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_a" data-title="Enter"><?php echo $a_s_a=  (isset( $madrasah_alim_result['a_s_a']))? $madrasah_alim_result['a_s_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_a_minus" data-title="Enter"><?php echo $a_s_a_minus=  (isset( $madrasah_alim_result['a_s_a_minus']))? $madrasah_alim_result['a_s_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_b" data-title="Enter"><?php echo $a_s_b=  (isset( $madrasah_alim_result['a_s_b']))? $madrasah_alim_result['a_s_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_c" data-title="Enter"><?php echo $a_s_c=  (isset( $madrasah_alim_result['a_s_c']))? $madrasah_alim_result['a_s_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_d" data-title="Enter"><?php echo $a_s_d=  (isset( $madrasah_alim_result['a_s_d']))? $madrasah_alim_result['a_s_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_s_fail" data-title="Enter"><?php echo $a_s_fail=  (isset( $madrasah_alim_result['a_s_fail']))? $madrasah_alim_result['a_s_fail']:0;?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_total" data-title="Enter"><?php echo $a_a_total=  (isset( $madrasah_alim_result['a_a_total']))? $madrasah_alim_result['a_a_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_a_plus" data-title="Enter"><?php echo $a_a_a_plus=  (isset( $madrasah_alim_result['a_a_a_plus']))? $madrasah_alim_result['a_a_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_a" data-title="Enter"><?php echo $a_a_a=  (isset( $madrasah_alim_result['a_a_a']))? $madrasah_alim_result['a_a_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_a_minus" data-title="Enter"><?php echo $a_a_a_minus=  (isset( $madrasah_alim_result['a_a_a_minus']))? $madrasah_alim_result['a_a_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_b" data-title="Enter"><?php echo $a_a_b=  (isset( $madrasah_alim_result['a_a_b']))? $madrasah_alim_result['a_a_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_c" data-title="Enter"><?php echo $a_a_c=  (isset( $madrasah_alim_result['a_a_c']))? $madrasah_alim_result['a_a_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_d" data-title="Enter"><?php echo $a_a_d=  (isset( $madrasah_alim_result['a_a_d']))? $madrasah_alim_result['a_a_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_a_fail" data-title="Enter"><?php echo $a_a_fail=  (isset( $madrasah_alim_result['a_a_fail']))? $madrasah_alim_result['a_a_fail']:0;?></a>
                            </td>
                        </tr>


                        <tr>
                        
                            <td class="tg-y698 type_1" rowspan="2"> ৩	</td>
                            <td class="tg-y698 type_1" rowspan="2"> কর্মী	</td>
                            
                            <td class="tg-0pky">বিজ্ঞান </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_total" data-title="Enter"><?php echo $w_s_total=  (isset( $madrasah_alim_result['w_s_total']))? $madrasah_alim_result['w_s_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_a_plus" data-title="Enter"><?php echo $w_s_a_plus=  (isset( $madrasah_alim_result['w_s_a_plus']))? $madrasah_alim_result['w_s_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_a" data-title="Enter"><?php echo $w_s_a=  (isset( $madrasah_alim_result['w_s_a']))? $madrasah_alim_result['w_s_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_a_minus" data-title="Enter"><?php echo $w_s_a_minus=  (isset( $madrasah_alim_result['w_s_a_minus']))? $madrasah_alim_result['w_s_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_b" data-title="Enter"><?php echo $w_s_b=  (isset( $madrasah_alim_result['w_s_b']))? $madrasah_alim_result['w_s_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_c" data-title="Enter"><?php echo $w_s_c=  (isset( $madrasah_alim_result['w_s_c']))? $madrasah_alim_result['w_s_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_d" data-title="Enter"><?php echo $w_s_d=  (isset( $madrasah_alim_result['w_s_d']))? $madrasah_alim_result['w_s_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_s_fail" data-title="Enter"><?php echo $w_s_fail=  (isset( $madrasah_alim_result['w_s_fail']))? $madrasah_alim_result['w_s_fail']:0;?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_total" data-title="Enter"><?php echo $w_a_total=  (isset( $madrasah_alim_result['w_a_total']))? $madrasah_alim_result['w_a_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_a_plus" data-title="Enter"><?php echo $w_a_a_plus=  (isset( $madrasah_alim_result['w_a_a_plus']))? $madrasah_alim_result['w_a_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_a" data-title="Enter"><?php echo $w_a_a=  (isset( $madrasah_alim_result['w_a_a']))? $madrasah_alim_result['w_a_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_a_minus" data-title="Enter"><?php echo $w_a_a_minus=  (isset( $madrasah_alim_result['w_a_a_minus']))? $madrasah_alim_result['w_a_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_b" data-title="Enter"><?php echo $w_a_b=  (isset( $madrasah_alim_result['w_a_b']))? $madrasah_alim_result['w_a_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_c" data-title="Enter"><?php echo $w_a_c=  (isset( $madrasah_alim_result['w_a_c']))? $madrasah_alim_result['w_a_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_d" data-title="Enter"><?php echo $w_a_d=  (isset( $madrasah_alim_result['w_a_d']))? $madrasah_alim_result['w_a_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="w_a_fail" data-title="Enter"><?php echo $w_a_fail=  (isset( $madrasah_alim_result['w_a_fail']))? $madrasah_alim_result['w_a_fail']:0;?></a>
                            </td>
                        </tr>
                        <tr>
                        
                            <td class="tg-y698 type_1"rowspan="2"> ৪	</td>
                            <td class="tg-y698" rowspan="2">সমর্থক  </td>
                            
                            <td class="tg-0pky">বিজ্ঞান </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_total" data-title="Enter"><?php echo $s_s_total=  (isset( $madrasah_alim_result['s_s_total']))? $madrasah_alim_result['s_s_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_a_plus" data-title="Enter"><?php echo $s_s_a_plus=  (isset( $madrasah_alim_result['s_s_a_plus']))? $madrasah_alim_result['s_s_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_a" data-title="Enter"><?php echo $s_s_a=  (isset( $madrasah_alim_result['s_s_a']))? $madrasah_alim_result['s_s_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_a_minus" data-title="Enter"><?php echo $s_s_a_minus=  (isset( $madrasah_alim_result['s_s_a_minus']))? $madrasah_alim_result['s_s_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_b" data-title="Enter"><?php echo $s_s_b=  (isset( $madrasah_alim_result['s_s_b']))? $madrasah_alim_result['s_s_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_c" data-title="Enter"><?php echo $s_s_c=  (isset( $madrasah_alim_result['s_s_c']))? $madrasah_alim_result['s_s_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_d" data-title="Enter"><?php echo $s_s_d=  (isset( $madrasah_alim_result['s_s_d']))? $madrasah_alim_result['s_s_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_s_fail" data-title="Enter"><?php echo $s_s_fail=  (isset( $madrasah_alim_result['s_s_fail']))? $madrasah_alim_result['s_s_fail']:0;?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_total" data-title="Enter"><?php echo $s_a_total=  (isset( $madrasah_alim_result['s_a_total']))? $madrasah_alim_result['s_a_total']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_a_plus" data-title="Enter"><?php echo $s_a_a_plus=  (isset( $madrasah_alim_result['s_a_a_plus']))? $madrasah_alim_result['s_a_a_plus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_a" data-title="Enter"><?php echo $s_a_a=  (isset( $madrasah_alim_result['s_a_a']))? $madrasah_alim_result['s_a_a']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_a_minus" data-title="Enter"><?php echo $s_a_a_minus=  (isset( $madrasah_alim_result['s_a_a_minus']))? $madrasah_alim_result['s_a_a_minus']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_b" data-title="Enter"><?php echo $s_a_b=  (isset( $madrasah_alim_result['s_a_b']))? $madrasah_alim_result['s_a_b']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_c" data-title="Enter"><?php echo $s_a_c=  (isset( $madrasah_alim_result['s_a_c']))? $madrasah_alim_result['s_a_c']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_d" data-title="Enter"><?php echo $s_a_d=  (isset( $madrasah_alim_result['s_a_d']))? $madrasah_alim_result['s_a_d']:0;?></a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_alim_result" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="s_a_fail" data-title="Enter"><?php echo $s_a_fail=  (isset( $madrasah_alim_result['s_a_fail']))? $madrasah_alim_result['s_a_fail']:0;?></a>
                            </td>
                        </tr>

                        
                  
                        <tr>
                            <td class="tg-0pky" colspan="3">মোট</td>    
                            <td class="tg-0pky" >
                            <?php echo ($m_s_total+$m_a_total+$a_s_total+$a_a_total+$w_s_total+$w_a_total+$s_s_total+$s_a_total) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_a_plus+$m_a_a_plus+$a_s_a_plus+$a_a_a_plus+$w_s_a_plus+$w_a_a_plus+$s_s_a_plus+$s_a_a_plus) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_a+$m_a_a+$a_s_a+$a_a_a+$w_s_a+$w_a_a+$s_s_a+$s_a_a) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_a_minus+$m_a_a_minus+$a_s_a_minus+$a_a_a_minus+$w_s_a_minus+$w_a_a_minus+$s_s_a_minus+$s_a_a_minus) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_b+$m_a_b+$a_s_b+$a_a_b+$w_s_b+$w_a_b+$s_s_b+$s_a_b) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_c+$m_a_c+$a_s_c+$a_a_c+$w_s_c+$w_a_c+$s_s_c+$s_a_c) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_d+$m_a_d+$a_s_d+$a_a_d+$w_s_d+$w_a_d+$s_s_d+$s_a_d) ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($m_s_fail+$m_a_fail+$a_s_fail+$a_a_fail+$w_s_fail+$w_a_fail+$s_s_fail+$s_a_fail) ?>
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
