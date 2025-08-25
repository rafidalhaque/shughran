<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'জনশক্তির ভাষাশিক্ষা সংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/jonoshokti-vashasikkha-songkranto') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jonoshokti-vashasikkha-songkranto/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                    <td class="tg-pwj7" rowspan="2">ভাষা</td>
                                    <td class="tg-pwj7" colspan="3">আয়োজিত ভাষাশিক্ষা কোর্সের বিবরণ </td>
                                    <td class="tg-pwj7" colspan="3">যতজন শিখেছেন </td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-pwj7"><div><span>কোর্স সংখ্যা </span></div></td>
                                    <td class="tg-pwj7"><div><span>অংশগ্রহনকারী সংখ্যা </span></div></td>
                                    <td class="tg-pwj7"><div><span>গড় </span></div></td>
                                    <td class="tg-pwj7"><div><span>আমাদের আয়োজিত কোর্স থেকে </span></div></td>
                                    <td class="tg-pwj7"><div><span>অন্যান্য প্রতিষ্ঠান থেকে </span></div></td>
                                    <td class="tg-pwj7"><div><span>মোট </span></div></td>
                                </tr>
                                <?php
                                $pk = (isset($jonoshokti_vashasikkha_songkranto['id']))?$jonoshokti_vashasikkha_songkranto['id']:'';
                                ?>

                                <tr>
                                    <td class="tg-y698 type_1"> আরবী </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="arbi_avkb_ks" data-title="Enter"><?php echo $arbi_avkb_ks=(isset( $jonoshokti_vashasikkha_songkranto['arbi_avkb_ks']))? $jonoshokti_vashasikkha_songkranto['arbi_avkb_ks']:'' ?></a>
                                    </td>


                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="arbi_avkb_os" data-title="Enter"><?php echo $arbi_avkb_os=(isset( $jonoshokti_vashasikkha_songkranto['arbi_avkb_os']))? $jonoshokti_vashasikkha_songkranto['arbi_avkb_os']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format( ($arbi_avkb_os!=0)?$arbi_avkb_os/$arbi_avkb_ks:0,2)?>
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="arbi_js_aakt" data-title="Enter"><?php echo $arbi_js_aakt=(isset( $jonoshokti_vashasikkha_songkranto['arbi_js_aakt']))? $jonoshokti_vashasikkha_songkranto['arbi_js_aakt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="arbi_js_opt" data-title="Enter"><?php echo $arbi_js_opt=(isset( $jonoshokti_vashasikkha_songkranto['arbi_js_opt']))? $jonoshokti_vashasikkha_songkranto['arbi_js_opt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($arbi_js_aakt!=0)?($arbi_js_opt+$arbi_js_aakt):0?>
                                    </td>

                                </tr>


                                <tr>
                                    <td class="tg-y698"> ইংরেজী  </td>
                                    <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="english_avkb_ks" data-title="Enter"><?php echo $english_avkb_ks=(isset( $jonoshokti_vashasikkha_songkranto['english_avkb_ks']))? $jonoshokti_vashasikkha_songkranto['english_avkb_ks']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="english_avkb_os" data-title="Enter"><?php echo $english_avkb_os=(isset( $jonoshokti_vashasikkha_songkranto['english_avkb_os']))? $jonoshokti_vashasikkha_songkranto['english_avkb_os']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky">
                                    <?php echo number_format(($english_avkb_os!=0)?$english_avkb_os/$english_avkb_ks:0,2)?>

                                    </td>
                                    <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="english_js_aakt" data-title="Enter"><?php echo $english_js_aakt=(isset( $jonoshokti_vashasikkha_songkranto['english_js_aakt']))? $jonoshokti_vashasikkha_songkranto['english_js_aakt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="english_js_opt" data-title="Enter"><?php echo $english_js_opt= (isset( $jonoshokti_vashasikkha_songkranto['english_js_opt']))? $jonoshokti_vashasikkha_songkranto['english_js_opt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky">
                                    <?php echo ($english_js_aakt!=0)?($english_js_opt+$english_js_aakt):0?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-y698"> চাইনিজ </td>
                                    <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chinese_avkb_ks" data-title="Enter"><?php echo $chinese_avkb_ks= (isset( $jonoshokti_vashasikkha_songkranto['chinese_avkb_ks']))? $jonoshokti_vashasikkha_songkranto['chinese_avkb_ks']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chinese_avkb_os" data-title="Enter"><?php echo $chinese_avkb_os=(isset( $jonoshokti_vashasikkha_songkranto['chinese_avkb_os']))? $jonoshokti_vashasikkha_songkranto['chinese_avkb_os']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($chinese_avkb_ks!=0)?$chinese_avkb_os/$chinese_avkb_ks:0,2) ?>
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chinese_js_aakt" data-title="Enter"><?php echo $chinese_js_aakt=(isset( $jonoshokti_vashasikkha_songkranto['chinese_js_aakt']))? $jonoshokti_vashasikkha_songkranto['chinese_js_aakt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chinese_js_opt" data-title="Enter"><?php echo $chinese_js_opt=(isset( $jonoshokti_vashasikkha_songkranto['chinese_js_opt']))? $jonoshokti_vashasikkha_songkranto['chinese_js_opt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($chinese_js_aakt!=0)?($chinese_js_opt+$chinese_js_aakt):0?>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="tg-y698">হিন্দী</td>
                                    <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hindi_avkb_ks" data-title="Enter"><?php echo $hindi_avkb_ks=(isset( $jonoshokti_vashasikkha_songkranto['hindi_avkb_ks']))? $jonoshokti_vashasikkha_songkranto['hindi_avkb_ks']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hindi_avkb_os" data-title="Enter"><?php echo $hindi_avkb_os= (isset( $jonoshokti_vashasikkha_songkranto['hindi_avkb_os']))? $jonoshokti_vashasikkha_songkranto['hindi_avkb_os']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format (($hindi_avkb_os!=0)?$hindi_avkb_os/$hindi_avkb_ks:0,2)?>
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hindi_js_aakt" data-title="Enter"><?php echo $hindi_js_aakt= (isset( $jonoshokti_vashasikkha_songkranto['hindi_js_aakt']))? $jonoshokti_vashasikkha_songkranto['hindi_js_aakt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="hindi_js_opt" data-title="Enter"><?php echo $hindi_js_opt=(isset( $jonoshokti_vashasikkha_songkranto['hindi_js_opt']))? $jonoshokti_vashasikkha_songkranto['hindi_js_opt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($hindi_js_aakt!=0)?($hindi_js_opt+$hindi_js_aakt):0?>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="tg-y698">জার্মানি </td>
                                    <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="german_avkb_ks" data-title="Enter"><?php echo $german_avkb_ks=(isset( $jonoshokti_vashasikkha_songkranto['german_avkb_ks']))? $jonoshokti_vashasikkha_songkranto['german_avkb_ks']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="german_avkb_os" data-title="Enter"><?php echo $german_avkb_os= (isset( $jonoshokti_vashasikkha_songkranto['german_avkb_os']))? $jonoshokti_vashasikkha_songkranto['german_avkb_os']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($german_avkb_os!=0)?$german_avkb_os/$german_avkb_ks:0,2)?>
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="german_js_aakt" data-title="Enter"><?php echo $german_js_aakt=(isset( $jonoshokti_vashasikkha_songkranto['german_js_aakt']))? $jonoshokti_vashasikkha_songkranto['german_js_aakt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   [=
                                    data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="german_js_opt" data-title="Enter"><?php echo $german_js_opt=(isset( $jonoshokti_vashasikkha_songkranto['german_js_opt']))? $jonoshokti_vashasikkha_songkranto['german_js_opt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($german_js_aakt!=0)?($german_js_opt+$german_js_aakt):0?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="tg-y698">অন্যান্য </td>
                                    <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="others_avkb_ks" data-title="Enter"><?php echo $others_avkb_ks=(isset( $jonoshokti_vashasikkha_songkranto['others_avkb_ks']))? $jonoshokti_vashasikkha_songkranto['others_avkb_ks']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="others_avkb_os" data-title="Enter"><?php echo $others_avkb_os=(isset( $jonoshokti_vashasikkha_songkranto['others_avkb_os']))? $jonoshokti_vashasikkha_songkranto['others_avkb_os']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky type_3">
                                    <?php echo number_format(($others_avkb_os!=0)?$others_avkb_os/$others_avkb_ks:0,2)?>
                                    </td>
                                    <td class="tg-0pky type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="others_js_aakt" data-title="Enter"><?php echo $others_js_aakt=(isset( $jonoshokti_vashasikkha_songkranto['others_js_aakt']))? $jonoshokti_vashasikkha_songkranto['others_js_aakt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky type_5">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshokti_vashasikkha_songkranto" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="others_js_opt" data-title="Enter"><?php echo $others_js_opt=(isset( $jonoshokti_vashasikkha_songkranto['others_js_opt']))? $jonoshokti_vashasikkha_songkranto['others_js_opt']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky type_6">
                                    <?php echo ($others_js_aakt!=0)?($others_js_opt+$others_js_aakt):0?>
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
