<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
   
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বিতর্ক বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/bitorko-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/bitorko-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bitorko-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                   
                    <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Debate_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$debate_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$debate_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$debate_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$debate_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$debate_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$debate_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$debate_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$debate_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                        <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="4"><b>প্রোগ্রামসমূহ</b></td>
                            <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Debate_প্রোগ্রামসমূহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        <tr>
                        <tr>
                                <td class="tg-pwj7 "><div><span>প্রোগ্রাম </span></div></td>
                                <td class="tg-pwj7 "><div><span>ক্যাটাগরি </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্লাটর্ফম </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত  </span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়  </span></div></td>
                                
                              
                             
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7"rowspan="4" >সাপ্তাহিক সেশন</td>
                                <td class="tg-pwj7" rowspan="2">বাংলা  </td>
                                <td class="tg-pwj7" colspan=""> 
                                সাংগঠনিক
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $bangla_shang_num = $debate_program['bangla_shang_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $bangla_shang_pre = $debate_program['bangla_shang_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($bangla_shang_num!=0 && $bangla_shang_pre!=0)?($bangla_shang_pre/$bangla_shang_num):0;?>
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">সাধারণ</td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $bangla_shadha_num = $debate_program['bangla_shadha_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $bangla_shadha_pre = $debate_program['bangla_shadha_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($bangla_shadha_num!=0 && $bangla_shadha_pre!=0)?($bangla_shadha_pre/$bangla_shadha_num):0;?>
                                </td>
                               
                            </tr>

                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">ইংরেজি  </td>
                                <td class="tg-pwj7" colspan=""> 
                                সাংগঠনিক
                                </td>
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $eng_shang_num = $debate_program['eng_shang_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $eng_shang_pre = $debate_program['eng_shang_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($eng_shang_num!=0 && $eng_shang_pre!=0)?($eng_shang_pre/$eng_shang_num):0;?>
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">সাধারণ</td>
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $eng_shadha_num = $debate_program['eng_shadha_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $eng_shadha_pre = $debate_program['eng_shadha_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($eng_shadha_num!=0 && $eng_shadha_pre!=0)?($eng_shadha_pre/$eng_shadha_num):0;?>
                                </td>
                                
                              
                               
                            </tr>

                            
                            <tr>
                                <td class="tg-pwj7" rowspan="8">কর্মশালা/ওয়ার্কশপ </td>
                                <td class="tg-pwj7" rowspan="2">বিশ্ববিদ্যালয়
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $university_shang_num = $debate_program['university_shang_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $university_shang_pre = $debate_program['university_shang_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($university_shang_num!=0 && $university_shang_pre!=0)?($university_shang_pre/$university_shang_num):0;?>
                                </td>
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $university_shadha_num = $debate_program['university_shadha_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $university_shadha_pre = $debate_program['university_shadha_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($university_shadha_num!=0 && $university_shadha_pre!=0)?($university_shadha_pre/$university_shadha_num):0;?>
                                </td>

                              
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">কলেজ
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $college_shang_num = $debate_program['college_shang_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $college_shang_pre = $debate_program['college_shang_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($college_shang_num!=0 && $college_shang_pre!=0)?($college_shang_pre/$college_shang_num):0;?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $college_shadha_num = $debate_program['college_shadha_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $college_shadha_pre = $debate_program['college_shadha_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($college_shadha_num!=0 && $college_shadha_pre!=0)?($college_shadha_pre/$college_shadha_num):0;?>
                                </td>

                              
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">স্কুল
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $school_shang_num = $debate_program['school_shang_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $school_shang_pre = $debate_program['school_shang_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($school_shang_num!=0 && $school_shang_pre!=0)?($school_shang_pre/$school_shang_num):0;?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $school_shadha_num = $debate_program['school_shadha_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $school_shadha_pre = $debate_program['school_shadha_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($school_shadha_num!=0 && $school_shadha_pre!=0)?($school_shadha_pre/$school_shadha_num):0;?>
                                </td>

                              
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">মাদরাসা
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $madrasah_shang_num = $debate_program['madrasah_shang_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $madrasah_shang_pre = $debate_program['madrasah_shang_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($madrasah_shang_num!=0 && $madrasah_shang_pre!=0)?($madrasah_shang_pre/$madrasah_shang_num):0;?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                 <td class="tg-0pky" colspan=""> 
                                <?php echo $madrasah_shadha_num = $debate_program['madrasah_shadha_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $madrasah_shadha_pre = $debate_program['madrasah_shadha_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($madrasah_shadha_num!=0 && $madrasah_shadha_pre!=0)?($madrasah_shadha_pre/$madrasah_shadha_num):0;?>
                                </td>

                              
                            </tr>
                            
                            <tr>
                                <td class="tg-y698 type_1" colspan='3'> এক্সিকিউটিভ মিটিং	</td>
                               
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $exec_meeting_num = $debate_program['exec_meeting_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $exec_meeting_pre = $debate_program['exec_meeting_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($exec_meeting_num!=0 && $exec_meeting_pre!=0)?($exec_meeting_pre/$exec_meeting_num):0;?>
                                </td>
                            
                              

                            </tr>
                            <tr>
                                <td class="tg-y698" colspan='3'>অন্যান্য </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $other_num = $debate_program['other_num'] ?>
                                </td>
                                <td class="tg-0pky" colspan=""> 
                                <?php echo $other_pre = $debate_program['other_pre'] ?>
                                </td>
                            
                                <td class="tg-0pky" colspan="">  
                                <?php echo ($other_num!=0 && $other_pre!=0)?($other_pre/$other_num):0;?>
                                </td>
                          
                               
                            </tr>
                        
                            

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                            <td class="tg-pwj7" colspan="4"><b>প্রতিযোগিতাসমূহ</b></td>
                            <td class="tg-pwj7" colspan="">
                              <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Debate_প্রতিযোগিতাসমূহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        <tr>
                        <tr>
                                <td class="tg-pwj7 "><div><span>প্রতিযোগিতার নাম</span></div></td>
                                <td class="tg-pwj7 "><div><span>প্লাটর্ফম</span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত  </span></div></td>
                                <td class="tg-pwj7 "><div><span>গড় </span></div></td>
                                
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7" rowspan="2">আন্তঃ(স্কুল, কলেজ, মাদরাসা, থানা, ওয়ার্ড)<br> বিতর্ক প্রতিযোগিতা</td>
                                <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $anto_s_s = $debate_protijogita['anto_s_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $anto_s_p = $debate_protijogita['anto_s_p'] ?>
                                    </td>
                                <td class="tg-0pky" colspan="">  
                                   <?php echo ($anto_s_s!=0 && $anto_s_p!=0)?($anto_s_p/$anto_s_s):0;?>
                                </td>
                               
                               
                         
                            <tr>
                                <td class="tg-pwj7" >সাধারণ</td>
                               
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $anto_g_s = $debate_protijogita['anto_g_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $anto_g_p = $debate_protijogita['anto_g_p'] ?>
                                    </td>
                                <td class="tg-0pky" colspan="">  
                                   <?php echo ($anto_g_s!=0 && $anto_g_p!=0)?($anto_g_p/$anto_g_s):0;?>
                                </td>
                            
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">বক্তৃতা/ উপস্থিত বক্তৃতা প্রতিযোগিতা</td>
                                                               <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $speak_s_s = $debate_protijogita['speak_s_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $speak_s_p = $debate_protijogita['speak_s_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($speak_s_s!=0 && $speak_s_p!=0)?($speak_s_p/$speak_s_s):0;?>
                                </td>

                         
                            <tr>
                                <td class="tg-pwj7" >সাধারণ</td>
                               
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $speak_g_s = $debate_protijogita['speak_g_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $speak_g_p = $debate_protijogita['speak_g_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($speak_g_s!=0 && $speak_g_p!=0)?($speak_g_p/$speak_g_s):0;?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">প্রীতি বিতর্ক</td>
                                <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $priti_s_s = $debate_protijogita['priti_s_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $priti_s_p = $debate_protijogita['priti_s_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($priti_s_s!=0 && $priti_s_p!=0)?($priti_s_p/$priti_s_s):0;?>
                                </td>

                         
                            <tr>
                                <td class="tg-pwj7" >সাধারণ</td>
                               
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $priti_g_s = $debate_protijogita['priti_g_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $priti_g_p = $debate_protijogita['priti_g_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($priti_g_s!=0 && $priti_g_p!=0)?($priti_g_p/$priti_g_s):0;?>
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">কুইজ, রচনা, আবৃত্তি</td>
                                <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $quiz_s_s = $debate_protijogita['quiz_s_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $quiz_s_p = $debate_protijogita['quiz_s_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($quiz_s_s!=0 && $quiz_s_p!=0)?($quiz_s_p/$quiz_s_s):0;?>
                                </td>

                         
                            <tr>
                                <td class="tg-pwj7" >সাধারণ</td>
                               
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $quiz_g_s = $debate_protijogita['quiz_g_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $quiz_g_p = $debate_protijogita['quiz_g_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($quiz_g_s!=0 && $quiz_g_p!=0)?($quiz_g_p/$quiz_g_s):0;?>
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">অন্যান্য</td>
                                <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $other_s_s = $debate_protijogita['other_s_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $other_s_p = $debate_protijogita['other_s_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($other_s_s!=0 && $other_s_p!=0)?($other_s_p/$other_s_s):0;?>
                                </td>

                               
                         
                            <tr>
                                <td class="tg-pwj7" >সাধারণ</td>
                               
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $other_g_s = $debate_protijogita['other_g_s'] ?>
                                    </td>
                                
                                <td class="tg-0pky" colspan=""> 
                                    <?php echo $other_g_p = $debate_protijogita['other_g_p'] ?>
                                    </td>
                                    <td class="tg-0pky" colspan="">  
                                   <?php echo ($other_g_s!=0 && $other_g_p!=0)?($other_g_p/$other_g_s):0;?>
                                </td>
    
                            </tr>
                          
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
