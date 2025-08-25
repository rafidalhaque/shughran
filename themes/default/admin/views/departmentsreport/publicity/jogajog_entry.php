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
                            <li><a href="<?= admin_url('departmentsreport/publicity-jogajog') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publicity-jogajog/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7"  colspan="2">ধরণ</td>
                                <td class="tg-pwj7" >মোট সংখ্যা  </td>
                                <td class="tg-pwj7" >সভাপতি/সেক্রেটারীর যোগাযোগ </td>
                                <td class="tg-pwj7" >সম্পাদকের যোগাযোগ  </td>
                                
                            </tr>

                            <?php
                            $pk = (isset($jogajog['id']))?$jogajog['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1" colspan="2"> পত্রিকার সম্পাদক</td>
                                <td class="tg-0pky  type_1">
 
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="psd_ssej" data-title="Enter"><?php echo $psd_ssej=  (isset( $jogajog['psd_ssej']))? $jogajog['psd_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="psd_skj" data-title="Enter"><?php echo $psd_skj=  (isset( $jogajog['psd_skj']))? $jogajog['psd_skj']:'' ?></a>
                                </td>
                                
                                

                            </tr>


                            <tr>
                                <td class="tg-y698" colspan="2">মিডিয়া ব্যক্তিত্ব </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbt_ssej" data-title="Enter"><?php echo $mbt_ssej=  (isset( $jogajog['mbt_ssej']))? $jogajog['mbt_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mbt_skj" data-title="Enter"><?php echo $mbt_skj=  (isset( $jogajog['mbt_skj']))? $jogajog['mbt_skj']:'' ?></a>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">টিভি </td>
                                <td class="tg-y698">জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_jpn_ssej" data-title="Enter"><?php echo $tv_jpn_ssej=  (isset( $jogajog['tv_jpn_ssej']))? $jogajog['tv_jpn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_jpn_skj" data-title="Enter"><?php echo $tv_jpn_skj=  (isset( $jogajog['tv_jpn_skj']))? $jogajog['tv_jpn_skj']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">জাতীয় পত্রিকা </td>
                                <td class="tg-y698" >জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jpk_jpn_ssej" data-title="Enter"><?php echo $jpk_jpn_ssej=  (isset( $jogajog['jpk_jpn_ssej']))? $jogajog['jpk_jpn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jpk_jpn_skj" data-title="Enter"><?php echo $jpk_jpn_skj=  (isset( $jogajog['jpk_jpn_skj']))? $jogajog['jpk_jpn_skj']:'' ?></a>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jpk_thpn_ssej" data-title="Enter"><?php echo $jpk_thpn_ssej=  (isset( $jogajog['jpk_thpn_ssej']))? $jogajog['jpk_thpn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jpk_thpn_skj" data-title="Enter"><?php echo $jpk_thpn_skj=  (isset( $jogajog['jpk_thpn_skj']))? $jogajog['jpk_thpn_skj']:'' ?></a>
                                </td>
                         
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="3">আঞ্চলিক পত্রিকা </td>
                                <td class="tg-y698">জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akpk_jpn_ssej" data-title="Enter"><?php echo $akpk_jpn_ssej=  (isset( $jogajog['akpk_jpn_ssej']))? $jogajog['akpk_jpn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akpk_jpn_skj" data-title="Enter"><?php echo $akpk_jpn_skj=  (isset( $jogajog['akpk_jpn_skj']))? $jogajog['akpk_jpn_skj']:'' ?></a>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">স্টাফ রিপোর্টার</td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akpk_sfrpt_ssej" data-title="Enter"><?php echo $akpk_sfrpt_ssej=  (isset( $jogajog['akpk_sfrpt_ssej']))? $jogajog['akpk_sfrpt_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akpk_sfrpt_skj" data-title="Enter"><?php echo $akpk_sfrpt_skj=  (isset( $jogajog['akpk_sfrpt_skj']))? $jogajog['akpk_sfrpt_skj']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">থানা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akpk_thpn_ssej" data-title="Enter"><?php echo $akpk_thpn_ssej=  (isset( $jogajog['akpk_thpn_ssej']))? $jogajog['akpk_thpn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akpk_thpn_skj" data-title="Enter"><?php echo $akpk_thpn_skj=  (isset( $jogajog['akpk_thpn_skj']))? $jogajog['akpk_thpn_skj']:'' ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">জাতীয় অনলাইন </td>
                                <td class="tg-y698">জেলা প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonl_jepn_ssej" data-title="Enter"><?php echo $jonl_jepn_ssej=  (isset( $jogajog['jonl_jepn_ssej']))? $jogajog['jonl_jepn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="jonl_jepn_skj" data-title="Enter"><?php echo $jonl_jepn_skj=  (isset( $jogajog['jonl_jepn_skj']))? $jogajog['jonl_jepn_skj']:'' ?></a>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">আঞ্চলিক অনলাইন </td>
                                <td class="tg-y698">প্রতিনিধি </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akonl_pn_ssej" data-title="Enter"><?php echo $akonl_pn_ssej=  (isset( $jogajog['akonl_pn_ssej']))? $jogajog['akonl_pn_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="akonl_pn_skj" data-title="Enter"><?php echo $akonl_pn_skj=  (isset( $jogajog['akonl_pn_skj']))? $jogajog['akonl_pn_skj']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698" colspan="2" style="text-align:center">কলামিস্ট </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cm_ssej" data-title="Enter"><?php echo $cm_ssej=  (isset( $jogajog['cm_ssej']))? $jogajog['cm_ssej']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cm_skj" data-title="Enter"><?php echo $cm_skj=  (isset( $jogajog['cm_skj']))? $jogajog['cm_skj']:'' ?></a>
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
