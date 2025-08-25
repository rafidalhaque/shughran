<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'দাওয়াত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-dawat') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3"> বিবরণ   </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                       <td class="tg-pwj7" colspan="">ঘাটতি </td>
                       <td class="tg-pwj7" rowspan="3"> বিবরণ   </td>
                       <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                       <td class="tg-pwj7" colspan="">ঘাটতি </td>
                   </tr>
                   <tr>
            
                            
                     

                   </tr>
                   <tr>
                 


                   <?php $pk = (isset($daoyat['id']))?$daoyat['id']:'';?>

                   <tr>
                       <td class="tg-y698 type_1"> পরশ 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_pus" data-title="Enter"><?php echo $prosh_pus=  (isset( $daoyat['prosh_pus']))?$daoyat['prosh_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_bms" data-title="Enter"><?php echo $prosh_bms=  (isset( $daoyat['prosh_bms']))?$daoyat['prosh_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_br" data-title="Enter"><?php echo $prosh_br=  (isset( $daoyat['prosh_br']))?$daoyat['prosh_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_gt" data-title="Enter"><?php echo $prosh_gt=  (isset( $daoyat['prosh_gt']))?$daoyat['prosh_gt']:'' ?></a>
                       </td>

                       <td class="tg-y698 type_1"> পরশ 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_pus_1" data-title="Enter"><?php echo $prosh_pus_1=  (isset( $daoyat['prosh_pus_1']))?$daoyat['prosh_pus_1']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_bms_1" data-title="Enter"><?php echo $prosh_bms_1=  (isset( $daoyat['prosh_bms_1']))?$daoyat['prosh_bms_1']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_br_1" data-title="Enter"><?php echo $prosh_br_1=  (isset( $daoyat['prosh_br_1']))?$daoyat['prosh_br_1']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="prosh_gt_1" data-title="Enter"><?php echo $prosh_gt_1=  (isset( $daoyat['prosh_gt_1']))?$daoyat['prosh_gt_1']:'' ?></a>
                       </td>
                     
                  
                   </tr>


                   <tr>
                       <td class="tg-y698"> সঙ্গীত শিল্পীশিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_pus" data-title="Enter"><?php echo $shilpi_pus=  (isset( $daoyat['shilpi_pus']))?$daoyat['shilpi_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_bms" data-title="Enter"><?php echo $shilpi_bms=  (isset( $daoyat['shilpi_bms']))?$daoyat['shilpi_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_br" data-title="Enter"><?php echo $shilpi_br=  (isset( $daoyat['shilpi_br']))?$daoyat['shilpi_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_gt" data-title="Enter"><?php echo $shilpi_gt=  (isset( $daoyat['shilpi_gt']))?$daoyat['shilpi_gt']:'' ?></a>
                       </td>
                     
                       <td class="tg-y698"> হস্ত (কারু) শিল্পী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h_shilpi_pus" data-title="Enter"><?php echo $h_shilpi_pus=  (isset( $daoyat['h_shilpi_pus']))?$daoyat['h_shilpi_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h_shilpi_bms" data-title="Enter"><?php echo $h_shilpi_bms=  (isset( $daoyat['h_shilpi_bms']))?$daoyat['h_shilpi_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h_shilpi_br" data-title="Enter"><?php echo $h_shilpi_br=  (isset( $daoyat['h_shilpi_br']))?$daoyat['h_shilpi_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h_shilpi_gt" data-title="Enter"><?php echo $h_shilpi_gt=  (isset( $daoyat['h_shilpi_gt']))?$daoyat['h_shilpi_gt']:'' ?></a>
                       </td>
                    
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">অভিনয় শিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovi_shilpi_pus" data-title="Enter"><?php echo $ovi_shilpi_pus=  (isset( $daoyat['ovi_shilpi_pus']))?$daoyat['ovi_shilpi_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovi_shilpi_bms" data-title="Enter"><?php echo $ovi_shilpi_bms=  (isset( $daoyat['ovi_shilpi_bms']))?$daoyat['ovi_shilpi_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovi_shilpi_br" data-title="Enter"><?php echo $ovi_shilpi_br=  (isset( $daoyat['ovi_shilpi_br']))?$daoyat['ovi_shilpi_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovi_shilpi_gt" data-title="Enter"><?php echo $ovi_shilpi_gt=  (isset( $daoyat['ovi_shilpi_gt']))?$daoyat['ovi_shilpi_gt']:'' ?></a>
                       </td>
                     
                       <td class="tg-y698">ফ্যাশন ডিজাইনার  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fasun_d_pus" data-title="Enter"><?php echo $fasun_d_pus=  (isset( $daoyat['fasun_d_pus']))?$daoyat['fasun_d_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fasun_d_bms" data-title="Enter"><?php echo $fasun_d_bms=  (isset( $daoyat['fasun_d_bms']))?$daoyat['fasun_d_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fasun_d_br" data-title="Enter"><?php echo $fasun_d_br=  (isset( $daoyat['fasun_d_br']))?$daoyat['fasun_d_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fasun_d_gt" data-title="Enter"><?php echo $fasun_d_gt=  (isset( $daoyat['fasun_d_gt']))?$daoyat['fasun_d_gt']:'' ?></a>
                       </td>
                    
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">আবৃত্তি শিল্পী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abr_shilpi_pus" data-title="Enter"><?php echo $abr_shilpi_pus=  (isset( $daoyat['abr_shilpi_pus']))?$daoyat['abr_shilpi_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abr_shilpi_bms" data-title="Enter"><?php echo $abr_shilpi_bms=  (isset( $daoyat['abr_shilpi_bms']))?$daoyat['abr_shilpi_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abr_shilpi_br" data-title="Enter"><?php echo $abr_shilpi_br=  (isset( $daoyat['abr_shilpi_br']))?$daoyat['abr_shilpi_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abr_shilpi_gt" data-title="Enter"><?php echo $abr_shilpi_gt=  (isset( $daoyat['abr_shilpi_gt']))?$daoyat['abr_shilpi_gt']:'' ?></a>
                       </td>
                     

                       <td class="tg-y698">স্থাপত্য শিল্পী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stapto_pus" data-title="Enter"><?php echo $stapto_pus=  (isset( $daoyat['stapto_pus']))?$daoyat['stapto_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stapto_bms" data-title="Enter"><?php echo $stapto_bms=  (isset( $daoyat['stapto_bms']))?$daoyat['stapto_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stapto_br" data-title="Enter"><?php echo $stapto_br=  (isset( $daoyat['stapto_br']))?$daoyat['stapto_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stapto_gt" data-title="Enter"><?php echo $stapto_gt=  (isset( $daoyat['stapto_gt']))?$daoyat['stapto_gt']:'' ?></a>
                       </td>
                </tr>

                <tr>
                       <td class="tg-y698">উপস্থাপক </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_pus" data-title="Enter"><?php echo $updeshta_pus=  (isset( $daoyat['updeshta_pus']))?$daoyat['updeshta_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_bms" data-title="Enter"><?php echo $updeshta_bms=  (isset( $daoyat['updeshta_bms']))?$daoyat['updeshta_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_br" data-title="Enter"><?php echo $updeshta_br=  (isset( $daoyat['updeshta_br']))?$daoyat['updeshta_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_gt" data-title="Enter"><?php echo $updeshta_gt=  (isset( $daoyat['updeshta_gt']))?$daoyat['updeshta_gt']:'' ?></a>
                       </td>
                     

                       <td class="tg-y698">শুভাকাক্সক্ষী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suvakankhi_pus" data-title="Enter"><?php echo $suvakankhi_pus=  (isset( $daoyat['suvakankhi_pus']))?$daoyat['suvakankhi_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suvakankhi_bms" data-title="Enter"><?php echo $suvakankhi_bms=  (isset( $daoyat['suvakankhi_bms']))?$daoyat['suvakankhi_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suvakankhi_br" data-title="Enter"><?php echo $suvakankhi_br=  (isset( $daoyat['suvakankhi_br']))?$daoyat['suvakankhi_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suvakankhi_gt" data-title="Enter"><?php echo $suvakankhi_gt=  (isset( $daoyat['suvakankhi_gt']))?$daoyat['suvakankhi_gt']:'' ?></a>
                       </td>
                </tr>
                <tr>
                       <td class="tg-y698">চিত্র শিল্পী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chit_shilpi_pus" data-title="Enter"><?php echo $chit_shilpi_pus=  (isset( $daoyat['chit_shilpi_pus']))?$daoyat['chit_shilpi_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chit_shilpi_bms" data-title="Enter"><?php echo $chit_shilpi_bms=  (isset( $daoyat['chit_shilpi_bms']))?$daoyat['chit_shilpi_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chit_shilpi_br" data-title="Enter"><?php echo $chit_shilpi_br=  (isset( $daoyat['chit_shilpi_br']))?$daoyat['chit_shilpi_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chit_shilpi_gt" data-title="Enter"><?php echo $chit_shilpi_gt=  (isset( $daoyat['chit_shilpi_gt']))?$daoyat['chit_shilpi_gt']:'' ?></a>
                       </td>
                     

                       <td class="tg-y698">উপদেষ্টা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_pus" data-title="Enter"><?php echo $updeshta_pus=  (isset( $daoyat['updeshta_pus']))?$daoyat['updeshta_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_bms" data-title="Enter"><?php echo $updeshta_bms=  (isset( $daoyat['updeshta_bms']))?$daoyat['updeshta_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_br" data-title="Enter"><?php echo $updeshta_br=  (isset( $daoyat['updeshta_br']))?$daoyat['updeshta_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="daoyat" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="updeshta_gt" data-title="Enter"><?php echo $updeshta_gt=  (isset( $daoyat['updeshta_gt']))?$daoyat['updeshta_gt']:'' ?></a>
                       </td>
                </tr>
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
