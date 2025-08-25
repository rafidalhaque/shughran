<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">

            <i class="fa-fw fa fa-barcode"></i><?= 'কুরআন শীক্ষা কার্যক্রম রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>


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
                            <li><a href="<?= admin_url('departmentsreport/quran-sikkha-report') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/quran-sikkha-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                             
                             <td class="tg-pwj7" colspan="4" style="text-align:center;">মক্তব  </td>
                             <td class="tg-pwj7" colspan="2ss" style="text-align:center;">শিক্ষার্থী   </td>
                             
                         </tr>
                         <tr>

                         </tr>
                         <tr>
                             <td class="tg-pwj7 "><div><span> পূর্বের সংখ্যা    </span></div></td>
                             <td class="tg-pwj7 "><div><span>বর্তমান সংখ্যা  </span></div></td>
                             <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                             <td class="tg-pwj7 "><div><span>ঘাটতি </span></div></td>
                             <td class="tg-pwj7 "><div><span>অধ্যায়ন কারীর সংখ্যা </span></div></td>
                             <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                           
                            
                         </tr>

                         <?php $pk = (isset($quran_shikkha_karjokrom_riport['id']))?$quran_shikkha_karjokrom_riport['id']:'';?>


                         <tr>
                             
                             <td class="tg-0pky  type_1">
                             <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="quran_shikkha_karjokrom_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="mt_pus"
                                            data-title="Enter"><?php echo $_mt_pus=  (isset( $quran_shikkha_karjokrom_riport['mt_pus']))? $quran_shikkha_karjokrom_riport['mt_pus']:'' ?></a>
                             </td>
                             <td class="tg-0pky  type_2">
                             <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="quran_shikkha_karjokrom_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="mt_bms"
                                            data-title="Enter"><?php echo $_mt_bms=  (isset( $quran_shikkha_karjokrom_riport['mt_bms']))? $quran_shikkha_karjokrom_riport['mt_bms']:'' ?></a>
                             </td>
                             <td class="tg-0pky  type_3">
                             <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="quran_shikkha_karjokrom_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="mt_br"
                                            data-title="Enter"><?php echo $_mt_br=  (isset( $quran_shikkha_karjokrom_riport['mt_br']))? $quran_shikkha_karjokrom_riport['mt_br']:'' ?></a>
                             </td>
                             <td class="tg-0pky  type_4">
                             <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="quran_shikkha_karjokrom_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="mt_gt"
                                            data-title="Enter"><?php echo $_mt_gt=  (isset( $quran_shikkha_karjokrom_riport['mt_gt']))? $quran_shikkha_karjokrom_riport['mt_gt']:'' ?></a>
                             </td>
                             <td class="tg-0pky  type_5">
                             <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="quran_shikkha_karjokrom_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="shth_oks"
                                            data-title="Enter"><?php echo $_shth_oks=  (isset( $quran_shikkha_karjokrom_riport['shth_oks']))? $quran_shikkha_karjokrom_riport['shth_oks']:'' ?></a>
                             </td>
                             <td class="tg-0pky  type_6">
                             <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="quran_shikkha_karjokrom_riport"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="shth_br"
                                            data-title="Enter"><?php echo $_shth_br=  (isset( $quran_shikkha_karjokrom_riport['shth_br']))? $quran_shikkha_karjokrom_riport['shth_br']:'' ?></a>
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
