<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শাখার অনলাইন রিসোর্স' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/shakhar-online-resource') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/shakhar-online-resource/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="2"style="border-bottom: hidden;">ওয়েবসাইট</td>
                                <td class="tg-pwj7" colspan="2" style="border-bottom: hidden;"> ফেসবুক পেজ </td>
                                <td class="tg-pwj7" colspan="2"> টুইটার একাউন্ট  </td>
                                <td class="tg-pwj7" colspan="2">ইউটিউব চ্যানেল  </td>
                                <td class="tg-pwj7" rowspan="2" style="border-bottom: hidden;">অন্যান্য সোশ্যাল  </td>
                            </tr>
                            <tr>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span> </span></div></td>
                                
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1">সংখ্যা</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $s_ose_bm = $total_dept_shakhar_online_risors['s_ose_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $s_ose_br = $total_dept_shakhar_online_risors['s_ose_br'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $s_fbpj_bm = $total_dept_shakhar_online_risors['s_fbpj_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $s_fbpj_br = $total_dept_shakhar_online_risors['s_fbpj_br'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                  <?php echo $s_tuta_bm = $total_dept_shakhar_online_risors['s_tuta_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $s_tuta_br = $total_dept_shakhar_online_risors['s_tuta_br'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $s_youtub_bm = $total_dept_shakhar_online_risors['s_youtub_bm'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <?php echo $s_youtub_br = $total_dept_shakhar_online_risors['s_youtub_br'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $s_onnoannososhal = $total_dept_shakhar_online_risors['s_onnoannososhal'] ?>
                                </td>
                               
                            </tr>


                           
                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                         
                            <tr>
                              
                                <td class="tg-pwj7" rowspan="3" > আন্তর্জাতিক গণমাধ্যম </td>
                                <td class="tg-pwj7" rowspan="2" > ইলেকট্রনিক কতজন</td>
                                <td class="tg-pwj7" rowspan="2"  >  প্রিন্ট কতজন</td>
                                <td class="tg-pwj7" rowspan="2" > অনলাইন কতজন</td>
                                <td class="tg-pwj7" colspan='3'> ক্যাটাগরি </td>
                                <td class="tg-pwj7" rowspan="2" > মোট </td>
                                
                            </tr>
                            <tr>
                              
                              <td class="tg-pwj7" > A </td>
                              <td class="tg-pwj7" >   B </td>
                              <td class="tg-pwj7" > C </td>
                              
                          </tr>



                            <tr>
                            
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>

                            </tr>
                            <tr>
                              
                              <td class="tg-pwj7" colspan="8" > জাতীয় গণমাধ্যম </td>
                              
                              
                          </tr>
                          <tr>
                              
                              <td class="tg-pwj7" rowspan="3" > ইলেকট্রনিক</td>
                              <td class="tg-pwj7" rowspan="2" > কতজন</td>
                              <td class="tg-pwj7" rowspan="2"  >  রেডিও (আফআম) কতজন</td>
                              <td class="tg-pwj7" rowspan="2" > অনন্য কতজন</td>
                              <td class="tg-pwj7" colspan='3'> ক্যাটাগরি </td>
                              <td class="tg-pwj7" rowspan="2" > মোট </td>
                              
                          </tr>
                          <tr>
                              
                              <td class="tg-pwj7" > A </td>
                              <td class="tg-pwj7" >   B </td>
                              <td class="tg-pwj7" > C </td>
                              
                          </tr>



                            <tr>
                            
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>

                            </tr>
                            <tr>
                              
                              <td class="tg-pwj7" rowspan="3" > প্রিন্ট</td>
                              <td class="tg-pwj7" rowspan="2" >পত্রিকায় কতজন</td>
                              <td class="tg-pwj7" rowspan="2"  >সাময়িকী/প্রকাশনায় কতজন</td>
                              <td class="tg-pwj7" rowspan="2" > অন্যান্য কতজন</td>
                              <td class="tg-pwj7" colspan='3'> ক্যাটাগরি </td>
                              <td class="tg-pwj7" rowspan="2" > মোট </td>
                              
                          </tr>
                          <tr>
                              
                              <td class="tg-pwj7" > A </td>
                              <td class="tg-pwj7" >   B </td>
                              <td class="tg-pwj7" > C </td>
                              
                          </tr>
                            <tr>
                            
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>

                            </tr>
                            <tr>
                              
                              <td class="tg-pwj7" rowspan="3" > অনলাইন </td>
                              <td class="tg-pwj7" rowspan="2" >টিভিতে কতজন</td>
                              <td class="tg-pwj7" rowspan="2"  >রেডিওতে কতজন</td>
                              <td class="tg-pwj7" rowspan="2" > নিউজ পোর্টালে কতজন</td>
                              <td class="tg-pwj7" colspan='3'> ক্যাটাগরি </td>
                              <td class="tg-pwj7" rowspan="2" > মোট </td>
                              
                          </tr>
                          <tr>
                              
                              <td class="tg-pwj7" > A </td>
                              <td class="tg-pwj7" >   B </td>
                              <td class="tg-pwj7" > C </td>
                              
                          </tr>
                            <tr>
                            
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>

                            </tr>
                            <tr>
                              
                              <td class="tg-pwj7" rowspan="3" > মফস্বল (আঞ্চলিক গণমাধ্যম) </td>
                              <td class="tg-pwj7" rowspan="2" >প্রিন্ট কতজন</td>
                              <td class="tg-pwj7" rowspan="2"  >নিউজ পোর্টালে কতজন</td>
                              <td class="tg-pwj7" rowspan="2" >কমিউনিটি রেডিও/টিভিতে কতজন</td>
                              <td class="tg-pwj7" colspan='3'> ক্যাটাগরি </td>
                              <td class="tg-pwj7" rowspan="2" > মোট </td>
                              
                          </tr>
                          <tr>
                              
                              <td class="tg-pwj7" > A </td>
                              <td class="tg-pwj7" >   B </td>
                              <td class="tg-pwj7" > C </td>
                              
                          </tr>
                            <tr>
                            
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bondu_montb = $total_media_bivag3['bondu_montb'] ?>
                                </td>

                            </tr>
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
