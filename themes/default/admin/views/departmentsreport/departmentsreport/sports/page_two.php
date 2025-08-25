<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'স্পোর্টস বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/sports_page_two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/sports_page_two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                                 <td class="tg-pwj7" colspan="7"><b>স্পোর্টস ক্লাব</b></td>
                                             </tr>           
                                           
                                            <tr>
                                                <td class="tg-pwj7" colspan="">ক্লাব সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">রেজিস্টার্ড কতটি  </td>
                                                <td class="tg-pwj7" colspan="">কমিটি আছে কতটিতে</td>
                                                <td class="tg-pwj7" colspan="">নিয়োজিক জনশক্তি</td>
                                                <td class="tg-pwj7" colspan="">খেলোয়ার সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">প্রোগ্রাম সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">অংশগ্রহণকারী </td>
                                            </tr>
                         
                                            <tr>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $club_num = $total_sports_club['club_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $registard_num = $total_sports_club['registard_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $committee_te_koto_ti = $total_sports_club['committee_te_koto_ti'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $niyojito_manpower = $total_sports_club['niyojito_manpower'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $player_num = $total_sports_club['player_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $program_num = $total_sports_club['program_num'] ?>
                                            </td>
                                            <td class="tg-0pky  type_10">
                                                <?php echo $attendence = $total_sports_club['attendence'] ?>
                                            </td>
                                        
                                            </tr>
                                           
                         
                                         </table>
                                         <table class="tg table table-header-rotated" id="testTable2">
                                             
                                             <tr>
                                                 <td class="tg-pwj7" colspan="6"><b>টিমসংক্রান্ত </b></td>
                                             </tr>           
                                           
                                            <tr>
                                                <td class="tg-pwj7" colspan="">মাঠ সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">টিম সংখ্যা  </td>
                                                <td class="tg-pwj7" colspan="">জনশক্তি সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">কতটি মাঠে টিম নেই</td>
                                                <td class="tg-pwj7" colspan="">মাঠ কেন্দ্রিক কর্মসূচী বাস্তবায়ন কতটি?</td>
                                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                            </tr>
                         
                                            <tr>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $math_num = $total_sports_team_number['math_num'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $team_num = $total_sports_team_number['team_num'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $manpower_num = $total_sports_team_number['manpower_num'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $mathe_team_kototi = $total_sports_team_number['mathe_team_kototi'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $math_kendrik_kormo = $total_sports_team_number['math_kendrik_kormo'] ?>
                                                </td>
                                                <td class="tg-0pky  type_10">
                                                    <?php echo $present = $total_sports_team_number['present'] ?>
                                                </td>
                                            </tr>
                                            
                         
                                         </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='7'><b> স্বাস্থ্য সচেতনতা </b> </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='2'> নিয়মিত হাঁটা ও শরীর চর্চা</td>
                                <td class="tg-pwj7" colspan='2'>সচেতনতামূলক প্রোগ্রাম </td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি ফার্স্ট  এইড কোর্স হয়েছে? </span></div></td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি সচেতনতামূলক ভিডিও তৈরি?  </span></div></td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি সচেতনতামূলক স্টিকার তৈরি?   </span></div></td>
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">গ্রুপ সংখ্যা </td>
                                <td class="tg-pwj7  type_1">
                                    অংশগ্রহণকারী
                                </td>
                                <td class="tg-pwj7 type_1">গ্রুপ সংখ্যা </td>
                                <td class="tg-pwj7  type_2">
                                    অংশগ্রহণকারী
                                </td>
                              
                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_10">
                                    <?php echo $hatahati_group_num = $total_sports_sastho_shochetonota['hatahati_group_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $hatahati_attendance = $total_sports_sastho_shochetonota['hatahati_attendance'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shochetonota_num = $total_sports_sastho_shochetonota['shochetonota_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shochetonota_attendance = $total_sports_sastho_shochetonota['shochetonota_attendance'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kototi_fast_aid = $total_sports_sastho_shochetonota['kototi_fast_aid'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kototi_shochetonotonota_video = $total_sports_sastho_shochetonota['kototi_shochetonotonota_video'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kototi_shochetonotonota_sticker = $total_sports_sastho_shochetonota['kototi_shochetonotonota_sticker'] ?>
                                </td>
                               
                              
                            </tr>
                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='8'><b> যোগাযোগ </b> </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"> ক্রম</td>
                                <td class="tg-pwj7"> শাখা আইডি</td>
                                <td class="tg-pwj7"> ক্রীড়া ব্যক্তিত্বের নাম </td>
                                <td class="tg-pwj7 "><div><span> খেলার নাম </span></div></td>
                                <td class="tg-pwj7 "><div><span> ধরন  </span></div></td>
                                <td class="tg-pwj7 "><div><span> কতবার  </span></div></td>
                               
                            </tr>

                            <?php 
                                $i=0;
                            foreach($total_sports_contact->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['kria_bektir_nam'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['khelar_nam'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['dhoron'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['kotobar'] ?>      
                                    </td>
                                </tr>

                        <?php } ?>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
