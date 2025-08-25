<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রতিষ্ঠানভিত্তিক জনশক্তির অধ্যয়নের পরিসংখ্যান ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                      
                         
                        
                        
                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/protisthanvittik-jonosokti-oddhoyoner-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/protisthanvittik-jonosokti-oddhoyoner-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				
				
                <div class="table-responsive">
				
	
				<style type="text/css">
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
                            <tr>
                                <td class="tg-pwj7" rowspan="3">ক্রম</td>
                                <td class="tg-pwj7" rowspan="3" colspan="2">প্রতিষ্ঠান </td>
                                <td class="tg-pwj7" colspan="9">জনশক্তি  </td>
                                <td class="tg-pwj7" rowspan="3">সর্বমোট </td>
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" colspan="3"> সদস্য </td>
                                <td class="tg-pwj7" colspan="3">সাথী  </td>
                                <td class="tg-pwj7" colspan="3">কর্মী  </td>
                            </tr>
                            <tr>
 
                                <td class="tg-pwj7 "><div><span>বিজ্ঞান</span></div></td>
                                <td class="tg-pwj7 "><div><span>মানবিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>বাণিজ্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>বিজ্ঞান</span></div></td>
                                <td class="tg-pwj7 "><div><span>মানবিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>বাণিজ্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>বিজ্ঞান</span></div></td>
                                <td class="tg-pwj7 "><div><span>মানবিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>বাণিজ্য </span></div></td>

                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"rowspan="3">ক</td>
                                <td class="tg-0pky  type_1" rowspan="3">
                                শুধুমাত্র সাধারণ
                                </td>
                                <td class="tg-0pky  type_2" >
                                স্কুল
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sms_s_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sms_s_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sms_s_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sms_s_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sms_s_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sms_s_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sms_s_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sms_s_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sms_s_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_s_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sms_s_j_s_b!=0)? $total_school=($sms_s_j_s_b+$sms_s_j_s_m+$sms_s_j_s_bj+$sms_s_j_sa_b+$sms_s_j_sa_m+$sms_s_j_sa_bj+$sms_s_j_k_b+$sms_s_j_k_m+$sms_s_j_k_bj):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky">কলেজ</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sms_c_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sms_c_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sms_c_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sms_c_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sms_c_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sms_c_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sms_c_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sms_c_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sms_c_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_c_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sms_c_j_s_b!=0)?$total_college=($sms_c_j_s_b+$sms_c_j_s_m+$sms_c_j_s_bj+$sms_c_j_sa_b+$sms_c_j_sa_m+$sms_c_j_sa_bj+$sms_c_j_k_b+$sms_c_j_k_m+$sms_c_j_k_bj):0?>
                                </td>
                            <tr>
                                <td class="tg-0pky">বিশ্ববিদ্যালয়</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sms_bi_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sms_bi_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sms_bi_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sms_bi_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sms_bi_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sms_bi_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sms_bi_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sms_bi_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sms_bi_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['sms_bi_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo($sms_bi_j_s_b!=0)? $total_bissobiddaloy=($sms_bi_j_s_b+$sms_bi_j_s_m+$sms_bi_j_s_bj+$sms_bi_j_sa_b+$sms_bi_j_sa_m+$sms_bi_j_sa_bj+$sms_bi_j_k_b+$sms_bi_j_k_m+$sms_bi_j_k_bj):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"rowspan="2">খ</td>
                                <td class="tg-0pky  type_1" rowspan="2">
                                শুধুমাত্র মাদরাসা
                                </td>
                                <td class="tg-0pky  type_2" >
                                আলিয়া
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $smm_a_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $smm_a_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $smm_a_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $smm_a_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $smm_a_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $smm_a_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $smm_a_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $smm_a_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $smm_a_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_a_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($smm_a_j_s_b!=0)?$total_alia=($smm_a_j_s_b+$smm_a_j_s_m+$smm_a_j_s_bj+$smm_a_j_sa_b+$smm_a_j_sa_m+$smm_a_j_sa_bj+$smm_a_j_k_b+$smm_a_j_k_m+$smm_a_j_k_bj):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">কাওমি</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $smm_k_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $smm_k_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $smm_k_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $smm_k_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $smm_k_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $smm_k_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $smm_k_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $smm_k_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $smm_k_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['smm_k_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($smm_k_j_s_b!=0)?$total_bissobiddaloy_m=($smm_k_j_s_b+$smm_k_j_s_m+$smm_k_j_s_bj+$smm_k_j_sa_b+$smm_k_j_sa_m+$smm_k_j_sa_bj+$smm_k_j_k_b+$smm_k_j_k_m+$smm_k_j_k_bj):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">গ</td>
                                <td class="tg-0pky  type_1" colspan="2" >মাদরাসা ও সাধারণ উভয় জায়গাতে একইসাতে অধ্যয়নরত</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $msujaa_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $msujaa_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $msujaa_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $msujaa_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $msujaa_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $msujaa_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $msujaa_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $msujaa_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $msujaa_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['msujaa_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($msujaa_j_s_b!=0)?$total_bissobiddaloy_mad=($msujaa_j_s_b+$msujaa_j_s_m+$msujaa_j_s_bj+$msujaa_j_sa_b+$msujaa_j_sa_m+$msujaa_j_sa_bj+$msujaa_j_k_b+$msujaa_j_k_m+$msujaa_j_k_bj):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"colspan="3">মোট জনশক্তি</td>
                                
                                <td class="tg-0pky  type_2" >
                                <?php echo ($sms_s_j_s_b!=0)?($sms_s_j_s_b+$sms_c_j_s_b+$sms_bi_j_s_b+$smm_a_j_s_b+$smm_k_j_s_b+$msujaa_j_s_b):0?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($sms_s_j_s_m!=0)?($sms_s_j_s_m+$sms_c_j_s_m+$sms_bi_j_s_m+$smm_a_j_s_m+$smm_k_j_s_m+$msujaa_j_s_m):0?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo ($sms_s_j_s_bj!=0)?($sms_s_j_s_bj+$sms_c_j_s_bj+$sms_bi_j_s_bj+$smm_a_j_s_bj+$smm_k_j_s_bj+$msujaa_j_s_bj):0?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo ($sms_s_j_sa_b!=0)?($sms_s_j_sa_b+$sms_c_j_sa_b+$sms_bi_j_sa_b+$smm_a_j_sa_b+$smm_k_j_sa_b+$msujaa_j_sa_b):0?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo ($sms_s_j_sa_m!=0)?($sms_s_j_sa_m+$sms_c_j_sa_m+$sms_bi_j_sa_m+$smm_a_j_sa_m+$smm_k_j_sa_m+$msujaa_j_sa_m):0?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo ($sms_s_j_sa_bj!=0)?($sms_s_j_sa_bj+$sms_c_j_sa_bj+$sms_bi_j_sa_bj+$smm_a_j_sa_bj+$smm_k_j_sa_bj+$msujaa_j_sa_bj):0?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo ($sms_s_j_k_b!=0)?($sms_s_j_k_b+$sms_c_j_k_b+$sms_bi_j_k_b+$smm_a_j_k_b+$smm_k_j_k_b+$msujaa_j_k_b):0?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sms_s_j_k_m!=0)?($sms_s_j_k_m+$sms_c_j_k_m+$sms_bi_j_k_m+$smm_a_j_k_m+$smm_k_j_k_m+$msujaa_j_k_m):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sms_s_j_k_bj!=0)?($sms_s_j_k_bj+$sms_c_j_k_bj+$sms_bi_j_k_bj+$smm_a_j_k_bj+$smm_k_j_k_bj+$msujaa_j_k_bj):0?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($total_school!=0)?($total_school+$total_college+$total_bissobiddaloy+$total_alia+$total_bissobiddaloy_m+$total_bissobiddaloy_mad):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ঘ</td>
                                <td class="tg-0pky  type_1" colspan="2" >মাদরাসা থেকে আলিম পাশ করে কলেজ/বিশ্ববিদ্যালয়ে স্নাতক কিংবা স্নাতকোত্তরে অধ্যয়নরত</td>
                                <td class="tg-0pky  type_3">
                                <?php echo $mapkcbisska_j_s_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_s_b'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $mapkcbisska_j_s_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_s_m'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $mapkcbisska_j_s_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_s_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $mapkcbisska_j_sa_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_sa_b'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $mapkcbisska_j_sa_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_sa_m'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $mapkcbisska_j_sa_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_sa_bj'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $mapkcbisska_j_k_b=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_k_b'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $mapkcbisska_j_k_m=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_k_m'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $mapkcbisska_j_k_bj=$total_protisthanvittik_jonosoktir_oddhayner_porisonkhan['mapkcbisska_j_k_bj'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($mapkcbisska_j_k_bj!=0)?($mapkcbisska_j_k_bj+$mapkcbisska_j_k_bj+$mapkcbisska_j_k_bj+$mapkcbisska_j_k_bj+$mapkcbisska_j_k_bj+$mapkcbisska_j_k_bj):0?>
                                </td>
                            </tr>
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
