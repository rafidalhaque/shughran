<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

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
                            <td class="tg-pwj7" colspan='2'><b>দাওয়াতি প্রোগ্রাম </b></td>
                            <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_দাওয়াতি প্রোগ্রাম (আলিয়া)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোট উপস্থিতি </span></div></td>   
                               
                            </tr>
                            <?php
                            $pk = (isset($madrasah_dawat_program_1['id']))?$madrasah_dawat_program_1['id']:'';
                            ?>
                          <tr>
                                <td class="tg-y698 type_1"> আয়াত-হাদিস মুখস্থ প্রতিযোগিতা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ayat_proti_num" data-title="Enter"><?php echo $ayat_proti_num=  (isset( $madrasah_dawat_program_1['ayat_proti_num']))? $madrasah_dawat_program_1['ayat_proti_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ayat_proti_pre" data-title="Enter"><?php echo $ayat_proti_pre=  (isset( $madrasah_dawat_program_1['ayat_proti_pre']))? $madrasah_dawat_program_1['ayat_proti_pre']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">এ+ সংবর্ধনা/ নবীন বরণ  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_plus_num" data-title="Enter"><?php echo $a_plus_num=  (isset( $madrasah_dawat_program_1['a_plus_num']))? $madrasah_dawat_program_1['a_plus_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="a_plus_pre" data-title="Enter"><?php echo $a_plus_pre=  (isset( $madrasah_dawat_program_1['a_plus_pre']))? $madrasah_dawat_program_1['a_plus_pre']:'' ?></a>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">হাফেজে কুরআন সংবর্ধনা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafej_num" data-title="Enter"><?php echo $hafej_num=  (isset( $madrasah_dawat_program_1['hafej_num']))? $madrasah_dawat_program_1['hafej_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hafej_pre" data-title="Enter"><?php echo $hafej_pre=  (isset( $madrasah_dawat_program_1['hafej_pre']))? $madrasah_dawat_program_1['hafej_pre']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">বক্তৃতা/ রচনা প্রতিযোগিতা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rochona_num" data-title="Enter"><?php echo $rochona_num=  (isset( $madrasah_dawat_program_1['rochona_num']))? $madrasah_dawat_program_1['rochona_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rochona_pre" data-title="Enter"><?php echo $rochona_pre=  (isset( $madrasah_dawat_program_1['rochona_pre']))? $madrasah_dawat_program_1['rochona_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মেধাবী সংবর্ধনা/বৃত্তি </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="merit_num" data-title="Enter"><?php echo $merit_num=  (isset( $madrasah_dawat_program_1['merit_num']))? $madrasah_dawat_program_1['merit_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="merit_pre" data-title="Enter"><?php echo $merit_pre=  (isset( $madrasah_dawat_program_1['merit_pre']))? $madrasah_dawat_program_1['merit_pre']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার গাইড লাইন</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="career_num" data-title="Enter"><?php echo $career_num=  (isset( $madrasah_dawat_program_1['career_num']))? $madrasah_dawat_program_1['career_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="career_pre" data-title="Enter"><?php echo $career_pre=  (isset( $madrasah_dawat_program_1['career_pre']))? $madrasah_dawat_program_1['career_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> কুইজ প্রতিযোগিতা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quiz_num" data-title="Enter"><?php echo $quiz_num=  (isset( $madrasah_dawat_program_1['quiz_num']))? $madrasah_dawat_program_1['quiz_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quiz_pre" data-title="Enter"><?php echo $quiz_pre=  (isset( $madrasah_dawat_program_1['quiz_pre']))? $madrasah_dawat_program_1['quiz_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাধারণ সভা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shadharon_num" data-title="Enter"><?php echo $shadharon_num=  (isset( $madrasah_dawat_program_1['shadharon_num']))? $madrasah_dawat_program_1['shadharon_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shadharon_pre" data-title="Enter"><?php echo $shadharon_pre=  (isset( $madrasah_dawat_program_1['shadharon_pre']))? $madrasah_dawat_program_1['shadharon_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> বিতর্ক প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bitorko_num" data-title="Enter"><?php echo $bitorko_num=  (isset( $madrasah_dawat_program_1['bitorko_num']))? $madrasah_dawat_program_1['bitorko_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bitorko_pre" data-title="Enter"><?php echo $bitorko_pre=  (isset( $madrasah_dawat_program_1['bitorko_pre']))? $madrasah_dawat_program_1['bitorko_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ওয়ায়েজীন প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="waz_num" data-title="Enter"><?php echo $waz_num=  (isset( $madrasah_dawat_program_1['waz_num']))? $madrasah_dawat_program_1['waz_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="waz_pre" data-title="Enter"><?php echo $waz_pre=  (isset( $madrasah_dawat_program_1['waz_pre']))? $madrasah_dawat_program_1['waz_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">খুতবা/ ইবারত পাঠ প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khutba_num" data-title="Enter"><?php echo $khutba_num=  (isset( $madrasah_dawat_program_1['khutba_num']))? $madrasah_dawat_program_1['khutba_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="khutba_pre" data-title="Enter"><?php echo $khutba_pre=  (isset( $madrasah_dawat_program_1['khutba_pre']))? $madrasah_dawat_program_1['khutba_pre']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> আলেমদের সাথে মতবিনিময়	</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alem_num" data-title="Enter"><?php echo $alem_num=  (isset( $madrasah_dawat_program_1['alem_num']))? $madrasah_dawat_program_1['alem_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alem_pre" data-title="Enter"><?php echo $alem_pre=  (isset( $madrasah_dawat_program_1['alem_pre']))? $madrasah_dawat_program_1['alem_pre']:'' ?></a>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698">উস্তাজ যোগাযোগ </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ustad_num" data-title="Enter"><?php echo $ustad_num=  (isset( $madrasah_dawat_program_1['ustad_num']))? $madrasah_dawat_program_1['ustad_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ustad_pre" data-title="Enter"><?php echo $ustad_pre=  (isset( $madrasah_dawat_program_1['ustad_pre']))? $madrasah_dawat_program_1['ustad_pre']:'' ?></a>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">হাদিয়া প্রদান </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hadia_num" data-title="Enter"><?php echo $hadia_num=  (isset( $madrasah_dawat_program_1['hadia_num']))? $madrasah_dawat_program_1['hadia_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hadia_pre" data-title="Enter"><?php echo $hadia_pre=  (isset( $madrasah_dawat_program_1['hadia_pre']))? $madrasah_dawat_program_1['hadia_pre']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কুরআন বিতরণ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quran_num" data-title="Enter"><?php echo $quran_num=  (isset( $madrasah_dawat_program_1['quran_num']))? $madrasah_dawat_program_1['quran_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quran_pre" data-title="Enter"><?php echo $quran_pre=  (isset( $madrasah_dawat_program_1['quran_pre']))? $madrasah_dawat_program_1['quran_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষা উপকরণ বিতরণ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shikkha_num" data-title="Enter"><?php echo $shikkha_num=  (isset( $madrasah_dawat_program_1['shikkha_num']))? $madrasah_dawat_program_1['shikkha_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shikkha_pre" data-title="Enter"><?php echo $shikkha_pre=  (isset( $madrasah_dawat_program_1['shikkha_pre']))? $madrasah_dawat_program_1['shikkha_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ক্বিরাত প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kirat_num" data-title="Enter"><?php echo $kirat_num=  (isset( $madrasah_dawat_program_1['kirat_num']))? $madrasah_dawat_program_1['kirat_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kirat_pre" data-title="Enter"><?php echo $kirat_pre=  (isset( $madrasah_dawat_program_1['kirat_pre']))? $madrasah_dawat_program_1['kirat_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> মতবিনিময়/ আলোচনা সভা</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mot_num" data-title="Enter"><?php echo $mot_num=  (isset( $madrasah_dawat_program_1['mot_num']))? $madrasah_dawat_program_1['mot_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mot_pre" data-title="Enter"><?php echo $mot_pre=  (isset( $madrasah_dawat_program_1['mot_pre']))? $madrasah_dawat_program_1['mot_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iftar_num" data-title="Enter"><?php echo $iftar_num=  (isset( $madrasah_dawat_program_1['iftar_num']))? $madrasah_dawat_program_1['iftar_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iftar_pre" data-title="Enter"><?php echo $iftar_pre=  (isset( $madrasah_dawat_program_1['iftar_pre']))? $madrasah_dawat_program_1['iftar_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> দারসূল কুরআন / হাদিস পাঠ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dars_num" data-title="Enter"><?php echo $dars_num=  (isset( $madrasah_dawat_program_1['dars_num']))? $madrasah_dawat_program_1['dars_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dars_pre" data-title="Enter"><?php echo $dars_pre=  (isset( $madrasah_dawat_program_1['dars_pre']))? $madrasah_dawat_program_1['dars_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">চা/ ফল চক্র </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cha_num" data-title="Enter"><?php echo $cha_num=  (isset( $madrasah_dawat_program_1['cha_num']))? $madrasah_dawat_program_1['cha_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cha_pre" data-title="Enter"><?php echo $cha_pre=  (isset( $madrasah_dawat_program_1['cha_pre']))? $madrasah_dawat_program_1['cha_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য প্রোগ্রামসমূহ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="other_num" data-title="Enter"><?php echo $other_num=  (isset( $madrasah_dawat_program_1['other_num']))? $madrasah_dawat_program_1['other_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="other_pre" data-title="Enter"><?php echo $other_pre=  (isset( $madrasah_dawat_program_1['other_pre']))? $madrasah_dawat_program_1['other_pre']:'' ?></a>
                                </td>
                            </tr> 
                            <tr>
                                <td class="tg-y698">সাধারণ জ্ঞানের আসর</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadaron_gan_num" data-title="Enter"><?php echo $sadaron_gan_num=  (isset( $madrasah_dawat_program_1['sadaron_gan_num']))? $madrasah_dawat_program_1['sadaron_gan_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_dawat_program_1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sadaron_gan_pre" data-title="Enter"><?php echo $sadaron_gan_pre=  (isset( $madrasah_dawat_program_1['sadaron_gan_pre']))? $madrasah_dawat_program_1['sadaron_gan_pre']:'' ?></a>
                                </td>
                            </tr>     

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='2'><b>প্রোগ্রাম :</b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_প্রশিক্ষণমূলক প্রোগ্রাম (আলিয়া)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোট উপস্থিতি </span></div></td>
                        
                            </tr>
                            <?php
                            $pk = (isset($madrasah_proshikkhon_program['id']))?$madrasah_proshikkhon_program['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> তারবিয়াতি বৈঠক	</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tarbiyat_num" data-title="Enter"><?php echo $tarbiyat_num=  (isset( $madrasah_proshikkhon_program['tarbiyat_num']))? $madrasah_proshikkhon_program['tarbiyat_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tarbiyat_pre" data-title="Enter"><?php echo $tarbiyat_pre=  (isset( $madrasah_proshikkhon_program['tarbiyat_pre']))? $madrasah_proshikkhon_program['tarbiyat_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> আলেম তৈরির কর্মশালা	</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alem_num" data-title="Enter"><?php echo $alem_num=  (isset( $madrasah_proshikkhon_program['alem_num']))? $madrasah_proshikkhon_program['alem_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="alem_pre" data-title="Enter"><?php echo $alem_pre=  (isset( $madrasah_proshikkhon_program['alem_pre']))? $madrasah_proshikkhon_program['alem_pre']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">আরবি ভাষা কোর্স</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="arbi_num" data-title="Enter"><?php echo $arbi_num=  (isset( $madrasah_proshikkhon_program['arbi_num']))? $madrasah_proshikkhon_program['arbi_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="arbi_pre" data-title="Enter"><?php echo $arbi_pre=  (isset( $madrasah_proshikkhon_program['arbi_pre']))? $madrasah_proshikkhon_program['arbi_pre']:'' ?></a>
                                </td>
                               
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">তা'লীমুল কুরআন </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="talimul_num" data-title="Enter"><?php echo $talimul_num=  (isset( $madrasah_proshikkhon_program['talimul_num']))? $madrasah_proshikkhon_program['talimul_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="talimul_pre" data-title="Enter"><?php echo $talimul_pre=  (isset( $madrasah_proshikkhon_program['talimul_pre']))? $madrasah_proshikkhon_program['talimul_pre']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">প্রতিনিধি সমাবেশ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="protinidhi_num" data-title="Enter"><?php echo $protinidhi_num=  (isset( $madrasah_proshikkhon_program['protinidhi_num']))? $madrasah_proshikkhon_program['protinidhi_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="protinidhi_pre" data-title="Enter"><?php echo $protinidhi_pre=  (isset( $madrasah_proshikkhon_program['protinidhi_pre']))? $madrasah_proshikkhon_program['protinidhi_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী বৈঠক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_num" data-title="Enter"><?php echo $kormi_num=  (isset( $madrasah_proshikkhon_program['kormi_num']))? $madrasah_proshikkhon_program['kormi_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_pre" data-title="Enter"><?php echo $kormi_pre=  (isset( $madrasah_proshikkhon_program['kormi_pre']))? $madrasah_proshikkhon_program['kormi_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাথী কুরআন ক্লাস </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quran_num" data-title="Enter"><?php echo $quran_num=  (isset( $madrasah_proshikkhon_program['quran_num']))? $madrasah_proshikkhon_program['quran_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="quran_pre" data-title="Enter"><?php echo $quran_pre=  (isset( $madrasah_proshikkhon_program['quran_pre']))? $madrasah_proshikkhon_program['quran_pre']:'' ?></a>
                                </td>                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> সাথী বৈঠক</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_boithok_num" data-title="Enter"><?php echo $sathi_boithok_num=  (isset( $madrasah_proshikkhon_program['sathi_boithok_num']))? $madrasah_proshikkhon_program['sathi_boithok_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_boithok_pre" data-title="Enter"><?php echo $sathi_boithok_pre=  (isset( $madrasah_proshikkhon_program['sathi_boithok_pre']))? $madrasah_proshikkhon_program['sathi_boithok_pre']:'' ?></a>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">নৈশ ইবাদত </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="noisho_num" data-title="Enter"><?php echo $noisho_num=  (isset( $madrasah_proshikkhon_program['noisho_num']))? $madrasah_proshikkhon_program['noisho_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="noisho_pre" data-title="Enter"><?php echo $noisho_pre=  (isset( $madrasah_proshikkhon_program['noisho_pre']))? $madrasah_proshikkhon_program['noisho_pre']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> সামষ্টিক পাঠ</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shamoshtik_num" data-title="Enter"><?php echo $shamoshtik_num=  (isset( $madrasah_proshikkhon_program['shamoshtik_num']))? $madrasah_proshikkhon_program['shamoshtik_num']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="madrasah_proshikkhon_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shamoshtik_pre" data-title="Enter"><?php echo $shamoshtik_pre=  (isset( $madrasah_proshikkhon_program['shamoshtik_pre']))? $madrasah_proshikkhon_program['shamoshtik_pre']:'' ?></a>
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
