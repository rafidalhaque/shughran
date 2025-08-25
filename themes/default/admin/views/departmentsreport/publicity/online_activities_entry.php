<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'অনলাইন এক্টিভিটিজ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/online-activities') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/online-activities/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                             
                                <td class="tg-pwj7" rowspan="2" colspan="2">মিডিয়ার ধরণ</td>
                                <td class="tg-pwj7" rowspan="2">মোট সংখ্যা</td>
                                <td class="tg-pwj7" rowspan="2">প্রেরিত নিউজ  </td>
                                <td class="tg-pwj7" rowspan="2"> প্রকাশিত নিউজ </td>
                                <td class="tg-pwj7" rowspan="2">কতটিতে প্রেরণ </td>
                                <td class="tg-pwj7" rowspan="2">কতটিতে প্রকাশ </td>
                                <td class="tg-pwj7" colspan="2">সাক্ষাৎকার </td>
                              
                            </tr>

                            <tr>
                            
                                <td class="tg-pwj7 "><div><span>প্রদান </span></div></td>
                                <td class="tg-pwj7 "><div><span>প্রকাশিত </span></div></td>
                               
                            </tr>

                            <?php
                            $pk = (isset($online_activities['id']))?$online_activities['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1" colspan="2">টিভি	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_ms" data-title="Enter"><?php echo $tv_ms=  (isset( $online_activities['tv_ms']))? $online_activities['tv_ms']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_pren" data-title="Enter"><?php echo $tv_pren=  (isset( $online_activities['tv_pren']))? $online_activities['tv_pren']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_pron" data-title="Enter"><?php echo $tv_pron=  (isset( $online_activities['tv_pron']))? $online_activities['tv_pron']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_ktpre" data-title="Enter"><?php echo $tv_ktpre=  (isset( $online_activities['tv_ktpre']))? $online_activities['tv_ktpre']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_ktpro" data-title="Enter"><?php echo $tv_ktpro=  (isset( $online_activities['tv_ktpro']))? $online_activities['tv_ktpro']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_sk_prd" data-title="Enter"><?php echo $tv_sk_prd=  (isset( $online_activities['tv_sk_prd']))? $online_activities['tv_sk_prd']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tv_sk_prosh" data-title="Enter"><?php echo $tv_sk_prosh=  (isset( $online_activities['tv_sk_prosh']))? $online_activities['tv_sk_prosh']:'' ?></a>
                                </td>
                        
                              
                               

                            </tr>


                            <tr>
                                <td class="tg-y698" rowspan="2"> পত্রিকা </td>
                                <td class="tg-y698"> জাতীয়  </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_ms" data-title="Enter"><?php echo $pk_jti_ms=  (isset( $online_activities['pk_jti_ms']))? $online_activities['pk_jti_ms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_pren" data-title="Enter"><?php echo $pk_jti_pren=  (isset( $online_activities['pk_jti_pren']))? $online_activities['pk_jti_pren']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_pron" data-title="Enter"><?php echo $pk_jti_pron=  (isset( $online_activities['pk_jti_pron']))? $online_activities['pk_jti_pron']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_ktpre" data-title="Enter"><?php echo $pk_jti_ktpre=  (isset( $online_activities['pk_jti_ktpre']))? $online_activities['pk_jti_ktpre']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_ktpro" data-title="Enter"><?php echo $pk_jti_ktpro=  (isset( $online_activities['pk_jti_ktpro']))? $online_activities['pk_jti_ktpro']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_sk_prd" data-title="Enter"><?php echo $pk_jti_sk_prd=  (isset( $online_activities['pk_jti_sk_prd']))? $online_activities['pk_jti_sk_prd']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_jti_sk_prosh" data-title="Enter"><?php echo $pk_jti_sk_prosh=  (isset( $online_activities['pk_jti_sk_prosh']))? $online_activities['pk_jti_sk_prosh']:'' ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">আঞ্চলিক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_ms" data-title="Enter"><?php echo $pk_ali_ms=  (isset( $online_activities['pk_ali_ms']))? $online_activities['pk_ali_ms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_pren" data-title="Enter"><?php echo $pk_ali_pren=  (isset( $online_activities['pk_ali_pren']))? $online_activities['pk_ali_pren']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_pron" data-title="Enter"><?php echo $pk_ali_pron=  (isset( $online_activities['pk_ali_pron']))? $online_activities['pk_ali_pron']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_ktpre" data-title="Enter"><?php echo $pk_ali_ktpre=  (isset( $online_activities['pk_ali_ktpre']))? $online_activities['pk_ali_ktpre']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_ktpro" data-title="Enter"><?php echo $pk_ali_ktpro=  (isset( $online_activities['pk_ali_ktpro']))? $online_activities['pk_ali_ktpro']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_sk_prd" data-title="Enter"><?php echo $pk_ali_sk_prd=  (isset( $online_activities['pk_ali_sk_prd']))? $online_activities['pk_ali_sk_prd']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pk_ali_sk_prosh" data-title="Enter"><?php echo $pk_ali_sk_prosh=  (isset( $online_activities['pk_ali_sk_prosh']))? $online_activities['pk_ali_sk_prosh']:'' ?></a>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">অনলাইন	 </td>

                                <td class="tg-y698"> জাতীয় </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_ms" data-title="Enter"><?php echo $onli_jti_ms=  (isset( $online_activities['onli_jti_ms']))? $online_activities['onli_jti_ms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_pren" data-title="Enter"><?php echo $onli_jti_pren=  (isset( $online_activities['onli_jti_pren']))? $online_activities['onli_jti_pren']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_pron" data-title="Enter"><?php echo $onli_jti_pron=  (isset( $online_activities['onli_jti_pron']))? $online_activities['onli_jti_pron']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_ktpre" data-title="Enter"><?php echo $onli_jti_ktpre=  (isset( $online_activities['onli_jti_ktpre']))? $online_activities['onli_jti_ktpre']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_ktpro" data-title="Enter"><?php echo $onli_jti_ktpro=  (isset( $online_activities['onli_jti_ktpro']))? $online_activities['onli_jti_ktpro']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_sk_prd" data-title="Enter"><?php echo $onli_jti_sk_prd=  (isset( $online_activities['onli_jti_sk_prd']))? $online_activities['onli_jti_sk_prd']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_jti_sk_prosh" data-title="Enter"><?php echo $onli_jti_sk_prosh=  (isset( $online_activities['onli_jti_sk_prosh']))? $online_activities['onli_jti_sk_prosh']:'' ?></a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698"> আঞ্চলিক </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_ms" data-title="Enter"><?php echo $onli_ali_ms=  (isset( $online_activities['onli_ali_ms']))? $online_activities['onli_ali_ms']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_pren" data-title="Enter"><?php echo $onli_ali_pren=  (isset( $online_activities['onli_ali_pren']))? $online_activities['onli_ali_pren']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_pron" data-title="Enter"><?php echo $onli_ali_pron=  (isset( $online_activities['onli_ali_pron']))? $online_activities['onli_ali_pron']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_ktpre" data-title="Enter"><?php echo $onli_ali_ktpre=  (isset( $online_activities['onli_ali_ktpre']))? $online_activities['onli_ali_ktpre']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_ktpro" data-title="Enter"><?php echo $onli_ali_ktpro=  (isset( $online_activities['onli_ali_ktpro']))? $online_activities['onli_ali_ktpro']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_sk_prd" data-title="Enter"><?php echo $onli_ali_sk_prd=  (isset( $online_activities['onli_ali_sk_prd']))? $online_activities['onli_ali_sk_prd']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="online_activities" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onli_ali_sk_prosh" data-title="Enter"><?php echo $onli_ali_sk_prosh=  (isset( $online_activities['onli_ali_sk_prosh']))? $online_activities['onli_ali_sk_prosh']:'' ?></a>
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
