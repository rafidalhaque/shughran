<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মোটিভেশনাল প্রোগ্রামঃ(প্রফেশনাল ও একাডেমিক) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/motivational-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/motivational-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="4">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>
                                <td class="tg-pwj7" colspan="4">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>
                                <td class="tg-pwj7" colspan="2">শিক্ষাবৃত্তি/উপকরণ প্রদান  </td>
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1" colspan="4">ক্যারিয়ার কাউন্সেলিং (JSC/JDC)	</td>
                                
                                <td class="tg-0pky  type_2">
                                <?php echo $cc_jsc_sonkha=$total_motivational_program['cc_jsc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $cc_jsc_uposthiti=$total_motivational_program['cc_jsc_uposthiti'] ?>
                                </td>
                                <td class="tg-y698 type_1"colspan="4">A+  সংবর্ধনা (PSC/PEC)	</td>
                                
                                <td class="tg-0pky  type_2">
                                <?php echo $as_psc_sonkha=$total_motivational_program['as_psc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $as_psc_uposthiti=$total_motivational_program['as_psc_uposthiti'] ?>
                                </td>
                                <td class="tg-y698  type_2">সংখ্যা</td>
                                <td class="tg-y698  type_3">উপস্থিতি</td>
                               
                            </tr>


                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (SSC/Dakhil) </td>
                               
                                <td class="tg-0pky">
                                <?php echo $cc_ssc_sonkha=$total_motivational_program['cc_ssc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_ssc_uposthiti=$total_motivational_program['cc_ssc_uposthiti'] ?>
                                </td>
                                <td class="tg-y698"colspan="4">A+  সংবর্ধনা (JSC/JDC) </td>
                                <td class="tg-0pky">
                                <?php echo $as_jsc_sonkha=$total_motivational_program['as_jsc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $as_jsc_uposrhiti=$total_motivational_program['as_jsc_uposrhiti'] ?>
                                </td>
                                <td class="tg-y698" colspan="2">(৫ম-১০ম)/পরীক্ষার্থী</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (HSC/Alim) </td>
                                
                                <td class="tg-0pky">
                                <?php echo $cc_hsc_sonkha=$total_motivational_program['cc_hsc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_hsc_uposthiti=$total_motivational_program['cc_hsc_uposthiti'] ?>
                                </td>
                                <td class="tg-y698"colspan="4">A+  সংবর্ধনা (SSC/Dakhil) </td>
                                <td class="tg-0pky">
                                <?php echo $as_ssc_sonkha=$total_motivational_program['as_ssc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $as_ssc_uposthiti=$total_motivational_program['as_ssc_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $five_porik_sonkha=$total_motivational_program['five_porik_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $five_porik_uposthiti=$total_motivational_program['five_porik_uposthiti'] ?>
                                </td>
                            </tr>    
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (বিসিএস) </td>
                               
                                <td class="tg-0pky">
                                <?php echo $cc_bcs_sonkha=$total_motivational_program['cc_bcs_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_bcs_uposthiti=$total_motivational_program['cc_bcs_uposthiti'] ?>
                                </td>
                                <td class="tg-y698"colspan="4">A+  সংবর্ধনা (HSC/Alim) </td>
                                <td class="tg-0pky">
                                <?php echo $as_hsc_sonkha=$total_motivational_program['as_hsc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $as_hsc_uposthiti=$total_motivational_program['as_hsc_uposthiti'] ?>
                                </td>
                                <td class="tg-y698" colspan="2">(একাদশ-দ্বাদশ)/পরীক্ষার্থী</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (বিশ্বঃশিক্ষক তৈরি) </td>
                                
                                <td class="tg-0pky">
                                <?php echo $cc_bst_sonkha=$total_motivational_program['cc_bst_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_bst_uposthiti=$total_motivational_program['cc_bst_uposthiti'] ?>
                                </td>
                                <td class="tg-y698"colspan="4">সিঙ্গেল ভিজিট সংবর্ধনা </td>
                                <td class="tg-0pky">
                                <?php echo $svs_sonkha=$total_motivational_program['svs_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $svs_uposthiti=$total_motivational_program['svs_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $elev_porik_sonkha=$total_motivational_program['elev_porik_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $elev_porik_uposthiti=$total_motivational_program['elev_porik_uposthiti'] ?>
                                </td>
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (উচ্চ শিক্ষা) </td>
                               
                                <td class="tg-0pky">
                                <?php echo $cc_us_sonkha=$total_motivational_program['cc_us_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_us_uposthiti=$total_motivational_program['cc_us_uposthiti'] ?>
                                </td>
                                <td class="tg-y698"colspan="4">মেধাবী সংবর্ধনা(১-৫) (অনার্স-মাস্টার্স)</td>
                                <td class="tg-0pky">
                                <?php echo $ms_sonkha=$total_motivational_program['ms_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $ms_uposthiti=$total_motivational_program['ms_uposthiti'] ?>
                                </td>
                                <td class="tg-y698" colspan="2">শিক্ষাবৃত্তি প্রদান (অনার্স)</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698" colspan="2">BJS কাউন্সেলিং</td>
                                
                                <td class="tg-y698"colspan="2">ক্যাডেট কলেজ</td>
                                <td class="tg-y698" colspan="2">PSC/PEC</td>
                                <td class="tg-y698"colspan="2">সামিট (বিজ্ঞান)</td>
                                <td class="tg-y698"colspan="2">সামিট (বাণিজ্য)</td>
                                <td class="tg-y698"colspan="2">সামিট (মানবিক)</td>
                                
                                <td class="tg-0pky">
                                <?php echo $hnrs_shikb_sonkha=$total_motivational_program['hnrs_shikb_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $hnrs_shikb_uposthiti=$total_motivational_program['hnrs_shikb_uposthiti'] ?>
                                </td>
                            <tr>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                
                                <td class="tg-y698" colspan="2">শিক্ষাবৃত্তি প্রদান (মাস্টার্স)</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-0pky">
                                <?php echo $bjs_sonkha=$total_motivational_program['bjs_sonkha'] ?>
                                </td>
                                
                                <td class="tg-0pky">
                                <?php echo $bjs_uposthiti=$total_motivational_program['bjs_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_sonkha=$total_motivational_program['cc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $cc_uposthiti=$total_motivational_program['cc_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $psc_pec_sonkha=$total_motivational_program['psc_pec_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $psc_pec_uposthiti=$total_motivational_program['psc_pec_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_sc_sonkha=$total_motivational_program['summit_sc_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_sc_uposthiti=$total_motivational_program['summit_sc_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_ba_sonkha=$total_motivational_program['summit_ba_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_ba_uposthiti=$total_motivational_program['summit_ba_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_ma_sonkha=$total_motivational_program['summit_ma_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_ma_uposthiti=$total_motivational_program['summit_ma_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $mstrs_shikb_sonkha=$total_motivational_program['mstrs_shikb_sonkha'] ?>
                                </td>

                                <td class="tg-0pky">
                                <?php echo $mstrs_shikb_uposthiti=$total_motivational_program['mstrs_shikb_uposthiti'] ?>
                                </td>
                            <tr>
                                <td class="tg-y698" colspan="2">সামিট (মেডিকেল)</td>
                               
                                <td class="tg-y698"colspan="2">সামিট (ইঞ্জিনিয়ারিং)</td>
                                <td class="tg-y698"colspan="4">এডুকেশন সামিট (অনার্স/মাস্টার্স) </td>
                                <td class="tg-y698"colspan="2">সামিট (ডিফেন্স)</td>
                                <td class="tg-y698"colspan="2">দোয়া মাহফিল</td>
                                
                                <td class="tg-y698" colspan="2">শিক্ষাবৃত্তি প্রদান (উচ্চশীক্ষা)</td>
                                

                            </tr>
                            <tr>
                               
                                <td class="tg-0pky">
                                <?php echo $summit_med_sonkha=$total_motivational_program['summit_med_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_med_uposthiti=$total_motivational_program['summit_med_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_engr_sonkha=$total_motivational_program['summit_engr_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_engr_uposthiti=$total_motivational_program['summit_engr_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $esummit_hm_sonkha=$total_motivational_program['esummit_hm_sonkha'] ?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $esummit_hm_uposthiti=$total_motivational_program['esummit_hm_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_def_sonkha=$total_motivational_program['summit_def_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $summit_def_uposthiti=$total_motivational_program['summit_def_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $dm_sonkha=$total_motivational_program['dm_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $dm_uposthiti=$total_motivational_program['dm_uposthiti'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $us_shikb_sonkha=$total_motivational_program['us_shikb_sonkha'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $us_shikb_uposthiti=$total_motivational_program['us_shikb_uposthiti'] ?>
                                </td>


                            </tr>                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
