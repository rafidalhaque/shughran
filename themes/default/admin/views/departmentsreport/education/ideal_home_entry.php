<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আইডিয়াল হোমঃ(একাডেমিক ও প্রফেশনাল)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            <a href="<?= admin_url('departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika-create') ?>"  class="icon fa fa-plus tip" data-placement="left" title="<?= lang("actions") ?>"></a>
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
                            <li><a href="<?= admin_url('departmentsreport/ideal-home') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ideal-home/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">আইডিয়াল হোমের ধরণ</td>
                                <td class="tg-pwj7" colspan="4" style="text-align:center">হোম সংখ্যা </td>
                                <td class="tg-pwj7" colspan="4" style="text-align:center">ছাত্র সংখ্যা  </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>পূর্বের সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>
                                <td class="tg-pwj7 "><div><span>পূর্বের সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>বর্তমান সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>
                               
                            </tr>

                            <?php
                            $pk = (isset($ideal_home['id']))?$ideal_home['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1">এসএসসি/দাখিল পরীক্ষার্থী	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_hn_bn" data-title="Enter"><?php echo $sdp_hn_bn=  (isset( $ideal_home['sdp_hn_bn']))? $ideal_home['sdp_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_hn_pn" data-title="Enter"><?php echo $sdp_hn_pn= (isset( $ideal_home['sdp_hn_pn']))? $ideal_home['sdp_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_hn_briddhi" data-title="Enter"><?php echo $sdp_hn_briddhi= (isset( $ideal_home['sdp_hn_briddhi']))? $ideal_home['sdp_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_hn_ghatti" data-title="Enter"><?php echo $sdp_hn_ghatti=(isset( $ideal_home['sdp_hn_ghatti']))? $ideal_home['sdp_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_sn_bn" data-title="Enter"><?php echo $sdp_sn_bn= (isset( $ideal_home['sdp_sn_bn']))? $ideal_home['sdp_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_sn_pn" data-title="Enter"><?php echo $sdp_sn_pn=(isset( $ideal_home['sdp_sn_pn']))? $ideal_home['sdp_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_sn_briddhi" data-title="Enter"><?php echo $sdp_sn_briddhi= (isset( $ideal_home['sdp_sn_briddhi']))? $ideal_home['sdp_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdp_sn_ghatti" data-title="Enter"><?php echo $sdp_sn_ghatti= (isset( $ideal_home['sdp_sn_ghatti']))? $ideal_home['sdp_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">নিয়মিত এইচএসসি/আলিম পরীক্ষার্থী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_hn_bn" data-title="Enter"><?php echo $nhap_hn_bn= (isset( $ideal_home['nhap_hn_bn']))? $ideal_home['nhap_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_hn_pn" data-title="Enter"><?php echo $nhap_hn_pn= (isset( $ideal_home['nhap_hn_pn']))? $ideal_home['nhap_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_hn_briddhi" data-title="Enter"><?php echo $nhap_hn_briddhi= (isset( $ideal_home['nhap_hn_briddhi']))? $ideal_home['nhap_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_hn_ghatti" data-title="Enter"><?php echo $nhap_hn_ghatti=(isset( $ideal_home['nhap_hn_ghatti']))? $ideal_home['nhap_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_sn_bn" data-title="Enter"><?php echo $nhap_sn_bn= (isset( $ideal_home['nhap_sn_bn']))? $ideal_home['nhap_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_sn_pn" data-title="Enter"><?php echo $nhap_sn_pn= (isset( $ideal_home['nhap_sn_pn']))? $ideal_home['nhap_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_sn_briddhi" data-title="Enter"><?php echo $nhap_sn_briddhi= (isset( $ideal_home['nhap_sn_briddhi']))? $ideal_home['nhap_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nhap_sn_ghatti" data-title="Enter"><?php echo $nhap_sn_ghatti=(isset( $ideal_home['nhap_sn_ghatti']))? $ideal_home['nhap_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">মেডিকেলে ভর্তিচ্ছু </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_hn_bn" data-title="Enter"><?php echo $mv_hn_bn=(isset( $ideal_home['mv_hn_bn']))? $ideal_home['mv_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_hn_pn" data-title="Enter"><?php echo $mv_hn_pn= (isset( $ideal_home['mv_hn_pn']))? $ideal_home['mv_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_hn_briddhi" data-title="Enter"><?php echo $mv_hn_briddhi= (isset( $ideal_home['mv_hn_briddhi']))? $ideal_home['mv_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_hn_ghatti" data-title="Enter"><?php echo $mv_hn_ghatti= (isset( $ideal_home['mv_hn_ghatti']))? $ideal_home['mv_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_sn_bn" data-title="Enter"><?php echo $mv_sn_bn= (isset( $ideal_home['mv_sn_bn']))? $ideal_home['mv_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_sn_pn" data-title="Enter"><?php echo $mv_sn_pn =(isset( $ideal_home['mv_sn_pn']))? $ideal_home['mv_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_sn_briddhi" data-title="Enter"><?php echo $mv_sn_briddhi= (isset( $ideal_home['mv_sn_briddhi']))? $ideal_home['mv_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_sn_ghatti" data-title="Enter"><?php echo $mv_sn_ghatti=(isset( $ideal_home['mv_sn_ghatti']))? $ideal_home['mv_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ইঞ্জিনিয়ারিং ভর্তিচ্ছু </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_hn_bn" data-title="Enter"><?php echo $ev_hn_bn= (isset( $ideal_home['ev_hn_bn']))? $ideal_home['ev_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_hn_pn" data-title="Enter"><?php echo $ev_hn_pn=(isset( $ideal_home['ev_hn_pn']))? $ideal_home['ev_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_hn_briddhi" data-title="Enter"><?php echo $ev_hn_briddhi= (isset( $ideal_home['ev_hn_briddhi']))? $ideal_home['ev_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_hn_ghatti" data-title="Enter"><?php echo $ev_hn_ghatti=(isset( $ideal_home['ev_hn_ghatti']))? $ideal_home['ev_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_sn_bn" data-title="Enter"><?php echo $ev_sn_bn=(isset( $ideal_home['ev_sn_bn']))? $ideal_home['ev_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_sn_pn" data-title="Enter"><?php echo $ev_sn_pn=(isset( $ideal_home['ev_sn_pn']))? $ideal_home['ev_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_sn_briddhi" data-title="Enter"><?php echo $ev_sn_briddhi=(isset( $ideal_home['ev_sn_briddhi']))? $ideal_home['ev_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ev_sn_ghatti" data-title="Enter"><?php echo $ev_sn_ghatti=(isset( $ideal_home['ev_sn_ghatti']))? $ideal_home['ev_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বিশ্ববিদ্যালয় ভর্তিচ্ছু </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_hn_bn" data-title="Enter"><?php echo $uv_hn_bn= (isset( $ideal_home['uv_hn_bn']))? $ideal_home['uv_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_hn_pn" data-title="Enter"><?php echo $uv_hn_pn= (isset( $ideal_home['uv_hn_pn']))? $ideal_home['uv_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_hn_briddhi" data-title="Enter"><?php echo $uv_hn_briddhi=(isset( $ideal_home['uv_hn_briddhi']))? $ideal_home['uv_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_hn_ghatti" data-title="Enter"><?php echo $uv_hn_ghatti=(isset( $ideal_home['uv_hn_ghatti']))? $ideal_home['uv_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_sn_bn" data-title="Enter"><?php echo $uv_sn_bn=(isset( $ideal_home['uv_sn_bn']))? $ideal_home['uv_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_sn_pn" data-title="Enter"><?php echo $uv_sn_pn= (isset( $ideal_home['uv_sn_pn']))? $ideal_home['uv_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_sn_briddhi" data-title="Enter"><?php echo $uv_sn_briddhi=(isset( $ideal_home['uv_sn_briddhi']))? $ideal_home['uv_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="uv_sn_ghatti" data-title="Enter"><?php echo $uv_sn_ghatti=(isset( $ideal_home['uv_sn_ghatti']))? $ideal_home['uv_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যাডেট কলেজ ভর্তিচ্ছু </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_hn_bn" data-title="Enter"><?php echo $ccv_hn_bn= (isset( $ideal_home['ccv_hn_bn']))? $ideal_home['ccv_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_hn_pn" data-title="Enter"><?php echo $ccv_hn_pn=(isset( $ideal_home['ccv_hn_pn']))? $ideal_home['ccv_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_hn_briddhi" data-title="Enter"><?php echo $ccv_hn_briddhi= (isset( $ideal_home['ccv_hn_briddhi']))? $ideal_home['ccv_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_hn_ghatti" data-title="Enter"><?php echo $ccv_hn_ghatti=(isset( $ideal_home['ccv_hn_ghatti']))? $ideal_home['ccv_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_sn_bn" data-title="Enter"><?php echo $ccv_sn_bn= (isset( $ideal_home['ccv_sn_bn']))? $ideal_home['ccv_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_sn_pn" data-title="Enter"><?php echo $ccv_sn_pn=(isset( $ideal_home['ccv_sn_pn']))? $ideal_home['ccv_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_sn_briddhi" data-title="Enter"><?php echo $ccv_sn_briddhi=(isset( $ideal_home['ccv_sn_briddhi']))? $ideal_home['ccv_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ccv_sn_ghatti" data-title="Enter"><?php echo $ccv_sn_ghatti= (isset( $ideal_home['ccv_sn_ghatti']))? $ideal_home['ccv_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">অনার্সের নিয়মিত ছাত্রদের নিয়ে </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_hn_bn" data-title="Enter"><?php echo $hnsn_hn_bn = (isset( $ideal_home['hnsn_hn_bn']))? $ideal_home['hnsn_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_hn_pn" data-title="Enter"><?php echo $hnsn_hn_pn=(isset( $ideal_home['hnsn_hn_pn']))? $ideal_home['hnsn_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_hn_briddhi" data-title="Enter"><?php echo $hnsn_hn_briddhi=(isset( $ideal_home['hnsn_hn_briddhi']))? $ideal_home['hnsn_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_hn_ghatti" data-title="Enter"><?php echo $hnsn_hn_ghatti=(isset( $ideal_home['hnsn_hn_ghatti']))? $ideal_home['hnsn_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_sn_bn" data-title="Enter"><?php echo $hnsn_sn_bn=(isset( $ideal_home['hnsn_sn_bn']))? $ideal_home['hnsn_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_sn_pn" data-title="Enter"><?php echo $hnsn_sn_pn=(isset( $ideal_home['hnsn_sn_pn']))? $ideal_home['hnsn_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_sn_briddhi" data-title="Enter"><?php echo $hnsn_sn_briddhi=(isset( $ideal_home['hnsn_sn_briddhi']))? $ideal_home['hnsn_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnsn_sn_ghatti" data-title="Enter"><?php echo $hnsn_sn_ghatti=(isset( $ideal_home['hnsn_sn_ghatti']))? $ideal_home['hnsn_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বিশ্ববিদ্যালয়ের শিক্ষক তৈরী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_hn_bn" data-title="Enter"><?php echo $ust_hn_bn=(isset( $ideal_home['ust_hn_bn']))? $ideal_home['ust_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_hn_pn" data-title="Enter"><?php echo $ust_hn_pn= (isset( $ideal_home['ust_hn_pn']))? $ideal_home['ust_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_hn_briddhi" data-title="Enter"><?php echo $ust_hn_briddhi= (isset( $ideal_home['ust_hn_briddhi']))? $ideal_home['ust_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_hn_ghatti" data-title="Enter"><?php echo $ust_hn_ghatti=(isset( $ideal_home['ust_hn_ghatti']))? $ideal_home['ust_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_sn_bn" data-title="Enter"><?php echo $ust_sn_bn=(isset( $ideal_home['ust_sn_bn']))? $ideal_home['ust_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_sn_pn" data-title="Enter"><?php echo $ust_sn_pn=(isset( $ideal_home['ust_sn_pn']))? $ideal_home['ust_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_sn_briddhi" data-title="Enter"><?php echo $ust_sn_briddhi=(isset( $ideal_home['ust_sn_briddhi']))? $ideal_home['ust_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ust_sn_ghatti" data-title="Enter"><?php echo $ust_sn_ghatti=(isset( $ideal_home['ust_sn_ghatti']))? $ideal_home['ust_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বিসিএস/বিজেএস পরীক্ষার্থীদের নিয়ে </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_hn_bn" data-title="Enter"><?php echo $bbpn_hn_bn= (isset( $ideal_home['bbpn_hn_bn']))? $ideal_home['bbpn_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_hn_pn" data-title="Enter"><?php echo $bbpn_hn_pn=(isset( $ideal_home['bbpn_hn_pn']))? $ideal_home['bbpn_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_hn_briddhi" data-title="Enter"><?php echo $bbpn_hn_briddhi=(isset( $ideal_home['bbpn_hn_briddhi']))? $ideal_home['bbpn_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_hn_ghatti" data-title="Enter"><?php echo $bbpn_hn_ghatti= (isset( $ideal_home['bbpn_hn_ghatti']))? $ideal_home['bbpn_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_sn_bn" data-title="Enter"><?php echo $bbpn_sn_bn=(isset( $ideal_home['bbpn_sn_bn']))? $ideal_home['bbpn_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_sn_pn" data-title="Enter"><?php echo $bbpn_sn_pn=(isset( $ideal_home['bbpn_sn_pn']))? $ideal_home['bbpn_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_sn_briddhi" data-title="Enter"><?php echo $bbpn_sn_briddhi=(isset( $ideal_home['bbpn_sn_briddhi']))? $ideal_home['bbpn_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbpn_sn_ghatti" data-title="Enter"><?php echo $bbpn_sn_ghatti=(isset( $ideal_home['bbpn_sn_ghatti']))? $ideal_home['bbpn_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ডিফেন্স নিয়োগ পরীক্ষার্থীদের নিয়ে </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_hn_bn" data-title="Enter"><?php echo $dnpn_hn_bn= (isset( $ideal_home['dnpn_hn_bn']))? $ideal_home['dnpn_hn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_hn_pn" data-title="Enter"><?php echo $dnpn_hn_pn=(isset( $ideal_home['dnpn_hn_pn']))? $ideal_home['dnpn_hn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_hn_briddhi" data-title="Enter"><?php echo $dnpn_hn_briddhi=(isset( $ideal_home['dnpn_hn_briddhi']))? $ideal_home['dnpn_hn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_hn_ghatti" data-title="Enter"><?php echo $dnpn_hn_ghatti=(isset( $ideal_home['dnpn_hn_ghatti']))? $ideal_home['dnpn_hn_ghatti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_sn_bn" data-title="Enter"><?php echo $dnpn_sn_bn=(isset( $ideal_home['dnpn_sn_bn']))? $ideal_home['dnpn_sn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_sn_pn" data-title="Enter"><?php echo $dnpn_sn_pn=(isset( $ideal_home['dnpn_sn_pn']))? $ideal_home['dnpn_sn_pn']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_sn_briddhi" data-title="Enter"><?php echo $dnpn_sn_briddhi=(isset( $ideal_home['dnpn_sn_briddhi']))? $ideal_home['dnpn_sn_briddhi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ideal_home" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dnpn_sn_ghatti" data-title="Enter"><?php echo $dnpn_sn_ghatti=(isset( $ideal_home['dnpn_sn_ghatti']))? $ideal_home['dnpn_sn_ghatti']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_hn_bn!=0)? $total_hn_bn=($sdp_hn_bn+$nhap_hn_bn+$mv_hn_bn+$ev_hn_bn+$uv_hn_bn+$ccv_hn_bn+$hnsn_hn_bn+$ust_hn_bn+$bbpn_hn_bn+$dnpn_hn_bn):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_hn_pn!=0)? $total_hn_pn=($sdp_hn_pn+$nhap_hn_pn+$mv_hn_pn+$ev_hn_pn+$uv_hn_pn+$ccv_hn_pn+$hnsn_hn_pn+$ust_hn_pn+$bbpn_hn_pn+$dnpn_hn_pn):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_hn_briddhi!=0)? $total_hn_briddhi=($sdp_hn_briddhi+$nhap_hn_briddhi+$mv_hn_briddhi+$ev_hn_briddhi+$uv_hn_briddhi+$ccv_hn_briddhi+$hnsn_hn_briddhi+$ust_hn_briddhi+$bbpn_hn_briddhi+$dnpn_hn_briddhi):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_hn_ghatti!=0)? $total_hn_ghatti=($sdp_hn_ghatti+$nhap_hn_ghatti+$mv_hn_ghatti+$ev_hn_ghatti+$uv_hn_ghatti+$ccv_hn_ghatti+$hnsn_hn_ghatti+$ust_hn_ghatti+$bbpn_hn_ghatti+$dnpn_hn_ghatti):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_sn_bn!=0)? $total_sn_bn=($sdp_sn_bn+$nhap_sn_bn+$mv_sn_bn+$ev_sn_bn+$uv_sn_bn+$ccv_sn_bn+$hnsn_sn_bn+$ust_sn_bn+$bbpn_sn_bn+$dnpn_sn_bn):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_sn_pn!=0)? $total_sn_pn=($sdp_sn_pn+$nhap_sn_pn+$mv_sn_pn+$ev_sn_pn+$uv_sn_pn+$ccv_sn_pn+$hnsn_sn_pn+$ust_sn_pn+$bbpn_sn_pn+$dnpn_sn_pn):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_sn_briddhi!=0)? $total_sn_briddhi=($sdp_sn_briddhi+$nhap_sn_briddhi+$mv_sn_briddhi+$ev_sn_briddhi+$uv_sn_briddhi+$ccv_sn_briddhi+$hnsn_sn_briddhi+$ust_sn_briddhi+$bbpn_sn_briddhi+$dnpn_sn_briddhi):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sdp_sn_ghatti!=0)? $total_sn_ghatti=($sdp_sn_ghatti+$nhap_sn_ghatti+$mv_sn_ghatti+$ev_sn_ghatti+$uv_sn_ghatti+$ccv_sn_ghatti+$hnsn_sn_ghatti+$ust_sn_ghatti+$bbpn_sn_ghatti+$dnpn_sn_ghatti):0?>
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
