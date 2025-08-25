<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
    }
}
?>
&nbsp;&nbsp;

<span class="dropdown">

    <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Archive
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="archive">


        <?php

        echo   ' <li>' . anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/media-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/media-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/media-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


<script>
$(document).ready(function(){
    $("#export_all_table").on("click",function(){
        for(let i=1; i<=12;i++)
        {
            $("#table_"+i).click();
        }
    });
});
</script>

                <div class="table-responsive">


				<style type="text/css">
                    #export_all_table{
                        cursor: pointer;
                    }
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
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>                           
                                <td class="tg-pwj7" colspan='3'><b>সভাসমূহ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Media_সভাসমূহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                              
                              
                              <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >  মোট উপস্থিতি </td>
                                <td class="tg-pwj7" > গড় উপস্থিতি</td>
                                
                            </tr>


                    
                            <tr>                           
                                
                                <td class="tg-y698 type_1"> এডমিন সভা	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $admin_shova_num = $media_shova['admin_shova_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $admin_shova_pre = $media_shova['admin_shova_pre'] ?>
                                </td>
                                
								<td class="tg-0pky" >
                                <?php echo number_format (($admin_shova_num!=0 && $admin_shova_pre!=0)?$admin_shova_pre/$admin_shova_num:0,2)?>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> প্রোগ্রামার সভা </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $prgrammer_shova_num = $media_shova['prgrammer_shova_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $prgrammer_shova_pre = $media_shova['prgrammer_shova_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($prgrammer_shova_num!=0 && $prgrammer_shova_pre!=0)?$prgrammer_shova_pre/$prgrammer_shova_num:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> শিক্ষানবিশ সভা </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shikkhanbish_shova_num = $media_shova['shikkhanbish_shova_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shikkhanbish_shova_pre = $media_shova['shikkhanbish_shova_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($shikkhanbish_shova_num!=0 && $shikkhanbish_shova_pre!=0)?$shikkhanbish_shova_pre/$shikkhanbish_shova_num:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> সাধারন সভা </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shadharon_shova_num = $media_shova['shadharon_shova_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shadharon_shova_pre = $media_shova['shadharon_shova_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($shadharon_shova_num!=0 && $shadharon_shova_pre!=0)?$shadharon_shova_pre/$shadharon_shova_num:0,2)?>
                                </td>
                               
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">সংবর্ধনা অনুষ্ঠান </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $songbordhona_num = $media_shova['songbordhona_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $songbordhona_pre = $media_shova['songbordhona_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($songbordhona_num!=0 && $songbordhona_pre!=0)?$songbordhona_pre/$songbordhona_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> সেটআপ প্রোগ্রাম </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $setup_num = $media_shova['setup_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $setup_pre = $media_shova['setup_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($setup_num!=0 && $setup_pre!=0)?$setup_pre/$setup_num:0,2)?>
                                </td>
                                
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> শিক্ষা সফর </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $edu_tour_num = $media_shova['edu_tour_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $edu_tour_pre = $media_shova['edu_tour_pre'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo number_format (($edu_tour_num!=0 && $edu_tour_pre!=0)?$edu_tour_pre/$edu_tour_num:0,2)?>
                                </td>
                                
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> সাংবাদিকতায় আগ্রহীদের নিয়ে বৈঠক</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $interested_on_journalism_num = $media_shova['interested_on_journalism_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $interested_on_journalism_pre = $media_shova['interested_on_journalism_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($interested_on_journalism_num!=0 && $interested_on_journalism_pre!=0)?$interested_on_journalism_pre/$interested_on_journalism_num:0,2)?>
                                </td>
                                
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> সাংবাদিক সমাবেশ</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shang_shomabesh_num = $media_shova['shang_shomabesh_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shang_shomabesh_pre = $media_shova['shang_shomabesh_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($shang_shomabesh_num!=0 && $shang_shomabesh_pre!=0)?$shang_shomabesh_pre/$shang_shomabesh_num:0,2)?>
                                </td>
                                
                                

                            </tr>

                            <tr>
                                <td class="tg-y698"> কর্মরত সাংবাদিকদের সাথে বৈঠক </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $working_shang_meeting_num = $media_shova['working_shang_meeting_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $working_shang_meeting_pre = $media_shova['working_shang_meeting_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($working_shang_meeting_num!=0 && $working_shang_meeting_pre!=0)?$working_shang_meeting_pre/$working_shang_meeting_num:0,2)?>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">  ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $iftar_mahfil_num = $media_shova['iftar_mahfil_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $iftar_mahfil_pre = $media_shova['iftar_mahfil_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($iftar_mahfil_num!=0 && $iftar_mahfil_pre!=0)?$iftar_mahfil_pre/$iftar_mahfil_num:0,2)?>
                                </td>
                               
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> কোর্সের প্রস্তুতি সভা </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $course_num = $media_shova['course_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $course_pre = $media_shova['course_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($course_num!=0 && $course_pre!=0)?$course_pre/$course_num:0,2)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">  কর্মশালার প্রস্তুতি সভা </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $workshop_num = $media_shova['workshop_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $workshop_pre = $media_shova['workshop_pre'] ?>
                                </td>
                                                <td class="tg-0pky" >
                                <?php echo number_format (($workshop_num!=0 && $workshop_pre!=0)?$workshop_pre/$workshop_num:0,2)?>
                                </td>
                               
                                
                            </tr>
                            

                        </table>
                    <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='3'><b>প্রশিক্ষণ কোর্স </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Media_প্রশিক্ষণ কোর্স.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" >কোর্সের ধরন</td>
                                <td class="tg-pwj7" >ক্লাস  সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি</td>
                                <td class="tg-pwj7" >গড় উপস্থিতি</td>
                               
                                
                            </tr>

                            <tr>                                                     
                                
                                <td class="tg-y698 type_1"> উপস্থাপনা</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $presentation_num = $media_training_course['presentation_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $presentation_pre = $media_training_course['presentation_pre'] ?>
                                </td>
                            
								<td class="tg-0pky" >
                                <?php echo number_format (($presentation_num!=0 && $presentation_pre!=0)?$presentation_pre/$presentation_num:0,2)?>
                                </td>
                                
                                </tr>

                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ক্যামেরা অপারেশন/ফটোগ্রাফি	</td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $photography_num = $media_training_course['photography_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $photography_pre = $media_training_course['photography_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($photography_num!=0 && $photography_pre!=0)?$photography_pre/$photography_num:0,2)?>
                                </td>
                                </tr>
                                
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">রিপোর্টিং</td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $reporting_num = $media_training_course['reporting_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $reporting_pre = $media_training_course['reporting_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($reporting_num!=0 && $reporting_pre!=0)?$reporting_pre/$reporting_num:0,2)?>
                                </td>
                               

                                </tr>

                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  মোবাইল জার্নালিজম (মোজো)	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $mo_ja_num = $media_training_course['mo_ja_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $mo_ja_pre = $media_training_course['mo_ja_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($mo_ja_num!=0 && $mo_ja_pre!=0)?$mo_ja_pre/$mo_ja_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ভিডিও এডিটিং	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $video_editin_num = $media_training_course['video_editin_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $video_editin_pre = $media_training_course['video_editin_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($video_editin_num!=0 && $video_editin_pre!=0)?$video_editin_pre/$video_editin_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  গ্রাফিক্স ডিজাইন	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $graphics_design_num = $media_training_course['graphics_design_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $graphics_design_pre = $media_training_course['graphics_design_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($graphics_design_num!=0 && $graphics_design_pre!=0)?$graphics_design_pre/$graphics_design_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ইংরেজি সাংবাদিকতা   	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $eng_journalism_num = $media_training_course['eng_journalism_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $eng_journalism_pre = $media_training_course['eng_journalism_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($eng_journalism_num!=0 && $eng_journalism_pre!=0)?$eng_journalism_pre/$eng_journalism_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  শুদ্ধ উচ্চারণ	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shuddhu_uccharon_num = $media_training_course['shuddhu_uccharon_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shuddhu_uccharon_pre = $media_training_course['shuddhu_uccharon_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($shuddhu_uccharon_num!=0 && $shuddhu_uccharon_pre!=0)?$shuddhu_uccharon_pre/$shuddhu_uccharon_num:0,2)?>
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ফিচার রাইটিং 	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $feature_writing_num = $media_training_course['feature_writing_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $feature_writing_pre = $media_training_course['feature_writing_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($feature_writing_num!=0 && $feature_writing_pre!=0)?$feature_writing_pre/$feature_writing_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1"> বিটভিত্তিক সাংবাদিকতা	</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $bit_vittik_num = $media_training_course['bit_vittik_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $bit_vittik_pre = $media_training_course['bit_vittik_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($bit_vittik_num!=0 && $bit_vittik_pre!=0)?$bit_vittik_pre/$bit_vittik_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>


                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>                           
                                <td class="tg-pwj7" colspan='3'><b>প্রশিক্ষণ কর্মশালা  </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Media_প্রশিক্ষণ কর্মশালা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                             
                              
                                <td class="tg-pwj7" >কর্মশালা ধরন</td>
                                <td class="tg-pwj7" > ক্লাস সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি </td>
                                <td class="tg-pwj7" > গড় উপস্থিতি </td>
                                
                            </tr>


                           
                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1">উপস্থাপনা</td>
                               
                                <td class="tg-0pky  type_10">
                                    <?php echo $presentation_num = $media_training_workshop['presentation_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $presentation_pre = $media_training_workshop['presentation_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($presentation_num!=0 && $presentation_pre!=0)?$presentation_pre/$presentation_num:0,2)?>
                                </td>
                                
                                
                                
                            </tr>

                            <tr>
                            
                            
                                
                            <td class="tg-y698 type_1"> ক্যামেরা অপারেশন/ফটোগ্রাফি</td>
                           
                            
                            <td class="tg-0pky  type_10">
                                    <?php echo $photography_num = $media_training_workshop['photography_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $photography_pre = $media_training_workshop['photography_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($photography_num!=0 && $photography_pre!=0)?$photography_pre/$photography_num:0,2)?>
                                </td>
                           
                            
                        </tr>

                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1">রিপোর্টিং	</td>
                           
                            
                            <td class="tg-0pky  type_10">
                                    <?php echo $reporting_num = $media_training_workshop['reporting_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $reporting_pre = $media_training_workshop['reporting_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($reporting_num!=0 && $reporting_pre!=0)?$reporting_pre/$reporting_num:0,2)?>
                                </td>
                           
                            
                        </tr>
                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1">মোবাইল জার্নালিজম (মোজো)	</td>
                           
                             
                            <td class="tg-0pky  type_10">
                                    <?php echo $mo_ja_num = $media_training_workshop['mo_ja_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $mo_ja_pre = $media_training_workshop['mo_ja_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($mo_ja_num!=0 && $mo_ja_pre!=0)?$mo_ja_pre/$mo_ja_num:0,2)?>
                                </td>
                            
                        </tr>
                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1">  ভিডিও এডিটিং	</td>
                           
                            
                            <td class="tg-0pky  type_10">
                                    <?php echo $video_editin_num = $media_training_workshop['video_editin_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $video_editin_pre = $media_training_workshop['video_editin_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($video_editin_num!=0 && $video_editin_pre!=0)?$video_editin_pre/$video_editin_num:0,2)?>
                                </td>
                           
                            
                        </tr>
                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1"> গ্রাফিক্স ডিজাইন	</td>
                           
                            
                            <td class="tg-0pky  type_10">
                                    <?php echo $graphics_design_num = $media_training_workshop['graphics_design_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $graphics_design_pre = $media_training_workshop['graphics_design_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($graphics_design_num!=0 && $graphics_design_pre!=0)?$graphics_design_pre/$graphics_design_num:0,2)?>
                                </td>
                            
                            
                        </tr>
                        <tr>
 
                            <td class="tg-y698 type_1"> ইংরেজি সাংবাদিকতা   </td>
                           
                            <td class="tg-0pky  type_10">
                                    <?php echo $eng_journalism_num = $media_training_workshop['eng_journalism_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $eng_journalism_pre = $media_training_workshop['eng_journalism_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($eng_journalism_num!=0 && $eng_journalism_pre!=0)?$eng_journalism_pre/$eng_journalism_num:0,2)?>
                                </td>
                            
                        </tr> 
                        <tr>
 
                            <td class="tg-y698 type_1"> শুদ্ধ উচ্চারণ   </td>
                           
                            <td class="tg-0pky  type_10">
                                    <?php echo $shuddhu_uccharon_num = $media_training_workshop['shuddhu_uccharon_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $shuddhu_uccharon_pre = $media_training_workshop['shuddhu_uccharon_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($shuddhu_uccharon_num!=0 && $shuddhu_uccharon_pre!=0)?$shuddhu_uccharon_pre/$shuddhu_uccharon_num:0,2)?>
                                </td>
                            
                        </tr> 
                        <tr>
 
                            <td class="tg-y698 type_1">ফিচার রাইটিং   </td>
                           
                          
                            <td class="tg-0pky  type_10">
                                    <?php echo $feature_writing_num = $media_training_workshop['feature_writing_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $feature_writing_pre = $media_training_workshop['feature_writing_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($feature_writing_num!=0 && $feature_writing_pre!=0)?$feature_writing_pre/$feature_writing_num:0,2)?>
                                </td>
                          
                            
                        </tr> 
                        <tr>
 
                            <td class="tg-y698 type_1"> বিট ভিত্তিক সাংবাদিকতা   </td>
                           
                            <td class="tg-0pky  type_10">
                                    <?php echo $bit_vittik_num = $media_training_workshop['bit_vittik_num'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $bit_vittik_pre = $media_training_workshop['bit_vittik_pre'] ?>
                                </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($bit_vittik_num!=0 && $bit_vittik_pre!=0)?$bit_vittik_pre/$bit_vittik_num:0,2)?>
                                </td>
                          
                            
                        </tr> 

                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Media_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_central_s=$media_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$media_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$media_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$media_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$media_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$media_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$media_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$media_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                        
                        
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
