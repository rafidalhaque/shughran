<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'পত্রিকার গ্রাহক বৃদ্ধি' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('manpower') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/potrikar-grahok-briddi/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                  <td class="tg-pwj7" rowspan="2">পত্রিকার নাম</td>
                                  <td class="tg-pwj7" colspan="2">পত্রিকা সংখ্যা </td>
                                  <td class="tg-pwj7" colspan="2">গ্রাহক সংখ্যা  </td>
                                  <td class="tg-pwj7 " colspan="2"> বৃদ্ধির টার্গেট </td>
                                  <td class="tg-pwj7 " colspan="2"> বৃদ্ধি </td>
                                  <td class="tg-pwj7 " colspan="2"> ঘাটতি </td>
                              </tr>
                              <tr>
                                  <td class="tg-pwj7 rotate"><div><span>পূর্বের </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>বর্তমান </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>পূর্বের </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>বর্তমান </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>পত্রিকা </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>গ্রাহক  </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>পত্রিকা </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>গ্রাহক  </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>পত্রিকা </span></div></td>
                                  <td class="tg-pwj7 rotate"><div><span>গ্রাহক  </span></div></td>
                              </tr>

                              
                              <?php 
                                    $pk = (isset($potrikar_grahok_briddhi['id']))?$potrikar_grahok_briddhi['id']:'';
                               ?>


                              <tr>
                                  <td class="tg-y698 type_1">বাংলা কিশোর পত্রিকা	</td>
                                  <td class="tg-0pky  type_1">

                                

                                      <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_pn_before" data-title="Enter">
                                      <?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_pn_before']))?$potrikar_grahok_briddhi['bkp_pn_before']:0 ?>
                                        </a>
                                  </td>


                                <td class="tg-0pky  type_2">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_pn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_pn_present']))?$potrikar_grahok_briddhi['bkp_pn_present']:0 ?>
                                        </a>
                                </td>
                                <td class="tg-0pky  type_3">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_gn_before']))?$potrikar_grahok_briddhi['bkp_gn_before']:0 ?></a>

                                </td>
                                <td class="tg-0pky  type_4">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_gn_present']))?$potrikar_grahok_briddhi['bkp_gn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_bt_potrika']))?$potrikar_grahok_briddhi['bkp_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_bt_grahok']))?$potrikar_grahok_briddhi['bkp_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_7">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_briddhi_potrika']))?$potrikar_grahok_briddhi['bkp_briddhi_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_8">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_briddhi_grahok']))?$potrikar_grahok_briddhi['bkp_briddhi_grahok']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_9">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_ghatti_potrika']))?$potrikar_grahok_briddhi['bkp_ghatti_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_10">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bkp_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bkp_ghatti_grahok']))?$potrikar_grahok_briddhi['bkp_ghatti_grahok']:0 ?></a>
                                </td>
                              </tr>


                              <tr>
                                <td class="tg-y698">নতুন বাংলা কিশোর পত্রিকা	 </td>
                                <td class="tg-0pky">

                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_pn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_pn_before']))?$potrikar_grahok_briddhi['nbkp_pn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_pn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_pn_present']))?$potrikar_grahok_briddhi['nbkp_pn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_pn_present']))?$potrikar_grahok_briddhi['nbkp_pn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_gn_present']))?$potrikar_grahok_briddhi['nbkp_gn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_bt_potrika']))?$potrikar_grahok_briddhi['nbkp_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('manpower/detailupdate');?>" data-name="nbkp_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_bt_grahok']))?$potrikar_grahok_briddhi['nbkp_bt_grahok']:0 ?></a>

                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_briddhi_potrika']))?$potrikar_grahok_briddhi['nbkp_briddhi_potrika']:0 ?></a>

                                </td>



                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_briddhi_grahok']))?$potrikar_grahok_briddhi['nbkp_briddhi_grahok']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_ghatti_potrika']))?$potrikar_grahok_briddhi['nbkp_ghatti_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nbkp_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['nbkp_ghatti_grahok']))?$potrikar_grahok_briddhi['nbkp_ghatti_grahok']:0 ?></a>
                                </td>

                              </tr>

                            <tr>
                               <td class="tg-y698">ইংরেজী কিশোর পত্রিকা	 </td>
                                <td class="tg-0pky type_1">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_pn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_pn_before']))?$potrikar_grahok_briddhi['ekp_pn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_2">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_pn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_pn_present']))?$potrikar_grahok_briddhi['ekp_pn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_3">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_gn_before']))?$potrikar_grahok_briddhi['ekp_gn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_gn_present']))?$potrikar_grahok_briddhi['ekp_gn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_bt_potrika']))?$potrikar_grahok_briddhi['ekp_bt_potrika']:0 ?></a>

                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_bt_grahok']))?$potrikar_grahok_briddhi['ekp_bt_grahok']:0 ?></a>

                                </td>

                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_briddhi_potrika']))?$potrikar_grahok_briddhi['ekp_briddhi_potrika']:0 ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_briddhi_grahok']))?$potrikar_grahok_briddhi['ekp_briddhi_grahok']:0 ?><</a>

                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_ghatti_potrika']))?$potrikar_grahok_briddhi['ekp_ghatti_potrika']:0 ?></a>

                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ekp_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['ekp_ghatti_grahok']))?$potrikar_grahok_briddhi['ekp_ghatti_grahok']:0 ?></a>

                                </td>

                              </tr>



                            <tr>
                                <td class="tg-y698">ছাত্রসংবাদ	</td>
                                <td class="tg-0pky type_1">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_pn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_pn_before']))?$potrikar_grahok_briddhi['cs_pn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_2">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_pn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_pn_present']))?$potrikar_grahok_briddhi['cs_pn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_3">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_gn_before']))?$potrikar_grahok_briddhi['cs_gn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_gn_present']))?$potrikar_grahok_briddhi['cs_gn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_bt_potrika']))?$potrikar_grahok_briddhi['cs_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_bt_grahok']))?$potrikar_grahok_briddhi['cs_bt_grahok']:0 ?></a>

                                </td>

                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_briddhi_potrika']))?$potrikar_grahok_briddhi['cs_briddhi_potrika']:0 ?></a>
                                </td>

                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_briddhi_grahok']))?$potrikar_grahok_briddhi['cs_briddhi_grahok']:0 ?></a>

                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_ghatti_potrika']))?$potrikar_grahok_briddhi['cs_ghatti_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cs_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['cs_ghatti_grahok']))?$potrikar_grahok_briddhi['cs_ghatti_grahok']:0 ?></a>
                                </td>


                            </tr>



                            <tr>
                                <td class="tg-y698">বড় ইংরেজী পত্রিকা</td>
                                <td class="tg-0pky type_1">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_pn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_pn_before']))?$potrikar_grahok_briddhi['bep_pn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_2">

                                     <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_pn_after" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_pn_after']))?$potrikar_grahok_briddhi['bep_pn_after']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_3">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_gn_before']))?$potrikar_grahok_briddhi['bep_gn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_gn_present']))?$potrikar_grahok_briddhi['bep_gn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_bt_potrika']))?$potrikar_grahok_briddhi['bep_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_bt_grahok']))?$potrikar_grahok_briddhi['bep_bt_grahok']:0 ?></a>

                                </td>

                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_briddhi_potrika']))?$potrikar_grahok_briddhi['bep_briddhi_potrika']:0 ?></a>

                                </td>

                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_briddhi_grahok']))?$potrikar_grahok_briddhi['bep_briddhi_grahok']:0 ?></a>

                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_ghatti_potrika']))?$potrikar_grahok_briddhi['bep_ghatti_potrika']:0 ?></a>

                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bep_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['bep_ghatti_grahok']))?$potrikar_grahok_briddhi['bep_ghatti_grahok']:0 ?></a>

                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">শাখা কর্তৃক প্রকাশিত পত্রিকা	 </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_pn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_pn_before']))?$potrikar_grahok_briddhi['skpp_pn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_pn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_pn_present']))?$potrikar_grahok_briddhi['skpp_pn_present']:0 ?></a>

                                </td>
                                <td class="tg-0pky type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_gn_before']))?$potrikar_grahok_briddhi['skpp_gn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_gn_present']))?$potrikar_grahok_briddhi['skpp_gn_present']:0 ?></a>

                                </td>
                                <td class="tg-0pky type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_bt_potrika']))?$potrikar_grahok_briddhi['skpp_bt_potrika']:0 ?></a>

                                </td>
                                <td class="tg-0pky type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_bt_grahok']))?$potrikar_grahok_briddhi['skpp_bt_grahok']:0 ?></a>

                                </td>
                                <td class="tg-0pky type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_briddhi_potrika']))?$potrikar_grahok_briddhi['skpp_briddhi_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_briddhi_grahok']))?$potrikar_grahok_briddhi['skpp_briddhi_grahok']:0 ?></a>

                                </td>
                                <td class="tg-0pky type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_ghatti_potrika']))?$potrikar_grahok_briddhi['skpp_ghatti_potrika']:0 ?></a>

                                </td>
                                <td class="tg-0pky type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skpp_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['skpp_ghatti_grahok']))?$potrikar_grahok_briddhi['skpp_ghatti_grahok']:0 ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাহিত্য পত্রিকা	</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_pn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_pn_before']))?$potrikar_grahok_briddhi['sp_pn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_pn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_pn_present']))?$potrikar_grahok_briddhi['sp_pn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_gn_before" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_gn_before']))?$potrikar_grahok_briddhi['sp_gn_before']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_gn_present" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_gn_present']))?$potrikar_grahok_briddhi['sp_gn_present']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_bt_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_bt_potrika']))?$potrikar_grahok_briddhi['sp_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_bt_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_bt_potrika']))?$potrikar_grahok_briddhi['sp_bt_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_7 ">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_briddhi_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_briddhi_potrika']))?$potrikar_grahok_briddhi['sp_briddhi_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_briddhi_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_briddhi_grahok']))?$potrikar_grahok_briddhi['sp_briddhi_grahok']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_ghatti_potrika" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_ghatti_potrika']))?$potrikar_grahok_briddhi['sp_ghatti_potrika']:0 ?></a>
                                </td>
                                <td class="tg-0pky type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_ghatti_grahok" data-title="Enter"><?php
                                        echo (isset($potrikar_grahok_briddhi['sp_ghatti_grahok']))?$potrikar_grahok_briddhi['sp_ghatti_grahok']:0 ?></a>
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

