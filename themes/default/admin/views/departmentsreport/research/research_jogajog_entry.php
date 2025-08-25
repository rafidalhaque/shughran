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
                            <li><a href="<?= admin_url('departmentsreport/research-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/research-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3">ধরন </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">উপলক্ষ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">টার্গেট গ্রুপ</td>
                  
                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($gobeshona_bivag_jogajog['id']))?$gobeshona_bivag_jogajog['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1"> ইমেইল 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="emil_upb" data-title="Enter"><?php echo $emil_upb=  (isset( $gobeshona_bivag_jogajog['emil_upb']))?$gobeshona_bivag_jogajog['emil_upb']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="emil_s" data-title="Enter"><?php echo $emil_s=  (isset( $gobeshona_bivag_jogajog['emil_s']))?$gobeshona_bivag_jogajog['emil_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="emil_tg" data-title="Enter"><?php echo $emil_tg=  (isset( $gobeshona_bivag_jogajog['emil_tg']))?$gobeshona_bivag_jogajog['emil_tg']:'' ?></a>
                       </td>
                     
                       
                   </tr>


                   <tr>
                       <td class="tg-y698">এসএমএস  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sms_upb" data-title="Enter"><?php echo $sms_upb=  (isset( $gobeshona_bivag_jogajog['sms_upb']))?$gobeshona_bivag_jogajog['sms_upb']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sms_s" data-title="Enter"><?php echo $sms_s=  (isset( $gobeshona_bivag_jogajog['sms_s']))?$gobeshona_bivag_jogajog['sms_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sms_tg" data-title="Enter"><?php echo $sms_tg=  (isset( $gobeshona_bivag_jogajog['sms_tg']))?$gobeshona_bivag_jogajog['sms_tg']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ব্লগ লেখা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ble_upb" data-title="Enter"><?php echo $ble_upb=  (isset( $gobeshona_bivag_jogajog['ble_upb']))?$gobeshona_bivag_jogajog['ble_upb']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ble_s" data-title="Enter"><?php echo $ble_s=  (isset( $gobeshona_bivag_jogajog['ble_s']))?$gobeshona_bivag_jogajog['ble_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ble_tg" data-title="Enter"><?php echo $ble_tg=  (isset( $gobeshona_bivag_jogajog['ble_tg']))?$gobeshona_bivag_jogajog['ble_tg']:'' ?></a>
                       </td>
                     
                   </tr>
                   <tr>
                       <td class="tg-y698">চা চক্র  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_upb" data-title="Enter"><?php echo $cc_upb=  (isset( $gobeshona_bivag_jogajog['cc_upb']))?$gobeshona_bivag_jogajog['cc_upb']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_s" data-title="Enter"><?php echo $cc_s=  (isset( $gobeshona_bivag_jogajog['cc_s']))?$gobeshona_bivag_jogajog['cc_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cc_tg" data-title="Enter"><?php echo $cc_tg=  (isset( $gobeshona_bivag_jogajog['cc_tg']))?$gobeshona_bivag_jogajog['cc_tg']:'' ?></a>
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
