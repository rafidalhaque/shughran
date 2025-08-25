<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/media-page-one') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan='4'><b>কমিটি</b></td>
                               
                            </tr>
                            <tr>
                            <td class="tg-pwj7" rowspan=''>ক্রম </td>
                            <td class="tg-pwj7" rowspan=''>শাখা আইডি </td>                           
                            <td class="tg-pwj7" colspan=''>শাখায় সাংবাদিক ফোরাম আছে কিনা?</td>
                            <td class="tg-pwj7" colspan=''>  সাংবাদিক ফোরাম কোন মানের? </td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($total_media->result_array() as $row) 
                                    {
                                    $i++;
                                    $status=array("1"=>"থানা","0"=>"শাখার বিভাগ");
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1">
                                        <?php echo $i ?>	
                                    </td>
                                    <td class="tg-0pky type_1">
                                        <?php echo $row['branch_id'] ?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <?php echo ($row['shang_forum_yes_no']==1)?"হ্যাঁ":"না";?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                        <?php echo isset($row['shang_forum_man'])?$status[$row['shang_forum_man']]:"";?>      
                                    </td>
                                </tr>

                        <?php } ?>      
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='12'><b>জনশক্তি</b></td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" >বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" >মোট বৃদ্ধি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >আগমন </td>
                                <td class="tg-pwj7" >মোট ঘাটতি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >স্থানান্তর</td>
                                <td class="tg-pwj7" >উচ্চশিক্ষা</td>
                                <td class="tg-pwj7" >ছাত্রত্ব শেষ</td>
                                <td class="tg-pwj7" >সাংবাদিক</td>
                            </tr>



                            <tr>                  
                                
                                <td class="tg-y698 type_1"> এডমিন	</td>
                                <td class="tg-0pky type_1" > 
                               <?php echo $admin_prev = $total_media_manpower['admin_prev'] ?>								
								</td>
                                <td class="tg-0pky">
                                 <?php echo $admin_pres = $total_media_manpower['admin_pres'] ?>	
								</td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_mot = $total_media_manpower['admin_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_man_unnoyon = $total_media_manpower['admin_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_man_agomon = $total_media_manpower['admin_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_total_gha = $total_media_manpower['admin_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_man_unnoyon = $total_media_manpower['admin_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_sthanantor = $total_media_manpower['admin_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_high_study = $total_media_manpower['admin_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_study_finish = $total_media_manpower['admin_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $admin_gha_shangbadik = $total_media_manpower['admin_gha_shangbadik'] ?>	
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাব-এডমিন</td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_prev = $total_media_manpower['sub_admin_prev'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_pres = $total_media_manpower['sub_admin_pres'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_mot = $total_media_manpower['sub_admin_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_man_unnoyon = $total_media_manpower['sub_admin_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_man_agomon = $total_media_manpower['sub_admin_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_total_gha = $total_media_manpower['sub_admin_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_man_unnoyon = $total_media_manpower['sub_admin_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_sthanantor = $total_media_manpower['sub_admin_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_high_study = $total_media_manpower['sub_admin_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_study_finish = $total_media_manpower['sub_admin_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $sub_admin_gha_shangbadik = $total_media_manpower['sub_admin_gha_shangbadik'] ?>	
                                </td>

                            </tr>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> প্রোগ্রামার	</td>
                                <td class="tg-0pky type_1" > 	
								  <?php echo $programmer_prev = $total_media_manpower['programmer_prev'] ?>	
								</td>
                                <td class="tg-0pky"> 
								  <?php echo $programmer_pres = $total_media_manpower['programmer_pres'] ?>	
								</td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_mot = $total_media_manpower['programmer_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_man_unnoyon = $total_media_manpower['programmer_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_man_agomon = $total_media_manpower['programmer_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_total_gha = $total_media_manpower['programmer_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_man_unnoyon = $total_media_manpower['programmer_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_sthanantor = $total_media_manpower['programmer_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_high_study = $total_media_manpower['programmer_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_study_finish = $total_media_manpower['programmer_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $programmer_gha_shangbadik = $total_media_manpower['programmer_gha_shangbadik'] ?>	
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষানবিশ</td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_prev = $total_media_manpower['shikkhanbish_prev'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_pres = $total_media_manpower['shikkhanbish_pres'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_mot = $total_media_manpower['shikkhanbish_mot'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_man_unnoyon = $total_media_manpower['shikkhanbish_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_man_agomon = $total_media_manpower['shikkhanbish_man_agomon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_total_gha = $total_media_manpower['shikkhanbish_total_gha'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_man_unnoyon = $total_media_manpower['shikkhanbish_gha_man_unnoyon'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_sthanantor = $total_media_manpower['shikkhanbish_gha_sthanantor'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_high_study = $total_media_manpower['shikkhanbish_gha_high_study'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_study_finish = $total_media_manpower['shikkhanbish_gha_study_finish'] ?>	
                                </td>
                                <td class="tg-0pky" >
                                 <?php echo $shikkhanbish_gha_shangbadik = $total_media_manpower['shikkhanbish_gha_shangbadik'] ?>	
                                </td>

                            </tr>
                            <tr>
                            
                                <td class="tg-y698" >মোট</td>    
                                <td class="tg-0pky" >
								  <?php echo ($admin_prev+$sub_admin_prev+$programmer_prev+$shikkhanbish_prev) ?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_pres+$sub_admin_pres+$programmer_pres+$shikkhanbish_pres)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_mot+$sub_admin_mot+$programmer_mot+$shikkhanbish_mot)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_man_unnoyon+$sub_admin_man_unnoyon+$programmer_man_unnoyon+$shikkhanbish_man_unnoyon)?>
								</td>
                                <td class="tg-0pky" >
								   <?php echo ($admin_man_agomon+$sub_admin_man_agomon+$programmer_man_agomon+$shikkhanbish_man_agomon)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_total_gha+$sub_admin_total_gha+$programmer_total_gha+$shikkhanbish_total_gha)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_man_unnoyon+$sub_admin_gha_man_unnoyon+$programmer_gha_man_unnoyon+$shikkhanbish_gha_man_unnoyon)?>
								</td>
                                <td class="tg-0pky" >
								  <?php echo ($admin_gha_sthanantor+$sub_admin_gha_sthanantor+$programmer_gha_sthanantor+$shikkhanbish_gha_sthanantor)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_gha_high_study+$sub_admin_gha_high_study+$programmer_gha_high_study+$shikkhanbish_gha_high_study)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_study_finish+$sub_admin_gha_study_finish+$programmer_gha_study_finish+$shikkhanbish_gha_study_finish)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_shangbadik+$sub_admin_gha_shangbadik+$programmer_gha_shangbadik+$shikkhanbish_gha_shangbadik)?>
								</td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='6'><b>যোগাযোগ</b></td>
                               
                            </tr>
                            <tr>                              
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" > কতজন </td>
                                <td class="tg-pwj7" >কতবার</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" > কতজন </td>
                                <td class="tg-pwj7" >কতবার</td>
                            </tr>



                            <tr>                          
                                                            
                                <td class="tg-y698 type_1"> সাংবাদিক	</td>
                               
                                <td class="tg-0pky" >
                                <?php echo $shangbadik_num = $total_media_contact['shangbadik_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $shangbadik_bar = $total_media_contact['shangbadik_bar'] ?>
                                </td>
                                <td class="tg-y698" > মালিক </td>
                                <td class="tg-0pky" >
                                <?php echo $malik_num = $total_media_contact['malik_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $malik_bar = $total_media_contact['malik_bar'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু</td>
                                <td class="tg-0pky" >
                                <?php echo $bondhu_num = $total_media_contact['bondhu_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondhu_bar = $total_media_contact['bondhu_bar'] ?>
                                </td>
                                <td class="tg-y698" > সম্পাদক</td>
                                <td class="tg-0pky" >
                                <?php echo $shompadok_num = $total_media_contact['shompadok_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $shompadok_bar = $total_media_contact['shompadok_bar'] ?>
                                </td>                                

                            </tr>
                            
                            <tr>
                                <td class="tg-y698">ছাত্র</td>
                                <td class="tg-0pky" >
                                <?php echo $student_num = $total_media_contact['student_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $student_bar = $total_media_contact['student_bar'] ?>
                                </td>
                                <td class="tg-y698" >কলামিস্ট </td>
                                <td class="tg-0pky" >
                                <?php echo $collamist_num = $total_media_contact['collamist_num'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $collamist_bar = $total_media_contact['collamist_bar'] ?>
                                </td>                                
                            </tr>  

                        </table>
                      
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
