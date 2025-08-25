<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'স্পোর্টস বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/sports-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/sports-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                                 <td class="tg-pwj7" colspan="6"><b>স্পোর্টস ক্লাব</b></td>
                                                 <td class="tg-pwj7" colspan="">
                                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Sports_স্পোর্টস ক্লাব.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                                </td>
                                             </tr>           
                                           
                                            <tr>
                                                <td class="tg-pwj7" colspan="">ক্লাব সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">রেজিস্টার্ড কতটি  </td>
                                                <td class="tg-pwj7" colspan="">কমিটি আছে কতটিতে</td>
                                                <td class="tg-pwj7" colspan="">নিয়োজিক জনশক্তি</td>
                                                <td class="tg-pwj7" colspan="">খেলোয়াড় সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">প্রোগ্রাম সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">অংশগ্রহণকারী </td>
                                            </tr>
                         
                                            <tr>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $club_num = $sports_club['club_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $registard_num = $sports_club['registard_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $committee_te_koto_ti = $sports_club['committee_te_koto_ti'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $niyojito_manpower = $sports_club['niyojito_manpower'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $player_num = $sports_club['player_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $program_num = $sports_club['program_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $attendence = $sports_club['attendence'] ?>
                                            </td>
                                        
                                            </tr>
                                           
                         
                                         </table>
                                         <table class="tg table table-header-rotated" id="testTable2">
                                             
                                             <tr>
                                                 <td class="tg-pwj7" colspan="5"><b>টিমসংক্রান্ত </b></td>
                                                 <td class="tg-pwj7" colspan="">
                                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Sports_টিমসংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                                </td>
                                             </tr>           
                                           
                                            <tr>
                                                <td class="tg-pwj7" colspan="">মাঠ সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">টিম সংখ্যা  </td>
                                                <td class="tg-pwj7" colspan="">জনশক্তি সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">কতটি মাঠে টিম নেই</td>
                                                <td class="tg-pwj7" colspan="">মাঠ কেন্দ্রিক কর্মসূচী বাস্তবায়ন কতটি?</td>
                                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                            </tr>
                         
                                            <tr>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $math_num = $sports_team_number['math_num'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $team_num = $sports_team_number['team_num'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $manpower_num = $sports_team_number['manpower_num'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $mathe_team_kototi = $sports_team_number['mathe_team_kototi'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $math_kendrik_kormo = $sports_team_number['math_kendrik_kormo'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $present = $sports_team_number['present'] ?>
                                                </td>
                                            </tr>
                                            
                         
                                         </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan='6'><b> স্বাস্থ্য সচেতনতা </b> </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Sports_স্বাস্থ্য সচেতনতা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='2'> নিয়মিত হাঁটা ও শরীর চর্চা</td>
                                <td class="tg-pwj7" colspan='2'>সচেতনতামূলক প্রোগ্রাম </td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি ফার্স্ট  এইড কোর্স হয়েছে? </span></div></td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি সচেতনতামূলক ভিডিও তৈরি?  </span></div></td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি সচেতনতামূলক স্টিকার তৈরি?   </span></div></td>
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">গ্রুপ সংখ্যা </td>
                                <td class="tg-pwj7  type_1">
                                    অংশগ্রহণকারী
                                </td>
                                <td class="tg-pwj7 type_1">গ্রুপ সংখ্যা </td>
                                <td class="tg-pwj7  type_2">
                                    অংশগ্রহণকারী
                                </td>
                              
                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_10">
                                    <?php echo $hatahati_group_num = $sports_sastho_shochetonota['hatahati_group_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $hatahati_attendance = $sports_sastho_shochetonota['hatahati_attendance'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shochetonota_num = $sports_sastho_shochetonota['shochetonota_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shochetonota_attendance = $sports_sastho_shochetonota['shochetonota_attendance'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kototi_fast_aid = $sports_sastho_shochetonota['kototi_fast_aid'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kototi_shochetonotonota_video = $sports_sastho_shochetonota['kototi_shochetonotonota_video'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kototi_shochetonotonota_sticker = $sports_sastho_shochetonota['kototi_shochetonotonota_sticker'] ?>
                                </td>
                               
                              
                            </tr>
                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan='5'><b> যোগাযোগ </b> </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Sports_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"> ক্রম</td>
                                <td class="tg-pwj7"> শাখা আইডি</td>
                                <td class="tg-pwj7"> ক্রীড়া ব্যক্তিত্বের নাম </td>
                                <td class="tg-pwj7 "><div><span> খেলার নাম </span></div></td>
                                <td class="tg-pwj7 "><div><span> ধরন  </span></div></td>
                                <td class="tg-pwj7 "><div><span> কতবার  </span></div></td>
                               
                            </tr>

                            <?php 
                                $i=0;
                            foreach($sports_contact->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['kria_bektir_nam'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['khelar_nam'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['dhoron'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['kotobar'] ?>      
                                    </td>
                                </tr>

                        <?php } ?>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Sports_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$sports_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$sports_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$sports_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$sports_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$sports_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$sports_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$sports_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$sports_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
