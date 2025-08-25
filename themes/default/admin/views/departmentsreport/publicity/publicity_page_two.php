<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রচার বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/publicity-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/publicity-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                           foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publicity-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Publicity_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_central_s=$publicity_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$publicity_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$publicity_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$publicity_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$publicity_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$publicity_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$publicity_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$publicity_training_program['kormoshala_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>যোগাযোগ </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Publicity_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"  colspan="3">ধরণ</td>
                                <td class="tg-pwj7" >মোট সংখ্যা  </td>
                                <td class="tg-pwj7" >শাখা সভাপতি/সেক্রেটারির যোগাযোগ </td>
                                <td class="tg-pwj7" >শাখার প্রচার সম্পাদকের যোগাযোগ </td>  
                                
                            </tr>
                          
                            <tr>
                                <td class="tg-y698 type_1" colspan="3"> পত্রিকার সম্পাদক</td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($publicity_contact['potrikar_shompadok_shovapoti'] +$publicity_contact['potrikar_shompadok_prochar']) ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $potrikar_shompadok_shovapoti = $publicity_contact['potrikar_shompadok_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                              <?php echo $potrikar_shompadok_prochar = $publicity_contact['potrikar_shompadok_prochar'] ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698" colspan="3">মিডিয়া ব্যক্তিত্ব </td>
                                <td class="tg-0pky">
                                <?php echo ($publicity_contact['midea_bekti_shovapoti'] +$publicity_contact['midea_bekti_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $midea_bekti_shovapoti = $publicity_contact['midea_bekti_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $midea_bekti_prochar = $publicity_contact['midea_bekti_prochar'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="6">টিভি </td>
                                <td class="tg-y698" rowspan='3'>ইলেক্ট্রনিক</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td> 
                                <td class="tg-0pky"> 
                                <?php echo ($publicity_contact['tv_satelite_jela_shovapoti'] +$publicity_contact['tv_satelite_jela_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_satelite_jela_shovapoti = $publicity_contact['tv_satelite_jela_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_satelite_jela_prochar = $publicity_contact['tv_satelite_jela_prochar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['tv_satelite_stuff_shovapoti'] +$publicity_contact['tv_satelite_stuff_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_satelite_stuff_shovapoti = $publicity_contact['tv_satelite_stuff_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_satelite_stuff_prochar = $publicity_contact['tv_satelite_stuff_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['tv_satelite_thana_shovapoti'] +$publicity_contact['tv_satelite_thana_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_satelite_thana_shovapoti = $publicity_contact['tv_satelite_thana_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_satelite_thana_prochar = $publicity_contact['tv_satelite_thana_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan='3'>অনলাইন</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php echo ($publicity_contact['tv_online_jela_shovapoti'] +$publicity_contact['tv_online_jela_prochar']) ?>
                               
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_online_jela_shovapoti = $publicity_contact['tv_online_jela_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_online_jela_prochar = $publicity_contact['tv_online_jela_prochar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['tv_online_stuff_shovapoti'] +$publicity_contact['tv_online_stuff_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_online_stuff_shovapoti = $publicity_contact['tv_online_stuff_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_online_stuff_prochar = $publicity_contact['tv_online_stuff_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['tv_online_thana_shovapoti'] +$publicity_contact['tv_online_thana_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_online_thana_shovapoti = $publicity_contact['tv_online_thana_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_online_thana_prochar = $publicity_contact['tv_online_thana_prochar'] ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-y698" rowspan="6">জাতীয় পত্রিকা </td>
                                <td class="tg-y698" rowspan='3'>প্রিন্টিং</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php echo ($publicity_contact['jatio_printing_jela_shovapoti'] +$publicity_contact['jatio_printing_jela_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $jatio_printing_jela_shovapoti = $publicity_contact['jatio_printing_jela_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jatio_printing_jela_prochar = $publicity_contact['jatio_printing_jela_prochar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['jatio_printing_stuff_shovapoti'] +$publicity_contact['jatio_printing_stuff_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $jatio_printing_stuff_shovapoti = $publicity_contact['jatio_printing_stuff_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jatio_printing_stuff_prochar = $publicity_contact['jatio_printing_stuff_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['jatio_printing_thana_shovapoti'] +$publicity_contact['jatio_printing_thana_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $jatio_printing_thana_shovapoti = $publicity_contact['jatio_printing_thana_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jatio_printing_thana_prochar = $publicity_contact['jatio_printing_thana_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan='3'>অনলাইন</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php echo ($publicity_contact['jatio_online_jela_shovapoti'] +$publicity_contact['jatio_online_jela_prochar']) ?>
                           
                                </td>
                                <td class="tg-0pky">
                               <?php echo $jatio_online_jela_shovapoti = $publicity_contact['jatio_online_jela_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jatio_online_jela_prochar = $publicity_contact['jatio_online_jela_prochar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['jatio_online_stuff_shovapoti'] +$publicity_contact['jatio_online_stuff_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $jatio_online_stuff_shovapoti = $publicity_contact['jatio_online_stuff_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jatio_online_stuff_prochar = $publicity_contact['jatio_online_stuff_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['jatio_online_thana_shovapoti'] +$publicity_contact['jatio_online_thana_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $jatio_online_thana_shovapoti = $publicity_contact['jatio_online_thana_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jatio_online_thana_prochar = $publicity_contact['jatio_online_thana_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="5">আঞ্চলিক পত্রিকা </td>
                                <td class="tg-y698" rowspan='3'>প্রিন্টিং</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php echo ($publicity_contact['ancholik_printing_jela_shovapoti'] +$publicity_contact['ancholik_printing_jela_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ancholik_printing_jela_shovapoti = $publicity_contact['ancholik_printing_jela_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $ancholik_printing_jela_prochar = $publicity_contact['ancholik_printing_jela_prochar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['ancholik_printing_stuff_shovapoti'] +$publicity_contact['ancholik_printing_stuff_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ancholik_printing_stuff_shovapoti = $publicity_contact['ancholik_printing_stuff_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $ancholik_printing_stuff_prochar = $publicity_contact['ancholik_printing_stuff_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['ancholik_printing_thana_shovapoti'] +$publicity_contact['ancholik_printing_thana_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ancholik_printing_thana_shovapoti = $publicity_contact['ancholik_printing_thana_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $ancholik_printing_thana_prochar = $publicity_contact['ancholik_printing_thana_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan='2'>অনলাইন</td>
                                <td class="tg-y698">জেলা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                <?php echo ($publicity_contact['ancholik_online_jela_shovapoti'] +$publicity_contact['ancholik_online_jela_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ancholik_online_jela_shovapoti = $publicity_contact['ancholik_online_jela_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $ancholik_online_jela_prochar = $publicity_contact['ancholik_online_jela_prochar'] ?>
                                </td>
                                
                            </tr>
                          
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['ancholik_online_stuff_shovapoti'] +$publicity_contact['ancholik_online_stuff_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ancholik_online_stuff_shovapoti = $publicity_contact['ancholik_online_stuff_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $ancholik_online_stuff_prochar = $publicity_contact['ancholik_online_stuff_prochar'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698" colspan='3'>কলামিস্ট</td>
                                <td class="tg-0pky">
                                 <?php echo ($publicity_contact['ancholik_online_thana_shovapoti'] +$publicity_contact['ancholik_online_thana_prochar']) ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ancholik_online_thana_shovapoti = $publicity_contact['ancholik_online_thana_shovapoti'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $ancholik_online_thana_prochar = $publicity_contact['ancholik_online_thana_prochar'] ?>
                                </td>
                            </tr>    

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>আমাদের সংগ্রহ  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Publicity_আমাদের সংগ্রহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"  rowspan="2">সংগ্রহের ধরণ</td>
                                <td class="tg-y698"colspan="" >শাখার সংগ্রহ  </td>
                                <td class="tg-y698"colspan="" >কেন্দ্রে প্রেরণ </td>
                                
                             </tr>

                            
                            <tr>
                               
                                <td class="tg-y698  type_1">  মোট সংখ্যা</td> 
                                
                                <td class="tg-y698  type_1">  মোট সংখ্যা</td> 
                                
                                 
                            </tr>


                            <tr>
                                <td class="tg-y698" colspan="">ভিডিও </td>
                               
                                
                                <td class="tg-0pky">
                                <?php echo $video_shakar_total = $publicity_amader_collection['video_shakar_total'] ?>
                               </td>
                             
                                <td class="tg-0pky">
                               <?php echo $video_kendrer_total = $publicity_amader_collection['video_kendrer_total'] ?>
                                </td>
                              
                            </tr>

                            <tr>
                                <td class="tg-y698" colspan="">ছবি </td>
                              
                                <td class="tg-0pky">
                                <?php echo $photo_shakar_total = $publicity_amader_collection['photo_shakar_total'] ?>
                               </td>
                              
                                <td class="tg-0pky">
                               <?php echo $photo_kendrer_total = $publicity_amader_collection['photo_kendrer_total'] ?>
                                </td>
                            </tr>
                            <tr>
                                    <td class="tg-y698" colspan="">বিশেষ নিউজ </td>
                                   
                                    <td class="tg-0pky">
                                    <?php echo $news_shakar_total = $publicity_amader_collection['news_shakar_total'] ?>
                                    </td>
                                   
                                    <td class="tg-0pky">
                                    <?php echo $news_kendrer_total = $publicity_amader_collection['news_kendrer_total'] ?>
                                    </td>

                            <tr>
                                <td class="tg-y698" colspan="">মোট </td>
                               
                                <td class="tg-0pky">
                                <?php echo $video_shakar_total+$photo_shakar_total+$news_shakar_total ?>
                               </td>
                            
                                <td class="tg-0pky">
                                <?php echo $video_kendrer_total+$photo_kendrer_total+$news_kendrer_total; ?>
                                </td>
                            </tr> 

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>সৌজন্য প্রদান </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Publicity_সৌজন্য প্রদান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">যাদেরকে দেয়া হয়েছে </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                               
                                <td class="tg-pwj7" colspan="">কতবার </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " ><div><span>সম্পাদক</span></div></td>
                                <td class="tg-0pky ">
								<?php echo $shompadok_num = $publicity_shoujonno['shompadok_num'] ?>
								</td>
                               
                                <td class="tg-0pky ">
								<?php echo $shompadok_bar = $publicity_shoujonno['shompadok_bar'] ?>
								</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " ><div><span>সাংবাদিক</span></div></td>
                                <td class="tg-0pky ">
								<?php echo $shangbadik_num = $publicity_shoujonno['shangbadik_num'] ?>
								</td>
                             
                                <td class="tg-0pky ">
								<?php echo $shangbadik_bar = $publicity_shoujonno['shangbadik_bar'] ?>
								</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " ><div><span>কলামিস্ট</span></div></td>
                                <td class="tg-0pky ">
								<?php echo $collamist_num = $publicity_shoujonno['collamist_num'] ?>
								</td>
                            
                                <td class="tg-0pky ">
								<?php echo $collamist_bar = $publicity_shoujonno['collamist_bar'] ?>
								</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " ><div><span>মিডিয়া ব্যক্তিত্ব</span></div></td>
                                <td class="tg-0pky ">
								<?php echo $media_bektitto_num = $publicity_shoujonno['media_bektitto_num'] ?>
								</td>
                            
                                <td class="tg-0pky ">
								<?php echo $media_bektitto_bar = $publicity_shoujonno['media_bektitto_bar'] ?>
								</td>
                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
