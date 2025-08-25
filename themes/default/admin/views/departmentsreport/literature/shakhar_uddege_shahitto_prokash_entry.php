<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'শাখার উদ্যোগে সাহিত্য প্রকাশ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/shakhar-uddege-shahitto-prokash') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/shakhar-uddege-shahitto-prokash/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7">ধরণ</td>
                                <td class="tg-pwj7" > সময়কাল (মাসিক/দ্বিমাসিক) </td>
                                <td class="tg-pwj7" >নাম </td>
                                <td class="tg-pwj7" > বিষয় </td>
                                <td class="tg-pwj7" > ইস্যু সংখ্যা </td>
                            </tr>

                            <?php
                            $pk = (isset($shakhar_uddege_shahitto_prokash['id']))?$shakhar_uddege_shahitto_prokash['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1">কিশোর উপযোগী সাহিত্য পত্রিকা	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kusp_somoykal" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['kusp_somoykal']))? $shakhar_uddege_shahitto_prokash['kusp_somoykal']:'' ?></a>
                                </td>

                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kusp_nam" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['kusp_nam']))? $shakhar_uddege_shahitto_prokash['kusp_nam']:'' ?></a>
                                </td>

                                <td class="tg-0pky  type_3">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kusp_bisoy" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['kusp_bisoy']))? $shakhar_uddege_shahitto_prokash['kusp_bisoy']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kusp_issue_sonkha" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['kusp_issue_sonkha']))? $shakhar_uddege_shahitto_prokash['kusp_issue_sonkha']:'' ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">বড়দের জন্য উপযোগী সাহিত্য পত্রিকা	 </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjusp_somoykal" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bjusp_somoykal']))? $shakhar_uddege_shahitto_prokash['bjusp_somoykal']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjusp_nam" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bjusp_nam']))? $shakhar_uddege_shahitto_prokash['bjusp_nam']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjusp_bisoy" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bjusp_bisoy']))? $shakhar_uddege_shahitto_prokash['bjusp_bisoy']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bjusp_issue_sonkha" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bjusp_issue_sonkha']))? $shakhar_uddege_shahitto_prokash['bjusp_issue_sonkha']:'' ?></a>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-y698">বিশেষ সাময়িকী (স্মারক-জাতীয়)	 </td>
                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bssj_somoykal" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bssj_somoykal']))? $shakhar_uddege_shahitto_prokash['bssj_somoykal']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bssj_nam" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bssj_nam']))? $shakhar_uddege_shahitto_prokash['bssj_nam']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bssj_bisoy" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bssj_bisoy']))? $shakhar_uddege_shahitto_prokash['bssj_bisoy']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bssj_issue_sonkha" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['bssj_issue_sonkha']))? $shakhar_uddege_shahitto_prokash['bssj_issue_sonkha']:'' ?></a>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-y698">দেয়ালিকা/ক্রোড়পত্র/বুলেটিন	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dkb_somoykal" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['dkb_somoykal']))? $shakhar_uddege_shahitto_prokash['dkb_somoykal']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dkb_nam" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['dkb_nam']))? $shakhar_uddege_shahitto_prokash['dkb_nam']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dkb_bisoy" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['dkb_bisoy']))? $shakhar_uddege_shahitto_prokash['dkb_bisoy']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="shakhar_uddege_shahitto_prokash" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dkb_issue_sonkha" data-title="Enter"><?php echo (isset( $shakhar_uddege_shahitto_prokash['dkb_issue_sonkha']))? $shakhar_uddege_shahitto_prokash['dkb_issue_sonkha']:'' ?></a>
                                </td>

                            
                            </tr>
                           
                        </table>
                    </div>
			   </div>

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

