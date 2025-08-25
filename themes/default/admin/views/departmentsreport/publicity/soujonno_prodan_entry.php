<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সৌজন্য প্রদান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/soujonno-prodan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/soujonno-prodan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="">যাদেরকে দেয়া হয়েছে </td>
                                <td class="tg-pwj7" colspan="4">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="4">উপলক্ষ </td>
                                <td class="tg-pwj7" colspan="4">কতবার </td>
                            
                            </tr>
                            <?php
                            $pk = (isset($sojonno_prodhan['id']))?$sojonno_prodhan['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7 " ><div><span>সম্পাদক/ সাংবাদিক/ কলামিস্ট /মিডিয়া ব্যক্তিত্ব</span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sd_s" data-title="Enter"><?php echo $sd_s=  (isset( $sojonno_prodhan['sd_s']))? $sojonno_prodhan['sd_s']:'' ?></a>
                                 </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sd_up" data-title="Enter"><?php echo $sd_up=  (isset( $sojonno_prodhan['sd_up']))? $sojonno_prodhan['sd_up']:'' ?></a>
                                </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sd_kb" data-title="Enter"><?php echo $sd_kb=  (isset( $sojonno_prodhan['sd_kb']))? $sojonno_prodhan['sd_kb']:'' ?></a>
                                 </span></div></td>
                                <td class="tg-pwj7 "><div><span> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sab_s" data-title="Enter"><?php echo $sab_s=  (isset( $sojonno_prodhan['sab_s']))? $sojonno_prodhan['sab_s']:'' ?></a>
                                </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sab_up" data-title="Enter"><?php echo $sab_up=  (isset( $sojonno_prodhan['sab_up']))? $sojonno_prodhan['sab_up']:'' ?></a>
                                </span></div></td>
                                <td class="tg-pwj7 "><div><span> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sab_kb" data-title="Enter"><?php echo $sab_kb=  (isset( $sojonno_prodhan['sab_kb']))? $sojonno_prodhan['sab_kb']:'' ?></a>
                                </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cm_s" data-title="Enter"><?php echo $cm_s=  (isset( $sojonno_prodhan['cm_s']))? $sojonno_prodhan['cm_s']:'' ?></a>
                                 </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cm_up" data-title="Enter"><?php echo $cm_up=  (isset( $sojonno_prodhan['cm_up']))? $sojonno_prodhan['cm_up']:'' ?></a>
                                </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cm_kb" data-title="Enter"><?php echo $cm_kb=  (isset( $sojonno_prodhan['cm_kb']))? $sojonno_prodhan['cm_kb']:'' ?></a>
                                 </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mb_s" data-title="Enter"><?php echo $mb_s=  (isset( $sojonno_prodhan['mb_s']))? $sojonno_prodhan['mb_s']:'' ?></a>
                                 </span></div></td>
                                <td class="tg-pwj7 "><div><span>
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mb_up" data-title="Enter"><?php echo $mb_up=  (isset( $sojonno_prodhan['mb_up']))? $sojonno_prodhan['mb_up']:'' ?></a>
                                </span></div></td>
                                <td class="tg-pwj7 "><div><span> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="sojonno_prodhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mb_kb" data-title="Enter"><?php echo $mb_kb=  (isset( $sojonno_prodhan['mb_kb']))? $sojonno_prodhan['mb_kb']:'' ?></a>
                                </span></div></td>
                              
                               
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
