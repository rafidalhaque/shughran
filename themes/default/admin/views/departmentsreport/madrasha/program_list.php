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
                            <li><a href="<?= admin_url('departmentsreport/program-list') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/program-list/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">প্রোগ্রামের ধরন</td>
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোট উপস্থিতি </span></div></td>
                                <td class="tg-pwj7 "><div><span> গড় </span></div></td>
                                
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> ছাত্র সমাবেশ	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $chs_s=$total_program_somuho['chs_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $chs_mup=$total_program_somuho['chs_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($chs_mup!=0)?($chs_mup/$chs_s):0?>
                                </td>
                            
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">প্রতিনিধি সমাবেশ </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ps_s=$total_program_somuho['ps_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ps_mup=$total_program_somuho['ps_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($ps_mup!=0)?($ps_mup/$ps_s):0?>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">পরীক্ষার্থীদের দোয়া মাহফিল </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pdm_s=$total_program_somuho['pdm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pdm_mup=$total_program_somuho['pdm_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($pdm_mup!=0)?($pdm_mup/$pdm_s):0?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">আরবি ভাষা শিক্ষা কোর্স</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $avshk_s=$total_program_somuho['avshk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $avshk_mup=$total_program_somuho['avshk_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($avshk_mup!=0)?($avshk_mup/$avshk_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">নাহু সরফ কোর্স </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $nsk_s=$total_program_somuho['nsk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $nsk_mup=$total_program_somuho['nsk_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($nsk_mup!=0)?($nsk_mup/$nsk_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">তালিমুল কোরআন কোর্স </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $tkk_s=$total_program_somuho['tkk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $tkk_mup=$total_program_somuho['tkk_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($tkk_mup!=0)?($tkk_mup/$tkk_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> আলেম তৈরি কর্মশালা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $atk_s=$total_program_somuho['atk_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $atk_mup=$total_program_somuho['atk_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($atk_mup!=0)?($atk_mup/$atk_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">আলেমদের সাথে মতবিনিময় </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $asm_s=$total_program_somuho['asm_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $asm_mup=$total_program_somuho['asm_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($asm_mup!=0)?($asm_mup/$asm_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> শিক্ষক যোগাযোগ </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $shj_s=$total_program_somuho['shj_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shj_mup=$total_program_somuho['shj_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($shj_mup!=0)?($shj_mup/$shj_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মেধাবী সংবর্ধনা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ms_s=$total_program_somuho['ms_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ms_mup=$total_program_somuho['ms_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($ms_mup!=0)?($ms_mup/$ms_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">হাফেজে কুরআন সংবর্ধনা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $haks_s=$total_program_somuho['haks_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $haks_mup=$total_program_somuho['haks_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($haks_mup!=0)?($haks_mup/$haks_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">হিফজুল কোরআন প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hikp_s=$total_program_somuho['hikp_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $hikp_mup=$total_program_somuho['hikp_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($hikp_mup!=0)?($hikp_mup/$hikp_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">হিফযুল হাদিস প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $hihap_s=$total_program_somuho['hihap_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $hihap_mup=$total_program_somuho['hihap_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($hihap_mup!=0)?($hihap_mup/$hihap_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">আরবী বক্তৃতা প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $abp_s=$total_program_somuho['abp_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $abp_mup=$total_program_somuho['abp_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($abp_mup!=0)?($abp_mup/$abp_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">বিতর্ক প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bp_s=$total_program_somuho['bp_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bp_mup=$total_program_somuho['bp_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($bp_mup!=0)?($bp_mup/$bp_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">আযান ও কেরাত প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $akp_s=$total_program_somuho['akp_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $akp_mup=$total_program_somuho['akp_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($akp_mup!=0)?($akp_mup/$akp_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">প্রশ্ন উত্তর প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pup_s=$total_program_somuho['pup_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pup_mup=$total_program_somuho['pup_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($pup_mup!=0)?($pup_mup/$pup_s):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">ওয়ায়েজীন প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ogp_s=$total_program_somuho['ogp_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ogp_mup=$total_program_somuho['ogp_mup'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo ($ogp_mup!=0)?($ogp_mup/$ogp_s):0?>
                                </td>
                            </tr>
                    



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
