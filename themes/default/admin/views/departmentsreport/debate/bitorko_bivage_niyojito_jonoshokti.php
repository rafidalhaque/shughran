<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বিতর্ক বিভাগে নিয়োজিত জনশক্তি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/bitorko-bivage-niyojito-jonoshokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bitorko-bivage-niyojito-jonoshokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3"></td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">পূর্ব  </td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">বর্তমান  </td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">বৃদ্ধি   </td>
                                <td class="tg-pwj7" colspan="2" style="text-align:center;">ঘাটতি  </td>
                              
                                
                            </tr>
                            <tr>
                             
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>স্থায়ী </span></div></td>
                                <td class="tg-pwj7 "><div><span>অস্থায়ী </span></div></td>
                                <td class="tg-pwj7 "><div><span>স্থায়ী</span></div></td>
                                <td class="tg-pwj7 "><div><span>অস্থায়ী </span></div></td>
                                <td class="tg-pwj7 "><div><span>স্থায়ী </span></div></td>
                                <td class="tg-pwj7 "><div><span>অস্থায়ী </span></div></td>
                                <td class="tg-pwj7 "><div><span>স্থায়ী</span></div></td>
                                <td class="tg-pwj7 "><div><span>অস্থায়ী </span></div></td>
                           
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                 <?php echo $sodosso_pb_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_pb_stha'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $sodosso_pb_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_pb_ostha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $sodosso_bm_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_bm_stha'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sodosso_bm_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_bm_ostha'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sodosso_br_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_br_stha'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $sodosso_br_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_br_ostha'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sodosso_ght_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_ght_stha'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                 <?php echo $sodosso_ght_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sodosso_ght_ostha'] ?>
                                </td>
                          
                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_pb_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_pb_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_pb_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_pb_ostha'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sathi_bm_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_bm_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_bm_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_bm_ostha'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_br_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_br_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_br_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_br_ostha'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_ght_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_ght_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $sathi_ght_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['sathi_ght_ostha'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_pb_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_pb_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_pb_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_pb_ostha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_bm_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_bm_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_bm_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_bm_ostha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_br_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_br_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_br_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_br_ostha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_ght_stha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_ght_stha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kormi_ght_ostha = $total_bitorko_bivage_niojito_sangothonik_jonoshokti['kormi_ght_ostha'] ?>
                                </td>
                       
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                 <?php echo $total_pb_stha=($sodosso_pb_stha+$sathi_pb_stha+$kormi_pb_stha)?>
                                </td>
                                <td class="tg-0pky">
                                   <?php echo $total_pb_ostha=($sodosso_pb_ostha+$sathi_pb_ostha+$kormi_pb_ostha)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_bm_stha=($sodosso_bm_stha+$sathi_bm_stha+$kormi_bm_stha)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_bm_ostha=($sodosso_bm_ostha+$sathi_bm_ostha+$kormi_bm_ostha)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_br_stha=($sodosso_br_stha+$sathi_br_stha+$kormi_br_stha)?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $total_br_ostha=($sodosso_br_ostha+$sathi_br_ostha+$kormi_br_ostha)?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $total_ght_stha=($sodosso_ght_stha+$sathi_ght_stha+$kormi_ght_stha)?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $total_ght_ostha=($sodosso_ght_ostha+$sathi_ght_ostha+$kormi_ght_ostha)?>
                                </td>
                     



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
