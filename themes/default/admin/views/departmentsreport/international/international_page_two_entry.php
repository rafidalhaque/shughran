<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আন্তর্জাতিক বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/international-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                    <td class="tg-pwj7" colspan='4'><b>আপনার শাখার সাবেক কেউ কোনো এম্বাসিতে জব করেন কিনা?</b></td>
                                    <td class="tg-pwj7" colspan="">
                                        <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'International_আপনার শাখার সাবেক কেউ কোনো এম্বাসিতে জব করেন কিনা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    <td class="tg-pwj7">
                                    <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-international-shabek-embassy/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >ক্রম</td>
                                    <td class="tg-pwj7" >শাখা আইডি</td>
                                    <td class="tg-pwj7" >নাম</td>
                                    <td class="tg-pwj7" >এম্বাসি</td>
                                    <td class="tg-pwj7">সাবেক দায়িত্ব</td>
                                    <td class="tg-pwj7">Actions</td>
                                    
                                </tr>
                                     
                                <?php 
                                $i=0;
                            foreach($international_shabek_embassy->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['embassy'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['last_dayitto'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-international-shabek-embassy/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@international_shabek_embassy@".$row['name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                    </table>
                    <table class="tg table table-header-rotated" id="testTable2">
                                <tr>
                                    <td class="tg-pwj7" colspan=''><b>অন্যান্য</b></td>
                                    <td class="tg-pwj7" colspan="">
                                        <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'International_অন্যান্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >ধরন </td>
                                    <td class="tg-pwj7" >সংখ্যা</td>
                                </tr>
                                <?php
                                $pk = (isset($international_others['id']))?$international_others['id']:'';

                                ?>
                                <tr>
                                    <td class="tg-pwj7" >শাখার বিভিন্ন অনলাইন গ্রুপে উচ্চশিক্ষা সম্পর্কিত কতগুলো কনটেন্ট শেয়ার করা হয়েছে </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_others" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="content_share" 
                                            data-title="Enter"><?php echo (isset( $international_others['content_share']))? $international_others['content_share']:'' ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >আন্তর্জাতিক সম্পর্ক বিভাগে অধ্যয়নরত জনশক্তি কতজন?  </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_others" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="int_realtion_student" 
                                            data-title="Enter"><?php echo (isset( $international_others['int_realtion_student']))? $international_others['int_realtion_student']:'' ?>
                                        </a>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >বিদেশে অবস্থানরত কতজন সাবেক ভাইয়ের সাথে যোগাযোগ হয়েছে </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_others" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="foreigner_shabek_contact" 
                                            data-title="Enter"><?php echo (isset( $international_others['foreigner_shabek_contact']))? $international_others['foreigner_shabek_contact']:'' ?>
                                        </a>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >আপনার শাখার অধীনস্থ প্রতিষ্ঠানে বিদেশি শিক্ষার্থী কতজন?  </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_others" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="foreigner_student" 
                                            data-title="Enter"><?php echo (isset( $international_others['foreigner_student']))? $international_others['foreigner_student']:'' ?>
                                        </a>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >বিদেশে উচ্চশিক্ষায় গমনেচ্ছুদের নিয়ে বৃত্তি প্রদান অনুষ্ঠান কতটি?</td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_others" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="foreign_interested_scholarship" 
                                            data-title="Enter"><?php echo (isset( $international_others['foreign_interested_scholarship']))? $international_others['foreign_interested_scholarship']:'' ?>
                                        </a>
                                    </td>
                                    
                                </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable3">
                                <tr>
                                    <td class="tg-pwj7" colspan='4'><b>বর্তমান জনশক্তিদের বিভিন্ন কোর্স সংক্রান্ত তথ্য</b></td>
                                    <td class="tg-pwj7" colspan="2">
                                        <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'International_বর্তমান জনশক্তিদের বিভিন্ন কোর্স সংক্রান্ত তথ্য_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                    <td class="tg-pwj7">
                                    <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-international-manpower-course/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" > ক্রম </td>
                                    <td class="tg-pwj7" >শাখা আইডি</td>
                                    <td class="tg-pwj7" >	নাম	 	</td>
                                    <td class="tg-pwj7" > ধরন </td>
                                    <td class="tg-pwj7" > (IELTS/ GRE/GMAT/TOEFL/SAT) ফলাফল (পরীক্ষায় অংশ নিয়ে থাকলে) </td>
                                    <td class="tg-pwj7" > মন্তব্য </td>
                                    <td class="tg-pwj7">Actions</td>
                                </tr>
                                <?php 
                                $i=0;
                            foreach($international_manpower_course->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['type'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['ielts_result'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['comment'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-international-manpower-course/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@international_manpower_course@".$row['name']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                                <tr>
                                    <td class="tg-pwj7" colspan='11'><b>প্রফেশনাল আউটপুট (উচ্চশিক্ষা)</b></td>
                                    <td class="tg-pwj7" colspan="4">
                                        <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'International_প্রফেশনাল আউটপুট (উচ্চশিক্ষা)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" rowspan='2'> জনশক্তি </td>
                                    <td class="tg-pwj7" colspan='2'>এম. ফিল</td>
                                    <td class="tg-pwj7" colspan='2'> পিএইচডি </td>
                                    <td class="tg-pwj7" colspan='2'> বিদেশে উচ্চ শিক্ষা </td>
                                    <td class="tg-pwj7" colspan='2'> বিদেশে পিএইচডি </td>
                                    <td class="tg-pwj7" colspan='2'> বিদেশে স্কলারশীপ </td>
                                    <td class="tg-pwj7" colspan='2'> বিদেশে শিক্ষকতা</td>
                                    <td class="tg-pwj7" colspan='2'> বারএট’ল</td>
                                </tr>
                               
                                <tr>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                    <td class="tg-pwj7" >টার্গেট </td>
                                    <td class="tg-pwj7" >অর্জন</td>
                                </tr>
                                <?php
                                $pk = (isset($international_pro_outuput['id']))?$international_pro_outuput['id']:'';

                                ?>
                                <tr>
                                    <td class="tg-pwj7" >সদস্য </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_mp_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_mp_target']))? $international_pro_outuput['m_mp_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_mp_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_mp_orjon']))? $international_pro_outuput['m_mp_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_phd_target']))? $international_pro_outuput['m_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_phd_orjon']))? $international_pro_outuput['m_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_hs_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_hs_target']))? $international_pro_outuput['m_f_hs_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_hs_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_hs_orjon']))? $international_pro_outuput['m_f_hs_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_phd_target']))? $international_pro_outuput['m_f_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_phd_orjon']))? $international_pro_outuput['m_f_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_s_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_s_target']))? $international_pro_outuput['m_f_s_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_s_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_s_orjon']))? $international_pro_outuput['m_f_s_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_t_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_t_target']))? $international_pro_outuput['m_f_t_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_f_t_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_f_t_orjon']))? $international_pro_outuput['m_f_t_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_btl_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_btl_target']))? $international_pro_outuput['m_btl_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="m_btl_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['m_btl_orjon']))? $international_pro_outuput['m_btl_orjon']:'' ?>
                                        </a>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >সাথী </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_mp_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_mp_target']))? $international_pro_outuput['a_mp_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_mp_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_mp_orjon']))? $international_pro_outuput['a_mp_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_phd_target']))? $international_pro_outuput['a_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_phd_orjon']))? $international_pro_outuput['a_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_hs_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_hs_target']))? $international_pro_outuput['a_f_hs_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_hs_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_hs_orjon']))? $international_pro_outuput['a_f_hs_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_phd_target']))? $international_pro_outuput['a_f_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_phd_orjon']))? $international_pro_outuput['a_f_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_s_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_s_target']))? $international_pro_outuput['a_f_s_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_s_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_s_orjon']))? $international_pro_outuput['a_f_s_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_t_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_t_target']))? $international_pro_outuput['a_f_t_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_f_t_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_f_t_orjon']))? $international_pro_outuput['a_f_t_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_btl_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_btl_target']))? $international_pro_outuput['a_btl_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="a_btl_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['a_btl_orjon']))? $international_pro_outuput['a_btl_orjon']:'' ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >কর্মী </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_mp_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_mp_target']))? $international_pro_outuput['w_mp_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_mp_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_mp_orjon']))? $international_pro_outuput['w_mp_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_phd_target']))? $international_pro_outuput['w_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_phd_orjon']))? $international_pro_outuput['w_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_hs_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_hs_target']))? $international_pro_outuput['w_f_hs_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_hs_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_hs_orjon']))? $international_pro_outuput['w_f_hs_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_phd_target']))? $international_pro_outuput['w_f_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_phd_orjon']))? $international_pro_outuput['w_f_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_s_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_s_target']))? $international_pro_outuput['w_f_s_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_s_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_s_orjon']))? $international_pro_outuput['w_f_s_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_t_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_t_target']))? $international_pro_outuput['w_f_t_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_f_t_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_f_t_orjon']))? $international_pro_outuput['w_f_t_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_btl_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_btl_target']))? $international_pro_outuput['w_btl_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="w_btl_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['w_btl_orjon']))? $international_pro_outuput['w_btl_orjon']:'' ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >সমার্থক </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_mp_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_mp_target']))? $international_pro_outuput['s_mp_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_mp_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_mp_orjon']))? $international_pro_outuput['s_mp_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_phd_target']))? $international_pro_outuput['s_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_phd_orjon']))? $international_pro_outuput['s_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_hs_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_hs_target']))? $international_pro_outuput['s_f_hs_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_hs_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_hs_orjon']))? $international_pro_outuput['s_f_hs_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_phd_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_phd_target']))? $international_pro_outuput['s_f_phd_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_phd_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_phd_orjon']))? $international_pro_outuput['s_f_phd_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_s_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_s_target']))? $international_pro_outuput['s_f_s_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_s_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_s_orjon']))? $international_pro_outuput['s_f_s_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_t_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_t_target']))? $international_pro_outuput['s_f_t_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_f_t_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_f_t_orjon']))? $international_pro_outuput['s_f_t_orjon']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_btl_target" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_btl_target']))? $international_pro_outuput['s_btl_target']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="international_pro_outuput" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="s_btl_orjon" 
                                            data-title="Enter"><?php echo (isset( $international_pro_outuput['s_btl_orjon']))? $international_pro_outuput['s_btl_orjon']:'' ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-pwj7" >মোট </td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_mp_target']+$international_pro_outuput['a_mp_target']+
                                      $international_pro_outuput['w_mp_target']+$international_pro_outuput['s_mp_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_mp_orjon']+$international_pro_outuput['a_mp_orjon']+
                                      $international_pro_outuput['w_mp_orjon']+$international_pro_outuput['s_mp_orjon']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_phd_target']+$international_pro_outuput['a_phd_target']+
                                      $international_pro_outuput['w_phd_target']+$international_pro_outuput['s_phd_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_phd_orjon']+$international_pro_outuput['a_phd_orjon']+
                                      $international_pro_outuput['w_phd_orjon']+$international_pro_outuput['s_phd_orjon']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_hs_target']+$international_pro_outuput['a_f_hs_target']+
                                      $international_pro_outuput['w_f_hs_target']+$international_pro_outuput['s_f_hs_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_hs_orjon']+$international_pro_outuput['a_f_hs_orjon']+
                                      $international_pro_outuput['w_f_hs_orjon']+$international_pro_outuput['s_f_hs_orjon']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_phd_target']+$international_pro_outuput['a_f_phd_target']+
                                      $international_pro_outuput['w_f_phd_target']+$international_pro_outuput['s_f_phd_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_phd_orjon']+$international_pro_outuput['a_f_phd_orjon']+
                                      $international_pro_outuput['w_f_phd_orjon']+$international_pro_outuput['s_f_phd_orjon']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_s_target']+$international_pro_outuput['a_f_s_target']+
                                      $international_pro_outuput['w_f_s_target']+$international_pro_outuput['s_f_s_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_s_orjon']+$international_pro_outuput['a_f_s_orjon']+
                                      $international_pro_outuput['w_f_s_orjon']+$international_pro_outuput['s_f_s_orjon']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_t_target']+$international_pro_outuput['a_f_t_target']+
                                      $international_pro_outuput['w_f_t_target']+$international_pro_outuput['s_f_t_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_f_t_orjon']+$international_pro_outuput['a_f_t_orjon']+
                                      $international_pro_outuput['w_f_t_orjon']+$international_pro_outuput['s_f_t_orjon']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_btl_target']+$international_pro_outuput['a_btl_target']+
                                      $international_pro_outuput['w_btl_target']+$international_pro_outuput['s_btl_target']; 
                                      ?></td>
                                      <td class="tg-0pky" ><?php echo 
                                      $international_pro_outuput['m_btl_orjon']+$international_pro_outuput['a_btl_orjon']+
                                      $international_pro_outuput['w_btl_orjon']+$international_pro_outuput['s_btl_orjon']; 
                                      ?></td>

                                   
                                
                                
                                </tr>
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