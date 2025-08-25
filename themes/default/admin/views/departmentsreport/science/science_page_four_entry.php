<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'বিজ্ঞান বিভাগ - পেইজ ০৪ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/science-page-four' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                                <td class="tg-pwj7" colspan="2"><b>বিতরণ</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Science_বিতরণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রকাশনা</td>
                                <td class="tg-pwj7" colspan="">কতজনকে </td>
                                <td class="tg-pwj7" colspan="">কতটি</td>
                            </tr>
                            <?php
                                $pk = (isset($science_bitoron['id']))?$science_bitoron['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">সায়েন্স সিরিজ</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="series_jon" data-title="Enter">
                                        <?php echo $series_jon =  (isset($science_bitoron['series_jon'])) ? $science_bitoron['series_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="series_ti" data-title="Enter">
                                        <?php echo $series_ti =  (isset($science_bitoron['series_ti'])) ? $science_bitoron['series_ti'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান পত্রিকা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="paper_jon" data-title="Enter">
                                        <?php echo $paper_jon =  (isset($science_bitoron['paper_jon'])) ? $science_bitoron['paper_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="paper_ti" data-title="Enter">
                                        <?php echo $paper_ti =  (isset($science_bitoron['paper_ti'])) ? $science_bitoron['paper_ti'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান সম্পর্কিত বই</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="book_jon" data-title="Enter">
                                        <?php echo $book_jon =  (isset($science_bitoron['book_jon'])) ? $science_bitoron['book_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="book_ti" data-title="Enter">
                                        <?php echo $book_ti =  (isset($science_bitoron['book_ti'])) ? $science_bitoron['book_ti'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান ডকুমেন্টারি, ভিডিও, ক্লিপ</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="documentory_jon" data-title="Enter">
                                        <?php echo $documentory_jon =  (isset($science_bitoron['documentory_jon'])) ? $science_bitoron['documentory_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="documentory_ti" data-title="Enter">
                                        <?php echo $documentory_ti =  (isset($science_bitoron['documentory_ti'])) ? $science_bitoron['documentory_ti'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_jon" data-title="Enter">
                                        <?php echo $other_jon =  (isset($science_bitoron['other_jon'])) ? $science_bitoron['other_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_ti" data-title="Enter">
                                        <?php echo $other_ti =  (isset($science_bitoron['other_ti'])) ? $science_bitoron['other_ti'] : 0; ?>
                                    </a>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>আউটপুট যোগাযোগ রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Science_আউটপুট যোগাযোগ রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">ক্যাটাগরি</td>
                                <td class="tg-pwj7" colspan="">কতজনের সাথে </td>
                                <td class="tg-pwj7" colspan="">কতবার</td>
                            </tr>
                            <?php
                                $pk = (isset($science_output_contact['id']))?$science_output_contact['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানী/ক্ষুদে বিজ্ঞানী</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="khude_biggani_jon" data-title="Enter">
                                        <?php echo $khude_biggani_jon =  (isset($science_output_contact['khude_biggani_jon'])) ? $science_output_contact['khude_biggani_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="khude_biggani_bar" data-title="Enter">
                                        <?php echo $khude_biggani_bar =  (isset($science_output_contact['khude_biggani_bar'])) ? $science_output_contact['khude_biggani_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান ব্যক্তিত্ব</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggan_bekti_jon" data-title="Enter">
                                        <?php echo $biggan_bekti_jon =  (isset($science_output_contact['biggan_bekti_jon'])) ? $science_output_contact['biggan_bekti_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggan_bekti_bar" data-title="Enter">
                                        <?php echo $biggan_bekti_bar =  (isset($science_output_contact['biggan_bekti_bar'])) ? $science_output_contact['biggan_bekti_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রতিষ্ঠিত বিজ্ঞান লেখক</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggan_lekhok_jon" data-title="Enter">
                                        <?php echo $biggan_lekhok_jon =  (isset($science_output_contact['biggan_lekhok_jon'])) ? $science_output_contact['biggan_lekhok_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggan_lekhok_bar" data-title="Enter">
                                        <?php echo $biggan_lekhok_bar =  (isset($science_output_contact['biggan_lekhok_bar'])) ? $science_output_contact['biggan_lekhok_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">উদীয়মান বিজ্ঞান উদ্যোক্তা/সংগঠক</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_jon" data-title="Enter">
                                        <?php echo $uddokta_jon =  (isset($science_output_contact['uddokta_jon'])) ? $science_output_contact['uddokta_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_bar" data-title="Enter">
                                        <?php echo $uddokta_bar =  (isset($science_output_contact['uddokta_bar'])) ? $science_output_contact['uddokta_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">উদীয়মান বিজ্ঞান লেখক</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="udiyouman_lekhok_jon" data-title="Enter">
                                        <?php echo $udiyouman_lekhok_jon =  (isset($science_output_contact['udiyouman_lekhok_jon'])) ? $science_output_contact['udiyouman_lekhok_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="udiyouman_lekhok_bar" data-title="Enter">
                                        <?php echo $udiyouman_lekhok_bar =  (isset($science_output_contact['udiyouman_lekhok_bar'])) ? $science_output_contact['udiyouman_lekhok_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানে কাজ করতে আগ্রহী জনশক্তি</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="udiyouman_lekhok_bar" data-title="Enter">
                                        <?php echo $udiyouman_lekhok_bar =  (isset($science_output_contact['udiyouman_lekhok_bar'])) ? $science_output_contact['udiyouman_lekhok_bar'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="interested_manpower_bar" data-title="Enter">
                                        <?php echo $interested_manpower_bar =  (isset($science_output_contact['interested_manpower_bar'])) ? $science_output_contact['interested_manpower_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রকৌশল ও প্রযুক্তি বিশ্ববিদ্যালয়/মেডিকেল ছাত্র</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="medical_stu_jon" data-title="Enter">
                                        <?php echo $medical_stu_jon =  (isset($science_output_contact['medical_stu_jon'])) ? $science_output_contact['medical_stu_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="medical_stu_jon" data-title="Enter">
                                        <?php echo $medical_stu_jon =  (isset($science_output_contact['medical_stu_jon'])) ? $science_output_contact['medical_stu_jon'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">এসএসসি/এইচএসসিতে অধ্যয়নরত বিজ্ঞানের ছাত্র</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sci_stu_jon" data-title="Enter">
                                        <?php echo $sci_stu_jon =  (isset($science_output_contact['sci_stu_jon'])) ? $science_output_contact['sci_stu_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sci_stu_bar" data-title="Enter">
                                        <?php echo $sci_stu_bar =  (isset($science_output_contact['sci_stu_bar'])) ? $science_output_contact['sci_stu_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_jon" data-title="Enter">
                                        <?php echo $other_jon =  (isset($science_output_contact['other_jon'])) ? $science_output_contact['other_jon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_bar" data-title="Enter">
                                        <?php echo $other_bar =  (isset($science_output_contact['other_bar'])) ? $science_output_contact['other_bar'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan="7"><b>আউটপুট রিপোর্ট</b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Science_আউটপুট রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2">ক্যাটাগরি</td>
                                <td class="tg-pwj7" colspan="2">সেক্টরভিত্তিক জনশক্তি বাছাই সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">মোটিভেশনাল প্রোগ্রাম</td>
                                <td class="tg-pwj7" colspan="2">প্রাতিষ্ঠানিক প্রশিক্ষণ গ্রহণ</td>
                                <td class="tg-pwj7" colspan="2">প্রতিযোগিতামূলক পরীক্ষার ফলাফল</td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">টার্গেট</td>
                                <td class="tg-pwj7" colspan="">বাছাই</td>
                                <td class="tg-pwj7" colspan="">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">সাংগঠনিক</td>
                                <td class="tg-pwj7" colspan="">সাধারণ</td>
                                <td class="tg-pwj7" colspan="">অংশগ্রহণ</td>
                                <td class="tg-pwj7" colspan="">উত্তীর্ণ</td>
                            </tr>
                            <?php
                                $pk = (isset($science_output_report['id']))?$science_output_report['id']:'';
                            ?>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান লেখক</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_ter" data-title="Enter">
                                        <?php echo $lekhok_ter =  (isset($science_output_report['lekhok_ter'])) ? $science_output_report['lekhok_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_bachai" data-title="Enter">
                                        <?php echo $lekhok_bachai =  (isset($science_output_report['lekhok_bachai'])) ? $science_output_report['lekhok_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_number" data-title="Enter">
                                        <?php echo $lekhok_number =  (isset($science_output_report['lekhok_number'])) ? $science_output_report['lekhok_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_present" data-title="Enter">
                                        <?php echo $lekhok_present =  (isset($science_output_report['lekhok_present'])) ? $science_output_report['lekhok_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_shang" data-title="Enter">
                                        <?php echo $lekhok_shang =  (isset($science_output_report['lekhok_shang'])) ? $science_output_report['lekhok_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_shadharon" data-title="Enter">
                                        <?php echo $lekhok_shadharon =  (isset($science_output_report['lekhok_shadharon'])) ? $science_output_report['lekhok_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_attend" data-title="Enter">
                                        <?php echo $lekhok_attend =  (isset($science_output_report['lekhok_attend'])) ? $science_output_report['lekhok_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="lekhok_pass" data-title="Enter">
                                        <?php echo $lekhok_pass =  (isset($science_output_report['lekhok_pass'])) ? $science_output_report['lekhok_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান উদ্যোক্তা</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_ter" data-title="Enter">
                                        <?php echo $uddokta_ter =  (isset($science_output_report['uddokta_ter'])) ? $science_output_report['uddokta_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_bachai" data-title="Enter">
                                        <?php echo $uddokta_bachai =  (isset($science_output_report['uddokta_bachai'])) ? $science_output_report['uddokta_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_number" data-title="Enter">
                                        <?php echo $uddokta_number =  (isset($science_output_report['uddokta_number'])) ? $science_output_report['uddokta_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_present" data-title="Enter">
                                        <?php echo $uddokta_present =  (isset($science_output_report['uddokta_present'])) ? $science_output_report['uddokta_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_shang" data-title="Enter">
                                        <?php echo $uddokta_shang =  (isset($science_output_report['uddokta_shang'])) ? $science_output_report['uddokta_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_shadharon" data-title="Enter">
                                        <?php echo $uddokta_shadharon =  (isset($science_output_report['uddokta_shadharon'])) ? $science_output_report['uddokta_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_attend" data-title="Enter">
                                        <?php echo $uddokta_attend =  (isset($science_output_report['uddokta_attend'])) ? $science_output_report['uddokta_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="uddokta_pass" data-title="Enter">
                                        <?php echo $uddokta_pass =  (isset($science_output_report['uddokta_pass'])) ? $science_output_report['uddokta_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞান সংগঠক</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_ter" data-title="Enter">
                                        <?php echo $shongothok_ter =  (isset($science_output_report['shongothok_ter'])) ? $science_output_report['shongothok_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_bachai" data-title="Enter">
                                        <?php echo $shongothok_bachai =  (isset($science_output_report['shongothok_bachai'])) ? $science_output_report['shongothok_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_number" data-title="Enter">
                                        <?php echo $shongothok_number =  (isset($science_output_report['shongothok_number'])) ? $science_output_report['shongothok_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_present" data-title="Enter">
                                        <?php echo $shongothok_present =  (isset($science_output_report['shongothok_present'])) ? $science_output_report['shongothok_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_shang" data-title="Enter">
                                        <?php echo $shongothok_shang =  (isset($science_output_report['shongothok_shang'])) ? $science_output_report['shongothok_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_shadharon" data-title="Enter">
                                        <?php echo $shongothok_shadharon =  (isset($science_output_report['shongothok_shadharon'])) ? $science_output_report['shongothok_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_attend" data-title="Enter">
                                        <?php echo $shongothok_attend =  (isset($science_output_report['shongothok_attend'])) ? $science_output_report['shongothok_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shongothok_pass" data-title="Enter">
                                        <?php echo $shongothok_pass =  (isset($science_output_report['shongothok_pass'])) ? $science_output_report['shongothok_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">প্রকৌশলী (স্নাতক)</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_ter" data-title="Enter">
                                        <?php echo $prokousholi_ter =  (isset($science_output_report['prokousholi_ter'])) ? $science_output_report['prokousholi_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_bachai" data-title="Enter">
                                        <?php echo $prokousholi_bachai =  (isset($science_output_report['prokousholi_bachai'])) ? $science_output_report['prokousholi_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_number" data-title="Enter">
                                        <?php echo $prokousholi_number =  (isset($science_output_report['prokousholi_number'])) ? $science_output_report['prokousholi_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_present" data-title="Enter">
                                        <?php echo $prokousholi_present =  (isset($science_output_report['prokousholi_present'])) ? $science_output_report['prokousholi_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_shang" data-title="Enter">
                                        <?php echo $prokousholi_shang =  (isset($science_output_report['prokousholi_shang'])) ? $science_output_report['prokousholi_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_shadharon" data-title="Enter">
                                        <?php echo $prokousholi_shadharon =  (isset($science_output_report['prokousholi_shadharon'])) ? $science_output_report['prokousholi_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_attend" data-title="Enter">
                                        <?php echo $prokousholi_attend =  (isset($science_output_report['prokousholi_attend'])) ? $science_output_report['prokousholi_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prokousholi_pass" data-title="Enter">
                                        <?php echo $prokousholi_pass =  (isset($science_output_report['prokousholi_pass'])) ? $science_output_report['prokousholi_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">আইটি প্রকৌশলী (স্নাতক)</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_ter" data-title="Enter">
                                        <?php echo $it_ter =  (isset($science_output_report['it_ter'])) ? $science_output_report['it_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bachai" data-title="Enter">
                                        <?php echo $it_bachai =  (isset($science_output_report['it_bachai'])) ? $science_output_report['it_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_number" data-title="Enter">
                                        <?php echo $it_number =  (isset($science_output_report['it_number'])) ? $science_output_report['it_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_present" data-title="Enter">
                                        <?php echo $it_present =  (isset($science_output_report['it_present'])) ? $science_output_report['it_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_shang" data-title="Enter">
                                        <?php echo $it_shang =  (isset($science_output_report['it_shang'])) ? $science_output_report['it_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_shadharon" data-title="Enter">
                                        <?php echo $it_shadharon =  (isset($science_output_report['it_shadharon'])) ? $science_output_report['it_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_attend" data-title="Enter">
                                        <?php echo $it_attend =  (isset($science_output_report['it_attend'])) ? $science_output_report['it_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_pass" data-title="Enter">
                                        <?php echo $it_pass =  (isset($science_output_report['it_pass'])) ? $science_output_report['it_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিজ্ঞানী</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_ter" data-title="Enter">
                                        <?php echo $biggani_ter =  (isset($science_output_report['biggani_ter'])) ? $science_output_report['biggani_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_bachai" data-title="Enter">
                                        <?php echo $biggani_bachai =  (isset($science_output_report['biggani_bachai'])) ? $science_output_report['biggani_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_number" data-title="Enter">
                                        <?php echo $biggani_number =  (isset($science_output_report['biggani_number'])) ? $science_output_report['biggani_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_present" data-title="Enter">
                                        <?php echo $biggani_present =  (isset($science_output_report['biggani_present'])) ? $science_output_report['biggani_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_shang" data-title="Enter">
                                        <?php echo $biggani_shang =  (isset($science_output_report['biggani_shang'])) ? $science_output_report['biggani_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_shadharon" data-title="Enter">
                                        <?php echo $biggani_shadharon =  (isset($science_output_report['biggani_shadharon'])) ? $science_output_report['biggani_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_attend" data-title="Enter">
                                        <?php echo $biggani_attend =  (isset($science_output_report['biggani_attend'])) ? $science_output_report['biggani_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="biggani_pass" data-title="Enter">
                                        <?php echo $biggani_pass =  (isset($science_output_report['biggani_pass'])) ? $science_output_report['biggani_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">আইটি বিশেষজ্ঞ</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_ter" data-title="Enter">
                                        <?php echo $it_bisheshoggo_ter =  (isset($science_output_report['it_bisheshoggo_ter'])) ? $science_output_report['it_bisheshoggo_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_bachai" data-title="Enter">
                                        <?php echo $it_bisheshoggo_bachai =  (isset($science_output_report['it_bisheshoggo_bachai'])) ? $science_output_report['it_bisheshoggo_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_number" data-title="Enter">
                                        <?php echo $it_bisheshoggo_number =  (isset($science_output_report['it_bisheshoggo_number'])) ? $science_output_report['it_bisheshoggo_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_present" data-title="Enter">
                                        <?php echo $it_bisheshoggo_present =  (isset($science_output_report['it_bisheshoggo_present'])) ? $science_output_report['it_bisheshoggo_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_shang" data-title="Enter">
                                        <?php echo $it_bisheshoggo_shang =  (isset($science_output_report['it_bisheshoggo_shang'])) ? $science_output_report['it_bisheshoggo_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_shadharon" data-title="Enter">
                                        <?php echo $it_bisheshoggo_shadharon =  (isset($science_output_report['it_bisheshoggo_shadharon'])) ? $science_output_report['it_bisheshoggo_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_attend" data-title="Enter">
                                        <?php echo $it_bisheshoggo_attend =  (isset($science_output_report['it_bisheshoggo_attend'])) ? $science_output_report['it_bisheshoggo_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="it_bisheshoggo_pass" data-title="Enter">
                                        <?php echo $it_bisheshoggo_pass =  (isset($science_output_report['it_bisheshoggo_pass'])) ? $science_output_report['it_bisheshoggo_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">অন্যান্য</td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_ter" data-title="Enter">
                                        <?php echo $other_ter =  (isset($science_output_report['other_ter'])) ? $science_output_report['other_ter'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_bachai" data-title="Enter">
                                        <?php echo $other_bachai =  (isset($science_output_report['other_bachai'])) ? $science_output_report['other_bachai'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_number" data-title="Enter">
                                        <?php echo $other_number =  (isset($science_output_report['other_number'])) ? $science_output_report['other_number'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_present" data-title="Enter">
                                        <?php echo $other_present =  (isset($science_output_report['other_present'])) ? $science_output_report['other_present'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_shang" data-title="Enter">
                                        <?php echo $other_shang =  (isset($science_output_report['other_shang'])) ? $science_output_report['other_shang'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_shadharon" data-title="Enter">
                                        <?php echo $other_shadharon =  (isset($science_output_report['other_shadharon'])) ? $science_output_report['other_shadharon'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_attend" data-title="Enter">
                                        <?php echo $other_attend =  (isset($science_output_report['other_attend'])) ? $science_output_report['other_attend'] : 0; ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="science_output_report" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="other_pass" data-title="Enter">
                                        <?php echo $other_pass =  (isset($science_output_report['other_pass'])) ? $science_output_report['other_pass'] : 0; ?>
                                    </a>
                                </td>
                            </tr>

                        </table>

                  <table class="tg table table-header-rotated" id="testTable5">
                        <td class="tg-pwj7" colspan="4"><b>সামিট </b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Science_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                      <?php
                          $pk = (isset($science_summit['id']))?$science_summit['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" rowspan=''>ধরন</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সাধারণ বিজ্ঞানে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_manpower_s" 
                              data-title="Enter">
                              <?php echo $hons_central_manpower_s=(isset( $science_summit['hons_central_manpower_s']))? $science_summit['hons_central_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_manpower_p" 
                              data-title="Enter">
                              <?php echo $hons_central_manpower_p=(isset( $science_summit['hons_central_manpower_p']))? $science_summit['hons_central_manpower_p']:'' ?>
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
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_general_s" 
                              data-title="Enter">
                              <?php echo $hons_central_general_s=(isset( $science_summit['hons_central_general_s']))? $science_summit['hons_central_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_central_general_p" 
                              data-title="Enter">
                              <?php echo $hons_central_general_p=(isset( $science_summit['hons_central_general_p']))? $science_summit['hons_central_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_central_general_s>0 && $hons_central_general_p>0)
                          {echo ($hons_central_general_p/$hons_central_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>অনার্স পর্যায়ে সাধারণ বিজ্ঞানে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_manpower_s" 
                              data-title="Enter">
                              <?php echo $hons_shakha_manpower_s=(isset( $science_summit['hons_shakha_manpower_s']))? $science_summit['hons_shakha_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_manpower_p" 
                              data-title="Enter">
                              <?php echo $hons_shakha_manpower_p=(isset( $science_summit['hons_shakha_manpower_p']))? $science_summit['hons_shakha_manpower_p']:'' ?>
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
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_general_s" 
                              data-title="Enter">
                              <?php echo $hons_shakha_general_s=(isset( $science_summit['hons_shakha_general_s']))? $science_summit['hons_shakha_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="hons_shakha_general_p" 
                              data-title="Enter">
                              <?php echo $hons_shakha_general_p=(isset( $science_summit['hons_shakha_general_p']))? $science_summit['hons_shakha_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($hons_shakha_general_s>0 && $hons_shakha_general_p>0)
                          {echo ($hons_shakha_general_p/$hons_shakha_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>ইঞ্জিনিয়ারিং ও আর্কিটেকচারে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (কেন্দ্র)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_central_manpower_s" 
                              data-title="Enter">
                              <?php echo $eng_central_manpower_s=(isset( $science_summit['eng_central_manpower_s']))? $science_summit['eng_central_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_central_manpower_p" 
                              data-title="Enter">
                              <?php echo $eng_central_manpower_p=(isset( $science_summit['eng_central_manpower_p']))? $science_summit['eng_central_manpower_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($eng_central_manpower_s>0 && $eng_central_manpower_p>0)
                          {echo ($eng_central_manpower_p/$eng_central_manpower_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">সাধারণ</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_central_general_s" 
                              data-title="Enter">
                              <?php echo $eng_central_general_s=(isset( $science_summit['eng_central_general_s']))? $science_summit['eng_central_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_central_general_p" 
                              data-title="Enter">
                              <?php echo $eng_central_general_p=(isset( $science_summit['eng_central_general_p']))? $science_summit['eng_central_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($eng_central_general_s>0 && $eng_central_general_p>0)
                          {echo ($eng_central_general_p/$eng_central_general_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698" rowspan='2'>ইঞ্জিনিয়ারিং ও আর্কিটেকচারে অধ্যয়নরত ছাত্রদের নিয়ে সামিট (শাখা)</td>
                          <td class="tg-y698">জনশক্তি</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_shakha_manpower_s" 
                              data-title="Enter">
                              <?php echo $eng_shakha_manpower_s=(isset( $science_summit['eng_shakha_manpower_s']))? $science_summit['eng_shakha_manpower_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_shakha_manpower_p" 
                              data-title="Enter">
                              <?php echo $eng_shakha_manpower_p=(isset( $science_summit['eng_shakha_manpower_p']))? $science_summit['eng_shakha_manpower_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($eng_shakha_manpower_s>0 && $eng_shakha_manpower_p>0)
                          {echo ($eng_shakha_manpower_p/$eng_shakha_manpower_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">সাধারণ</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_shakha_general_s" 
                              data-title="Enter">
                              <?php echo $eng_shakha_general_s=(isset( $science_summit['eng_shakha_general_s']))? $science_summit['eng_shakha_general_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="science_summit" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="eng_shakha_general_p" 
                              data-title="Enter">
                              <?php echo $eng_shakha_general_p=(isset( $science_summit['eng_shakha_general_p']))? $science_summit['eng_shakha_general_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($eng_shakha_general_s>0 && $eng_shakha_general_p>0)
                          {echo ($eng_shakha_general_p/$eng_shakha_general_s);}else{echo 0;}?>
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
