<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'ভিডিও সংরক্ষণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/vedio-songrokkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/vedio-songrokkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="3"> প্রোগ্রামের ধরন </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">বর্ণনা  </td>
                       <td class="tg-pwj7" colspan="">সংরক্ষিত সংখ্যা </td>
                       
                  
                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($vedio_sonrokkhon['id']))?$vedio_sonrokkhon['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1"> 5 মেধাবী সংবর্ধনা	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gpa5ms_b" data-title="Enter"><?php echo $gpa5ms_b=  (isset( $vedio_sonrokkhon['gpa5ms_b']))? $vedio_sonrokkhon['gpa5ms_b']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gpa5ms_ss" data-title="Enter"><?php echo $gpa5ms_ss=  (isset( $vedio_sonrokkhon['gpa5ms_ss']))? $vedio_sonrokkhon['gpa5ms_ss']:'' ?></a>
                       </td>
                 
                     
                       
                   </tr>


                   <tr>
                       <td class="tg-y698">SWF </td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="swf_b" data-title="Enter"><?php echo $swf_b=  (isset( $vedio_sonrokkhon['swf_b']))? $vedio_sonrokkhon['swf_b']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="swf_ss" data-title="Enter"><?php echo $swf_ss=  (isset( $vedio_sonrokkhon['swf_ss']))? $vedio_sonrokkhon['swf_ss']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   

                   <tr>
                       <td class="tg-y698">সাংস্কৃতিক সন্ধ্যা /সাংস্কৃতিক অনুষ্ঠান </td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stssto_b" data-title="Enter"><?php echo $stssto_b=  (isset( $vedio_sonrokkhon['stssto_b']))? $vedio_sonrokkhon['stssto_b']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stssto_ss" data-title="Enter"><?php echo $stssto_ss=  (isset( $vedio_sonrokkhon['stssto_ss']))? $vedio_sonrokkhon['stssto_ss']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">মিছিল রেলি সমাবেশ </td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mrs_b" data-title="Enter"><?php echo $mrs_b=  (isset( $vedio_sonrokkhon['mrs_b']))? $vedio_sonrokkhon['mrs_b']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mrs_ss" data-title="Enter"><?php echo $mrs_ss=  (isset( $vedio_sonrokkhon['mrs_ss']))? $vedio_sonrokkhon['mrs_ss']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> টিসিএস </td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tvts_b" data-title="Enter"><?php echo $tvts_b=  (isset( $vedio_sonrokkhon['tvts_b']))? $vedio_sonrokkhon['tvts_b']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tvts_ss" data-title="Enter"><?php echo $tvts_ss=  (isset( $vedio_sonrokkhon['tvts_ss']))? $vedio_sonrokkhon['tvts_ss']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> বিভিন্ন দিবসে কর্মসূচি পালন </td>
                       <td class="tg-0pky  type_1">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bdkp_b" data-title="Enter"><?php echo $bdkp_b=  (isset( $vedio_sonrokkhon['bdkp_b']))? $vedio_sonrokkhon['bdkp_b']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="vedio_sonrokkhon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bdkp_ss" data-title="Enter"><?php echo $bdkp_ss=  (isset( $vedio_sonrokkhon['bdkp_ss']))? $vedio_sonrokkhon['bdkp_ss']:'' ?></a>
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
