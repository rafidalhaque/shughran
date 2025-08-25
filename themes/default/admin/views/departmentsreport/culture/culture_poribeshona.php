<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'পরিবেশনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-poribeshona') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-poribeshona/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" rowspan="2"> বিবরণ  </td>
                   
                                
                                
                   </tr>
                   <tr>
                        <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>

                        <td class="tg-pwj7" rowspan="2"> বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>

                       <td class="tg-pwj7" rowspan="2"> বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
            
                 

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-y698 type_1"> সাংস্কৃতিক অনুষ্ঠান 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sta_s = $total_poribeshona['sta_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sta_up = $total_poribeshona['sta_up'] ?>
                       </td>

                       <td class="tg-y698"> ভ্রাম্যমাণ পরিবেশনা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pupa_s = $total_poribeshona['pupa_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $pupa_up = $total_poribeshona['pupa_up'] ?>
                       </td>

                       <td class="tg-y698">সাংস্কৃতিক উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ak_s = $total_poribeshona['ak_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ak_up = $total_poribeshona['ak_up'] ?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">সঙ্গীতানুষ্ঠান  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sota_s = $total_poribeshona['sota_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sota_up = $total_poribeshona['sota_up'] ?>
                       </td>

                       <td class="tg-y698"> সাংস্কৃতিক আড্ডা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $vmp_s = $total_poribeshona['vmp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $vmp_up = $total_poribeshona['vmp_up'] ?>
                       </td>
                     
                   
                  
                       <td class="tg-y698">নাট্যমঞ্চ </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ata_s = $total_poribeshona['ata_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ata_up = $total_poribeshona['ata_up'] ?>
                       </td>
                     
                   
                   </tr>

                   <td class="tg-y698">আবৃত্তি অনুষ্ঠান  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sota_s = $total_poribeshona['sota_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sota_up = $total_poribeshona['sota_up'] ?>
                       </td>

                       <td class="tg-y698"> পথনাট্য </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $vmp_s = $total_poribeshona['vmp_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $vmp_up = $total_poribeshona['vmp_up'] ?>
                       </td>
                     
                   
                  
                       <td class="tg-y698">প্রকাশনা উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ata_s = $total_poribeshona['ata_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ata_up = $total_poribeshona['ata_up'] ?>
                    </td>

                   <tr>
                       <td class="tg-y698">নাটক মঞ্চায়ন  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nm_s = $total_poribeshona['nm_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nm_up = $total_poribeshona['nm_up'] ?>
                       </td>
                     
              
                   
                   
                       
                       <td class="tg-y698">মুকাভিনয় </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tva_s = $total_poribeshona['tva_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tva_up = $total_poribeshona['tva_up'] ?>
                       </td>
                     
              
                   
                  
                       <td class="tg-y698">সাংস্কৃতিক প্রতিযোগিতা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kpa_s = $total_poribeshona['kpa_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kpa_up = $total_poribeshona['kpa_up'] ?>
                       </td>
                     
              
                   
                   </tr>
                  
                   
                   <tr>
                       <td class="tg-y698">টিভি অনুষ্ঠান</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sta1_s = $total_poribeshona['sta1_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sta1_up = $total_poribeshona['sta1_up'] ?>
                       </td>
                      
                   
                  
                       <td class="tg-y698"> একাঙ্কিকা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pn_s = $total_poribeshona['pn_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $pn_up = $total_poribeshona['pn_up'] ?>
                       </td>
                   
                   
                  
                       <td class="tg-y698">চিত্রাঙ্কন প্রতিযোগিতা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $mv_s = $total_poribeshona['mv_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $mv_up = $total_poribeshona['mv_up'] ?>
                       </td>
                
                   
                   </tr>
                   <tr>
                       
                    
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> কবিতা পাঠের আসর  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $psh_s = $total_poribeshona['psh_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $psh_up = $total_poribeshona['psh_up'] ?>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698">প্রদর্শনী </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ga_s = $total_poribeshona['ga_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ga_up = $total_poribeshona['ga_up'] ?>
                       </td>
                
                   
                  
                       <td class="tg-y698">উন্মুক্ত সাংস্কৃতিক অনুুষ্ঠান </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $stu_s = $total_poribeshona['stu_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $stu_up = $total_poribeshona['stu_up'] ?>
                       </td>
                    
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> পুঁথি পাঠের আসর  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $umsta_s = $total_poribeshona['umsta_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $nu_up = $total_poribeshona['umsta_up'] ?>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698">গীতি আলেখ্য	 </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pshu_s = $total_poribeshona['pshu_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $pshu_up = $total_poribeshona['pshu_up'] ?>
                       </td>

                       <td class="tg-y698">অন্যান্য  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pshu_s = $total_poribeshona['pshu_s'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $pshu_up = $total_poribeshona['pshu_up'] ?>
                       </td>
                
                   
                   </tr>
               
               

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
