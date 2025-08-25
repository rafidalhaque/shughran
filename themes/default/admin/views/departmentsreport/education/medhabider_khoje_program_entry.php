<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মেধাবীদের খোঁজে প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/medhabider-khoje-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/medhabider-khoje-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">ক্রম</td>
                                <td class="tg-pwj7" rowspan="3">প্রোগ্রামের নাম </td>
                                <td class="tg-pwj7" colspan="9" style="text-align:center">কতজনকে </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " ></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "></td>
                                <td class="tg-pwj7 "colspan="2"><div><span>বিতরণ</span></div></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>বই, স্টিকার, টিশার্ট উপহার</span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>মোবাইল মুখস্থকরণ </span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>বই,কলমসহ আকর্ষণীয় উপহার </span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>একত্রে আপ্যায়ন </span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>ভ্রমন ও দর্শনীয় স্থান পরিদর্শন</span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>একাডেমিক বই উপহার</span></div></td>
                                <td class="tg-pwj7 " style="border-top:hidden"><div><span>এসএমএস ও ইমেইল যোগাযোগ</span></div></td>                        
                                <td class="tg-pwj7 "><div><span>ইসলামী গানের সিডি,ভিসিডি </span></div></td>
                                <td class="tg-pwj7 "><div><span> স্টুডেন্ট ভিউজ, সায়েন্স সিরিজ </span></div></td>
                               
                            </tr>


                            <?php
                            $pk = (isset($medhabider_khoje_program['id']))?$medhabider_khoje_program['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1">১</td>
                                <td class="tg-y698  type_1">৫ম শ্রেণীতে বৃত্তিপ্রাপ্ত</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_bstu']))? $medhabider_khoje_program['5mchbp_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_mnmk']))? $medhabider_khoje_program['5mchbp_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_bksau']))? $medhabider_khoje_program['5mchbp_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_aap']))? $medhabider_khoje_program['5mchbp_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_vbsp']))? $medhabider_khoje_program['5mchbp_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_abu']))? $medhabider_khoje_program['5mchbp_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_smsej']))? $medhabider_khoje_program['5mchbp_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_btr_sgsv']))? $medhabider_khoje_program['5mchbp_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="5mchbp_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['5mchbp_kjk_btr_svss']))? $medhabider_khoje_program['5mchbp_kjk_btr_svss']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">২</td>
                                <td class="tg-y698">৮ম শ্রেণীতে বৃত্তিপ্রাপ্ত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_bstu']))? $medhabider_khoje_program['8mchbp_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_mnmk']))? $medhabider_khoje_program['8mchbp_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_bksau']))? $medhabider_khoje_program['8mchbp_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_aap']))? $medhabider_khoje_program['8mchbp_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_vbsp']))? $medhabider_khoje_program['8mchbp_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_abu']))? $medhabider_khoje_program['8mchbp_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_smsej']))? $medhabider_khoje_program['8mchbp_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_btr_sgsv']))? $medhabider_khoje_program['8mchbp_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="8mchbp_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['8mchbp_kjk_btr_svss']))? $medhabider_khoje_program['8mchbp_kjk_btr_svss']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">৩ </td>
                                <td class="tg-y698">প্রত্যেক শ্রেণীতে রোল (১-১০)</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_bstu']))? $medhabider_khoje_program['pchr1the1o_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_mnmk']))? $medhabider_khoje_program['pchr1the1o_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_bksau']))? $medhabider_khoje_program['pchr1the1o_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_aap']))? $medhabider_khoje_program['pchr1the1o_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_vbsp']))? $medhabider_khoje_program['pchr1the1o_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_abu']))? $medhabider_khoje_program['pchr1the1o_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_smsej']))? $medhabider_khoje_program['pchr1the1o_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_btr_sgsv']))? $medhabider_khoje_program['pchr1the1o_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pchr1the1o_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['pchr1the1o_kjk_btr_svss']))? $medhabider_khoje_program['pchr1the1o_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> ৪</td>
                                <td class="tg-y698">এসএসসি ও দাখিল জিপিএ ৫ প্রাপ্ত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_bstu']))? $medhabider_khoje_program['sscodg5p_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_mnmk']))? $medhabider_khoje_program['sscodg5p_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_bksau']))? $medhabider_khoje_program['sscodg5p_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_aap']))? $medhabider_khoje_program['sscodg5p_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_vbsp']))? $medhabider_khoje_program['sscodg5p_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_abu']))? $medhabider_khoje_program['sscodg5p_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_smsej']))? $medhabider_khoje_program['sscodg5p_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_btr_sgsv']))? $medhabider_khoje_program['sscodg5p_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscodg5p_kjk_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscodg5p_kjk_svss']))? $medhabider_khoje_program['sscodg5p_kjk_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">৫ </td>
                                <td class="tg-y698">এইচএসসি জিপিএ ৫ প্রাপ্ত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_bstu']))? $medhabider_khoje_program['sscg5p_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_mnmk']))? $medhabider_khoje_program['sscg5p_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_bksau']))? $medhabider_khoje_program['sscg5p_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_aap']))? $medhabider_khoje_program['sscg5p_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_vbsp']))? $medhabider_khoje_program['sscg5p_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_abu']))? $medhabider_khoje_program['sscg5p_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_smsej']))? $medhabider_khoje_program['sscg5p_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_btr_sgsv']))? $medhabider_khoje_program['sscg5p_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sscg5p_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['sscg5p_kjk_btr_svss']))? $medhabider_khoje_program['sscg5p_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">৬ </td>
                                <td class="tg-y698">অনার্স ১ম-৪র্থ বর্ষ ও মাস্টার্সে ১ম শ্রেণী প্রাপ্ত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_bstu']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_mnmk']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_bksau']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_aap']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_vbsp']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_abu']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_smsej']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_btr_sgsv']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="h1m4thobm1mchp_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['h1m4thobm1mchp_kjk_btr_svss']))? $medhabider_khoje_program['h1m4thobm1mchp_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">৭ </td>
                                <td class="tg-y698">আদর্শ কলেজে ১ম-৫ম পর্যন্ত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_bstu']))? $medhabider_khoje_program['ac1m5mp_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_mnmk']))? $medhabider_khoje_program['ac1m5mp_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_bksau']))? $medhabider_khoje_program['ac1m5mp_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_aap']))? $medhabider_khoje_program['ac1m5mp_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_vbsp']))? $medhabider_khoje_program['ac1m5mp_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_abu']))? $medhabider_khoje_program['ac1m5mp_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_smsej']))? $medhabider_khoje_program['ac1m5mp_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_btr_sgsv']))? $medhabider_khoje_program['ac1m5mp_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ac1m5mp_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['ac1m5mp_kjk_btr_svss']))? $medhabider_khoje_program['ac1m5mp_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">৮ </td>
                                <td class="tg-y698">ফাযিল,কামিল স্ট্যান্ড ধারী </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_bstu']))? $medhabider_khoje_program['fksdh_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_mnmk']))? $medhabider_khoje_program['fksdh_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_bksau']))? $medhabider_khoje_program['fksdh_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_aap']))? $medhabider_khoje_program['fksdh_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_vbsp']))? $medhabider_khoje_program['fksdh_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_abu']))? $medhabider_khoje_program['fksdh_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_smsej']))? $medhabider_khoje_program['fksdh_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_btr_sgsv']))? $medhabider_khoje_program['fksdh_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fksdh_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['fksdh_kjk_btr_svss']))? $medhabider_khoje_program['fksdh_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">৯</td>
                                <td class="tg-y698">মেডিক্যাল কলেজে প্রত্যেক বর্ষে ১ম-৫ম</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_bstu']))? $medhabider_khoje_program['mcprb1m5m_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_mnmk']))? $medhabider_khoje_program['mcprb1m5m_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_bksau']))? $medhabider_khoje_program['mcprb1m5m_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_aap']))? $medhabider_khoje_program['mcprb1m5m_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_vbsp']))? $medhabider_khoje_program['mcprb1m5m_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_abu']))? $medhabider_khoje_program['mcprb1m5m_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_smsej']))? $medhabider_khoje_program['mcprb1m5m_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_btr_sgsv']))? $medhabider_khoje_program['mcprb1m5m_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mcprb1m5m_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['mcprb1m5m_kjk_btr_svss']))? $medhabider_khoje_program['mcprb1m5m_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">১০</td>
                                <td class="tg-y698">কারিগরী প্রতিষ্ঠান ১ম-৫ম</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_bstu']))? $medhabider_khoje_program['kp1m5m_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_mnmk']))? $medhabider_khoje_program['kp1m5m_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_bksau']))? $medhabider_khoje_program['kp1m5m_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_aap']))? $medhabider_khoje_program['kp1m5m_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_vbsp']))? $medhabider_khoje_program['kp1m5m_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_abu']))? $medhabider_khoje_program['kp1m5m_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_smsej']))? $medhabider_khoje_program['kp1m5m_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_btr_sgsv']))? $medhabider_khoje_program['kp1m5m_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kp1m5m_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['kp1m5m_kjk_btr_svss']))? $medhabider_khoje_program['kp1m5m_kjk_btr_svss']:'' ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">১১</td>
                                <td class="tg-y698">অন্যান্য</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_bstu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_bstu']))? $medhabider_khoje_program['onnoanno_kjk_bstu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_mnmk" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_mnmk']))? $medhabider_khoje_program['onnoanno_kjk_mnmk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_bksau" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_bksau']))? $medhabider_khoje_program['onnoanno_kjk_bksau']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_aap" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_aap']))? $medhabider_khoje_program['onnoanno_kjk_aap']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_vbsp" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_vbsp']))? $medhabider_khoje_program['onnoanno_kjk_vbsp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_abu" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_abu']))? $medhabider_khoje_program['onnoanno_kjk_abu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_smsej" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_smsej']))? $medhabider_khoje_program['onnoanno_kjk_smsej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_btr_sgsv" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_btr_sgsv']))? $medhabider_khoje_program['onnoanno_kjk_btr_sgsv']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="medhabider_khoje_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_kjk_btr_svss" data-title="Enter"><?php echo (isset( $medhabider_khoje_program['onnoanno_kjk_btr_svss']))? $medhabider_khoje_program['onnoanno_kjk_btr_svss']:'' ?></a>
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
