<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'যোগাযোগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/publicity-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publicity-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7"  colspan="2">ধরণ</td>
                                <td class="tg-pwj7" >মোট সংখ্যা  </td>
                                <td class="tg-pwj7" >সভাপতি/সেক্রেটারীর যোগাযোগ </td>
                                <td class="tg-pwj7" >সম্পাদকের যোগাযোগ  </td>
                                
                                
                            </tr>

                            




                            <tr>
                                <td class="tg-y698 type_1" colspan="2"> পত্রিকার সম্পাদক</td>
                                <td class="tg-0pky  type_1">
                               
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $psd_ssej = $total_jogajog['psd_ssej'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                              <?php echo $psd_skj = $total_jogajog['psd_skj'] ?>
                                </td>
                                
                                

                            </tr>


                            <tr>
                                <td class="tg-y698" colspan="2">মিডিয়া ব্যক্তিত্ব </td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $mbt_ssej = $total_jogajog['mbt_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $mbt_skj = $total_jogajog['mbt_skj'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">টিভি </td>
                                <td class="tg-y698">জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                               <?php echo $tv_jpn_ssej = $total_jogajog['tv_jpn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $tv_jpn_skj = $total_jogajog['tv_jpn_skj'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">জাতীয় পত্রিকা </td>
                                <td class="tg-y698" >জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                              
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $jpk_jpn_ssej = $total_jogajog['jpk_jpn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                              <?php echo $jpk_jpn_skj = $total_jogajog['jpk_jpn_skj'] ?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি </td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                                <?php echo $jpk_thpn_ssej = $total_jogajog['jpk_thpn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $jpk_thpn_skj = $total_jogajog['jpk_thpn_skj'] ?>
                                </td>
                         
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="3">আঞ্চলিক পত্রিকা </td>
                                <td class="tg-y698">জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                              
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $akpk_jpn_ssej = $total_jogajog['akpk_jpn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $akpk_jpn_skj = $total_jogajog['akpk_jpn_skj'] ?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                               <?php echo $akpk_sfrpt_ssej = $total_jogajog['akpk_sfrpt_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $akpk_sfrpt_skj = $total_jogajog['akpk_sfrpt_skj'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                               <?php echo $akpk_thpn_ssej = $total_jogajog['akpk_thpn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $akpk_thpn_skj = $total_jogajog['akpk_thpn_skj'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">জাতীয় অনলাইন </td>
                                <td class="tg-y698">জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                              
                                </td>
                                <td class="tg-0pky">
                                <?php echo $jonl_jepn_ssej = $total_jogajog['jonl_jepn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $jonl_jepn_skj = $total_jogajog['jonl_jepn_skj'] ?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">আঞ্চলিক অনলাইন </td>
                                <td class="tg-y698">প্রতিনিধি </td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                               <?php echo $akonl_pn_ssej = $total_jogajog['akonl_pn_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $akonl_pn_skj = $total_jogajog['akonl_pn_skj'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698" colspan="2" style="text-align:center">কলামিস্ট </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cm_ssej = $total_jogajog['cm_ssej'] ?>
                                </td>
                                <td class="tg-0pky">
                              <?php echo $cm_skj = $total_jogajog['cm_skj'] ?>
                                </td>
                                
                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
