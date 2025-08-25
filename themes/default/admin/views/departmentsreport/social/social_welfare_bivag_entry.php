<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সমাজসেবা বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/social-welfare-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Social_walfare_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($social_welfare_training_program['id']))?$social_welfare_training_program['id']:'';
                          
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
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $social_welfare_training_program['shikkha_central_s']))? $social_welfare_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $social_welfare_training_program['shikkha_central_p']))? $social_welfare_training_program['shikkha_central_p']:'' ?>
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
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $social_welfare_training_program['shikkha_shakha_s']))? $social_welfare_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $social_welfare_training_program['shikkha_shakha_p']))? $social_welfare_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $social_welfare_training_program['kormoshala_central_s']))? $social_welfare_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $social_welfare_training_program['kormoshala_central_p']))? $social_welfare_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $social_welfare_training_program['kormoshala_shakha_s']))? $social_welfare_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="social_welfare_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $social_welfare_training_program['kormoshala_shakha_p']))? $social_welfare_training_program['kormoshala_shakha_p']:'' ?>
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
                        <td class="tg-pwj7" colspan="3"><b>সামাজসেবামূলক প্রোগ্রাম</b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Social_walfare_সামাজসেবামূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
        <tr>
            <td class="tg-pwj7">ক্রম</td>
            <td class="tg-pwj7"> প্রোগ্রামের নাম</td>
            <td class="tg-pwj7">কতটি</td>
            <td class="tg-pwj7"> উপস্থিতি </td>
        </tr>
        <?php
            $pk = (isset($social_welfare_shebamulok_program['id']))?$social_welfare_shebamulok_program['id']:'';
        ?>
        <tr>
            <td class="tg-pwj7 ">
                <div><span>01</div>
            </td>
            <td class="tg-0pky ">
                <div><span>ফ্রি মেডিকেল ক্যাম্প (উপস্থিতির জায়গায় রোগীর সংখ্যা লিখবেন) </span>
                </div>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="free_medical_camp_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['free_medical_camp_ti']))? $social_welfare_shebamulok_program['free_medical_camp_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="free_medical_camp_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['free_medical_camp_pre']))? $social_welfare_shebamulok_program['free_medical_camp_pre']:'' ?>
                </a>
            </td>

        </tr>

        <tr>
            <td class="tg-y698">02 </td>
            <td class="tg-0pky  type_1">
            ফ্রি ব্লাড গ্রুপিং (উপস্থিতির জায়গায় কতজনের গ্রুপ করা হয়েছে সেটা লিখবেন)
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="free_blood_grouping_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['free_blood_grouping_ti']))? $social_welfare_shebamulok_program['free_blood_grouping_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="free_blood_grouping_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['free_blood_grouping_pre']))? $social_welfare_shebamulok_program['free_blood_grouping_pre']:'' ?>
                </a>
            </td>

        </tr>


        <tr>
            <td class="tg-y698">03 </td>
            <td class="tg-0pky  type_1">
            পরিষ্কার পরিচ্ছন্নতা অভিযান
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="porishkar_poricchonnota_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['porishkar_poricchonnota_ti']))? $social_welfare_shebamulok_program['porishkar_poricchonnota_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="porishkar_poricchonnota_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['porishkar_poricchonnota_pre']))? $social_welfare_shebamulok_program['porishkar_poricchonnota_pre']:'' ?>
                </a>
            </td>
        </tr>

        <tr>
            <td class="tg-y698">04 </td>
            <td class="tg-0pky  type_1">
            স্বাস্থ্য সচেতনতা ক্যাম্পেইন
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="sastho_shochetonota_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['sastho_shochetonota_ti']))? $social_welfare_shebamulok_program['sastho_shochetonota_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="sastho_shochetonota_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['sastho_shochetonota_pre']))? $social_welfare_shebamulok_program['sastho_shochetonota_pre']:'' ?>
                </a>
            </td>

        </tr>
        <tr>
            <td class="tg-y698">05 </td>
            <td class="tg-0pky  type_1">
            পরিবেশ ও সামাজিক সচেতনতামূলক দিবস/ক্যাম্পেইন
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="poribesh_o_shamajik_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['poribesh_o_shamajik_ti']))? $social_welfare_shebamulok_program['poribesh_o_shamajik_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="poribesh_o_shamajik_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['poribesh_o_shamajik_pre']))? $social_welfare_shebamulok_program['poribesh_o_shamajik_pre']:'' ?>
                </a>
            </td>

        </tr>
        <tr>
            <td class="tg-y698">06 </td>
            <td class="tg-0pky  type_1">
            সামাজিক দায়িত্ববোধ জাগ্রত করতে সভা, সমাবেশ, সেমিনার, সিম্পোজিয়াম
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shamajik_dayittobodh_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['shamajik_dayittobodh_ti']))? $social_welfare_shebamulok_program['shamajik_dayittobodh_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shamajik_dayittobodh_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['shamajik_dayittobodh_pre']))? $social_welfare_shebamulok_program['shamajik_dayittobodh_pre']:'' ?>
                </a>
            </td>
        </tr>
        <tr>
            <td class="tg-y698">07 </td>
            <td class="tg-0pky  type_1">
            সুবিধাবঞ্চিত শিশুদের নিয়ে ফ্রি স্কুল (উপস্থিতির জায়গায় মোট ছাত্র ছাত্রীর সংখ্যা লিখবেন)
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shubidha_bonchito_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['shubidha_bonchito_ti']))? $social_welfare_shebamulok_program['shubidha_bonchito_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shubidha_bonchito_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['shubidha_bonchito_pre']))? $social_welfare_shebamulok_program['shubidha_bonchito_pre']:'' ?>
                </a>
            </td>

        </tr>
        <tr>
            <td class="tg-y698">08 </td>
            <td class="tg-0pky  type_1">
            স্কুল, মাদরাসা, মসজিদ, রাস্তা, ব্রিজ, কালর্ভাট মেরামত
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="school_madrasah_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['school_madrasah_ti']))? $social_welfare_shebamulok_program['school_madrasah_ti']:'' ?>
                </a>
            </td>
            <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shebamulok_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="school_madrasah_pre" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shebamulok_program['school_madrasah_pre']))? $social_welfare_shebamulok_program['school_madrasah_pre']:'' ?>
                </a>
            </td>
        </tr>
        </table>

        <table class="tg table table-header-rotated" id="testTable2">
            <tr>
                <td class="tg-pwj7" colspan=""><b>উপহার সামগ্রী বিতরণ </b></td>
                <td class="tg-pwj7" colspan="1">
                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Social_walfare_উপহার সামগ্রী বিতরণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                </td>
            </tr>
            <tr>
                <td class="tg-pwj7  type_1">
                    কার্যক্রমের নাম 
                </td>

                <td class="tg-pwj7  type_2">
                    কতজনকে
                </td>

            </tr>
            <?php
            $pk = (isset($social_welfare_upohar['id']))?$social_welfare_upohar['id']:'';
        ?>
            <tr>
            
                <td class="tg-0pky  type_1" >
                ইয়াতিম ও অনাথ শিশুদের মাঝে খাবার বিতরণ
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_upohar" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="yatim_o_onath" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_upohar['yatim_o_onath']))? $social_welfare_upohar['yatim_o_onath']:'' ?>
                </a>
            </td>

            </tr>
            <tr>

                <td class="tg-0pky  type_1" >
                বন্যা বা অন্যান্য প্রাকৃতিক দুর্যোগে আক্রান্তদের সাহায্য
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_upohar" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="bonna_ba_onnanno" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_upohar['bonna_ba_onnanno']))? $social_welfare_upohar['bonna_ba_onnanno']:'' ?>
                </a>
            </td>

            </tr>
            <tr>
            
                <td class="tg-0pky  type_1" >
                কুরবানির গোশত বিতরণ
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_upohar" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="qurbanir_goshto" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_upohar['qurbanir_goshto']))? $social_welfare_upohar['qurbanir_goshto']:'' ?>
                </a>
            </td>

            </tr>
            <tr>

                <td class="tg-0pky  type_1" >
                ঈদ/ইফতার সামগ্রী বিতরণ
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_upohar" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="eid_shamogri" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_upohar['eid_shamogri']))? $social_welfare_upohar['eid_shamogri']:'' ?>
                </a>
            </td>
            </tr>
            <tr>
                <td class="tg-0pky  type_1" >
                শীতবস্ত্র বিতরণ
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_upohar" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shitbotsro" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_upohar['shitbotsro']))? $social_welfare_upohar['shitbotsro']:'' ?>
                </a>
            </td>

            </tr>

        </table>
        <table class="tg table table-header-rotated" id="testTable3">
                <tr>
                    <td class="tg-pwj7" colspan="2"><b>শিক্ষা উপকরণ বিতরণ </b></td>
                    <td class="tg-pwj7" colspan="1">
                        <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Social_walfare_শিক্ষা উপকরণ বিতরণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                    </td>
                </tr>
                <td class="tg-pwj7  type_1" >
                    কার্যক্রমের নাম
                </td>

                <td class="tg-pwj7  type_2">
                    কতজনকে
                </td>


                <td class="tg-pwj7  type_2">
                    কতটি
                </td>
                <?php
            $pk = (isset($social_welfare_shikkha_upokoron['id']))?$social_welfare_shikkha_upokoron['id']:'';
        ?>

            </tr>
            <tr>
                <td class="tg-0pky  type_1">
                বিনামূল্যে বই বিতরণ
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shikkha_upokoron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="binamulle_boi_bitoron_jon" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shikkha_upokoron['binamulle_boi_bitoron_jon']))? $social_welfare_shikkha_upokoron['binamulle_boi_bitoron_jon']:'' ?>
                </a>
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_shikkha_upokoron" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="binamulle_boi_bitoron_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shikkha_upokoron['binamulle_boi_bitoron_ti']))? $social_welfare_shikkha_upokoron['binamulle_boi_bitoron_ti']:'' ?>
                </a>
                </td>
            <tr>
        </table>
        <table class="tg table table-header-rotated" id="testTable4">
            <tr>
                <td class="tg-pwj7" colspan="2"><b>আর্থিক সহায়তা প্রদান </b></td>
                <td class="tg-pwj7" colspan="1">
                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Social_walfare_আর্থিক সহায়তা প্রদান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                </td>
            </tr>
                <td class="tg-pwj7  type_1" >
                কার্যক্রমের নাম
                </td>

                <td class="tg-pwj7  type_2">
                    কতজনকে
                </td>
                <td class="tg-pwj7  type_2">
                    কত টাকা
                </td>
            </tr>
            <?php
            $pk = (isset($social_welfare_arthik_shohayota['id']))?$social_welfare_arthik_shohayota['id']:'';
        ?>
            </tr>
                <td class="tg-0pky  type_1">
                    শিক্ষাবৃত্তি প্রদান
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_arthik_shohayota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shikkha_britti_jon" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_arthik_shohayota['shikkha_britti_jon']))? $social_welfare_arthik_shohayota['shikkha_britti_jon']:'' ?>
                </a>
                </td>
                <td class="tg-0pky  type_5"> 
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="social_welfare_arthik_shohayota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="shikkha_britti_ti" 
                    data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_arthik_shohayota['shikkha_britti_ti']))? $social_welfare_arthik_shohayota['shikkha_britti_ti']:'' ?>
                </a>
                </td>
            <tr>


        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>সাক্ষরতা অভিযান </b></td>
                            <td class="tg-pwj7" colspan="1">
                        <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Social_walfare_সাক্ষরতা অভিযান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                    </td>
                        </tr>
                        <tr>
                            
                            <td class="tg-pwj7"  colspan="">প্রোগ্রাম সংখ্যা </td>
                            <td class="tg-pwj7"  colspan="">অংশগ্রহনকারী জনশক্তি   </td>
                            <td class="tg-pwj7"  colspan="">শিক্ষা উপকরণ বিতরণ কতজনের মাঝে?   </td>
                            <td class="tg-pwj7"  colspan="">সাক্ষরতা শিখেছে কতজন? </td>
                        
                        </tr>
                        <?php
                            $pk = (isset($social_welfare_shakhorota_ovijan['id']))?$social_welfare_shakhorota_ovijan['id']:'';
                        ?>
                        <tr>
                        <td class="tg-0pky  type_5"> 
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="social_welfare_shakhorota_ovijan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="program" 
                            data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shakhorota_ovijan['program']))? $social_welfare_shakhorota_ovijan['program']:'' ?>
                        </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="social_welfare_shakhorota_ovijan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="present" 
                            data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shakhorota_ovijan['present']))? $social_welfare_shakhorota_ovijan['present']:'' ?>
                        </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="social_welfare_shakhorota_ovijan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="upokoron" 
                            data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shakhorota_ovijan['upokoron']))? $social_welfare_shakhorota_ovijan['upokoron']:'' ?>
                        </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                            data-table="social_welfare_shakhorota_ovijan" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                            data-name="shikhece" 
                            data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_shakhorota_ovijan['shikhece']))? $social_welfare_shakhorota_ovijan['shikhece']:'' ?>
                        </a>
                        </td>
                        </tr>

                    </table>
                    <table class="tg table table-header-rotated" id="testTable6">
                    <tr>
                        <td class="tg-pwj7" colspan="3"><b>বৃক্ষরোপন অভিযান  </b></td>
                        <td class="tg-pwj7" colspan="1">
                        <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Social_walfare_বৃক্ষরোপন অভিযান_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                    </td>
                    </tr>
                <tr>
                    <td class="tg-pwj7" colspan=""> চারা রোপণ কতটি?  </td>
                    <td class="tg-pwj7" colspan="">চারা বিতরণ কতটি?  </td>
                    <td class="tg-pwj7" colspan="">কতজনের মাঝে বিতরণ করা হয়েছে? </td>
                    <td class="tg-pwj7" colspan="">কতজন জনশক্তি চারা বিতরণ করেছেন? </td>
                </tr>
                <?php
            $pk = (isset($social_welfare_brikkho_ropon['id']))?$social_welfare_brikkho_ropon['id']:'';
        ?>
                <tr>
                
                <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_brikkho_ropon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="chara_ropor" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_brikkho_ropon['chara_ropor']))? $social_welfare_brikkho_ropon['chara_ropor']:'' ?>
                    </a>
                </td>
                <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_brikkho_ropon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="chara_bitoron" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_brikkho_ropon['chara_bitoron']))? $social_welfare_brikkho_ropon['chara_bitoron']:'' ?>
                    </a>
                </td>
                <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_brikkho_ropon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="koto_joner_majhe" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_brikkho_ropon['koto_joner_majhe']))? $social_welfare_brikkho_ropon['koto_joner_majhe']:'' ?>
                    </a>
                </td>
                <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_brikkho_ropon" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="koto_jonoshokti" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_brikkho_ropon['koto_jonoshokti']))? $social_welfare_brikkho_ropon['koto_jonoshokti']:'' ?>
                    </a>
                </td>
                    
                    
                </tr>
            </table>
            <table class="tg table table-header-rotated" id="testTable7">
                <tr>
                    <td class="tg-pwj7" colspan="3"><b>রক্তদাতা সংগঠন </b></td>
                    <td class="tg-pwj7" colspan="1">
                    <a href="#" id='table_7' onclick="doit('xlsx','testTable7','<?php echo 'Social_walfare_রক্তদাতা সংগঠন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                </td>
                </tr>
            <tr>
                    <td class="tg-pwj7" >মোট রক্তদাতা সংগঠন কয়টি</td>
                <td class="tg-pwj7" colspan=""> মোট ডোনার সংখ্যা  </td>
                <td class="tg-pwj7" colspan="">এ সেশনে ডোনার বৃদ্ধি </td>
                <td class="tg-pwj7" colspan="">কত জনকে রক্ত দেওয়া হয়েছে? </td>
            </tr>
            <?php
            $pk = (isset($social_welfare_roktodata['id']))?$social_welfare_roktodata['id']:'';
        ?>
            <tr>
            <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_roktodata" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="total_roktodata_shongothon" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_roktodata['total_roktodata_shongothon']))? $social_welfare_roktodata['total_roktodata_shongothon']:'' ?>
                    </a>
                </td>
            <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_roktodata" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="total_donor" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_roktodata['total_donor']))? $social_welfare_roktodata['total_donor']:'' ?>
                    </a>
                </td>
            <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_roktodata" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="donor_briddhi" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_roktodata['donor_briddhi']))? $social_welfare_roktodata['donor_briddhi']:'' ?>
                    </a>
                </td>
            <td class="tg-0pky  type_5"> 
                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                        data-table="social_welfare_roktodata" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                        data-name="kotojon_k_blood_deya" 
                        data-title="Enter"><?php echo $other_ap=(isset( $social_welfare_roktodata['kotojon_k_blood_deya']))? $social_welfare_roktodata['kotojon_k_blood_deya']:'' ?>
                    </a>
                </td>
                
            </tr>
            </table>
            <table class="tg table table-header-rotated" id="testTable8">
                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>রেজিস্টার্ড/নন রেজিস্টার্ড সামাজিক সংগঠন রির্পোট</b></td>
                        <td class="tg-pwj7" colspan="1">
                        <a href="#" id='table_8' onclick="doit('xlsx','testTable8','<?php echo 'Social_walfare_রেজিস্টার্ড/নন রেজিস্টার্ড সামাজিক সংগঠন রির্পোট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                    </td>
                    <td class="tg-pwj7">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-social-welfare-shamajik-shong/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                </tr>
            <tr>
                    <td class="tg-pwj7"> ক্রম</td>
                <td class="tg-pwj7" colspan=""> সংগঠনের নাম</td>
                <td class="tg-pwj7" colspan=""> রেজিস্টার্ড /নন রেজিস্টার্ড </td>
                <td class="tg-pwj7" colspan="">প্রতিষ্ঠা সাল </td>
                <td class="tg-pwj7" colspan="">চলতি সেশনে কতটি কর্মসূচি বাস্তবায়তি হয়েছে? </td>
                <td class="tg-pwj7" colspan="">Actions </td>
            </tr>
                            
            <?php 
                                $i=0;
                            foreach($social_welfare_shamajik_shong->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['shong_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['reg_non_reg'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['protishtha_shal'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['cholti_session_kormoshuchi'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-social-welfare-shamajik-shong/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@social_welfare_shamajik_shong@".$row['shong_name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
    </table>
    <table class="tg table table-header-rotated" id="testTable9">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_9' onclick="doit('xlsx','testTable9','<?php echo 'Social_welfare_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7">ধরন</td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                          $pk = (isset($social_welfare_summit['id']))?$social_welfare_summit['id']:'';
                          
                      ?>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'>কৃষিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                              <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_center_manpower_num" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_center_manpower_num=(isset( $social_welfare_summit['agri_stu_center_manpower_num']))? $social_welfare_summit['agri_stu_center_manpower_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_center_manpower_pre" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_center_manpower_pre=(isset( $social_welfare_summit['agri_stu_center_manpower_pre']))? $social_welfare_summit['agri_stu_center_manpower_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_center_manpower_pre!=0 && $agri_stu_center_manpower_num!=0 )?$agri_stu_center_manpower_pre / $agri_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_center_general_num" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_center_general_num=(isset( $social_welfare_summit['agri_stu_center_general_num']))? $social_welfare_summit['agri_stu_center_general_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_center_general_pre" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_center_general_pre=(isset( $social_welfare_summit['agri_stu_center_general_pre']))? $social_welfare_summit['agri_stu_center_general_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_center_general_pre!=0 && $agri_stu_center_general_num!=0 )?$agri_stu_center_general_pre / $agri_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> কৃষিতে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_shakha_manpower_num" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_shakha_manpower_num=(isset( $social_welfare_summit['agri_stu_shakha_manpower_num']))? $social_welfare_summit['agri_stu_shakha_manpower_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_shakha_manpower_pre" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_shakha_manpower_pre=(isset( $social_welfare_summit['agri_stu_shakha_manpower_pre']))? $social_welfare_summit['agri_stu_shakha_manpower_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_shakha_manpower_pre!=0 && $agri_stu_shakha_manpower_num!=0 )?$agri_stu_shakha_manpower_pre / $agri_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_shakha_general_num" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_shakha_general_num=(isset( $social_welfare_summit['agri_stu_shakha_general_num']))? $social_welfare_summit['agri_stu_shakha_general_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="agri_stu_shakha_general_pre" 
                                    data-title="Enter">
                                    <?php echo $agri_stu_shakha_general_pre=(isset( $social_welfare_summit['agri_stu_shakha_general_pre']))? $social_welfare_summit['agri_stu_shakha_general_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($agri_stu_shakha_general_pre!=0 && $agri_stu_shakha_general_num!=0 )?$agri_stu_shakha_general_pre / $agri_stu_shakha_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'>মেডিকেলে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (কেন্দ্র)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                              <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_center_manpower_num" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_center_manpower_num=(isset( $social_welfare_summit['medical_stu_center_manpower_num']))? $social_welfare_summit['medical_stu_center_manpower_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_center_manpower_pre" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_center_manpower_pre=(isset( $social_welfare_summit['medical_stu_center_manpower_pre']))? $social_welfare_summit['medical_stu_center_manpower_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_center_manpower_pre!=0 && $medical_stu_center_manpower_num!=0 )?$medical_stu_center_manpower_pre / $medical_stu_center_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_center_general_num" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_center_general_num=(isset( $social_welfare_summit['medical_stu_center_general_num']))? $social_welfare_summit['medical_stu_center_general_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_center_general_pre" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_center_general_pre=(isset( $social_welfare_summit['medical_stu_center_general_pre']))? $social_welfare_summit['medical_stu_center_general_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_center_general_pre!=0 && $medical_stu_center_general_num!=0 )?$medical_stu_center_general_pre / $medical_stu_center_general_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1" rowspan='2'> মেডিকেলে অধ্যয়নরত ছাত্রদের নিয়ে সামিট  (শাখা)</td>
                                <td class="tg-y698 type_1"> জনশক্তি</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_shakha_manpower_num" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_shakha_manpower_num=(isset( $social_welfare_summit['medical_stu_shakha_manpower_num']))? $social_welfare_summit['medical_stu_shakha_manpower_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_shakha_manpower_pre" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_shakha_manpower_pre=(isset( $social_welfare_summit['medical_stu_shakha_manpower_pre']))? $social_welfare_summit['medical_stu_shakha_manpower_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_shakha_manpower_pre!=0 && $medical_stu_shakha_manpower_num!=0 )?$medical_stu_shakha_manpower_pre / $medical_stu_shakha_manpower_num:0 ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> সাধারণ</td>

                                <td class="tg-0pky type_1">
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_shakha_general_num" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_shakha_general_num=(isset( $social_welfare_summit['medical_stu_shakha_general_num']))? $social_welfare_summit['medical_stu_shakha_general_num']:0; ?>
                                    </a>
                             </td>
                             <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="social_welfare_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_stu_shakha_general_pre" 
                                    data-title="Enter">
                                    <?php echo $medical_stu_shakha_general_pre=(isset( $social_welfare_summit['medical_stu_shakha_general_pre']))? $social_welfare_summit['medical_stu_shakha_general_pre']:0; ?>
                                    </a>
                             </td>
                                <td class="tg-0pky">
                                    <?php echo  ($medical_stu_shakha_general_pre!=0 && $medical_stu_shakha_general_num!=0 )?$medical_stu_shakha_general_pre / $medical_stu_shakha_general_num:0 ?>
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
    value: <?php echo (isset( $Social_walfare_house['info_house']))? $Social_walfare_house['info_house']:2; ?>,    
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
    value: <?php echo (isset( $social_welfare_branch_info['manpower_active_bool']))? $social_welfare_branch_info['manpower_active_bool']:2; ?>,    
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

$('#social_welfare_committee').editable({
    value: <?php echo (isset( $social_welfare_branch_info['social_welfare_committee']))? $social_welfare_branch_info['social_welfare_committee']:2; ?>,    
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
