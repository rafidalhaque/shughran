<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-jonoshokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-jonoshokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3">মান </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                       <td class="tg-pwj7" colspan="">মনোনয়ন </td>
                       <td class="tg-pwj7" colspan="">আগমন </td>
                       <td class="tg-pwj7" colspan="">ঘাটতি</td>
                       <td class="tg-pwj7" colspan="">স্থানান্তর</td>
                       <td class="tg-pwj7" colspan="">ছাত্রত্ব শেষ</td>
                    
                       <td class="tg-pwj7" colspan="">বাতিল</td>
                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($saneskritik_bivag_jonoshokti['id']))?$saneskritik_bivag_jonoshokti['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1"> নকিব 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_pus" data-title="Enter"><?php echo $nokib_pus=  (isset( $saneskritik_bivag_jonoshokti['nokib_pus']))?$saneskritik_bivag_jonoshokti['nokib_pus']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_bms" data-title="Enter"><?php echo $nokib_bms=  (isset( $saneskritik_bivag_jonoshokti['nokib_bms']))?$saneskritik_bivag_jonoshokti['nokib_bms']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_br" data-title="Enter"><?php echo $nokib_br=  (isset( $saneskritik_bivag_jonoshokti['nokib_br']))?$saneskritik_bivag_jonoshokti['nokib_br']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_mn1" data-title="Enter"><?php echo $nokib_mn1=  (isset( $saneskritik_bivag_jonoshokti['nokib_mn1']))?$saneskritik_bivag_jonoshokti['nokib_mn1']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_am" data-title="Enter"><?php echo $nokib_am=  (isset( $saneskritik_bivag_jonoshokti['nokib_am']))?$saneskritik_bivag_jonoshokti['nokib_am']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_gt" data-title="Enter"><?php echo $nokib_gt=  (isset( $saneskritik_bivag_jonoshokti['nokib_gt']))?$saneskritik_bivag_jonoshokti['nokib_gt']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_mn2" data-title="Enter"><?php echo $nokib_mn2=  (isset( $saneskritik_bivag_jonoshokti['nokib_mn2']))?$saneskritik_bivag_jonoshokti['nokib_mn2']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_sn" data-title="Enter"><?php echo $nokib_sn=  (isset( $saneskritik_bivag_jonoshokti['nokib_sn']))?$saneskritik_bivag_jonoshokti['nokib_sn']:'0' ?></a>
                       </td>
                       
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokib_btl" data-title="Enter"><?php echo $nokib_btl=  (isset( $saneskritik_bivag_jonoshokti['nokib_btl']))?$saneskritik_bivag_jonoshokti['nokib_btl']:'0' ?></a>
                       </td>
                       
                   </tr>


                   <tr>
                       <td class="tg-y698">নকিব প্রার্থী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_pus" data-title="Enter"><?php echo $nokibp_pus=  (isset( $saneskritik_bivag_jonoshokti['nokibp_pus']))?$saneskritik_bivag_jonoshokti['nokibp_pus']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_bms" data-title="Enter"><?php echo $nokibp_bms=  (isset( $saneskritik_bivag_jonoshokti['nokibp_bms']))?$saneskritik_bivag_jonoshokti['nokibp_bms']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_br" data-title="Enter"><?php echo $nokibp_br=  (isset( $saneskritik_bivag_jonoshokti['nokibp_br']))?$saneskritik_bivag_jonoshokti['nokibp_br']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_mn1" data-title="Enter"><?php echo $nokibp_mn1=  (isset( $saneskritik_bivag_jonoshokti['nokibp_mn1']))?$saneskritik_bivag_jonoshokti['nokibp_mn1']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_am" data-title="Enter"><?php echo $nokibp_am=  (isset( $saneskritik_bivag_jonoshokti['nokibp_am']))?$saneskritik_bivag_jonoshokti['nokibp_am']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_gt" data-title="Enter"><?php echo $nokibp_gt=  (isset( $saneskritik_bivag_jonoshokti['nokibp_gt']))?$saneskritik_bivag_jonoshokti['nokibp_gt']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_mn2" data-title="Enter"><?php echo $nokibp_mn2=  (isset( $saneskritik_bivag_jonoshokti['nokibp_mn2']))?$saneskritik_bivag_jonoshokti['nokibp_mn2']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_sn" data-title="Enter"><?php echo $nokibp_sn=  (isset( $saneskritik_bivag_jonoshokti['nokibp_sn']))?$saneskritik_bivag_jonoshokti['nokibp_sn']:'0' ?></a>
                       </td>
                      
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibp_btl" data-title="Enter"><?php echo $nokibp_btl=  (isset( $saneskritik_bivag_jonoshokti['nokibp_btl']))?$saneskritik_bivag_jonoshokti['nokibp_btl']:'0' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">অগ্রজ  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_pus" data-title="Enter"><?php echo $ogroj_pus=  (isset( $saneskritik_bivag_jonoshokti['ogroj_pus']))?$saneskritik_bivag_jonoshokti['ogroj_pus']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_bms" data-title="Enter"><?php echo $ogroj_bms=  (isset( $saneskritik_bivag_jonoshokti['ogroj_bms']))?$saneskritik_bivag_jonoshokti['ogroj_bms']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_br" data-title="Enter"><?php echo $ogroj_br=  (isset( $saneskritik_bivag_jonoshokti['ogroj_br']))?$saneskritik_bivag_jonoshokti['ogroj_br']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_mn1" data-title="Enter"><?php echo $ogroj_mn1=  (isset( $saneskritik_bivag_jonoshokti['ogroj_mn1']))?$saneskritik_bivag_jonoshokti['ogroj_mn1']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_am" data-title="Enter"><?php echo $ogroj_am=  (isset( $saneskritik_bivag_jonoshokti['ogroj_am']))?$saneskritik_bivag_jonoshokti['ogroj_am']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_gt" data-title="Enter"><?php echo $ogroj_gt=  (isset( $saneskritik_bivag_jonoshokti['ogroj_gt']))?$saneskritik_bivag_jonoshokti['ogroj_gt']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_mn2" data-title="Enter"><?php echo $ogroj_mn2=  (isset( $saneskritik_bivag_jonoshokti['ogroj_mn2']))?$saneskritik_bivag_jonoshokti['ogroj_mn2']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_sn" data-title="Enter"><?php echo $ogroj_sn=  (isset( $saneskritik_bivag_jonoshokti['ogroj_sn']))?$saneskritik_bivag_jonoshokti['ogroj_sn']:'0' ?></a>
                       </td>
                     
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogroj_btl" data-title="Enter"><?php echo $ogroj_btl=  (isset( $saneskritik_bivag_jonoshokti['ogroj_btl']))?$saneskritik_bivag_jonoshokti['ogroj_btl']:'0' ?></a>
                       </td>
                     
                   </tr>
                   <tr>
                       <td class="tg-y698">অগ্রজ প্রার্থী  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_pus" data-title="Enter"><?php echo $ogrojp_pus=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_pus']))?$saneskritik_bivag_jonoshokti['ogrojp_pus']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_bms" data-title="Enter"><?php echo $ogrojp_bms=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_bms']))?$saneskritik_bivag_jonoshokti['ogrojp_bms']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_br" data-title="Enter"><?php echo $ogrojp_br=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_br']))?$saneskritik_bivag_jonoshokti['ogrojp_br']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_mn1" data-title="Enter"><?php echo $ogrojp_mn1=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_mn1']))?$saneskritik_bivag_jonoshokti['ogrojp_mn1']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_am" data-title="Enter"><?php echo $ogrojp_am=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_am']))?$saneskritik_bivag_jonoshokti['ogrojp_am']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_gt" data-title="Enter"><?php echo $ogrojp_gt=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_gt']))?$saneskritik_bivag_jonoshokti['ogrojp_gt']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_mn2" data-title="Enter"><?php echo $ogrojp_mn2=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_mn2']))?$saneskritik_bivag_jonoshokti['ogrojp_mn2']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_sn" data-title="Enter"><?php echo $ogrojp_sn=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_sn']))?$saneskritik_bivag_jonoshokti['ogrojp_sn']:'0' ?></a>
                       </td>
                      
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojp_btl" data-title="Enter"><?php echo $ogrojp_btl=  (isset( $saneskritik_bivag_jonoshokti['ogrojp_btl']))?$saneskritik_bivag_jonoshokti['ogrojp_btl']:'0' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1"> উন্মেষ 	</td>
                       
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_pus" data-title="Enter"><?php echo $unmesh_pus=  (isset( $saneskritik_bivag_jonoshokti['unmesh_pus']))?$saneskritik_bivag_jonoshokti['unmesh_pus']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_bms" data-title="Enter"><?php echo $unmesh_bms=  (isset( $saneskritik_bivag_jonoshokti['unmesh_bms']))?$saneskritik_bivag_jonoshokti['unmesh_bms']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_br" data-title="Enter"><?php echo $unmesh_br=  (isset( $saneskritik_bivag_jonoshokti['unmesh_br']))?$saneskritik_bivag_jonoshokti['unmesh_br']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_mn1" data-title="Enter"><?php echo $unmesh_mn1=  (isset( $saneskritik_bivag_jonoshokti['unmesh_mn1']))?$saneskritik_bivag_jonoshokti['unmesh_mn1']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_am" data-title="Enter"><?php echo $unmesh_am=  (isset( $saneskritik_bivag_jonoshokti['unmesh_am']))?$saneskritik_bivag_jonoshokti['unmesh_am']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_gt" data-title="Enter"><?php echo $unmesh_gt=  (isset( $saneskritik_bivag_jonoshokti['unmesh_gt']))?$saneskritik_bivag_jonoshokti['unmesh_gt']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_mn2" data-title="Enter"><?php echo $unmesh_mn2=  (isset( $saneskritik_bivag_jonoshokti['unmesh_mn2']))?$saneskritik_bivag_jonoshokti['unmesh_mn2']:'0' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_sn" data-title="Enter"><?php echo $unmesh_sn=  (isset( $saneskritik_bivag_jonoshokti['unmesh_sn']))?$saneskritik_bivag_jonoshokti['unmesh_sn']:'0' ?></a>
                       </td>
                      
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jonoshokti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmesh_btl" data-title="Enter"><?php echo $unmesh_btl=  (isset( $saneskritik_bivag_jonoshokti['unmesh_btl']))?$saneskritik_bivag_jonoshokti['unmesh_btl']:'0' ?></a>
                       </td>
                      
                     
                       
                   </tr>


                   <tr>
                       <td class="tg-y698">মোট </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($nokib_pus+$nokibp_pus+$ogroj_pus+$ogrojp_pus+$unmesh_pus)?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo ($nokib_bms+$nokibp_bms+$ogroj_bms+$ogrojp_bms+$unmesh_bms)?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($nokib_br+$nokibp_br+$ogroj_br+$ogrojp_br+$unmesh_br)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($nokib_mn1+$nokibp_mn1+$ogroj_mn1+$ogrojp_mn1+$unmesh_mn1)?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo ($nokib_am+$nokibp_am+$ogroj_am+$ogrojp_am+$unmesh_am)?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($nokib_gt+$nokibp_gt+$ogroj_gt+$ogrojp_gt+$unmesh_gt)?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($nokib_mn2+$nokibp_mn2+$ogroj_mn2+$ogrojp_mn2+$unmesh_mn2)?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo ($nokib_sn+$nokibp_sn+$ogroj_sn+$ogrojp_sn+$unmesh_sn)?>
                       </td>
                      
                       <td class="tg-0pky  type_3">
                       <?php echo ($nokib_btl+$nokibp_btl+$ogroj_btl+$ogrojp_btl+$unmesh_btl)?>
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
