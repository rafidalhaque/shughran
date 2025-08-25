<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সাহায্য' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/chatrokollan-sahajjo') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/chatrokollan-sahajjo/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                
                                <td class="tg-pwj7" colspan="3">সহযোগিতা</td>
                                <td class="tg-0pky" rowspan="6"> </td>
                                <td class="tg-pwj7" colspan="3">চিকিৎসা </td>
                                <td class="tg-0pky" rowspan="6">   </td>
                                <td class="tg-pwj7" colspan="3">যোগাযোগ </td>
                                
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7" >বিবরণ </td>
                                <td class="tg-pwj7" >সংখ্যা</td>
                                <td class="tg-pwj7" >পরিমান   </td>
                                <td class="tg-pwj7" >বিবরণ </td>
                                <td class="tg-pwj7" >সংখ্যা</td>
                                <td class="tg-pwj7" >পরিমান   </td>
                                <td class="tg-pwj7" >বিবরণ </td>
                                <td class="tg-pwj7" >সংখ্যা</td>
                                <td class="tg-pwj7" >পরিমান   </td>
                               
                            </tr>

                            <?php
                            $pk = (isset($chatrokollan_sahajjo['id']))?$chatrokollan_sahajjo['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698">নিয়মিত </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="soho_niyo_sonkha" data-title="Enter"><?php echo $soho_niyo_sonkha=  (isset( $chatrokollan_sahajjo['soho_niyo_sonkha']))? $chatrokollan_sahajjo['soho_niyo_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="soho_niyo_poriman" data-title="Enter"><?php echo $soho_niyo_poriman=  (isset( $chatrokollan_sahajjo['soho_niyo_poriman']))? $chatrokollan_sahajjo['soho_niyo_poriman']:0 ?></a>
                                </td>
                                <td class="tg-y698"> নিয়মিত </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chikit_niyo_sonkha" data-title="Enter"><?php echo $chikit_niyo_sonkha=  (isset( $chatrokollan_sahajjo['chikit_niyo_sonkha']))? $chatrokollan_sahajjo['chikit_niyo_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chikit_niyo_poriman" data-title="Enter"><?php echo $chikit_niyo_poriman=  (isset( $chatrokollan_sahajjo['chikit_niyo_poriman']))? $chatrokollan_sahajjo['chikit_niyo_poriman']:0 ?></a>
                                </td>
                                <td class="tg-y698">শহীদ পরিবার</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="joga_sohi_sonkha" data-title="Enter"><?php echo $joga_sohi_sonkha=  (isset( $chatrokollan_sahajjo['joga_sohi_sonkha']))? $chatrokollan_sahajjo['joga_sohi_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="joga_sohi_poriman" data-title="Enter"><?php echo $joga_sohi_poriman=  (isset( $chatrokollan_sahajjo['joga_sohi_poriman']))? $chatrokollan_sahajjo['joga_sohi_poriman']:0 ?></a>
                                </td>
                                
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">অনিয়মিত </td>
                                
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="soho_oniyo_sonkha" data-title="Enter"><?php echo $soho_oniyo_sonkha=  (isset( $chatrokollan_sahajjo['soho_oniyo_sonkha']))? $chatrokollan_sahajjo['soho_oniyo_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="soho_oniyo_poriman" data-title="Enter"><?php echo $soho_oniyo_poriman=  (isset( $chatrokollan_sahajjo['soho_oniyo_poriman']))? $chatrokollan_sahajjo['soho_oniyo_poriman']:0 ?></a>
                                </td>
                                <td class="tg-y698">অনিয়মিত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chikit_oniyo_sonkha" data-title="Enter"><?php echo $chikit_oniyo_sonkha=  (isset( $chatrokollan_sahajjo['chikit_oniyo_sonkha']))? $chatrokollan_sahajjo['chikit_oniyo_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chikit_oniyo_poriman" data-title="Enter"><?php echo $chikit_oniyo_poriman=  (isset( $chatrokollan_sahajjo['chikit_oniyo_poriman']))? $chatrokollan_sahajjo['chikit_oniyo_poriman']:0 ?></a>
                                </td>
                                <td class="tg-y698">আহত</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="joga_ahoto_sonkha" data-title="Enter"><?php echo $joga_ahoto_sonkha=  (isset( $chatrokollan_sahajjo['joga_ahoto_sonkha']))? $chatrokollan_sahajjo['joga_ahoto_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="joga_ahoto_poriman" data-title="Enter"><?php echo $joga_ahoto_poriman=  (isset( $chatrokollan_sahajjo['joga_ahoto_poriman']))? $chatrokollan_sahajjo['joga_ahoto_poriman']:0 ?></a>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">এককালীন </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="soho_ekkal_sonkha" data-title="Enter"><?php echo $soho_ekkal_sonkha=  (isset( $chatrokollan_sahajjo['soho_ekkal_sonkha']))? $chatrokollan_sahajjo['soho_ekkal_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="soho_ekkal_poriman" data-title="Enter"><?php echo $soho_ekkal_poriman=  (isset( $chatrokollan_sahajjo['soho_ekkal_poriman']))? $chatrokollan_sahajjo['soho_ekkal_poriman']:0 ?></a>
                                </td>
                                <td class="tg-y698">এককালীন</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chikit_ekkal_sonkha" data-title="Enter"><?php echo $chikit_ekkal_sonkha=  (isset( $chatrokollan_sahajjo['chikit_ekkal_sonkha']))? $chatrokollan_sahajjo['chikit_ekkal_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="chikit_ekkal_poriman" data-title="Enter"><?php echo $chikit_ekkal_poriman=  (isset( $chatrokollan_sahajjo['chikit_ekkal_poriman']))? $chatrokollan_sahajjo['chikit_ekkal_poriman']:0 ?></a>
                                </td>
                                <td class="tg-y698">পঙ্গুত্ববরণকারী</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="joga_pongu_sonkha" data-title="Enter"><?php echo $joga_pongu_sonkha=  (isset( $chatrokollan_sahajjo['joga_pongu_sonkha']))? $chatrokollan_sahajjo['joga_pongu_sonkha']:0 ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatrokollan_sahajjo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="joga_pongu_poriman" data-title="Enter"><?php echo $joga_pongu_poriman=  (isset( $chatrokollan_sahajjo['joga_pongu_poriman']))? $chatrokollan_sahajjo['joga_pongu_poriman']:0 ?></a>
                                </td>
                              
                            </tr>

                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                <?php echo ($soho_niyo_sonkha+$soho_oniyo_sonkha+$soho_ekkal_sonkha)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($soho_niyo_poriman+$soho_oniyo_poriman+$soho_ekkal_poriman)?>
                                </td>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                <?php echo ($chikit_niyo_sonkha+$chikit_oniyo_sonkha+$chikit_ekkal_sonkha)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($chikit_niyo_poriman+$chikit_oniyo_poriman+$chikit_ekkal_poriman)?>
                                </td>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                <?php echo ($joga_sohi_sonkha+$joga_ahoto_sonkha+$joga_pongu_sonkha)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($joga_sohi_poriman+$joga_ahoto_poriman+$joga_pongu_poriman)?>
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
