<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i

                class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞানশিক্ষা সম্পর্কিত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


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
                        <li><a href="<?= admin_url('departmentsreport/science-somporkito') ?>"><i
                                    class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                        <li class="divider"></li>
                        <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/science-somporkito/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                <?php $pk = (isset($bigganshikha_somporkito['id']))?$bigganshikha_somporkito['id']:'';?>

                                <tr>
                                    <td class="tg-pwj7" colspan="">বিবরণ</td>
                                    <td class="tg-pwj7" colspan="">সংখ্যা</td>
                                    <td class="tg-pwj7" colspan="">কতজনের তালিকা আছে</td>

                                </tr>

                                <tr>
                                    <td class="tg-y698 type_1">বিজ্ঞান সংশ্লিষ্ট বিষয়ে কাজ করতে আগ্রহী এমন জনশক্তি</td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bskabbnkkaj_s"
                                            data-title="Enter"><?php echo $_bskabbnkkaj_s=  (isset( $bigganshikha_somporkito['bskabbnkkaj_s']))? $bigganshikha_somporkito['bskabbnkkaj_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bskabbnkkaj_tkak"
                                            data-title="Enter"><?php echo $_bskabbnkkaj_tkak=  (isset( $bigganshikha_somporkito['bskabbnkkaj_tkak']))? $bigganshikha_somporkito['bskabbnkkaj_tkak']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-y698 type_1">বিজ্ঞান বিষয়ে বিভিন্ন ম্যাগাজিনে লেখালেখি করেন এমন
                                        জনশক্তি</td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bbbvmlekaj_s"
                                            data-title="Enter"><?php echo $_bbbvmlekaj_s=  (isset( $bigganshikha_somporkito['bbbvmlekaj_s']))? $bigganshikha_somporkito['bbbvmlekaj_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bbbvmlekaj_tkak"
                                            data-title="Enter"><?php echo $_bbbvmlekaj_tkak=  (isset( $bigganshikha_somporkito['bbbvmlekaj_tkak']))? $bigganshikha_somporkito['bbbvmlekaj_tkak']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-y698 type_1">এলাকাধীন বিজ্ঞানী বা বিজ্ঞানক্ষেত্রে জনপ্রিয় হয়েছেন এমন
                                        জনশক্তি
                                    </td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="adhbbkhjb_s"
                                            data-title="Enter"><?php echo $_adhbbkhjb_s=  (isset( $bigganshikha_somporkito['adhbbkhjb_s']))? $bigganshikha_somporkito['adhbbkhjb_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="adhbbkhjb_tkak"
                                            data-title="Enter"><?php echo $_adhbbkhjb_tkak=  (isset( $bigganshikha_somporkito['adhbbkhjb_tkak']))? $bigganshikha_somporkito['adhbbkhjb_tkak']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-y698 type_1">স্থানীয়, জাতীয় বা আন্তর্জাতিক বিজ্ঞান বিষয়ক প্রতিযোগিতায়
                                        পুরস্কার প্রাপ্ত অথবা অংশগ্রহণকারী জনশক্তি</td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sjabbptppaakj_s"
                                            data-title="Enter"><?php echo $_sjabbptppaakj_s=  (isset( $bigganshikha_somporkito['sjabbptppaakj_s']))? $bigganshikha_somporkito['sjabbptppaakj_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sjabbptppaakj_tkak"
                                            data-title="Enter"><?php echo $_sjabbptppaakj_tkak=  (isset( $bigganshikha_somporkito['sjabbptppaakj_tkak']))? $bigganshikha_somporkito['sjabbptppaakj_tkak']:'' ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-y698 type_1">বিজ্ঞান সংগঠন হিসেবে কাজ করছেন এমন জনশক্তি</td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="_bskabbnkkajn_s"
                                            data-title="Enter"><?php echo $_bskabbnkkajn_s=  (isset( $bigganshikha_somporkito['_bskabbnkkajn_s']))? $bigganshikha_somporkito['_bskabbnkkajn_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bskabbnkkajs_tkak"
                                            data-title="Enter"><?php echo $bskabbnkkajs_tkak=  (isset( $bigganshikha_somporkito['bskabbnkkajs_tkak']))? $bigganshikha_somporkito['bskabbnkkajs_tkak']:'' ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-y698 type_1">বিজ্ঞান বিষয় নিয়ে কাজ করছেন এমন জনশক্তি </td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="_bskabbnkkajs_s"
                                            data-title="Enter"><?php echo $_bskabbnkkajs_s=  (isset( $bigganshikha_somporkito['_bskabbnkkajs_s']))? $bigganshikha_somporkito['_bskabbnkkajs_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="_bskabbnkkajta_tkak"
                                            data-title="Enter"><?php echo $_bskabbnkkajta_tkak=  (isset( $bigganshikha_somporkito['_bskabbnkkajta_tkak']))? $bigganshikha_somporkito['_bskabbnkkajta_tkak']:'' ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-y698 type_1">নিজ উদ্যোগে অলিম্পিয়াড,বিজ্ঞান কুইজ,প্রতিযোগিতা আয়োজন করেছেন এমন জনশক্তি </td>
                                    <td class="tg-0pky  type_1">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bskabbnkkajud_s"
                                            data-title="Enter"><?php echo $bskabbnkkajud_s=  (isset( $bigganshikha_somporkito['bskabbnkkajud_s']))? $bigganshikha_somporkito['bskabbnkkajud_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="bigganshikha_somporkito"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bskabbnkkajx_tkak"
                                            data-title="Enter"><?php echo $bskabbnkkajx_tkak=  (isset( $bigganshikha_somporkito['bskabbnkkajx_tkak']))? $bigganshikha_somporkito['bskabbnkkajx_tkak']:'' ?></a>
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