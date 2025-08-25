<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিতর্ক ক্লাবের বিবরণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bitorko-club-biboron') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bitorko-club-biboron/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2"></td>
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span> পূর্ব </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>
                                <td class="tg-pwj7 " ><div><span> মন্তব্য </span></div></td>
                               
                               
                            </tr>

                            <?php
                            $pk = (isset($bitorko_klaber_biboron['id']))?$bitorko_klaber_biboron['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1">জেনারেল ক্লাব সংখ্যা 	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jks_pb" data-title="Enter"><?php echo $jks_pb=  (isset( $bitorko_klaber_biboron['jks_pb']))? $bitorko_klaber_biboron['jks_pb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jks_bm" data-title="Enter"><?php echo $jks_bm=  (isset( $bitorko_klaber_biboron['jks_bm']))? $bitorko_klaber_biboron['jks_bm']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jks_br" data-title="Enter"><?php echo $jks_br=  (isset( $bitorko_klaber_biboron['jks_br']))? $bitorko_klaber_biboron['jks_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jks_ght" data-title="Enter"><?php echo $jks_ght=  (isset( $bitorko_klaber_biboron['jks_ght']))? $bitorko_klaber_biboron['jks_ght']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jks_mb" data-title="Enter"><?php echo $jks_mb=  (isset( $bitorko_klaber_biboron['jks_mb']))? $bitorko_klaber_biboron['jks_mb']:'' ?></a>
                                </td>
                               
                            </tr>


                            <tr>
                                <td class="tg-y698">সাংগঠনিক থানা ক্লাব সংখ্যা</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthks_pb" data-title="Enter"><?php echo $sthks_pb=  (isset( $bitorko_klaber_biboron['sthks_pb']))? $bitorko_klaber_biboron['sthks_pb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthks_bm" data-title="Enter"><?php echo $sthks_bm=  (isset( $bitorko_klaber_biboron['sthks_bm']))? $bitorko_klaber_biboron['sthks_bm']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthks_br" data-title="Enter"><?php echo $sthks_br=  (isset( $bitorko_klaber_biboron['sthks_br']))? $bitorko_klaber_biboron['sthks_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthks_ght" data-title="Enter"><?php echo $sthks_ght=  (isset( $bitorko_klaber_biboron['sthks_ght']))? $bitorko_klaber_biboron['sthks_ght']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitorko_klaber_biboron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthks_mb" data-title="Enter"><?php echo $sthks_mb=  (isset( $bitorko_klaber_biboron['sthks_mb']))? $bitorko_klaber_biboron['sthks_mb']:'' ?></a>
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
