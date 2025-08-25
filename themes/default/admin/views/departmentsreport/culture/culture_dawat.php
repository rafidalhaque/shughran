<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'দাওয়াত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-dawat') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2"> বিবরণ   </td>
                   
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                                <td class="tg-pwj7" colspan="">ঘাটতি </td>
                                <td class="tg-pwj7" rowspan=""> বিবরণ   </td>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                                <td class="tg-pwj7" colspan="">ঘাটতি </td>

                            </tr>
                            <tr> 
                          
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> পরশ 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['prosh_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_daoyat['prosh_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_daoyat['prosh_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['prosh_gt'] ?>
                                </td>
                                <td class="tg-y698 type_1"> ক্যালিওগ্রাফার 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['prosh_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_daoyat['prosh_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_daoyat['prosh_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['prosh_gt'] ?>
                                </td>
                              
                           
                            </tr>


                            <tr>
                                <td class="tg-y698">সঙ্গীত শিল্পী  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['shilpi_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['shilpi_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_daoyat['shilpi_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['shilpi_gt'] ?>
                                </td>
                                <td class="tg-y698">হস্ত (কারু) শিল্পী  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['shilpi_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['shilpi_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_daoyat['shilpi_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_daoyat['shilpi_gt'] ?>
                                </td>
                              
                             
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">অভিনয় শিল্পী  </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['suvakankhi_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_daoyat['suvakankhi_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_daoyat['suvakankhi_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['suvakankhi_gt'] ?>
                                </td>
                                <td class="tg-y698">ফ্যাশন ডিজাইনার  </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['suvakankhi_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_daoyat['suvakankhi_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_daoyat['suvakankhi_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['suvakankhi_gt'] ?>
                                </td>
                              
                             
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">আবৃত্তি শিল্পী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['updeshta_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $total_daoyat['updeshta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_gt'] ?>
                                </td>
                                <td class="tg-y698">স্থাপত্য শিল্পী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['updeshta_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $total_daoyat['updeshta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_gt'] ?>
                                </td>
                    
                            </tr>
                            <tr>
                                <td class="tg-y698">উপস্থাপক </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['updeshta_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $total_daoyat['updeshta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_gt'] ?>
                                </td>
                                <td class="tg-y698">শুভাকাক্সক্ষী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['updeshta_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $total_daoyat['updeshta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_gt'] ?>
                                </td>
                    
                            </tr>
                            <tr>
                                <td class="tg-y698"> চিত্র শিল্পী </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['updeshta_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $total_daoyat['updeshta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_gt'] ?>
                                </td>
                                <td class="tg-y698">উপদেষ্টা </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $total_daoyat['updeshta_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $total_daoyat['updeshta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $total_daoyat['updeshta_gt'] ?>
                                </td>
                    
                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
