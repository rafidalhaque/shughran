<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সংগঠন(ইন্টারমিডিয়েট সেকশন আসে এমন কলেজ এবং পলিটেকনিক,মেরিন,টেক্সটাইল ইনস্টিটিউট,আইএইচটি)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="">ধরন</td>
                                <td class="tg-pwj7" colspan="3">প্রতিষ্ঠান  </td>
                                <td class="tg-pwj7" colspan="4">সংগঠন   </td>
                                <td class="tg-pwj7" colspan="3">  আদর্শ থানা শাখা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> থানা মানের  </td>
                                <td class="tg-pwj7" colspan="3"> ওয়ার্ড মানে  </td>
                                <td class="tg-pwj7" colspan="3">উপশাখা  মানের  </td>
                                <td class="tg-pwj7" colspan="3">সমর্থক সংগঠন  </td>
                            </tr>

                            <tr>
                                <td class="tg-y698 "><div><span>কলেজ </span></div></td>

                                <td class="tg-pwj7"><div><span> সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 "><div><span>নেই </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>


                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                                <td class="tg-pwj7 "><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>

                            </tr>

                            <?php
                            $pk = (isset($songothon_sudhu_matro_entarmediyet_honars_digri_mastars['id']))?$songothon_sudhu_matro_entarmediyet_honars_digri_mastars['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 ">সরকারি কলেজ	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_pth_s" data-title="Enter"><?php echo $skcllg_pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_pth_br" data-title="Enter"><?php echo $skcllg_pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_pth_gh" data-title="Enter"><?php echo $skcllg_pth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_so_s" data-title="Enter"><?php echo $skcllg_so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_so_nei" data-title="Enter"><?php echo $skcllg_so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_so_br" data-title="Enter"><?php echo $skcllg_so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_so_gh" data-title="Enter"><?php echo $skcllg_so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_sashm_s" data-title="Enter"><?php echo $skcllg_sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_sashm_br" data-title="Enter"><?php echo $skcllg_sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_sashm_gh" data-title="Enter"><?php echo $skcllg_sashm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_sashm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_thm_s" data-title="Enter"><?php echo $skcllg_thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_thm_br" data-title="Enter"><?php echo $skcllg_thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_thm_gh" data-title="Enter"><?php echo $skcllg_thm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_thm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_ordm_s" data-title="Enter"><?php echo $skcllg_ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_ordm_br" data-title="Enter"><?php echo $skcllg_ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_ordm_gh" data-title="Enter"><?php echo $skcllg_ordm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_ordm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_upm_s" data-title="Enter"><?php echo $skcllg_upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_upm_br" data-title="Enter"><?php echo $skcllg_upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_upm_gh" data-title="Enter"><?php echo $skcllg_upm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_upm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_somso_s" data-title="Enter"><?php echo $skcllg_somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_somso_br" data-title="Enter"><?php echo $skcllg_somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skcllg_somso_gh" data-title="Enter"><?php echo $skcllg_somso_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skcllg_somso_gh']:'' ?></a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">বেসরকারি কলেজ </td>
                                <td class="tg-0pky">

                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_pth_s" data-title="Enter"><?php echo $bekcllg_pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_s']:'' ?></a>
                                </td>

                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_pth_br" data-title="Enter"><?php echo $bekcllg_pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_pth_gh" data-title="Enter"><?php echo $bekcllg_pth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_so_s" data-title="Enter"><?php echo $bekcllg_so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_so_nei" data-title="Enter"><?php echo $bekcllg_so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_so_br" data-title="Enter"><?php echo $bekcllg_so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_so_gh" data-title="Enter"><?php echo $bekcllg_so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_sashm_s" data-title="Enter"><?php echo $bekcllg_sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_sashm_br" data-title="Enter"><?php echo $bekcllg_sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_sashm_gh" data-title="Enter"><?php echo $bekcllg_sashm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_sashm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_thm_s" data-title="Enter"><?php echo $bekcllg_thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_thm_br" data-title="Enter"><?php echo $bekcllg_thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_thm_gh" data-title="Enter"><?php echo $bekcllg_thm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_thm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_ordm_s" data-title="Enter"><?php echo $bekcllg_ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_ordm_br" data-title="Enter"><?php echo $bekcllg_ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_ordm_gh" data-title="Enter"><?php echo $bekcllg_ordm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_ordm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_upm_s" data-title="Enter"><?php echo $bekcllg_upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_upm_br" data-title="Enter"><?php echo $bekcllg_upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_upm_gh" data-title="Enter"><?php echo $bekcllg_upm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_upm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_somso_s" data-title="Enter"><?php echo $bekcllg_somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_somso_br" data-title="Enter"><?php echo $bekcllg_somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekcllg_somso_gh" data-title="Enter"><?php echo $bekcllg_somso_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekcllg_somso_gh']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সরকারি পলিটেকনিক </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_pth_s" data-title="Enter"><?php echo $skptk_pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_pth_br" data-title="Enter"><?php echo $skptk_pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_pth_gh" data-title="Enter"><?php echo $skptk_pth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_so_s" data-title="Enter"><?php echo $skptk_so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_so_nei" data-title="Enter"><?php echo $skptk_so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_so_br" data-title="Enter"><?php echo $skptk_so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_so_gh" data-title="Enter"><?php echo $skptk_so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_sashm_s" data-title="Enter"><?php echo $skptk_sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_sashm_br" data-title="Enter"><?php echo $skptk_sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_thm_s" data-title="Enter"><?php echo $skptk_thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_thm_br" data-title="Enter"><?php echo $skptk_thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_ordm_s" data-title="Enter"><?php echo $skptk_ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_ordm_br" data-title="Enter"><?php echo $skptk_ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_upm_s" data-title="Enter"><?php echo $skptk_upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_upm_br" data-title="Enter"><?php echo $skptk_upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_somso_s" data-title="Enter"><?php echo $skptk_somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_somso_br" data-title="Enter"><?php echo $skptk_somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_ordm_br" data-title="Enter"><?php echo $skptk_ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_upm_s" data-title="Enter"><?php echo $skptk_upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_upm_br" data-title="Enter"><?php echo $skptk_upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_somso_s" data-title="Enter"><?php echo $skptk_somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skptk_somso_br" data-title="Enter"><?php echo $skptk_somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['skptk_somso_br']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারি পলিটেকনিক </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_pth_s" data-title="Enter"><?php echo $bekptk_pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_pth_br" data-title="Enter"><?php echo $bekptk_pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_pth_gh" data-title="Enter"><?php echo $bekptk_pth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_so_s" data-title="Enter"><?php echo $bekptk_so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_so_nei" data-title="Enter"><?php echo $bekptk_so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_so_br" data-title="Enter"><?php echo $bekptk_so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_so_gh" data-title="Enter"><?php echo $bekptk_so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_sashm_s" data-title="Enter"><?php echo $bekptk_sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_sashm_br" data-title="Enter"><?php echo $bekptk_sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_thm_s" data-title="Enter"><?php echo $bekptk_thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_thm_br" data-title="Enter"><?php echo $bekptk_thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_ordm_s" data-title="Enter"><?php echo $bekptk_ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_ordm_br" data-title="Enter"><?php echo $bekptk_ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_upm_s" data-title="Enter"><?php echo $bekptk_upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_upm_br" data-title="Enter"><?php echo $bekptk_upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_somso_s" data-title="Enter"><?php echo $bekptk_somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_somso_br" data-title="Enter"><?php echo $bekptk_somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_ordm_br" data-title="Enter"><?php echo $bekptk_ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_upm_s" data-title="Enter"><?php echo $bekptk_upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_upm_br" data-title="Enter"><?php echo $bekptk_upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_somso_s" data-title="Enter"><?php echo $bekptk_somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bekptk_somso_br" data-title="Enter"><?php echo $bekptk_somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['bekptk_somso_br']:'' ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">মেরিন ইনস্টিটিউট </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__pth_s" data-title="Enter"><?php echo $kmip__pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__pth_br" data-title="Enter"><?php echo $kmip__pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__pth_gh" data-title="Enter"><?php echo $kmip__pth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__so_s" data-title="Enter"><?php echo $kmip__so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__so_nei" data-title="Enter"><?php echo $kmip__so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__so_br" data-title="Enter"><?php echo $kmip__so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__so_gh" data-title="Enter"><?php echo $kmip__so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__sashm_s" data-title="Enter"><?php echo $kmip__sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__sashm_br" data-title="Enter"><?php echo $kmip__sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__sashm_gh" data-title="Enter"><?php echo $kmip__sashm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__sashm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__thm_s" data-title="Enter"><?php echo $kmip__thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__thm_br" data-title="Enter"><?php echo $kmip__thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__thm_gh" data-title="Enter"><?php echo $kmip__thm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__thm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__ordm_s" data-title="Enter"><?php echo $kmip__ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__ordm_br" data-title="Enter"><?php echo $kmip__ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__ordm_gh" data-title="Enter"><?php echo $kmip__ordm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__ordm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__upm_s" data-title="Enter"><?php echo $kmip__upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__upm_br" data-title="Enter"><?php echo $kmip__upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__upm_gh" data-title="Enter"><?php echo $kmip__upm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__upm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__somso_s" data-title="Enter"><?php echo $kmip__somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__somso_br" data-title="Enter"><?php echo $kmip__somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kmip__somso_gh" data-title="Enter"><?php echo $kmip__somso_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['kmip__somso_gh']:'' ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">টেক্সটাইল কলেজ  </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__pth_s" data-title="Enter"><?php echo $tcllg__pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__pth_br" data-title="Enter"><?php echo $tcllg__pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__pth_gh" data-title="Enter"><?php echo $tcllg__pth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__so_s" data-title="Enter"><?php echo $tcllg__so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__so_nei" data-title="Enter"><?php echo $tcllg__so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__so_br" data-title="Enter"><?php echo $tcllg__so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__so_gh" data-title="Enter"><?php echo $tcllg__so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__sashm_s" data-title="Enter"><?php echo $tcllg__sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__sashm_br" data-title="Enter"><?php echo $tcllg__sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__sashm_gh" data-title="Enter"><?php echo $tcllg__sashm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__sashm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__thm_s" data-title="Enter"><?php echo $tcllg__thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__thm_br" data-title="Enter"><?php echo $tcllg__thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__thm_gh" data-title="Enter"><?php echo $tcllg__thm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__thm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__ordm_s" data-title="Enter"><?php echo $tcllg__ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__ordm_br" data-title="Enter"><?php echo $tcllg__ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__ordm_gh" data-title="Enter"><?php echo $tcllg__ordm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__ordm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__upm_s" data-title="Enter"><?php echo $tcllg__upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__upm_br" data-title="Enter"><?php echo $tcllg__upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__upm_gh" data-title="Enter"><?php echo $tcllg__upm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__upm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__somso_s" data-title="Enter"><?php echo $tcllg__somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__somso_br" data-title="Enter"><?php echo $tcllg__somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tcllg__somso_gh" data-title="Enter"><?php echo $tcllg__somso_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['tcllg__somso_gh']:'' ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">আই এইচ টি  </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__pth_s" data-title="Enter"><?php echo $iht__pth_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__pth_br" data-title="Enter"><?php echo $iht__pth_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__pth_gh" data-title="Enter"><?php echo $bekptk_iht__pth_ghpth_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__pth_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__so_s" data-title="Enter"><?php echo $iht__so_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__so_nei" data-title="Enter"><?php echo $iht__so_nei=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_nei']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_nei']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__so_br" data-title="Enter"><?php echo $iht__so_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__so_gh" data-title="Enter"><?php echo $iht__so_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__so_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__sashm_s" data-title="Enter"><?php echo $iht__sashm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__sashm_br" data-title="Enter"><?php echo $iht__sashm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__sashm_gh" data-title="Enter"><?php echo $iht__sashm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__sashm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__thm_s" data-title="Enter"><?php echo $iht__thm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__thm_br" data-title="Enter"><?php echo $iht__thm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__thm_gh" data-title="Enter"><?php echo $iht__thm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__thm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__ordm_s" data-title="Enter"><?php echo $iht__ordm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__ordm_br" data-title="Enter"><?php echo $iht__ordm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__ordm_gh" data-title="Enter"><?php echo $iht__ordm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__ordm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__upm_s" data-title="Enter"><?php echo $iht__upm_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__upm_br" data-title="Enter"><?php echo $iht__upm_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__upm_gh" data-title="Enter"><?php echo $iht__upm_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__upm_gh']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__somso_s" data-title="Enter"><?php echo $iht__somso_s=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_s']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__somso_br" data-title="Enter"><?php echo $iht__somso_br=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_br']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_br']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="songothon_sudhu_matro_entarmediyet_honars_digri_mastars" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="iht__somso_gh" data-title="Enter"><?php echo $iht__somso_gh=  (isset( $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_gh']))? $songothon_sudhu_matro_entarmediyet_honars_digri_mastars['iht__somso_gh']:'' ?></a>
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
