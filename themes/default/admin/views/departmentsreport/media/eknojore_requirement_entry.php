<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'এক নজরে রিকুরমেন্' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/eknojore-requirement') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/eknojore-requirement/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7">মোট বৃদ্ধি</td>

                                <td class="tg-pwj7" colspan="3">ক্যাটাগরি</td>
                                <td class="tg-pwj7">মআন্তর্জাতিক গণমাধ্যম </td>
                                <td class="tg-pwj7" colspan="4">জাতীয় গণমাধ্যম/মফস্বল গণমাধ্যম</td>
                            </tr>




                            <tr>

                                <td class="tg-0pky"> </td>
                                <td class="tg-0pky">A</td>
                                <td class="tg-0pky">B</td>
                                <td class="tg-0pky">C</td>
                                <td class="tg-0pky"></td>
                                <td class="tg-0pky">টিভি</td>
                                <td class="tg-0pky">রেডিও/এফএম</td>
                                <td class="tg-0pky">প্রিন্ট</td>
                                <td class="tg-0pky">অনলাইন</td>

                            </tr>
							<?php
                            $pk = (isset($media_bivag7_aknojore_rikrutment['id']))?$media_bivag7_aknojore_rikrutment['id']:'';
                            ?>
                            <?php
                            $kg_a=  (isset( $media_bivag7_aknojore_rikrutment['kg_a']))? $media_bivag7_aknojore_rikrutment['kg_a']:'' ;
                            $kg_b=  (isset( $media_bivag7_aknojore_rikrutment['kg_b']))? $media_bivag7_aknojore_rikrutment['kg_b']:'' ;
                            $kg_c=  (isset( $media_bivag7_aknojore_rikrutment['kg_c']))? $media_bivag7_aknojore_rikrutment['kg_c']:'' ;
                            $ajtgm=  (isset( $media_bivag7_aknojore_rikrutment['ajtgm']))? $media_bivag7_aknojore_rikrutment['ajtgm']:'';
                            $jgmmfsgm_tv=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_tv']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_tv']:'' ;
                            $jgmmfsgm_rfm=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_rfm']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_rfm']:'' ;
                            $jgmmfsgm_print=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_print']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_print']:'' ;
                            $jgmmfsgm_online=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_online']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_online']:'' ;
                            ?>
							
                            <tr>
                            <td class="tg-0pky"> 
                            <?php echo ($kg_a!=0)? ($kg_a+$kg_b+$kg_c+$ajtgm+$jgmmfsgm_tv+$jgmmfsgm_rfm+$jgmmfsgm_print+$jgmmfsgm_online):0?>
							</td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kg_a" data-title="Enter"><?php echo $kg_a ?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kg_b" data-title="Enter"><?php echo $kg_b?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kg_c" data-title="Enter"><?php echo $kg_c?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ajtgm" data-title="Enter"><?php echo $ajtgm ?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jgmmfsgm_tv" data-title="Enter"><?php echo $jgmmfsgm_tv ?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jgmmfsgm_rfm" data-title="Enter"><?php echo $jgmmfsgm_rfm=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_rfm']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_rfm']:'' ?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jgmmfsgm_print" data-title="Enter"><?php echo $jgmmfsgm_print=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_print']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_print']:'' ?></a>
                            </td>
                            <td class="tg-0pky">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag7_aknojore_rikrutment" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jgmmfsgm_online" data-title="Enter"><?php echo $jgmmfsgm_online=  (isset( $media_bivag7_aknojore_rikrutment['jgmmfsgm_online']))? $media_bivag7_aknojore_rikrutment['jgmmfsgm_online']:'' ?></a>
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
