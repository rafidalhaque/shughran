<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০৫ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-five' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                <td class="tg-pwj7" colspan="14"><b>কওমি বিভাগ</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_কওমি বিভাগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-pwj7" rowspan="2">জনশক্তি</td>                            
                                <td class="tg-pwj7" colspan="2"style=""> বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="2" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" colspan="2">টার্গেট  </td>
                                <td class="tg-pwj7" colspan="2">ঘাটতি  </td>
                                <td class="tg-pwj7" rowspan="2">মাজালিছ </td>
                                <td class="tg-pwj7" rowspan="2"style="">সংখ্যা </td>
                                <td class="tg-pwj7" rowspan="2"style="">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" rowspan="2">মাজালিছ </td>
                                <td class="tg-pwj7" rowspan="2"style="">সংখ্যা </td>
                                <td class="tg-pwj7" rowspan="2"style="">মোট উপস্থিতি </td>                                
                            </tr>
                              
                            <?php
                            $pk = (isset($madrasah_kowmi_1['id']))?$madrasah_kowmi_1['id']:'';
                            ?>                  
                           <tr>
                                <td class="tg-y698 type_1">কওমি</td>
                                <td class="tg-y698 type_1">হাফেজি</td>
                                <td class="tg-y698 type_1">কওমি</td>
                                <td class="tg-y698 type_1">হাফেজি</td>
                                <td class="tg-y698 type_1">কওমি</td>
                                <td class="tg-y698 type_1">হাফেজি</td>
                                <td class="tg-y698 type_1">কওমি</td>
                                <td class="tg-y698 type_1">হাফেজি</td>
                                                    

                            </tr>


                            <tr>
                                <td class="tg-y698">মুবাল্লিগ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_bor_k" data-title="Enter"><?php echo $muballig_bor_k=  (isset( $madrasah_kowmi_1['muballig_bor_k']))? $madrasah_kowmi_1['muballig_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_bor_h" data-title="Enter"><?php echo $muballig_bor_h=  (isset( $madrasah_kowmi_1['muballig_bor_h']))? $madrasah_kowmi_1['muballig_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_bri_k" data-title="Enter"><?php echo $muballig_bri_k=  (isset( $madrasah_kowmi_1['muballig_bri_k']))? $madrasah_kowmi_1['muballig_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_bri_h" data-title="Enter"><?php echo $muballig_bri_h=  (isset( $madrasah_kowmi_1['muballig_bri_h']))? $madrasah_kowmi_1['muballig_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_ter_k" data-title="Enter"><?php echo $muballig_ter_k=  (isset( $madrasah_kowmi_1['muballig_ter_k']))? $madrasah_kowmi_1['muballig_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_ter_h" data-title="Enter"><?php echo $muballig_ter_h=  (isset( $madrasah_kowmi_1['muballig_ter_h']))? $madrasah_kowmi_1['muballig_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_gha_k" data-title="Enter"><?php echo $muballig_gha_k=  (isset( $madrasah_kowmi_1['muballig_gha_k']))? $madrasah_kowmi_1['muballig_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_gha_h" data-title="Enter"><?php echo $muballig_gha_h=  (isset( $madrasah_kowmi_1['muballig_gha_h']))? $madrasah_kowmi_1['muballig_gha_h']:0;?></a>
                                </td>
  

                                <td class="tg-y698">মাজলিছে খাস </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khas_n" data-title="Enter"><?php echo $khas_n=  (isset( $madrasah_kowmi_1['khas_n']))? $madrasah_kowmi_1['khas_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khas_p" data-title="Enter"><?php echo $khas_p=  (isset( $madrasah_kowmi_1['khas_p']))? $madrasah_kowmi_1['khas_p']:0;?></a>
                                </td>

                                <td class="tg-y698">পুরস্কার বিতরনী অনুষ্ঠান </td>

                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="puroshkar_n" data-title="Enter"><?php echo $puroshkar_n=  (isset( $madrasah_kowmi_1['puroshkar_n']))? $madrasah_kowmi_1['puroshkar_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="puroshkar_p" data-title="Enter"><?php echo $puroshkar_p=  (isset( $madrasah_kowmi_1['puroshkar_p']))? $madrasah_kowmi_1['puroshkar_p']:0;?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">দা’ঈ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_bor_k" data-title="Enter"><?php echo $dayi_bor_k=  (isset( $madrasah_kowmi_1['dayi_bor_k']))? $madrasah_kowmi_1['dayi_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_bor_h" data-title="Enter"><?php echo $dayi_bor_h=  (isset( $madrasah_kowmi_1['dayi_bor_h']))? $madrasah_kowmi_1['dayi_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_bri_k" data-title="Enter"><?php echo $dayi_bri_k=  (isset( $madrasah_kowmi_1['dayi_bri_k']))? $madrasah_kowmi_1['dayi_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_bri_h" data-title="Enter"><?php echo $dayi_bri_h=  (isset( $madrasah_kowmi_1['dayi_bri_h']))? $madrasah_kowmi_1['dayi_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_ter_k" data-title="Enter"><?php echo $dayi_ter_k=  (isset( $madrasah_kowmi_1['dayi_ter_k']))? $madrasah_kowmi_1['dayi_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_ter_h" data-title="Enter"><?php echo $dayi_ter_h=  (isset( $madrasah_kowmi_1['dayi_ter_h']))? $madrasah_kowmi_1['dayi_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_gha_k" data-title="Enter"><?php echo $dayi_gha_k=  (isset( $madrasah_kowmi_1['dayi_gha_k']))? $madrasah_kowmi_1['dayi_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_gha_h" data-title="Enter"><?php echo $dayi_gha_h=  (isset( $madrasah_kowmi_1['dayi_gha_h']))? $madrasah_kowmi_1['dayi_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">মাজলিশে আ’ম </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="am_n" data-title="Enter"><?php echo $am_n=  (isset( $madrasah_kowmi_1['am_n']))? $madrasah_kowmi_1['am_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="am_p" data-title="Enter"><?php echo $am_p=  (isset( $madrasah_kowmi_1['am_p']))? $madrasah_kowmi_1['am_p']:0;?></a>
                                </td>
                                <td class="tg-y698">হাফেজ কুরআন সংবর্ধনা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafej_n" data-title="Enter"><?php echo $hafej_n=  (isset( $madrasah_kowmi_1['hafej_n']))? $madrasah_kowmi_1['hafej_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafej_p" data-title="Enter"><?php echo $hafej_p=  (isset( $madrasah_kowmi_1['hafej_p']))? $madrasah_kowmi_1['hafej_p']:0;?></a>
                                </td>
                                
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">মুঈন </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_bor_k" data-title="Enter"><?php echo $muin_bor_k=  (isset( $madrasah_kowmi_1['muin_bor_k']))? $madrasah_kowmi_1['muin_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_bor_h" data-title="Enter"><?php echo $muin_bor_h=  (isset( $madrasah_kowmi_1['muin_bor_h']))? $madrasah_kowmi_1['muin_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_bri_k" data-title="Enter"><?php echo $muin_bri_k=  (isset( $madrasah_kowmi_1['muin_bri_k']))? $madrasah_kowmi_1['muin_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_bri_h" data-title="Enter"><?php echo $muin_bri_h=  (isset( $madrasah_kowmi_1['muin_bri_h']))? $madrasah_kowmi_1['muin_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_ter_k" data-title="Enter"><?php echo $muin_ter_k=  (isset( $madrasah_kowmi_1['muin_ter_k']))? $madrasah_kowmi_1['muin_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_ter_h" data-title="Enter"><?php echo $muin_ter_h=  (isset( $madrasah_kowmi_1['muin_ter_h']))? $madrasah_kowmi_1['muin_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_gha_k" data-title="Enter"><?php echo $muin_gha_k=  (isset( $madrasah_kowmi_1['muin_gha_k']))? $madrasah_kowmi_1['muin_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_gha_h" data-title="Enter"><?php echo $muin_gha_h=  (isset( $madrasah_kowmi_1['muin_gha_h']))? $madrasah_kowmi_1['muin_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">মুবাল্লিগ মাজলিশ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_n" data-title="Enter"><?php echo $muballig_n=  (isset( $madrasah_kowmi_1['muballig_n']))? $madrasah_kowmi_1['muballig_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muballig_p" data-title="Enter"><?php echo $muballig_p=  (isset( $madrasah_kowmi_1['muballig_p']))? $madrasah_kowmi_1['muballig_p']:0;?></a>
                                </td>
                                <td class="tg-y698"> মুমতাজ সংবর্ধনা  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mumtaj_n" data-title="Enter"><?php echo $mumtaj_n=  (isset( $madrasah_kowmi_1['mumtaj_n']))? $madrasah_kowmi_1['mumtaj_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mumtaj_p" data-title="Enter"><?php echo $mumtaj_p=  (isset( $madrasah_kowmi_1['mumtaj_p']))? $madrasah_kowmi_1['mumtaj_p']:0;?></a>
                                </td>
                               
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট  </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_bor_k+$dayi_bor_k+$muin_bor_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_bor_h+$dayi_bor_h+$muin_bor_h) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_bri_k+$dayi_bri_k+$muin_bri_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_bri_h+$dayi_bri_h+$muin_bri_h) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_ter_k+$dayi_ter_k+$muin_ter_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_ter_h+$dayi_ter_h+$muin_ter_h) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_gha_k+$dayi_gha_k+$muin_gha_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muballig_gha_h+$dayi_gha_h+$muin_gha_h) ?>
                                </td>
        
                                <td class="tg-y698">দা’ঈ মজলিশ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_s_n" data-title="Enter"><?php echo $dayi_s_n=  (isset( $madrasah_kowmi_1['dayi_s_n']))? $madrasah_kowmi_1['dayi_s_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_s_p" data-title="Enter"><?php echo $dayi_s_p=  (isset( $madrasah_kowmi_1['dayi_s_p']))? $madrasah_kowmi_1['dayi_s_p']:0;?></a>
                                </td>
                                <td class="tg-y698">কিরাত প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kirat_n" data-title="Enter"><?php echo $kirat_n=  (isset( $madrasah_kowmi_1['kirat_n']))? $madrasah_kowmi_1['kirat_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kirat_p" data-title="Enter"><?php echo $kirat_p=  (isset( $madrasah_kowmi_1['kirat_p']))? $madrasah_kowmi_1['kirat_p']:0;?></a>
                                </td>
                               
                               
                            </tr>

                            <tr>
                                <td class="tg-y698">  </td>
                                <td class="tg-0pky  type_1" colspan="8"><b>দাওয়াত</b>
                                </td>
                                <td class="tg-y698">মুঈন মজলিশ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_n" data-title="Enter"><?php echo $muin_n=  (isset( $madrasah_kowmi_1['muin_n']))? $madrasah_kowmi_1['muin_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_p" data-title="Enter"><?php echo $muin_p=  (isset( $madrasah_kowmi_1['muin_p']))? $madrasah_kowmi_1['muin_p']:0;?></a>
                                </td>
                                <td class="tg-y698">মুঈন কর্মশালা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_w_n" data-title="Enter"><?php echo $muin_w_n=  (isset( $madrasah_kowmi_1['muin_w_n']))? $madrasah_kowmi_1['muin_w_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muin_w_p" data-title="Enter"><?php echo $muin_w_p=  (isset( $madrasah_kowmi_1['muin_w_p']))? $madrasah_kowmi_1['muin_w_p']:0;?></a>
                                </td>                       
                            </tr>


                            <tr>
                                <td class="tg-y698">মুয়ায়্যিদ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_bor_k" data-title="Enter"><?php echo $muid_bor_k=  (isset( $madrasah_kowmi_1['muid_bor_k']))? $madrasah_kowmi_1['muid_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_bor_h" data-title="Enter"><?php echo $muid_bor_h=  (isset( $madrasah_kowmi_1['muid_bor_h']))? $madrasah_kowmi_1['muid_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_bri_k" data-title="Enter"><?php echo $muid_bri_k=  (isset( $madrasah_kowmi_1['muid_bri_k']))? $madrasah_kowmi_1['muid_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_bri_h" data-title="Enter"><?php echo $muid_bri_h=  (isset( $madrasah_kowmi_1['muid_bri_h']))? $madrasah_kowmi_1['muid_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_ter_k" data-title="Enter"><?php echo $muid_ter_k=  (isset( $madrasah_kowmi_1['muid_ter_k']))? $madrasah_kowmi_1['muid_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_ter_h" data-title="Enter"><?php echo $muid_ter_h=  (isset( $madrasah_kowmi_1['muid_ter_h']))? $madrasah_kowmi_1['muid_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_gha_k" data-title="Enter"><?php echo $muid_gha_k=  (isset( $madrasah_kowmi_1['muid_gha_k']))? $madrasah_kowmi_1['muid_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_gha_h" data-title="Enter"><?php echo $muid_gha_h=  (isset( $madrasah_kowmi_1['muid_gha_h']))? $madrasah_kowmi_1['muid_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">প্রতিনিধি সমাবেশ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="protinidhi_n" data-title="Enter"><?php echo $protinidhi_n=  (isset( $madrasah_kowmi_1['protinidhi_n']))? $madrasah_kowmi_1['protinidhi_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="protinidhi_p" data-title="Enter"><?php echo $protinidhi_p=  (isset( $madrasah_kowmi_1['protinidhi_p']))? $madrasah_kowmi_1['protinidhi_p']:0;?></a>
                                </td>
                                <td class="tg-y698">হিফজুল কুরআন/হাদিস প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hifjul_n" data-title="Enter"><?php echo $hifjul_n=  (isset( $madrasah_kowmi_1['hifjul_n']))? $madrasah_kowmi_1['hifjul_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hifjul_p" data-title="Enter"><?php echo $hifjul_p=  (isset( $madrasah_kowmi_1['hifjul_p']))? $madrasah_kowmi_1['hifjul_p']:0;?></a>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> সাদিক  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_bor_k" data-title="Enter"><?php echo $sadiq_bor_k=  (isset( $madrasah_kowmi_1['sadiq_bor_k']))? $madrasah_kowmi_1['sadiq_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_bor_h" data-title="Enter"><?php echo $sadiq_bor_h=  (isset( $madrasah_kowmi_1['sadiq_bor_h']))? $madrasah_kowmi_1['sadiq_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_bri_k" data-title="Enter"><?php echo $sadiq_bri_k=  (isset( $madrasah_kowmi_1['sadiq_bri_k']))? $madrasah_kowmi_1['sadiq_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_bri_h" data-title="Enter"><?php echo $sadiq_bri_h=  (isset( $madrasah_kowmi_1['sadiq_bri_h']))? $madrasah_kowmi_1['sadiq_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_ter_k" data-title="Enter"><?php echo $sadiq_ter_k=  (isset( $madrasah_kowmi_1['sadiq_ter_k']))? $madrasah_kowmi_1['sadiq_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_ter_h" data-title="Enter"><?php echo $sadiq_ter_h=  (isset( $madrasah_kowmi_1['sadiq_ter_h']))? $madrasah_kowmi_1['sadiq_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_gha_k" data-title="Enter"><?php echo $sadiq_gha_k=  (isset( $madrasah_kowmi_1['sadiq_gha_k']))? $madrasah_kowmi_1['sadiq_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadiq_gha_h" data-title="Enter"><?php echo $sadiq_gha_h=  (isset( $madrasah_kowmi_1['sadiq_gha_h']))? $madrasah_kowmi_1['sadiq_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">তা’লিমুল কুরআন </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="t_quran_n" data-title="Enter"><?php echo $t_quran_n=  (isset( $madrasah_kowmi_1['t_quran_n']))? $madrasah_kowmi_1['t_quran_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="t_quran_p" data-title="Enter"><?php echo $t_quran_p=  (isset( $madrasah_kowmi_1['t_quran_p']))? $madrasah_kowmi_1['t_quran_p']:0;?></a>
                                </td>
                                <td class="tg-y698">ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iftar_n" data-title="Enter"><?php echo $iftar_n=  (isset( $madrasah_kowmi_1['iftar_n']))? $madrasah_kowmi_1['iftar_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iftar_p" data-title="Enter"><?php echo $iftar_p=  (isset( $madrasah_kowmi_1['iftar_p']))? $madrasah_kowmi_1['iftar_p']:0;?></a>
                                </td>
                               
                                                     
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট  </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_bor_k+$sadiq_bor_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_bor_h+$sadiq_bor_h) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_bri_k+$sadiq_bri_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_bri_h+$sadiq_bri_h) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_ter_k+$sadiq_ter_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_ter_h+$sadiq_ter_h) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_gha_k+$sadiq_gha_k) ?>
                                </td>
                                <td class="tg-y698  type_1">
                                <?php echo ($muid_gha_h+$sadiq_gha_h) ?>
                                </td>
                     
                                <td class="tg-y698">তা’লিমুল হাদিস</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="t_hadis_n" data-title="Enter"><?php echo $t_hadis_n=  (isset( $madrasah_kowmi_1['t_hadis_n']))? $madrasah_kowmi_1['t_hadis_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="t_hadis_p" data-title="Enter"><?php echo $t_hadis_p=  (isset( $madrasah_kowmi_1['t_hadis_p']))? $madrasah_kowmi_1['t_hadis_p']:0;?></a>
                                </td>
                                <td class="tg-y698">উস্তাজ যোগাযোগ/হাদিয়া</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ustad_n" data-title="Enter"><?php echo $ustad_n=  (isset( $madrasah_kowmi_1['ustad_n']))? $madrasah_kowmi_1['ustad_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ustad_p" data-title="Enter"><?php echo $ustad_p=  (isset( $madrasah_kowmi_1['ustad_p']))? $madrasah_kowmi_1['ustad_p']:0;?></a>
                                </td>
                               
                               
                            </tr>

                            <tr>
                                <td class="tg-y698">  </td>
                                <td class="tg-0pky  type_1" colspan="8"><b>সংগঠন</b>
                               </td>
                                <td class="tg-y698">সাহিত্য পাঠ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sahitto_n" data-title="Enter"><?php echo $sahitto_n=  (isset( $madrasah_kowmi_1['sahitto_n']))? $madrasah_kowmi_1['sahitto_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sahitto_p" data-title="Enter"><?php echo $sahitto_p=  (isset( $madrasah_kowmi_1['sahitto_p']))? $madrasah_kowmi_1['sahitto_p']:0;?></a>
                                </td>
                                <td class="tg-y698">শিক্ষা উপকরণ বিতরণ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shikkha_u_n" data-title="Enter"><?php echo $shikkha_u_n=  (isset( $madrasah_kowmi_1['shikkha_u_n']))? $madrasah_kowmi_1['shikkha_u_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shikkha_u_p" data-title="Enter"><?php echo $shikkha_u_p=  (isset( $madrasah_kowmi_1['shikkha_u_p']))? $madrasah_kowmi_1['shikkha_u_p']:0;?></a>
                                </td>
                                                              
                            </tr>


                            <tr>
                                <td class="tg-y698">থানা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_bor_k" data-title="Enter"><?php echo $thana_bor_k=  (isset( $madrasah_kowmi_1['thana_bor_k']))? $madrasah_kowmi_1['thana_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_bor_h" data-title="Enter"><?php echo $thana_bor_h=  (isset( $madrasah_kowmi_1['thana_bor_h']))? $madrasah_kowmi_1['thana_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_bri_k" data-title="Enter"><?php echo $thana_bri_k=  (isset( $madrasah_kowmi_1['thana_bri_k']))? $madrasah_kowmi_1['thana_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_bri_h" data-title="Enter"><?php echo $thana_bri_h=  (isset( $madrasah_kowmi_1['thana_bri_h']))? $madrasah_kowmi_1['thana_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_ter_k" data-title="Enter"><?php echo $thana_ter_k=  (isset( $madrasah_kowmi_1['thana_ter_k']))? $madrasah_kowmi_1['thana_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_ter_h" data-title="Enter"><?php echo $thana_ter_h=  (isset( $madrasah_kowmi_1['thana_ter_h']))? $madrasah_kowmi_1['thana_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_gha_k" data-title="Enter"><?php echo $thana_gha_k=  (isset( $madrasah_kowmi_1['thana_gha_k']))? $madrasah_kowmi_1['thana_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_gha_h" data-title="Enter"><?php echo $thana_gha_h=  (isset( $madrasah_kowmi_1['thana_gha_h']))? $madrasah_kowmi_1['thana_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">ইসলাহি মজলিশে আ’ম  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="islahi_n" data-title="Enter"><?php echo $islahi_n=  (isset( $madrasah_kowmi_1['islahi_n']))? $madrasah_kowmi_1['islahi_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="islahi_p" data-title="Enter"><?php echo $islahi_p=  (isset( $madrasah_kowmi_1['islahi_p']))? $madrasah_kowmi_1['islahi_p']:0;?></a>
                                </td>
                                <td class="tg-y698">মাদরাসা সফর </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="madrasa_n" data-title="Enter"><?php echo $madrasa_n=  (isset( $madrasah_kowmi_1['madrasa_n']))? $madrasah_kowmi_1['madrasa_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="madrasa_p" data-title="Enter"><?php echo $madrasa_p=  (isset( $madrasah_kowmi_1['madrasa_p']))? $madrasah_kowmi_1['madrasa_p']:0;?></a>
                                </td>

                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> ওয়ার্ড/জোন </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_bor_k" data-title="Enter"><?php echo $word_bor_k=  (isset( $madrasah_kowmi_1['word_bor_k']))? $madrasah_kowmi_1['word_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_bor_h" data-title="Enter"><?php echo $word_bor_h=  (isset( $madrasah_kowmi_1['word_bor_h']))? $madrasah_kowmi_1['word_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_bri_k" data-title="Enter"><?php echo $word_bri_k=  (isset( $madrasah_kowmi_1['word_bri_k']))? $madrasah_kowmi_1['word_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_bri_h" data-title="Enter"><?php echo $word_bri_h=  (isset( $madrasah_kowmi_1['word_bri_h']))? $madrasah_kowmi_1['word_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_ter_k" data-title="Enter"><?php echo $word_ter_k=  (isset( $madrasah_kowmi_1['word_ter_k']))? $madrasah_kowmi_1['word_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_ter_h" data-title="Enter"><?php echo $word_ter_h=  (isset( $madrasah_kowmi_1['word_ter_h']))? $madrasah_kowmi_1['word_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_gha_k" data-title="Enter"><?php echo $word_gha_k=  (isset( $madrasah_kowmi_1['word_gha_k']))? $madrasah_kowmi_1['word_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="word_gha_h" data-title="Enter"><?php echo $word_gha_h=  (isset( $madrasah_kowmi_1['word_gha_h']))? $madrasah_kowmi_1['word_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">চা চক্র/ফল চক্র </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cha_n" data-title="Enter"><?php echo $cha_n=  (isset( $madrasah_kowmi_1['cha_n']))? $madrasah_kowmi_1['cha_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cha_p" data-title="Enter"><?php echo $cha_p=  (isset( $madrasah_kowmi_1['cha_p']))? $madrasah_kowmi_1['cha_p']:0;?></a>
                                </td>
                                <td class="tg-y698">দা’ঈ সমাবেশ  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_n" data-title="Enter"><?php echo $dayi_n=  (isset( $madrasah_kowmi_1['dayi_n']))? $madrasah_kowmi_1['dayi_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dayi_p" data-title="Enter"><?php echo $dayi_p=  (isset( $madrasah_kowmi_1['dayi_p']))? $madrasah_kowmi_1['dayi_p']:0;?></a>
                                </td>
                            
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> উপশাখা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_bor_k" data-title="Enter"><?php echo $up_bor_k=  (isset( $madrasah_kowmi_1['up_bor_k']))? $madrasah_kowmi_1['up_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_bor_h" data-title="Enter"><?php echo $up_bor_h=  (isset( $madrasah_kowmi_1['up_bor_h']))? $madrasah_kowmi_1['up_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_bri_k" data-title="Enter"><?php echo $up_bri_k=  (isset( $madrasah_kowmi_1['up_bri_k']))? $madrasah_kowmi_1['up_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_bri_h" data-title="Enter"><?php echo $up_bri_h=  (isset( $madrasah_kowmi_1['up_bri_h']))? $madrasah_kowmi_1['up_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_ter_k" data-title="Enter"><?php echo $up_ter_k=  (isset( $madrasah_kowmi_1['up_ter_k']))? $madrasah_kowmi_1['up_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_ter_h" data-title="Enter"><?php echo $up_ter_h=  (isset( $madrasah_kowmi_1['up_ter_h']))? $madrasah_kowmi_1['up_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_gha_k" data-title="Enter"><?php echo $up_gha_k=  (isset( $madrasah_kowmi_1['up_gha_k']))? $madrasah_kowmi_1['up_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_gha_h" data-title="Enter"><?php echo $up_gha_h=  (isset( $madrasah_kowmi_1['up_gha_h']))? $madrasah_kowmi_1['up_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">শিক্ষা সফর </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shikkha_n" data-title="Enter"><?php echo $shikkha_n=  (isset( $madrasah_kowmi_1['shikkha_n']))? $madrasah_kowmi_1['shikkha_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shikkha_p" data-title="Enter"><?php echo $shikkha_p=  (isset( $madrasah_kowmi_1['shikkha_p']))? $madrasah_kowmi_1['shikkha_p']:0;?></a>
                                </td>
                                <td class="tg-y698">আরবি খুতবা পাঠ প্রতিযোগি:  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khutba_n" data-title="Enter"><?php echo $khutba_n=  (isset( $madrasah_kowmi_1['khutba_n']))? $madrasah_kowmi_1['khutba_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khutba_p" data-title="Enter"><?php echo $khutba_p=  (isset( $madrasah_kowmi_1['khutba_p']))? $madrasah_kowmi_1['khutba_p']:0;?></a>
                                </td>
                            
                                
                            </tr>
                           
                            <tr>
                                <td class="tg-y698"> মুয়ায়্যিদ সংগঠন</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_bor_k" data-title="Enter"><?php echo $muid_s_bor_k=  (isset( $madrasah_kowmi_1['muid_s_bor_k']))? $madrasah_kowmi_1['muid_s_bor_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_bor_h" data-title="Enter"><?php echo $muid_s_bor_h=  (isset( $madrasah_kowmi_1['muid_s_bor_h']))? $madrasah_kowmi_1['muid_s_bor_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_bri_k" data-title="Enter"><?php echo $muid_s_bri_k=  (isset( $madrasah_kowmi_1['muid_s_bri_k']))? $madrasah_kowmi_1['muid_s_bri_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_bri_h" data-title="Enter"><?php echo $muid_s_bri_h=  (isset( $madrasah_kowmi_1['muid_s_bri_h']))? $madrasah_kowmi_1['muid_s_bri_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_ter_k" data-title="Enter"><?php echo $muid_s_ter_k=  (isset( $madrasah_kowmi_1['muid_s_ter_k']))? $madrasah_kowmi_1['muid_s_ter_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_ter_h" data-title="Enter"><?php echo $muid_s_ter_h=  (isset( $madrasah_kowmi_1['muid_s_ter_h']))? $madrasah_kowmi_1['muid_s_ter_h']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_gha_k" data-title="Enter"><?php echo $muid_s_gha_k=  (isset( $madrasah_kowmi_1['muid_s_gha_k']))? $madrasah_kowmi_1['muid_s_gha_k']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="muid_s_gha_h" data-title="Enter"><?php echo $muid_s_gha_h=  (isset( $madrasah_kowmi_1['muid_s_gha_h']))? $madrasah_kowmi_1['muid_s_gha_h']:0;?></a>
                                </td>
                                <td class="tg-y698">কুরআন ক্লাস</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quran_n" data-title="Enter"><?php echo $quran_n=  (isset( $madrasah_kowmi_1['quran_n']))? $madrasah_kowmi_1['quran_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quran_p" data-title="Enter"><?php echo $quran_p=  (isset( $madrasah_kowmi_1['quran_p']))? $madrasah_kowmi_1['quran_p']:0;?></a>
                                </td>
                                <td class="tg-y698">মত বিনিময় সভা:  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mot_n" data-title="Enter"><?php echo $mot_n=  (isset( $madrasah_kowmi_1['mot_n']))? $madrasah_kowmi_1['mot_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mot_p" data-title="Enter"><?php echo $mot_p=  (isset( $madrasah_kowmi_1['mot_p']))? $madrasah_kowmi_1['mot_p']:0;?></a>
                                </td>
                            
                                
                            </tr>  
                            <tr>
                                <td class="tg-y698"> মোট</td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_bor_k+$word_bor_k+$up_bor_k+$muid_s_bor_k) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_bor_h+$word_bor_h+$up_bor_h+$muid_s_bor_h) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_bri_k+$word_bri_k+$up_bri_k+$muid_s_bri_k) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_bri_h+$word_bri_h+$up_bri_h+$muid_s_bri_h) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_ter_k+$word_ter_k+$up_ter_k+$muid_s_ter_k) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_ter_h+$word_ter_h+$up_ter_h+$muid_s_ter_h) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_gha_k+$word_gha_k+$up_gha_k+$muid_s_gha_k) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($thana_gha_h+$word_gha_h+$up_gha_h+$muid_s_gha_h) ?>
                                </td>

                                <td class="tg-y698">তারবিয়াতি মাজলিস </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tarbiyat_n" data-title="Enter"><?php echo $tarbiyat_n=  (isset( $madrasah_kowmi_1['tarbiyat_n']))? $madrasah_kowmi_1['tarbiyat_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tarbiyat_p" data-title="Enter"><?php echo $tarbiyat_p=  (isset( $madrasah_kowmi_1['tarbiyat_p']))? $madrasah_kowmi_1['tarbiyat_p']:0;?></a>
                                </td>
                                <td class="tg-y698">রিপোর্ট পর্যালোচনা:  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="report_n" data-title="Enter"><?php echo $report_n=  (isset( $madrasah_kowmi_1['report_n']))? $madrasah_kowmi_1['report_n']:0;?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_kowmi_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="report_p" data-title="Enter"><?php echo $report_p=  (isset( $madrasah_kowmi_1['report_p']))? $madrasah_kowmi_1['report_p']:0;?></a>
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
