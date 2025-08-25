<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মিডিয়া বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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

                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
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
<style type="text/css">
    #export_all_table{
        cursor: pointer;
    }
</style>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>                           
                                <td class="tg-pwj7" colspan='3'><b>সভাসমূহ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Media_সভাসমূহ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                              
                              
                              <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >  সংখ্যা </td>
                                <td class="tg-pwj7" >  মোট উপস্থিতি </td>
                                <td class="tg-pwj7" > গড় উপস্থিতি</td>
                                
                            </tr>


                            <?php
                                $pk = (isset($media_shova['id']))?$media_shova['id']:'';
                            ?>
                            <tr>                           
                                
                                <td class="tg-y698 type_1"> এডমিন সভা	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_shova_num" 
                                        data-title="Enter"><?php echo $admin_shova_num=(isset( $media_shova['admin_shova_num']))? $media_shova['admin_shova_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="admin_shova_pre" 
                                        data-title="Enter"><?php echo $admin_shova_pre=(isset( $media_shova['admin_shova_pre']))? $media_shova['admin_shova_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($admin_shova_num!=0 && $admin_shova_pre!=0)?$admin_shova_pre/$admin_shova_num:0,2)?>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> প্রোগ্রামার সভা </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="prgrammer_shova_num" 
                                        data-title="Enter"><?php echo $prgrammer_shova_num=(isset( $media_shova['prgrammer_shova_num']))? $media_shova['prgrammer_shova_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="prgrammer_shova_pre" 
                                        data-title="Enter"><?php echo $prgrammer_shova_pre=(isset( $media_shova['prgrammer_shova_pre']))? $media_shova['prgrammer_shova_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($prgrammer_shova_num!=0 && $prgrammer_shova_pre!=0)?$prgrammer_shova_pre/$prgrammer_shova_num:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> শিক্ষানবিশ সভা </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_shova_num" 
                                        data-title="Enter"><?php echo $shikkhanbish_shova_num=(isset( $media_shova['shikkhanbish_shova_num']))? $media_shova['shikkhanbish_shova_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shikkhanbish_shova_pre" 
                                        data-title="Enter"><?php echo $shikkhanbish_shova_pre=(isset( $media_shova['shikkhanbish_shova_pre']))? $media_shova['shikkhanbish_shova_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($shikkhanbish_shova_num!=0 && $shikkhanbish_shova_pre!=0)?$shikkhanbish_shova_pre/$shikkhanbish_shova_num:0,2)?>
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> সাধারন সভা </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shadharon_shova_num" 
                                        data-title="Enter"><?php echo $shadharon_shova_num=(isset( $media_shova['shadharon_shova_num']))? $media_shova['shadharon_shova_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shadharon_shova_pre" 
                                        data-title="Enter"><?php echo $shadharon_shova_pre=(isset( $media_shova['shadharon_shova_pre']))? $media_shova['shadharon_shova_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($shadharon_shova_num!=0 && $shadharon_shova_pre!=0)?$shadharon_shova_pre/$shadharon_shova_num:0,2)?>
                                </td>
                               
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">সংবর্ধনা অনুষ্ঠান </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="songbordhona_num" 
                                        data-title="Enter"><?php echo $songbordhona_num=(isset( $media_shova['songbordhona_num']))? $media_shova['songbordhona_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="songbordhona_pre" 
                                        data-title="Enter"><?php echo $songbordhona_pre=(isset( $media_shova['songbordhona_pre']))? $media_shova['songbordhona_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($songbordhona_num!=0 && $songbordhona_pre!=0)?$songbordhona_pre/$songbordhona_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698"> সেটআপ প্রোগ্রাম </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="setup_num" 
                                        data-title="Enter"><?php echo $setup_num=(isset( $media_shova['setup_num']))? $media_shova['setup_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="setup_pre" 
                                        data-title="Enter"><?php echo $setup_pre=(isset( $media_shova['setup_pre']))? $media_shova['setup_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($setup_num!=0 && $setup_pre!=0)?$setup_pre/$setup_num:0,2)?>
                                </td>
                                
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> শিক্ষা সফর </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="edu_tour_num" 
                                        data-title="Enter"><?php echo $edu_tour_num=(isset( $media_shova['edu_tour_num']))? $media_shova['edu_tour_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="edu_tour_pre" 
                                        data-title="Enter"><?php echo $edu_tour_pre=(isset( $media_shova['edu_tour_pre']))? $media_shova['edu_tour_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($edu_tour_num!=0 && $edu_tour_pre!=0)?$edu_tour_pre/$edu_tour_num:0,2)?>
                                </td>
                                
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> সাংবাদিকতায় আগ্রহীদের নিয়ে বৈঠক</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="interested_on_journalism_num" 
                                        data-title="Enter"><?php echo $interested_on_journalism_num=(isset( $media_shova['interested_on_journalism_num']))? $media_shova['interested_on_journalism_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="interested_on_journalism_pre" 
                                        data-title="Enter"><?php echo $interested_on_journalism_pre=(isset( $media_shova['interested_on_journalism_pre']))? $media_shova['interested_on_journalism_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($interested_on_journalism_num!=0 && $interested_on_journalism_pre!=0)?$interested_on_journalism_pre/$interested_on_journalism_num:0,2)?>
                                </td>
                                
                                

                            </tr>
                            <tr>
                                <td class="tg-y698"> সাংবাদিক সমাবেশ</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shang_shomabesh_num" 
                                        data-title="Enter"><?php echo $shang_shomabesh_num=(isset( $media_shova['shang_shomabesh_num']))? $media_shova['shang_shomabesh_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shang_shomabesh_pre" 
                                        data-title="Enter"><?php echo $shang_shomabesh_pre=(isset( $media_shova['shang_shomabesh_pre']))? $media_shova['shang_shomabesh_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($shang_shomabesh_num!=0 && $shang_shomabesh_pre!=0)?$shang_shomabesh_pre/$shang_shomabesh_num:0,2)?>
                                </td>
                                
                                

                            </tr>

                            <tr>
                                <td class="tg-y698"> কর্মরত সাংবাদিকদের সাথে বৈঠক </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="working_shang_meeting_num" 
                                        data-title="Enter"><?php echo $working_shang_meeting_num=(isset( $media_shova['working_shang_meeting_num']))? $media_shova['working_shang_meeting_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="working_shang_meeting_pre" 
                                        data-title="Enter"><?php echo $working_shang_meeting_pre=(isset( $media_shova['working_shang_meeting_pre']))? $media_shova['working_shang_meeting_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($working_shang_meeting_num!=0 && $working_shang_meeting_pre!=0)?$working_shang_meeting_pre/$working_shang_meeting_num:0,2)?>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">  ইফতার মাহফিল </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="iftar_mahfil_num" 
                                        data-title="Enter"><?php echo $iftar_mahfil_num=(isset( $media_shova['iftar_mahfil_num']))? $media_shova['iftar_mahfil_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="iftar_mahfil_pre" 
                                        data-title="Enter"><?php echo $iftar_mahfil_pre=(isset( $media_shova['iftar_mahfil_pre']))? $media_shova['iftar_mahfil_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($iftar_mahfil_num!=0 && $iftar_mahfil_pre!=0)?$iftar_mahfil_pre/$iftar_mahfil_num:0,2)?>
                                </td>
                               
                                
                            </tr>
                            <tr>
                                <td class="tg-y698"> কোর্সের প্রস্তুতি সভা </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="course_num" 
                                        data-title="Enter"><?php echo $course_num=(isset( $media_shova['course_num']))? $media_shova['course_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="course_pre" 
                                        data-title="Enter"><?php echo $course_pre=(isset( $media_shova['course_pre']))? $media_shova['course_pre']:0; ?>
                                    </a>
                                 </td>
								                <td class="tg-0pky" >
                                <?php echo number_format (($course_num!=0 && $course_pre!=0)?$course_pre/$course_num:0,2)?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">  কর্মশালার প্রস্তুতি সভা </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="workshop_num" 
                                        data-title="Enter"><?php echo $workshop_num=(isset( $media_shova['workshop_num']))? $media_shova['workshop_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_shova" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="workshop_pre" 
                                        data-title="Enter"><?php echo $workshop_pre=(isset( $media_shova['workshop_pre']))? $media_shova['workshop_pre']:0; ?>
                                    </a>
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
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Media_প্রশিক্ষণ কোর্স_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                           
                                <td class="tg-pwj7" >কোর্সের ধরন</td>
                                <td class="tg-pwj7" >ক্লাস  সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি</td>
                                <td class="tg-pwj7" >গড় উপস্থিতি</td>
                               
                                
                            </tr>

                            <?php
                                $pk = (isset($media_training_course['id']))?$media_training_course['id']:'';
                            ?>
                            <tr>                                                     
                                
                                <td class="tg-y698 type_1"> উপস্থাপনা</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="presentation_num" 
                                        data-title="Enter"><?php echo $presentation_num=(isset( $media_training_course['presentation_num']))? $media_training_course['presentation_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="presentation_pre" 
                                        data-title="Enter"><?php echo $presentation_pre=(isset( $media_training_course['presentation_pre']))? $media_training_course['presentation_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($presentation_num!=0 && $presentation_pre!=0)?$presentation_pre/$presentation_num:0,2)?>
                                </td>
                                
                                </tr>

                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ক্যামেরা অপারেশন/ফটোগ্রাফি	</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="photography_num" 
                                        data-title="Enter"><?php echo $photography_num=(isset( $media_training_course['photography_num']))? $media_training_course['photography_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="photography_pre" 
                                        data-title="Enter"><?php echo $photography_pre=(isset( $media_training_course['photography_pre']))? $media_training_course['photography_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($photography_num!=0 && $photography_pre!=0)?$photography_pre/$photography_num:0,2)?>
                                </td>
                                </tr>
                                
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">রিপোর্টিং</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="reporting_num" 
                                        data-title="Enter"><?php echo $reporting_num=(isset( $media_training_course['reporting_num']))? $media_training_course['reporting_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="reporting_pre" 
                                        data-title="Enter"><?php echo $reporting_pre=(isset( $media_training_course['reporting_pre']))? $media_training_course['reporting_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($reporting_num!=0 && $reporting_pre!=0)?$reporting_pre/$reporting_num:0,2)?>
                                </td>
                               

                                </tr>

                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  মোবাইল জার্নালিজম (মোজো)	</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="mo_ja_num" 
                                        data-title="Enter"><?php echo $mo_ja_num=(isset( $media_training_course['mo_ja_num']))? $media_training_course['mo_ja_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="mo_ja_pre" 
                                        data-title="Enter"><?php echo $mo_ja_pre=(isset( $media_training_course['mo_ja_pre']))? $media_training_course['mo_ja_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($mo_ja_num!=0 && $mo_ja_pre!=0)?$mo_ja_pre/$mo_ja_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ভিডিও এডিটিং	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="video_editin_num" 
                                        data-title="Enter"><?php echo $video_editin_num=(isset( $media_training_course['video_editin_num']))? $media_training_course['video_editin_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="video_editin_pre" 
                                        data-title="Enter"><?php echo $video_editin_pre=(isset( $media_training_course['video_editin_pre']))? $media_training_course['video_editin_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($video_editin_num!=0 && $video_editin_pre!=0)?$video_editin_pre/$video_editin_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  গ্রাফিক্স ডিজাইন	</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="graphics_design_num" 
                                        data-title="Enter"><?php echo $graphics_design_num=(isset( $media_training_course['graphics_design_num']))? $media_training_course['graphics_design_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="graphics_design_pre" 
                                        data-title="Enter"><?php echo $graphics_design_pre=(isset( $media_training_course['graphics_design_pre']))? $media_training_course['graphics_design_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($graphics_design_num!=0 && $graphics_design_pre!=0)?$graphics_design_pre/$graphics_design_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ইংরেজি সাংবাদিকতা   	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="eng_journalism_num" 
                                        data-title="Enter"><?php echo $eng_journalism_num=(isset( $media_training_course['eng_journalism_num']))? $media_training_course['eng_journalism_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="eng_journalism_pre" 
                                        data-title="Enter"><?php echo $eng_journalism_pre=(isset( $media_training_course['eng_journalism_pre']))? $media_training_course['eng_journalism_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($eng_journalism_num!=0 && $eng_journalism_pre!=0)?$eng_journalism_pre/$eng_journalism_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  শুদ্ধ উচ্চারণ	</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shuddhu_uccharon_num" 
                                        data-title="Enter"><?php echo $shuddhu_uccharon_num=(isset( $media_training_course['shuddhu_uccharon_num']))? $media_training_course['shuddhu_uccharon_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shuddhu_uccharon_pre" 
                                        data-title="Enter"><?php echo $shuddhu_uccharon_pre=(isset( $media_training_course['shuddhu_uccharon_pre']))? $media_training_course['shuddhu_uccharon_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($shuddhu_uccharon_num!=0 && $shuddhu_uccharon_pre!=0)?$shuddhu_uccharon_pre/$shuddhu_uccharon_num:0,2)?>
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  ফিচার রাইটিং 	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="feature_writing_num" 
                                        data-title="Enter"><?php echo $feature_writing_num=(isset( $media_training_course['feature_writing_num']))? $media_training_course['feature_writing_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="feature_writing_pre" 
                                        data-title="Enter"><?php echo $feature_writing_pre=(isset( $media_training_course['feature_writing_pre']))? $media_training_course['feature_writing_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($feature_writing_num!=0 && $feature_writing_pre!=0)?$feature_writing_pre/$feature_writing_num:0,2)?>
                                </td>
                                
                                </td>

                                </tr>
                                <tr>                                                     
                                
                                <td class="tg-y698 type_1">  বিটভিত্তিক সাংবাদিকতা	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bit_vittik_num" 
                                        data-title="Enter"><?php echo $bit_vittik_num=(isset( $media_training_course['bit_vittik_num']))? $media_training_course['bit_vittik_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_course" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bit_vittik_pre" 
                                        data-title="Enter"><?php echo $bit_vittik_pre=(isset( $media_training_course['bit_vittik_pre']))? $media_training_course['bit_vittik_pre']:0; ?>
                                    </a>
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
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Media_প্রশিক্ষণ কর্মশালা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>                             
                              
                                <td class="tg-pwj7" >কর্মশালা ধরন</td>
                                <td class="tg-pwj7" > ক্লাস সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি </td>
                                <td class="tg-pwj7" > গড় উপস্থিতি </td>
                                
                            </tr>


                            <?php
                                $pk = (isset($media_training_workshop['id']))?$media_training_workshop['id']:'';
                            ?>

                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1">উপস্থাপনা</td>
                               
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="presentation_num" 
                                        data-title="Enter"><?php echo $presentation_num=(isset( $media_training_workshop['presentation_num']))? $media_training_workshop['presentation_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="presentation_pre" 
                                        data-title="Enter"><?php echo $presentation_pre=(isset( $media_training_workshop['presentation_pre']))? $media_training_workshop['presentation_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($presentation_num!=0 && $presentation_pre!=0)?$presentation_pre/$presentation_num:0,2)?>
                                </td>
                                
                                
                                
                            </tr>

                            <tr>
                            
                            
                                
                            <td class="tg-y698 type_1"> ক্যামেরা অপারেশন/ফটোগ্রাফি</td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="photography_num" 
                                        data-title="Enter"><?php echo $photography_num=(isset( $media_training_workshop['photography_num']))? $media_training_workshop['photography_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="photography_pre" 
                                        data-title="Enter"><?php echo $photography_pre=(isset( $media_training_workshop['photography_pre']))? $media_training_workshop['photography_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($photography_num!=0 && $photography_pre!=0)?$photography_pre/$photography_num:0,2)?>
                                </td>
                           
                            
                        </tr>

                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1">রিপোর্টিং	</td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="reporting_num" 
                                        data-title="Enter"><?php echo $reporting_num=(isset( $media_training_workshop['reporting_num']))? $media_training_workshop['reporting_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="reporting_pre" 
                                        data-title="Enter"><?php echo $reporting_pre=(isset( $media_training_workshop['reporting_pre']))? $media_training_workshop['reporting_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($reporting_num!=0 && $reporting_pre!=0)?$reporting_pre/$reporting_num:0,2)?>
                                </td>
                           
                            
                        </tr>
                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1">মোবাইল জার্নালিজম (মোজো)	</td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="mo_ja_num" 
                                        data-title="Enter"><?php echo $mo_ja_num=(isset( $media_training_workshop['mo_ja_num']))? $media_training_workshop['mo_ja_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="mo_ja_pre" 
                                        data-title="Enter"><?php echo $mo_ja_pre=(isset( $media_training_workshop['mo_ja_pre']))? $media_training_workshop['mo_ja_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($mo_ja_num!=0 && $mo_ja_pre!=0)?$mo_ja_pre/$mo_ja_num:0,2)?>
                                </td>
                            
                        </tr>
                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1">  ভিডিও এডিটিং	</td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="video_editin_num" 
                                        data-title="Enter"><?php echo $video_editin_num=(isset( $media_training_workshop['video_editin_num']))? $media_training_workshop['video_editin_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="video_editin_pre" 
                                        data-title="Enter"><?php echo $video_editin_pre=(isset( $media_training_workshop['video_editin_pre']))? $media_training_workshop['video_editin_pre']:0; ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky" >
                                <?php echo number_format (($video_editin_num!=0 && $video_editin_pre!=0)?$video_editin_pre/$video_editin_num:0,2)?>
                                </td>
                           
                            
                        </tr>
                        <tr>
                            
                            
                                
                            <td class="tg-y698 type_1"> গ্রাফিক্স ডিজাইন	</td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="graphics_design_num" 
                                        data-title="Enter"><?php echo $graphics_design_num=(isset( $media_training_workshop['graphics_design_num']))? $media_training_workshop['graphics_design_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="graphics_design_pre" 
                                        data-title="Enter"><?php echo $graphics_design_pre=(isset( $media_training_workshop['graphics_design_pre']))? $media_training_workshop['graphics_design_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($graphics_design_num!=0 && $graphics_design_pre!=0)?$graphics_design_pre/$graphics_design_num:0,2)?>
                                </td>
                            
                            
                        </tr>
                        <tr>
 
                            <td class="tg-y698 type_1"> ইংরেজি সাংবাদিকতা   </td>
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="eng_journalism_num" 
                                        data-title="Enter"><?php echo $eng_journalism_num=(isset( $media_training_workshop['eng_journalism_num']))? $media_training_workshop['eng_journalism_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="eng_journalism_pre" 
                                        data-title="Enter"><?php echo $eng_journalism_pre=(isset( $media_training_workshop['eng_journalism_pre']))? $media_training_workshop['eng_journalism_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($eng_journalism_num!=0 && $eng_journalism_pre!=0)?$eng_journalism_pre/$eng_journalism_num:0,2)?>
                                </td>
                            
                        </tr> 
                        <tr>
 
                            <td class="tg-y698 type_1"> শুদ্ধ উচ্চারণ   </td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shuddhu_uccharon_num" 
                                        data-title="Enter"><?php echo $shuddhu_uccharon_num=(isset( $media_training_workshop['shuddhu_uccharon_num']))? $media_training_workshop['shuddhu_uccharon_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shuddhu_uccharon_pre" 
                                        data-title="Enter"><?php echo $shuddhu_uccharon_pre=(isset( $media_training_workshop['shuddhu_uccharon_pre']))? $media_training_workshop['shuddhu_uccharon_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($shuddhu_uccharon_num!=0 && $shuddhu_uccharon_pre!=0)?$shuddhu_uccharon_pre/$shuddhu_uccharon_num:0,2)?>
                                </td>
                            
                        </tr> 
                        <tr>
 
                            <td class="tg-y698 type_1">ফিচার রাইটিং   </td>
                           
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="feature_writing_num" 
                                        data-title="Enter"><?php echo $feature_writing_num=(isset( $media_training_workshop['feature_writing_num']))? $media_training_workshop['feature_writing_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="feature_writing_pre" 
                                        data-title="Enter"><?php echo $feature_writing_pre=(isset( $media_training_workshop['feature_writing_pre']))? $media_training_workshop['feature_writing_pre']:0; ?>
                                    </a>
                                 </td>
								<td class="tg-0pky" >
                                <?php echo number_format (($feature_writing_num!=0 && $feature_writing_pre!=0)?$feature_writing_pre/$feature_writing_num:0,2)?>
                                </td>
                          
                            
                        </tr> 
                        <tr>
 
                            <td class="tg-y698 type_1"> বিট ভিত্তিক সাংবাদিকতা   </td>
                            <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bit_vittik_num" 
                                        data-title="Enter"><?php echo $bit_vittik_num=(isset( $media_training_workshop['bit_vittik_num']))? $media_training_workshop['bit_vittik_num']:0; ?>
                                    </a>
                                 </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="media_training_workshop" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bit_vittik_pre" 
                                        data-title="Enter"><?php echo $bit_vittik_pre=(isset( $media_training_workshop['bit_vittik_pre']))? $media_training_workshop['bit_vittik_pre']:0; ?>
                                    </a>
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
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Media_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($media_training_program['id']))?$media_training_program['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $media_training_program['shikkha_central_s']))? $media_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $media_training_program['shikkha_central_p']))? $media_training_program['shikkha_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                          {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $media_training_program['shikkha_shakha_s']))? $media_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $media_training_program['shikkha_shakha_p']))? $media_training_program['shikkha_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                          {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $media_training_program['kormoshala_central_s']))? $media_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $media_training_program['kormoshala_central_p']))? $media_training_program['kormoshala_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                          {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $media_training_program['kormoshala_shakha_s']))? $media_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="media_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $media_training_program['kormoshala_shakha_p']))? $media_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
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
