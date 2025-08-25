<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'গবেষণা বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/research-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/research-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Research_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $shikkha_central_s=$gobeshona_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$gobeshona_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$gobeshona_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$gobeshona_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$gobeshona_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$gobeshona_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$gobeshona_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$gobeshona_training_program['kormoshala_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
            <table class="tg table table-header-rotated" id="testTable1">
                    <tr>
                        <td class="tg-pwj7" colspan="2"><b>লেখালেখি ও প্রকাশ সংক্রান্ত </b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Research_লেখালেখি ও প্রকাশ সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan="">লেখালেখির ধরণ  </td>
                        <td class="tg-pwj7" colspan="">লেখা হয়েছে কতটি? </td>
                        <td class="tg-pwj7" colspan="">প্রকাশিত হয়েছে কতটি? </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7">
                       প্রবন্ধ
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $probondho_lekha = $gobeshona_lekhalekhi['probondho_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $probondho_prokash = $gobeshona_lekhalekhi['probondho_prokash'] ?>
                       </td>
                    </tr>  
                    <tr>
                       <td class="tg-pwj7">
                      <!--  গবেষণা প্রবন্ধ --> <!-- নিবন্ধ (পেপার)  rename to গবেষণা প্রবন্ধ   -->
                       নিবন্ধ (পেপার)
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nibondhon_lekha = $gobeshona_lekhalekhi['nibondhon_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $nibondhon_prokash = $gobeshona_lekhalekhi['nibondhon_prokash'] ?>
                       </td>
                    </tr>
                    <tr>
                       <td class="tg-pwj7">
                       বই 
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $boi_lekha = $gobeshona_lekhalekhi['boi_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $boi_prokash = $gobeshona_lekhalekhi['boi_prokash'] ?>
                       </td>
                    </tr>  
                    <tr>
                       <td class="tg-pwj7">
                       বুক রিভিউ <!-- প্রবন্ধ রিভিউ rename to বুক রিভিউ   -->
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $boi_review_lekha = $gobeshona_lekhalekhi['boi_review_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $boi_review_prokash = $gobeshona_lekhalekhi['boi_review_prokash'] ?>
                       </td>
                    </tr> 

                    <tr>
                       <td class="tg-pwj7">
                       প্রবন্ধ রিভিউ
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $review_lekha = $gobeshona_lekhalekhi['review_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $review_prokash = $gobeshona_lekhalekhi['review_prokash'] ?>
                       </td>
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       কলাম সংবাদপত্র  <!-- প্রেজেন্টেশন  rename to কলাম সংবাদপত্র    -->
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $presentation_lekha = $gobeshona_lekhalekhi['presentation_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $presentation_prokash = $gobeshona_lekhalekhi['presentation_prokash'] ?>
                       </td>
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       ডকুমেন্টারি
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $document_lekha = $gobeshona_lekhalekhi['document_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $document_prokash = $gobeshona_lekhalekhi['document_prokash'] ?>
                       </td>
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       কনফারেন্স  পেপার <!-- স্ক্রিপ্টিং রাইটিং  rename to কনফারেন্স  পেপার   --> 
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $script_lekha = $gobeshona_lekhalekhi['script_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $script_prokash = $gobeshona_lekhalekhi['script_prokash'] ?>
                       </td>
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       বাংলা ব্লগ 
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $bangla_lekha = $gobeshona_lekhalekhi['bangla_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $bangla_prokash = $gobeshona_lekhalekhi['bangla_prokash'] ?>
                       </td>
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       ইংরেজি ব্লগ 
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $english_lekha = $gobeshona_lekhalekhi['english_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $english_prokash = $gobeshona_lekhalekhi['english_prokash'] ?>
                       </td>
                    </tr> 

                    <tr>
                       <td class="tg-pwj7">
                       পোস্টার প্রেজেন্টেশন
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $poster_pre_lekha = $gobeshona_lekhalekhi['poster_pre_lekha'] ?>
                       </td>
                         <td class="tg-0pky  type_2">
                       <?php echo $poster_pre_prokash = $gobeshona_lekhalekhi['poster_pre_prokash'] ?>
                       </td>
                    </tr> 
                </table>

                <table class="tg table table-header-rotated" id="testTable2">
                    <tr>
                        <td class="tg-pwj7" colspan="5"><b>গবেষণারত ভাইদের আপডেট তালিকা</b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Research_গবেষণারত ভাইদের আপডেট তালিকা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>				
                        <td class="tg-pwj7" rowspan="">ক্রম </td>
                        <td class="tg-pwj7" rowspan="">শাখা আইডি </td>
                        <td class="tg-pwj7" colspan="">নাম </td>
                        <td class="tg-pwj7" rowspan="">কোন দেশে গবেষণারত  </td>
                        <td class="tg-pwj7" colspan="">সর্বশেষ দায়িত্ব </td>
                        <td class="tg-pwj7" rowspan="">গবেষণার স্তর </td>
                        <td class="tg-pwj7" colspan="">অনলাইন নম্বর </td>
                    </tr>
                    
                   <?php 
                                $i=0;
                            foreach($gobeshona_gobeshonaroto_vai->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['which_country'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['last_dayitto'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['stor'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['online_num'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>
                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                    <tr>
                        <td class="tg-pwj7" colspan="5"><b>গবেষণায় আগ্রহী জনশক্তিদের তালিকা </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Research_গবেষণায় আগ্রহী জনশক্তিদের তালিকা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>				
                        <td class="tg-pwj7" rowspan="">ক্রম </td>
                        <td class="tg-pwj7" rowspan="">শাখা আইডি </td>
                        <td class="tg-pwj7" colspan="">নাম </td>
                        <td class="tg-pwj7" rowspan="">সাংগঠনিক মান </td>
                        <td class="tg-pwj7" colspan="">বিভাগ</td>
                        <td class="tg-pwj7" rowspan="">আগ্রহের সেক্টর</td>
                        <td class="tg-pwj7" colspan="">অনলাইন নম্বর </td>
                    </tr>
                    
                   <?php 
                                $i=0;
                            foreach($gobeshona_gobeshonay_agrohi->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['sangothonik_man'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bivag'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['interested_sector'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['online_number'] ?>       
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
 
