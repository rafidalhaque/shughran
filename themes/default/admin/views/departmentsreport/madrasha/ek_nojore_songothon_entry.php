<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'একনজরে সংগঠন' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/ek-nojore-songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ek-nojore-songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="">জনশক্তি</td>
                                <td class="tg-pwj7" colspan=""style="">পূর্বের সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""style=""> বর্তমান সংখ্যা </td>
                                <td class="tg-pwj7" colspan="" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" colspan="">টার্গেট  </td>
                                <td class="tg-pwj7" colspan="">ঘাটতি </td>
                                <td class="tg-pwj7" rowspan="">প্রশিক্ষণমূলক প্রোগ্রাম</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="">দাওয়াতী প্রোগ্রাম</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>

                                <td class="tg-pwj7" rowspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>
                            </tr>
                     
                           
                               
                        

                            <?php
                            $pk = (isset($ak_nojore_songothon['id']))?$ak_nojore_songothon['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1">সদস্য</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bs_a" data-title="Enter"><?php echo $sodosso_bs_a=  (isset( $ak_nojore_songothon['sodosso_bs_a']))? $ak_nojore_songothon['sodosso_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bs_k" data-title="Enter"><?php echo $sodosso_bs_k=  (isset( $ak_nojore_songothon['sodosso_bs_k']))? $ak_nojore_songothon['sodosso_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_br_a" data-title="Enter"><?php echo $sodosso_br_a=  (isset( $ak_nojore_songothon['sodosso_br_a']))? $ak_nojore_songothon['sodosso_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_br_k" data-title="Enter"><?php echo $sodosso_br_k=  (isset( $ak_nojore_songothon['sodosso_br_k']))? $ak_nojore_songothon['sodosso_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_a" data-title="Enter"><?php echo $sodosso_t_a=  (isset( $ak_nojore_songothon['sodosso_t_a']))? $ak_nojore_songothon['sodosso_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">তারবিয়াতি বৈঠক</td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">আয়াত হাদিস মুখস্থ প্রতি</td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_k" data-title="Enter"><?php echo $sodosso_g_k=  (isset( $ak_nojore_songothon['sodosso_g_k']))? $ak_nojore_songothon['sodosso_g_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_k" data-title="Enter"><?php echo $sodosso_g_k=  (isset( $ak_nojore_songothon['sodosso_g_k']))? $ak_nojore_songothon['sodosso_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">আলেমদের সাথে মতবিনিময় </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_k" data-title="Enter"><?php echo $sodosso_g_k=  (isset( $ak_nojore_songothon['sodosso_g_k']))? $ak_nojore_songothon['sodosso_g_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_k" data-title="Enter"><?php echo $sodosso_g_k=  (isset( $ak_nojore_songothon['sodosso_g_k']))? $ak_nojore_songothon['sodosso_g_k']:'' ?></a>
                                </td>
                             

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bs_a" data-title="Enter"><?php echo $sathi_bs_a=  (isset( $ak_nojore_songothon['sathi_bs_a']))? $ak_nojore_songothon['sathi_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bs_k" data-title="Enter"><?php echo $sathi_bs_k=  (isset( $ak_nojore_songothon['sathi_bs_k']))? $ak_nojore_songothon['sathi_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_br_a" data-title="Enter"><?php echo $sathi_br_a=  (isset( $ak_nojore_songothon['sathi_br_a']))? $ak_nojore_songothon['sathi_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_br_k" data-title="Enter"><?php echo $sathi_br_k=  (isset( $ak_nojore_songothon['sathi_br_k']))? $ak_nojore_songothon['sathi_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_t_a" data-title="Enter"><?php echo $sathi_t_a=  (isset( $ak_nojore_songothon['sathi_t_a']))? $ak_nojore_songothon['sathi_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">আলেম তৈরীর কর্মশালা</td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">এ+সংবর্ধনা/নবীন বরণ </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">উস্তাজ যোগাযোগ</td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                             
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bs_a" data-title="Enter"><?php echo $kormi_bs_a=  (isset( $ak_nojore_songothon['kormi_bs_a']))? $ak_nojore_songothon['kormi_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bs_k" data-title="Enter"><?php echo $kormi_bs_k=  (isset( $ak_nojore_songothon['kormi_bs_k']))? $ak_nojore_songothon['kormi_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_br_a" data-title="Enter"><?php echo $kormi_br_a=  (isset( $ak_nojore_songothon['kormi_br_a']))? $ak_nojore_songothon['kormi_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_br_k" data-title="Enter"><?php echo $kormi_br_k=  (isset( $ak_nojore_songothon['kormi_br_k']))? $ak_nojore_songothon['kormi_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_t_a" data-title="Enter"><?php echo $kormi_t_a=  (isset( $ak_nojore_songothon['kormi_t_a']))? $ak_nojore_songothon['kormi_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">আরবি ভাষা কোর্স</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">হাফেজে কুরআন সংবর্ধনা</td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">হাদিয়া প্রদান </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bs_a" data-title="Enter"><?php echo $somorthok_bs_a=  (isset( $ak_nojore_songothon['somorthok_bs_a']))? $ak_nojore_songothon['somorthok_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bs_k" data-title="Enter"><?php echo $somorthok_bs_k=  (isset( $ak_nojore_songothon['somorthok_bs_k']))? $ak_nojore_songothon['somorthok_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_br_a" data-title="Enter"><?php echo $somorthok_br_a=  (isset( $ak_nojore_songothon['somorthok_br_a']))? $ak_nojore_songothon['somorthok_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_br_k" data-title="Enter"><?php echo $somorthok_br_k=  (isset( $ak_nojore_songothon['somorthok_br_k']))? $ak_nojore_songothon['somorthok_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_t_a" data-title="Enter"><?php echo $somorthok_t_a=  (isset( $ak_nojore_songothon['somorthok_t_a']))? $ak_nojore_songothon['somorthok_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">তালিমুল কুরআন </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_a" data-title="Enter"><?php echo $somorthok_g_a=  (isset( $ak_nojore_songothon['somorthok_g_a']))? $ak_nojore_songothon['somorthok_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_k" data-title="Enter"><?php echo $somorthok_g_k=  (isset( $ak_nojore_songothon['somorthok_g_k']))? $ak_nojore_songothon['somorthok_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">বক্তৃতা /রচনা প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> কুরআন বিতরণ </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                               
                               
                            </tr>

                            <tr>
                            <tr>
                                <td class="tg-y698">বন্ধু  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bs_a" data-title="Enter"><?php echo $somorthok_bs_a=  (isset( $ak_nojore_songothon['somorthok_bs_a']))? $ak_nojore_songothon['somorthok_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bs_k" data-title="Enter"><?php echo $somorthok_bs_k=  (isset( $ak_nojore_songothon['somorthok_bs_k']))? $ak_nojore_songothon['somorthok_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_br_a" data-title="Enter"><?php echo $somorthok_br_a=  (isset( $ak_nojore_songothon['somorthok_br_a']))? $ak_nojore_songothon['somorthok_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_br_k" data-title="Enter"><?php echo $somorthok_br_k=  (isset( $ak_nojore_songothon['somorthok_br_k']))? $ak_nojore_songothon['somorthok_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_t_a" data-title="Enter"><?php echo $somorthok_t_a=  (isset( $ak_nojore_songothon['somorthok_t_a']))? $ak_nojore_songothon['somorthok_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">প্রতিনিধি সমাবেশ</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_a" data-title="Enter"><?php echo $somorthok_g_a=  (isset( $ak_nojore_songothon['somorthok_g_a']))? $ak_nojore_songothon['somorthok_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_k" data-title="Enter"><?php echo $somorthok_g_k=  (isset( $ak_nojore_songothon['somorthok_g_k']))? $ak_nojore_songothon['somorthok_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">মেধাবী সংবর্ধনা/বৃত্তি  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">শিক্ষা উপকরণ বিতরণ </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                               
                               
                            </tr>
                            
                            
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_bs_a" data-title="Enter"><?php echo $thana_bs_a=  (isset( $ak_nojore_songothon['thana_bs_a']))? $ak_nojore_songothon['thana_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_bs_k" data-title="Enter"><?php echo $thana_bs_k=  (isset( $ak_nojore_songothon['thana_bs_k']))? $ak_nojore_songothon['thana_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_br_a" data-title="Enter"><?php echo $thana_br_a=  (isset( $ak_nojore_songothon['thana_br_a']))? $ak_nojore_songothon['thana_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_br_k" data-title="Enter"><?php echo $thana_br_k=  (isset( $ak_nojore_songothon['thana_br_k']))? $ak_nojore_songothon['thana_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="thana_t_a" data-title="Enter"><?php echo $thana_t_a=  (isset( $ak_nojore_songothon['thana_t_a']))? $ak_nojore_songothon['thana_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">কর্মী বৈঠক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_a" data-title="Enter"><?php echo $somorthok_g_a=  (isset( $ak_nojore_songothon['somorthok_g_a']))? $ak_nojore_songothon['somorthok_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_k" data-title="Enter"><?php echo $somorthok_g_k=  (isset( $ak_nojore_songothon['somorthok_g_k']))? $ak_nojore_songothon['somorthok_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">ক্যরিয়ার গাইড লাইন </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">কিরাত প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                               
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ওয়ার্ড/জন </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wordjon_bs_a" data-title="Enter"><?php echo $wordjon_bs_a=  (isset( $ak_nojore_songothon['wordjon_bs_a']))? $ak_nojore_songothon['wordjon_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wordjon_bs_k" data-title="Enter"><?php echo $wordjon_bs_k=  (isset( $ak_nojore_songothon['wordjon_bs_k']))? $ak_nojore_songothon['wordjon_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wordjon_br_a" data-title="Enter"><?php echo $wordjon_br_a=  (isset( $ak_nojore_songothon['wordjon_br_a']))? $ak_nojore_songothon['wordjon_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wordjon_br_k" data-title="Enter"><?php echo $wordjon_br_k=  (isset( $ak_nojore_songothon['wordjon_br_k']))? $ak_nojore_songothon['wordjon_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="wordjon_t_a" data-title="Enter"><?php echo $wordjon_t_a=  (isset( $ak_nojore_songothon['wordjon_t_a']))? $ak_nojore_songothon['wordjon_t_a']:'' ?></a>
                                </td> <td class="tg-pwj7" rowspan="">সাথী কুরআন ক্লাস  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_a" data-title="Enter"><?php echo $somorthok_g_a=  (isset( $ak_nojore_songothon['somorthok_g_a']))? $ak_nojore_songothon['somorthok_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_g_k" data-title="Enter"><?php echo $somorthok_g_k=  (isset( $ak_nojore_songothon['somorthok_g_k']))? $ak_nojore_songothon['somorthok_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">কুইজ প্রতিযোগিতা </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">মতবিনিময়/আলোচনা সভা </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                              
                            </tr>

                            <tr>
                                <td class="tg-y698">উপশাখা </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_bs_a" data-title="Enter"><?php echo $upshakha_bs_a=  (isset( $ak_nojore_songothon['upshakha_bs_a']))? $ak_nojore_songothon['upshakha_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_bs_k" data-title="Enter"><?php echo $upshakha_bs_k=  (isset( $ak_nojore_songothon['upshakha_bs_k']))? $ak_nojore_songothon['upshakha_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_br_a" data-title="Enter"><?php echo $upshakha_br_a=  (isset( $ak_nojore_songothon['upshakha_br_a']))? $ak_nojore_songothon['upshakha_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_br_k" data-title="Enter"><?php echo $upshakha_br_k=  (isset( $ak_nojore_songothon['upshakha_br_k']))? $ak_nojore_songothon['upshakha_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_t_a" data-title="Enter"><?php echo $upshakha_t_a=  (isset( $ak_nojore_songothon['upshakha_t_a']))? $ak_nojore_songothon['upshakha_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">সাথী বৈঠক  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_g_a" data-title="Enter"><?php echo $upshakha_g_a=  (isset( $ak_nojore_songothon['upshakha_g_a']))? $ak_nojore_songothon['upshakha_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshakha_g_k" data-title="Enter"><?php echo $upshakha_g_k=  (isset( $ak_nojore_songothon['upshakha_g_k']))? $ak_nojore_songothon['upshakha_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">সাধারণ সভা  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">ইফতার মাহফিল  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>

                               
                            </tr>
                            <tr>
                                <td class="tg-y698"> সমর্থক সংগঠন </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_bs_a" data-title="Enter"><?php echo $somorthoksongothon_bs_a=  (isset( $ak_nojore_songothon['somorthoksongothon_bs_a']))? $ak_nojore_songothon['somorthoksongothon_bs_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_bs_k" data-title="Enter"><?php echo $somorthoksongothon_bs_k=  (isset( $ak_nojore_songothon['somorthoksongothon_bs_k']))? $ak_nojore_songothon['somorthoksongothon_bs_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_br_a" data-title="Enter"><?php echo $somorthoksongothon_br_a=  (isset( $ak_nojore_songothon['somorthoksongothon_br_a']))? $ak_nojore_songothon['somorthoksongothon_br_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_br_k" data-title="Enter"><?php echo $somorthoksongothon_br_k=  (isset( $ak_nojore_songothon['somorthoksongothon_br_k']))? $ak_nojore_songothon['somorthoksongothon_br_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_t_a" data-title="Enter"><?php echo $somorthoksongothon_t_a=  (isset( $ak_nojore_songothon['somorthoksongothon_t_a']))? $ak_nojore_songothon['somorthoksongothon_t_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">নৈশ ইবাদাত  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_g_a" data-title="Enter"><?php echo $somorthoksongothon_g_a=  (isset( $ak_nojore_songothon['somorthoksongothon_g_a']))? $ak_nojore_songothon['somorthoksongothon_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthoksongothon_g_k" data-title="Enter"><?php echo $somorthoksongothon_g_k=  (isset( $ak_nojore_songothon['somorthoksongothon_g_k']))? $ak_nojore_songothon['somorthoksongothon_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">বিতর্ক প্রতিযোগিতা  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">
                                দারসুল কুরআন/হাদিস পাঠ  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                 <td class="tg-0pky" rowspan="2">মোট</td>
                                 <td class="tg-0pky" rowspan="2"></td>
                                 <td class="tg-0pky" rowspan="2"></td>
                                 <td class="tg-0pky" rowspan="2"></td>
                                 <td class="tg-0pky" rowspan="2"></td>
                                 <td class="tg-0pky" rowspan="2"></td>
                                 <td class="tg-0pky">সামষ্টিক পাঠ </td>
                                 <td class="tg-0pky"> </td>
                                 <td class="tg-0pky"> </td>
                                 <td class="tg-0pky">ওয়ায়েজিন প্রতিযোগিতা  </td>
                                 <td class="tg-0pky"> </td>
                                 <td class="tg-0pky"> </td>
                                 <td class="tg-0pky">চা/ফল চক্র </td>
                                 <td class="tg-0pky"> </td>
                                 <td class="tg-0pky"> </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">আলোচনা চক্র</td> 
                                <td class="tg-0pky"> </td> 
                                <td class="tg-0pky"> </td> 
                                <td class="tg-0pky">খুতবা/ইবারত পাঠ প্রতিযোগিতা </td> 
                                <td class="tg-0pky"> </td> 
                                <td class="tg-0pky"> </td> 
                                <td class="tg-0pky">অন্যান্য প্রোগ্রামসমূহ </td> 
                                <td class="tg-0pky"></td> 
                                <td class="tg-0pky"></td> 
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
