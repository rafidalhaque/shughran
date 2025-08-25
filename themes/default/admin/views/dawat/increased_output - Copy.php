<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'বৃদ্ধিকৃতদের আউটপুট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">

                        <?php if (!$branch_id) { ?>

                        <?php } ?>

                        <li>
                            <a href="#" id="excel" data-action="export_excel">
                                <i class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('dawat/increased_output') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/increased_output/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php

                                        //echo "<pre>";
                                        //print_r($detailinfo);
                                        //echo "</pre>";
                                        ?></p>




                <div class="table-responsive">

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2" rowspan="2">আউটপুট ক্যাটাগরীভূক্তদের মধ্য থেকে মানোন্নয়ন</td>
                                <td colspan="5" rowspan="2">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
                                <td colspan="7">&nbsp;</td>
                                <td rowspan="2">বিজ্ঞান</td>
                                <td rowspan="2">মানবিক</td>
                                <td colspan="2" rowspan="2">ব্যবসায় শিক্ষা</td>
                                <td colspan="3" rowspan="2">কওমি মাদ্রাসা</td>
                                <td colspan="2" rowspan="2">ডিপার্টমেন্টে ১ম-৫ম স্থান অকিারি</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2">JSC/JDC<br />GPA-5</td>
                                <td colspan="3">SSC/Dhakil<br />GPA-5</td>
                                <td colspan="2">HSC/Alim<br />GPA-5</td>
                                <td>মেডিকেল কলেজ</td>
                                <td>প্রকৌশল বিশ্ববিদ্যালয়</td>
                                <td>সরকারি বিশ্ববিদ্যালয়</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2">সদস্য হয়েছেন</td>
                                <td colspan="5">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2">সাথী হয়েছেন</td>
                                <td colspan="5">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td style="width: 79px;">&nbsp;</td>
                                <td style="width: 127px;">&nbsp;</td>
                                <td style="width: 61px;" colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td style="width: 90px;" colspan="2">&nbsp;</td>
                                <td style="width: 75px;">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td style="width: 31px;">&nbsp;</td>
                                <td style="width: 31px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 119px;" colspan="2">কর্মী হয়েছেন</td>
                                <td colspan="5">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 119px;" colspan="2">সমর্থক হয়েছেন</td>
                                <td colspan="5">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="3">&nbsp;</td>
                                <td colspan="2">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>








                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2" width="94">আউটপুট ক্যাটাগরীভূক্তদের মধ্য থেকে মানোন্নয়ন</td>
                                <td colspan="5" width="99">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
                                <td colspan="2" width="56">JSC/JDC<br /> GPA-5</td>
                                <td colspan="3" width="73">SSC/Dhakil<br /> GPA-5</td>
                                <td colspan="2" width="23">HSC/Alim<br /> GPA-5</td>
                                <td width="32">বিজ্ঞান</td>
                                <td width="27">মানবিক</td>
                                <td colspan="2" width="49">ব্যবসায় শিক্ষা</td>
                                <td colspan="3" width="43">কওমি মাদ্রাসা</td>
                                <td colspan="2" width="41">ডিপার্টমেন্টে ১ম-৫ম স্থান অকিারি</td>
                                <td width="33">মেডিকেল কলেজ</td>
                                <td width="37">প্রকৌশল বিশ্ববিদ্যালয়</td>
                                <td width="36">সরকারি বিশ্ববিদ্যালয়</td>
                            </tr>
                            <tr>
                                <td colspan="2" width="94">সদস্য হয়েছেন</td>
                                <td colspan="5" width="99"><?php echo $detailinfo[0]['member_single_digit']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['member_jsc_jdc']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['member_ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['member_hsc_alim']; ?></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                                <td colspan="2"></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $detailinfo[0]['member_public_university']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" width="94">সাথী হয়েছেন</td>
                                <td colspan="5" width="99"><?php echo $detailinfo[0]['asso_single_digit']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['asso_jsc_jdc']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['asso_ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['asso_hsc_alim']; ?></td>
                                <td><?php echo $detailinfo[0]['asso_science']; ?></td>
                                <td><?php echo $detailinfo[0]['asso_arts']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['asso_business']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['asso_madrasha']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['asso_department_position']; ?></td>
                                <td><?php echo $detailinfo[0]['asso_medical_college']; ?></td>
                                <td><?php echo $detailinfo[0]['asso_engineeering']; ?></td>
                                <td><?php echo $detailinfo[0]['asso_public_university']; ?></td>
                            </tr>

                            <tr>
                                <td colspan="2" width="94">কর্মী হয়েছেন</td>
                                <td colspan="5" width="99"><?php echo $detailinfo[0]['worker_single_digit']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_jsc_jdc']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['worker_ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_hsc_alim']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_science']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_arts']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_business']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['worker_madrasha']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['worker_department_position']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_medical_college']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_engineeering']; ?></td>
                                <td><?php echo $detailinfo[0]['worker_public_university']; ?></td>
                            </tr>

                            <tr>
                                <td colspan="2" width="94">সমর্থক হয়েছেন</td>
                                <td colspan="5" width="99"><?php echo $detailinfo[0]['supporter_single_digit']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_jsc_jdc']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['supporter_ssc_dhakil']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_hsc_alim']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_science']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_arts']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_business']; ?></td>
                                <td colspan="3"><?php echo $detailinfo[0]['supporter_madrasha']; ?></td>
                                <td colspan="2"><?php echo $detailinfo[0]['supporter_department_position']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_medical_college']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_engineeering']; ?></td>
                                <td><?php echo $detailinfo[0]['supporter_public_university']; ?></td>
                            </tr>
                        </tbody>
                    </table>












                </div>
            </div>
        </div>
    </div>
</div>