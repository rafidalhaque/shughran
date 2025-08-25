<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - (সাংবাদিক বৃদ্ধি রিপোর্ট) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/media-hrd') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-hrd/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan='9'><b>আন্তর্জাতিক গণমাধ্যম </b></td>
                               
                        </tr>
                         <tr>
                             <td class="tg-pwj7" rowspan="2" >ক্রম </td>
                             <td class="tg-pwj7" rowspan="2" >পদের নাম </td>
                             <td class="tg-pwj7" rowspan="2" > ইলেকট্রনিক কতজন</td>
                             <td class="tg-pwj7" rowspan="2"  >  প্রিন্ট কতজন</td>
                             <td class="tg-pwj7" rowspan="2" > অনলাইন কতজন</td>
                             <td class="tg-pwj7" colspan='4'> ক্যাটাগরি </td>
                            
                             
                         </tr>
                         <tr>
                           
                           <td class="tg-pwj7" > A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                           
                       </tr>

                       <?php
                                $pk = (isset($media_int_media['id']))?$media_int_media['id']:'';
                            ?>

                         <tr>
                            <td class="tg-0pky" >
                            ১
                             </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_elect" 
                                    data-title="Enter"><?php echo $reporter_elect=(isset( $media_int_media['reporter_elect']))? $media_int_media['reporter_elect']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_print" 
                                    data-title="Enter"><?php echo $reporter_print=(isset( $media_int_media['reporter_print']))? $media_int_media['reporter_print']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_online" 
                                    data-title="Enter"><?php echo $reporter_online=(isset( $media_int_media['reporter_online']))? $media_int_media['reporter_online']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_a" 
                                    data-title="Enter"><?php echo $reporter_a=(isset( $media_int_media['reporter_a']))? $media_int_media['reporter_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_b" 
                                    data-title="Enter"><?php echo $reporter_b=(isset( $media_int_media['reporter_b']))? $media_int_media['reporter_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_c" 
                                    data-title="Enter"><?php echo $reporter_c=(isset( $media_int_media['reporter_c']))? $media_int_media['reporter_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_rep= (  $reporter_a +  $reporter_b+  $reporter_c)?>
                             </td>

                         </tr>
                         <tr>
                            <td class="tg-0pky" >
                            ২
                             </td>
                            <td class="tg-0pky" >
                            প্রতিনিধি
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_elect" 
                                    data-title="Enter"><?php echo $protinidhi_elect=(isset( $media_int_media['protinidhi_elect']))? $media_int_media['protinidhi_elect']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_print" 
                                    data-title="Enter"><?php echo $protinidhi_print=(isset( $media_int_media['protinidhi_print']))? $media_int_media['protinidhi_print']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_online" 
                                    data-title="Enter"><?php echo $protinidhi_online=(isset( $media_int_media['protinidhi_online']))? $media_int_media['protinidhi_online']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_a" 
                                    data-title="Enter"><?php echo $protinidhi_a=(isset( $media_int_media['protinidhi_a']))? $media_int_media['protinidhi_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_b" 
                                    data-title="Enter"><?php echo $protinidhi_b=(isset( $media_int_media['protinidhi_b']))? $media_int_media['protinidhi_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_int_media" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_c" 
                                    data-title="Enter"><?php echo $protinidhi_c=(isset( $media_int_media['protinidhi_c']))? $media_int_media['protinidhi_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_pro=(  $protinidhi_a +  $protinidhi_b+  $protinidhi_c)?>
                             </td>

                         </tr>
                         <tr>
                           
                            <td class="tg-0pky" colspan='2'>
                            মোট
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_elect + $reporter_elect ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_print  + $reporter_print?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_online + $reporter_online ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_a + $reporter_a ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_b + $reporter_b ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_c + $reporter_c ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo ($total_rep+$total_pro)?>
                             </td>

                         </tr>
                </table>
                <table class="tg table table-header-rotated" id="testTable2">
                <tr>
                           
                           <td class="tg-pwj7" colspan="10" ><b> জাতীয় গণমাধ্যম </b></td>
                           
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" rowspan="8" >ইলেকট্রনিক </td>
                           <td class="tg-pwj7" rowspan="2" >ক্রম </td>
                           <td class="tg-pwj7" rowspan="2" >পদের নাম </td>
                           <td class="tg-pwj7" rowspan="2" > কতজন</td>
                           <td class="tg-pwj7" rowspan="2"  >  রেডিও (আফআম) কতজন</td>
                           
                           <td class="tg-pwj7" colspan='5'> ক্যাটাগরি </td>
                         
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" colspan='2'> A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                       </tr>
                       <?php
                                $pk = (isset($media_nation_media_electronic['id']))?$media_nation_media_electronic['id']:'';
                            ?>
                       <tr>
                            <td class="tg-0pky" >
                            ১
                             </td>
                            <td class="tg-0pky" >
                            উপস্থাপক
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uposthapok_jon" 
                                    data-title="Enter"><?php echo $uposthapok_jon=(isset( $media_nation_media_electronic['uposthapok_jon']))? $media_nation_media_electronic['uposthapok_jon']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uposthapok_radio" 
                                    data-title="Enter"><?php echo $uposthapok_radio=(isset( $media_nation_media_electronic['uposthapok_radio']))? $media_nation_media_electronic['uposthapok_radio']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5" colspan='2'> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uposthapok_a" 
                                    data-title="Enter"><?php echo $uposthapok_a=(isset( $media_nation_media_electronic['uposthapok_a']))? $media_nation_media_electronic['uposthapok_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uposthapok_b" 
                                    data-title="Enter"><?php echo $uposthapok_b=(isset( $media_nation_media_electronic['uposthapok_b']))? $media_nation_media_electronic['uposthapok_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="uposthapok_c" 
                                    data-title="Enter"><?php echo $uposthapok_c=(isset( $media_nation_media_electronic['uposthapok_c']))? $media_nation_media_electronic['uposthapok_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_uposthapok=( $uposthapok_a+  $uposthapok_b +  $uposthapok_c)?>
                             </td>
                         </tr>
       
                       <tr>
                            <td class="tg-0pky" >
                            ২
                             </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_jon" 
                                    data-title="Enter"><?php echo $reporter_jon=(isset( $media_nation_media_electronic['reporter_jon']))? $media_nation_media_electronic['reporter_jon']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_radio" 
                                    data-title="Enter"><?php echo $reporter_radio=(isset( $media_nation_media_electronic['reporter_radio']))? $media_nation_media_electronic['reporter_radio']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5" colspan='2'> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_a" 
                                    data-title="Enter"><?php echo $reporter_a=(isset( $media_nation_media_electronic['reporter_a']))? $media_nation_media_electronic['reporter_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_b" 
                                    data-title="Enter"><?php echo $reporter_b=(isset( $media_nation_media_electronic['reporter_b']))? $media_nation_media_electronic['reporter_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_c" 
                                    data-title="Enter"><?php echo $reporter_c=(isset( $media_nation_media_electronic['reporter_c']))? $media_nation_media_electronic['reporter_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_reporter=(  $reporter_a+  $reporter_b +  $reporter_c)?>
                             </td>

                         </tr>
                       <tr>
                            <td class="tg-0pky" >
                            ৩
                             </td>
                            <td class="tg-0pky" >
                            ক্যামেরা পারসন
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="camera_jon" 
                                    data-title="Enter"><?php echo $camera_jon=(isset( $media_nation_media_electronic['camera_jon']))? $media_nation_media_electronic['camera_jon']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="camera_radio" 
                                    data-title="Enter"><?php echo $camera_radio=(isset( $media_nation_media_electronic['camera_radio']))? $media_nation_media_electronic['camera_radio']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5" colspan='2'> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="camera_a" 
                                    data-title="Enter"><?php echo $camera_a=(isset( $media_nation_media_electronic['camera_a']))? $media_nation_media_electronic['camera_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="camera_b" 
                                    data-title="Enter"><?php echo $camera_b=(isset( $media_nation_media_electronic['camera_b']))? $media_nation_media_electronic['camera_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="camera_c" 
                                    data-title="Enter"><?php echo $camera_c=(isset( $media_nation_media_electronic['camera_c']))? $media_nation_media_electronic['camera_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_camera=(  $camera_a+  $camera_b +  $camera_c)?>
                             </td>
                         </tr>
                       <tr>
                            <td class="tg-0pky" >
                            ৪
                             </td>
                            <td class="tg-0pky" >
                            ভিডিও এডিটর
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="video_editor_jon" 
                                    data-title="Enter"><?php echo $video_editor_jon=(isset( $media_nation_media_electronic['video_editor_jon']))? $media_nation_media_electronic['video_editor_jon']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="video_editor_radio" 
                                    data-title="Enter"><?php echo $video_editor_radio=(isset( $media_nation_media_electronic['video_editor_radio']))? $media_nation_media_electronic['video_editor_radio']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5" colspan='2'> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="video_editor_a" 
                                    data-title="Enter"><?php echo $video_editor_a=(isset( $media_nation_media_electronic['video_editor_a']))? $media_nation_media_electronic['video_editor_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="video_editor_b" 
                                    data-title="Enter"><?php echo $video_editor_b=(isset( $media_nation_media_electronic['video_editor_b']))? $media_nation_media_electronic['video_editor_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="video_editor_c" 
                                    data-title="Enter"><?php echo $video_editor_c=(isset( $media_nation_media_electronic['video_editor_c']))? $media_nation_media_electronic['video_editor_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_video_editor=(  $video_editor_a+  $video_editor_b +  $video_editor_c)?>
                             </td>

                         </tr>
                         <tr>
                            <td class="tg-0pky" >
                            ৫
                             </td>
                            <td class="tg-0pky" >
                            প্রতিনিধি
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_jon" 
                                    data-title="Enter"><?php echo $protinidhi_jon=(isset( $media_nation_media_electronic['protinidhi_jon']))? $media_nation_media_electronic['protinidhi_jon']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_radio" 
                                    data-title="Enter"><?php echo $protinidhi_radio=(isset( $media_nation_media_electronic['protinidhi_radio']))? $media_nation_media_electronic['protinidhi_radio']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5" colspan='2'> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_a" 
                                    data-title="Enter"><?php echo $protinidhi_a=(isset( $media_nation_media_electronic['protinidhi_a']))? $media_nation_media_electronic['protinidhi_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_b" 
                                    data-title="Enter"><?php echo $protinidhi_b=(isset( $media_nation_media_electronic['protinidhi_b']))? $media_nation_media_electronic['protinidhi_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_electronic" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_c" 
                                    data-title="Enter"><?php echo $protinidhi_c=(isset( $media_nation_media_electronic['protinidhi_c']))? $media_nation_media_electronic['protinidhi_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_protinidhi=(  $protinidhi_a+  $protinidhi_b +  $protinidhi_c)?>
                             </td>

                         </tr>
                         <tr>
                            <td class="tg-0pky" colspan="2">
                            মোট
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($uposthapok_jon +$reporter_jon + $camera_jon +$video_editor_jon + $protinidhi_jon)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($uposthapok_radio +$reporter_radio + $camera_radio +$video_editor_radio + $protinidhi_radio)  ?>
                            </td>
                            <td class="tg-0pky" colspan='2'>
                            <?php echo ($uposthapok_a +$reporter_a + $camera_a +$video_editor_a + $protinidhi_a)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($uposthapok_b +$reporter_b + $camera_b +$video_editor_b + $protinidhi_b)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($uposthapok_c +$reporter_c + $camera_c +$video_editor_c + $protinidhi_c)  ?>
                            </td>
                           
                            <td class="tg-0pky" >
                            <?php echo ($total_uposthapok +$total_reporter + $total_camera +$total_video_editor + $total_protinidhi)  ?>
                            </td>
                        </tr>
                        <tr>
                           
                           <td class="tg-pwj7" rowspan="7" > প্রিন্ট</td>
                           <td class="tg-pwj7" rowspan="2" > ক্রম </td>
                           <td class="tg-pwj7" rowspan="2" > পদের নাম </td>
                           <td class="tg-pwj7" rowspan="2" >পত্রিকায় কতজন</td>
                           <td class="tg-pwj7" rowspan="2"  >সাময়িকী/প্রকাশনায় কতজন</td>
                           <td class="tg-pwj7" rowspan="2" > অন্যান্যকতজন</td>
                           <td class="tg-pwj7" colspan='4'> ক্যাটাগরি </td>
                           
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" > A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                       </tr>
                       <?php
                                $pk = (isset($media_nation_media_print['id']))?$media_nation_media_print['id']:'';
                            ?>
                         <tr>
                         
                             <td class="tg-0pky" >
                             ১
                             </td>
                             <td class="tg-0pky" >
                             রিপোর্টার
                             </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_potrika" 
                                    data-title="Enter"><?php echo $reporter_potrika=(isset( $media_nation_media_print['reporter_potrika']))? $media_nation_media_print['reporter_potrika']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_samoyiki" 
                                    data-title="Enter"><?php echo $reporter_samoyiki=(isset( $media_nation_media_print['reporter_samoyiki']))? $media_nation_media_print['reporter_samoyiki']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_other" 
                                    data-title="Enter"><?php echo $reporter_other=(isset( $media_nation_media_print['reporter_other']))? $media_nation_media_print['reporter_other']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_a" 
                                    data-title="Enter"><?php echo $reporter_a=(isset( $media_nation_media_print['reporter_a']))? $media_nation_media_print['reporter_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_b" 
                                    data-title="Enter"><?php echo $reporter_b=(isset( $media_nation_media_print['reporter_b']))? $media_nation_media_print['reporter_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_c" 
                                    data-title="Enter"><?php echo $reporter_c=(isset( $media_nation_media_print['reporter_c']))? $media_nation_media_print['reporter_c']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky" >
                             <?php echo $total_reporter=(  $reporter_a+  $reporter_b +  $reporter_c)?>
                             </td>

                         </tr>
                         <tr>
                         
                         <td class="tg-0pky" >
                         ২
                         </td>
                         <td class="tg-0pky" >
                         ব্যুরো চীফ
                         </td>
                         <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="b_chief_potrika" 
                                    data-title="Enter"><?php echo $b_chief_potrika=(isset( $media_nation_media_print['b_chief_potrika']))? $media_nation_media_print['b_chief_potrika']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="b_chief_samoyiki" 
                                    data-title="Enter"><?php echo $b_chief_samoyiki=(isset( $media_nation_media_print['b_chief_samoyiki']))? $media_nation_media_print['b_chief_samoyiki']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="b_chief_other" 
                                    data-title="Enter"><?php echo $b_chief_other=(isset( $media_nation_media_print['b_chief_other']))? $media_nation_media_print['b_chief_other']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="b_chief_a" 
                                    data-title="Enter"><?php echo $b_chief_a=(isset( $media_nation_media_print['b_chief_a']))? $media_nation_media_print['b_chief_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="b_chief_b" 
                                    data-title="Enter"><?php echo $b_chief_b=(isset( $media_nation_media_print['b_chief_b']))? $media_nation_media_print['b_chief_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="b_chief_c" 
                                    data-title="Enter"><?php echo $b_chief_c=(isset( $media_nation_media_print['b_chief_c']))? $media_nation_media_print['b_chief_c']:0; ?>
                                </a>
                            </td>
                         <td class="tg-0pky" >
                         <?php echo $total_b_chief=(  $b_chief_a+  $b_chief_b +  $b_chief_c)?>
                         </td>

                     </tr>
                     <tr>
                         
                         <td class="tg-0pky" >
                         ৩
                         </td>
                         <td class="tg-0pky" >
                         সাব-এডিটর
                         </td>
                         <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_potrika" 
                                    data-title="Enter"><?php echo $s_editor_potrika=(isset( $media_nation_media_print['s_editor_potrika']))? $media_nation_media_print['s_editor_potrika']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_samoyiki" 
                                    data-title="Enter"><?php echo $s_editor_samoyiki=(isset( $media_nation_media_print['s_editor_samoyiki']))? $media_nation_media_print['s_editor_samoyiki']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_other" 
                                    data-title="Enter"><?php echo $s_editor_other=(isset( $media_nation_media_print['s_editor_other']))? $media_nation_media_print['s_editor_other']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_a" 
                                    data-title="Enter"><?php echo $s_editor_a=(isset( $media_nation_media_print['s_editor_a']))? $media_nation_media_print['s_editor_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_b" 
                                    data-title="Enter"><?php echo $s_editor_b=(isset( $media_nation_media_print['s_editor_b']))? $media_nation_media_print['s_editor_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_c" 
                                    data-title="Enter"><?php echo $s_editor_c=(isset( $media_nation_media_print['s_editor_c']))? $media_nation_media_print['s_editor_c']:0; ?>
                                </a>
                            </td>
                         <td class="tg-0pky" >
                         <?php echo $total_s_editor=(  $s_editor_a+  $s_editor_b +  $s_editor_c)?>
                         </td>

                     </tr>
                     <tr>
                         
                         <td class="tg-0pky" >
                         ৪
                         </td>
                         <td class="tg-0pky" >
                         প্রতিনিধি
                         </td>
                         <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_potrika" 
                                    data-title="Enter"><?php echo $protinidhi_potrika=(isset( $media_nation_media_print['protinidhi_potrika']))? $media_nation_media_print['protinidhi_potrika']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_samoyiki" 
                                    data-title="Enter"><?php echo $protinidhi_samoyiki=(isset( $media_nation_media_print['protinidhi_samoyiki']))? $media_nation_media_print['protinidhi_samoyiki']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_other" 
                                    data-title="Enter"><?php echo $protinidhi_other=(isset( $media_nation_media_print['protinidhi_other']))? $media_nation_media_print['protinidhi_other']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_a" 
                                    data-title="Enter"><?php echo $protinidhi_a=(isset( $media_nation_media_print['protinidhi_a']))? $media_nation_media_print['protinidhi_a']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_b" 
                                    data-title="Enter"><?php echo $protinidhi_b=(isset( $media_nation_media_print['protinidhi_b']))? $media_nation_media_print['protinidhi_b']:0; ?>
                                </a>
                            </td>
                             <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_print" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_c" 
                                    data-title="Enter"><?php echo $protinidhi_c=(isset( $media_nation_media_print['protinidhi_c']))? $media_nation_media_print['protinidhi_c']:0; ?>
                                </a>
                            </td>
                         <td class="tg-0pky" >
                         <?php echo $total_protinidhi=(  $protinidhi_a+  $protinidhi_b +  $protinidhi_c)?>
                         </td>

                     </tr>
                     <tr>
                            <td class="tg-0pky" colspan="2">
                            মোট
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_potrika +$b_chief_potrika + $s_editor_potrika +$protinidhi_potrika)  ?>
                            </td>
                
                            <td class="tg-0pky" >
                            <?php echo ($reporter_samoyiki +$b_chief_samoyiki + $s_editor_samoyiki +$protinidhi_samoyiki)  ?>
                            </td>
                
                            <td class="tg-0pky" >
                            <?php echo ($reporter_other +$b_chief_other + $s_editor_other +$protinidhi_other)  ?>
                            </td>
                
                            <td class="tg-0pky" >
                            <?php echo ($reporter_a +$b_chief_a + $s_editor_a +$protinidhi_a)  ?>
                            </td>
                
                            <td class="tg-0pky" >
                            <?php echo ($reporter_b +$b_chief_b + $s_editor_b +$protinidhi_b)  ?>
                            </td>
                
                            <td class="tg-0pky" >
                            <?php echo ($reporter_c +$b_chief_c + $s_editor_c +$protinidhi_c)  ?>
                            </td>
                
                            <td class="tg-0pky" >
                            <?php echo ($total_reporter +$total_b_chief + $total_s_editor +$total_protinidhi)  ?>
                            </td>
                        </tr>
                        <tr>
                           
                           <td class="tg-pwj7" rowspan="6" > অনলাইন </td>
                           <td class="tg-pwj7" rowspan="2" > ক্রম </td>
                           <td class="tg-pwj7" rowspan="2" > পদের নাম </td>
                           <td class="tg-pwj7" rowspan="2" >টিভিতে কতজন</td>
                           <td class="tg-pwj7" rowspan="2"  >রেডিওতে কতজন</td>
                           <td class="tg-pwj7" rowspan="2" > নিউজ পোর্টালে কতজন</td>
                           <td class="tg-pwj7" colspan='3'> ক্যাটাগরি </td>
                           
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" > A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                       </tr>
                       <?php
                                $pk = (isset($media_nation_media_online['id']))?$media_nation_media_online['id']:'';
                            ?>
                         <tr>
                         
                            <td class="tg-0pky" >
                            ১
                            </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_tv" 
                                    data-title="Enter"><?php echo $reporter_tv=(isset( $media_nation_media_online['reporter_tv']))? $media_nation_media_online['reporter_tv']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_radio" 
                                    data-title="Enter"><?php echo $reporter_radio=(isset( $media_nation_media_online['reporter_radio']))? $media_nation_media_online['reporter_radio']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_news_portal" 
                                    data-title="Enter"><?php echo $reporter_news_portal=(isset( $media_nation_media_online['reporter_news_portal']))? $media_nation_media_online['reporter_news_portal']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_a" 
                                    data-title="Enter"><?php echo $reporter_a=(isset( $media_nation_media_online['reporter_a']))? $media_nation_media_online['reporter_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_b" 
                                    data-title="Enter"><?php echo $reporter_b=(isset( $media_nation_media_online['reporter_b']))? $media_nation_media_online['reporter_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_c" 
                                    data-title="Enter"><?php echo $reporter_c=(isset( $media_nation_media_online['reporter_c']))? $media_nation_media_online['reporter_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $total_reporter=(  $reporter_a+  $reporter_b +  $reporter_c)?>
                            </td>
                         </tr>
                         <tr>
                         
                            <td class="tg-0pky" >
                            ২
                            </td>
                            <td class="tg-0pky" >
                            সাব-এডিটর
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_tv" 
                                    data-title="Enter"><?php echo $s_editor_tv=(isset( $media_nation_media_online['s_editor_tv']))? $media_nation_media_online['s_editor_tv']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_radio" 
                                    data-title="Enter"><?php echo $s_editor_radio=(isset( $media_nation_media_online['s_editor_radio']))? $media_nation_media_online['s_editor_radio']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_news_portal" 
                                    data-title="Enter"><?php echo $s_editor_news_portal=(isset( $media_nation_media_online['s_editor_news_portal']))? $media_nation_media_online['s_editor_news_portal']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_a" 
                                    data-title="Enter"><?php echo $s_editor_a=(isset( $media_nation_media_online['s_editor_a']))? $media_nation_media_online['s_editor_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_b" 
                                    data-title="Enter"><?php echo $s_editor_b=(isset( $media_nation_media_online['s_editor_b']))? $media_nation_media_online['s_editor_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_c" 
                                    data-title="Enter"><?php echo $s_editor_c=(isset( $media_nation_media_online['s_editor_c']))? $media_nation_media_online['s_editor_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $total_s_editor=(  $s_editor_a+  $s_editor_b +  $s_editor_c)?>
                            </td>
                         </tr>
                         <tr>
                         
                            <td class="tg-0pky" >
                            ৩
                            </td>
                            <td class="tg-0pky" >
                            প্রতিনিধি
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_tv" 
                                    data-title="Enter"><?php echo $protinidhi_tv=(isset( $media_nation_media_online['protinidhi_tv']))? $media_nation_media_online['protinidhi_tv']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_radio" 
                                    data-title="Enter"><?php echo $protinidhi_radio=(isset( $media_nation_media_online['protinidhi_radio']))? $media_nation_media_online['protinidhi_radio']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_news_portal" 
                                    data-title="Enter"><?php echo $protinidhi_news_portal=(isset( $media_nation_media_online['protinidhi_news_portal']))? $media_nation_media_online['protinidhi_news_portal']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_a" 
                                    data-title="Enter"><?php echo $protinidhi_a=(isset( $media_nation_media_online['protinidhi_a']))? $media_nation_media_online['protinidhi_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_b" 
                                    data-title="Enter"><?php echo $protinidhi_b=(isset( $media_nation_media_online['protinidhi_b']))? $media_nation_media_online['protinidhi_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_nation_media_online" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_c" 
                                    data-title="Enter"><?php echo $protinidhi_c=(isset( $media_nation_media_online['protinidhi_c']))? $media_nation_media_online['protinidhi_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $total_protinidhi=(  $protinidhi_a+  $protinidhi_b +  $protinidhi_c)?>
                            </td>
                         </tr>
                         <tr>
                            <td class="tg-0pky" colspan="2">
                            মোট
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_tv + $s_editor_tv +$protinidhi_tv)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_radio + $s_editor_radio +$protinidhi_radio)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_news_portal + $s_editor_news_portal +$protinidhi_news_portal)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_a + $s_editor_a +$protinidhi_a)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_b + $s_editor_b +$protinidhi_b)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_c + $s_editor_c +$protinidhi_c)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($total_reporter + $total_s_editor +$total_protinidhi)  ?>
                            </td>
                           
                         </tr>
                 
                         <tr>
                           
                           <td class="tg-pwj7" rowspan="10" > মফস্বল (আঞ্চলিক গণমাধ্যম) </td>
                        </tr>
                         <tr>
                           
                           <td class="tg-pwj7" rowspan="2" > ক্রম </td>
                           <td class="tg-pwj7" rowspan="2" > পদের নাম </td>
                           <td class="tg-pwj7" rowspan="2" >প্রিন্ট কতজন</td>
                           <td class="tg-pwj7" rowspan="2"  >নিউজ পোর্টালে কতজন</td>
                           <td class="tg-pwj7" rowspan="2" >কমিউনিটি রেডিও/টিভিতে কতজন</td>
                           <td class="tg-pwj7" colspan='4'> ক্যাটাগরি </td>
                           
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" > A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                       </tr>
                       <?php
                                $pk = (isset($media_mofosshol_media['id']))?$media_mofosshol_media['id']:'';
                            ?>
                         <tr>
                         
                         <td class="tg-0pky" >
                            ১
                            </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_print" 
                                    data-title="Enter"><?php echo $reporter_print=(isset( $media_mofosshol_media['reporter_print']))? $media_mofosshol_media['reporter_print']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_news" 
                                    data-title="Enter"><?php echo $reporter_news=(isset( $media_mofosshol_media['reporter_news']))? $media_mofosshol_media['reporter_news']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_community" 
                                    data-title="Enter"><?php echo $reporter_community=(isset( $media_mofosshol_media['reporter_community']))? $media_mofosshol_media['reporter_community']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_a" 
                                    data-title="Enter"><?php echo $reporter_a=(isset( $media_mofosshol_media['reporter_a']))? $media_mofosshol_media['reporter_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_b" 
                                    data-title="Enter"><?php echo $reporter_b=(isset( $media_mofosshol_media['reporter_b']))? $media_mofosshol_media['reporter_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="reporter_c" 
                                    data-title="Enter"><?php echo $reporter_c=(isset( $media_mofosshol_media['reporter_c']))? $media_mofosshol_media['reporter_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $total_reporter=(  $reporter_a+  $reporter_b +  $reporter_c)?>
                            </td>
                         <tr>
                         
                         <td class="tg-0pky" >
                            ২
                            </td>
                            <td class="tg-0pky" >
                            সাব-এডিটর
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_print" 
                                    data-title="Enter"><?php echo $s_editor_print=(isset( $media_mofosshol_media['s_editor_print']))? $media_mofosshol_media['s_editor_print']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_news" 
                                    data-title="Enter"><?php echo $s_editor_news=(isset( $media_mofosshol_media['s_editor_news']))? $media_mofosshol_media['s_editor_news']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_community" 
                                    data-title="Enter"><?php echo $s_editor_community=(isset( $media_mofosshol_media['s_editor_community']))? $media_mofosshol_media['s_editor_community']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_a" 
                                    data-title="Enter"><?php echo $s_editor_a=(isset( $media_mofosshol_media['s_editor_a']))? $media_mofosshol_media['s_editor_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_b" 
                                    data-title="Enter"><?php echo $s_editor_b=(isset( $media_mofosshol_media['s_editor_b']))? $media_mofosshol_media['s_editor_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="s_editor_c" 
                                    data-title="Enter"><?php echo $s_editor_c=(isset( $media_mofosshol_media['s_editor_c']))? $media_mofosshol_media['s_editor_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $total_s_editor=(  $s_editor_a+  $s_editor_b +  $s_editor_c)?>
                         <tr>
                         
                         <td class="tg-0pky" >
                            ৩
                            </td>
                            <td class="tg-0pky" >
                            প্রতিনিধি
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_print" 
                                    data-title="Enter"><?php echo $protinidhi_print=(isset( $media_mofosshol_media['protinidhi_print']))? $media_mofosshol_media['protinidhi_print']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_news" 
                                    data-title="Enter"><?php echo $protinidhi_news=(isset( $media_mofosshol_media['protinidhi_news']))? $media_mofosshol_media['protinidhi_news']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_community" 
                                    data-title="Enter"><?php echo $protinidhi_community=(isset( $media_mofosshol_media['protinidhi_community']))? $media_mofosshol_media['protinidhi_community']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_a" 
                                    data-title="Enter"><?php echo $protinidhi_a=(isset( $media_mofosshol_media['protinidhi_a']))? $media_mofosshol_media['protinidhi_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_b" 
                                    data-title="Enter"><?php echo $protinidhi_b=(isset( $media_mofosshol_media['protinidhi_b']))? $media_mofosshol_media['protinidhi_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_mofosshol_media" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="protinidhi_c" 
                                    data-title="Enter"><?php echo $protinidhi_c=(isset( $media_mofosshol_media['protinidhi_c']))? $media_mofosshol_media['protinidhi_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $total_protinidhi=(  $protinidhi_a+  $protinidhi_b +  $protinidhi_c)?>
                         </tr>
                         <tr>
                            <td class="tg-0pky" colspan="2">
                            মোট
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_print + $s_editor_print +$protinidhi_print)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_news + $s_editor_news +$protinidhi_news)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_community + $s_editor_community +$protinidhi_community)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_a + $s_editor_a +$protinidhi_a)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_b + $s_editor_b +$protinidhi_b)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($reporter_c + $s_editor_c +$protinidhi_c)  ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo ($total_reporter + $total_s_editor +$total_protinidhi)  ?>
                            </td>
                           
                         </tr>
                     </table>
                     <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='13'><b>একনজরে নবীন বৃদ্ধি</b></td>
                            </tr>
                            <tr>
                              <td class="tg-pwj7" rowspan="2">ধরন</td>
                              <td class="tg-pwj7" rowspan="2">পূর্বের সংখ্যা</td>
                              <td class="tg-pwj7" rowspan="2">বর্তমান সংখ্যা</td>
                              <td class="tg-pwj7" rowspan="2"> বৃদ্ধি</td>
                              <td class="tg-pwj7" rowspan="2"> ঘাটতি</td>
                              <td class="tg-pwj7" colspan="3">ক্যাটাগরি</td>
                              <td class="tg-pwj7" rowspan="2">আন্তর্জাতিক গণমাধ্যম </td>
                              <td class="tg-pwj7" colspan="4">জাতীয় গণমাধ্যম/মফস্বল গণমাধ্যম</td>
                            </tr>




                            <tr>
                            
                           
                                <td class="tg-0pky">A</td>
                                <td class="tg-0pky">B</td>
                                <td class="tg-0pky">C</td>
                                
                                <td class="tg-0pky">টিভি</td>
                                <td class="tg-0pky">রেডিও/এফএম</td>
                                <td class="tg-0pky">প্রিন্ট</td>
                                <td class="tg-0pky">অনলাইন</td>

                            </tr>
                            <?php
                                $pk = (isset($media_eknojore['id']))?$media_eknojore['id']:'';
                            ?>
                            <tr>
                            <td class="tg-0pky">
                            সাংবাদিক
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_prev" 
                                    data-title="Enter"><?php echo $shang_prev=(isset( $media_eknojore['shang_prev']))? $media_eknojore['shang_prev']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_pres" 
                                    data-title="Enter"><?php echo $shang_pres=(isset( $media_eknojore['shang_pres']))? $media_eknojore['shang_pres']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_bri" 
                                    data-title="Enter"><?php echo $shang_bri=(isset( $media_eknojore['shang_bri']))? $media_eknojore['shang_bri']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_gha" 
                                    data-title="Enter"><?php echo $shang_gha=(isset( $media_eknojore['shang_gha']))? $media_eknojore['shang_gha']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_a" 
                                    data-title="Enter"><?php echo $shang_a=(isset( $media_eknojore['shang_a']))? $media_eknojore['shang_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_b" 
                                    data-title="Enter"><?php echo $shang_b=(isset( $media_eknojore['shang_b']))? $media_eknojore['shang_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_c" 
                                    data-title="Enter"><?php echo $shang_c=(isset( $media_eknojore['shang_c']))? $media_eknojore['shang_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_int" 
                                    data-title="Enter"><?php echo $shang_int=(isset( $media_eknojore['shang_int']))? $media_eknojore['shang_int']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_tv" 
                                    data-title="Enter"><?php echo $shang_tv=(isset( $media_eknojore['shang_tv']))? $media_eknojore['shang_tv']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_radio" 
                                    data-title="Enter"><?php echo $shang_radio=(isset( $media_eknojore['shang_radio']))? $media_eknojore['shang_radio']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_print" 
                                    data-title="Enter"><?php echo $shang_print=(isset( $media_eknojore['shang_print']))? $media_eknojore['shang_print']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shang_online" 
                                    data-title="Enter"><?php echo $shang_online=(isset( $media_eknojore['shang_online']))? $media_eknojore['shang_online']:0; ?>
                                </a>
                            </td>

                            </tr>
                            <tr>
                            <td class="tg-0pky">
                            নবীন
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_prev" 
                                    data-title="Enter"><?php echo $nobin_prev=(isset( $media_eknojore['nobin_prev']))? $media_eknojore['nobin_prev']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_pres" 
                                    data-title="Enter"><?php echo $nobin_pres=(isset( $media_eknojore['nobin_pres']))? $media_eknojore['nobin_pres']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_bri" 
                                    data-title="Enter"><?php echo $nobin_bri=(isset( $media_eknojore['nobin_bri']))? $media_eknojore['nobin_bri']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_gha" 
                                    data-title="Enter"><?php echo $nobin_gha=(isset( $media_eknojore['nobin_gha']))? $media_eknojore['nobin_gha']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_a" 
                                    data-title="Enter"><?php echo $nobin_a=(isset( $media_eknojore['nobin_a']))? $media_eknojore['nobin_a']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_b" 
                                    data-title="Enter"><?php echo $nobin_b=(isset( $media_eknojore['nobin_b']))? $media_eknojore['nobin_b']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_c" 
                                    data-title="Enter"><?php echo $nobin_c=(isset( $media_eknojore['nobin_c']))? $media_eknojore['nobin_c']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_int" 
                                    data-title="Enter"><?php echo $nobin_int=(isset( $media_eknojore['nobin_int']))? $media_eknojore['nobin_int']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_tv" 
                                    data-title="Enter"><?php echo $nobin_tv=(isset( $media_eknojore['nobin_tv']))? $media_eknojore['nobin_tv']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_radio" 
                                    data-title="Enter"><?php echo $nobin_radio=(isset( $media_eknojore['nobin_radio']))? $media_eknojore['nobin_radio']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_print" 
                                    data-title="Enter"><?php echo $nobin_print=(isset( $media_eknojore['nobin_print']))? $media_eknojore['nobin_print']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="media_eknojore" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="nobin_online" 
                                    data-title="Enter"><?php echo $nobin_online=(isset( $media_eknojore['nobin_online']))? $media_eknojore['nobin_online']:0; ?>
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
    }
</style>
