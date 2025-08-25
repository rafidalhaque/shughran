<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'নিয়মিত প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/niyomito-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/niyomito-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">ধরন </td>
                   
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">সংখ্যা   </td>
                                <td class="tg-pwj7" colspan="">উপস্থিত </td>
                                <td class="tg-pwj7" colspan="">কর</td>
                           
                            </tr>
                            <tr>
                          
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সাপ্তাহিক ক্লাস 	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shkk_s = $total_niomito_program['shkk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shkk_up = $total_niomito_program['shkk_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shkk_up!=0)?$shkk_s/$shkk_s:0,2)?>
                                </td>
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">দারসুল কুরআন </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $dsk_s = $total_niomito_program['dsk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dsk_up = $total_niomito_program['dsk_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dsk_up!=0)?$dsk_s/$dsk_s:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">উন্মুক্ত ক্লাস  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $umk_s = $total_niomito_program['umk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $umk_up = $total_niomito_program['umk_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($umk_up!=0)?$umk_s/$umk_s:0,2)?>
                                </td>
                              
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">মতবিনিময় সভা  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $ms_s = $total_niomito_program['ms_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ms_up = $total_niomito_program['ms_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($ms_up!=0)?$ms_s/$ms_s:0,2)?>
                                </td>
                              
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">দায়িত্বশীল বৈঠক  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $dshb_s = $total_niomito_program['dshb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $dshb_up = $total_niomito_program['dshb_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dshb_up!=0)?$dshb_s/$dshb_s:0,2)?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">ইনডোর সেমিনার  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $eds_s = $total_niomito_program['eds_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $eds_up = $total_niomito_program['eds_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($eds_up!=0)?$eds_s/$eds_s:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ব্যবহারিক ক্লাস </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $brk_s = $total_niomito_program['brk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $brk_up = $total_niomito_program['brk_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($brk_up!=0)?$brk_s/$brk_s:0,2)?>
                                </td>
                                                          
                            </tr>
                            <tr>
                                <td class="tg-y698"> ভিজুয়াল ক্লাস </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $vk_s = $total_niomito_program['vk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $vk_up = $total_niomito_program['vk_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($vk_up!=0)?$vk_s/$vk_s:0,2)?>
                                </td>
                                                          
                            </tr>
                            <tr>
                                <td class="tg-y698">মিলন মেলা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $mm_s = $total_niomito_program['mm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $mm_up = $total_niomito_program['mm_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($mm_up!=0)?$mm_s/$mm_s:0,2)?>
                                </td>
                              
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">সংবাদ বিশ্লেষণ </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sb_s = $total_niomito_program['sb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sb_up = $total_niomito_program['sb_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($sb_up!=0)?$sb_s/$sb_s:0,2)?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">পুরস্কার বিতরণী অনুষ্ঠান </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $pukbo_s = $total_niomito_program['pukbo_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pukbo_up = $total_niomito_program['pukbo_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($pukbo_up!=0)?$pukbo_s/$pukbo_s:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">নবীন বরণ </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $nb_s = $total_niomito_program['nb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nb_up = $total_niomito_program['nb_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($nb_up!=0)?$nb_s/$nb_s:0,2)?>
                                </td>
                                                          
                            </tr>
                            <tr>
                                <td class="tg-y698">ইফতার  </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $et_s = $total_niomito_program['et_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $et_up = $total_niomito_program['et_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($et_up!=0)?$et_s/$et_s:0,2)?>
                                </td>
                                                          
                            </tr>
                            <tr>
                                <td class="tg-y698">মূল্যায়ন পরীক্ষা </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $mp_s = $total_niomito_program['mp_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $mp_up = $total_niomito_program['mp_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($mp_up!=0)?$mp_s/$mp_s:0,2)?>
                                </td>
                              
                            
                            </tr>

                                <td class="tg-0pky"> অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $onnoannop_s = $total_niomito_program['onnoannop_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $onnoannop_up = $total_niomito_program['onnoannop_up'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($onnoannop_up!=0)?$onnoannop_s/$onnoannop_s:0,2)?>
                                </td>
                                                           
                            </tr>



                            
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
