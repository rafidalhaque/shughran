<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিতর্ক জনশক্তি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bitorko-jonosokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bitorko-jonosokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="3">পূর্ব  </td>
                                <td class="tg-pwj7" colspan="3">বর্তমান </td>
                                <td class="tg-pwj7" colspan="3">  বৃদ্ধি   </td>
                                <td class="tg-pwj7" colspan="3">ঘাটতি  </td>
                              
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>সদস্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী  </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী</span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                               
                            </tr>

                            <?php
                            $pk = (isset($bitarkik_jonoshokti['id']))?$bitarkik_jonoshokti['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> প্রশিক্ষক বিতার্কিক	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_pb_sod" data-title="Enter"><?php echo $pbk_pb_sod=  (isset( $bitarkik_jonoshokti['pbk_pb_sod']))? $bitarkik_jonoshokti['pbk_pb_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_pb_sat" data-title="Enter"><?php echo $pbk_pb_sat=  (isset( $bitarkik_jonoshokti['pbk_pb_sat']))? $bitarkik_jonoshokti['pbk_pb_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_pb_kor" data-title="Enter"><?php echo $pbk_pb_kor=  (isset( $bitarkik_jonoshokti['pbk_pb_kor']))? $bitarkik_jonoshokti['pbk_pb_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_bm_sod" data-title="Enter"><?php echo $pbk_bm_sod=  (isset( $bitarkik_jonoshokti['pbk_bm_sod']))? $bitarkik_jonoshokti['pbk_bm_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_bm_sat" data-title="Enter"><?php echo $pbk_bm_sat=  (isset( $bitarkik_jonoshokti['pbk_bm_sat']))? $bitarkik_jonoshokti['pbk_bm_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_bm_kor" data-title="Enter"><?php echo $pbk_bm_kor=  (isset( $bitarkik_jonoshokti['pbk_bm_kor']))? $bitarkik_jonoshokti['pbk_bm_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_br_sod" data-title="Enter"><?php echo $pbk_br_sod=  (isset( $bitarkik_jonoshokti['pbk_br_sod']))? $bitarkik_jonoshokti['pbk_br_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_br_sat" data-title="Enter"><?php echo $pbk_br_sat=  (isset( $bitarkik_jonoshokti['pbk_br_sat']))? $bitarkik_jonoshokti['pbk_br_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_br_kor" data-title="Enter"><?php echo $pbk_br_kor=  (isset( $bitarkik_jonoshokti['pbk_br_kor']))? $bitarkik_jonoshokti['pbk_br_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_ght_sod" data-title="Enter"><?php echo $pbk_ght_sod=  (isset( $bitarkik_jonoshokti['pbk_ght_sod']))? $bitarkik_jonoshokti['pbk_ght_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_ght_sat" data-title="Enter"><?php echo $pbk_ght_sat=  (isset( $bitarkik_jonoshokti['pbk_ght_sat']))? $bitarkik_jonoshokti['pbk_ght_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pbk_ght_kor" data-title="Enter"><?php echo $pbk_ght_kor=  (isset( $bitarkik_jonoshokti['pbk_ght_kor']))? $bitarkik_jonoshokti['pbk_ght_kor']:'' ?></a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">টেলিভিশন  বিতার্কিক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_pb_sod" data-title="Enter"><?php echo $tlvnbk_pb_sod=  (isset( $bitarkik_jonoshokti['tlvnbk_pb_sod']))? $bitarkik_jonoshokti['tlvnbk_pb_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_pb_sat" data-title="Enter"><?php echo $tlvnbk_pb_sat=  (isset( $bitarkik_jonoshokti['tlvnbk_pb_sat']))? $bitarkik_jonoshokti['tlvnbk_pb_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_pb_kor" data-title="Enter"><?php echo $tlvnbk_pb_kor=  (isset( $bitarkik_jonoshokti['tlvnbk_pb_kor']))? $bitarkik_jonoshokti['tlvnbk_pb_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_bm_sod" data-title="Enter"><?php echo $tlvnbk_bm_sod=  (isset( $bitarkik_jonoshokti['tlvnbk_bm_sod']))? $bitarkik_jonoshokti['tlvnbk_bm_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_bm_sat" data-title="Enter"><?php echo $tlvnbk_bm_sat=  (isset( $bitarkik_jonoshokti['tlvnbk_bm_sat']))? $bitarkik_jonoshokti['tlvnbk_bm_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_bm_kor" data-title="Enter"><?php echo $tlvnbk_bm_kor=  (isset( $bitarkik_jonoshokti['tlvnbk_bm_kor']))? $bitarkik_jonoshokti['tlvnbk_bm_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_br_sod" data-title="Enter"><?php echo $tlvnbk_br_sod=  (isset( $bitarkik_jonoshokti['tlvnbk_br_sod']))? $bitarkik_jonoshokti['tlvnbk_br_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_br_sat" data-title="Enter"><?php echo $tlvnbk_br_sat=  (isset( $bitarkik_jonoshokti['tlvnbk_br_sat']))? $bitarkik_jonoshokti['tlvnbk_br_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_br_kor" data-title="Enter"><?php echo $tlvnbk_br_kor=  (isset( $bitarkik_jonoshokti['tlvnbk_br_kor']))? $bitarkik_jonoshokti['tlvnbk_br_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_ght_sod" data-title="Enter"><?php echo $tlvnbk_ght_sod=  (isset( $bitarkik_jonoshokti['tlvnbk_ght_sod']))? $bitarkik_jonoshokti['tlvnbk_ght_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_ght_sat" data-title="Enter"><?php echo $tlvnbk_ght_sat=  (isset( $bitarkik_jonoshokti['tlvnbk_ght_sat']))? $bitarkik_jonoshokti['tlvnbk_ght_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tlvnbk_ght_kor" data-title="Enter"><?php echo $tlvnbk_ght_kor=  (isset( $bitarkik_jonoshokti['tlvnbk_ght_kor']))? $bitarkik_jonoshokti['tlvnbk_ght_kor']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">জাতীয় বিতার্কিক</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_pb_sod" data-title="Enter"><?php echo $jtobk_pb_sod=  (isset( $bitarkik_jonoshokti['jtobk_pb_sod']))? $bitarkik_jonoshokti['jtobk_pb_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_pb_sat" data-title="Enter"><?php echo $jtobk_pb_sat=  (isset( $bitarkik_jonoshokti['jtobk_pb_sat']))? $bitarkik_jonoshokti['jtobk_pb_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_pb_kor" data-title="Enter"><?php echo $jtobk_pb_kor=  (isset( $bitarkik_jonoshokti['jtobk_pb_kor']))? $bitarkik_jonoshokti['jtobk_pb_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_bm_sod" data-title="Enter"><?php echo $jtobk_bm_sod=  (isset( $bitarkik_jonoshokti['jtobk_bm_sod']))? $bitarkik_jonoshokti['jtobk_bm_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_bm_sat" data-title="Enter"><?php echo $jtobk_bm_sat=  (isset( $bitarkik_jonoshokti['jtobk_bm_sat']))? $bitarkik_jonoshokti['jtobk_bm_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_bm_kor" data-title="Enter"><?php echo $jtobk_bm_kor=  (isset( $bitarkik_jonoshokti['jtobk_bm_kor']))? $bitarkik_jonoshokti['jtobk_bm_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_br_sod" data-title="Enter"><?php echo $jtobk_br_sod=  (isset( $bitarkik_jonoshokti['jtobk_br_sod']))? $bitarkik_jonoshokti['jtobk_br_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_br_sat" data-title="Enter"><?php echo $jtobk_br_sat=  (isset( $bitarkik_jonoshokti['jtobk_br_sat']))? $bitarkik_jonoshokti['jtobk_br_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_br_kor" data-title="Enter"><?php echo $jtobk_br_kor=  (isset( $bitarkik_jonoshokti['jtobk_br_kor']))? $bitarkik_jonoshokti['jtobk_br_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_ght_sod" data-title="Enter"><?php echo $jtobk_ght_sod=  (isset( $bitarkik_jonoshokti['jtobk_ght_sod']))? $bitarkik_jonoshokti['jtobk_ght_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_ght_sat" data-title="Enter"><?php echo $jtobk_ght_sat=  (isset( $bitarkik_jonoshokti['jtobk_ght_sat']))? $bitarkik_jonoshokti['jtobk_ght_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jtobk_ght_kor" data-title="Enter"><?php echo $jtobk_ght_kor=  (isset( $bitarkik_jonoshokti['jtobk_ght_kor']))? $bitarkik_jonoshokti['jtobk_ght_kor']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বিতার্কিক  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_pb_sod" data-title="Enter"><?php echo $bk_pb_sod=  (isset( $bitarkik_jonoshokti['bk_pb_sod']))? $bitarkik_jonoshokti['bk_pb_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_pb_sat" data-title="Enter"><?php echo $bk_pb_sat=  (isset( $bitarkik_jonoshokti['bk_pb_sat']))? $bitarkik_jonoshokti['bk_pb_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_pb_kor" data-title="Enter"><?php echo $bk_pb_kor=  (isset( $bitarkik_jonoshokti['bk_pb_kor']))? $bitarkik_jonoshokti['bk_pb_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_bm_sod" data-title="Enter"><?php echo $bk_bm_sod=  (isset( $bitarkik_jonoshokti['bk_bm_sod']))? $bitarkik_jonoshokti['bk_bm_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_bm_sat" data-title="Enter"><?php echo $bk_bm_sat=  (isset( $bitarkik_jonoshokti['bk_bm_sat']))? $bitarkik_jonoshokti['bk_bm_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_bm_kor" data-title="Enter"><?php echo $bk_bm_kor=  (isset( $bitarkik_jonoshokti['bk_bm_kor']))? $bitarkik_jonoshokti['bk_bm_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_br_sod" data-title="Enter"><?php echo $bk_br_sod=  (isset( $bitarkik_jonoshokti['bk_br_sod']))? $bitarkik_jonoshokti['bk_br_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_br_sat" data-title="Enter"><?php echo $bk_br_sat=  (isset( $bitarkik_jonoshokti['bk_br_sat']))? $bitarkik_jonoshokti['bk_br_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_br_kor" data-title="Enter"><?php echo $bk_br_kor=  (isset( $bitarkik_jonoshokti['bk_br_kor']))? $bitarkik_jonoshokti['bk_br_kor']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_ght_sod" data-title="Enter"><?php echo $bk_ght_sod=  (isset( $bitarkik_jonoshokti['bk_ght_sod']))? $bitarkik_jonoshokti['bk_ght_sod']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_ght_sat" data-title="Enter"><?php echo $bk_ght_sat=  (isset( $bitarkik_jonoshokti['bk_ght_sat']))? $bitarkik_jonoshokti['bk_ght_sat']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="bitarkik_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_ght_kor" data-title="Enter"><?php echo $bk_ght_kor=  (isset( $bitarkik_jonoshokti['bk_ght_kor']))? $bitarkik_jonoshokti['bk_ght_kor']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_pb_sod+$tlvnbk_pb_sod+$jtobk_pb_sod+$bk_pb_sod)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_pb_sat+$tlvnbk_pb_sat+$jtobk_pb_sat+$bk_pb_sat)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_pb_kor+$tlvnbk_pb_kor+$jtobk_pb_kor+$bk_pb_kor)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_bm_sod+$tlvnbk_bm_sod+$jtobk_bm_sod+$bk_bm_sod)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_bm_sat+$tlvnbk_bm_sat+$jtobk_bm_sat+$bk_bm_sat)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_bm_kor+$tlvnbk_bm_kor+$jtobk_bm_kor+$bk_bm_kor)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_br_sod+$tlvnbk_br_sod+$jtobk_br_sod+$bk_br_sod)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($pbk_br_sat+$tlvnbk_br_sat+$jtobk_br_sat+$bk_br_sat)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($pbk_br_kor+$tlvnbk_br_kor+$jtobk_br_kor+$bk_br_kor)?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($pbk_ght_sod+$tlvnbk_ght_sod+$jtobk_ght_sod+$bk_ght_sod)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($pbk_ght_sat+$tlvnbk_ght_sat+$jtobk_ght_sat+$bk_ght_sat)?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($pbk_ght_kor+$tlvnbk_ght_kor+$jtobk_ght_kor+$bk_ght_kor)?>
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
