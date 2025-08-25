<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রোগ্রামসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/program-sumoho') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/program-sumoho/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span>প্রোগ্রাম </span></div></td>
                                <td class="tg-pwj7 "><div><span>ক্যাটাগরি </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্লাটর্ফম </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত  </span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়  </span></div></td>
                                
                              
                             
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7"rowspan="4" >সাপ্তাহিক সেশন</td>
                                <td class="tg-pwj7" rowspan="2">বাংলা  </td>
                                <td class="tg-pwj7" colspan=""> 
                                সাংগঠনিক
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">সাধারণ</td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_english_sonkha = $total_bitorko_programsumoho['ss_english_sonkha'] ?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_english_up = $total_bitorko_programsumoho['ss_english_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_english_up!=0)?$ss_english_up/$ss_english_sonkha:0,2)?>
                                </td>
                                
                                
                              
                               
                            </tr>

                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">ইংরেজি  </td>
                                <td class="tg-pwj7" colspan=""> 
                                সাংগঠনিক
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 ">সাধারণ</td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_english_sonkha = $total_bitorko_programsumoho['ss_english_sonkha'] ?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_english_up = $total_bitorko_programsumoho['ss_english_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_english_up!=0)?$ss_english_up/$ss_english_sonkha:0,2)?>
                                </td>
                                
                                
                              
                               
                            </tr>

                            
                            <tr>
                                <td class="tg-pwj7" rowspan="8">কর্মশালা/ওয়ার্কসপ </td>
                                <td class="tg-pwj7" rowspan="2">বিশ্ববিদ্যালয়
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_son_up = $total_bitorko_programsumoho['kw_son_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_son_up!=0)?$kw_son_up/$kw_son_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_son_mon = $total_bitorko_programsumoho['kw_son_mon'] ?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_ss_up = $total_bitorko_programsumoho['kw_ss_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_ss_up!=0)?$kw_ss_up/$kw_ss_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_ss_mon = $total_bitorko_programsumoho['kw_ss_mon'] ?>
                                </td>

                              
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">কলেজ
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_son_up = $total_bitorko_programsumoho['kw_son_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_son_up!=0)?$kw_son_up/$kw_son_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_son_mon = $total_bitorko_programsumoho['kw_son_mon'] ?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_ss_up = $total_bitorko_programsumoho['kw_ss_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_ss_up!=0)?$kw_ss_up/$kw_ss_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_ss_mon = $total_bitorko_programsumoho['kw_ss_mon'] ?>
                                </td>

                              
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">স্কুল
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_son_up = $total_bitorko_programsumoho['kw_son_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_son_up!=0)?$kw_son_up/$kw_son_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_son_mon = $total_bitorko_programsumoho['kw_son_mon'] ?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_ss_up = $total_bitorko_programsumoho['kw_ss_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_ss_up!=0)?$kw_ss_up/$kw_ss_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_ss_mon = $total_bitorko_programsumoho['kw_ss_mon'] ?>
                                </td>

                              
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7" rowspan="2">মাদরাসা
                                  </td>
                                <td class="tg-pwj7" colspan=""> 
                                  সাংগঠনিক
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_son_up = $total_bitorko_programsumoho['kw_son_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_son_up!=0)?$kw_son_up/$kw_son_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_son_mon = $total_bitorko_programsumoho['kw_son_mon'] ?>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ </td>
                                
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $kw_ss_up = $total_bitorko_programsumoho['kw_ss_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_ss_up!=0)?$kw_ss_up/$kw_ss_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $kw_ss_mon = $total_bitorko_programsumoho['kw_ss_mon'] ?>
                                </td>

                              
                            </tr>
                            
                            <tr>
                                <td class="tg-y698 type_1" colspan='3'> এক্সিকিউটিভ মিটিং	</td>
                               
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $am_sonkha = $total_bitorko_programsumoho['am_sonkha'] ?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $am_up = $total_bitorko_programsumoho['am_up'] ?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $am_mon = $total_bitorko_programsumoho['am_mon'] ?>
                                </td>
                            
                              

                            </tr>
                            <tr>
                                <td class="tg-y698" colspan='3'>অন্যান্য </td>
                                
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $onanno_sonkha = $total_bitorko_programsumoho['onanno_sonkha'] ?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $onanno_up = $total_bitorko_programsumoho['onanno_up'] ?>
                                </td>
                            
                                <td class="tg-pwj7" colspan="">  
                                <?php echo $onanno_mon = $total_bitorko_programsumoho['onanno_mon'] ?>
                                </td>
                               
                          
                               
                            </tr>
                          



                            

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                                <td class="tg-pwj7 "><div><span>প্রতিযোগিতার ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত  </span></div></td>
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7" >বিতর্ক উৎসব</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আন্তঃশাখা</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আন্তঃবিশ্ববিদ্যালয়</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আন্তঃকলেজ</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আন্তঃমাদরাসা</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আন্তঃস্কুল</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আন্তঃথানা</td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <?php echo $ss_bangla_up = $total_bitorko_programsumoho['ss_bangla_up'] ?> 
                                </td>
                            </tr>
                        </table>
                        
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
