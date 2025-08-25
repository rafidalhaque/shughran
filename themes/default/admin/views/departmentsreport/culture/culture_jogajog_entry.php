<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'যোগাযোগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                
                   <tr>
                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">কতজন  </td>
                       <td class="tg-pwj7" colspan="">কতবার</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>


                   <?php $pk = (isset($saneskritik_bivag_jogajog['id']))?$saneskritik_bivag_jogajog['id']:'';?>

                   <tr>
                       <td class="tg-0pky  type_1">
                       গীতিকার 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gk_kj" data-title="Enter"><?php echo $gk_kj=  (isset( $saneskritik_bivag_jogajog['gk_kj']))?$saneskritik_bivag_jogajog['gk_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gk_kb" data-title="Enter"><?php echo $gk_kb=  (isset( $saneskritik_bivag_jogajog['gk_kb']))?$saneskritik_bivag_jogajog['gk_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ক্বারী			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_kj" data-title="Enter"><?php echo $sk_kj=  (isset( $saneskritik_bivag_jogajog['sk_kj']))?$saneskritik_bivag_jogajog['sk_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_kb" data-title="Enter"><?php echo $sk_kb=  (isset( $saneskritik_bivag_jogajog['sk_kb']))?$saneskritik_bivag_jogajog['sk_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       সাংস্কৃতিক প্রতিষ্ঠান 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nk_kj" data-title="Enter"><?php echo $nk_kj=  (isset( $saneskritik_bivag_jogajog['nk_kj']))?$saneskritik_bivag_jogajog['nk_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nk_kb" data-title="Enter"><?php echo $nk_kb=  (isset( $saneskritik_bivag_jogajog['nk_kb']))?$saneskritik_bivag_jogajog['nk_kb']:'' ?></a>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-0pky  type_1">
                       সুরকার			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nshk_kj" data-title="Enter"><?php echo $nshk_kj=  (isset( $saneskritik_bivag_jogajog['nshk_kj']))?$saneskritik_bivag_jogajog['nshk_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nshk_kb" data-title="Enter"><?php echo $nshk_kb=  (isset( $saneskritik_bivag_jogajog['nshk_kb']))?$saneskritik_bivag_jogajog['nshk_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       আবৃত্তিকার			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_kj" data-title="Enter"><?php echo $shilpi_kj=  (isset( $saneskritik_bivag_jogajog['shilpi_kj']))?$saneskritik_bivag_jogajog['shilpi_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_kb	" data-title="Enter"><?php echo $shilpi_kb	=  (isset( $saneskritik_bivag_jogajog['shilpi_kb']))?$saneskritik_bivag_jogajog['shilpi_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       সাংবাদিক		 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ont_kj" data-title="Enter"><?php echo $ont_kj=  (isset( $saneskritik_bivag_jogajog['ont_kj']))?$saneskritik_bivag_jogajog['ont_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ont_kb" data-title="Enter"><?php echo $ont_kb=  (isset( $saneskritik_bivag_jogajog['ont_kb']))?$saneskritik_bivag_jogajog['ont_kb']:'' ?></a>
                       </td>
             
                      
                   </tr>

                   <tr>
                       <td class="tg-0pky  type_1">
                       নাট্যকার			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akup_kj" data-title="Enter"><?php echo $akup_kj=  (isset( $saneskritik_bivag_jogajog['akup_kj']))?$saneskritik_bivag_jogajog['akup_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akup_kb" data-title="Enter"><?php echo $akup_kb=  (isset( $saneskritik_bivag_jogajog['akup_kb']))?$saneskritik_bivag_jogajog['akup_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       উপস্থাপক			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kr_kj" data-title="Enter"><?php echo $kr_kj=  (isset( $saneskritik_bivag_jogajog['kr_kj']))?$saneskritik_bivag_jogajog['kr_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kr_kb" data-title="Enter"><?php echo $kr_kb=  (isset( $saneskritik_bivag_jogajog['kr_kb']))?$saneskritik_bivag_jogajog['kr_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ইলেকট্রনিক মিডিয়া 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_kj" data-title="Enter"><?php echo $kb_kj=  (isset( $saneskritik_bivag_jogajog['kb_kj']))?$saneskritik_bivag_jogajog['kb_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_kb" data-title="Enter"><?php echo $kb_kb=  (isset( $saneskritik_bivag_jogajog['kb_kb']))?$saneskritik_bivag_jogajog['kb_kb']:'' ?></a>
                       </td>
             
                      
                   </tr>

                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       নির্দেশক			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="lekh_kj" data-title="Enter"><?php echo $lekh_kj=  (isset( $saneskritik_bivag_jogajog['lekh_kj']))?$saneskritik_bivag_jogajog['lekh_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="lekh_kb" data-title="Enter"><?php echo $lekh_kb=  (isset( $saneskritik_bivag_jogajog['lekh_kb']))?$saneskritik_bivag_jogajog['lekh_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       কবি			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stpp_kj" data-title="Enter"><?php echo $stpp_kj=  (isset( $saneskritik_bivag_jogajog['stpp_kj']))?$saneskritik_bivag_jogajog['stpp_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stpp_kb" data-title="Enter"><?php echo $stpp_kb=  (isset( $saneskritik_bivag_jogajog['stpp_kb']))?$saneskritik_bivag_jogajog['stpp_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       অভিভাবক		 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stpth_kj" data-title="Enter"><?php echo $stpth_kj=  (isset( $saneskritik_bivag_jogajog['stpth_kj']))?$saneskritik_bivag_jogajog['stpth_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stpth_kb" data-title="Enter"><?php echo $stpth_kb=  (isset( $saneskritik_bivag_jogajog['stpth_kb']))?$saneskritik_bivag_jogajog['stpth_kb']:'' ?></a>
                       </td>
             
                      
                   </tr>

              
                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       শিল্পী			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdk_kj" data-title="Enter"><?php echo $sbdk_kj=  (isset( $saneskritik_bivag_jogajog['sbdk_kj']))?$saneskritik_bivag_jogajog['sbdk_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdk_kb" data-title="Enter"><?php echo $sbdk_kb=  (isset( $saneskritik_bivag_jogajog['sbdk_kb']))?$saneskritik_bivag_jogajog['sbdk_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       লেখক			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="enm_kj" data-title="Enter"><?php echo $enm_kj=  (isset( $saneskritik_bivag_jogajog['enm_kj']))?$saneskritik_bivag_jogajog['enm_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="enm_kb" data-title="Enter"><?php echo $enm_kb=  (isset( $saneskritik_bivag_jogajog['enm_kb']))?$saneskritik_bivag_jogajog['enm_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       উপদেষ্টা		 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovb_kj" data-title="Enter"><?php echo $ovb_kj=  (isset( $saneskritik_bivag_jogajog['ovb_kj']))?$saneskritik_bivag_jogajog['ovb_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovb_kb" data-title="Enter"><?php echo $ovb_kb=  (isset( $saneskritik_bivag_jogajog['ovb_kb']))?$saneskritik_bivag_jogajog['ovb_kb']:'' ?></a>
                       </td>
             
                      
                   </tr>

              
                   <tr>
                       <td class="tg-0pky  type_1">
                       অভিনেতা			 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovi_n_kj" data-title="Enter"><?php echo $ovi_n_kj=  (isset( $saneskritik_bivag_jogajog['ovi_n_kj']))?$saneskritik_bivag_jogajog['ovi_n_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovi_n_kb" data-title="Enter"><?php echo $ovi_n_kb=  (isset( $saneskritik_bivag_jogajog['ovi_n_kb']))?$saneskritik_bivag_jogajog['ovi_n_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       সাংস্কৃতিক পৃষ্ঠপোষক 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_p_kj" data-title="Enter"><?php echo $sk_p_kj=  (isset( $saneskritik_bivag_jogajog['sk_p_kj']))?$saneskritik_bivag_jogajog['sk_p_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_p_kb" data-title="Enter"><?php echo $sk_p_kb=  (isset( $saneskritik_bivag_jogajog['sk_p_kb']))?$saneskritik_bivag_jogajog['sk_p_kb']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       অন্যান্য		 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kj" data-title="Enter"><?php echo $onnoanno_kj=  (isset( $saneskritik_bivag_jogajog['onnoanno_kj']))?$saneskritik_bivag_jogajog['onnoanno_kj']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="saneskritik_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kb" data-title="Enter"><?php echo $onnoanno_kb=  (isset( $saneskritik_bivag_jogajog['onnoanno_kb']))?$saneskritik_bivag_jogajog['onnoanno_kb']:'' ?></a>
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
