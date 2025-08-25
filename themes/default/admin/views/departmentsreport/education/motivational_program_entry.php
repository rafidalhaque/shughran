<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মোটিভেশনাল প্রোগ্রামঃ(প্রফেশনাল ও একাডেমিক)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/motivational-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/motivational-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="4">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>
                                <td class="tg-pwj7" colspan="4">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>
                                <td class="tg-pwj7" colspan="2">শিক্ষাবৃত্তি/উপকরণ প্রদান  </td>
                            </tr>

                            <?php
                            $pk = (isset($motivational_program['id']))?$motivational_program['id']:'';
                            ?>



                            <tr>
                                <td class="tg-y698 type_1" colspan="4">ক্যারিয়ার কাউন্সেলিং (JSC/JDC)	</td>
                                
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_jsc_sonkha" data-title="Enter"><?php echo $cc_jsc_sonkha=  (isset( $motivational_program['cc_jsc_sonkha']))? $motivational_program['cc_jsc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_jsc_uposthiti" data-title="Enter"><?php echo $cc_jsc_uposthiti=  (isset( $motivational_program['cc_jsc_uposthiti']))? $motivational_program['cc_jsc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698 type_1"colspan="4">A+  সংবর্ধনা (PSC/PEC)	</td>
                                
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_psc_sonkha" data-title="Enter"><?php echo $as_psc_sonkha=  (isset( $motivational_program['as_psc_sonkha']))? $motivational_program['as_psc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_psc_uposthiti" data-title="Enter"><?php echo $as_psc_uposthiti=  (isset( $motivational_program['as_psc_uposthiti']))? $motivational_program['as_psc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698  type_2">সংখ্যা</td>
                                <td class="tg-y698  type_3">উপস্থিতি</td>
                               
                            </tr>


                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (SSC/Dakhil) </td>
                               
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_ssc_sonkha" data-title="Enter"><?php echo $cc_ssc_sonkha=  (isset( $motivational_program['cc_ssc_sonkha']))? $motivational_program['cc_ssc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_ssc_uposthiti" data-title="Enter"><?php echo $cc_ssc_uposthiti=  (isset( $motivational_program['cc_ssc_uposthiti']))? $motivational_program['cc_ssc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698"colspan="4">A+  সংবর্ধনা (JSC/JDC) </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_jsc_sonkha" data-title="Enter"><?php echo $as_jsc_sonkha=  (isset( $motivational_program['as_jsc_sonkha']))? $motivational_program['as_jsc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_jsc_uposrhiti" data-title="Enter"><?php echo $as_jsc_uposrhiti=  (isset( $motivational_program['as_jsc_uposrhiti']))? $motivational_program['as_jsc_uposrhiti']:'' ?></a>
                                </td>
                                <td class="tg-y698" colspan="2">(৫ম-১০ম)/পরীক্ষার্থী</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (HSC/Alim) </td>
                                
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_hsc_sonkha" data-title="Enter"><?php echo $cc_hsc_sonkha=  (isset( $motivational_program['cc_hsc_sonkha']))? $motivational_program['cc_hsc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_hsc_uposthiti" data-title="Enter"><?php echo $cc_hsc_uposthiti=  (isset( $motivational_program['cc_hsc_uposthiti']))? $motivational_program['cc_hsc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698"colspan="4">A+  সংবর্ধনা (SSC/Dakhil) </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_ssc_sonkha" data-title="Enter"><?php echo $as_ssc_sonkha=  (isset( $motivational_program['as_ssc_sonkha']))? $motivational_program['as_ssc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_ssc_uposthiti" data-title="Enter"><?php echo $as_ssc_uposthiti=  (isset( $motivational_program['as_ssc_uposthiti']))? $motivational_program['as_ssc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="five_porik_sonkha" data-title="Enter"><?php echo $five_porik_sonkha=  (isset( $motivational_program['five_porik_sonkha']))? $motivational_program['five_porik_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="five_porik_uposthiti" data-title="Enter"><?php echo $five_porik_uposthiti=  (isset( $motivational_program['five_porik_uposthiti']))? $motivational_program['five_porik_uposthiti']:'' ?></a>
                                </td>
                            </tr>    
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (বিসিএস) </td>
                               
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_bcs_sonkha" data-title="Enter"><?php echo $cc_bcs_sonkha=  (isset( $motivational_program['cc_bcs_sonkha']))? $motivational_program['cc_bcs_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_bcs_uposthiti" data-title="Enter"><?php echo $cc_bcs_uposthiti=  (isset( $motivational_program['cc_bcs_uposthiti']))? $motivational_program['cc_bcs_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698"colspan="4">A+  সংবর্ধনা (HSC/Alim) </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_hsc_sonkha" data-title="Enter"><?php echo $as_hsc_sonkha=  (isset( $motivational_program['as_hsc_sonkha']))? $motivational_program['as_hsc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="as_hsc_uposthiti" data-title="Enter"><?php echo $as_hsc_uposthiti=  (isset( $motivational_program['as_hsc_uposthiti']))? $motivational_program['as_hsc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698" colspan="2">(একাদশ-দ্বাদশ)/পরীক্ষার্থী</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (বিশ্বঃশিক্ষক তৈরি) </td>
                                
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_bst_sonkha" data-title="Enter"><?php echo $cc_bst_sonkha=  (isset( $motivational_program['cc_bst_sonkha']))? $motivational_program['cc_bst_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_bst_uposthiti" data-title="Enter"><?php echo $cc_bst_uposthiti=  (isset( $motivational_program['cc_bst_uposthiti']))? $motivational_program['cc_bst_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698"colspan="4">সিঙ্গেল ভিজিট সংবর্ধনা </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="svs_sonkha" data-title="Enter"><?php echo $svs_sonkha=  (isset( $motivational_program['svs_sonkha']))? $motivational_program['svs_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="svs_uposthiti" data-title="Enter"><?php echo $svs_uposthiti=  (isset( $motivational_program['svs_uposthiti']))? $motivational_program['svs_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="elev_porik_sonkha" data-title="Enter"><?php echo $elev_porik_sonkha=  (isset( $motivational_program['elev_porik_sonkha']))? $motivational_program['elev_porik_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="elev_porik_uposthiti" data-title="Enter"><?php echo $elev_porik_uposthiti=  (isset( $motivational_program['elev_porik_uposthiti']))? $motivational_program['elev_porik_uposthiti']:'' ?></a>
                                </td>
                            <tr>
                                <td class="tg-y698"colspan="4">ক্যারিয়ার কাউন্সেলিং (উচ্চ শিক্ষা) </td>
                               
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_us_sonkha" data-title="Enter"><?php echo $cc_us_sonkha=  (isset( $motivational_program['cc_us_sonkha']))? $motivational_program['cc_us_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_us_uposthiti" data-title="Enter"><?php echo $cc_us_uposthiti=  (isset( $motivational_program['cc_us_uposthiti']))? $motivational_program['cc_us_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698"colspan="4">মেধাবী সংবর্ধনা(১-৫) (অনার্স-মাস্টার্স)</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ms_sonkha" data-title="Enter"><?php echo $ms_sonkha=  (isset( $motivational_program['ms_sonkha']))? $motivational_program['ms_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ms_uposthiti" data-title="Enter"><?php echo $ms_uposthiti=  (isset( $motivational_program['ms_uposthiti']))? $motivational_program['ms_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-y698" colspan="2">শিক্ষাবৃত্তি প্রদান (অনার্স)</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698" colspan="2">BJS কাউন্সেলিং</td>
                                
                                <td class="tg-y698"colspan="2">ক্যাডেট কলেজ</td>
                                <td class="tg-y698" colspan="2">PSC/PEC</td>
                                <td class="tg-y698"colspan="2">সামিট (বিজ্ঞান)</td>
                                <td class="tg-y698"colspan="2">সামিট (বাণিজ্য)</td>
                                <td class="tg-y698"colspan="2">সামিট (মানবিক)</td>
                                
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnrs_shikb_sonkha" data-title="Enter"><?php echo $hnrs_shikb_sonkha=  (isset( $motivational_program['hnrs_shikb_sonkha']))? $motivational_program['hnrs_shikb_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hnrs_shikb_uposthiti" data-title="Enter"><?php echo $hnrs_shikb_uposthiti=  (isset( $motivational_program['hnrs_shikb_uposthiti']))? $motivational_program['hnrs_shikb_uposthiti']:'' ?></a>
                                </td>
                            <tr>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                <td class="tg-y698">সংখ্যা</td>
                               
                                <td class="tg-y698">উপস্থিতি</td>
                                
                                <td class="tg-y698" colspan="2">শিক্ষাবৃত্তি প্রদান (মাস্টার্স)</td>
                                

                            </tr>
                            <tr>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjs_sonkha" data-title="Enter"><?php echo $bjs_sonkha=  (isset( $motivational_program['bjs_sonkha']))? $motivational_program['bjs_sonkha']:'' ?></a>
                                </td>
                                
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjs_uposthiti" data-title="Enter"><?php echo $bjs_uposthiti=  (isset( $motivational_program['bjs_uposthiti']))? $motivational_program['bjs_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_sonkha" data-title="Enter"><?php echo $cc_sonkha=  (isset( $motivational_program['cc_sonkha']))? $motivational_program['cc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_uposthiti" data-title="Enter"><?php echo $cc_uposthiti=  (isset( $motivational_program['cc_uposthiti']))? $motivational_program['cc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="psc_pec_sonkha" data-title="Enter"><?php echo $psc_pec_sonkha=  (isset( $motivational_program['psc_pec_sonkha']))? $motivational_program['psc_pec_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="psc_pec_uposthiti" data-title="Enter"><?php echo $psc_pec_uposthiti=  (isset( $motivational_program['psc_pec_uposthiti']))? $motivational_program['psc_pec_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_sc_sonkha" data-title="Enter"><?php echo $summit_sc_sonkha=  (isset( $motivational_program['summit_sc_sonkha']))? $motivational_program['summit_sc_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_sc_uposthiti" data-title="Enter"><?php echo $summit_sc_uposthiti=  (isset( $motivational_program['summit_sc_uposthiti']))? $motivational_program['summit_sc_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_ba_sonkha" data-title="Enter"><?php echo $summit_ba_sonkha=  (isset( $motivational_program['summit_ba_sonkha']))? $motivational_program['summit_ba_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_ba_uposthiti" data-title="Enter"><?php echo $summit_ba_uposthiti=  (isset( $motivational_program['summit_ba_uposthiti']))? $motivational_program['summit_ba_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_ma_sonkha" data-title="Enter"><?php echo $summit_ma_sonkha=  (isset( $motivational_program['summit_ma_sonkha']))? $motivational_program['summit_ma_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_ma_uposthiti" data-title="Enter"><?php echo $summit_ma_uposthiti=  (isset( $motivational_program['summit_ma_uposthiti']))? $motivational_program['summit_ma_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mstrs_shikb_sonkha" data-title="Enter"><?php echo $mstrs_shikb_sonkha=  (isset( $motivational_program['mstrs_shikb_sonkha']))? $motivational_program['mstrs_shikb_sonkha']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mstrs_shikb_uposthiti" data-title="Enter"><?php echo $mstrs_shikb_uposthiti=  (isset( $motivational_program['mstrs_shikb_uposthiti']))? $motivational_program['mstrs_shikb_uposthiti']:'' ?></a>
                                </td>
                            <tr>
                                <td class="tg-y698" colspan="2">সামিট (মেডিকেল)</td>
                               
                                <td class="tg-y698"colspan="2">সামিট (ইঞ্জিনিয়ারিং)</td>
                                <td class="tg-y698"colspan="4">এডুকেশন সামিট (অনার্স/মাস্টার্স) </td>
                                <td class="tg-y698"colspan="2">সামিট (ডিফেন্স)</td>
                                <td class="tg-y698"colspan="2">দোয়া মাহফিল</td>
                                
                                <td class="tg-y698" colspan="2">শিক্ষাবৃত্তি প্রদান (উচ্চশীক্ষা)</td>
                                

                            </tr>
                            <tr>
                               
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_med_sonkha" data-title="Enter"><?php echo $summit_med_sonkha=  (isset( $motivational_program['summit_med_sonkha']))? $motivational_program['summit_med_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_med_uposthiti" data-title="Enter"><?php echo $summit_med_uposthiti=  (isset( $motivational_program['summit_med_uposthiti']))? $motivational_program['summit_med_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_engr_sonkha" data-title="Enter"><?php echo $summit_engr_sonkha=  (isset( $motivational_program['summit_engr_sonkha']))? $motivational_program['summit_engr_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_engr_uposthiti" data-title="Enter"><?php echo $summit_engr_uposthiti=  (isset( $motivational_program['summit_engr_uposthiti']))? $motivational_program['summit_engr_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="esummit_hm_sonkha" data-title="Enter"><?php echo $esummit_hm_sonkha=  (isset( $motivational_program['esummit_hm_sonkha']))? $motivational_program['esummit_hm_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="esummit_hm_uposthiti" data-title="Enter"><?php echo $esummit_hm_uposthiti=  (isset( $motivational_program['esummit_hm_uposthiti']))? $motivational_program['esummit_hm_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_def_sonkha" data-title="Enter"><?php echo $summit_def_sonkha=  (isset( $motivational_program['summit_def_sonkha']))? $motivational_program['summit_def_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="summit_def_uposthiti" data-title="Enter"><?php echo $summit_def_uposthiti=  (isset( $motivational_program['summit_def_uposthiti']))? $motivational_program['summit_def_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dm_sonkha" data-title="Enter"><?php echo $dm_sonkha=  (isset( $motivational_program['dm_sonkha']))? $motivational_program['dm_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dm_uposthiti" data-title="Enter"><?php echo $dm_uposthiti=  (isset( $motivational_program['dm_uposthiti']))? $motivational_program['dm_uposthiti']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="us_shikb_sonkha" data-title="Enter"><?php echo $us_shikb_sonkha=  (isset( $motivational_program['us_shikb_sonkha']))? $motivational_program['us_shikb_sonkha']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="us_shikb_uposthiti" data-title="Enter"><?php echo $us_shikb_uposthiti=  (isset( $motivational_program['us_shikb_uposthiti']))? $motivational_program['us_shikb_uposthiti']:'' ?></a>
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
