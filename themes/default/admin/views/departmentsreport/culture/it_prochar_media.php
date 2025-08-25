<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'আইটি প্রচার ও মিডিয়া' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/it-prochar-media') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-prochar-media/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" rowspan="3">আপলোড </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">গান  </td>
                       <td class="tg-pwj7" colspan="">অভিনয়  </td>
                       <td class="tg-pwj7" colspan="">আবৃতি </td>
                       <td class="tg-pwj7" colspan="">তেলোয়াত  </td>
                       <td class="tg-pwj7" colspan="">শর্ট ফিল্ম  </td>
                       <td class="tg-pwj7" colspan="">নিউজ </td>
                       <td class="tg-pwj7" colspan="">নিউজ প্রকাশ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা</td>
                 
                 

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-y698 type_1"> ফেসবুক আপলোড	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fba_g = $total_it_procar_media['fba_g'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $fba_ovn = $total_it_procar_media['fba_ovn'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $fba_at = $total_it_procar_media['fba_at'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fba_ty = $total_it_procar_media['fba_ty'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $fba_shtf = $total_it_procar_media['fba_shtf'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $fba_news = $total_it_procar_media['fba_news'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       জাতীয় পত্রিকায় 
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $jp_s = $total_it_procar_media['jp_s'] ?>
                       </td>
             
                      
                   </tr>

                   <tr>
                       <td class="tg-y698 type_1"> টুইটার পোস্ট	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fba_g = $total_it_procar_media['fba_g'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $fba_ovn = $total_it_procar_media['fba_ovn'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $fba_at = $total_it_procar_media['fba_at'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fba_ty = $total_it_procar_media['fba_ty'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $fba_shtf = $total_it_procar_media['fba_shtf'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $fba_news = $total_it_procar_media['fba_news'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       স্থানীয় পত্রিকা 
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $jp_s = $total_it_procar_media['jp_s'] ?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">ইউটিউব  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $youtub_g = $total_it_procar_media['youtub_g'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $youtub_ovn = $total_it_procar_media['youtub_ovn'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $youtub_at = $total_it_procar_media['youtub_at'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $youtub_ty = $total_it_procar_media['youtub_ty'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $youtub_shtf = $total_it_procar_media['youtub_shtf'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $youtub_news = $total_it_procar_media['youtub_news'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       অনলাইন পত্রিকা
                        </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $snp_s = $total_it_procar_media['snp_s'] ?>
                       </td>
             
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ওয়েবসাইট  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ost_g = $total_it_procar_media['ost_g'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ost_ovn = $total_it_procar_media['ost_ovn'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $ost_at = $total_it_procar_media['ost_at'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ost_ty = $total_it_procar_media['ost_ty'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ost_shtf = $total_it_procar_media['ost_shtf'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $ost_news = $total_it_procar_media['ost_news'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       অনলাইন ব্লগে লেখা
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $onlinep_s = $total_it_procar_media['onlinep_s'] ?>
                       </td>
             
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> নতুন রেকর্ড ও নির্মাণ </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nrdn_g = $total_it_procar_media['nrdn_g'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nrdn_ovn = $total_it_procar_media['nrdn_ovn'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $nrdn_at = $total_it_procar_media['nrdn_at'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nrdn_ty = $total_it_procar_media['nrdn_ty'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nrdn_shtf = $total_it_procar_media['nrdn_shtf'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $nrdn_news = $total_it_procar_media['nrdn_news'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       উইকিপিডিয়ায় লেখা
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $wikp_s = $total_it_procar_media['wikp_s'] ?>
                       </td>
             
                   
                   </tr>
                 
               
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
