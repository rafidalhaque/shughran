<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'এইচএসসি ফলাফল পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/hsc-folafol-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/hsc-folafol-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                               <td class="tg-pwj7" rowspan="2">ক্রম</td>
                              
                                <td class="tg-pwj7" colspan="2">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="2">মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" colspan="2">  জিপিএ 5</td>
                                <td class="tg-pwj7" colspan="2"> এ গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">এ- গ্রেড  </td>
                                <td class="tg-pwj7" colspan="2">বি গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">সি গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">ডি গ্রেড </td>
                                <td class="tg-pwj7" colspan="2">মোট</td>
                            </tr>

                            <tr>
                               
                               
                   
                               
                                
                                
                                
                               
                            </tr>

                            <?php
                            $pk = (isset($hsc_folafol_porisonkhan['id']))?$hsc_folafol_porisonkhan['id']:'';
                            ?>

                            <tr>
                            
                            
                                
                            <td class="tg-y698 type_1"rowspan="3"> ১	</td>
                            <td class="tg-y698 type_1" rowspan="3"> সদস্য	</td>
                            <td class="tg-0pky" >বিজ্ঞান </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_mp" data-title="Enter"><?php echo $sod_bg_mp=  (isset( $hsc_folafol_porisonkhan['sod_bg_mp']))? $hsc_folafol_porisonkhan['sod_bg_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_gpa5" data-title="Enter"><?php echo $sod_bg_gpa5=  (isset( $hsc_folafol_porisonkhan['sod_bg_gpa5']))? $hsc_folafol_porisonkhan['sod_bg_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_agred" data-title="Enter"><?php echo $sod_bg_agred=  (isset( $hsc_folafol_porisonkhan['sod_bg_agred']))? $hsc_folafol_porisonkhan['sod_bg_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"   colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_a_gred" data-title="Enter"><?php echo $sod_bg_a_gred=  (isset( $hsc_folafol_porisonkhan['sod_bg_a_gred']))? $hsc_folafol_porisonkhan['sod_bg_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_bgred" data-title="Enter"><?php echo $sod_bg_bgred=  (isset( $hsc_folafol_porisonkhan['sod_bg_bgred']))? $hsc_folafol_porisonkhan['sod_bg_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_cgred" data-title="Enter"><?php echo $sod_bg_cgred=  (isset( $hsc_folafol_porisonkhan['sod_bg_cgred']))? $hsc_folafol_porisonkhan['sod_bg_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bg_dgred" data-title="Enter"><?php echo $sod_bg_dgred=  (isset( $hsc_folafol_porisonkhan['sod_bg_dgred']))? $hsc_folafol_porisonkhan['sod_bg_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2" >
                            <?php echo $sod_bg=($sod_bg_mp+$sod_bg_gpa5+$sod_bg_agred+$sod_bg_a_gred+$sod_bg_bgred+$sod_bg_cgred+$sod_bg_dgred)?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_mp" data-title="Enter"><?php echo $sod_mb_mp=  (isset( $hsc_folafol_porisonkhan['sod_mb_mp']))? $hsc_folafol_porisonkhan['sod_mb_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_gpa5" data-title="Enter"><?php echo $sod_mb_gpa5=  (isset( $hsc_folafol_porisonkhan['sod_mb_gpa5']))? $hsc_folafol_porisonkhan['sod_mb_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_agred" data-title="Enter"><?php echo $sod_mb_agred=  (isset( $hsc_folafol_porisonkhan['sod_mb_agred']))? $hsc_folafol_porisonkhan['sod_mb_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_a_gred" data-title="Enter"><?php echo $sod_mb_a_gred=  (isset( $hsc_folafol_porisonkhan['sod_mb_a_gred']))? $hsc_folafol_porisonkhan['sod_mb_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_bgred" data-title="Enter"><?php echo $sod_mb_bgred=  (isset( $hsc_folafol_porisonkhan['sod_mb_bgred']))? $hsc_folafol_porisonkhan['sod_mb_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_cgred" data-title="Enter"><?php echo $sod_mb_cgred=  (isset( $hsc_folafol_porisonkhan['sod_mb_cgred']))? $hsc_folafol_porisonkhan['sod_mb_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mb_dgred" data-title="Enter"><?php echo $sod_mb_dgred=  (isset( $hsc_folafol_porisonkhan['sod_mb_dgred']))? $hsc_folafol_porisonkhan['sod_mb_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $sod_mb=($sod_mb_mp+$sod_mb_gpa5+$sod_mb_agred+$sod_mb_a_gred+$sod_mb_bgred+$sod_mb_cgred+$sod_mb_dgred)?>
                            </td>

                        </tr>
                        <tr>
                            <td class="tg-0pky">ব্যবসায়</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_mp" data-title="Enter"><?php echo $sod_bs_mp=  (isset( $hsc_folafol_porisonkhan['sod_bs_mp']))? $hsc_folafol_porisonkhan['sod_bs_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_gpa5" data-title="Enter"><?php echo $sod_bs_gpa5=  (isset( $hsc_folafol_porisonkhan['sod_bs_gpa5']))? $hsc_folafol_porisonkhan['sod_bs_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_agred" data-title="Enter"><?php echo $sod_bs_agred=  (isset( $hsc_folafol_porisonkhan['sod_bs_agred']))? $hsc_folafol_porisonkhan['sod_bs_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_a_gred" data-title="Enter"><?php echo $sod_bs_a_gred=  (isset( $hsc_folafol_porisonkhan['sod_bs_a_gred']))? $hsc_folafol_porisonkhan['sod_bs_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_bgred" data-title="Enter"><?php echo $sod_bs_bgred=  (isset( $hsc_folafol_porisonkhan['sod_bs_bgred']))? $hsc_folafol_porisonkhan['sod_bs_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_cgred" data-title="Enter"><?php echo $sod_bs_cgred=  (isset( $hsc_folafol_porisonkhan['sod_bs_cgred']))? $hsc_folafol_porisonkhan['sod_bs_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_bs_dgred" data-title="Enter"><?php echo $sod_bs_dgred=  (isset( $hsc_folafol_porisonkhan['sod_bs_dgred']))? $hsc_folafol_porisonkhan['sod_bs_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $sod_bs=($sod_bs_mp+$sod_bs_gpa5+$sod_bs_agred+$sod_bs_a_gred+$sod_bs_bgred+$sod_bs_cgred+$sod_bs_dgred)?>
                            </td>

                        </tr>

                        <tr>
                        
                        
                            
                            <td class="tg-y698 type_1"rowspan="3"> ২	</td>
                            <td class="tg-y698 type_1" rowspan="3"> সাথী	</td>
                            <td class="tg-0pky">বিজ্ঞান </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_mp" data-title="Enter"><?php echo $sat_bg_mp=  (isset( $hsc_folafol_porisonkhan['sat_bg_mp']))? $hsc_folafol_porisonkhan['sat_bg_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_gpa5" data-title="Enter"><?php echo $sat_bg_gpa5=  (isset( $hsc_folafol_porisonkhan['sat_bg_gpa5']))? $hsc_folafol_porisonkhan['sat_bg_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_agred" data-title="Enter"><?php echo $sat_bg_agred=  (isset( $hsc_folafol_porisonkhan['sat_bg_agred']))? $hsc_folafol_porisonkhan['sat_bg_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_a_gred" data-title="Enter"><?php echo $sat_bg_a_gred=  (isset( $hsc_folafol_porisonkhan['sat_bg_a_gred']))? $hsc_folafol_porisonkhan['sat_bg_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_bgred" data-title="Enter"><?php echo $sat_bg_bgred=  (isset( $hsc_folafol_porisonkhan['sat_bg_bgred']))? $hsc_folafol_porisonkhan['sat_bg_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_cgred" data-title="Enter"><?php echo $sat_bg_cgred=  (isset( $hsc_folafol_porisonkhan['sat_bg_cgred']))? $hsc_folafol_porisonkhan['sat_bg_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bg_dgred" data-title="Enter"><?php echo $sat_bg_dgred=  (isset( $hsc_folafol_porisonkhan['sat_bg_dgred']))? $hsc_folafol_porisonkhan['sat_bg_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $sat_bg= ($sat_bg_mp+$sat_bg_gpa5+$sat_bg_agred+$sat_bg_a_gred+$sat_bg_bgred+$sat_bg_cgred+$sat_bg_dgred)?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_mp" data-title="Enter"><?php echo $sat_mb_mp=  (isset( $hsc_folafol_porisonkhan['sat_mb_mp']))? $hsc_folafol_porisonkhan['sat_mb_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_gpa5" data-title="Enter"><?php echo $sat_mb_gpa5=  (isset( $hsc_folafol_porisonkhan['sat_mb_gpa5']))? $hsc_folafol_porisonkhan['sat_mb_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_agred" data-title="Enter"><?php echo $sat_mb_agred=  (isset( $hsc_folafol_porisonkhan['sat_mb_agred']))? $hsc_folafol_porisonkhan['sat_mb_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_a_gred" data-title="Enter"><?php echo $sat_mb_a_gred=  (isset( $hsc_folafol_porisonkhan['sat_mb_a_gred']))? $hsc_folafol_porisonkhan['sat_mb_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_bgred" data-title="Enter"><?php echo $sat_mb_bgred=  (isset( $hsc_folafol_porisonkhan['sat_mb_bgred']))? $hsc_folafol_porisonkhan['sat_mb_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_cgred" data-title="Enter"><?php echo $sat_mb_cgred=  (isset( $hsc_folafol_porisonkhan['sat_mb_cgred']))? $hsc_folafol_porisonkhan['sat_mb_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mb_dgred" data-title="Enter"><?php echo $sat_mb_dgred=  (isset( $hsc_folafol_porisonkhan['sat_mb_dgred']))? $hsc_folafol_porisonkhan['sat_mb_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $sat_mb=($sat_mb_mp+$sat_mb_gpa5+$sat_mb_agred+$sat_mb_a_gred+$sat_mb_bgred+$sat_mb_cgred+$sat_mb_dgred)?>
                            </td>

                        </tr>
                        <tr>
                            <td class="tg-0pky">ব্যবসায়</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_mp" data-title="Enter"><?php echo $sat_bs_mp=  (isset( $hsc_folafol_porisonkhan['sat_bs_mp']))? $hsc_folafol_porisonkhan['sat_bs_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_gpa5" data-title="Enter"><?php echo $sat_bs_gpa5=  (isset( $hsc_folafol_porisonkhan['sat_bs_gpa5']))? $hsc_folafol_porisonkhan['sat_bs_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_agred" data-title="Enter"><?php echo $sat_bs_agred=  (isset( $hsc_folafol_porisonkhan['sat_bs_agred']))? $hsc_folafol_porisonkhan['sat_bs_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_a_gred" data-title="Enter"><?php echo $sat_bs_a_gred=  (isset( $hsc_folafol_porisonkhan['sat_bs_a_gred']))? $hsc_folafol_porisonkhan['sat_bs_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_bgred" data-title="Enter"><?php echo $sat_bs_bgred=  (isset( $hsc_folafol_porisonkhan['sat_bs_bgred']))? $hsc_folafol_porisonkhan['sat_bs_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_cgred" data-title="Enter"><?php echo $sat_bs_cgred=  (isset( $hsc_folafol_porisonkhan['sat_bs_cgred']))? $hsc_folafol_porisonkhan['sat_bs_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_bs_dgred" data-title="Enter"><?php echo $sat_bs_dgred=  (isset( $hsc_folafol_porisonkhan['sat_bs_dgred']))? $hsc_folafol_porisonkhan['sat_bs_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $sat_bs=($sat_bs_mp+$sat_bs_gpa5+$sat_bs_agred+$sat_bs_a_gred+$sat_bs_bgred+$sat_bs_cgred+$sat_bs_dgred)?>
                            </td>

                        </tr>

                        <tr>
                        
                            <td class="tg-y698 type_1" rowspan="3"> ৩	</td>
                            <td class="tg-y698 type_1" rowspan="3"> কর্মী	</td>
                            
                            <td class="tg-0pky">বিজ্ঞান </td>
                        
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_mp" data-title="Enter"><?php echo $kor_bg_mp=  (isset( $hsc_folafol_porisonkhan['kor_bg_mp']))? $hsc_folafol_porisonkhan['kor_bg_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_gpa5" data-title="Enter"><?php echo $kor_bg_gpa5=  (isset( $hsc_folafol_porisonkhan['kor_bg_gpa5']))? $hsc_folafol_porisonkhan['kor_bg_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_agred" data-title="Enter"><?php echo $kor_bg_agred=  (isset( $hsc_folafol_porisonkhan['kor_bg_agred']))? $hsc_folafol_porisonkhan['kor_bg_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_a_gred" data-title="Enter"><?php echo $kor_bg_a_gred=  (isset( $hsc_folafol_porisonkhan['kor_bg_a_gred']))? $hsc_folafol_porisonkhan['kor_bg_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_bgred" data-title="Enter"><?php echo $kor_bg_bgred=  (isset( $hsc_folafol_porisonkhan['kor_bg_bgred']))? $hsc_folafol_porisonkhan['kor_bg_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_cgred" data-title="Enter"><?php echo $kor_bg_cgred=  (isset( $hsc_folafol_porisonkhan['kor_bg_cgred']))? $hsc_folafol_porisonkhan['kor_bg_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bg_dgred" data-title="Enter"><?php echo $kor_bg_dgred=  (isset( $hsc_folafol_porisonkhan['kor_bg_dgred']))? $hsc_folafol_porisonkhan['kor_bg_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $kor_bg=($kor_bg_mp+$kor_bg_gpa5+$kor_bg_agred+$kor_bg_a_gred+$kor_bg_bgred+$kor_bg_cgred+$kor_bg_dgred)?>
                            </td>

                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_mp" data-title="Enter"><?php echo $kor_mb_mp=  (isset( $hsc_folafol_porisonkhan['kor_mb_mp']))? $hsc_folafol_porisonkhan['kor_mb_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_gpa5" data-title="Enter"><?php echo $kor_mb_gpa5=  (isset( $hsc_folafol_porisonkhan['kor_mb_gpa5']))? $hsc_folafol_porisonkhan['kor_mb_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_agred" data-title="Enter"><?php echo $kor_mb_agred=  (isset( $hsc_folafol_porisonkhan['kor_mb_agred']))? $hsc_folafol_porisonkhan['kor_mb_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_a_gred" data-title="Enter"><?php echo $kor_mb_a_gred=  (isset( $hsc_folafol_porisonkhan['kor_mb_a_gred']))? $hsc_folafol_porisonkhan['kor_mb_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_bgred" data-title="Enter"><?php echo $kor_mb_bgred=  (isset( $hsc_folafol_porisonkhan['kor_mb_bgred']))? $hsc_folafol_porisonkhan['kor_mb_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_cgred" data-title="Enter"><?php echo $kor_mb_cgred=  (isset( $hsc_folafol_porisonkhan['kor_mb_cgred']))? $hsc_folafol_porisonkhan['kor_mb_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mb_dgred" data-title="Enter"><?php echo $kor_mb_dgred=  (isset( $hsc_folafol_porisonkhan['kor_mb_dgred']))? $hsc_folafol_porisonkhan['kor_mb_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $kor_mb=($kor_mb_mp+$kor_mb_gpa5+$kor_mb_agred+$kor_mb_a_gred+$kor_mb_bgred+$kor_mb_cgred+$kor_mb_dgred)?>
                            </td>

                        </tr>
                        <tr>
                            <td class="tg-0pky">ব্যবসায়</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_mp" data-title="Enter"><?php echo $kor_bs_mp=  (isset( $hsc_folafol_porisonkhan['kor_bs_mp']))? $hsc_folafol_porisonkhan['kor_bs_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_gpa5" data-title="Enter"><?php echo $kor_bs_gpa5=  (isset( $hsc_folafol_porisonkhan['kor_bs_gpa5']))? $hsc_folafol_porisonkhan['kor_bs_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_agred" data-title="Enter"><?php echo $kor_bs_agred=  (isset( $hsc_folafol_porisonkhan['kor_bs_agred']))? $hsc_folafol_porisonkhan['kor_bs_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_a_gred" data-title="Enter"><?php echo $kor_bs_a_gred=  (isset( $hsc_folafol_porisonkhan['kor_bs_a_gred']))? $hsc_folafol_porisonkhan['kor_bs_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_bgred" data-title="Enter"><?php echo $kor_bs_bgred=  (isset( $hsc_folafol_porisonkhan['kor_bs_bgred']))? $hsc_folafol_porisonkhan['kor_bs_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_cgred" data-title="Enter"><?php echo $kor_bs_cgred=  (isset( $hsc_folafol_porisonkhan['kor_bs_cgred']))? $hsc_folafol_porisonkhan['kor_bs_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_bs_dgred" data-title="Enter"><?php echo $kor_bs_dgred=  (isset( $hsc_folafol_porisonkhan['kor_bs_dgred']))? $hsc_folafol_porisonkhan['kor_bs_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $kor_bs=($kor_bs_mp+$kor_bs_gpa5+$kor_bs_agred+$kor_bs_a_gred+$kor_bs_bgred+$kor_bs_cgred+$kor_bs_dgred)?>
                            </td>

                        </tr>
                        <tr>
                        
                            <td class="tg-y698 type_1"rowspan="3"> ৪	</td>
                            <td class="tg-y698" rowspan="3">সমর্থক  </td>
                            
                            <td class="tg-0pky">বিজ্ঞান </td>
                      
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_mp" data-title="Enter"><?php echo $som_bg_mp=  (isset( $hsc_folafol_porisonkhan['som_bg_mp']))? $hsc_folafol_porisonkhan['som_bg_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_gpa5" data-title="Enter"><?php echo $som_bg_gpa5=  (isset( $hsc_folafol_porisonkhan['som_bg_gpa5']))? $hsc_folafol_porisonkhan['som_bg_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_agred" data-title="Enter"><?php echo $som_bg_agred=  (isset( $hsc_folafol_porisonkhan['som_bg_agred']))? $hsc_folafol_porisonkhan['som_bg_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_a_gred" data-title="Enter"><?php echo $som_bg_a_gred=  (isset( $hsc_folafol_porisonkhan['som_bg_a_gred']))? $hsc_folafol_porisonkhan['som_bg_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_bgred" data-title="Enter"><?php echo $som_bg_bgred=  (isset( $hsc_folafol_porisonkhan['som_bg_bgred']))? $hsc_folafol_porisonkhan['som_bg_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_cgred" data-title="Enter"><?php echo $som_bg_cgred=  (isset( $hsc_folafol_porisonkhan['som_bg_cgred']))? $hsc_folafol_porisonkhan['som_bg_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bg_dgred" data-title="Enter"><?php echo $som_bg_dgred=  (isset( $hsc_folafol_porisonkhan['som_bg_dgred']))? $hsc_folafol_porisonkhan['som_bg_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $som_bg=($som_bg_mp+$som_bg_gpa5+$som_bg_agred+$som_bg_a_gred+$som_bg_bgred+$som_bg_cgred+$som_bg_dgred)?>
                            </td>

                        </tr>
                        <tr>
                            <td class="tg-0pky">মানবিক</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_mp" data-title="Enter"><?php echo $som_mb_mp=  (isset( $hsc_folafol_porisonkhan['som_mb_mp']))? $hsc_folafol_porisonkhan['som_mb_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_gpa5" data-title="Enter"><?php echo $som_mb_gpa5=  (isset( $hsc_folafol_porisonkhan['som_mb_gpa5']))? $hsc_folafol_porisonkhan['som_mb_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_agred" data-title="Enter"><?php echo $som_mb_agred=  (isset( $hsc_folafol_porisonkhan['som_mb_agred']))? $hsc_folafol_porisonkhan['som_mb_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_a_gred" data-title="Enter"><?php echo $som_mb_a_gred=  (isset( $hsc_folafol_porisonkhan['som_mb_a_gred']))? $hsc_folafol_porisonkhan['som_mb_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_bgred" data-title="Enter"><?php echo $som_mb_bgred=  (isset( $hsc_folafol_porisonkhan['som_mb_bgred']))? $hsc_folafol_porisonkhan['som_mb_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_cgred" data-title="Enter"><?php echo $som_mb_cgred=  (isset( $hsc_folafol_porisonkhan['som_mb_cgred']))? $hsc_folafol_porisonkhan['som_mb_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_mb_dgred" data-title="Enter"><?php echo $som_mb_dgred=  (isset( $hsc_folafol_porisonkhan['som_mb_dgred']))? $hsc_folafol_porisonkhan['som_mb_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $som_mb=($som_mb_mp+$som_mb_gpa5+$som_mb_agred+$som_mb_a_gred+$som_mb_bgred+$som_mb_cgred+$som_mb_dgred)?>
                            </td>

                        </tr>
                        <tr>
                            <td class="tg-0pky">ব্যবসায়</td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_mp" data-title="Enter"><?php echo $som_bs_mp=  (isset( $hsc_folafol_porisonkhan['som_bs_mp']))? $hsc_folafol_porisonkhan['som_bs_mp']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_gpa5" data-title="Enter"><?php echo $som_bs_gpa5=  (isset( $hsc_folafol_porisonkhan['som_bs_gpa5']))? $hsc_folafol_porisonkhan['som_bs_gpa5']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_agred" data-title="Enter"><?php echo $som_bs_agred=  (isset( $hsc_folafol_porisonkhan['som_bs_agred']))? $hsc_folafol_porisonkhan['som_bs_agred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_a_gred" data-title="Enter"><?php echo $som_bs_a_gred=  (isset( $hsc_folafol_porisonkhan['som_bs_a_gred']))? $hsc_folafol_porisonkhan['som_bs_a_gred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_bgred" data-title="Enter"><?php echo $som_bs_bgred=  (isset( $hsc_folafol_porisonkhan['som_bs_bgred']))? $hsc_folafol_porisonkhan['som_bs_bgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_cgred" data-title="Enter"><?php echo $som_bs_cgred=  (isset( $hsc_folafol_porisonkhan['som_bs_cgred']))? $hsc_folafol_porisonkhan['som_bs_cgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="hsc_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="som_bs_dgred" data-title="Enter"><?php echo $som_bs_dgred=  (isset( $hsc_folafol_porisonkhan['som_bs_dgred']))? $hsc_folafol_porisonkhan['som_bs_dgred']:'0' ?></a>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $som_bs=($som_bs_mp+$som_bs_gpa5+$som_bs_agred+$som_bs_a_gred+$som_bs_bgred+$som_bs_cgred+$som_bs_dgred)?>
                            </td>

                        </tr>
                      
                        <tr>
                        
                  
                        <tr>
                        
                        
                          
                            <td class="tg-0pky" colspan="3">মোট</td>    
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $mp=($sod_bg_mp+$sod_mb_mp+$sod_bs_mp+$sat_bg_mp+$sat_mb_mp+$sat_bs_mp+$kor_bg_mp+$kor_mb_mp+$kor_bs_mp+$som_bg_mp+$som_mb_mp+$som_bs_mp)?>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $gpa5=($sod_bg_gpa5+$sod_mb_gpa5+$sod_bs_gpa5+$sat_bg_gpa5+$sat_mb_gpa5+$sat_bs_gpa5+$kor_bg_gpa5+$kor_mb_gpa5+$kor_bs_gpa5+$som_bg_gpa5+$som_mb_gpa5+$som_bs_gpa5)?>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $agred=($sod_bg_agred+$sod_mb_agred+$sod_bs_agred+$sat_bg_agred+$sat_mb_agred+$sat_bs_agred+$kor_bg_agred+$kor_mb_agred+$kor_bs_agred+$som_bg_agred+$som_mb_agred+$som_bs_agred)?>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo $a_gred=($sod_bg_a_gred+$sod_mb_a_gred+$sod_bs_a_gred+$sat_bg_a_gred+$sat_mb_a_gred+$sat_bs_a_gred+$kor_bg_a_gred+$kor_mb_a_gred+$kor_bs_a_gred+$som_bg_a_gred+$som_mb_a_gred+$som_bs_a_gred)?>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $bgred=($sod_bg_bgred+$sod_mb_bgred+$sod_bs_bgred+$sat_bg_bgred+$sat_mb_bgred+$sat_bs_bgred+$kor_bg_bgred+$kor_mb_bgred+$kor_bs_bgred+$som_bg_bgred+$som_mb_bgred+$som_bs_bgred)?>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $cgred=($sod_bg_cgred+$sod_mb_cgred+$sod_bs_cgred+$sat_bg_cgred+$sat_mb_cgred+$sat_bs_cgred+$kor_bg_cgred+$kor_mb_cgred+$kor_bs_cgred+$som_bg_cgred+$som_mb_cgred+$som_bs_cgred)?>
                            </td>
                            <td class="tg-0pky"  colspan="2">
                            <?php echo $dgred=($sod_bg_dgred+$sod_mb_dgred+$sod_bs_dgred+$sat_bg_dgred+$sat_mb_dgred+$sat_bs_dgred+$kor_bg_dgred+$kor_mb_dgred+$kor_bs_dgred+$som_bg_dgred+$som_mb_dgred+$som_bs_dgred)?>
                            </td>
                            <td class="tg-0pky" colspan="2" >
                            <?php echo ($mp+$gpa5+$agred+$a_gred+$bgred+$cgred+$dgred)?>
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
