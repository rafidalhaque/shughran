<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'যোগাযোগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/media-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                               
                              
                                <td class="tg-pwj7" rowspan="4" >যোগাযোগ</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >মন্তব্য</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >মন্তব্য</td>
                                
                            </tr>

                            <?php
                            $pk = (isset($media_bivag3['id']))?$media_bivag3['id']:'';
                            ?>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> সাংবাদিক	</td>
                               
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdk_s" data-title="Enter"><?php echo $sbdk_s=  (isset( $media_bivag3['sbdk_s']))? $media_bivag3['sbdk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdk_montb" data-title="Enter"><?php echo $sbdk_montb=  (isset( $media_bivag3['sbdk_montb']))? $media_bivag3['sbdk_montb']:'' ?></a>
                                </td>
                                <td class="tg-y698" >বন্ধু </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_s" data-title="Enter"><?php echo $bondu_s=  (isset( $media_bivag3['bondu_s']))? $media_bivag3['bondu_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_montb" data-title="Enter"><?php echo $bondu_montb=  (isset( $media_bivag3['bondu_montb']))? $media_bivag3['bondu_montb']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">ছাত্র</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chtro_s" data-title="Enter"><?php echo $chtro_s=  (isset( $media_bivag3['chtro_s']))? $media_bivag3['chtro_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chtro_montb" data-title="Enter"><?php echo $chtro_montb=  (isset( $media_bivag3['chtro_montb']))? $media_bivag3['chtro_montb']:'' ?></a>
                                </td>
                                <td class="tg-y698" >শিক্ষক</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkhok_s" data-title="Enter"><?php echo $shkhok_s=  (isset( $media_bivag3['shkhok_s']))? $media_bivag3['shkhok_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkhok_montb" data-title="Enter"><?php echo $shkhok_montb=  (isset( $media_bivag3['shkhok_montb']))? $media_bivag3['shkhok_montb']:'' ?></a>
                                </td>                                

                            </tr>
                            <tr>
                                <td class="tg-y698">সম্পাদক</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somdk_s" data-title="Enter"><?php echo $somdk_s=  (isset( $media_bivag3['somdk_s']))? $media_bivag3['somdk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somdk_montb" data-title="Enter"><?php echo $somdk_montb=  (isset( $media_bivag3['somdk_montb']))? $media_bivag3['somdk_montb']:'' ?></a>
                                </td>
                                <td class="tg-y698" > কলামিস্ট </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cllmst_s" data-title="Enter"><?php echo $cllmst_s=  (isset( $media_bivag3['cllmst_s']))? $media_bivag3['cllmst_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag3" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cllmst_montb" data-title="Enter"><?php echo $cllmst_montb=  (isset( $media_bivag3['cllmst_montb']))? $media_bivag3['cllmst_montb']:'' ?></a>
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
