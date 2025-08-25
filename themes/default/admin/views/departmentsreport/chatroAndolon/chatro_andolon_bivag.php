<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'ছাত্র অধিকার বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/chatro-andolon-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/chatro-andolon-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5', '<?php echo 'Stu_Movement_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $shikkha_central_s=$chatroandolon_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$chatroandolon_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$chatroandolon_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$chatroandolon_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$chatroandolon_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$chatroandolon_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$chatroandolon_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$chatroandolon_training_program['kormoshala_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>সংগঠন</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1', '<?php echo 'Stu_Movement_সংগঠন.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>			
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >সংগঠন সংখ্যা</td>
                                <td class="tg-pwj7" >রেজিস্টার্ড   </td>
                                <td class="tg-pwj7" >নন-রেজিস্টার্ড </td>
                                <td class="tg-pwj7">বৃদ্ধি সংখ্যা </td>
                                <td class="tg-pwj7" >ঘাটতি সংখ্যা</td>
                                <td class="tg-pwj7" >কার্যক্রম চালু আছে কতটির?</td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> প্রতিষ্ঠানে পার্শ্ব সংগঠন সংক্রান্ত 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $side_ss = $chatroandolon_songothon['side_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $side_reg = $chatroandolon_songothon['side_reg'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $side_n_reg = $chatroandolon_songothon['side_n_reg'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                   <?php echo $side_inc = $chatroandolon_songothon['side_inc'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                   <?php echo $side_dec = $chatroandolon_songothon['side_dec'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                   <?php echo $side_act = $chatroandolon_songothon['side_act'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">বেইজ এরিয়ায় সামাজিক সংগঠন সংক্রান্ত তথ্য</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $social_ss = $chatroandolon_songothon['social_ss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $social_reg = $chatroandolon_songothon['social_reg'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $social_n_reg = $chatroandolon_songothon['social_n_reg'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                   <?php echo $social_inc = $chatroandolon_songothon['social_inc'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                   <?php echo $social_dec = $chatroandolon_songothon['social_dec'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                   <?php echo $social_act = $chatroandolon_songothon['social_act'] ?>
                                </td>
                              
                            </tr>
                   </table>
                   <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>শিক্ষাপ্রতিষ্ঠানের তথ্য</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2', '<?php echo 'Stu_Movement_শিক্ষাপ্রতিষ্ঠানের তথ্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>	
                            <tr>
                                <td class="tg-pwj7" rowspan='2'>ক্রম</td>
                                <td class="tg-pwj7" rowspan='2'>শাখা আইডি</td>
                                <td class="tg-pwj7" rowspan='2'>গুরুত্বপূর্ণ শিক্ষাপ্রতিষ্ঠানের নাম</td>
                                <td class="tg-pwj7" rowspan='2'>আমাদের সংগঠনের মান </td>
                                <td class="tg-pwj7" colspan='3'>অন্যান্য গুরুত্বপূর্ণ সংগঠনের কমিটি আছে কিনা? </td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> ছাত্রলীগ</td>
                                <td class="tg-y698   type_1"> ছাত্রদল	</td>
                                <td class="tg-y698  type_2"> বাম সংগঠন </td>

                            </tr>

                          
                   <?php 
                                $i=0;
                            foreach($chatroandolon_institution->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['ins_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['son_type'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['comm_lig'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comm_dol'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comm_left'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>
                   </table>
                   <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>ছাত্রসংসদ</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3', '<?php echo 'Stu_Movement_ছাত্রসংসদ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>						
                            <tr>
                            <td class="tg-pwj7" rowspan=''>ক্রম</td>
                                <td class="tg-pwj7" rowspan=''>শাখা আইডি</td>
                                <td class="tg-pwj7" >গুরুত্বপূর্ণ শিক্ষাপ্রতিষ্ঠানের নাম</td>
                                <td class="tg-pwj7" >ছাত্রসংসদ কার্যকর আছে কিনা? (হ্যাঁ/না)</td>
                                <td class="tg-pwj7" >সর্বশেষ নির্বাচন হয়েছে কত সালে?  </td>
                                <td class="tg-pwj7" >ছাত্রসংসদ কার্যকর থাকলে কোন সংগঠনের নিয়ন্ত্রণে আছে? </td>
                                <td class="tg-pwj7">পরবর্তী নির্বাচনে আমাদের প্যানেল ঘোষণার প্রস্তুতি আছে কিনা? </td>
                            </tr>


                            <?php 
                                $i=0;
                            foreach($chatroandolon_sonsod->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['imp_ins'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['sonsod_act'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sonsod_vote'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['sonsod_rulling_party'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['next_sonsod_panel'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>
                          
                   </table>
                   <table class="tg table table-header-rotated" id="testTable4">	 	
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4', '<?php echo 'Stu_Movement_যোগাযোগ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>			
                            <tr>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >শিক্ষক</td>
                                <td class="tg-pwj7" >কর্মকর্তা   </td>
                                <td class="tg-pwj7" >কর্মচারী </td>
                                <td class="tg-pwj7">আবাসিক সুধী </td>
                                <td class="tg-pwj7" >বন্ধু সংগঠনের সাথে</td>
                                
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> কতজন 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kj_shi = $chatroandolon_bivag_jogajog['kj_shi'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $kj_kmkt = $chatroandolon_bivag_jogajog['kj_kmkt'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $kj_koca = $chatroandolon_bivag_jogajog['kj_koca'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                   <?php echo $kj_assu = $chatroandolon_bivag_jogajog['kj_assu'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                   <?php echo $kj_bnsgsa = $chatroandolon_bivag_jogajog['kj_bnsgsa'] ?>
                                </td>
                            </tr>


                            <tr>
                                <td class="tg-y698">কতবার </td>
                                <td class="tg-0pky">
                                   <?php echo $kb_shi = $chatroandolon_bivag_jogajog['kb_shi'] ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $kb_kmkt = $chatroandolon_bivag_jogajog['kb_kmkt'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kb_koca = $chatroandolon_bivag_jogajog['kb_koca'] ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $kb_assu = $chatroandolon_bivag_jogajog['kb_assu'] ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $kb_bnsgsa = $chatroandolon_bivag_jogajog['kb_bnsgsa'] ?>
                                </td>
                              
                            </tr>
                          
                             
                   </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
