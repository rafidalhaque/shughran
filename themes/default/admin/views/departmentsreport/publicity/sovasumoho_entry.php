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
                            <li><a href="<?= admin_url('departmentsreport/sovasumoho') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/sovasumoho/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরন </td>
                                <td class="tg-pwj7" colspan="3">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="3">মোট উপস্থিতি </td>
                                <td class="tg-pwj7" colspan="3">গড় উপস্থিতি  </td>
                            
                            </tr>
                            <?php
                            $pk = (isset($sovasomuho_ho['id']))?$sovasomuho_ho['id']:'';
                            ?>
                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>বিভাগীয় জনশক্তিদের নিয়ে নিয়মিত বৈঠক</span></div></td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjnnib_s" data-title="Enter"><?php echo $bjnnib_s=  (isset( $sovasomuho_ho['bjnnib_s']))? $sovasomuho_ho['bjnnib_s']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjnnib_mup" data-title="Enter"><?php echo $bjnnib_mup=  (isset( $sovasomuho_ho['bjnnib_mup']))? $sovasomuho_ho['bjnnib_mup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjnnib_gup" data-title="Enter"><?php echo $bjnnib_gup=  (isset( $sovasomuho_ho['bjnnib_gup']))? $sovasomuho_ho['bjnnib_gup']:'' ?></a>
                                </td>
                              
                               
                            </tr>
                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>প্রশিক্ষণ কর্মশালা</span></div></td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_s" data-title="Enter"><?php echo $pk_s=  (isset( $sovasomuho_ho['pk_s']))? $sovasomuho_ho['pk_s']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_mup" data-title="Enter"><?php echo $pk_mup=  (isset( $sovasomuho_ho['pk_mup']))? $sovasomuho_ho['pk_mup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_gup" data-title="Enter"><?php echo $pk_gup=  (isset( $sovasomuho_ho['pk_gup']))? $sovasomuho_ho['pk_gup']:'' ?></a>
                                </td>
                            
                           
                            </tr>
                            <tr>
                                
                                <td class="tg-pwj7 "><div><span> মতবিনিময়/সংবাদ সম্মেলন/ইফতার</span></div></td>
                                <td class="tg-pwj7 "> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbm_s" data-title="Enter"><?php echo $mbm_s=  (isset( $sovasomuho_ho['mbm_s']))? $sovasomuho_ho['mbm_s']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbm_mup" data-title="Enter"><?php echo $mbm_mup=  (isset( $sovasomuho_ho['mbm_mup']))? $sovasomuho_ho['mbm_mup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbm_gup" data-title="Enter"><?php echo $mbm_gup=  (isset( $sovasomuho_ho['mbm_gup']))? $sovasomuho_ho['mbm_gup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbson_s" data-title="Enter"><?php echo $sbson_s=  (isset( $sovasomuho_ho['sbson_s']))? $sovasomuho_ho['sbson_s']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbson_mup" data-title="Enter"><?php echo $sbson_mup=  (isset( $sovasomuho_ho['sbson_mup']))? $sovasomuho_ho['sbson_mup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbson_gup" data-title="Enter"><?php echo $sbson_gup=  (isset( $sovasomuho_ho['sbson_gup']))? $sovasomuho_ho['sbson_gup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="et_s" data-title="Enter"><?php echo $et_s=  (isset( $sovasomuho_ho['et_s']))? $sovasomuho_ho['et_s']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="et_mup" data-title="Enter"><?php echo $et_mup=  (isset( $sovasomuho_ho['et_mup']))? $sovasomuho_ho['et_mup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="et_gup" data-title="Enter"><?php echo $et_gup=  (isset( $sovasomuho_ho['et_gup']))? $sovasomuho_ho['et_gup']:'' ?></a>
                                </td>
                            
                            
                            </tr>
                        
                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>অন্যান্য</span></div></td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_s" data-title="Enter"><?php echo $onnoanno_s=  (isset( $sovasomuho_ho['onnoanno_s']))? $sovasomuho_ho['onnoanno_s']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_mup" data-title="Enter"><?php echo $onnoanno_mup=  (isset( $sovasomuho_ho['onnoanno_mup']))? $sovasomuho_ho['onnoanno_mup']:'' ?></a>
                                </td>
                                <td class="tg-pwj7 "colspan="3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sovasomuho_ho" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_gup" data-title="Enter"><?php echo $onnoanno_gup=  (isset( $sovasomuho_ho['onnoanno_gup']))? $sovasomuho_ho['onnoanno_gup']:'' ?></a>
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
