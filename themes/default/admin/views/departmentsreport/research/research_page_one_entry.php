<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?='গবেষণা বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/research-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                                <td class="tg-pwj7" colspan=""><b> কাঠামো </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Research_কাঠামো_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" >ধরন </td>
                                <td class="tg-pwj7"> সংখ্যা/তথ্য </td>
                            </tr>
                            <?php
                                $pk = (isset($gobeshona_shikkha_kathamo['id']))?$gobeshona_shikkha_kathamo['id']:'';
                            ?>
                            <tr>
                               <td class="tg-0pky tg-pwj7" > শাখায় গবেষণা সম্পাদক আছে কি না? </td>
                               <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  id="ghobeshona_shompond" data-idname=""   data-type="select" 
                                        data-table="" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate2/'.$branch_id);?>" 
                                        data-name="ghobeshona_shompond@gobeshona_shikkha_kathamo" 
                                        data-title="শাখায় গবেষণা সম্পাদক আছে কি না?">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                               <td class="tg-0pky tg-pwj7" > বিভাগের  অধীনে কতটি গবেষণা স্কুল প্রতিষ্ঠিত আছে? (যদি থাকে) </td>
                               <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_shikkha_kathamo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="school" 
                                        data-title="Enter"><?php echo $school=(isset( $gobeshona_shikkha_kathamo['school']))? $gobeshona_shikkha_kathamo['school']:0; ?>
                                    </a>
                                </td>
                            </tr>  
                            <tr>
                               <td class="tg-0pky tg-pwj7" > এ বছর বৃদ্ধি হয়েছে কতটি স্কুল? </td>
                               <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_shikkha_kathamo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="school_bri" 
                                        data-title="Enter"><?php echo $school_bri=(isset( $gobeshona_shikkha_kathamo['school_bri']))? $gobeshona_shikkha_kathamo['school_bri']:0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                               <td class="tg-0pky tg-pwj7" > নলেজ মুভমেন্ট প্রজেক্টে সম্পৃক্ত জনশক্তি সংখ্যা </td>
                               <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_shikkha_kathamo" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="knowledge_movement" 
                                        data-title="Enter"><?php echo $knowledge_movement=(isset( $gobeshona_shikkha_kathamo['knowledge_movement']))? $gobeshona_shikkha_kathamo['knowledge_movement']:0; ?>
                                    </a>
                                </td>
                            </tr>  
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>গবেষণা বিভাগে সম্পৃক্ত জনশক্তি </b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Research_গবেষণা বিভাগে সম্পৃক্ত জনশক্তি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <?php
                                $pk = (isset($gobeshona_shomprikto_jonoshokti['id']))?$gobeshona_shomprikto_jonoshokti['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7">সদস্য </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_shomprikto_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shodossho" 
                                        data-title="Enter"><?php echo $shodossho=(isset( $gobeshona_shomprikto_jonoshokti['shodossho']))? $gobeshona_shomprikto_jonoshokti['shodossho']:0; ?>
                                    </a>
                                </td>
                                
                                <td class="tg-pwj7">সাথী  </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_shomprikto_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sathi" 
                                        data-title="Enter"><?php echo $sathi=(isset( $gobeshona_shomprikto_jonoshokti['sathi']))? $gobeshona_shomprikto_jonoshokti['sathi']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-pwj7">কর্মী </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_shomprikto_jonoshokti" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="kormi" 
                                        data-title="Enter"><?php echo $kormi=(isset( $gobeshona_shomprikto_jonoshokti['kormi']))? $gobeshona_shomprikto_jonoshokti['kormi']:0; ?>
                                    </a>
                                </td>
                                
                            </tr> 

                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>নিয়মিত প্রোগ্রাম </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Research_নিয়মিত প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                        
                                <td class="tg-pwj7" rowspan="">ধরন </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা   </td>
                                <td class="tg-pwj7" colspan="">উপস্থিত </td>
                                <td class="tg-pwj7" colspan="">গড়</td>
                           
                            </tr>
                            <?php
                                $pk = (isset($gobeshona_regular_program['id']))?$gobeshona_regular_program['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> সাপ্তাহিক ক্লাস 	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="week_class_n" 
                                        data-title="Enter"><?php echo $week_class_n=(isset( $gobeshona_regular_program['week_class_n']))? $gobeshona_regular_program['week_class_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="week_class_p" 
                                        data-title="Enter"><?php echo $week_class_p=(isset( $gobeshona_regular_program['week_class_p']))? $gobeshona_regular_program['week_class_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($week_class_p!=0 && $week_class_n!=0)?$week_class_p/$week_class_n:0,2)?>
                                </td>
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">দারসুল কুরআন </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="dars_quran_n" 
                                        data-title="Enter"><?php echo $dars_quran_n=(isset( $gobeshona_regular_program['dars_quran_n']))? $gobeshona_regular_program['dars_quran_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="dars_quran_p" 
                                        data-title="Enter"><?php echo $dars_quran_p=(isset( $gobeshona_regular_program['dars_quran_p']))? $gobeshona_regular_program['dars_quran_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dars_quran_p!=0 && $dars_quran_n!=0)?$dars_quran_p/$dars_quran_n:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698">উন্মুক্ত ক্লাস  </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="open_class_n" 
                                        data-title="Enter"><?php echo $open_class_n=(isset( $gobeshona_regular_program['open_class_n']))? $gobeshona_regular_program['open_class_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="open_class_p" 
                                        data-title="Enter"><?php echo $open_class_p=(isset( $gobeshona_regular_program['open_class_p']))? $gobeshona_regular_program['open_class_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($open_class_p!=0 && $open_class_n!=0)?$open_class_p/$open_class_n:0,2)?>
                                </td>
                              
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">মতবিনিময় সভা  </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="motobinimoy_n" 
                                        data-title="Enter"><?php echo $motobinimoy_n=(isset( $gobeshona_regular_program['motobinimoy_n']))? $gobeshona_regular_program['motobinimoy_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="motobinimoy_p" 
                                        data-title="Enter"><?php echo $motobinimoy_p=(isset( $gobeshona_regular_program['motobinimoy_p']))? $gobeshona_regular_program['motobinimoy_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($motobinimoy_p!=0 && $motobinimoy_n!=0)?$motobinimoy_p/$motobinimoy_n:0,2)?>
                                </td>
                              
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">দায়িত্বশীল বৈঠক  </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="dayittoshil_n" 
                                        data-title="Enter"><?php echo $dayittoshil_n=(isset( $gobeshona_regular_program['dayittoshil_n']))? $gobeshona_regular_program['dayittoshil_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="dayittoshil_p" 
                                        data-title="Enter"><?php echo $dayittoshil_p=(isset( $gobeshona_regular_program['dayittoshil_p']))? $gobeshona_regular_program['dayittoshil_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($dayittoshil_p!=0 && $dayittoshil_n!=0)?$dayittoshil_p/$dayittoshil_n:0,2)?>
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698">ইনডোর সেমিনার  </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="indoor_n" 
                                        data-title="Enter"><?php echo $indoor_n=(isset( $gobeshona_regular_program['indoor_n']))? $gobeshona_regular_program['indoor_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="indoor_p" 
                                        data-title="Enter"><?php echo $indoor_p=(isset( $gobeshona_regular_program['indoor_p']))? $gobeshona_regular_program['indoor_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($indoor_p!=0 && $indoor_n!=0)?$indoor_p/$indoor_n:0,2)?>
                                </td>
                              
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"> ব্যবহারিক ক্লাস </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="beboharik_n" 
                                        data-title="Enter"><?php echo $beboharik_n=(isset( $gobeshona_regular_program['beboharik_n']))? $gobeshona_regular_program['beboharik_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="beboharik_p" 
                                        data-title="Enter"><?php echo $beboharik_p=(isset( $gobeshona_regular_program['beboharik_p']))? $gobeshona_regular_program['beboharik_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($beboharik_p!=0 && $beboharik_n!=0)?$beboharik_p/$beboharik_n:0,2)?>
                                </td>                            
                            </tr>
                            <tr>
                                <td class="tg-y698">ভিজ্যুয়াল ক্লাস </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="visual_n" 
                                        data-title="Enter"><?php echo $visual_n=(isset( $gobeshona_regular_program['visual_n']))? $gobeshona_regular_program['visual_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="visual_p" 
                                        data-title="Enter"><?php echo $visual_p=(isset( $gobeshona_regular_program['visual_p']))? $gobeshona_regular_program['visual_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($visual_p!=0 && $visual_n!=0)?$visual_p/$visual_n:0,2)?>
                                </td>                          
                            </tr>
                            <tr>
                                <td class="tg-y698">মিলনমেলা </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="milonmela_n" 
                                        data-title="Enter"><?php echo $milonmela_n=(isset( $gobeshona_regular_program['milonmela_n']))? $gobeshona_regular_program['milonmela_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="milonmela_p" 
                                        data-title="Enter"><?php echo $milonmela_p=(isset( $gobeshona_regular_program['milonmela_p']))? $gobeshona_regular_program['milonmela_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($milonmela_p!=0 && $milonmela_n!=0)?$milonmela_p/$milonmela_n:0,2)?>
                                </td>
                            
                            </tr>
                              <tr>
                                <td class="tg-y698">সংবাদ বিশ্লেষণ </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shongbad_n" 
                                        data-title="Enter"><?php echo $shongbad_n=(isset( $gobeshona_regular_program['shongbad_n']))? $gobeshona_regular_program['shongbad_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="shongbad_p" 
                                        data-title="Enter"><?php echo $shongbad_p=(isset( $gobeshona_regular_program['shongbad_p']))? $gobeshona_regular_program['shongbad_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($shongbad_p!=0 && $shongbad_n!=0)?$shongbad_p/$shongbad_n:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">পুরস্কার বিতরণী অনুষ্ঠান </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="puroshkar_n" 
                                        data-title="Enter"><?php echo $puroshkar_n=(isset( $gobeshona_regular_program['puroshkar_n']))? $gobeshona_regular_program['puroshkar_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="puroshkar_p" 
                                        data-title="Enter"><?php echo $puroshkar_p=(isset( $gobeshona_regular_program['puroshkar_p']))? $gobeshona_regular_program['puroshkar_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($puroshkar_p!=0 && $puroshkar_n!=0)?$puroshkar_p/$puroshkar_n:0,2)?>
                                </td>
                            
                            </tr>
                           
                            <tr>
                                <td class="tg-y698">চা-চক্র </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="cha_n" 
                                        data-title="Enter"><?php echo $cha_n=(isset( $gobeshona_regular_program['cha_n']))? $gobeshona_regular_program['cha_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="cha_p" 
                                        data-title="Enter"><?php echo $cha_p=(isset( $gobeshona_regular_program['cha_p']))? $gobeshona_regular_program['cha_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($cha_p!=0 && $cha_n!=0)?$cha_p/$cha_n:0,2)?>
                                </td>
                            </tr>  
                            
                            <tr>

                                <td class="tg-y698"> অন্যান্য </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="other_n" 
                                        data-title="Enter"><?php echo $other_n=(isset( $gobeshona_regular_program['other_n']))? $gobeshona_regular_program['other_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_regular_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="other_p" 
                                        data-title="Enter"><?php echo $other_p=(isset( $gobeshona_regular_program['other_p']))? $gobeshona_regular_program['other_p']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo number_format(($other_p!=0 && $other_n!=0)?$other_p/$other_n:0,2)?>
                                </td>
                                                           
                            </tr>
                            
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>বিশেষ প্রোগ্রাম </b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Research_বিশেষ প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ধরণ </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">অংশগ্রহণকারী সংখ্যা   </td>
                            
                               
                           
                            </tr>
                            <?php
                                $pk = (isset($gobeshona_bishesh_program['id']))?$gobeshona_bishesh_program['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1">  ওয়ার্কশপ 	</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="workshop_n" 
                                        data-title="Enter"><?php echo $workshop_n=(isset( $gobeshona_bishesh_program['workshop_n']))? $gobeshona_bishesh_program['workshop_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="workshop_attendence" 
                                        data-title="Enter"><?php echo $workshop_attendence=(isset( $gobeshona_bishesh_program['workshop_attendence']))? $gobeshona_bishesh_program['workshop_attendence']:0; ?>
                                    </a>
                                </td>
                            
                                
                            </tr>

                            <tr>
                                <td class="tg-y698">সেমিনার/কনফারেন্স</td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="seminer_n" 
                                        data-title="Enter"><?php echo $seminer_n=(isset( $gobeshona_bishesh_program['seminer_n']))? $gobeshona_bishesh_program['seminer_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="seminer_attendence" 
                                        data-title="Enter"><?php echo $seminer_attendence=(isset( $gobeshona_bishesh_program['seminer_attendence']))? $gobeshona_bishesh_program['seminer_attendence']:0; ?>
                                    </a>
                                </td>
                                              
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাসফর   </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="tour_n" 
                                        data-title="Enter"><?php echo $tour_n=(isset( $gobeshona_bishesh_program['tour_n']))? $gobeshona_bishesh_program['tour_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="tour_attendence" 
                                        data-title="Enter"><?php echo $tour_attendence=(isset( $gobeshona_bishesh_program['tour_attendence']))? $gobeshona_bishesh_program['tour_attendence']:0; ?>
                                    </a>
                                </td>
                           
                                                             
                            </tr>
                            <tr>
                                <td class="tg-y698">বিদেশ সফর </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bideshe_n" 
                                        data-title="Enter"><?php echo $bideshe_n=(isset( $gobeshona_bishesh_program['bideshe_n']))? $gobeshona_bishesh_program['bideshe_n']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bishesh_program" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="bideshe_attendence" 
                                        data-title="Enter"><?php echo $bideshe_attendence=(isset( $gobeshona_bishesh_program['bideshe_attendence']))? $gobeshona_bishesh_program['bideshe_attendence']:0; ?>
                                    </a>
                                </td>
                             
                                                         
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>যোগাযোগ</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Research_যোগাযোগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="">ধরণ </td>
                               
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">টার্গেট গ্রুপ</td>
                           
                            </tr>
                            <?php
                                $pk = (isset($gobeshona_bivag_jogajog['id']))?$gobeshona_bivag_jogajog['id']:'';
                            ?>
                            <tr>
                                <td class="tg-y698 type_1"> ই-মেইল 	</td>
                            
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="emil_s" 
                                        data-title="Enter"><?php echo $emil_s=(isset( $gobeshona_bivag_jogajog['emil_s']))? $gobeshona_bivag_jogajog['emil_s']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="emil_tg" 
                                        data-title="Enter"><?php echo $emil_tg=(isset( $gobeshona_bivag_jogajog['emil_tg']))? $gobeshona_bivag_jogajog['emil_tg']:0; ?>
                                    </a>
                                </td>                             
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">এসএমএস  </td>
                            
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sms_s" 
                                        data-title="Enter"><?php echo $sms_s=(isset( $gobeshona_bivag_jogajog['sms_s']))? $gobeshona_bivag_jogajog['sms_s']:0; ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_5"> 
                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                        data-table="gobeshona_bivag_jogajog" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                        data-name="sms_tg" 
                                        data-title="Enter"><?php echo $sms_tg=(isset( $gobeshona_bivag_jogajog['sms_tg']))? $gobeshona_bivag_jogajog['sms_tg']:0; ?>
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