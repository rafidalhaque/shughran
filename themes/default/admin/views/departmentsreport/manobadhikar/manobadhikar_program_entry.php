<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/manobadhikar-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/manobadhikar-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

                                <td class="tg-pwj7" >প্রোগ্রাম</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি</td>
                                <td class="tg-pwj7" >গড়</td>
                            
                             
                            </tr>


                            <?php
                            $pk = (isset($manobodhikar_bivag2['id']))?$manobodhikar_bivag2['id']:'';
                            ?>


                            <tr>
                                <td class="tg-pwj7 type_1">কমিটির বৈঠক</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_s" data-title="Enter"><?php echo $kb_s=  (isset( $manobodhikar_bivag2['kb_s']))? $manobodhikar_bivag2['kb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_mup" data-title="Enter"><?php echo $kb_mup=  (isset( $manobodhikar_bivag2['kb_mup']))? $manobodhikar_bivag2['kb_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($kb_mup!=0)?$kb_mup/$kb_s:0,2)?>
                                </td>
                              
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার প্রতিনিধি সভা</td>
                                
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mps_s" data-title="Enter"><?php echo $mps_s=  (isset( $manobodhikar_bivag2['mps_s']))? $manobodhikar_bivag2['mps_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mps_mup" data-title="Enter"><?php echo $mps_mup=  (isset( $manobodhikar_bivag2['mps_mup']))? $manobodhikar_bivag2['mps_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($mps_mup!=0)?$mps_mup/$mps_s:0,2)?>
                                </td>
                              
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার কর্মশালা</td>
                                
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mksh_s" data-title="Enter"><?php echo $mksh_s=  (isset( $manobodhikar_bivag2['mksh_s']))? $manobodhikar_bivag2['mksh_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mksh_mup" data-title="Enter"><?php echo $mksh_mup=  (isset( $manobodhikar_bivag2['mksh_mup']))? $manobodhikar_bivag2['mksh_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($mksh_mup!=0)?$mksh_mup/$mksh_s:0,2)?>
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার সংগঠনের সাথে মতবিনিময়</td>
                                
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mssam_s" data-title="Enter"><?php echo $mssam_s=  (isset( $manobodhikar_bivag2['mssam_s']))? $manobodhikar_bivag2['mssam_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mssam_mup" data-title="Enter"><?php echo $mssam_mup=  (isset( $manobodhikar_bivag2['mssam_mup']))? $manobodhikar_bivag2['mssam_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($mssam_mup!=0)?$mssam_mup/$mssam_s:0,2)?>
                                </td>
                              
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার কর্মীদের সাথে মতবিনিময়</td>
                                
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mksam_s" data-title="Enter"><?php echo $mksam_s=  (isset( $manobodhikar_bivag2['mksam_s']))? $manobodhikar_bivag2['mksam_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mksam_mup" data-title="Enter"><?php echo $mksam_mup=  (isset( $manobodhikar_bivag2['mksam_mup']))? $manobodhikar_bivag2['mksam_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($mksam_mup!=0)?$mksam_mup/$mksam_s:0,2)?>
                                </td>
                              
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক সেমিনার/ আলোচনা সভা</td>
                                
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbsas_s" data-title="Enter"><?php echo $mbsas_s=  (isset( $manobodhikar_bivag2['mbsas_s']))? $manobodhikar_bivag2['mbsas_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbsas_mup" data-title="Enter"><?php echo $mbsas_mup=  (isset( $manobodhikar_bivag2['mbsas_mup']))? $manobodhikar_bivag2['mbsas_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($mbsas_mup!=0)?$mbsas_mup/$mbsas_s:0,2)?>
                                </td>
                               
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার সম্পর্কিত দিবস পালন</td>
                                
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="msdp_s" data-title="Enter"><?php echo $msdp_s=  (isset( $manobodhikar_bivag2['msdp_s']))? $manobodhikar_bivag2['msdp_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="manobodhikar_bivag2" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="msdp_mup" data-title="Enter"><?php echo $msdp_mup=  (isset( $manobodhikar_bivag2['msdp_mup']))? $manobodhikar_bivag2['msdp_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo number_format(($msdp_mup!=0)?$msdp_mup/$msdp_s:0,2)?>
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
