<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='গবেষণা বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Research_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($gobeshona_training_program['id']))?$gobeshona_training_program['id']:'';
                                
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
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $gobeshona_training_program['shikkha_central_s']))? $gobeshona_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $gobeshona_training_program['shikkha_central_p']))? $gobeshona_training_program['shikkha_central_p']:'' ?>
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
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $gobeshona_training_program['shikkha_shakha_s']))? $gobeshona_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $gobeshona_training_program['shikkha_shakha_p']))? $gobeshona_training_program['shikkha_shakha_p']:'' ?>
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
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $gobeshona_training_program['kormoshala_central_s']))? $gobeshona_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $gobeshona_training_program['kormoshala_central_p']))? $gobeshona_training_program['kormoshala_central_p']:'' ?>
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
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $gobeshona_training_program['kormoshala_shakha_s']))? $gobeshona_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="gobeshona_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $gobeshona_training_program['kormoshala_shakha_p']))? $gobeshona_training_program['kormoshala_shakha_p']:'' ?>
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
                        <td class="tg-pwj7" colspan="2"><b>লেখালেখি ও প্রকাশ সংক্রান্ত </b></td>
                        <td class="tg-pwj7" colspan="1">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Research_লেখালেখি ও প্রকাশ সংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan="">লেখালেখির ধরণ   </td>
                        <td class="tg-pwj7" colspan="">লেখা হয়েছে কতটি? </td>
                        <td class="tg-pwj7" colspan="">প্রকাশিত হয়েছে কতটি? </td>
                    </tr>
                    <?php
                        $pk = (isset($gobeshona_lekhalekhi['id']))?$gobeshona_lekhalekhi['id']:'';
                    ?>
                    <tr>
                    <td class="tg-pwj7">
                       প্রবন্ধ
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="probondho_lekha" 
                                data-title="Enter"><?php echo $probondho_lekha=(isset( $gobeshona_lekhalekhi['probondho_lekha']))? $gobeshona_lekhalekhi['probondho_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="probondho_prokash" 
                                data-title="Enter"><?php echo $probondho_prokash=(isset( $gobeshona_lekhalekhi['probondho_prokash']))? $gobeshona_lekhalekhi['probondho_prokash']:0; ?>
                            </a>
                        </td>
                    </tr>  
                    <tr>
                       <td class="tg-pwj7">
                       <!-- গবেষণা প্রবন্ধ --> <!-- নিবন্ধ (পেপার)  rename to গবেষণা প্রবন্ধ   -->
                       নিবন্ধ (পেপার)
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="nibondhon_lekha" 
                                data-title="Enter"><?php echo $nibondhon_lekha=(isset( $gobeshona_lekhalekhi['nibondhon_lekha']))? $gobeshona_lekhalekhi['nibondhon_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="nibondhon_prokash" 
                                data-title="Enter"><?php echo $nibondhon_prokash=(isset( $gobeshona_lekhalekhi['nibondhon_prokash']))? $gobeshona_lekhalekhi['nibondhon_prokash']:0; ?>
                            </a>
                        </td>
                    </tr>
                    <tr>
                       <td class="tg-pwj7">
                       বই 
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="boi_lekha" 
                                data-title="Enter"><?php echo $boi_lekha=(isset( $gobeshona_lekhalekhi['boi_lekha']))? $gobeshona_lekhalekhi['boi_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="boi_prokash" 
                                data-title="Enter"><?php echo $boi_prokash=(isset( $gobeshona_lekhalekhi['boi_prokash']))? $gobeshona_lekhalekhi['boi_prokash']:0; ?>
                            </a>
                        </td>
                    </tr>  
                    <tr>
                       <td class="tg-pwj7">
                       বুক রিভিউ
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="boi_review_lekha" 
                                data-title="Enter"><?php echo $boi_review_lekha=(isset( $gobeshona_lekhalekhi['boi_review_lekha']))? $gobeshona_lekhalekhi['boi_review_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="boi_review_prokash" 
                                data-title="Enter"><?php echo $boi_review_prokash=(isset( $gobeshona_lekhalekhi['boi_review_prokash']))? $gobeshona_lekhalekhi['boi_review_prokash']:0; ?>
                            </a>
                        </td>
                    </tr> 

                    <tr>
                       <td class="tg-pwj7">
                       প্রবন্ধ রিভিউ <!-- প্রবন্ধ রিভিউ rename to আর্টিকেল রিভিউ   -->
                       
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="review_lekha" 
                                data-title="Enter"><?php echo $review_lekha=(isset( $gobeshona_lekhalekhi['review_lekha']))? $gobeshona_lekhalekhi['review_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="review_prokash" 
                                data-title="Enter"><?php echo $review_prokash=(isset( $gobeshona_lekhalekhi['review_prokash']))? $gobeshona_lekhalekhi['review_prokash']:0; ?>
                            </a>
                        </td>

                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       কলাম সংবাদপত্র  <!-- প্রেজেন্টেশন  rename to কলাম সংবাদপত্র    -->
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="presentation_lekha" 
                                data-title="Enter"><?php echo $presentation_lekha=(isset( $gobeshona_lekhalekhi['presentation_lekha']))? $gobeshona_lekhalekhi['presentation_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="presentation_prokash" 
                                data-title="Enter"><?php echo $presentation_prokash=(isset( $gobeshona_lekhalekhi['presentation_prokash']))? $gobeshona_lekhalekhi['presentation_prokash']:0; ?>
                            </a>
                        </td>

                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       ডকুমেন্টারি
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="document_lekha" 
                                data-title="Enter"><?php echo $document_lekha=(isset( $gobeshona_lekhalekhi['document_lekha']))? $gobeshona_lekhalekhi['document_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="document_prokash" 
                                data-title="Enter"><?php echo $document_prokash=(isset( $gobeshona_lekhalekhi['document_prokash']))? $gobeshona_lekhalekhi['document_prokash']:0; ?>
                            </a>
                        </td>

                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       কনফারেন্স  পেপার <!-- স্ক্রিপ্টিং রাইটিং  rename to কনফারেন্স  পেপার   --> 
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="script_lekha" 
                                data-title="Enter"><?php echo $script_lekha=(isset( $gobeshona_lekhalekhi['script_lekha']))? $gobeshona_lekhalekhi['script_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="script_prokash" 
                                data-title="Enter"><?php echo $script_prokash=(isset( $gobeshona_lekhalekhi['script_prokash']))? $gobeshona_lekhalekhi['script_prokash']:0; ?>
                            </a>
                        </td>
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       বাংলা ব্লগ 
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="bangla_lekha" 
                                data-title="Enter"><?php echo $bangla_lekha=(isset( $gobeshona_lekhalekhi['bangla_lekha']))? $gobeshona_lekhalekhi['bangla_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="bangla_prokash" 
                                data-title="Enter"><?php echo $bangla_prokash=(isset( $gobeshona_lekhalekhi['bangla_prokash']))? $gobeshona_lekhalekhi['bangla_prokash']:0; ?>
                            </a>
                        </td>
 
                    </tr> 
                    <tr>
                       <td class="tg-pwj7">
                       ইংরেজি ব্লগ 
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="english_lekha" 
                                data-title="Enter"><?php echo $english_lekha=(isset( $gobeshona_lekhalekhi['english_lekha']))? $gobeshona_lekhalekhi['english_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="english_prokash" 
                                data-title="Enter"><?php echo $english_prokash=(isset( $gobeshona_lekhalekhi['english_prokash']))? $gobeshona_lekhalekhi['english_prokash']:0; ?>
                            </a>
                        </td>
                  
                    </tr>                     
                    <tr>
                       <td class="tg-pwj7">
                       পোস্টার প্রেজেন্টেশন 
                       </td>
                       <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="poster_pre_lekha" 
                                data-title="Enter"><?php echo $poster_pre_lekha=(isset( $gobeshona_lekhalekhi['poster_pre_lekha']))? $gobeshona_lekhalekhi['poster_pre_lekha']:0; ?>
                            </a>
                        </td>
                        <td class="tg-0pky  type_5"> 
                            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                data-table="gobeshona_lekhalekhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                data-name="poster_pre_prokash" 
                                data-title="Enter"><?php echo $poster_pre_prokash=(isset( $gobeshona_lekhalekhi['poster_pre_prokash']))? $gobeshona_lekhalekhi['poster_pre_prokash']:0; ?>
                            </a>
                        </td>                  
                    </tr>                     
                </table>
                
                <table class="tg table table-header-rotated" id="testTable2">
                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>গবেষণারত ভাইদের আপডেট তালিকা</b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Research_গবেষণারত ভাইদের আপডেট তালিকা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                        <td class="tg-pwj7">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-gobeshona-gobeshonaroto-vai/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                    </tr>
                    <tr>				
                        <td class="tg-pwj7" colspan="">ক্রম</td>
                        <td class="tg-pwj7" colspan="">নাম </td>
                        <td class="tg-pwj7" rowspan="">কোন দেশে গবেষণারত  </td>
                        <td class="tg-pwj7" colspan="">সর্বশেষ দায়িত্ব </td>
                        <td class="tg-pwj7" rowspan="">গবেষণার স্তর </td>
                        <td class="tg-pwj7" colspan="">অনলাইন নম্বর </td>
                        <td class="tg-pwj7" colspan="">Actions </td>
                        
                    </tr>
                    
                   <?php 
                                $i=0;
                            foreach($gobeshona_gobeshonaroto_vai->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $i ?>      
                                    </td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['which_country'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['last_dayitto'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['stor'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['online_num'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-gobeshona-gobeshonaroto-vai/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@gobeshona_gobeshonaroto_vai@".$row['name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>গবেষণায় আগ্রহী জনশক্তিদের তালিকা </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Research_গবেষণায় আগ্রহী জনশক্তিদের তালিকা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                        <td class="tg-pwj7">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-gobeshona-gobeshonay-agrohi/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                    </tr>
                    <tr>				
                        
                        <td class="tg-pwj7" colspan="">ক্রম</td>
                        <td class="tg-pwj7" colspan="">নাম </td>
                        <td class="tg-pwj7" rowspan="">সাংগঠনিক মান </td>
                        <td class="tg-pwj7" colspan="">বিভাগ</td>
                        <td class="tg-pwj7" rowspan="">আগ্রহের সেক্টর</td>
                        <td class="tg-pwj7" colspan="">অনলাইন নম্বর </td>
                        <td class="tg-pwj7" colspan="">Actions </td>
                    </tr>
                    
                   <?php 
                                $i=0;
                            foreach($gobeshona_gobeshonay_agrohi->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                <td class="tg-0pky  type_2">
                                    <?php echo $i ?>      
                                    </td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['sangothonik_man'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bivag'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['interested_sector'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['online_number'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-gobeshona-gobeshonay-agrohi/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@gobeshona_gobeshonay_agrohi@".$row['name']."@".$row['id'] ?>'>Delete</button>
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
    }
    .action_class{
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
$('#ghobeshona_shompond').editable({
    value: <?php echo (isset( $gobeshona_shikkha_kathamo['ghobeshona_shompond']))? $gobeshona_shikkha_kathamo['ghobeshona_shompond']:2; ?>,    
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