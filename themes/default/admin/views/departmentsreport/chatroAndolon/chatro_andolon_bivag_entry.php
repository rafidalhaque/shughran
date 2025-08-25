<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'ছাত্র অধিকার বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/chatro-andolon-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
            
<!-- ====== Report serial code ======= --> 
<?php 
// This function renders a department report form with serial number information
// based on the branch, report, department, and user roles provided.
render_dept_report_serial_form($branch_id, $report_info, $department_id, $serial_info, $this->Owner, $this->Admin, $this->departmentuser); 
?>
<!-- ====== /. Report serial code ===== -->
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable5">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Stu_Movement_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <?php
                            $pk = (isset($chatroandolon_training_program['id']))?$chatroandolon_training_program['id']:'';
                            
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
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="shikkha_central_s" 
                                data-title="Enter">
                                <?php echo $shikkha_central_s=(isset( $chatroandolon_training_program['shikkha_central_s']))? $chatroandolon_training_program['shikkha_central_s']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="shikkha_central_p" 
                                data-title="Enter">
                                <?php echo $shikkha_central_p=(isset( $chatroandolon_training_program['shikkha_central_p']))? $chatroandolon_training_program['shikkha_central_p']:'' ?>
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
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="shikkha_shakha_s" 
                                data-title="Enter">
                                <?php echo $shikkha_shakha_s=(isset( $chatroandolon_training_program['shikkha_shakha_s']))? $chatroandolon_training_program['shikkha_shakha_s']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="shikkha_shakha_p" 
                                data-title="Enter">
                                <?php echo $shikkha_shakha_p=(isset( $chatroandolon_training_program['shikkha_shakha_p']))? $chatroandolon_training_program['shikkha_shakha_p']:'' ?>
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
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="kormoshala_central_s" 
                                data-title="Enter">
                                <?php echo $kormoshala_central_s=(isset( $chatroandolon_training_program['kormoshala_central_s']))? $chatroandolon_training_program['kormoshala_central_s']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="kormoshala_central_p" 
                                data-title="Enter">
                                <?php echo $kormoshala_central_p=(isset( $chatroandolon_training_program['kormoshala_central_p']))? $chatroandolon_training_program['kormoshala_central_p']:'' ?>
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
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="kormoshala_shakha_s" 
                                data-title="Enter">
                                <?php echo $kormoshala_shakha_s=(isset( $chatroandolon_training_program['kormoshala_shakha_s']))? $chatroandolon_training_program['kormoshala_shakha_s']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_2">
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                data-table="chatroandolon_training_program" data-pk="<?php echo $pk ?>"
                                data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="kormoshala_shakha_p" 
                                data-title="Enter">
                                <?php echo $kormoshala_shakha_p=(isset( $chatroandolon_training_program['kormoshala_shakha_p']))? $chatroandolon_training_program['kormoshala_shakha_p']:'' ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>    
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>সংগঠন</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Stu_Movement_সংগঠন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>			
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >সংগঠন সংখ্যা</td>
                                <td class="tg-pwj7" >রেজিস্টার্ড   </td>
                                <td class="tg-pwj7" >নন-রেজিস্টার্ড </td>
                                <td class="tg-pwj7">বৃদ্ধি সংখ্যা </td>
                                <td class="tg-pwj7" >ঘাটতি সংখ্যা</td>
                                <td class="tg-pwj7" >কার্যক্রম চালু আছে কতটির?</td>
                            </tr>
                            <?php
                            $pk = (isset($chatroandolon_songothon['id']))?$chatroandolon_songothon['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> প্রতিষ্ঠানে পার্শ্ব সংগঠন সংক্রান্ত 	</td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="side_ss" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['side_ss']))? $chatroandolon_songothon['side_ss']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="side_reg" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['side_reg']))? $chatroandolon_songothon['side_reg']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="side_n_reg" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['side_n_reg']))? $chatroandolon_songothon['side_n_reg']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="side_inc" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['side_inc']))? $chatroandolon_songothon['side_inc']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="side_dec" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['side_dec']))? $chatroandolon_songothon['side_dec']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="side_act" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['side_act']))? $chatroandolon_songothon['side_act']:'' ?>
                                </a>
                                </td>
                              

                            </tr>


                            <tr>
                                <td class="tg-y698">বেইজ এরিয়ায় সামাজিক সংগঠন সংক্রান্ত তথ্য</td>
                                
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="social_ss" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['social_ss']))? $chatroandolon_songothon['social_ss']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="social_reg" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['social_reg']))? $chatroandolon_songothon['social_reg']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="social_n_reg" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['social_n_reg']))? $chatroandolon_songothon['social_n_reg']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="social_inc" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['social_inc']))? $chatroandolon_songothon['social_inc']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="social_dec" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['social_dec']))? $chatroandolon_songothon['social_dec']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="chatroandolon_songothon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="social_act" 
                                    data-title="Enter"><?php echo $other_ap=(isset( $chatroandolon_songothon['social_act']))? $chatroandolon_songothon['social_act']:'' ?>
                                </a>
                                </td>
                              
                            </tr>
                   </table>
                   <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>শিক্ষাপ্রতিষ্ঠানের তথ্য</b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Stu_Movement_শিক্ষাপ্রতিষ্ঠানের তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                                <td class="tg-pwj7" colspan="">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-chatroandolon-institution/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>	
                            <tr>
                                
                                <td class="tg-pwj7" rowspan='2'>গুরুত্বপূর্ণ শিক্ষাপ্রতিষ্ঠানের নাম</td>
                                <td class="tg-pwj7" rowspan='2'>আমাদের সংগঠনের মান</td>
                                <td class="tg-pwj7" colspan='3'>অন্যান্য গুরুত্বপূর্ণ সংগঠনের কমিটি আছে কিনা?  </td>
                                <td class="tg-pwj7" colspan='' rowspan='2'>Actions </td>
                                
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> ছাত্রলীগ</td>
                                <td class="tg-y698   type_1"> ছাত্রদল	</td>
                                <td class="tg-y698  type_2"> বাম সংগঠন </td>

                            </tr>

                          
                   <?php 
                                $i=0;
                            foreach($chatroandolon_institution->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                   
                                    <td class="tg-0pky type_1"><?php echo $row['ins_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['son_type'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['comm_lig'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comm_dol'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comm_left'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-chatroandolon-institution/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@chatroandolon_institution@".$row['ins_name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                   </table>
                   <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>ছাত্রসংসদ</b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Stu_Movement_ছাত্রসংসদ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                                <td class="tg-pwj7" colspan="">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-chatroandolon-sonsod/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>						
                            <tr>
                            
                                <td class="tg-pwj7" >গুরুত্বপূর্ণ শিক্ষাপ্রতিষ্ঠানের নাম</td>
                                <td class="tg-pwj7" >ছাত্রসংসদ কার্যকর আছে কিনা? (হ্যাঁ/না)</td>
                                <td class="tg-pwj7" >সর্বশেষ নির্বাচন হয়েছে কত সালে?  </td>
                                <td class="tg-pwj7" >ছাত্রসংসদ কার্যকর থাকলে কোন সংগঠনের নিয়ন্ত্রণে আছে? </td>
                                <td class="tg-pwj7">পরবর্তী নির্বাচনে আমাদের প্যানেল ঘোষণার প্রস্তুতি আছে কিনা? </td>
                                <td class="tg-pwj7">Actions </td>
                                
                            </tr>


                            <?php 
                                $i=0;
                            foreach($chatroandolon_sonsod->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    
                                    <td class="tg-0pky type_1"><?php echo $row['imp_ins'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['sonsod_act'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sonsod_vote'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['sonsod_rulling_party'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['next_sonsod_panel'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-chatroandolon-sonsod/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@chatroandolon_sonsod@".$row['imp_ins']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                          
                   </table>

                   <table class="tg table table-header-rotated" id="testTable4">	 	
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Stu_Movement_যোগাযোগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>				
                            <tr>
                                <td class="tg-pwj7" >বিবরণ</td>
                                <td class="tg-pwj7" >শিক্ষক</td>
                                <td class="tg-pwj7" >কর্মকর্তা   </td>
                                <td class="tg-pwj7" >কর্মচারী </td>
                                <td class="tg-pwj7">আবাসিক সুধী </td>
                                <td class="tg-pwj7" >বন্ধু সংগঠনের সাথে</td>
                                
                            </tr>

                            <?php
                            $pk = (isset($chatroandolon_bivag_jogajog['id']))?$chatroandolon_bivag_jogajog['id']:'';
                            ?>


                            <tr>
                                <td class="tg-y698 type_1"> কতজন 	</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kj_shi" data-title="Enter"><?php echo $kj_shi=  (isset( $chatroandolon_bivag_jogajog['kj_shi']))? $chatroandolon_bivag_jogajog['kj_shi']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kj_kmkt" data-title="Enter"><?php echo $kj_kmkt=  (isset( $chatroandolon_bivag_jogajog['kj_kmkt']))? $chatroandolon_bivag_jogajog['kj_kmkt']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kj_koca" data-title="Enter"><?php echo $kj_koca=  (isset( $chatroandolon_bivag_jogajog['kj_koca']))? $chatroandolon_bivag_jogajog['kj_koca']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kj_assu" data-title="Enter"><?php echo $kj_assu=  (isset( $chatroandolon_bivag_jogajog['kj_assu']))? $chatroandolon_bivag_jogajog['kj_assu']:'' ?></a>
                                </td>
                                <td class="tg-0pky  type_5">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kj_bnsgsa" data-title="Enter"><?php echo $kj_bnsgsa=  (isset( $chatroandolon_bivag_jogajog['kj_bnsgsa']))? $chatroandolon_bivag_jogajog['kj_bnsgsa']:'' ?></a>
                                </td>
                             
                              

                            </tr>


                            <tr>
                                <td class="tg-y698">কতবার </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_shi" data-title="Enter"><?php echo $kb_shi=  (isset( $chatroandolon_bivag_jogajog['kb_shi']))? $chatroandolon_bivag_jogajog['kb_shi']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_kmkt" data-title="Enter"><?php echo $kb_kmkt=  (isset( $chatroandolon_bivag_jogajog['kb_kmkt']))? $chatroandolon_bivag_jogajog['kb_kmkt']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_koca" data-title="Enter"><?php echo $kb_koca=  (isset( $chatroandolon_bivag_jogajog['kb_koca']))? $chatroandolon_bivag_jogajog['kb_koca']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_assu" data-title="Enter"><?php echo $kb_assu=  (isset( $chatroandolon_bivag_jogajog['kb_assu']))? $chatroandolon_bivag_jogajog['kb_assu']:'' ?></a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" data-table="chatroandolon_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_bnsgsa" data-title="Enter"><?php echo $kb_bnsgsa=  (isset( $chatroandolon_bivag_jogajog['kb_bnsgsa']))? $chatroandolon_bivag_jogajog['kb_bnsgsa']:'' ?></a>
                                </td>
                              
                            </tr>
                            <tr>
                             
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
    .action_class{
    color:white;
}
.action_class:hover{
    color:white;
    text-decoration:none;
}
</style>

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