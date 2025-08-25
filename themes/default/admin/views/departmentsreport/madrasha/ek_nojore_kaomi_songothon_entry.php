<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'এক নজরে কওমি মাদ্রাসা সংগঠন ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/ek-nojore-kaomi-songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ek-nojore-kaomi-songothonn/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2"> মাদরাসা</td>
                                <td class="tg-pwj7" rowspan="2"colspan=""style="">মোট </td>
                                <td class="tg-pwj7" rowspan="2"colspan=""style=""> সংগঠন আছে </td>
                                <td class="tg-pwj7" rowspan="2"colspan="" style="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" rowspan="2"colspan="">থানা মানের  </td>
                                <td class="tg-pwj7" rowspan="2"colspan="">বৃদ্ধি </td>
                                <td class="tg-pwj7" rowspan="2"rowspan="">ওয়ার্ড/জোন মানের</td>
                                <td class="tg-pwj7" rowspan="2"colspan="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" rowspan="2"colspan="">উপশাখা মানের</td>
                                <td class="tg-pwj7" rowspan="2"rowspan="">বৃদ্ধি </td>
                                <td class="tg-pwj7" rowspan="2"colspan="">মুয়ায়্যিদ সংগঠন  </td>
                                <td class="tg-pwj7" rowspan="2"colspan="">বৃদ্ধি  </td>
                                <td class="tg-pwj7" rowspan="2"colspan="">সংগঠন নেই  </td>
                                <td class="tg-pwj7" colspan="4">কওমী ওলামেয়ে কিরাম পরিসংখ্যান</td>

                            </tr>
                     
                           
                               
                        

                            <?php
                            $pk = (isset($ak_nojore_songothon['id']))?$ak_nojore_songothon['id']:'';
                            ?>


                            <tr>
                                
                                <td class="tg-0pky  type_8"> ধরন
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_k" data-title="Enter"><?php echo $sodosso_g_k=  (isset( $ak_nojore_songothon['sodosso_g_k']))? $ak_nojore_songothon['sodosso_g_k']:'' ?></a>
                                </td> 
                                <td class="tg-0pky  type_8"> মোট
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_k" data-title="Enter"><?php echo $sodosso_g_k=  (isset( $ak_nojore_songothon['sodosso_g_k']))? $ak_nojore_songothon['sodosso_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" colspan=""> সাংগঠনিক  </td>
                                <td class="tg-pwj7" colspan="">বিরুধী </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">ইফতা/তাখাস্সুস </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> মুহাদ্দিস/মুফাসসির
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                             
                             

                            </tr>
                            <tr>
                                <td class="tg-y698"> দাওয়ারে হাদিস  </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> পীর মাশায়েখ
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

                            </tr>

                            <tr>
                                <td class="tg-y698"> মেশকাত  </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> মুহতামিম
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

                            </tr>

                            <tr>
                                <td class="tg-y698"> জালালাইন </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> মুফতি
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">কাফিয়া  </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> ওয়ায়েজিন
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

                            </tr>

                            <tr>
                                <td class="tg-y698"> হাফেজিয়া  </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> খতিব/ইমাম/মুয়াজ্জিন
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

                            </tr>

                            <tr>
                                <td class="tg-y698"> দাওয়ারে হাদিস  </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7"> নূরাণী মাদরাসা
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

                            </tr>

                            <tr>
                                <td class="tg-y698"> মোট  </td>
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
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_a" data-title="Enter"><?php echo $kormi_g_a=  (isset( $ak_nojore_songothon['kormi_g_a']))? $ak_nojore_songothon['kormi_g_a']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_g_k" data-title="Enter"><?php echo $kormi_g_k=  (isset( $ak_nojore_songothon['kormi_g_k']))? $ak_nojore_songothon['kormi_g_k']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan=""> </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td>
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_t_k" data-title="Enter"><?php echo $sodosso_t_k=  (isset( $ak_nojore_songothon['sodosso_t_k']))? $ak_nojore_songothon['sodosso_t_k']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">  নূরাণী শিক্ষক
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="ak_nojore_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_g_a" data-title="Enter"><?php echo $sodosso_g_a=  (isset( $ak_nojore_songothon['sodosso_g_a']))? $ak_nojore_songothon['sodosso_g_a']:'' ?></a>
                                </td> 
                                <td class="tg-pwj7" rowspan="">  </td>
                                <td class="tg-pwj7" rowspan="">  </td>

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
