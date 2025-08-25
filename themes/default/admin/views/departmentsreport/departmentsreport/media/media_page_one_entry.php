<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                                <td class="tg-pwj7" colspan='4'><b>কমিটি</b></td>
                               
                            </tr>
                            <tr>
                          
                            <td class="tg-pwj7" colspan=''>শাখায় সাংবাদিক ফোরাম আছে কিনা?</td>
                            <td class="tg-pwj7" colspan=''>  সাংবাদিক ফোরাম কোন মানের? </td>
                            </tr>
                            <?php
                                $pk = (isset($media['id']))?$media['id']:'';
                            ?>
                            <tr>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  id="shang_forum_yes_no" data-idname=""   data-type="select" 
                                    data-table="media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                    data-name="shang_forum_yes_no@media" 
                                    data-title="শাখায় সাংবাদিক ফোরাম আছে কিনা?">
                                </a>
                            </td>        
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  id="shang_forum_man" data-idname=""   data-type="select" 
                                    data-table="media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                    data-name="shang_forum_man@media" 
                                    data-title="সাংবাদিক ফোরাম কোন মানের?">
                                </a>
                            </td>        
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='12'><b>জনশক্তি</b></td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >পূর্বের সংখ্যা  </td>
                                <td class="tg-pwj7" >বর্তমান সংখ্যা</td>
                                <td class="tg-pwj7" >মোট বৃদ্ধি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >আগমন </td>
                                <td class="tg-pwj7" >মোট ঘাটতি </td>
                                <td class="tg-pwj7" >মানোন্নয়ন </td>
                                <td class="tg-pwj7" >স্থানান্তর</td>
                                <td class="tg-pwj7" >উচ্চশিক্ষা</td>
                                <td class="tg-pwj7" >ছাত্রত্ব শেষ</td>
                                <td class="tg-pwj7" >সাংবাদিক</td>
                            </tr>

                            <?php
                                $pk = (isset($media_manpower['id']))?$media_manpower['id']:'';
                            ?>

                            <tr>                  
                                
                                <td class="tg-y698 type_1"> এডমিন	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_prev" 
                                        data-title="Enter"><?php echo $admin_prev=(isset( $media_manpower['admin_prev']))? $media_manpower['admin_prev']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_pres" 
                                        data-title="Enter"><?php echo $admin_pres=(isset( $media_manpower['admin_pres']))? $media_manpower['admin_pres']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_mot" 
                                        data-title="Enter"><?php echo $admin_mot=(isset( $media_manpower['admin_mot']))? $media_manpower['admin_mot']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_man_unnoyon" 
                                        data-title="Enter"><?php echo $admin_man_unnoyon=(isset( $media_manpower['admin_man_unnoyon']))? $media_manpower['admin_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_man_agomon" 
                                        data-title="Enter"><?php echo $admin_man_agomon=(isset( $media_manpower['admin_man_agomon']))? $media_manpower['admin_man_agomon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_total_gha" 
                                        data-title="Enter"><?php echo $admin_total_gha=(isset( $media_manpower['admin_total_gha']))? $media_manpower['admin_total_gha']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_gha_man_unnoyon" 
                                        data-title="Enter"><?php echo $admin_gha_man_unnoyon=(isset( $media_manpower['admin_gha_man_unnoyon']))? $media_manpower['admin_gha_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_gha_sthanantor" 
                                        data-title="Enter"><?php echo $admin_gha_sthanantor=(isset( $media_manpower['admin_gha_sthanantor']))? $media_manpower['admin_gha_sthanantor']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_gha_high_study" 
                                        data-title="Enter"><?php echo $admin_gha_high_study=(isset( $media_manpower['admin_gha_high_study']))? $media_manpower['admin_gha_high_study']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_gha_study_finish" 
                                        data-title="Enter"><?php echo $admin_gha_study_finish=(isset( $media_manpower['admin_gha_study_finish']))? $media_manpower['admin_gha_study_finish']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_gha_shangbadik" 
                                        data-title="Enter"><?php echo $admin_gha_shangbadik=(isset( $media_manpower['admin_gha_shangbadik']))? $media_manpower['admin_gha_shangbadik']:0; ?>
                                    </a>
                                 </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">সাব-এডমিন</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_prev" 
                                        data-title="Enter"><?php echo $sub_admin_prev=(isset( $media_manpower['sub_admin_prev']))? $media_manpower['sub_admin_prev']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_pres" 
                                        data-title="Enter"><?php echo $sub_admin_pres=(isset( $media_manpower['sub_admin_pres']))? $media_manpower['sub_admin_pres']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_mot" 
                                        data-title="Enter"><?php echo $sub_admin_mot=(isset( $media_manpower['sub_admin_mot']))? $media_manpower['sub_admin_mot']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_man_unnoyon" 
                                        data-title="Enter"><?php echo $sub_admin_man_unnoyon=(isset( $media_manpower['sub_admin_man_unnoyon']))? $media_manpower['sub_admin_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_man_agomon" 
                                        data-title="Enter"><?php echo $sub_admin_man_agomon=(isset( $media_manpower['sub_admin_man_agomon']))? $media_manpower['sub_admin_man_agomon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_total_gha" 
                                        data-title="Enter"><?php echo $sub_admin_total_gha=(isset( $media_manpower['sub_admin_total_gha']))? $media_manpower['sub_admin_total_gha']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_gha_man_unnoyon" 
                                        data-title="Enter"><?php echo $sub_admin_gha_man_unnoyon=(isset( $media_manpower['sub_admin_gha_man_unnoyon']))? $media_manpower['sub_admin_gha_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_gha_sthanantor" 
                                        data-title="Enter"><?php echo $sub_admin_gha_sthanantor=(isset( $media_manpower['sub_admin_gha_sthanantor']))? $media_manpower['sub_admin_gha_sthanantor']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_gha_high_study" 
                                        data-title="Enter"><?php echo $sub_admin_gha_high_study=(isset( $media_manpower['sub_admin_gha_high_study']))? $media_manpower['sub_admin_gha_high_study']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_gha_study_finish" 
                                        data-title="Enter"><?php echo $sub_admin_gha_study_finish=(isset( $media_manpower['sub_admin_gha_study_finish']))? $media_manpower['sub_admin_gha_study_finish']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sub_admin_gha_shangbadik" 
                                        data-title="Enter"><?php echo $sub_admin_gha_shangbadik=(isset( $media_manpower['sub_admin_gha_shangbadik']))? $media_manpower['sub_admin_gha_shangbadik']:0; ?>
                                    </a>
                                 </td>

                            </tr>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"> প্রোগ্রামার	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_prev" 
                                        data-title="Enter"><?php echo $programmer_prev=(isset( $media_manpower['programmer_prev']))? $media_manpower['programmer_prev']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_pres" 
                                        data-title="Enter"><?php echo $programmer_pres=(isset( $media_manpower['programmer_pres']))? $media_manpower['programmer_pres']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_mot" 
                                        data-title="Enter"><?php echo $programmer_mot=(isset( $media_manpower['programmer_mot']))? $media_manpower['programmer_mot']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_man_unnoyon" 
                                        data-title="Enter"><?php echo $programmer_man_unnoyon=(isset( $media_manpower['programmer_man_unnoyon']))? $media_manpower['programmer_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_man_agomon" 
                                        data-title="Enter"><?php echo $programmer_man_agomon=(isset( $media_manpower['programmer_man_agomon']))? $media_manpower['programmer_man_agomon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_total_gha" 
                                        data-title="Enter"><?php echo $programmer_total_gha=(isset( $media_manpower['programmer_total_gha']))? $media_manpower['programmer_total_gha']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_gha_man_unnoyon" 
                                        data-title="Enter"><?php echo $programmer_gha_man_unnoyon=(isset( $media_manpower['programmer_gha_man_unnoyon']))? $media_manpower['programmer_gha_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_gha_sthanantor" 
                                        data-title="Enter"><?php echo $programmer_gha_sthanantor=(isset( $media_manpower['programmer_gha_sthanantor']))? $media_manpower['programmer_gha_sthanantor']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_gha_high_study" 
                                        data-title="Enter"><?php echo $programmer_gha_high_study=(isset( $media_manpower['programmer_gha_high_study']))? $media_manpower['programmer_gha_high_study']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_gha_study_finish" 
                                        data-title="Enter"><?php echo $programmer_gha_study_finish=(isset( $media_manpower['programmer_gha_study_finish']))? $media_manpower['programmer_gha_study_finish']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="programmer_gha_shangbadik" 
                                        data-title="Enter"><?php echo $programmer_gha_shangbadik=(isset( $media_manpower['programmer_gha_shangbadik']))? $media_manpower['programmer_gha_shangbadik']:0; ?>
                                    </a>
                                 </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষানবিশ</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_prev" 
                                        data-title="Enter"><?php echo $shikkhanbish_prev=(isset( $media_manpower['shikkhanbish_prev']))? $media_manpower['shikkhanbish_prev']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_pres" 
                                        data-title="Enter"><?php echo $shikkhanbish_pres=(isset( $media_manpower['shikkhanbish_pres']))? $media_manpower['shikkhanbish_pres']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_mot" 
                                        data-title="Enter"><?php echo $shikkhanbish_mot=(isset( $media_manpower['shikkhanbish_mot']))? $media_manpower['shikkhanbish_mot']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_man_unnoyon" 
                                        data-title="Enter"><?php echo $shikkhanbish_man_unnoyon=(isset( $media_manpower['shikkhanbish_man_unnoyon']))? $media_manpower['shikkhanbish_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_man_agomon" 
                                        data-title="Enter"><?php echo $shikkhanbish_man_agomon=(isset( $media_manpower['shikkhanbish_man_agomon']))? $media_manpower['shikkhanbish_man_agomon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_total_gha" 
                                        data-title="Enter"><?php echo $shikkhanbish_total_gha=(isset( $media_manpower['shikkhanbish_total_gha']))? $media_manpower['shikkhanbish_total_gha']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_gha_man_unnoyon" 
                                        data-title="Enter"><?php echo $shikkhanbish_gha_man_unnoyon=(isset( $media_manpower['shikkhanbish_gha_man_unnoyon']))? $media_manpower['shikkhanbish_gha_man_unnoyon']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_gha_sthanantor" 
                                        data-title="Enter"><?php echo $shikkhanbish_gha_sthanantor=(isset( $media_manpower['shikkhanbish_gha_sthanantor']))? $media_manpower['shikkhanbish_gha_sthanantor']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_gha_high_study" 
                                        data-title="Enter"><?php echo $shikkhanbish_gha_high_study=(isset( $media_manpower['shikkhanbish_gha_high_study']))? $media_manpower['shikkhanbish_gha_high_study']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_gha_study_finish" 
                                        data-title="Enter"><?php echo $shikkhanbish_gha_study_finish=(isset( $media_manpower['shikkhanbish_gha_study_finish']))? $media_manpower['shikkhanbish_gha_study_finish']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_manpower" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_gha_shangbadik" 
                                        data-title="Enter"><?php echo $shikkhanbish_gha_shangbadik=(isset( $media_manpower['shikkhanbish_gha_shangbadik']))? $media_manpower['shikkhanbish_gha_shangbadik']:0; ?>
                                    </a>
                                 </td>


                            </tr>
                            <tr>
                            
                                <td class="tg-y698" >মোট</td>    
                                <td class="tg-0pky" >
								  <?php echo ($admin_prev+$sub_admin_prev+$programmer_prev+$shikkhanbish_prev) ?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_pres+$sub_admin_pres+$programmer_pres+$shikkhanbish_pres)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_mot+$sub_admin_mot+$programmer_mot+$shikkhanbish_mot)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_man_unnoyon+$sub_admin_man_unnoyon+$programmer_man_unnoyon+$shikkhanbish_man_unnoyon)?>
								</td>
                                <td class="tg-0pky" >
								   <?php echo ($admin_man_agomon+$sub_admin_man_agomon+$programmer_man_agomon+$shikkhanbish_man_agomon)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_total_gha+$sub_admin_total_gha+$programmer_total_gha+$shikkhanbish_total_gha)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_man_unnoyon+$sub_admin_gha_man_unnoyon+$programmer_gha_man_unnoyon+$shikkhanbish_gha_man_unnoyon)?>
								</td>
                                <td class="tg-0pky" >
								  <?php echo ($admin_gha_sthanantor+$sub_admin_gha_sthanantor+$programmer_gha_sthanantor+$shikkhanbish_gha_sthanantor)?>
								</td>
                                <td class="tg-0pky" >
								<?php echo ($admin_gha_high_study+$sub_admin_gha_high_study+$programmer_gha_high_study+$shikkhanbish_gha_high_study)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_study_finish+$sub_admin_gha_study_finish+$programmer_gha_study_finish+$shikkhanbish_gha_study_finish)?>
								</td>
                                <td class="tg-0pky" >
								 <?php echo ($admin_gha_shangbadik+$sub_admin_gha_shangbadik+$programmer_gha_shangbadik+$shikkhanbish_gha_shangbadik)?>
								</td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='6'><b>যোগাযোগ</b></td>
                               
                            </tr>
                            <tr>                              
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" > কতজন </td>
                                <td class="tg-pwj7" >কতবার</td>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" > কতজন </td>
                                <td class="tg-pwj7" >কতবার</td>
                            </tr>

                            <?php
                                $pk = (isset($media_contact['id']))?$media_contact['id']:'';
                            ?>

                            <tr>                          
                                                            
                                <td class="tg-y698 type_1"> সাংবাদিক	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shangbadik_num" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['shangbadik_num']))? $media_contact['shangbadik_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shangbadik_bar" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['shangbadik_bar']))? $media_contact['shangbadik_bar']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-y698" > মালিক </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="malik_num" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['malik_num']))? $media_contact['malik_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="malik_bar" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['malik_bar']))? $media_contact['malik_bar']:0; ?>
                                    </a>
                                 </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">বন্ধু</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bondhu_num" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['bondhu_num']))? $media_contact['bondhu_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bondhu_bar" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['bondhu_bar']))? $media_contact['bondhu_bar']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-y698" > সম্পাদক</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shompadok_num" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['shompadok_num']))? $media_contact['shompadok_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shompadok_bar" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['shompadok_bar']))? $media_contact['shompadok_bar']:0; ?>
                                    </a>
                                 </td>                            

                            </tr>
                            
                            <tr>
                                <td class="tg-y698">ছাত্র</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="student_num" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['student_num']))? $media_contact['student_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="student_bar" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['student_bar']))? $media_contact['student_bar']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-y698" >কলামিস্ট </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="collamist_num" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['collamist_num']))? $media_contact['collamist_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="collamist_bar" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $media_contact['collamist_bar']))? $media_contact['collamist_bar']:0; ?>
                                    </a>
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
    }   .action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>

$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.fn.editable.defaults.ajaxOptions = {type: "get"}
$('#shang_forum_yes_no').editable({
    value: <?php echo (isset( $media['shang_forum_yes_no']))? $media['shang_forum_yes_no']:3; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 3, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    },
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
});

$('#shang_forum_man').editable({
    value: <?php echo (isset( $media['shang_forum_man']))? $media['shang_forum_man']:3; ?>,    
    source: [
          {value: 1, text: 'থানা'},
          {value: 0, text: 'শাখার বিভাগ'},
          {value: 3, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

$('#human_rights_committee').editable({
    value: <?php echo (isset( $human_rights_branch_info['human_rights_committee']))? $human_rights_branch_info['human_rights_committee']:2; ?>,    
    source: [
          {value: 1, text: 'হ্যাঁ'},
          {value: 0, text: 'না'},
          {value: 2, text: 'Enter'},
          
       ],
       success: function(response, newValue) {
            response=JSON.parse(response); //update backbone model
        if(response.flag == 3)
        {
            location.reload();
        }
    }
});

});

</script>
<script>

$(document).ready(function(){	
  $("button").on('click',function(){
      console.log("ok");
    var id=$(this).attr('id').split("@");
    var close_tr=$(this).closest('tr');
    if(id[0]=='delete' && confirm("আপনি কি কলামটি মুছে ফেলবেন?" ))
    {
        $.ajax({
        type: "GET",
        token: "<?php echo $this->security->get_csrf_token_name(); ?>",
        url:  "<?php echo admin_url('departmentsreport/delete-row') ?>",
        data: {
            'id':id[3],
            'table':id[1]
        },
        cache: false,
        success: function(data){
            console.log(data);
           close_tr.remove();
        }
        });
    }
    
  });
});

</script>
