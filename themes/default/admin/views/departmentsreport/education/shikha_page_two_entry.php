<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= ' শিক্ষা বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/shikha-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <table class="tg table table-header-rotated" id="testTable4">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Education_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($education_training_program['id']))?$education_training_program['id']:'';
                          
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $education_training_program['shikkha_central_s']))? $education_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $education_training_program['shikkha_central_p']))? $education_training_program['shikkha_central_p']:'' ?>
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $education_training_program['shikkha_shakha_s']))? $education_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $education_training_program['shikkha_shakha_p']))? $education_training_program['shikkha_shakha_p']:'' ?>
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $education_training_program['kormoshala_central_s']))? $education_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $education_training_program['kormoshala_central_p']))? $education_training_program['kormoshala_central_p']:'' ?>
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
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $education_training_program['kormoshala_shakha_s']))? $education_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $education_training_program['kormoshala_shakha_p']))? $education_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                          {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                  </table>
                    <table class="tg table table-header-rotated" id="মোটিভেশনাল প্রোগ্রাম">
                            <tr>
                            <td class="tg-pwj7" colspan='2'><b>মোটিভেশনাল প্রোগ্রাম </b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_1'  onclick="doit('xlsx','মোটিভেশনাল প্রোগ্রাম','<?php echo 'Education_মোটিভেশনাল প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>

                            </tr>
                            <?php
                            $pk = (isset($education_motivational_program['id']))?$education_motivational_program['id']:"";

                            ?>
                           
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার গাইড লাইন/কাউন্সেলিং (সমাজসেবা)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_sho_num" 
                                    data-title="Enter"><?php echo $cc_sho_num=(isset( $education_motivational_program['cc_sho_num']))? $education_motivational_program['cc_sho_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_sho_pre" 
                                    data-title="Enter"><?php echo $cc_sho_pre=(isset( $education_motivational_program['cc_sho_pre']))? $education_motivational_program['cc_sho_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="tg-y698">ক্যারিয়ার গাইড লাইন/কাউন্সেলিং (বিশ্ববিদ্যালয় শিক্ষক তৈরি) </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_tea_num" 
                                    data-title="Enter"><?php echo $cc_tea_num=(isset( $education_motivational_program['cc_tea_num']))? $education_motivational_program['cc_tea_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="cc_tea_pre" 
                                    data-title="Enter"><?php echo $cc_tea_pre=(isset( $education_motivational_program['cc_tea_pre']))? $education_motivational_program['cc_tea_pre']:0 ?>
                                </a>
                                </td>
                            <tr>
                                <td class="tg-y698">আদর্শ কলেজ গাইড লাইন/কাউন্সেলিং </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="ideal_cc_num" 
                                    data-title="Enter"><?php echo $ideal_cc_num=(isset( $education_motivational_program['ideal_cc_num']))? $education_motivational_program['ideal_cc_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="ideal_cc_pre" 
                                    data-title="Enter"><?php echo $ideal_cc_pre=(isset( $education_motivational_program['ideal_cc_pre']))? $education_motivational_program['ideal_cc_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোটিভেশনাল প্রোগ্রাম (এসএসসি/দাখিল) </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_ssc_num" 
                                    data-title="Enter"><?php echo $mot_pro_ssc_num=(isset( $education_motivational_program['mot_pro_ssc_num']))? $education_motivational_program['mot_pro_ssc_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_ssc_pre" 
                                    data-title="Enter"><?php echo $mot_pro_ssc_pre=(isset( $education_motivational_program['mot_pro_ssc_pre']))? $education_motivational_program['mot_pro_ssc_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোটিভেশনাল প্রোগ্রাম (এইচএসসি/আলিম)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_hsc_num" 
                                    data-title="Enter"><?php echo $mot_pro_hsc_num=(isset( $education_motivational_program['mot_pro_hsc_num']))? $education_motivational_program['mot_pro_hsc_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_hsc_pre" 
                                    data-title="Enter"><?php echo $mot_pro_hsc_pre=(isset( $education_motivational_program['mot_pro_hsc_pre']))? $education_motivational_program['mot_pro_hsc_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="tg-y698">মোটিভেশনাল প্রোগ্রাম (বিশ্ববিদ্যালয় ভর্তিচ্ছু)</td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_uni_num" 
                                    data-title="Enter"><?php echo $mot_pro_uni_num=(isset( $education_motivational_program['mot_pro_uni_num']))? $education_motivational_program['mot_pro_uni_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="mot_pro_uni_pre" 
                                    data-title="Enter"><?php echo $mot_pro_uni_pre=(isset( $education_motivational_program['mot_pro_uni_pre']))? $education_motivational_program['mot_pro_uni_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                    <td class="tg-y698">অন্যান্য</td>
                            <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_num" 
                                    data-title="Enter"><?php echo $other_num=(isset( $education_motivational_program['other_num']))? $education_motivational_program['other_num']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_motivational_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_pre" 
                                    data-title="Enter"><?php echo $other_pre=(isset( $education_motivational_program['other_pre']))? $education_motivational_program['other_pre']:0 ?>
                                </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট</td>
                                <td class="tg-0pky"> <?php echo $other_num+$mot_pro_uni_num+$mot_pro_hsc_num+$mot_pro_ssc_num+$ideal_cc_num+$cc_tea_num+$cc_sho_num  ?> </td>
                                <td class="tg-0pky"> <?php echo $other_pre+$mot_pro_uni_pre+$mot_pro_hsc_pre+$mot_pro_ssc_pre+$ideal_cc_pre+$cc_tea_num+$cc_sho_pre  ?> </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="honers_masters">
                            <tr>
                            <td class="tg-pwj7" colspan='2'><b>আকর্ষণীয় প্রোগ্রাম : (অনার্স ও মাস্টার্সে অধ্যয়নরত)</b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='honers_masters'  onclick="doit('xlsx','honers_masters','<?php echo 'আকর্ষণীয় প্রোগ্রাম : (অনার্স ও মাস্টার্সে অধ্যয়নরত)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রামের ধরন</td>
                                <td class="tg-pwj7" >সংখ্যা </td>
                                <td class="tg-pwj7" >উপস্থিতি  </td>

                            </tr>
                            <?php
                            $pk = (isset($education_honers_masters_program['id']))?$education_honers_masters_program['id']:"";

                            ?>
                           
                           <tr>
                                <td class="tg-y698">শিক্ষা বৃত্তি প্রদান </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sik_bri_s"
                                        data-title="Enter"><?php echo $sik_bri_s = (isset($education_honers_masters_program['sik_bri_s'])) ? $education_honers_masters_program['sik_bri_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sik_bri_u"
                                        data-title="Enter"><?php echo $sik_bri_u = (isset($education_honers_masters_program['sik_bri_u'])) ? $education_honers_masters_program['sik_bri_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                           
                            <tr>
                                <td class="tg-y698">প্লেসধারী সংবর্ধনা  </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pla_son_s"
                                        data-title="Enter"><?php echo $pla_son_s = (isset($education_honers_masters_program['pla_son_s'])) ? $education_honers_masters_program['pla_son_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pla_son_u"
                                        data-title="Enter"><?php echo $pla_son_u = (isset($education_honers_masters_program['pla_son_u'])) ? $education_honers_masters_program['pla_son_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">অদম্য মেধাবী সংবর্ধনা </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_son_s"
                                        data-title="Enter"><?php echo $med_son_s = (isset($education_honers_masters_program['med_son_s'])) ? $education_honers_masters_program['med_son_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="med_son_u"
                                        data-title="Enter"><?php echo $med_son_u = (isset($education_honers_masters_program['med_son_u'])) ? $education_honers_masters_program['med_son_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">দোয়া মাহফিল </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="dua_s"
                                        data-title="Enter"><?php echo $dua_s = (isset($education_honers_masters_program['dua_s'])) ? $education_honers_masters_program['dua_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="dua_u"
                                        data-title="Enter"><?php echo $dua_u = (isset($education_honers_masters_program['dua_u'])) ? $education_honers_masters_program['dua_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">স্বর্ণপদক প্রদান</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sorno_s"
                                        data-title="Enter"><?php echo $sorno_s = (isset($education_honers_masters_program['sorno_s'])) ? $education_honers_masters_program['sorno_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sorno_u"
                                        data-title="Enter"><?php echo $sorno_u = (isset($education_honers_masters_program['sorno_u'])) ? $education_honers_masters_program['sorno_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">শিক্ষা উপকরণ বিতরণ</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sik_upo_s"
                                        data-title="Enter"><?php echo $sik_upo_s = (isset($education_honers_masters_program['sik_upo_s'])) ? $education_honers_masters_program['sik_upo_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sik_upo_u"
                                        data-title="Enter"><?php echo $sik_upo_u = (isset($education_honers_masters_program['sik_upo_u'])) ? $education_honers_masters_program['sik_upo_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">নবীন বরণ (অনার্স ১ম বর্ষ)</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="nobin_s"
                                        data-title="Enter"><?php echo $nobin_s = (isset($education_honers_masters_program['nobin_s'])) ? $education_honers_masters_program['nobin_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="nobin_u"
                                        data-title="Enter"><?php echo $nobin_u = (isset($education_honers_masters_program['nobin_u'])) ? $education_honers_masters_program['nobin_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">শিক্ষা সফর</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sik_sof_s"
                                        data-title="Enter"><?php echo $sik_sof_s = (isset($education_honers_masters_program['sik_sof_s'])) ? $education_honers_masters_program['sik_sof_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sik_sof_u"
                                        data-title="Enter"><?php echo $sik_sof_u = (isset($education_honers_masters_program['sik_sof_u'])) ? $education_honers_masters_program['sik_sof_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_s"
                                        data-title="Enter"><?php echo $other_s = (isset($education_honers_masters_program['other_s'])) ? $education_honers_masters_program['other_s'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_honers_masters_program" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_u"
                                        data-title="Enter"><?php echo $other_u = (isset($education_honers_masters_program['other_u'])) ? $education_honers_masters_program['other_u'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">মোট</td>
                                <td class="tg-0pky"> <?php echo $other_s+$sik_sof_s+$nobin_s+$sik_upo_s+$sorno_s+$dua_s+$med_son_s+$pla_son_s+$sik_bri_s  ?> </td>
                                <td class="tg-0pky"> <?php echo $other_u+$sik_sof_u+$nobin_u+$sik_upo_u+$sorno_u+$dua_u+$med_son_u +$pla_son_u+$sik_bri_u ?> </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                        <td class="tg-pwj7" colspan="4"><b>সামিট </b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Education_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                      <?php
                          $pk = (isset($education_summit['id']))?$education_summit['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" rowspan=''>ধরন</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সামাজিক বিজ্ঞান, কলা ও ফাইন আর্টসে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_manpower_s" 
                              data-title="Enter">
                              <?php echo $hons_central_manpower_s=(isset( $education_summit['hons_central_manpower_s']))? $education_summit['hons_central_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_manpower_p" 
                              data-title="Enter">
                              <?php echo $hons_central_manpower_p=(isset( $education_summit['hons_central_manpower_p']))? $education_summit['hons_central_manpower_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_central_manpower_s>0 && $hons_central_manpower_p>0)
                          {echo ($hons_central_manpower_p/$hons_central_manpower_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">সাধারণ</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_general_s" 
                              data-title="Enter">
                              <?php echo $hons_central_general_s=(isset( $education_summit['hons_central_general_s']))? $education_summit['hons_central_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_general_p" 
                              data-title="Enter">
                              <?php echo $hons_central_general_p=(isset( $education_summit['hons_central_general_p']))? $education_summit['hons_central_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_central_general_s>0 && $hons_central_general_p>0)
                          {echo ($hons_central_general_p/$hons_central_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সামাজিক বিজ্ঞান, কলা ও ফাইন আর্টসে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_manpower_s" 
                              data-title="Enter">
                              <?php echo $hons_shakha_manpower_s=(isset( $education_summit['hons_shakha_manpower_s']))? $education_summit['hons_shakha_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_manpower_p" 
                              data-title="Enter">
                              <?php echo $hons_shakha_manpower_p=(isset( $education_summit['hons_shakha_manpower_p']))? $education_summit['hons_shakha_manpower_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_shakha_manpower_s>0 && $hons_shakha_manpower_p>0)
                          {echo ($hons_shakha_manpower_p/$hons_shakha_manpower_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">সাধারণ</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_general_s" 
                              data-title="Enter">
                              <?php echo $hons_shakha_general_s=(isset( $education_summit['hons_shakha_general_s']))? $education_summit['hons_shakha_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="education_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_general_p" 
                              data-title="Enter">
                              <?php echo $hons_shakha_general_p=(isset( $education_summit['hons_shakha_general_p']))? $education_summit['hons_shakha_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_shakha_general_s>0 && $hons_shakha_general_p>0)
                          {echo ($hons_shakha_general_p/$hons_shakha_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                            <td class="tg-pwj7" colspan="3"><b>শাখা নিয়ন্ত্রিত কোচিং সংক্রান্ত তথ্য  </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Education_শাখা নিয়ন্ত্রিত কোচিং সংক্রান্ত তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">স্তর</td>
                                <td class="tg-pwj7"> কোচিংয়ের নাম</td>
                                <td class="tg-pwj7">ব্যাচ সংখ্যা </td>
                                <td class="tg-pwj7"> শিক্ষার্থী সংখ্যা</td>

                            </tr>

                            <?php
                            $pk = (isset($education_coaching['id']))?$education_coaching['id']:"";

                            ?>
                            <tr>
                                <td class="tg-y698 type_1">চতুর্থ-দশম শ্রেণি</td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="4to10_coachingname" 
                                    data-title="Enter"><?php echo $ssc_coachingname=(isset( $education_coaching['4to10_coachingname']))? $education_coaching['4to10_coachingname']:"" ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="4to10_batch" 
                                    data-title="Enter"><?php echo $ssc_batch=(isset( $education_coaching['4to10_batch']))? $education_coaching['4to10_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="4to10_student" 
                                    data-title="Enter"><?php echo $ssc_student=(isset( $education_coaching['4to10_student']))? $education_coaching['4to10_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">একাদশ-দ্বাদশ শ্রেণি </td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="11_12_coachingname" 
                                    data-title="Enter"><?php echo $hsc_coachingname=(isset( $education_coaching['11_12_coachingname']))? $education_coaching['11_12_coachingname']:"" ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="11_12_batch" 
                                    data-title="Enter"><?php echo $hsc_batch=(isset( $education_coaching['11_12_batch']))? $education_coaching['11_12_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="11_12_student" 
                                    data-title="Enter"><?php echo $hsc_student=(isset( $education_coaching['11_12_student']))? $education_coaching['11_12_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698"> বিশ্ববিদ্যালয় ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="university_coachingname" 
                                    data-title="Enter"><?php echo $university_coachingname=(isset( $education_coaching['university_coachingname']))? $education_coaching['university_coachingname']:"" ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="university_batch" 
                                    data-title="Enter"><?php echo $university_batch=(isset( $education_coaching['university_batch']))? $education_coaching['university_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="university_student" 
                                    data-title="Enter"><?php echo $university_student=(isset( $education_coaching['university_student']))? $education_coaching['university_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">মেডিকেল ভর্তিচ্ছু </td>

                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_coachingname" 
                                    data-title="Enter"><?php echo $medical_coachingname=(isset( $education_coaching['medical_coachingname']))? $education_coaching['medical_coachingname']:"" ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_batch" 
                                    data-title="Enter"><?php echo $medical_batch=(isset( $education_coaching['medical_batch']))? $education_coaching['medical_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="medical_student" 
                                    data-title="Enter"><?php echo $medical_student=(isset( $education_coaching['medical_student']))? $education_coaching['medical_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">ইঞ্জিনিয়ারিং ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_coachingname" 
                                    data-title="Enter"><?php echo $eng_coachingname=(isset( $education_coaching['eng_coachingname']))? $education_coaching['eng_coachingname']:"" ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_batch" 
                                    data-title="Enter"><?php echo $eng_batch=(isset( $education_coaching['eng_batch']))? $education_coaching['eng_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="eng_student" 
                                    data-title="Enter"><?php echo $eng_student=(isset( $education_coaching['eng_student']))? $education_coaching['eng_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                           

                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_coachingname" 
                                    data-title="Enter"><?php echo $other_coachingname=(isset( $education_coaching['other_coachingname']))? $education_coaching['other_coachingname']:"" ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_batch" 
                                    data-title="Enter"><?php echo $other_batch=(isset( $education_coaching['other_batch']))? $education_coaching['other_batch']:0 ?>
                                </a>
                                </td>
                                <td class="tg-0pky  type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="education_coaching" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="other_student" 
                                    data-title="Enter"><?php echo $other_student=(isset( $education_coaching['other_student']))? $education_coaching['other_student']:0 ?>
                                </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-0pky" colspan="2"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo  ($ssc_batch + $hsc_batch + $university_batch + $medical_batch + $eng_batch + $other_batch)  ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($ssc_student + $hsc_student + $university_student + $medical_student + $eng_student  + $other_student) ?>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="প্লেসধারী">
                            <tr>
                                <td class="tg-pwj7" colspan="13"><b>প্রফেশনাল আউটপুট-০১ (শিক্ষক) : বিশ্ববিদ্যালয়ের প্লেসধারী</b></td>
                                <td class="tg-pwj7" colspan="4">
                                <a href="#" id='table_4' onclick="doit('xlsx','প্লেসধারী','<?php echo 'প্রফেশনাল আউটপুট-০১ (শিক্ষক):বিশ্ববিদ্যালয়ের প্লেসধারী_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">মান</td>
                                <td class="tg-pwj7" colspan="2">১ম সেমিস্টার </td>
                                <td class="tg-pwj7" colspan="2">২য় সেমিস্টার </td>
                                <td class="tg-pwj7" colspan="2">৩য় সেমিস্টার</td> 
                                <td class="tg-pwj7" colspan="2">৪র্থ সেমিস্টার  </td>
                                <td class="tg-pwj7" colspan="2">৫ম সেমিস্টার </td>
                                <td class="tg-pwj7" colspan="2"> ৬ষ্ঠ  সেমিস্টার</td>
                                <td class="tg-pwj7" colspan="2">৭ম সেমিস্টার  </td>
                                <td class="tg-pwj7" colspan="2">৮ম সেমিস্টার</td>

                            </tr>

                            <tr>
                            <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                            <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                            <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>


                            </tr>

                            <?php
                            $pk = (isset($education_professionaloutput_teacher['id']))?$education_professionaloutput_teacher['id']:"";

                            ?>
                            <tr>
                                   <td class="tg-0pky  type_3">সদস্য </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_1_t"
                                        data-title="Enter"><?php echo $so_1_t = (isset($education_professionaloutput_teacher['so_1_t'])) ? $education_professionaloutput_teacher['so_1_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_1_o"
                                        data-title="Enter"><?php echo $so_1_o = (isset($education_professionaloutput_teacher['so_1_o'])) ? $education_professionaloutput_teacher['so_1_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_2_t"
                                        data-title="Enter"><?php echo $so_2_t = (isset($education_professionaloutput_teacher['so_2_t'])) ? $education_professionaloutput_teacher['so_2_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_2_o"
                                        data-title="Enter"><?php echo $so_2_o = (isset($education_professionaloutput_teacher['so_2_o'])) ? $education_professionaloutput_teacher['so_2_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_3_t"
                                        data-title="Enter"><?php echo $so_3_t = (isset($education_professionaloutput_teacher['so_3_t'])) ? $education_professionaloutput_teacher['so_3_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_3_o"
                                        data-title="Enter"><?php echo $so_3_o = (isset($education_professionaloutput_teacher['so_3_o'])) ? $education_professionaloutput_teacher['so_3_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_4_t"
                                        data-title="Enter"><?php echo $so_4_t = (isset($education_professionaloutput_teacher['so_4_t'])) ? $education_professionaloutput_teacher['so_4_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_4_o"
                                        data-title="Enter"><?php echo $so_4_o = (isset($education_professionaloutput_teacher['so_4_o'])) ? $education_professionaloutput_teacher['so_4_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_5_t"
                                        data-title="Enter"><?php echo $so_5_t = (isset($education_professionaloutput_teacher['so_5_t'])) ? $education_professionaloutput_teacher['so_5_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_5_o"
                                        data-title="Enter"><?php echo $so_5_o = (isset($education_professionaloutput_teacher['so_5_o'])) ? $education_professionaloutput_teacher['so_5_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_6_t"
                                        data-title="Enter"><?php echo $so_6_t = (isset($education_professionaloutput_teacher['so_6_t'])) ? $education_professionaloutput_teacher['so_6_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_6_o"
                                        data-title="Enter"><?php echo $so_6_o = (isset($education_professionaloutput_teacher['so_6_o'])) ? $education_professionaloutput_teacher['so_6_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_7_t"
                                        data-title="Enter"><?php echo $so_7_t = (isset($education_professionaloutput_teacher['so_7_t'])) ? $education_professionaloutput_teacher['so_7_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_7_o"
                                        data-title="Enter"><?php echo $so_7_o = (isset($education_professionaloutput_teacher['so_7_o'])) ? $education_professionaloutput_teacher['so_7_o'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_8_t"
                                        data-title="Enter"><?php echo $so_8_t = (isset($education_professionaloutput_teacher['so_8_t'])) ? $education_professionaloutput_teacher['so_8_t'] : 0 ?>
                                    </a>
                                 </td>
                                 <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                         data-name="so_8_o"
                                        data-title="Enter"><?php echo $so_8_o = (isset($education_professionaloutput_teacher['so_8_o'])) ? $education_professionaloutput_teacher['so_8_o'] : 0 ?>
                                    </a>
                                 </td>
                            </tr>

                            <tr>

                            <td class="tg-0pky  type_3">সাথী  </td>
                            <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_1_t" data-title="Enter"><?php echo $sa_1_t = (isset($education_professionaloutput_teacher['sa_1_t'])) ? $education_professionaloutput_teacher['sa_1_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_1_o" data-title="Enter"><?php echo $sa_1_o = (isset($education_professionaloutput_teacher['sa_1_o'])) ? $education_professionaloutput_teacher['sa_1_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_2_t" data-title="Enter"><?php echo $sa_2_t = (isset($education_professionaloutput_teacher['sa_2_t'])) ? $education_professionaloutput_teacher['sa_2_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_2_o" data-title="Enter"><?php echo $sa_2_o = (isset($education_professionaloutput_teacher['sa_2_o'])) ? $education_professionaloutput_teacher['sa_2_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_3_t" data-title="Enter"><?php echo $sa_3_t = (isset($education_professionaloutput_teacher['sa_3_t'])) ? $education_professionaloutput_teacher['sa_3_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_3_o" data-title="Enter"><?php echo $sa_3_o = (isset($education_professionaloutput_teacher['sa_3_o'])) ? $education_professionaloutput_teacher['sa_3_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_4_t" data-title="Enter"><?php echo $sa_4_t = (isset($education_professionaloutput_teacher['sa_4_t'])) ? $education_professionaloutput_teacher['sa_4_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="sa_4_o" data-title="Enter"><?php echo $sa_4_o = (isset($education_professionaloutput_teacher['sa_4_o'])) ? $education_professionaloutput_teacher['sa_4_o'] : 0 ?>
                                    </a>
                                </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_5_t"
                                    data-title="Enter"><?php echo $sa_5_t = (isset($education_professionaloutput_teacher['sa_5_t'])) ? $education_professionaloutput_teacher['sa_5_t'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_5_o"
                                    data-title="Enter"><?php echo $sa_5_o = (isset($education_professionaloutput_teacher['sa_5_o'])) ? $education_professionaloutput_teacher['sa_5_o'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_6_t"
                                    data-title="Enter"><?php echo $sa_6_t = (isset($education_professionaloutput_teacher['sa_6_t'])) ? $education_professionaloutput_teacher['sa_6_t'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_6_o"
                                    data-title="Enter"><?php echo $sa_6_o = (isset($education_professionaloutput_teacher['sa_6_o'])) ? $education_professionaloutput_teacher['sa_6_o'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_7_t"
                                    data-title="Enter"><?php echo $sa_7_t = (isset($education_professionaloutput_teacher['sa_7_t'])) ? $education_professionaloutput_teacher['sa_7_t'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_7_o"
                                    data-title="Enter"><?php echo $sa_7_o = (isset($education_professionaloutput_teacher['sa_7_o'])) ? $education_professionaloutput_teacher['sa_7_o'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_8_t"
                                    data-title="Enter"><?php echo $sa_8_t = (isset($education_professionaloutput_teacher['sa_8_t'])) ? $education_professionaloutput_teacher['sa_8_t'] : 0 ?>
                                </a>
                            </td>
                            <td class="tg-0pky  type_3">
                                <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                    data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                    data-name="sa_8_o"
                                    data-title="Enter"><?php echo $sa_8_o = (isset($education_professionaloutput_teacher['sa_8_o'])) ? $education_professionaloutput_teacher['sa_8_o'] : 0 ?>
                                </a>
                            </td>

                            </tr>


                            <tr>
                            <td class="tg-0pky  type_3">কর্মী  </td>
                            <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_1_t" data-title="Enter"><?php echo $ko_1_t = (isset($education_professionaloutput_teacher['ko_1_t'])) ? $education_professionaloutput_teacher['ko_1_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_1_o" data-title="Enter"><?php echo $ko_1_o = (isset($education_professionaloutput_teacher['ko_1_o'])) ? $education_professionaloutput_teacher['ko_1_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_2_t" data-title="Enter"><?php echo $ko_2_t = (isset($education_professionaloutput_teacher['ko_2_t'])) ? $education_professionaloutput_teacher['ko_2_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_2_o" data-title="Enter"><?php echo $ko_2_o = (isset($education_professionaloutput_teacher['ko_2_o'])) ? $education_professionaloutput_teacher['ko_2_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_3_t" data-title="Enter"><?php echo $ko_3_t = (isset($education_professionaloutput_teacher['ko_3_t'])) ? $education_professionaloutput_teacher['ko_3_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_3_o" data-title="Enter"><?php echo $ko_3_o = (isset($education_professionaloutput_teacher['ko_3_o'])) ? $education_professionaloutput_teacher['ko_3_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_4_t" data-title="Enter"><?php echo $ko_4_t = (isset($education_professionaloutput_teacher['ko_4_t'])) ? $education_professionaloutput_teacher['ko_4_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_4_o" data-title="Enter"><?php echo $ko_4_o = (isset($education_professionaloutput_teacher['ko_4_o'])) ? $education_professionaloutput_teacher['ko_4_o'] : 0 ?>
                                    </a>
                                </td>

                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_5_t"
                                        data-title="Enter"><?php echo $ko_5_t = (isset($education_professionaloutput_teacher['ko_5_t'])) ? $education_professionaloutput_teacher['ko_5_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_5_o"
                                        data-title="Enter"><?php echo $ko_5_o = (isset($education_professionaloutput_teacher['ko_5_o'])) ? $education_professionaloutput_teacher['ko_5_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_6_t"
                                        data-title="Enter"><?php echo $ko_6_t = (isset($education_professionaloutput_teacher['ko_6_t'])) ? $education_professionaloutput_teacher['ko_6_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_6_o"
                                        data-title="Enter"><?php echo $ko_6_o = (isset($education_professionaloutput_teacher['ko_6_o'])) ? $education_professionaloutput_teacher['ko_6_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_7_t"
                                        data-title="Enter"><?php echo $ko_7_t = (isset($education_professionaloutput_teacher['ko_7_t'])) ? $education_professionaloutput_teacher['ko_7_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_7_o"
                                        data-title="Enter"><?php echo $ko_7_o = (isset($education_professionaloutput_teacher['ko_7_o'])) ? $education_professionaloutput_teacher['ko_7_o'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_8_t"
                                        data-title="Enter"><?php echo $ko_8_t = (isset($education_professionaloutput_teacher['ko_8_t'])) ? $education_professionaloutput_teacher['ko_8_t'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number"
                                        data-table="education_professionaloutput_teacher" data-pk="<?php echo $pk ?>"
                                        data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>"
                                        data-name="ko_8_o"
                                        data-title="Enter"><?php echo $ko_8_o = (isset($education_professionaloutput_teacher['ko_8_o'])) ? $education_professionaloutput_teacher['ko_8_o'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            
                            <tr>
                            <td class="tg-0pky  type_3">মোট </td>
                            <td class="tg-0pky  type_3"><?php echo $so_1_t + $sa_1_t +$ko_1_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_1_o + $sa_1_o +$ko_1_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_2_t + $sa_2_t +$ko_2_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_2_o + $sa_2_o +$ko_2_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_3_t + $sa_3_t +$ko_3_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_3_o + $sa_3_o +$ko_3_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_4_t + $sa_4_t +$ko_4_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_4_o + $sa_4_o +$ko_4_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_5_t + $sa_5_t +$ko_5_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_5_o + $sa_5_o +$ko_5_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_6_t + $sa_6_t +$ko_6_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_6_o + $sa_6_o +$ko_6_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_7_t + $sa_7_t +$ko_7_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_7_o + $sa_7_o +$ko_7_o ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_8_t + $sa_8_t +$ko_8_t ?></td>
                            <td class="tg-0pky  type_3"><?php echo $so_8_o + $sa_8_o +$ko_8_o ?></td>
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
