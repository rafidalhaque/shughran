<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i

                class="fa-fw fa fa-barcode"></i><?= 'শুধু বিজ্ঞানে অধ্যয়নরত জনশক্তি ও দায়িত্বশীলদের সংখ্যাতাত্বিক হিসাব' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                <p class="introtext"><?php // lang('list_results'); ?></p>




                <div class="table-responsive">


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
                            text-align: center

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
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">
                            




                        <tr>
                              <td class="tg-pwj7" colspan="">মান </td>
                                <td class="tg-pwj7" colspan="">মোট <br> জনশক্তি </td>
                                <td class="tg-pwj7" colspan="">মাধ্যমিক </td>
                                <td class="tg-pwj7" colspan="">উচ্চ <br> মাধ্যমিক </td>
                                <td class="tg-pwj7" colspan="">স্নাতক ও  <br>স্নাতকোত্তর </td>
                                <td class="tg-pwj7" colspan="">মোট <br> দায়িত্বশীল  </td>
                                <td class="tg-pwj7" colspan=""> শাখা সভাপতি <br> ও সেক্রেটারি</td>
                                <td class="tg-pwj7" colspan="">শাখা <br> সেক্রেটারিয়েট </td>
                                <td class="tg-pwj7" colspan="">থানা সভাপতি ও <br> সেক্রেটারি </td>

                            </tr>


                            <?php 
                                 $sod_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_mm']:'';
                                 $sod_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_ucm']:'';
                                 $sod_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_stsk']:'';
                                 $sod_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shss']:'';
                                 $sod_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shsy']:'';
                                 $sod_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_thss']:'';
                                 $sat_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm']:'';
                                 $sat_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm']:'';
                                 $sat_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk']:'';
                                 $sat_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss']:'';
                                 $sat_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy']:'';
                                 $sat_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss']:'';
                                 $kor_mm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm']:'';
                                 $kor_ucm=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm']:'';
                                 $kor_stsk=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk']:'';
                                 $kor_shss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss']:'';
                                 $kor_shsy=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy']:'';
                                 $kor_thss=  (isset( $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss']))? $shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss']:'';
                                ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sod_mot=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sod_mm=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_mm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sod_ucm=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_ucm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sod_stsk=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_stsk'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sod_shsy=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shsy'] ?>  
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sod_shsy=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_shsy'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sod_thss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_thss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sod_thss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sod_thss'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sat_mot=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_mm=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_mm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_ucm=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_ucm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_stsk=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_stsk'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_shss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_shsy=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_shsy'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_thss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $sat_thss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['sat_thss'] ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-y698 type_1"> কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kor_mot=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mot'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_mm=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_mm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_ucm=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_ucm'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_stsk=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_stsk'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_shss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_shsy=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_shsy'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_thss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $kor_thss=$total_shudhumatro_biggane_odhainroto_jonoshokti_daiettoshilder['kor_thss'] ?>
                                </td>
                            </tr>
                            <tr>
                                    <td class="tg-y698 type_1"> মোট </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo ($sod_mot!=0)? ($sod_mot+$sat_mot+$kor_mot):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_mm!=0)? ($sod_mm+$sat_mm+$kor_mm):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_ucm!=0)? ($sod_ucm+$sat_ucm+$kor_ucm):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_stsk!=0)? ($sod_stsk+$sat_stsk+$kor_stsk):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_shss!=0)? ($sod_shss+$sat_shss+$kor_shss):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_shsy!=0)? ($sod_shsy+$sat_shsy+$kor_shsy):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_thss!=0)? ($sod_thss+$sat_thss+$kor_thss):0?>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo ($sod_thss!=0)? ($sod_thss+$sat_thss+$kor_thss):0?>
                                    </td>
                                </tr>


                        </table>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>