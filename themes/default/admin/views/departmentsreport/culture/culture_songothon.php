<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সংগঠন ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">বিবরণ </td>
                   
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                                <td class="tg-pwj7" colspan="">ঘাটতি  </td>
                                <td class="tg-pwj7" colspan="">জনশক্তি  </td>
                                <td class="tg-pwj7" colspan="">থানা </td>
                                <td class="tg-pwj7" colspan="">ওয়ার্ড </td>
                                <td class="tg-pwj7" colspan="">উপশাখা </td>

                             

                            </tr>
                            <tr>
                          
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> শিল্পগোষ্ঠী 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['shg_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['shg_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['shg_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['shg_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['shg_jsh'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['shg_th'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['shg_word'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['shg_upsh'] ?>
                                </td>
                             
                            </tr>


                            <tr>
                                <td class="tg-y698">বিভাগ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['bivag_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['bivag_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['bivag_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['bivag_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['bivag_jsh'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['bivag_th'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['bivag_word'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['bivag_upsh'] ?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">শাখা  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['shakha_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['shakha_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['shakha_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['shakha_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['shakha_jsh'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['shakha_th'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['shakha_word'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['shakha_upsh'] ?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">উপসংগঠন </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['upsg_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['upsg_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['upsg_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['upsg_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['upsg_jsh'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $total_songothon['upsg_th'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $total_songothon['upsg_word'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $total_songothon['upsg_upsh'] ?>
                                </td>
                              
                            
                            </tr>
                            

                            


                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
