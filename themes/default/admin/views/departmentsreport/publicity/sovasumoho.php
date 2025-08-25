<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/sovasumoho') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/sovasumoho/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরন </td>
                                <td class="tg-pwj7" colspan="3">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="3">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" colspan="3">গড় উপস্থিতি  </td>
                            
                            </tr>
                            
                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>বিভাগীয় জনশক্তিদের নিয়ে নিয়মিত বৈঠক</span></div></td>
                                <td class="tg-pwj7 "colspan="3">
								<?php echo $bjnnib_s = $total_sovasomuho_ho['bjnnib_s'] ?>
								</td>
                                <td class="tg-pwj7 "colspan="3">
								<?php echo $bjnnib_mup = $total_sovasomuho_ho['bjnnib_mup'] ?>
								</td>
                                <td class="tg-pwj7 "colspan="3">
								<?php echo $bjnnib_gup = $total_sovasomuho_ho['bjnnib_gup'] ?>
								</td>
                              
                               
                            </tr>
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span>প্রশিক্ষণ কর্মশালা</span></div></td>
                            <td class="tg-pwj7 "colspan="3">
							  <?php echo $pk_s = $total_sovasomuho_ho['pk_s'] ?>
							</td>
                            <td class="tg-pwj7 "colspan="3">
							<?php echo $pk_mup = $total_sovasomuho_ho['pk_mup'] ?>
							</td>
                            <td class="tg-pwj7 "colspan="3">
							<?php echo $pk_gup = $total_sovasomuho_ho['pk_gup'] ?>
							</td>
                          
                           
                            </tr>
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span> মতবিনিময়/সংবাদ সম্মেলন/ইফতার</span></div></td>
                            <td class="tg-pwj7 "> 
							<?php echo $mbm_s = $total_sovasomuho_ho['mbm_s'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $mbm_mup = $total_sovasomuho_ho['mbm_mup'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $mbm_gup = $total_sovasomuho_ho['mbm_gup'] ?>
							</td>
                            <td class="tg-pwj7 "> 
							<?php echo $sbson_s = $total_sovasomuho_ho['sbson_s'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $sbson_mup = $total_sovasomuho_ho['sbson_mup'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $sbson_gup = $total_sovasomuho_ho['sbson_gup'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $et_s = $total_sovasomuho_ho['et_s'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $et_mup = $total_sovasomuho_ho['et_mup'] ?>
							</td>
                            <td class="tg-pwj7 ">
							<?php echo $et_gup = $total_sovasomuho_ho['et_gup'] ?>
							</td>
                          
                           
                            </tr>
                        
                            <tr>
                            
                            <td class="tg-pwj7 "><div><span>অন্যান্য</span></div></td>
                            <td class="tg-pwj7 "colspan="3">
							<?php echo $onnoanno_s = $total_sovasomuho_ho['onnoanno_s'] ?>
							</td>
                            <td class="tg-pwj7 "colspan="3">
							<?php echo $onnoanno_mup = $total_sovasomuho_ho['onnoanno_mup'] ?>
							</td>
                            <td class="tg-pwj7 "colspan="3">
							<?php echo $onnoanno_gup = $total_sovasomuho_ho['onnoanno_gup'] ?>
							</td>
                          
                           
                            </tr>

                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
