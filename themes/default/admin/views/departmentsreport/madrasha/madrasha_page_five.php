<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০৫ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
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
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/madrasha-page-five') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/madrasha-page-five/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="14"><b>কওমি বিভাগ</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_কওমি বিভাগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <td class="tg-0pky  type_1">
                                <?php echo $muballig_bor_k=$madrasah_kowmi_1['muballig_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $muballig_bor_h=$madrasah_kowmi_1['muballig_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $muballig_bri_k=$madrasah_kowmi_1['muballig_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $muballig_bri_h=$madrasah_kowmi_1['muballig_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $muballig_ter_k=$madrasah_kowmi_1['muballig_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muballig_ter_h=$madrasah_kowmi_1['muballig_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muballig_gha_k=$madrasah_kowmi_1['muballig_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muballig_gha_h=$madrasah_kowmi_1['muballig_gha_h'] ?>
                                </td>
                                <td class="tg-y698">মাজলিছে খাস </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $khas_n=$madrasah_kowmi_1['khas_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $khas_p=$madrasah_kowmi_1['khas_p'] ?>
                                </td>
                                <td class="tg-y698">পুরস্কার বিতরনী অনুষ্ঠান </td>
                                
                                <td class="tg-0pky  type_7">
                                <?php echo $puroshkar_n=$madrasah_kowmi_1['puroshkar_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $puroshkar_p=$madrasah_kowmi_1['puroshkar_p'] ?>
                                </td>
                               
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">দা’ঈ </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $dayi_bor_k=$madrasah_kowmi_1['dayi_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dayi_bor_h=$madrasah_kowmi_1['dayi_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $dayi_bri_k=$madrasah_kowmi_1['dayi_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $dayi_bri_h=$madrasah_kowmi_1['dayi_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $dayi_ter_k=$madrasah_kowmi_1['dayi_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $dayi_ter_h=$madrasah_kowmi_1['dayi_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $dayi_gha_k=$madrasah_kowmi_1['dayi_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $dayi_gha_h=$madrasah_kowmi_1['dayi_gha_h'] ?>
                                </td>
                                <td class="tg-y698">মাজলিশে আ’ম </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $am_n=$madrasah_kowmi_1['am_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $am_p=$madrasah_kowmi_1['am_p'] ?>
                                </td>
                                <td class="tg-y698">হাফেজ কুরআন সংবর্ধনা </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $hafej_n=$madrasah_kowmi_1['hafej_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $hafej_p=$madrasah_kowmi_1['hafej_p'] ?>
                                </td>
                                
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">মুঈন </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $muin_bor_k=$madrasah_kowmi_1['muin_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $muin_bor_h=$madrasah_kowmi_1['muin_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $muin_bri_k=$madrasah_kowmi_1['muin_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $muin_bri_h=$madrasah_kowmi_1['muin_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $muin_ter_k=$madrasah_kowmi_1['muin_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muin_ter_h=$madrasah_kowmi_1['muin_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muin_gha_k=$madrasah_kowmi_1['muin_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muin_gha_h=$madrasah_kowmi_1['muin_gha_h'] ?>
                                </td>
                                <td class="tg-y698">মুবাল্লিগ মাজলিশ </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muballig_n=$madrasah_kowmi_1['muballig_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muballig_p=$madrasah_kowmi_1['muballig_p'] ?>
                                </td>
                                <td class="tg-y698"> মুমতাজ সংবর্ধনা  </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $mumtaj_n=$madrasah_kowmi_1['mumtaj_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $mumtaj_p=$madrasah_kowmi_1['mumtaj_p'] ?>
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
                                <td class="tg-0pky  type_7">
                                <?php echo $dayi_s_n=$madrasah_kowmi_1['dayi_s_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $dayi_s_p=$madrasah_kowmi_1['dayi_s_p'] ?>
                                </td>
                                <td class="tg-y698">কিরাত প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $kirat_n=$madrasah_kowmi_1['kirat_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $kirat_p=$madrasah_kowmi_1['kirat_p'] ?>
                                </td>
                               
                               
                            </tr>

                            <tr>
                                <td class="tg-y698">  </td>
                                <td class="tg-0pky  type_1" colspan="8"><b>দাওয়াত</b>
                                </td>
                                <td class="tg-y698">মুঈন মজলিশ </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muin_n=$madrasah_kowmi_1['muin_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muin_p=$madrasah_kowmi_1['muin_p'] ?>
                                </td>
                                <td class="tg-y698">মুঈন কর্মশালা </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muin_w_n=$madrasah_kowmi_1['muin_w_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muin_w_p=$madrasah_kowmi_1['muin_w_p'] ?>
                                </td>
                                                              
                            </tr>


                            <tr>
                                <td class="tg-y698">মুয়ায়্যিদ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $muid_bor_k=$madrasah_kowmi_1['muid_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $muid_bor_h=$madrasah_kowmi_1['muid_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $muid_bri_k=$madrasah_kowmi_1['muid_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $muid_bri_h=$madrasah_kowmi_1['muid_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $muid_ter_k=$madrasah_kowmi_1['muid_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muid_ter_h=$madrasah_kowmi_1['muid_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muid_gha_k=$madrasah_kowmi_1['muid_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muid_gha_h=$madrasah_kowmi_1['muid_gha_h'] ?>
                                </td>
                                <td class="tg-y698">প্রতিনিধি সমাবেশ </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $protinidhi_n=$madrasah_kowmi_1['protinidhi_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $protinidhi_p=$madrasah_kowmi_1['protinidhi_p'] ?>
                                </td>
                                <td class="tg-y698">হিফজুল কুরআন/হাদিস প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $hifjul_n=$madrasah_kowmi_1['hifjul_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $hifjul_p=$madrasah_kowmi_1['hifjul_p'] ?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> সাদিক  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sadiq_bor_k=$madrasah_kowmi_1['sadiq_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sadiq_bor_h=$madrasah_kowmi_1['sadiq_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sadiq_bri_k=$madrasah_kowmi_1['sadiq_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sadiq_bri_h=$madrasah_kowmi_1['sadiq_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sadiq_ter_k=$madrasah_kowmi_1['sadiq_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sadiq_ter_h=$madrasah_kowmi_1['sadiq_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sadiq_gha_k=$madrasah_kowmi_1['sadiq_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sadiq_gha_h=$madrasah_kowmi_1['sadiq_gha_h'] ?>
                                </td>
                                <td class="tg-y698">তা’লিমুল কুরআন </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $t_quran_n=$madrasah_kowmi_1['t_quran_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $t_quran_p=$madrasah_kowmi_1['t_quran_p'] ?>
                                </td>
                                <td class="tg-y698">ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $iftar_n=$madrasah_kowmi_1['iftar_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $iftar_p=$madrasah_kowmi_1['iftar_p'] ?>
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
                                <td class="tg-0pky  type_7">
                                <?php echo $t_hadis_n=$madrasah_kowmi_1['t_hadis_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $t_hadis_p=$madrasah_kowmi_1['t_hadis_p'] ?>
                                </td>
                                <td class="tg-y698">উস্তাজ যোগাযোগ/হাদিয়া</td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ustad_n=$madrasah_kowmi_1['ustad_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ustad_p=$madrasah_kowmi_1['ustad_p'] ?>
                                </td>
                               
                               
                            </tr>

                            <tr>
                                <td class="tg-y698">  </td>
                                <td class="tg-0pky  type_1" colspan="8"><b>সংগঠন</b>
                               </td>
                                <td class="tg-y698">সাহিত্য পাঠ </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sahitto_n=$madrasah_kowmi_1['sahitto_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sahitto_p=$madrasah_kowmi_1['sahitto_p'] ?>
                                </td>
                                <td class="tg-y698">শিক্ষা উপকরণ বিতরণ </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $shikkha_u_n=$madrasah_kowmi_1['shikkha_u_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $shikkha_u_p=$madrasah_kowmi_1['shikkha_u_p'] ?>
                                </td>
                                                              
                            </tr>


                            <tr>
                                <td class="tg-y698">থানা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $thana_bor_k=$madrasah_kowmi_1['thana_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $thana_bor_h=$madrasah_kowmi_1['thana_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $thana_bri_k=$madrasah_kowmi_1['thana_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $thana_bri_h=$madrasah_kowmi_1['thana_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $thana_ter_k=$madrasah_kowmi_1['thana_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $thana_ter_h=$madrasah_kowmi_1['thana_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $thana_gha_k=$madrasah_kowmi_1['thana_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $thana_gha_h=$madrasah_kowmi_1['thana_gha_h'] ?>
                                </td>
                                <td class="tg-y698">ইসলাহি মজলিশে আ’ম  </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $islahi_n=$madrasah_kowmi_1['islahi_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $islahi_p=$madrasah_kowmi_1['islahi_p'] ?>
                                </td>
                                <td class="tg-y698">মাদরাসা সফর </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $madrasa_n=$madrasah_kowmi_1['madrasa_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $madrasa_p=$madrasah_kowmi_1['madrasa_p'] ?>
                                </td>

                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> ওয়ার্ড/জোন </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $word_bor_k=$madrasah_kowmi_1['word_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $word_bor_h=$madrasah_kowmi_1['word_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $word_bri_k=$madrasah_kowmi_1['word_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $word_bri_h=$madrasah_kowmi_1['word_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $word_ter_k=$madrasah_kowmi_1['word_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $word_ter_h=$madrasah_kowmi_1['word_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $word_gha_k=$madrasah_kowmi_1['word_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $word_gha_h=$madrasah_kowmi_1['word_gha_h'] ?>
                                </td>
                                <td class="tg-y698">চা চক্র/ফল চক্র </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $cha_n=$madrasah_kowmi_1['cha_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $cha_p=$madrasah_kowmi_1['cha_p'] ?>
                                </td>
                                <td class="tg-y698">দা’ঈ সমাবেশ  </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $dayi_n=$madrasah_kowmi_1['dayi_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $dayi_p=$madrasah_kowmi_1['dayi_p'] ?>
                                </td>
                            
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> উপশাখা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $up_bor_k=$madrasah_kowmi_1['up_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $up_bor_h=$madrasah_kowmi_1['up_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $up_bri_k=$madrasah_kowmi_1['up_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $up_bri_h=$madrasah_kowmi_1['up_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $up_ter_k=$madrasah_kowmi_1['up_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $up_ter_h=$madrasah_kowmi_1['up_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $up_gha_k=$madrasah_kowmi_1['up_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $up_gha_h=$madrasah_kowmi_1['up_gha_h'] ?>
                                </td>
                                <td class="tg-y698">শিক্ষা সফর </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $shikkha_n=$madrasah_kowmi_1['shikkha_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $shikkha_p=$madrasah_kowmi_1['shikkha_p'] ?>
                                </td>
                                <td class="tg-y698">আরবি খুতবা পাঠ প্রতিযোগি:  </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $khutba_n=$madrasah_kowmi_1['khutba_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $khutba_p=$madrasah_kowmi_1['khutba_p'] ?>
                                </td>
                            
                                
                            </tr>
                           
                            <tr>
                                <td class="tg-y698"> মুয়ায়্যিদ সংগঠন</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $muid_s_bor_k=$madrasah_kowmi_1['muid_s_bor_k'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $muid_s_bor_h=$madrasah_kowmi_1['muid_s_bor_h'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $muid_s_bri_k=$madrasah_kowmi_1['muid_s_bri_k'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $muid_s_bri_h=$madrasah_kowmi_1['muid_s_bri_h'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $muid_s_ter_k=$madrasah_kowmi_1['muid_s_ter_k'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $muid_s_ter_h=$madrasah_kowmi_1['muid_s_ter_h'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muid_s_gha_k=$madrasah_kowmi_1['muid_s_gha_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $muid_s_gha_h=$madrasah_kowmi_1['muid_s_gha_h'] ?>
                                </td>
                                <td class="tg-y698">কুরআন ক্লাস</td>
                                <td class="tg-0pky  type_7">
                                <?php echo $quran_n=$madrasah_kowmi_1['quran_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $quran_p=$madrasah_kowmi_1['quran_p'] ?>
                                </td>
                                <td class="tg-y698">মত বিনিময় সভা:  </td>
                              
                                <td class="tg-0pky  type_7">
                                <?php echo $mot_n=$madrasah_kowmi_1['mot_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $mot_p=$madrasah_kowmi_1['mot_p'] ?>
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
                                <td class="tg-0pky  type_7">
                                <?php echo $tarbiyat_n=$madrasah_kowmi_1['tarbiyat_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $tarbiyat_p=$madrasah_kowmi_1['tarbiyat_p'] ?>
                                </td>
                                <td class="tg-y698">রিপোর্ট পর্যালোচনা:  </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $report_n=$madrasah_kowmi_1['report_n'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $report_p=$madrasah_kowmi_1['report_p'] ?>
                                </td>
                            
                                
                            </tr>  
                           
                           
                        </table>

                      
                        
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
