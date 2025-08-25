<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি ও দাওয়াত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/jonoshokti-dawat') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jonoshokti-dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                                <td class="tg-pwj7 " rowspan="3"><div><span> বর্তমান সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " rowspan="3"><div><span>মোট বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7" colspan="9" style="text-align:center;">বৃদ্ধি বিবরণ </td>
                                <td class="tg-pwj7" rowspan="2" colspan="8" style="text-align:center;"> আকর্ষণীয় প্রোগ্রাম  </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="5">ইন্টারমিডিয়েট সেকশন  </td>
                                <td class="tg-pwj7" colspan="4">ডিপ্লোমা </td>
                               
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 "><div><span>এসএসসি/দাখিল জিপিএ-৫.০০</span></div></td>
                                <td class="tg-pwj7 "><div><span>এসএসসি/দাখিল৫<জিপিএ </span></div></td>
                                <td class="tg-pwj7 "><div><span>বিজ্ঞান</span></div></td>
                                <td class="tg-pwj7 "><div><span>মানবিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>ব্যবসায় শিক্ষা  </span></div></td>

                                <td class="tg-pwj7 "><div><span>পলি টেকনিক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মেরিন ইন্সটিটিউট</span></div></td>
                                <td class="tg-pwj7 "><div><span>টেক্সটাইল কলেজ</span></div></td>
                                <td class="tg-pwj7 "><div><span>আই এইচ টি</span></div></td>

                                <td class="tg-pwj7 "><div><span> প্রোগ্রামের ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত</span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রোগ্রামের ধরন </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপস্থিত </span></div></td>
                             
                            </tr>

                            <?php
                            $pk = (isset($jonoshokti_daoyat['id']))?$jonoshokti_daoyat['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bms" data-title="Enter"><?php echo $sod_bms=  (isset( $jonoshokti_daoyat['sod_bms']))? $jonoshokti_daoyat['sod_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mbr" data-title="Enter"><?php echo $sod_mbr=  (isset( $jonoshokti_daoyat['sod_mbr']))? $jonoshokti_daoyat['sod_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_hossh_bgos" data-title="Enter"><?php echo $sod_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['sod_brbib_hossh_bgos']))? $jonoshokti_daoyat['sod_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_hossh_kbgos" data-title="Enter"><?php echo $sod_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['sod_brbib_hossh_kbgos']))? $jonoshokti_daoyat['sod_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_gpa5" data-title="Enter"><?php echo $sod_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['sod_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $sod_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['sod_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_business" data-title="Enter"><?php echo $sod_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_business']))? $jonoshokti_daoyat['sod_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_pi" data-title="Enter"><?php echo $sod_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_pi']))? $jonoshokti_daoyat['sod_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_mi" data-title="Enter"><?php echo $sod_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_mi']))? $jonoshokti_daoyat['sod_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_tc" data-title="Enter"><?php echo $sod_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_tc']))? $jonoshokti_daoyat['sod_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_brbib_etrmets_iht" data-title="Enter"><?php echo $sod_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['sod_brbib_etrmets_iht']))? $jonoshokti_daoyat['sod_brbib_etrmets_iht']:'' ?></a>
                                </td>
                               

                                <td class="tg-0pky  type_7">
                                    নবীন বরণ
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nb_s" data-title="Enter"><?php echo $nb_s=  (isset( $jonoshokti_daoyat['nb_s']))? $jonoshokti_daoyat['nb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nb_upth" data-title="Enter"><?php echo $nb_upth=  (isset( $jonoshokti_daoyat['nb_upth']))? $jonoshokti_daoyat['nb_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                ক্যারিয়ার কাউন্সেলিং
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kyrkusl_s" data-title="Enter"><?php echo $kyrkusl_s=  (isset( $jonoshokti_daoyat['kyrkusl_s']))? $jonoshokti_daoyat['kyrkusl_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kyrkusl_upth" data-title="Enter"><?php echo $kyrkusl_upth=  (isset( $jonoshokti_daoyat['kyrkusl_upth']))? $jonoshokti_daoyat['kyrkusl_upth']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">প্রশ্নপত্র </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_bms" data-title="Enter"><?php echo $ppt_bms=  (isset( $jonoshokti_daoyat['ppt_bms']))? $jonoshokti_daoyat['ppt_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_mbr" data-title="Enter"><?php echo $ppt_mbr=  (isset( $jonoshokti_daoyat['ppt_mbr']))? $jonoshokti_daoyat['ppt_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_hossh_bgos" data-title="Enter"><?php echo $ppt_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['ppt_brbib_hossh_bgos']))? $jonoshokti_daoyat['ppt_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_hossh_kbgos" data-title="Enter"><?php echo $ppt_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['ppt_brbib_hossh_kbgos']))? $jonoshokti_daoyat['ppt_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_gpa5" data-title="Enter"><?php echo $ppt_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['ppt_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $ppt_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['ppt_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_business" data-title="Enter"><?php echo $ppt_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_business']))? $jonoshokti_daoyat['ppt_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_pi" data-title="Enter"><?php echo $ppt_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_pi']))? $jonoshokti_daoyat['ppt_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_mi" data-title="Enter"><?php echo $ppt_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_mi']))? $jonoshokti_daoyat['ppt_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_tc" data-title="Enter"><?php echo $ppt_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_tc']))? $jonoshokti_daoyat['ppt_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppt_brbib_etrmets_iht" data-title="Enter"><?php echo $ppt_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['ppt_brbib_etrmets_iht']))? $jonoshokti_daoyat['ppt_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                শিক্ষাসফর
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkhasof_s" data-title="Enter"><?php echo $shkhasof_s=  (isset( $jonoshokti_daoyat['shkhasof_s']))? $jonoshokti_daoyat['shkhasof_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkhasof_upth" data-title="Enter"><?php echo $shkhasof_upth=  (isset( $jonoshokti_daoyat['shkhasof_upth']))? $jonoshokti_daoyat['shkhasof_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                ক্যারিয়ার গাইডলাইন
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kyrgdln_s" data-title="Enter"><?php echo $kyrgdln_s=  (isset( $jonoshokti_daoyat['kyrgdln_s']))? $jonoshokti_daoyat['kyrgdln_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kyrgdln_upth" data-title="Enter"><?php echo $kyrgdln_upth=  (isset( $jonoshokti_daoyat['kyrgdln_upth']))? $jonoshokti_daoyat['kyrgdln_upth']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">আবেদনপত্র  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_bms" data-title="Enter"><?php echo $abnp_bms=  (isset( $jonoshokti_daoyat['abnp_bms']))? $jonoshokti_daoyat['abnp_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_mbr" data-title="Enter"><?php echo $abnp_mbr=  (isset( $jonoshokti_daoyat['abnp_mbr']))? $jonoshokti_daoyat['abnp_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_hossh_bgos" data-title="Enter"><?php echo $abnp_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['abnp_brbib_hossh_bgos']))? $jonoshokti_daoyat['abnp_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_hossh_kbgos" data-title="Enter"><?php echo $abnp_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['abnp_brbib_hossh_kbgos']))? $jonoshokti_daoyat['abnp_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_gpa5" data-title="Enter"><?php echo $abnp_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['abnp_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $abnp_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['abnp_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_business" data-title="Enter"><?php echo $abnp_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_business']))? $jonoshokti_daoyat['abnp_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_pi" data-title="Enter"><?php echo $abnp_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_pi']))? $jonoshokti_daoyat['abnp_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_mi" data-title="Enter"><?php echo $abnp_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_mi']))? $jonoshokti_daoyat['abnp_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_tc" data-title="Enter"><?php echo $abnp_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_tc']))? $jonoshokti_daoyat['abnp_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abnp_brbib_etrmets_iht" data-title="Enter"><?php echo $abnp_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['abnp_brbib_etrmets_iht']))? $jonoshokti_daoyat['abnp_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                কৃতি ছাত্র সংবর্ধনা
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="krchsbdhn_s" data-title="Enter"><?php echo $krchsbdhn_s=  (isset( $jonoshokti_daoyat['krchsbdhn_s']))? $jonoshokti_daoyat['krchsbdhn_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="krchsbdhn_upth" data-title="Enter"><?php echo $krchsbdhn_upth=  (isset( $jonoshokti_daoyat['krchsbdhn_upth']))? $jonoshokti_daoyat['krchsbdhn_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                ক্রিয়েটিভ সার্চিং প্রোগ্রাম 
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kytvtscpgm_s" data-title="Enter"><?php echo $kytvtscpgm_s=  (isset( $jonoshokti_daoyat['kytvtscpgm_s']))? $jonoshokti_daoyat['kytvtscpgm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kytvtscpgm_upth" data-title="Enter"><?php echo $kytvtscpgm_upth=  (isset( $jonoshokti_daoyat['kytvtscpgm_upth']))? $jonoshokti_daoyat['kytvtscpgm_upth']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bms" data-title="Enter"><?php echo $sat_bms=  (isset( $jonoshokti_daoyat['sat_bms']))? $jonoshokti_daoyat['sat_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mbr" data-title="Enter"><?php echo $sat_mbr=  (isset( $jonoshokti_daoyat['sat_mbr']))? $jonoshokti_daoyat['sat_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_hossh_bgos" data-title="Enter"><?php echo $sat_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['sat_brbib_hossh_bgos']))? $jonoshokti_daoyat['sat_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_hossh_kbgos" data-title="Enter"><?php echo $sat_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['sat_brbib_hossh_kbgos']))? $jonoshokti_daoyat['sat_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_etrmets_gpa5" data-title="Enter"><?php echo $sat_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['sat_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $sat_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['sat_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_etrmets_business" data-title="Enter"><?php echo $sat_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_business']))? $jonoshokti_daoyat['sat_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_hossh_bgos" data-title="Enter"><?php echo $sat_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_pi']))? $jonoshokti_daoyat['sat_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_etrmets_mi" data-title="Enter"><?php echo $sat_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_mi']))? $jonoshokti_daoyat['sat_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_etrmets_tc" data-title="Enter"><?php echo $sat_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_tc']))? $jonoshokti_daoyat['sat_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_brbib_etrmets_iht" data-title="Enter"><?php echo $sat_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['sat_brbib_etrmets_iht']))? $jonoshokti_daoyat['sat_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                কুইজ প্রতিযোগিতা 
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="qugpjt_s" data-title="Enter"><?php echo $qugpjt_s=  (isset( $jonoshokti_daoyat['qugpjt_s']))? $jonoshokti_daoyat['qugpjt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="qugpjt_upth" data-title="Enter"><?php echo $qugpjt_upth=  (isset( $jonoshokti_daoyat['qugpjt_upth']))? $jonoshokti_daoyat['qugpjt_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                সায়েন্স অলিম্পিয়াড
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="scopyd_s" data-title="Enter"><?php echo $scopyd_s=  (isset( $jonoshokti_daoyat['scopyd_s']))? $jonoshokti_daoyat['scopyd_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="scopyd_upth" data-title="Enter"><?php echo $scopyd_upth=  (isset( $jonoshokti_daoyat['scopyd_upth']))? $jonoshokti_daoyat['scopyd_upth']:'' ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> সাথী প্রার্থী 	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_bms" data-title="Enter"><?php echo $satprth_bms=  (isset( $jonoshokti_daoyat['satprth_bms']))? $jonoshokti_daoyat['satprth_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_mbr" data-title="Enter"><?php echo $satprth_mbr=  (isset( $jonoshokti_daoyat['satprth_mbr']))? $jonoshokti_daoyat['satprth_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_hossh_bgos" data-title="Enter"><?php echo $satprth_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['satprth_brbib_hossh_bgos']))? $jonoshokti_daoyat['satprth_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_hossh_kbgos" data-title="Enter"><?php echo $satprth_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['satprth_brbib_hossh_kbgos']))? $jonoshokti_daoyat['satprth_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_gpa5" data-title="Enter"><?php echo $satprth_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['satprth_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $satprth_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['satprth_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_business" data-title="Enter"><?php echo $satprth_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_business']))? $jonoshokti_daoyat['satprth_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_pi" data-title="Enter"><?php echo $satprth_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_pi']))? $jonoshokti_daoyat['satprth_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_mi" data-title="Enter"><?php echo $satprth_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_mi']))? $jonoshokti_daoyat['satprth_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_tc" data-title="Enter"><?php echo $satprth_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_tc']))? $jonoshokti_daoyat['satprth_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satprth_brbib_etrmets_iht" data-title="Enter"><?php echo $satprth_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['satprth_brbib_etrmets_iht']))? $jonoshokti_daoyat['satprth_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky  type_7">
                                অদম্য সংবর্ধনা
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="odmsbdh_s" data-title="Enter"><?php echo $odmsbdh_s=  (isset( $jonoshokti_daoyat['odmsbdh_s']))? $jonoshokti_daoyat['odmsbdh_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="odmsbdh_upth" data-title="Enter"><?php echo $odmsbdh_upth=  (isset( $jonoshokti_daoyat['odmsbdh_upth']))? $jonoshokti_daoyat['odmsbdh_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                ম্যাথ অলিম্পিয়াড
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mthopyd_s" data-title="Enter"><?php echo $mthopyd_s=  (isset( $jonoshokti_daoyat['mthopyd_s']))? $jonoshokti_daoyat['mthopyd_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mthopyd_upth" data-title="Enter"><?php echo $mthopyd_upth=  (isset( $jonoshokti_daoyat['mthopyd_upth']))? $jonoshokti_daoyat['mthopyd_upth']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">কর্মী   </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bms" data-title="Enter"><?php echo $kor_bms=  (isset( $jonoshokti_daoyat['kor_bms']))? $jonoshokti_daoyat['kor_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mbr" data-title="Enter"><?php echo $kor_mbr=  (isset( $jonoshokti_daoyat['kor_mbr']))? $jonoshokti_daoyat['kor_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_hossh_bgos" data-title="Enter"><?php echo $kor_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['kor_brbib_hossh_bgos']))? $jonoshokti_daoyat['kor_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_hossh_kbgos" data-title="Enter"><?php echo $kor_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['kor_brbib_hossh_kbgos']))? $jonoshokti_daoyat['kor_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_gpa5" data-title="Enter"><?php echo $kor_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['kor_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $kor_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['kor_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_business" data-title="Enter"><?php echo $kor_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_business']))? $jonoshokti_daoyat['kor_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_pi" data-title="Enter"><?php echo $kor_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_pi']))? $jonoshokti_daoyat['kor_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_mi" data-title="Enter"><?php echo $kor_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_mi']))? $jonoshokti_daoyat['kor_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_tc" data-title="Enter"><?php echo $kor_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_tc']))? $jonoshokti_daoyat['kor_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_brbib_etrmets_iht" data-title="Enter"><?php echo $kor_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['kor_brbib_etrmets_iht']))? $jonoshokti_daoyat['kor_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                বিতর্ক প্রতিযোগিতা 
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="btkpjta_s" data-title="Enter"><?php echo $btkpjta_s=  (isset( $jonoshokti_daoyat['btkpjta_s']))? $jonoshokti_daoyat['btkpjta_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="btkpjta_upth" data-title="Enter"><?php echo $btkpjta_upth=  (isset( $jonoshokti_daoyat['btkpjta_upth']))? $jonoshokti_daoyat['btkpjta_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                মডেল টেস্ট
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mdtst_s" data-title="Enter"><?php echo $mdtst_s=  (isset( $jonoshokti_daoyat['mdtst_s']))? $jonoshokti_daoyat['mdtst_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mdtst_upth" data-title="Enter"><?php echo $mdtst_upth=  (isset( $jonoshokti_daoyat['mdtst_upth']))? $jonoshokti_daoyat['mdtst_upth']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bms" data-title="Enter"><?php echo $som_bms=  (isset( $jonoshokti_daoyat['som_bms']))? $jonoshokti_daoyat['som_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mbr" data-title="Enter"><?php echo $som_mbr=  (isset( $jonoshokti_daoyat['som_mbr']))? $jonoshokti_daoyat['som_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_hossh_bgos" data-title="Enter"><?php echo $som_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['som_brbib_hossh_bgos']))? $jonoshokti_daoyat['som_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_hossh_kbgos" data-title="Enter"><?php echo $som_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['som_brbib_hossh_kbgos']))? $jonoshokti_daoyat['som_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_gpa5" data-title="Enter"><?php echo $som_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['som_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $som_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['som_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_business" data-title="Enter"><?php echo $som_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_business']))? $jonoshokti_daoyat['som_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_pi" data-title="Enter"><?php echo $som_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_pi']))? $jonoshokti_daoyat['som_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_mi" data-title="Enter"><?php echo $som_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_mi']))? $jonoshokti_daoyat['som_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_tc" data-title="Enter"><?php echo $som_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_tc']))? $jonoshokti_daoyat['som_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_brbib_etrmets_iht" data-title="Enter"><?php echo $som_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['som_brbib_etrmets_iht']))? $jonoshokti_daoyat['som_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                ক্রীড়া প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="krpjta_s" data-title="Enter"><?php echo $krpjta_s=  (isset( $jonoshokti_daoyat['krpjta_s']))? $jonoshokti_daoyat['krpjta_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="krpjta_upth" data-title="Enter"><?php echo $krpjta_upth=  (isset( $jonoshokti_daoyat['krpjta_upth']))? $jonoshokti_daoyat['krpjta_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                ভাষা শিক্ষা কোর্স
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vsshkak_s" data-title="Enter"><?php echo $vsshkak_s=  (isset( $jonoshokti_daoyat['vsshkak_s']))? $jonoshokti_daoyat['vsshkak_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vsshkak_upth" data-title="Enter"><?php echo $vsshkak_upth=  (isset( $jonoshokti_daoyat['vsshkak_upth']))? $jonoshokti_daoyat['vsshkak_upth']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_bms" data-title="Enter"><?php echo $bondu_bms=  (isset( $jonoshokti_daoyat['bondu_bms']))? $jonoshokti_daoyat['bondu_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_mbr" data-title="Enter"><?php echo $bondu_mbr=  (isset( $jonoshokti_daoyat['bondu_mbr']))? $jonoshokti_daoyat['bondu_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_hossh_bgos" data-title="Enter"><?php echo $bondu_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['bondu_brbib_hossh_bgos']))? $jonoshokti_daoyat['bondu_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_hossh_kbgos" data-title="Enter"><?php echo $bondu_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['bondu_brbib_hossh_kbgos']))? $jonoshokti_daoyat['bondu_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_gpa5" data-title="Enter"><?php echo $bondu_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['bondu_brbib_etrmets_gpa5']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $bondu_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['bondu_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_business" data-title="Enter"><?php echo $bondu_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_business']))? $jonoshokti_daoyat['bondu_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_pi" data-title="Enter"><?php echo $bondu_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_pi']))? $jonoshokti_daoyat['bondu_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_mi" data-title="Enter"><?php echo $bondu_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_mi']))? $jonoshokti_daoyat['bondu_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_tc" data-title="Enter"><?php echo $bondu_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_tc']))? $jonoshokti_daoyat['bondu_brbib_etrmets_tc']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_brbib_etrmets_iht" data-title="Enter"><?php echo $bondu_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['bondu_brbib_etrmets_iht']))? $jonoshokti_daoyat['bondu_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                টুর্নামেন্ট 
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tunmnt_s" data-title="Enter"><?php echo $tunmnt_s=  (isset( $jonoshokti_daoyat['tunmnt_s']))? $jonoshokti_daoyat['tunmnt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tunmnt_upth" data-title="Enter"><?php echo $tunmnt_upth=  (isset( $jonoshokti_daoyat['tunmnt_upth']))? $jonoshokti_daoyat['tunmnt_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                অন্যান্য
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_s" data-title="Enter"><?php echo $onnoanno_s=  (isset( $jonoshokti_daoyat['onnoanno_s']))? $jonoshokti_daoyat['onnoanno_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_upth" data-title="Enter"><?php echo $onnoanno_upth=  (isset( $jonoshokti_daoyat['onnoanno_upth']))? $jonoshokti_daoyat['onnoanno_upth']:'' ?></a>
                                </td>
                                
                            </tr>
                            <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_bms" data-title="Enter"><?php echo $upsh_bms=  (isset( $jonoshokti_daoyat['upsh_bms']))? $jonoshokti_daoyat['upsh_bms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_mbr" data-title="Enter"><?php echo $upsh_mbr=  (isset( $jonoshokti_daoyat['upsh_mbr']))? $jonoshokti_daoyat['upsh_mbr']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_hossh_bgos" data-title="Enter"><?php echo $upsh_brbib_hossh_bgos=  (isset( $jonoshokti_daoyat['upsh_brbib_hossh_bgos']))? $jonoshokti_daoyat['upsh_brbib_hossh_bgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_hossh_kbgos" data-title="Enter"><?php echo $upsh_brbib_hossh_kbgos=  (isset( $jonoshokti_daoyat['upsh_brbib_hossh_kbgos']))? $jonoshokti_daoyat['upsh_brbib_hossh_kbgos']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_gpa5" data-title="Enter"><?php echo $upsh_brbib_etrmets_gpa5=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_gpa5']))? $jonoshokti_daoyat['upsh_brbib_etrmets_gpa5']:'' ?></a>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_5gpa4" data-title="Enter"><?php echo $upsh_brbib_etrmets_5gpa4=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_5gpa4']))? $jonoshokti_daoyat['upsh_brbib_etrmets_5gpa4']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_business" data-title="Enter"><?php echo $upsh_brbib_etrmets_business=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_business']))? $jonoshokti_daoyat['upsh_brbib_etrmets_business']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_pi" data-title="Enter"><?php echo $upsh_brbib_etrmets_pi=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_pi']))? $jonoshokti_daoyat['upsh_brbib_etrmets_pi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_mi" data-title="Enter"><?php echo $upsh_brbib_etrmets_mi=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_mi']))? $jonoshokti_daoyat['upsh_brbib_etrmets_mi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_tc" data-title="Enter"><?php echo $upsh_brbib_etrmets_tc=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_tc']))? $jonoshokti_daoyat['upsh_brbib_etrmets_tc']:'' ?></a>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsh_brbib_etrmets_iht" data-title="Enter"><?php echo $upsh_brbib_etrmets_iht=  (isset( $jonoshokti_daoyat['upsh_brbib_etrmets_iht']))? $jonoshokti_daoyat['upsh_brbib_etrmets_iht']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                দিবস পালন
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dbspln_s" data-title="Enter"><?php echo $dbspln_s=  (isset( $jonoshokti_daoyat['dbspln_s']))? $jonoshokti_daoyat['dbspln_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_daoyat" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dbspln_upth" data-title="Enter"><?php echo $dbspln_upth=  (isset( $jonoshokti_daoyat['dbspln_upth']))? $jonoshokti_daoyat['dbspln_upth']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10" >
                                
                                </td>
                                <td class="tg-0pky  type_11">
                                
                                </td>
                                <td class="tg-0pky  type_12">
                                
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
