<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'জনশক্তি ও রিসোর্স' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/it-jonoshokti') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-jonoshokti/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                             
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 " rowspan="2"><div><span>সংখ্যা </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>পিসি/ল্যাপটপ <br> আছে  </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>এন্ড্রয়েড ফোন <br> আছে</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ইন্টারনেট <br> আছে </span></div></td>
                                <td class="tg-pwj7" colspan="2">নিয়মিত ব্লগ লেখেন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফেসবুক <br> ক্যাম্পেইন করেন </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>টুইটার <br> ক্যাম্পেইন করেন</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>CSE তে <br> অধ্যয়নরত</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  বাংলা  </span></div></td>
                                <td class="tg-pwj7 "><div><span> ইংরেজি</span></div></td>
                              
                         
                        
                               
                            </tr>


                            <?php
                            $pk = (isset($jonoshoktiorisors['id']))?$jonoshoktiorisors['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_s" data-title="Enter"><?php echo $sod_s =  (isset( $jonoshoktiorisors['sod_s']))? $jonoshoktiorisors['sod_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_pltpa" data-title="Enter"><?php echo $sod_pltpa =  (isset( $jonoshoktiorisors['sod_pltpa']))? $jonoshoktiorisors['sod_pltpa']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_adphna" data-title="Enter"><?php echo $sod_adphna =  (isset( $jonoshoktiorisors['sod_adphna']))? $jonoshoktiorisors['sod_adphna']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_ena" data-title="Enter"><?php echo $sod_ena =  (isset( $jonoshoktiorisors['sod_ena']))? $jonoshoktiorisors['sod_ena']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_nmble_enrj" data-title="Enter"><?php echo $sod_nmble_enrj =  (isset( $jonoshoktiorisors['sod_nmble_enrj']))? $jonoshoktiorisors['sod_nmble_enrj']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_nmble_bnl" data-title="Enter"><?php echo $sod_nmble_bnl =  (isset( $jonoshoktiorisors['sod_nmble_bnl']))? $jonoshoktiorisors['sod_nmble_bnl']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_fbkpk" data-title="Enter"><?php echo $sod_fbkpk =  (isset( $jonoshoktiorisors['sod_fbkpk']))? $jonoshoktiorisors['sod_fbkpk']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_tutkpk" data-title="Enter"><?php echo $sod_tutkpk =  (isset( $jonoshoktiorisors['sod_tutkpk']))? $jonoshoktiorisors['sod_tutkpk']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_itap" data-title="Enter"><?php echo $sod_itap =  (isset( $jonoshoktiorisors['sod_itap']))? $jonoshoktiorisors['sod_itap']:'' ?></a>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_s" data-title="Enter"><?php echo $sat_s =  (isset( $jonoshoktiorisors['sat_s']))? $jonoshoktiorisors['sat_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_pltpa" data-title="Enter"><?php echo $sat_pltpa =  (isset( $jonoshoktiorisors['sat_pltpa']))? $jonoshoktiorisors['sat_pltpa']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_adphna" data-title="Enter"><?php echo $sat_adphna =  (isset( $jonoshoktiorisors['sat_adphna']))? $jonoshoktiorisors['sat_adphna']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_ena" data-title="Enter"><?php echo $sat_ena =  (isset( $jonoshoktiorisors['sat_ena']))? $jonoshoktiorisors['sat_ena']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_nmble_enrj" data-title="Enter"><?php echo $sat_nmble_enrj =  (isset( $jonoshoktiorisors['sat_nmble_enrj']))? $jonoshoktiorisors['sat_nmble_enrj']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_nmble_bnl" data-title="Enter"><?php echo $sat_nmble_bnl =  (isset( $jonoshoktiorisors['sat_nmble_bnl']))? $jonoshoktiorisors['sat_nmble_bnl']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_fbkpk" data-title="Enter"><?php echo $sat_fbkpk =  (isset( $jonoshoktiorisors['sat_fbkpk']))? $jonoshoktiorisors['sat_fbkpk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_tutkpk" data-title="Enter"><?php echo $sat_tutkpk =  (isset( $jonoshoktiorisors['sat_tutkpk']))? $jonoshoktiorisors['sat_tutkpk']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_itap" data-title="Enter"><?php echo $sat_itap =  (isset( $jonoshoktiorisors['sat_itap']))? $jonoshoktiorisors['sat_itap']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_s" data-title="Enter"><?php echo $kor_s =  (isset( $jonoshoktiorisors['kor_s']))? $jonoshoktiorisors['kor_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_pltpa" data-title="Enter"><?php echo $kor_pltpa =  (isset( $jonoshoktiorisors['kor_pltpa']))? $jonoshoktiorisors['kor_pltpa']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_adphna" data-title="Enter"><?php echo $kor_adphna =  (isset( $jonoshoktiorisors['kor_adphna']))? $jonoshoktiorisors['kor_adphna']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_ena" data-title="Enter"><?php echo $kor_ena =  (isset( $jonoshoktiorisors['kor_ena']))? $jonoshoktiorisors['kor_ena']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_nmble_enrj" data-title="Enter"><?php echo $kor_nmble_enrj =  (isset( $jonoshoktiorisors['kor_nmble_enrj']))? $jonoshoktiorisors['kor_nmble_enrj']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_nmble_bnl" data-title="Enter"><?php echo $kor_nmble_bnl =  (isset( $jonoshoktiorisors['kor_nmble_bnl']))? $jonoshoktiorisors['kor_nmble_bnl']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_fbkpk" data-title="Enter"><?php echo $kor_fbkpk =  (isset( $jonoshoktiorisors['kor_fbkpk']))? $jonoshoktiorisors['kor_fbkpk']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_tutkpk" data-title="Enter"><?php echo $kor_tutkpk =  (isset( $jonoshoktiorisors['kor_tutkpk']))? $jonoshoktiorisors['kor_tutkpk']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="jonoshoktiorisors" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_itap" data-title="Enter"><?php echo $kor_itap =  (isset( $jonoshoktiorisors['kor_itap']))? $jonoshoktiorisors['kor_itap']:'' ?></a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky  type_9">
                                
                                </td>
                              
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
