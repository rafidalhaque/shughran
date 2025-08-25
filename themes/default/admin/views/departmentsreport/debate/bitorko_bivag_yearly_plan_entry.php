<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিতর্ক বিভাগের বার্ষিক পরিকল্পনা-২০২১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bitorko-bivag-yearly-plan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bitorko-bivag-yearly-plan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span>বিবরণ     </span></div></td>
                                <td class="tg-pwj7 "><div><span>ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>তারিখ  </span></div></td>
                                <td class="tg-pwj7 "><div><span>স্থান </span></div></td>
                                <td class="tg-pwj7 "><div><span>অংশগ্রহণকারী </span></div></td>
                              
                             
                               
                            </tr>

                         
                            <?php
                            $pk = (isset($bitorko_bivager_barshik_porikolpona['id']))?$bitorko_bivager_barshik_porikolpona['id']:'';
                            ?>
                          
                          

                            <tr>
                                <td class="tg-y698 type_1"> সাপ্তাহিক সেশন 	</td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shks_so" data-title="Enter"><?php echo $shks_so=  (isset( $bitorko_bivager_barshik_porikolpona['shks_so']))? $bitorko_bivager_barshik_porikolpona['shks_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shks_t" data-title="Enter"><?php echo $shks_t=  (isset( $bitorko_bivager_barshik_porikolpona['shks_t']))? $bitorko_bivager_barshik_porikolpona['shks_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shks_sth" data-title="Enter"><?php echo $shks_sth=  (isset( $bitorko_bivager_barshik_porikolpona['shks_sth']))? $bitorko_bivager_barshik_porikolpona['shks_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shks_ogk" data-title="Enter"><?php echo $shks_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['shks_ogk']))? $bitorko_bivager_barshik_porikolpona['shks_ogk']:'' ?></a>
                                </td>
                            
                              

                            </tr>
                      

                            <tr>
                                <td class="tg-y698 type_1"> কর্মশালা 	</td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kshl_so" data-title="Enter"><?php echo $kshl_so=  (isset( $bitorko_bivager_barshik_porikolpona['kshl_so']))? $bitorko_bivager_barshik_porikolpona['kshl_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kshl_t" data-title="Enter"><?php echo $kshl_t=  (isset( $bitorko_bivager_barshik_porikolpona['kshl_t']))? $bitorko_bivager_barshik_porikolpona['kshl_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kshl_sth" data-title="Enter"><?php echo $kshl_sth=  (isset( $bitorko_bivager_barshik_porikolpona['kshl_sth']))? $bitorko_bivager_barshik_porikolpona['kshl_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kshl_ogk" data-title="Enter"><?php echo $kshl_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['kshl_ogk']))? $bitorko_bivager_barshik_porikolpona['kshl_ogk']:'' ?></a>
                                </td>                              

                            </tr>





                            <tr>
                                <td class="tg-y698 type_1"> প্রতিযোগিতা 	</td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pjgt_so" data-title="Enter"><?php echo $pjgt_so=  (isset( $bitorko_bivager_barshik_porikolpona['pjgt_so']))? $bitorko_bivager_barshik_porikolpona['pjgt_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pjgt_t" data-title="Enter"><?php echo $pjgt_t=  (isset( $bitorko_bivager_barshik_porikolpona['pjgt_t']))? $bitorko_bivager_barshik_porikolpona['pjgt_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pjgt_sth" data-title="Enter"><?php echo $pjgt_sth=  (isset( $bitorko_bivager_barshik_porikolpona['pjgt_sth']))? $bitorko_bivager_barshik_porikolpona['pjgt_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pjgt_ogk" data-title="Enter"><?php echo $pjgt_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['pjgt_ogk']))? $bitorko_bivager_barshik_porikolpona['pjgt_ogk']:'' ?></a>
                                </td>                            
                              

                            </tr>
                            

                            <tr>
                                <td class="tg-y698 type_1"> মাসিক মিটিং 	</td>
                                <td class="tg-0pky  type_1">
                                এক্সিকিউটিভ মিটিং 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mmt_aktm_so" data-title="Enter"><?php echo $mmt_aktm_so=  (isset( $bitorko_bivager_barshik_porikolpona['mmt_aktm_so']))? $bitorko_bivager_barshik_porikolpona['mmt_aktm_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mmt_aktm_t" data-title="Enter"><?php echo $mmt_aktm_t=  (isset( $bitorko_bivager_barshik_porikolpona['mmt_aktm_t']))? $bitorko_bivager_barshik_porikolpona['mmt_aktm_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mmt_aktm_sth" data-title="Enter"><?php echo $mmt_aktm_sth=  (isset( $bitorko_bivager_barshik_porikolpona['mmt_aktm_sth']))? $bitorko_bivager_barshik_porikolpona['mmt_aktm_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mmt_aktm_ogk" data-title="Enter"><?php echo $mmt_aktm_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['mmt_aktm_ogk']))? $bitorko_bivager_barshik_porikolpona['mmt_aktm_ogk']:'' ?></a>
                                </td>
                            
                              

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> নতুন ক্লাব প্রতিষ্ঠা 	</td>
                                <td class="tg-0pky  type_1">
                                সাংগঠনিক থানা ক্লাব 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nkp_sgnthk_so" data-title="Enter"><?php echo $nkp_sgnthk_so=  (isset( $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_so']))? $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nkp_sgnthk_t" data-title="Enter"><?php echo $nkp_sgnthk_t=  (isset( $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_t']))? $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nkp_sgnthk_sth" data-title="Enter"><?php echo $nkp_sgnthk_sth=  (isset( $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_sth']))? $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nkp_sgnthk_ogk" data-title="Enter"><?php echo $nkp_sgnthk_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_ogk']))? $bitorko_bivager_barshik_porikolpona['nkp_sgnthk_ogk']:'' ?></a>
                                </td>
                            
                              

                            </tr>
                            

                      


                            <tr>
                            
                            <tr>
                                <td class="tg-pwj7" rowspan="4">বিতর্কিত বৃদ্ধি </td>
                                <td class="tg-pwj7" colspan="">এক্সিকিউটিভ মিটিং </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_pbk_so" data-title="Enter"><?php echo $bkbr_pbk_so=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_pbk_so']))? $bitorko_bivager_barshik_porikolpona['bkbr_pbk_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_pbk_t" data-title="Enter"><?php echo $bkbr_pbk_t=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_pbk_t']))? $bitorko_bivager_barshik_porikolpona['bkbr_pbk_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_pbk_sth" data-title="Enter"><?php echo $bkbr_pbk_sth=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_pbk_sth']))? $bitorko_bivager_barshik_porikolpona['bkbr_pbk_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_pbk_ogk" data-title="Enter"><?php echo $bkbr_pbk_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_pbk_ogk']))? $bitorko_bivager_barshik_porikolpona['bkbr_pbk_ogk']:'' ?></a>
                                </td>
                                
                                
                            </tr>
                                <td class="tg-y698">সাংগঠনিক থানা ক্লাব </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_tlvbk_so" data-title="Enter"><?php echo $bkbr_tlvbk_so=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_so']))? $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_tlvbk_t" data-title="Enter"><?php echo $bkbr_tlvbk_t=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_t']))? $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_tlvbk_sth" data-title="Enter"><?php echo $bkbr_tlvbk_sth=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_sth']))? $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_tlvbk_ogk" data-title="Enter"><?php echo $bkbr_tlvbk_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_ogk']))? $bitorko_bivager_barshik_porikolpona['bkbr_tlvbk_ogk']:'' ?></a>
                                </td>
                           
                           
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> প্রশিক্ষক বির্তকিত  </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_jbk_so" data-title="Enter"><?php echo $bkbr_jbk_so=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_jbk_so']))? $bitorko_bivager_barshik_porikolpona['bkbr_jbk_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_jbk_t" data-title="Enter"><?php echo $bkbr_jbk_t=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_jbk_t']))? $bitorko_bivager_barshik_porikolpona['bkbr_jbk_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_jbk_sth" data-title="Enter"><?php echo $bkbr_jbk_sth=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_jbk_sth']))? $bitorko_bivager_barshik_porikolpona['bkbr_jbk_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_jbk_ogk" data-title="Enter"><?php echo $bkbr_jbk_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_jbk_ogk']))? $bitorko_bivager_barshik_porikolpona['bkbr_jbk_ogk']:'' ?></a>
                                </td>
                                
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">টেলিভিশন বির্তকিত </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_bk_so" data-title="Enter"><?php echo $bkbr_bk_so=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_bk_so']))? $bitorko_bivager_barshik_porikolpona['bkbr_bk_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_bk_t" data-title="Enter"><?php echo $bkbr_bk_t=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_bk_t']))? $bitorko_bivager_barshik_porikolpona['bkbr_bk_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_bk_sth" data-title="Enter"><?php echo $bkbr_bk_sth=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_bk_sth']))? $bitorko_bivager_barshik_porikolpona['bkbr_bk_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkbr_bk_ogk" data-title="Enter"><?php echo $bkbr_bk_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['bkbr_bk_ogk']))? $bitorko_bivager_barshik_porikolpona['bkbr_bk_ogk']:'' ?></a>
                                </td>
                               
                          
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_so" data-title="Enter"><?php echo $onnoanno_so=  (isset( $bitorko_bivager_barshik_porikolpona['onnoanno_so']))? $bitorko_bivager_barshik_porikolpona['onnoanno_so']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_t" data-title="Enter"><?php echo $onnoanno_t=  (isset( $bitorko_bivager_barshik_porikolpona['onnoanno_t']))? $bitorko_bivager_barshik_porikolpona['onnoanno_t']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_sth" data-title="Enter"><?php echo $onnoanno_sth=  (isset( $bitorko_bivager_barshik_porikolpona['onnoanno_sth']))? $bitorko_bivager_barshik_porikolpona['onnoanno_sth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_bivager_barshik_porikolpona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_ogk" data-title="Enter"><?php echo $onnoanno_ogk=  (isset( $bitorko_bivager_barshik_porikolpona['onnoanno_ogk']))? $bitorko_bivager_barshik_porikolpona['onnoanno_ogk']:'' ?></a>
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
