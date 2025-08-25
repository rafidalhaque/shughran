<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'সাহিত্য বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/literature-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        
                    </ul>
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
    .serialTxt{
        font-size:16px;
    }
    .serialbtn{
        display:flex;justify-content:right;
    }
    .custom-select{
        width: 100px;   
        color:black;
    }
    .modal-width{
        width: 100%;
        padding:0 15px;
    }

</style>

    <div class="box-content">
        <div class="row">

<!-- =========== Report serial code ============ -->

 

<div class="col-md-12">
<table class="table table-bordered">
  <tbody>
    <tr>
      <th scope="row" width="50" rowspan="2" class="serialTxt">সাহিত্য বিভাগের রিপোর্ট পূরণ করা শেষ হলে বিভাগকে রিপোর্ট চেক করার জন্য সিরিয়াল দিন</th>
      <td rowspan="2" width="60">Mark</td>
      <td width="60">চেক</td>
      <td width="60">ছাড়পত্র</td>
    </tr>
    <tr>
      <td scope="row"></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row" class="serialTxt">বিভাগীয় রিভিউ</th>
      <td colspan="4"></td>
    </tr>
  </tbody>
</table>
</div>

<div class="col-md-12">



<?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'add_institute');
        
        echo admin_form_open_multipart("serialcontroller/literatureserial/" . $branch_id, $attrib); ?>

 
        <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">

                    <label for="" class="serialTxt">সাহিত্য বিভাগের রিপোর্ট পূরণ করা শেষ হলে বিভাগকে রিপোর্ট চেক করার জন্য সিরিয়াল দিন  </label>
                    </div>

                </div>

                <input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id" />
                <input type="hidden" value="5" name="dept_id" />
                <input type="hidden" value="<?=$report_info['type']?>" name="report_type" />

                 
                <div class="col-md-2 col-sm-2">

                    <div class="form-group serialbtn">

                    <?php  echo form_submit('serialForcheck', 'সিরিয়াল', 'class=" btn btn-primary"'); ?>
                    

                    </div>
                </div>
            </div>       
        </div>
      
    
    <?php echo form_close(); ?>
    </div>

<!-- =========== /. Report checking code ============ -->




<!-- =========== checking code  for Department ============ -->
<div class="modal-dialog modal-lg modal-width">
    <div class="modal-content">
             
        <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />

        <div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

               <div class="row">                
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="check" class="serialTxt">চেক</label>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="check" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">চেক করা হয়েছে</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="check" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">চেক করা হয়নি</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="" class="serialTxt">ছাড়পত্র</label>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="charpotro" id="inlineRadio3" value="option1">
                            <label class="form-check-label" for="inlineRadio3">Completed</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="charpotro" id="inlineRadio4" value="option2">
                            <label class="form-check-label" for="inlineRadio4">Not complete</label>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" >
                        <?= lang("বিভাগীয় রিভিউ", "dept_review"); ?>
                        <?php echo form_textarea('dept_review', '', 'class="form-control" id="dept_review" style="max-height: 50px;"'); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <?php echo form_submit('serialreport', 'Submit', 'class="btn btn-primary"'); ?>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>
<!-- =========== /.  Report checking code  for Department ============ -->










             <div class="col-lg-12">
               
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                      

<table class="tg table table-header-rotated" id="testTable1">
        <tr>
            <td class="tg-pwj7" colspan="9"><b> পত্রিকার গ্রাহক বৃদ্ধি : </b></td>
            <td class="tg-pwj7" colspan="7">
                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Literature_পত্রিকার গ্রাহক বৃদ্ধি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
            </td>
        </tr>

        <tr>
            <td class="tg-pwj7" rowspan="3">পত্রিকার নাম</td>
            <td class="tg-pwj7" colspan="8">পত্রিকা </td>
            <td class="tg-pwj7" colspan="5">গ্রাহক  </td>
            
        </tr>
        
        <tr>
           
            <td class="tg-pwj7" colspan="5">মাসিক সংখ্যা </td>
            <td class="tg-pwj7" colspan="3">বার্ষিক সংখ্যা  </td>

            <td class="tg-pwj7" rowspan="2"><div><span>পূর্ব সংখ্যা</span></div></td>
            <td class="tg-pwj7" rowspan="2"><div><span>বর্তমান সংখ্যা</span></div></td>
            <td class="tg-pwj7" rowspan="2"><div><span>বৃদ্ধির <br>টার্গেট </span></div></td>
            <td class="tg-pwj7" rowspan="2"><div><span>বৃদ্ধি </span></div></td>
            <td class="tg-pwj7" rowspan="2"><div><span>ঘাটতি </span></div></td>
           
        </tr>
        <tr>
            <td class="tg-pwj7"><div><span>পূর্ব </span></div></td>
            <td class="tg-pwj7"><div><span>বর্তমান </span></div></td>
            <td class="tg-pwj7"><div><span>বৃদ্ধির <br>টার্গেট </span></div></td>
            <td class="tg-pwj7"><div><span>বৃদ্ধি </span></div></td>
            <td class="tg-pwj7"><div><span>ঘাটতি </span></div></td>

            <td class="tg-pwj7"><div><span>মোট <br>সংখ্যা</span></div></td>
            <td class="tg-pwj7"><div><span>বিক্রয়  </span></div></td>
            <td class="tg-pwj7"><div><span>বিতরণ </span></div></td>

            
        </tr>
        <?php
        $pk = (isset($potrikar_grahok_briddhi['id']))?$potrikar_grahok_briddhi['id']:'';
        // var_dump($law_bipkhe_mamla) ;
        ?>


        <tr>
            <td class="tg-y698 type_1">বাংলা কিশোর পত্রিকা	</td>
            <td class="tg-0pky  type_1">
                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                    data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                    data-name="bkp_pn_before" 
                    data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_pn_before']))? $potrikar_grahok_briddhi['bkp_pn_before']:'' ?>
                </a>
            </td>

            <td class="tg-0pky  type_2">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_pn_present" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_pn_present']))? $potrikar_grahok_briddhi['bkp_pn_present']:'' ?>
            </a>
            </td>
            <td class="tg-0pky  type_5">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_bt_potrika" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_bt_potrika']))? $potrikar_grahok_briddhi['bkp_bt_potrika']:'' ?>
            </a>
            </td>

            <td class="tg-0pky  type_7">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_briddhi_potrika" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_briddhi_potrika']))? $potrikar_grahok_briddhi['bkp_briddhi_potrika']:'' ?>
            </a>
            </td>
            <td class="tg-0pky  type_9">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_ghatti_potrika" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_ghatti_potrika']))? $potrikar_grahok_briddhi['bkp_ghatti_potrika']:'' ?>
            </a>
            </td>

            <td class="tg-0pky  type_9">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_bmn" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_bmn']))? $potrikar_grahok_briddhi['bkp_bmn']:'' ?>
            </a>
            </td>

            <td class="tg-0pky  type_9">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_bbkry" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_bbkry']))? $potrikar_grahok_briddhi['bkp_bbkry']:'' ?>
            </a>
            </td>

            <td class="tg-0pky  type_9">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_bbitrn" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_bbitrn']))? $potrikar_grahok_briddhi['bkp_bbitrn']:'' ?>
            </a>
            </td>

            <td class="tg-0pky  type_3">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_gn_before" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_gn_before']))? $potrikar_grahok_briddhi['bkp_gn_before']:'' ?>
            </a>
            
            </td>
            <td class="tg-0pky  type_4">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_gn_present" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_gn_present']))? $potrikar_grahok_briddhi['bkp_gn_present']:'' ?>
            </a>
            
            </td>
            
            <td class="tg-0pky  type_6">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_bt_grahok" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_bt_grahok']))? $potrikar_grahok_briddhi['bkp_bt_grahok']:'' ?>
            </a>

            </td>
            
            <td class="tg-0pky type_8">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_briddhi_grahok" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_briddhi_grahok']))? $potrikar_grahok_briddhi['bkp_briddhi_grahok']:'' ?>
            </a>
            
            </td>
            <td class="tg-0pky  type_10">
            <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                data-table="literature_potrikar_grahok_briddhi" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                data-name="bkp_ghatti_grahok" 
                data-title="Enter"><?php echo (isset( $potrikar_grahok_briddhi['bkp_ghatti_grahok']))? $potrikar_grahok_briddhi['bkp_ghatti_grahok']:'' ?>
            </a>
           

            </td>
        </tr>


        <tr>
            <td class="tg-y698">নতুন বাংলা কিশোর পত্রিকা	 </td>
            <?php

            $types = array(
                'pn_before' => '1',
                'pn_present' => '2',
                'bt_potrika' => '5',
                'briddhi_potrika' => '7',
                'ghatti_potrika' => '9',
                'bmn' => '11',
                'bbkry' => '12',
                'bbitrn' => '13',
                'gn_before' => '3',
                'gn_present' => '4',
                'bt_grahok' => '6',
                'briddhi_grahok' => '8',
                'ghatti_grahok' => '10',
            );

            foreach ($types as $type => $number) {
                echo '<td class="tg-0pky type_' . $number . '">
                        <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" 
                            data-table="literature_potrikar_grahok_briddhi" data-pk="' . $pk . '" 
                            data-url="' . admin_url('departmentsreport/detailupdate') . '" 
                            data-name="nbkp_' . $type . '" 
                            data-title="Enter">' . (isset($potrikar_grahok_briddhi['nbkp_' . $type]) ? $potrikar_grahok_briddhi['nbkp_' . $type] : '') . '
                        </a>
                    </td>';
            }
            ?>

        </tr>

        <tr>
            <td class="tg-y698">ইংরেজি কিশোর পত্রিকা	 </td>
            <?php

            $types = array(
                'pn_before' => '1',
                'pn_present' => '2',
                'bt_potrika' => '5',
                'briddhi_potrika' => '7',
                'ghatti_potrika' => '9',
                'bmn' => '11',
                'bbkry' => '12',
                'bbitrn' => '13',
                'gn_before' => '3',
                'gn_present' => '4',
                'bt_grahok' => '6',
                'briddhi_grahok' => '8',
                'ghatti_grahok' => '10',
            );

            foreach ($types as $type => $number) {
                echo '<td class="tg-0pky type_' . $number . '">
                        <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" 
                            data-table="literature_potrikar_grahok_briddhi" data-pk="' . $pk . '" 
                            data-url="' . admin_url('departmentsreport/detailupdate') . '" 
                            data-name="ekp_' . $type . '" 
                            data-title="Enter">' . (isset($potrikar_grahok_briddhi['ekp_' . $type]) ? $potrikar_grahok_briddhi['ekp_' . $type] : '') . '
                        </a>
                    </td>';
            }
            ?>

        </tr>



        <tr>
            <td class="tg-y698">ছাত্রসংবাদ	</td>
            <?php

            $types = array(
                'pn_before' => '1',
                'pn_present' => '2',
                'bt_potrika' => '5',
                'briddhi_potrika' => '7',
                'ghatti_potrika' => '9',
                'bmn' => '11',
                'bbkry' => '12',
                'bbitrn' => '13',
                'gn_before' => '3',
                'gn_present' => '4',
                'bt_grahok' => '6',
                'briddhi_grahok' => '8',
                'ghatti_grahok' => '10',
            );

            foreach ($types as $type => $number) {
                echo '<td class="tg-0pky type_' . $number . '">
                        <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" 
                            data-table="literature_potrikar_grahok_briddhi" data-pk="' . $pk . '" 
                            data-url="' . admin_url('departmentsreport/detailupdate') . '" 
                            data-name="cs_' . $type . '" 
                            data-title="Enter">' . (isset($potrikar_grahok_briddhi['cs_' . $type]) ? $potrikar_grahok_briddhi['cs_' . $type] : '') . '
                        </a>
                    </td>';
            }
            ?>



        </tr>


        <tr>
            <td class="tg-y698">বড় ইংরেজি পত্রিকা</td>
            <?php

            $types = array(
                'pn_before' => '1',
                'pn_after' => '2',
                'bt_potrika' => '5',
                'briddhi_potrika' => '7',
                'ghatti_potrika' => '9',
                'bmn' => '11',
                'bbkry' => '12',
                'bbitrn' => '13',
                'gn_before' => '3',
                'gn_present' => '4',
                'bt_grahok' => '6',
                'briddhi_grahok' => '8',
                'ghatti_grahok' => '10',
            );

            foreach ($types as $type => $number) {
                echo '<td class="tg-0pky type_' . $number . '">
                        <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" 
                            data-table="literature_potrikar_grahok_briddhi" data-pk="' . $pk . '" 
                            data-url="' . admin_url('departmentsreport/detailupdate') . '" 
                            data-name="bep_' . $type . '" 
                            data-title="Enter">' . (isset($potrikar_grahok_briddhi['bep_' . $type]) ? $potrikar_grahok_briddhi['bep_' . $type] : '') . '
                        </a>
                    </td>';
            }
            ?>
        </tr>
        <tr>
            <td class="tg-y698">সাহিত্য পত্রিকা	</td>
            <?php

            $types = array(
                'pn_before' => '1',
                'pn_present' => '2',
                'bt_potrika' => '5',
                'briddhi_potrika' => '7',
                'ghatti_potrika' => '9',
                'bmn' => '11',
                'bbkry' => '12',
                'bbitrn' => '13',
                'gn_before' => '3',
                'gn_present' => '4',
                'bt_grahok' => '6',
                'briddhi_grahok' => '8',
                'ghatti_grahok' => '10',
            );

            foreach ($types as $type => $number) {
                echo '<td class="tg-0pky type_' . $number . '">
                        <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" 
                            data-table="literature_potrikar_grahok_briddhi" data-pk="' . $pk . '" 
                            data-url="' . admin_url('departmentsreport/detailupdate') . '" 
                            data-name="sp_' . $type . '" 
                            data-title="Enter">' . (isset($potrikar_grahok_briddhi['sp_' . $type]) ? $potrikar_grahok_briddhi['sp_' . $type] : '') . '
                        </a>
                    </td>';
            }
            ?>
        </tr>
        <tr>
            <td class="tg-y698">শাখা কর্তৃক প্রকাশিত পত্রিকা	 </td>
            <?php

            $types = array(
                'pn_before' => '1',
                'pn_present' => '2',
                'bt_potrika' => '5',
                'briddhi_potrika' => '7',
                'ghatti_potrika' => '9',
                'bmn' => '11',
                'bbkry' => '12',
                'bbitrn' => '13',
                'gn_before' => '3',
                'gn_present' => '4',
                'bt_grahok' => '6',
                'briddhi_grahok' => '8',
                'ghatti_grahok' => '10',
            );

            foreach ($types as $type => $number) {
                echo '<td class="tg-0pky type_' . $number . '">
                        <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" 
                            data-table="literature_potrikar_grahok_briddhi" data-pk="' . $pk . '" 
                            data-url="' . admin_url('departmentsreport/detailupdate') . '" 
                            data-name="skpp_' . $type . '" 
                            data-title="Enter">' . (isset($potrikar_grahok_briddhi['skpp_' . $type]) ? $potrikar_grahok_briddhi['skpp_' . $type] : '') . '
                        </a>
                    </td>';
            }
            ?>
        </tr>
      
    </table>

    <table class="tg table table-header-rotated" id="testTable2">
        <tr>
        <td class="tg-pwj7" colspan="3"><b> শাখার উদ্যোগে সাহিত্য প্রকাশ </b></td>
        <td class="tg-pwj7" colspan="1">
                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Literature_শাখার উদ্যোগে সাহিত্য প্রকাশ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
            </td>
            <td class="tg-pwj7">
            <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-literature-publication/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
            </td>
        </tr>
        <tr>
            <td class="tg-pwj7">ধরন</td>
            <td class="tg-pwj7" > সময়কাল </td>
            <td class="tg-pwj7" >নাম </td>
            <!-- <td class="tg-pwj7" > বিষয় </td> -->
            <td class="tg-pwj7" > ইস্যু সংখ্যা </td>
            <td class="tg-pwj7" > Actions </td>
        </tr>


     <?php 
     foreach($shakhar_literature_publish->result_array() as $row) 
            {
     ?>

        <tr>
            <td class="tg-0pky type_1"><?php echo $row['literature_type'] ?>	</td>
           
            <td class="tg-0pky  type_2">
            <?php echo $row['literature_time'] ?>      
             </td>

            <td class="tg-0pky  type_3">
            <?php echo $row['literature_name'] ?>      
            </td>
           <!--  <td class="tg-0pky  type_4">
            <?php echo $row['literature_term'] ?>       
            </td> -->
            <td class="tg-0pky  type_1">
            <?php echo $row['literature_amount'] ?> 
            </td>
            <td class="tg-0pky  type_1">
            <button class='btn btn-info'>
            <a class='action_class' href=<?php echo admin_url('departmentsreport/add-literature-publication/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
            </button>
            <button  class='btn btn-danger' id='<?php echo "delete@literature_shakhar_literature_publish@".$row['literature_name']."@".$row['id'] ?>'>Delete</button>
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


<!-- script for report check -->

<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></scrip>



           
<script>
    function generateSerial() {
        $.ajax({
            url: '<?= admin_url("Departmentsreport/generate_serial") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#serialOutput').text(response.message);
                    $('#sendSerialBtn').text('Serial Done').prop('disabled', true);
                } else if (response.status === 'done') {
                    $('#serialOutput').text(response.message);
                    $('#sendSerialBtn').prop('disabled', true);
                }
            },
            error: function() {
                $('#serialOutput').text('Error generating serial.');
            }
        });
    }
</script>





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
    if(id[0]=='delete' && confirm(id[2] + " সাহিত্য প্রকাশনার কলামটি মুছে ফেলবেন?" ))
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