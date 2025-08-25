<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিজ্ঞান সংক্রান্ত প্রোগ্রামের প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Science_বিজ্ঞান সংক্রান্ত প্রোগ্রামের প্রতিবেদন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় </td>
                            </tr>
                            <?php
                                $pk = (isset($science_program_protibedon['id']))?$science_program_protibedon['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার গাইডলাইন প্রোগ্রাম</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_guideline_num" data-title="Enter">
                                        <?php echo $career_guideline_num =  (isset($science_program_protibedon['career_guideline_num'])) ? $science_program_protibedon['career_guideline_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_guideline_pre" data-title="Enter">
                                        <?php echo $career_guideline_pre =  (isset($science_program_protibedon['career_guideline_pre'])) ? $science_program_protibedon['career_guideline_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['career_guideline_num']>0 && $science_program_protibedon['career_guideline_pre']>0)? $science_program_protibedon['career_guideline_pre'] / $science_program_protibedon['career_guideline_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার আড্ডা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_adda_num" data-title="Enter">
                                        <?php echo $career_adda_num =  (isset($science_program_protibedon['career_adda_num'])) ? $science_program_protibedon['career_adda_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_adda_pre" data-title="Enter">
                                        <?php echo $career_add_pre =  (isset($science_program_protibedon['career_adda_pre'])) ? $science_program_protibedon['career_adda_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['career_adda_num']>0 && $science_program_protibedon['career_adda_pre']>0)? $science_program_protibedon['career_adda_pre'] / $science_program_protibedon['career_adda_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার সামিট</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_summit_num" data-title="Enter">
                                        <?php echo $career_summit_num =  (isset($science_program_protibedon['career_summit_num'])) ? $science_program_protibedon['career_summit_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_summit_pre" data-title="Enter">
                                        <?php echo $career_summit_pre =  (isset($science_program_protibedon['career_summit_pre'])) ? $science_program_protibedon['career_summit_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['career_summit_num']>0 && $science_program_protibedon['career_summit_pre']>0)? $science_program_protibedon['career_summit_pre'] / $science_program_protibedon['career_summit_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান বিষয়ক কুইজ প্রতিযোগিতা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_num" data-title="Enter">
                                        <?php echo $quiz_num =  (isset($science_program_protibedon['quiz_num'])) ? $science_program_protibedon['quiz_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="quiz_pre" data-title="Enter">
                                        <?php echo $quiz_pre =  (isset($science_program_protibedon['quiz_pre'])) ? $science_program_protibedon['quiz_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['quiz_num']>0 && $science_program_protibedon['quiz_pre']>0)? $science_program_protibedon['quiz_pre'] / $science_program_protibedon['quiz_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অলিম্পিয়াড আয়োজন</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="olympiad_num" data-title="Enter">
                                        <?php echo $olympiad_num =  (isset($science_program_protibedon['olympiad_num'])) ? $science_program_protibedon['olympiad_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="olympiad_pre" data-title="Enter">
                                        <?php echo $olympiad_pre =  (isset($science_program_protibedon['olympiad_pre'])) ? $science_program_protibedon['olympiad_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['olympiad_num']>0 && $science_program_protibedon['olympiad_pre']>0)? $science_program_protibedon['olympiad_pre'] / $science_program_protibedon['olympiad_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান মেলা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggan_mela_num" data-title="Enter">
                                        <?php echo $biggan_mela_num =  (isset($science_program_protibedon['biggan_mela_num'])) ? $science_program_protibedon['biggan_mela_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggan_mela_pre" data-title="Enter">
                                        <?php echo $biggan_mela_pre =  (isset($science_program_protibedon['biggan_mela_pre'])) ? $science_program_protibedon['biggan_mela_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['biggan_mela_num']>0 && $science_program_protibedon['biggan_mela_pre']>0)? $science_program_protibedon['biggan_mela_pre'] / $science_program_protibedon['biggan_mela_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানের সাথে সম্পর্কিত বিভিন্ন দিবস উদযাপন</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="day_udjapon_num" data-title="Enter">
                                        <?php echo $day_udjapon_num =  (isset($science_program_protibedon['day_udjapon_num'])) ? $science_program_protibedon['day_udjapon_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="day_udjapon_pre" data-title="Enter">
                                        <?php echo $day_udjapon_pre =  (isset($science_program_protibedon['day_udjapon_pre'])) ? $science_program_protibedon['day_udjapon_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['day_udjapon_num']>0 && $science_program_protibedon['day_udjapon_pre']>0)? $science_program_protibedon['day_udjapon_pre'] / $science_program_protibedon['day_udjapon_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান সম্পর্কিত ডকুমেন্টারি, শর্টফিল্ম, মুভি শো</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="document_num" data-title="Enter">
                                        <?php echo $document_num =  (isset($science_program_protibedon['document_num'])) ? $science_program_protibedon['document_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="document_pre" data-title="Enter">
                                        <?php echo $document_pre =  (isset($science_program_protibedon['document_pre'])) ? $science_program_protibedon['document_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['document_num']>0 && $science_program_protibedon['document_pre']>0)? $science_program_protibedon['document_pre'] / $science_program_protibedon['document_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_num" data-title="Enter">
                                        <?php echo $other_num =  (isset($science_program_protibedon['other_num'])) ? $science_program_protibedon['other_num'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_program_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_pre" data-title="Enter">
                                        <?php echo $other_pre =  (isset($science_program_protibedon['other_pre'])) ? $science_program_protibedon['other_pre'] : 0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_program_protibedon['other_num']>0 && $science_program_protibedon['other_pre']>0)? $science_program_protibedon['other_pre'] / $science_program_protibedon['other_num']:0 ?></td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>একাডেমিক সহযোগিতার প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Science_একাডেমিক সহযোগিতার প্রতিবেদন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">আছে কিনা </td>
                                <td class="tg-pwj7" rowspan="">থাকলে কতটি</td>
                                <td class="tg-pwj7" rowspan="">শিক্ষার্থী সংখ্যা </td>
                            </tr>
                            <?php
                                $pk = (isset($science_aca_help_protibedon['id']))?$science_aca_help_protibedon['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানের ছাত্রদের শিক্ষাদানের জন্য একাডেমিক কোচিং</td>
                                <td>
                                    <a href="#"  class="editable editable-click"  id="aca_coaching_ache" data-idname=""   data-type="select" 
                                        data-table="science_aca_help_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                        data-name="aca_coaching_ache@science_aca_help_protibedon" 
                                        data-title="বিজ্ঞানের ছাত্রদের শিক্ষাদানের জন্য একাডেমিক কোচিং">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_aca_help_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="aca_coaching_num" data-title="Enter">
                                        <?php echo $aca_coaching_num =  (isset($science_aca_help_protibedon['aca_coaching_num'])) ? $science_aca_help_protibedon['aca_coaching_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_aca_help_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="aca_coaching_stu_num" data-title="Enter">
                                        <?php echo $aca_coaching_stu_num =  (isset($science_aca_help_protibedon['aca_coaching_stu_num'])) ? $science_aca_help_protibedon['aca_coaching_stu_num'] : '' ?>
                                    </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">আইসিটি কোচিং বা কোচিংয়ে আইসিটি কোর্স</td>
                                <td>
                                   
                                    <a href="#"  class="editable editable-click"  id="ict_coaching_ache" data-idname=""   data-type="select" 
                                        data-table="science_aca_help_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                        data-name="ict_coaching_ache@science_aca_help_protibedon" 
                                        data-title="আইসিটি কোচিং বা কোচিংয়ে আইসিটি কোর্স">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_aca_help_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ict_coaching_num" data-title="Enter">
                                        <?php echo $ict_coaching_num =  (isset($science_aca_help_protibedon['ict_coaching_num'])) ? $science_aca_help_protibedon['ict_coaching_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_aca_help_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ict_coaching_stu_num" data-title="Enter">
                                        <?php echo $ict_coaching_stu_num =  (isset($science_aca_help_protibedon['ict_coaching_stu_num'])) ? $science_aca_help_protibedon['ict_coaching_stu_num'] : '' ?>
                                    </a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">উচ্চ মাধ্যমিক পর্যায়ে বিজ্ঞান ছাত্রদের জন্য আইডিয়াল হোম</td>
                                <td>
                                   
                                    <a href="#"  class="editable editable-click"  id="ideal_home_ache" data-idname=""   data-type="select" 
                                        data-table="science_aca_help_protibedon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                        data-name="ideal_home_ache@science_aca_help_protibedon" 
                                        data-title="উচ্চ মাধ্যমিক পর্যায়ে বিজ্ঞান ছাত্রদের জন্য আইডিয়াল হোম">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_aca_help_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_home_num" data-title="Enter">
                                        <?php echo $ideal_home_num =  (isset($science_aca_help_protibedon['ideal_home_num'])) ? $science_aca_help_protibedon['ideal_home_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_aca_help_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="ideal_home_stu_num" data-title="Enter">
                                        <?php echo $ideal_home_stu_num =  (isset($science_aca_help_protibedon['ideal_home_stu_num'])) ? $science_aca_help_protibedon['ideal_home_stu_num'] : '' ?>
                                    </a>
                                </td>
                                
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>সফর প্রতিবেদন</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Science_সফর প্রতিবেদন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">তত্ত্বাবধান স্তর</td>
                                <td class="tg-pwj7" rowspan="2">বিবরণ </td>
                                <td class="tg-pwj7" colspan="2">কতটি প্রোগ্রাম/কতবার</td>

                            </tr>
                            <?php
                                $pk = (isset($science_sofor_protibedon['id']))?$science_sofor_protibedon['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">অফলাইন</td>
                                <td class="tg-pwj7" colspan="">অনলাইন</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="3">কেন্দ্র</td>
                                <td class="tg-pwj7" colspan="">কেন্দ্রীয় বিজ্ঞান সম্পাদকের সফর</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shompadok_off" data-title="Enter">
                                        <?php echo $shompadok_off =  (isset($science_sofor_protibedon['shompadok_off'])) ? $science_sofor_protibedon['shompadok_off'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shompadok_on" data-title="Enter">
                                        <?php echo $shompadok_on =  (isset($science_sofor_protibedon['shompadok_on'])) ? $science_sofor_protibedon['shompadok_on'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">কেন্দ্রীয় বিজ্ঞান বিভাগের সফর</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bivag_off" data-title="Enter">
                                        <?php echo $bivag_off =  (isset($science_sofor_protibedon['bivag_off'])) ? $science_sofor_protibedon['bivag_off'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="bivag_on" data-title="Enter">
                                        <?php echo $bivag_on =  (isset($science_sofor_protibedon['bivag_on'])) ? $science_sofor_protibedon['bivag_on'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">যোগাযোগ/তত্ত্বাবধান</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="contact_off" data-title="Enter">
                                        <?php echo $contact_off =  (isset($science_sofor_protibedon['contact_off'])) ? $science_sofor_protibedon['contact_off'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="contact_on" data-title="Enter">
                                        <?php echo $contact_on =  (isset($science_sofor_protibedon['contact_on'])) ? $science_sofor_protibedon['contact_on'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">শাখা</td>
                                <td class="tg-pwj7" colspan="">শাখা সভাপতি/সেক্রেটারির সফর</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="secretary_off" data-title="Enter">
                                        <?php echo $secretary_off =  (isset($science_sofor_protibedon['secretary_off'])) ? $science_sofor_protibedon['secretary_off'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="secretary_on" data-title="Enter">
                                        <?php echo $secretary_on =  (isset($science_sofor_protibedon['secretary_on'])) ? $science_sofor_protibedon['secretary_on'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">শাখা বিজ্ঞান সম্পাদকের থানাভিত্তিক সফর</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="thana_off" data-title="Enter">
                                        <?php echo $thana_off =  (isset($science_sofor_protibedon['thana_off'])) ? $science_sofor_protibedon['thana_off'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_sofor_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="thana_on" data-title="Enter">
                                        <?php echo $thana_on =  (isset($science_sofor_protibedon['thana_on'])) ? $science_sofor_protibedon['thana_on'] : '' ?>
                                    </a>
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
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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
$('#aca_coaching_ache').editable({
    value: <?php echo (isset( $science_aca_help_protibedon['aca_coaching_ache']))? $science_aca_help_protibedon['aca_coaching_ache']:2; ?>,    
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

$('#ict_coaching_ache').editable({
    value: <?php echo (isset( $science_aca_help_protibedon['ict_coaching_ache']))? $science_aca_help_protibedon['ict_coaching_ache']:2; ?>,    
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

$('#ideal_home_ache').editable({
    value: <?php echo (isset( $science_aca_help_protibedon['ideal_home_ache']))? $science_aca_help_protibedon['ideal_home_ache']:2; ?>,    
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
