<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রশিক্ষণ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/it-proshikkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-proshikkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>

                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>
  
                       
                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-y698 type_1">বেসিক কম্পিউটার 	</td>
                       <td class="tg-0pky  type_1">
                           <?php echo $bscmput_s = $total_proshikkhon['bscmput_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $bscmput_upthi = $total_proshikkhon['bscmput_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ফটোশপ	</td>
                       <td class="tg-0pky  type_1">
                           <?php echo $bscmput_s = $total_proshikkhon['bscmput_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $bscmput_upthi = $total_proshikkhon['bscmput_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">বেসিক মোবাইল (আন্ড্রয়েড) 	</td>
                       <td class="tg-0pky  type_1">
                           <?php echo $bscmput_s = $total_proshikkhon['bscmput_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $bscmput_upthi = $total_proshikkhon['bscmput_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ইলাস্ট্রটের	</td>
                       <td class="tg-0pky  type_1">
                           <?php echo $bscmput_s = $total_proshikkhon['bscmput_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $bscmput_upthi = $total_proshikkhon['bscmput_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> মাইক্রোসফট ওয়ার্ড 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $msford_s = $total_proshikkhon['msford_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $msford_upthi = $total_proshikkhon['msford_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msford_s!=0)?($msford_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ভিডিও এডিটিং	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $msford_s = $total_proshikkhon['msford_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $msford_upthi = $total_proshikkhon['msford_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msford_s!=0)?($msford_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">মাইক্রোসফট এক্সেল	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $msfexl_s = $total_proshikkhon['msfexl_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $msfexl_upthi = $total_proshikkhon['msfexl_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msfexl_s!=0)?($msfexl_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ওয়েব ডেভেলপমেন্ট	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $msfexl_s = $total_proshikkhon['msfexl_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $msfexl_upthi = $total_proshikkhon['msfexl_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msfexl_s!=0)?($msfexl_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">  মাইক্রোসফট পাওয়ারপয়ন্টে</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pwrp_s = $total_proshikkhon['pwrp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $pwrp_upthi = $total_proshikkhon['pwrp_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($pwrp_s!=0)?($pwrp_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অ্যাপ ডেভেলপমেন্ট  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $web_s = $total_proshikkhon['web_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $web_upthi = $total_proshikkhon['web_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($pwrp_s!=0)?($pwrp_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ফেসবুক	</td>
                       <td class="tg-0pky  type_1">
                        <?php echo $fb_s = $total_proshikkhon['fb_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $fb_upthi = $total_proshikkhon['fb_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($fb_s!=0)?($fb_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1">বেসিক ইন্টারনেট</td>
                       <td class="tg-0pky  type_1">
                        <?php echo $fb_s = $total_proshikkhon['fb_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                        <?php echo $fb_upthi = $total_proshikkhon['fb_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($fb_s!=0)?($fb_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> টুইটার	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tutr_s = $total_proshikkhon['tutr_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tutr_upthi = $total_proshikkhon['tutr_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($tutr_s!=0)?($tutr_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অনলাইন নিরাপত্তা	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tutr_s = $total_proshikkhon['tutr_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tutr_upthi = $total_proshikkhon['tutr_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($tutr_s!=0)?($tutr_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ব্লগ (বাংলা/ ইংরেজি )	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $bgbe_s = $total_proshikkhon['bgbe_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $bgbe_upthi = $total_proshikkhon['bgbe_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bgbe_s!=0)?($bgbe_upthi/$bscmput_s):0?>
                       </td>
                      

                       <td class="tg-y698 type_1"> অনলাইন নীতিমালা	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $bgbe_s = $total_proshikkhon['bgbe_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $bgbe_upthi = $total_proshikkhon['bgbe_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bgbe_s!=0)?($bgbe_upthi/$bscmput_s):0?>
                       </td>
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> উইকপিডিয়িা	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ukp_s = $total_proshikkhon['ukp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ukp_upthi = $total_proshikkhon['ukp_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo ($ukp_s!=0)?($ukp_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> মোট	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ukp_s = $total_proshikkhon['ukp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ukp_upthi = $total_proshikkhon['ukp_upthi'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo ($ukp_s!=0)?($ukp_upthi/$bscmput_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                  

                        </table>


                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
