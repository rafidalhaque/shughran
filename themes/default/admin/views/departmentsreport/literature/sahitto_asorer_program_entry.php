<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সাহিত্য আসরের প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/sahitto-asorer-program/') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/sahitto-asorer-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7">প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" > টার্গেট গ্রুপ (যাদের নিয়ে আয়োজন) </td>
                                <td class="tg-pwj7" >প্রোগ্রাম সংখ্যা </td>
                                <td class="tg-pwj7" > মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >  গড় উপস্থিতি </td>
                            </tr>
                            <?php
                            $pk = (isset($sahitto_asorer_program['id']))?$sahitto_asorer_program['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1">সাহিত্য আড্ডা	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sa_tg" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sa_tg']))? $sahitto_asorer_program['sa_tg']:'' ?></a>
                                </td>

                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sa_ps" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sa_ps']))? $sahitto_asorer_program['sa_ps']:'' ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sa_ta" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sa_ta']))? $sahitto_asorer_program['sa_ta']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sa_aa" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sa_aa']))? $sahitto_asorer_program['sa_aa']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাহিত্য পাঠচক্র </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_tg" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sp_tg']))? $sahitto_asorer_program['sp_tg']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_ps" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sp_ps']))? $sahitto_asorer_program['sp_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_ta" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sp_ta']))? $sahitto_asorer_program['sp_ta']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_aa" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sp_aa']))? $sahitto_asorer_program['sp_aa']:'' ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">সাহিত্য কর্মশালা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_tg" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sk_tg']))? $sahitto_asorer_program['sk_tg']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_ps" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sk_ps']))? $sahitto_asorer_program['sk_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_ta" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sk_ta']))? $sahitto_asorer_program['sk_ta']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_aa" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['sk_aa']))? $sahitto_asorer_program['sk_aa']:'' ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">সাহিত্য সামষ্টিক পাঠ</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ssp_tg" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['ssp_tg']))? $sahitto_asorer_program['ssp_tg']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ssp_ps" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['ssp_ps']))? $sahitto_asorer_program['ssp_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ssp_ta" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['ssp_ta']))? $sahitto_asorer_program['ssp_ta']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ssp_aa" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['ssp_aa']))? $sahitto_asorer_program['ssp_aa']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাহিত্য উৎসব</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="su_tg" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['su_tg']))? $sahitto_asorer_program['su_tg']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="su_ps" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['su_ps']))? $sahitto_asorer_program['su_ps']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="su_ta" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['su_ta']))? $sahitto_asorer_program['su_ta']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sahitto_asorer_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="su_aa" data-title="Enter"><?php echo (isset( $sahitto_asorer_program['su_aa']))? $sahitto_asorer_program['su_aa']:'' ?></a>
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
