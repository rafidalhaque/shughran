<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রোগ্রামসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable2">
                    <tr>
                                <td class="tg-pwj7 "><div><span>প্রোগ্রাম </span></div></td>
                                <td class="tg-pwj7 "><div><span> </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত  </span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়  </span></div></td>
                                <td class="tg-pwj7 "><div><span>মন্তব্য </span></div></td>
                              
                             
                               
                            </tr>
                            <?php
                            $pk = (isset($bitorko_programsumoho['id']))?$bitorko_programsumoho['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">সাপ্তাহিক সেশন</td>
                                <td class="tg-pwj7" colspan="">বাংলা  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_bangla_sonkha" data-title="Enter"><?php echo $ss_bangla_sonkha=  (isset( $bitorko_programsumoho['ss_bangla_sonkha']))? $bitorko_programsumoho['ss_bangla_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_bangla_up" data-title="Enter"><?php echo $ss_bangla_up=  (isset( $bitorko_programsumoho['ss_bangla_up']))? $bitorko_programsumoho['ss_bangla_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_bangla_up!=0)?$ss_bangla_up/$ss_bangla_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_bangla_mon" data-title="Enter"><?php echo $ss_bangla_mon=  (isset( $bitorko_programsumoho['ss_bangla_mon']))? $bitorko_programsumoho['ss_bangla_mon']:'' ?></a>
                                </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span></span></div>ইংরেজি</td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_english_sonkha" data-title="Enter"><?php echo $ss_english_sonkha=  (isset( $bitorko_programsumoho['ss_english_sonkha']))? $bitorko_programsumoho['ss_english_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_english_up" data-title="Enter"><?php echo $ss_english_up=  (isset( $bitorko_programsumoho['ss_english_up']))? $bitorko_programsumoho['ss_english_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($ss_english_up!=0)?$ss_english_up/$ss_english_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ss_english_mon" data-title="Enter"><?php echo $ss_english_mon=  (isset( $bitorko_programsumoho['ss_english_mon']))? $bitorko_programsumoho['ss_english_mon']:'' ?></a>
                                </td>
                                
                              
                             
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> এক্সিকিউটিভ মিটিং	</td>
                                <td class="tg-0pky  type_1">
                                
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="am_sonkha" data-title="Enter"><?php echo $am_sonkha=  (isset( $bitorko_programsumoho['am_sonkha']))? $bitorko_programsumoho['am_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="am_up" data-title="Enter"><?php echo $am_up=  (isset( $bitorko_programsumoho['am_up']))? $bitorko_programsumoho['am_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($am_up!=0)?$am_up/$am_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="am_mon" data-title="Enter"><?php echo $am_mon=  (isset( $bitorko_programsumoho['am_mon']))? $bitorko_programsumoho['am_mon']:'' ?></a>
                                </td>
                              

                            </tr>
                      


                            <tr>
                            
                            <tr>
                                <td class="tg-pwj7" rowspan="10">কর্মশালা/ওয়াকসপ </td>
                                <td class="tg-pwj7" colspan="">সাংগঠনিক  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_son_sonkha" data-title="Enter"><?php echo $kw_son_sonkha=  (isset( $bitorko_programsumoho['kw_son_sonkha']))? $bitorko_programsumoho['kw_son_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_son_up" data-title="Enter"><?php echo $kw_son_up=  (isset( $bitorko_programsumoho['kw_son_up']))? $bitorko_programsumoho['kw_son_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_son_up!=0)?$kw_son_up/$kw_son_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_son_mon" data-title="Enter"><?php echo $kw_son_mon=  (isset( $bitorko_programsumoho['kw_son_mon']))? $bitorko_programsumoho['kw_son_mon']:'' ?></a>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাধারণ শিক্ষার্থী </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_ss_sonkha" data-title="Enter"><?php echo $kw_ss_sonkha=  (isset( $bitorko_programsumoho['kw_ss_sonkha']))? $bitorko_programsumoho['kw_ss_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_ss_up" data-title="Enter"><?php echo $kw_ss_up=  (isset( $bitorko_programsumoho['kw_ss_up']))? $bitorko_programsumoho['kw_ss_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_ss_up!=0)?$kw_ss_up/$kw_ss_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_ss_mon" data-title="Enter"><?php echo $kw_ss_mon=  (isset( $bitorko_programsumoho['kw_ss_mon']))? $bitorko_programsumoho['kw_ss_mon']:'' ?></a>
                                </td>
                           
                           
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">বিশ্ববিদ্যালয়  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_bis_sonkha" data-title="Enter"><?php echo $kw_bis_sonkha=  (isset( $bitorko_programsumoho['kw_bis_sonkha']))? $bitorko_programsumoho['kw_bis_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_bis_up" data-title="Enter"><?php echo $kw_bis_up=  (isset( $bitorko_programsumoho['kw_bis_up']))? $bitorko_programsumoho['kw_bis_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_bis_up!=0)?$kw_bis_up/$kw_bis_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_bis_mon" data-title="Enter"><?php echo $kw_bis_mon=  (isset( $bitorko_programsumoho['kw_bis_mon']))? $bitorko_programsumoho['kw_bis_mon']:'' ?></a>
                                </td>
                                
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">কলেজ  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_col_sonkha" data-title="Enter"><?php echo $kw_col_sonkha=  (isset( $bitorko_programsumoho['kw_col_sonkha']))? $bitorko_programsumoho['kw_col_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_col_up" data-title="Enter"><?php echo $kw_col_up=  (isset( $bitorko_programsumoho['kw_col_up']))? $bitorko_programsumoho['kw_col_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_col_up!=0)?$kw_col_up/$kw_col_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_col_mon" data-title="Enter"><?php echo $kw_col_mon=  (isset( $bitorko_programsumoho['kw_col_mon']))? $bitorko_programsumoho['kw_col_mon']:'' ?></a>
                                </td>
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">স্কুল  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_sch_sonkha" data-title="Enter"><?php echo $kw_sch_sonkha=  (isset( $bitorko_programsumoho['kw_sch_sonkha']))? $bitorko_programsumoho['kw_sch_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_sch_up" data-title="Enter"><?php echo $kw_sch_up=  (isset( $bitorko_programsumoho['kw_sch_up']))? $bitorko_programsumoho['kw_sch_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_sch_up!=0)?$kw_sch_up/$kw_sch_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_sch_mon" data-title="Enter"><?php echo $kw_sch_mon=  (isset( $bitorko_programsumoho['kw_sch_mon']))? $bitorko_programsumoho['kw_sch_mon']:'' ?></a>
                                </td>
                              
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মাদ্রাসা  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_mad_sonkha" data-title="Enter"><?php echo $kw_mad_sonkha=  (isset( $bitorko_programsumoho['kw_mad_sonkha']))? $bitorko_programsumoho['kw_mad_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_mad_up" data-title="Enter"><?php echo $kw_mad_up=  (isset( $bitorko_programsumoho['kw_mad_up']))? $bitorko_programsumoho['kw_mad_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_mad_up!=0)?$kw_mad_up/$kw_mad_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_mad_mon" data-title="Enter"><?php echo $kw_mad_mon=  (isset( $bitorko_programsumoho['kw_mad_mon']))? $bitorko_programsumoho['kw_mad_mon']:'' ?></a>
                                </td>
                                
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃকলেজ  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_ac_sonkha" data-title="Enter"><?php echo $kw_ac_sonkha=  (isset( $bitorko_programsumoho['kw_ac_sonkha']))? $bitorko_programsumoho['kw_ac_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_ac_up" data-title="Enter"><?php echo $kw_ac_up=  (isset( $bitorko_programsumoho['kw_ac_up']))? $bitorko_programsumoho['kw_ac_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_ac_up!=0)?$kw_ac_up/$kw_ac_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_ac_mon" data-title="Enter"><?php echo $kw_ac_mon=  (isset( $bitorko_programsumoho['kw_ac_mon']))? $bitorko_programsumoho['kw_ac_mon']:'' ?></a>
                                </td>
                            
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃস্কুল  </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_as_sonkha" data-title="Enter"><?php echo $kw_as_sonkha=  (isset( $bitorko_programsumoho['kw_as_sonkha']))? $bitorko_programsumoho['kw_as_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_as_up" data-title="Enter"><?php echo $kw_as_up=  (isset( $bitorko_programsumoho['kw_as_up']))? $bitorko_programsumoho['kw_as_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_as_up!=0)?$kw_as_up/$kw_as_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_as_mon" data-title="Enter"><?php echo $kw_as_mon=  (isset( $bitorko_programsumoho['kw_as_mon']))? $bitorko_programsumoho['kw_as_mon']:'' ?></a>
                                </td>
                              
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত মাদ্রাসা </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_am_sonkha" data-title="Enter"><?php echo $kw_am_sonkha=  (isset( $bitorko_programsumoho['kw_am_sonkha']))? $bitorko_programsumoho['kw_am_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_am_up" data-title="Enter"><?php echo $kw_am_up=  (isset( $bitorko_programsumoho['kw_am_up']))? $bitorko_programsumoho['kw_am_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_am_up!=0)?$kw_am_up/$kw_am_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_am_mon" data-title="Enter"><?php echo $kw_am_mon=  (isset( $bitorko_programsumoho['kw_am_mon']))? $bitorko_programsumoho['kw_am_mon']:'' ?></a>
                                </td>
                            
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত থানা </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_at_sonkha" data-title="Enter"><?php echo $kw_at_sonkha=  (isset( $bitorko_programsumoho['kw_at_sonkha']))? $bitorko_programsumoho['kw_at_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_at_up" data-title="Enter"><?php echo $kw_at_up=  (isset( $bitorko_programsumoho['kw_at_up']))? $bitorko_programsumoho['kw_at_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($kw_at_up!=0)?$kw_at_up/$kw_at_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kw_at_mon" data-title="Enter"><?php echo $kw_at_mon=  (isset( $bitorko_programsumoho['kw_at_mon']))? $bitorko_programsumoho['kw_at_mon']:'' ?></a>
                                </td>
                               
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onanno_sonkha" data-title="Enter"><?php echo $onanno_sonkha=  (isset( $bitorko_programsumoho['onanno_sonkha']))? $bitorko_programsumoho['onanno_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onanno_up" data-title="Enter"><?php echo $onanno_up=  (isset( $bitorko_programsumoho['onanno_up']))? $bitorko_programsumoho['onanno_up']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <?php echo number_format(($onanno_up!=0)?$onanno_up/$onanno_sonkha:0,2)?>
                                </td>
                                <td class="tg-pwj7" colspan="">  
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_programsumoho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onanno_mon" data-title="Enter"><?php echo $onanno_mon=  (isset( $bitorko_programsumoho['onanno_mon']))? $bitorko_programsumoho['onanno_mon']:'' ?></a>
                                </td>
                               
                               
                          
                               
                            </tr>
                          


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
    }

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
