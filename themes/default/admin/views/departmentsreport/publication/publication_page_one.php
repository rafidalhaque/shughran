<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রকাশনা বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/publication-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/publication-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publication-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


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

                <div class="table-responsive">


				<style type="text/css">
                    #export_all_table{
                        cursor: pointer;
                    }
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
</style>
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>                           
                                <td class="tg-pwj7" colspan='4'><b>কেন্দ্র হতে প্রকাশনা সামগ্রী সংগ্রহ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Publication_কেন্দ্র হতে প্রকাশনা সামগ্রী সংগ্রহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" rowspan='16'>দাওয়াতি উপকরণ</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>

                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সংক্ষিপ্ত পরিচিতি
                                 </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shong_porichiti_num = $publication_kendro_hote_prokashona['d_u_shong_porichiti_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shong_porichiti_bikri = $publication_kendro_hote_prokashona['d_u_shong_porichiti_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shong_porichiti_bitoron = $publication_kendro_hote_prokashona['d_u_shong_porichiti_bitoron'] ?>
                                </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                পোস্টার
                                 </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_poster_num = $publication_kendro_hote_prokashona['d_u_poster_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_poster_bikri = $publication_kendro_hote_prokashona['d_u_poster_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_poster_bitoron = $publication_kendro_hote_prokashona['d_u_poster_bitoron'] ?>
                                </td>
                            </tr>

                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                স্টিকার
                                 </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_sticker_num = $publication_kendro_hote_prokashona['d_u_sticker_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_sticker_bikri = $publication_kendro_hote_prokashona['d_u_sticker_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_sticker_bitoron = $publication_kendro_hote_prokashona['d_u_sticker_bitoron'] ?>
                                </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                চাবির রিং
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_key_ring_num = $publication_kendro_hote_prokashona['d_u_key_ring_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_key_ring_bikri = $publication_kendro_hote_prokashona['d_u_key_ring_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_key_ring_bitoron = $publication_kendro_hote_prokashona['d_u_key_ring_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                টি-শার্ট
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_t_shirt_num = $publication_kendro_hote_prokashona['d_u_t_shirt_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_t_shirt_bikri = $publication_kendro_hote_prokashona['d_u_t_shirt_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_t_shirt_bitoron = $publication_kendro_hote_prokashona['d_u_t_shirt_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                নামাজ-রোজার স্থায়ী সময়সূচি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_namaj_rojar_sthayi_time_num = $publication_kendro_hote_prokashona['d_u_namaj_rojar_sthayi_time_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_namaj_rojar_sthayi_time_bikri = $publication_kendro_hote_prokashona['d_u_namaj_rojar_sthayi_time_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_namaj_rojar_sthayi_time_bitoron = $publication_kendro_hote_prokashona['d_u_namaj_rojar_sthayi_time_bitoron'] ?>
                                </td> 
                            </tr>

                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সূত্রাবলি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_shutraboli_num = $publication_kendro_hote_prokashona['d_u_shutraboli_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shutraboli_bikri = $publication_kendro_hote_prokashona['d_u_shutraboli_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shutraboli_bitoron = $publication_kendro_hote_prokashona['d_u_shutraboli_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                টেন্স
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_tense_num = $publication_kendro_hote_prokashona['d_u_tense_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_tense_bikri = $publication_kendro_hote_prokashona['d_u_tense_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_tense_bitoron = $publication_kendro_hote_prokashona['d_u_tense_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ওয়ার্ড কার্ড
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_word_card_num = $publication_kendro_hote_prokashona['d_u_word_card_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_word_card_bikri = $publication_kendro_hote_prokashona['d_u_word_card_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_word_card_bitoron = $publication_kendro_hote_prokashona['d_u_word_card_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ক্লাস রুটিন
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_class_routine_num = $publication_kendro_hote_prokashona['d_u_class_routine_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_class_routine_bikri = $publication_kendro_hote_prokashona['d_u_class_routine_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_class_routine_bitoron = $publication_kendro_hote_prokashona['d_u_class_routine_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                স্কুল রুটিন
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_school_routine_num = $publication_kendro_hote_prokashona['d_u_school_routine_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_school_routine_bikri = $publication_kendro_hote_prokashona['d_u_school_routine_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_school_routine_bitoron = $publication_kendro_hote_prokashona['d_u_school_routine_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                কোর্ট পিন
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_court_pin_num = $publication_kendro_hote_prokashona['d_u_court_pin_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_court_pin_bikri = $publication_kendro_hote_prokashona['d_u_court_pin_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_court_pin_bitoron = $publication_kendro_hote_prokashona['d_u_court_pin_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                পেপার ওয়েট
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_paper_weight_num = $publication_kendro_hote_prokashona['d_u_paper_weight_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_paper_weight_bikri = $publication_kendro_hote_prokashona['d_u_paper_weight_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_paper_weight_bitoron = $publication_kendro_hote_prokashona['d_u_paper_weight_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                শুভেচ্ছা কার্ড
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_shuveccha_card_num = $publication_kendro_hote_prokashona['d_u_shuveccha_card_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shuveccha_card_bikri = $publication_kendro_hote_prokashona['d_u_shuveccha_card_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_shuveccha_card_bitoron = $publication_kendro_hote_prokashona['d_u_shuveccha_card_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                নোটবুক
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $d_u_notebook_num = $publication_kendro_hote_prokashona['d_u_notebook_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_notebook_bikri = $publication_kendro_hote_prokashona['d_u_notebook_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $d_u_notebook_bitoron = $publication_kendro_hote_prokashona['d_u_notebook_bitoron'] ?>
                                </td> 
                            </tr>
    
   

                            <tr> 
                                <td class="tg-pwj7" rowspan='15'>সাংগঠনিক উপকরণ</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সমর্থক ফরম
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_shomorthok_form_num = $publication_kendro_hote_prokashona['s_u_shomorthok_form_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_shomorthok_form_bikri = $publication_kendro_hote_prokashona['s_u_shomorthok_form_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_shomorthok_form_bitoron = $publication_kendro_hote_prokashona['s_u_shomorthok_form_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                বই রিপোর্ট
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_boi_reprot_num = $publication_kendro_hote_prokashona['s_u_boi_reprot_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_boi_reprot_bikri = $publication_kendro_hote_prokashona['s_u_boi_reprot_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_boi_reprot_bitoron = $publication_kendro_hote_prokashona['s_u_boi_reprot_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                মাসিক পরিকল্পনা রিপোর্ট
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_month_porik_report_num = $publication_kendro_hote_prokashona['s_u_month_porik_report_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_month_porik_report_bikri = $publication_kendro_hote_prokashona['s_u_month_porik_report_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_month_porik_report_bitoron = $publication_kendro_hote_prokashona['s_u_month_porik_report_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                মাসিক রিপোর্ট
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_month_report_num = $publication_kendro_hote_prokashona['s_u_month_report_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_month_report_bikri = $publication_kendro_hote_prokashona['s_u_month_report_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_month_report_bitoron = $publication_kendro_hote_prokashona['s_u_month_report_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ব্যক্তিগত রিপোর্ট ফরম
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_per_report_form_num = $publication_kendro_hote_prokashona['s_u_per_report_form_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_per_report_form_bikri = $publication_kendro_hote_prokashona['s_u_per_report_form_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_per_report_form_bitoron = $publication_kendro_hote_prokashona['s_u_per_report_form_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ব্যক্তিগত প্রতিবেদন
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_per_protibedon_num = $publication_kendro_hote_prokashona['s_u_per_protibedon_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_per_protibedon_bikri = $publication_kendro_hote_prokashona['s_u_per_protibedon_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_per_protibedon_bitoron = $publication_kendro_hote_prokashona['s_u_per_protibedon_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                অর্থনৈতিক প্রতিবেদন
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_ortho_protibedon_num = $publication_kendro_hote_prokashona['s_u_ortho_protibedon_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_ortho_protibedon_bikri = $publication_kendro_hote_prokashona['s_u_ortho_protibedon_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_ortho_protibedon_bitoron = $publication_kendro_hote_prokashona['s_u_ortho_protibedon_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                বায়োডাটা
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_biodata_num = $publication_kendro_hote_prokashona['s_u_biodata_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_biodata_bikri = $publication_kendro_hote_prokashona['s_u_biodata_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_biodata_bitoron = $publication_kendro_hote_prokashona['s_u_biodata_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ভাউচার প্যাড
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_voucher_num = $publication_kendro_hote_prokashona['s_u_voucher_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_voucher_bikri = $publication_kendro_hote_prokashona['s_u_voucher_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_voucher_bitoron = $publication_kendro_hote_prokashona['s_u_voucher_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                রেজিস্টার খাতা
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_reg_khata_num = $publication_kendro_hote_prokashona['s_u_reg_khata_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_reg_khata_bikri = $publication_kendro_hote_prokashona['s_u_reg_khata_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_reg_khata_bitoron = $publication_kendro_hote_prokashona['s_u_reg_khata_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ক্যাশ মেমো
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_cash_memo_num = $publication_kendro_hote_prokashona['s_u_cash_memo_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_cash_memo_bikri = $publication_kendro_hote_prokashona['s_u_cash_memo_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_cash_memo_bitoron = $publication_kendro_hote_prokashona['s_u_cash_memo_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                রশিদ বই
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_roshid_boi_num = $publication_kendro_hote_prokashona['s_u_roshid_boi_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_roshid_boi_bikri = $publication_kendro_hote_prokashona['s_u_roshid_boi_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_roshid_boi_bitoron = $publication_kendro_hote_prokashona['s_u_roshid_boi_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ছাত্রকল্যাণ বক্স
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_sw_box_num = $publication_kendro_hote_prokashona['s_u_sw_box_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_sw_box_bikri = $publication_kendro_hote_prokashona['s_u_sw_box_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_sw_box_bitoron = $publication_kendro_hote_prokashona['s_u_sw_box_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সদস্যপ্রার্থী ডায়েরি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $s_u_mem_can_dairy_num = $publication_kendro_hote_prokashona['s_u_mem_can_dairy_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_mem_can_dairy_bikri = $publication_kendro_hote_prokashona['s_u_mem_can_dairy_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $s_u_mem_can_dairy_bitoron = $publication_kendro_hote_prokashona['s_u_mem_can_dairy_bitoron'] ?>
                                </td> 
                            </tr>

                            <tr> 
                                <td class="tg-pwj7" rowspan='3'>ইসলামী সাহিত্য</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                দাওয়াতি বই
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $is_sa_dawati_boi_num = $publication_kendro_hote_prokashona['is_sa_dawati_boi_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $is_sa_dawati_boi_bikri = $publication_kendro_hote_prokashona['is_sa_dawati_boi_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $is_sa_dawati_boi_bitoron = $publication_kendro_hote_prokashona['is_sa_dawati_boi_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                অন্যান্য বই
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $is_sa_other_boi_num = $publication_kendro_hote_prokashona['is_sa_other_boi_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $is_sa_other_boi_bikri = $publication_kendro_hote_prokashona['is_sa_other_boi_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $is_sa_other_boi_bitoron = $publication_kendro_hote_prokashona['is_sa_other_boi_bitoron'] ?>
                                </td> 
                            </tr>


                            <tr> 
                                <td class="tg-pwj7" rowspan='7'>কুরআন ও হাদিস সেট</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                তাফহীমুল কুরআন-১৯ খণ্ড
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafhimul_19_num = $publication_kendro_hote_prokashona['qu_ha_tafhimul_19_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafhimul_19_bikri = $publication_kendro_hote_prokashona['qu_ha_tafhimul_19_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafhimul_19_bitoron = $publication_kendro_hote_prokashona['qu_ha_tafhimul_19_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                তাফহীমুল কুরআন-১০ খণ্ড
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafhimul_10_num = $publication_kendro_hote_prokashona['qu_ha_tafhimul_10_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafhimul_10_bikri = $publication_kendro_hote_prokashona['qu_ha_tafhimul_10_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafhimul_10_bitoron = $publication_kendro_hote_prokashona['qu_ha_tafhimul_10_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                তাফসীরে ইবনে কাসীর
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafsir_ibn_kasir_num = $publication_kendro_hote_prokashona['qu_ha_tafsir_ibn_kasir_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafsir_ibn_kasir_bikri = $publication_kendro_hote_prokashona['qu_ha_tafsir_ibn_kasir_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafsir_ibn_kasir_bitoron = $publication_kendro_hote_prokashona['qu_ha_tafsir_ibn_kasir_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                    তাফসীর ফি যিলালিল কুরআন
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafsir_fi_zilalil_quran_num = $publication_kendro_hote_prokashona['qu_ha_tafsir_fi_zilalil_quran_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafsir_fi_zilalil_quran_bikri = $publication_kendro_hote_prokashona['qu_ha_tafsir_fi_zilalil_quran_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_tafsir_fi_zilalil_quran_bitoron = $publication_kendro_hote_prokashona['qu_ha_tafsir_fi_zilalil_quran_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                    বুখারি শরীফ
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_bukhari_num = $publication_kendro_hote_prokashona['qu_ha_bukhari_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_bukhari_bikri = $publication_kendro_hote_prokashona['qu_ha_bukhari_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_bukhari_bitoron = $publication_kendro_hote_prokashona['qu_ha_bukhari_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                মুসলিম শরীফ
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_muslim_num = $publication_kendro_hote_prokashona['qu_ha_muslim_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_muslim_bikri = $publication_kendro_hote_prokashona['qu_ha_muslim_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $qu_ha_muslim_bitoron = $publication_kendro_hote_prokashona['qu_ha_muslim_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" rowspan='6'>সিলেবাস সেট</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>

                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                উচ্চতর সিলেবাস
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $syl_set_high_syl_num = $publication_kendro_hote_prokashona['syl_set_high_syl_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_high_syl_bikri = $publication_kendro_hote_prokashona['syl_set_high_syl_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_high_syl_bitoron = $publication_kendro_hote_prokashona['syl_set_high_syl_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সদস্য সিলেবাস
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $syl_set_shodossho_syl_num = $publication_kendro_hote_prokashona['syl_set_shodossho_syl_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_shodossho_syl_bikri = $publication_kendro_hote_prokashona['syl_set_shodossho_syl_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_shodossho_syl_bitoron = $publication_kendro_hote_prokashona['syl_set_shodossho_syl_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সাথী সিলেবাস
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $syl_set_sathi_syl_num = $publication_kendro_hote_prokashona['syl_set_sathi_syl_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_sathi_syl_bikri = $publication_kendro_hote_prokashona['syl_set_sathi_syl_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_sathi_syl_bitoron = $publication_kendro_hote_prokashona['syl_set_sathi_syl_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                কর্মী সিলেবাস
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $syl_set_kormi_syl_num = $publication_kendro_hote_prokashona['syl_set_kormi_syl_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_kormi_syl_bikri = $publication_kendro_hote_prokashona['syl_set_kormi_syl_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_kormi_syl_bitoron = $publication_kendro_hote_prokashona['syl_set_kormi_syl_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                স্কুল সিলেবাস
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $syl_set_school_syl_num = $publication_kendro_hote_prokashona['syl_set_school_syl_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_school_syl_bikri = $publication_kendro_hote_prokashona['syl_set_school_syl_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $syl_set_school_syl_bitoron = $publication_kendro_hote_prokashona['syl_set_school_syl_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" rowspan='9'>নববর্ষ প্রকাশনা</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>

                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                তিনপাতা ক্যালেন্ডার 
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_3_page_cal_num = $publication_kendro_hote_prokashona['nobo_proka_3_page_cal_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_3_page_cal_bikri = $publication_kendro_hote_prokashona['nobo_proka_3_page_cal_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_3_page_cal_bitoron = $publication_kendro_hote_prokashona['nobo_proka_3_page_cal_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                একপাতা ক্যালেন্ডার (বড়)
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_1_page_cal_big_num = $publication_kendro_hote_prokashona['nobo_proka_1_page_cal_big_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_1_page_cal_big_bikri = $publication_kendro_hote_prokashona['nobo_proka_1_page_cal_big_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_1_page_cal_big_bitoron = $publication_kendro_hote_prokashona['nobo_proka_1_page_cal_big_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                    একপাতা ক্যালেন্ডার (ছোট)
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_1_page_cal_small_num = $publication_kendro_hote_prokashona['nobo_proka_1_page_cal_small_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_1_page_cal_small_bikri = $publication_kendro_hote_prokashona['nobo_proka_1_page_cal_small_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_1_page_cal_small_bitoron = $publication_kendro_hote_prokashona['nobo_proka_1_page_cal_small_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                    ডেস্ক ক্যালেন্ডার 
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_desk_cal_num = $publication_kendro_hote_prokashona['nobo_proka_desk_cal_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_desk_cal_bikri = $publication_kendro_hote_prokashona['nobo_proka_desk_cal_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_desk_cal_bitoron = $publication_kendro_hote_prokashona['nobo_proka_desk_cal_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                বাংলা ডায়েরি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_bang_dairy_num = $publication_kendro_hote_prokashona['nobo_proka_bang_dairy_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_bang_dairy_bikri = $publication_kendro_hote_prokashona['nobo_proka_bang_dairy_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_bang_dairy_bitoron = $publication_kendro_hote_prokashona['nobo_proka_bang_dairy_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ইংরেজি ডায়েরি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_eng_dairy_num = $publication_kendro_hote_prokashona['nobo_proka_eng_dairy_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_eng_dairy_bikri = $publication_kendro_hote_prokashona['nobo_proka_eng_dairy_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_eng_dairy_bitoron = $publication_kendro_hote_prokashona['nobo_proka_eng_dairy_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                মাঝারি ডায়েরি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_med_dairy_num = $publication_kendro_hote_prokashona['nobo_proka_med_dairy_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_med_dairy_bikri = $publication_kendro_hote_prokashona['nobo_proka_med_dairy_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_med_dairy_bitoron = $publication_kendro_hote_prokashona['nobo_proka_med_dairy_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                পকেট ডায়েরি
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_pocket_dairy_num = $publication_kendro_hote_prokashona['nobo_proka_pocket_dairy_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_pocket_dairy_bikri = $publication_kendro_hote_prokashona['nobo_proka_pocket_dairy_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $nobo_proka_pocket_dairy_bitoron = $publication_kendro_hote_prokashona['nobo_proka_pocket_dairy_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" rowspan='7'>রমজান প্রকাশনা</td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                রমজান ক্যালেন্ডার 
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_cal_num = $publication_kendro_hote_prokashona['rom_proka_cal_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_cal_bikri = $publication_kendro_hote_prokashona['rom_proka_cal_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_cal_bitoron = $publication_kendro_hote_prokashona['rom_proka_cal_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                কেন্দ্রীয় সভাপতির নসিহত
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_cp_nosihot_num = $publication_kendro_hote_prokashona['rom_proka_cp_nosihot_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_cp_nosihot_bikri = $publication_kendro_hote_prokashona['rom_proka_cp_nosihot_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_cp_nosihot_bitoron = $publication_kendro_hote_prokashona['rom_proka_cp_nosihot_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                সাধারণ ছাত্রদের প্রতি আহ্বান
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_shadharon_student_ahban_num = $publication_kendro_hote_prokashona['rom_proka_shadharon_student_ahban_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_shadharon_student_ahban_bikri = $publication_kendro_hote_prokashona['rom_proka_shadharon_student_ahban_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_shadharon_student_ahban_bitoron = $publication_kendro_hote_prokashona['rom_proka_shadharon_student_ahban_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                হোটেল মালিকদের প্রতি আহ্বান
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_hotel_malik_ahban_num = $publication_kendro_hote_prokashona['rom_proka_hotel_malik_ahban_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_hotel_malik_ahban_bikri = $publication_kendro_hote_prokashona['rom_proka_hotel_malik_ahban_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_hotel_malik_ahban_bitoron = $publication_kendro_hote_prokashona['rom_proka_hotel_malik_ahban_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                ঈদ কার্ড
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_eid_card_num = $publication_kendro_hote_prokashona['rom_proka_eid_card_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_eid_card_bikri = $publication_kendro_hote_prokashona['rom_proka_eid_card_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_eid_card_bitoron = $publication_kendro_hote_prokashona['rom_proka_eid_card_bitoron'] ?>
                                </td> 
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                রমজান কর্ম পরিকল্পনা
                                 </td>
                                    <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_ramadan_kormo_plan_num = $publication_kendro_hote_prokashona['rom_proka_ramadan_kormo_plan_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_ramadan_kormo_plan_bikri = $publication_kendro_hote_prokashona['rom_proka_ramadan_kormo_plan_bikri'] ?>
                                </td>
                                 <td class="tg-0pky  type_10">
                                <?php echo $rom_proka_ramadan_kormo_plan_bitoron = $publication_kendro_hote_prokashona['rom_proka_ramadan_kormo_plan_bitoron'] ?>
                                </td> 
                            </tr>
                        </table>
                       
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
