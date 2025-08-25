<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/dawah-sovasumoho') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/dawah-sovasumoho/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7 "><div><span>ধরন    </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট উপস্থিতি</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড় </span></div></td>
                                <td class="tg-pwj7 "><div><span>মন্তব্য </span></div></td>
                                
                              
                               
                            </tr>


                            <?php
                            $pk = (isset($daoyaho_bivag_shovasomuho['id']))?$daoyaho_bivag_shovasomuho['id']:'';
                            ?>

                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                উপদেষ্টা কমিটির সভা 
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updks_s" data-title="Enter"><?php echo $updks_s =  (isset( $daoyaho_bivag_shovasomuho['updks_s']))? $daoyaho_bivag_shovasomuho['updks_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updks_mup" data-title="Enter"><?php echo $updks_mup =  (isset( $daoyaho_bivag_shovasomuho['updks_mup']))? $daoyaho_bivag_shovasomuho['updks_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updks_gr" data-title="Enter"><?php echo $updks_gr =  (isset( $daoyaho_bivag_shovasomuho['updks_gr']))? $daoyaho_bivag_shovasomuho['updks_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updks_mb" data-title="Enter"><?php echo $updks_mb =  (isset( $daoyaho_bivag_shovasomuho['updks_mb']))? $daoyaho_bivag_shovasomuho['updks_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                কার্যনির্বাহী কমিটির সভা
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="knks_s" data-title="Enter"><?php echo $knks_s =  (isset( $daoyaho_bivag_shovasomuho['knks_s']))? $daoyaho_bivag_shovasomuho['knks_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="knks_mup" data-title="Enter"><?php echo $knks_mup =  (isset( $daoyaho_bivag_shovasomuho['knks_mup']))? $daoyaho_bivag_shovasomuho['knks_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="knks_gr" data-title="Enter"><?php echo $knks_gr =  (isset( $daoyaho_bivag_shovasomuho['knks_gr']))? $daoyaho_bivag_shovasomuho['knks_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="knks_mb" data-title="Enter"><?php echo $knks_mb =  (isset( $daoyaho_bivag_shovasomuho['knks_mb']))? $daoyaho_bivag_shovasomuho['knks_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                কেন্দ্রীয় টিম সদস্যদের বৈঠক
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ktsdb_s" data-title="Enter"><?php echo $ktsdb_s =  (isset( $daoyaho_bivag_shovasomuho['ktsdb_s']))? $daoyaho_bivag_shovasomuho['ktsdb_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ktsdb_mup" data-title="Enter"><?php echo $ktsdb_mup =  (isset( $daoyaho_bivag_shovasomuho['ktsdb_mup']))? $daoyaho_bivag_shovasomuho['ktsdb_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ktsdb_gr" data-title="Enter"><?php echo $ktsdb_gr =  (isset( $daoyaho_bivag_shovasomuho['ktsdb_gr']))? $daoyaho_bivag_shovasomuho['ktsdb_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ktsdb_mb" data-title="Enter"><?php echo $ktsdb_mb =  (isset( $daoyaho_bivag_shovasomuho['ktsdb_mb']))? $daoyaho_bivag_shovasomuho['ktsdb_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                আঞ্চলিক প্রতিনিধি সভা 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apns_s" data-title="Enter"><?php echo $apns_s =  (isset( $daoyaho_bivag_shovasomuho['apns_s']))? $daoyaho_bivag_shovasomuho['apns_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apns_mup" data-title="Enter"><?php echo $apns_mup =  (isset( $daoyaho_bivag_shovasomuho['apns_mup']))? $daoyaho_bivag_shovasomuho['apns_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apns_gr" data-title="Enter"><?php echo $apns_gr =  (isset( $daoyaho_bivag_shovasomuho['apns_gr']))? $daoyaho_bivag_shovasomuho['apns_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="apns_mb" data-title="Enter"><?php echo $apns_mb =  (isset( $daoyaho_bivag_shovasomuho['apns_mb']))? $daoyaho_bivag_shovasomuho['apns_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                শাখা প্রতিনিধিদের কর্মশালা
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shpnksh_s" data-title="Enter"><?php echo $shpnksh_s =  (isset( $daoyaho_bivag_shovasomuho['shpnksh_s']))? $daoyaho_bivag_shovasomuho['shpnksh_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shpnksh_mup" data-title="Enter"><?php echo $shpnksh_mup =  (isset( $daoyaho_bivag_shovasomuho['shpnksh_mup']))? $daoyaho_bivag_shovasomuho['shpnksh_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shpnksh_gr" data-title="Enter"><?php echo $shpnksh_gr =  (isset( $daoyaho_bivag_shovasomuho['shpnksh_gr']))? $daoyaho_bivag_shovasomuho['shpnksh_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shpnksh_mb" data-title="Enter"><?php echo $shpnksh_mb =  (isset( $daoyaho_bivag_shovasomuho['shpnksh_mb']))? $daoyaho_bivag_shovasomuho['shpnksh_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                দায়ীদের কর্মশালা 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddksh_s" data-title="Enter"><?php echo $ddksh_s =  (isset( $daoyaho_bivag_shovasomuho['ddksh_s']))? $daoyaho_bivag_shovasomuho['ddksh_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddksh_mup" data-title="Enter"><?php echo $ddksh_mup =  (isset( $daoyaho_bivag_shovasomuho['ddksh_mup']))? $daoyaho_bivag_shovasomuho['ddksh_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddksh_gr" data-title="Enter"><?php echo $ddksh_gr =  (isset( $daoyaho_bivag_shovasomuho['ddksh_gr']))? $daoyaho_bivag_shovasomuho['ddksh_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddksh_mb" data-title="Enter"><?php echo $ddksh_mb =  (isset( $daoyaho_bivag_shovasomuho['ddksh_mb']))? $daoyaho_bivag_shovasomuho['ddksh_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                দাওয়াতি সংগঠনের সাথে মতবিনিময়
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsnsmb_s" data-title="Enter"><?php echo $dsnsmb_s =  (isset( $daoyaho_bivag_shovasomuho['dsnsmb_s']))? $daoyaho_bivag_shovasomuho['dsnsmb_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsnsmb_mup" data-title="Enter"><?php echo $dsnsmb_mup =  (isset( $daoyaho_bivag_shovasomuho['dsnsmb_mup']))? $daoyaho_bivag_shovasomuho['dsnsmb_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsnsmb_gr" data-title="Enter"><?php echo $dsnsmb_gr =  (isset( $daoyaho_bivag_shovasomuho['dsnsmb_gr']))? $daoyaho_bivag_shovasomuho['dsnsmb_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsnsmb_mb" data-title="Enter"><?php echo $dsnsmb_mb =  (isset( $daoyaho_bivag_shovasomuho['dsnsmb_mb']))? $daoyaho_bivag_shovasomuho['dsnsmb_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                দায়ীদের সাথে মতবিনিময় 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddsmb_s" data-title="Enter"><?php echo $ddsmb_s =  (isset( $daoyaho_bivag_shovasomuho['ddsmb_s']))? $daoyaho_bivag_shovasomuho['ddsmb_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddsmb_mup" data-title="Enter"><?php echo $ddsmb_mup =  (isset( $daoyaho_bivag_shovasomuho['ddsmb_mup']))? $daoyaho_bivag_shovasomuho['ddsmb_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddsmb_gr" data-title="Enter"><?php echo $ddsmb_gr =  (isset( $daoyaho_bivag_shovasomuho['ddsmb_gr']))? $daoyaho_bivag_shovasomuho['ddsmb_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ddsmb_mb" data-title="Enter"><?php echo $ddsmb_mb =  (isset( $daoyaho_bivag_shovasomuho['ddsmb_mb']))? $daoyaho_bivag_shovasomuho['ddsmb_mb']:'' ?></a>

                                </td>
                            

                            </tr>
                            <tr>
                                
                                <td class="tg-0pky  type_1">
                                সেমিনার /সিম্পোজিয়াম
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snsj_s" data-title="Enter"><?php echo $snsj_s =  (isset( $daoyaho_bivag_shovasomuho['snsj_s']))? $daoyaho_bivag_shovasomuho['snsj_s']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snsj_mup" data-title="Enter"><?php echo $snsj_mup =  (isset( $daoyaho_bivag_shovasomuho['snsj_mup']))? $daoyaho_bivag_shovasomuho['snsj_mup']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snsj_gr" data-title="Enter"><?php echo $snsj_gr =  (isset( $daoyaho_bivag_shovasomuho['snsj_gr']))? $daoyaho_bivag_shovasomuho['snsj_gr']:'' ?></a>

                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="daoyaho_bivag_shovasomuho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snsj_mb" data-title="Enter"><?php echo $snsj_mb =  (isset( $daoyaho_bivag_shovasomuho['snsj_mb']))? $daoyaho_bivag_shovasomuho['snsj_mb']:'' ?></a>

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
