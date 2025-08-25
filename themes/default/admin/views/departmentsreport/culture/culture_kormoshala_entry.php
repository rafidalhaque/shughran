<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'কর্মশালা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-kormoshala') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-kormoshala/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                   
                                
                                
                   </tr>
                   <tr>
                        <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি</td>

                        <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                       <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($kormoshala['id']))?$kormoshala['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1">  সঙ্গীত কর্মশালা 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sksh_s" data-title="Enter"><?php echo $sksh_s=  (isset( $kormoshala['sksh_s']))?$kormoshala['sksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sksh_mk" data-title="Enter"><?php echo $sksh_mk=  (isset( $kormoshala['sksh_mk']))?$kormoshala['sksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sksh_mup" data-title="Enter"><?php echo $sksh_mup=  (isset( $kormoshala['sksh_mup']))?$kormoshala['sksh_mup']:'' ?></a>
                       </td>

                       <td class="tg-y698">শিশুতোষ সঙ্গীত কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthtsksh_s" data-title="Enter"><?php echo $sthtsksh_s=  (isset( $kormoshala['sthtsksh_s']))?$kormoshala['sthtsksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthtsksh_mk" data-title="Enter"><?php echo $sthtsksh_mk=  (isset( $kormoshala['sthtsksh_mk']))?$kormoshala['sthtsksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthtsksh_mup" data-title="Enter"><?php echo $sthtsksh_mup=  (isset( $kormoshala['sthtsksh_mup']))?$kormoshala['sthtsksh_mup']:'' ?></a>
                       </td>

             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">নাট্য কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nksh_s" data-title="Enter"><?php echo $nksh_s=  (isset( $kormoshala['nksh_s']))?$kormoshala['nksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nksh_mk" data-title="Enter"><?php echo $nksh_mk=  (isset( $kormoshala['nksh_mk']))?$kormoshala['nksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nksh_mup" data-title="Enter"><?php echo $nksh_mup=  (isset( $kormoshala['nksh_mup']))?$kormoshala['nksh_mup']:'' ?></a>
                       </td>

                       <td class="tg-y698">শিশুতোষ নাট্যকর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnksh_s" data-title="Enter"><?php echo $shnksh_s=  (isset( $kormoshala['shnksh_s']))?$kormoshala['shnksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnksh_mk" data-title="Enter"><?php echo $shnksh_mk=  (isset( $kormoshala['shnksh_mk']))?$kormoshala['shnksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shnksh_mup" data-title="Enter"><?php echo $shnksh_mup=  (isset( $kormoshala['shnksh_mup']))?$kormoshala['shnksh_mup']:'' ?></a>
                       </td>

              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">আবৃত্তি উপস্থাপনা কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupksh_s" data-title="Enter"><?php echo $aupksh_s=  (isset( $kormoshala['aupksh_s']))?$kormoshala['aupksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupksh_mk" data-title="Enter"><?php echo $aupksh_mk=  (isset( $kormoshala['aupksh_mk']))?$kormoshala['aupksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupksh_mup" data-title="Enter"><?php echo $aupksh_mup=  (isset( $kormoshala['aupksh_mup']))?$kormoshala['aupksh_mup']:'' ?></a>
                       </td>

                       <td class="tg-y698">টেকনিক্যাল কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tkksh_s" data-title="Enter"><?php echo $tkksh_s=  (isset( $kormoshala['tkksh_s']))?$kormoshala['tkksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tkksh_mk" data-title="Enter"><?php echo $tkksh_mk=  (isset( $kormoshala['tkksh_mk']))?$kormoshala['tkksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tkksh_mup" data-title="Enter"><?php echo $tkksh_mup=  (isset( $kormoshala['tkksh_mup']))?$kormoshala['tkksh_mup']:'' ?></a>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">কিরাত কর্মশালা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kaksh_s" data-title="Enter"><?php echo $kaksh_s=  (isset( $kormoshala['kaksh_s']))?$kormoshala['kaksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kaksh_mk" data-title="Enter"><?php echo $kaksh_mk=  (isset( $kormoshala['kaksh_mk']))?$kormoshala['kaksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kaksh_mup" data-title="Enter"><?php echo $kaksh_mup=  (isset( $kormoshala['kaksh_mup']))?$kormoshala['kaksh_mup']:'' ?></a>
                       </td>

                       <td class="tg-y698">সাংস্কৃতিক কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stksh_s" data-title="Enter"><?php echo $stksh_s=  (isset( $kormoshala['stksh_s']))?$kormoshala['stksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stksh_mk" data-title="Enter"><?php echo $stksh_mk=  (isset( $kormoshala['stksh_mk']))?$kormoshala['stksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stksh_mup" data-title="Enter"><?php echo $stksh_mup=  (isset( $kormoshala['stksh_mup']))?$kormoshala['stksh_mup']:'' ?></a>
                       </td>

              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> অগ্রজ মানোন্নয়ন কর্মশাল </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mnksh_s" data-title="Enter"><?php echo $mnksh_s=  (isset( $kormoshala['mnksh_s']))?$kormoshala['mnksh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mnksh_mk" data-title="Enter"><?php echo $mnksh_mk=  (isset( $kormoshala['mnksh_mk']))?$kormoshala['mnksh_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mnksh_mup" data-title="Enter"><?php echo $mnksh_mup=  (isset( $kormoshala['mnksh_mup']))?$kormoshala['mnksh_mup']:'' ?></a>
                       </td>

                       <td class="tg-y698">উন্মেষ মানোন্নয়ন কর্মশালা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_s" data-title="Enter"><?php echo $onnoanno_s=  (isset( $kormoshala['onnoanno_s']))?$kormoshala['onnoanno_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_mk" data-title="Enter"><?php echo $onnoanno_mk=  (isset( $kormoshala['onnoanno_mk']))?$kormoshala['onnoanno_mk']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="kormoshala" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_mup" data-title="Enter"><?php echo $onnoanno_mup=  (isset( $kormoshala['onnoanno_mup']))?$kormoshala['onnoanno_mup']:'' ?></a>
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
