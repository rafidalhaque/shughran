<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'এক নজরে কওমি মাদ্রাসা সংগঠন   ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/ek-nojore-kaomi-songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ek-nojore-kaomi-songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                <td class="tg-pwj7" rowspan="2">মাদরাসা</td>
                                <td class="tg-pwj7" rowspan="2"style="">মোট </td>
                                <td class="tg-pwj7" rowspan="2"style="">  সংগঠন আছে </td>
                                <td class="tg-pwj7" rowspan="2" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" rowspan="2">থানা মানের </td>
                                <td class="tg-pwj7" rowspan="2">বৃদ্ধি  </td>
                                <td class="tg-pwj7" rowspan="2" >ওয়ার্ড/জোন মাানের </td>
                                <td class="tg-pwj7" rowspan="2" style="">বৃদ্ধি </td>
                                <td class="tg-pwj7" rowspan="2" style="">উপশাখা মানের</td>
                                <td class="tg-pwj7"  rowspan="2" >বৃদ্ধি </td>
                                <td class="tg-pwj7" rowspan="2" style=""> মুয়ায়্যিদ সংগঠন </td>
                                <td class="tg-pwj7" rowspan="2" style="">বৃদ্ধি </td>
                                <td class="tg-pwj7" rowspan="2" >সংগঠন নেই</td>
                                <td class="tg-pwj7" colspan="4" > কওমি ওলামায়ে কিরাম পরিসংখ্যান </td>
         
                                
                            </tr>

                            <tr>

                            <td class="tg-pwj7" style="">ধরন </td>
                            <td class="tg-pwj7" style=""> মোট </td>
                            <td class="tg-pwj7" style=""> সাংগঠনিক </td>
                            <td class="tg-pwj7" style=""> বিরুধী </td>

                         </tr>                 
                     
                          <tr>
                                <td class="tg-y698 type_1">ইফতা তাখাস্সুস</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> মুহাদ্দিস/মুফাসসির
                                
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">দাওরায়ে হাদিস</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> পীর মাশায়েখ
                               
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                               
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">মেশকাত</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> মুহতামিম
                                
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                               
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">জালালাইন</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> মুফতি
                                
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                               
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">কাফিয়া</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> ওয়ায়েজিন
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                               
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">হাফেজিয়া</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> খতিব/ইমাম/মুয়াজ্জিন
                               
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">নূরাণী মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> কওমী শিক্ষক
                               
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1">মোট</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_">
                                <?php echo $sodosso_t_k=$total_ak_nojore_songothon['sodosso_t_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_a=$total_ak_nojore_songothon['sodosso_g_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_8"> নূরাণী শিক্ষক
                                
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_g_k=$total_ak_nojore_songothon['sodosso_g_k'] ?>
                                </td> 
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                               
                            </tr>



                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
