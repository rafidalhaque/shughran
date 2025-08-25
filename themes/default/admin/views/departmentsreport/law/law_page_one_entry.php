<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আইন বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/law-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Law_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($law_training_program['id']))?$law_training_program['id']:'';
                          
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
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $law_training_program['shikkha_central_s']))? $law_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $law_training_program['shikkha_central_p']))? $law_training_program['shikkha_central_p']:'' ?>
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
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $law_training_program['shikkha_shakha_s']))? $law_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $law_training_program['shikkha_shakha_p']))? $law_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $law_training_program['kormoshala_central_s']))? $law_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $law_training_program['kormoshala_central_p']))? $law_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $law_training_program['kormoshala_shakha_s']))? $law_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="law_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $law_training_program['kormoshala_shakha_p']))? $law_training_program['kormoshala_shakha_p']:'' ?>
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
                                <td class="tg-pwj7" colspan="11"><div><span><b>আমাদের বিপক্ষে মামলা সংক্রান্ত</b></span></div></td>
                                <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Law_আমাদের বিপক্ষে মামলা সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <tr>
                                <td class="tg-pwj7" rowspan="2">সাল</td>
                                <td class="tg-pwj7" rowspan="2">মোট মামলা *</td>
                                <td class="tg-pwj7" rowspan="2">মোট আসামী</td>
                                <td class="tg-pwj7" colspan="6">ট্রায়াল  </td>
                                <td class="tg-pwj7 "  rowspan="2"><div><span>স্টে কতটা </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>কোয়াশমেন্ট কতটা </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>রায়ের জন্য অপেক্ষামান </span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>রিমান্ড কতটি</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>রিমান্ড হয়েছে কত জনের?</span></div></td>
                              
                        
                            </tr>
 
                            <tr>
                            
                            <td class="tg-pwj7 " ><div><span> তদন্তাধীন মামলা </span></div></td>
                                <td class="tg-pwj7 " ><div><span> সিএস প্রদান</span></div></td>
                                <td class="tg-pwj7 "><div><span> সিএস গঠন </span></div></td>
                                <td class="tg-pwj7 "><div><span>অব্যাহতি কতজন  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাক্ষী কতটা </span></div></td>
                                <td class="tg-pwj7 "><div><span> যুক্তিতর্ক কতটা</span></div></td>
                               
                               
                            </tr>


                         
                            <?php
                            $pk = (isset($law_amader_bipokkhe_mamla['id']))?$law_amader_bipokkhe_mamla['id']:'';
                            // var_dump($law_amader_bipokkhe_mamla) ;
                            $t1_total_css =  (isset( $law_amader_bipokkhe_mamla['t1_total_css']))? $law_amader_bipokkhe_mamla['t1_total_css']:0;
                            $t1_total_todontadhin_mamla =  (isset( $law_amader_bipokkhe_mamla['t1_total_todontadhin_mamla']))? $law_amader_bipokkhe_mamla['t1_total_todontadhin_mamla']:0;
                            $t2_total_css =  (isset( $law_amader_bipokkhe_mamla['t2_total_css']))? $law_amader_bipokkhe_mamla['t2_total_css']:0;
                            $t2_total_todontadhin_mamla =  (isset( $law_amader_bipokkhe_mamla['t2_total_todontadhin_mamla']))? $law_amader_bipokkhe_mamla['t2_total_todontadhin_mamla']:0;
                            ?>

                                <tr>
                                <td class="tg-y698 type_1"> ২০২৪  পর্যন্ত</td>
                                <td class="tg-0pky  type_1">
                                   
                                    <?php echo $t1_total_mamla = $t1_total_css+ $t1_total_todontadhin_mamla; ?>
                                   
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_ashami" data-title="Enter">
                                    <?php echo $t1_total_ashami =  (isset( $law_amader_bipokkhe_mamla['t1_total_ashami']))? $law_amader_bipokkhe_mamla['t1_total_ashami']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_todontadhin_mamla" data-title="Enter">
                                    <?php echo $t1_total_todontadhin_mamla =  (isset( $law_amader_bipokkhe_mamla['t1_total_todontadhin_mamla']))? $law_amader_bipokkhe_mamla['t1_total_todontadhin_mamla']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_css" data-title="Enter">
                                    <?php echo $t1_total_css =  (isset( $law_amader_bipokkhe_mamla['t1_total_css']))? $law_amader_bipokkhe_mamla['t1_total_css']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_css_gotohon" data-title="Enter">
                                    <?php echo $t1_total_css_gotohon =  (isset( $law_amader_bipokkhe_mamla['t1_total_css_gotohon']))? $law_amader_bipokkhe_mamla['t1_total_css_gotohon']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_obbahoti" data-title="Enter">
                                    <?php echo $t1_total_obbahoti =  (isset( $law_amader_bipokkhe_mamla['t1_total_obbahoti']))? $law_amader_bipokkhe_mamla['t1_total_obbahoti']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_shakkhi" data-title="Enter">
                                    <?php echo $t1_total_shakkhi =  (isset( $law_amader_bipokkhe_mamla['t1_total_shakkhi']))? $law_amader_bipokkhe_mamla['t1_total_shakkhi']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_jukti_torko" data-title="Enter">
                                    <?php echo $t1_total_jukti_torko =  (isset( $law_amader_bipokkhe_mamla['t1_total_jukti_torko']))? $law_amader_bipokkhe_mamla['t1_total_jukti_torko']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_stay" data-title="Enter">
                                    <?php echo $t1_total_stay =  (isset( $law_amader_bipokkhe_mamla['t1_total_stay']))? $law_amader_bipokkhe_mamla['t1_total_stay']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_total_kowashment" data-title="Enter">
                                    <?php echo $t1_total_kowashment =  (isset( $law_amader_bipokkhe_mamla['t1_total_kowashment']))? $law_amader_bipokkhe_mamla['t1_total_kowashment']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_rayer_jonno_opekkha" data-title="Enter">
                                    <?php echo $t1_rayer_jonno_opekkha =  (isset( $law_amader_bipokkhe_mamla['t1_rayer_jonno_opekkha']))? $law_amader_bipokkhe_mamla['t1_rayer_jonno_opekkha']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_rayer_remand_ti" data-title="Enter">
                                    <?php echo $t1_rayer_remand_ti =  (isset( $law_amader_bipokkhe_mamla['t1_rayer_remand_ti']))? $law_amader_bipokkhe_mamla['t1_rayer_remand_ti']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t1_rayer_remand_jon" data-title="Enter">
                                    <?php echo $t1_rayer_remand_jon =  (isset( $law_amader_bipokkhe_mamla['t1_rayer_remand_jon']))? $law_amader_bipokkhe_mamla['t1_rayer_remand_jon']:0; ?>
                                    </a>
                
                                </td>
                               
                                
                           

                            </tr>


                            <tr>
                                <td class="tg-y698">শুধু  ২০২৫</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $t2_total_mamla = $t2_total_css+ $t2_total_todontadhin_mamla; ?>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_ashami" data-title="Enter">
                                    <?php echo $t2_total_ashami =  (isset( $law_amader_bipokkhe_mamla['t2_total_ashami']))? $law_amader_bipokkhe_mamla['t2_total_ashami']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_todontadhin_mamla" data-title="Enter">
                                    <?php echo $t2_total_todontadhin_mamla =  (isset( $law_amader_bipokkhe_mamla['t2_total_todontadhin_mamla']))? $law_amader_bipokkhe_mamla['t2_total_todontadhin_mamla']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_css" data-title="Enter">
                                    <?php echo $t2_total_css =  (isset( $law_amader_bipokkhe_mamla['t2_total_css']))? $law_amader_bipokkhe_mamla['t2_total_css']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_css_gotohon" data-title="Enter">
                                    <?php echo $t2_total_css_gotohon =  (isset( $law_amader_bipokkhe_mamla['t2_total_css_gotohon']))? $law_amader_bipokkhe_mamla['t2_total_css_gotohon']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_obbahoti" data-title="Enter">
                                    <?php echo $t2_total_obbahoti =  (isset( $law_amader_bipokkhe_mamla['t2_total_obbahoti']))? $law_amader_bipokkhe_mamla['t2_total_obbahoti']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_shakkhi" data-title="Enter">
                                    <?php echo $t2_total_shakkhi =  (isset( $law_amader_bipokkhe_mamla['t2_total_shakkhi']))? $law_amader_bipokkhe_mamla['t2_total_shakkhi']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_jukti_torko" data-title="Enter">
                                    <?php echo $t2_total_jukti_torko =  (isset( $law_amader_bipokkhe_mamla['t2_total_jukti_torko']))? $law_amader_bipokkhe_mamla['t2_total_jukti_torko']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_stay" data-title="Enter">
                                    <?php echo $t2_total_stay =  (isset( $law_amader_bipokkhe_mamla['t2_total_stay']))? $law_amader_bipokkhe_mamla['t2_total_stay']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_total_kowashment" data-title="Enter">
                                    <?php echo $t2_total_kowashment =  (isset( $law_amader_bipokkhe_mamla['t2_total_kowashment']))? $law_amader_bipokkhe_mamla['t2_total_kowashment']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_rayer_jonno_opekkha" data-title="Enter">
                                    <?php echo $t2_rayer_jonno_opekkha =  (isset( $law_amader_bipokkhe_mamla['t2_rayer_jonno_opekkha']))? $law_amader_bipokkhe_mamla['t2_rayer_jonno_opekkha']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_rayer_remand_ti" data-title="Enter">
                                    <?php echo $t2_rayer_remand_ti =  (isset( $law_amader_bipokkhe_mamla['t2_rayer_remand_ti']))? $law_amader_bipokkhe_mamla['t2_rayer_remand_ti']:0; ?>
                                    </a>
                
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""  
                                    data-type="number" data-table="law_amader_bipokkhe_mamla" data-pk="<?php echo $pk ?>" 
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="t2_rayer_remand_jon" data-title="Enter">
                                    <?php echo $t2_rayer_remand_jon =  (isset( $law_amader_bipokkhe_mamla['t2_rayer_remand_jon']))? $law_amader_bipokkhe_mamla['t2_rayer_remand_jon']:0; ?>
                                    </a>
                
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সর্বমোট</td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_mamla + $t2_total_mamla) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_ashami + $t2_total_ashami) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_todontadhin_mamla + $t2_total_todontadhin_mamla) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_css + $t2_total_css) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_css_gotohon + $t2_total_css_gotohon) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_obbahoti + $t2_total_obbahoti) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_shakkhi + $t2_total_shakkhi) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_jukti_torko + $t2_total_jukti_torko) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_stay + $t2_total_stay) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_total_kowashment + $t2_total_kowashment) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_rayer_jonno_opekkha + $t2_rayer_jonno_opekkha) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_rayer_remand_ti + $t2_rayer_remand_ti) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo($t1_rayer_remand_jon + $t2_rayer_remand_jon) ?>
                                </td>
                                
                            </tr>
                            <tr ><td class="tg-pwj7" colspan="14"><div><span>
                            <b>*সি এস প্রদান এবং তদন্তাাধীন মামলার যোগফলের সমষ্টি মোট মামলার সমান হতে হবে।  </b>
                            </span></div></td></tr> 
                            </table>
                        <table  class="tg table table-header-rotated" id="testTable2">
                            <tr><td class="tg-pwj7" colspan='6'><b>সাজা সংক্রান্ত মামলার তথ্য</b></td>
                            <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Law_সাজা সংক্রান্ত মামলার তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            <td class="tg-pwj7" colspan="2">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-law-shaja-shongkranto-mamla/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                            </tr>
                        <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                
                                <td class="tg-pwj7 "><div><span> মামলার নম্বর </span></div></td>
                                <td class="tg-pwj7 " > <div><span>আইন ও ধারা  </span></div></td>
                                <td class="tg-pwj7 "><div><span>কবে সাজা হয়েছিল</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাজার মেয়াদ  </span></div></td>
                                <td class="tg-pwj7 "><div><span>আসামির সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " ><div><span>কত জন সাজা খেটেছে</span></div></td>
                                <td class="tg-pwj7 " ><div><span>আসামী পক্ষের আপিল হয়েছে কিনা?</span></div></td>
                                <td class="tg-pwj7 " ><div><span>মন্তব্য</span></div></td>
                                <td class="tg-pwj7 " ><div><span>Actions</span></div></td>

                        
                            </tr>
                            <?php 
                                $i=0;
                            foreach($law_shaja_shongkranto_mamla->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                 
                                    <td class="tg-0pky type_1"><?php echo $row['mamla_num'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['law_dhara'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['kobe_shaja_hoyechilo'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['shajar_meyad'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['total_ashami'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['shaja_kheteche'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['ashami_pokkher_apil'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comments'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-law-shaja-shongkranto-mamla/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@law_shaja_shongkranto_mamla@".$row['mamla_num']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>

                        </table>
                        <table  class="tg table table-header-rotated" id="testTable3">
                        <tr>
                            <td class="tg-pwj7" colspan="4"><b>খালাস-সংক্রান্ত তথ্য (২০১০-২০২৫) :  মোট খালাসপ্রাপ্ত মামলা সংখ্যা= </b></td>
                            <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Law_খালাস-সংক্রান্ত তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            <td class="tg-pwj7" >
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-law-khalash-inffo/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                            
                                <td class="tg-pwj7 "  ><div><span>খালাসপ্রাপ্ত মামলার নম্বর</span></div></td>
                                <td class="tg-pwj7 " ><div><span>মোট আসামীর সংখ্যা </span></div></td>
                                <td class="tg-pwj7 " ><div><span>খালাসপ্রাপ্ত আসামী সংখ্যা  </span></div></td>
                                <td class="tg-pwj7 " ><div><span>বাদী পক্ষের আপিল হয়েছে কিনা? </span></div></td>
                                <td class="tg-pwj7 " ><div><span>মন্তব্য </span></div></td>
                                <td class="tg-pwj7 " ><div><span>Actions </span></div></td>
                        
                            </tr>
                            <?php 
                                $i=0;
                            foreach($law_khalash_inffo->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['khalash_mamla_num'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['total_ashami'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['khalash_prapto_ashami'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['badi_pokkher_apil'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['comments'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-law-khalash-inffo/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@law_khalash_inffo@".$row['khalash_total_mamla']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>

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
    }  .action_class{
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
$('#info_house').editable({
    value: <?php echo (isset( $information_house['info_house']))? $information_house['info_house']:2; ?>,    
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
    value: <?php echo (isset( $law_branch_info['manpower_active_bool']))? $law_branch_info['manpower_active_bool']:2; ?>,    
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

$('#law_committee').editable({
    value: <?php echo (isset( $law_branch_info['law_committee']))? $law_branch_info['law_committee']:2; ?>,    
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
