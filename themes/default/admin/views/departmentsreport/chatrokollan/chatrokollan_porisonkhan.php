<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/chatrokollan-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/chatrokollan-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                
                                <td class="tg-pwj7" colspan="4">বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" colspan="3">পূর্বের সংখ্যা   </td>
                                <td class="tg-pwj7" colspan="3">এ বছরে </td>
                                
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7" >বিবরণ </td>
                                <td class="tg-pwj7" >সদস্য</td>
                                <td class="tg-pwj7" >সাধী   </td>
                                <td class="tg-pwj7" >কর্মী </td>
                                <td class="tg-pwj7" >সদস্য</td>
                                <td class="tg-pwj7" >সাধী   </td>
                                <td class="tg-pwj7" >কর্মী </td>
                                <td class="tg-pwj7" >সদস্য</td>
                                <td class="tg-pwj7" >সাধী   </td>
                                <td class="tg-pwj7" >কর্মী </td>
                                
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> শহীদ</td>
                                <td class="tg-0pky  type_1">
                                    `<?php echo $shohid_bs_sodosso = $total_chatrokollan_porisonkhan['shohid_bs_sodosso'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $shohid_bs_sathi = $total_chatrokollan_porisonkhan['shohid_bs_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $shohid_bs_kormi = $total_chatrokollan_porisonkhan['shohid_bs_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $shohid_ps_sodosso = $total_chatrokollan_porisonkhan['shohid_ps_sodosso'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $shohid_ps_sathi = $total_chatrokollan_porisonkhan['shohid_ps_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $shohid_ps_kormi = $total_chatrokollan_porisonkhan['shohid_ps_kormi'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $shohid_ab_sodosso = $total_chatrokollan_porisonkhan['shohid_ab_sodosso'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $shohid_ab_sathi = $total_chatrokollan_porisonkhan['shohid_ab_sathi'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $shohid_ab_kormi = $total_chatrokollan_porisonkhan['shohid_ab_kormi'] ?>
                                </td>
                             
                              

                            </tr>


                            <tr>
                                <td class="tg-y698">আহত </td>
                                <td class="tg-0pky">
                                <?php echo $ahoto_bs_sodosso = $total_chatrokollan_porisonkhan['ahoto_bs_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ahoto_bs_sathi = $total_chatrokollan_porisonkhan['ahoto_bs_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ahoto_bs_kormi = $total_chatrokollan_porisonkhan['ahoto_bs_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ahoto_ps_sodosso = $total_chatrokollan_porisonkhan['ahoto_ps_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ahoto_ps_sathi = $total_chatrokollan_porisonkhan['ahoto_ps_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ahoto_ps_kormi = $total_chatrokollan_porisonkhan['ahoto_ps_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $ahoto_ab_sodosso = $total_chatrokollan_porisonkhan['ahoto_ab_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ahoto_ab_sathi = $total_chatrokollan_porisonkhan['ahoto_ab_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $ahoto_ab_kormi = $total_chatrokollan_porisonkhan['ahoto_ab_kormi'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">পঙ্গুত্ববরণকারী </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_bs_sodosso = $total_chatrokollan_porisonkhan['pongu_bs_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_bs_sathi = $total_chatrokollan_porisonkhan['pongu_bs_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $pongu_bs_kormi = $total_chatrokollan_porisonkhan['pongu_bs_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_ps_sodosso = $total_chatrokollan_porisonkhan['pongu_ps_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_ps_sathi = $total_chatrokollan_porisonkhan['pongu_ps_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_ps_kormi = $total_chatrokollan_porisonkhan['pongu_ps_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $pongu_ab_sodosso = $total_chatrokollan_porisonkhan['pongu_ab_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_ab_sathi = $total_chatrokollan_porisonkhan['pongu_ab_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $pongu_ab_kormi = $total_chatrokollan_porisonkhan['pongu_ab_kormi'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">চিকিৎসাধীন </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_bs_sodosso = $total_chatrokollan_porisonkhan['chikit_bs_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_bs_sathi = $total_chatrokollan_porisonkhan['chikit_bs_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $chikit_bs_kormi = $total_chatrokollan_porisonkhan['chikit_bs_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_ps_sodosso = $total_chatrokollan_porisonkhan['chikit_ps_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_ps_sathi = $total_chatrokollan_porisonkhan['chikit_ps_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_ps_kormi = $total_chatrokollan_porisonkhan['chikit_ps_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $chikit_ab_sodosso = $total_chatrokollan_porisonkhan['chikit_ab_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_ab_sathi = $total_chatrokollan_porisonkhan['chikit_ab_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $chikit_ab_kormi = $total_chatrokollan_porisonkhan['chikit_ab_kormi'] ?>
                                </td>
                              
                            </tr>

                            <tr>
                                <td class="tg-y698">সুস্থতা অর্জন </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_bs_sodosso = $total_chatrokollan_porisonkhan['sustar_bs_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_bs_sathi = $total_chatrokollan_porisonkhan['sustar_bs_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sustar_bs_kormi = $total_chatrokollan_porisonkhan['sustar_bs_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_ps_sodosso = $total_chatrokollan_porisonkhan['sustar_ps_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_ps_sathi = $total_chatrokollan_porisonkhan['sustar_ps_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_ps_kormi = $total_chatrokollan_porisonkhan['sustar_ps_kormi'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sustar_ab_sodosso = $total_chatrokollan_porisonkhan['sustar_ab_sodosso'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_ab_sathi = $total_chatrokollan_porisonkhan['sustar_ab_sathi'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sustar_ab_kormi = $total_chatrokollan_porisonkhan['sustar_ab_kormi'] ?>
                                </td>
                              
                            </tr>

                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                <?php echo $shohid_bs_sodosso+$ahoto_bs_sodosso+$pongu_bs_sodosso+$chikit_bs_sodosso+$sustar_bs_sodosso ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $shohid_bs_sathi+$ahoto_bs_sathi+$pongu_bs_sathi+$chikit_bs_sathi+$sustar_bs_sathi ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $shohid_bs_kormi+$ahoto_bs_kormi+$pongu_bs_kormi+$chikit_bs_kormi+$sustar_bs_kormi  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $shohid_ps_sodosso+$ahoto_ps_sodosso+$pongu_ps_sodosso+$chikit_ps_sodosso+$sustar_ps_sodosso ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $shohid_ps_sathi+$ahoto_ps_sathi+$pongu_ps_sathi+$chikit_ps_sathi+$sustar_ps_sathi ?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $shohid_ps_kormi+$ahoto_ps_kormi+$pongu_ps_kormi+$chikit_ps_kormi+$sustar_ps_kormi ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $shohid_ab_sodosso+$ahoto_ab_sodosso+$pongu_ab_sodosso+$chikit_ab_sodosso+$sustar_ab_sodosso ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $shohid_ab_sathi+$ahoto_ab_sathi+$pongu_ab_sathi+$chikit_ab_sathi+$sustar_ab_sathi ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $shohid_ab_kormi+$ahoto_ab_kormi+$pongu_ab_kormi+$chikit_ab_kormi+$sustar_ab_kormi ?>
                                </td>
                              
                            </tr>
                            



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
