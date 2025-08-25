<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'নিয়মিত প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/niyomito-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/niyomito-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                        <td class="tg-pwj7" >ধরন </td>
                                        <td class="tg-pwj7" >সংখ্যা   </td>
                                        <td class="tg-pwj7" >উপস্থিত </td>
                                        <td class="tg-pwj7" >কর</td>
                                
                                </tr>
                         
                                <?php $pk = (isset($niomito_program['id']))?$niomito_program['id']:'';?>

                                <tr>
                                    <td class="tg-y698 type_1"> সাপ্তাহিক ক্লাস 	</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkk_s" data-title="Enter"><?php echo $shkk_s=  (isset( $niomito_program['shkk_s']))?$niomito_program['shkk_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shkk_up" data-title="Enter"><?php echo $shkk_up=  (isset( $niomito_program['shkk_up']))?$niomito_program['shkk_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($shkk_up!=0)?$shkk_s/$shkk_s:0,2)?>
                                    </td>
                                    
                                    
                                </tr>


                                <tr>
                                    <td class="tg-y698">দারসুল কুরআন </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_s" data-title="Enter"><?php echo $dsk_s=  (isset( $niomito_program['dsk_s']))?$niomito_program['dsk_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dsk_up" data-title="Enter"><?php echo $dsk_up=  (isset( $niomito_program['dsk_up']))?$niomito_program['dsk_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($dsk_up!=0)?$dsk_s/$dsk_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">উন্মুক্ত ক্লাস  </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="umk_s" data-title="Enter"><?php echo $umk_s=  (isset( $niomito_program['umk_s']))?$niomito_program['umk_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="umk_up" data-title="Enter"><?php echo $umk_up=  (isset( $niomito_program['umk_up']))?$niomito_program['umk_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($umk_up!=0)?$umk_s/$umk_s:0,2)?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-y698">মতবিনিময় সভা  </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ms_s" data-title="Enter"><?php echo $ms_s=  (isset( $niomito_program['ms_s']))?$niomito_program['ms_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ms_up" data-title="Enter"><?php echo $ms_up=  (isset( $niomito_program['ms_up']))?$niomito_program['ms_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($ms_up!=0)?$ms_s/$ms_s:0,2)?>
                                    </td>
                                
                                </tr>
                                    <tr>
                                    <td class="tg-y698">দায়িত্বশীল বৈঠক  </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dshb_s" data-title="Enter"><?php echo $dshb_s=  (isset( $niomito_program['dshb_s']))?$niomito_program['dshb_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dshb_up" data-title="Enter"><?php echo $dshb_up=  (isset( $niomito_program['dshb_up']))?$niomito_program['dshb_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($dshb_up!=0)?$dshb_s/$dshb_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">ইনডোর সেমিনার  </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="eds_s" data-title="Enter"><?php echo $eds_s=  (isset( $niomito_program['eds_s']))?$niomito_program['eds_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="eds_up" data-title="Enter"><?php echo $eds_up=  (isset( $niomito_program['eds_up']))?$niomito_program['eds_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($eds_up!=0)?$eds_s/$eds_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698"> ব্যবহারিক ক্লাস </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brk_s" data-title="Enter"><?php echo $brk_s=  (isset( $niomito_program['brk_s']))?$niomito_program['brk_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="brk_up" data-title="Enter"><?php echo $brk_up=  (isset( $niomito_program['brk_up']))?$niomito_program['brk_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($brk_up!=0)?$brk_s/$brk_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698"> ভিজুয়াল ক্লাস </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vk_s" data-title="Enter"><?php echo $vk_s=  (isset( $niomito_program['vk_s']))?$niomito_program['vk_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="vk_up" data-title="Enter"><?php echo $vk_up=  (isset( $niomito_program['vk_up']))?$niomito_program['vk_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($vk_up!=0)?$vk_s/$vk_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">মিলন মেলা </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mm_s" data-title="Enter"><?php echo $mm_s=  (isset( $niomito_program['mm_s']))?$niomito_program['mm_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mm_up" data-title="Enter"><?php echo $mm_up=  (isset( $niomito_program['mm_up']))?$niomito_program['mm_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($mm_up!=0)?$mm_s/$mm_s:0,2)?>
                                    </td>
                                
                                </tr>
                                    <tr>
                                    <td class="tg-y698">সংবাদ বিশ্লেষণ </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sb_s" data-title="Enter"><?php echo $sb_s=  (isset( $niomito_program['sb_s']))?$niomito_program['sb_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sb_up" data-title="Enter"><?php echo $sb_up=  (isset( $niomito_program['sb_up']))?$niomito_program['sb_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($sb_up!=0)?$sb_s/$sb_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">পুরস্কার বিতরণী অনুষ্ঠান </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pukbo_s" data-title="Enter"><?php echo $pukbo_s=  (isset( $niomito_program['pukbo_s']))?$niomito_program['pukbo_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="pukbo_up" data-title="Enter"><?php echo $pukbo_up=  (isset( $niomito_program['pukbo_up']))?$niomito_program['pukbo_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($pukbo_up!=0)?$pukbo_s/$pukbo_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">নবীন বরণ </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nb_s" data-title="Enter"><?php echo $nb_s=  (isset( $niomito_program['nb_s']))?$niomito_program['nb_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nb_up" data-title="Enter"><?php echo $nb_up=  (isset( $niomito_program['nb_up']))?$niomito_program['nb_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($nb_up!=0)?$nb_s/$nb_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">ইফতার  </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="et_s" data-title="Enter"><?php echo $et_s=  (isset( $niomito_program['et_s']))?$niomito_program['et_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="et_up" data-title="Enter"><?php echo $et_up=  (isset( $niomito_program['et_up']))?$niomito_program['et_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($et_up!=0)?$et_s/$et_s:0,2)?>
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="tg-y698">মূল্যায়ন পরীক্ষা </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mp_s" data-title="Enter"><?php echo $mp_s=  (isset( $niomito_program['mp_s']))?$niomito_program['mp_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mp_up" data-title="Enter"><?php echo $mp_up=  (isset( $niomito_program['mp_up']))?$niomito_program['mp_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($mp_up!=0)?$mp_s/$mp_s:0,2)?>
                                    </td>
                                
                                </tr>

                                    <td class="tg-y698"> অন্যান্য </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoannop_s" data-title="Enter"><?php echo $onnoannop_s=  (isset( $niomito_program['onnoannop_s']))?$niomito_program['onnoannop_s']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="niomito_program" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="onnoannop_up" data-title="Enter"><?php echo $onnoannop_up=  (isset( $niomito_program['onnoannop_up']))?$niomito_program['onnoannop_up']:'' ?></a>
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo number_format(($onnoannop_up!=0)?$onnoannop_s/$onnoannop_s:0,2)?>
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
