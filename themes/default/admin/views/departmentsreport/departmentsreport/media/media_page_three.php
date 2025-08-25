<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - (সাংবাদিক বৃদ্ধি রিপোর্ট) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/media-page-three') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				
				
                <div class="table-responsive">
				
	
				<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-izx2{border-color:black;background-color:#efefef;}
.tg .tg-pwj7{background-color:#efefef;border-color:black;}
.tg .tg-0pky{border-color:black;vertical-align:top}
.tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
.tg .tg-0lax{border-color:black;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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



                         <tr>
                            <td class="tg-0pky" >
                            ১
                             </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_elect = $total_media_int_media['reporter_elect'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_print = $total_media_int_media['reporter_print'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_online = $total_media_int_media['reporter_online'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_a = $total_media_int_media['reporter_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_b = $total_media_int_media['reporter_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_c = $total_media_int_media['reporter_c'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $total_rep= ( $reporter_a +  $reporter_b+  $reporter_c)?>
                             </td>

                         </tr>
                         <tr>
                            <td class="tg-0pky" >
                            ২
                             </td>
                            <td class="tg-0pky" >
                            প্রতিনিধি
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_elect = $total_media_int_media['protinidhi_elect'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_print = $total_media_int_media['protinidhi_print'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_online = $total_media_int_media['protinidhi_online'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_a = $total_media_int_media['protinidhi_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_b = $total_media_int_media['protinidhi_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_c = $total_media_int_media['protinidhi_c'] ?>
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

                       <tr>
                            <td class="tg-0pky" >
                            ১
                             </td>
                            <td class="tg-0pky" >
                            উপস্থাপক
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $uposthapok_jon = $total_media_nation_media_electronic['uposthapok_jon'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $uposthapok_radio = $total_media_nation_media_electronic['uposthapok_radio'] ?>
                             </td>
                             <td class="tg-0pky" colspan='2'>
                             <?php echo $uposthapok_a = $total_media_nation_media_electronic['uposthapok_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $uposthapok_b = $total_media_nation_media_electronic['uposthapok_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $uposthapok_c = $total_media_nation_media_electronic['uposthapok_c'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $total_uposthapok=(  $uposthapok_a+  $uposthapok_b +  $uposthapok_c)?>
                             </td>
                         </tr>
       
                       <tr>
                            <td class="tg-0pky" >
                            ২
                             </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_jon = $total_media_nation_media_electronic['reporter_jon'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_radio = $total_media_nation_media_electronic['reporter_radio'] ?>
                             </td>
                             <td class="tg-0pky" colspan='2'>
                             <?php echo $reporter_a = $total_media_nation_media_electronic['reporter_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_b = $total_media_nation_media_electronic['reporter_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_c = $total_media_nation_media_electronic['reporter_c'] ?>
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
                             <td class="tg-0pky" >
                             <?php echo $camera_jon = $total_media_nation_media_electronic['camera_jon'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $camera_radio = $total_media_nation_media_electronic['camera_radio'] ?>
                             </td>
                             <td class="tg-0pky" colspan='2'>
                             <?php echo $camera_a = $total_media_nation_media_electronic['camera_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $camera_b = $total_media_nation_media_electronic['camera_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $camera_c = $total_media_nation_media_electronic['camera_c'] ?>
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
                             <td class="tg-0pky" >
                             <?php echo $video_editor_jon = $total_media_nation_media_electronic['video_editor_jon'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $video_editor_radio = $total_media_nation_media_electronic['video_editor_radio'] ?>
                             </td>
                             <td class="tg-0pky" colspan='2'>
                             <?php echo $video_editor_a = $total_media_nation_media_electronic['video_editor_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $video_editor_b = $total_media_nation_media_electronic['video_editor_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $video_editor_c = $total_media_nation_media_electronic['video_editor_c'] ?>
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
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_jon = $total_media_nation_media_electronic['protinidhi_jon'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_radio = $total_media_nation_media_electronic['protinidhi_radio'] ?>
                             </td>
                             <td class="tg-0pky" colspan='2'>
                             <?php echo $protinidhi_a = $total_media_nation_media_electronic['protinidhi_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_b = $total_media_nation_media_electronic['protinidhi_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $protinidhi_c = $total_media_nation_media_electronic['protinidhi_c'] ?>
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
                           <td class="tg-pwj7" rowspan="2" >অন্যান্য কতজন</td>
                           <td class="tg-pwj7" colspan='4'> ক্যাটাগরি </td>
                           
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" > A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                       </tr>
                         <tr>
                         
                             <td class="tg-0pky" >
                             ১
                             </td>
                             <td class="tg-0pky" >
                             রিপোর্টার
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_potrika = $total_media_nation_media_print['reporter_potrika'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_samoyiki = $total_media_nation_media_print['reporter_samoyiki'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_other = $total_media_nation_media_print['reporter_other'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_a = $total_media_nation_media_print['reporter_a'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_b = $total_media_nation_media_print['reporter_b'] ?>
                             </td>
                             <td class="tg-0pky" >
                             <?php echo $reporter_c = $total_media_nation_media_print['reporter_c'] ?>
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
                         <td class="tg-0pky" >
                         <?php echo $b_chief_potrika = $total_media_nation_media_print['b_chief_potrika'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $b_chief_samoyiki = $total_media_nation_media_print['b_chief_samoyiki'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $b_chief_other = $total_media_nation_media_print['b_chief_other'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $b_chief_a = $total_media_nation_media_print['b_chief_a'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $b_chief_b = $total_media_nation_media_print['b_chief_b'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $b_chief_c = $total_media_nation_media_print['b_chief_c'] ?>
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
                         <td class="tg-0pky" >
                         <?php echo $s_editor_potrika = $total_media_nation_media_print['s_editor_potrika'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $s_editor_samoyiki = $total_media_nation_media_print['s_editor_samoyiki'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $s_editor_other = $total_media_nation_media_print['s_editor_other'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $s_editor_a = $total_media_nation_media_print['s_editor_a'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $s_editor_b = $total_media_nation_media_print['s_editor_b'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $s_editor_c = $total_media_nation_media_print['s_editor_c'] ?>
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
                         <td class="tg-0pky" >
                         <?php echo $protinidhi_potrika = $total_media_nation_media_print['protinidhi_potrika'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $protinidhi_samoyiki = $total_media_nation_media_print['protinidhi_samoyiki'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $protinidhi_other = $total_media_nation_media_print['protinidhi_other'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $protinidhi_a = $total_media_nation_media_print['protinidhi_a'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $protinidhi_b = $total_media_nation_media_print['protinidhi_b'] ?>
                         </td>
                         <td class="tg-0pky" >
                         <?php echo $protinidhi_c = $total_media_nation_media_print['protinidhi_c'] ?>
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
                           <td class="tg-pwj7" colspan='4'> ক্যাটাগরি </td>
                           
                           
                       </tr>
                       <tr>
                           
                           <td class="tg-pwj7" > A </td>
                           <td class="tg-pwj7" >   B </td>
                           <td class="tg-pwj7" > C </td>
                           <td class="tg-pwj7" rowspan="" > মোট </td>
                       </tr>
                         <tr>
                         
                            <td class="tg-0pky" >
                            ১
                            </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_tv = $total_media_nation_media_online['reporter_tv'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_radio = $total_media_nation_media_online['reporter_radio'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_news_portal = $total_media_nation_media_online['reporter_news_portal'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_a = $total_media_nation_media_online['reporter_a'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_b = $total_media_nation_media_online['reporter_b'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_c = $total_media_nation_media_online['reporter_c'] ?>
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
                            <td class="tg-0pky" >
                            <?php echo $s_editor_tv = $total_media_nation_media_online['s_editor_tv'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_radio = $total_media_nation_media_online['s_editor_radio'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_news_portal = $total_media_nation_media_online['s_editor_news_portal'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_a = $total_media_nation_media_online['s_editor_a'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_b = $total_media_nation_media_online['s_editor_b'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_c = $total_media_nation_media_online['s_editor_c'] ?>
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
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_tv = $total_media_nation_media_online['protinidhi_tv'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_radio = $total_media_nation_media_online['protinidhi_radio'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_news_portal = $total_media_nation_media_online['protinidhi_news_portal'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_a = $total_media_nation_media_online['protinidhi_a'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_b = $total_media_nation_media_online['protinidhi_b'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_c = $total_media_nation_media_online['protinidhi_c'] ?>
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
                         <tr>
                         
                         <td class="tg-0pky" >
                            ১
                            </td>
                            <td class="tg-0pky" >
                            রিপোর্টার
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_print = $total_media_mofosshol_media['reporter_print'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_news = $total_media_mofosshol_media['reporter_news'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_community = $total_media_mofosshol_media['reporter_community'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_a = $total_media_mofosshol_media['reporter_a'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_b = $total_media_mofosshol_media['reporter_b'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $reporter_c = $total_media_mofosshol_media['reporter_c'] ?>
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
                            <td class="tg-0pky" >
                            <?php echo $s_editor_print = $total_media_mofosshol_media['s_editor_print'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_news = $total_media_mofosshol_media['s_editor_news'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_community = $total_media_mofosshol_media['s_editor_community'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_a = $total_media_mofosshol_media['s_editor_a'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_b = $total_media_mofosshol_media['s_editor_b'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $s_editor_c = $total_media_mofosshol_media['s_editor_c'] ?>
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
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_print = $total_media_mofosshol_media['protinidhi_print'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_news = $total_media_mofosshol_media['protinidhi_news'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_community = $total_media_mofosshol_media['protinidhi_community'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_a = $total_media_mofosshol_media['protinidhi_a'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_b = $total_media_mofosshol_media['protinidhi_b'] ?>
                            </td>
                            <td class="tg-0pky" >
                            <?php echo $protinidhi_c = $total_media_mofosshol_media['protinidhi_c'] ?>
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
                                <td class="tg-pwj7" colspan='13'><b>একনজরে সাংবাদিক বৃদ্ধি</b></td>
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
                         
                            <tr>
                            <td class="tg-0pky">
                            সাংবাদিক
                            </td>
                            <td class="tg-0pky"> 
							<?php echo $shang_prev = $total_media_eknojore['shang_prev'] ?>
							</td>
                            <td class="tg-0pky">
                            <?php echo $shang_pres = $total_media_eknojore['shang_pres'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_bri = $total_media_eknojore['shang_bri'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_gha = $total_media_eknojore['shang_gha'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_a = $total_media_eknojore['shang_a'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_b = $total_media_eknojore['shang_b'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_c = $total_media_eknojore['shang_c'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_int = $total_media_eknojore['shang_int'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_tv = $total_media_eknojore['shang_tv'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_radio = $total_media_eknojore['shang_radio'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_print = $total_media_eknojore['shang_print'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $shang_online = $total_media_eknojore['shang_online'] ?>
                            </td>

                            </tr>
                            <tr>
                            <td class="tg-0pky">
                            নবীন
                            </td>
                            <td class="tg-0pky"> 
							<?php echo $nobin_prev = $total_media_eknojore['nobin_prev'] ?>
							</td>
                            <td class="tg-0pky">
                            <?php echo $nobin_pres = $total_media_eknojore['nobin_pres'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_bri = $total_media_eknojore['nobin_bri'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_gha = $total_media_eknojore['nobin_gha'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_a = $total_media_eknojore['nobin_a'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_b = $total_media_eknojore['nobin_b'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_c = $total_media_eknojore['nobin_c'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_int = $total_media_eknojore['nobin_int'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_tv = $total_media_eknojore['nobin_tv'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_radio = $total_media_eknojore['nobin_radio'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_print = $total_media_eknojore['nobin_print'] ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $nobin_online = $total_media_eknojore['nobin_online'] ?>
                            </td>

                            </tr>
                        </table>
                     
                    </div>
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
