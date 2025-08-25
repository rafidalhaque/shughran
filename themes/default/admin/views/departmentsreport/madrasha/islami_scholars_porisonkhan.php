<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'ইসলামী স্কলারস পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/islami-scholars-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/islami-scholars-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class='tg-pwj7' colspan='5'>
                            আউটপুট
                            </td>
                           </tr>
                            <tr>
                                
                                <td class="tg-pwj7"> ধরন</td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাংগঠনিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>অন্যান্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>নতুন নিয়োগ </span></div></td>
                                
                               
                            </tr>

                            <?php 
                              $akh_r=  (isset( $total_islamik_skolars_porisonkhan['akh_r']))? $total_islamik_skolars_porisonkhan['akh_r']:'';
                              $akh_sg=  (isset( $total_islamik_skolars_porisonkhan['akh_sg']))? $total_islamik_skolars_porisonkhan['akh_sg']:'';
                              $akh_b=  (isset( $total_islamik_skolars_porisonkhan['akh_b']))? $total_islamik_skolars_porisonkhan['akh_b']:''
                            ?>


                            <tr>
                                
                                <td class="tg-y698  type_1">অধ্যক্ষ</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $akh=($akh_r+$akh_sg+$akh_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $akh_r=$total_islamik_skolars_porisonkhan['akh_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $akh_sg=$total_islamik_skolars_porisonkhan['akh_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $akh_b=$total_islamik_skolars_porisonkhan['akh_b'] ?>
                                </td>
                               
                                

                            </tr>
                            <?php 
                              $updhkh_r=  (isset( $total_islamik_skolars_porisonkhan['updhkh_r']))? $total_islamik_skolars_porisonkhan['updhkh_r']:'';
                              $updhkh_sg=  (isset( $total_islamik_skolars_porisonkhan['updhkh_sg']))? $total_islamik_skolars_porisonkhan['updhkh_sg']:'';
                              $updhkh_b=  (isset( $total_islamik_skolars_porisonkhan['updhkh_b']))? $total_islamik_skolars_porisonkhan['updhkh_b']:''
                            ?>

                            <tr>
                               
                                <td class="tg-y698">উপাধ্যক্ষ</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $updhkh=($updhkh_r+$updhkh_sg+$updhkh_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $updhkh_r=$total_islamik_skolars_porisonkhan['updhkh_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $updhkh_sg=$total_islamik_skolars_porisonkhan['updhkh_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $updhkh_b=$total_islamik_skolars_porisonkhan['updhkh_b'] ?>
                                </td>
                                

                            </tr>
                            <?php 
                              $mha_r=  (isset( $total_islamik_skolars_porisonkhan['mha_r']))? $total_islamik_skolars_porisonkhan['mha_r']:'';
                              $mha_sg=  (isset( $total_islamik_skolars_porisonkhan['mha_sg']))? $total_islamik_skolars_porisonkhan['mha_sg']:'';
                              $mha_b=  (isset( $total_islamik_skolars_porisonkhan['mha_b']))? $total_islamik_skolars_porisonkhan['mha_b']:''
                            ?>
                            <tr>
                              
                                <td class="tg-y698">মুহাদ্দিস/মুফাসসির</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $mha=($mha_r+$mha_sg+$mha_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $mha_r=$total_islamik_skolars_porisonkhan['mha_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $mha_sg=$total_islamik_skolars_porisonkhan['mha_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $mha_b=$total_islamik_skolars_porisonkhan['mha_b'] ?>
                                </td>
                                
                            </tr>
                            <?php 
                              $apr_r=  (isset( $total_islamik_skolars_porisonkhan['apr_r']))? $total_islamik_skolars_porisonkhan['apr_r']:'';
                              $apr_sg=  (isset( $total_islamik_skolars_porisonkhan['apr_sg']))? $total_islamik_skolars_porisonkhan['apr_sg']:'';
                              $apr_b=  (isset( $total_islamik_skolars_porisonkhan['apr_b']))? $total_islamik_skolars_porisonkhan['apr_b']:''
                            ?>
                            <tr>
                                
                                <td class="tg-y698">পীর-মাশায়েখ</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $apr=($apr_r+$apr_sg+$apr_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $apr_r=$total_islamik_skolars_porisonkhan['apr_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $apr_sg=$total_islamik_skolars_porisonkhan['apr_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $apr_b=$total_islamik_skolars_porisonkhan['apr_b'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                
                                <td class="tg-y698">লেকচারার (অনার্স)</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $apr=($apr_r+$apr_sg+$apr_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $apr_r=$total_islamik_skolars_porisonkhan['apr_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $apr_sg=$total_islamik_skolars_porisonkhan['apr_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $apr_b=$total_islamik_skolars_porisonkhan['apr_b'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                
                                <td class="tg-y698">আরবি প্রভাষক</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $apr=($apr_r+$apr_sg+$apr_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $apr_r=$total_islamik_skolars_porisonkhan['apr_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $apr_sg=$total_islamik_skolars_porisonkhan['apr_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $apr_b=$total_islamik_skolars_porisonkhan['apr_b'] ?>
                                </td>
                                
                            </tr>
                            <?php 
                              $sp_r=  (isset( $total_islamik_skolars_porisonkhan['sp_r']))? $total_islamik_skolars_porisonkhan['sp_r']:'';
                              $sp_sg=  (isset( $total_islamik_skolars_porisonkhan['sp_sg']))? $total_islamik_skolars_porisonkhan['sp_sg']:'';
                              $sp_b=  (isset( $total_islamik_skolars_porisonkhan['sp_b']))? $total_islamik_skolars_porisonkhan['sp_b']:''
                            ?>
                            <tr>
                             
                                <td class="tg-y698"> সুপার</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $sp=($sp_r+$sp_sg+$sp_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sp_r=$total_islamik_skolars_porisonkhan['sp_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sp_sg=$total_islamik_skolars_porisonkhan['sp_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sp_b=$total_islamik_skolars_porisonkhan['sp_b'] ?>
                                </td>
                                
                            </tr>
                            <?php 
                              $og_r=  (isset( $total_islamik_skolars_porisonkhan['og_r']))? $total_islamik_skolars_porisonkhan['og_r']:'';
                              $og_sg=  (isset( $total_islamik_skolars_porisonkhan['og_sg']))? $total_islamik_skolars_porisonkhan['og_sg']:'';
                              $og_b=  (isset( $total_islamik_skolars_porisonkhan['og_b']))? $total_islamik_skolars_porisonkhan['og_b']:''
                            ?>
                            <tr>
                               
                                <td class="tg-y698">ওয়ায়েজীন</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $og=($og_r+$og_sg+$og_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $og_r=$total_islamik_skolars_porisonkhan['og_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $og_sg=$total_islamik_skolars_porisonkhan['og_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $og_b=$total_islamik_skolars_porisonkhan['og_b'] ?>
                                </td>
                                
                            </tr>
                            <?php 
                              $sm_r=  (isset( $total_islamik_skolars_porisonkhan['sm_r']))? $total_islamik_skolars_porisonkhan['sm_r']:'';
                              $sm_sg=  (isset( $total_islamik_skolars_porisonkhan['sm_sg']))? $total_islamik_skolars_porisonkhan['sm_sg']:'';
                              $sm_b=  (isset( $total_islamik_skolars_porisonkhan['sm_b']))? $total_islamik_skolars_porisonkhan['sm_b']:''
                            ?>
                            <tr>
                                
                                <td class="tg-y698">সহকারী মৌলভী</td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $sm=($sm_r+$sm_sg+$sm_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sm_r=$total_islamik_skolars_porisonkhan['sm_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sm_sg=$total_islamik_skolars_porisonkhan['sm_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sm_b=$total_islamik_skolars_porisonkhan['sm_b'] ?>
                                </td>
                                
                            </tr>
                            <?php 
                              $kh_r=  (isset( $total_islamik_skolars_porisonkhan['kh_r']))? $total_islamik_skolars_porisonkhan['kh_r']:'';
                              $kh_sg=  (isset( $total_islamik_skolars_porisonkhan['kh_sg']))? $total_islamik_skolars_porisonkhan['kh_sg']:'';
                              $kh_b=  (isset( $total_islamik_skolars_porisonkhan['kh_b']))? $total_islamik_skolars_porisonkhan['kh_b']:''
                            ?>
                            <tr>
                               
                                <td class="tg-y698">খতিব/ইমাম/মুয়াজ্জিন </td>
                                <td class="tg-0pky  type_2">
                                <?php echo  $kh=($kh_r+$kh_sg+$kh_b)?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kh_r=$total_islamik_skolars_porisonkhan['kh_r'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kh_sg=$total_islamik_skolars_porisonkhan['kh_sg'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $kh_b=$total_islamik_skolars_porisonkhan['kh_b'] ?>
                                </td>
                               
                            </tr>
                            <?php 
                              $mt_r=  (isset( $total_islamik_skolars_porisonkhan['mt_r']))? $total_islamik_skolars_porisonkhan['mt_r']:'';
                              $mt_sg=  (isset( $total_islamik_skolars_porisonkhan['mt_sg']))? $total_islamik_skolars_porisonkhan['mt_sg']:'';
                              $mt_b=  (isset( $total_islamik_skolars_porisonkhan['mt_b']))? $total_islamik_skolars_porisonkhan['mt_b']:''
                            ?>
                            

                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
