<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
<div class="box">
    <div class="box-header">

        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'একাডেমিক সহযোগীতা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
          </h2>
        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i
                            class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a
                                href="<?= admin_url(''.($branch_id ? '/'.$branch_id : '')) ?>"><i
                                    class="fa fa-file-excel-o"></i><?=lang('export_to_excel') ?></a></li>
                    </ul>
                </li><?php if ( !empty($branches)) {
    ?><li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i
                            class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        <li><a href="<?= admin_url('departmentsreport/academic-sohojogita') ?>"><i
                                    class="fa fa-building-o"></i><?="সকল শাখা"?></a></li>
                        <li class="divider"></li><?php foreach ($branches as $branch) {
        echo '<li><a href="'. admin_url('departmentsreport/academic-sohojogita/'. $branch->id) . '"><i class="fa fa-building"></i>'. $branch->name . '</a></li>';
    }

    ?>
                    </ul>
                </li><?php
}

?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                    <div class="table-responsive">
                        <div class="tg-wrap">
                            <table class="tg table table-header-rotated" id="testTable2"><?php $pk=(isset($academik_sohojogita['id']))?$academik_sohojogita['id']:'';
?><tr>
                                    <td class="tg-pwj7  type_1" colspan="3">১। বিজ্ঞানের বিষয়গুলোতে শিক্ষাদানের জন্য
                                        একাডেমিক কোচিং আছে কিনা? (হ্যাঁ/ না)</td>
                                    <td class="tg-0pky  type_1" colspan=""><a href="#" class="editable editable-click"
                                            data-id="" data-idname="" data-type="number"
                                            data-table="academik_sohojogita" data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="bnbgshdjadkakhana"
                                            data-title="Enter"><?php echo $_bnbgshdjadkakhana=(isset($academik_sohojogita['bnbgshdjadkakhana']))? $academik_sohojogita['bnbgshdjadkakhana']:''?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7 type_1" colspan="">২। কোচিং থাকলে সেখানে আইসিটি সাবজেক্ট পড়ানো হয়
                                        কিনা</td>
                                    <td class="tg-0pky type_1" colspan=""><a href="#" class="editable editable-click"
                                            data-id="" data-idname="" data-type="number"
                                            data-table="academik_sohojogita" data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kthsasphk"
                                            data-title="Enter"><?php echo $_kthsasphk=(isset($academik_sohojogita['kthsasphk']))? $academik_sohojogita['kthsasphk']:''?></a>
                                    </td>
                                    <td class="tg-pwj7 type_1" colspan="">কোচিং-এ আইসিটি কোর্সের মোট শিক্ষার্থী</td>
                                    <td class="tg-0pky type_1" colspan=""><a href="#" class="editable editable-click"
                                            data-id="" data-idname="" data-type="number"
                                            data-table="academik_sohojogita" data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ucmpbchdjahs"
                                            data-title="Enter"><?php echo $_ucmpbchdjahs=(isset($academik_sohojogita['ucmpbchdjahs']))? $academik_sohojogita['ucmpbchdjahs']:''?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7 type_1" colspan="">৩। উচ্চ মাধ্যমিক পর্যায়ে বিজ্ঞান ছাত্রদের জন্য
                                        আইডিয়াল হোম সংখ্যা</td>
                                    <td class="tg-0pky type_1" colspan=""><a href="#" class="editable editable-click"
                                            data-id="" data-idname="" data-type="number"
                                            data-table="academik_sohojogita" data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="kaakmsh"
                                            data-title="Enter"><?php echo $_kaakmsh=(isset($academik_sohojogita['kaakmsh']))? $academik_sohojogita['kaakmsh']:''?></a>
                                    </td>
                                    <td class="tg-pwj7 type_1" colspan="">আইডিয়াল হোমের ছাত্রসংখ্যা</td>
                                    <td class="tg-0pky type_1" colspan=""><a href="#" class="editable editable-click"
                                            data-id="" data-idname="" data-type="number"
                                            data-table="academik_sohojogita" data-pk="<?php echo $pk ?>"
                                            data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                            data-name="ahchs"
                                            data-title="Enter"><?php echo $_ahchs=(isset($academik_sohojogita['ahchs']))? $academik_sohojogita['ahchs']:''?></a>
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
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
        text-align: left
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
        text-align: left
    }

    .tg .tg-0pky {
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        text-align: left;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>