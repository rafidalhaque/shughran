<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-jonoshokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-jonoshokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">মান </td>
                   
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                                <td class="tg-pwj7" colspan="">মনোনয়ন </td>
                                <td class="tg-pwj7" colspan="">আগমন </td>
                                <td class="tg-pwj7" colspan="">ঘাটতি</td>
                                <td class="tg-pwj7" colspan="">স্থানান্তর</td>
                                <td class="tg-pwj7" colspan="">ছাত্রত্ব শেষ  </td>
                             
                                <td class="tg-pwj7" colspan="">বাতিল</td>
                            </tr>
                            <tr>
                          
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> নকিব 	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_pus = $total_saneskritik_bivag_jonoshokti['nokib_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $nokib_bms = $total_saneskritik_bivag_jonoshokti['nokib_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $nokib_br = $total_saneskritik_bivag_jonoshokti['nokib_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $nokib_mn1 = $total_saneskritik_bivag_jonoshokti['nokib_mn1'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $nokib_am = $total_saneskritik_bivag_jonoshokti['nokib_am'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $nokib_gt = $total_saneskritik_bivag_jonoshokti['nokib_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_mn2 = $total_saneskritik_bivag_jonoshokti['nokib_mn2'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_sn = $total_saneskritik_bivag_jonoshokti['nokib_sn'] ?>
                                </td>
                               
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_btl = $total_saneskritik_bivag_jonoshokti['nokib_btl'] ?>
                                </td>
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">নকিব প্রার্থী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokibp_pus = $total_saneskritik_bivag_jonoshokti['nokibp_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $nokibp_bms = $total_saneskritik_bivag_jonoshokti['nokibp_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $nokibp_br = $total_saneskritik_bivag_jonoshokti['nokibp_br'] ?>
                                </td>
								<td class="tg-0pky  type_3">
                                <?php echo $nokibp_mn1	 = $total_saneskritik_bivag_jonoshokti['nokibp_mn1'] ?>
                                </td>
                            
                                <td class="tg-0pky  type_1">
                                 <?php echo $nokibp_am = $total_saneskritik_bivag_jonoshokti['nokibp_am'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokibp_gt = $total_saneskritik_bivag_jonoshokti['nokibp_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokibp_mn2 = $total_saneskritik_bivag_jonoshokti['nokibp_mn2'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokibp_sn = $total_saneskritik_bivag_jonoshokti['nokibp_sn'] ?>
                                </td>
                            
                                <td class="tg-0pky  type_3">
                                <?php echo $nokibp_btl	 = $total_saneskritik_bivag_jonoshokti['nokibp_btl'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogroj_pus	 = $total_saneskritik_bivag_jonoshokti['ogroj_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $ogroj_bms	 = $total_saneskritik_bivag_jonoshokti['ogroj_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $ogroj_br	 = $total_saneskritik_bivag_jonoshokti['ogroj_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $ogroj_mn1	 = $total_saneskritik_bivag_jonoshokti['ogroj_mn1'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogroj_am	 = $total_saneskritik_bivag_jonoshokti['ogroj_am'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ogroj_gt	 = $total_saneskritik_bivag_jonoshokti['ogroj_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogroj_mn2	 = $total_saneskritik_bivag_jonoshokti['ogroj_mn2'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogroj_sn	 = $total_saneskritik_bivag_jonoshokti['ogroj_sn'] ?>
                                </td>
                               
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogroj_btl	 = $total_saneskritik_bivag_jonoshokti['ogroj_btl'] ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ প্রার্থী  </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogrojp_pus	 = $total_saneskritik_bivag_jonoshokti['ogrojp_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $ogrojp_bms	 = $total_saneskritik_bivag_jonoshokti['ogrojp_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogrojp_br	 = $total_saneskritik_bivag_jonoshokti['ogrojp_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogrojp_mn1	 = $total_saneskritik_bivag_jonoshokti['ogrojp_mn1'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $ogrojp_am	 = $total_saneskritik_bivag_jonoshokti['ogrojp_am'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogrojp_gt	 = $total_saneskritik_bivag_jonoshokti['ogrojp_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $ogrojp_mn2	 = $total_saneskritik_bivag_jonoshokti['ogrojp_mn2'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                  <?php echo $ogrojp_sn	 = $total_saneskritik_bivag_jonoshokti['ogrojp_sn'] ?>
                                </td>
                             
                                <td class="tg-0pky  type_3">
                                  <?php echo $ogrojp_btl	 = $total_saneskritik_bivag_jonoshokti['ogrojp_btl'] ?>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> উন্মেষ 	</td>
                                
                                <td class="tg-0pky  type_1">
                                <?php echo $unmesh_pus	 = $total_saneskritik_bivag_jonoshokti['unmesh_pus'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $unmesh_bms	 = $total_saneskritik_bivag_jonoshokti['unmesh_bms'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $unmesh_br	 = $total_saneskritik_bivag_jonoshokti['unmesh_br'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $unmesh_mn1	 = $total_saneskritik_bivag_jonoshokti['unmesh_mn1'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $unmesh_am	 = $total_saneskritik_bivag_jonoshokti['unmesh_am'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $unmesh_gt	 = $total_saneskritik_bivag_jonoshokti['unmesh_gt'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $unmesh_mn2	 = $total_saneskritik_bivag_jonoshokti['unmesh_mn2'] ?>
                                </td>
                              
                                <td class="tg-0pky  type_3">
                                <?php echo $unmesh_chsh	 = $total_saneskritik_bivag_jonoshokti['unmesh_chsh'] ?>
                                </td>
								<td class="tg-0pky  type_1">
								<?php echo $unmesh_btl	 = $total_saneskritik_bivag_jonoshokti['unmesh_btl'] ?>
								</td>
                               
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                  <?php echo $nokib_pus+$nokibp_pus+$ogroj_pus+$ogrojp_pus+$unmesh_pus  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_bms+$nokibp_bms+$ogroj_bms+$ogrojp_br+$unmesh_bms  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_br+$nokibp_br+$ogroj_br+$ogrojp_bms+$unmesh_br  ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_mn1+$nokibp_mn1+$ogroj_mn1+$ogrojp_br+$unmesh_mn1  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_am+$nokibp_am+$ogroj_am+$ogrojp_am+$unmesh_am  ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_gt+$nokibp_gt+$ogroj_gt+$ogrojp_gt+$unmesh_gt  ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nokib_mn2+$nokibp_mn2+$ogroj_mn2+$ogrojp_mn2+$unmesh_mn2  ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nokib_sn+$nokibp_sn+$ogroj_sn+$ogrojp_sn  ?>
                                </td>
                               
                                <td class="tg-0pky  type_3">
                                <?php echo $nokib_btl+$nokibp_btl+$ogroj_btl+$ogrojp_btl+$unmesh_btl  ?>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
