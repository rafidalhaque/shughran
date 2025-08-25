<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০৩(সমাজসেবা)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/professional-output03') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/professional-output03/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="6" style="text-align:center;">কমিশনার </td>
                                <td class="tg-pwj7" colspan="6" style="text-align:center;">সৈনিক  </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2">সেনা </td>
                                <td class="tg-pwj7" colspan="2">নৌ </td>
                                <td class="tg-pwj7" colspan="2">বিমান</td>
                                <td class="tg-pwj7" colspan="2">সেনা </td>
                                <td class="tg-pwj7" colspan="2">নৌ </td>
                                <td class="tg-pwj7" colspan="2"> বিমান </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                               
                            </tr>

                            <?php
                            $pk = (isset($profesonal_output_3['id']))?$profesonal_output_3['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_k_s_target" data-title="Enter"><?php echo $sodosso_k_s_target=  (isset( $profesonal_output_3['sodosso_k_s_target']))? $profesonal_output_3['sodosso_k_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_k_s_orjon" data-title="Enter"><?php echo $sodosso_k_s_orjon=  (isset( $profesonal_output_3['sodosso_k_s_orjon']))? $profesonal_output_3['sodosso_k_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_k_n_target" data-title="Enter"><?php echo $sodosso_k_n_target=  (isset( $profesonal_output_3['sodosso_k_n_target']))? $profesonal_output_3['sodosso_k_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_k_n_orjon" data-title="Enter"><?php echo $sodosso_k_n_orjon=  (isset( $profesonal_output_3['sodosso_k_n_orjon']))? $profesonal_output_3['sodosso_k_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_k_b_target" data-title="Enter"><?php echo $sodosso_k_b_target=  (isset( $profesonal_output_3['sodosso_k_b_target']))? $profesonal_output_3['sodosso_k_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_k_b_orjon" data-title="Enter"><?php echo $sodosso_k_b_orjon=  (isset( $profesonal_output_3['sodosso_k_b_orjon']))? $profesonal_output_3['sodosso_k_b_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_s_s_target" data-title="Enter"><?php echo $sodosso_s_s_target=  (isset( $profesonal_output_3['sodosso_s_s_target']))? $profesonal_output_3['sodosso_s_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_s_s_orjon" data-title="Enter"><?php echo $sodosso_s_s_orjon=  (isset( $profesonal_output_3['sodosso_s_s_orjon']))? $profesonal_output_3['sodosso_s_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_s_n_target" data-title="Enter"><?php echo $sodosso_s_n_target=  (isset( $profesonal_output_3['sodosso_s_n_target']))? $profesonal_output_3['sodosso_s_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_s_n_orjon" data-title="Enter"><?php echo $sodosso_s_n_orjon=  (isset( $profesonal_output_3['sodosso_s_n_orjon']))? $profesonal_output_3['sodosso_s_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_s_b_target" data-title="Enter"><?php echo $sodosso_s_b_target=  (isset( $profesonal_output_3['sodosso_s_b_target']))? $profesonal_output_3['sodosso_s_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_s_b_orjon" data-title="Enter"><?php echo $sodosso_s_b_orjon=  (isset( $profesonal_output_3['sodosso_s_b_orjon']))? $profesonal_output_3['sodosso_s_b_orjon']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_k_s_target" data-title="Enter"><?php echo $sathi_k_s_target=  (isset( $profesonal_output_3['sathi_k_s_target']))? $profesonal_output_3['sathi_k_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_k_s_orjon" data-title="Enter"><?php echo $sathi_k_s_orjon=  (isset( $profesonal_output_3['sathi_k_s_orjon']))? $profesonal_output_3['sathi_k_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_k_n_target" data-title="Enter"><?php echo $sathi_k_n_target=  (isset( $profesonal_output_3['sathi_k_n_target']))? $profesonal_output_3['sathi_k_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_k_n_orjon" data-title="Enter"><?php echo $sathi_k_n_orjon=  (isset( $profesonal_output_3['sathi_k_n_orjon']))? $profesonal_output_3['sathi_k_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_k_b_target" data-title="Enter"><?php echo $sathi_k_b_target=  (isset( $profesonal_output_3['sathi_k_b_target']))? $profesonal_output_3['sathi_k_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_k_b_orjon" data-title="Enter"><?php echo $sathi_k_b_orjon=  (isset( $profesonal_output_3['sathi_k_b_orjon']))? $profesonal_output_3['sathi_k_b_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_s_s_target" data-title="Enter"><?php echo $sathi_s_s_target=  (isset( $profesonal_output_3['sathi_s_s_target']))? $profesonal_output_3['sathi_s_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_s_s_orjon" data-title="Enter"><?php echo $sathi_s_s_orjon=  (isset( $profesonal_output_3['sathi_s_s_orjon']))? $profesonal_output_3['sathi_s_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_s_n_target" data-title="Enter"><?php echo $sathi_s_n_target=  (isset( $profesonal_output_3['sathi_s_n_target']))? $profesonal_output_3['sathi_s_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_s_n_orjon" data-title="Enter"><?php echo $sathi_s_n_orjon=  (isset( $profesonal_output_3['sathi_s_n_orjon']))? $profesonal_output_3['sathi_s_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_s_b_target" data-title="Enter"><?php echo $sathi_s_b_target=  (isset( $profesonal_output_3['sathi_s_b_target']))? $profesonal_output_3['sathi_s_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_s_b_orjon" data-title="Enter"><?php echo $sathi_s_b_orjon=  (isset( $profesonal_output_3['sathi_s_b_orjon']))? $profesonal_output_3['sathi_s_b_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_k_s_target" data-title="Enter"><?php echo $kormi_k_s_target=  (isset( $profesonal_output_3['kormi_k_s_target']))? $profesonal_output_3['kormi_k_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_k_s_orjon" data-title="Enter"><?php echo $kormi_k_s_orjon=  (isset( $profesonal_output_3['kormi_k_s_orjon']))? $profesonal_output_3['kormi_k_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_k_n_target" data-title="Enter"><?php echo $kormi_k_n_target=  (isset( $profesonal_output_3['kormi_k_n_target']))? $profesonal_output_3['kormi_k_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_k_n_orjon" data-title="Enter"><?php echo $kormi_k_n_orjon=  (isset( $profesonal_output_3['kormi_k_n_orjon']))? $profesonal_output_3['kormi_k_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_k_b_target" data-title="Enter"><?php echo $kormi_k_b_target=  (isset( $profesonal_output_3['kormi_k_b_target']))? $profesonal_output_3['kormi_k_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_k_b_orjon" data-title="Enter"><?php echo $kormi_k_b_orjon=  (isset( $profesonal_output_3['kormi_k_b_orjon']))? $profesonal_output_3['kormi_k_b_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_s_s_target" data-title="Enter"><?php echo $kormi_s_s_target=  (isset( $profesonal_output_3['kormi_s_s_target']))? $profesonal_output_3['kormi_s_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_s_s_orjon" data-title="Enter"><?php echo $kormi_s_s_orjon=  (isset( $profesonal_output_3['kormi_s_s_orjon']))? $profesonal_output_3['kormi_s_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_s_n_target" data-title="Enter"><?php echo $kormi_s_n_target=  (isset( $profesonal_output_3['kormi_s_n_target']))? $profesonal_output_3['kormi_s_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_s_n_orjon" data-title="Enter"><?php echo $kormi_s_n_orjon=  (isset( $profesonal_output_3['kormi_s_n_orjon']))? $profesonal_output_3['kormi_s_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_s_b_target" data-title="Enter"><?php echo $kormi_s_b_target=  (isset( $profesonal_output_3['kormi_s_b_target']))? $profesonal_output_3['kormi_s_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_s_b_orjon" data-title="Enter"><?php echo $kormi_s_b_orjon=  (isset( $profesonal_output_3['kormi_s_b_orjon']))? $profesonal_output_3['kormi_s_b_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_k_s_target" data-title="Enter"><?php echo $somorthok_k_s_target=  (isset( $profesonal_output_3['somorthok_k_s_target']))? $profesonal_output_3['somorthok_k_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_k_s_orjon" data-title="Enter"><?php echo $somorthok_k_s_orjon=  (isset( $profesonal_output_3['somorthok_k_s_orjon']))? $profesonal_output_3['somorthok_k_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_k_n_target" data-title="Enter"><?php echo $somorthok_k_n_target=  (isset( $profesonal_output_3['somorthok_k_n_target']))? $profesonal_output_3['somorthok_k_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_k_n_orjon" data-title="Enter"><?php echo $somorthok_k_n_orjon=  (isset( $profesonal_output_3['somorthok_k_n_orjon']))? $profesonal_output_3['somorthok_k_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_k_b_target" data-title="Enter"><?php echo $somorthok_k_b_target=  (isset( $profesonal_output_3['somorthok_k_b_target']))? $profesonal_output_3['somorthok_k_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_k_b_orjon" data-title="Enter"><?php echo $somorthok_k_b_orjon=  (isset( $profesonal_output_3['somorthok_k_b_orjon']))? $profesonal_output_3['somorthok_k_b_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_s_s_target" data-title="Enter"><?php echo $somorthok_s_s_target=  (isset( $profesonal_output_3['somorthok_s_s_target']))? $profesonal_output_3['somorthok_s_s_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_s_s_orjon" data-title="Enter"><?php echo $somorthok_s_s_orjon=  (isset( $profesonal_output_3['somorthok_s_s_orjon']))? $profesonal_output_3['somorthok_s_s_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_s_n_target" data-title="Enter"><?php echo $somorthok_s_n_target=  (isset( $profesonal_output_3['somorthok_s_n_target']))? $profesonal_output_3['somorthok_s_n_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_s_n_orjon" data-title="Enter"><?php echo $somorthok_s_n_orjon=  (isset( $profesonal_output_3['somorthok_s_n_orjon']))? $profesonal_output_3['somorthok_s_n_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_s_b_target" data-title="Enter"><?php echo $somorthok_s_b_target=  (isset( $profesonal_output_3['somorthok_s_b_target']))? $profesonal_output_3['somorthok_s_b_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output_3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_s_b_orjon" data-title="Enter"><?php echo $somorthok_s_b_orjon=  (isset( $profesonal_output_3['somorthok_s_b_orjon']))? $profesonal_output_3['somorthok_s_b_orjon']:'' ?></a>
                                </td>
                            </tr>    
                            </tr>

                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_s_target!=0)?($sodosso_k_s_target+$sathi_k_s_target+$kormi_k_s_target+$somorthok_k_s_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_s_orjon!=0)?($sodosso_k_s_orjon+$sathi_k_s_orjon+$kormi_k_s_orjon+$somorthok_k_s_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_n_target!=0)?($sodosso_k_n_target+$sathi_k_n_target+$kormi_k_n_target+$somorthok_k_n_target):0?>
                               </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_n_orjon!=0)?($sodosso_k_n_orjon+$sathi_k_n_orjon+$kormi_k_n_orjon+$somorthok_k_n_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_b_target!=0)?($sodosso_k_b_target+$sathi_k_b_target+$kormi_k_b_target+$somorthok_k_b_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_b_orjon!=0)?($sodosso_k_b_orjon+$sathi_k_b_orjon+$kormi_k_b_orjon+$somorthok_k_b_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_s_s_target!=0)?($sodosso_s_s_target+$sathi_s_s_target+$kormi_s_s_target+$somorthok_s_s_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_s_s_orjon!=0)?($sodosso_s_s_orjon+$sathi_s_s_orjon+$kormi_s_s_orjon+$somorthok_s_s_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sodosso_s_n_target!=0)?($sodosso_s_n_target+$sathi_s_n_target+$kormi_s_n_target+$somorthok_s_n_target):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sodosso_s_n_orjon!=0)?($sodosso_s_n_orjon+$sathi_s_n_orjon+$kormi_s_n_orjon+$somorthok_s_n_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($sodosso_s_b_target!=0)?($sodosso_s_b_target+$sathi_s_b_target+$kormi_s_b_target+$somorthok_s_b_target):0?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sodosso_s_b_orjon!=0)?($sodosso_s_b_orjon+$sathi_s_b_orjon+$kormi_s_b_orjon+$somorthok_s_b_orjon):0?>
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
