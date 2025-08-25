<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'ফাযিল ফলাফল পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/fajil-folafol-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/fajil-folafol-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                              <td class="tg-pwj7" colspan="2">  জিপিএ 5</td>
                              <td class="tg-pwj7" colspan="2"> এ গ্রেড </td>
                              <td class="tg-pwj7" colspan="2">এ- গ্রেড  </td>
                              <td class="tg-pwj7" colspan="2">বি গ্রেড </td>
                              <td class="tg-pwj7" colspan="2">সি গ্রেড </td>
                              <td class="tg-pwj7" colspan="2">ডি গ্রেড </td>
                              <td class="tg-pwj7" colspan="2">মোট</td>
                            </tr>

                            <tr>
                               
                                
                                
                               
                            </tr>




                            <tr>
                                    <?php
                                    $pk = (isset($fajil_folafol_porisonkhan['id']))?$fajil_folafol_porisonkhan['id']:'';
                                    ?>

                            <td class="tg-y698 type_1"> ১	</td>
                                <td class="tg-y698 type_1" colspan="2"> সদস্য	</td>
                               
                                  
                                <td class="tg-0pky" colspan="2">                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_mp" data-title="Enter"><?php echo $sodosso_mp=  (isset( $fajil_folafol_porisonkhan['sodosso_mp']))? $fajil_folafol_porisonkhan['sodosso_mp']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_gpa5" data-title="Enter"><?php echo $sodosso_gpa5=  (isset( $fajil_folafol_porisonkhan['sodosso_gpa5']))? $fajil_folafol_porisonkhan['sodosso_gpa5']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_agred" data-title="Enter"><?php echo $sodosso_agred=  (isset( $fajil_folafol_porisonkhan['sodosso_agred']))? $fajil_folafol_porisonkhan['sodosso_agred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_a_gred" data-title="Enter"><?php echo $sodosso_a_gred=  (isset( $fajil_folafol_porisonkhan['sodosso_a_gred']))? $fajil_folafol_porisonkhan['sodosso_a_gred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_bgred" data-title="Enter"><?php echo $sodosso_bgred=  (isset( $fajil_folafol_porisonkhan['sodosso_bgred']))? $fajil_folafol_porisonkhan['sodosso_bgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_cgred" data-title="Enter"><?php echo $sodosso_cgred=  (isset( $fajil_folafol_porisonkhan['sodosso_cgred']))? $fajil_folafol_porisonkhan['sodosso_cgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sodosso_dgred" data-title="Enter"><?php echo $sodosso_dgred=  (isset( $fajil_folafol_porisonkhan['sodosso_dgred']))? $fajil_folafol_porisonkhan['sodosso_dgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2">                                    <?php echo $sodosso=($sodosso_mp!=0)?($sodosso_mp+$sodosso_gpa5+$sodosso_agred+$sodosso_a_gred+$sodosso_bgred+$sodosso_cgred+$sodosso_dgred):0?></td>

                            </tr>


                            <tr>
                            
                            <td class="tg-y698 type_1"> ২	</td>
                                <td class="tg-y698" colspan="2">সাথী </td>
                             
                            
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_mp" data-title="Enter"><?php echo $sathi_mp=  (isset( $fajil_folafol_porisonkhan['sathi_mp']))? $fajil_folafol_porisonkhan['sathi_mp']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_gpa5" data-title="Enter"><?php echo $sathi_gpa5=  (isset( $fajil_folafol_porisonkhan['sathi_gpa5']))? $fajil_folafol_porisonkhan['sathi_gpa5']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_agred" data-title="Enter"><?php echo $sathi_agred=  (isset( $fajil_folafol_porisonkhan['sathi_agred']))? $fajil_folafol_porisonkhan['sathi_agred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_a_gred" data-title="Enter"><?php echo $sathi_a_gred=  (isset( $fajil_folafol_porisonkhan['sathi_a_gred']))? $fajil_folafol_porisonkhan['sathi_a_gred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_bgred" data-title="Enter"><?php echo $sathi_bgred=  (isset( $fajil_folafol_porisonkhan['sathi_bgred']))? $fajil_folafol_porisonkhan['sathi_bgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_cgred" data-title="Enter"><?php echo $sathi_cgred=  (isset( $fajil_folafol_porisonkhan['sathi_cgred']))? $fajil_folafol_porisonkhan['sathi_cgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sathi_dgred" data-title="Enter"><?php echo $sathi_dgred=  (isset( $fajil_folafol_porisonkhan['sathi_dgred']))? $fajil_folafol_porisonkhan['sathi_dgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><?php echo $sathi=($sathi_mp!=0)?($sathi_mp+$sathi_gpa5+$sathi_agred+$sathi_a_gred+$sathi_bgred+$sathi_cgred+$sathi_dgred):0?></td></td>

                            </tr>
                            <tr>
                            
                            <td class="tg-y698 type_1"> ৩	</td>
                                <td class="tg-y698" colspan="2">কর্মী </td>
                                
                          
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_mp" data-title="Enter"><?php echo $kormi_mp=  (isset( $fajil_folafol_porisonkhan['kormi_mp']))? $fajil_folafol_porisonkhan['kormi_mp']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_gpa5" data-title="Enter"><?php echo $kormi_gpa5=  (isset( $fajil_folafol_porisonkhan['kormi_gpa5']))? $fajil_folafol_porisonkhan['kormi_gpa5']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_agred" data-title="Enter"><?php echo $kormi_agred=  (isset( $fajil_folafol_porisonkhan['kormi_agred']))? $fajil_folafol_porisonkhan['kormi_agred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_a_gred" data-title="Enter"><?php echo $kormi_a_gred=  (isset( $fajil_folafol_porisonkhan['kormi_a_gred']))? $fajil_folafol_porisonkhan['kormi_a_gred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_bgred" data-title="Enter"><?php echo $kormi_bgred=  (isset( $fajil_folafol_porisonkhan['kormi_bgred']))? $fajil_folafol_porisonkhan['kormi_bgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_cgred" data-title="Enter"><?php echo $kormi_cgred=  (isset( $fajil_folafol_porisonkhan['kormi_cgred']))? $fajil_folafol_porisonkhan['kormi_cgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kormi_dgred" data-title="Enter"><?php echo $kormi_dgred=  (isset( $fajil_folafol_porisonkhan['kormi_dgred']))? $fajil_folafol_porisonkhan['kormi_dgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><?php echo $kormi=($kormi_mp!=0)?($kormi_mp+$kormi_gpa5+$kormi_agred+$kormi_a_gred+$kormi_bgred+$kormi_cgred+$kormi_dgred):0?></td></td>

                            </tr>
                          
                            <tr>
                            
                            <td class="tg-y698 type_1"> ৪	</td>
                                <td class="tg-y698" colspan="2">সমর্থক </td>
                                
                             
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_mp" data-title="Enter"><?php echo $somorthok_mp=  (isset( $fajil_folafol_porisonkhan['somorthok_mp']))? $fajil_folafol_porisonkhan['somorthok_mp']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_gpa5" data-title="Enter"><?php echo $somorthok_gpa5=  (isset( $fajil_folafol_porisonkhan['somorthok_gpa5']))? $fajil_folafol_porisonkhan['somorthok_gpa5']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_agred" data-title="Enter"><?php echo $somorthok_agred=  (isset( $fajil_folafol_porisonkhan['somorthok_agred']))? $fajil_folafol_porisonkhan['somorthok_agred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_a_gred" data-title="Enter"><?php echo $somorthok_a_gred=  (isset( $fajil_folafol_porisonkhan['somorthok_a_gred']))? $fajil_folafol_porisonkhan['somorthok_a_gred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_bgred" data-title="Enter"><?php echo $somorthok_bgred=  (isset( $fajil_folafol_porisonkhan['somorthok_bgred']))? $fajil_folafol_porisonkhan['somorthok_bgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_cgred" data-title="Enter"><?php echo $somorthok_cgred=  (isset( $fajil_folafol_porisonkhan['somorthok_cgred']))? $fajil_folafol_porisonkhan['somorthok_cgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="fajil_folafol_porisonkhan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="somorthok_dgred" data-title="Enter"><?php echo $somorthok_dgred=  (isset( $fajil_folafol_porisonkhan['somorthok_dgred']))? $fajil_folafol_porisonkhan['somorthok_dgred']:'' ?></a></td>
                                <td class="tg-0pky" colspan="2"><?php echo $somorthok=($somorthok_mp!=0)?($somorthok_mp+$somorthok_gpa5+$somorthok_agred+$somorthok_a_gred+$somorthok_bgred+$somorthok_cgred+$somorthok_dgred):0?></td></td>

                            </tr>
                            <tr>
                            
                            
                              
                                <td class="tg-0pky" colspan="3">মোট</td>    
                                <td class="tg-0pky" colspan="2"><?php echo $mp=($sodosso_mp!=0)?($sodosso_mp+$sathi_mp+$kormi_mp+$somorthok_mp):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $gpa5=($sodosso_gpa5!=0)?($sodosso_gpa5+$sathi_gpa5+$kormi_gpa5+$somorthok_gpa5):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $agred=($sodosso_agred!=0)?($sodosso_agred+$sathi_agred+$kormi_agred+$somorthok_agred):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $a_gred=($sodosso_a_gred!=0)?($sodosso_a_gred+$sathi_a_gred+$kormi_a_gred+$somorthok_a_gred):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $bgred=($sodosso_bgred!=0)?($sodosso_bgred+$sathi_bgred+$kormi_bgred+$somorthok_bgred):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $cgred=($sodosso_cgred!=0)?($sodosso_cgred+$sathi_cgred+$kormi_cgred+$somorthok_cgred):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $dgred=($sodosso_dgred!=0)?($sodosso_dgred+$sathi_dgred+$kormi_dgred+$somorthok_dgred):0?></td>
                                <td class="tg-0pky" colspan="2"><?php echo $total=($mp+$gpa5+$agred+$a_gred+$bgred+$cgred+$dgred)?></td>
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
