<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'কর্মশালা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-kormoshala') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-kormoshala/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি</td>

                       <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                       <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-y698 type_1">  সঙ্গীত কর্মশালা 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sksh_s = $total_kormoshala['sksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sksh_mk = $total_kormoshala['sksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $sksh_mup = $total_kormoshala['sksh_mup'] ?>
                       </td>

                       <td class="tg-y698">শিশুতোষ সঙ্গীত কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sthtsksh_s = $total_kormoshala['sthtsksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sthtsksh_mk = $total_kormoshala['sthtsksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $sthtsksh_mup = $total_kormoshala['sthtsksh_mup'] ?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">নাট্যকর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nksh_s = $total_kormoshala['nksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nksh_mk = $total_kormoshala['nksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $nksh_mup = $total_kormoshala['nksh_mup'] ?>
                       </td>

                       <td class="tg-y698">শিশুতোষ নাট্যকর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shnksh_s = $total_kormoshala['shnksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shnksh_mk = $total_kormoshala['shnksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shnksh_mup = $total_kormoshala['shnksh_mup'] ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">আবৃত্তি উপস্থাপনা কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $aupksh_s = $total_kormoshala['aupksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $aupksh_mk = $total_kormoshala['aupksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $aupksh_mup = $total_kormoshala['aupksh_mup'] ?>
                       </td>

                       <td class="tg-y698">টেকনিক্যাল কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tkksh_s = $total_kormoshala['tkksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tkksh_mk = $total_kormoshala['tkksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $tkksh_mup = $total_kormoshala['tkksh_mup'] ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">কিরাত কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kaksh_s = $total_kormoshala['kaksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kaksh_mk = $total_kormoshala['kaksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $kaksh_mup = $total_kormoshala['kaksh_mup'] ?>
                       </td>

                       <td class="tg-y698">সাংস্কৃতিক কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $stksh_s = $total_kormoshala['stksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $stksh_mk = $total_kormoshala['stksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $stksh_mup = $total_kormoshala['stksh_mup'] ?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">অগ্রজ মানোন্নয়ন কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $mnksh_s = $total_kormoshala['mnksh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $mnksh_mk = $total_kormoshala['mnksh_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $mnksh_mup = $total_kormoshala['mnksh_mup'] ?>
                       </td>
                       
    
                       <td class="tg-y698">উন্মেষ মানোন্নয়ন কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $onnoanno_s = $total_kormoshala['onnoanno_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $onnoanno_mk = $total_kormoshala['onnoanno_mk'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $onnoanno_mup = $total_kormoshala['onnoanno_mup'] ?>
                       </td>
              
                   
                   </tr>
                
              
                   
                   </tr>
                 

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
