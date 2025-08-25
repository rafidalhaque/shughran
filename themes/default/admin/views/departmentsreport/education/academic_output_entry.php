<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'একাডেমিক আউটপুট ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/academic-output') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/academic-output/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="2"style="border-bottom: hidden;">মেডিকেলে ভর্তি টার্গেট </td>
                                <td class="tg-pwj7" colspan="2"style="border-bottom: hidden;">ইঞ্জি বিশ্ববিদ্যালয় ভর্তি টার্গেট  </td>
                                <td class="tg-pwj7" colspan="4">বিশ্ববিদ্যালয় ভর্তি টার্গেট  </td>
                                <td class="tg-pwj7" colspan="4">ডিপার্টমেন্ট মেধাক্রম (১-৫)  </td>
                                <td class="tg-pwj7" colspan="3" style="border-bottom: hidden;">আদর্শ কলেজ ভর্তি টার্গেট  </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" style="border: none;"></td>
                                <td class="tg-pwj7" style="border: none;"></td>
                                <td class="tg-pwj7" style="border-right: none;"></td>
                                <td class="tg-pwj7" style="border-left: none;"></td>
                                <td class="tg-pwj7" colspan="2">সরকারী  </td>
                                <td class="tg-pwj7" colspan="2">বেসরকারী  </td>
                                <td class="tg-pwj7" colspan="2">সরকারী  </td>
                                <td class="tg-pwj7" colspan="2">বেসরকারী  </td>
                                <td class="tg-pwj7" style="border-right: none;"></td>
                                <td class="tg-pwj7" style="border-left: none;"></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                               
                            </tr>

                            <?php
                            $pk = (isset($academic_output['id']))?$academic_output['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_mvt_target" data-title="Enter"><?php echo $sodosso_mvt_target=  (isset( $academic_output['sodosso_mvt_target']))? $academic_output['sodosso_mvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_mvt_orjon" data-title="Enter"><?php echo $sodosso_mvt_orjon=  (isset( $academic_output['sodosso_mvt_orjon']))? $academic_output['sodosso_mvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_ebvt_target" data-title="Enter"><?php echo $sodosso_ebvt_target=  (isset( $academic_output['sodosso_ebvt_target']))? $academic_output['sodosso_ebvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_ebvt_orjon" data-title="Enter"><?php echo $sodosso_ebvt_orjon=  (isset( $academic_output['sodosso_ebvt_orjon']))? $academic_output['sodosso_ebvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bvt_gov_target" data-title="Enter"><?php echo $sodosso_bvt_gov_target=  (isset( $academic_output['sodosso_bvt_gov_target']))? $academic_output['sodosso_bvt_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bvt_gov_orjon" data-title="Enter"><?php echo $sodosso_bvt_gov_orjon=  (isset( $academic_output['sodosso_bvt_gov_orjon']))? $academic_output['sodosso_bvt_gov_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bvt_pvt_target" data-title="Enter"><?php echo $sodosso_bvt_pvt_target=  (isset( $academic_output['sodosso_bvt_pvt_target']))? $academic_output['sodosso_bvt_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bvt_pvt_orjon" data-title="Enter"><?php echo $sodosso_bvt_pvt_orjon=  (isset( $academic_output['sodosso_bvt_pvt_orjon']))? $academic_output['sodosso_bvt_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_dm_gov_target" data-title="Enter"><?php echo $sodosso_dm_gov_target=  (isset( $academic_output['sodosso_dm_gov_target']))? $academic_output['sodosso_dm_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_dm_gov_orjon" data-title="Enter"><?php echo $sodosso_dm_gov_orjon=  (isset( $academic_output['sodosso_dm_gov_orjon']))? $academic_output['sodosso_dm_gov_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_dm_pvt_target" data-title="Enter"><?php echo $sodosso_dm_pvt_target=  (isset( $academic_output['sodosso_dm_pvt_target']))? $academic_output['sodosso_dm_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_dm_pvt_orjon" data-title="Enter"><?php echo $sodosso_dm_pvt_orjon=  (isset( $academic_output['sodosso_dm_pvt_orjon']))? $academic_output['sodosso_dm_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_13">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_acvt_target" data-title="Enter"><?php echo $sodosso_acvt_target=  (isset( $academic_output['sodosso_acvt_target']))? $academic_output['sodosso_acvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_14">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_acvt_orjon" data-title="Enter"><?php echo $sodosso_acvt_orjon=  (isset( $academic_output['sodosso_acvt_orjon']))? $academic_output['sodosso_acvt_orjon']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_mvt_target" data-title="Enter"><?php echo $sathi_mvt_target=  (isset( $academic_output['sathi_mvt_target']))? $academic_output['sathi_mvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_mvt_orjon" data-title="Enter"><?php echo $sathi_mvt_orjon=  (isset( $academic_output['sathi_mvt_orjon']))? $academic_output['sathi_mvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_ebvt_target" data-title="Enter"><?php echo $sathi_ebvt_target=  (isset( $academic_output['sathi_ebvt_target']))? $academic_output['sathi_ebvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_ebvt_orjon" data-title="Enter"><?php echo $sathi_ebvt_orjon=  (isset( $academic_output['sathi_ebvt_orjon']))? $academic_output['sathi_ebvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bvt_gov_target" data-title="Enter"><?php echo $sathi_bvt_gov_target=  (isset( $academic_output['sathi_bvt_gov_target']))? $academic_output['sathi_bvt_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bvt_gov_orjon" data-title="Enter"><?php echo $sathi_bvt_gov_orjon=  (isset( $academic_output['sathi_bvt_gov_orjon']))? $academic_output['sathi_bvt_gov_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bvt_pvt_target" data-title="Enter"><?php echo $sathi_bvt_pvt_target=  (isset( $academic_output['sathi_bvt_pvt_target']))? $academic_output['sathi_bvt_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bvt_pvt_orjon" data-title="Enter"><?php echo $sathi_bvt_pvt_orjon=  (isset( $academic_output['sathi_bvt_pvt_orjon']))? $academic_output['sathi_bvt_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_dm_gov_target" data-title="Enter"><?php echo $sathi_dm_gov_target=  (isset( $academic_output['sathi_dm_gov_target']))? $academic_output['sathi_dm_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_dm_gov_orjon" data-title="Enter"><?php echo $sathi_dm_gov_orjon=  (isset( $academic_output['sathi_dm_gov_orjon']))? $academic_output['sathi_dm_gov_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_dm_pvt_target" data-title="Enter"><?php echo $sathi_dm_pvt_target=  (isset( $academic_output['sathi_dm_pvt_target']))? $academic_output['sathi_dm_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_dm_pvt_orjon" data-title="Enter"><?php echo $sathi_dm_pvt_orjon=  (isset( $academic_output['sathi_dm_pvt_orjon']))? $academic_output['sathi_dm_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_13">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_acvt_target" data-title="Enter"><?php echo $sathi_acvt_target=  (isset( $academic_output['sathi_acvt_target']))? $academic_output['sathi_acvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_14">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_acvt_orjon" data-title="Enter"><?php echo $sathi_acvt_orjon=  (isset( $academic_output['sathi_acvt_orjon']))? $academic_output['sathi_acvt_orjon']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_mvt_target" data-title="Enter"><?php echo $kormi_mvt_target=  (isset( $academic_output['kormi_mvt_target']))? $academic_output['kormi_mvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_mvt_orjon" data-title="Enter"><?php echo $kormi_mvt_orjon=  (isset( $academic_output['kormi_mvt_orjon']))? $academic_output['kormi_mvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_ebvt_target" data-title="Enter"><?php echo $kormi_ebvt_target=  (isset( $academic_output['kormi_ebvt_target']))? $academic_output['kormi_ebvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_ebvt_orjon" data-title="Enter"><?php echo $kormi_ebvt_orjon=  (isset( $academic_output['kormi_ebvt_orjon']))? $academic_output['kormi_ebvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bvt_gov_target" data-title="Enter"><?php echo $kormi_bvt_gov_target=  (isset( $academic_output['kormi_bvt_gov_target']))? $academic_output['kormi_bvt_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bvt_gov_orjon" data-title="Enter"><?php echo $kormi_bvt_gov_orjon=  (isset( $academic_output['kormi_bvt_gov_orjon']))? $academic_output['kormi_bvt_gov_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bvt_pvt_target" data-title="Enter"><?php echo $kormi_bvt_pvt_target=  (isset( $academic_output['kormi_bvt_pvt_target']))? $academic_output['kormi_bvt_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bvt_pvt_orjon" data-title="Enter"><?php echo $kormi_bvt_pvt_orjon=  (isset( $academic_output['kormi_bvt_pvt_orjon']))? $academic_output['kormi_bvt_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_dm_gov_target" data-title="Enter"><?php echo $kormi_dm_gov_target=  (isset( $academic_output['kormi_dm_gov_target']))? $academic_output['kormi_dm_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_dm_gov_orjon" data-title="Enter"><?php echo $kormi_dm_gov_orjon=  (isset( $academic_output['kormi_dm_gov_orjon']))? $academic_output['kormi_dm_gov_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_dm_pvt_target" data-title="Enter"><?php echo $kormi_dm_pvt_target=  (isset( $academic_output['kormi_dm_pvt_target']))? $academic_output['kormi_dm_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_dm_pvt_orjon" data-title="Enter"><?php echo $kormi_dm_pvt_orjon=  (isset( $academic_output['kormi_dm_pvt_orjon']))? $academic_output['kormi_dm_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_13">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_acvt_target" data-title="Enter"><?php echo $kormi_acvt_target=  (isset( $academic_output['kormi_acvt_target']))? $academic_output['kormi_acvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_14">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_acvt_orjon" data-title="Enter"><?php echo $kormi_acvt_orjon=  (isset( $academic_output['kormi_acvt_orjon']))? $academic_output['kormi_acvt_orjon']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_mvt_target" data-title="Enter"><?php echo $somorthok_mvt_target=  (isset( $academic_output['somorthok_mvt_target']))? $academic_output['somorthok_mvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_mvt_orjon" data-title="Enter"><?php echo $somorthok_mvt_orjon=  (isset( $academic_output['somorthok_mvt_orjon']))? $academic_output['somorthok_mvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_ebvt_target" data-title="Enter"><?php echo $somorthok_ebvt_target=  (isset( $academic_output['somorthok_ebvt_target']))? $academic_output['somorthok_ebvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_ebvt_orjon" data-title="Enter"><?php echo $somorthok_ebvt_orjon=  (isset( $academic_output['somorthok_ebvt_orjon']))? $academic_output['somorthok_ebvt_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bvt_gov_target" data-title="Enter"><?php echo $somorthok_bvt_gov_target=  (isset( $academic_output['somorthok_bvt_gov_target']))? $academic_output['somorthok_bvt_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bvt_gov_orjon" data-title="Enter"><?php echo $somorthok_bvt_gov_orjon=  (isset( $academic_output['somorthok_bvt_gov_orjon']))? $academic_output['somorthok_bvt_gov_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bvt_pvt_target" data-title="Enter"><?php echo $somorthok_bvt_pvt_target=  (isset( $academic_output['somorthok_bvt_pvt_target']))? $academic_output['somorthok_bvt_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bvt_pvt_orjon" data-title="Enter"><?php echo $somorthok_bvt_pvt_orjon=  (isset( $academic_output['somorthok_bvt_pvt_orjon']))? $academic_output['somorthok_bvt_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_dm_gov_target" data-title="Enter"><?php echo $somorthok_dm_gov_target=  (isset( $academic_output['somorthok_dm_gov_target']))? $academic_output['somorthok_dm_gov_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_dm_gov_orjon" data-title="Enter"><?php echo $somorthok_dm_gov_orjon=  (isset( $academic_output['somorthok_dm_gov_orjon']))? $academic_output['somorthok_dm_gov_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_dm_pvt_target" data-title="Enter"><?php echo $somorthok_dm_pvt_target=  (isset( $academic_output['somorthok_dm_pvt_target']))? $academic_output['somorthok_dm_pvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_dm_pvt_orjon" data-title="Enter"><?php echo $somorthok_dm_pvt_orjon=  (isset( $academic_output['somorthok_dm_pvt_orjon']))? $academic_output['somorthok_dm_pvt_orjon']:'' ?></a>
                                </td>
                                </td>
                                <td class="tg-0pky  type_13">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_acvt_target" data-title="Enter"><?php echo $somorthok_acvt_target=  (isset( $academic_output['somorthok_acvt_target']))? $academic_output['somorthok_acvt_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_14">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="academic_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_acvt_orjon" data-title="Enter"><?php echo $somorthok_acvt_orjon=  (isset( $academic_output['somorthok_acvt_orjon']))? $academic_output['somorthok_acvt_orjon']:'' ?></a>
                                </td>
                            </tr>
 
                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_mvt_target+$sathi_mvt_target+$kormi_mvt_target+$somorthok_mvt_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_mvt_orjon+$sathi_mvt_orjon+$kormi_mvt_orjon+$somorthok_mvt_orjon)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_ebvt_target+$sathi_ebvt_target+$kormi_ebvt_target+$somorthok_ebvt_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_ebvt_orjon+$sathi_ebvt_orjon+$kormi_ebvt_orjon+$somorthok_ebvt_orjon)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bvt_gov_target+$sathi_bvt_gov_target+$kormi_bvt_gov_target+$somorthok_bvt_gov_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bvt_gov_orjon+$sathi_bvt_gov_orjon+$kormi_bvt_gov_orjon+$somorthok_bvt_gov_orjon)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bvt_pvt_target+$sathi_bvt_pvt_target+$kormi_bvt_pvt_target+$somorthok_bvt_pvt_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bvt_pvt_orjon+$sathi_bvt_pvt_orjon+$kormi_bvt_pvt_orjon+$somorthok_bvt_pvt_orjon)?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sodosso_dm_gov_target+$sathi_dm_gov_target+$kormi_dm_gov_target+$somorthok_dm_gov_target)?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sodosso_dm_gov_orjon+$sathi_dm_gov_orjon+$kormi_dm_gov_orjon+$somorthok_dm_gov_orjon)?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($sodosso_dm_pvt_target+$sathi_dm_pvt_target+$kormi_dm_pvt_target+$somorthok_dm_pvt_target)?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sodosso_dm_pvt_orjon+$sathi_dm_pvt_orjon+$kormi_dm_pvt_orjon+$somorthok_dm_pvt_orjon)?>
                                </td>
                                
                                <td class="tg-0pky  type_13">
                                <?php echo ($sodosso_acvt_target+$sathi_acvt_target+$kormi_acvt_target+$somorthok_acvt_target)?>
                                </td>
                                <td class="tg-0pky  type_14">
                                <?php echo ($sodosso_acvt_orjon+$sathi_acvt_orjon+$kormi_acvt_orjon+$somorthok_acvt_orjon)?>
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
