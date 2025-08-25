<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'ভিন্নধর্মালম্বীদের মধ্যে দাওয়াতি কাজ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bhinno-dhormalombi-dawat') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bhinno-dhormalombi-dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span>দাওয়াত</span></div></td>
                                <td class="tg-pwj7 "><div><span>পূর্বের সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>
                                <td class="tg-pwj7 "><div><span>মন্তব্য </span></div></td>
                              
                               
                            </tr>

                            <?php
                            $pk = (isset($vinnodhormabolombider_maje_daoyati_kaj1['id']))?$vinnodhormabolombider_maje_daoyati_kaj1['id']:'';
                            ?>


                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                সমর্থক 
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_pus" data-title="Enter"><?php echo $som_pus =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['som_pus']))? $vinnodhormabolombider_maje_daoyati_kaj1['som_pus']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bms" data-title="Enter"><?php echo $som_bms =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['som_bms']))? $vinnodhormabolombider_maje_daoyati_kaj1['som_bms']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_br" data-title="Enter"><?php echo $som_br =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['som_br']))? $vinnodhormabolombider_maje_daoyati_kaj1['som_br']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_ght" data-title="Enter"><?php echo $som_ght =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['som_ght']))? $vinnodhormabolombider_maje_daoyati_kaj1['som_ght']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb" data-title="Enter"><?php echo $som_mb =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['som_mb']))? $vinnodhormabolombider_maje_daoyati_kaj1['som_mb']:'' ?></a>

                                </td>
                              

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                বন্ধু 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_pus" data-title="Enter"><?php echo $bondu_pus =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['bondu_pus']))? $vinnodhormabolombider_maje_daoyati_kaj1['bondu_pus']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_bms" data-title="Enter"><?php echo $bondu_bms =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['bondu_bms']))? $vinnodhormabolombider_maje_daoyati_kaj1['bondu_bms']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_br" data-title="Enter"><?php echo $bondu_br =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['bondu_br']))? $vinnodhormabolombider_maje_daoyati_kaj1['bondu_br']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_ght	" data-title="Enter"><?php echo $bondu_ght	 =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['bondu_ght	']))? $vinnodhormabolombider_maje_daoyati_kaj1['bondu_ght	']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_mb" data-title="Enter"><?php echo $bondu_mb =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['bondu_mb']))? $vinnodhormabolombider_maje_daoyati_kaj1['bondu_mb']:'' ?></a>

                                </td>
                              

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                মানবিক সহায়তা
                                </td>
                                <td class="tg-0pky  type_2" >
                                সংখ্যা 
                                </td>
                                <td class="tg-0pky  type_3" colspan="2">
                                ছাত্র-ছাত্রীর সংখ্যা
                                </td>
                                <td class="tg-0pky  type_4" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shbrt_s" data-title="Enter"><?php echo $shbrt_s =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['shbrt_s']))? $vinnodhormabolombider_maje_daoyati_kaj1['shbrt_s']:'' ?></a>

                                </td>
                               
                                <td class="tg-0pky  type_5">
                                মন্তব্য
                                </td>
                              

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                শিক্ষাবৃত্তি
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shbrt_chchtris" data-title="Enter"><?php echo $shbrt_chchtris =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['shbrt_chchtris']))? $vinnodhormabolombider_maje_daoyati_kaj1['shbrt_chchtris']:'' ?></a>

                                </td>
                               
                                <td class="tg-0pky  type_3" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shbrt_mb" data-title="Enter"><?php echo $shbrt_mb =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['shbrt_mb']))? $vinnodhormabolombider_maje_daoyati_kaj1['shbrt_mb']:'' ?></a>

                                </td> 
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shupk_s" data-title="Enter"><?php echo $shupk_s =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['shupk_s']))? $vinnodhormabolombider_maje_daoyati_kaj1['shupk_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shupk_chchtris" data-title="Enter"><?php echo $shupk_chchtris =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['shupk_chchtris']))? $vinnodhormabolombider_maje_daoyati_kaj1['shupk_chchtris']:'' ?></a>

                                </td>
                              
                              

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                শিক্ষা উপকরণ
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shupk_mb" data-title="Enter"><?php echo $shupk_mb =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['shupk_mb']))? $vinnodhormabolombider_maje_daoyati_kaj1['shupk_mb']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dtupkb_s" data-title="Enter"><?php echo $dtupkb_s =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['dtupkb_s']))? $vinnodhormabolombider_maje_daoyati_kaj1['dtupkb_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dtupkb_chchtris" data-title="Enter"><?php echo $dtupkb_chchtris =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['dtupkb_chchtris']))? $vinnodhormabolombider_maje_daoyati_kaj1['dtupkb_chchtris']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dtupkb_mb" data-title="Enter"><?php echo $dtupkb_mb =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['dtupkb_mb']))? $vinnodhormabolombider_maje_daoyati_kaj1['dtupkb_mb']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cisspdn_s" data-title="Enter"><?php echo $cisspdn_s =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['cisspdn_s']))? $vinnodhormabolombider_maje_daoyati_kaj1['cisspdn_s']:'' ?></a>

                                </td>
                              

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                দাওয়াতি উপকরণ বিতরণ 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cisspdn_chchtris" data-title="Enter"><?php echo $cisspdn_chchtris =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['cisspdn_chchtris']))? $vinnodhormabolombider_maje_daoyati_kaj1['cisspdn_chchtris']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kaj1" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cisspdn_mb" data-title="Enter"><?php echo $cisspdn_mb =  (isset( $vinnodhormabolombider_maje_daoyati_kaj1['cisspdn_mb']))? $vinnodhormabolombider_maje_daoyati_kaj1['cisspdn_mb']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">

                                </td>
                                <td class="tg-0pky  type_5">

                                </td>
                                <td class="tg-0pky  type_5">

                                </td>
                              

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                চিকিৎসা সেবা প্রদান 
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_3">
                                
                                </td>
                                <td class="tg-0pky  type_4">
                                
                                </td>
                                <td class="tg-0pky  type_5">
                                
                                </td>
                                <td class="tg-0pky  type_5">
                                
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
