<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মানবাধিকার লংঘন পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/manobadhikar-longhon-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/manobadhikar-longhon-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                <td class="tg-pwj7" >মানবাধিকার লংঘন পরিসংখ্যান</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >নিহত</td>
                                <td class="tg-pwj7" >আহত</td>
                                <td class="tg-pwj7" >গুলিবিদ্ধ</td>
                                <td class="tg-pwj7" >আটক</td>
                             
                            </tr>


                            <?php
                            $pk = (isset($manobodhikar_bivag3['id']))?$manobodhikar_bivag3['id']:'';
                            ?>


                            <tr>
                                <td class="tg-pwj7 type_1">বিচার বহির্ভূত হত্যা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbho_s" data-title="Enter"><?php echo $bbho_s=  (isset( $manobodhikar_bivag3['bbho_s']))? $manobodhikar_bivag3['bbho_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbho_n" data-title="Enter"><?php echo $bbho_n=  (isset( $manobodhikar_bivag3['bbho_n']))? $manobodhikar_bivag3['bbho_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbho_a" data-title="Enter"><?php echo $bbho_a=  (isset( $manobodhikar_bivag3['bbho_a']))? $manobodhikar_bivag3['bbho_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbho_gb" data-title="Enter"><?php echo $bbho_gb=  (isset( $manobodhikar_bivag3['bbho_gb']))? $manobodhikar_bivag3['bbho_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbho_ak" data-title="Enter"><?php echo $bbho_ak=  (isset( $manobodhikar_bivag3['bbho_ak']))? $manobodhikar_bivag3['bbho_ak']:'' ?></a>
                                </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">রাজনৈতিক সহিংসতা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rss_s" data-title="Enter"><?php echo $rss_s=  (isset( $manobodhikar_bivag3['rss_s']))? $manobodhikar_bivag3['rss_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rss_n" data-title="Enter"><?php echo $rss_n=  (isset( $manobodhikar_bivag3['rss_n']))? $manobodhikar_bivag3['rss_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rss_a" data-title="Enter"><?php echo $rss_a=  (isset( $manobodhikar_bivag3['rss_a']))? $manobodhikar_bivag3['rss_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rss_gb" data-title="Enter"><?php echo $rss_gb=  (isset( $manobodhikar_bivag3['rss_gb']))? $manobodhikar_bivag3['rss_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rss_ak" data-title="Enter"><?php echo $rss_ak=  (isset( $manobodhikar_bivag3['rss_ak']))? $manobodhikar_bivag3['rss_ak']:'' ?></a>
                                </td>
 
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">ধর্ষণ</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shmn_s" data-title="Enter"><?php echo $shmn_s=  (isset( $manobodhikar_bivag3['shmn_s']))? $manobodhikar_bivag3['shmn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shmn_n" data-title="Enter"><?php echo $shmn_n=  (isset( $manobodhikar_bivag3['shmn_n']))? $manobodhikar_bivag3['shmn_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shmn_a" data-title="Enter"><?php echo $shmn_a=  (isset( $manobodhikar_bivag3['shmn_a']))? $manobodhikar_bivag3['shmn_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shmn_gb" data-title="Enter"><?php echo $shmn_gb=  (isset( $manobodhikar_bivag3['shmn_gb']))? $manobodhikar_bivag3['shmn_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shmn_ak" data-title="Enter"><?php echo $shmn_ak=  (isset( $manobodhikar_bivag3['shmn_ak']))? $manobodhikar_bivag3['shmn_ak']:'' ?></a>
                                </td>
 
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">শিশু/নারী নির্যাতন</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nn_s" data-title="Enter"><?php echo $nn_s=  (isset( $manobodhikar_bivag3['nn_s']))? $manobodhikar_bivag3['nn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nn_n" data-title="Enter"><?php echo $nn_n=  (isset( $manobodhikar_bivag3['nn_n']))? $manobodhikar_bivag3['nn_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nn_a" data-title="Enter"><?php echo $nn_a=  (isset( $manobodhikar_bivag3['nn_a']))? $manobodhikar_bivag3['nn_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nn_gb" data-title="Enter"><?php echo $nn_gb=  (isset( $manobodhikar_bivag3['nn_gb']))? $manobodhikar_bivag3['nn_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nn_ak" data-title="Enter"><?php echo $nn_ak=  (isset( $manobodhikar_bivag3['nn_ak']))? $manobodhikar_bivag3['nn_ak']:'' ?></a>
                                </td>
 
                                
                            </tr>

                          

                            <tr>
                                <td class="tg-pwj7 type_1">গুম</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ag_s" data-title="Enter"><?php echo $ag_s=  (isset( $manobodhikar_bivag3['ag_s']))? $manobodhikar_bivag3['ag_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ag_n" data-title="Enter"><?php echo $ag_n=  (isset( $manobodhikar_bivag3['ag_n']))? $manobodhikar_bivag3['ag_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ag_a" data-title="Enter"><?php echo $ag_a=  (isset( $manobodhikar_bivag3['ag_a']))? $manobodhikar_bivag3['ag_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ag_gb" data-title="Enter"><?php echo $ag_gb=  (isset( $manobodhikar_bivag3['ag_gb']))? $manobodhikar_bivag3['ag_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ag_ak" data-title="Enter"><?php echo $ag_ak=  (isset( $manobodhikar_bivag3['ag_ak']))? $manobodhikar_bivag3['ag_ak']:'' ?></a>
                                </td>
 
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">সাংবাদিক নির্যাতন</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sn_s" data-title="Enter"><?php echo $sn_s=  (isset( $manobodhikar_bivag3['sn_s']))? $manobodhikar_bivag3['sn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sn_n" data-title="Enter"><?php echo $sn_n=  (isset( $manobodhikar_bivag3['sn_n']))? $manobodhikar_bivag3['sn_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sn_a" data-title="Enter"><?php echo $sn_a=  (isset( $manobodhikar_bivag3['sn_a']))? $manobodhikar_bivag3['sn_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sn_gb" data-title="Enter"><?php echo $sn_gb=  (isset( $manobodhikar_bivag3['sn_gb']))? $manobodhikar_bivag3['sn_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sn_ak" data-title="Enter"><?php echo $sn_ak=  (isset( $manobodhikar_bivag3['sn_ak']))? $manobodhikar_bivag3['sn_ak']:'' ?></a>
                                </td>
 
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">সীমান্তে হত্যা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sho_s" data-title="Enter"><?php echo $sho_s=  (isset( $manobodhikar_bivag3['sho_s']))? $manobodhikar_bivag3['sho_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sho_n" data-title="Enter"><?php echo $sho_n=  (isset( $manobodhikar_bivag3['sho_n']))? $manobodhikar_bivag3['sho_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sho_a" data-title="Enter"><?php echo $sho_a=  (isset( $manobodhikar_bivag3['sho_a']))? $manobodhikar_bivag3['sho_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sho_gb" data-title="Enter"><?php echo $sho_gb=  (isset( $manobodhikar_bivag3['sho_gb']))? $manobodhikar_bivag3['sho_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sho_ak" data-title="Enter"><?php echo $sho_ak=  (isset( $manobodhikar_bivag3['sho_ak']))? $manobodhikar_bivag3['sho_ak']:'' ?></a>
                                </td>
 
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">সংখ্যালঘু নির্যাতন</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sln_s" data-title="Enter"><?php echo $sln_s=  (isset( $manobodhikar_bivag3['sln_s']))? $manobodhikar_bivag3['sln_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sln_n" data-title="Enter"><?php echo $sln_n=  (isset( $manobodhikar_bivag3['sln_n']))? $manobodhikar_bivag3['sln_n']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sln_a" data-title="Enter"><?php echo $sln_a=  (isset( $manobodhikar_bivag3['sln_a']))? $manobodhikar_bivag3['sln_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sln_gb" data-title="Enter"><?php echo $sln_gb=  (isset( $manobodhikar_bivag3['sln_gb']))? $manobodhikar_bivag3['sln_gb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sln_ak" data-title="Enter"><?php echo $sln_ak=  (isset( $manobodhikar_bivag3['sln_ak']))? $manobodhikar_bivag3['sln_ak']:'' ?></a>
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
