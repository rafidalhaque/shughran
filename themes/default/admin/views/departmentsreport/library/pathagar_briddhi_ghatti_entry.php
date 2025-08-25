<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'এ সেশনে পাঠাগার বৃদ্ধি ও ঘাটতি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/pathagar-briddhi-ghatti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/pathagar-briddhi-ghatti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3">ক্রম </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">থানার নাম  </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধির সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">ঘাটতি  সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বই ঘাটতি সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বই বৃদ্ধির সংখ্যা</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>


                   <?php $pk = (isset($a_seshone_pathagar_briddhi_gatti['id']))?$a_seshone_pathagar_briddhi_gatti['id']:'';?>

                   <tr>
                       <td class="tg-y698 type_1"> ১	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">২ </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">৩</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">৪ </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">৫  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">৬</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">৭ </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">৮  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   </tr>
                   <tr>
                       <td class="tg-y698">৯  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">১০ </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thrn" data-title="Enter"><?php echo $thrn=  (isset( $a_seshone_pathagar_briddhi_gatti['thrn']))?$a_seshone_pathagar_briddhi_gatti['thrn']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brs" data-title="Enter"><?php echo $brs=  (isset( $a_seshone_pathagar_briddhi_gatti['brs']))?$a_seshone_pathagar_briddhi_gatti['brs']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gts" data-title="Enter"><?php echo $gts=  (isset( $a_seshone_pathagar_briddhi_gatti['gts']))?$a_seshone_pathagar_briddhi_gatti['gts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgts" data-title="Enter"><?php echo $bgts=  (isset( $a_seshone_pathagar_briddhi_gatti['bgts']))?$a_seshone_pathagar_briddhi_gatti['bgts']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="a_seshone_pathagar_briddhi_gatti" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbrs" data-title="Enter"><?php echo $bbrs=  (isset( $a_seshone_pathagar_briddhi_gatti['bbrs']))?$a_seshone_pathagar_briddhi_gatti['bbrs']:'' ?></a>
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
