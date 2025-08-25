<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রচার বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/publicity-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                           foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publicity-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="4"><b>জনশক্তি </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Publicity_জনশক্তি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2">প্রচার সম্পাদক আছে কিনা? </td>
                                <td class="tg-pwj7" colspan="4">প্রচার বিভাগের নিয়োজিত জনশক্তি</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span> হ্যাঁ</span></div></td>
                                <td class="tg-pwj7 "><div><span> না</span></div></td>
                                <td class="tg-pwj7" colspan=""> মোট জনশক্তির সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""> সদস্য সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">সাথী সংখ্যা </td>
                                <td class="tg-pwj7 ">কর্মী সংখ্যা</td>
                            </tr> 
                            <tr>
                                 <td class="tg-0pky  type_1">
                                <?php echo $shompadok_ache_kina = $publicity_manpower['shompadok_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_1">
                                <?php echo $publicity_manpower_row - $publicity_manpower['shompadok_ache_kina'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($publicity_manpower['shodossho']+$publicity_manpower['sathi']+$publicity_manpower['kormi']) ?>
                              </td>
                                 <td class="tg-0pky  type_1">
                                <?php echo $shodossho = $publicity_manpower['shodossho'] ?>
                                </td>
                                 <td class="tg-0pky  type_1">
                                <?php echo $sathi = $publicity_manpower['sathi'] ?>
                                </td>
                                 <td class="tg-0pky  type_1">
                                <?php echo $kormi = $publicity_manpower['kormi'] ?>
                                </td>
                               
                            </tr> 
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="6"><b>মিডিয়া এক্টিভিটিজ </b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Publicity_প্রচার বিভাগে অনলাইন এক্টিভিটিজ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2" colspan="2">মিডিয়ার ধরণ</td>
                                <td class="tg-pwj7" rowspan="2">মোট সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2">প্রেরিত নিউজ  </td>
                                <td class="tg-pwj7" rowspan="2"> প্রকাশিত নিউজ </td>
                                <td class="tg-pwj7" rowspan="2">কতটিতে প্রেরণ </td>
                                <td class="tg-pwj7" rowspan="2">কতটিতে প্রকাশ </td>
                                <td class="tg-pwj7" colspan="2">সাক্ষাৎকার </td>   
                            </tr>

                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>প্রদান </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রকাশিত </span></div></td>
                               
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1" rowspan="2">টিভি	</td>
                                <td class="tg-y698"> ইলেক্ট্রনিক মিডিয়া  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $tv_sat_total = $publicity_online_activity['tv_sat_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $tv_sat_prerito_news = $publicity_online_activity['tv_sat_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $tv_sat_prokashito_news = $publicity_online_activity['tv_sat_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $tv_sat_kototite_preron = $publicity_online_activity['tv_sat_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $tv_sat_kototite_prokash = $publicity_online_activity['tv_sat_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $tv_sat_prodan = $publicity_online_activity['tv_sat_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $tv_sat_prokashito = $publicity_online_activity['tv_sat_prokashito'] ?>
                                </td>
                            </tr>
                                <td class="tg-y698" >অনলাইন	মিডিয়া </td>
                                
                                <td class="tg-0pky  type_1">
                                <?php echo $tv_online_total = $publicity_online_activity['tv_online_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $tv_online_prerito_news = $publicity_online_activity['tv_online_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $tv_online_prokashito_news = $publicity_online_activity['tv_online_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $tv_online_kototite_preron = $publicity_online_activity['tv_online_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $tv_online_kototite_prokash = $publicity_online_activity['tv_online_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $tv_online_prodan = $publicity_online_activity['tv_online_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $tv_online_prokashito = $publicity_online_activity['tv_online_prokashito'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698" rowspan="2"> পত্রিকা </td>
                                <td class="tg-y698"> জাতীয়  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $potrika_jatio_total = $publicity_online_activity['potrika_jatio_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $potrika_jatio_prerito_news = $publicity_online_activity['potrika_jatio_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $potrika_jatio_prokashito_news = $publicity_online_activity['potrika_jatio_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $potrika_jatio_kototite_preron = $publicity_online_activity['potrika_jatio_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $potrika_jatio_kototite_prokash = $publicity_online_activity['potrika_jatio_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $potrika_jatio_prodan = $publicity_online_activity['potrika_jatio_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $potrika_jatio_prokashito = $publicity_online_activity['potrika_jatio_prokashito'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আঞ্চলিক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $potrika_ancholik_total = $publicity_online_activity['potrika_ancholik_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $potrika_ancholik_prerito_news = $publicity_online_activity['potrika_ancholik_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $potrika_ancholik_prokashito_news = $publicity_online_activity['potrika_ancholik_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $potrika_ancholik_kototite_preron = $publicity_online_activity['potrika_ancholik_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $potrika_ancholik_kototite_prokash = $publicity_online_activity['potrika_ancholik_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $potrika_ancholik_prodan = $publicity_online_activity['potrika_ancholik_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $potrika_ancholik_prokashito = $publicity_online_activity['potrika_ancholik_prokashito'] ?>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">অনলাইন	 </td>

                                <td class="tg-y698"> জাতীয় </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $online_jatio_total = $publicity_online_activity['online_jatio_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $online_jatio_prerito_news = $publicity_online_activity['online_jatio_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $online_jatio_prokashito_news = $publicity_online_activity['online_jatio_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $online_jatio_kototite_preron = $publicity_online_activity['online_jatio_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $online_jatio_kototite_prokash = $publicity_online_activity['online_jatio_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $online_jatio_prodan = $publicity_online_activity['online_jatio_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $online_jatio_prokashito = $publicity_online_activity['online_jatio_prokashito'] ?>
                                </td>
                            </tr>
                            </tr>

                                <td class="tg-y698"> আঞ্চলিক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $online_ancholik_total = $publicity_online_activity['online_ancholik_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $online_ancholik_prerito_news = $publicity_online_activity['online_ancholik_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $online_ancholik_prokashito_news = $publicity_online_activity['online_ancholik_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $online_ancholik_kototite_preron = $publicity_online_activity['online_ancholik_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $online_ancholik_kototite_prokash = $publicity_online_activity['online_ancholik_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $online_ancholik_prodan = $publicity_online_activity['online_ancholik_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $online_ancholik_prokashito = $publicity_online_activity['online_ancholik_prokashito'] ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-y698" colspan="2" >শাখার ফেইসবুক পেইজ </td> 

                                <td class="tg-0pky  type_1">
                                <?php echo $facebook_total = $publicity_online_activity['facebook_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $facebook_prerito_news = $publicity_online_activity['facebook_prerito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $facebook_prokashito_news = $publicity_online_activity['facebook_prokashito_news'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $facebook_kototite_preron = $publicity_online_activity['facebook_kototite_preron'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $facebook_kototite_prokash = $publicity_online_activity['facebook_kototite_prokash'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $facebook_prodan = $publicity_online_activity['facebook_prodan'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $facebook_prokashito = $publicity_online_activity['facebook_prokashito'] ?>
                                </td>
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>শাখার পরিচালিত অনলাইন পোর্টাল সংক্রান্ত   </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Publicity_শাখার পরিচালিত অনলাইন নিউজ মিডিয়া সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2" >শাখার পোর্টাল আছে কিনা?</td>
                                <td class="tg-pwj7" colspan="2">নিবন্ধনকৃত কিনা?</td>
                                <td class="tg-pwj7" rowspan="2">নিয়োজিত জনশক্তি সংখ্যা </td>
                                <td class="tg-pwj7" rowspan="2">পোস্টকৃত নিউজ সংখ্যা </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>হ্যাঁ </span></div></td>
                                <td class="tg-pwj7 "><div><span>না </span></div></td>
                                <td class="tg-pwj7 "><div><span>হ্যাঁ </span></div></td>
                                <td class="tg-pwj7 "><div><span>না </span></div></td>
                               
                            </tr>
                            <tr>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $portal_ache_kina = $publicity_shakhar_online_news_media['portal_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $publicity_shakhar_row - $publicity_shakhar_online_news_media['portal_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $nibondhon_krito_kina = $publicity_shakhar_online_news_media['nibondhon_krito_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $publicity_shakhar_row - $publicity_shakhar_online_news_media['nibondhon_krito_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $niyojito_jonoshongkha = $publicity_shakhar_online_news_media['niyojito_jonoshongkha'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $post_krito_news = $publicity_shakhar_online_news_media['post_krito_news'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2" >পোর্টালের ফেসবুক পেজ আছে কিনা? </td>
                                <td class="tg-pwj7" colspan="2">ভেরিফাইড কিনা?</td>
                                <td class="tg-pwj7" rowspan="2">লাইক সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2">ফলোয়ার সংখ্যা</td>
                            </tr>
                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>হ্যাঁ </span></div></td>
                                <td class="tg-pwj7 "><div><span>না </span></div></td>
                                <td class="tg-pwj7 "><div><span>হ্যাঁ </span></div></td>
                                <td class="tg-pwj7 "><div><span>না </span></div></td>
                          </tr>
                            <tr>
                                <td class="tg-0pky  type_7">
                                 <?php echo $page_ache_kina = $publicity_shakhar_online_news_media['page_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $publicity_shakhar_row - $publicity_shakhar_online_news_media['page_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $fb_varrified_kina = $publicity_shakhar_online_news_media['fb_varrified_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $publicity_shakhar_row - $publicity_shakhar_online_news_media['fb_varrified_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $like = $publicity_shakhar_online_news_media['like'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $follower = $publicity_shakhar_online_news_media['follower'] ?>
                                </td>
                            </tr>
                             <tr>
                                <td class="tg-pwj7" colspan="2" >পোর্টাল ইউটিউব চ্যানলে আছে কিনা?(হ্যাঁ/না)</td>
                                <td class="tg-pwj7" colspan="2">ভেরিফাইড কিনা?</td>
                                <td class="tg-pwj7" rowspan='2' colspan="2">সাবস্ক্রাইবার সংখ্যা</td>
                            </tr>
                            <tr>
                            <td class="tg-pwj7 "><div><span>হ্যাঁ </span></div></td>
                            <td class="tg-pwj7 "><div><span>না </span></div></td>
                            <td class="tg-pwj7 "><div><span>হ্যাঁ </span></div></td>
                            <td class="tg-pwj7 "><div><span>না </span></div></td>
                           </tr>
                            <tr>
                                <td class="tg-0pky  type_7">
                                 <?php echo $youtube_channel_ache_kina = $publicity_shakhar_online_news_media['youtube_channel_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $publicity_shakhar_row - $publicity_shakhar_online_news_media['youtube_channel_ache_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $yt_varrified_kina = $publicity_shakhar_online_news_media['yt_varrified_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7">
                                 <?php echo $publicity_shakhar_row - $publicity_shakhar_online_news_media['yt_varrified_kina'] ?>
                                </td>
                                 <td class="tg-0pky  type_7" colspan="2">
                                 <?php echo $subscriber = $publicity_shakhar_online_news_media['subscriber'] ?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>	সভাসমূহ  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Publicity_সভাসমূহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ </td>
                                <td class="tg-pwj7" >সংখ্যা  </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >গড় উপস্থিতি  </td>
                            
                            </tr>
                            
                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>বিভাগীয় জনশক্তিদের নিয়ে নিয়মিত বৈঠক</span></div></td>
                                <td class="tg-0pky ">
                                <?php echo $bivagio_jonoshokti_num = $publicity_shova_shomuho['bivagio_jonoshokti_num'] ?>
                                </td>
                                <td class="tg-0pky ">
                                <?php echo $bivagio_jonoshokti_pre = $publicity_shova_shomuho['bivagio_jonoshokti_pre'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($bivagio_jonoshokti_num!=0 && $bivagio_jonoshokti_pre!=0)?$bivagio_jonoshokti_pre/$bivagio_jonoshokti_num:0,2)?>
                                </td>
                                              
                                              
                            </tr>
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span>বিভাগীয় জনশক্তিদের নিয়ে জরুরি বৈঠক </span></div></td>

                            <td class="tg-0pky ">
                                <?php echo $bggth_num = $publicity_shova_shomuho['bggth_num'] ?>
                                </td>
                                <td class="tg-0pky ">
                                <?php echo $bggth_pre = $publicity_shova_shomuho['bggth_pre'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($bggth_num!=0 && $bggth_pre!=0)?$bggth_pre/$bggth_num:0,2)?>
                                </td>
                                          
                           
                            </tr>
                        <!--     <tr>
                            
                            <td class="tg-pwj7 "><div><span>প্রশিক্ষণ কর্মশালা</span></div></td>
                            <td class="tg-0pky ">
                                <?php echo $training_workshop_num = $publicity_shova_shomuho['training_workshop_num'] ?>
                                </td>
                                <td class="tg-0pky ">
                                <?php echo $training_workshop_pre = $publicity_shova_shomuho['training_workshop_pre'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($training_workshop_num!=0 && $training_workshop_pre!=0)?$training_workshop_pre/$training_workshop_num:0,2)?>
                                </td>
                                          
                           
                            </tr> -->
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span> মতবিনিময়</span></div></td>
                         
                            <td class="tg-0pky ">
                                <?php echo $motobinimoy_num = $publicity_shova_shomuho['motobinimoy_num'] ?>
                                </td>
                                                <td class="tg-0pky ">
                                <?php echo $motobinimoy_pre = $publicity_shova_shomuho['motobinimoy_pre'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($motobinimoy_num!=0 && $motobinimoy_pre!=0)?$motobinimoy_pre/$motobinimoy_num:0,2)?>
                                </td>
                            </tr>
                        
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span>সংবাদ সম্মেলন</span></div></td>
                            <td class="tg-0pky ">
                                <?php echo $shong_shommelon_num = $publicity_shova_shomuho['shong_shommelon_num'] ?>
                                </td>
                                                <td class="tg-0pky ">
                                <?php echo $shong_shommelon_pre = $publicity_shova_shomuho['shong_shommelon_pre'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($shong_shommelon_num!=0 && $shong_shommelon_pre!=0)?$shong_shommelon_pre/$shong_shommelon_num:0,2)?>
                                </td>                  
                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
