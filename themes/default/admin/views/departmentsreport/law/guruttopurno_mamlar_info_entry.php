<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'গুরুত্বপূর্ণ মামলার তথ্য' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/guruttopurno-mamlar-info') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/guruttopurno-mamlar-info/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3">সাজা সংক্রান্ত</td>
                   
                   <td class="tg-pwj7 "  rowspan="3"><div><span>সাজা কতটি</span></div></td>
                   <td class="tg-pwj7 " rowspan="3"><div><span> মামলার নম্বর </span></div></td>
                   <td class="tg-pwj7 " rowspan="3"><div><span>আইন ও ধারা  </span></div></td>
                   <td class="tg-pwj7 " rowspan="3"><div><span>সাজার মেয়াদ  </span></div></td>
                   <td class="tg-pwj7 " rowspan="3"><div><span>আসামির সংখ্যা</span></div></td>
                 
           
               </tr>
               <tr>
                   
               </tr>
               <tr>
                  
                   <td class="tg-pwj7 "><div><span>কতজন সাজা কেটেছে </span></div></td>
                   <td class="tg-pwj7 "><div><span>আপিল হয়েছে কিনা </span></div></td>
                   <td class="tg-pwj7 " ><div><span>বর্তমান অবস্থা </span></div></td>
     
                  
               </tr>

               <?php $pk = (isset($guruttopurno_mamla_tottho['id']))?$guruttopurno_mamla_tottho['id']:'';?>


               <tr>
                   <td class="tg-y698 type_1">2009-2018 	</td>
                   <td class="tg-0pky  type_1">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_sk"
                                            data-title="Enter"><?php echo $_2009_2018_sk=  (isset( $guruttopurno_mamla_tottho['2009_2018_sk']))? $guruttopurno_mamla_tottho['2009_2018_sk']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_2">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_mn"
                                            data-title="Enter"><?php echo $_2009_2018_mn=  (isset( $guruttopurno_mamla_tottho['2009_2018_mn']))? $guruttopurno_mamla_tottho['2009_2018_mn']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_3">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_adh"
                                            data-title="Enter"><?php echo $_2009_2018_adh=  (isset( $guruttopurno_mamla_tottho['2009_2018_adh']))? $guruttopurno_mamla_tottho['2009_2018_adh']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_4">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_sm"
                                            data-title="Enter"><?php echo $_2009_2018_sm=  (isset( $guruttopurno_mamla_tottho['2009_2018_sm']))? $guruttopurno_mamla_tottho['2009_2018_sm']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_5">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_as"
                                            data-title="Enter"><?php echo $_2009_2018_as=  (isset( $guruttopurno_mamla_tottho['2009_2018_as']))? $guruttopurno_mamla_tottho['2009_2018_as']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_6">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_kskh"
                                            data-title="Enter"><?php echo $_2009_2018_kskh=  (isset( $guruttopurno_mamla_tottho['2009_2018_kskh']))? $guruttopurno_mamla_tottho['2009_2018_kskh']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_7">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_ahok"
                                            data-title="Enter"><?php echo $_2009_2018_ahok=  (isset( $guruttopurno_mamla_tottho['2009_2018_ahok']))? $guruttopurno_mamla_tottho['2009_2018_ahok']:'' ?></a>
                   </td>
                   <td class="tg-0pky  type_8">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="2009_2018_bmo"
                                            data-title="Enter"><?php echo $_2009_2018_bmo=  (isset( $guruttopurno_mamla_tottho['2009_2018_bmo']))? $guruttopurno_mamla_tottho['2009_2018_bmo']:'' ?></a>
                   </td>
                   </td>
                  
                
                   </td>
              

               </tr>


               <tr>
                   <td class="tg-y698">শুধু 2018 </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_sk"
                                            data-title="Enter"><?php echo $sudu_2018_sk=  (isset( $guruttopurno_mamla_tottho['sudu_2018_sk']))? $guruttopurno_mamla_tottho['sudu_2018_sk']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_mn"
                                            data-title="Enter"><?php echo $sudu_2018_mn=  (isset( $guruttopurno_mamla_tottho['sudu_2018_mn']))? $guruttopurno_mamla_tottho['sudu_2018_mn']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_adh"
                                            data-title="Enter"><?php echo $sudu_2018_adh=  (isset( $guruttopurno_mamla_tottho['sudu_2018_adh']))? $guruttopurno_mamla_tottho['sudu_2018_adh']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_sm"
                                            data-title="Enter"><?php echo $sudu_2018_sm=  (isset( $guruttopurno_mamla_tottho['sudu_2018_sm']))? $guruttopurno_mamla_tottho['sudu_2018_sm']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_as"
                                            data-title="Enter"><?php echo $sudu_2018_as=  (isset( $guruttopurno_mamla_tottho['sudu_2018_as']))? $guruttopurno_mamla_tottho['sudu_2018_as']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_kskh"
                                            data-title="Enter"><?php echo $sudu_2018_kskh=  (isset( $guruttopurno_mamla_tottho['sudu_2018_kskh']))? $guruttopurno_mamla_tottho['sudu_2018_kskh']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_ahok"
                                            data-title="Enter"><?php echo $sudu_2018_ahok=  (isset( $guruttopurno_mamla_tottho['sudu_2018_ahok']))? $guruttopurno_mamla_tottho['sudu_2018_ahok']:'' ?></a>
                   </td>
                   <td class="tg-0pky">
                   <a href="#" class="editable editable-click" data-id="" data-idname=""
                                            data-type="number" data-table="guruttopurno_mamla_tottho"
                                            data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="sudu_2018_bmo"
                                            data-title="Enter"><?php echo $sudu_2018_bmo=  (isset( $guruttopurno_mamla_tottho['sudu_2018_bmo']))? $guruttopurno_mamla_tottho['sudu_2018_bmo']:'' ?></a>
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
