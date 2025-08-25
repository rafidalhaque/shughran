<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সপ্তাহ,পক্ষ ও দশক পালনের রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/week-pokkho-report') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/week-pokkho-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="4"> ক্রমিক  </td>
                                <td class="tg-pwj7"  rowspan="4" colspan="">বিবরণ</td>
                      
                                <td class="tg-pwj7" colspan="2">হয়েছে কিনা  </td>
                             
                           
                            </tr>
                            <tr>
                          
                            </tr>
                            <tr>
                  
                               
                            </tr>




                            <tr>
                               
                                <td class="tg-0pky">
                                হ্যাঁ 
                                </td>
                                <td class="tg-0pky">
                                না
                          
                                </td>
                              
                             
                            
                            </tr>
                        <?php
                        $pk = (isset($aknojoresoptaho_pokkho_doshok_paloner_riport['id']))?$aknojoresoptaho_pokkho_doshok_paloner_riport['id']:'';
                        ?>

                            <tr>
                                <td class="tg-y698">১</td>
                                <td class="tg-0pky">
                                স্কুল দাওয়াতি দাওয়াতি
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sclldd_hok_ha" data-title="Enter"><?php echo $sclldd_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['sclldd_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['sclldd_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $sclldd_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['sclldd_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['sclldd_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
                                </td>
                              

                            </tr>
                            <tr>
                                <td class="tg-y698">২</td>
                                <td class="tg-0pky">
                                দাওয়াতী পক্ষ
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dp_hok_ha" data-title="Enter"><?php echo $dp_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['dp_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['dp_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $dp_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['dp_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['dp_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">৩   </td>
                                <td class="tg-0pky">
                                সাংগঠনিক দশক 
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="snd_hok_ha" data-title="Enter"><?php echo $snd_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['snd_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['snd_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $snd_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['snd_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['snd_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">৪ </td>
                                <td class="tg-0pky">
                                বাইতুল মাল সপ্তাহ
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bls_hok_ha" data-title="Enter"><?php echo $bls_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['bls_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['bls_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $bls_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['bls_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['bls_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
                                </td>
                                
                               
                            </tr>
                            <tr>
                                <td class="tg-y698">৫ </td>
                                <td class="tg-0pky">
                                পাঠাগার সপ্তাহ
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pgs_hok_ha" data-title="Enter"><?php echo $pgs_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['pgs_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['pgs_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $pgs_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['pgs_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['pgs_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
                                </td>
                              
                               
                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="3" >৬ </td>
                                <td class="tg-0pky"colspan="4">
                                  <p style="text-align: center">আউটপুট পরিকল্পনা গ্রহণ</p>
                                
                               
                                </td>
                              
                                
                               
                            </tr>
                            <tr>
                            <td class="tg-0pky">
                                একাডেমিক আউটপুট 
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="aupupg_hok_ha" data-title="Enter"><?php echo $aupupg_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['aupupg_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['aupupg_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $adaupu_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['adaupu_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['adaupu_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
                                </td>
                                </tr>

                                <tr>  
                                <td class="tg-0pky">
                                প্রফেশনাল আউটপুট
                                </td>
                                <td class="tg-0pky">
                                    <a href="#"  class="yes_no editable-click"  data-id="" data-idname=""   data-type="select" data-table="aknojoresoptaho_pokkho_doshok_paloner_riport" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pshaupu_hok_ha" data-title="Enter"><?php echo $pshaupu_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['pshaupu_hok_ha']))? $aknojoresoptaho_pokkho_doshok_paloner_riport['pshaupu_hok_ha'] : 'empty' ?></a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo $pshaupu_hok_ha=  (isset( $aknojoresoptaho_pokkho_doshok_paloner_riport['pshaupu_hok_ha']))? (($aknojoresoptaho_pokkho_doshok_paloner_riport['pshaupu_hok_ha'] =='Yes')?'No':'Yes'):'empty' ?>
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
