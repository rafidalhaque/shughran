<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'নিজস্ব শাখা থেকে প্রকাশিত প্রকাশনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/nijer-shakha-theke-prokashito') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/nijer-shakha-theke-prokashito/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">উপকরণ </td>
                   
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বর্ণনা  </td>
                                <td class="tg-pwj7" colspan="">সংরক্ষিত সংখ্যা </td>
                         
                           
                            </tr>
                            <tr>
                          
                            </tr>

                            <?php
                            $pk = (isset($nij_shakha_theke_prokashito_prokashona['id']))?$nij_shakha_theke_prokashito_prokashona['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> পত্রিকা 	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_bn" data-title="Enter"><?php echo $pk_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['pk_bn']))? $nij_shakha_theke_prokashito_prokashona['pk_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_sts" data-title="Enter"><?php echo $pk_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['pk_sts']))? $nij_shakha_theke_prokashito_prokashona['pk_sts']:'' ?></a>
                                </td>
                        
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">ম্যাগাজিন  </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mjn_bn" data-title="Enter"><?php echo $mjn_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['mjn_bn']))? $nij_shakha_theke_prokashito_prokashona['mjn_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mjn_sts" data-title="Enter"><?php echo $mjn_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['mjn_sts']))? $nij_shakha_theke_prokashito_prokashona['mjn_sts']:'' ?></a>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যালেন্ডার </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kdr_bn" data-title="Enter"><?php echo $pk_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['kdr_bn']))? $nij_shakha_theke_prokashito_prokashona['kdr_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kdr_sts" data-title="Enter"><?php echo $kdr_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['kdr_sts']))? $nij_shakha_theke_prokashito_prokashona['kdr_sts']:'' ?></a>
                                </td>
                       
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">CD  </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cdav_bn" data-title="Enter"><?php echo $cdav_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['cdav_bn']))? $nij_shakha_theke_prokashito_prokashona['cdav_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cdav_sts" data-title="Enter"><?php echo $cdav_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['cdav_sts']))? $nij_shakha_theke_prokashito_prokashona['cdav_sts']:'' ?></a>
                                </td>
                            
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">বুকলেট </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bul_bn" data-title="Enter"><?php echo $bul_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['bul_bn']))? $nij_shakha_theke_prokashito_prokashona['bul_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bul_sts" data-title="Enter"><?php echo $bul_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['bul_sts']))? $nij_shakha_theke_prokashito_prokashona['bul_sts']:'' ?></a>
                                </td>
                           
                            </tr>
                            <tr>
                                <td class="tg-y698">পোস্টার  </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pt_bn" data-title="Enter"><?php echo $pt_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['pt_bn']))? $nij_shakha_theke_prokashito_prokashona['pt_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pt_sts" data-title="Enter"><?php echo $pt_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['pt_sts']))? $nij_shakha_theke_prokashito_prokashona['pt_sts']:'' ?></a>
                                </td>
                         
                            </tr>
                            <tr>
                                <td class="tg-y698">লিফলেট   </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="llt_bn" data-title="Enter"><?php echo $llt_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['llt_bn']))? $nij_shakha_theke_prokashito_prokashona['llt_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="llt_sts" data-title="Enter"><?php echo $llt_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['llt_sts']))? $nij_shakha_theke_prokashito_prokashona['llt_sts']:'' ?></a>
                                </td>
                           
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">স্মারক </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sksk_bn" data-title="Enter"><?php echo $sksk_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['sksk_bn']))? $nij_shakha_theke_prokashito_prokashona['sksk_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sksk_sts" data-title="Enter"><?php echo $sksk_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['sksk_sts']))? $nij_shakha_theke_prokashito_prokashona['sksk_sts']:'' ?></a>
                                </td>
                           
                            
                            </tr>

                                <td class="tg-0pky"> অন্যান্য</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_bn" data-title="Enter"><?php echo $onnoanno_bn=  (isset( $nij_shakha_theke_prokashito_prokashona['onnoanno_bn']))? $nij_shakha_theke_prokashito_prokashona['onnoanno_bn']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="nij_shakha_theke_prokashito_prokashona" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_sts" data-title="Enter"><?php echo $onnoanno_sts=  (isset( $nij_shakha_theke_prokashito_prokashona['onnoanno_sts']))? $nij_shakha_theke_prokashito_prokashona['onnoanno_sts']:'' ?></a>
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
