<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রকাশনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-prokashona') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-prokashona/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>

                       <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>

                       <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>

                       <td class="tg-pwj7" colspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                
                                
                   </tr>
                   <tr>
                      
                      
                 

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-0pky  type_1">
                       নতুন গান বাধা 
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       নতুন গান নির্মান
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       ছড়া-কবিতার বই
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       ম্যাগাজিন	
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>


                   <tr>
                       <td class="tg-0pky  type_1">
                       নতুন সুরারোপ
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       ভিজ্যুয়াল নাটক
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       শর্টফিল্ম নির্মান
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       প্রচারপত্র
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাটকের পান্ডু লিপি
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       কবিতার পান্ডু লিপি
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       পুথিঁ নির্মান
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       মঞ্চ নাটক
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       চিত্রনাট্য পান্ডু  লিপি
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       ভিডিও অ্যালবাম
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       সাহিত্য পত্রিকা
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       ক্যালিওগ্রাফী
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>
                 
                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাটিকার পান্ডু লিপি 
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       অডিও অ্যালবাম
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       ক্যালেন্ডার
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       চিত্রাংকন
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       কৌতুকের পান্ডু লিপি 
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       গানের বই
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       স্মরণিকা/স্মারক
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       অন্যান্য
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       শর্টফিল্ম পান্ডু লিপি
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       নাটকের বই
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                       দেয়ালিকা
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_1">
                     
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ngb_s = $total_prokashona['ngb_s'] ?>
                       </td>
                      
                      
                   </tr>
                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
