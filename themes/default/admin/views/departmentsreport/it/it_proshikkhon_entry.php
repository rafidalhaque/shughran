<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রশিক্ষণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/it-proshikkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-proshikkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">
                        <tr>
                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>

                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>
  
                       
                   </tr>
                   <tr>
                 
                   </tr>

                            <?php
                            $pk = (isset($proshikkhon['id']))?$proshikkhon['id']:'';
                            ?>


                   <tr>
                       <td class="tg-y698 type_1">বেসিক কম্পিউটার 	</td>
                       <td class="tg-0pky  type_1">
                           <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bscmput_s" data-title="Enter"><?php echo $bscmput_s =  (isset( $proshikkhon['bscmput_s']))? $proshikkhon['bscmput_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bscmput_upthi" data-title="Enter"><?php echo $bscmput_upthi =  (isset( $proshikkhon['bscmput_upthi']))? $proshikkhon['bscmput_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1">ফটোশপ </td>
                       <td class="tg-0pky  type_1">
                           <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ftshp_s" data-title="Enter"><?php echo $ftshp_s =  (isset( $proshikkhon['ftshp_s']))? $proshikkhon['ftshp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ftshp_upthi" data-title="Enter"><?php echo $ftshp_upthi =  (isset( $proshikkhon['ftshp_upthi']))? $proshikkhon['ftshp_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo ($ftshp_s!=0)?($ftshp_upthi/$ftshp_s):0?>
                       </td>
                      
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> মাইক্রোসফট ওয়ার্ড 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="msford_s" data-title="Enter"><?php echo $msford_s =  (isset( $proshikkhon['msford_s']))? $proshikkhon['msford_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="msford_upthi" data-title="Enter"><?php echo $msford_upthi =  (isset( $proshikkhon['msford_upthi']))? $proshikkhon['msford_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msford_s!=0)?($msford_upthi/$msford_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ইলাস্ট্রটের	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="eltt_s" data-title="Enter"><?php echo $eltt_s =  (isset( $proshikkhon['eltt_s']))? $proshikkhon['eltt_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="eltt_upthi" data-title="Enter"><?php echo $eltt_upthi =  (isset( $proshikkhon['eltt_upthi']))? $proshikkhon['eltt_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($eltt_s!=0)?($eltt_upthi/$eltt_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">মাইক্রোসফট এক্সেল	</td>
                       <td class="tg-0pky  type_1">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="msfexl_s" data-title="Enter"><?php echo $msfexl_s =  (isset( $proshikkhon['msfexl_s']))? $proshikkhon['msfexl_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="msfexl_upthi" data-title="Enter"><?php echo $msfexl_upthi =  (isset( $proshikkhon['msfexl_upthi']))? $proshikkhon['msfexl_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo ($msfexl_s!=0)?($msfexl_upthi/$msfexl_s):0?>
                       </td>


                       <td class="tg-y698 type_1">ভিডিও এডিটিং	</td>
                       <td class="tg-0pky  type_1">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="video_s" data-title="Enter"><?php echo $video_s =  (isset( $proshikkhon['video_s']))? $proshikkhon['video_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="video_upthi" data-title="Enter"><?php echo $video_upthi =  (isset( $proshikkhon['video_upthi']))? $proshikkhon['video_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo ($video_s!=0)?($video_upthi/$video_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> মাইক্রোসফট পাওয়ারপয়ন্টে</td>
                       <td class="tg-0pky  type_1">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pwrp_s" data-title="Enter"><?php echo $pwrp_s =  (isset( $proshikkhon['pwrp_s']))? $proshikkhon['pwrp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pwrp_upthi" data-title="Enter"><?php echo $pwrp_upthi =  (isset( $proshikkhon['pwrp_upthi']))? $proshikkhon['pwrp_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($pwrp_s!=0)?($pwrp_upthi/$pwrp_s):0?>
                       </td>

                       <td class="tg-y698 type_1">  ওয়বে ডেভেলপমেন্ট</td>
                       <td class="tg-0pky  type_1">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="web_s" data-title="Enter"><?php echo $web_s =  (isset( $proshikkhon['web_s']))? $proshikkhon['web_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="web_upthi" data-title="Enter"><?php echo $web_upthi =  (isset( $proshikkhon['web_upthi']))? $proshikkhon['web_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($web_s!=0)?($web_upthi/$web_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ফেসবুক	</td>
                       <td class="tg-0pky  type_1">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fb_s" data-title="Enter"><?php echo $fb_s =  (isset( $proshikkhon['fb_s']))? $proshikkhon['fb_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fb_upthi" data-title="Enter"><?php echo $fb_upthi =  (isset( $proshikkhon['fb_upthi']))? $proshikkhon['fb_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($fb_s!=0)?($fb_upthi/$fb_s):0?>
                       </td>

                       <td class="tg-y698 type_1">অ্যাপ ডেভেলপমেন্ট	</td>
                       <td class="tg-0pky  type_1">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apsdpm_s" data-title="Enter"><?php echo $apsdpm_s =  (isset( $proshikkhon['apsdpm_s']))? $proshikkhon['apsdpm_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apsdpm_upthi" data-title="Enter"><?php echo $apsdpm_upthi =  (isset( $proshikkhon['apsdpm_upthi']))? $proshikkhon['apsdpm_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($apsdpm_s!=0)?($apsdpm_upthi/$apsdpm_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">টুইটার					</td>
                       <td class="tg-0pky  type_1">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tutr_s" data-title="Enter"><?php echo $tutr_s =  (isset( $proshikkhon['tutr_s']))? $proshikkhon['tutr_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tutr_upthi" data-title="Enter"><?php echo $tutr_upthi =  (isset( $proshikkhon['tutr_upthi']))? $proshikkhon['tutr_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($tutr_s!=0)?($tutr_upthi/$tutr_s):0?>
                       </td>
                      

                       <td class="tg-y698 type_1"> বেসিক ইন্টারনেট	</td>
                       <td class="tg-0pky  type_1">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bsicint_s" data-title="Enter"><?php echo $bsicint_s =  (isset( $proshikkhon['bsicint_s']))? $proshikkhon['bsicint_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bsicint_upthi" data-title="Enter"><?php echo $bsicint_upthi =  (isset( $proshikkhon['bsicint_upthi']))? $proshikkhon['bsicint_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsicint_s!=0)?($bsicint_upthi/$bsicint_s):0?>
                       </td>
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">ব্লগ(বাংলা /ইংলিশ)	</td>
                       <td class="tg-0pky  type_1">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgbe_s" data-title="Enter"><?php echo $bgbe_s =  (isset( $proshikkhon['bgbe_s']))? $proshikkhon['bgbe_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgbe_upthi" data-title="Enter"><?php echo $bgbe_upthi =  (isset( $proshikkhon['bgbe_upthi']))? $proshikkhon['bgbe_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bgbe_s!=0)?($bgbe_upthi/$bgbe_s):0?>
                       </td>


                       <td class="tg-y698 type_1">অনলাইন নিরাপত্তা	</td>
                       <td class="tg-0pky  type_1">
                         <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onlinept_s" data-title="Enter"><?php echo $onlinept_s =  (isset( $proshikkhon['onlinept_s']))? $proshikkhon['onlinept_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onlinept_upthi" data-title="Enter"><?php echo $onlinept_upthi =  (isset( $proshikkhon['onlinept_upthi']))? $proshikkhon['onlinept_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlinept_s!=0)?($onlinept_upthi/$onlinept_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> উইকপিডিয়িা	</td>
                       <td class="tg-0pky  type_1">
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ukp_s" data-title="Enter"><?php echo $ukp_s =  (isset( $proshikkhon['ukp_s']))? $proshikkhon['ukp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="proshikkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ukp_upthi" data-title="Enter"><?php echo $ukp_upthi =  (isset( $proshikkhon['ukp_upthi']))? $proshikkhon['ukp_upthi']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($ukp_s!=0)?($ukp_upthi/$ukp_s):0?>    
                        </td>
                      

                       <td class="tg-y698 type_1">মোট</td>
                       <td class="tg-0pky  type_1">
                       <?php echo$bscmput_s+$msford_s+$msfexl_s+$pwrp_s+$fb_s+$tutr_s+$bgbe_s+$ukp_s+$ftshp_s+$eltt_s+$video_s+$web_s+$apsdpm_s+$bsicint_s+$onlinept_s ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo$bscmput_upthi+$msford_upthi+$msfexl_upthi+$pwrp_upthi+$fb_upthi+$tutr_upthi+$bgbe_upthi+$ukp_upthi+$ftshp_upthi+$eltt_upthi+$video_upthi+$web_upthi+$apsdpm_upthi+$bsicint_upthi+$onlinept_upthi ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_upthi!=0)?($bscmput_upthi+$msford_upthi+$msfexl_upthi+$pwrp_upthi+$fb_upthi+$tutr_upthi+$bgbe_upthi+$ukp_upthi+$ftshp_upthi+$eltt_upthi+$video_upthi+$web_upthi+$apsdpm_upthi+$bsicint_upthi+$onlinept_upthi/
                       $bscmput_s+$msford_s+$msfexl_s+$pwrp_s+$fb_s+$tutr_s+$bgbe_s+$ukp_s+$ftshp_s+$eltt_s+$video_s+$web_s+$apsdpm_s+$bsicint_s+$onlinept_s):0?>                       
                       </td>
                       
                   </tr>

                            

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
    }

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
