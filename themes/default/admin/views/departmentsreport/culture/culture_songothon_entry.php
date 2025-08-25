<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সংগঠন' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-songothon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-songothon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                       <td class="tg-pwj7" colspan="">পূর্বের সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">বর্তমান সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি</td>
                       <td class="tg-pwj7" colspan="">ঘাটতি  </td>
                       <td class="tg-pwj7" colspan="">জনশক্তি  </td>
                       <td class="tg-pwj7" colspan="">থানা </td>
                       <td class="tg-pwj7" colspan="">ওয়ার্ড  </td>
                       <td class="tg-pwj7" colspan="">উপশাখা  </td>
                    

                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($songothon['id']))?$songothon['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1"> শিল্পগোষ্ঠী 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_pus" data-title="Enter"><?php echo $shg_pus=  (isset( $songothon['shg_pus']))?$songothon['shg_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_bms" data-title="Enter"><?php echo $shg_bms=  (isset( $songothon['shg_bms']))?$songothon['shg_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_br" data-title="Enter"><?php echo $shg_br=  (isset( $songothon['shg_br']))?$songothon['shg_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_gt" data-title="Enter"><?php echo $shg_gt=  (isset( $songothon['shg_gt']))?$songothon['shg_gt']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_jsh" data-title="Enter"><?php echo $shg_jsh=  (isset( $songothon['shg_jsh']))?$songothon['shg_jsh']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_th" data-title="Enter"><?php echo $shg_th=  (isset( $songothon['shg_th']))?$songothon['shg_th']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_word" data-title="Enter"><?php echo $shg_word=  (isset( $songothon['shg_word']))?$songothon['shg_word']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shg_upsh" data-title="Enter"><?php echo $shg_upsh=  (isset( $songothon['shg_upsh']))?$songothon['shg_upsh']:'' ?></a>
                       </td>
                    
                   </tr>


                   <tr>
                       <td class="tg-y698">বিভাগ  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_pus" data-title="Enter"><?php echo $bivag_pus=  (isset( $songothon['bivag_pus']))?$songothon['bivag_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_bms" data-title="Enter"><?php echo $bivag_bms=  (isset( $songothon['bivag_bms']))?$songothon['bivag_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_br" data-title="Enter"><?php echo $bivag_br=  (isset( $songothon['bivag_br']))?$songothon['bivag_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_gt" data-title="Enter"><?php echo $bivag_gt=  (isset( $songothon['bivag_gt']))?$songothon['bivag_gt']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_jsh" data-title="Enter"><?php echo $bivag_jsh=  (isset( $songothon['bivag_jsh']))?$songothon['bivag_jsh']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_th" data-title="Enter"><?php echo $bivag_th=  (isset( $songothon['bivag_th']))?$songothon['bivag_th']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_word" data-title="Enter"><?php echo $bivag_word=  (isset( $songothon['bivag_word']))?$songothon['bivag_word']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bivag_upsh" data-title="Enter"><?php echo $bivag_upsh=  (isset( $songothon['bivag_upsh']))?$songothon['bivag_upsh']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">শাখা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_pus" data-title="Enter"><?php echo $shakha_pus=  (isset( $songothon['shakha_pus']))?$songothon['shakha_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_bms" data-title="Enter"><?php echo $shakha_bms=  (isset( $songothon['shakha_bms']))?$songothon['shakha_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_br" data-title="Enter"><?php echo $shakha_br=  (isset( $songothon['shakha_br']))?$songothon['shakha_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_gt" data-title="Enter"><?php echo $shakha_gt=  (isset( $songothon['shakha_gt']))?$songothon['shakha_gt']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_jsh" data-title="Enter"><?php echo $shakha_jsh=  (isset( $songothon['shakha_jsh']))?$songothon['shakha_jsh']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_th" data-title="Enter"><?php echo $shakha_th=  (isset( $songothon['shakha_th']))?$songothon['shakha_th']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_word" data-title="Enter"><?php echo $shakha_word=  (isset( $songothon['shakha_word']))?$songothon['shakha_word']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shakha_upsh" data-title="Enter"><?php echo $shakha_upsh=  (isset( $songothon['shakha_upsh']))?$songothon['shakha_upsh']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">উপসংগঠন </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_pus" data-title="Enter"><?php echo $upsg_pus=  (isset( $songothon['upsg_pus']))?$songothon['upsg_pus']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_bms" data-title="Enter"><?php echo $upsg_bms=  (isset( $songothon['upsg_bms']))?$songothon['upsg_bms']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_br" data-title="Enter"><?php echo $upsg_br=  (isset( $songothon['upsg_br']))?$songothon['upsg_br']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_gt" data-title="Enter"><?php echo $upsg_gt=  (isset( $songothon['upsg_gt']))?$songothon['upsg_gt']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_jsh" data-title="Enter"><?php echo $upsg_jsh=  (isset( $songothon['upsg_jsh']))?$songothon['upsg_jsh']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_th" data-title="Enter"><?php echo $upsg_th=  (isset( $songothon['upsg_th']))?$songothon['upsg_th']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_word" data-title="Enter"><?php echo $upsg_word=  (isset( $songothon['upsg_word']))?$songothon['upsg_word']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="songothon" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upsg_upsh" data-title="Enter"><?php echo $upsg_upsh=  (isset( $songothon['upsg_upsh']))?$songothon['upsg_upsh']:'' ?></a>
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
