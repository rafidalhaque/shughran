<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/madrasha-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/madrasha-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" colspan='2'><b>দাওয়াতি প্রোগ্রাম</b></td>
                            <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_দাওয়াতি প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন (আলিয়া)</td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোট উপস্থিতি </span></div></td>   
                               
                            </tr>

                          <tr>
                                <td class="tg-y698 type_1"> আয়াত-হাদিস মুখস্থ প্রতিযোগিতা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ayat_proti_num=$madrasah_dawat_program_1['ayat_proti_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ayat_proti_pre=$madrasah_dawat_program_1['ayat_proti_pre'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">এ+ সংবর্ধনা/ নবীন বরণ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_plus_num=$madrasah_dawat_program_1['a_plus_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $a_plus_pre=$madrasah_dawat_program_1['a_plus_pre'] ?>
                                </td>
                                
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">হাফেজে কুরআন সংবর্ধনা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hafej_num=$madrasah_dawat_program_1['hafej_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $hafej_pre=$madrasah_dawat_program_1['hafej_pre'] ?>
                                </td>
                               
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">বক্তৃতা/ রচনা প্রতিযোগিতা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $rochona_num=$madrasah_dawat_program_1['rochona_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $rochona_pre=$madrasah_dawat_program_1['rochona_pre'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">মেধাবী সংবর্ধনা/বৃত্তি </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $merit_num=$madrasah_dawat_program_1['merit_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $merit_pre=$madrasah_dawat_program_1['merit_pre'] ?>
                                </td>
                               

                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার গাইড লাইন</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $career_num=$madrasah_dawat_program_1['career_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $career_pre=$madrasah_dawat_program_1['career_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> কুইজ প্রতিযোগিতা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $quiz_num=$madrasah_dawat_program_1['quiz_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $quiz_pre=$madrasah_dawat_program_1['quiz_pre'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">সাধারণ সভা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shadharon_num=$madrasah_dawat_program_1['shadharon_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shadharon_pre=$madrasah_dawat_program_1['shadharon_pre'] ?>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698"> বিতর্ক প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bitorko_num=$madrasah_dawat_program_1['bitorko_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bitorko_pre=$madrasah_dawat_program_1['bitorko_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">ওয়ায়েজীন প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $waz_num=$madrasah_dawat_program_1['waz_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $waz_pre=$madrasah_dawat_program_1['waz_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">খুতবা/ ইবারত পাঠ প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $khutba_num=$madrasah_dawat_program_1['khutba_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $khutba_pre=$madrasah_dawat_program_1['khutba_pre'] ?>
                                </td>
                               
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> আলেমদের সাথে মতবিনিময়	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $alem_num=$madrasah_dawat_program_1['alem_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $alem_pre=$madrasah_dawat_program_1['alem_pre'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">উস্তাজ যোগাযোগ </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ustad_num=$madrasah_dawat_program_1['ustad_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ustad_pre=$madrasah_dawat_program_1['ustad_pre'] ?>
                                </td>
                               
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">হাদিয়া প্রদান </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hadia_num=$madrasah_dawat_program_1['hadia_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $hadia_pre=$madrasah_dawat_program_1['hadia_pre'] ?>
                                </td>
                             
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কুরআন বিতরণ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $quran_num=$madrasah_dawat_program_1['quran_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $quran_pre=$madrasah_dawat_program_1['quran_pre'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষা উপকরণ বিতরণ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shikkha_num=$madrasah_dawat_program_1['shikkha_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_pre=$madrasah_dawat_program_1['shikkha_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">ক্বিরাত প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kirat_num=$madrasah_dawat_program_1['kirat_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kirat_pre=$madrasah_dawat_program_1['kirat_pre'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> মতবিনিময়/ আলোচনা সভা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $mot_num=$madrasah_dawat_program_1['mot_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $mot_pre=$madrasah_dawat_program_1['mot_pre'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $iftar_num=$madrasah_dawat_program_1['iftar_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $iftar_pre=$madrasah_dawat_program_1['iftar_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> দারসূল কুরআন / হাদিস পাঠ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $dars_num=$madrasah_dawat_program_1['dars_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dars_pre=$madrasah_dawat_program_1['dars_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">চা/ ফল চক্র </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $cha_num=$madrasah_dawat_program_1['cha_num'] ?>
                                </td>
                                 <td class="tg-0pky  type_2">
                                <?php echo $cha_pre=$madrasah_dawat_program_1['cha_pre'] ?>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য প্রোগ্রামসমূহ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $other_num=$madrasah_dawat_program_1['other_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $other_pre=$madrasah_dawat_program_1['other_pre'] ?>
                                </td>
                                

                            </tr>  
                            <tr>
                                <td class="tg-y698">সাধারণ জ্ঞানের আসর</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sadaron_gan_num=$madrasah_dawat_program_1['sadaron_gan_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sadaron_gan_pre=$madrasah_dawat_program_1['sadaron_gan_pre'] ?>
                                </td>
                                

                            </tr>    

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='2'><b>প্রোগ্রাম :</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_প্রশিক্ষণমূলক প্রোগ্রাম (আলিয়া).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোট উপস্থিতি </span></div></td>
                        
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> তারবিয়াতি বৈঠক	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $tarbiyat_num=$madrasah_proshikkhon_program['tarbiyat_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $tarbiyat_pre=$madrasah_proshikkhon_program['tarbiyat_pre'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> আলেম তৈরির কর্মশালা	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $alem_num=$madrasah_proshikkhon_program['alem_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $alem_pre=$madrasah_proshikkhon_program['alem_pre'] ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">আরবি ভাষা কোর্স</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $arbi_num=$madrasah_proshikkhon_program['arbi_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $arbi_pre=$madrasah_proshikkhon_program['arbi_pre'] ?>
                                </td>

                               
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">তা'লীমুল কুরআন </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $talimul_num=$madrasah_proshikkhon_program['talimul_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $talimul_pre=$madrasah_proshikkhon_program['talimul_pre'] ?>
                                </td>
>
                             
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">প্রতিনিধি সমাবেশ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $protinidhi_num=$madrasah_proshikkhon_program['protinidhi_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $protinidhi_pre=$madrasah_proshikkhon_program['protinidhi_pre'] ?>
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী বৈঠক</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kormi_num=$madrasah_proshikkhon_program['kormi_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_pre=$madrasah_proshikkhon_program['kormi_pre'] ?>
                                </td>

                               
                            </tr>
                            <tr>
                                <td class="tg-y698">সাথী কুরআন ক্লাস </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $quran_num=$madrasah_proshikkhon_program['quran_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $quran_pre=$madrasah_proshikkhon_program['quran_pre'] ?>
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> সাথী বৈঠক</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sathi_boithok_num=$madrasah_proshikkhon_program['sathi_boithok_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_boithok_pre=$madrasah_proshikkhon_program['sathi_boithok_pre'] ?>
                                </td>

                              
                            </tr>
                            <tr>
                                <td class="tg-y698">নৈশ ইবাদত </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $noisho_num=$madrasah_proshikkhon_program['noisho_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $noisho_pre=$madrasah_proshikkhon_program['noisho_pre'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698"> সামষ্টিক পাঠ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shamoshtik_num=$madrasah_proshikkhon_program['shamoshtik_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shamoshtik_pre=$madrasah_proshikkhon_program['shamoshtik_pre'] ?>
                                </td>

                               
                            </tr>
                           
                        

                        </table>
                      
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
