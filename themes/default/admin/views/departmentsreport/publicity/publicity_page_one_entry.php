<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রচার বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                <td class="tg-pwj7" colspan="4"><b>জনশক্তি </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1', '<?php echo 'Publicity_জনশক্তি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">প্রচার সম্পাদক আছে কিনা? </td>
                                <td class="tg-pwj7" colspan="4">প্রচার বিভাগের নিয়োজিত জনশক্তি</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan=""> মোট জনশক্তির সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""> সদস্য সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">সাথী সংখ্যা </td>
                                <td class="tg-pwj7 ">কর্মী সংখ্যা</td>
                            </tr> 
                            <?php
                            $pk = (isset($publicity_manpower['id']))?$publicity_manpower['id']:'';
                            ?>
                            <tr>
                            <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  id="shompadok_ache_kina" data-idname=""   data-type="select" 
                                    data-table="publicity_manpower" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                    data-name="shompadok_ache_kina@publicity_manpower" data-title="প্রচার সম্পাদক আছে কিনা?">
                                </a>
                            </td>
                            <td class="tg-0pky  type_1">
                                <?php echo  ( isset($publicity_manpower['shodossho']) ? $publicity_manpower['shodossho']:0 ) + (isset($publicity_manpower['sathi']) ? $publicity_manpower['sathi'] :0 ) + ( isset($publicity_manpower['kormi'])? $publicity_manpower['kormi'] :0)    ?>
                            </td>
                            <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_manpower" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="shodossho" data-title="Enter">
                                    <?php echo $shodossho=  (isset( $publicity_manpower['shodossho']))? $publicity_manpower['shodossho']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_manpower" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="sathi" data-title="Enter">
                                    <?php echo $sathi=  (isset( $publicity_manpower['sathi']))? $publicity_manpower['sathi']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_manpower" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="kormi" data-title="Enter">
                                    <?php echo $kormi=  (isset( $publicity_manpower['kormi']))? $publicity_manpower['kormi']:'' ?>
                                </a>
                            </td>

                            </tr> 
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b> মিডিয়া এক্টিভিটিজ </b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2', '<?php echo 'Publicity_প্রচার বিভাগে অনলাইন এক্টিভিটিজ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2" colspan="2">মিডিয়ার ধরণ</td>
                                <td class="tg-pwj7" rowspan="2">মোট সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2">প্রেরিত নিউজ  </td>
                                <td class="tg-pwj7" rowspan="2"> প্রকাশিত নিউজ </td>
                                <td class="tg-pwj7" rowspan="2">প্রেরিত বিবৃতি  </td>
                                <td class="tg-pwj7" rowspan="2">প্রকাশিত বিবৃতি </td>
                                <td class="tg-pwj7" colspan="2">সাক্ষাৎকার </td>   
                            </tr>

                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>প্রদান </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রকাশিত </span></div></td>
                               
                            </tr>

                            <?php
                            $pk = (isset($publicity_online_activity['id']))?$publicity_online_activity['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1" rowspan="2">টিভি	</td>
                                <td class="tg-y698">ইলেক্ট্রনিক মিডিয়া </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_total" data-title="Enter">
                                        <?php echo $tv_sat_total=  (isset( $publicity_online_activity['tv_sat_total']))? $publicity_online_activity['tv_sat_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_prerito_news" data-title="Enter">
                                        <?php echo $tv_sat_prerito_news=  (isset( $publicity_online_activity['tv_sat_prerito_news']))? $publicity_online_activity['tv_sat_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_prokashito_news" data-title="Enter">
                                        <?php echo $tv_sat_prokashito_news=  (isset( $publicity_online_activity['tv_sat_prokashito_news']))? $publicity_online_activity['tv_sat_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_kototite_preron" data-title="Enter">
                                        <?php echo $tv_sat_kototite_preron=  (isset( $publicity_online_activity['tv_sat_kototite_preron']))? $publicity_online_activity['tv_sat_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_kototite_prokash" data-title="Enter">
                                        <?php echo $tv_sat_kototite_prokash=  (isset( $publicity_online_activity['tv_sat_kototite_prokash']))? $publicity_online_activity['tv_sat_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_prodan" data-title="Enter">
                                        <?php echo $tv_sat_prodan=  (isset( $publicity_online_activity['tv_sat_prodan']))? $publicity_online_activity['tv_sat_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_sat_prokashito" data-title="Enter">
                                        <?php echo $tv_sat_prokashito=  (isset( $publicity_online_activity['tv_sat_prokashito']))? $publicity_online_activity['tv_sat_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                            </tr>
                                <td class="tg-y698" >অনলাইন	মিডিয়া </td>
                                
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_total" data-title="Enter">
                                        <?php echo $tv_online_total=  (isset( $publicity_online_activity['tv_online_total']))? $publicity_online_activity['tv_online_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_prerito_news" data-title="Enter">
                                        <?php echo $tv_online_prerito_news=  (isset( $publicity_online_activity['tv_online_prerito_news']))? $publicity_online_activity['tv_online_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_prokashito_news" data-title="Enter">
                                        <?php echo $tv_online_prokashito_news=  (isset( $publicity_online_activity['tv_online_prokashito_news']))? $publicity_online_activity['tv_online_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_kototite_preron" data-title="Enter">
                                        <?php echo $tv_online_kototite_preron=  (isset( $publicity_online_activity['tv_online_kototite_preron']))? $publicity_online_activity['tv_online_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_kototite_prokash" data-title="Enter">
                                        <?php echo $tv_online_kototite_prokash=  (isset( $publicity_online_activity['tv_online_kototite_prokash']))? $publicity_online_activity['tv_online_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_prodan" data-title="Enter">
                                        <?php echo $tv_online_prodan=  (isset( $publicity_online_activity['tv_online_prodan']))? $publicity_online_activity['tv_online_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="tv_online_prokashito" data-title="Enter">
                                        <?php echo $tv_online_prokashito=  (isset( $publicity_online_activity['tv_online_prokashito']))? $publicity_online_activity['tv_online_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                            </tr>

                            <tr>
                                <td class="tg-y698" rowspan="2"> পত্রিকা </td>
                                <td class="tg-y698"> জাতীয়  </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_total" data-title="Enter">
                                        <?php echo $potrika_jatio_total=  (isset( $publicity_online_activity['potrika_jatio_total']))? $publicity_online_activity['potrika_jatio_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_prerito_news" data-title="Enter">
                                        <?php echo $potrika_jatio_prerito_news=  (isset( $publicity_online_activity['potrika_jatio_prerito_news']))? $publicity_online_activity['potrika_jatio_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_prokashito_news" data-title="Enter">
                                        <?php echo $potrika_jatio_prokashito_news=  (isset( $publicity_online_activity['potrika_jatio_prokashito_news']))? $publicity_online_activity['potrika_jatio_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_kototite_preron" data-title="Enter">
                                        <?php echo $potrika_jatio_kototite_preron=  (isset( $publicity_online_activity['potrika_jatio_kototite_preron']))? $publicity_online_activity['potrika_jatio_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_kototite_prokash" data-title="Enter">
                                        <?php echo $potrika_jatio_kototite_prokash=  (isset( $publicity_online_activity['potrika_jatio_kototite_prokash']))? $publicity_online_activity['potrika_jatio_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_prodan" data-title="Enter">
                                        <?php echo $potrika_jatio_prodan=  (isset( $publicity_online_activity['potrika_jatio_prodan']))? $publicity_online_activity['potrika_jatio_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_jatio_prokashito" data-title="Enter">
                                        <?php echo $potrika_jatio_prokashito=  (isset( $publicity_online_activity['potrika_jatio_prokashito']))? $publicity_online_activity['potrika_jatio_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আঞ্চলিক </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_total" data-title="Enter">
                                        <?php echo $potrika_ancholik_total=  (isset( $publicity_online_activity['potrika_ancholik_total']))? $publicity_online_activity['potrika_ancholik_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_prerito_news" data-title="Enter">
                                        <?php echo $potrika_ancholik_prerito_news=  (isset( $publicity_online_activity['potrika_ancholik_prerito_news']))? $publicity_online_activity['potrika_ancholik_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_prokashito_news" data-title="Enter">
                                        <?php echo $potrika_ancholik_prokashito_news=  (isset( $publicity_online_activity['potrika_ancholik_prokashito_news']))? $publicity_online_activity['potrika_ancholik_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_kototite_preron" data-title="Enter">
                                        <?php echo $potrika_ancholik_kototite_preron=  (isset( $publicity_online_activity['potrika_ancholik_kototite_preron']))? $publicity_online_activity['potrika_ancholik_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_kototite_prokash" data-title="Enter">
                                        <?php echo $potrika_ancholik_kototite_prokash=  (isset( $publicity_online_activity['potrika_ancholik_kototite_prokash']))? $publicity_online_activity['potrika_ancholik_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_prodan" data-title="Enter">
                                        <?php echo $potrika_ancholik_prodan=  (isset( $publicity_online_activity['potrika_ancholik_prodan']))? $publicity_online_activity['potrika_ancholik_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="potrika_ancholik_prokashito" data-title="Enter">
                                        <?php echo $potrika_ancholik_prokashito=  (isset( $publicity_online_activity['potrika_ancholik_prokashito']))? $publicity_online_activity['potrika_ancholik_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">অনলাইন	 </td>

                                <td class="tg-y698"> জাতীয় </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_total" data-title="Enter">
                                        <?php echo $online_jatio_total=  (isset( $publicity_online_activity['online_jatio_total']))? $publicity_online_activity['online_jatio_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_prerito_news" data-title="Enter">
                                        <?php echo $online_jatio_prerito_news=  (isset( $publicity_online_activity['online_jatio_prerito_news']))? $publicity_online_activity['online_jatio_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_prokashito_news" data-title="Enter">
                                        <?php echo $online_jatio_prokashito_news=  (isset( $publicity_online_activity['online_jatio_prokashito_news']))? $publicity_online_activity['online_jatio_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_kototite_preron" data-title="Enter">
                                        <?php echo $online_jatio_kototite_preron=  (isset( $publicity_online_activity['online_jatio_kototite_preron']))? $publicity_online_activity['online_jatio_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_kototite_prokash" data-title="Enter">
                                        <?php echo $online_jatio_kototite_prokash=  (isset( $publicity_online_activity['online_jatio_kototite_prokash']))? $publicity_online_activity['online_jatio_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_prodan" data-title="Enter">
                                        <?php echo $online_jatio_prodan=  (isset( $publicity_online_activity['online_jatio_prodan']))? $publicity_online_activity['online_jatio_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_jatio_prokashito" data-title="Enter">
                                        <?php echo $online_jatio_prokashito=  (isset( $publicity_online_activity['online_jatio_prokashito']))? $publicity_online_activity['online_jatio_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                            </tr>
                            </tr>

                                <td class="tg-y698"> আঞ্চলিক </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_total" data-title="Enter">
                                        <?php echo $online_ancholik_total=  (isset( $publicity_online_activity['online_ancholik_total']))? $publicity_online_activity['online_ancholik_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_prerito_news" data-title="Enter">
                                        <?php echo $online_ancholik_prerito_news=  (isset( $publicity_online_activity['online_ancholik_prerito_news']))? $publicity_online_activity['online_ancholik_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_prokashito_news" data-title="Enter">
                                        <?php echo $online_ancholik_prokashito_news=  (isset( $publicity_online_activity['online_ancholik_prokashito_news']))? $publicity_online_activity['online_ancholik_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_kototite_preron" data-title="Enter">
                                        <?php echo $online_ancholik_kototite_preron=  (isset( $publicity_online_activity['online_ancholik_kototite_preron']))? $publicity_online_activity['online_ancholik_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_kototite_prokash" data-title="Enter">
                                        <?php echo $online_ancholik_kototite_prokash=  (isset( $publicity_online_activity['online_ancholik_kototite_prokash']))? $publicity_online_activity['online_ancholik_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_prodan" data-title="Enter">
                                        <?php echo $online_ancholik_prodan=  (isset( $publicity_online_activity['online_ancholik_prodan']))? $publicity_online_activity['online_ancholik_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="online_ancholik_prokashito" data-title="Enter">
                                        <?php echo $online_ancholik_prokashito=  (isset( $publicity_online_activity['online_ancholik_prokashito']))? $publicity_online_activity['online_ancholik_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                            </tr>   


                            <tr>
                            <td class="tg-y698" colspan="2" >শাখার ফেইসবুক পেইজ </td> 
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_total" data-title="Enter">
                                        <?php echo $facebook_total=  (isset( $publicity_online_activity['facebook_total']))? $publicity_online_activity['facebook_total']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_prerito_news" data-title="Enter">
                                        <?php echo $facebook_prerito_news=  (isset( $publicity_online_activity['facebook_prerito_news']))? $publicity_online_activity['facebook_prerito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_prokashito_news" data-title="Enter">
                                        <?php echo $facebook_prokashito_news=  (isset( $publicity_online_activity['facebook_prokashito_news']))? $publicity_online_activity['facebook_prokashito_news']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_kototite_preron" data-title="Enter">
                                        <?php echo $facebook_kototite_preron=  (isset( $publicity_online_activity['facebook_kototite_preron']))? $publicity_online_activity['facebook_kototite_preron']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_kototite_prokash" data-title="Enter">
                                        <?php echo $facebook_kototite_prokash=  (isset( $publicity_online_activity['facebook_kototite_prokash']))? $publicity_online_activity['facebook_kototite_prokash']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_prodan" data-title="Enter">
                                        <?php echo $facebook_prodan=  (isset( $publicity_online_activity['facebook_prodan']))? $publicity_online_activity['facebook_prodan']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_online_activity" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="facebook_prokashito" data-title="Enter">
                                        <?php echo $facebook_prokashito=  (isset( $publicity_online_activity['facebook_prokashito']))? $publicity_online_activity['facebook_prokashito']:'' ?>
                                    </a>
                                </td>
                          
                            </tr>

                        </table> 
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>শাখার পরিচালিত অনলাইন পোর্টাল সংক্রান্ত   </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3', '<?php echo 'Publicity_শাখার পরিচালিত অনলাইন নিউজ মিডিয়া সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="" >শাখার পোর্টাল আছে কিনা?</td>
                                <td class="tg-pwj7" colspan="">নিবন্ধনকৃত কিনা?</td>
                                <td class="tg-pwj7" rowspan="">নিয়োজিত জনশক্তি সংখ্যা </td>
                                <td class="tg-pwj7" rowspan="">পোস্টকৃত নিউজ সংখ্যা </td>
                            </tr>
                            <?php
                            $pk = (isset($publicity_shakhar_online_news_media['id']))?$publicity_shakhar_online_news_media['id']:'';
                            ?>
                         
                            <tr>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  id="portal_ache_kina" data-idname=""   data-type="select" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                        data-name="portal_ache_kina@publicity_shakhar_online_news_media" data-title="শাখার পোর্টাল আছে কনিা??">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  id="nibondhon_krito_kina" data-idname=""   data-type="select" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                        data-name="nibondhon_krito_kina@publicity_shakhar_online_news_media" data-title="প্রনিবন্ধনকৃত কিনা?">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="niyojito_jonoshongkha" data-title="Enter">
                                        <?php echo $niyojito_jonoshongkha=  (isset( $publicity_shakhar_online_news_media['niyojito_jonoshongkha']))? $publicity_shakhar_online_news_media['niyojito_jonoshongkha']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="post_krito_news" data-title="Enter">
                                        <?php echo $post_krito_news=  (isset( $publicity_shakhar_online_news_media['post_krito_news']))? $publicity_shakhar_online_news_media['post_krito_news']:'' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="" >পোর্টালের ফেসবুক পেজ আছে কিনা? </td>
                                <td class="tg-pwj7" colspan="">ভেরিফাইড কিনা?</td>
                                <td class="tg-pwj7" rowspan="">লাইক সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="">ফলোয়ার সংখ্যা</td>
                            </tr>
                          
                            <tr>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  id="page_ache_kina" data-idname=""   data-type="select" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                        data-name="page_ache_kina@publicity_shakhar_online_news_media" data-title="শাখার ফেসবুক পেজ আছে কিনা?">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  id="fb_varrified_kina" data-idname=""   data-type="select" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                        data-name="fb_varrified_kina@publicity_shakhar_online_news_media" data-title="ভেরিফাইড কনিা?">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="like" data-title="Enter">
                                        <?php echo $like=  (isset( $publicity_shakhar_online_news_media['like']))? $publicity_shakhar_online_news_media['like']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="follower" data-title="Enter">
                                        <?php echo $follower=  (isset( $publicity_shakhar_online_news_media['follower']))? $publicity_shakhar_online_news_media['follower']:'' ?>
                                    </a>
                                </td>
                            </tr> 
                             <tr>
                                <td class="tg-pwj7" colspan="">পোর্টাল ইউটিউব চ্যানলে আছে কিনা?(হ্যাঁ/না)</td>
                                <td class="tg-pwj7" colspan="">ভেরিফাইড কিনা?</td>
                                <td class="tg-pwj7" rowspan='' colspan="2">সাবস্ক্রাইবার সংখ্যা</td>
                            </tr>
                         
                            <tr>
                            <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  id="youtube_channel_ache_kina" data-idname=""   data-type="select" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                        data-name="youtube_channel_ache_kina@publicity_shakhar_online_news_media" data-title="শাখার ইউটিউব চ্যানলে আছে কনিা?">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  id="yt_varrified_kina" data-idname=""   data-type="select" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>"
                                        data-name="yt_varrified_kina@publicity_shakhar_online_news_media" data-title="ভেরিফাইড কনিা?">
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1"  colspan="2">
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shakhar_online_news_media" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="subscriber" data-title="Enter">
                                        <?php echo $subscriber=  (isset( $publicity_shakhar_online_news_media['subscriber']))? $publicity_shakhar_online_news_media['subscriber']:'' ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>	সভাসমূহ  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4', '<?php echo 'Publicity_সভাসমূহ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ </td>
                                <td class="tg-pwj7" >সংখ্যা  </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >গড় উপস্থিতি  </td>
                            
                            </tr>
                            <?php
                            $pk = (isset($publicity_shova_shomuho['id']))?$publicity_shova_shomuho['id']:'';
                            ?>
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span>বিভাগীয় জনশক্তিদের নিয়ে নিয়মিত বৈঠক</span></div></td>
                                <td class="tg-0pky  type_1" >
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="bivagio_jonoshokti_num" data-title="Enter">
                                        <?php echo $bivagio_jonoshokti_num=  (isset( $publicity_shova_shomuho['bivagio_jonoshokti_num']))? $publicity_shova_shomuho['bivagio_jonoshokti_num']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1" >
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="bivagio_jonoshokti_pre" data-title="Enter">
                                        <?php echo $bivagio_jonoshokti_pre=  (isset( $publicity_shova_shomuho['bivagio_jonoshokti_pre']))? $publicity_shova_shomuho['bivagio_jonoshokti_pre']:0; ?>
                                    </a>
                                </td>
                        
                            <td class="tg-0pky" >
                            <?php echo number_format(($bivagio_jonoshokti_num!=0 && $bivagio_jonoshokti_pre!=0)?$bivagio_jonoshokti_pre/$bivagio_jonoshokti_num:0,2)?>
                            </td>
                                          
                                          
                        </tr>
                        <tr>
                        
                        <td class="tg-pwj7 "><div><span>বিভাগীয় জনশক্তিদের নিয়ে জরুরি বৈঠক </span></div></td>
                            <td class="tg-0pky  type_1" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="bggth_num" data-title="Enter">
                                    <?php echo $bggth_num=  (isset( $publicity_shova_shomuho['bggth_num']))? $publicity_shova_shomuho['bggth_num']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_1" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="bggth_pre" data-title="Enter">
                                    <?php echo $bggth_pre=  (isset( $publicity_shova_shomuho['bggth_pre']))? $publicity_shova_shomuho['bggth_pre']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo number_format(($bggth_num!=0 && $bggth_pre!=0)?$bggth_pre/$bggth_num:0,2)?>
                            </td>
                                      
                       
                        </tr>
                        <tr>

                        <!-- <tr>
                        
                        <td class="tg-pwj7 "><div><span>প্রশিক্ষণ কর্মশালা</span></div></td>
                            <td class="tg-0pky  type_1" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="training_workshop_num" data-title="Enter">
                                    <?php echo $training_workshop_num=  (isset( $publicity_shova_shomuho['training_workshop_num']))? $publicity_shova_shomuho['training_workshop_num']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_1" >
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                    data-name="training_workshop_pre" data-title="Enter">
                                    <?php echo $training_workshop_pre=  (isset( $publicity_shova_shomuho['training_workshop_pre']))? $publicity_shova_shomuho['training_workshop_pre']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo number_format(($training_workshop_num!=0 && $training_workshop_pre!=0)?$training_workshop_pre/$training_workshop_num:0,2)?>
                            </td>
                                      
                       
                        </tr>
                        <tr> -->
                        
                        <td class="tg-pwj7 "><div><span> মতবিনিময়</span></div></td>
                     
                        <td class="tg-0pky  type_1" >
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="motobinimoy_num" data-title="Enter">
                                        <?php echo $motobinimoy_num=  (isset( $publicity_shova_shomuho['motobinimoy_num']))? $publicity_shova_shomuho['motobinimoy_num']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1" >
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="motobinimoy_pre" data-title="Enter">
                                        <?php echo $motobinimoy_pre=  (isset( $publicity_shova_shomuho['motobinimoy_pre']))? $publicity_shova_shomuho['motobinimoy_pre']:0; ?>
                                    </a>
                                </td>
                            <td class="tg-0pky" >
                            <?php echo number_format(($motobinimoy_num!=0 && $motobinimoy_pre!=0)?$motobinimoy_pre/$motobinimoy_num:0,2)?>
                            </td>
                        </tr>
                    
                        <tr>
                        
                        <td class="tg-pwj7 "><div><span>সংবাদ সম্মেলন</span></div></td>
                            <td class="tg-0pky  type_1" >
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="shong_shommelon_num" data-title="Enter">
                                        <?php echo $shong_shommelon_num=  (isset( $publicity_shova_shomuho['shong_shommelon_num']))? $publicity_shova_shomuho['shong_shommelon_num']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_1" >
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="publicity_shova_shomuho" data-pk="<?php echo $pk ?>" 
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                        data-name="shong_shommelon_pre" data-title="Enter">
                                        <?php echo $shong_shommelon_pre=  (isset( $publicity_shova_shomuho['shong_shommelon_pre']))? $publicity_shova_shomuho['shong_shommelon_pre']:0; ?>
                                    </a>
                                </td>
                            <td class="tg-0pky" >
                            <?php echo number_format(($shong_shommelon_num!=0 && $shong_shommelon_pre!=0)?$shong_shommelon_pre/$shong_shommelon_num:0,2)?>
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
    }.action_class{
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
$('#shompadok_ache_kina').editable({
    value: <?php echo (isset( $publicity_manpower['shompadok_ache_kina']))? $publicity_manpower['shompadok_ache_kina']:2; ?>,    
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

$('#portal_ache_kina').editable({
    value: <?php echo (isset( $publicity_shakhar_online_news_media['portal_ache_kina']))? $publicity_shakhar_online_news_media['portal_ache_kina']:2; ?>,    
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

$('#nibondhon_krito_kina').editable({
    value: <?php echo (isset( $publicity_shakhar_online_news_media['nibondhon_krito_kina']))? $publicity_shakhar_online_news_media['nibondhon_krito_kina']:2; ?>,    
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
$('#page_ache_kina').editable({
    value: <?php echo (isset( $publicity_shakhar_online_news_media['page_ache_kina']))? $publicity_shakhar_online_news_media['page_ache_kina']:2; ?>,    
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
$('#fb_varrified_kina').editable({
    value: <?php echo (isset( $publicity_shakhar_online_news_media['fb_varrified_kina']))? $publicity_shakhar_online_news_media['fb_varrified_kina']:2; ?>,    
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
$('#youtube_channel_ache_kina').editable({
    value: <?php echo (isset( $publicity_shakhar_online_news_media['youtube_channel_ache_kina']))? $publicity_shakhar_online_news_media['youtube_channel_ache_kina']:2; ?>,    
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
$('#yt_varrified_kina').editable({
    value: <?php echo (isset( $publicity_shakhar_online_news_media['yt_varrified_kina']))? $publicity_shakhar_online_news_media['yt_varrified_kina']:2; ?>,    
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
