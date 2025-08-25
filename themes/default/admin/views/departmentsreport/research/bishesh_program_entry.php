<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিশেষ প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bishesh-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bishesh-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                    <td class="tg-pwj7" >ধরন </td>
                                    <td class="tg-pwj7" >সংখ্যা </td>
                                    <td class="tg-pwj7" >অংশগ্রহণকারী সংখ্যা   </td>
                                    <td class="tg-pwj7" >আয়োজনে</td>
                            
                            </tr>

                            <?php $pk = (isset($bishes_program['id']))?$bishes_program['id']:'';?>

                            <tr>
                                <td class="tg-y698 type_1">  ওয়ার্কশপ 	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osh_s" data-title="Enter"><?php echo $osh_s=  (isset( $bishes_program['osh_s']))?$bishes_program['osh_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osh_ogks" data-title="Enter"><?php echo $osh_ogks=  (isset( $bishes_program['osh_ogks']))?$bishes_program['osh_ogks']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="osh_aj" data-title="Enter"><?php echo $osh_aj=  (isset( $bishes_program['osh_aj']))?$bishes_program['osh_aj']:'' ?></a>
                                </td>
                                
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">সেমিনার </td>
                                <td class="tg-0pky  type_1">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skf_s" data-title="Enter"><?php echo $skf_s=  (isset( $bishes_program['skf_s']))?$bishes_program['skf_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skf_ogks" data-title="Enter"><?php echo $skf_ogks=  (isset( $bishes_program['skf_ogks']))?$bishes_program['skf_ogks']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skf_aj" data-title="Enter"><?php echo $skf_aj=  (isset( $bishes_program['skf_aj']))?$bishes_program['skf_aj']:'' ?></a>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাসফর   </td>
                                <td class="tg-0pky  type_1">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_s" data-title="Enter"><?php echo $shsf_s=  (isset( $bishes_program['shsf_s']))?$bishes_program['shsf_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_ogks" data-title="Enter"><?php echo $shsf_ogks=  (isset( $bishes_program['shsf_ogks']))?$bishes_program['shsf_ogks']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_aj" data-title="Enter"><?php echo $shsf_aj=  (isset( $bishes_program['shsf_aj']))?$bishes_program['shsf_aj']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">বিদেশ </td>
                                <td class="tg-0pky  type_1">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bsf_s" data-title="Enter"><?php echo $bsf_s=  (isset( $bishes_program['bsf_s']))?$bishes_program['bsf_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bsf_ogks" data-title="Enter"><?php echo $bsf_ogks=  (isset( $bishes_program['bsf_ogks']))?$bishes_program['bsf_ogks']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bsf_aj" data-title="Enter"><?php echo $bsf_aj=  (isset( $bishes_program['bsf_aj']))?$bishes_program['bsf_aj']:'' ?></a>
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
