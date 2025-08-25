<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'কওমি ফলাফল পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/qwami-folafol-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/qwami-folafol-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                              
                              
                              <td class="tg-pwj7" rowspan="2">ক্রম</td>
                             
                             <td class="tg-pwj7" colspan="2">জনশক্তি</td>
                             <td class="tg-pwj7" colspan="2">মোট পরীক্ষার্থী </td>
                             <td class="tg-pwj7" colspan="2">  মুমতাজ</td>
                             <td class="tg-pwj7" colspan="2"> জায়িদ জিদ্দান </td>
                             <td class="tg-pwj7" colspan="2">জায়িদ   </td>
                             <td class="tg-pwj7" colspan="2">মকবুল</td>
                            
                             <td class="tg-pwj7" colspan="2">মোট</td>
                           </tr>

                            <tr>
                               
                               
                   
                               
                                
                                
                                
                               
                            </tr>

                            <?php
                            $pk = (isset($komi_folafol_porisonkhan_baoraye_hadis['id']))?$komi_folafol_porisonkhan_baoraye_hadis['id']:'';
                            ?>


                            <tr>
                            
                            <td class="tg-y698 type_1"> ১	</td>
                                <td class="tg-y698 type_1" colspan="2"> সদস্য	</td>
                               
                                  
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_mp" data-title="Enter"><?php echo $sodosso_mp=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sodosso_mp']))? $komi_folafol_porisonkhan_baoraye_hadis['sodosso_mp']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_mt" data-title="Enter"><?php echo $sodosso_mt=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sodosso_mt']))? $komi_folafol_porisonkhan_baoraye_hadis['sodosso_mt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_gagi" data-title="Enter"><?php echo $sodosso_gagi=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sodosso_gagi']))? $komi_folafol_porisonkhan_baoraye_hadis['sodosso_gagi']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_ga" data-title="Enter"><?php echo $sodosso_ga=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sodosso_ga']))? $komi_folafol_porisonkhan_baoraye_hadis['sodosso_ga']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_mb" data-title="Enter"><?php echo $sodosso_mb=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sodosso_mb']))? $komi_folafol_porisonkhan_baoraye_hadis['sodosso_mb']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $sodosso=($sodosso_mp!=0)?($sodosso_mp+$sodosso_mt+$sodosso_gagi+$sodosso_ga+$sodosso_mb):0?>
                                </td>
                                
                              

                            </tr>


                            <tr>
                            
                            <td class="tg-y698 type_1"> ২	</td>
                                <td class="tg-y698" colspan="2">সাথী </td>
                             
                            
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_mp" data-title="Enter"><?php echo $sathi_mp=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sathi_mp']))? $komi_folafol_porisonkhan_baoraye_hadis['sathi_mp']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_mt" data-title="Enter"><?php echo $sathi_mt=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sathi_mt']))? $komi_folafol_porisonkhan_baoraye_hadis['sathi_mt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_gagi" data-title="Enter"><?php echo $sathi_gagi=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sathi_gagi']))? $komi_folafol_porisonkhan_baoraye_hadis['sathi_gagi']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_ga" data-title="Enter"><?php echo $sathi_ga=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sathi_ga']))? $komi_folafol_porisonkhan_baoraye_hadis['sathi_ga']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_mb" data-title="Enter"><?php echo $sathi_mb=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['sathi_mb']))? $komi_folafol_porisonkhan_baoraye_hadis['sathi_mb']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $sathi=($sathi_mp!=0)?($sathi_mp+$sathi_mt+$sathi_gagi+$sathi_ga+$sathi_mb):0?>
                                </td>
                             
                            </tr>
                            <tr>
                            
                            <td class="tg-y698 type_1"> ৩	</td>
                                <td class="tg-y698" colspan="2">কর্মী </td>
                                
                          
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_mp" data-title="Enter"><?php echo $kormi_mp=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['kormi_mp']))? $komi_folafol_porisonkhan_baoraye_hadis['kormi_mp']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_mt" data-title="Enter"><?php echo $kormi_mt=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['kormi_mt']))? $komi_folafol_porisonkhan_baoraye_hadis['kormi_mt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_gagi" data-title="Enter"><?php echo $kormi_gagi=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['kormi_gagi']))? $komi_folafol_porisonkhan_baoraye_hadis['kormi_gagi']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_ga" data-title="Enter"><?php echo $kormi_ga=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['kormi_ga']))? $komi_folafol_porisonkhan_baoraye_hadis['kormi_ga']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_mb" data-title="Enter"><?php echo $kormi_mb=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['kormi_mb']))? $komi_folafol_porisonkhan_baoraye_hadis['kormi_mb']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $kormi=($kormi_mp!=0)?($kormi_mp+$kormi_mt+$kormi_gagi+$kormi_ga+$kormi_mb):0?>
                                </td>
                              

                            </tr>
                          
                            <tr>
                            
                            <td class="tg-y698 type_1"> ৪	</td>
                                <td class="tg-y698" colspan="2">সমর্থক  </td>
                                
                             
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_mp" data-title="Enter"><?php echo $somorthok_mp=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['somorthok_mp']))? $komi_folafol_porisonkhan_baoraye_hadis['somorthok_mp']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_mt" data-title="Enter"><?php echo $somorthok_mt=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['somorthok_mt']))? $komi_folafol_porisonkhan_baoraye_hadis['somorthok_mt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_gagi" data-title="Enter"><?php echo $somorthok_gagi=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['somorthok_gagi']))? $komi_folafol_porisonkhan_baoraye_hadis['somorthok_gagi']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_ga" data-title="Enter"><?php echo $somorthok_ga=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['somorthok_ga']))? $komi_folafol_porisonkhan_baoraye_hadis['somorthok_ga']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_mb" data-title="Enter"><?php echo $somorthok_mb=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['somorthok_mb']))? $komi_folafol_porisonkhan_baoraye_hadis['somorthok_mb']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $somorthok=($somorthok_mp!=0)?($somorthok_mp+$somorthok_mt+$somorthok_gagi+$somorthok_ga+$somorthok_mb):0?>
                                </td>
                              

                            </tr>
                            <td class="tg-y698 type_1"> ৫	</td>
                                <td class="tg-y698" colspan="2">বন্ধু ্</td>
                                
                             
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_mp" data-title="Enter"><?php echo $bondu_mp=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['bondu_mp']))? $komi_folafol_porisonkhan_baoraye_hadis['bondu_mp']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_mt" data-title="Enter"><?php echo $bondu_mt=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['bondu_mt']))? $komi_folafol_porisonkhan_baoraye_hadis['bondu_mt']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_gagi" data-title="Enter"><?php echo $bondu_gagi=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['bondu_gagi']))? $komi_folafol_porisonkhan_baoraye_hadis['bondu_gagi']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_ga" data-title="Enter"><?php echo $bondu_ga=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['bondu_ga']))? $komi_folafol_porisonkhan_baoraye_hadis['bondu_ga']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="komi_folafol_porisonkhan_baoraye_hadis" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bondu_mb" data-title="Enter"><?php echo $bondu_mb=  (isset( $komi_folafol_porisonkhan_baoraye_hadis['bondu_mb']))? $komi_folafol_porisonkhan_baoraye_hadis['bondu_mb']:'' ?></a>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $bondu=($bondu_mp!=0)?($bondu_mp+$bondu_mt+$bondu_gagi+$bondu_ga+$bondu_mb):0?>
                                </td>
                              

                            </tr>
                            
                            
                            <tr>
                            
                            
                              
                                <td class="tg-0pky" colspan="3">মোট</td>    
                                <td class="tg-0pky" colspan="2">
                                <?php echo $mp=($sodosso_mp!=0)?($sodosso_mp+$sathi_mp+$kormi_mp+$somorthok_mp+$bondu_mp):0?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $mt=($sodosso_mt!=0)?($sodosso_mt+$sathi_mt+$kormi_mt+$somorthok_mt+$bondu_mt):0?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $gagi=($sodosso_gagi!=0)?($sodosso_gagi+$sathi_gagi+$kormi_gagi+$somorthok_gagi+$bondu_gagi):0?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $ga=($sodosso_ga!=0)?($sodosso_ga+$sathi_ga+$kormi_ga+$somorthok_ga+$bondu_ga):0?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $mb=($sodosso_mb!=0)?($sodosso_mb+$sathi_mb+$kormi_mb+$somorthok_mb+$bondu_mb):0?>
                                </td>
                                <td class="tg-0pky" colspan="2">
                                <?php echo $total=($mp+$mt+$gagi+$ga+$mb)?>
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
