<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i

                class="fa-fw fa fa-barcode"></i><?= 'বিশেষ প্রোগ্রামের রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


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
                        <li><a href="<?= admin_url('departmentsreport/bishesh-program-report') ?>"><i
                                    class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                        <li class="divider"></li>
                        <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bishesh-program-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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


                                <?php $pk = (isset($biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['id']))?$biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['id']:'';?>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">প্রোগ্রাম</td>
                                    <td class="tg-pwj7  type_1" colspan="">কতটি বাস্তবায়িত হয়েছে</td>
                                    <td class="tg-pwj7  type_1" colspan="">উপস্থিতি</td>
                                    <td class="tg-pwj7  type_1" colspan="">মন্তব্য</td>
                                </tr>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">বিজ্ঞান শিক্ষার্থীদের নিয়ে ক্যারিয়ার গাইডলাইন
                                        প্রোগ্রাম</td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bshdnkglp_kbbho"
                                            data-title="Enter"><?php echo $_bshdnkglp_kbbho=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bshdnkglp_kbbho']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bshdnkglp_kbbho']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bshdnkglp_up"
                                            data-title="Enter"><?php echo $_bshdnkglp_up=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bshdnkglp_up']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bshdnkglp_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bshdnkglp_mb"
                                            data-title="Enter"><?php echo $_bshdnkglp_mb=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bshdnkglp_mb']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bshdnkglp_mb']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">বিজ্ঞান বিষয়ক কুইজ প্রতিযোগিতা</td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bbkpj_kbbho"
                                            data-title="Enter"><?php echo $_bbkpj_kbbho=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bbkpj_kbbho']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bbkpj_kbbho']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bbkpj_up"
                                            data-title="Enter"><?php echo $_bbkpj_up=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bbkpj_up']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bbkpj_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bbkpj_mb"
                                            data-title="Enter"><?php echo $_bbkpj_mb=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bbkpj_mb']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bbkpj_mb']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">বিজ্ঞানভিত্তিক অলিম্পিয়াড আয়োজন</td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bvoa_kbbho"
                                            data-title="Enter"><?php echo $_bvoa_kbbho=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bvoa_kbbho']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bvoa_kbbho']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bvoa_up"
                                            data-title="Enter"><?php echo $_bvoa_up=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bvoa_up']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bvoa_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bvoa_mb"
                                            data-title="Enter"><?php echo $_bvoa_mb=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bvoa_mb']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bvoa_mb']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">বিজ্ঞানের সাথে সম্পর্কিত বিভিন্ন দিবস উদযাপন
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bssbdu_kbbho"
                                            data-title="Enter"><?php echo $_bssbdu_kbbho=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bssbdu_kbbho']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bssbdu_kbbho']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bssbdu_up"
                                            data-title="Enter"><?php echo $_bssbdu_up=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bssbdu_up']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bssbdu_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bssbdu_mb"
                                            data-title="Enter"><?php echo $_bssbdu_mb=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bssbdu_mb']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bssbdu_mb']:'' ?></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-pwj7  type_1" colspan="">বিজ্ঞান সম্পর্কিত ডকুমেন্টারি, শর্টফিল্ম,
                                        মুভি শো প্রোগ্রাম</td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bsdtshfmshop_kbbho"
                                            data-title="Enter"><?php echo $_bsdtshfmshop_kbbho=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bsdtshfmshop_kbbho']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bsdtshfmshop_kbbho']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bsdtshfmshop_up"
                                            data-title="Enter"><?php echo $_bsdtshfmshop_up=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bsdtshfmshop_up']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bsdtshfmshop_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_1" colspan="">
                                        <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number"
                                            data-table="biggan_karjokromsonkarnto_koiekti_bishes_programer_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bsdtshfmshop_mb"
                                            data-title="Enter"><?php echo $_bsdtshfmshop_mb=  (isset( $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bsdtshfmshop_mb']))? $biggan_karjokromsonkarnto_koiekti_bishes_programer_riport['bsdtshfmshop_mb']:'' ?></a>
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