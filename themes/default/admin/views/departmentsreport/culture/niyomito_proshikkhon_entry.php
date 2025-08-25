<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'নিয়মিত প্রশিক্ষণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/niyomito-proshikkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/niyomito-proshikkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="2">বিবরণ  </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan=""> মোট উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>

                       <td class="tg-pwj7" rowspan="2">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan=""> মোট উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>

                   
                   <?php $pk = (isset($niomito_proshikkhon['id']))?$niomito_proshikkhon['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1">  সঙ্গীত ক্লাস	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gk_s" data-title="Enter"><?php echo $gk_s=  (isset( $niomito_proshikkhon['gk_s']))?$niomito_proshikkhon['gk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gk_mup" data-title="Enter"><?php echo $gk_mup=  (isset( $niomito_proshikkhon['gk_mup']))?$niomito_proshikkhon['gk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($gk_s!=0)?($gk_mup/$gk_s):0?>
                       </td>

                       <td class="tg-y698 type_1">  অগ্রজ কুরআন ক্লাস	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nk_s" data-title="Enter"><?php echo $nk_s=  (isset( $niomito_proshikkhon['nk_s']))?$niomito_proshikkhon['nk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nk_mup" data-title="Enter"><?php echo $nk_mup=  (isset( $niomito_proshikkhon['nk_mup']))?$niomito_proshikkhon['nk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($nk_s!=0)?($nk_mup/$nk_s):0?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">অভিনয় ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupk_s" data-title="Enter"><?php echo $aupk_s=  (isset( $niomito_proshikkhon['aupk_s']))?$niomito_proshikkhon['aupk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupk_mup" data-title="Enter"><?php echo $aupk_mup=  (isset( $niomito_proshikkhon['aupk_mup']))?$niomito_proshikkhon['aupk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($aupk_s!=0)?($aupk_mup/$aupk_s):0?>
                       </td>  

                       
                       <td class="tg-y698">অগ্রজ আলোচনা চক্র </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kak_s" data-title="Enter"><?php echo $kak_s=  (isset( $niomito_proshikkhon['kak_s']))?$niomito_proshikkhon['kak_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kak_mup" data-title="Enter"><?php echo $kak_mup=  (isset( $niomito_proshikkhon['kak_mup']))?$niomito_proshikkhon['kak_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($kak_s!=0)?($kak_mup/$kak_s):0?>
                                
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">আবৃত্তি উপস্থাপনা ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tk_s" data-title="Enter"><?php echo $tk_s=  (isset( $niomito_proshikkhon['tk_s']))?$niomito_proshikkhon['tk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tk_mup" data-title="Enter"><?php echo $tk_mup=  (isset( $niomito_proshikkhon['tk_mup']))?$niomito_proshikkhon['tk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($tk_mup!=0)?($tk_mup/$tk_s):0?>
                       </td>

                       <td class="tg-y698">উন্মেষ আলোচনা চক্র  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupk_s" data-title="Enter"><?php echo $aupk_s=  (isset( $niomito_proshikkhon['aupk_s']))?$niomito_proshikkhon['aupk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupk_mup" data-title="Enter"><?php echo $aupk_mup=  (isset( $niomito_proshikkhon['aupk_mup']))?$niomito_proshikkhon['aupk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($aupk_mup!=0)?($aupk_mup/$aupk_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ক্বিরাআত ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kak_s" data-title="Enter"><?php echo $kak_s=  (isset( $niomito_proshikkhon['kak_s']))?$niomito_proshikkhon['kak_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kak_mup" data-title="Enter"><?php echo $kak_mup=  (isset( $niomito_proshikkhon['kak_mup']))?$niomito_proshikkhon['kak_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($kak_mup!=0)?($kak_mup/$kak_s):0?>
                       </td>

                       <td class="tg-y698">সামষ্টিক পাঠ</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tk_s" data-title="Enter"><?php echo $tk_s=  (isset( $niomito_proshikkhon['tk_s']))?$niomito_proshikkhon['tk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tk_mup" data-title="Enter"><?php echo $tk_mup=  (isset( $niomito_proshikkhon['tk_mup']))?$niomito_proshikkhon['tk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($tk_mup!=0)?($tk_mup/$tk_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">রংতুলি ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ushosh_s" data-title="Enter"><?php echo $ushosh_s=  (isset( $niomito_proshikkhon['ushosh_s']))?$niomito_proshikkhon['ushosh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ushosh_mup" data-title="Enter"><?php echo $ushosh_mup=  (isset( $niomito_proshikkhon['ushosh_mup']))?$niomito_proshikkhon['ushosh_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($ushosh_mup!=0)?($ushosh_mup/$ushosh_s):0?>
                       </td>

                       <td class="tg-y698">অনুষ্ঠান প্রস্তুতি ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_s" data-title="Enter"><?php echo $stp_s=  (isset( $niomito_proshikkhon['stp_s']))?$niomito_proshikkhon['stp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_mup" data-title="Enter"><?php echo $stp_mup=  (isset( $niomito_proshikkhon['stp_mup']))?$niomito_proshikkhon['stp_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($stp_mup!=0)?($stp_mup/$stp_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">হস্তশিল্প(কারু)ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sa_s" data-title="Enter"><?php echo $sa_s=  (isset( $niomito_proshikkhon['sa_s']))?$niomito_proshikkhon['sa_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sa_mup" data-title="Enter"><?php echo $sa_mup=  (isset( $niomito_proshikkhon['sa_mup']))?$niomito_proshikkhon['sa_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($sa_mup!=0)?($sa_mup/$sa_s):0?>
                       </td>

                       <td class="tg-y698">শব্বেদারী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kk_s" data-title="Enter"><?php echo $kk_s=  (isset( $niomito_proshikkhon['kk_s']))?$niomito_proshikkhon['kk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kk_mup" data-title="Enter"><?php echo $kk_mup=  (isset( $niomito_proshikkhon['kk_mup']))?$niomito_proshikkhon['kk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($kk_mup!=0)?($kk_mup/$kk_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ক্যালিওগ্রাফী ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shd_s" data-title="Enter"><?php echo $shd_s=  (isset( $niomito_proshikkhon['shd_s']))?$niomito_proshikkhon['shd_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shd_mup" data-title="Enter"><?php echo $shd_mup=  (isset( $niomito_proshikkhon['shd_mup']))?$niomito_proshikkhon['shd_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($shd_mup!=0)?($shd_mup/$shd_s):0?>
                       </td>

                       <td class="tg-y698">টেকনিক্যাল/আইটি ক্লাস  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_s" data-title="Enter"><?php echo $onnoanno_s=  (isset( $niomito_proshikkhon['onnoanno_s']))?$niomito_proshikkhon['onnoanno_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_mup" data-title="Enter"><?php echo $onnoanno_mup=  (isset( $niomito_proshikkhon['onnoanno_mup']))?$niomito_proshikkhon['onnoanno_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($onnoanno_mup!=0)?($onnoanno_mup/$onnoanno_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">স্থাপত্য শিল্প ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ushoac_s" data-title="Enter"><?php echo $ushoac_s=  (isset( $niomito_proshikkhon['ushoac_s']))?$niomito_proshikkhon['ushoac_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ushoac_mup" data-title="Enter"><?php echo $ushoac_mup=  (isset( $niomito_proshikkhon['ushoac_mup']))?$niomito_proshikkhon['ushoac_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($ushoac_mup!=0)?($ushoac_mup/$ushoac_s):0?>
                       </td>

                       <td class="tg-y698">অন্যান্য</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aac_s" data-title="Enter"><?php echo $aac_s=  (isset( $niomito_proshikkhon['aac_s']))?$niomito_proshikkhon['aac_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aac_mup" data-title="Enter"><?php echo $aac_mup=  (isset( $niomito_proshikkhon['aac_mup']))?$niomito_proshikkhon['aac_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($aac_mup!=0)?($aac_mup/$aac_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ফ্যাশন ডিজাইন ক্লাস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apk_s" data-title="Enter"><?php echo $apk_s=  (isset( $niomito_proshikkhon['apk_s']))?$niomito_proshikkhon['apk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_proshikkhon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apk_mup" data-title="Enter"><?php echo $apk_mup=  (isset( $niomito_proshikkhon['apk_mup']))?$niomito_proshikkhon['apk_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($apk_mup!=0)?($apk_mup/$apk_s):0?>
                       </td>

                       <td class="tg-y698"> </td>
                       <td class="tg-0pky  type_1">
                       </td>
                       <td class="tg-0pky  type_2">
                       </td>
                       <td class="tg-0pky  type_3">
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
