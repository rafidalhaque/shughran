<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'গবেষণা বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/research-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/research-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="2"><b> কাঠামো </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Research_কাঠামো.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2">ধরন </td>
                                <td class="tg-pwj7"> সংখ্যা/তথ্য </td>
                            </tr>
                            <tr>
                               <td class="tg-0pky tg-pwj7" rowspan='2'> শাখায় গবেষণা সম্পাদক আছে কি না? </td>
                               <td class="tg-pwj7">হ্যাঁ </td>
                               <td class="tg-0pky"><?php echo $gobeshona_shikkha_kathamo['ghobeshona_shompond'] ?> </td>
                            </tr>
                            <tr>
                               <td class="tg-pwj7">না </td>
                               <td class="tg-0pky"><?php echo  $gobeshona_shikkha_kathamo_row - $gobeshona_shikkha_kathamo['ghobeshona_shompond'] ?> </td>
                            </tr>
                            <tr>
                               <td class="tg-0pky tg-pwj7" colspan="2"> বিভাগের  অধীনে কতটি গবেষণা স্কুল প্রতিষ্ঠিত আছে? (যদি থাকে) </td>
                               <td class="tg-0pky"><?php echo $gobeshona_shikkha_kathamo['school'] ?> </td>
                            </tr>  
                            <tr>
                               <td class="tg-0pky tg-pwj7" colspan="2"> এ বছর বৃদ্ধি হয়েছে কতটি স্কুল? </td>
                               <td class="tg-0pky"><?php echo $gobeshona_shikkha_kathamo['school_bri'] ?> </td>
                            </tr>
                            <tr>
                               <td class="tg-0pky tg-pwj7" colspan="2"> নলেজ মুভমেন্ট প্রজেক্টে সম্পৃক্ত জনশক্তি সংখ্যা </td>
                               <td class="tg-0pky"><?php echo $gobeshona_shikkha_kathamo['knowledge_movement'] ?> </td>
                            </tr>  
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>গবেষণা বিভাগে সম্পৃক্ত জনশক্তি </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Research_গবেষণা বিভাগে সম্পৃক্ত জনশক্তি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">সদস্য </td>
                                <td class="tg-0pky"><?php echo $shodossho = $gobeshona_shomprikto_jonoshokti['shodossho'] ?> </td>
                                <td class="tg-pwj7">সাথী  </td>
                                <td class="tg-0pky"><?php echo $sathi = $gobeshona_shomprikto_jonoshokti['sathi'] ?> </td> </td>
                                <td class="tg-pwj7">কর্মী </td>
                                <td class="tg-0pky"><?php echo $kormi = $gobeshona_shomprikto_jonoshokti['kormi'] ?> </td> </td>
                            </tr> 

                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>নিয়মিত প্রোগ্রাম </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Research_নিয়মিত প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                        
                                <td class="tg-pwj7" rowspan="">ধরন </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা   </td>
                                <td class="tg-pwj7" colspan="">উপস্থিত </td>
                                <td class="tg-pwj7" colspan="">গড়</td>
                           
                            </tr>
                          
                            <tr>
                                <td class="tg-y698 type_1"> সাপ্তাহিক ক্লাস 	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $week_class_n = $gobeshona_regular_program['week_class_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $week_class_p = $gobeshona_regular_program['week_class_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($week_class_p!=0)?$week_class_p/$week_class_n:0,2)?>
                                </td>
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">দারসুল কুরআন </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $dars_quran_n = $gobeshona_regular_program['dars_quran_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dars_quran_p = $gobeshona_regular_program['dars_quran_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dars_quran_p!=0)?$dars_quran_p/$dars_quran_n:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">উন্মুক্ত ক্লাস  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $open_class_n = $gobeshona_regular_program['open_class_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $open_class_p = $gobeshona_regular_program['open_class_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($open_class_p!=0)?$open_class_p/$open_class_n:0,2)?>
                                </td>
                              
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">মতবিনিময় সভা  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $motobinimoy_n = $gobeshona_regular_program['motobinimoy_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $motobinimoy_p = $gobeshona_regular_program['motobinimoy_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($motobinimoy_p!=0)?$motobinimoy_p/$motobinimoy_n:0,2)?>
                                </td>
                              
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">দায়িত্বশীল বৈঠক  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $dayittoshil_n = $gobeshona_regular_program['dayittoshil_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dayittoshil_p = $gobeshona_regular_program['dayittoshil_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dayittoshil_p!=0)?$dayittoshil_p/$dayittoshil_n:0,2)?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">ইনডোর সেমিনার  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $indoor_n = $gobeshona_regular_program['indoor_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $indoor_p = $gobeshona_regular_program['indoor_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($indoor_p!=0)?$indoor_p/$indoor_n:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ব্যবহারিক ক্লাস </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $beboharik_n = $gobeshona_regular_program['beboharik_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $beboharik_p = $gobeshona_regular_program['beboharik_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($beboharik_p!=0)?$beboharik_p/$beboharik_n:0,2)?>
                                </td>                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ভিজ্যুয়াল ক্লাস </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $visual_n = $gobeshona_regular_program['visual_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $visual_p = $gobeshona_regular_program['visual_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($visual_p!=0)?$visual_p/$visual_n:0,2)?>
                                </td>                          
                            </tr>
                            <tr>
                                <td class="tg-y698">মিলনমেলা</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $milonmela_n = $gobeshona_regular_program['milonmela_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $milonmela_p = $gobeshona_regular_program['milonmela_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($milonmela_p!=0)?$milonmela_p/$milonmela_n:0,2)?>
                                </td>
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">সংবাদ বিশ্লেষণ </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shongbad_n = $gobeshona_regular_program['shongbad_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shongbad_p = $gobeshona_regular_program['shongbad_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shongbad_p!=0)?$shongbad_p/$shongbad_n:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">পুরস্কার বিতরণী অনুষ্ঠান </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $puroshkar_n = $gobeshona_regular_program['puroshkar_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $puroshkar_p = $gobeshona_regular_program['puroshkar_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($puroshkar_p!=0)?$puroshkar_p/$puroshkar_n:0,2)?>
                                </td>
                            
                            </tr>
                           
                            <tr>
                                <td class="tg-y698">চা-চক্র </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $cha_n = $gobeshona_regular_program['cha_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $cha_p = $gobeshona_regular_program['cha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($cha_p!=0)?$cha_p/$cha_n:0,2)?>
                                </td>
                            </tr>  
                            
                            <tr>

                                <td class="tg-y698"> অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $other_n = $gobeshona_regular_program['other_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $other_p = $gobeshona_regular_program['other_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($other_p!=0)?$other_p/$other_n:0,2)?>
                                </td>
                                                           
                            </tr>
                            
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>বিশেষ প্রোগ্রাম </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Research_বিশেষ প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ধরণ </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">অংশগ্রহণকারী সংখ্যা   </td>
                               
                           
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">  ওয়ার্কশপ 	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $workshop_n = $gobeshona_bishesh_program['workshop_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $workshop_attendence = $gobeshona_bishesh_program['workshop_attendence'] ?>
                                </td>
                              
                                
                            </tr>

                            <tr>
                                <td class="tg-y698">সেমিনার/কনফারেন্স</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $seminer_n = $gobeshona_bishesh_program['seminer_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $seminer_attendence = $gobeshona_bishesh_program['seminer_attendence'] ?>
                                </td>                     
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাসফর   </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $tour_n = $gobeshona_bishesh_program['tour_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $tour_attendence = $gobeshona_bishesh_program['tour_attendence'] ?>
                                </td>
                                                             
                            </tr>
                            <tr>
                                <td class="tg-y698">বিদেশ সফর </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $bideshe_n = $gobeshona_bishesh_program['bideshe_n'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bideshe_attendence = $gobeshona_bishesh_program['bideshe_attendence'] ?>
                                </td>
                                                         
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Research_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ধরণ </td>
                            
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">টার্গেট গ্রুপ</td>
                           
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> ই-মেইল 	</td>
                                
                                <td class="tg-0pky  type_2">
                                <?php echo $emil_upb = $gobeshona_bivag_jogajog['emil_s'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $emil_upb = $gobeshona_bivag_jogajog['emil_tg'] ?>
                                </td>
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">এসএমএস  </td>
                               
                                <td class="tg-0pky  type_2">
                                <?php echo $sms_upb = $gobeshona_bivag_jogajog['sms_s'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sms_upb = $gobeshona_bivag_jogajog['sms_tg'] ?>
                                </td>
                            </tr>
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
