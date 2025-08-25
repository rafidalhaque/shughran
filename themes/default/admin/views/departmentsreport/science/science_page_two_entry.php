<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>


        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
      
            
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
                                <td class="tg-pwj7" colspan="4"><b>স্কুল ও কলেজভিত্তিক ম্যাগাজিন সার্কুলেশন প্রতিবেদন </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1', '<?php echo 'Science_স্কুল ও কলেজভিত্তিক ম্যাগাজিন সার্কুলেশন প্রতিবেদন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                        <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-science-biggan-school-magazine-circulation/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                        </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ক্রম</td>
                                <td class="tg-pwj7" colspan="">শিক্ষা প্রতিষ্ঠানের নাম </td>
                                <td class="tg-pwj7" colspan="">পাঠক ফোরাম আছে কিনা? </td>
                                <td class="tg-pwj7" colspan="">কতটি ক্লাসে প্রতিনিধি দেয়া হয়েছে? </td>
                                <td class="tg-pwj7" colspan="">ম্যাগাজিন সার্কুলেশন সংখ্যা </td>
                                <td class="tg-pwj7 " ><div><span> Actions </span></div></td>
                            </tr>
                            <?php
                                
                                $i=0;
                            foreach($science_biggan_school_magazine_circulation->result_array() as $row) 
                                    {
                                    $i++;
                                ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i?>	</td>
                                   
                                    <td class="tg-0pky type_1"><?php echo $row['protishan_name'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['pathokforum'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['class_protinidhi'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['mg_circulation_num'] ?>       
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-science-biggan-school-magazine-circulation/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@science_biggan_school_magazine_circulation@".$row['pathokforum']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                </tr>

                        <?php } ?>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>পাঠক ফোরাম রিপোর্ট </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2', '<?php echo 'Science_পাঠক ফোরাম রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                            </tr>
                            <?php
                                $pk = (isset($science_pathok_forum_report['id']))?$science_pathok_forum_report['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="3">কতটি শিক্ষা প্রতিষ্ঠানে ফোরাম গঠিত হয়েছে?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_forum_gothito" data-title="Enter">
                                        <?php echo $school_forum_gothito =  (isset($science_pathok_forum_report['school_forum_gothito'])) ? $science_pathok_forum_report['school_forum_gothito'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">শাখার মোট কতটি শিক্ষা প্রতিষ্ঠানে ফোরাম আছে?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="forum_purnago_comittee" data-title="Enter">
                                        <?php echo $forum_purnago_comittee =  (isset($science_pathok_forum_report['forum_purnago_comittee'])) ? $science_pathok_forum_report['forum_purnago_comittee'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">মোট কতটি শিক্ষা প্রতিষ্ঠানে অ্যাম্বাসেডর দেয়া হয়েছে?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="forum_purnago_comittee" data-title="Enter">
                                        <?php echo $mot_protinidhi =  (isset($science_pathok_forum_report['mot_protinidhi'])) ? $science_pathok_forum_report['mot_protinidhi'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                             <tr>
                                <td class="tg-pwj7" colspan="3">শাখার ফোরামসমূহে মোট সদস্য সংখ্যা কত?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="forum_purnago_comittee" data-title="Enter">
                                        <?php echo $committee_mem_num =  (isset($science_pathok_forum_report['committee_mem_num'])) ? $science_pathok_forum_report['committee_mem_num'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                           
                            <tr>
                                <td class="tg-pwj7" colspan="3">কতজন রেজিস্ট্রেশন করেছে?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="registration_num" data-title="Enter">
                                        <?php echo $registration_num =  (isset($science_pathok_forum_report['registration_num'])) ? $science_pathok_forum_report['registration_num'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">কতজন শিক্ষক যুক্ত হয়েছেন?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="teacher_num" data-title="Enter">
                                        <?php echo $teacher_num =  (isset($science_pathok_forum_report['teacher_num'])) ? $science_pathok_forum_report['teacher_num'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-pwj7" colspan="3">প্রোগ্রাম হয়েছে কতটি?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="program" data-title="Enter">
                                        <?php echo $program =  (isset($science_pathok_forum_report['program'])) ? $science_pathok_forum_report['program'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">টি-শার্ট বিতরণ হয়েছে কতটি?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="t-shirt" data-title="Enter">
                                        <?php echo $t_shirt =  (isset($science_pathok_forum_report['t-shirt'])) ? $science_pathok_forum_report['t-shirt'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">ম্যাগাজিন বিতরণ হয়েছে কতটি?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="magazine" data-title="Enter">
                                        <?php echo $magazine =  (isset($science_pathok_forum_report['magazine'])) ? $science_pathok_forum_report['magazine'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">পাঠক সম্মেলন</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pathon_shommelon_num" data-title="Enter">
                                        <?php echo $pathon_shommelon_num =  (isset($science_pathok_forum_report['pathon_shommelon_num'])) ? $science_pathok_forum_report['pathon_shommelon_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="pathon_shommelon_pre" data-title="Enter">
                                        <?php echo $pathon_shommelon_pre =  (isset($science_pathok_forum_report['pathon_shommelon_pre'])) ? $science_pathok_forum_report['pathon_shommelon_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['pathon_shommelon_num']>0 && $science_pathok_forum_report['pathon_shommelon_pre']>0)? $science_pathok_forum_report['pathon_shommelon_pre'] / $science_pathok_forum_report['pathon_shommelon_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান কর্মশালা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="science_workshop_num" data-title="Enter">
                                        <?php echo $science_workshop_num =  (isset($science_pathok_forum_report['science_workshop_num'])) ? $science_pathok_forum_report['science_workshop_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="science_workshop_pre" data-title="Enter">
                                        <?php echo $science_workshop_pre =  (isset($science_pathok_forum_report['science_workshop_pre'])) ? $science_pathok_forum_report['science_workshop_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['science_workshop_num']>0 && $science_pathok_forum_report['science_workshop_pre']>0)? $science_pathok_forum_report['science_workshop_pre'] / $science_pathok_forum_report['science_workshop_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">মাসিক বৈঠক</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mothly_meeting_num" data-title="Enter">
                                        <?php echo $mothly_meeting_num =  (isset($science_pathok_forum_report['mothly_meeting_num'])) ? $science_pathok_forum_report['mothly_meeting_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="mothly_meeting_pre" data-title="Enter">
                                        <?php echo $mothly_meeting_pre =  (isset($science_pathok_forum_report['mothly_meeting_pre'])) ? $science_pathok_forum_report['mothly_meeting_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['mothly_meeting_num']>0 && $science_pathok_forum_report['mothly_meeting_pre']>0)? $science_pathok_forum_report['mothly_meeting_pre'] / $science_pathok_forum_report['mothly_meeting_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ম্যাগাজিন পাঠ</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="magazine_num" data-title="Enter">
                                        <?php echo $magazine_num =  (isset($science_pathok_forum_report['magazine_num'])) ? $science_pathok_forum_report['magazine_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="magazine_pre" data-title="Enter">
                                        <?php echo $magazine_pre =  (isset($science_pathok_forum_report['magazine_pre'])) ? $science_pathok_forum_report['magazine_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['magazine_num']>0 && $science_pathok_forum_report['magazine_pre']>0)? $science_pathok_forum_report['magazine_pre'] / $science_pathok_forum_report['magazine_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_num" data-title="Enter">
                                        <?php echo $other_num =  (isset($science_pathok_forum_report['other_num'])) ? $science_pathok_forum_report['other_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_pathok_forum_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_pre" data-title="Enter">
                                        <?php echo $other_pre =  (isset($science_pathok_forum_report['other_pre'])) ? $science_pathok_forum_report['other_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_pathok_forum_report['other_num']>0 && $science_pathok_forum_report['other_pre']>0)? $science_pathok_forum_report['other_pre'] / $science_pathok_forum_report['other_num']:0 ?></td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিজ্ঞান ক্লাব প্রতিবেদন </b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3', '<?php echo 'Science_বিজ্ঞান ক্লাব প্রতিবেদন_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">বিবরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                            </tr>
                            <?php
                                $pk = (isset($science_club_protibedon['id']))?$science_club_protibedon['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="3">সাধারণ বিজ্ঞান ক্লাবসমূহের মধ্যে আমাদের নিয়ন্ত্রণাধীন আছে কতটি?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="our_control_club" data-title="Enter">
                                        <?php echo $our_control_club =  (isset($science_club_protibedon['our_control_club'])) ? $science_club_protibedon['our_control_club'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">আমাদের পরিচালিত বিজ্ঞান ক্লাব সংখ্যা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="our_scienece_club" data-title="Enter">
                                        <?php echo $our_scienece_club =  (isset($science_club_protibedon['our_scienece_club'])) ? $science_club_protibedon['our_scienece_club'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">আমাদের পরিচালিত কতটি বিজ্ঞান ক্লাবের রেজিস্ট্রেশন আছে?</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="registration_scienece_club" data-title="Enter">
                                        <?php echo $registration_scienece_club =  (isset($science_club_protibedon['registration_scienece_club'])) ? $science_club_protibedon['registration_scienece_club'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">ক্লাবে কাজ করেন এমন জনশক্তি সংখ্যা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="manpower_of_club" data-title="Enter">
                                        <?php echo $manpower_of_club =  (isset($science_club_protibedon['manpower_of_club'])) ? $science_club_protibedon['manpower_of_club'] : '' ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="3">ক্লাবের সাধারণ সদস্য সংখ্যা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="general_member" data-title="Enter">
                                        <?php echo $general_member =  (isset($science_club_protibedon['general_member'])) ? $science_club_protibedon['general_member'] : '' ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরণ</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার গাইড লাইন</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_guideline_num" data-title="Enter">
                                        <?php echo $career_guideline_num =  (isset($science_club_protibedon['career_guideline_num'])) ? $science_club_protibedon['career_guideline_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="career_guideline_pre" data-title="Enter">
                                        <?php echo $career_guideline_pre =  (isset($science_club_protibedon['career_guideline_pre'])) ? $science_club_protibedon['career_guideline_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['career_guideline_num']>0 && $science_club_protibedon['career_guideline_pre']>0)?$science_club_protibedon['career_guideline_pre'] / $science_club_protibedon['career_guideline_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">মেধাবী সংবর্ধনা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="meritorious_num" data-title="Enter">
                                        <?php echo $meritorious_num =  (isset($science_club_protibedon['meritorious_num'])) ? $science_club_protibedon['meritorious_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="meritorious_pre" data-title="Enter">
                                        <?php echo $meritorious_pre =  (isset($science_club_protibedon['meritorious_pre'])) ? $science_club_protibedon['meritorious_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['meritorious_num']>0 && $science_club_protibedon['meritorious_pre']>0)? $science_club_protibedon['meritorious_pre'] / $science_club_protibedon['meritorious_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">হাতে কলমে বিজ্ঞান</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hate_kolome_num" data-title="Enter">
                                        <?php echo $hate_kolome_num =  (isset($science_club_protibedon['hate_kolome_num'])) ? $science_club_protibedon['hate_kolome_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hate_kolome_pre" data-title="Enter">
                                        <?php echo $hate_kolome_pre =  (isset($science_club_protibedon['hate_kolome_pre'])) ? $science_club_protibedon['hate_kolome_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['hate_kolome_num']>0 && $science_club_protibedon['hate_kolome_pre']>0)? $science_club_protibedon['hate_kolome_pre'] / $science_club_protibedon['hate_kolome_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান কর্মশালা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="workshop_num" data-title="Enter">
                                        <?php echo $workshop_num =  (isset($science_club_protibedon['workshop_num'])) ? $science_club_protibedon['workshop_num'] : 0 ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="workshop_pre" data-title="Enter">
                                        <?php echo $workshop_pre =  (isset($science_club_protibedon['workshop_pre'])) ? $science_club_protibedon['workshop_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['workshop_num']>0 && $science_club_protibedon['workshop_pre']>0)? $science_club_protibedon['workshop_pre'] / $science_club_protibedon['workshop_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান ল্যাবরেটরি</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lab_num" data-title="Enter">
                                        <?php echo $lab_num =  (isset($science_club_protibedon['lab_num'])) ? $science_club_protibedon['lab_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lab_pre" data-title="Enter">
                                        <?php echo $lab_pre =  (isset($science_club_protibedon['lab_pre'])) ? $science_club_protibedon['lab_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['lab_num']>0 && $science_club_protibedon['lab_pre']>0)? $science_club_protibedon['lab_pre'] / $science_club_protibedon['lab_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যারিয়ার সেমিনার</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="seminer_num" data-title="Enter">
                                        <?php echo $seminer_num =  (isset($science_club_protibedon['seminer_num'])) ? $science_club_protibedon['seminer_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="seminer_pre" data-title="Enter">
                                        <?php echo $seminer_pre =  (isset($science_club_protibedon['seminer_pre'])) ? $science_club_protibedon['seminer_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['seminer_num']>0 && $science_club_protibedon['seminer_pre']>0)? $science_club_protibedon['seminer_pre'] / $science_club_protibedon['seminer_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান অলিম্পিয়াড</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="olympiad_num" data-title="Enter">
                                        <?php echo $olympiad_num =  (isset($science_club_protibedon['olympiad_num'])) ? $science_club_protibedon['olympiad_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="olympiad_pre" data-title="Enter">
                                        <?php echo $olympiad_pre =  (isset($science_club_protibedon['olympiad_pre'])) ? $science_club_protibedon['olympiad_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['olympiad_num']>0 && $science_club_protibedon['olympiad_pre']>0)? $science_club_protibedon['olympiad_pre'] / $science_club_protibedon['olympiad_num']:0 ?></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_num" data-title="Enter">
                                        <?php echo $other_num =  (isset($science_club_protibedon['other_num'])) ? $science_club_protibedon['other_num'] : '' ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_club_protibedon" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_pre" data-title="Enter">
                                        <?php echo $other_pre =  (isset($science_club_protibedon['other_pre'])) ? $science_club_protibedon['other_pre'] : '' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky" colspan=""><?php echo ($science_club_protibedon['other_num']>0 && $science_club_protibedon['other_pre']>0)? $science_club_protibedon['other_pre'] / $science_club_protibedon['other_num']:0 ?></td>
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
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

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
$('#shaka_shompadok').editable({
    value: <?php echo (isset( $science_biggan_shompadok['shaka_shompadok']))? $science_biggan_shompadok['shaka_shompadok']:2; ?>,    
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

$('#biggan_shompadok').editable({
    value: <?php echo (isset( $science_biggan_shompadok['biggan_shompadok']))? $science_biggan_shompadok['biggan_shompadok']:2; ?>,    
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

$('#biggan_comittee_gothon').editable({
    value: <?php echo (isset( $science_biggan_magazine_circulation['biggan_comittee_gothon']))? $science_biggan_magazine_circulation['biggan_comittee_gothon']:2; ?>,    
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
