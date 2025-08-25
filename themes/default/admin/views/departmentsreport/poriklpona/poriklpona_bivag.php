<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্লানিং এন্ড ডেভেলপমেন্ট বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/poriklpona-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/poriklpona-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/poriklpona-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable2">
                        <tr><td class="tg-pwj7" colspan="2"> <b>শাখার পরিকল্পনা সংক্রান্ত</b></td>
                        <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Planning_শাখার পরিকল্পনা সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                    </tr>
                        <tr>
                            <td class="tg-pwj7" colspan="2"> বিষয়</td>
                            <td class="tg-pwj7" colspan=""> মন্তব্য  </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" rowspan="2"> শাখায় পরিকল্পনা কমিটি আছে?  হ্যাঁ/না  	 </td>
                            <td class="tg-pwj7" colspan=""> হাা </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $shakhay_porikolpona_comitte	 = $planning_shakha_plan['shakhay_porikolpona_comitte'] ?>
                                </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> না </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $planning_shakha_plan_row - $planning_shakha_plan['shakhay_porikolpona_comitte'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> পরিকল্পনা কমিটির কতটি বৈঠক হয়েছে? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $porikolpona_boithok = $planning_shakha_plan['porikolpona_boithok'] ?>
                                </td>
                        </tr>
                       <tr>
                            <td class="tg-pwj7" rowspan="2"> শাখায় দীর্ঘমেয়াদী পরিকল্পনা নেওয়া হয়েছে কি?  হ্যাঁ/না </td>
                            <td class="tg-pwj7" colspan=""> হাা </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $dirghomeyadi_plan = $planning_shakha_plan['dirghomeyadi_plan'] ?>
                                </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> না </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $planning_shakha_plan_row - $planning_shakha_plan['dirghomeyadi_plan'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> জনশক্তির একাডেমিক আউটপুট পরিকল্পনা বাস্তবায়নের হার? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $academic_output = $planning_shakha_plan['academic_output'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> জনশক্তির প্রফেশনাল আউটপুট পরিকল্পনা বাস্তবায়নের হার? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $professional_output = $planning_shakha_plan['professional_output'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> বিশ্ববিদ্যালয়/অনার্স মানের কলেজ কতটি?  </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $uni_maner_college = $planning_shakha_plan['uni_maner_college'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> পঞ্চবার্ষিকী পরিকল্পনা নেওয়া হয়েছে কতটিতে? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $year_plan = $planning_shakha_plan['5_year_plan'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> বার্ষিক পরিকল্পনা পর্যালোচনা হয়েছে কতবার?  </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $year_plan_porjalochona = $planning_shakha_plan['year_plan_porjalochona'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> আউটপুট পরিকল্পনা পর্যালোচনা হয়েছে কতবার?? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $output_plan = $planning_shakha_plan['output_plan'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> শাখায় উপশাখা সংখ্যা কতটি? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $uposhakah_s = $planning_shakha_plan['uposhakah_s'] ?>
                                </td>
                        </tr>
                        
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> কতটি উপশাখায় সাথী মানের সভাপতি আছেন? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $up_p_sathi_maner = $planning_shakha_plan['up_p_sathi_maner'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> এ বছর নিষ্ক্রিয় থেকে সক্রিয় করা হয়েছে কতটি উপশাখা? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $nishkriyo_theke_shokriyo = $planning_shakha_plan['nishkriyo_theke_shokriyo'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2">শাখায় বর্তমানে নিষ্ক্রিয় উপশাখা কতটি? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $nishkriyo_up = $planning_shakha_plan['nishkriyo_up'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> শাখায় ওয়ার্ড সংখ্যা কতটি? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $word_num = $planning_shakha_plan['word_num'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> কতটি ওয়ার্ডে সদস্য মানের সভাপতি আছেন? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $word_p_shodossho_maner = $planning_shakha_plan['word_p_shodossho_maner'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> শাখায় ইউনিয়ন সংখ্যা কতটি? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $union_num = $planning_shakha_plan['union_num'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2">কতটি ইউনিয়নে সদস্য মানের সভাপতি আছেন? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $uni_p_shodossho_maner = $planning_shakha_plan['uni_p_shodossho_maner'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> শাখায় থানা সংখ্যা কতটি? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $thana_num = $planning_shakha_plan['thana_num'] ?>
                                </td>
                        </tr>
                        <tr> 
                            <td class="tg-pwj7" colspan="2"> দুইজনের কম সদস্য কাজ করে কতটি থানায়? </td>
                              <td class="tg-0pky  type_1">
                                    <?php echo $member_at_least = $planning_shakha_plan['2_member_at_least'] ?>
                                </td>
                        </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable1">
                        <tr><td class="tg-pwj7" colspan="2"><b> জনশক্তির বার্ষিক পরিকল্পনা সংক্রান্ত </b></td>
                        <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Planning_জনশক্তির বার্ষিক পরিকল্পনা সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                    </tr>
                        <tr>
                            <td class="tg-pwj7" colspan="2"> জনশক্তি</td>
                            <td class="tg-pwj7" rowspan="2"> ব্যক্তিগত বার্ষিক পরিকল্পনা গ্রহণ করেছেন কতজন  </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" rowspan="">মান </td>
                            <td class="tg-pwj7" colspan=""> সংখ্যা </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> সদস্য </td>
                            <td class="tg-0pky  type_1">
                                    <?php echo $mem_num = $planning_jonoshokti_plan['mem_num'] ?>
                                </td>
                            <td class="tg-0pky  type_1">
                                    <?php echo $mem_plan = $planning_jonoshokti_plan['mem_plan'] ?>
                                </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> সাথী</td>
                            <td class="tg-0pky  type_1">
                                    <?php echo $associate_num = $planning_jonoshokti_plan['associate_num'] ?>
                                </td>
                            <td class="tg-0pky  type_1">
                                    <?php echo $associate_plan = $planning_jonoshokti_plan['associate_plan'] ?>
                                </td>
                        </tr>
                        <tr>
                            <td class="tg-pwj7" colspan=""> কর্মী </td>
                            <td class="tg-0pky  type_1">
                                    <?php echo $worker_num = $planning_jonoshokti_plan['worker_num'] ?>
                                </td>
                            <td class="tg-0pky  type_1">
                                    <?php echo $worker_plan = $planning_jonoshokti_plan['worker_plan'] ?>
                                </td>
                        </tr>
                    </table>
                    
                    <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Planning_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $shikkha_central_s=$planning_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$planning_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$planning_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$planning_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$planning_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$planning_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$planning_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$planning_training_program['kormoshala_shakha_p'] ?>
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
 
