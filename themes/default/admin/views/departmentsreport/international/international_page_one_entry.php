<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আন্তর্জাতিক বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/international-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'International_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($international_training_program['id']))?$international_training_program['id']:'';
                          
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
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $international_training_program['shikkha_central_s']))? $international_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $international_training_program['shikkha_central_p']))? $international_training_program['shikkha_central_p']:'' ?>
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
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $international_training_program['shikkha_shakha_s']))? $international_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $international_training_program['shikkha_shakha_p']))? $international_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $international_training_program['kormoshala_central_s']))? $international_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $international_training_program['kormoshala_central_p']))? $international_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $international_training_program['kormoshala_shakha_s']))? $international_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="international_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $international_training_program['kormoshala_shakha_p']))? $international_training_program['kormoshala_shakha_p']:'' ?>
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
                                <td class="tg-pwj7" colspan='2'><b>উচ্চশিক্ষা সংক্রান্ত প্রোগ্রামের নাম </b></td>
                                <td class="tg-pwj7" colspan="">
                                        <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'International_উচ্চশিক্ষা সংক্রান্ত প্রোগ্রামের নাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি/অংশগ্রহণ</td>
                            </tr>
                            <?php
                                $pk = (isset($international_higher_study_program['id']))?$international_higher_study_program['id']:'';

                                ?>

                            <tr>
                                <td class="tg-pwj7">ক্যারিয়ার গাইডলাইন প্রোগ্রাম (শাখায় আয়োজিত) </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cgps_number" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['cgps_number']))? $international_higher_study_program['cgps_number']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cgps_present" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['cgps_present']))? $international_higher_study_program['cgps_present']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্যারিয়ার গাইডলাইন প্রোগ্রামে অংশগ্রহণ (কেন্দ্র আয়োজিত)</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cgpsac_number" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['cgpsac_number']))? $international_higher_study_program['cgpsac_number']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cgpsac_present" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['cgpsac_present']))? $international_higher_study_program['cgpsac_present']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্যারিয়ার গাইডলাইন প্রোগ্রামে অংশগ্রহণ (অন্যান্যদের আয়োজিত)</td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cgpsao_number" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['cgpsao_number']))? $international_higher_study_program['cgpsao_number']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cgpsao_present" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['cgpsao_present']))? $international_higher_study_program['cgpsao_present']:'' ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">আন্তর্জাতিক কনফারেন্সে অংশগ্রহণ </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intconf_number" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['intconf_number']))? $international_higher_study_program['intconf_number']:'' ?>
                                </a>
                                </td>
                                <td class="tg-0pky">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="international_higher_study_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="intconf_present" 
                                    data-title="Enter"><?php echo (isset( $international_higher_study_program['intconf_present']))? $international_higher_study_program['intconf_present']:'' ?>
                                </a>
                                </td>
                            </tr>
                        </table> 
  
                     
                        <table class="tg table table-header-rotated" id="testTable2">
                                <tr>
                                    <td class="tg-pwj7" colspan='4'><b>জনশক্তির ভাষাশিক্ষা সংক্রান্ত </b></td>
                                    <td class="tg-pwj7" colspan="2">
                                        <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'International_জনশক্তির ভাষাশিক্ষা সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" rowspan="2">ভাষা</td>
                                    <td class="tg-pwj7" colspan="2">শাখা আয়োজিত ভাষাশিক্ষা কোর্সের বিবরণ </td>
                                    <td class="tg-pwj7" colspan="3">যতজন শিখেছেন </td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-pwj7"><div><span>কোর্স সংখ্যা </span></div></td>
                                    <td class="tg-pwj7"><div><span>অংশগ্রহনকারী সংখ্যা </span></div></td>
                                    <td class="tg-pwj7"><div><span>আমাদের আয়োজিত কোর্স থেকে</span></div></td>
                                    <td class="tg-pwj7"><div><span>অন্যান্য প্রতিষ্ঠান থেকে </span></div></td>
                                    <td class="tg-pwj7"><div><span>মোট </span></div></td>
                                </tr>

                                <?php
                                $pk = (isset($international_language_learn['id']))?$international_language_learn['id']:'';

                                $a_number=0;
                                $c_number=0;
                                $aa_number=0;
                                $ap_number=0;
                            ?>
                         }
                                <tr>
                                    <td class="tg-y698 type_1"> আরবি</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="arabic_c_number" 
                                        data-title="Enter"><?php echo $arabic_c=(isset( $international_language_learn['arabic_c_number']))? $international_language_learn['arabic_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="arabic_a_number" 
                                        data-title="Enter"><?php echo $arabic_a=(isset( $international_language_learn['arabic_a_number']))? $international_language_learn['arabic_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="arabic_aa_number" 
                                        data-title="Enter"><?php echo $arabic_aa=(isset( $international_language_learn['arabic_aa_number']))? $international_language_learn['arabic_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="arabic_ap_number" 
                                        data-title="Enter"><?php echo $arabic_ap=(isset( $international_language_learn['arabic_ap_number']))? $international_language_learn['arabic_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php  echo($pk>0)?$arabic_ap+$arabic_aa:"0";?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                    $c_number=$c_number+$arabic_c;
                                    $a_number=$a_number+$arabic_a;
                                    $aa_number=$aa_number+$arabic_aa;
                                    $ap_number=$ap_number+$arabic_ap;
                                    }
                                     
                                    ?>
                                </tr>


                                <tr>
                                    <td class="tg-y698"> ইংরেজি  </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="english_c_number" 
                                        data-title="Enter"><?php echo $english_c=(isset( $international_language_learn['english_c_number']))? $international_language_learn['english_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="english_a_number" 
                                        data-title="Enter"><?php echo $english_a=(isset( $international_language_learn['english_a_number']))? $international_language_learn['english_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="english_aa_number" 
                                        data-title="Enter"><?php echo $english_aa=(isset( $international_language_learn['english_aa_number']))? $international_language_learn['english_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="english_ap_number" 
                                        data-title="Enter"><?php echo $english_ap=(isset( $international_language_learn['english_ap_number']))? $international_language_learn['english_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$english_ap+$english_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$english_c;
                                    $a_number=$a_number+$english_a;
                                    $aa_number=$aa_number+$english_aa;
                                    $ap_number=$ap_number+$english_ap;
                                    }
                                    ?>
                                </tr>

                                <tr>
                                    <td class="tg-y698"> চাইনিজ </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="chin_c_number" 
                                        data-title="Enter"><?php echo $chin_c=(isset( $international_language_learn['chin_c_number']))? $international_language_learn['chin_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="chin_a_number" 
                                        data-title="Enter"><?php echo $chin_a=(isset( $international_language_learn['chin_a_number']))? $international_language_learn['chin_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="chin_aa_number" 
                                        data-title="Enter"><?php echo $chin_aa=(isset( $international_language_learn['chin_aa_number']))? $international_language_learn['chin_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="chin_ap_number" 
                                        data-title="Enter"><?php echo $chin_ap=(isset( $international_language_learn['chin_ap_number']))? $international_language_learn['chin_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo($pk>0)? $chin_ap+$chin_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$chin_c;
                                    $a_number=$a_number+$chin_a;
                                    $aa_number=$aa_number+$chin_aa;
                                    $ap_number=$ap_number+$chin_ap;
                                    }
                                    ?>
                                </tr>


                                <tr>
                                    <td class="tg-y698">হিন্দি</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="hindi_c_number" 
                                        data-title="Enter"><?php echo $hindi_c=(isset( $international_language_learn['hindi_c_number']))? $international_language_learn['hindi_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="hindi_a_number" 
                                        data-title="Enter"><?php echo $hindi_a=(isset( $international_language_learn['hindi_a_number']))? $international_language_learn['hindi_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="hindi_aa_number" 
                                        data-title="Enter"><?php echo $hindi_aa=(isset( $international_language_learn['hindi_aa_number']))? $international_language_learn['hindi_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="hindi_ap_number" 
                                        data-title="Enter"><?php echo $hindi_ap=(isset( $international_language_learn['hindi_ap_number']))? $international_language_learn['hindi_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo($pk>0)? $hindi_ap+$hindi_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$hindi_c;
                                    $a_number=$a_number+$hindi_a;
                                    $aa_number=$aa_number+$hindi_aa;
                                    $ap_number=$ap_number+$hindi_ap;
                                    }
                                    ?>
                                </tr>

                                <tr>
                                    <td class="tg-y698">উর্দু</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="urdu_c_number" 
                                        data-title="Enter"><?php echo $urdu_c=(isset( $international_language_learn['urdu_c_number']))? $international_language_learn['urdu_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="urdu_a_number" 
                                        data-title="Enter"><?php echo $urdu_a=(isset( $international_language_learn['urdu_a_number']))? $international_language_learn['urdu_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="urdu_aa_number" 
                                        data-title="Enter"><?php echo $urdu_aa=(isset( $international_language_learn['urdu_aa_number']))? $international_language_learn['urdu_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="urdu_ap_number" 
                                        data-title="Enter"><?php echo $urdu_ap=(isset( $international_language_learn['urdu_ap_number']))? $international_language_learn['urdu_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$urdu_ap+$urdu_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$urdu_c;
                                    $a_number=$a_number+$urdu_a;
                                    $aa_number=$aa_number+$urdu_aa;
                                    $ap_number=$ap_number+$urdu_ap;
                                    }
                                    ?>
                                </tr>
               
                                <tr>
                                    <td class="tg-y698">ফার্সি</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="farsi_c_number" 
                                        data-title="Enter"><?php echo $farsi_c=(isset( $international_language_learn['farsi_c_number']))? $international_language_learn['farsi_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="farsi_a_number" 
                                        data-title="Enter"><?php echo $farsi_a=(isset( $international_language_learn['farsi_a_number']))? $international_language_learn['farsi_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="farsi_aa_number" 
                                        data-title="Enter"><?php echo $farsi_aa=(isset( $international_language_learn['farsi_aa_number']))? $international_language_learn['farsi_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="farsi_ap_number" 
                                        data-title="Enter"><?php echo $farsi_ap=(isset( $international_language_learn['farsi_ap_number']))? $international_language_learn['farsi_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$farsi_ap+$farsi_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$farsi_c;
                                    $a_number=$a_number+$farsi_a;
                                    $aa_number=$aa_number+$farsi_aa;
                                    $ap_number=$ap_number+$farsi_ap;
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="tg-y698">স্পেনিশ</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="span_c_number" 
                                        data-title="Enter"><?php echo $span_c=(isset( $international_language_learn['span_c_number']))? $international_language_learn['span_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="span_a_number" 
                                        data-title="Enter"><?php echo $span_a=(isset( $international_language_learn['span_a_number']))? $international_language_learn['span_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="span_aa_number" 
                                        data-title="Enter"><?php echo $span_aa=(isset( $international_language_learn['span_aa_number']))? $international_language_learn['span_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="span_ap_number" 
                                        data-title="Enter"><?php echo $span_ap=(isset( $international_language_learn['span_ap_number']))? $international_language_learn['span_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$span_ap+$span_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$span_c;
                                    $a_number=$a_number+$span_a;
                                    $aa_number=$aa_number+$span_aa;
                                    $ap_number=$ap_number+$span_ap;
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="tg-y698">ফ্রেঞ্চ</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="fren_c_number" 
                                        data-title="Enter"><?php echo $fren_c=(isset( $international_language_learn['fren_c_number']))? $international_language_learn['fren_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="fren_a_number" 
                                        data-title="Enter"><?php echo $fren_a=(isset( $international_language_learn['fren_a_number']))? $international_language_learn['fren_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="fren_aa_number" 
                                        data-title="Enter"><?php echo $fren_aa=(isset( $international_language_learn['fren_aa_number']))? $international_language_learn['fren_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="fren_ap_number" 
                                        data-title="Enter"><?php echo $fren_ap=(isset( $international_language_learn['fren_ap_number']))? $international_language_learn['fren_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$fren_ap+$fren_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$fren_c;
                                    $a_number=$a_number+$fren_a;
                                    $aa_number=$aa_number+$fren_aa;
                                    $ap_number=$ap_number+$fren_ap;
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="tg-y698">জার্মান </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="german_c_number" 
                                        data-title="Enter"><?php echo $german_c=(isset( $international_language_learn['german_c_number']))? $international_language_learn['german_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="german_a_number" 
                                        data-title="Enter"><?php echo $german_a=(isset( $international_language_learn['german_a_number']))? $international_language_learn['german_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="german_aa_number" 
                                        data-title="Enter"><?php echo $german_aa=(isset( $international_language_learn['german_aa_number']))? $international_language_learn['german_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="german_ap_number" 
                                        data-title="Enter"><?php echo $german_ap=(isset( $international_language_learn['german_ap_number']))? $international_language_learn['german_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo($pk>0)? $german_ap+$german_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$german_c;
                                    $a_number=$a_number+$german_a;
                                    $aa_number=$aa_number+$german_aa;
                                    $ap_number=$ap_number+$german_ap;
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="tg-y698">তুর্কি</td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="turkey_c_number" 
                                        data-title="Enter"><?php echo $turkey_c=(isset( $international_language_learn['turkey_c_number']))? $international_language_learn['turkey_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="turkey_a_number" 
                                        data-title="Enter"><?php echo $turkey_a=(isset( $international_language_learn['turkey_a_number']))? $international_language_learn['turkey_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="turkey_aa_number" 
                                        data-title="Enter"><?php echo $turkey_aa=(isset( $international_language_learn['turkey_aa_number']))? $international_language_learn['turkey_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="turkey_ap_number" 
                                        data-title="Enter"><?php echo $turkey_ap=(isset( $international_language_learn['turkey_ap_number']))? $international_language_learn['turkey_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$turkey_ap+$turkey_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$turkey_c;
                                    $a_number=$a_number+$turkey_a;
                                    $aa_number=$aa_number+$turkey_aa;
                                    $ap_number=$ap_number+$turkey_ap;
                                    }
                                    ?>
                                </tr>

                             
                                <tr>
                                    <td class="tg-y698">অন্যান্য </td>
                                    <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="other_c_number" 
                                        data-title="Enter"><?php echo $other_c=(isset( $international_language_learn['other_c_number']))? $international_language_learn['other_c_number']:'' ?>
                                    </a>
                                    </td>

                                    <td class="tg-0pky  type_2">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="other_a_number" 
                                        data-title="Enter"><?php echo $other_a=(isset( $international_language_learn['other_a_number']))? $international_language_learn['other_a_number']:'' ?>
                                    </a>
                                    </td>
                                    
                                    <td class="tg-0pky  type_4">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="other_aa_number" 
                                        data-title="Enter"><?php echo $other_aa=(isset( $international_language_learn['other_aa_number']))? $international_language_learn['other_aa_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="international_language_learn" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="other_ap_number" 
                                        data-title="Enter"><?php echo $other_ap=(isset( $international_language_learn['other_ap_number']))? $international_language_learn['other_ap_number']:'' ?>
                                    </a>
                                    </td>
                                    <td class="tg-0pky  type_6">
                                    <?php echo ($pk>0)?$other_ap+$other_aa:0;?>
                                    </td>
                                    <?php
                                    if($pk>0)
                                    {
                                     $c_number=$c_number+$other_c;
                                    $a_number=$a_number+$other_a;
                                    $aa_number=$aa_number+$other_aa;
                                    $ap_number=$ap_number+$other_ap;
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="tg-y698">মোট </td>
                                    <td class="tg-0pky type_1">
                                    <?php echo $c_number ?>
                                    </td>
                                    <td class="tg-0pky type_2">
                                    <?php echo $a_number ?>
                                    </td>
                                    
                                    <td class="tg-0pky type_4">
                                    <?php echo $aa_number ?>
                                    </td>
                                    <td class="tg-0pky type_5">
                                    <?php echo $ap_number ?>
                                    </td>
                                    <td class="tg-0pky type_6">
                                    <?php echo $aa_number+$ap_number;?>
                                    </td>
                                </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                                <tr>
                                    <td class="tg-pwj7" colspan='5'><b>বিদেশে অধ্যয়নরত ভাইদের আপডেট তালিকা</b></td>
                                    <td class="tg-pwj7" colspan="2">
                                        <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'International_বিদেশে অধ্যয়নরত ভাইদের আপডেট তালিকা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    <td class="tg-pwj7">
                                    <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-international-bideshe-study/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >ক্রম</td>
  
                                    <td class="tg-pwj7" >নাম</td>
                                    <td class="tg-pwj7" >দেশ</td>
                                    <td class="tg-pwj7" >সর্বশেষ সাংগঠনিক মান</td>
                                    <td class="tg-pwj7">সর্বশেষ দায়িত্ব</td>
                                    <td class="tg-pwj7" >শিক্ষার স্তর </td>
                                    <td class="tg-pwj7">অনলাইন নম্বর </td>
                                    <td class="tg-pwj7" > Actions </td>
                                </tr>
                                
                                <?php 
                                $i=0;
                            foreach($international_bideshe_study->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['country'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['last_sang_man'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['last_dayitto'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $row['education'] ?> 
                                    </td>
                                
                                    <td class="tg-0pky  type_1">
                                    <?php echo $row['online_number'] ?> 
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-international-bideshe-study/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@international_bideshe_study@".$row['name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                                <tr>
                                    <td class="tg-pwj7" colspan='4'><b>বিদেশে উচ্চশিক্ষায় আগ্রহী জনশক্তিদের তালিকা</b></td>
                                    <td class="tg-pwj7" colspan="2">
                                        <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'International_বিদেশে উচ্চশিক্ষায় আগ্রহী জনশক্তিদের তালিকা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    <td class="tg-pwj7">
                                    <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-international-language-interested/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >ক্রম</td>
                                    
                                    <td class="tg-pwj7" >নাম</td>
                                    <td class="tg-pwj7" >সাংগঠনিক মান</td>
                                    <td class="tg-pwj7">বিভাগ</td>
                                    <td class="tg-pwj7" >টার্গেটকৃত দেশ </td>
                                    <td class="tg-pwj7">অনলাইন নম্বর </td>
                                    <td class="tg-pwj7" > Actions </td>
                                </tr>
                                <?php 
                                $i=0;
                            foreach($international_language_interested->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['sang_man'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bivag'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['target_country'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $row['online_number'] ?> 
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-international-language-interested/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@international_language_interested@".$row['name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                        </table> 
      
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @international screen and (max-width: 767px) {
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
    $.ajaxSetup({
    headers: {
        'X-CSRF-Token': "<?php echo $this->security->get_csrf_token_name(); ?>"
    }
});
	
  $("button").on('click',function(){
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