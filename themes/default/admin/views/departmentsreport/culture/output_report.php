<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'আউটপুট রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/output-report') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/output-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" rowspan="3">বিবরণ </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>

                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>

                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>

                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                   
                   

                   </tr>
                   <tr>
                 
                   </tr>




                   <tr>
                       <td class="tg-y698 type_1"> গীতিকার 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $gk_br = $total_output_riport['gk_br'] ?>
                       </td>
                     
                       <td class="tg-y698">উপস্থাপক		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sk_br = $total_output_riport['sk_br'] ?>
                       </td>
                      
                
                       <td class="tg-y698">বক্তা		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nk_br = $total_output_riport['nk_br'] ?>
                       </td>
                 
                   
                       <td class="tg-y698">সেট ডিজাইনার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $dn_br = $total_output_riport['dn_br'] ?>
                       </td>
                  
              
                   </tr>
                   <tr>
                       <td class="tg-y698">সুরকার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shilpi_br = $total_output_riport['shilpi_br'] ?>
                       </td>
                    
                   
                  
                       <td class="tg-y698">ক্বারী		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ovn_br = $total_output_riport['ovn_br'] ?>
                       </td>
                   
                   
                   

                   
                       <td class="tg-y698">বিতার্কিক		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ak_br = $total_output_riport['ak_br'] ?>
                       </td>
                     
              
                   
                  
                       <td class="tg-y698">কার্টুনিস্ট	  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $up_br = $total_output_riport['up_br'] ?>
                       </td>
                     
                    </tr>
                    <tr>
                  
                       <td class="tg-y698">নাট্যকার		 </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kr_br = $total_output_riport['kr_br'] ?>
                       </td>
                      
                

                  
                       <td class="tg-y698">কবি  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kb_br = $total_output_riport['kb_br'] ?>
                       </td>
                      
              
                   
                   
                       <td class="tg-y698">প্রশিক্ষক		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $le_br = $total_output_riport['le_br'] ?>
                       </td>
                      
                   
                       <td class="tg-y698">চারু শিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sbdk_br = $total_output_riport['sbdk_br'] ?>
                       </td>
                     
                       </tr>



                       <tr>                   
                         <td class="tg-y698">নির্দেশক		   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $bt_br = $total_output_riport['bt_br'] ?>
                       </td>
                     
              
                   
                       <td class="tg-y698">লেখক		   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $bk_br = $total_output_riport['bk_br'] ?>
                       </td>
                     
                   
                  
                       <td class="tg-y698">ফটোগ্রাফার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sh_br = $total_output_riport['sh_br'] ?>
                       </td>
                      
                   
                   

                  
                       <td class="tg-y698">ক্যালিওগ্রাফার   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fgf_br = $total_output_riport['fgf_br'] ?>
                       </td>
                    
                      
                   
                       </tr>

                       <td class="tg-y698">সঙ্গীতশিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $mm_br = $total_output_riport['mm_br'] ?>
                       </td>

                       <td class="tg-y698">সাংবাদিক  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sh_br = $total_output_riport['sh_br'] ?>
                       </td>
                      
                   
                   

                  
                       <td class="tg-y698">ক্যামেরাম্যান   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fgf_br = $total_output_riport['fgf_br'] ?>
                       </td>
                      
              
                   
                   
                       <td class="tg-y698">হস্ত(কারু)শিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $km_br = $total_output_riport['km_br'] ?>
                       </td>
                     
                   
                   </tr>

                   </tr>

                       <td class="tg-y698">অভিনেতা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $mm_br = $total_output_riport['mm_br'] ?>
                       </td>

                       <td class="tg-y698">ভিডিও এডিটর  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sh_br = $total_output_riport['sh_br'] ?>
                       </td>
                      
                   
                   

                  
                       <td class="tg-y698">মেকআপম্যান   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fgf_br = $total_output_riport['fgf_br'] ?>
                       </td>
                      
              
                   
                   
                       <td class="tg-y698">ফ্যাশন ডিজাইনার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $km_br = $total_output_riport['km_br'] ?>
                       </td>
                     
                   
                   </tr>

                   </tr>

                       <td class="tg-y698">আবৃত্তিকার		 </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $mm_br = $total_output_riport['mm_br'] ?>
                       </td>

                       <td class="tg-y698">সাউন্ড ইঞ্জিনিয়ার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sh_br = $total_output_riport['sh_br'] ?>
                       </td>
                      
                   
                   

                  
                       <td class="tg-y698">গ্রাফিক্স ডিজাইনার   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fgf_br = $total_output_riport['fgf_br'] ?>
                       </td>
                      
              
                   
                   
                       <td class="tg-y698">স্থাপত্য শিল্পী</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $km_br = $total_output_riport['km_br'] ?>
                       </td>
                     
                   
                   </tr>
                  
                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
