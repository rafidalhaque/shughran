<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'পরিবেশনা' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/culture-poribeshona') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-poribeshona/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                            <td class="tg-pwj7" rowspan="2"> বিবরণ  </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>

                       <td class="tg-pwj7" rowspan="2"> বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>

                       <td class="tg-pwj7" rowspan="2"> বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
            
                 

                   </tr>
                   <tr>
                 
                   </tr>


                   <?php $pk = (isset($poribeshona['id']))?$poribeshona['id']:'';?>
                   

                   <tr>
                       <td class="tg-y698 type_1">  সঙ্গীতানুষ্ঠান 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sta_s" data-title="Enter"><?php echo $sta_s=  (isset( $poribeshona['sta_s']))?$poribeshona['sta_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sta_up" data-title="Enter"><?php echo $sta_up=  (isset( $poribeshona['sta_up']))?$poribeshona['sta_up']:'' ?></a>
                       </td>
                    
             
                       <td class="tg-y698"> ভ্রাম্যমাণ পরিবেশনা</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sota_s" data-title="Enter"><?php echo $sota_s=  (isset( $poribeshona['sota_s']))?$poribeshona['sota_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sota_up" data-title="Enter"><?php echo $sota_up=  (isset( $poribeshona['sota_up']))?$poribeshona['sota_up']:'' ?></a>
                       </td>
                     
                   
                   
                       <td class="tg-y698">সাংস্কৃতিক উৎসব  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ata_s" data-title="Enter"><?php echo $ata_s=  (isset( $poribeshona['ata_s']))?$poribeshona['ata_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ata_up" data-title="Enter"><?php echo $ata_up=  (isset( $poribeshona['ata_up']))?$poribeshona['ata_up']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">সঙ্গীতানুষ্ঠান </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nm_s" data-title="Enter"><?php echo $nm_s=  (isset( $poribeshona['nm_s']))?$poribeshona['nm_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nm_up" data-title="Enter"><?php echo $nm_up=  (isset( $poribeshona['nm_up']))?$poribeshona['nm_up']:'' ?></a>
                       </td>
                     
                   
                  
                       <td class="tg-y698">সাংস্কৃতিক আড্ডা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tva_s" data-title="Enter"><?php echo $tva_s=  (isset( $poribeshona['tva_s']))?$poribeshona['tva_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="tva_up" data-title="Enter"><?php echo $tva_up=  (isset( $poribeshona['tva_up']))?$poribeshona['tva_up']:'' ?></a>
                       </td>
                     
              
                   
                   
                       <td class="tg-y698">নাট্য উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kpa_s" data-title="Enter"><?php echo $kpa_s=  (isset( $poribeshona['kpa_s']))?$poribeshona['kpa_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kpa_up" data-title="Enter"><?php echo $kpa_up=  (isset( $poribeshona['kpa_up']))?$poribeshona['kpa_up']:'' ?></a>
                       </td>
                     
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> আবৃত্তি অনুষ্ঠান  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vmp_s" data-title="Enter"><?php echo $vmp_s=  (isset( $poribeshona['vmp_s']))?$poribeshona['vmp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vmp_up" data-title="Enter"><?php echo $vmp_up=  (isset( $poribeshona['vmp_up']))?$poribeshona['vmp_up']:'' ?></a>
                       </td>
                     
              
                   
                  
                       <td class="tg-y698"> পথনাট্য </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sta1_s" data-title="Enter"><?php echo $sta1_s=  (isset( $poribeshona['sta1_s']))?$poribeshona['sta1_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sta1_up" data-title="Enter"><?php echo $sta1_up=  (isset( $poribeshona['sta1_up']))?$poribeshona['sta1_up']:'' ?></a>
                       </td>
                   
                   
                   
                       <td class="tg-y698">প্রকাশনা উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pn_s" data-title="Enter"><?php echo $pn_s=  (isset( $poribeshona['pn_s']))?$poribeshona['pn_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pn_up" data-title="Enter"><?php echo $pn_up=  (isset( $poribeshona['pn_up']))?$poribeshona['pn_up']:'' ?></a>
                       </td>
                      
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">নাটক মঞ্চায়ন   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_s" data-title="Enter"><?php echo $mv_s=  (isset( $poribeshona['mv_s']))?$poribeshona['mv_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mv_up" data-title="Enter"><?php echo $mv_up=  (isset( $poribeshona['mv_up']))?$poribeshona['mv_up']:'' ?></a>
                       </td>
                      
                   
                       
                       <td class="tg-y698"> মুকাভিনয়</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ak_s" data-title="Enter"><?php echo $ak_s=  (isset( $poribeshona['ak_s']))?$poribeshona['ak_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ak_up" data-title="Enter"><?php echo $ak_up=  (isset( $poribeshona['ak_up']))?$poribeshona['ak_up']:'' ?></a>
                       </td>
                   
                   
                   
                       <td class="tg-y698">  সাংস্কৃতিক প্রতিযোগিতা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="psh_s" data-title="Enter"><?php echo $psh_s=  (isset( $poribeshona['psh_s']))?$poribeshona['psh_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="psh_up" data-title="Enter"><?php echo $psh_up=  (isset( $poribeshona['psh_up']))?$poribeshona['psh_up']:'' ?></a>
                       </td>
                   
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">টিভি অনুষ্ঠান  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ga_s" data-title="Enter"><?php echo $ga_s=  (isset( $poribeshona['ga_s']))?$poribeshona['ga_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ga_up" data-title="Enter"><?php echo $ga_up=  (isset( $poribeshona['ga_up']))?$poribeshona['ga_up']:'' ?></a>
                       </td>
                
                   
                  
                       <td class="tg-y698">একাঙ্কিকা </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stu_s" data-title="Enter"><?php echo $stu_s=  (isset( $poribeshona['stu_s']))?$poribeshona['stu_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stu_up" data-title="Enter"><?php echo $stu_up=  (isset( $poribeshona['stu_up']))?$poribeshona['stu_up']:'' ?></a>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698"> চিত্রাঙ্কন প্রতিযোগিতা   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nu_s" data-title="Enter"><?php echo $nu_s=  (isset( $poribeshona['nu_s']))?$poribeshona['nu_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nu_up" data-title="Enter"><?php echo $nu_up=  (isset( $poribeshona['nu_up']))?$poribeshona['nu_up']:'' ?></a>
                       </td>
                    
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> কবিতা পাঠের আসর   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pshu_s" data-title="Enter"><?php echo $pshu_s=  (isset( $poribeshona['pshu_s']))?$poribeshona['pshu_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pshu_up" data-title="Enter"><?php echo $pshu_up=  (isset( $poribeshona['pshu_up']))?$poribeshona['pshu_up']:'' ?></a>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698">প্রদর্শনী  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_s" data-title="Enter"><?php echo $stp_s=  (isset( $poribeshona['stp_s']))?$poribeshona['stp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="stp_up" data-title="Enter"><?php echo $stp_up=  (isset( $poribeshona['stp_up']))?$poribeshona['stp_up']:'' ?></a>
                       </td>
                
                   
                  
                       <td class="tg-y698">উন্মুক্ত সাংস্কৃতিক অনুুষ্ঠান </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ckp_s" data-title="Enter"><?php echo $ckp_s=  (isset( $poribeshona['ckp_s']))?$poribeshona['ckp_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ckp_up" data-title="Enter"><?php echo $ckp_up=  (isset( $poribeshona['ckp_up']))?$poribeshona['ckp_up']:'' ?></a>
                       </td>
                    
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> পুঁথি পাঠের আসর   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="umsta_s" data-title="Enter"><?php echo $umsta_s=  (isset( $poribeshona['umsta_s']))?$poribeshona['umsta_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="umsta_up" data-title="Enter"><?php echo $umsta_up=  (isset( $poribeshona['umsta_up']))?$poribeshona['umsta_up']:'' ?></a>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698">গীতি আলেখ্য  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_s" data-title="Enter"><?php echo $onnoanno_s=  (isset( $poribeshona['onnoanno_s']))?$poribeshona['onnoanno_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_up" data-title="Enter"><?php echo $onnoanno_up=  (isset( $poribeshona['onnoanno_up']))?$poribeshona['onnoanno_up']:'' ?></a>
                       </td>

                       <td class="tg-y698">অন্যান্য  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_s" data-title="Enter"><?php echo $onnoanno_s=  (isset( $poribeshona['onnoanno_s']))?$poribeshona['onnoanno_s']:'' ?></a>
                       </td>
                       <td class="tg-0pky  type_2">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="poribeshona" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoanno_up" data-title="Enter"><?php echo $onnoanno_up=  (isset( $poribeshona['onnoanno_up']))?$poribeshona['onnoanno_up']:'' ?></a>
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
