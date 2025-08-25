<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="12"><b>এক নজরে মাদরাসাসমূহে সংগঠন  </b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_এক নজরে মাদরাসাসমূহে সংগঠন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">মাদরাসা</td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>সংগঠন আছে </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>থানা মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ওয়ার্ড/জোন মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপশাখা মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক সংগঠন মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংগঠন নেই </span></div></td>
                                
                                
                               
                            </tr>

                            <?php
                            $pk = (isset($madrasah_eknojore_shongothon_1['id']))?$madrasah_eknojore_shongothon_1['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> কামিল	মাদরাসা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_mot" data-title="Enter"><?php echo $kamil_mot=  (isset( $madrasah_eknojore_shongothon_1['kamil_mot']))? $madrasah_eknojore_shongothon_1['kamil_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_shongothon" data-title="Enter"><?php echo $kamil_shongothon=  (isset( $madrasah_eknojore_shongothon_1['kamil_shongothon']))? $madrasah_eknojore_shongothon_1['kamil_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_shongothon_bri" data-title="Enter"><?php echo $kamil_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['kamil_shongothon_bri']))? $madrasah_eknojore_shongothon_1['kamil_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_thana" data-title="Enter"><?php echo $kamil_thana=  (isset( $madrasah_eknojore_shongothon_1['kamil_thana']))? $madrasah_eknojore_shongothon_1['kamil_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_thana_bri" data-title="Enter"><?php echo $kamil_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['kamil_thana_bri']))? $madrasah_eknojore_shongothon_1['kamil_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_word" data-title="Enter"><?php echo $kamil_word=  (isset( $madrasah_eknojore_shongothon_1['kamil_word']))? $madrasah_eknojore_shongothon_1['kamil_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_word_bri" data-title="Enter"><?php echo $kamil_word_bri=  (isset( $madrasah_eknojore_shongothon_1['kamil_word_bri']))? $madrasah_eknojore_shongothon_1['kamil_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_up" data-title="Enter"><?php echo $kamil_up=  (isset( $madrasah_eknojore_shongothon_1['kamil_up']))? $madrasah_eknojore_shongothon_1['kamil_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_up_bri" data-title="Enter"><?php echo $kamil_up_bri=  (isset( $madrasah_eknojore_shongothon_1['kamil_up_bri']))? $madrasah_eknojore_shongothon_1['kamil_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_ss" data-title="Enter"><?php echo $kamil_ss=  (isset( $madrasah_eknojore_shongothon_1['kamil_ss']))? $madrasah_eknojore_shongothon_1['kamil_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_ss_bri" data-title="Enter"><?php echo $kamil_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['kamil_ss_bri']))? $madrasah_eknojore_shongothon_1['kamil_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kamil_s_nei" data-title="Enter"><?php echo $kamil_s_nei=  (isset( $madrasah_eknojore_shongothon_1['kamil_s_nei']))? $madrasah_eknojore_shongothon_1['kamil_s_nei']:0;?></a>
                                </td>
              
                            </tr>

                           

                            <tr>
                                <td class="tg-y698">ফাযিল মাদরাসা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_mot" data-title="Enter"><?php echo $fajil_mot=  (isset( $madrasah_eknojore_shongothon_1['fajil_mot']))? $madrasah_eknojore_shongothon_1['fajil_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_shongothon" data-title="Enter"><?php echo $fajil_shongothon=  (isset( $madrasah_eknojore_shongothon_1['fajil_shongothon']))? $madrasah_eknojore_shongothon_1['fajil_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_shongothon_bri" data-title="Enter"><?php echo $fajil_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['fajil_shongothon_bri']))? $madrasah_eknojore_shongothon_1['fajil_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_thana" data-title="Enter"><?php echo $fajil_thana=  (isset( $madrasah_eknojore_shongothon_1['fajil_thana']))? $madrasah_eknojore_shongothon_1['fajil_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_thana_bri" data-title="Enter"><?php echo $fajil_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['fajil_thana_bri']))? $madrasah_eknojore_shongothon_1['fajil_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_word" data-title="Enter"><?php echo $fajil_word=  (isset( $madrasah_eknojore_shongothon_1['fajil_word']))? $madrasah_eknojore_shongothon_1['fajil_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_word_bri" data-title="Enter"><?php echo $fajil_word_bri=  (isset( $madrasah_eknojore_shongothon_1['fajil_word_bri']))? $madrasah_eknojore_shongothon_1['fajil_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_up" data-title="Enter"><?php echo $fajil_up=  (isset( $madrasah_eknojore_shongothon_1['fajil_up']))? $madrasah_eknojore_shongothon_1['fajil_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_up_bri" data-title="Enter"><?php echo $fajil_up_bri=  (isset( $madrasah_eknojore_shongothon_1['fajil_up_bri']))? $madrasah_eknojore_shongothon_1['fajil_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_ss" data-title="Enter"><?php echo $fajil_ss=  (isset( $madrasah_eknojore_shongothon_1['fajil_ss']))? $madrasah_eknojore_shongothon_1['fajil_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_ss_bri" data-title="Enter"><?php echo $fajil_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['fajil_ss_bri']))? $madrasah_eknojore_shongothon_1['fajil_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fajil_s_nei" data-title="Enter"><?php echo $fajil_s_nei=  (isset( $madrasah_eknojore_shongothon_1['fajil_s_nei']))? $madrasah_eknojore_shongothon_1['fajil_s_nei']:0;?></a>
                                </td>
                            </tr>
                          
                            <tr>
                                <td class="tg-y698">আলিম মাদরাসা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_mot" data-title="Enter"><?php echo $alim_mot=  (isset( $madrasah_eknojore_shongothon_1['alim_mot']))? $madrasah_eknojore_shongothon_1['alim_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_shongothon" data-title="Enter"><?php echo $alim_shongothon=  (isset( $madrasah_eknojore_shongothon_1['alim_shongothon']))? $madrasah_eknojore_shongothon_1['alim_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_shongothon_bri" data-title="Enter"><?php echo $alim_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['alim_shongothon_bri']))? $madrasah_eknojore_shongothon_1['alim_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_thana" data-title="Enter"><?php echo $alim_thana=  (isset( $madrasah_eknojore_shongothon_1['alim_thana']))? $madrasah_eknojore_shongothon_1['alim_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_thana_bri" data-title="Enter"><?php echo $alim_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['alim_thana_bri']))? $madrasah_eknojore_shongothon_1['alim_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_word" data-title="Enter"><?php echo $alim_word=  (isset( $madrasah_eknojore_shongothon_1['alim_word']))? $madrasah_eknojore_shongothon_1['alim_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_word_bri" data-title="Enter"><?php echo $alim_word_bri=  (isset( $madrasah_eknojore_shongothon_1['alim_word_bri']))? $madrasah_eknojore_shongothon_1['alim_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_up" data-title="Enter"><?php echo $alim_up=  (isset( $madrasah_eknojore_shongothon_1['alim_up']))? $madrasah_eknojore_shongothon_1['alim_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_up_bri" data-title="Enter"><?php echo $alim_up_bri=  (isset( $madrasah_eknojore_shongothon_1['alim_up_bri']))? $madrasah_eknojore_shongothon_1['alim_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_ss" data-title="Enter"><?php echo $alim_ss=  (isset( $madrasah_eknojore_shongothon_1['alim_ss']))? $madrasah_eknojore_shongothon_1['alim_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_ss_bri" data-title="Enter"><?php echo $alim_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['alim_ss_bri']))? $madrasah_eknojore_shongothon_1['alim_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alim_s_nei" data-title="Enter"><?php echo $alim_s_nei=  (isset( $madrasah_eknojore_shongothon_1['alim_s_nei']))? $madrasah_eknojore_shongothon_1['alim_s_nei']:0;?></a>
                                </td>
              
                            </tr>
                           

                            <tr>
                                <td class="tg-y698">দাখিল মাদরাসা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_mot" data-title="Enter"><?php echo $dakhil_mot=  (isset( $madrasah_eknojore_shongothon_1['dakhil_mot']))? $madrasah_eknojore_shongothon_1['dakhil_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_shongothon" data-title="Enter"><?php echo $dakhil_shongothon=  (isset( $madrasah_eknojore_shongothon_1['dakhil_shongothon']))? $madrasah_eknojore_shongothon_1['dakhil_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_shongothon_bri" data-title="Enter"><?php echo $dakhil_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['dakhil_shongothon_bri']))? $madrasah_eknojore_shongothon_1['dakhil_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_thana" data-title="Enter"><?php echo $dakhil_thana=  (isset( $madrasah_eknojore_shongothon_1['dakhil_thana']))? $madrasah_eknojore_shongothon_1['dakhil_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_thana_bri" data-title="Enter"><?php echo $dakhil_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['dakhil_thana_bri']))? $madrasah_eknojore_shongothon_1['dakhil_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_word" data-title="Enter"><?php echo $dakhil_word=  (isset( $madrasah_eknojore_shongothon_1['dakhil_word']))? $madrasah_eknojore_shongothon_1['dakhil_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_word_bri" data-title="Enter"><?php echo $dakhil_word_bri=  (isset( $madrasah_eknojore_shongothon_1['dakhil_word_bri']))? $madrasah_eknojore_shongothon_1['dakhil_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_up" data-title="Enter"><?php echo $dakhil_up=  (isset( $madrasah_eknojore_shongothon_1['dakhil_up']))? $madrasah_eknojore_shongothon_1['dakhil_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_up_bri" data-title="Enter"><?php echo $dakhil_up_bri=  (isset( $madrasah_eknojore_shongothon_1['dakhil_up_bri']))? $madrasah_eknojore_shongothon_1['dakhil_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_ss" data-title="Enter"><?php echo $dakhil_ss=  (isset( $madrasah_eknojore_shongothon_1['dakhil_ss']))? $madrasah_eknojore_shongothon_1['dakhil_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_ss_bri" data-title="Enter"><?php echo $dakhil_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['dakhil_ss_bri']))? $madrasah_eknojore_shongothon_1['dakhil_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dakhil_s_nei" data-title="Enter"><?php echo $dakhil_s_nei=  (isset( $madrasah_eknojore_shongothon_1['dakhil_s_nei']))? $madrasah_eknojore_shongothon_1['dakhil_s_nei']:0;?></a>
                                </td>
              
                            </tr>

                           

                            <tr>
                                <td class="tg-y698">প্রাইভেট মাদরাসা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_mot" data-title="Enter"><?php echo $private_mot=  (isset( $madrasah_eknojore_shongothon_1['private_mot']))? $madrasah_eknojore_shongothon_1['private_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_shongothon" data-title="Enter"><?php echo $private_shongothon=  (isset( $madrasah_eknojore_shongothon_1['private_shongothon']))? $madrasah_eknojore_shongothon_1['private_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_shongothon_bri" data-title="Enter"><?php echo $private_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['private_shongothon_bri']))? $madrasah_eknojore_shongothon_1['private_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_thana" data-title="Enter"><?php echo $private_thana=  (isset( $madrasah_eknojore_shongothon_1['private_thana']))? $madrasah_eknojore_shongothon_1['private_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_thana_bri" data-title="Enter"><?php echo $private_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['private_thana_bri']))? $madrasah_eknojore_shongothon_1['private_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_word" data-title="Enter"><?php echo $private_word=  (isset( $madrasah_eknojore_shongothon_1['private_word']))? $madrasah_eknojore_shongothon_1['private_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_word_bri" data-title="Enter"><?php echo $private_word_bri=  (isset( $madrasah_eknojore_shongothon_1['private_word_bri']))? $madrasah_eknojore_shongothon_1['private_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_up" data-title="Enter"><?php echo $private_up=  (isset( $madrasah_eknojore_shongothon_1['private_up']))? $madrasah_eknojore_shongothon_1['private_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_up_bri" data-title="Enter"><?php echo $private_up_bri=  (isset( $madrasah_eknojore_shongothon_1['private_up_bri']))? $madrasah_eknojore_shongothon_1['private_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_ss" data-title="Enter"><?php echo $private_ss=  (isset( $madrasah_eknojore_shongothon_1['private_ss']))? $madrasah_eknojore_shongothon_1['private_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_ss_bri" data-title="Enter"><?php echo $private_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['private_ss_bri']))? $madrasah_eknojore_shongothon_1['private_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="private_s_nei" data-title="Enter"><?php echo $private_s_nei=  (isset( $madrasah_eknojore_shongothon_1['private_s_nei']))? $madrasah_eknojore_shongothon_1['private_s_nei']:0;?></a>
                                </td>
              
                            </tr>
                           

                            <tr>
                                <td class="tg-y698">ইবতেদায়ী মাদরাসা  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_mot" data-title="Enter"><?php echo $ibte_mot=  (isset( $madrasah_eknojore_shongothon_1['ibte_mot']))? $madrasah_eknojore_shongothon_1['ibte_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_shongothon" data-title="Enter"><?php echo $ibte_shongothon=  (isset( $madrasah_eknojore_shongothon_1['ibte_shongothon']))? $madrasah_eknojore_shongothon_1['ibte_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_shongothon_bri" data-title="Enter"><?php echo $ibte_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['ibte_shongothon_bri']))? $madrasah_eknojore_shongothon_1['ibte_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_thana" data-title="Enter"><?php echo $ibte_thana=  (isset( $madrasah_eknojore_shongothon_1['ibte_thana']))? $madrasah_eknojore_shongothon_1['ibte_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_thana_bri" data-title="Enter"><?php echo $ibte_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['ibte_thana_bri']))? $madrasah_eknojore_shongothon_1['ibte_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_word" data-title="Enter"><?php echo $ibte_word=  (isset( $madrasah_eknojore_shongothon_1['ibte_word']))? $madrasah_eknojore_shongothon_1['ibte_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_word_bri" data-title="Enter"><?php echo $ibte_word_bri=  (isset( $madrasah_eknojore_shongothon_1['ibte_word_bri']))? $madrasah_eknojore_shongothon_1['ibte_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_up" data-title="Enter"><?php echo $ibte_up=  (isset( $madrasah_eknojore_shongothon_1['ibte_up']))? $madrasah_eknojore_shongothon_1['ibte_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_up_bri" data-title="Enter"><?php echo $ibte_up_bri=  (isset( $madrasah_eknojore_shongothon_1['ibte_up_bri']))? $madrasah_eknojore_shongothon_1['ibte_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_ss" data-title="Enter"><?php echo $ibte_ss=  (isset( $madrasah_eknojore_shongothon_1['ibte_ss']))? $madrasah_eknojore_shongothon_1['ibte_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_ss_bri" data-title="Enter"><?php echo $ibte_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['ibte_ss_bri']))? $madrasah_eknojore_shongothon_1['ibte_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ibte_s_nei" data-title="Enter"><?php echo $ibte_s_nei=  (isset( $madrasah_eknojore_shongothon_1['ibte_s_nei']))? $madrasah_eknojore_shongothon_1['ibte_s_nei']:0;?></a>
                                </td>
              

                            </tr>
                           

                            <tr>
                                <td class="tg-y698">হাফিজি মাদরাসা (কওমি ছাড়া)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_mot" data-title="Enter"><?php echo $hafeji_mot=  (isset( $madrasah_eknojore_shongothon_1['hafeji_mot']))? $madrasah_eknojore_shongothon_1['hafeji_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_shongothon" data-title="Enter"><?php echo $hafeji_shongothon=  (isset( $madrasah_eknojore_shongothon_1['hafeji_shongothon']))? $madrasah_eknojore_shongothon_1['hafeji_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_shongothon_bri" data-title="Enter"><?php echo $hafeji_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['hafeji_shongothon_bri']))? $madrasah_eknojore_shongothon_1['hafeji_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_thana" data-title="Enter"><?php echo $hafeji_thana=  (isset( $madrasah_eknojore_shongothon_1['hafeji_thana']))? $madrasah_eknojore_shongothon_1['hafeji_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_thana_bri" data-title="Enter"><?php echo $hafeji_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['hafeji_thana_bri']))? $madrasah_eknojore_shongothon_1['hafeji_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_word" data-title="Enter"><?php echo $hafeji_word=  (isset( $madrasah_eknojore_shongothon_1['hafeji_word']))? $madrasah_eknojore_shongothon_1['hafeji_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_word_bri" data-title="Enter"><?php echo $hafeji_word_bri=  (isset( $madrasah_eknojore_shongothon_1['hafeji_word_bri']))? $madrasah_eknojore_shongothon_1['hafeji_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_up" data-title="Enter"><?php echo $hafeji_up=  (isset( $madrasah_eknojore_shongothon_1['hafeji_up']))? $madrasah_eknojore_shongothon_1['hafeji_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_up_bri" data-title="Enter"><?php echo $hafeji_up_bri=  (isset( $madrasah_eknojore_shongothon_1['hafeji_up_bri']))? $madrasah_eknojore_shongothon_1['hafeji_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_ss" data-title="Enter"><?php echo $hafeji_ss=  (isset( $madrasah_eknojore_shongothon_1['hafeji_ss']))? $madrasah_eknojore_shongothon_1['hafeji_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_ss_bri" data-title="Enter"><?php echo $hafeji_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['hafeji_ss_bri']))? $madrasah_eknojore_shongothon_1['hafeji_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafeji_s_nei" data-title="Enter"><?php echo $hafeji_s_nei=  (isset( $madrasah_eknojore_shongothon_1['hafeji_s_nei']))? $madrasah_eknojore_shongothon_1['hafeji_s_nei']:0;?></a>
                                </td>
              
                            </tr>
                            <tr>
                                <td class="tg-y698">নূরানি মাদরাসা (কওমি ছাড়া)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_mot" data-title="Enter"><?php echo $nurani_mot=  (isset( $madrasah_eknojore_shongothon_1['nurani_mot']))? $madrasah_eknojore_shongothon_1['nurani_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_shongothon" data-title="Enter"><?php echo $nurani_shongothon=  (isset( $madrasah_eknojore_shongothon_1['nurani_shongothon']))? $madrasah_eknojore_shongothon_1['nurani_shongothon']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_shongothon_bri" data-title="Enter"><?php echo $nurani_shongothon_bri=  (isset( $madrasah_eknojore_shongothon_1['nurani_shongothon_bri']))? $madrasah_eknojore_shongothon_1['nurani_shongothon_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_thana" data-title="Enter"><?php echo $nurani_thana=  (isset( $madrasah_eknojore_shongothon_1['nurani_thana']))? $madrasah_eknojore_shongothon_1['nurani_thana']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_thana_bri" data-title="Enter"><?php echo $nurani_thana_bri=  (isset( $madrasah_eknojore_shongothon_1['nurani_thana_bri']))? $madrasah_eknojore_shongothon_1['nurani_thana_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_word" data-title="Enter"><?php echo $nurani_word=  (isset( $madrasah_eknojore_shongothon_1['nurani_word']))? $madrasah_eknojore_shongothon_1['nurani_word']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_word_bri" data-title="Enter"><?php echo $nurani_word_bri=  (isset( $madrasah_eknojore_shongothon_1['nurani_word_bri']))? $madrasah_eknojore_shongothon_1['nurani_word_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_up" data-title="Enter"><?php echo $nurani_up=  (isset( $madrasah_eknojore_shongothon_1['nurani_up']))? $madrasah_eknojore_shongothon_1['nurani_up']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_up_bri" data-title="Enter"><?php echo $nurani_up_bri=  (isset( $madrasah_eknojore_shongothon_1['nurani_up_bri']))? $madrasah_eknojore_shongothon_1['nurani_up_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_ss" data-title="Enter"><?php echo $nurani_ss=  (isset( $madrasah_eknojore_shongothon_1['nurani_ss']))? $madrasah_eknojore_shongothon_1['nurani_ss']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_ss_bri" data-title="Enter"><?php echo $nurani_ss_bri=  (isset( $madrasah_eknojore_shongothon_1['nurani_ss_bri']))? $madrasah_eknojore_shongothon_1['nurani_ss_bri']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_eknojore_shongothon_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nurani_s_nei" data-title="Enter"><?php echo $nurani_s_nei=  (isset( $madrasah_eknojore_shongothon_1['nurani_s_nei']))? $madrasah_eknojore_shongothon_1['nurani_s_nei']:0;?></a>
                                </td>
              

                            </tr>
           
                            <tr>
                                <td class="tg-y698">মোট</td>

                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_mot+$fajil_mot+$alim_mot+$dakhil_mot+$private_mot+$ibte_mot+$hafeji_mot+$nurani_mot) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_shongothon+$fajil_shongothon+$alim_shongothon+$dakhil_shongothon+$private_shongothon+$ibte_shongothon+$hafeji_shongothon+$nurani_shongothon) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_shongothon_bri+$fajil_shongothon_bri+$alim_shongothon_bri+$dakhil_shongothon_bri+$private_shongothon_bri+$ibte_shongothon_bri+$hafeji_shongothon_bri+$nurani_shongothon_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_thana+$fajil_thana+$alim_thana+$dakhil_thana+$private_thana+$ibte_thana+$hafeji_thana+$nurani_thana) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_thana_bri+$fajil_thana_bri+$alim_thana_bri+$dakhil_thana_bri+$private_thana_bri+$ibte_thana_bri+$hafeji_thana_bri+$nurani_thana_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_word+$fajil_word+$alim_word+$dakhil_word+$private_word+$ibte_word+$hafeji_word+$nurani_word) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_word_bri+$fajil_word_bri+$alim_word_bri+$dakhil_word_bri+$private_word_bri+$ibte_word_bri+$hafeji_word_bri+$nurani_word_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_up+$fajil_up+$alim_up+$dakhil_up+$private_up+$ibte_up+$hafeji_up+$nurani_up) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_up_bri+$fajil_up_bri+$alim_up_bri+$dakhil_up_bri+$private_up_bri+$ibte_up_bri+$hafeji_up_bri+$nurani_up_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_ss+$fajil_ss+$alim_ss+$dakhil_ss+$private_ss+$ibte_ss+$hafeji_ss+$nurani_ss) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_ss_bri+$fajil_ss_bri+$alim_ss_bri+$dakhil_ss_bri+$private_ss_bri+$ibte_ss_bri+$hafeji_ss_bri+$nurani_ss_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_s_nei+$fajil_s_nei+$alim_s_nei+$dakhil_s_nei+$private_s_nei+$ibte_s_nei+$hafeji_s_nei+$nurani_s_nei) ?>
                                </td>


                            </tr>

                        </table>
                    <table class="tg table table-header-rotated" id="testTable2">
                           <tr>
                            <td class='tg-pwj7' colspan='4'>
                            <b>আউটপুট </b>
                            </td>
                            <td class="tg-pwj7">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_আউটপুট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                           </tr>
                            <tr>
                                
                                <td class="tg-pwj7"> ধরন</td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাংগঠনিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>অন্যান্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>নতুন নিয়োগ </span></div></td>

                            </tr>
                            <?php
                            $pk = (isset($madrasah_output['id']))?$madrasah_output['id']:'';
                            ?>
                            <tr>
                                
                                <td class="tg-y698  type_1">অধ্যক্ষ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prin_mot" data-title="Enter"><?php echo $prin_mot=  (isset( $madrasah_output['prin_mot']))? $madrasah_output['prin_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prin_shang" data-title="Enter"><?php echo $prin_shang=  (isset( $madrasah_output['prin_shang']))? $madrasah_output['prin_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prin_other" data-title="Enter"><?php echo $prin_other=  (isset( $madrasah_output['prin_other']))? $madrasah_output['prin_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prin_new" data-title="Enter"><?php echo $prin_new=  (isset( $madrasah_output['prin_new']))? $madrasah_output['prin_new']:0;?></a>
                                </td>
                            </tr>
                           

                            <tr>
                               
                                <td class="tg-y698">উপাধ্যক্ষ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="v_prin_mot" data-title="Enter"><?php echo $v_prin_mot=  (isset( $madrasah_output['v_prin_mot']))? $madrasah_output['v_prin_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="v_prin_shang" data-title="Enter"><?php echo $v_prin_shang=  (isset( $madrasah_output['v_prin_shang']))? $madrasah_output['v_prin_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="v_prin_other" data-title="Enter"><?php echo $v_prin_other=  (isset( $madrasah_output['v_prin_other']))? $madrasah_output['v_prin_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="v_prin_new" data-title="Enter"><?php echo $v_prin_new=  (isset( $madrasah_output['v_prin_new']))? $madrasah_output['v_prin_new']:0;?></a>
                                </td>
                            </tr>
                          
                            <tr>
                              
                                <td class="tg-y698">মুহাদ্দিস/মুফাসসির</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muhaddis_mot" data-title="Enter"><?php echo $muhaddis_mot=  (isset( $madrasah_output['muhaddis_mot']))? $madrasah_output['muhaddis_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muhaddis_shang" data-title="Enter"><?php echo $muhaddis_shang=  (isset( $madrasah_output['muhaddis_shang']))? $madrasah_output['muhaddis_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muhaddis_other" data-title="Enter"><?php echo $muhaddis_other=  (isset( $madrasah_output['muhaddis_other']))? $madrasah_output['muhaddis_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muhaddis_new" data-title="Enter"><?php echo $muhaddis_new=  (isset( $madrasah_output['muhaddis_new']))? $madrasah_output['muhaddis_new']:0;?></a>
                                </td>
                            </tr>
                         
                            <tr>
                                
                                <td class="tg-y698">পীর-মাশায়েখ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pir_mot" data-title="Enter"><?php echo $pir_mot=  (isset( $madrasah_output['pir_mot']))? $madrasah_output['pir_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pir_shang" data-title="Enter"><?php echo $pir_shang=  (isset( $madrasah_output['pir_shang']))? $madrasah_output['pir_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pir_other" data-title="Enter"><?php echo $pir_other=  (isset( $madrasah_output['pir_other']))? $madrasah_output['pir_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pir_new" data-title="Enter"><?php echo $pir_new=  (isset( $madrasah_output['pir_new']))? $madrasah_output['pir_new']:0;?></a>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="tg-y698">লেকচারার (অনার্স)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="lec_mot" data-title="Enter"><?php echo $lec_mot=  (isset( $madrasah_output['lec_mot']))? $madrasah_output['lec_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="lec_shang" data-title="Enter"><?php echo $lec_shang=  (isset( $madrasah_output['lec_shang']))? $madrasah_output['lec_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="lec_other" data-title="Enter"><?php echo $lec_other=  (isset( $madrasah_output['lec_other']))? $madrasah_output['lec_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="lec_new" data-title="Enter"><?php echo $lec_new=  (isset( $madrasah_output['lec_new']))? $madrasah_output['lec_new']:0;?></a>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="tg-y698">আরবি প্রভাষক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prova_mot" data-title="Enter"><?php echo $prova_mot=  (isset( $madrasah_output['prova_mot']))? $madrasah_output['prova_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prova_shang" data-title="Enter"><?php echo $prova_shang=  (isset( $madrasah_output['prova_shang']))? $madrasah_output['prova_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prova_other" data-title="Enter"><?php echo $prova_other=  (isset( $madrasah_output['prova_other']))? $madrasah_output['prova_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prova_new" data-title="Enter"><?php echo $prova_new=  (isset( $madrasah_output['prova_new']))? $madrasah_output['prova_new']:0;?></a>
                                </td>
                                
                            </tr>
                           
                            <tr>
                             
                                <td class="tg-y698"> সুপার</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="super_mot" data-title="Enter"><?php echo $super_mot=  (isset( $madrasah_output['super_mot']))? $madrasah_output['super_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="super_shang" data-title="Enter"><?php echo $super_shang=  (isset( $madrasah_output['super_shang']))? $madrasah_output['super_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="super_other" data-title="Enter"><?php echo $super_other=  (isset( $madrasah_output['super_other']))? $madrasah_output['super_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="super_new" data-title="Enter"><?php echo $super_new=  (isset( $madrasah_output['super_new']))? $madrasah_output['super_new']:0;?></a>
                                </td>
                                
                            </tr>
                            
                            <tr>
                               
                                <td class="tg-y698">ওয়ায়েজীন</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wazin_mot" data-title="Enter"><?php echo $wazin_mot=  (isset( $madrasah_output['wazin_mot']))? $madrasah_output['wazin_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wazin_shang" data-title="Enter"><?php echo $wazin_shang=  (isset( $madrasah_output['wazin_shang']))? $madrasah_output['wazin_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wazin_other" data-title="Enter"><?php echo $wazin_other=  (isset( $madrasah_output['wazin_other']))? $madrasah_output['wazin_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wazin_new" data-title="Enter"><?php echo $wazin_new=  (isset( $madrasah_output['wazin_new']))? $madrasah_output['wazin_new']:0;?></a>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="tg-y698">সহকারী মৌলভী</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="moulovi_mot" data-title="Enter"><?php echo $moulovi_mot=  (isset( $madrasah_output['moulovi_mot']))? $madrasah_output['moulovi_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="moulovi_shang" data-title="Enter"><?php echo $moulovi_shang=  (isset( $madrasah_output['moulovi_shang']))? $madrasah_output['moulovi_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="moulovi_other" data-title="Enter"><?php echo $moulovi_other=  (isset( $madrasah_output['moulovi_other']))? $madrasah_output['moulovi_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="moulovi_new" data-title="Enter"><?php echo $moulovi_new=  (isset( $madrasah_output['moulovi_new']))? $madrasah_output['moulovi_new']:0;?></a>
                                </td>
                                
                            </tr>
                           
                            <tr>
                               
                                <td class="tg-y698">খতিব/ইমাম/মুয়াজ্জিন </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khotib_mot" data-title="Enter"><?php echo $khotib_mot=  (isset( $madrasah_output['khotib_mot']))? $madrasah_output['khotib_mot']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khotib_shang" data-title="Enter"><?php echo $khotib_shang=  (isset( $madrasah_output['khotib_shang']))? $madrasah_output['khotib_shang']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khotib_other" data-title="Enter"><?php echo $khotib_other=  (isset( $madrasah_output['khotib_other']))? $madrasah_output['khotib_other']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khotib_new" data-title="Enter"><?php echo $khotib_new=  (isset( $madrasah_output['khotib_new']))? $madrasah_output['khotib_new']:0;?></a>
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
