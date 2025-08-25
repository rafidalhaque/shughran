<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/media-jonosokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-jonosokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7"  >জনশক্তি</td>
                                <td class="tg-pwj7" > পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" >  বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" > মোট বৃদ্ধি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >আগমন </td>
                                <td class="tg-pwj7" >্মোট ঘাটতি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >স্থানান্তর</td>
                                <td class="tg-pwj7" >ছাত্রত্ব শেষ</td>
                                <td class="tg-pwj7" >সাংবাদিক</td>
                            </tr>

                            <?php
                            $pk = (isset($media_bivag1['id']))?$media_bivag1['id']:'';
                            ?>

                            <tr>                  
                                
                                <td class="tg-y698 type_1"> এডমিন	</td>
                                <td class="tg-0pky type_1" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_pbrs" data-title="Enter"><?php echo $adm_pbrs=  (isset( $media_bivag1['adm_pbrs']))? $media_bivag1['adm_pbrs']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_bmns" data-title="Enter"><?php echo $adm_bmns=  (isset( $media_bivag1['adm_bmns']))? $media_bivag1['adm_bmns']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_mbr" data-title="Enter"><?php echo $adm_mbr=  (isset( $media_bivag1['adm_mbr']))? $media_bivag1['adm_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_monnon1" data-title="Enter"><?php echo $adm_monnon1=  (isset( $media_bivag1['adm_monnon1']))? $media_bivag1['adm_monnon1']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_agm" data-title="Enter"><?php echo $adm_agm=  (isset( $media_bivag1['adm_agm']))? $media_bivag1['adm_agm']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_mght" data-title="Enter"><?php echo $adm_mght=  (isset( $media_bivag1['adm_mght']))? $media_bivag1['adm_mght']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_monnon2" data-title="Enter"><?php echo $adm_monnon2=  (isset( $media_bivag1['adm_monnon2']))? $media_bivag1['adm_monnon2']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_sthnt" data-title="Enter"><?php echo $adm_sthnt=  (isset( $media_bivag1['adm_sthnt']))? $media_bivag1['adm_sthnt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_chtsh" data-title="Enter"><?php echo $adm_chtsh=  (isset( $media_bivag1['adm_chtsh']))? $media_bivag1['adm_chtsh']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adm_sbdk" data-title="Enter"><?php echo $adm_sbdk=  (isset( $media_bivag1['adm_sbdk']))? $media_bivag1['adm_sbdk']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাব-এডমিন</td>
                                <td class="tg-0pky type_1" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_pbrs" data-title="Enter"><?php echo $sabadm_pbrs=  (isset( $media_bivag1['sabadm_pbrs']))? $media_bivag1['sabadm_pbrs']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_bmns" data-title="Enter"><?php echo $sabadm_bmns=  (isset( $media_bivag1['sabadm_bmns']))? $media_bivag1['sabadm_bmns']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_mbr" data-title="Enter"><?php echo $sabadm_mbr=  (isset( $media_bivag1['sabadm_mbr']))? $media_bivag1['sabadm_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_monnon1" data-title="Enter"><?php echo $sabadm_monnon1=  (isset( $media_bivag1['sabadm_monnon1']))? $media_bivag1['sabadm_monnon1']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_agm" data-title="Enter"><?php echo $sabadm_agm=  (isset( $media_bivag1['sabadm_agm']))? $media_bivag1['sabadm_agm']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_mght" data-title="Enter"><?php echo $sabadm_mght=  (isset( $media_bivag1['sabadm_mght']))? $media_bivag1['sabadm_mght']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_monnon2" data-title="Enter"><?php echo $sabadm_monnon2=  (isset( $media_bivag1['sabadm_monnon2']))? $media_bivag1['sabadm_monnon2']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_sthnt" data-title="Enter"><?php echo $sabadm_sthnt=  (isset( $media_bivag1['sabadm_sthnt']))? $media_bivag1['sabadm_sthnt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_chtsh" data-title="Enter"><?php echo $sabadm_chtsh=  (isset( $media_bivag1['sabadm_chtsh']))? $media_bivag1['sabadm_chtsh']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sabadm_sbdk" data-title="Enter"><?php echo $sabadm_sbdk=  (isset( $media_bivag1['sabadm_sbdk']))? $media_bivag1['sabadm_sbdk']:'' ?></a>
                                </td>

                            </tr>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> প্রোগ্রামার	</td>
                                <td class="tg-0pky type_1" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_pbrs" data-title="Enter"><?php echo $prgmr_pbrs=  (isset( $media_bivag1['prgmr_pbrs']))? $media_bivag1['prgmr_pbrs']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_bmns" data-title="Enter"><?php echo $prgmr_bmns=  (isset( $media_bivag1['prgmr_bmns']))? $media_bivag1['prgmr_bmns']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_mbr" data-title="Enter"><?php echo $prgmr_mbr=  (isset( $media_bivag1['prgmr_mbr']))? $media_bivag1['prgmr_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_monnon1" data-title="Enter"><?php echo $prgmr_monnon1=  (isset( $media_bivag1['prgmr_monnon1']))? $media_bivag1['prgmr_monnon1']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_agm" data-title="Enter"><?php echo $prgmr_agm=  (isset( $media_bivag1['prgmr_agm']))? $media_bivag1['prgmr_agm']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_mght" data-title="Enter"><?php echo $prgmr_mght=  (isset( $media_bivag1['prgmr_mght']))? $media_bivag1['prgmr_mght']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_monnon2" data-title="Enter"><?php echo $prgmr_monnon2=  (isset( $media_bivag1['prgmr_monnon2']))? $media_bivag1['prgmr_monnon2']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_sthnt" data-title="Enter"><?php echo $prgmr_sthnt=  (isset( $media_bivag1['prgmr_sthnt']))? $media_bivag1['prgmr_sthnt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_chtsh" data-title="Enter"><?php echo $prgmr_chtsh=  (isset( $media_bivag1['prgmr_chtsh']))? $media_bivag1['prgmr_chtsh']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prgmr_sbdk" data-title="Enter"><?php echo $prgmr_sbdk=  (isset( $media_bivag1['prgmr_sbdk']))? $media_bivag1['prgmr_sbdk']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শীক্ষানবিশ</td>
                                <td class="tg-0pky type_1" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_pbrs" data-title="Enter"><?php echo $shnbsh_pbrs=  (isset( $media_bivag1['shnbsh_pbrs']))? $media_bivag1['shnbsh_pbrs']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_bmns" data-title="Enter"><?php echo $shnbsh_bmns=  (isset( $media_bivag1['shnbsh_bmns']))? $media_bivag1['shnbsh_bmns']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_mbr" data-title="Enter"><?php echo $shnbsh_mbr=  (isset( $media_bivag1['shnbsh_mbr']))? $media_bivag1['shnbsh_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_monnon1" data-title="Enter"><?php echo $shnbsh_monnon1=  (isset( $media_bivag1['shnbsh_monnon1']))? $media_bivag1['shnbsh_monnon1']:'' ?></a>
                              
 +
  /td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_agm" data-title="Enter"><?php echo $shnbsh_agm=  (isset( $media_bivag1['shnbsh_agm']))? $media_bivag1['shnbsh_agm']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_mght" data-title="Enter"><?php echo $shnbsh_mght=  (isset( $media_bivag1['shnbsh_mght']))? $media_bivag1['shnbsh_mght']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_monnon2" data-title="Enter"><?php echo $shnbsh_monnon2=  (isset( $media_bivag1['shnbsh_monnon2']))? $media_bivag1['shnbsh_monnon2']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnbsh_sthnt" data-title="Enter"><?php echo $shnbsh_sthnt=  (isset( $media_bivag1['shnbsh_sthnt']))? $media_bivag1['shnbsh_sthnt']:'' ?></a>
                                </td>
                                <td class="t/*   /
                            
                              
                                <td class="tg-y698" >মোট</td>    
                                <td class="tg-0pky" ><?php echo ($adm_pbrs+$sabadm_pbrs+$prgmr_pbrs+$shnbsh_pbrs) ?></td>
                                <td class="tg-0pky" ><?php echo ($adm_bmns+$sabadm_bmns+$prgmr_bmns+$
							 *-)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_mbr+$sabadm_mbr+$prgmr_mbr+$shnbsh_mbr)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_monnon1+$sabadm_monnon1+$prgmr_monnon1+$shnbsh_monnon1)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_agm+$sabadm_agm+$prgmr_agm+$shnbsh_agm)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_mght+$sabadm_mght+$prgmr_mght+$shnbsh_mght)?></td>
                                <td class="tg-0pky" ><?php echo ?($adm_monnon2+$sabadm_monnon2+$prgmr_monnon2+$shnbsh_monnon2)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_sthnt+$sabadm_sthnt+$prgmr_sthnt+$shnbsh_sthnt)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_chtsh+$sabadm_chtsh+$prgmr_chtsh+$shnbsh_chtsh)?></td>
                                <td class="tg-0pky" ><?php echo ($adm_sbdk+$sabadm_sbdk+$prgmr_sbdk+$shnbsh_sbdk)?></td>
                            </tr>


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
