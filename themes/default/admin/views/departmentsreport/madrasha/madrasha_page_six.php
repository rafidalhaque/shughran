<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০৬ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-six' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/madrasha-page-six') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/madrasha-page-six/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="14"><b>এক নজরে মাদরাসাসমূহে সংগঠন : কওমি</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_এক নজরে মাদরাসাসমূহে সংগঠন : কওমি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                             <td class="tg-pwj7" rowspan='2'>মাদরাসা</td>
                             <td class="tg-pwj7" rowspan='2'>মোট</td>
                             <td class="tg-pwj7" rowspan='2' >সংগঠন আছে </td>
                             <td class="tg-pwj7" rowspan='2' >বৃদ্ধি</td>
                             <td class="tg-pwj7" rowspan='2' >থানা মানের </td>
                             <td class="tg-pwj7" rowspan='2' >বৃদ্ধি</td>
                             <td class="tg-pwj7" rowspan='2' >ওয়ার্ড/ জোন মানের</td>
                             <td class="tg-pwj7" rowspan='2' >বৃদ্ধি</td>
                             <td class="tg-pwj7" rowspan='2' >উপশাখা মানের</td>
                             <td class="tg-pwj7" rowspan='2' >বৃদ্ধি</td>
                             <td class="tg-pwj7" rowspan='2' >মুয়ায়্যিদ সংগঠন</td>
                             <td class="tg-pwj7" rowspan='2' >বৃদ্ধি</td>
                             <td class="tg-pwj7" rowspan='2' >সংগঠন নেই</td>
                             <td class="tg-pwj7" colspan='4'>কওমি ওলামায়ে কেরাম পরিসংখ্যান</td>
                            
                           </tr>
                           <tr>
                             <td class="tg-pwj7" >ধরন</td>
                             <td class="tg-pwj7" >মোট</td>
                             <td class="tg-pwj7" >সাংগঠনিক</td>
                             <td class="tg-pwj7" >বিরোধী </td>
                           </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > ইফতা /তাখাস্সুস	</td>

                                <td class="tg-0pky" >
                                <?php echo $ifta_mot=$madrasah_eknojore_shongothon_2['ifta_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_shong=$madrasah_eknojore_shongothon_2['ifta_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_shong_bri=$madrasah_eknojore_shongothon_2['ifta_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_thana=$madrasah_eknojore_shongothon_2['ifta_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_thana_bri=$madrasah_eknojore_shongothon_2['ifta_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_word=$madrasah_eknojore_shongothon_2['ifta_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_word_bri=$madrasah_eknojore_shongothon_2['ifta_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_up=$madrasah_eknojore_shongothon_2['ifta_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_up_bri=$madrasah_eknojore_shongothon_2['ifta_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_muid=$madrasah_eknojore_shongothon_2['ifta_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_muid_bri=$madrasah_eknojore_shongothon_2['ifta_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ifta_s_nei=$madrasah_eknojore_shongothon_2['ifta_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                মুহাদ্দিস/ মুফাসসির
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhaddis_mot=$madrasah_eknojore_shongothon_2['muhaddis_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhaddis_shang=$madrasah_eknojore_shongothon_2['muhaddis_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhaddis_birodhi=$madrasah_eknojore_shongothon_2['muhaddis_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > দাওরায়ে হাদীস	</td>

                                <td class="tg-0pky" >
                                <?php echo $dawra_mot=$madrasah_eknojore_shongothon_2['dawra_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_shong=$madrasah_eknojore_shongothon_2['dawra_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_shong_bri=$madrasah_eknojore_shongothon_2['dawra_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_thana=$madrasah_eknojore_shongothon_2['dawra_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_thana_bri=$madrasah_eknojore_shongothon_2['dawra_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_word=$madrasah_eknojore_shongothon_2['dawra_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_word_bri=$madrasah_eknojore_shongothon_2['dawra_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_up=$madrasah_eknojore_shongothon_2['dawra_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_up_bri=$madrasah_eknojore_shongothon_2['dawra_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_muid=$madrasah_eknojore_shongothon_2['dawra_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_muid_bri=$madrasah_eknojore_shongothon_2['dawra_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dawra_s_nei=$madrasah_eknojore_shongothon_2['dawra_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                পীর- মাশায়েখ
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $pir_mot=$madrasah_eknojore_shongothon_2['pir_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $pir_shang=$madrasah_eknojore_shongothon_2['pir_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $pir_birodhi=$madrasah_eknojore_shongothon_2['pir_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > মেশকাত	</td>

                                <td class="tg-0pky" >
                                <?php echo $meshkat_mot=$madrasah_eknojore_shongothon_2['meshkat_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_shong=$madrasah_eknojore_shongothon_2['meshkat_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_shong_bri=$madrasah_eknojore_shongothon_2['meshkat_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_thana=$madrasah_eknojore_shongothon_2['meshkat_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_thana_bri=$madrasah_eknojore_shongothon_2['meshkat_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_word=$madrasah_eknojore_shongothon_2['meshkat_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_word_bri=$madrasah_eknojore_shongothon_2['meshkat_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_up=$madrasah_eknojore_shongothon_2['meshkat_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_up_bri=$madrasah_eknojore_shongothon_2['meshkat_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_muid=$madrasah_eknojore_shongothon_2['meshkat_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_muid_bri=$madrasah_eknojore_shongothon_2['meshkat_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $meshkat_s_nei=$madrasah_eknojore_shongothon_2['meshkat_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                মুহতামিম
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhtamim_mot=$madrasah_eknojore_shongothon_2['muhtamim_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhtamim_shang=$madrasah_eknojore_shongothon_2['muhtamim_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhtamim_birodhi=$madrasah_eknojore_shongothon_2['muhtamim_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > জালালাইন	</td>

                                <td class="tg-0pky" >
                                <?php echo $jalalain_mot=$madrasah_eknojore_shongothon_2['jalalain_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_shong=$madrasah_eknojore_shongothon_2['jalalain_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_shong_bri=$madrasah_eknojore_shongothon_2['jalalain_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_thana=$madrasah_eknojore_shongothon_2['jalalain_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_thana_bri=$madrasah_eknojore_shongothon_2['jalalain_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_word=$madrasah_eknojore_shongothon_2['jalalain_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_word_bri=$madrasah_eknojore_shongothon_2['jalalain_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_up=$madrasah_eknojore_shongothon_2['jalalain_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_up_bri=$madrasah_eknojore_shongothon_2['jalalain_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_muid=$madrasah_eknojore_shongothon_2['jalalain_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_muid_bri=$madrasah_eknojore_shongothon_2['jalalain_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $jalalain_s_nei=$madrasah_eknojore_shongothon_2['jalalain_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                মুফতি
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $mufti_mot=$madrasah_eknojore_shongothon_2['mufti_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $mufti_shang=$madrasah_eknojore_shongothon_2['mufti_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $mufti_birodhi=$madrasah_eknojore_shongothon_2['mufti_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > কাফিয়া	</td>

                                <td class="tg-0pky" >
                                <?php echo $kafia_mot=$madrasah_eknojore_shongothon_2['kafia_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_shong=$madrasah_eknojore_shongothon_2['kafia_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_shong_bri=$madrasah_eknojore_shongothon_2['kafia_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_thana=$madrasah_eknojore_shongothon_2['kafia_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_thana_bri=$madrasah_eknojore_shongothon_2['kafia_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_word=$madrasah_eknojore_shongothon_2['kafia_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_word_bri=$madrasah_eknojore_shongothon_2['kafia_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_up=$madrasah_eknojore_shongothon_2['kafia_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_up_bri=$madrasah_eknojore_shongothon_2['kafia_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_muid=$madrasah_eknojore_shongothon_2['kafia_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_muid_bri=$madrasah_eknojore_shongothon_2['kafia_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kafia_s_nei=$madrasah_eknojore_shongothon_2['kafia_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                ওয়ায়েজিন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $wazin_mot=$madrasah_eknojore_shongothon_2['wazin_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $wazin_shang=$madrasah_eknojore_shongothon_2['wazin_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $wazin_birodhi=$madrasah_eknojore_shongothon_2['wazin_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > হাফেজিয়া	</td>

                                <td class="tg-0pky" >
                                <?php echo $hafezia_mot=$madrasah_eknojore_shongothon_2['hafezia_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_shong=$madrasah_eknojore_shongothon_2['hafezia_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_shong_bri=$madrasah_eknojore_shongothon_2['hafezia_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_thana=$madrasah_eknojore_shongothon_2['hafezia_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_thana_bri=$madrasah_eknojore_shongothon_2['hafezia_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_word=$madrasah_eknojore_shongothon_2['hafezia_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_word_bri=$madrasah_eknojore_shongothon_2['hafezia_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_up=$madrasah_eknojore_shongothon_2['hafezia_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_up_bri=$madrasah_eknojore_shongothon_2['hafezia_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_muid=$madrasah_eknojore_shongothon_2['hafezia_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_muid_bri=$madrasah_eknojore_shongothon_2['hafezia_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $hafezia_s_nei=$madrasah_eknojore_shongothon_2['hafezia_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                খতিব/ইমাম/মুয়াজ্জিন
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $khotib_mot=$madrasah_eknojore_shongothon_2['khotib_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $khotib_shang=$madrasah_eknojore_shongothon_2['khotib_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $khotib_birodhi=$madrasah_eknojore_shongothon_2['khotib_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" >নূরানি মাদরাসা	</td>

                                <td class="tg-0pky" >
                                <?php echo $nurani_mot=$madrasah_eknojore_shongothon_2['nurani_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_shong=$madrasah_eknojore_shongothon_2['nurani_shong'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_shong_bri=$madrasah_eknojore_shongothon_2['nurani_shong_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_thana=$madrasah_eknojore_shongothon_2['nurani_thana'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_thana_bri=$madrasah_eknojore_shongothon_2['nurani_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_word=$madrasah_eknojore_shongothon_2['nurani_word'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_word_bri=$madrasah_eknojore_shongothon_2['nurani_word_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_up=$madrasah_eknojore_shongothon_2['nurani_up'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_up_bri=$madrasah_eknojore_shongothon_2['nurani_up_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_muid=$madrasah_eknojore_shongothon_2['nurani_muid'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_muid_bri=$madrasah_eknojore_shongothon_2['nurani_muid_bri'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_s_nei=$madrasah_eknojore_shongothon_2['nurani_s_nei'] ?>
                                </td>
                                <td class="tg-y698" >
                                কওমি শিক্ষক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $muhaddis_mot=$madrasah_eknojore_shongothon_2['kowmi_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kowmi_shang=$madrasah_eknojore_shongothon_2['kowmi_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $kowmi_birodhi=$madrasah_eknojore_shongothon_2['kowmi_birodhi'] ?>
                                </td>

                            </tr>
                            <tr>
                         
                                <td class="tg-y698 type_1" > মোট</td>

                                <td class="tg-0pky" >
                                <?php echo ($ifta_mot+$dawra_mot + $meshkat_mot+$jalalain_mot + $kafia_mot+$hafezia_mot + $nurani_mot) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_shong+$dawra_shong + $meshkat_shong+$jalalain_shong + $kafia_shong+$hafezia_shong + $nurani_shong) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_shong_bri+$dawra_shong_bri + $meshkat_shong_bri+$jalalain_shong_bri + $kafia_shong_bri+$hafezia_shong_bri + $nurani_shong_bri) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_thana+$dawra_thana + $meshkat_thana+$jalalain_thana + $kafia_thana+$hafezia_thana + $nurani_thana) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_thana_bri+$dawra_thana_bri + $meshkat_thana_bri+$jalalain_thana_bri + $kafia_thana_bri+$hafezia_thana_bri + $nurani_thana_bri) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_word+$dawra_word + $meshkat_word+$jalalain_word + $kafia_word+$hafezia_word + $nurani_word) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_word_bri+$dawra_word_bri + $meshkat_word_bri+$jalalain_word_bri + $kafia_word_bri+$hafezia_word_bri + $nurani_word_bri) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_up+$dawra_up + $meshkat_up+$jalalain_up + $kafia_up+$hafezia_up + $nurani_up) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_up_bri+$dawra_up_bri + $meshkat_up_bri+$jalalain_up_bri + $kafia_up_bri+$hafezia_up_bri + $nurani_up_bri) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_muid+$dawra_muid + $meshkat_muid+$jalalain_muid + $kafia_muid+$hafezia_muid + $nurani_muid) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_muid_bri+$dawra_muid_bri + $meshkat_muid_bri+$jalalain_muid_bri + $kafia_muid_bri+$hafezia_muid_bri + $nurani_muid_bri) ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($ifta_s_nei+$dawra_s_nei + $meshkat_s_nei+$jalalain_s_nei + $kafia_s_nei+$hafezia_s_nei + $nurani_s_nei) ?>
                                </td>

                                <td class="tg-y698" >
                                নূরানি শিক্ষক
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_s_mot=$madrasah_eknojore_shongothon_2['nurani_s_mot'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_s_shang=$madrasah_eknojore_shongothon_2['nurani_s_shang'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $nurani_s_birodhi=$madrasah_eknojore_shongothon_2['nurani_s_birodhi'] ?>
                                </td>

                            </tr>
                        </table>
                   
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>কওমি ফলাফল পরিসংখ্যান (দাওরায়ে হাদিস)</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_কওমি ফলাফল পরিসংখ্যান (দাওরায়ে হাদিস).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                             <td class="tg-pwj7" >মান</td>
                            
                             <td class="tg-pwj7" > মুমতাজ</td>
                             <td class="tg-pwj7" > জায়্যিদ জিদ্দান </td>
                             <td class="tg-pwj7" >জায়্যিদ   </td>
                             <td class="tg-pwj7" >মকবুল</td>
                             <td class="tg-pwj7" >অকৃতকার্য</td>
                             <td class="tg-pwj7" >মোট পরীক্ষার্থী </td>
                           </tr>

                            <tr>
                         
                                <td class="tg-y698 type_1" > সদস্য	</td>
                               
                                  
                                <td class="tg-0pky" >
                                <?php echo $m_total=$madrasah_kowmi_result['m_total'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $m_mumtaj=$madrasah_kowmi_result['m_mumtaj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $m_jj=$madrasah_kowmi_result['m_jj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $m_mokbul=$madrasah_kowmi_result['m_mokbul'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $m_fail=$madrasah_kowmi_result['m_fail'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($m_total+$m_mumtaj+$m_jj+$m_mokbul+$m_fail)?>
                                </td>
             
                              

                            </tr>


                            <tr>
                       
                                <td class="tg-y698" >সাথী </td>
                             
                                  
                                <td class="tg-0pky" >
                                <?php echo $a_total=$madrasah_kowmi_result['a_total'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $a_mumtaj=$madrasah_kowmi_result['a_mumtaj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $a_jj=$madrasah_kowmi_result['a_jj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $a_mokbul=$madrasah_kowmi_result['a_mokbul'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $a_fail=$madrasah_kowmi_result['a_fail'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($a_total+$a_mumtaj+$a_jj+$a_mokbul+$a_fail)?>
                                </td>
                                
                            </tr>
                            <tr>
                            
                            
                                <td class="tg-y698" >কর্মী </td>

                                  
                                <td class="tg-0pky" >
                                <?php echo $w_total=$madrasah_kowmi_result['w_total'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $w_mumtaj=$madrasah_kowmi_result['w_mumtaj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $w_jj=$madrasah_kowmi_result['w_jj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $w_mokbul=$madrasah_kowmi_result['w_mokbul'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $w_fail=$madrasah_kowmi_result['w_fail'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($w_total+$w_mumtaj+$w_jj+$w_mokbul+$w_fail)?>
                                </td>
                                
                            </tr>
                          
                            <tr>
                            
                           
                                <td class="tg-y698" >সমর্থক  </td>

                                  
                                <td class="tg-0pky" >
                                <?php echo $s_total=$madrasah_kowmi_result['s_total'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $s_mumtaj=$madrasah_kowmi_result['s_mumtaj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $s_jj=$madrasah_kowmi_result['s_jj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $s_mokbul=$madrasah_kowmi_result['s_mokbul'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $s_fail=$madrasah_kowmi_result['s_fail'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($s_total+$s_mumtaj+$s_jj+$s_mokbul+$s_fail)?>
                                </td>
                                
                            </tr>
                            
                                <td class="tg-y698" >বন্ধু </td>

                                <td class="tg-0pky" >
                                <?php echo $f_total=$madrasah_kowmi_result['f_total'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $f_mumtaj=$madrasah_kowmi_result['f_mumtaj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $f_jj=$madrasah_kowmi_result['f_jj'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $f_mokbul=$madrasah_kowmi_result['f_mokbul'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $f_fail=$madrasah_kowmi_result['f_fail'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo ($f_total+$f_mumtaj+$f_jj+$f_mokbul+$f_fail)?>
                                </td>
                                
                            </tr>
                            
                            
                            <tr>
                            
                            
                              
                                <td class="tg-0pky" >মোট</td>    
                                <td class="tg-0pky" >
                                <?php echo $mp=($m_total+$a_total+$w_total+$s_total+$f_total)?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $mt=($m_mumtaj+$a_mumtaj+$w_mumtaj+$s_mumtaj+$f_mumtaj)?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $gagi=($m_jj+$a_jj+$w_jj+$s_jj+$f_jj)?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ga=($m_mokbul+$a_mokbul+$w_mokbul+$s_mokbul+$f_mokbul)?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $mb=($m_fail+$a_fail+$w_fail+$s_fail+$f_fail)?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $total=($mp+$mt+$gagi+$ga+$mb)?>
                                </td>
                              
                            </tr>


                            </tr>
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
