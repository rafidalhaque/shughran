<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রকাশনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-prokashona') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-prokashona/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" colspan="">বিবরণ </td>
                            <td class="tg-pwj7" colspan="">সংখ্যা </td>

                            <td class="tg-pwj7" colspan="">বিবরণ </td>
                            <td class="tg-pwj7" colspan="">সংখ্যা </td>

                            <td class="tg-pwj7" colspan="">বিবরণ </td>
                            <td class="tg-pwj7" colspan="">সংখ্যা </td>

                            <td class="tg-pwj7" colspan="">বিবরণ </td>
                            <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                
                                
                   </tr>
                  
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($prokashona['id']))?$prokashona['id']:'';?>


                   <tr>
                       <td class="tg-0pky  type_1">
                       নতুন গান বাধা 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ngb_s" data-title="Enter"><?php echo $ngb_s=  (isset( $prokashona['ngb_s']))?$prokashona['ngb_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                         নতুন গান নির্মান
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nsrr_s" data-title="Enter"><?php echo $nsrr_s=  (isset( $prokashona['nsrr_s']))?$prokashona['nsrr_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ছড়া-কবিতার বই 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="npl1_s" data-title="Enter"><?php echo $npl1_s=  (isset( $prokashona['npl1_s']))?$prokashona['npl1_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ম্যাগাজিন 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cnpl_s" data-title="Enter"><?php echo $cnpl_s=  (isset( $prokashona['cnpl_s']))?$prokashona['cnpl_s']:'' ?></a>
                       </td>
                      
                      
                   </tr>


                   <tr>
                       <td class="tg-0pky  type_1">
                       নতুন সুরারোপ 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="npl2_s" data-title="Enter"><?php echo $npl2_s=  (isset( $prokashona['npl2_s']))?$prokashona['npl2_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ভিজ্যুয়াল নাটক 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kkpl_s" data-title="Enter"><?php echo $kkpl_s=  (isset( $prokashona['kkpl_s']))?$prokashona['kkpl_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       শর্টফিল্ম নির্মান 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kpl_s" data-title="Enter"><?php echo $kpl_s=  (isset( $prokashona['kpl_s']))?$prokashona['kpl_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       প্রচারপত্র 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="va_s" data-title="Enter"><?php echo $va_s=  (isset( $prokashona['va_s']))?$prokashona['va_s']:'' ?></a>
                       </td>
                      
                      
                       <tr>
                       <td class="tg-0pky  type_1">
                       নাটকের পান্ডু লিপি 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aa_s" data-title="Enter"><?php echo $aa_s=  (isset( $prokashona['aa_s']))?$prokashona['aa_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       কবিতার পান্ডু লিপি 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gb_s" data-title="Enter"><?php echo $gb_s=  (isset( $prokashona['gb_s']))?$prokashona['gb_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       পুথিঁ নির্মান
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nb_s" data-title="Enter"><?php echo $nb_s=  (isset( $prokashona['nb_s']))?$prokashona['nb_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       মঞ্চ নাটক 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chkb_s" data-title="Enter"><?php echo $chkb_s=  (isset( $prokashona['chkb_s']))?$prokashona['chkb_s']:'' ?></a>
                       </td>
                      
                      
                   </tr>


                   <tr>
                       <td class="tg-0pky  type_1">
                       চিত্রনাট্য পান্ডু লিপি
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sp_s" data-title="Enter"><?php echo $sp_s=  (isset( $prokashona['sp_s']))?$prokashona['sp_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ভিডিও অ্যালবাম	
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kd_s" data-title="Enter"><?php echo $kd_s=  (isset( $prokashona['kd_s']))?$prokashona['kd_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       সাহিত্য পত্রিকা 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_s" data-title="Enter"><?php echo $sk_s=  (isset( $prokashona['sk_s']))?$prokashona['sk_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ক্যালিওগ্রাফী 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dk_s" data-title="Enter"><?php echo $dk_s=  (isset( $prokashona['dk_s']))?$prokashona['dk_s']:'' ?></a>
                       </td>
                      
                      
                   </tr>
                      
                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       নাটিকার পান্ডু লিপি 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mj_s" data-title="Enter"><?php echo $mj_s=  (isset( $prokashona['mj_s']))?$prokashona['mj_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       অডিও অ্যালবাম 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pp_s" data-title="Enter"><?php echo $pp_s=  (isset( $prokashona['pp_s']))?$prokashona['pp_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       ক্যালেন্ডার 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cld_s" data-title="Enter"><?php echo $cld_s=  (isset( $prokashona['cld_s']))?$prokashona['cld_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       চিত্রাংকন 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chit_s" data-title="Enter"><?php echo $chit_s=  (isset( $prokashona['chit_s']))?$prokashona['chit_s']:'' ?></a>
                       </td>
                      
                      
                   </tr>
                    
              
                   
                   <tr>
                       <td class="tg-0pky  type_1">
                       কৌতুকের পান্ডু লিপি
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kupl_s" data-title="Enter"><?php echo $kupl_s=  (isset( $prokashona['kupl_s']))?$prokashona['kupl_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       গানের বই 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gnb_s" data-title="Enter"><?php echo $gnb_s=  (isset( $prokashona['gnb_s']))?$prokashona['gnb_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       স্মরণিকা/স্মারক 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sharika_s" data-title="Enter"><?php echo $sharika_s=  (isset( $prokashona['sharika_s']))?$prokashona['sharika_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       অন্যান্য 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnano_s" data-title="Enter"><?php echo $onnano_s=  (isset( $prokashona['onnano_s']))?$prokashona['onnano_s']:'' ?></a>
                       </td>
                      
                      
                       <tr>
                       <td class="tg-0pky  type_1">
                       শর্টফিল্ম পান্ডু লিপি 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sfp_s" data-title="Enter"><?php echo $sfp_s=  (isset( $prokashona['sfp_s']))?$prokashona['sfp_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       নাটকের বই 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="natb_s" data-title="Enter"><?php echo $natb_s=  (isset( $prokashona['natb_s']))?$prokashona['natb_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                       দেয়ালিকা 
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="prokashona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="deyal_s" data-title="Enter"><?php echo $deyal_s=  (isset( $prokashona['deyal_s']))?$prokashona['deyal_s']:'' ?></a>
                       </td>

                       <td class="tg-0pky  type_1">
                        
                       </td>
                       <td class="tg-0pky  type_2">
                      
                      
                      
            
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
