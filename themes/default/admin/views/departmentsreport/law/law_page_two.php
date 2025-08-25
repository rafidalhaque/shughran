<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'আইন বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/law-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/law-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/law-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'law_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> আইন বিভাগে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $law_stu_center_manpower_num = $law_summit['law_stu_center_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $law_stu_center_manpower_pre = $law_summit['law_stu_center_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_center_manpower_pre!=0 && $law_stu_center_manpower_num!=0 )?$law_stu_center_manpower_pre / $law_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $law_stu_center_general_num = $law_summit['law_stu_center_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $law_stu_center_general_pre = $law_summit['law_stu_center_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_center_general_pre!=0 && $law_stu_center_general_num!=0 )?$law_stu_center_general_pre / $law_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> আইন বিভাগে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky">
                                    <?php echo $law_stu_shakha_manpower_num = $law_summit['law_stu_shakha_manpower_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $law_stu_shakha_manpower_pre = $law_summit['law_stu_shakha_manpower_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_shakha_manpower_pre!=0 && $law_stu_shakha_manpower_num!=0 )?$law_stu_shakha_manpower_pre / $law_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky">
                                    <?php echo $law_stu_shakha_general_num = $law_summit['law_stu_shakha_general_num'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $law_stu_shakha_general_pre = $law_summit['law_stu_shakha_general_pre'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo  ($law_stu_shakha_general_pre!=0 && $law_stu_shakha_general_num!=0 )?$law_stu_shakha_general_pre / $law_stu_shakha_general_num:0 ?>
                                </td>
                            </tr>
                            
                    </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="10"><b>কারাগার সংক্রান্ত (গ্রেফতার)</b> </td>
                            <td class="tg-pwj7" colspan="5">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Law_কারাগার সংক্রান্ত (গ্রেফতার).xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                           
                                <!-- <td class="tg-pwj7" colspan="5"  style="text-align:center;">শুধু  <?php echo$report_info['year'] ; ?>  সালে গ্রেফতার  </td>
                                <td class="tg-pwj7" colspan="5" style="text-align:center;"> <?php echo$report_info['year'] -1; ?>  পর্যন্ত গ্রেফতার  </td> -->
                                
                                <td class="tg-pwj7" colspan="5"  style="text-align:center;">শুধু ২০২৫ সালে গ্রেফতার </td>
                                <td class="tg-pwj7" colspan="5" style="text-align:center;">২০২৪ পর্যন্ত গ্রেফতার </td>
                                
                                <td class="tg-pwj7" colspan="5" style="text-align:center;">বর্তমান কারাগারে  </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                            </tr>




                            <tr>
                              
                                <td class="tg-0pky  type_1">
                                <?php echo $t1_member = $law_karagar_greftar['t1_member'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $t1_sathi = $law_karagar_greftar['t1_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $t1_kormi = $law_karagar_greftar['t1_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $t1_shomorthok = $law_karagar_greftar['t1_shomorthok'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($t1_member+$t1_sathi+$t1_kormi+$t1_shomorthok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $t2_member = $law_karagar_greftar['t2_member'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $t2_sathi = $law_karagar_greftar['t2_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $t2_kormi = $law_karagar_greftar['t2_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $t2_shomorthok = $law_karagar_greftar['t2_shomorthok'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($t2_member+$t2_sathi+$t2_kormi+$t2_shomorthok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $t3_member = $law_karagar_greftar['t3_member'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $t3_sathi = $law_karagar_greftar['t3_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $t3_kormi = $law_karagar_greftar['t3_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $t3_shomorthok = $law_karagar_greftar['t3_shomorthok'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($t3_member+$t3_sathi+$t3_kormi+$t3_shomorthok) ?>
                                </td>
                                
                            </tr>
                 </table>
                 <table class="tg table table-header-rotated" id="testTable2">
                 <tr>
                    <td class="tg-pwj7" colspan="7"><b>আমাদের পক্ষ থেকে মামলা সংক্রান্ত</b> </td>
                    <td class="tg-pwj7" colspan="3">
                        <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Law_আমাদের পক্ষ থেকে মামলা সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                    </td>
                </tr>
                 <tr>
                   <td class="tg-pwj7">ক্রম</td>
                   <td class="tg-pwj7">শাখা আইডি </td>
                   <td class="tg-pwj7 "><div><span>মামলার নাম্বার </span></div></td>
                   <td class="tg-pwj7">তারিখ</td>
                   <td class="tg-pwj7 " ><div><span>বাদীর নাম </span></div></td>
                   <td class="tg-pwj7">আসামির সংখ্যা</td>
                   <td class="tg-pwj7 "><div><span>আসামির নাম ও পরিচয় </span></div></td>
                   
                   <td class="tg-pwj7 " ><div><span>রায় হয়েছে কিনা</span></div></td>
                   <td class="tg-pwj7 "><div><span>রায়ের ফলাফল </span></div></td>
                   <td class="tg-pwj7 "><div><span>বর্তমান অবস্থা </span></div></td>
           
               </tr>
              
            
               <?php 
                                $i=0;
                            foreach($law_amader_pokkhe_mamla->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['mamlar_number'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['tarikh'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['badir_name'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ashami_num'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ashami_porichoy'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ray_hoyeche'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['rayer_folafol'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['bortoman'] ?>       
                                    </td>
                                
                                </tr>

                        <?php } ?>

                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                <td class="tg-pwj7" colspan='5'><b>গুম, খুন, হামলা নির্যাতন বিষয়ে আমাদের পক্ষ থেকে পত্রিকায় প্রচারসংক্রান্ত :</b></td>
                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Law_গুম, খুন, হামলা নির্যাতন বিষয়ে আমাদের.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                        </tr>
                            
                    <tr>
                            <td class="tg-pwj7">ক্রম</td>
                            <td class="tg-pwj7">শাখা আইডি </td>
                            <td class="tg-pwj7" >ঘটনার তারিখ</td>
                            <td class="tg-pwj7 "><div><span>প্রচারের তারিখ </span></div></td>
                            <td class="tg-pwj7 "  ><div><span>পত্রিকার নাম</span></div></td>
                            
                            <td class="tg-pwj7 " ><div><span>যার/যাদের ব্যাপারে প্রচার </span></div></td>
                            <td class="tg-pwj7 " ><div><span>সাংবাদিক সম্মেলনে হয়েছে কিনা </span></div></td>
                    
                        </tr>
                        <?php 
                                $i=0;
                            foreach($law_gum_khun_hamla->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['ghotonar_tarikh'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['procharer_tarikh'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['potrikar_nam'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['jader_bepare_prochar'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['shong_shommelon'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>
                   
                </table>
                <table class="tg table table-header-rotated" id="testTable4">
                <tr>
                    <td class="tg-pwj7" colspan='5'><b>শাখার সংরক্ষণে মামলার নথি-সংক্রান্ত পরিসংখ্যান :</b></td>
                    <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Law_নথি-সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                </tr>
                
                    <tr>
                        <td class="tg-pwj7">ক্রম</td>
                        <td class="tg-pwj7">শাখা আইডি </td>
                        <td class="tg-pwj7"> মোট মামলা সংখ্যা</td>
            
                        <td class="tg-pwj7" ><div><span>ফরওয়ার্ডিং</span></div></td>
                        <td class="tg-pwj7"><div><span>এজহার </span></div></td>
                        <td class="tg-pwj7" ><div><span>চার্জশিট </span></div></td>
                        <td class="tg-pwj7" ><div><span>রায়ের কপি </span></div></td>
                        
                    </tr>
                    <?php 
                                $i=0;
                            foreach($law_shakhar_shongrokkhon->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['total_mamla'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['forwarding'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['ejhar'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['chargeshit'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['rayer_copy'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>

                </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
