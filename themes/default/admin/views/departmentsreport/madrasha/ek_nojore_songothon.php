<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'একনজরে সংগঠন   ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/ek-nojore-songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ek-nojore-songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                <td class="tg-pwj7" rowspan="">জনশক্তি</td>
                                <td class="tg-pwj7" colspan=""style="">পূর্বের সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" colspan="">টার্গেট  </td>
                                <td class="tg-pwj7" colspan="">ঘাটতি  </td>
                               

                                
                            </tr>
                     
                           




                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_bs_a=$total_ak_nojore_songothon['sodosso_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_bs_k=$total_ak_nojore_songothon['sodosso_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_br_a=$total_ak_nojore_songothon['sodosso_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_br_k=$total_ak_nojore_songothon['sodosso_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_t_a=$total_ak_nojore_songothon['sodosso_t_a'] ?>
                                </td>
                                
                              
                             

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sathi_bs_a=$total_ak_nojore_songothon['sathi_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_bs_k=$total_ak_nojore_songothon['sathi_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_br_a=$total_ak_nojore_songothon['sathi_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sathi_br_k=$total_ak_nojore_songothon['sathi_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sathi_t_a=$total_ak_nojore_songothon['sathi_t_a'] ?>
                                </td>
                               
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kormi_bs_a=$total_ak_nojore_songothon['kormi_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_bs_k=$total_ak_nojore_songothon['kormi_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_br_a=$total_ak_nojore_songothon['kormi_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kormi_br_k=$total_ak_nojore_songothon['kormi_br_k'] ?>
                                </td>
                              
                                <td class="tg-0pky  type_5">
                                <?php echo $kormi_t_a=$total_ak_nojore_songothon['kormi_t_a'] ?>
                                </td>
                                
                                
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $somorthok_bs_a=$total_ak_nojore_songothon['somorthok_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $somorthok_bs_k=$total_ak_nojore_songothon['somorthok_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $somorthok_br_a=$total_ak_nojore_songothon['somorthok_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $somorthok_br_k=$total_ak_nojore_songothon['somorthok_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $somorthok_t_a=$total_ak_nojore_songothon['somorthok_t_a'] ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $somorthok_bs_a=$total_ak_nojore_songothon['somorthok_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $somorthok_bs_k=$total_ak_nojore_songothon['somorthok_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $somorthok_br_a=$total_ak_nojore_songothon['somorthok_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $somorthok_br_k=$total_ak_nojore_songothon['somorthok_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $somorthok_t_a=$total_ak_nojore_songothon['somorthok_t_a'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $somorthok_bs_a=$total_ak_nojore_songothon['somorthok_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $somorthok_bs_k=$total_ak_nojore_songothon['somorthok_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $somorthok_br_a=$total_ak_nojore_songothon['somorthok_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $somorthok_br_k=$total_ak_nojore_songothon['somorthok_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $somorthok_t_a=$total_ak_nojore_songothon['somorthok_t_a'] ?>
                                </td>
                            </tr>
                           
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                            <td class="tg-pwj7" rowspan="">সংগঠন</td>
                            <td class="tg-pwj7" colspan=""style="">পূর্বের সংখ্যা </td>
                            <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                            <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                            <td class="tg-pwj7" colspan="">টার্গেট  </td>
                            <td class="tg-pwj7" colspan="">ঘাটতি  </td>



                        </tr>
                        <tr>
                                <td class="tg-y698">থানা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $thana_bs_a=$total_ak_nojore_songothon['thana_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $thana_bs_k=$total_ak_nojore_songothon['thana_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $thana_br_a=$total_ak_nojore_songothon['thana_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $thana_br_k=$total_ak_nojore_songothon['thana_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $thana_t_a=$total_ak_nojore_songothon['thana_t_a'] ?>
                                </td>
                                
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ওয়ার্ড/জোন  </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $wordjon_bs_a=$total_ak_nojore_songothon['wordjon_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $wordjon_bs_k=$total_ak_nojore_songothon['wordjon_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $wordjon_br_a=$total_ak_nojore_songothon['wordjon_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $wordjon_br_k=$total_ak_nojore_songothon['wordjon_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $wordjon_t_a=$total_ak_nojore_songothon['wordjon_t_a'] ?>
                                </td>
                                
                             
                             
                            </tr>

                            <tr>
                                <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $upshakha_bs_a=$total_ak_nojore_songothon['upshakha_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $upshakha_bs_k=$total_ak_nojore_songothon['upshakha_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $upshakha_br_a=$total_ak_nojore_songothon['upshakha_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $upshakha_br_k=$total_ak_nojore_songothon['upshakha_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $upshakha_t_a=$total_ak_nojore_songothon['upshakha_t_a'] ?>
                                </td>
                               
                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> সমর্থক সংগঠন </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $somorthoksongothon_bs_a=$total_ak_nojore_songothon['somorthoksongothon_bs_a'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $somorthoksongothon_bs_k=$total_ak_nojore_songothon['somorthoksongothon_bs_k'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $somorthoksongothon_br_a=$total_ak_nojore_songothon['somorthoksongothon_br_a'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $somorthoksongothon_br_k=$total_ak_nojore_songothon['somorthoksongothon_br_k'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $somorthoksongothon_t_a=$total_ak_nojore_songothon['somorthoksongothon_t_a'] ?>
                                </td>
                               
                            
                                
                            </tr>
                            <tr>
                                <td class="tg-0pky" rowspan="2"> মোট</td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($sodosso_bs_a!=0)?($sodosso_bs_a+$sathi_bs_a+$kormi_bs_a+$somorthok_bs_a+$thana_bs_a+$wordjon_bs_a+$upshakha_bs_a+$somorthoksongothon_bs_a):0?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($sodosso_bs_k!=0)?($sodosso_bs_k+$sathi_bs_k+$kormi_bs_k+$somorthok_bs_k+$thana_bs_k+$wordjon_bs_k+$upshakha_bs_k+$somorthoksongothon_bs_k):0?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($sodosso_br_a!=0)?($sodosso_br_a+$sathi_br_a+$kormi_br_a+$somorthok_br_a+$thana_br_a+$wordjon_br_a+$upshakha_br_a+$somorthoksongothon_br_a):0?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($sodosso_br_k!=0)?($sodosso_br_k+$sathi_br_k+$kormi_br_k+$somorthok_br_k+$thana_br_k+$wordjon_br_k+$upshakha_br_k+$somorthoksongothon_br_k):0?>
                                </td>
                                <td class="tg-0pky" rowspan="2">
                                <?php echo ($sodosso_t_a!=0)?($sodosso_t_a+$sathi_t_a+$kormi_t_a+$somorthok_t_a+$thana_t_a+$wordjon_t_a+$upshakha_t_a+$somorthoksongothon_t_a):0?>
                                </td>
                               
                            </tr>
                              
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
