<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'জনশক্তির দক্ষতা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/jonoshoktir-dokhota') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/jonoshoktir-dokhota/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> ওর্য়াড </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> এক্সেল </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>মাইক্রোসফট <br> পাওয়ারপয়ন্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ভিডিও <br> এডিটিং </span></div></td>
                                <td class="tg-pwj7" colspan="2">গ্রাফিক ডিজাইন </td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ওয়বে <br> ডেভেলপম্যান্ট </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> অ্যাপ <br> ডেভেলপম্যান্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>আইটি এক্সপার্ট</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  ফটোশপ  </span></div></td>
                                <td class="tg-pwj7 "><div><span> ইলাস্ট্রেটর</span></div></td>
                              
                         
                        
                               
                            </tr>


                            <?php
                            $pk = (isset($dept_jonoshoktir_dokkhota['id']))?$dept_jonoshoktir_dokkhota['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mio" data-title="Enter"><?php echo $sod_mio =  (isset( $dept_jonoshoktir_dokkhota['sod_mio']))? $dept_jonoshoktir_dokkhota['sod_mio']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_miax" data-title="Enter"><?php echo $sod_miax =  (isset( $dept_jonoshoktir_dokkhota['sod_miax']))? $dept_jonoshoktir_dokkhota['sod_miax']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_mipp" data-title="Enter"><?php echo $sod_mipp =  (isset( $dept_jonoshoktir_dokkhota['sod_mipp']))? $dept_jonoshoktir_dokkhota['sod_mipp']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_vdoe" data-title="Enter"><?php echo $sod_vdoe =  (isset( $dept_jonoshoktir_dokkhota['sod_vdoe']))? $dept_jonoshoktir_dokkhota['sod_vdoe']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_gdp" data-title="Enter"><?php echo $sod_gdp =  (isset( $dept_jonoshoktir_dokkhota['sod_gdp']))? $dept_jonoshoktir_dokkhota['sod_gdp']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_6">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_gde" data-title="Enter"><?php echo $sod_gde =  (isset( $dept_jonoshoktir_dokkhota['sod_gde']))? $dept_jonoshoktir_dokkhota['sod_gde']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_7">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_web" data-title="Enter"><?php echo $sod_web =  (isset( $dept_jonoshoktir_dokkhota['sod_web']))? $dept_jonoshoktir_dokkhota['sod_web']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_8">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_app" data-title="Enter"><?php echo $sod_app =  (isset( $dept_jonoshoktir_dokkhota['sod_app']))? $dept_jonoshoktir_dokkhota['sod_app']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sod_it" data-title="Enter"><?php echo $sod_it =  (isset( $dept_jonoshoktir_dokkhota['sod_it']))? $dept_jonoshoktir_dokkhota['sod_it']:'' ?></a>
                                </td>
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mio" data-title="Enter"><?php echo $sat_mio =  (isset( $dept_jonoshoktir_dokkhota['sat_mio']))? $dept_jonoshoktir_dokkhota['sat_mio']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_miax" data-title="Enter"><?php echo $sat_miax =  (isset( $dept_jonoshoktir_dokkhota['sat_miax']))? $dept_jonoshoktir_dokkhota['sat_miax']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_mipp" data-title="Enter"><?php echo $sat_mipp =  (isset( $dept_jonoshoktir_dokkhota['sat_mipp']))? $dept_jonoshoktir_dokkhota['sat_mipp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_vdoe" data-title="Enter"><?php echo $satsat_vdoe_ena =  (isset( $dept_jonoshoktir_dokkhota['sat_vdoe']))? $dept_jonoshoktir_dokkhota['sat_vdoe']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_gdp" data-title="Enter"><?php echo $sat_gdp =  (isset( $dept_jonoshoktir_dokkhota['sat_gdp']))? $dept_jonoshoktir_dokkhota['sat_gdp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_gde" data-title="Enter"><?php echo $sat_gde =  (isset( $dept_jonoshoktir_dokkhota['sat_gde']))? $dept_jonoshoktir_dokkhota['sat_gde']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_web" data-title="Enter"><?php echo $sat_web =  (isset( $dept_jonoshoktir_dokkhota['sat_web']))? $dept_jonoshoktir_dokkhota['sat_web']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_app" data-title="Enter"><?php echo $sat_app =  (isset( $dept_jonoshoktir_dokkhota['sat_app']))? $dept_jonoshoktir_dokkhota['sat_app']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sat_it" data-title="Enter"><?php echo $sat_it =  (isset( $dept_jonoshoktir_dokkhota['sat_it']))? $dept_jonoshoktir_dokkhota['sat_it']:'' ?></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mio" data-title="Enter"><?php echo $kor_mio =  (isset( $dept_jonoshoktir_dokkhota['kor_mio']))? $dept_jonoshoktir_dokkhota['kor_mio']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                   <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_miax" data-title="Enter"><?php echo $kor_miax =  (isset( $dept_jonoshoktir_dokkhota['kor_miax']))? $dept_jonoshoktir_dokkhota['kor_miax']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_mipp" data-title="Enter"><?php echo $kor_mipp =  (isset( $dept_jonoshoktir_dokkhota['kor_mipp']))? $dept_jonoshoktir_dokkhota['kor_mipp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_vdoe" data-title="Enter"><?php echo $kor_vdoe =  (isset( $dept_jonoshoktir_dokkhota['kor_vdoe']))? $dept_jonoshoktir_dokkhota['kor_vdoe']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_gdp" data-title="Enter"><?php echo $kor_gdp =  (isset( $dept_jonoshoktir_dokkhota['kor_gdp']))? $dept_jonoshoktir_dokkhota['kor_gdp']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_gde" data-title="Enter"><?php echo $kor_gde =  (isset( $dept_jonoshoktir_dokkhota['kor_gde']))? $dept_jonoshoktir_dokkhota['kor_gde']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_web" data-title="Enter"><?php echo $kor_web =  (isset( $dept_jonoshoktir_dokkhota['kor_web']))? $dept_jonoshoktir_dokkhota['kor_web']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                  <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_app" data-title="Enter"><?php echo $kor_app =  (isset( $dept_jonoshoktir_dokkhota['kor_app']))? $dept_jonoshoktir_dokkhota['kor_app']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="dept_jonoshoktir_dokkhota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kor_it" data-title="Enter"><?php echo $kor_it =  (isset( $dept_jonoshoktir_dokkhota['kor_it']))? $dept_jonoshoktir_dokkhota['kor_it']:'' ?></a>
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
