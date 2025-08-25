<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'ইসলামী স্কলারস পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/islami-scholars-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/islami-scholars-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                
                                <td class="tg-pwj7" rowspan="3"> ধরন</td>
                                
                            </tr>
                            <tr>
                             
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>রুকন </span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>সাংগঠনিক </span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>বিরোধী </span></div></td>
                                
                               
                            </tr>

                            <?php
                            $pk = (isset($islamik_skolars_porisonkhan['id']))?$islamik_skolars_porisonkhan['id']:'';
                            ?>


                            <tr>
                            <?php 
                              $akh_r=  (isset( $islamik_skolars_porisonkhan['akh_r']))? $islamik_skolars_porisonkhan['akh_r']:'';
                              $akh_sg=  (isset( $islamik_skolars_porisonkhan['akh_sg']))? $islamik_skolars_porisonkhan['akh_sg']:'';
                              $akh_b=  (isset( $islamik_skolars_porisonkhan['akh_b']))? $islamik_skolars_porisonkhan['akh_b']:''
                            ?>
                                
                                <td class="tg-y698  type_1">অধ্যক্ষ</td>
                                <td class="tg-0pky  type_2">
                                <?php echo ($akh_r!=0)? $akh=($akh_r+$akh_sg+$akh_b):0?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akh_r" data-title="Enter"><?php echo $akh_r ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akh_sg" data-title="Enter"><?php echo $akh_sg ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akh_b" data-title="Enter"><?php echo $akh_b ?></a>
                                </td>
                               
                                

                            </tr>

                            <?php 
                              $updhkh_r=  (isset( $islamik_skolars_porisonkhan['updhkh_r']))? $islamik_skolars_porisonkhan['updhkh_r']:'';
                              $updhkh_sg=  (isset( $islamik_skolars_porisonkhan['updhkh_sg']))? $islamik_skolars_porisonkhan['updhkh_sg']:'';
                              $updhkh_b=  (isset( $islamik_skolars_porisonkhan['updhkh_b']))? $islamik_skolars_porisonkhan['updhkh_b']:''
                            ?>
                            <tr>
                               
                                <td class="tg-y698">উপাধ্যক্ষ</td>
                                <td class="tg-0pky">
                                <?php echo ($updhkh_r!=0)? $updhkh=($updhkh_r+$updhkh_sg+$updhkh_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updhkh_r" data-title="Enter"><?php echo $updhkh_r=  (isset( $islamik_skolars_porisonkhan['updhkh_r']))? $islamik_skolars_porisonkhan['updhkh_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updhkh_sg" data-title="Enter"><?php echo $updhkh_sg=  (isset( $islamik_skolars_porisonkhan['updhkh_sg']))? $islamik_skolars_porisonkhan['updhkh_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updhkh_b" data-title="Enter"><?php echo $updhkh_b=  (isset( $islamik_skolars_porisonkhan['updhkh_b']))? $islamik_skolars_porisonkhan['updhkh_b']:'' ?></a>
                                </td>
                                

                            </tr>
                            <?php 
                              $mha_r=  (isset( $islamik_skolars_porisonkhan['mha_r']))? $islamik_skolars_porisonkhan['mha_r']:'';
                              $mha_sg=  (isset( $islamik_skolars_porisonkhan['mha_sg']))? $islamik_skolars_porisonkhan['mha_sg']:'';
                              $mha_b=  (isset( $islamik_skolars_porisonkhan['mha_b']))? $islamik_skolars_porisonkhan['mha_b']:''
                            ?>
                            <tr>
                              
                                <td class="tg-y698">মুহাদ্দিস/মুফাসসির</td>
                                <td class="tg-0pky">
                                <?php echo ($mha_r!=0)?$mha=($mha_r+$mha_sg+$mha_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mha_r" data-title="Enter"><?php echo $mha_r=  (isset( $islamik_skolars_porisonkhan['mha_r']))? $islamik_skolars_porisonkhan['mha_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mha_sg" data-title="Enter"><?php echo $mha_sg=  (isset( $islamik_skolars_porisonkhan['mha_sg']))? $islamik_skolars_porisonkhan['mha_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mha_b" data-title="Enter"><?php echo $mha_b=  (isset( $islamik_skolars_porisonkhan['mha_b']))? $islamik_skolars_porisonkhan['mha_b']:'' ?></a>
                                </td>
                                
                            </tr>
                            <?php 
                              $apr_r=  (isset( $islamik_skolars_porisonkhan['apr_r']))? $islamik_skolars_porisonkhan['apr_r']:'';
                              $apr_sg=  (isset( $islamik_skolars_porisonkhan['apr_sg']))? $islamik_skolars_porisonkhan['apr_sg']:'';
                              $apr_b=  (isset( $islamik_skolars_porisonkhan['apr_b']))? $islamik_skolars_porisonkhan['apr_b']:''
                            ?>
                            <tr>
                                
                                <td class="tg-y698">আরবি প্রভাষক</td>
                                <td class="tg-0pky">
                                <?php echo ($apr_r!=0)?$apr=($apr_r+$apr_sg+$apr_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apr_r" data-title="Enter"><?php echo $apr_r=  (isset( $islamik_skolars_porisonkhan['apr_r']))? $islamik_skolars_porisonkhan['apr_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apr_sg" data-title="Enter"><?php echo $apr_sg=  (isset( $islamik_skolars_porisonkhan['apr_sg']))? $islamik_skolars_porisonkhan['apr_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apr_b" data-title="Enter"><?php echo $apr_b=  (isset( $islamik_skolars_porisonkhan['apr_b']))? $islamik_skolars_porisonkhan['apr_b']:'' ?></a>
                                </td>
                                
                            </tr>
                            <?php 
                              $sp_r=  (isset( $islamik_skolars_porisonkhan['sp_r']))? $islamik_skolars_porisonkhan['sp_r']:'';
                              $sp_sg=  (isset( $islamik_skolars_porisonkhan['sp_sg']))? $islamik_skolars_porisonkhan['sp_sg']:'';
                              $sp_b=  (isset( $islamik_skolars_porisonkhan['sp_b']))? $islamik_skolars_porisonkhan['sp_b']:''
                            ?>
                            <tr>
                             
                                <td class="tg-y698"> সুপার</td>
                                <td class="tg-0pky">
                                <?php echo($sp_r!=0)? $sp=($sp_r+$sp_sg+$sp_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_r" data-title="Enter"><?php echo $sp_r=  (isset( $islamik_skolars_porisonkhan['sp_r']))? $islamik_skolars_porisonkhan['sp_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_sg" data-title="Enter"><?php echo $sp_sg=  (isset( $islamik_skolars_porisonkhan['sp_sg']))? $islamik_skolars_porisonkhan['sp_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_b" data-title="Enter"><?php echo $sp_b=  (isset( $islamik_skolars_porisonkhan['sp_b']))? $islamik_skolars_porisonkhan['sp_b']:'' ?></a>
                                </td>
                                
                            </tr>
                            <?php 
                              $og_r=  (isset( $islamik_skolars_porisonkhan['og_r']))? $islamik_skolars_porisonkhan['og_r']:'';
                              $og_sg=  (isset( $islamik_skolars_porisonkhan['og_sg']))? $islamik_skolars_porisonkhan['og_sg']:'';
                              $og_b=  (isset( $islamik_skolars_porisonkhan['og_b']))? $islamik_skolars_porisonkhan['og_b']:''
                            ?>
                            <tr>
                               
                                <td class="tg-y698">ওয়ায়েজীন</td>
                                <td class="tg-0pky">
                                <?php echo ($og_r!=0)?$og=($og_r+$og_sg+$og_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="og_r" data-title="Enter"><?php echo $og_r=  (isset( $islamik_skolars_porisonkhan['og_r']))? $islamik_skolars_porisonkhan['og_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="og_sg" data-title="Enter"><?php echo $og_sg=  (isset( $islamik_skolars_porisonkhan['og_sg']))? $islamik_skolars_porisonkhan['og_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="og_b" data-title="Enter"><?php echo $og_b=  (isset( $islamik_skolars_porisonkhan['og_b']))? $islamik_skolars_porisonkhan['og_b']:'' ?></a>
                                </td>
                                
                            </tr>
                            <?php 
                              $sm_r=  (isset( $islamik_skolars_porisonkhan['sm_r']))? $islamik_skolars_porisonkhan['sm_r']:'';
                              $sm_sg=  (isset( $islamik_skolars_porisonkhan['sm_sg']))? $islamik_skolars_porisonkhan['sm_sg']:'';
                              $sm_b=  (isset( $islamik_skolars_porisonkhan['sm_b']))? $islamik_skolars_porisonkhan['sm_b']:''
                            ?>
                            <tr>
                                
                                <td class="tg-y698">সহকারী মৌলভী</td>
                                <td class="tg-0pky">
                                <?php echo ($sm_r!=0)?$sm=($sm_r+$sm_sg+$sm_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sm_r" data-title="Enter"><?php echo $sm_r=  (isset( $islamik_skolars_porisonkhan['sm_r']))? $islamik_skolars_porisonkhan['sm_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sm_sg" data-title="Enter"><?php echo $sm_sg=  (isset( $islamik_skolars_porisonkhan['sm_sg']))? $islamik_skolars_porisonkhan['sm_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sm_b" data-title="Enter"><?php echo $sm_b=  (isset( $islamik_skolars_porisonkhan['sm_b']))? $islamik_skolars_porisonkhan['sm_b']:'' ?></a>
                                </td>
                                
                            </tr>
                            <?php 
                              $kh_r=  (isset( $islamik_skolars_porisonkhan['kh_r']))? $islamik_skolars_porisonkhan['kh_r']:'';
                              $kh_sg=  (isset( $islamik_skolars_porisonkhan['kh_sg']))? $islamik_skolars_porisonkhan['kh_sg']:'';
                              $kh_b=  (isset( $islamik_skolars_porisonkhan['kh_b']))? $islamik_skolars_porisonkhan['kh_b']:''
                            ?>
                            <tr>
                               
                                <td class="tg-y698">খতিব/ইমাম </td>
                                <td class="tg-0pky">
                                <?php echo ($kh_r!=0)?$kh=($kh_r+$kh_sg+$kh_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kh_r" data-title="Enter"><?php echo $kh_r=  (isset( $islamik_skolars_porisonkhan['kh_r']))? $islamik_skolars_porisonkhan['kh_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kh_sg" data-title="Enter"><?php echo $kh_sg=  (isset( $islamik_skolars_porisonkhan['kh_sg']))? $islamik_skolars_porisonkhan['kh_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kh_b" data-title="Enter"><?php echo $kh_b=  (isset( $islamik_skolars_porisonkhan['kh_b']))? $islamik_skolars_porisonkhan['kh_b']:'' ?></a>
                                </td>
                               
                            </tr>
                            <?php 
                              $mt_r=  (isset( $islamik_skolars_porisonkhan['mt_r']))? $islamik_skolars_porisonkhan['mt_r']:'';
                              $mt_sg=  (isset( $islamik_skolars_porisonkhan['mt_sg']))? $islamik_skolars_porisonkhan['mt_sg']:'';
                              $mt_b=  (isset( $islamik_skolars_porisonkhan['mt_b']))? $islamik_skolars_porisonkhan['mt_b']:''
                            ?>
                            <tr>
                            
                                <td class="tg-y698">মুহতামিম</td>
                                <td class="tg-0pky">
                                <?php echo ($mt_r!=0)?$mt=($mt_r+$mt_sg+$mt_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mt_r" data-title="Enter"><?php echo $mt_r=  (isset( $islamik_skolars_porisonkhan['mt_r']))? $islamik_skolars_porisonkhan['mt_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mt_sg" data-title="Enter"><?php echo $mt_sg=  (isset( $islamik_skolars_porisonkhan['mt_sg']))? $islamik_skolars_porisonkhan['mt_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mt_b" data-title="Enter"><?php echo $mt_b=  (isset( $islamik_skolars_porisonkhan['mt_b']))? $islamik_skolars_porisonkhan['mt_b']:'' ?></a>
                                </td>
                                
                            </tr>
                            <?php 
                              $ksh_r=  (isset( $islamik_skolars_porisonkhan['ksh_r']))? $islamik_skolars_porisonkhan['ksh_r']:'';
                              $ksh_sg=  (isset( $islamik_skolars_porisonkhan['ksh_sg']))? $islamik_skolars_porisonkhan['ksh_sg']:'';
                              $ksh_b=  (isset( $islamik_skolars_porisonkhan['ksh_b']))? $islamik_skolars_porisonkhan['ksh_b']:''
                            ?>
                            <tr>
                               
                                <td class="tg-y698"> কওমি শিক্ষক</td>
                                <td class="tg-0pky">
                                <?php echo ($ksh_r!=0)?$ksh=($ksh_r+$ksh_sg+$ksh_b):0?>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ksh_r" data-title="Enter"><?php echo $ksh_r=  (isset( $islamik_skolars_porisonkhan['ksh_r']))? $islamik_skolars_porisonkhan['ksh_r']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ksh_sg" data-title="Enter"><?php echo $ksh_sg=  (isset( $islamik_skolars_porisonkhan['ksh_sg']))? $islamik_skolars_porisonkhan['ksh_sg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="islamik_skolars_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ksh_b" data-title="Enter"><?php echo $ksh_b=  (isset( $islamik_skolars_porisonkhan['ksh_b']))? $islamik_skolars_porisonkhan['ksh_b']:'' ?></a>
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
