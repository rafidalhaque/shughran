<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সভাসমূহ ও প্রশিক্ষণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/media-sovasumoho-proshikkhon') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-sovasumoho-proshikkhon/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                               
                              
                                <td class="tg-pwj7" rowspan="9" >সভাসমূহ ও প্রশিক্ষণ</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >  মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >গড়</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >  মোট উপস্থিতি </td>
                                <td class="tg-pwj7" >গড়</td>
                                
                                
                            </tr>

                            <?php
                            $pk = (isset($media_bivag4['id']))?$media_bivag4['id']:'';
                            ?>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> স্কিল ডেভলপমেন্ট প্রোগ্রাম	</td>
                               
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skldpmpg_s" data-title="Enter"><?php echo $skldpmpg_s=  (isset( $media_bivag4['skldpmpg_s']))? $media_bivag4['skldpmpg_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="skldpmpg_mup" data-title="Enter"><?php echo $skldpmpg_mup=  (isset( $media_bivag4['skldpmpg_mup']))? $media_bivag4['skldpmpg_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($skldpmpg_s!=0)?$skldpmpg_mup/$skldpmpg_s:0,2)?>
                                </td>
                                <td class="tg-y698" >এডমিন সভা </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adms_s" data-title="Enter"><?php echo $adms_s=  (isset( $media_bivag4['adms_s']))? $media_bivag4['adms_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="adms_mup" data-title="Enter"><?php echo $adms_mup=  (isset( $media_bivag4['adms_mup']))? $media_bivag4['adms_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($adms_s!=0)?$adms_mup/$adms_s:0,2)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">প্লানিং প্রোগ্রাম (রাইটিং ও অন্যান্য) </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="plnpgronan_s" data-title="Enter"><?php echo $plnpgronan_s=  (isset( $media_bivag4['plnpgronan_s']))? $media_bivag4['plnpgronan_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="plnpgronan_mup" data-title="Enter"><?php echo $plnpgronan_mup=  (isset( $media_bivag4['plnpgronan_mup']))? $media_bivag4['plnpgronan_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($plnpgronan_s!=0)?$plnpgronan_mup/$plnpgronan_s:0,2)?>
                                </td>
                                <td class="tg-y698" >প্রোগ্রাম সভা</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pgs_s" data-title="Enter"><?php echo $pgs_s=  (isset( $media_bivag4['pgs_s']))? $media_bivag4['pgs_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pgs_mup" data-title="Enter"><?php echo $pgs_mup=  (isset( $media_bivag4['pgs_mup']))? $media_bivag4['pgs_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($pgs_s!=0)?$pgs_mup/$pgs_s:0,2)?>
                                </td>                                

                            </tr>
                            <tr>
                                <td class="tg-y698">ফিচার/ কলাম/স্পেশাল নিউজ রাইটিং প্রোগ্রাম </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fkspnrpg_s" data-title="Enter"><?php echo $fkspnrpg_s=  (isset( $media_bivag4['fkspnrpg_s']))? $media_bivag4['fkspnrpg_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fkspnrpg_mup" data-title="Enter"><?php echo $fkspnrpg_mup=  (isset( $media_bivag4['fkspnrpg_mup']))? $media_bivag4['fkspnrpg_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($fkspnrpg_s!=0)?$fkspnrpg_mup/$fkspnrpg_s:0,2)?>
                                </td>
                                <td class="tg-y698" > সাধারণ সভা  </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdhns_s" data-title="Enter"><?php echo $sdhns_s=  (isset( $media_bivag4['sdhns_s']))? $media_bivag4['sdhns_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdhns_mup" data-title="Enter"><?php echo $sdhns_mup=  (isset( $media_bivag4['sdhns_mup']))? $media_bivag4['sdhns_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sdhns_s!=0)?$sdhns_mup/$sdhns_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">নিউজ স্ক্রীপ্ট/ প্রেজেন্টিং/রিপোটিং প্রোগ্রাম</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nsprpg_s" data-title="Enter"><?php echo $nsprpg_s=  (isset( $media_bivag4['nsprpg_s']))? $media_bivag4['nsprpg_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nsprpg_mup" data-title="Enter"><?php echo $nsprpg_mup=  (isset( $media_bivag4['nsprpg_mup']))? $media_bivag4['nsprpg_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($nsprpg_s!=0)?$nsprpg_mup/$nsprpg_s:0,2)?>
                                </td>
                                <td class="tg-y698" >সংবর্ধনা অনুষ্ঠান</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdho_s" data-title="Enter"><?php echo $sbdho_s=  (isset( $media_bivag4['sbdho_s']))? $media_bivag4['sbdho_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdho_mup" data-title="Enter"><?php echo $sbdho_mup=  (isset( $media_bivag4['sbdho_mup']))? $media_bivag4['sbdho_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sbdho_s!=0)?$sbdho_mup/$sbdho_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মরত সাংবাদিকদের সাথে বৈঠক</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ksbdkdsb_s" data-title="Enter"><?php echo $ksbdkdsb_s=  (isset( $media_bivag4['ksbdkdsb_s']))? $media_bivag4['ksbdkdsb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ksbdkdsb_mup" data-title="Enter"><?php echo $ksbdkdsb_mup=  (isset( $media_bivag4['ksbdkdsb_mup']))? $media_bivag4['ksbdkdsb_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($ksbdkdsb_s!=0)?$ksbdkdsb_mup/$ksbdkdsb_s:0,2)?>
                                </td>
                                <td class="tg-y698" > সেটআপ প্রোগ্রাম</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suppg_s" data-title="Enter"><?php echo $suppg_s=  (isset( $media_bivag4['suppg_s']))? $media_bivag4['suppg_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="suppg_mup" data-title="Enter"><?php echo $suppg_mup=  (isset( $media_bivag4['suppg_mup']))? $media_bivag4['suppg_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($suppg_s!=0)?$suppg_mup/$suppg_s:0,2)?>
                                </td>                                

                            </tr>
                            <tr>
                                <td class="tg-y698">সাঙ্গবাদিকতায় আগ্রহীদের নিয়ে বৈঠক</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdkadnb_s" data-title="Enter"><?php echo $sbdkadnb_s=  (isset( $media_bivag4['sbdkadnb_s']))? $media_bivag4['sbdkadnb_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdkadnb_mup" data-title="Enter"><?php echo $sbdkadnb_mup=  (isset( $media_bivag4['sbdkadnb_mup']))? $media_bivag4['sbdkadnb_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sbdkadnb_s!=0)?$sbdkadnb_mup/$sbdkadnb_s:0,2)?>
                                </td>
                                <td class="tg-y698" >শিক্ষাসফর</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkhas_s" data-title="Enter"><?php echo $shkhas_s=  (isset( $media_bivag4['shkhas_s']))? $media_bivag4['shkhas_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkhas_mup" data-title="Enter"><?php echo $shkhas_mup=  (isset( $media_bivag4['shkhas_mup']))? $media_bivag4['shkhas_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($shkhas_s!=0)?$shkhas_mup/$shkhas_s:0,2)?>
                                </td>                                

                            </tr>
                            <tr>
                                <td class="tg-y698">টিভি রিপোটিং ও সাংবাদিকতা কোর্সের ক্লাস</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tvrsbdkkk_s" data-title="Enter"><?php echo $tvrsbdkkk_s=  (isset( $media_bivag4['tvrsbdkkk_s']))? $media_bivag4['tvrsbdkkk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tvrsbdkkk_mup" data-title="Enter"><?php echo $tvrsbdkkk_mup=  (isset( $media_bivag4['tvrsbdkkk_mup']))? $media_bivag4['tvrsbdkkk_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($tvrsbdkkk_s!=0)?$tvrsbdkkk_mup/$tvrsbdkkk_s:0,2)?>
                                </td>
                                <td class="tg-y698" > সাংবাদিক সমাবেশ  </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdks_s" data-title="Enter"><?php echo $sbdks_s=  (isset( $media_bivag4['sbdks_s']))? $media_bivag4['sbdks_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdks_mup" data-title="Enter"><?php echo $sbdks_mup=  (isset( $media_bivag4['sbdks_mup']))? $media_bivag4['sbdks_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($sbdks_s!=0)?$sbdks_mup/$sbdks_s:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">ক্যামেরা অপারেশন কোর্সের ক্লাস</td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kapkk_s" data-title="Enter"><?php echo $kapkk_s=  (isset( $media_bivag4['kapkk_s']))? $media_bivag4['kapkk_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kapkk_mup" data-title="Enter"><?php echo $kapkk_mup=  (isset( $media_bivag4['kapkk_mup']))? $media_bivag4['kapkk_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($kapkk_s!=0)?$kapkk_mup/$kapkk_s:0,2)?>
                                </td>
                                <td class="tg-y698" > ইফতার </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="eptar_s" data-title="Enter"><?php echo $eptar_s=  (isset( $media_bivag4['eptar_s']))? $media_bivag4['eptar_s']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="media_bivag4" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="eptar_mup" data-title="Enter"><?php echo $eptar_mup=  (isset( $media_bivag4['eptar_mup']))? $media_bivag4['eptar_mup']:'' ?></a>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format(($eptar_mup!=0)?$eptar_mup/$eptar_s:0,2)?>
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
