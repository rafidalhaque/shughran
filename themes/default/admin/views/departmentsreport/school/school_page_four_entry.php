<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০৪' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                <td class="tg-pwj7" colspan="2"><b>বিতরণ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'School_বিতরণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">পূর্বের সংখ্যা </td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                            </tr>
                            <?php
                                $pk = (isset($school_bitoron['id']))?$school_bitoron['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> কিশোর পত্রিকা বাংলা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_potrika_bn_prev" data-title="Enter">
                                        <?php echo $kishor_potrika_bn_prev =  (isset($school_bitoron['kishor_potrika_bn_prev'])) ? $school_bitoron['kishor_potrika_bn_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_potrika_bn_pres" data-title="Enter">
                                        <?php echo $kishor_potrika_bn_pres =  (isset($school_bitoron['kishor_potrika_bn_pres'])) ? $school_bitoron['kishor_potrika_bn_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> নতুন কিশোর পত্রিকা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="new_kishor_potrika_bn_prev" data-title="Enter">
                                        <?php echo $new_kishor_potrika_bn_prev =  (isset($school_bitoron['new_kishor_potrika_bn_prev'])) ? $school_bitoron['new_kishor_potrika_bn_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="new_kishor_potrika_bn_pres" data-title="Enter">
                                        <?php echo $new_kishor_potrika_bn_pres =  (isset($school_bitoron['new_kishor_potrika_bn_pres'])) ? $school_bitoron['new_kishor_potrika_bn_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কিশোর পত্রিকা ইংরেজি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_portrika_en_prev" data-title="Enter">
                                        <?php echo $kishor_portrika_en_prev =  (isset($school_bitoron['kishor_portrika_en_prev'])) ? $school_bitoron['kishor_portrika_en_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_portrika_en_pres" data-title="Enter">
                                        <?php echo $kishor_portrika_en_pres =  (isset($school_bitoron['kishor_portrika_en_pres'])) ? $school_bitoron['kishor_portrika_en_pres'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্টিকার/কার্ড</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sticker_prev" data-title="Enter">
                                        <?php echo $sticker_prev =  (isset($school_bitoron['sticker_prev'])) ? $school_bitoron['sticker_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sticker_pres" data-title="Enter">
                                        <?php echo $sticker_pres =  (isset($school_bitoron['sticker_pres'])) ? $school_bitoron['sticker_pres'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> ক্লাস রুটিন</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="class_routine_prev" data-title="Enter">
                                        <?php echo $class_routine_prev =  (isset($school_bitoron['class_routine_prev'])) ? $school_bitoron['class_routine_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="class_routine_pres" data-title="Enter">
                                        <?php echo $class_routine_pres =  (isset($school_bitoron['class_routine_pres'])) ? $school_bitoron['class_routine_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> দেয়ালিকা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="deyalika_prev" data-title="Enter">
                                        <?php echo $deyalika_prev =  (isset($school_bitoron['deyalika_prev'])) ? $school_bitoron['deyalika_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="deyalika_pres" data-title="Enter">
                                        <?php echo $deyalika_pres =  (isset($school_bitoron['deyalika_pres'])) ? $school_bitoron['deyalika_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>

                                <td class="tg-y698 type_1"> পরীক্ষার রুটিন</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="exam_routine_prev" data-title="Enter">
                                        <?php echo $exam_routine_prev =  (isset($school_bitoron['exam_routine_prev'])) ? $school_bitoron['exam_routine_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="exam_routine_pres" data-title="Enter">
                                        <?php echo $exam_routine_pres =  (isset($school_bitoron['exam_routine_pres'])) ? $school_bitoron['exam_routine_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> মাসিক/দ্বিমাসিক সাময়িকি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="masik_shamoyiki_prev" data-title="Enter">
                                        <?php echo $masik_shamoyiki_prev =  (isset($school_bitoron['masik_shamoyiki_prev'])) ? $school_bitoron['masik_shamoyiki_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="masik_shamoyiki_pres" data-title="Enter">
                                        <?php echo $masik_shamoyiki_pres =  (isset($school_bitoron['masik_shamoyiki_pres'])) ? $school_bitoron['masik_shamoyiki_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">হাসির কাগজ</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hashir_kagoj_prev" data-title="Enter">
                                        <?php echo $hashir_kagoj_prev =  (isset($school_bitoron['hashir_kagoj_prev'])) ? $school_bitoron['hashir_kagoj_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hashir_kagoj_pres" data-title="Enter">
                                        <?php echo $hashir_kagoj_pres =  (isset($school_bitoron['hashir_kagoj_pres'])) ? $school_bitoron['hashir_kagoj_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফুলেল শুভেচ্ছা বাণী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="fulel_shuvechcha_prev" data-title="Enter">
                                        <?php echo $fulel_shuvechcha_prev =  (isset($school_bitoron['fulel_shuvechcha_prev'])) ? $school_bitoron['fulel_shuvechcha_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="fulel_shuvechcha_pres" data-title="Enter">
                                        <?php echo $fulel_shuvechcha_pres =  (isset($school_bitoron['fulel_shuvechcha_pres'])) ? $school_bitoron['fulel_shuvechcha_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সংক্ষিপ্ত পরিচিতি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="porchiti_prev" data-title="Enter">
                                        <?php echo $porchiti_prev =  (isset($school_bitoron['porchiti_prev'])) ? $school_bitoron['porchiti_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="porchiti_pres" data-title="Enter">
                                        <?php echo $porchiti_pres =  (isset($school_bitoron['porchiti_pres'])) ? $school_bitoron['porchiti_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাহিত্য</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shahitto_prev" data-title="Enter">
                                        <?php echo $shahitto_prev =  (isset($school_bitoron['shahitto_prev'])) ? $school_bitoron['shahitto_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shahitto_pres" data-title="Enter">
                                        <?php echo $shahitto_pres =  (isset($school_bitoron['shahitto_pres'])) ? $school_bitoron['shahitto_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ক্যালেন্ডার</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="calendar_prev" data-title="Enter">
                                        <?php echo $calendar_prev =  (isset($school_bitoron['calendar_prev'])) ? $school_bitoron['calendar_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="calendar_pres" data-title="Enter">
                                        <?php echo $calendar_pres =  (isset($school_bitoron['calendar_pres'])) ? $school_bitoron['calendar_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                        </table>
                       
                        <!-- Hide this table যোগাযোগ -->
                        <table class="tg table table-header-rotated" id="testTable2" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'School_যোগাযোগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7"> কেন্দ্র থেকে</td>
                                <td class="tg-pwj7">শাখা থেকে</td>
                                <td class="tg-pwj7">অন্যান্য</td>
                                
                            </tr>
                            <?php
                                $pk = (isset($school_contact['id']))?$school_contact['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> সার্কুলার</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['circular_kendro_theke']+$school_contact['circular_shaka_theke']+$school_contact['circular_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="circular_kendro_theke" data-title="Enter">
                                        <?php echo $circular_kendro_theke =  (isset($school_contact['circular_kendro_theke'])) ? $school_contact['circular_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="circular_shaka_theke" data-title="Enter">
                                        <?php echo $circular_shaka_theke =  (isset($school_contact['circular_shaka_theke'])) ? $school_contact['circular_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="circular_other" data-title="Enter">
                                        <?php echo $circular_other =  (isset($school_contact['circular_other'])) ? $school_contact['circular_other'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">চিঠি</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['letter_kendro_theke']+$school_contact['letter_shaka_theke']+$school_contact['letter_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="letter_kendro_theke" data-title="Enter">
                                        <?php echo $letter_kendro_theke =  (isset($school_contact['letter_kendro_theke'])) ? $school_contact['letter_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="letter_shaka_theke" data-title="Enter">
                                        <?php echo $letter_shaka_theke =  (isset($school_contact['letter_shaka_theke'])) ? $school_contact['letter_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="letter_other" data-title="Enter">
                                        <?php echo $letter_other =  (isset($school_contact['letter_other'])) ? $school_contact['letter_other'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ইমেইল</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['email_kendro_theke']+$school_contact['email_shaka_theke']+$school_contact['email_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="email_kendro_theke" data-title="Enter">
                                        <?php echo $email_kendro_theke =  (isset($school_contact['email_kendro_theke'])) ? $school_contact['email_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="email_shaka_theke" data-title="Enter">
                                        <?php echo $email_shaka_theke =  (isset($school_contact['email_shaka_theke'])) ? $school_contact['email_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="email_other" data-title="Enter">
                                        <?php echo $email_other =  (isset($school_contact['email_other'])) ? $school_contact['email_other'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">এসএমএস</td>
                                <td class="tg-0pky">
                                    <?= $school_contact['sms_kendro_theke']+$school_contact['sms_shaka_theke']+$school_contact['sms_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sms_kendro_theke" data-title="Enter">
                                        <?php echo $sms_kendro_theke =  (isset($school_contact['sms_kendro_theke'])) ? $school_contact['sms_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sms_shaka_theke" data-title="Enter">
                                        <?php echo $sms_shaka_theke =  (isset($school_contact['sms_shaka_theke'])) ? $school_contact['sms_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sms_other" data-title="Enter">
                                        <?php echo $sms_other =  (isset($school_contact['sms_other'])) ? $school_contact['sms_other'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                        </table>
                     
                        <!-- Hide this table সফর -->
                        <table class="tg table table-header-rotated" id="testTable3" style="display:none;">
                        
                            <tr>
                                <td class="tg-pwj7" colspan="1"><b>সফর</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'School_সফর_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">কোথা থেকে </td>
                                <td class="tg-pwj7">কতবার </td>
                            </tr>
                            <?php
                                $pk = (isset($school_sofor['id']))?$school_sofor['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> কেন্দ্র(সম্পাদক)</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="central_sompadok" data-title="Enter">
                                        <?php echo $central_sompadok =  (isset($school_sofor['central_sompadok'])) ? $school_sofor['central_sompadok'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> কেন্দ্র (বিভাগীয় সদস্য)</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="central_member" data-title="Enter">
                                        <?php echo $central_member =  (isset($school_sofor['central_member'])) ? $school_sofor['central_member'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">শাখা (সভাপতি-সেক্রেটারি)</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shakha_p_s" data-title="Enter">
                                        <?php echo $shakha_p_s =  (isset($school_sofor['shakha_p_s'])) ? $school_sofor['shakha_p_s'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">শাখা (সেক্রেটারিয়েট সদস্য)</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shakha_sec" data-title="Enter">
                                        <?php echo $shakha_sec =  (isset($school_sofor['shakha_sec'])) ? $school_sofor['shakha_sec'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                        </table>
                  

                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="8"><b>এসএসসি ফলাফল পরিসংখ্যান </b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'School_এসএসসি ফলাফল পরিসংখ্যান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7" colspan='2'>জনশক্তি</td>
                                <td class="tg-pwj7">মোট পরীক্ষার্থী</td>
                                <td class="tg-pwj7">জিপিএ-৫</td>
                                <td class="tg-pwj7">এ গ্রেড</td>
                                <td class="tg-pwj7">এ- গ্রেড</td>
                                <td class="tg-pwj7">বি গ্রেড</td>
                                <td class="tg-pwj7">সি গ্রেড</td>
                                <td class="tg-pwj7">ডি গ্রেড</td>
                                <td class="tg-pwj7">মোট</td>
                            </tr>
                            <?php
                                $pk = (isset($school_ssc_result['id']))?$school_ssc_result['id']:'';
                            ?>
                             <?php 
                                $total_s_biggan = $total_s_manobik = $total_s_bebsa = $total_kormi_bebsa = $total_kormi_manobik = $total_kormi_biggan = 0; 
                                $total_sathi_biggan = $total_sathi_manobik = $total_sathi_bebsa = 0; 
                                $total_shomorthok_biggan = $total_shomorthok_manobik = $total_shomorthok_bebsa = 0; 
                                $total_somorthok_biggan = $total_somorthok_manobik = $total_somorthok_bebsa = 0; 
                                $total_examinee = $total_gpa_5 = $total_a_grade = $total_a_minas_grade = $total_b_grade = $total_c_grade = $total_d_grade =  $total_manobik = 0; 
                            ?>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>১</td>
                                <td class="tg-y698 type_1" rowspan='3'>সদস্য</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_mot_examine" data-title="Enter">
                                        <?php echo $shodossho_s_mot_examine =  (isset($school_ssc_result['shodossho_s_mot_examine'])) ? $school_ssc_result['shodossho_s_mot_examine'] : 0;     
                                        $total_examinee += $shodossho_s_mot_examine;    ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_gpa_5" data-title="Enter">
                                        <?php echo $shodossho_s_gpa_5 =  (isset($school_ssc_result['shodossho_s_gpa_5'])) ? $school_ssc_result['shodossho_s_gpa_5'] : 0;    $total_s_biggan += $shodossho_s_gpa_5; 
                                        $total_gpa_5 += $shodossho_s_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_a_grade" data-title="Enter">
                                        <?php echo $shodossho_s_a_grade =  (isset($school_ssc_result['shodossho_s_a_grade'])) ? $school_ssc_result['shodossho_s_a_grade'] : 0;  $total_s_biggan += $shodossho_s_a_grade; 
                                        $total_a_grade += $shodossho_s_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_a_minus" data-title="Enter">
                                        <?php echo $shodossho_s_a_minus =  (isset($school_ssc_result['shodossho_s_a_minus'])) ? $school_ssc_result['shodossho_s_a_minus'] : 0;  $total_s_biggan += $shodossho_s_a_minus; 
                                        $total_a_minas_grade += $shodossho_s_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_b_grade" data-title="Enter">
                                        <?php echo $shodossho_s_b_grade =  (isset($school_ssc_result['shodossho_s_b_grade'])) ? $school_ssc_result['shodossho_s_b_grade'] : 0;  $total_s_biggan += $shodossho_s_b_grade; 
                                        $total_b_grade += $shodossho_s_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_c_grade" data-title="Enter">
                                        <?php echo $shodossho_s_c_grade =  (isset($school_ssc_result['shodossho_s_c_grade'])) ? $school_ssc_result['shodossho_s_c_grade'] : 0; $total_s_biggan += $shodossho_s_c_grade; 
                                        $total_c_grade += $shodossho_s_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_s_d_grade" data-title="Enter">
                                        <?php echo $shodossho_s_d_grade =  (isset($school_ssc_result['shodossho_s_d_grade'])) ? $school_ssc_result['shodossho_s_d_grade'] : 0;   $total_s_biggan += $shodossho_s_d_grade; 
                                        $total_d_grade += $shodossho_s_d_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_biggan; ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_mot_examine" data-title="Enter">
                                        <?php echo $shodossho_a_mot_examine =  (isset($school_ssc_result['shodossho_a_mot_examine'])) ? $school_ssc_result['shodossho_a_mot_examine'] : 0;   
                                        $total_examinee += $shodossho_a_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_gpa_5" data-title="Enter">
                                        <?php echo $shodossho_a_gpa_5 =  (isset($school_ssc_result['shodossho_a_gpa_5'])) ? $school_ssc_result['shodossho_a_gpa_5'] : 0;  $total_s_manobik += $shodossho_a_gpa_5; 
                                        $total_gpa_5 += $shodossho_a_gpa_5; 
?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_a_grade" data-title="Enter">
                                        <?php echo $shodossho_a_a_grade =  (isset($school_ssc_result['shodossho_a_a_grade'])) ? $school_ssc_result['shodossho_a_a_grade'] : 0;  $total_s_manobik += $shodossho_a_a_grade; 
                                        $total_a_grade += $shodossho_a_a_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_a_minus" data-title="Enter">
                                        <?php echo $shodossho_a_a_minus =  (isset($school_ssc_result['shodossho_a_a_minus'])) ? $school_ssc_result['shodossho_a_a_minus'] : 0;  $total_s_manobik += $shodossho_a_a_minus; 
                                        $total_a_minas_grade += $shodossho_a_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_b_grade" data-title="Enter">
                                        <?php echo $shodossho_a_b_grade =  (isset($school_ssc_result['shodossho_a_b_grade'])) ? $school_ssc_result['shodossho_a_b_grade'] : 0; $total_s_manobik += $shodossho_a_b_grade; 
                                        $total_b_grade += $shodossho_a_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_c_grade" data-title="Enter">
                                        <?php echo $shodossho_a_c_grade =  (isset($school_ssc_result['shodossho_a_c_grade'])) ? $school_ssc_result['shodossho_a_c_grade'] : 0; $total_s_manobik += $shodossho_a_c_grade; 
                                        $total_c_grade += $shodossho_a_c_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_a_d_grade" data-title="Enter">
                                        <?php echo $shodossho_a_d_grade =  (isset($school_ssc_result['shodossho_a_d_grade'])) ? $school_ssc_result['shodossho_a_d_grade'] : 0;  $total_s_manobik += $shodossho_a_d_grade; 
                                        $total_d_grade += $shodossho_a_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_mot_examine" data-title="Enter">
                                        <?php echo $shodossho_c_mot_examine =  (isset($school_ssc_result['shodossho_c_mot_examine'])) ? $school_ssc_result['shodossho_c_mot_examine'] : 0;   
                                        $total_examinee += $shodossho_c_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_gpa_5" data-title="Enter">
                                        <?php echo $shodossho_c_gpa_5 =  (isset($school_ssc_result['shodossho_c_gpa_5'])) ? $school_ssc_result['shodossho_c_gpa_5'] : 0; $total_s_bebsa += $shodossho_c_gpa_5; 
                                        $total_gpa_5 += $shodossho_c_gpa_5;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_a_grade" data-title="Enter">
                                        <?php echo $shodossho_c_a_grade =  (isset($school_ssc_result['shodossho_c_a_grade'])) ? $school_ssc_result['shodossho_c_a_grade'] : 0;  $total_s_bebsa += $shodossho_c_a_grade; 
                                        $total_a_grade += $shodossho_c_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_a_minus" data-title="Enter">
                                        <?php echo $shodossho_c_a_minus =  (isset($school_ssc_result['shodossho_c_a_minus'])) ? $school_ssc_result['shodossho_c_a_minus'] : 0; $total_s_bebsa += $shodossho_c_a_minus; 
                                        $total_a_minas_grade += $shodossho_c_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_b_grade" data-title="Enter">
                                        <?php echo $shodossho_c_b_grade =  (isset($school_ssc_result['shodossho_c_b_grade'])) ? $school_ssc_result['shodossho_c_b_grade'] : 0;  $total_s_bebsa += $shodossho_c_b_grade; 
                                        $total_b_grade += $shodossho_c_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_c_grade" data-title="Enter">
                                        <?php echo $shodossho_c_c_grade =  (isset($school_ssc_result['shodossho_c_c_grade'])) ? $school_ssc_result['shodossho_c_c_grade'] : 0; $total_s_bebsa += $shodossho_c_c_grade; 
                                        $total_c_grade += $shodossho_c_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shodossho_c_d_grade" data-title="Enter">
                                        <?php echo $shodossho_c_d_grade =  (isset($school_ssc_result['shodossho_c_d_grade'])) ? $school_ssc_result['shodossho_c_d_grade'] : 0; $total_s_bebsa += $shodossho_c_d_grade; 
                                        $total_d_grade += $shodossho_c_d_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_s_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>২</td>
                                <td class="tg-y698 type_1" rowspan='3'>সাথী</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_mot_examine" data-title="Enter">
                                        <?php echo $sathi_s_mot_examine =  (isset($school_ssc_result['sathi_s_mot_examine'])) ? $school_ssc_result['sathi_s_mot_examine'] : 0; 
                                        $total_examinee += $sathi_s_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_gpa_5" data-title="Enter">
                                        <?php echo $sathi_s_gpa_5 =  (isset($school_ssc_result['sathi_s_gpa_5'])) ? $school_ssc_result['sathi_s_gpa_5'] : 0;  $total_sathi_biggan += $sathi_s_gpa_5;
                                        $total_gpa_5 += $sathi_s_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_a_grade" data-title="Enter">
                                        <?php echo $sathi_s_a_grade =  (isset($school_ssc_result['sathi_s_a_grade'])) ? $school_ssc_result['sathi_s_a_grade'] : 0; $total_sathi_biggan += $sathi_s_a_grade;
                                        $total_a_grade += $sathi_s_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_a_minus" data-title="Enter">
                                        <?php echo $sathi_s_a_minus =  (isset($school_ssc_result['sathi_s_a_minus'])) ? $school_ssc_result['sathi_s_a_minus'] : 0;  $total_sathi_biggan += $sathi_s_a_minus;
                                        $total_a_minas_grade += $sathi_s_a_minus;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_b_grade" data-title="Enter">
                                        <?php echo $sathi_s_b_grade =  (isset($school_ssc_result['sathi_s_b_grade'])) ? $school_ssc_result['sathi_s_b_grade'] : 0; $total_sathi_biggan += $sathi_s_b_grade;
                                        $total_b_grade += $sathi_s_b_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_c_grade" data-title="Enter">
                                        <?php echo $sathi_s_c_grade =  (isset($school_ssc_result['sathi_s_c_grade'])) ? $school_ssc_result['sathi_s_c_grade'] : 0; $total_sathi_biggan += $sathi_s_c_grade;
                                        $total_c_grade += $sathi_s_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_s_d_grade" data-title="Enter">
                                        <?php echo $sathi_s_d_grade =  (isset($school_ssc_result['sathi_s_d_grade'])) ? $school_ssc_result['sathi_s_d_grade'] : 0;  $total_sathi_biggan += $sathi_s_d_grade;
                                        $total_d_grade += $sathi_s_d_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_mot_examine" data-title="Enter">
                                        <?php echo $sathi_a_mot_examine =  (isset($school_ssc_result['sathi_a_mot_examine'])) ? $school_ssc_result['sathi_a_mot_examine'] : 0;  
                                        $total_examinee += $sathi_a_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_gpa_5" data-title="Enter">
                                        <?php echo $sathi_a_gpa_5 =  (isset($school_ssc_result['sathi_a_gpa_5'])) ? $school_ssc_result['sathi_a_gpa_5'] : 0;$total_sathi_manobik += $sathi_a_gpa_5; 
                                        $total_gpa_5 += $sathi_a_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_a_grade" data-title="Enter">
                                        <?php echo $sathi_a_a_grade =  (isset($school_ssc_result['sathi_a_a_grade'])) ? $school_ssc_result['sathi_a_a_grade'] : 0;$total_sathi_manobik += $sathi_a_a_grade; 
                                        $total_a_grade += $sathi_a_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_a_minus" data-title="Enter">
                                        <?php echo $sathi_a_a_minus =  (isset($school_ssc_result['sathi_a_a_minus'])) ? $school_ssc_result['sathi_a_a_minus'] : 0;  $total_sathi_manobik += $sathi_a_a_minus; 
                                        $total_a_minas_grade += $sathi_a_a_minus;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_b_grade" data-title="Enter">
                                        <?php echo $sathi_a_b_grade =  (isset($school_ssc_result['sathi_a_b_grade'])) ? $school_ssc_result['sathi_a_b_grade'] : 0; $total_sathi_manobik += $sathi_a_b_grade; 
                                        $total_b_grade += $sathi_a_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_c_grade" data-title="Enter">
                                        <?php echo $sathi_a_c_grade =  (isset($school_ssc_result['sathi_a_c_grade'])) ? $school_ssc_result['sathi_a_c_grade'] : 0; $total_sathi_manobik += $sathi_a_c_grade; 
                                        $total_c_grade += $sathi_a_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_a_d_grade" data-title="Enter">
                                        <?php echo $sathi_a_d_grade =  (isset($school_ssc_result['sathi_a_d_grade'])) ? $school_ssc_result['sathi_a_d_grade'] : 0; $total_sathi_manobik += $sathi_a_d_grade; 
                                        $total_d_grade += $sathi_a_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_mot_examine" data-title="Enter">
                                        <?php echo $sathi_c_mot_examine =  (isset($school_ssc_result['sathi_c_mot_examine'])) ? $school_ssc_result['sathi_c_mot_examine'] : 0; 
                                        $total_examinee += $sathi_c_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_gpa_5" data-title="Enter">
                                        <?php echo $sathi_c_gpa_5 =  (isset($school_ssc_result['sathi_c_gpa_5'])) ? $school_ssc_result['sathi_c_gpa_5'] : 0; $total_sathi_bebsa += $sathi_c_gpa_5; 
                                        $total_gpa_5 += $sathi_c_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_a_grade" data-title="Enter">
                                        <?php echo $sathi_c_a_grade =  (isset($school_ssc_result['sathi_c_a_grade'])) ? $school_ssc_result['sathi_c_a_grade'] : 0; $total_sathi_bebsa += $sathi_c_a_grade; 
                                        $total_a_grade += $sathi_c_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_a_minus" data-title="Enter">
                                        <?php echo $sathi_c_a_minus =  (isset($school_ssc_result['sathi_c_a_minus'])) ? $school_ssc_result['sathi_c_a_minus'] : 0;   $total_sathi_bebsa += $sathi_c_a_minus; 
                                        $total_a_minas_grade += $sathi_c_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_b_grade" data-title="Enter">
                                        <?php echo $sathi_c_b_grade =  (isset($school_ssc_result['sathi_c_b_grade'])) ? $school_ssc_result['sathi_c_b_grade'] : 0;    $total_sathi_bebsa += $sathi_c_b_grade; 
                                        $total_b_grade += $sathi_c_b_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_c_grade" data-title="Enter">
                                        <?php echo $sathi_c_c_grade =  (isset($school_ssc_result['sathi_c_c_grade'])) ? $school_ssc_result['sathi_c_c_grade'] : 0; $total_sathi_bebsa += $sathi_c_c_grade; 
                                        $total_c_grade += $sathi_c_c_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_c_d_grade" data-title="Enter">
                                        <?php echo $sathi_c_d_grade =  (isset($school_ssc_result['sathi_c_d_grade'])) ? $school_ssc_result['sathi_c_d_grade'] : 0;  $total_sathi_bebsa += $sathi_c_d_grade; 
                                        $total_d_grade += $sathi_c_d_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_sathi_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>৩</td>
                                <td class="tg-y698 type_1" rowspan='3'>কর্মী</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_mot_examine" data-title="Enter">
                                        <?php echo $kormi_s_mot_examine =  (isset($school_ssc_result['kormi_s_mot_examine'])) ? $school_ssc_result['kormi_s_mot_examine'] : 0;  
                                        $total_examinee += $kormi_s_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_gpa_5" data-title="Enter">
                                        <?php echo $kormi_s_gpa_5 =  (isset($school_ssc_result['kormi_s_gpa_5'])) ? $school_ssc_result['kormi_s_gpa_5'] : 0;  $total_kormi_biggan += $kormi_s_gpa_5; 
                                        $total_gpa_5 += $kormi_s_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_a_grade" data-title="Enter">
                                        <?php echo $kormi_s_a_grade =  (isset($school_ssc_result['kormi_s_a_grade'])) ? $school_ssc_result['kormi_s_a_grade'] : 0; $total_kormi_biggan += $kormi_s_a_grade; 
                                        $total_a_grade += $kormi_s_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_a_minus" data-title="Enter">
                                        <?php echo $kormi_s_a_minus =  (isset($school_ssc_result['kormi_s_a_minus'])) ? $school_ssc_result['kormi_s_a_minus'] : 0;  $total_kormi_biggan += $kormi_s_a_minus; 
                                        $total_a_minas_grade += $kormi_s_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_b_grade" data-title="Enter">
                                        <?php echo $kormi_s_b_grade =  (isset($school_ssc_result['kormi_s_b_grade'])) ? $school_ssc_result['kormi_s_b_grade'] : 0; $total_kormi_biggan += $kormi_s_b_grade; 
                                        $total_b_grade += $kormi_s_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_c_grade" data-title="Enter">
                                        <?php echo $kormi_s_c_grade =  (isset($school_ssc_result['kormi_s_c_grade'])) ? $school_ssc_result['kormi_s_c_grade'] : 0;$total_kormi_biggan += $kormi_s_c_grade; 
                                        $total_c_grade += $kormi_s_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_s_d_grade" data-title="Enter">
                                        <?php echo $kormi_s_d_grade =  (isset($school_ssc_result['kormi_s_d_grade'])) ? $school_ssc_result['kormi_s_d_grade'] : 0;                  $total_kormi_biggan += $kormi_s_d_grade; 
                                        $total_d_grade += $kormi_s_d_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_mot_examine" data-title="Enter">
                                        <?php echo $kormi_a_mot_examine =  (isset($school_ssc_result['kormi_a_mot_examine'])) ? $school_ssc_result['kormi_a_mot_examine'] : 0;  
                                        $total_examinee += $kormi_a_mot_examine;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_gpa_5" data-title="Enter">
                                        <?php echo $kormi_a_gpa_5 =  (isset($school_ssc_result['kormi_a_gpa_5'])) ? $school_ssc_result['kormi_a_gpa_5'] : 0;  $total_kormi_manobik += $kormi_a_gpa_5; 
                                        $total_gpa_5 += $kormi_a_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_a_grade" data-title="Enter">
                                        <?php echo $kormi_a_a_grade =  (isset($school_ssc_result['kormi_a_a_grade'])) ? $school_ssc_result['kormi_a_a_grade'] : 0;$total_kormi_manobik += $kormi_a_a_grade; 
                                        $total_a_grade += $kormi_a_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_a_minus" data-title="Enter">
                                        <?php echo $kormi_a_a_minus =  (isset($school_ssc_result['kormi_a_a_minus'])) ? $school_ssc_result['kormi_a_a_minus'] : 0; $total_kormi_manobik += $kormi_a_a_minus; 
                                        $total_a_minas_grade += $kormi_a_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_b_grade" data-title="Enter">
                                        <?php echo $kormi_a_b_grade =  (isset($school_ssc_result['kormi_a_b_grade'])) ? $school_ssc_result['kormi_a_b_grade'] : 0;  $total_kormi_manobik += $kormi_a_b_grade; 
                                        $total_b_grade += $kormi_a_b_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_c_grade" data-title="Enter">
                                        <?php echo $kormi_a_c_grade =  (isset($school_ssc_result['kormi_a_c_grade'])) ? $school_ssc_result['kormi_a_c_grade'] : 0; $total_kormi_manobik += $kormi_a_c_grade; 
                                        $total_c_grade += $kormi_a_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_a_d_grade" data-title="Enter">
                                        <?php echo $kormi_a_d_grade =  (isset($school_ssc_result['kormi_a_d_grade'])) ? $school_ssc_result['kormi_a_d_grade'] : 0; $total_kormi_manobik += $kormi_a_d_grade; 
                                        $total_d_grade += $kormi_a_d_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_manobik;?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_mot_examine" data-title="Enter">
                                        <?php echo $kormi_c_mot_examine =  (isset($school_ssc_result['kormi_c_mot_examine'])) ? $school_ssc_result['kormi_c_mot_examine'] : 0; 
                                        $total_examinee += $kormi_c_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_gpa_5" data-title="Enter">
                                        <?php echo $kormi_c_gpa_5 =  (isset($school_ssc_result['kormi_c_gpa_5'])) ? $school_ssc_result['kormi_c_gpa_5'] : 0; $total_kormi_bebsa += $kormi_c_gpa_5; 
                                        $total_gpa_5 += $kormi_c_gpa_5; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_a_grade" data-title="Enter">
                                        <?php echo $kormi_c_a_grade =  (isset($school_ssc_result['kormi_c_a_grade'])) ? $school_ssc_result['kormi_c_a_grade'] : 0;  $total_kormi_bebsa += $kormi_c_a_grade; 
                                        $total_a_grade += $kormi_c_a_grade;   ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_a_minus" data-title="Enter">
                                        <?php echo $kormi_c_a_minus =  (isset($school_ssc_result['kormi_c_a_minus'])) ? $school_ssc_result['kormi_c_a_minus'] : 0;  $total_kormi_bebsa += $kormi_c_a_minus; 
                                        $total_a_minas_grade += $kormi_c_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_b_grade" data-title="Enter">
                                        <?php echo $kormi_c_b_grade =  (isset($school_ssc_result['kormi_c_b_grade'])) ? $school_ssc_result['kormi_c_b_grade'] : 0;   $total_kormi_bebsa += $kormi_c_b_grade;
                                        $total_b_grade += $kormi_c_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_c_grade" data-title="Enter">
                                        <?php echo $kormi_c_c_grade =  (isset($school_ssc_result['kormi_c_c_grade'])) ? $school_ssc_result['kormi_c_c_grade'] : 0;  $total_kormi_bebsa += $kormi_c_c_grade;
                                        $total_c_grade += $kormi_c_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_c_d_grade" data-title="Enter">
                                        <?php echo $kormi_c_d_grade =  (isset($school_ssc_result['kormi_c_d_grade'])) ? $school_ssc_result['kormi_c_d_grade'] : 0;$total_kormi_bebsa += $kormi_c_d_grade;
                                        $total_d_grade += $kormi_c_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_kormi_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='3'>৪</td>
                                <td class="tg-y698 type_1" rowspan='3'>সমর্থক</td>
                                <td class="tg-y698 type_1">বিজ্ঞান</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_s_mot_examine =  (isset($school_ssc_result['shomorthok_s_mot_examine'])) ? $school_ssc_result['shomorthok_s_mot_examine'] : 0;   
                                        $total_examinee += $shomorthok_s_mot_examine; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_s_gpa_5 =  (isset($school_ssc_result['shomorthok_s_gpa_5'])) ? $school_ssc_result['shomorthok_s_gpa_5'] : 0;  $total_somorthok_biggan += $shomorthok_s_gpa_5;
                                        $total_gpa_5 += $shomorthok_s_gpa_5;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_a_grade =  (isset($school_ssc_result['shomorthok_s_a_grade'])) ? $school_ssc_result['shomorthok_s_a_grade'] : 0; $total_somorthok_biggan += $shomorthok_s_a_grade;
                                        $total_a_grade += $shomorthok_s_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_s_a_minus =  (isset($school_ssc_result['shomorthok_s_a_minus'])) ? $school_ssc_result['shomorthok_s_a_minus'] : 0;  $total_somorthok_biggan += $shomorthok_s_a_minus;
                                        $total_a_minas_grade += $shomorthok_s_a_minus;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_b_grade =  (isset($school_ssc_result['shomorthok_s_b_grade'])) ? $school_ssc_result['shomorthok_s_b_grade'] : 0; $total_somorthok_biggan += $shomorthok_s_b_grade;
                                        $total_b_grade += $shomorthok_s_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_c_grade =  (isset($school_ssc_result['shomorthok_s_c_grade'])) ? $school_ssc_result['shomorthok_s_c_grade'] : 0;  $total_somorthok_biggan += $shomorthok_s_c_grade;
                                        $total_c_grade += $shomorthok_s_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_s_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_s_d_grade =  (isset($school_ssc_result['shomorthok_s_d_grade'])) ? $school_ssc_result['shomorthok_s_d_grade'] : 0; $total_somorthok_biggan += $shomorthok_s_d_grade;
                                        $total_d_grade += $shomorthok_s_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_somorthok_biggan;?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">মানবিক</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_a_mot_examine =  (isset($school_ssc_result['shomorthok_a_mot_examine'])) ? $school_ssc_result['shomorthok_a_mot_examine'] : 0; 
                                        $total_examinee += $shomorthok_a_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_a_gpa_5 =  (isset($school_ssc_result['shomorthok_a_gpa_5'])) ? $school_ssc_result['shomorthok_a_gpa_5'] : 0;  $total_somorthok_manobik += $shomorthok_a_gpa_5;
                                        $total_gpa_5 += $shomorthok_a_gpa_5;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_a_grade =  (isset($school_ssc_result['shomorthok_a_a_grade'])) ? $school_ssc_result['shomorthok_a_a_grade'] : 0;     $total_somorthok_manobik += $shomorthok_a_a_grade;
                                        $total_a_grade += $shomorthok_a_a_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_a_a_minus =  (isset($school_ssc_result['shomorthok_a_a_minus'])) ? $school_ssc_result['shomorthok_a_a_minus'] : 0;  $total_somorthok_manobik += $shomorthok_a_a_minus;
                                        $total_a_minas_grade += $shomorthok_a_a_minus; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_b_grade =  (isset($school_ssc_result['shomorthok_a_b_grade'])) ? $school_ssc_result['shomorthok_a_b_grade'] : 0;  $total_somorthok_manobik += $shomorthok_a_b_grade; 
                                        $total_b_grade += $shomorthok_a_b_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_c_grade =  (isset($school_ssc_result['shomorthok_a_c_grade'])) ? $school_ssc_result['shomorthok_a_c_grade'] : 0;  $total_somorthok_manobik += $shomorthok_a_c_grade; 
                                        $total_c_grade += $shomorthok_a_c_grade;?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_a_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_a_d_grade =  (isset($school_ssc_result['shomorthok_a_d_grade'])) ? $school_ssc_result['shomorthok_a_d_grade'] : 0;   $total_somorthok_manobik += $shomorthok_a_d_grade; 
                                        $total_d_grade += $shomorthok_a_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?=  
                                        $total_somorthok_manobik; 
                                        $total_manobik += $total_somorthok_manobik;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বাণিজ্য</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_mot_examine" data-title="Enter">
                                        <?php echo $shomorthok_c_mot_examine =  (isset($school_ssc_result['shomorthok_c_mot_examine'])) ? $school_ssc_result['shomorthok_c_mot_examine'] : 0;  
                                        $total_examinee += $shomorthok_c_mot_examine;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_gpa_5" data-title="Enter">
                                        <?php echo $shomorthok_c_gpa_5 =  (isset($school_ssc_result['shomorthok_c_gpa_5'])) ? $school_ssc_result['shomorthok_c_gpa_5'] : 0;   $total_somorthok_bebsa += $shomorthok_c_gpa_5; 
                                        $total_gpa_5 += $shomorthok_c_gpa_5;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_a_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_a_grade =  (isset($school_ssc_result['shomorthok_c_a_grade'])) ? $school_ssc_result['shomorthok_c_a_grade'] : 0; $total_somorthok_bebsa += $shomorthok_c_a_grade; 
                                        $total_a_grade += $shomorthok_c_a_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_a_minus" data-title="Enter">
                                        <?php echo $shomorthok_c_a_minus =  (isset($school_ssc_result['shomorthok_c_a_minus'])) ? $school_ssc_result['shomorthok_c_a_minus'] : 0; $total_somorthok_bebsa += $shomorthok_c_a_minus; 
                                        $total_a_minas_grade += $shomorthok_c_a_minus;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_b_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_b_grade =  (isset($school_ssc_result['shomorthok_c_b_grade'])) ? $school_ssc_result['shomorthok_c_b_grade'] : 0; $total_somorthok_bebsa += $shomorthok_c_b_grade; 
                                        $total_b_grade += $shomorthok_c_b_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_c_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_c_grade =  (isset($school_ssc_result['shomorthok_c_c_grade'])) ? $school_ssc_result['shomorthok_c_c_grade'] : 0; $total_somorthok_bebsa += $shomorthok_c_c_grade; 
                                        $total_c_grade += $shomorthok_c_c_grade;  ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_ssc_result" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shomorthok_c_d_grade" data-title="Enter">
                                        <?php echo $shomorthok_c_d_grade =  (isset($school_ssc_result['shomorthok_c_d_grade'])) ? $school_ssc_result['shomorthok_c_d_grade'] : 0;  $total_somorthok_bebsa += $shomorthok_c_d_grade; 
                                        $total_d_grade += $shomorthok_c_d_grade; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_somorthok_bebsa; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" colspan='3'>মোট</td>
                                <?php 
                                    $total_of_total = 0; 
                                ?>
                                <td class="tg-0pky">
                                    <?php echo $total_examinee;  ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_gpa_5; $total_of_total += $total_gpa_5; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_a_grade; $total_of_total += $total_a_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_a_minas_grade; $total_of_total += $total_a_minas_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_b_grade; $total_of_total += $total_b_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_c_grade; $total_of_total += $total_c_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $total_d_grade; $total_of_total += $total_d_grade; ?>
                                </td>
                                <td class="tg-0pky">
                                    <?= $total_of_total; ?>
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
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
    }

    .tg .tg-0pky {
        border-color: black;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
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
        padding: 0; 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>