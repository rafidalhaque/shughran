<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i

                class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি ও দায়িত্বশীলদের সংখ্যাতাত্বিক হিসাব' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li>
                            <a
                                href="<?= admin_url(''.($branch_id ? '/'.$branch_id : '')) ?>">
                                <i class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                            data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= admin_url('departmentsreport/science-jonoshokti') ?>"><i
                                    class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                        <li class="divider"></li>
                        <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/science-jonoshokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                    <td class="tg-pwj7" rowspan="3">মান </td>



                                </tr>
                                <tr>
                                    <td class="tg-pwj7" colspan="">মোট </td>
                                    <td class="tg-pwj7" colspan="">মাধ্যমিক </td>
                                    <td class="tg-pwj7" colspan="">উচ্চমাধ্যমিক </td>
                                    <td class="tg-pwj7" colspan="">স্নাতক ও স্নাতকোত্তর </td>
                                    <td class="tg-pwj7" colspan=""> শাখা সভাপতি ও সেক্রেটারি</td>
                                    <td class="tg-pwj7" colspan="">শাখা সেক্রেটারি </td>
                                    <td class="tg-pwj7" colspan="">থানা সভাপতি ও সেক্রেটারি </td>

                                </tr>
                                <tr>

                                </tr>

                                <?php $pk = (isset($shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['id']))?$shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['id']:'';
                                 $_sod_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_mm']:'';
                                 $_sod_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_ucm']:'';
                                 $_sod_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_stsk']:'';
                                 $_sod_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shss']:'';
                                 $_sod_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shsy']:'';
                                 $_sod_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_thss']:'';
                                 $_sat_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm']:'';
                                 $_sat_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm']:'';
                                 $_sat_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk']:'';
                                 $_sat_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss']:'';
                                 $_sat_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy']:'';
                                 $_sat_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss']:'';
                                 $_kor_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm']:'';
                                 $_kor_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm']:'';
                                 $_kor_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk']:'';
                                 $_kor_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss']:'';
                                 $_kor_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy']:'';
                                 $_kor_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss']:'';
                                ?>


                                <tr>
                                    <td class="tg-y698 type_1"> সদস্য </td>
                                    <td class="tg-y698  type_1">
                                    <?php echo $sod=($_sod_mm!=0)? ($_sod_mm+$_sod_ucm+$_sod_stsk+$_sod_shss+$_sod_shsy+$_sod_thss):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sod_mm"
                                            data-title="Enter"><?php echo $_sod_mm ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sod_ucm"
                                            data-title="Enter"><?php echo $_sod_ucm?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sod_stsk"
                                            data-title="Enter"><?php echo $_sod_stsk ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sod_shss"
                                            data-title="Enter"><?php echo $_sod_shss ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sod_shsy"
                                            data-title="Enter"><?php echo $_sod_shsy?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sod_thss"
                                            data-title="Enter"><?php echo $_sod_thss?>
                                        </a>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="tg-y698 type_1">সাথী </td>
                                    <td class="tg-y698  type_1">
                                    <?php echo $sat=($_sat_mm!=0)? ($_sat_mm+$_sat_ucm+$_sat_stsk+$_sat_shss+$_sat_shsy+$_sat_thss):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sat_mm"
                                            data-title="Enter"><?php echo $_sat_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sat_ucm"
                                            data-title="Enter"><?php echo $_sat_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sat_stsk"
                                            data-title="Enter"><?php echo $_sat_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sat_shss"
                                            data-title="Enter"><?php echo $_sat_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sat_shsy"
                                            data-title="Enter"><?php echo $_sat_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sat_thss"
                                            data-title="Enter"><?php echo $_sat_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss']:'' ?>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-y698 type_1"> কর্মী </td>
                                    <td class="tg-y698  type_1">
                                    <?php echo $kor=($_kor_mm!=0)? ($_kor_mm+$_kor_ucm+$_kor_stsk+$_kor_shss+$_kor_shsy+$_kor_thss):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kor_mm"
                                            data-title="Enter"><?php echo $_kor_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kor_ucm"
                                            data-title="Enter"><?php echo $_kor_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kor_stsk"
                                            data-title="Enter"><?php echo $_kor_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kor_shss"
                                            data-title="Enter"><?php echo $_kor_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kor_shsy"
                                            data-title="Enter"><?php echo $_kor_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kor_thss"
                                            data-title="Enter"><?php echo $_kor_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss']:'' ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-y698 type_1"> মোট </td>
                                    <td class="tg-y698  type_1">
                                    <?php echo ($sod!=0)? ($sod+$sat+$kor):0?>
                                    </td>
                                    <td class="tg-y698  type_2">
                                    <?php echo ($_sod_mm!=0)? ($_sod_mm+$_sat_mm+$_kor_mm):0?>
                                    </td>
                                    <td class="tg-y698  type_2">
                                    <?php echo ($_sod_ucm!=0)? ($_sod_ucm+$_sat_ucm+$_kor_ucm):0?>
                                    </td>
                                    <td class="tg-y698  type_2">
                                    <?php echo ($_sod_stsk!=0)? ($_sod_stsk+$_sat_stsk+$_kor_stsk):0?>
                                    </td>
                                    <td class="tg-y698  type_2">
                                    <?php echo ($_sod_shss!=0)? ($_sod_shss+$_sat_shss+$_kor_shss):0?>
                                    </td>
                                    <td class="tg-y698  type_2">
                                    <?php echo ($_sod_shsy!=0)? ($_sod_shsy+$_sat_shsy+$_kor_shsy):0?>
                                    </td>
                                    <td class="tg-y698  type_2">
                                    <?php echo ($_sod_thss!=0)? ($_sod_thss+$_sat_thss+$_kor_thss):0?>
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
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
        text-align: left
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
        text-align: left
    }

    .tg .tg-0pky {
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>