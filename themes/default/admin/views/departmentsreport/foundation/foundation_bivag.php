<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'ফাউন্ডেশন বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/foundation-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/foundation-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/foundation-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Foundation_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$foundation_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$foundation_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$foundation_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$foundation_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$foundation_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$foundation_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$foundation_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$foundation_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                <table class="tg table table-header-rotated" id="testTable1">
                    <tr>
                        <td class="tg-pwj7" colspan='4'>
                            <b>ফাউন্ডেশন/  ট্রাস্ট/ এসোসিয়েশন-সংক্রান্ত তথ্য</b>
                        </td>
                        <td class="tg-pwj7">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Foundation_ফাউন্ডেশন/  ট্রাস্ট/ এসোসিয়েশন-সংক্রান্ত তথ্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan='2'>সংখ্যা </td>
                        <td class="tg-pwj7" colspan='2'> রেজিস্ট্রিকৃত কতটি?</td>
                        <td class="tg-pwj7" rowspan='2'> সিএ ফার্ম কতৃক (আয়-ব্যয়) অডিট সম্পন্ন কতটির?</td>
                        <td class="tg-pwj7" rowspan='2'>কমিটি ও রেজুলেশন আপডেট আছে কতটির?</td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7">জয়েন্ট স্টক কোম্পানী থেকে </td>
                        <td class="tg-pwj7 ">সমাজ সেবা অধিদপ্তর  থেকে </td>
                        
                       
                    </tr> 
                    <tr>
                    <td class="tg-0pky  type_1">
                    <?php echo $number = $foundation_foundation_info['number'] ?>
                    </td>
                    <td class="tg-0pky  type_1">
                    <?php echo $joint_stock = $foundation_foundation_info['joint_stock'] ?>
                    </td>
                    <td class="tg-0pky  type_1">
                    <?php echo $shomaj_sheba = $foundation_foundation_info['shomaj_sheba'] ?>
                    </td>
                    <td class="tg-0pky  type_1">
                    <?php echo $ca_farm_audit = $foundation_foundation_info['ca_farm_audit'] ?>
                    </td>
                    <td class="tg-0pky  type_1">
                    <?php echo $committee_resulation = $foundation_foundation_info['committee_resulation'] ?>
                    </td>
                        
                    </tr>               
                </table>

                <table class="tg table table-header-rotated" id="bari">
                    <tr>
                        <td class="tg-pwj7" colspan='4'>
                            <b>মোটরসাইকলের তথ্য</b>
                        </td>
                        <td class="tg-pwj7" colspan='1'>
                            <a href="#" id='table_1' onclick="doit('xlsx','bari','<?php echo 'Foundation_মোটরসাইকলের তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                       
                    </tr>
                  
                    <tr>
                        <td class="tg-pwj7">বিবরণ   </td>
                        <td class="tg-pwj7" >গাড়ির সংখ্যা </td>
                        <td class="tg-pwj7" >  হেলমেটের সংখ্যা</td>
                        <td class="tg-pwj7" > কতটি গাড়ির কাগজ আছে</td>
                        <td class="tg-pwj7" >কতজন ভাইয়ের ড্রাইভিং লাইসেন্স আছে </td>
                    </tr>
                    
                   
                    <tr>
                        <td class="tg-0pky type_5"> 
                        শাখা 
                        </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['s_g'] ?>                                </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['s_h'] ?>                                </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['s_k'] ?>                                </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['s_l'] ?>                          </td>
                    </tr>

                    <tr>
                        <td class="tg-0pky type_5"> 
                        থানা 
                        </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['t_g'] ?>                          </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['t_h'] ?>                          </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['t_k'] ?>                          </td>
                        <td class="tg-0pky type_5"> 
                        <?php echo $foundation_motorcycle['t_l'] ?>    
                        </td>
                    </tr>
                    
                </table>
                <table class="tg table table-header-rotated" id="testTable2">
                    <tr>
                        <td class="tg-pwj7" colspan='11'>
                            <b>জমি সংক্রান্ত তথ্য</b>
                        </td>
                        <td class="tg-pwj7" colspan='5'>
                            <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Foundation_জমি সংক্রান্ত তথ্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan='2'>ক্রম </td>
                        <td class="tg-pwj7" rowspan='2'>শাখা আইডি </td>
                        <td class="tg-pwj7" rowspan='2'>খতিয়ান নং </td>
                        <td class="tg-pwj7" rowspan='2'> জমির পরিমান</td>
                        <td class="tg-pwj7" rowspan='2'> রেজিষ্ট্রেশন কার নামে?</td>
                        <td class="tg-pwj7" rowspan='2'>নামজারির পরিমান</td>
                        <td class="tg-pwj7" colspan='5'>পর্চা</td>
                        <td class="tg-pwj7" rowspan='2'> খাজনা পরিশোধ করা হয়েছে কত সাল পর্যন্ত?</td>
                        <td class="tg-pwj7" rowspan='2'> গ্যাস/ বিদ্যুত/ ওয়াসা লাইন আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan='2'>পূর্বের সব দলীল আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan='2'>রাজউক/অথরিটির অনুমোদনের কাগজ আছে কিনা? </td>
                        <td class="tg-pwj7" rowspan='2'> মন্তব্য</td>

                    </tr>
                    <tr>
                        <td class="tg-pwj7">CS </td>
                        <td class="tg-pwj7 ">SA </td>
                        <td class="tg-pwj7">RS/ROR</td>
                        <td class="tg-pwj7">CITY/BS</td>
                        <td class="tg-pwj7 ">Mutation/DCR </td>
                    </tr> 
                    <?php 
                                $i=0;
                            foreach($foundation_jomi_shongkranto->result_array() as $row) 
                                    {
                                    $i++;
                                   
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['khotiyan_no'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['jomir_poriman'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['registration_name'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['namjarir_poriman'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['cs'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['sa'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['rs_ror'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['city_bs'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['dcr'] ?>       
                                    </td>
                                    
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['khajna_porishodh'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['gas_biddut_wasa'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['purber_dolil'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['rajuk_onumoti'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comments'] ?>       
                                    </td>
                                    
                                </tr>

                        <?php } ?>       
                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                    <tr>
                        <td class="tg-pwj7" colspan='11'>
                            <b>ফ্ল্যাট সংক্রান্ত তথ্য</b>
                        </td>
                        <td class="tg-pwj7" colspan='5'>
                            <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Foundation_ফ্ল্যাট সংক্রান্ত তথ্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan='2'>ক্রম </td>
                        <td class="tg-pwj7" rowspan='2'>শাখা আইডি </td>
                        <td class="tg-pwj7" rowspan='2'>ফ্ল্যাটের পরিচয় </td>
                        <td class="tg-pwj7" rowspan='2'> কত বর্গফুটের ফ্ল্যাট</td>
                        <td class="tg-pwj7" rowspan='2'> আমাদের নামে আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan='2'>রেজিস্ট্রেশন কার নামে?</td>
                        <td class="tg-pwj7" colspan='5'>পর্চা </td>
                        <td class="tg-pwj7" rowspan='2'> খাজনা পরিশোধ করা হয়েছে কত সাল পর্যন্ত?</td>
                        <td class="tg-pwj7" rowspan='2'> গ্যাস/ বিদ্যুত/ ওয়াসা লাইন আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan='2'>পূর্বের সব দলীল আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan='2'>রাজউক/অথরিটির অনুমোদনের কাগজ আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan='2'> মন্তব্য</td>

                    </tr>
                    <tr>
                        <td class="tg-pwj7">CS </td>
                        <td class="tg-pwj7 ">SA </td>
                        <td class="tg-pwj7">RS</td>
                        <td class="tg-pwj7">CITY/BS</td>
                        <td class="tg-pwj7 ">Mutation & DCR </td>
                    </tr> 
                    <?php 
                                $i=0;
                            foreach($foundation_flat_shongkranto->result_array() as $row) 
                                    {
                                    $i++;
                                    
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['khotiyan_no'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['koto_sqft'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['amader_name_ache_kina'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['reg_kar_name'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['cs'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['sa'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['rs_ror'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['city_bs'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['dcr'] ?>       
                                    </td>
                                    
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['khajna_porishodh'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['gas_biddut_wasa'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['purber_dolil'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['rajuk_onumoti'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comments'] ?>       
                                    </td> 
                                </tr>
                        <?php } ?> 
                </table>
                <table class="tg table table-header-rotated" id="testTable4">
                    <tr>
                        <td class="tg-pwj7" colspan='5'>
                            <b>অন্যান্য</b>
                        </td>
                        <td class="tg-pwj7" colspan='3'>
                            <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Foundation_অন্যান্য.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan=''>ক্রম </td>
                        <td class="tg-pwj7" rowspan=''>শাখা আইডি </td>
                        <td class="tg-pwj7" rowspan=''>গাইড ও কোচিংয়ের নাম</td>
                        <td class="tg-pwj7" rowspan=''> রেজিন্ট্রেশন/অনুমোদন আছে কিনা?</td>
                        <td class="tg-pwj7" rowspan=''>  কোন শ্রেণির </td>
                        <td class="tg-pwj7" rowspan=''>মোট আয়</td>
                        <td class="tg-pwj7" colspan=''>মোট ব্যয়</td>
                        <td class="tg-pwj7" rowspan=''> উদ্বৃত্ত/ঘাটতি</td>
                    </tr>

                    <?php 
                                $i=0;
                            foreach($foundation_others->result_array() as $row) 
                                    {
                                    $i++;
                                    
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['guide_coaching_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['reg_ache_kina'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['kon_sreni'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['total_ay'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['total_bey'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo ($row['total_ay']-$row['total_bey']) ?>       
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
  