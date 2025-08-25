<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিশেষ কার্যক্রম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/bishesh-karjokrom') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bishesh-karjokrom/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3">বিবরণ </td>
                   
                                
                                
                   </tr>
                   <tr>
                
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">অংশগ্রহণ </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল </td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">অংশগ্রহণ </td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল </td>
                 

                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($bishes_karjokrom['id']))?$bishes_karjokrom['id']:'';?>


                   <tr>
                       <td class="tg-0pky  type_1">
                       শিল্পী সংগ্রহ অভিযান 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsa_s" data-title="Enter"><?php echo $shsa_s=  (isset( $bishes_karjokrom['shsa_s']))?$bishes_karjokrom['shsa_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsa_og" data-title="Enter"><?php echo $shsa_og=  (isset( $bishes_karjokrom['shsa_og']))?$bishes_karjokrom['shsa_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsa_mk" data-title="Enter"><?php echo $shsa_mk=  (isset( $bishes_karjokrom['shsa_mk']))?$bishes_karjokrom['shsa_mk']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       বিক্রয় ও বিতরণ কার্যক্রম
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_s" data-title="Enter"><?php echo $stp_s=  (isset( $bishes_karjokrom['stp_s']))?$bishes_karjokrom['stp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_og" data-title="Enter"><?php echo $stp_og=  (isset( $bishes_karjokrom['stp_og']))?$bishes_karjokrom['stp_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_mk" data-title="Enter"><?php echo $stp_mk=  (isset( $bishes_karjokrom['stp_mk']))?$bishes_karjokrom['stp_mk']:'' ?></a>
                       </td>
                      
                   </tr>


                   <tr>
                      
                       <td class="tg-0pky  type_1">
                       বিশেষ প্রতিযোগিতা
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbk_s" data-title="Enter"><?php echo $bbk_s=  (isset( $bishes_karjokrom['bbk_s']))?$bishes_karjokrom['bbk_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbk_og" data-title="Enter"><?php echo $bbk_og=  (isset( $bishes_karjokrom['bbk_og']))?$bishes_karjokrom['bbk_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bbk_mk" data-title="Enter"><?php echo $bbk_mk=  (isset( $bishes_karjokrom['bbk_mk']))?$bishes_karjokrom['bbk_mk']:'' ?></a>
                       </td>

                       
                       <td class="tg-0pky  type_1">
                       বৃক্ষরোপণ কর্মসূচী
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brks_s" data-title="Enter"><?php echo $brks_s=  (isset( $bishes_karjokrom['brks_s']))?$bishes_karjokrom['brks_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brks_og" data-title="Enter"><?php echo $brks_og=  (isset( $bishes_karjokrom['brks_og']))?$bishes_karjokrom['brks_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brks_mk" data-title="Enter"><?php echo $brks_mk=  (isset( $bishes_karjokrom['brks_mk']))?$bishes_karjokrom['brks_mk']:'' ?></a>
                       </td>
                   </tr>
                   <tr>
                       <td class="tg-0pky  type_1">
                       কুইজ/সাধারণজ্ঞান প্রতিযোগিতা 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rdks_s" data-title="Enter"><?php echo $rdks_s=  (isset( $bishes_karjokrom['rdks_s']))?$bishes_karjokrom['rdks_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rdks_og" data-title="Enter"><?php echo $rdks_og=  (isset( $bishes_karjokrom['rdks_og']))?$bishes_karjokrom['rdks_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rdks_mk" data-title="Enter"><?php echo $rdks_mk=  (isset( $bishes_karjokrom['rdks_mk']))?$bishes_karjokrom['rdks_mk']:'' ?></a>
                       </td>

                      
                       <td class="tg-0pky  type_1">
                       রক্তদান কর্মসূচী
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_s" data-title="Enter"><?php echo $shsf_s=  (isset( $bishes_karjokrom['shsf_s']))?$bishes_karjokrom['shsf_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_og" data-title="Enter"><?php echo $shsf_og=  (isset( $bishes_karjokrom['shsf_og']))?$bishes_karjokrom['shsf_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_mk" data-title="Enter"><?php echo $shsf_mk=  (isset( $bishes_karjokrom['shsf_mk']))?$bishes_karjokrom['shsf_mk']:'' ?></a>
                       </td>
                   
                   </tr>
                   <tr>
                       
                       <td class="tg-0pky  type_1">
                       রচনা/প্রবন্ধ প্রতিযোগিতা                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rpp_s" data-title="Enter"><?php echo $rpp_s=  (isset( $bishes_karjokrom['rpp_s']))?$bishes_karjokrom['rpp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rpp_og" data-title="Enter"><?php echo $rpp_og=  (isset( $bishes_karjokrom['rpp_og']))?$bishes_karjokrom['rpp_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="rpp_mk" data-title="Enter"><?php echo $rpp_mk=  (isset( $bishes_karjokrom['rpp_mk']))?$bishes_karjokrom['rpp_mk']:'' ?></a>
                       </td>


                       
                       <td class="tg-0pky  type_1">
                       শিক্ষা সফর
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shis_s" data-title="Enter"><?php echo $shis_s=  (isset( $bishes_karjokrom['shis_s']))?$bishes_karjokrom['shis_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shis_og" data-title="Enter"><?php echo $shis_og=  (isset( $bishes_karjokrom['shis_og']))?$bishes_karjokrom['shis_og']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="bishes_karjokrom" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shis_mk" data-title="Enter"><?php echo $shis_mk=  (isset( $bishes_karjokrom['shis_mk']))?$bishes_karjokrom['shis_mk']:'' ?></a>
                       </td>
              
                   
                   </tr>
                  
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
