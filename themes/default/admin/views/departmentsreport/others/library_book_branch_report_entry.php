<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'পাঠাগার, বই , শাখা রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/library-book-branch-report') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/library-book-branch-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="">ক্রমিক    </td>
                                <td class="tg-pwj7" colspan="">বিবরণ </td>
                                
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">কারণ </td>
                           
                            </tr>


                        <?php
                        $pk = (isset($aknojorepathagar_boi_shakha_riport['id']))?$aknojorepathagar_boi_shakha_riport['id']:'';
                        ?>


                            <tr>
                                <td class="tg-y698 type_1">১	</td>
                                <td class="tg-0pky">
                                পাঠাগার ঘাটতি
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pggt_s" data-title="Enter"><?php echo $pggt_s=  (isset( $aknojorepathagar_boi_shakha_riport['pggt_s']))? $aknojorepathagar_boi_shakha_riport['pggt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pggt_k" data-title="Enter"><?php echo $pggt_k=  (isset( $aknojorepathagar_boi_shakha_riport['pggt_k']))? $aknojorepathagar_boi_shakha_riport['pggt_k']:'' ?></a>
                                </td>
                                

                            </tr>


                            <tr>
                                <td class="tg-y698">২</td>
                                <td class="tg-0pky">
                                বই ঘাটতি 
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgt_s" data-title="Enter"><?php echo $bgt_s=  (isset( $aknojorepathagar_boi_shakha_riport['bgt_s']))? $aknojorepathagar_boi_shakha_riport['bgt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bgt_k" data-title="Enter"><?php echo $bgt_k=  (isset( $aknojorepathagar_boi_shakha_riport['bgt_k']))? $aknojorepathagar_boi_shakha_riport['bgt_k']:'' ?></a>
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698">৩ </td>
                                <td class="tg-0pky">
                                উপশাখা ঘাটতি
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshgt_s" data-title="Enter"><?php echo $upshgt_s=  (isset( $aknojorepathagar_boi_shakha_riport['upshgt_s']))? $aknojorepathagar_boi_shakha_riport['upshgt_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upshgt_k" data-title="Enter"><?php echo $upshgt_k=  (isset( $aknojorepathagar_boi_shakha_riport['upshgt_k']))? $aknojorepathagar_boi_shakha_riport['upshgt_k']:'' ?></a>
                                </td>
                             

                            </tr>
                            <tr>
                                <td class="tg-y698">৪ </td>
                                <td class="tg-0pky">
                                সাথী  শাখা
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satsh_s" data-title="Enter"><?php echo $satsh_s=  (isset( $aknojorepathagar_boi_shakha_riport['satsh_s']))? $aknojorepathagar_boi_shakha_riport['satsh_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="satsh_k" data-title="Enter"><?php echo $satsh_k=  (isset( $aknojorepathagar_boi_shakha_riport['satsh_k']))? $aknojorepathagar_boi_shakha_riport['satsh_k']:'' ?></a>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">৫</td>
                                <td class="tg-0pky">
                                সাংগঠনিক থানা শাখা
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snthsh_s" data-title="Enter"><?php echo $snthsh_s=  (isset( $aknojorepathagar_boi_shakha_riport['snthsh_s']))? $aknojorepathagar_boi_shakha_riport['snthsh_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="aknojorepathagar_boi_shakha_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snthsh_k" data-title="Enter"><?php echo $snthsh_k=  (isset( $aknojorepathagar_boi_shakha_riport['snthsh_k']))? $aknojorepathagar_boi_shakha_riport['snthsh_k']:'' ?></a>
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
