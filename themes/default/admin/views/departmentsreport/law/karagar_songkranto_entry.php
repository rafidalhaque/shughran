<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'কারাগার সংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/karagar-songkranto') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/karagar-songkranto/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                               
                            <td class="tg-pwj7" colspan="5"  style="text-align:center;">শুধু 2018 সালে গ্রেফতার  </td>
                                <td class="tg-pwj7" colspan="5" style="text-align:center;">এ পর্যন্ত গ্রেফতার 2009-2018  </td>
                                <td class="tg-pwj7" colspan="5" style="text-align:center;">বর্তমানে কারাগারে  </td>
                                
                            </tr>
                            <tr>
                             
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট </span></div></td>
                            </tr>




                            <tr>
                              
                                <td class="tg-0pky  type_1">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_3">
                                
                                </td>
                                <td class="tg-0pky  type_4">
                                
                                </td>
                                <td class="tg-0pky  type_5">
                                
                                </td>
                                <td class="tg-0pky  type_6">
                                
                                </td>
                                <td class="tg-0pky  type_7">
                                
                                </td>
                                <td class="tg-0pky  type_8">
                                
                                </td>
                                <td class="tg-0pky  type_9">
                                
                                </td>
                                <td class="tg-0pky  type_10">
                                
                                </td>
                                <td class="tg-0pky  type_11">
                                
                                </td>
                                <td class="tg-0pky  type_12">
                                
                                </td>
                                <td class="tg-0pky  type_10">
                                
                                </td>
                                <td class="tg-0pky  type_11">
                                
                                </td>
                                <td class="tg-0pky  type_12">
                                
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
