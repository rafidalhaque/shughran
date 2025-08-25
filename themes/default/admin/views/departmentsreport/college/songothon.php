<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সংগঠন(ইন্টারমিডিয়েট সেকশন আসে এমন কলেজ এবং পলিটেকনিক,মেরিন,টেক্সটাইল ইনস্টিটিউট,আইএইচটি)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <div class="col 12">
                            <tr>
                                <td class="tg-pwj7" colspan="">ধরন</td>
                                <td class="tg-pwj7" colspan="3">প্রতিষ্ঠান  </td>
                                <td class="tg-pwj7" colspan="4">সংগঠন   </td>
                                <td class="tg-pwj7" colspan="3">  আদর্শ থানা শাখা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> থানা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> ওয়ার্ড মানে  </td>
                                <td class="tg-pwj7" colspan="3">উপশাখা  মানের  </td>
                                <td class="tg-pwj7" colspan="3">সমর্থক সংগঠন  </td>
                            </tr>
                            </div>

                            <tr>
                                <td class="tg-y698 "><div><span>কলেজ </span></div></td>

                                <td class="tg-pwj7"><div><span> সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>নেই </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>
                               

                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি</span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                               <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>
                               
                               <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                               <td class="tg-pwj7 "><div><span>ঘাটতি  </span></div></td>




                            <tr>
                                <td class="tg-y698 ">সরকারি কলেজ	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $skcllg_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $skcllg_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_br'] ?>
                                </td>

                                <td class="tg-0pky  type_3">
                                  <?php echo $skcllg_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_gh'] ?>
                                </td>

                                <td class="tg-0pky  type_4">
                                  <?php echo $skcllg_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_s'] ?>
                                </td>

                                <td class="tg-0pky  type_5">
                                  <?php echo $skcllg_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_nei'] ?>
                                </td>

                                <td class="tg-0pky  type_6">
                                  <?php echo $skcllg_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_br'] ?>
                                </td>

                                <td class="tg-0pky  type_7">
                                  <?php echo $skcllg_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_gh'] ?>
                                </td>

                                <td class="tg-0pky  type_8">
                                  <?php echo $skcllg_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_s'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                  <?php echo $skcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_br'] ?>
                                </td>


                                <td class="tg-0pky  type_9">
                                  <?php echo $skcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_gh'] ?>
                                </td>


                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_s'] ?>
                                </td>

                                <td class="tg-0pky  type_10">
                                <?php echo $skcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_br'] ?>
                                </td>


                                <td class="tg-0pky  type_10">
                                <?php echo $skcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_gh'] ?>
                                </td>


                                <td class="tg-0pky  type_6">
                                 <?php echo $skcllg_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_s'] ?>
                                </td>

                                <td class="tg-0pky  type_7">
                                 <?php echo $skcllg_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_br'] ?>
                                </td>

                                <td class="tg-0pky  type_7">
                                 <?php echo $skcllg_ordm_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_gh'] ?>
                                </td>

                                <td class="tg-0pky  type_8">
                                <?php echo $skcllg_upm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_s'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">

                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_gh'] ?>

                                </td>

                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_br'] ?>
                                </td>

                                <td class="tg-0pky  type_10">

                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_gh'] ?>

                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">বেসরকারি কলেজ </td>
                                <td class="tg-0pky">
                                  <?php echo $bekcllg_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $bekcllg_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_br'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $bekcllg_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_gh'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $bekcllg_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $bekcllg_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_nei'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $bekcllg_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_br'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $bekcllg_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_gh'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $bekcllg_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $bekcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">

                                 <?php echo $bekcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $bekcllg_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $bekcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">

                                 <?php echo $bekcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $bekcllg_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $bekcllg_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">

                                 <?php echo $bekcllg_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_8">
                                 <?php echo $bekcllg_upm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $bekcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">

                                 <?php echo $bekcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $bekcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $bekcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">

                                 <?php echo $bekcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_gh'] ?>
                                </td>
                               


                            </tr>
                            <tr>
                                <td class="tg-y698">সরকারি পলিটেকনিক </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_br'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_gh'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_nei'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_br'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_gh'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $skptk_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $skptk_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">

                                  <?php echo $skptk_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $skptk_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $skptk_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">

                                  <?php echo $skptk_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $skptk_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <?php echo $skptk_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">

                                  <?php echo $skptk_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $skptk_upm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $skptk_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">

                                  <?php echo $skptk_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $skptk_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                   <?php echo $skptk_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">

                                   <?php echo $skptk_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_gh'] ?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারি পলিটেকনিক </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_br'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_gh'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_nei'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_br'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_gh'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $bekptk_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $bekptk_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">

                                  <?php echo $bekptk_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $bekptk_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $bekptk_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">

                                  <?php echo $bekptk_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $bekptk_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <?php echo $bekptk_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">

                                  <?php echo $bekptk_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $bekptk_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $bekptk_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_br'] ?>
                                </td>

                                <td class="tg-0pky  type_9">
                                  <?php echo $bekptk_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_gh'] ?>

                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $bekptk_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                  <?php echo $bekptk_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">


                                  <?php echo $bekptk_somso_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_gh'] ?>
                                </td>
                                


                            </tr>

                            <tr>
                                <td class="tg-y698 ">মেরিন ইনস্টিটিউট 	</td>
                                <td class="tg-0pky  type_1">

                                  
                                    <?php echo $skcllg_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $skcllg_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_br'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $skcllg_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                  <?php echo $skcllg_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_s'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $skcllg_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_nei'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $skcllg_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <?php echo $skcllg_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $skcllg_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $skcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $skcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $skcllg_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $skcllg_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $skcllg_upm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_gh'] ?>

                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 ">টেক্সটাইল কলেজ 	</td>
                                <td class="tg-0pky  type_1">

                                    <?php echo $skcllg_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $skcllg_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_br'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $skcllg_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                  <?php echo $skcllg_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_s'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $skcllg_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_nei'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $skcllg_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <?php echo $skcllg_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $skcllg_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $skcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $skcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $skcllg_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $skcllg_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $skcllg_upm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">

                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_gh'] ?>
                                </td>
                                

                            </tr>

                            <tr>
                                <td class="tg-y698 ">আই এইচ টি 	</td>
                                <td class="tg-0pky  type_1">

                                    <?php echo $skcllg_pth_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $skcllg_pth_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_br'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $skcllg_pth_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                  <?php echo $skcllg_so_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_s'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $skcllg_so_nei = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_nei'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $skcllg_so_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <?php echo $skcllg_so_gh = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $skcllg_sashm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $skcllg_sashm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_thm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $skcllg_thm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $skcllg_ordm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $skcllg_ordm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $skcllg_upm_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_br'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $skcllg_upm_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_gh'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_s = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_br'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                 <?php echo $skcllg_somso_br = $total_songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_gh'] ?>

                                </td>

                            </tr>
                         
                            
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
