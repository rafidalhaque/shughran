<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি ও রিসোর্স' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/it-jonoshokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-jonoshokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                             
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>পিসি/ল্যাপটপ <br> আছে  </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>এন্ড্রয়েড ফোন<br> আছে</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ইন্টারনেট <br> আছে </span></div></td>
                                <td class="tg-pwj7" colspan="2">নিয়মিত ব্লগ লেখেন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফেসবুক <br> ক্যাম্পেইন করেন </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>টুইটার <br> ক্যাম্পেইন করেন</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>CSE তে <br> অধ্যয়নরত</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  বাংলা </span></div></td>
                                <td class="tg-pwj7 "><div><span>ইংরেজি </span></div></td>
                              
                         
                        
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sod_s = $total_jonoshoktiorisors['sod_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sod_pltpa = $total_jonoshoktiorisors['sod_pltpa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sod_adphna = $total_jonoshoktiorisors['sod_adphna'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sod_ena = $total_jonoshoktiorisors['sod_ena'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sod_nmble_enrj = $total_jonoshoktiorisors['sod_nmble_enrj'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sod_nmble_bnl = $total_jonoshoktiorisors['sod_nmble_bnl'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sod_fbkpk = $total_jonoshoktiorisors['sod_fbkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sod_tutkpk = $total_jonoshoktiorisors['sod_tutkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $sod_itap = $total_jonoshoktiorisors['sod_itap'] ?>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_s = $total_jonoshoktiorisors['sat_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_pltpa = $total_jonoshoktiorisors['sat_pltpa'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $sat_adphna = $total_jonoshoktiorisors['sat_adphna'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_ena = $total_jonoshoktiorisors['sat_ena'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_nmble_enrj = $total_jonoshoktiorisors['sat_nmble_enrj'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_nmble_bnl = $total_jonoshoktiorisors['sat_nmble_bnl'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_fbkpk = $total_jonoshoktiorisors['sat_fbkpk'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_tutkpk = $total_jonoshoktiorisors['sat_tutkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sat_itap = $total_jonoshoktiorisors['sat_itap'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_s = $total_jonoshoktiorisors['kor_s'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_pltpa = $total_jonoshoktiorisors['kor_pltpa'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_adphna = $total_jonoshoktiorisors['kor_adphna'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_ena = $total_jonoshoktiorisors['kor_ena'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $kor_ena = $total_jonoshoktiorisors['kor_nmble_enrj'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_nmble_bnl = $total_jonoshoktiorisors['kor_nmble_bnl'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_fbkpk = $total_jonoshoktiorisors['kor_fbkpk'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_tutkpk = $total_jonoshoktiorisors['kor_tutkpk'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kor_itap = $total_jonoshoktiorisors['kor_itap'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky  type_9">
                                
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
 
