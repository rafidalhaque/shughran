<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বিশ্ববিদ্যালয় ভর্তি তত্বাবধান সংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/bissobiddyaloy-vorti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bissobiddyaloy-vorti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">ভর্তিচ্ছু জনশক্তিদের মান</td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ভর্তিচ্ছু জনশক্তিদের সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> শাখার পক্ষ থেকে ভর্তিচ্ছু যতজনকে নিয়মিত তত্ত্বাবধায়ন করা হয়েছে </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> ভর্তিচ্ছু জনশক্তিদের অবস্থানরত এলাকা,শাখা বা কোচিংয়ের দায়িত্বশীলদের পক্ষ থেকে যতজনকে নিয়মিত তত্ত্বাবধায়ন করা হয়েছে </span></div></td>
                                <td class="tg-pwj7" colspan="2"> মেডিকেল </td>
                                <td class="tg-pwj7" colspan="2">ইঞ্জিনিয়ারিং </td>
                                <td class="tg-pwj7" colspan="2">বিশ্ববিদ্যালয়   </td>
                                <td class="tg-pwj7" colspan="2">সর্বমোট</td>
                            </tr>

                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>ভর্তির চেষ্টা করছেন</span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভর্তির চেষ্টা করছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভর্তির চেষ্টা করছেন</span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                <td class="tg-pwj7 "><div><span>ভর্তির চেষ্টা করছেন</span></div></td>
                                <td class="tg-pwj7 "><div><span>চান্স পেয়েছেন </span></div></td>
                                
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sod_vcjshs = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_vcjshs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $sod_shpthvcjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_shpthvcjntbkho'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $sod_vcjdorashcidshpthjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_vcjdorashcidshpthjntbkho'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sod_mk_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_mk_vcekch'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sod_mk_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_mk_cspch'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $sod_enr_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_enr_vcekch'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sod_enr_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_enr_cspch'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                 <?php echo $sod_bibil_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_bibil_vcekch'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $sod_bibil_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sod_bibil_cspch'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $total_sod_vorti=($sod_mk_vcekch+$sod_enr_vcekch+$sod_bibil_vcekch)?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $total_sod_cspch=($sod_mk_cspch+$sod_enr_cspch+$sod_bibil_cspch)?>
                                </td>
                              
                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_vcjshs = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_vcjshs'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_shpthvcjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_shpthvcjntbkho'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_vcjdorashcidshpthjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_vcjdorashcidshpthjntbkho'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_mk_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_mk_vcekch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_mk_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_mk_cspch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_enr_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_enr_vcekch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_enr_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_enr_cspch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_bibil_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_bibil_vcekch'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $sat_bibil_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['sat_bibil_cspch'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $total_sat_vorti=($sat_mk_vcekch+$sat_enr_vcekch+$sat_bibil_vcekch)?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $total_sat_cspch=($sat_mk_cspch+$sat_enr_cspch+$sat_bibil_cspch)?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_vcjshs = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_vcjshs'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_shpthvcjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_shpthvcjntbkho'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_vcjdorashcidshpthjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_vcjdorashcidshpthjntbkho'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_mk_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_mk_vcekch'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_mk_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_mk_cspch'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_enr_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_enr_vcekch'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_enr_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_enr_cspch'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_bibil_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_bibil_vcekch'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                  <?php echo $kor_bibil_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['kor_bibil_cspch'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $total_kor_vorti=($kor_mk_vcekch+$kor_enr_vcekch+$kor_bibil_vcekch)?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $total_kor_cspch=($kor_mk_cspch+$kor_enr_cspch+$kor_bibil_cspch)?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                  <?php echo $som_vcjshs = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_vcjshs'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $som_shpthvcjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_shpthvcjntbkho'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $som_vcjdorashcidshpthjntbkho = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_vcjdorashcidshpthjntbkho'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $som_mk_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_mk_vcekch'] ?>
                                </td>
                                <td class="tg-0pky">
                                  <?php echo $som_mk_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_mk_cspch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $som_enr_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_enr_vcekch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $som_enr_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_enr_cspch'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $som_bibil_vcekch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_bibil_vcekch'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $som_bibil_cspch = $total_bishobiddaloi_vorti_tottabodhon_sonkarnto['som_bibil_cspch'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $total_som_vorti=($som_mk_vcekch+$som_enr_vcekch+$som_bibil_vcekch)?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $total_som_cspch=($som_mk_cspch+$som_enr_cspch+$som_bibil_cspch)?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo $total_vcjshs=($sod_vcjshs+$sat_vcjshs+$kor_vcjshs+$som_vcjshs)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_shpthvcjntbkho=($sod_shpthvcjntbkho+$sat_shpthvcjntbkho+$kor_shpthvcjntbkho+$som_shpthvcjntbkho)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_vcjdorashcidshpthjntbkho=($sod_vcjdorashcidshpthjntbkho+$sat_vcjdorashcidshpthjntbkho+$kor_vcjdorashcidshpthjntbkho+$som_vcjdorashcidshpthjntbkho)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_mk_vcekch=($sod_mk_vcekch+$sat_mk_vcekch+$kor_mk_vcekch+$som_mk_vcekch)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_mk_cspch=($sod_mk_cspch+$sat_mk_cspch+$kor_mk_cspch+$som_mk_cspch)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_enr_vcekch=($sod_enr_vcekch+$sat_enr_vcekch+$kor_enr_vcekch+$som_enr_vcekch)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_enr_cspch=($sod_enr_cspch+$sat_enr_cspch+$kor_enr_cspch+$som_enr_cspch)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $total_bibil_vcekch=($sod_bibil_vcekch+$sat_bibil_vcekch+$kor_bibil_vcekch+$som_bibil_vcekch)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $total_bibil_cspch=($sod_bibil_cspch+$sat_bibil_cspch+$kor_bibil_cspch+$som_bibil_cspch)?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($total_sod_vorti+$total_sat_vorti+$total_kor_vorti+$total_som_vorti)?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($total_sod_cspch+$total_sat_cspch+$total_kor_cspch+$total_som_cspch)?>
                                </td>
                              
                            </tr>



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
