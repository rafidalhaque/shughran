<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মাদরাসা বিভাগ - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/madrasha-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/madrasha-page-three') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/madrasha-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="12"><b>এক নজরে মাদরাসাসমূহে সংগঠন  </b></td>
                                <td class="tg-pwj7">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Madrasha_এক নজরে মাদরাসাসমূহে সংগঠন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">মাদরাসা</td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>সংগঠন আছে </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>থানা মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ওয়ার্ড/জোন মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপশাখা মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক সংগঠন মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংগঠন নেই </span></div></td>
                                
                                
                               
                            </tr>

                          
                            <tr>
                                <td class="tg-y698 type_1"> কামিল	মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kamil_mot=$madrasah_eknojore_shongothon_1['kamil_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $kamil_shongothon=$madrasah_eknojore_shongothon_1['kamil_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kamil_shongothon_bri=$madrasah_eknojore_shongothon_1['kamil_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kamil_thana=$madrasah_eknojore_shongothon_1['kamil_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $kamil_thana_bri=$madrasah_eknojore_shongothon_1['kamil_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $kamil_word=$madrasah_eknojore_shongothon_1['kamil_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $kamil_word_bri=$madrasah_eknojore_shongothon_1['kamil_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $kamil_up=$madrasah_eknojore_shongothon_1['kamil_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $kamil_up_bri=$madrasah_eknojore_shongothon_1['kamil_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $kamil_ss=$madrasah_eknojore_shongothon_1['kamil_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $kamil_ss_bri=$madrasah_eknojore_shongothon_1['kamil_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $kamil_s_nei=$madrasah_eknojore_shongothon_1['kamil_s_nei'] ?>
                                </td>

                            </tr>

                           

                            <tr>
                                <td class="tg-y698">ফাযিল মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $fajil_mot=$madrasah_eknojore_shongothon_1['fajil_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $fajil_shongothon=$madrasah_eknojore_shongothon_1['fajil_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $fajil_shongothon_bri=$madrasah_eknojore_shongothon_1['fajil_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $fajil_thana=$madrasah_eknojore_shongothon_1['fajil_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $fajil_thana_bri=$madrasah_eknojore_shongothon_1['fajil_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $fajil_word=$madrasah_eknojore_shongothon_1['fajil_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $fajil_word_bri=$madrasah_eknojore_shongothon_1['fajil_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $fajil_up=$madrasah_eknojore_shongothon_1['fajil_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $fajil_up_bri=$madrasah_eknojore_shongothon_1['fajil_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $fajil_ss=$madrasah_eknojore_shongothon_1['fajil_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $fajil_ss_bri=$madrasah_eknojore_shongothon_1['fajil_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $fajil_s_nei=$madrasah_eknojore_shongothon_1['fajil_s_nei'] ?>
                                </td>
                            </tr>
                          
                            <tr>
                                <td class="tg-y698">আলিম মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $alim_mot=$madrasah_eknojore_shongothon_1['alim_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $alim_shongothon=$madrasah_eknojore_shongothon_1['alim_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $alim_shongothon_bri=$madrasah_eknojore_shongothon_1['alim_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $alim_thana=$madrasah_eknojore_shongothon_1['alim_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $alim_thana_bri=$madrasah_eknojore_shongothon_1['alim_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $alim_word=$madrasah_eknojore_shongothon_1['alim_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $alim_word_bri=$madrasah_eknojore_shongothon_1['alim_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $alim_up=$madrasah_eknojore_shongothon_1['alim_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $alim_up_bri=$madrasah_eknojore_shongothon_1['alim_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $alim_ss=$madrasah_eknojore_shongothon_1['alim_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $alim_ss_bri=$madrasah_eknojore_shongothon_1['alim_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $alim_s_nei=$madrasah_eknojore_shongothon_1['alim_s_nei'] ?>
                                </td>
                            </tr>
                           

                            <tr>
                                <td class="tg-y698">দাখিল মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $dakhil_mot=$madrasah_eknojore_shongothon_1['dakhil_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $dakhil_shongothon=$madrasah_eknojore_shongothon_1['dakhil_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $dakhil_shongothon_bri=$madrasah_eknojore_shongothon_1['dakhil_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $dakhil_thana=$madrasah_eknojore_shongothon_1['dakhil_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $dakhil_thana_bri=$madrasah_eknojore_shongothon_1['dakhil_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $dakhil_word=$madrasah_eknojore_shongothon_1['dakhil_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $dakhil_word_bri=$madrasah_eknojore_shongothon_1['dakhil_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $dakhil_up=$madrasah_eknojore_shongothon_1['dakhil_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $dakhil_up_bri=$madrasah_eknojore_shongothon_1['dakhil_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $dakhil_ss=$madrasah_eknojore_shongothon_1['dakhil_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $dakhil_ss_bri=$madrasah_eknojore_shongothon_1['dakhil_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $dakhil_s_nei=$madrasah_eknojore_shongothon_1['dakhil_s_nei'] ?>
                                </td>
                            </tr>

                           

                            <tr>
                                <td class="tg-y698">প্রাইভেট মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $private_mot=$madrasah_eknojore_shongothon_1['private_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $private_shongothon=$madrasah_eknojore_shongothon_1['private_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $private_shongothon_bri=$madrasah_eknojore_shongothon_1['private_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $private_thana=$madrasah_eknojore_shongothon_1['private_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $private_thana_bri=$madrasah_eknojore_shongothon_1['private_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $private_word=$madrasah_eknojore_shongothon_1['private_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $private_word_bri=$madrasah_eknojore_shongothon_1['private_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $private_up=$madrasah_eknojore_shongothon_1['private_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $private_up_bri=$madrasah_eknojore_shongothon_1['private_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $private_ss=$madrasah_eknojore_shongothon_1['private_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $private_ss_bri=$madrasah_eknojore_shongothon_1['private_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $private_s_nei=$madrasah_eknojore_shongothon_1['private_s_nei'] ?>
                                </td>

                            </tr>
                           

                            <tr>
                                <td class="tg-y698">ইবতেদায়ী মাদরাসা  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ibte_mot=$madrasah_eknojore_shongothon_1['ibte_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $ibte_shongothon=$madrasah_eknojore_shongothon_1['ibte_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ibte_shongothon_bri=$madrasah_eknojore_shongothon_1['ibte_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ibte_thana=$madrasah_eknojore_shongothon_1['ibte_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ibte_thana_bri=$madrasah_eknojore_shongothon_1['ibte_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ibte_word=$madrasah_eknojore_shongothon_1['ibte_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ibte_word_bri=$madrasah_eknojore_shongothon_1['ibte_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ibte_up=$madrasah_eknojore_shongothon_1['ibte_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ibte_up_bri=$madrasah_eknojore_shongothon_1['ibte_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ibte_ss=$madrasah_eknojore_shongothon_1['ibte_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ibte_ss_bri=$madrasah_eknojore_shongothon_1['ibte_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ibte_s_nei=$madrasah_eknojore_shongothon_1['ibte_s_nei'] ?>
                                </td>

                            </tr>
                           

                            <tr>
                                <td class="tg-y698">হাফিজি মাদরাসা (কওমি ছাড়া)</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hafeji_mot=$madrasah_eknojore_shongothon_1['hafeji_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $hafeji_shongothon=$madrasah_eknojore_shongothon_1['hafeji_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $hafeji_shongothon_bri=$madrasah_eknojore_shongothon_1['hafeji_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $hafeji_thana=$madrasah_eknojore_shongothon_1['hafeji_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $hafeji_thana_bri=$madrasah_eknojore_shongothon_1['hafeji_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $hafeji_word=$madrasah_eknojore_shongothon_1['hafeji_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $hafeji_word_bri=$madrasah_eknojore_shongothon_1['hafeji_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $hafeji_up=$madrasah_eknojore_shongothon_1['hafeji_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $hafeji_up_bri=$madrasah_eknojore_shongothon_1['hafeji_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $hafeji_ss=$madrasah_eknojore_shongothon_1['hafeji_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $hafeji_ss_bri=$madrasah_eknojore_shongothon_1['hafeji_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $hafeji_s_nei=$madrasah_eknojore_shongothon_1['hafeji_s_nei'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">নূরানি মাদরাসা (কওমি ছাড়া)</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nurani_mot=$madrasah_eknojore_shongothon_1['nurani_mot'] ?>
                                </td>                                
                                <td class="tg-0pky  type_2">
                                <?php echo $nurani_shongothon=$madrasah_eknojore_shongothon_1['nurani_shongothon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nurani_shongothon_bri=$madrasah_eknojore_shongothon_1['nurani_shongothon_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $nurani_thana=$madrasah_eknojore_shongothon_1['nurani_thana'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $nurani_thana_bri=$madrasah_eknojore_shongothon_1['nurani_thana_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $nurani_word=$madrasah_eknojore_shongothon_1['nurani_word'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $nurani_word_bri=$madrasah_eknojore_shongothon_1['nurani_word_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $nurani_up=$madrasah_eknojore_shongothon_1['nurani_up'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $nurani_up_bri=$madrasah_eknojore_shongothon_1['nurani_up_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $nurani_ss=$madrasah_eknojore_shongothon_1['nurani_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $nurani_ss_bri=$madrasah_eknojore_shongothon_1['nurani_ss_bri'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $nurani_s_nei=$madrasah_eknojore_shongothon_1['nurani_s_nei'] ?>
                                </td>

                            </tr>
           
                            <tr>
                                <td class="tg-y698">মোট</td>

                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_mot+$fajil_mot+$alim_mot+$dakhil_mot+$private_mot+$ibte_mot+$hafeji_mot+$nurani_mot) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_shongothon+$fajil_shongothon+$alim_shongothon+$dakhil_shongothon+$private_shongothon+$ibte_shongothon+$hafeji_shongothon+$nurani_shongothon) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_shongothon_bri+$fajil_shongothon_bri+$alim_shongothon_bri+$dakhil_shongothon_bri+$private_shongothon_bri+$ibte_shongothon_bri+$hafeji_shongothon_bri+$nurani_shongothon_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_thana+$fajil_thana+$alim_thana+$dakhil_thana+$private_thana+$ibte_thana+$hafeji_thana+$nurani_thana) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_thana_bri+$fajil_thana_bri+$alim_thana_bri+$dakhil_thana_bri+$private_thana_bri+$ibte_thana_bri+$hafeji_thana_bri+$nurani_thana_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_word+$fajil_word+$alim_word+$dakhil_word+$private_word+$ibte_word+$hafeji_word+$nurani_word) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_word_bri+$fajil_word_bri+$alim_word_bri+$dakhil_word_bri+$private_word_bri+$ibte_word_bri+$hafeji_word_bri+$nurani_word_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_up+$fajil_up+$alim_up+$dakhil_up+$private_up+$ibte_up+$hafeji_up+$nurani_up) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_up_bri+$fajil_up_bri+$alim_up_bri+$dakhil_up_bri+$private_up_bri+$ibte_up_bri+$hafeji_up_bri+$nurani_up_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_ss+$fajil_ss+$alim_ss+$dakhil_ss+$private_ss+$ibte_ss+$hafeji_ss+$nurani_ss) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_ss_bri+$fajil_ss_bri+$alim_ss_bri+$dakhil_ss_bri+$private_ss_bri+$ibte_ss_bri+$hafeji_ss_bri+$nurani_ss_bri) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($kamil_s_nei+$fajil_s_nei+$alim_s_nei+$dakhil_s_nei+$private_s_nei+$ibte_s_nei+$hafeji_s_nei+$nurani_s_nei) ?>
                                </td>


                            </tr>

                        </table>
                    <table class="tg table table-header-rotated" id="testTable2">
                           <tr>
                            <td class='tg-pwj7' colspan='4'>
                            <b>আউটপুট </b>
                            </td>
                            <td class="tg-pwj7">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Madrasha_আউটপুট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                           </tr>
                            <tr>
                                
                                <td class="tg-pwj7"> ধরন</td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাংগঠনিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>অন্যান্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>নতুন নিয়োগ </span></div></td>

                            </tr>

                            <tr>
                                
                                <td class="tg-y698  type_1">অধ্যক্ষ</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $prin_mot=$madrasah_output['prin_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $prin_shang=$madrasah_output['prin_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $prin_other=$madrasah_output['prin_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $prin_new=$madrasah_output['prin_new'] ?>
                                </td>    
                            </tr>
                           

                            <tr>
                               
                                <td class="tg-y698">উপাধ্যক্ষ</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $v_prin_mot=$madrasah_output['v_prin_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $v_prin_shang=$madrasah_output['v_prin_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $v_prin_other=$madrasah_output['v_prin_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $v_prin_new=$madrasah_output['v_prin_new'] ?>
                                </td>    
                            </tr>
                          
                            <tr>
                              
                                <td class="tg-y698">মুহাদ্দিস/মুফাসসির</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $muhaddis_mot=$madrasah_output['muhaddis_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $muhaddis_shang=$madrasah_output['muhaddis_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $muhaddis_other=$madrasah_output['muhaddis_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $muhaddis_new=$madrasah_output['muhaddis_new'] ?>
                                </td>    
                            </tr>
                         
                            <tr>
                                
                                <td class="tg-y698">পীর-মাশায়েখ</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $pir_mot=$madrasah_output['pir_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $pir_shang=$madrasah_output['pir_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $pir_other=$madrasah_output['pir_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $pir_new=$madrasah_output['pir_new'] ?>
                                </td>    
                            </tr>
                            <tr>
                                
                                <td class="tg-y698">লেকচারার (অনার্স)</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $lec_mot=$madrasah_output['lec_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $lec_shang=$madrasah_output['lec_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $lec_other=$madrasah_output['lec_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $lec_new=$madrasah_output['lec_new'] ?>
                                </td>    
                                
                            </tr>
                            <tr>
                                
                                <td class="tg-y698">আরবি প্রভাষক</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $prova_mot=$madrasah_output['prova_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $prova_shang=$madrasah_output['prova_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $prova_other=$madrasah_output['prova_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $prova_new=$madrasah_output['prova_new'] ?>
                                </td>    
                                
                            </tr>
                           
                            <tr>
                             
                                <td class="tg-y698"> সুপার</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $super_mot=$madrasah_output['super_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $super_shang=$madrasah_output['super_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $super_other=$madrasah_output['super_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $super_new=$madrasah_output['super_new'] ?>
                                </td>    
                                
                            </tr>
                            
                            <tr>
                               
                                <td class="tg-y698">ওয়ায়েজীন</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $wazin_mot=$madrasah_output['wazin_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $wazin_shang=$madrasah_output['wazin_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $wazin_other=$madrasah_output['wazin_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $wazin_new=$madrasah_output['wazin_new'] ?>
                                </td>    
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="tg-y698">সহকারী মৌলভী</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $moulovi_mot=$madrasah_output['moulovi_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $moulovi_shang=$madrasah_output['moulovi_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $moulovi_other=$madrasah_output['moulovi_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $moulovi_new=$madrasah_output['moulovi_new'] ?>
                                </td>    
                                
                            </tr>
                           
                            <tr>
                               
                                <td class="tg-y698">খতিব/ইমাম/মুয়াজ্জিন </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $khotib_mot=$madrasah_output['khotib_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $khotib_shang=$madrasah_output['khotib_shang'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $khotib_other=$madrasah_output['khotib_other'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $khotib_new=$madrasah_output['khotib_new'] ?>
                                </td>    
                               
                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
