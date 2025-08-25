<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/school-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                <td class="tg-pwj7" colspan="3"><b>দাওয়াতি আসর </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'School_দাওয়াতি আসর_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">প্রোগ্রামের সংখ্যা</td>
                                <td class="tg-pwj7">মোট উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_dowati_asor['id']))?$school_dowati_asor['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> গল্প বলার আসর</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="golpo_asor_num" data-title="Enter">
                                        <?php echo $golpo_asor_num =  (isset($school_dowati_asor['golpo_asor_num'])) ? $school_dowati_asor['golpo_asor_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="golpo_asor_pre" data-title="Enter">
                                        <?php echo $golpo_asor_pre =  (isset($school_dowati_asor['golpo_asor_pre'])) ? $school_dowati_asor['golpo_asor_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($golpo_asor_pre!=0 && $golpo_asor_num!=0 )?$golpo_asor_pre / $golpo_asor_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কবিতা পাঠের আসর</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kobita_asor_num" data-title="Enter">
                                        <?php echo $kobita_asor_num =  (isset($school_dowati_asor['kobita_asor_num'])) ? $school_dowati_asor['kobita_asor_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kobita_asor_pre" data-title="Enter">
                                        <?php echo $kobita_asor_pre =  (isset($school_dowati_asor['kobita_asor_pre'])) ? $school_dowati_asor['kobita_asor_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($kobita_asor_pre!=0 && $kobita_asor_num!=0 )?$kobita_asor_pre / $kobita_asor_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> এসো শুনি নবির বাণী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="nobir_bani_num" data-title="Enter">
                                        <?php echo $nobir_bani_num =  (isset($school_dowati_asor['nobir_bani_num'])) ? $school_dowati_asor['nobir_bani_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="nobir_bani_pre" data-title="Enter">
                                        <?php echo $nobir_bani_pre =  (isset($school_dowati_asor['nobir_bani_pre'])) ? $school_dowati_asor['nobir_bani_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($nobir_bani_pre!=0 && $nobir_bani_num!=0 )?$nobir_bani_pre / $nobir_bani_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাহসী মানুষের গল্প শুনি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sahosi_manus_num" data-title="Enter">
                                        <?php echo $sahosi_manus_num =  (isset($school_dowati_asor['sahosi_manus_num'])) ? $school_dowati_asor['sahosi_manus_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sahosi_manus_pre" data-title="Enter">
                                        <?php echo $sahosi_manus_pre =  (isset($school_dowati_asor['sahosi_manus_pre'])) ? $school_dowati_asor['sahosi_manus_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sahosi_manus_pre!=0 && $sahosi_manus_num!=0 )?$sahosi_manus_pre / $sahosi_manus_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাহাবীদের গল্প শুনি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sahabi_num" data-title="Enter">
                                        <?php echo $sahabi_num =  (isset($school_dowati_asor['sahabi_num'])) ? $school_dowati_asor['sahabi_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sahabi_pre" data-title="Enter">
                                        <?php echo $sahabi_pre =  (isset($school_dowati_asor['sahabi_pre'])) ? $school_dowati_asor['sahabi_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sahabi_pre!=0 && $sahabi_num!=0 )?$sahabi_pre / $sahabi_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">মুসলিম মনিষীদের জীবনী শুনি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="muslim_giboni_num" data-title="Enter">
                                        <?php echo $muslim_giboni_num =  (isset($school_dowati_asor['muslim_giboni_num'])) ? $school_dowati_asor['muslim_giboni_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_dowati_asor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="muslim_giboni_pre" data-title="Enter">
                                        <?php echo $muslim_giboni_pre =  (isset($school_dowati_asor['muslim_giboni_pre'])) ? $school_dowati_asor['muslim_giboni_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($muslim_giboni_pre!=0 && $muslim_giboni_num!=0 )?$muslim_giboni_pre / $muslim_giboni_num:0 ?>
                                </td>
                            </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>ক্রিয়েটিভিটি সার্চ </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'School_ক্রিয়েটিভিটি সার্চ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">প্রোগ্রামের সংখ্যা</td>
                                <td class="tg-pwj7">মোট উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_creative_search['id']))?$school_creative_search['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> সুন্দর হাতের লেখা প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hand_writing_com_num" data-title="Enter">
                                        <?php echo $hand_writing_com_num =  (isset($school_creative_search['hand_writing_com_num'])) ? $school_creative_search['hand_writing_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hand_writing_com_pre" data-title="Enter">
                                        <?php echo $hand_writing_com_pre =  (isset($school_creative_search['hand_writing_com_pre'])) ? $school_creative_search['hand_writing_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($hand_writing_com_pre!=0 && $hand_writing_com_num!=0 )?$hand_writing_com_pre / $hand_writing_com_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">উপস্থিত বক্তব্য প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="debate_com_num" data-title="Enter">
                                        <?php echo $debate_com_num =  (isset($school_creative_search['debate_com_num'])) ? $school_creative_search['debate_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="debate_com_pre" data-title="Enter">
                                        <?php echo $debate_com_pre =  (isset($school_creative_search['debate_com_pre'])) ? $school_creative_search['debate_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($debate_com_pre!=0 && $debate_com_num!=0 )?$debate_com_pre / $debate_com_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> মেমোরি টেস্ট</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="memory_test_num" data-title="Enter">
                                        <?php echo $memory_test_num =  (isset($school_creative_search['memory_test_num'])) ? $school_creative_search['memory_test_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="memory_test_pre" data-title="Enter">
                                        <?php echo $memory_test_pre =  (isset($school_creative_search['memory_test_pre'])) ? $school_creative_search['memory_test_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($memory_test_pre!=0 && $memory_test_num!=0 )?$memory_test_pre / $memory_test_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> শব্দ তৈরি</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="word_com_num" data-title="Enter">
                                        <?php echo $word_com_num =  (isset($school_creative_search['word_com_num'])) ? $school_creative_search['word_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="word_com_pre" data-title="Enter">
                                        <?php echo $word_com_pre =  (isset($school_creative_search['word_com_pre'])) ? $school_creative_search['word_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($word_com_pre!=0 && $word_com_num!=0 )?$word_com_pre / $word_com_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ছবি আঁকা প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="drawing_com_num" data-title="Enter">
                                        <?php echo $drawing_com_num =  (isset($school_creative_search['drawing_com_num'])) ? $school_creative_search['drawing_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="drawing_com_pre" data-title="Enter">
                                        <?php echo $drawing_com_pre =  (isset($school_creative_search['drawing_com_pre'])) ? $school_creative_search['drawing_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($drawing_com_pre!=0 && $drawing_com_num!=0 )?$drawing_com_pre / $drawing_com_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> রচনা প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="composition_com_num" data-title="Enter">
                                        <?php echo $composition_com_num =  (isset($school_creative_search['composition_com_num'])) ? $school_creative_search['composition_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="composition_com_pre" data-title="Enter">
                                        <?php echo $composition_com_pre =  (isset($school_creative_search['composition_com_pre'])) ? $school_creative_search['composition_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($composition_com_pre!=0 && $composition_com_num!=0 )?$composition_com_pre / $composition_com_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1"> গল্পলেখা প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="story_com_num" data-title="Enter">
                                        <?php echo $story_com_num =  (isset($school_creative_search['story_com_num'])) ? $school_creative_search['story_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="story_com_pre" data-title="Enter">
                                        <?php echo $story_com_pre =  (isset($school_creative_search['story_com_pre'])) ? $school_creative_search['story_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($story_com_pre!=0 && $story_com_num!=0 )?$story_com_pre / $story_com_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> কুইক কুইজ</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_com_num" data-title="Enter">
                                        <?php echo $quiz_com_num =  (isset($school_creative_search['quiz_com_num'])) ? $school_creative_search['quiz_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_com_pre" data-title="Enter">
                                        <?php echo $quiz_com_pre =  (isset($school_creative_search['quiz_com_pre'])) ? $school_creative_search['quiz_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quiz_com_pre!=0 && $quiz_com_num!=0 )?$quiz_com_pre / $quiz_com_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> লেখন প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="writing_com_num" data-title="Enter">
                                        <?php echo $writing_com_num =  (isset($school_creative_search['writing_com_num'])) ? $school_creative_search['writing_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="writing_com_pre" data-title="Enter">
                                        <?php echo $writing_com_pre =  (isset($school_creative_search['writing_com_pre'])) ? $school_creative_search['writing_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($writing_com_pre!=0 && $writing_com_num!=0 )?$writing_com_pre / $writing_com_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> সূত্রাবলি লেখা প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="law_com_num" data-title="Enter">
                                        <?php echo $law_com_num =  (isset($school_creative_search['law_com_num'])) ? $school_creative_search['law_com_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_creative_search" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="law_com_pre" data-title="Enter">
                                        <?php echo $law_com_pre =  (isset($school_creative_search['law_com_pre'])) ? $school_creative_search['law_com_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($law_com_pre!=0 && $law_com_num!=0 )?$law_com_pre / $law_com_num:0 ?>
                                </td>

                            </tr>
                    </table>
                    
                    <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>সংবর্ধনা </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'School_সংবর্ধনা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">প্রোগ্রামের সংখ্যা</td>
                                <td class="tg-pwj7">মোট উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_reception['id']))?$school_reception['id']:'';
                            ?>
                           
                            
                            <tr>

                                <td class="tg-y698 type_1"> SSC</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_num" data-title="Enter">
                                        <?php echo $ssc_num =  (isset($school_reception['ssc_num'])) ? $school_reception['ssc_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ssc_pre" data-title="Enter">
                                        <?php echo $ssc_pre =  (isset($school_reception['ssc_pre'])) ? $school_reception['ssc_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($ssc_pre!=0 && $ssc_num!=0 )?$ssc_pre / $ssc_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> মেধাবি সংবর্ধনা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="single_digit_num" data-title="Enter">
                                        <?php echo $single_digit_num =  (isset($school_reception['single_digit_num'])) ? $school_reception['single_digit_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="single_digit_pre" data-title="Enter">
                                        <?php echo $single_digit_pre =  (isset($school_reception['single_digit_pre'])) ? $school_reception['single_digit_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($single_digit_pre!=0 && $single_digit_num!=0 )?$single_digit_pre / $single_digit_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> স্কুল ক্যাবিনেট</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_cabinet_num" data-title="Enter">
                                        <?php echo $school_cabinet_num =  (isset($school_reception['school_cabinet_num'])) ? $school_reception['school_cabinet_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_cabinet_pre" data-title="Enter">
                                        <?php echo $school_cabinet_pre =  (isset($school_reception['school_cabinet_pre'])) ? $school_reception['school_cabinet_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($school_cabinet_pre!=0 && $school_cabinet_num!=0 )?$school_cabinet_pre / $school_cabinet_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> বৃত্তিপ্রাপ্ত</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="scolorship_num" data-title="Enter">
                                        <?php echo $scolorship_num =  (isset($school_reception['scolorship_num'])) ? $school_reception['scolorship_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="scolorship_pre" data-title="Enter">
                                        <?php echo $scolorship_pre =  (isset($school_reception['scolorship_pre'])) ? $school_reception['scolorship_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($scolorship_pre!=0 && $scolorship_num!=0 )?$scolorship_pre / $scolorship_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> প্লেসধারী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="place_num" data-title="Enter">
                                        <?php echo $place_num =  (isset($school_reception['place_num'])) ? $school_reception['place_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="place_pre" data-title="Enter">
                                        <?php echo $place_pre =  (isset($school_reception['place_pre'])) ? $school_reception['place_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($place_pre!=0 && $place_num!=0 )?$place_pre / $place_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> নবাগত</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="fresher_num" data-title="Enter">
                                        <?php echo $fresher_num =  (isset($school_reception['fresher_num'])) ? $school_reception['fresher_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="fresher_pre" data-title="Enter">
                                        <?php echo $fresher_pre =  (isset($school_reception['fresher_pre'])) ? $school_reception['fresher_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($fresher_pre!=0 && $fresher_num!=0 )?$fresher_pre / $fresher_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> শ্রেণি প্রতিনিধি অভিষেক</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="class_captain_num" data-title="Enter">
                                        <?php echo $class_captain_num =  (isset($school_reception['class_captain_num'])) ? $school_reception['class_captain_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_reception" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="class_captain_pre" data-title="Enter">
                                        <?php echo $class_captain_pre =  (isset($school_reception['class_captain_pre'])) ? $school_reception['class_captain_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($class_captain_pre!=0 && $class_captain_num!=0 )?$class_captain_pre / $class_captain_num:0 ?>
                                </td>

                            </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>প্রতিযোগিতামূলক দাওয়াতি প্রোগ্রাম  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'School_প্রতিযোগিতামূলক দাওয়াতি প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">প্রোগ্রামের সংখ্যা</td>
                                <td class="tg-pwj7">মোট উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_compition_dawati_program['id']))?$school_compition_dawati_program['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> বই পাঠ প্রতিযোগিতা (পাঠ্যবই)</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="boi_path_num" data-title="Enter">
                                        <?php echo $boi_path_num =  (isset($school_compition_dawati_program['boi_path_num'])) ? $school_compition_dawati_program['boi_path_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="boi_path_pre" data-title="Enter">
                                        <?php echo $boi_path_pre =  (isset($school_compition_dawati_program['boi_path_pre'])) ? $school_compition_dawati_program['boi_path_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($boi_path_pre!=0 && $boi_path_num!=0 )?$boi_path_pre / $boi_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কিশোরকণ্ঠ পাঠ প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_path_num" data-title="Enter">
                                        <?php echo $kishor_path_num =  (isset($school_compition_dawati_program['kishor_path_num'])) ? $school_compition_dawati_program['kishor_path_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_path_pre" data-title="Enter">
                                        <?php echo $kishor_path_pre =  (isset($school_compition_dawati_program['kishor_path_pre'])) ? $school_compition_dawati_program['kishor_path_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($kishor_path_pre!=0 && $kishor_path_num!=0 )?$kishor_path_pre / $kishor_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সীরাত পাঠ প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sirat_path_num" data-title="Enter">
                                        <?php echo $sirat_path_num =  (isset($school_compition_dawati_program['sirat_path_num'])) ? $school_compition_dawati_program['sirat_path_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sirat_path_pre" data-title="Enter">
                                        <?php echo $sirat_path_pre =  (isset($school_compition_dawati_program['sirat_path_pre'])) ? $school_compition_dawati_program['sirat_path_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sirat_path_pre!=0 && $sirat_path_num!=0 )?$sirat_path_pre / $sirat_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাহিত্য পাঠ প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="literature_path_num" data-title="Enter">
                                        <?php echo $literature_path_num =  (isset($school_compition_dawati_program['literature_path_num'])) ? $school_compition_dawati_program['literature_path_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="literature_path_pre" data-title="Enter">
                                        <?php echo $literature_path_pre =  (isset($school_compition_dawati_program['literature_path_pre'])) ? $school_compition_dawati_program['literature_path_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($literature_path_pre!=0 && $literature_path_num!=0 )?$literature_path_pre / $literature_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কবিতা আবৃত্তি প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kobita_path_num" data-title="Enter">
                                        <?php echo $kobita_path_num =  (isset($school_compition_dawati_program['kobita_path_num'])) ? $school_compition_dawati_program['kobita_path_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kobita_path_pre" data-title="Enter">
                                        <?php echo $kobita_path_pre =  (isset($school_compition_dawati_program['kobita_path_pre'])) ? $school_compition_dawati_program['kobita_path_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($kobita_path_pre!=0 && $kobita_path_num!=0 )?$kobita_path_pre / $kobita_path_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> কুইজ প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_num" data-title="Enter">
                                        <?php echo $quiz_num =  (isset($school_compition_dawati_program['quiz_num'])) ? $school_compition_dawati_program['quiz_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_pre" data-title="Enter">
                                        <?php echo $quiz_pre =  (isset($school_compition_dawati_program['quiz_pre'])) ? $school_compition_dawati_program['quiz_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quiz_pre!=0 && $quiz_num!=0 )?$quiz_pre / $quiz_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">কুইজ প্রতিযোগিতা (অনলাইন)</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_online_num" data-title="Enter">
                                        <?php echo $quiz_online_num =  (isset($school_compition_dawati_program['quiz_online_num'])) ? $school_compition_dawati_program['quiz_online_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_online_pre" data-title="Enter">
                                        <?php echo $quiz_online_pre =  (isset($school_compition_dawati_program['quiz_online_pre'])) ? $school_compition_dawati_program['quiz_online_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($quiz_online_pre!=0 && $quiz_online_num!=0 )?$quiz_online_pre / $quiz_online_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বক্তব্য প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="speak_num" data-title="Enter">
                                        <?php echo $speak_num =  (isset($school_compition_dawati_program['speak_num'])) ? $school_compition_dawati_program['speak_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="speak_pre" data-title="Enter">
                                        <?php echo $speak_pre =  (isset($school_compition_dawati_program['speak_pre'])) ? $school_compition_dawati_program['speak_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($speak_pre!=0 && $speak_num!=0 )?$speak_pre / $speak_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> অভিনয় প্রতিযোগিতা</td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="acting_num" data-title="Enter">
                                        <?php echo $acting_num =  (isset($school_compition_dawati_program['acting_num'])) ? $school_compition_dawati_program['acting_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="acting_pre" data-title="Enter">
                                        <?php echo $acting_pre =  (isset($school_compition_dawati_program['acting_pre'])) ? $school_compition_dawati_program['acting_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($acting_pre!=0 && $acting_num!=0 )?$acting_pre / $acting_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> বির্তক প্রতিযোগিতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="debate_num" data-title="Enter">
                                        <?php echo $debate_num =  (isset($school_compition_dawati_program['debate_num'])) ? $school_compition_dawati_program['debate_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="debate_pre" data-title="Enter">
                                        <?php echo $debate_pre =  (isset($school_compition_dawati_program['debate_pre'])) ? $school_compition_dawati_program['debate_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($debate_pre!=0 && $debate_num!=0 )?$debate_pre / $debate_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">কে বেশি হাসাতে পারে প্রতিযোগিতা </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hasi_num" data-title="Enter">
                                        <?php echo $hasi_num =  (isset($school_compition_dawati_program['hasi_num'])) ? $school_compition_dawati_program['hasi_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_compition_dawati_program" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hasi_pre" data-title="Enter">
                                        <?php echo $hasi_pre =  (isset($school_compition_dawati_program['hasi_pre'])) ? $school_compition_dawati_program['hasi_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($hasi_pre!=0 && $hasi_num!=0 )?$hasi_pre / $hasi_num:0 ?>
                                </td>
                            </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>অলিম্পিয়াড, ক্যাম্প, মেলা, প্রদর্শনী</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'School_অলিম্পিয়াড, ক্যাম্প, মেলা, প্রদর্শনী_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">প্রোগ্রামের সংখ্যা</td>
                                <td class="tg-pwj7">মোট উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_olympiad_camp['id']))?$school_olympiad_camp['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1">গণিত অলিম্পিয়াড</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="math_olympiad_num" data-title="Enter">
                                        <?php echo $math_olympiad_num =  (isset($school_olympiad_camp['math_olympiad_num'])) ? $school_olympiad_camp['math_olympiad_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="math_olympiad_pre" data-title="Enter">
                                        <?php echo $math_olympiad_pre =  (isset($school_olympiad_camp['math_olympiad_pre'])) ? $school_olympiad_camp['math_olympiad_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($math_olympiad_pre!=0 && $math_olympiad_num!=0 )?$math_olympiad_pre / $math_olympiad_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজ্ঞান অলিম্পিয়াড</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="science_olympiad_num" data-title="Enter">
                                        <?php echo $science_olympiad_num =  (isset($school_olympiad_camp['science_olympiad_num'])) ? $school_olympiad_camp['science_olympiad_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="science_olympiad_pre" data-title="Enter">
                                        <?php echo $science_olympiad_pre =  (isset($school_olympiad_camp['science_olympiad_pre'])) ? $school_olympiad_camp['science_olympiad_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($science_olympiad_pre!=0 && $science_olympiad_num!=0 )?$science_olympiad_pre / $science_olympiad_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ইংলিশ অলিম্পিয়াড</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="english_olympaid_num" data-title="Enter">
                                        <?php echo $english_olympaid_num =  (isset($school_olympiad_camp['english_olympaid_num'])) ? $school_olympiad_camp['english_olympaid_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="english_olympaid_pre" data-title="Enter">
                                        <?php echo $english_olympaid_pre =  (isset($school_olympiad_camp['english_olympaid_pre'])) ? $school_olympiad_camp['english_olympaid_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($english_olympaid_pre!=0 && $english_olympaid_num!=0 )?$english_olympaid_pre / $english_olympaid_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সামার ক্যাম্প</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="somor_camp_num" data-title="Enter">
                                        <?php echo $somor_camp_num =  (isset($school_olympiad_camp['somor_camp_num'])) ? $school_olympiad_camp['somor_camp_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="somor_camp_pre" data-title="Enter">
                                        <?php echo $somor_camp_pre =  (isset($school_olympiad_camp['somor_camp_pre'])) ? $school_olympiad_camp['somor_camp_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($somor_camp_pre!=0 && $somor_camp_num!=0 )?$somor_camp_pre / $somor_camp_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">উইন্টার ক্যাম্প</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="winter_camp_num" data-title="Enter">
                                        <?php echo $winter_camp_num =  (isset($school_olympiad_camp['winter_camp_num'])) ? $school_olympiad_camp['winter_camp_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="winter_camp_pre" data-title="Enter">
                                        <?php echo $winter_camp_pre =  (isset($school_olympiad_camp['winter_camp_pre'])) ? $school_olympiad_camp['winter_camp_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($winter_camp_pre!=0 && $winter_camp_num!=0 )?$winter_camp_pre / $winter_camp_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বই মেলা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="boi_mela_num" data-title="Enter">
                                        <?php echo $boi_mela_num =  (isset($school_olympiad_camp['boi_mela_num'])) ? $school_olympiad_camp['boi_mela_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="boi_mela_pre" data-title="Enter">
                                        <?php echo $boi_mela_pre =  (isset($school_olympiad_camp['boi_mela_pre'])) ? $school_olympiad_camp['boi_mela_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($boi_mela_pre!=0 && $boi_mela_num!=0 )?$boi_mela_pre / $boi_mela_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজ্ঞান মেলা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="science_mela_num" data-title="Enter">
                                        <?php echo $science_mela_num =  (isset($school_olympiad_camp['science_mela_num'])) ? $school_olympiad_camp['science_mela_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="science_mela_pre" data-title="Enter">
                                        <?php echo $science_mela_pre =  (isset($school_olympiad_camp['science_mela_pre'])) ? $school_olympiad_camp['science_mela_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($science_mela_pre!=0 && $science_mela_num!=0 )?$science_mela_pre / $science_mela_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">চিত্র প্রদর্শনী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="drawing_show_num" data-title="Enter">
                                        <?php echo $drawing_show_num =  (isset($school_olympiad_camp['drawing_show_num'])) ? $school_olympiad_camp['drawing_show_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="drawing_show_pre" data-title="Enter">
                                        <?php echo $drawing_show_pre =  (isset($school_olympiad_camp['drawing_show_pre'])) ? $school_olympiad_camp['drawing_show_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($drawing_show_pre!=0 && $drawing_show_num!=0 )?$drawing_show_pre / $drawing_show_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">নাটিকা প্রদর্শনী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="acting_show_num" data-title="Enter">
                                        <?php echo $acting_show_num =  (isset($school_olympiad_camp['acting_show_num'])) ? $school_olympiad_camp['acting_show_num'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_olympiad_camp" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="acting_show_pre" data-title="Enter">
                                        <?php echo $acting_show_pre =  (isset($school_olympiad_camp['acting_show_pre'])) ? $school_olympiad_camp['acting_show_pre'] :0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($acting_show_pre!=0 && $acting_show_num!=0 )?$acting_show_pre / $acting_show_num:0 ?>
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
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>