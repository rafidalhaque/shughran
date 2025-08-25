<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    @font-face {
        font-family: 'SolaimanLipi';
        src: url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.eot');
        src: url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.woff') format('woff'),
            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.ttf') format('truetype'),
            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
        font-weight: normal;
        font-style: normal;
    }
</style>

<style>
    .table-responsive>.fixed-column {
        position: absolute;
        display: inline-block;
        width: auto;
        border-right: 1px solid #ddd;
    }

    @media(min-width:768px) {
        .table-responsive>.fixed-column {
            display: none;
        }
    }
</style>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'সকল জনশক্তির আউটপুট ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';
                                                            $branch_code = $branch->code; ?>




        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>
                    <a class="hidden" href="#" id="excel" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>

                    <a href="#" onclick="doit('xlsx','example');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> </a>

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('manpower/manpower_output') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('manpower/manpower_output/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); 
                                        ?></p>


                <?php defined('BASEPATH') or exit('No direct script access allowed'); ?>





                <h2 class="output_heading_manpower">সকল জনশক্তির আউটপুট</h2>





                <table class="table table-bordered" id="example">
                    <tbody>





                        <tr>
                            <td colspan="16" class="text-left" style="background: #dfdfdf; font-size: 18px; font-weight:800">সকল </td>
                        </tr>

                        <tr>
                            <td rowspan="2">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
                            <td colspan="3">সর্বশেষ পরীক্ষায় GPA-5 প্রাপ্ত</td>
                            <td colspan="2">ডিপার্টমেন্টে প্লেসধারী (১-৫)</td>
                            <td rowspan="2">প্রভাবশালী পরিবারের সন্তান</td>
                            <td rowspan="2">মাধ্যমিক ও উচ্চ মাধ্যমিক বিজ্ঞানে অধ্যয়নরত</td>
                            <td rowspan="2">কওমী মাদরাসায় অধ্যয়নরত</td>
                            <td rowspan="2">মেডিকেল কলেজে অধ্যয়নরত</td>
                            <td rowspan="2">আদর্শ কলেজে অধ্যয়নরত&nbsp;</td>
                            <td colspan="5">সরকারী বিশ্ববিদ্যালয়ে অধ্যয়নরত (বিভাগভিত্তিক)</td>
                        </tr>
                        <tr>
                            <td>JSC/JDC/সমমান<br />&nbsp;GPA-5</td>
                            <td>SSC/Dhakil/সমমান<br />&nbsp;GPA-5</td>
                            <td>HSC/Alim/সমমান<br />&nbsp;GPA-5</td>
                            <td>সরকারি</td>
                            <td>বেসরকারি</td>
                            <td>প্রকৌশল</td>
                            <td>কৃষি শিক্ষা</td>
                            <td>সাধারণ বিজ্ঞান</td>
                            <td>ব্যবসায় শিক্ষা</td>
                            <td>মানবিক</td>
                        </tr>
                        <tr>

                            <?php

                            if (is_array($output_record_sum) &&  count($output_record_sum) > 0) {
                            ?>
                                <td> <?php echo $output_record_sum[0]['single_digit']; ?></td>
                                <td> <?php echo $output_record_sum[0]['jsc_jdc']; ?></td>
                                <td> <?php echo $output_record_sum[0]['ssc_dhakil']; ?></td>
                                <td> <?php echo $output_record_sum[0]['hsc_alim']; ?></td>
                                <td> <?php echo $output_record_sum[0]['department_position']; ?></td>
                                <td> <?php echo $output_record_sum[0]['position_private']; ?></td>

                                <td><?php echo $output_record_sum[0]['influential']; ?></td>
                                <td><?php echo $output_record_sum[0]['hc_science']; ?></td>
                                <td><?php echo $output_record_sum[0]['madrasha']; ?></td>


                                <td><?php echo $output_record_sum[0]['medical_college']; ?></td>

                                <td><?php echo $output_record_sum[0]['ideal_college']; ?></td>


                                <td><?php echo $output_record_sum[0]['engineeering']; ?></td>

                                <td><?php echo $output_record_sum[0]['agri']; ?></td>

                                <td><?php echo $output_record_sum[0]['science']; ?></td>

                                <td><?php echo $output_record_sum[0]['business']; ?></td>

                                <td><?php echo $output_record_sum[0]['arts']; ?></td>

                        </tr>
                        <tr>
                            <td colspan="16">&nbsp;</td>
                        </tr>


                    <?php

                            }
                    ?>











                    <?php foreach ($institution_types as $institution_type) { ?>

                        <tr>
                            <td colspan="16" class="text-left" style="background: #dfdfdf; font-size: 18px; font-weight:800"><?php echo $institution_type->institution_type; ?></td>
                        </tr>

                        <tr>
                            <td rowspan="2">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
                            <td colspan="3">সর্বশেষ পরীক্ষায় GPA-5 প্রাপ্ত</td>
                            <td colspan="2">ডিপার্টমেন্টে প্লেসধারী (১-৫)</td>
                            <td rowspan="2">প্রভাবশালী পরিবারের সন্তান</td>
                            <td rowspan="2">মাধ্যমিক ও উচ্চ মাধ্যমিক বিজ্ঞানে অধ্যয়নরত</td>
                            <td rowspan="2">কওমী মাদরাসায় অধ্যয়নরত</td>
                            <td rowspan="2">মেডিকেল কলেজে অধ্যয়নরত</td>
                            <td rowspan="2">আদর্শ কলেজে অধ্যয়নরত&nbsp;</td>
                            <td colspan="5">সরকারী বিশ্ববিদ্যালয়ে অধ্যয়নরত (বিভাগভিত্তিক)</td>
                        </tr>
                        <tr>
                            <td>JSC/JDC/সমমান<br />&nbsp;GPA-5</td>
                            <td>SSC/Dhakil/সমমান<br />&nbsp;GPA-5</td>
                            <td>HSC/Alim/সমমান<br />&nbsp;GPA-5</td>
                            <td>সরকারি</td>
                            <td>বেসরকারি</td>
                            <td>প্রকৌশল</td>
                            <td>কৃষি শিক্ষা</td>
                            <td>সাধারণ বিজ্ঞান</td>
                            <td>ব্যবসায় শিক্ষা</td>
                            <td>মানবিক</td>
                        </tr>
                        <tr>

                            <?php $row = output_count($output_record,  $institution_type->id);

                            //var_dump($row );
                            ?>
                            <td> <?php echo $row ?  $row['single_digit']  : 0; ?></td>
                            <td> <?php echo $row ?  $row['jsc_jdc']  : 0; ?></td>
                            <td> <?php echo $row ?  $row['ssc_dhakil']  : 0; ?></td>
                            <td> <?php echo $row ?  $row['hsc_alim'] : 0; ?></td>
                            <td> <?php echo $row ?  $row['department_position']  : 0; ?></td>
                            <td> <?php echo $row ?  $row['position_private']  : 0; ?></td>

                            <td><?php echo $row ?  $row['influential']  : 0; ?></td>
                            <td><?php echo $row ?  $row['hc_science']  : 0; ?></td>
                            <td><?php echo $row ?  $row['madrasha']  : 0; ?></td>


                            <td><?php echo $row ?  $row['medical_college']  : 0; ?></td>

                            <td><?php echo $row ?  $row['ideal_college']  : 0; ?></td>


                            <td><?php echo $row ?  $row['engineeering']  : 0; ?></td>

                            <td><?php echo $row ?  $row['agri']  : 0; ?></td>

                            <td><?php echo $row ?  $row['science']  : 0; ?></td>

                            <td><?php echo $row ?  $row['business']  : 0; ?></td>

                            <td><?php echo $row ?  $row['arts']  : 0; ?></td>

                        </tr>
                        <tr>
                            <td colspan="16">&nbsp;</td>
                        </tr>

                    <?php } ?>





                    </tbody>

                </table>






















                <table class="table table-bordered" id="example" data-branch="<?php echo isset($branch_code) ? $branch_code . '_dawat_output_' : 'central_dawat_output' ?>">
                    <tbody>





                        <tr>
                            <td colspan="16" class="text-left" style="background: #dfdfdf; font-size: 18px; font-weight:800">সকল </td>
                        </tr>



                        <tr>
                            <td colspan="2" rowspan="2">বৃদ্ধিকৃতদের মধ্য থেকে আউটপুট ক্যাটাগরিভূক্ত</td>
                            <td colspan="5" rowspan="2">মাধ্যমিক স্তরের মেধাবী শিক্ষার্থী</td>
                            <td colspan="7">সর্বশেষ পরীক্ষায় GPA-5 প্রাপ্ত </td>
                            <td colspan="2">ডিপার্টমেন্টে প্লেসধারী (১-৫)</td>


                            <td rowspan="2">প্রভাবশালী পরিবারের সন্তান</td>
                            <td colspan="2" rowspan="2">মাধ্যমিক ও উচ্চ মাধ্যমিক বিজ্ঞানে অধ্যয়নরত</td>
                            <td colspan="3" rowspan="2">কওমী মাদরাসায় অধ্যয়নরত</td>
                            <td colspan="2" rowspan="2">মেডিকেল কলেজে অধ্যয়নরত</td>

                            <td rowspan="2">আদর্শ কলেজে অধ্যয়নরত </td>



                            <td colspan="5">সরকারী বিশ্ববিদ্যালয়ে অধ্যয়নরত (বিভাগভিত্তিক) </td>
                        </tr>
                        <tr>
                            <td colspan="2">JSC/JDC<br />GPA-5</td>
                            <td colspan="3">SSC/Dhakil<br />GPA-5</td>
                            <td colspan="2">HSC/Alim<br />GPA-5</td>

                            <td>সরকারি</td>
                            <td>বেসরকারি</td>

                            <td>প্রকৌশল </td>
                            <td>কৃষি শিক্ষা </td>
                            <td>সাধারণ বিজ্ঞান </td>
                            <td>ব্যবসায় শিক্ষা </td>
                            <td>মানবিক </td>
                        </tr>
                        <tr>
                            <td colspan="2">সদস্য হয়েছেন </td>

                            <td colspan="5">single_digit</td>
                            <td colspan="2">jsc_jdc</td>
                            <td colspan="3">ssc_dhakil</td>
                            <td colspan="2">hsc_alim</td>

                            <td>department_position</td>
                            <td>department_position_private</td>
                            <td>influential</td>
                            <td colspan="2">hc_science</td>
                            <td colspan="3">madrasha</td>
                            <td colspan="2">medical_college</td>
                            <td>ideal_college</td>
                            <td>engineeering</td>
                            <td>agri</td>
                            <td>science</td>
                            <td>business</td>
                            <td>arts</td>
                        </tr>
                        <tr>
                            <td colspan="2">সাথী হয়েছেন</td>

                            <td colspan="5">single_digit</td>
                            <td colspan="2">jsc_jdc</td>
                            <td colspan="3">ssc_dhakil</td>
                            <td colspan="2">hsc_alim</td>

                            <td>department_position</td>
                            <td>department_position_private</td>
                            <td>influential</td>
                            <td colspan="2">hc_science</td>
                            <td colspan="3">madrasha</td>
                            <td colspan="2">medical_college</td>
                            <td>ideal_college</td>
                            <td>engineeering</td>
                            <td>agri</td>
                            <td>science</td>
                            <td>business</td>
                            <td>arts</td>
                        </tr>
                        <tr>
                            <td colspan="2">কর্মী হয়েছেন <?php //echo $detailinfo[0]['worker_improvement']; 
                                                            ?></td>

                            <td colspan="5">single_digit</td>
                            <td colspan="2">jsc_jdc</td>
                            <td colspan="3">ssc_dhakil</td>
                            <td colspan="2">hsc_alim</td>

                            <td>department_position</td>
                            <td>department_position_private</td>
                            <td>influential</td>
                            <td colspan="2">hc_science</td>
                            <td colspan="3">madrasha</td>
                            <td colspan="2">medical_college</td>
                            <td>ideal_college</td>
                            <td>engineeering</td>
                            <td>agri</td>
                            <td>science</td>
                            <td>business</td>
                            <td>arts</td>
                        </tr>
                        <tr>
                            <td colspan="2">সমর্থক হয়েছেন <?php //echo $detailinfo[0]['supporter_improvement']; 
                                                            ?></td>

                            <td colspan="5">single_digit</td>
                            <td colspan="2">jsc_jdc</td>
                            <td colspan="3">ssc_dhakil</td>
                            <td colspan="2">hsc_alim</td>

                            <td>department_position</td>
                            <td>department_position_private</td>
                            <td>influential</td>
                            <td colspan="2">hc_science</td>
                            <td colspan="3">madrasha</td>
                            <td colspan="2">medical_college</td>
                            <td>ideal_college</td>
                            <td>engineeering</td>
                            <td>agri</td>
                            <td>science</td>
                            <td>business</td>
                            <td>arts</td>
                        </tr>













                        <?php foreach ($institution_types as $institution_type) { ?>

                            <tr>
                                <td colspan="30" class="text-left" style="background: #dfdfdf; font-size: 18px; font-weight:800"><?php echo $institution_type->institution_type; ?></td>
                            </tr>







                            <tr>

                                <?php $row = output_count($output_record,  $institution_type->id);

                                //var_dump($row );
                                ?>

                                <td colspan="2">সদস্য হয়েছেন </td>

                                <td colspan="5"><?php echo $row ?  $row['single_digit']  : 0; ?></td>
                                <td colspan="2"><?php echo $row ?  $row['jsc_jdc']  : 0; ?></td>
                                <td colspan="3"><?php echo $row ?  $row['ssc_dhakil']  : 0; ?></td>
                                <td colspan="2"><?php echo $row ?  $row['hsc_alim'] : 0; ?></td>

                                <td><?php echo $row ?  $row['department_position']  : 0; ?></td>
                                <td> <?php echo $row ?  $row['position_private']  : 0; ?></td>
                                <td><?php echo $row ?  $row['influential']  : 0; ?></td>
                                <td colspan="2"><?php echo $row ?  $row['hc_science']  : 0; ?></td>
                                <td colspan="3"><?php echo $row ?  $row['madrasha']  : 0; ?></td>
                                <td colspan="2"><?php echo $row ?  $row['medical_college']  : 0; ?></td>


                                <td><?php echo $row ?  $row['ideal_college']  : 0; ?></td>


                                <td><?php echo $row ?  $row['engineeering']  : 0; ?></td>

                                <td><?php echo $row ?  $row['agri']  : 0; ?></td>

                                <td><?php echo $row ?  $row['science']  : 0; ?></td>

                                <td><?php echo $row ?  $row['business']  : 0; ?></td>

                                <td><?php echo $row ?  $row['arts']  : 0; ?></td>
                            </tr>


                            <tr>
                                <td colspan="30">&nbsp;</td>
                            </tr>

                        <?php } ?>



                    </tbody>
                </table>





            </div>
        </div>
    </div>
</div>