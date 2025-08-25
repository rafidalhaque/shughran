<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'টুর্নামেন্ট সংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/tournament-songkranto') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/tournament-songkranto/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">ধরন </td>
                             
                                <td class="tg-pwj7" colspan="8"> খেলা অংশগ্রহণকারী </td>
                                
                              
                            </tr>
                          
                            <tr>
                                <td class="tg-pwj7 "><div><span> ফুটবল </span></div></td>
                                <td class="tg-pwj7 "><div><span> ক্রিকেট </span></div></td>
                                <td class="tg-pwj7 "><div><span> ব্যাডমিন্টন </span></div></td>
                                <td class="tg-pwj7 "><div><span> টেবিল টেনিস </span></div></td>
                                <td class="tg-pwj7 "><div><span> ভলিবল </span></div></td>
                                <td class="tg-pwj7 "><div><span> হা-ডু-ডু </span></div></td>
                                <td class="tg-pwj7 "><div><span> হ্যান্ডবল </span></div></td>
                                <td class="tg-pwj7 "><div><span> অন্যান্য </span></div></td>
                               
                               
                            </tr>

                            <?php $pk = (isset($tunament_sonkarnto['id']))?$tunament_sonkarnto['id']:'';?>


                            <tr>
                                <td class="tg-y698 type_1">আন্ত থানা</td>
                                <td class="tg-0pky  type_1">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_fb"
                                            data-title="Enter"><?php echo $_ath_khok_fb=  (isset( $tunament_sonkarnto['ath_khok_fb']))? $tunament_sonkarnto['ath_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_ct"
                                            data-title="Enter"><?php echo $_ath_khok_ct=  (isset( $tunament_sonkarnto['ath_khok_ct']))? $tunament_sonkarnto['ath_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_bmt"
                                            data-title="Enter"><?php echo $_ath_khok_bmt=  (isset( $tunament_sonkarnto['ath_khok_bmt']))? $tunament_sonkarnto['ath_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_tt"
                                            data-title="Enter"><?php echo $_ath_khok_tt=  (isset( $tunament_sonkarnto['ath_khok_tt']))? $tunament_sonkarnto['ath_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_vb"
                                            data-title="Enter"><?php echo $_ath_khok_vb=  (isset( $tunament_sonkarnto['ath_khok_vb']))? $tunament_sonkarnto['ath_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_had"
                                            data-title="Enter"><?php echo $_ath_khok_had=  (isset( $tunament_sonkarnto['ath_khok_had']))? $tunament_sonkarnto['ath_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_hb"
                                            data-title="Enter"><?php echo $_ath_khok_hb=  (isset( $tunament_sonkarnto['ath_khok_hb']))? $tunament_sonkarnto['ath_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ath_khok_onnoanno"
                                            data-title="Enter"><?php echo $_ath_khok_onnoanno=  (isset( $tunament_sonkarnto['ath_khok_onnoanno']))? $tunament_sonkarnto['ath_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                              
                                

                            </tr>


                            <tr>
                                <td class="tg-y698">আন্ত  ওয়ার্ড</td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_fb"
                                            data-title="Enter"><?php echo $_aword_khok_fb=  (isset( $tunament_sonkarnto['aword_khok_fb']))? $tunament_sonkarnto['aword_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_ct"
                                            data-title="Enter"><?php echo $_aword_khok_ct=  (isset( $tunament_sonkarnto['aword_khok_ct']))? $tunament_sonkarnto['aword_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_bmt"
                                            data-title="Enter"><?php echo $_aword_khok_bmt=  (isset( $tunament_sonkarnto['aword_khok_bmt']))? $tunament_sonkarnto['aword_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_tt"
                                            data-title="Enter"><?php echo $_aword_khok_tt=  (isset( $tunament_sonkarnto['aword_khok_tt']))? $tunament_sonkarnto['aword_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_vb"
                                            data-title="Enter"><?php echo $_aword_khok_vb=  (isset( $tunament_sonkarnto['aword_khok_vb']))? $tunament_sonkarnto['aword_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_had"
                                            data-title="Enter"><?php echo $_aword_khok_had=  (isset( $tunament_sonkarnto['aword_khok_had']))? $tunament_sonkarnto['aword_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_hb"
                                            data-title="Enter"><?php echo $_aword_khok_hb=  (isset( $tunament_sonkarnto['aword_khok_hb']))? $tunament_sonkarnto['aword_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="aword_khok_onnoanno"
                                            data-title="Enter"><?php echo $_aword_khok_onnoanno=  (isset( $tunament_sonkarnto['aword_khok_onnoanno']))? $tunament_sonkarnto['aword_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত  বিশ্ববিদ্যালয়ু </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_fb"
                                            data-title="Enter"><?php echo $_abb_khok_fb=  (isset( $tunament_sonkarnto['abb_khok_fb']))? $tunament_sonkarnto['abb_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_ct"
                                            data-title="Enter"><?php echo $_abb_khok_ct=  (isset( $tunament_sonkarnto['abb_khok_ct']))? $tunament_sonkarnto['abb_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_bmt"
                                            data-title="Enter"><?php echo $_abb_khok_bmt=  (isset( $tunament_sonkarnto['abb_khok_bmt']))? $tunament_sonkarnto['abb_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_tt"
                                            data-title="Enter"><?php echo $_abb_khok_tt=  (isset( $tunament_sonkarnto['abb_khok_tt']))? $tunament_sonkarnto['abb_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_vb"
                                            data-title="Enter"><?php echo $_abb_khok_vb=  (isset( $tunament_sonkarnto['abb_khok_vb']))? $tunament_sonkarnto['abb_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_had"
                                            data-title="Enter"><?php echo $_abb_khok_had=  (isset( $tunament_sonkarnto['abb_khok_had']))? $tunament_sonkarnto['abb_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_hb"
                                            data-title="Enter"><?php echo $_abb_khok_hb=  (isset( $tunament_sonkarnto['abb_khok_hb']))? $tunament_sonkarnto['abb_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="abb_khok_onnoanno"
                                            data-title="Enter"><?php echo $_abb_khok_onnoanno=  (isset( $tunament_sonkarnto['abb_khok_onnoanno']))? $tunament_sonkarnto['abb_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত  কলেজ </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_fb"
                                            data-title="Enter"><?php echo $_acllg_khok_fb=  (isset( $tunament_sonkarnto['acllg_khok_fb']))? $tunament_sonkarnto['acllg_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_ct"
                                            data-title="Enter"><?php echo $_acllg_khok_ct=  (isset( $tunament_sonkarnto['acllg_khok_ct']))? $tunament_sonkarnto['acllg_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_bmt"
                                            data-title="Enter"><?php echo $_acllg_khok_bmt=  (isset( $tunament_sonkarnto['acllg_khok_bmt']))? $tunament_sonkarnto['acllg_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_tt"
                                            data-title="Enter"><?php echo $_acllg_khok_tt=  (isset( $tunament_sonkarnto['acllg_khok_tt']))? $tunament_sonkarnto['acllg_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_vb"
                                            data-title="Enter"><?php echo $_acllg_khok_vb=  (isset( $tunament_sonkarnto['acllg_khok_vb']))? $tunament_sonkarnto['acllg_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_had"
                                            data-title="Enter"><?php echo $_acllg_khok_had=  (isset( $tunament_sonkarnto['acllg_khok_had']))? $tunament_sonkarnto['acllg_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_hb"
                                            data-title="Enter"><?php echo $_acllg_khok_hb=  (isset( $tunament_sonkarnto['acllg_khok_hb']))? $tunament_sonkarnto['acllg_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="acllg_khok_onnoanno"
                                            data-title="Enter"><?php echo $_acllg_khok_onnoanno=  (isset( $tunament_sonkarnto['acllg_khok_onnoanno']))? $tunament_sonkarnto['acllg_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত  স্কুল </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_fb"
                                            data-title="Enter"><?php echo $_ascll_khok_fb=  (isset( $tunament_sonkarnto['ascll_khok_fb']))? $tunament_sonkarnto['ascll_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_ct"
                                            data-title="Enter"><?php echo $_ascll_khok_ct=  (isset( $tunament_sonkarnto['ascll_khok_ct']))? $tunament_sonkarnto['ascll_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_bmt"
                                            data-title="Enter"><?php echo $_ascll_khok_bmt=  (isset( $tunament_sonkarnto['ascll_khok_bmt']))? $tunament_sonkarnto['ascll_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_tt"
                                            data-title="Enter"><?php echo $_ascll_khok_tt=  (isset( $tunament_sonkarnto['ascll_khok_tt']))? $tunament_sonkarnto['ascll_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_vb"
                                            data-title="Enter"><?php echo $_ascll_khok_vb=  (isset( $tunament_sonkarnto['ascll_khok_vb']))? $tunament_sonkarnto['ascll_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_had"
                                            data-title="Enter"><?php echo $_ascll_khok_had=  (isset( $tunament_sonkarnto['ascll_khok_had']))? $tunament_sonkarnto['ascll_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_hb"
                                            data-title="Enter"><?php echo $_ascll_khok_hb=  (isset( $tunament_sonkarnto['ascll_khok_hb']))? $tunament_sonkarnto['ascll_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ascll_khok_onnoanno"
                                            data-title="Enter"><?php echo $_ascll_khok_onnoanno=  (isset( $tunament_sonkarnto['ascll_khok_onnoanno']))? $tunament_sonkarnto['ascll_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত  মাদ্রাসা </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_fb"
                                            data-title="Enter"><?php echo $_ams_khok_fb=  (isset( $tunament_sonkarnto['ams_khok_fb']))? $tunament_sonkarnto['ams_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_ct"
                                            data-title="Enter"><?php echo $_ams_khok_ct=  (isset( $tunament_sonkarnto['ams_khok_ct']))? $tunament_sonkarnto['ams_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_bmt"
                                            data-title="Enter"><?php echo $_ams_khok_bmt=  (isset( $tunament_sonkarnto['ams_khok_bmt']))? $tunament_sonkarnto['ams_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_tt"
                                            data-title="Enter"><?php echo $_ams_khok_tt=  (isset( $tunament_sonkarnto['ams_khok_tt']))? $tunament_sonkarnto['ams_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_vb"
                                            data-title="Enter"><?php echo $_ams_khok_vb=  (isset( $tunament_sonkarnto['ams_khok_vb']))? $tunament_sonkarnto['ams_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_had"
                                            data-title="Enter"><?php echo $_ams_khok_had=  (isset( $tunament_sonkarnto['ams_khok_had']))? $tunament_sonkarnto['ams_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_hb"
                                            data-title="Enter"><?php echo $_ams_khok_hb=  (isset( $tunament_sonkarnto['ams_khok_hb']))? $tunament_sonkarnto['ams_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ams_khok_onnoanno"
                                            data-title="Enter"><?php echo $_ams_khok_onnoanno=  (isset( $tunament_sonkarnto['ams_khok_onnoanno']))? $tunament_sonkarnto['ams_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">আন্ত  প্রতিষ্ঠান </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_fb"
                                            data-title="Enter"><?php echo $_apth_khok_fb=  (isset( $tunament_sonkarnto['apth_khok_fb']))? $tunament_sonkarnto['apth_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_ct"
                                            data-title="Enter"><?php echo $_apth_khok_ct=  (isset( $tunament_sonkarnto['apth_khok_ct']))? $tunament_sonkarnto['apth_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_bmt"
                                            data-title="Enter"><?php echo $_apth_khok_bmt=  (isset( $tunament_sonkarnto['apth_khok_bmt']))? $tunament_sonkarnto['apth_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_tt"
                                            data-title="Enter"><?php echo $_apth_khok_tt=  (isset( $tunament_sonkarnto['apth_khok_tt']))? $tunament_sonkarnto['apth_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_vb"
                                            data-title="Enter"><?php echo $_apth_khok_vb=  (isset( $tunament_sonkarnto['apth_khok_vb']))? $tunament_sonkarnto['apth_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_had"
                                            data-title="Enter"><?php echo $_apth_khok_had=  (isset( $tunament_sonkarnto['apth_khok_had']))? $tunament_sonkarnto['apth_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_hb"
                                            data-title="Enter"><?php echo $_apth_khok_hb=  (isset( $tunament_sonkarnto['apth_khok_hb']))? $tunament_sonkarnto['apth_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="apth_khok_onnoanno"
                                            data-title="Enter"><?php echo $_apth_khok_onnoanno=  (isset( $tunament_sonkarnto['apth_khok_onnoanno']))? $tunament_sonkarnto['apth_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_fb"
                                            data-title="Enter"><?php echo $_onnoanno_khok_fb=  (isset( $tunament_sonkarnto['onnoanno_khok_fb']))? $tunament_sonkarnto['onnoanno_khok_fb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_ct"
                                            data-title="Enter"><?php echo $_onnoanno_khok_ct=  (isset( $tunament_sonkarnto['onnoanno_khok_ct']))? $tunament_sonkarnto['onnoanno_khok_ct']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_bmt"
                                            data-title="Enter"><?php echo $_onnoanno_khok_bmt=  (isset( $tunament_sonkarnto['onnoanno_khok_bmt']))? $tunament_sonkarnto['onnoanno_khok_bmt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_tt"
                                            data-title="Enter"><?php echo $_onnoanno_khok_tt=  (isset( $tunament_sonkarnto['onnoanno_khok_tt']))? $tunament_sonkarnto['onnoanno_khok_tt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_vb"
                                            data-title="Enter"><?php echo $_onnoanno_khok_vb=  (isset( $tunament_sonkarnto['onnoanno_khok_vb']))? $tunament_sonkarnto['onnoanno_khok_vb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_had"
                                            data-title="Enter"><?php echo $_onnoanno_khok_had=  (isset( $tunament_sonkarnto['onnoanno_khok_had']))? $tunament_sonkarnto['onnoanno_khok_had']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_hb"
                                            data-title="Enter"><?php echo $_onnoanno_khok_hb=  (isset( $tunament_sonkarnto['onnoanno_khok_hb']))? $tunament_sonkarnto['onnoanno_khok_hb']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="tunament_sonkarnto"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="onnoanno_khok_onnoanno"
                                            data-title="Enter"><?php echo $_onnoanno_khok_onnoanno=  (isset( $tunament_sonkarnto['onnoanno_khok_onnoanno']))? $tunament_sonkarnto['onnoanno_khok_onnoanno']:'' ?></a>
                                </td>
                                </td>
                              
                            </tr>
                          
                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
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
