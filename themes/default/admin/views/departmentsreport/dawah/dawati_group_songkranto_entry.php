<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'দাওয়াতি গ্রুপ সংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/dawati-group-songkranto') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/dawati-group-songkranto/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span>গ্রুপ সংখ্যা    </span></div></td>
                                <td class="tg-pwj7 "><div><span>অংশগ্রহণকারীর সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>দাওয়াত প্রাপ্ত সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>বন্ধু বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>শুভাকাঙ্ক্ষী বৃদ্ধি </span></div></td>
                              
                               
                            </tr>


                            <?php
                            $pk = (isset($vinnodhormabolombider_maje_daoyati_kajer_lokkhon['id']))?$vinnodhormabolombider_maje_daoyati_kajer_lokkhon['id']:'';
                            ?>

                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kajer_lokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gps" data-title="Enter"><?php echo $gps =  (isset( $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['gps']))? $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['gps']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kajer_lokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="oks" data-title="Enter"><?php echo $oks =  (isset( $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['oks']))? $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['oks']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kajer_lokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dps" data-title="Enter"><?php echo $dps =  (isset( $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['dps']))? $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['dps']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kajer_lokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbr" data-title="Enter"><?php echo $sbr =  (isset( $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['sbr']))? $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['sbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kajer_lokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbr" data-title="Enter"><?php echo $bbr =  (isset( $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['bbr']))? $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['bbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vinnodhormabolombider_maje_daoyati_kajer_lokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suvkbr" data-title="Enter"><?php echo $suvkbr =  (isset( $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['suvkbr']))? $vinnodhormabolombider_maje_daoyati_kajer_lokkhon['suvkbr']:'' ?></a>

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
