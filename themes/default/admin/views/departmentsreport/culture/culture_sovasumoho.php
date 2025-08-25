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
                            <li><a href="<?= admin_url('departmentsreport/culture-sovasumoho') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-sovasumoho/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                        

                            </tr>
                            <tr>
                          
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> নকিব সভা 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokibsv_s=$total_sovasomuho['nokibsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokibsv_mup=$total_sovasomuho['nokibsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($nokibsv_mup!=0)?$nokibsv_mup/$nokibsv_s:0,2)?>
                                </td>

                                <td class="tg-y698 type_1"> উপদেষ্টা বৈঠক 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokibsv_s=$total_sovasomuho['nokibsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokibsv_mup=$total_sovasomuho['nokibsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($nokibsv_mup!=0)?$nokibsv_mup/$nokibsv_s:0,2)?>
                                </td>
                      
                               
                            </tr>


                            <tr>
                                <td class="tg-y698">পরিচালনা পরিষদ সভা  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ppsv_s=$total_sovasomuho['ppsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ppsv_mup=$total_sovasomuho['ppsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ppsv_mup!=0)?$ppsv_mup/$ppsv_s:0,2)?>
                                </td>

                                <td class="tg-y698">শিল্পী সমাবেশ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ppsv_s=$total_sovasomuho['ppsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ppsv_mup=$total_sovasomuho['ppsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ppsv_mup!=0)?$ppsv_mup/$ppsv_s:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogrojsv_s= $total_sovasomuho['ogrojsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogrojsv_mup=$total_sovasomuho['ogrojsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ogrojsv_mup!=0)?$ogrojsv_mup/$ogrojsv_s:0,2)?>
                                </td>

                                <td class="tg-y698">সংবর্ধনা অনুষ্ঠান </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogrojsv_s= $total_sovasomuho['ogrojsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogrojsv_mup=$total_sovasomuho['ogrojsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ogrojsv_mup!=0)?$ogrojsv_mup/$ogrojsv_s:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">উন্মেষ বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $unmeshsv_s=$total_sovasomuho['unmeshsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $unmeshsv_mup=$total_sovasomuho['unmeshsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($unmeshsv_mup!=0)?$unmeshsv_mup/$unmeshsv_s:0,2)?>
                                </td>

                                <td class="tg-y698">সাহিত্য আসর </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $unmeshsv_s=$total_sovasomuho['unmeshsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $unmeshsv_mup=$total_sovasomuho['unmeshsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($unmeshsv_mup!=0)?$unmeshsv_mup/$unmeshsv_s:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">পরশ বৈঠক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pcsv_s=$total_sovasomuho['pcsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pcsv_mup=$total_sovasomuho['pcsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($pcsv_mup!=0)?$pcsv_mup/$pcsv_s:0,2)?>
                                </td>

                                <td class="tg-y698">ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pcsv_s=$total_sovasomuho['pcsv_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pcsv_mup=$total_sovasomuho['pcsv_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($pcsv_mup!=0)?$pcsv_mup/$pcsv_s:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">পর্যালোচনা সভা  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kgth_s=$total_sovasomuho['kgth_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kgth_mup=$total_sovasomuho['kgth_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($kgth_mup!=0)?$kgth_mup/$kgth_s:0,2)?>
                                </td>

                                <td class="tg-y698">দিবস পালন  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kgth_s=$total_sovasomuho['kgth_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kgth_mup=$total_sovasomuho['kgth_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($kgth_mup!=0)?$kgth_mup/$kgth_s:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">কমিটি গঠন  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogrojsb_s=$total_sovasomuho['ogrojsb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogrojsb_mup=$total_sovasomuho['ogrojsb_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ogrojsb_mup!=0)?$ogrojsb_mup/$ogrojsb_s:0,2)?>
                                </td>

                                <td class="tg-y698">র‌্যালি  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogrojsb_s=$total_sovasomuho['ogrojsb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogrojsb_mup=$total_sovasomuho['ogrojsb_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ogrojsb_mup!=0)?$ogrojsb_mup/$ogrojsb_s:0,2)?>
                                </td>
                       
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ সমাবেশ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shilpisb_s=$total_sovasomuho['shilpisb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shilpisb_mup=$total_sovasomuho['shilpisb_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shilpisb_mup!=0)?$shilpisb_mup/$shilpisb_s:0,2)?>
                                </td>

                                <td class="tg-y698">চা-চক্র  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shilpisb_s=$total_sovasomuho['shilpisb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shilpisb_mup=$total_sovasomuho['shilpisb_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shilpisb_mup!=0)?$shilpisb_mup/$shilpisb_s:0,2)?>
                                </td>
                       
                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
