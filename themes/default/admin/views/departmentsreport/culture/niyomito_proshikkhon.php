<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'নিয়মিত প্রশিক্ষণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/niyomito-proshikkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/niyomito-proshikkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" rowspan="2">বিবরণ  </td>
                        
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan=""> মোট উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>

                       <td class="tg-pwj7" rowspan="2">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan=""> মোট উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-y698 type_1">  সঙ্গীত ক্লাস	</td>
                       <td class="tg-0pky  type_1">
                      <?php echo $gk_s = $total_niomito_proshikkhon['gk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $gk_mup = $total_niomito_proshikkhon['gk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($gk_s!=0)?($gk_mup/$gk_s):0,2) ?>
                       </td>

                       <td class="tg-y698 type_1">  অগ্রজ কুরআন ক্লাস	</td>
                       <td class="tg-0pky  type_1">
                      <?php echo $gk_s = $total_niomito_proshikkhon['gk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $gk_mup = $total_niomito_proshikkhon['gk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($gk_s!=0)?($gk_mup/$gk_s):0,2) ?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">অভিনয় ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nk_s=$total_niomito_proshikkhon['nk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nk_mup=$total_niomito_proshikkhon['nk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($nk_s!=0)?($nk_mup/$nk_s):0,2) ?>
                       </td>

                       <td class="tg-y698">অগ্রজ আলোচনা চক্র </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nk_s=$total_niomito_proshikkhon['nk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nk_mup=$total_niomito_proshikkhon['nk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($nk_s!=0)?($nk_mup/$nk_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">আবৃত্তি-উপস্থাপনা ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $aupk_s=$total_niomito_proshikkhon['aupk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $aupk_mup=$total_niomito_proshikkhon['aupk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($aupk_s!=0)?($aupk_mup/$aupk_s):0,2) ?>
                       </td>

                       <td class="tg-y698">উন্মেষ আলোচনা চক্র  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $aupk_s=$total_niomito_proshikkhon['aupk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $aupk_mup=$total_niomito_proshikkhon['aupk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($aupk_s!=0)?($aupk_mup/$aupk_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                        <tr>
                       <td class="tg-y698">ক্বিরাআত ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kak_s=$total_niomito_proshikkhon['kak_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kak_mup=$total_niomito_proshikkhon['kak_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($kak_s!=0)?($kak_mup/$kak_s):0,2) ?>
                       </td>

                       <td class="tg-y698">সামষ্টিক পাঠ </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kak_s=$total_niomito_proshikkhon['kak_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kak_mup=$total_niomito_proshikkhon['kak_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($kak_s!=0)?($kak_mup/$kak_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">রংতুলি ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tk_s=$total_niomito_proshikkhon['tk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tk_mup=$total_niomito_proshikkhon['tk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($tk_s!=0)?($tk_mup/$tk_s):0,2) ?>
                       </td>

                       <td class="tg-y698">অনুষ্ঠান প্রস্তুতি ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tk_s=$total_niomito_proshikkhon['tk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tk_mup=$total_niomito_proshikkhon['tk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($tk_s!=0)?($tk_mup/$tk_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">হস্তশিল্প(কারু)ক্লাস</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sa_s=$total_niomito_proshikkhon['sa_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sa_mup=$total_niomito_proshikkhon['sa_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($sa_s!=0)?($sa_mup/$sa_s):0,2) ?>
                       </td>

                       <td class="tg-y698">শব্বেদারী </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sa_s=$total_niomito_proshikkhon['sa_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sa_mup=$total_niomito_proshikkhon['sa_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($sa_s!=0)?($sa_mup/$sa_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ক্যালিওগ্রাফী ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $stp_s=$total_niomito_proshikkhon['stp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $stp_mup=$total_niomito_proshikkhon['stp_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($stp_s!=0)?($stp_mup/$stp_s):0,2) ?>
                       </td>

                       <td class="tg-y698">টেকনিক্যাল/আইটি ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $stp_s=$total_niomito_proshikkhon['stp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $stp_mup=$total_niomito_proshikkhon['stp_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($stp_s!=0)?($stp_mup/$stp_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">স্থাপত্য শিল্প ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kk_s=$total_niomito_proshikkhon['kk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kk_mup=$total_niomito_proshikkhon['kk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($kk_s!=0)?($kk_mup/$kk_s):0,2) ?>
                       </td>

                       <td class="tg-y698">অন্যান্য </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kk_s=$total_niomito_proshikkhon['kk_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kk_mup=$total_niomito_proshikkhon['kk_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($kk_s!=0)?($kk_mup/$kk_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ফ্যাশন ডিজাইন ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shd_s=$total_niomito_proshikkhon['shd_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shd_mup=$total_niomito_proshikkhon['shd_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($shd_s!=0)?($shd_mup/$shd_s):0,2) ?>
                       </td>

                       <td class="tg-y698"></td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shd_s=$total_niomito_proshikkhon['shd_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shd_mup=$total_niomito_proshikkhon['shd_mup'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($shd_s!=0)?($shd_mup/$shd_s):0,2) ?>
                       </td>
              
                   
                   </tr>
                  
               
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
