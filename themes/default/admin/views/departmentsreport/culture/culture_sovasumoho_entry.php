<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-sovasumoho') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-sovasumoho/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                        <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">মোট উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                       <td class="tg-pwj7" rowspan="2">বিবরণ</td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">মোট উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড় উপস্থিতি</td>
                 

                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($sovasomuho['id']))?$sovasomuho['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1"> নকিব সভা 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibsv_s" data-title="Enter"><?php echo $nokibsv_s=  (isset( $sovasomuho['nokibsv_s']))?$sovasomuho['nokibsv_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nokibsv_mup" data-title="Enter"><?php echo $nokibsv_mup=  (isset( $sovasomuho['nokibsv_mup']))?$sovasomuho['nokibsv_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($nokibsv_mup!=0)?$nokibsv_mup/$nokibsv_s:0,2)?>
                       </td>

                       <td class="tg-y698 type_1"> উপদেষ্টা বৈঠক	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upb_s" data-title="Enter"><?php echo $upb_s=  (isset( $sovasomuho['upb_s']))?$sovasomuho['upb_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="upb_mup" data-title="Enter"><?php echo $upb_mup=  (isset( $sovasomuho['upb_mup']))?$sovasomuho['upb_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo number_format(($upb_s!=0)?$upb_mup/$upb_s:0,2)?>
                       </td>
             
                    </tr>


                   <tr>
                       <td class="tg-y698">পরিচালনা পরিষদ সভা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppsv_s" data-title="Enter"><?php echo $ppsv_s=  (isset( $sovasomuho['ppsv_s']))?$sovasomuho['ppsv_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ppsv_mup" data-title="Enter"><?php echo $ppsv_mup=  (isset( $sovasomuho['ppsv_mup']))?$sovasomuho['ppsv_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($ppsv_mup!=0)?($ppsv_mup/$ppsv_s):0?>
                       </td>

                       <td class="tg-y698">শিল্পী সমাবেশ	  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpisb_s" data-title="Enter"><?php echo $shilpisb_s=  (isset( $sovasomuho['shilpisb_s']))?$sovasomuho['shilpisb_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpisb_mup" data-title="Enter"><?php echo $shilpisb_mup=  (isset( $sovasomuho['shilpisb_mup']))?$sovasomuho['shilpisb_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($shilpisb_s!=0)?($shilpisb_mup/$shilpisb_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">অগ্রজ বৈঠক </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojsv_s" data-title="Enter"><?php echo $ogrojsv_s=  (isset( $sovasomuho['ogrojsv_s']))?$sovasomuho['ogrojsv_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojsv_mup" data-title="Enter"><?php echo $ogrojsv_mup=  (isset( $sovasomuho['ogrojsv_mup']))?$sovasomuho['ogrojsv_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($ogrojsv_mup!=0)?($ogrojsv_mup/$ogrojsv_s):0?>
                       </td>

                       <td class="tg-y698">সংবর্ধনা অনুষ্ঠান </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdha_s" data-title="Enter"><?php echo $sdha_s=  (isset( $sovasomuho['sdha_s']))?$sovasomuho['sdha_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdha_mup" data-title="Enter"><?php echo $sdha_mup=  (isset( $sovasomuho['sdha_mup']))?$sovasomuho['sdha_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($sdha_s!=0)?($sdha_mup/$sdha_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">উন্মেষ বৈঠক </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmeshsv_s" data-title="Enter"><?php echo $unmeshsv_s=  (isset( $sovasomuho['unmeshsv_s']))?$sovasomuho['unmeshsv_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="unmeshsv_mup" data-title="Enter"><?php echo $unmeshsv_mup=  (isset( $sovasomuho['unmeshsv_mup']))?$sovasomuho['unmeshsv_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($unmeshsv_mup!=0)?($unmeshsv_mup/$unmeshsv_s):0?>
                       </td>

                       <td class="tg-y698">সাহিত্য আসর </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_s" data-title="Enter"><?php echo $shsf_s=  (isset( $sovasomuho['shsf_s']))?$sovasomuho['shsf_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shsf_mup" data-title="Enter"><?php echo $shsf_mup=  (isset( $sovasomuho['shsf_mup']))?$sovasomuho['shsf_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($shsf_s!=0)?($shsf_mup/$shsf_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">পরশ বৈঠক </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pcsv_s" data-title="Enter"><?php echo $pcsv_s=  (isset( $sovasomuho['pcsv_s']))?$sovasomuho['pcsv_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pcsv_mup" data-title="Enter"><?php echo $pcsv_mup=  (isset( $sovasomuho['pcsv_mup']))?$sovasomuho['pcsv_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($pcsv_mup!=0)?($pcsv_mup/$pcsv_s):0?>
                       </td>

                       <td class="tg-y698">ইফতার মাহফিল </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="etmf_s" data-title="Enter"><?php echo $etmf_s=  (isset( $sovasomuho['etmf_s']))?$sovasomuho['etmf_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="etmf_mup" data-title="Enter"><?php echo $etmf_mup=  (isset( $sovasomuho['etmf_mup']))?$sovasomuho['etmf_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($etmf_mup!=0)?($etmf_mup/$etmf_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">পর্যালোচনা সভা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kgth_s" data-title="Enter"><?php echo $kgth_s=  (isset( $sovasomuho['kgth_s']))?$sovasomuho['kgth_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kgth_mup" data-title="Enter"><?php echo $kgth_mup=  (isset( $sovasomuho['kgth_mup']))?$sovasomuho['kgth_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($kgth_mup!=0)?($kgth_mup/$kgth_s):0?>
                       </td>

                       <td class="tg-y698">দিবস পালন  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dibos_p_s" data-title="Enter"><?php echo $dibos_p_s=  (isset( $sovasomuho['dibos_p_s']))?$sovasomuho['dibos_p_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dibos_p_mup" data-title="Enter"><?php echo $dibos_p_mup=  (isset( $sovasomuho['dibos_p_mup']))?$sovasomuho['dibos_p_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($dibos_p_mup!=0)?($dibos_p_mup/$dibos_p_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">কমিটি গঠন  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojsb_s" data-title="Enter"><?php echo $ogrojsb_s=  (isset( $sovasomuho['ogrojsb_s']))?$sovasomuho['ogrojsb_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ogrojsb_mup" data-title="Enter"><?php echo $ogrojsb_mup=  (isset( $sovasomuho['ogrojsb_mup']))?$sovasomuho['ogrojsb_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($ogrojsb_mup!=0)?($ogrojsb_mup/$ogrojsb_s):0?>
                       </td>

                       <td class="tg-y698">র‌্যালি  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="raly_s" data-title="Enter"><?php echo $raly_s=  (isset( $sovasomuho['raly_s']))?$sovasomuho['raly_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="raly_mup" data-title="Enter"><?php echo $raly_mup=  (isset( $sovasomuho['raly_mup']))?$sovasomuho['raly_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($raly_mup!=0)?($raly_mup/$raly_s):0?>
                       </td>
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">অগ্রজ সমাবেশ  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpisb_s" data-title="Enter"><?php echo $shilpisb_s=  (isset( $sovasomuho['shilpisb_s']))?$sovasomuho['shilpisb_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpisb_mup" data-title="Enter"><?php echo $shilpisb_mup=  (isset( $sovasomuho['shilpisb_mup']))?$sovasomuho['shilpisb_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($shilpisb_mup!=0)?($shilpisb_mup/$shilpisb_s):0?>
                       </td>

                       <td class="tg-y698"> চা-চক্র </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cha_ck_s" data-title="Enter"><?php echo $cha_ck_s=  (isset( $sovasomuho['cha_ck_s']))?$sovasomuho['cha_ck_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="sovasomuho" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cha_ck_mup" data-title="Enter"><?php echo $cha_ck_mup=  (isset( $sovasomuho['cha_ck_mup']))?$sovasomuho['cha_ck_mup']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo ($cha_ck_mup!=0)?($cha_ck_mup/$cha_ck_s):0?>
                       </td>
              



                            

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
