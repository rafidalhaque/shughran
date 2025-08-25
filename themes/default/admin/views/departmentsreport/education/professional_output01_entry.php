<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০১(জনসেবা/বিসিএস)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/professional-output01') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/professional-output01/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="2">৩৮ তম প্রিলিতে উত্তীর্ণ </td>
                                <td class="tg-pwj7" colspan="2">৩৬ তম (নন ক্যাডার) উত্তীর্ণ  </td>
                                <td class="tg-pwj7" colspan="2"> ৩৭ তম ভাইভায় (সুপারিশ) উত্তীর্ণ </td>
                                <td class="tg-pwj7" colspan="2">৩৯ তম প্রিলিতে আবেদনকৃত (ডাক্তার)  </td>
                                <td class="tg-pwj7" colspan="2">৩৯ তম প্রিলিতে উত্তীর্ণ(ডাক্তার)  </td>
                                <td class="tg-pwj7" colspan="2">৪০ তম প্রিলিতে আবেদনকৃত </td>
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
                            $pk = (isset($profesonal_output['id']))?$profesonal_output['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_38pu_target" data-title="Enter"><?php echo $sodosso_38pu_target=  (isset( $profesonal_output['sodosso_38pu_target']))? $profesonal_output['sodosso_38pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_38pu_orjon" data-title="Enter"><?php echo $sodosso_38pu_orjon=  (isset( $profesonal_output['sodosso_38pu_orjon']))? $profesonal_output['sodosso_38pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_36nku_target" data-title="Enter"><?php echo $sodosso_36nku_target=  (isset( $profesonal_output['sodosso_36nku_target']))? $profesonal_output['sodosso_36nku_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_36nku_orjon" data-title="Enter"><?php echo $sodosso_36nku_orjon=  (isset( $profesonal_output['sodosso_36nku_orjon']))? $profesonal_output['sodosso_36nku_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_37vsu_target" data-title="Enter"><?php echo $sodosso_37vsu_target=  (isset( $profesonal_output['sodosso_37vsu_target']))? $profesonal_output['sodosso_37vsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_37vsu_orjon" data-title="Enter"><?php echo $sodosso_37vsu_orjon=  (isset( $profesonal_output['sodosso_37vsu_orjon']))? $profesonal_output['sodosso_37vsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_39pad_target" data-title="Enter"><?php echo $sodosso_39pad_target=  (isset( $profesonal_output['sodosso_39pad_target']))? $profesonal_output['sodosso_39pad_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_39pad_orjon" data-title="Enter"><?php echo $sodosso_39pad_orjon=  (isset( $profesonal_output['sodosso_39pad_orjon']))? $profesonal_output['sodosso_39pad_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_39pud_target" data-title="Enter"><?php echo $sodosso_39pud_target=  (isset( $profesonal_output['sodosso_39pud_target']))? $profesonal_output['sodosso_39pud_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_39pud_orjon" data-title="Enter"><?php echo $sodosso_39pud_orjon=  (isset( $profesonal_output['sodosso_39pud_orjon']))? $profesonal_output['sodosso_39pud_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_40pa_target" data-title="Enter"><?php echo $sodosso_40pa_target=  (isset( $profesonal_output['sodosso_40pa_target']))? $profesonal_output['sodosso_40pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_40pa_orjon" data-title="Enter"><?php echo $sodosso_40pa_orjon=  (isset( $profesonal_output['sodosso_40pa_orjon']))? $profesonal_output['sodosso_40pa_orjon']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_38pu_target" data-title="Enter"><?php echo $sathi_38pu_target=  (isset( $profesonal_output['sathi_38pu_target']))? $profesonal_output['sathi_38pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_38pu_orjon" data-title="Enter"><?php echo $sathi_38pu_orjon=  (isset( $profesonal_output['sathi_38pu_orjon']))? $profesonal_output['sathi_38pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_36nku_target" data-title="Enter"><?php echo $sathi_36nku_target=  (isset( $profesonal_output['sathi_36nku_target']))? $profesonal_output['sathi_36nku_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_36nku_orjon" data-title="Enter"><?php echo $sathi_36nku_orjon=  (isset( $profesonal_output['sathi_36nku_orjon']))? $profesonal_output['sathi_36nku_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_37vsu_target" data-title="Enter"><?php echo $sathi_37vsu_target=  (isset( $profesonal_output['sathi_37vsu_target']))? $profesonal_output['sathi_37vsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_37vsu_orjon" data-title="Enter"><?php echo $sathi_37vsu_orjon=  (isset( $profesonal_output['sathi_37vsu_orjon']))? $profesonal_output['sathi_37vsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_39pad_target" data-title="Enter"><?php echo $sathi_39pad_target=  (isset( $profesonal_output['sathi_39pad_target']))? $profesonal_output['sathi_39pad_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_39pad_orjon" data-title="Enter"><?php echo $sathi_39pad_orjon=  (isset( $profesonal_output['sathi_39pad_orjon']))? $profesonal_output['sathi_39pad_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_39pud_target" data-title="Enter"><?php echo $sathi_39pud_target=  (isset( $profesonal_output['sathi_39pud_target']))? $profesonal_output['sathi_39pud_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_39pud_orjon" data-title="Enter"><?php echo $sathi_39pud_orjon=  (isset( $profesonal_output['sathi_39pud_orjon']))? $profesonal_output['sathi_39pud_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_40pa_target" data-title="Enter"><?php echo $sathi_40pa_target=  (isset( $profesonal_output['sathi_40pa_target']))? $profesonal_output['sathi_40pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_40pa_orjon" data-title="Enter"><?php echo $sathi_40pa_orjon=  (isset( $profesonal_output['sathi_40pa_orjon']))? $profesonal_output['sathi_40pa_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_38pu_target" data-title="Enter"><?php echo $kormi_38pu_target=  (isset( $profesonal_output['kormi_38pu_target']))? $profesonal_output['kormi_38pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_38pu_orjon" data-title="Enter"><?php echo $kormi_38pu_orjon=  (isset( $profesonal_output['kormi_38pu_orjon']))? $profesonal_output['kormi_38pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_36nku_target" data-title="Enter"><?php echo $kormi_36nku_target=  (isset( $profesonal_output['kormi_36nku_target']))? $profesonal_output['kormi_36nku_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_36nku_orjon" data-title="Enter"><?php echo $kormi_36nku_orjon=  (isset( $profesonal_output['kormi_36nku_orjon']))? $profesonal_output['kormi_36nku_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_37vsu_target" data-title="Enter"><?php echo $kormi_37vsu_target=  (isset( $profesonal_output['kormi_37vsu_target']))? $profesonal_output['kormi_37vsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_37vsu_orjon" data-title="Enter"><?php echo $kormi_37vsu_orjon=  (isset( $profesonal_output['kormi_37vsu_orjon']))? $profesonal_output['kormi_37vsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_39pad_target" data-title="Enter"><?php echo $kormi_39pad_target=  (isset( $profesonal_output['kormi_39pad_target']))? $profesonal_output['kormi_39pad_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_39pad_orjon" data-title="Enter"><?php echo $kormi_39pad_orjon=  (isset( $profesonal_output['kormi_39pad_orjon']))? $profesonal_output['kormi_39pad_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_39pud_target" data-title="Enter"><?php echo $kormi_39pud_target=  (isset( $profesonal_output['kormi_39pud_target']))? $profesonal_output['kormi_39pud_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_39pud_orjon" data-title="Enter"><?php echo $kormi_39pud_orjon=  (isset( $profesonal_output['kormi_39pud_orjon']))? $profesonal_output['kormi_39pud_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_40pa_target" data-title="Enter"><?php echo $kormi_40pa_target=  (isset( $profesonal_output['kormi_40pa_target']))? $profesonal_output['kormi_40pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_40pa_orjon" data-title="Enter"><?php echo $kormi_40pa_orjon=  (isset( $profesonal_output['kormi_40pa_orjon']))? $profesonal_output['kormi_40pa_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_38pu_target" data-title="Enter"><?php echo $somorthok_38pu_target=  (isset( $profesonal_output['somorthok_38pu_target']))? $profesonal_output['somorthok_38pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_38pu_orjon" data-title="Enter"><?php echo $somorthok_38pu_orjon=  (isset( $profesonal_output['somorthok_38pu_orjon']))? $profesonal_output['somorthok_38pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_36nku_target" data-title="Enter"><?php echo $somorthok_36nku_target=  (isset( $profesonal_output['somorthok_36nku_target']))? $profesonal_output['somorthok_36nku_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_36nku_orjon" data-title="Enter"><?php echo $somorthok_36nku_orjon=  (isset( $profesonal_output['somorthok_36nku_orjon']))? $profesonal_output['somorthok_36nku_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_37vsu_target" data-title="Enter"><?php echo $somorthok_37vsu_target=  (isset( $profesonal_output['somorthok_37vsu_target']))? $profesonal_output['somorthok_37vsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_37vsu_orjon" data-title="Enter"><?php echo $somorthok_37vsu_orjon=  (isset( $profesonal_output['somorthok_37vsu_orjon']))? $profesonal_output['somorthok_37vsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_39pad_target" data-title="Enter"><?php echo $somorthok_39pad_target=  (isset( $profesonal_output['somorthok_39pad_target']))? $profesonal_output['somorthok_39pad_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_39pad_orjon" data-title="Enter"><?php echo $somorthok_39pad_orjon=  (isset( $profesonal_output['somorthok_39pad_orjon']))? $profesonal_output['somorthok_39pad_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_39pud_target" data-title="Enter"><?php echo $somorthok_39pud_target=  (isset( $profesonal_output['somorthok_39pud_target']))? $profesonal_output['somorthok_39pud_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_39pud_orjon" data-title="Enter"><?php echo $somorthok_39pud_orjon=  (isset( $profesonal_output['somorthok_39pud_orjon']))? $profesonal_output['somorthok_39pud_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_40pa_target" data-title="Enter"><?php echo $somorthok_40pa_target=  (isset( $profesonal_output['somorthok_40pa_target']))? $profesonal_output['somorthok_40pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="profesonal_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_40pa_orjon" data-title="Enter"><?php echo $somorthok_40pa_orjon=  (isset( $profesonal_output['somorthok_40pa_orjon']))? $profesonal_output['somorthok_40pa_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_38pu_target+$sathi_38pu_target+$kormi_38pu_target+$somorthok_38pu_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_38pu_orjon+$sathi_38pu_orjon+$kormi_38pu_orjon+$somorthok_38pu_orjon)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_36nku_target+$sathi_36nku_target+$kormi_36nku_target+$somorthok_36nku_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_36nku_orjon+$sathi_36nku_orjon+$kormi_36nku_orjon+$somorthok_36nku_orjon)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_37vsu_target+$sathi_37vsu_target+$kormi_37vsu_target+$somorthok_37vsu_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_37vsu_orjon+$sathi_37vsu_orjon+$kormi_37vsu_orjon+$somorthok_37vsu_orjon)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_39pad_target+$sathi_39pad_target+$kormi_39pad_target+$somorthok_39pad_target)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_39pad_orjon+$sathi_39pad_orjon+$kormi_39pad_orjon+$somorthok_39pad_orjon)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sodosso_39pud_target+$sathi_39pud_target+$kormi_39pud_target+$somorthok_39pud_target)?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sodosso_39pud_orjon+$sathi_39pud_orjon+$kormi_39pud_orjon+$somorthok_39pud_orjon)?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($sodosso_40pa_target+$sathi_40pa_target+$kormi_40pa_target+$somorthok_40pa_target)?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sodosso_40pa_orjon+$sathi_40pa_orjon+$kormi_40pa_orjon+$somorthok_40pa_orjon)?>
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
