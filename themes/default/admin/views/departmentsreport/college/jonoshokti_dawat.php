<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি ও দাওয়াত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/jonoshokti-dawat') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jonoshokti-dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
.vertical{
  color: white;
    text-transform: uppercase;
    letter-spacing: 3px;
    position: absolute;
    bottom: 0;
    left: 0;
    margin-left: -30px;
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    transform: rotate(270deg);
    -webkit-transform-origin: 0 0;
    -moz-transform-origin: 0 0;
    -ms-transform-origin: 0 0;
    -o-transform-origin: 0 0;
    transform-origin: 0 0;
}
</style>
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                                <td class="tg-pwj7 " rowspan="3"><div><span> বর্তমান সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " rowspan="3"><div><span>মোট বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7" colspan="9" style="text-align:center;">বৃদ্ধি বিবরণ </td>
                                <td class="tg-pwj7" rowspan="2" colspan="8" style="text-align:center;"> আকর্ষণীয় প্রোগ্রাম  </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="5">ইন্টারমিডিয়েট সেকশন  </td>
                                <td class="tg-pwj7" colspan="4">ডিপ্লোমা </td>
                               
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span class="vertical">এসএসসি/দাখিল জিপিএ-৫.০০</span></div></td>
                                <td class="tg-pwj7 "><div><span>এসএসসি/দাখিল ৫<জিপিএ
≥৪ </td></span></div></td>
                                <td class="tg-pwj7 "><div><span>বিজ্ঞান </span></div></td>
                                <td class="tg-pwj7 "><div><span>মানবিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>ব্যবসায় শিক্ষা  </span></div></td>
                               

                                <td class="tg-pwj7 "><div><span>পলি টেকনিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মেরিন ইন্সটিটিউট </span></div></td>
                                <td class="tg-pwj7 "><div><span>টেক্সটাইল কলেজ </span></div></td>
                                <td class="tg-pwj7 "><div><span>আই এইচ টি </span></div></td>

                                <td class="tg-pwj7 "><div><span> প্রোগ্রামের ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত</span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রোগ্রামের ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত </span></div></td>
                             
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sod_bms = $total_jonoshokti_daoyat['sod_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $sod_mbr = $total_jonoshokti_daoyat['sod_mbr'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $sod_brbib_hossh_bgos = $total_jonoshokti_daoyat['sod_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sod_brbib_hossh_kbgos = $total_jonoshokti_daoyat['sod_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sod_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['sod_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sod_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['sod_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky  type_7"> </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $nb_s = $total_jonoshokti_daoyat['nb_s'] ?> </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $nb_upth = $total_jonoshokti_daoyat['nb_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                </td>
                                <td class="tg-0pky  type_11">
                                 <?php echo $kyrkusl_s = $total_jonoshokti_daoyat['kyrkusl_s'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    নবীন বরণ
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $kyrkusl_upth = $total_jonoshokti_daoyat['kyrkusl_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $kyrkusl_upth = $total_jonoshokti_daoyat['kyrkusl_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    নবীন বরণ
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $kyrkusl_upth = $total_jonoshokti_daoyat['kyrkusl_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $kyrkusl_upth = $total_jonoshokti_daoyat['kyrkusl_upth'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">প্রশ্নপত্র </td>
                                <td class="tg-0pky">
                                 <?php echo $ppt_bms = $total_jonoshokti_daoyat['ppt_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_mbr = $total_jonoshokti_daoyat['ppt_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ppt_brbib_hossh_bgos = $total_jonoshokti_daoyat['ppt_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_brbib_hossh_kbgos = $total_jonoshokti_daoyat['ppt_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['ppt_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['ppt_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_mbr = $total_jonoshokti_daoyat['ppt_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ppt_brbib_hossh_bgos = $total_jonoshokti_daoyat['ppt_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_brbib_hossh_kbgos = $total_jonoshokti_daoyat['ppt_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['ppt_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ppt_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['ppt_brbib_etrmets_5gpa4'] ?>
                                </td>

                                <td class="tg-0pky">
                                শিক্ষাসফর
                                </td>
                                <td class="tg-0pky">
                                <?php echo $shkhasof_s = $total_jonoshokti_daoyat['shkhasof_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $shkhasof_upth = $total_jonoshokti_daoyat['shkhasof_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                ক্যারিয়ার গাইডলাইন
                                </td>
                                <td class="tg-0pky  type_11">
                                 <?php echo $kyrgdln_s = $total_jonoshokti_daoyat['kyrgdln_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $kyrgdln_upth = $total_jonoshokti_daoyat['kyrgdln_upth'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">আবেদনপত্র  </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_bms = $total_jonoshokti_daoyat['abnp_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_mbr = $total_jonoshokti_daoyat['abnp_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_hossh_bgos = $total_jonoshokti_daoyat['abnp_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_hossh_kbgos = $total_jonoshokti_daoyat['abnp_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['abnp_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['abnp_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['abnp_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_hossh_kbgos = $total_jonoshokti_daoyat['abnp_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['abnp_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['abnp_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $abnp_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['abnp_brbib_etrmets_5gpa4'] ?>
                                </td>

                                <td class="tg-0pky">
                                কৃতি ছাত্র সংবর্ধনা
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $krchsbdhn_s = $total_jonoshokti_daoyat['krchsbdhn_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $krchsbdhn_upth = $total_jonoshokti_daoyat['krchsbdhn_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                ক্রিয়েটিভ সার্চিং প্রোগ্রাম 
                                </td>
                                <td class="tg-0pky  type_11">
                                 <?php echo $kytvtscpgm_s = $total_jonoshokti_daoyat['kytvtscpgm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $kytvtscpgm_upth = $total_jonoshokti_daoyat['kytvtscpgm_upth'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_bms = $total_jonoshokti_daoyat['sat_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_mbr = $total_jonoshokti_daoyat['sat_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_hossh_bgos = $total_jonoshokti_daoyat['sat_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_hossh_kbgos = $total_jonoshokti_daoyat['sat_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['sat_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['sat_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_mbr = $total_jonoshokti_daoyat['sat_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_hossh_bgos = $total_jonoshokti_daoyat['sat_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_hossh_kbgos = $total_jonoshokti_daoyat['sat_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['sat_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['sat_brbib_etrmets_5gpa4'] ?>
                                </td>

                                <td class="tg-0pky">
                                কুইজ প্রতিযোগিতা 
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $qugpjt_s = $total_jonoshokti_daoyat['qugpjt_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $qugpjt_upth = $total_jonoshokti_daoyat['qugpjt_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                সায়েন্স অলিম্পিয়াড
                                </td>
                                <td class="tg-0pky  type_11">
                                 <?php echo $scopyd_s = $total_jonoshokti_daoyat['scopyd_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                 <?php echo $scopyd_upth = $total_jonoshokti_daoyat['scopyd_upth'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> সাথী প্রার্থী 	</td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $satprth_bms = $total_jonoshokti_daoyat['satprth_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $satprth_mbr = $total_jonoshokti_daoyat['satprth_mbr'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $satprth_brbib_hossh_bgos = $total_jonoshokti_daoyat['satprth_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $satprth_brbib_hossh_kbgos = $total_jonoshokti_daoyat['satprth_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $satprth_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['satprth_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $satprth_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['satprth_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $satprth_mbr = $total_jonoshokti_daoyat['satprth_mbr'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $satprth_brbib_hossh_bgos = $total_jonoshokti_daoyat['satprth_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $satprth_brbib_hossh_kbgos = $total_jonoshokti_daoyat['satprth_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $satprth_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['satprth_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $satprth_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['satprth_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                অদম্য সংবর্ধনা
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $odmsbdh_s = $total_jonoshokti_daoyat['odmsbdh_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $odmsbdh_upth = $total_jonoshokti_daoyat['odmsbdh_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                ম্যাথ অলিম্পিয়াড
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $mthopyd_s = $total_jonoshokti_daoyat['mthopyd_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $mthopyd_upth = $total_jonoshokti_daoyat['mthopyd_upth'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">কর্মী   </td>
                                <td class="tg-0pky">
                                <?php echo $kor_bms = $total_jonoshokti_daoyat['kor_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_mbr = $total_jonoshokti_daoyat['kor_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $kor_brbib_hossh_bgos = $total_jonoshokti_daoyat['kor_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_brbib_hossh_kbgos = $total_jonoshokti_daoyat['kor_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['kor_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['kor_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_mbr = $total_jonoshokti_daoyat['kor_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $kor_brbib_hossh_bgos = $total_jonoshokti_daoyat['kor_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_brbib_hossh_kbgos = $total_jonoshokti_daoyat['kor_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['kor_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['kor_brbib_etrmets_5gpa4'] ?>
                                </td>
                                

                                <td class="tg-0pky">
                                বিতর্ক প্রতিযোগিতা 
                                </td>
                                <td class="tg-0pky">
                                <?php echo $btkpjta_s = $total_jonoshokti_daoyat['btkpjta_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $btkpjta_upth = $total_jonoshokti_daoyat['btkpjta_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                মডেল টেস্ট
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $mdtst_s = $total_jonoshokti_daoyat['mdtst_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $mdtst_upth = $total_jonoshokti_daoyat['mdtst_upth'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <?php echo $som_bms = $total_jonoshokti_daoyat['som_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_mbr = $total_jonoshokti_daoyat['som_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_hossh_bgos = $total_jonoshokti_daoyat['som_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_hossh_kbgos = $total_jonoshokti_daoyat['som_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['som_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['som_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_mbr = $total_jonoshokti_daoyat['som_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_hossh_bgos = $total_jonoshokti_daoyat['som_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_hossh_kbgos = $total_jonoshokti_daoyat['som_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['som_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $som_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['som_brbib_etrmets_5gpa4'] ?>
                                </td>

                                <td class="tg-0pky">
                                ক্রীড়া প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky">
                                <?php echo $krpjta_s = $total_jonoshokti_daoyat['krpjta_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $krpjta_upth = $total_jonoshokti_daoyat['krpjta_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                ভাষা শিক্ষা কোর্স 
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $vsshkak_s = $total_jonoshokti_daoyat['vsshkak_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $vsshkak_upth = $total_jonoshokti_daoyat['vsshkak_upth'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_bms = $total_jonoshokti_daoyat['bondu_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_mbr = $total_jonoshokti_daoyat['bondu_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_hossh_bgos = $total_jonoshokti_daoyat['bondu_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_hossh_kbgos = $total_jonoshokti_daoyat['bondu_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['bondu_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['bondu_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_mbr = $total_jonoshokti_daoyat['bondu_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_hossh_bgos = $total_jonoshokti_daoyat['bondu_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_hossh_kbgos = $total_jonoshokti_daoyat['bondu_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['bondu_brbib_etrmets_gpa5'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bondu_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['bondu_brbib_etrmets_5gpa4'] ?>
                                </td>
                                


                                <td class="tg-0pky">
                                টুর্নামেন্ট 
                                </td>
                                <td class="tg-0pky">
                                <?php echo $tunmnt_s = $total_jonoshokti_daoyat['tunmnt_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $tunmnt_upth = $total_jonoshokti_daoyat['tunmnt_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                অন্যান্য
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $onnoanno_s = $total_jonoshokti_daoyat['onnoanno_s'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $onnoanno_upth = $total_jonoshokti_daoyat['onnoanno_upth'] ?>
                                </td>
                                
                            </tr>
                            <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_bms = $total_jonoshokti_daoyat['upsh_bms'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_mbr = $total_jonoshokti_daoyat['upsh_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_hossh_bgos = $total_jonoshokti_daoyat['upsh_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_hossh_kbgos = $total_jonoshokti_daoyat['upsh_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['upsh_brbib_etrmets_gpa5'] ?>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['upsh_brbib_etrmets_5gpa4'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_mbr = $total_jonoshokti_daoyat['upsh_mbr'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_hossh_bgos = $total_jonoshokti_daoyat['upsh_brbib_hossh_bgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_hossh_kbgos = $total_jonoshokti_daoyat['upsh_brbib_hossh_kbgos'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_etrmets_gpa5 = $total_jonoshokti_daoyat['upsh_brbib_etrmets_gpa5'] ?>
                                <td class="tg-0pky">
                                <?php echo $upsh_brbib_etrmets_5gpa4 = $total_jonoshokti_daoyat['upsh_brbib_etrmets_5gpa4'] ?>
                                </td>

                                <td class="tg-0pky">
                                দিবস পালন
                                </td>
                                <td class="tg-0pky">
                                <?php echo $dbspln_s = $total_jonoshokti_daoyat['dbspln_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $dbspln_upth = $total_jonoshokti_daoyat['dbspln_upth'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                
                                </td>
                                <td class="tg-0pky  type_11">
                                
                                </td>
                                <td class="tg-0pky  type_12">
                                
                                </td>
                            </tr>



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
