<?php defined('BASEPATH') or exit('No direct script access allowed');?>



<link href="<?=$assets?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?='ব্যবসায় শিক্ষা বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/business-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) {?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?="সকল শাখা"?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?=admin_url('departmentsreport/business-page-one')?>"><i class="fa fa-building-o"></i> <?="সকল শাখা"?></a></li>
                            <li class="divider"></li>
                            <?php
foreach ($branches as $branch) {
    echo '<li><a href="' . admin_url('departmentsreport/business-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
}
    ?>
                        </ul>
                    </li>
                <?php }?>
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
                                <td class="tg-pwj7" colspan="2"><b>ব্যবসায় শিক্ষা কমিটি</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Business_ব্যবসায় শিক্ষা কমিটি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>শাখায় ব্যবসায় শিক্ষা সম্পাদক আছে কি? </span></div></td>
                            <td class="tg-pwj7 "><div><span> হ্যাঁ </span></div></td>
                            <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shompadok = $business_studies['shikkha_shompadok'] ?>
                                </td>
                            <tr>
                                <td class="tg-pwj7 "><div><span> না </span></div></td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($business_studies_row - $business_studies['shikkha_shompadok']) ?>
                                </td>

                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>ব্যবসায় শিক্ষায় ও অর্থনীতিতে অধ্যয়নরত জনশক্তিদের সংখ্যাতাত্ত্বিক হিসাব</b> </td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Business_ব্যবসায় শিক্ষায় ও অর্থনীতিতে অধ্যয়নরত জনশক্তিদের.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>

                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>মান </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 " colspan="4"><div><span>ব্যবসায় শিক্ষা</span></div></td>
                                <td class="tg-pwj7 " colspan="2"><div><span>অর্থনীতি  </span></div></td>
                                <td class="tg-pwj7" rowspan="2">এ বছরে মানোন্নয়ন  </td>

                            </tr>
                            <tr>

                                <td class="tg-pwj7 "><div><span> মাধ্যমিক</span></div></td>
                                <td class="tg-pwj7 "><div><span> উচ্চমাধ্যমিক</span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতক   </span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতকোত্তর</span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতক   </span></div></td>
                                <td class="tg-pwj7 "><div><span> স্নাতকোত্তর</span></div></td>


                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $member_total = $business_studies_manpower['member_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $member_bs_maddhomik = $business_studies_manpower['member_bs_maddhomik'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $member_bs_uccho_maddhomik = $business_studies_manpower['member_bs_uccho_maddhomik'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $member_bs_snatok = $business_studies_manpower['member_bs_snatok'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $member_bs_snatokottor = $business_studies_manpower['member_bs_snatokottor'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $member_orthoniti_snatok = $business_studies_manpower['member_orthoniti_snatok'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $member_orthoniti_snatokottor = $business_studies_manpower['member_orthoniti_snatokottor'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $member_ebochore = $business_studies_manpower['member_ebochore'] ?>
                                </td>



                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sathi_total = $business_studies_manpower['sathi_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_bs_maddhomik = $business_studies_manpower['sathi_bs_maddhomik'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_bs_uccho_maddhomik = $business_studies_manpower['sathi_bs_uccho_maddhomik'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sathi_bs_snatok = $business_studies_manpower['sathi_bs_snatok'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sathi_bs_snatokottor = $business_studies_manpower['sathi_bs_snatokottor'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sathi_orthoniti_snatok = $business_studies_manpower['sathi_orthoniti_snatok'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sathi_orthoniti_snatokottor = $business_studies_manpower['sathi_orthoniti_snatokottor'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sathi_ebochore = $business_studies_manpower['sathi_ebochore'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                               <td class="tg-0pky  type_1">
                                    <?php echo $kormi_total = $business_studies_manpower['kormi_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_bs_maddhomik = $business_studies_manpower['kormi_bs_maddhomik'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_bs_uccho_maddhomik = $business_studies_manpower['kormi_bs_uccho_maddhomik'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $kormi_bs_snatok = $business_studies_manpower['kormi_bs_snatok'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $kormi_bs_snatokottor = $business_studies_manpower['kormi_bs_snatokottor'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $kormi_orthoniti_snatok = $business_studies_manpower['kormi_orthoniti_snatok'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $kormi_orthoniti_snatokottor = $business_studies_manpower['kormi_orthoniti_snatokottor'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $kormi_ebochore = $business_studies_manpower['kormi_ebochore'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_total +  $sathi_total +  $kormi_total) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_maddhomik +  $sathi_bs_maddhomik +  $kormi_bs_maddhomik) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_uccho_maddhomik +  $sathi_bs_uccho_maddhomik +  $kormi_bs_uccho_maddhomik) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_snatok +  $sathi_bs_snatok +  $kormi_bs_snatok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_bs_snatokottor +  $sathi_bs_snatokottor +  $kormi_bs_snatokottor) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_orthoniti_snatok +  $sathi_orthoniti_snatok +  $kormi_orthoniti_snatok) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_orthoniti_snatokottor +  $sathi_orthoniti_snatokottor +  $kormi_orthoniti_snatokottor) ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo ($member_ebochore +  $sathi_ebochore +  $kormi_ebochore) ?>
                                </td>

                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Business_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$business_studies_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$business_studies_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$business_studies_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$business_studies_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$business_studies_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$business_studies_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$business_studies_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$business_studies_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>তালিকা সম্পর্কিত </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Business_তালিকা সম্পর্কিত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7" >মোট সংখ্যা </td>
                                <td class="tg-pwj7" > কর্মী </td>
                                <td class="tg-pwj7" > সাথী  </td>
                                <td class="tg-pwj7">সদস্য  </td>
                                <td class="tg-pwj7"  >তালিকা আছে কতজনের</td>
                                
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায় শিক্ষা বিষয়ে বিভিন্ন ম্যাগাজিনে লেখালেখি করেন এমন জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $bebsha_shikkha_total = $business_studies_talika['bebsha_shikkha_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bebsha_shikkha_kormi = $business_studies_talika['bebsha_shikkha_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bebsha_shikkha_sathi = $business_studies_talika['bebsha_shikkha_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $bebsha_shikkha_shodossho = $business_studies_talika['bebsha_shikkha_shodossho'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $bebsha_shikkha_talika_kotojoner = $business_studies_talika['bebsha_shikkha_talika_kotojoner'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">স্থানীয়, জাতীয় বা আন্তর্জাতিক ব্যবসায় শিক্ষা বিষয়ক প্রতিযোগিতায় পুরস্কার প্রাপ্ত অথবা অংশগ্রহণকারী জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sthanio_jatio_total = $business_studies_talika['sthanio_jatio_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sthanio_jatio_kormi = $business_studies_talika['sthanio_jatio_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sthanio_jatio_sathi = $business_studies_talika['sthanio_jatio_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sthanio_jatio_shodossho = $business_studies_talika['sthanio_jatio_shodossho'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $sthanio_jatio_talika_kotojoner = $business_studies_talika['sthanio_jatio_talika_kotojoner'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজনেস উদ্যোক্তা হতে আগ্রহী এমন জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $business_uddokta_total = $business_studies_talika['business_uddokta_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $business_uddokta_kormi = $business_studies_talika['business_uddokta_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $business_uddokta_sathi = $business_studies_talika['business_uddokta_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $business_uddokta_shodossho = $business_studies_talika['business_uddokta_shodossho'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $business_uddokta_talika_kotojoner = $business_studies_talika['business_uddokta_talika_kotojoner'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবীদ হতে আগ্রহী এমন জনশক্তি </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $orthoniti_bid_total = $business_studies_talika['orthoniti_bid_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $orthoniti_bid_kormi = $business_studies_talika['orthoniti_bid_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $orthoniti_bid_sathi = $business_studies_talika['orthoniti_bid_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $orthoniti_bid_shodossho = $business_studies_talika['orthoniti_bid_shodossho'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $orthoniti_bid_talika_kotojoner = $business_studies_talika['orthoniti_bid_talika_kotojoner'] ?>
                                </td>
                            </tr>

                        </table>


                <table class="tg table table-header-rotated" id="testTable4">
                    <tr>
                        <td class="tg-pwj7" colspan=""><b>উচ্চশিক্ষা সম্পর্কিত </b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Business_উচ্চশিক্ষা সম্পর্কিত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7 " ><div><span>ব্যবসায় শিক্ষায় উচ্চশিক্ষার্থে বিদেশে যাওয়ার প্রস্তুতি নিচ্ছেন এমন জনশক্তি সংখ্যা </span></div></td>
                    <td class="tg-pwj7 "><div><span> এ বছর ব্যবসায় শিক্ষায় উচ্চশিক্ষার্থে বিদেশে গমণকারী জনশক্তি সংখ্যা </span></div></td>

                    <tr>
                    <td class="tg-0pky  type_4">
                    <?php echo $high_study_prep = $business_studies_high_study_shomporkito['high_study_prep'] ?>
                    </td>
                    <td class="tg-0pky  type_5">
                        <?php echo $high_study_gomon = $business_studies_high_study_shomporkito['high_study_gomon'] ?>
                    </td>
                    </tr>
                </table>

                <table class="tg table table-header-rotated" id="testTable5">
                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>বিজনেস ক্লাব সংক্রান্ত  </b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Business_বিজনেস ক্লাব সংক্রান্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7 " ><div><span>আমাদের নিয়ন্ত্রণাধীন বিজনেস ক্লাব সংখ্যা	 </span></div></td>
                    <td class="tg-pwj7 "><div><span>কমিটি আছে কতটিতে? </span></div></td>
                    <td class="tg-pwj7 " ><div><span>ক্লাবের সদস্য সংখ্যা	 	 </span></div></td>
                    <td class="tg-pwj7 "><div><span>অন্যান্য কতটি ক্লাবে জনশক্তি আছে?</span></div></td>
                    <td class="tg-pwj7 " ><div><span>কতজন জনশক্তি সংযুক্ত আছে? 	 </span></div></td>


                    <tr>
                    <td class="tg-0pky  type_4">
                    <?php echo $amader_niyontrone = $business_studies_business_club['amader_niyontrone'] ?>
                    </td>
                    <td class="tg-0pky  type_5">
                        <?php echo $committe_ache = $business_studies_business_club['committe_ache'] ?>
                    </td>
                    <td class="tg-0pky  type_5">
                        <?php echo $club_mem = $business_studies_business_club['club_mem'] ?>
                    </td>
                    <td class="tg-0pky  type_5">
                        <?php echo $onno_club_e_manpower = $business_studies_business_club['onno_club_e_manpower'] ?>
                    </td>
                    <td class="tg-0pky  type_5">
                        <?php echo $kotojon_manpower = $business_studies_business_club['kotojon_manpower'] ?>
                    </td>

                    </tr>
                </table>
                <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>কয়েকটি বিশেষ প্রোগ্রামের রিপোর্ট  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Business_কয়েকটি বিশেষ প্রোগ্রামের রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7" >কতটি বাস্তবায়িত হয়েছে </td>
                                <td class="tg-pwj7" > উপস্থিতি </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">ক্যারিয়ার গাইডলাইন প্রোগ্রাম (একাডেমিক, প্রফেশনাল, বিদেশে উচ্চশিক্ষা)</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $career_guidleline_pro_num = $business_studies_bishesh_program['career_guidleline_pro_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $career_guidleline_pro_pre = $business_studies_bishesh_program['career_guidleline_pro_pre'] ?>
                                </td>
                              

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ব্যবসায় শিক্ষা বিষয়ক কুইজ প্রতিযোগিতা (স্কুল-বিশ্ববিদ্যালয়) </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $bus_stu_quiz_num = $business_studies_bishesh_program['bus_stu_quiz_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bus_stu_quiz_pre = $business_studies_bishesh_program['bus_stu_quiz_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">স্কিল ডেভেলপমেন্ট প্রোগ্রামসমূহ যেমন : নেটওয়ার্ক ডেভোলপিং, সিভি রাইটিং, ইমেইল রাইটিং, পাওয়ার পয়েন্ট প্রেজেন্টেশন ইত্যাদি  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $skill_dev_pre_num = $business_studies_bishesh_program['skill_dev_pre_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $skill_dev_pre_pre = $business_studies_bishesh_program['skill_dev_pre_pre'] ?>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">স্নাতক ও স্নাতকোত্তর পর্যায়ের জনশক্তিদের নিয়ে কর্মশালা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $snatok_snatok_uttor_num = $business_studies_bishesh_program['snatok_snatok_uttor_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $snatok_snatok_uttor_pre = $business_studies_bishesh_program['snatok_snatok_uttor_pre'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজনেস স্টাডিস অলিম্পিয়াড </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $bus_stu_olympiad_num = $business_studies_bishesh_program['bus_stu_olympiad_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bus_stu_olympiad_pre = $business_studies_bishesh_program['bus_stu_olympiad_pre'] ?>
                                </td>
                             

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সেমিনার, ওয়ার্কশপ, কেইস স্ট্যাডি</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sem_workshop_case_study_num = $business_studies_bishesh_program['sem_workshop_case_study_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sem_workshop_case_study_pre = $business_studies_bishesh_program['sem_workshop_case_study_pre'] ?>
                                </td>
                               

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">জব ফেয়ার </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $job_fear_num = $business_studies_bishesh_program['job_fear_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $job_fear_pre = $business_studies_bishesh_program['job_fear_pre'] ?>
                                </td>
                             

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">বিজনেস উদ্যোক্তা কর্মশালা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $bus_uddokta_num = $business_studies_bishesh_program['bus_uddokta_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bus_uddokta_pre = $business_studies_bishesh_program['bus_uddokta_pre'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবিদ তৈরির জন্য কর্মশালা</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $orthonitibid_create_workshop_num = $business_studies_bishesh_program['orthonitibid_create_workshop_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $orthonitibid_create_workshop_pre = $business_studies_bishesh_program['orthonitibid_create_workshop_pre'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবিদ তৈরির জন্য বিশেষ প্রোগ্রাম</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $orthonitibid_create_prog_num = $business_studies_bishesh_program['orthonitibid_create_prog_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $orthonitibid_create_prog_pre = $business_studies_bishesh_program['orthonitibid_create_prog_pre'] ?>
                                </td>
                              

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অর্থনীতিবিদদের সাথে মতবিনিময় প্রোগ্রাম </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $orthonitibid_motobinimoy_num = $business_studies_bishesh_program['orthonitibid_motobinimoy_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $orthonitibid_motobinimoy_pre = $business_studies_bishesh_program['orthonitibid_motobinimoy_pre'] ?>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">অন্যান্য</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $other_num = $business_studies_bishesh_program['other_num'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $other_pre = $business_studies_bishesh_program['other_pre'] ?>
                                </td>
                              
                            </tr>

                        </table>
                    </div>
			   </div>
            </div>
        </div>
    </div>
</div>

