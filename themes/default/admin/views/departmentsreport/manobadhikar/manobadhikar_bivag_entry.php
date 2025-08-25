<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'মানবাধিকার বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/manobadhikar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <table class="tg table table-header-rotated" id="testTable10">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id="table_10" onclick="doit('xlsx','testTable10','<?php echo 'Human_rights_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($human_rights_training_program['id']))?$human_rights_training_program['id']:'';
                          
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
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $human_rights_training_program['shikkha_central_s']))? $human_rights_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $human_rights_training_program['shikkha_central_p']))? $human_rights_training_program['shikkha_central_p']:'' ?>
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
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $human_rights_training_program['shikkha_shakha_s']))? $human_rights_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $human_rights_training_program['shikkha_shakha_p']))? $human_rights_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $human_rights_training_program['kormoshala_central_s']))? $human_rights_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $human_rights_training_program['kormoshala_central_p']))? $human_rights_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $human_rights_training_program['kormoshala_shakha_s']))? $human_rights_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="human_rights_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $human_rights_training_program['kormoshala_shakha_p']))? $human_rights_training_program['kormoshala_shakha_p']:'' ?>
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
                                <td class="tg-pwj7" colspan=''><b>শাখার তথ্য</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id="table_1" onclick="doit('xlsx','testTable1','<?php echo 'Human_rights_শাখার তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                
                            </tr>
                            <?php
                          
                                $pk = (isset($human_rights_branch_info['id']))?$human_rights_branch_info['id']:"";
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan='' >শাখায় মানবাধিকার বিষয়ক সম্পাদক আছে কিনা?</td>
                                <td class="tg-0pky  type_1">
                                <a href="#"   id="human_rights_org_bool"  data-type="select" 
                                    data-table="human_rights_branch_info" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                    data-name="human_rights_org_bool@human_rights_branch_info"  
                                    data-title="শাখায় মানবাধিকার বিষয়ক সম্পাদক আছে কিনা?">
                                </a>
                            </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" rowspan='' >শাখার কোনো জনশক্তি স্থানীয়, জাতীয় বা আন্তর্জাতিক মানবাধিকার সংগঠনের সাথে সম্পৃক্ত আছে কিনা?</td>
                                <td>
                                <a href="#"   id="manpower_active_bool"  data-type="select" 
                                    data-table="human_rights_branch_info" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                    data-name="manpower_active_bool@human_rights_branch_info"  
                                    data-title="শাখার কোনো জনশক্তি স্থানীয়, জাতীয় বা আন্তর্জাতিক মানবাধিকার সংগঠনের সাথে সম্পৃক্ত আছে কিনা?">
                                </a>     
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >যদি থাকে তাহলে কতজন আছে?</td>
                                <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_info" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="manpower_active_number" 
                                    data-title="Enter"><?php echo $manpower_active_number=(isset( $human_rights_branch_info['manpower_active_number']))? $human_rights_branch_info['manpower_active_number']:'' ?>
                                </a>
                                </td>        
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan='2' >শাখায় মানবাধিকার বিষয়ক কমিটি আছে কিনা?</td>
                                <td>
                                <a href="#"   id="human_rights_committee"  data-type="select" 
                                    data-table="human_rights_branch_info" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                    data-name="human_rights_committee@human_rights_branch_info"  
                                    data-title="শাখায় মানবাধিকার বিষয়ক কমিটি আছে কিনা?">
                                </a>     
                                </td>      
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                            <td class="tg-pwj7" colspan='4'><b>শাখার কমিটি</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id="table_2" onclick="doit('xlsx','testTable2','<?php echo 'Human_rights_শাখার কমিটি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >কমিটির সদস্য সংখ্যা </td>
                                <td class="tg-pwj7" >সদস্য </td>
                                <td class="tg-pwj7" >সাথী</td>
                                <td class="tg-pwj7" >কর্মী</td>
                                <td class="tg-pwj7" >সমর্থক</td>
                                <td class="tg-pwj7" >শুভাকাঙ্খী</td>
                            </tr>
                            <?php
                                $pk = (isset($human_rights_branch_committee['id']))?$human_rights_branch_committee['id']:"";
                            ?>
                            <tr>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="committee_member" 
                                    data-title="Enter"><?php echo (isset( $human_rights_branch_committee['committee_member']))? $human_rights_branch_committee['committee_member']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="member" 
                                    data-title="Enter"><?php echo (isset( $human_rights_branch_committee['member']))? $human_rights_branch_committee['member']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="associate" 
                                    data-title="Enter"><?php echo (isset( $human_rights_branch_committee['associate']))? $human_rights_branch_committee['associate']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="worker" 
                                    data-title="Enter"><?php echo (isset( $human_rights_branch_committee['worker']))? $human_rights_branch_committee['worker']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="supporter" 
                                    data-title="Enter"><?php echo (isset( $human_rights_branch_committee['supporter']))? $human_rights_branch_committee['supporter']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_branch_committee" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shuva" 
                                    data-title="Enter"><?php echo (isset( $human_rights_branch_committee['shuva']))? $human_rights_branch_committee['shuva']:'' ?>
                                </a>
                                </td>
                                
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                            <td class="tg-pwj7" colspan='2'><b>প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id="table_3" onclick="doit('xlsx','testTable3','<?php echo 'Human_rights_প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                               
                            </tr>
                            <tr>

                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >মোট উপস্থিতি</td>
                            </tr>
                            <?php
                                $pk = (isset($human_rights_program['id']))?$human_rights_program['id']:"";
                            ?>
                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক কমিটির বৈঠক</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="committee_meeting_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['committee_meeting_num']))? $human_rights_program['committee_meeting_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="committee_meeting_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['committee_meeting_pre']))? $human_rights_program['committee_meeting_pre']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক প্রতিনিধি সভা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="representative_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['representative_num']))? $human_rights_program['representative_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="representative_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['representative_pre']))? $human_rights_program['representative_pre']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক কর্মশালা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="workshop_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['workshop_num']))? $human_rights_program['workshop_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="workshop_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['workshop_pre']))? $human_rights_program['workshop_pre']:'' ?>
                                </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক সংগঠনের সাথে মতাবিনিময়</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shong_mot_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['shong_mot_num']))? $human_rights_program['shong_mot_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shong_mot_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['shong_mot_pre']))? $human_rights_program['shong_mot_pre']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার কর্মীদের সাথে মতবিনিময়</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormi_mot_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['kormi_mot_num']))? $human_rights_program['kormi_mot_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormi_mot_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['kormi_mot_pre']))? $human_rights_program['kormi_mot_pre']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার বিষয়ক সেমিনার/ আলোচনা সভা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="seminer_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['seminer_num']))? $human_rights_program['seminer_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="seminer_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['seminer_pre']))? $human_rights_program['seminer_pre']:'' ?>
                                </a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">মানবাধিকার সম্পর্কিত দিবস পালন</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_days_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['hr_days_num']))? $human_rights_program['hr_days_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_days_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_program['hr_days_pre']))? $human_rights_program['hr_days_pre']:'' ?>
                                </a>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                            <td class="tg-pwj7" colspan='4'><b>মানবাধিকার লংঘন পরিসংখ্যান</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id="table_4" onclick="doit('xlsx','testTable4','<?php echo 'Human_rights_মানবাধিকার লংঘন পরিসংখ্যান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >বিষয়</td>
                                <td class="tg-pwj7" >   ঘটনার সংখ্যা </td>
                                <td class="tg-pwj7" >নিহত</td>
                                <td class="tg-pwj7" >আহত</td>
                                <td class="tg-pwj7" >আটক</td>     
                            </tr>
                            <?php
                                $pk = (isset($human_rights_violation['id']))?$human_rights_violation['id']:"";
                            ?>
                            <tr>
                                <td class="tg-pwj7 type_1">বিচার বহির্ভূত হত্যা</td>

                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="bichar_bohi_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['bichar_bohi_num']))? $human_rights_violation['bichar_bohi_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="bichar_bohi_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['bichar_bohi_murder']))? $human_rights_violation['bichar_bohi_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="bichar_bohi_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['bichar_bohi_wound']))? $human_rights_violation['bichar_bohi_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="bichar_bohi_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['bichar_bohi_atok']))? $human_rights_violation['bichar_bohi_atok']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">রাজনৈতিক সহিংসতা</td>

                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['political_num']))? $human_rights_violation['political_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['political_murder']))? $human_rights_violation['political_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['political_wound']))? $human_rights_violation['political_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="political_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['political_atok']))? $human_rights_violation['political_atok']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">ধর্ষণ </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="rape_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['rape_num']))? $human_rights_violation['rape_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="rape_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['rape_murder']))? $human_rights_violation['rape_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="rape_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['rape_wound']))? $human_rights_violation['rape_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="rape_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['rape_atok']))? $human_rights_violation['rape_atok']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">শিশু/নারী নির্যাতন</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kid_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['kid_num']))? $human_rights_violation['kid_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kid_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['kid_murder']))? $human_rights_violation['kid_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kid_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['kid_wound']))? $human_rights_violation['kid_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kid_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['kid_atok']))? $human_rights_violation['kid_atok']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">গুম</td>

                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="gum_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['gum_num']))? $human_rights_violation['gum_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="gum_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['gum_murder']))? $human_rights_violation['gum_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="gum_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['gum_wound']))? $human_rights_violation['gum_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="gum_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['gum_atok']))? $human_rights_violation['gum_atok']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">সাংবাদিক নির্যাতন</td>

                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="sangbadik_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['sangbadik_num']))? $human_rights_violation['sangbadik_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="sangbadik_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['sangbadik_murder']))? $human_rights_violation['sangbadik_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="sangbadik_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['sangbadik_wound']))? $human_rights_violation['sangbadik_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="sangbadik_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['sangbadik_atok']))? $human_rights_violation['sangbadik_atok']:'' ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">সীমান্তে হত্যা</td>

                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="border_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['border_num']))? $human_rights_violation['border_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="border_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['border_murder']))? $human_rights_violation['border_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="border_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['border_wound']))? $human_rights_violation['border_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="border_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['border_atok']))? $human_rights_violation['border_atok']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 type_1">সংখ্যালঘু নির্যাতন</td>

                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="minority_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['minority_num']))? $human_rights_violation['minority_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="minority_murder" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['minority_murder']))? $human_rights_violation['minority_murder']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="minority_wound" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['minority_wound']))? $human_rights_violation['minority_wound']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_violation" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="minority_atok" 
                                    data-title="Enter"><?php echo (isset( $human_rights_violation['minority_atok']))? $human_rights_violation['minority_atok']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='6'><b>*শুধুমাত্র নিজ শাখার অধীনস্ত এলাকার মানবাধিকার লংঘনের পরিসংখ্যান প্রদান করুন।</b></td>
                            </tr>
                            <tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                            <td class="tg-pwj7" colspan='2'><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id="table_5" onclick="doit('xlsx','testTable5','<?php echo 'Human_rights_যোগাযোগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার সম্পর্কিত ব্যক্তিবর্গ	</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >বার</td>
                            </tr>
                            <?php
                                $pk = (isset($human_rights_contact['id']))?$human_rights_contact['id']:"";
                            ?>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার কর্মী	</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_worker_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['hr_worker_num']))? $human_rights_contact['hr_worker_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_worker_count" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['hr_worker_count']))? $human_rights_contact['hr_worker_count']:'' ?>
                                </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার সংগঠন	</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_org_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['hr_org_num']))? $human_rights_contact['hr_org_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_org_count" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['hr_org_count']))? $human_rights_contact['hr_org_count']:'' ?>
                                </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >সুশীল সমাজের প্রতিনিধি (শিক্ষক, বুদ্ধিজীবী)	</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shushil_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['shushil_num']))? $human_rights_contact['shushil_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shushil_count" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['shushil_count']))? $human_rights_contact['shushil_count']:'' ?>
                                </a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >আইনজীবী</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="lawyer_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['lawyer_num']))? $human_rights_contact['lawyer_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_contact" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="lawyer_count" 
                                    data-title="Enter"><?php echo (isset( $human_rights_contact['lawyer_count']))? $human_rights_contact['lawyer_count']:'' ?>
                                </a>
                                </td>
                                
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                            <td class="tg-pwj7" colspan='2'><b>বিবিধ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id="table_6" onclick="doit('xlsx','testTable6','<?php echo 'Human_rights_বিবিধ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >বার</td>
                            </tr>
                            <?php
                                $pk = (isset($human_rights_miscellaneous['id']))?$human_rights_miscellaneous['id']:"";
                            ?>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার বিষয়ে আইনী সহায়তা প্রদান করা হয়েছে কতজনকে?	</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_miscellaneous" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_help_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_miscellaneous['law_help_num']))? $human_rights_miscellaneous['law_help_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_miscellaneous" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="law_help_count" 
                                    data-title="Enter"><?php echo (isset( $human_rights_miscellaneous['law_help_count']))? $human_rights_miscellaneous['law_help_count']:'' ?>
                                </a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার লংঘনের ঘটনার তদন্ত করা হয়েছে কতটি?</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_miscellaneous" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_violation_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_miscellaneous['hr_violation_num']))? $human_rights_miscellaneous['hr_violation_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_miscellaneous" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hr_violation_count" 
                                    data-title="Enter"><?php echo (isset( $human_rights_miscellaneous['hr_violation_count']))? $human_rights_miscellaneous['hr_violation_count']:'' ?>
                                </a>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable7">
                            <tr>
                            <td class="tg-pwj7" colspan='6'><b>আউটপুট রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id="table_7" onclick="doit('xlsx','testTable7','<?php echo 'Human_rights_আউটপুট রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            
                            <tr>	
                                <td class="tg-pwj7" rowspan='2'>জনবল সরবরাহের সেক্টর</td>
                                <td class="tg-pwj7" colspan='2'>সেক্টরভিত্তিক জনশক্তি বাছাই সংখ্যা </td>
                                <td class="tg-pwj7" colspan='2'>মোটিভেশনাল প্রোগ্রাম</td>
                                <td class="tg-pwj7" colspan='2'>প্রাতিষ্ঠানিক প্রশিক্ষণ গ্রহণ</td>
                                <td class="tg-pwj7" colspan='2'>প্রতিযোগিতামূলক পরীক্ষার ফলাফল</td>
                            </tr>
                            <tr>				
                                <td class="tg-pwj7" >টার্গেট </td>
                                <td class="tg-pwj7" > বাছাই</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি</td>
                                <td class="tg-pwj7" >সাংগঠনিক</td>
                                <td class="tg-pwj7" >সাধারণ</td>
                                <td class="tg-pwj7" >অংশগ্রহণ</td>
                                <td class="tg-pwj7" >উত্তীর্ণ সংখ্যা</td>
                            </tr>
                            <?php
                                $pk = (isset($human_rights_output['id']))?$human_rights_output['id']:"";
                            ?>
                            <tr>
                                <td class="tg-pwj7" >মানবাধিকার কর্মকর্তা</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_sec_ter" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_sec_ter']))? $human_rights_output['officer_sec_ter']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_sec_bachai" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_sec_bachai']))? $human_rights_output['officer_sec_bachai']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_mot_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_mot_num']))? $human_rights_output['officer_mot_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_mot_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_mot_pre']))? $human_rights_output['officer_mot_pre']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_pra_shang" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_pra_shang']))? $human_rights_output['officer_pra_shang']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_pra_shadha" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_pra_shadha']))? $human_rights_output['officer_pra_shadha']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_xm_attend" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_xm_attend']))? $human_rights_output['officer_xm_attend']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="officer_xm_pass" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['officer_xm_pass']))? $human_rights_output['officer_xm_pass']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>				
                                <td class="tg-pwj7" >ইন্টার্নশিপ</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_sec_ter" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_sec_ter']))? $human_rights_output['intern_sec_ter']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_sec_bachai" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_sec_bachai']))? $human_rights_output['intern_sec_bachai']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_mot_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_mot_num']))? $human_rights_output['intern_mot_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_mot_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_mot_pre']))? $human_rights_output['intern_mot_pre']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_pra_shang" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_pra_shang']))? $human_rights_output['intern_pra_shang']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_pra_shadha" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_pra_shadha']))? $human_rights_output['intern_pra_shadha']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_xm_attend" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_xm_attend']))? $human_rights_output['intern_xm_attend']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intern_xm_pass" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['intern_xm_pass']))? $human_rights_output['intern_xm_pass']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>				
                                <td class="tg-pwj7" >ভলান্টিয়ার/স্বেচ্ছাসেবক</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_sec_ter" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_sec_ter']))? $human_rights_output['volunteer_sec_ter']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_sec_bachai" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_sec_bachai']))? $human_rights_output['volunteer_sec_bachai']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_mot_num" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_mot_num']))? $human_rights_output['volunteer_mot_num']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_mot_pre" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_mot_pre']))? $human_rights_output['volunteer_mot_pre']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_pra_shang" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_pra_shang']))? $human_rights_output['volunteer_pra_shang']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_pra_shadha" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_pra_shadha']))? $human_rights_output['volunteer_pra_shadha']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_xm_attend" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_xm_attend']))? $human_rights_output['volunteer_xm_attend']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="human_rights_output" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="volunteer_xm_pass" 
                                    data-title="Enter"><?php echo (isset( $human_rights_output['volunteer_xm_pass']))? $human_rights_output['volunteer_xm_pass']:'' ?>
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

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script>

$(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.fn.editable.defaults.ajaxOptions = {type: "get"}
$('#human_rights_org_bool').editable({
    value: <?php echo (isset( $human_rights_branch_info['human_rights_org_bool']))? $human_rights_branch_info['human_rights_org_bool']:2; ?>,    
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
    },
       headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
});

$('#manpower_active_bool').editable({
    value: <?php echo (isset( $human_rights_branch_info['manpower_active_bool']))? $human_rights_branch_info['manpower_active_bool']:2; ?>,    
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