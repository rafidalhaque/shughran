<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০২(মানবসেবা/বিজেএস) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/professional-output02') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/professional-output02/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="2">১২ তম প্রিলিতে আবেদনকৃত </td>
                                <td class="tg-pwj7" colspan="2">১২ তম প্রিলিতে উত্তীর্ণ  </td>
                                <td class="tg-pwj7" colspan="2"> ১১ তম বিজেএস ভাইভায় (সুপারিশ) উত্তীর্ণ </td>
                                <td class="tg-pwj7" colspan="2">বাংলাদেশ ব্যাংক ক্যাশ অফিসার (সুপারিশ) উত্তীর্ণ  </td>
                                <td class="tg-pwj7" colspan="2">বাংলাদেশ ব্যাংক সহকারী পরিচালক (সুপারিশ) উত্তীর্ণ  </td>
                                <td class="tg-pwj7" colspan="2">১৪ তম নিবন্ধন লিখিত উত্তীর্ণ </td>
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
                            $pk = (isset($professional_output02['id']))?$professional_output02['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_12pa_target" data-title="Enter"><?php echo $sodosso_12pa_target=  (isset( $professional_output02['sodosso_12pa_target']))? $professional_output02['sodosso_12pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_12pa_orjon" data-title="Enter"><?php echo $sodosso_12pa_orjon=  (isset( $professional_output02['sodosso_12pa_orjon']))? $professional_output02['sodosso_12pa_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_12pu_target" data-title="Enter"><?php echo $sodosso_12pu_target=  (isset( $professional_output02['sodosso_12pu_target']))? $professional_output02['sodosso_12pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_12pu_orjon" data-title="Enter"><?php echo $sodosso_12pu_orjon=  (isset( $professional_output02['sodosso_12pu_orjon']))? $professional_output02['sodosso_12pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_11bavsu_target" data-title="Enter"><?php echo $sodosso_11bavsu_target=  (isset( $professional_output02['sodosso_11bavsu_target']))? $professional_output02['sodosso_11bavsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_11bavsu_orjon" data-title="Enter"><?php echo $sodosso_11bavsu_orjon=  (isset( $professional_output02['sodosso_11bavsu_orjon']))? $professional_output02['sodosso_11bavsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bbkosu_target" data-title="Enter"><?php echo $sodosso_bbkosu_target=  (isset( $professional_output02['sodosso_bbkosu_target']))? $professional_output02['sodosso_bbkosu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bbkosu_orjon" data-title="Enter"><?php echo $sodosso_bbkosu_orjon=  (isset( $professional_output02['sodosso_bbkosu_orjon']))? $professional_output02['sodosso_bbkosu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bbspsu_target" data-title="Enter"><?php echo $sodosso_bbspsu_target=  (isset( $professional_output02['sodosso_bbspsu_target']))? $professional_output02['sodosso_bbspsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bbspsu_orjon" data-title="Enter"><?php echo $sodosso_bbspsu_orjon=  (isset( $professional_output02['sodosso_bbspsu_orjon']))? $professional_output02['sodosso_bbspsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_14nlu_target" data-title="Enter"><?php echo $sodosso_14nlu_target=  (isset( $professional_output02['sodosso_14nlu_target']))? $professional_output02['sodosso_14nlu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_14nlu_orjon" data-title="Enter"><?php echo $sodosso_14nlu_orjon=  (isset( $professional_output02['sodosso_14nlu_orjon']))? $professional_output02['sodosso_14nlu_orjon']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_12pa_target" data-title="Enter"><?php echo $sathi_12pa_target=  (isset( $professional_output02['sathi_12pa_target']))? $professional_output02['sathi_12pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_12pa_orjon" data-title="Enter"><?php echo $sathi_12pa_orjon=  (isset( $professional_output02['sathi_12pa_orjon']))? $professional_output02['sathi_12pa_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_12pu_target" data-title="Enter"><?php echo $sathi_12pu_target=  (isset( $professional_output02['sathi_12pu_target']))? $professional_output02['sathi_12pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_12pu_orjon" data-title="Enter"><?php echo $sathi_12pu_orjon=  (isset( $professional_output02['sathi_12pu_orjon']))? $professional_output02['sathi_12pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_11bavsu_target" data-title="Enter"><?php echo $sathi_11bavsu_target=  (isset( $professional_output02['sathi_11bavsu_target']))? $professional_output02['sathi_11bavsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_11bavsu_orjon" data-title="Enter"><?php echo $sathi_11bavsu_orjon=  (isset( $professional_output02['sathi_11bavsu_orjon']))? $professional_output02['sathi_11bavsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bbkosu_target" data-title="Enter"><?php echo $sathi_bbkosu_target=  (isset( $professional_output02['sathi_bbkosu_target']))? $professional_output02['sathi_bbkosu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bbkosu_orjon" data-title="Enter"><?php echo $sathi_bbkosu_orjon=  (isset( $professional_output02['sathi_bbkosu_orjon']))? $professional_output02['sathi_bbkosu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bbspsu_target" data-title="Enter"><?php echo $sathi_bbspsu_target=  (isset( $professional_output02['sathi_bbspsu_target']))? $professional_output02['sathi_bbspsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bbspsu_orjon" data-title="Enter"><?php echo $sathi_bbspsu_orjon=  (isset( $professional_output02['sathi_bbspsu_orjon']))? $professional_output02['sathi_bbspsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_14nlu_target" data-title="Enter"><?php echo $sathi_14nlu_target=  (isset( $professional_output02['sathi_14nlu_target']))? $professional_output02['sathi_14nlu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_14nlu_orjon" data-title="Enter"><?php echo $sathi_14nlu_orjon=  (isset( $professional_output02['sathi_14nlu_orjon']))? $professional_output02['sathi_14nlu_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_12pa_target" data-title="Enter"><?php echo $kormi_12pa_target=  (isset( $professional_output02['kormi_12pa_target']))? $professional_output02['kormi_12pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_12pa_orjon" data-title="Enter"><?php echo $kormi_12pa_orjon=  (isset( $professional_output02['kormi_12pa_orjon']))? $professional_output02['kormi_12pa_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_12pu_target" data-title="Enter"><?php echo $kormi_12pu_target=  (isset( $professional_output02['kormi_12pu_target']))? $professional_output02['kormi_12pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_12pu_orjon" data-title="Enter"><?php echo $kormi_12pu_orjon=  (isset( $professional_output02['kormi_12pu_orjon']))? $professional_output02['kormi_12pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_11bavsu_target" data-title="Enter"><?php echo $kormi_11bavsu_target=  (isset( $professional_output02['kormi_11bavsu_target']))? $professional_output02['kormi_11bavsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_11bavsu_orjon" data-title="Enter"><?php echo $kormi_11bavsu_orjon=  (isset( $professional_output02['kormi_11bavsu_orjon']))? $professional_output02['kormi_11bavsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bbkosu_target" data-title="Enter"><?php echo $kormi_bbkosu_target=  (isset( $professional_output02['kormi_bbkosu_target']))? $professional_output02['kormi_bbkosu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bbkosu_orjon" data-title="Enter"><?php echo $kormi_bbkosu_orjon=  (isset( $professional_output02['kormi_bbkosu_orjon']))? $professional_output02['kormi_bbkosu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bbspsu_target" data-title="Enter"><?php echo $kormi_bbspsu_target=  (isset( $professional_output02['kormi_bbspsu_target']))? $professional_output02['kormi_bbspsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bbspsu_orjon" data-title="Enter"><?php echo $kormi_bbspsu_orjon=  (isset( $professional_output02['kormi_bbspsu_orjon']))? $professional_output02['kormi_bbspsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_14nlu_target" data-title="Enter"><?php echo $kormi_14nlu_target=  (isset( $professional_output02['kormi_14nlu_target']))? $professional_output02['kormi_14nlu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_14nlu_orjon" data-title="Enter"><?php echo $kormi_14nlu_orjon=  (isset( $professional_output02['kormi_14nlu_orjon']))? $professional_output02['kormi_14nlu_orjon']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_12pa_target" data-title="Enter"><?php echo $somorthok_12pa_target=  (isset( $professional_output02['somorthok_12pa_target']))? $professional_output02['somorthok_12pa_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_12pa_orjon" data-title="Enter"><?php echo $somorthok_12pa_orjon=  (isset( $professional_output02['somorthok_12pa_orjon']))? $professional_output02['somorthok_12pa_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_12pu_target" data-title="Enter"><?php echo $somorthok_12pu_target=  (isset( $professional_output02['somorthok_12pu_target']))? $professional_output02['somorthok_12pu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_12pu_orjon" data-title="Enter"><?php echo $somorthok_12pu_orjon=  (isset( $professional_output02['somorthok_12pu_orjon']))? $professional_output02['somorthok_12pu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_11bavsu_target" data-title="Enter"><?php echo $somorthok_11bavsu_target=  (isset( $professional_output02['somorthok_11bavsu_target']))? $professional_output02['somorthok_11bavsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_11bavsu_orjon" data-title="Enter"><?php echo $somorthok_11bavsu_orjon=  (isset( $professional_output02['somorthok_11bavsu_orjon']))? $professional_output02['somorthok_11bavsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bbkosu_target" data-title="Enter"><?php echo $somorthok_bbkosu_target=  (isset( $professional_output02['somorthok_bbkosu_target']))? $professional_output02['somorthok_bbkosu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bbkosu_orjon" data-title="Enter"><?php echo $somorthok_bbkosu_orjon=  (isset( $professional_output02['somorthok_bbkosu_orjon']))? $professional_output02['somorthok_bbkosu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bbspsu_target" data-title="Enter"><?php echo $somorthok_bbspsu_target=  (isset( $professional_output02['somorthok_bbspsu_target']))? $professional_output02['somorthok_bbspsu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bbspsu_orjon" data-title="Enter"><?php echo $somorthok_bbspsu_orjon=  (isset( $professional_output02['somorthok_bbspsu_orjon']))? $professional_output02['somorthok_bbspsu_orjon']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_11">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_14nlu_target" data-title="Enter"><?php echo $somorthok_14nlu_target=  (isset( $professional_output02['somorthok_14nlu_target']))? $professional_output02['somorthok_14nlu_target']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_12">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="professional_output02" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_14nlu_orjon" data-title="Enter"><?php echo $somorthok_14nlu_orjon=  (isset( $professional_output02['somorthok_14nlu_orjon']))? $professional_output02['somorthok_14nlu_orjon']:'' ?></a>
                                </td>
                            </tr>    
                            </tr>

                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_12pa_target!=0)? ($sodosso_12pa_target+$sathi_12pa_target+$kormi_12pa_target+$somorthok_12pa_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_12pa_orjon!=0)? ($sodosso_12pa_orjon+$sathi_12pa_orjon+$kormi_12pa_orjon+$somorthok_12pa_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_12pu_target!=0)? ($sodosso_12pu_target+$sathi_12pu_target+$kormi_12pu_target+$somorthok_12pu_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_12pu_orjon!=0)?($sodosso_12pu_orjon+$sathi_12pu_orjon+$kormi_12pu_orjon+$somorthok_12pu_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_11bavsu_target!=0)?($sodosso_11bavsu_target+$sathi_11bavsu_target+$kormi_11bavsu_target+$somorthok_11bavsu_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_11bavsu_orjon!=0)?($sodosso_11bavsu_orjon+$sathi_11bavsu_orjon+$kormi_11bavsu_orjon+$somorthok_11bavsu_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bbkosu_target!=0)?($sodosso_bbkosu_target+$sathi_bbkosu_target+$kormi_bbkosu_target+$somorthok_bbkosu_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bbkosu_orjon!=0)?($sodosso_bbkosu_orjon+$sathi_bbkosu_orjon+$kormi_bbkosu_orjon+$somorthok_bbkosu_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sodosso_bbspsu_target!=0)?($sodosso_bbspsu_target+$sathi_bbspsu_target+$kormi_bbspsu_target+$somorthok_bbspsu_target):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sodosso_bbspsu_orjon!=0)?($sodosso_bbspsu_orjon+$sathi_bbspsu_orjon+$kormi_bbspsu_orjon+$somorthok_bbspsu_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($sodosso_14nlu_target!=0)?($sodosso_14nlu_target+$sathi_14nlu_target+$kormi_14nlu_target+$somorthok_14nlu_target):0?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sodosso_14nlu_orjon!=0)?($sodosso_14nlu_orjon+$sathi_14nlu_orjon+$kormi_14nlu_orjon+$somorthok_14nlu_orjon):0?>
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
