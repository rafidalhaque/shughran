<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'যোগাযোগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/culture-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
        
                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-0pky  type_1">
                       গীতিকার
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $gk_kj = $total_saneskritik_bivag_jogajog['gk_kj'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $gk_kb = $total_saneskritik_bivag_jogajog['gk_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ক্বারী
                       </td>
                       
                       <td class="tg-0pky  type_1">
                       <?php echo $sk_kj = $total_saneskritik_bivag_jogajog['sk_kj'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sk_kb = $total_saneskritik_bivag_jogajog['sk_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাংস্কৃতিক প্রতিষ্ঠান
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nk_kj = $total_saneskritik_bivag_jogajog['nk_kj'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $nk_kb = $total_saneskritik_bivag_jogajog['nk_kb'] ?>
                        </td>
                      
                   </tr>


                   <tr>
                       <td class="tg-0pky  type_1">
                       সুরকার
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nshk_kj = $total_saneskritik_bivag_jogajog['nshk_kj'] ?>
                       </td>
                       
                       <td class="tg-0pky  type_1">
                       <?php echo $nshk_kb = $total_saneskritik_bivag_jogajog['nshk_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       আবৃত্তিকার			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $shilpi_kj = $total_saneskritik_bivag_jogajog['shilpi_kj'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shilpi_kb = $total_saneskritik_bivag_jogajog['shilpi_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাংবাদিক		
                       </td>


                       <td class="tg-0pky  type_1">
                       <?php echo $ont_kj = $total_saneskritik_bivag_jogajog['ont_kj'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $ont_kb = $total_saneskritik_bivag_jogajog['ont_kb'] ?>
                        </td>
                      
                   </tr>
              
                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাট্যকার			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $akup_kj = $total_saneskritik_bivag_jogajog['akup_kj'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $akup_kb = $total_saneskritik_bivag_jogajog['akup_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       উপস্থাপক			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $kr_kj = $total_saneskritik_bivag_jogajog['kr_kj'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kr_kb = $total_saneskritik_bivag_jogajog['kr_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       ইলেকট্রনিক মিডিয়া
                       </td>


                       <td class="tg-0pky  type_1">
                       <?php echo $kb_kj = $total_saneskritik_bivag_jogajog['kb_kj'] ?>
                        </td>
                            <td class="tg-0pky  type_1">
                            <?php echo $kb_kb = $total_saneskritik_bivag_jogajog['kb_kb'] ?>
                            </td>
             
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       নির্দেশক
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $lekh_kj = $total_saneskritik_bivag_jogajog['lekh_kj'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $lekh_kb = $total_saneskritik_bivag_jogajog['lekh_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       কবি			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $stpp_kj = $total_saneskritik_bivag_jogajog['stpp_kj'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $stpp_kb = $total_saneskritik_bivag_jogajog['stpp_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       অভিভাবক		
                       </td>


                       <td class="tg-0pky  type_1">
                       <?php echo $stpth_kj = $total_saneskritik_bivag_jogajog['stpth_kj'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $stpth_kb = $total_saneskritik_bivag_jogajog['stpth_kb'] ?>
                        </td>
             
                      
                   </tr>
                   </tr>
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       শিল্পী			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sbdk_kj = $total_saneskritik_bivag_jogajog['sbdk_kj'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $sbdk_kb = $total_saneskritik_bivag_jogajog['sbdk_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       লেখক			
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $enm_kj = $total_saneskritik_bivag_jogajog['enm_kj'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $enm_kb = $total_saneskritik_bivag_jogajog['enm_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       উপদেষ্টা		
                       </td>


                       <td class="tg-0pky  type_1">
                       <?php echo $ovb_kj = $total_saneskritik_bivag_jogajog['ovb_kj'] ?>
                        </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $ovb_kb = $total_saneskritik_bivag_jogajog['ovb_kb'] ?>
                        </td>
             
                      
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       অভিনেতা			
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $onnoanno_kj = $total_saneskritik_bivag_jogajog['onnoanno_kj'] ?>
                       </td>

                       <td class="tg-0pky  type_1">
                       <?php echo $onnoanno_kb = $total_saneskritik_bivag_jogajog['onnoanno_kb'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       সাংস্কৃতিক পৃষ্ঠপোষক
                       </td>

                       <td class="tg-0pky  type_1">
                       
                       </td>
                       <td class="tg-0pky  type_1">
                       
                       </td>
                       <td class="tg-0pky  type_1">
                       অন্যান্য		
                       </td>


                       <td class="tg-0pky  type_1">

                        </td>
                        <td class="tg-0pky  type_1">

                        </td>
             
                      
                   </tr>
                   
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
