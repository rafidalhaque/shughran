<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ ও প্রশিক্ষণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/media-sovasumoho-proshikkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-sovasumoho-proshikkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                               
                              
                                <td class="tg-pwj7" rowspan="9" >সভাসমূহ ও প্রশিক্ষণ</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >  মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >গড়</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >  মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >গড়</td>
                                
                                
                            </tr>



                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> স্কিল ডেভলপমেন্ট প্রোগ্রাম	</td>
                               
                                <td class="tg-0pky" >
                                <?php echo $skldpmpg_s = $total_media_bivag4['skldpmpg_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $skldpmpg_mup = $total_media_bivag4['skldpmpg_mup'] ?>
                                </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($skldpmpg_s!=0)?$skldpmpg_mup/$skldpmpg_s:0,2)?>
                                </td>
                                <td class="tg-y698" >এডমিন সভা </td>
                                <td class="tg-0pky" >
                                 <?php echo $adms_s = $total_media_bivag4['adms_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $adms_mup = $total_media_bivag4['adms_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($adms_s!=0)?$adms_mup/$adms_s:0,2)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">প্লানিং প্রোগ্রাম (রাইটিং ও অন্যান্য) </td>
                                <td class="tg-0pky" >
                                 <?php echo $plnpgronan_s = $total_media_bivag4['plnpgronan_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $plnpgronan_mup= $total_media_bivag4['plnpgronan_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($plnpgronan_s!=0)?$plnpgronan_mup/$plnpgronan_s:0,2)?>
                                </td>
                                <td class="tg-y698" >প্রোগ্রাম সভা</td>
                                <td class="tg-0pky" >
                                  <?php echo $pgs_s= $total_media_bivag4['pgs_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $pgs_mup= $total_media_bivag4['pgs_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($pgs_s!=0)?$pgs_mup/$pgs_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">ফিচার/ কলাম/স্পেশাল নিউজ রাইটিং প্রোগ্রাম </td>
                                <td class="tg-0pky" >
                                  <?php echo $fkspnrpg_s= $total_media_bivag4['fkspnrpg_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $fkspnrpg_mup= $total_media_bivag4['fkspnrpg_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($fkspnrpg_s!=0)?$fkspnrpg_mup/$fkspnrpg_s:0,2)?>
                                </td>
                                <td class="tg-y698" > সাধারণ সভা  </td>
                                <td class="tg-0pky" >
                                  <?php echo $sdhns_s= $total_media_bivag4['sdhns_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $sdhns_mup= $total_media_bivag4['sdhns_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sdhns_s!=0)?$sdhns_mup/$sdhns_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">নিউজ স্ক্রীপ্ট/ প্রেজেন্টিং/রিপোটিং প্রোগ্রাম</td>
                                <td class="tg-0pky" >
                                  <?php echo $nsprpg_s= $total_media_bivag4['nsprpg_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $nsprpg_mup= $total_media_bivag4['nsprpg_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($nsprpg_s!=0)?$nsprpg_mup/$nsprpg_s:0,2)?>
                                </td>
                                <td class="tg-y698" >সংবর্ধনা অনুষ্ঠান</td>
                                <td class="tg-0pky" >
                                  <?php echo $sbdho_s= $total_media_bivag4['sbdho_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                  <?php echo $sbdho_mup= $total_media_bivag4['sbdho_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sbdho_s!=0)?$sbdho_mup/$sbdho_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মরত সাংবাদিকদের সাথে বৈঠক</td>
                                <td class="tg-0pky" >
                                 <?php echo $ksbdkdsb_s= $total_media_bivag4['ksbdkdsb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $ksbdkdsb_mup= $total_media_bivag4['ksbdkdsb_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($ksbdkdsb_s!=0)?$ksbdkdsb_mup/$ksbdkdsb_s:0,2)?>
                                </td>
                                <td class="tg-y698" > সেটআপ প্রোগ্রাম</td>
                                <td class="tg-0pky" >
                                 <?php echo $suppg_s= $total_media_bivag4['suppg_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $suppg_mup= $total_media_bivag4['suppg_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($suppg_s!=0)?$suppg_mup/$suppg_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">সাঙ্গবাদিকতায় আগ্রহীদের নিয়ে বৈঠক</td>
                                <td class="tg-0pky" >
                                 <?php echo $sbdkadnb_s= $total_media_bivag4['sbdkadnb_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sbdkadnb_mup= $total_media_bivag4['sbdkadnb_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sbdkadnb_s!=0)?$sbdkadnb_mup/$sbdkadnb_s:0,2)?>
                                </td>
                                <td class="tg-y698" >শিক্ষাসফর</td>
                                <td class="tg-0pky" >
                                 <?php echo $shkhas_s= $total_media_bivag4['shkhas_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shkhas_mup= $total_media_bivag4['shkhas_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($shkhas_s!=0)?$shkhas_mup/$shkhas_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">টিভি রিপোটিং ও সাংবাদিকতা কোর্সের ক্লাস</td>
                                <td class="tg-0pky" >
                                 <?php echo $tvrsbdkkk_s= $total_media_bivag4['tvrsbdkkk_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $tvrsbdkkk_mup= $total_media_bivag4['tvrsbdkkk_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($tvrsbdkkk_s!=0)?$tvrsbdkkk_mup/$tvrsbdkkk_s:0,2)?>
                                </td>
                                <td class="tg-y698" > সাংবাদিক সমাবেশ  </td>
                                <td class="tg-0pky" >
                                 <?php echo $sbdks_s= $total_media_bivag4['sbdks_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sbdks_mup= $total_media_bivag4['sbdks_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sbdks_s!=0)?$sbdks_mup/$sbdks_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যামেরা অপারেশন কোর্সের ক্লাস</td>
                                <td class="tg-0pky" >
                                 <?php echo $kapkk_s= $total_media_bivag4['kapkk_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $kapkk_mup= $total_media_bivag4['kapkk_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($kapkk_s!=0)?$kapkk_mup/$kapkk_s:0,2)?>
                                </td>
                                <td class="tg-y698" > ইফতার </td>
                                <td class="tg-0pky" >
                                 <?php echo $eptar_s= $total_media_bivag4['eptar_s'] ?>
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $eptar_mup= $total_media_bivag4['eptar_mup'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($eptar_mup!=0)?$eptar_mup/$eptar_s:0,2)?>
                                </td>
                                

                            </tr>


                            


                            
                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
