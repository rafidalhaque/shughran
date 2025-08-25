<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'জনশক্তির দক্ষতা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/jonoshoktir-dokhota') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jonoshoktir-dokhota/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> ওর্য়াড </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> এক্সেল </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> পাওয়ারপয়ন্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ভিডিও <br> এডিটিং </span></div></td>
                                <td class="tg-pwj7" colspan="2">গ্রাফিক ডিজাইন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> ওয়বে <br> ডেভেলপম্যান্ট </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>অ্যাপ <br> ডেভেলপম্যান্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>আইটি এক্সপার্ট</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span> ফটোশপ  </span></div></td>
                                <td class="tg-pwj7 "><div><span> ইলাস্ট্রেটর</span></div></td>
                              
                         
                        
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sod_mio = $total_dept_jonoshoktir_dokkhota['sod_mio'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sod_miax = $total_dept_jonoshoktir_dokkhota['sod_miax'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sod_mipp = $total_dept_jonoshoktir_dokkhota['sod_mipp'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $sod_vdoe = $total_dept_jonoshoktir_dokkhota['sod_vdoe'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $sod_gdp = $total_dept_jonoshoktir_dokkhota['sod_gdp'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <?php echo $sod_gde = $total_dept_jonoshoktir_dokkhota['sod_gde'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $sod_web = $total_dept_jonoshoktir_dokkhota['sod_web'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sod_app = $total_dept_jonoshoktir_dokkhota['sod_app'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $sod_it = $total_dept_jonoshoktir_dokkhota['sod_it'] ?>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_mio = $total_dept_jonoshoktir_dokkhota['sat_mio'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_miax = $total_dept_jonoshoktir_dokkhota['sat_miax'] ?>
                                </td>
                                <td class="tg-0pky">
                               <?php echo $sat_mipp = $total_dept_jonoshoktir_dokkhota['sat_mipp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_vdoe = $total_dept_jonoshoktir_dokkhota['sat_vdoe'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_gdp = $total_dept_jonoshoktir_dokkhota['sat_gdp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $sat_gde = $total_dept_jonoshoktir_dokkhota['sat_gde'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_web = $total_dept_jonoshoktir_dokkhota['sat_web'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $sat_app = $total_dept_jonoshoktir_dokkhota['sat_app'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sat_it = $total_dept_jonoshoktir_dokkhota['sat_it'] ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                  <?php echo $kor_mio = $total_dept_jonoshoktir_dokkhota['kor_mio'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_miax = $total_dept_jonoshoktir_dokkhota['kor_miax'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_mipp = $total_dept_jonoshoktir_dokkhota['kor_mipp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_vdoe = $total_dept_jonoshoktir_dokkhota['kor_vdoe'] ?>
                                </td>
                                <td class="tg-0pky">
                                 <?php echo $kor_gdp = $total_dept_jonoshoktir_dokkhota['kor_gdp'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_gde = $total_dept_jonoshoktir_dokkhota['kor_gde'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_web = $total_dept_jonoshoktir_dokkhota['kor_web'] ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $kor_app = $total_dept_jonoshoktir_dokkhota['kor_app'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kor_it = $total_dept_jonoshoktir_dokkhota['kor_it'] ?>
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
 
