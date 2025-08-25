<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'দাওয়াহ বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/dawah-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
								<td class="tg-pwj7" colspan="4" style="text-align:center;"><b> কুরআন শিক্ষা কার্যক্রম (মক্তব) </b> </td>
								<td class="tg-pwj7" colspan="1">
									<a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Dawah_কুরআন শিক্ষা কার্যক্রম (মক্তব)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
								</td>
							</tr>
                            <tr>
                                <td class="tg-pwj7 ">
                                    <div><span> পূর্বের সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বর্তমান সংখ্যা </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>বৃদ্ধি</span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span>ঘাটতি </span></div>
                                </td>
                                <td class="tg-pwj7 ">
                                    <div><span> শিক্ষার্থী সংখ্যা </span></div>
                                </td>
                            </tr>
                            <?php
                                $pk = (isset($dawah_moktob['id']))?$dawah_moktob['id']:'';
                            ?>
                            <tr>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_moktob" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="prev" data-title="Enter"><?php echo $prev =  (isset($dawah_moktob['prev'])) ? $dawah_moktob['prev'] : '' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_moktob" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="present" data-title="Enter"><?php echo $present =  (isset($dawah_moktob['present'])) ? $dawah_moktob['present'] : '' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_moktob" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="bri" data-title="Enter"><?php echo $bri =  (isset($dawah_moktob['bri'])) ? $dawah_moktob['bri'] : '' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_moktob" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="ghat" data-title="Enter"><?php echo $ghat =  (isset($dawah_moktob['ghat'])) ? $dawah_moktob['ghat'] : '' ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_moktob" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="student" data-title="Enter"><?php echo $student =  (isset($dawah_moktob['student'])) ? $dawah_moktob['student'] : '' ?></a>
                                </td>
                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
							<tr>
								<td class="tg-pwj7" colspan="3" style="text-align:center;"><b> কুরআন শিক্ষা কার্যক্রম (জনশক্তির ব্যক্তিগত প্রচেষ্টা) </b> </td>
								<td class="tg-pwj7" colspan="1">
									<a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Dawah_কুরআন শিক্ষা কার্যক্রম (জনশক্তির ব্যক্তিগত প্রচেষ্টা)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
								</td>
							</tr>
							<tr>
								<td class="tg-pwj7 ">
									<div><span> মান </span></div>
								</td>
								<td class="tg-pwj7 ">
									<div><span>একান্ত নিজ তিলাওয়াত সহীহ না থাকলে সহীহ করার প্রচেষ্টা চালিয়েছেন কতজন? </span></div>
								</td>
								<td class="tg-pwj7 ">
									<div><span>কতজন জনশক্তি সাধারণ ছাত্রকে কুরআন শিখিয়েছেন?</span></div>
								</td>
								<td class="tg-pwj7 ">
									<div><span>কতজন সাধারণ ছাত্রকে কুরআন শেখানো হয়েছে?</span></div>
								</td>

							</tr>
                            <?php
                               $total_own=0;
                               $total_jonosokti=0;
                               $total_general=0;
                            ?>
                             <?php
                                $pk = (isset($dawah_jonoshokti_byktigoto_procheshta['id']))?$dawah_jonoshokti_byktigoto_procheshta['id']:'';
                            ?>
							<tr>
								<td class="tg-pwj7  type_1">
									সদস্য
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="member_for_own" data-title="Enter"><?php echo $member_for_own =  (isset($dawah_jonoshokti_byktigoto_procheshta['member_for_own'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['member_for_own'] : 0;$total_own+=$member_for_own;  ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="member_for_jonoshokti" data-title="Enter"><?php echo $member_for_jonoshokti =  (isset($dawah_jonoshokti_byktigoto_procheshta['member_for_jonoshokti'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['member_for_jonoshokti'] : 0; $total_jonosokti += $member_for_jonoshokti;  ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="member_for_general" data-title="Enter"><?php echo $member_for_general =  (isset($dawah_jonoshokti_byktigoto_procheshta['member_for_general'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['member_for_general'] : 0;  $total_general+=$member_for_general; ?></a>
                                </td>

							</tr>
							<tr>
								<td class="tg-pwj7  type_1">
									সাথী
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="asso_for_own" data-title="Enter"><?php echo $asso_for_own =  (isset($dawah_jonoshokti_byktigoto_procheshta['asso_for_own'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['asso_for_own'] : 0; $total_own+=$asso_for_own; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="asso_for_jonoshokti" data-title="Enter"><?php echo $asso_for_jonoshokti =  (isset($dawah_jonoshokti_byktigoto_procheshta['asso_for_jonoshokti'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['asso_for_jonoshokti'] : 0; $total_jonosokti += $asso_for_jonoshokti; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="asso_for_general" data-title="Enter"><?php echo $asso_for_general =  (isset($dawah_jonoshokti_byktigoto_procheshta['asso_for_general'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['asso_for_general'] : 0;  $total_general+=$asso_for_general; ?></a>
                                </td>

							</tr>
							<tr>
								<td class="tg-pwj7  type_1">
									কর্মী
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="worker_for_own" data-title="Enter"><?php echo $worker_for_own =  (isset($dawah_jonoshokti_byktigoto_procheshta['worker_for_own'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['worker_for_own'] : 0; $total_own+=$worker_for_own; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="worker_for_jonoshokti" data-title="Enter"><?php echo $worker_for_jonoshokti =  (isset($dawah_jonoshokti_byktigoto_procheshta['worker_for_jonoshokti'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['worker_for_jonoshokti'] : 0; $total_jonosokti+=$worker_for_jonoshokti; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_jonoshokti_byktigoto_procheshta" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="worker_for_general" data-title="Enter"><?php echo $worker_for_general =  (isset($dawah_jonoshokti_byktigoto_procheshta['worker_for_general'])) ? 
                                    $dawah_jonoshokti_byktigoto_procheshta['worker_for_general'] : 0;  $total_general+=$worker_for_general;  ?></a>
                                </td>
							</tr>
                            <tr>
								<td class="tg-pwj7  type_1">
									মোট
								</td>
								<td class="tg-0pky  type_2">
									<?php echo $total_own ?>
								</td>
								<td class="tg-0pky  type_3">
									<?php echo $total_jonosokti ?>
								</td>
								<td class="tg-0pky  type_4">
									<?php echo $total_general ?>
								</td>
							</tr>
						</table>

                        <table class="tg table table-header-rotated" id="testTable3">
							<tr>
								<td class="tg-pwj7" colspan="3">
									<div><b>সভাসমূহ </b></div>
								</td>
								<td class="tg-pwj7" colspan="1">
									<a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Dawah_সভাসমূহ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
								</td>
							</tr>
							<tr>
								<td class="tg-pwj7 ">
									<div><span>ধরণ </span></div>
								</td>
								<td class="tg-pwj7 ">
									<div><span>প্রোগ্রাম সংখ্যা</span></div>
								</td>
								<td class="tg-pwj7 ">
									<div><span>মোট উপস্থিতি </span></div>
								</td>
                                <td class="tg-pwj7 ">
									<div><span>গড় </span></div>
								</td>
							</tr>
                            <?php
                                $pk = (isset($dawah_shovashomuho['id']))?$dawah_shovashomuho['id']:'';
                            ?>
							<tr>
								<td class="tg-pwj7  type_1">
									উপদেষ্টা কমিটি সভা
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="upodeshta_number" data-title="Enter"><?php echo $upodeshta_number =  (isset($dawah_shovashomuho['upodeshta_number'])) ? 
                                    $dawah_shovashomuho['upodeshta_number'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="upodeshta_present" data-title="Enter"><?php echo $upodeshta_present =  (isset($dawah_shovashomuho['upodeshta_present'])) ? 
                                    $dawah_shovashomuho['upodeshta_present'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($upodeshta_present != 0 && $upodeshta_number != 0)?$upodeshta_present / $upodeshta_number:0;  ?>
								</td>
							</tr>
							<tr>

								<td class="tg-pwj7  type_1">
									কার্যনির্বাহী কমিটি সভা
								</td>

                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="karjonirbahi_number" data-title="Enter"><?php echo $karjonirbahi_number =  (isset($dawah_shovashomuho['karjonirbahi_number'])) ? 
                                    $dawah_shovashomuho['karjonirbahi_number'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="karjonirbahi_present" data-title="Enter"><?php echo $karjonirbahi_present =  (isset($dawah_shovashomuho['karjonirbahi_present'])) ? 
                                    $dawah_shovashomuho['karjonirbahi_present'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($karjonirbahi_present != 0 && $karjonirbahi_number != 0)?$karjonirbahi_present / $karjonirbahi_number:0;  ?>
								</td>
							</tr>
							<tr>

								<td class="tg-pwj7  type_1">
									কেন্দ্রীয় প্রোগ্রামে অংশগ্রহণ
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="kendrio_number" data-title="Enter"><?php echo $kendrio_number =  (isset($dawah_shovashomuho['kendrio_number'])) ? 
                                    $dawah_shovashomuho['kendrio_number'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="kendrio_present" data-title="Enter"><?php echo $kendrio_present =  (isset($dawah_shovashomuho['kendrio_present'])) ? 
                                    $dawah_shovashomuho['kendrio_present'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($kendrio_present != 0 && $kendrio_number != 0)?$kendrio_present / $kendrio_number:0;  ?>
								</td>

							</tr>
							<tr>
								<td class="tg-pwj7  type_1">
									দায়ীদের নিয়ে ইফতার মাহফিল
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="iftar_number" data-title="Enter"><?php echo $iftar_number =  (isset($dawah_shovashomuho['iftar_number'])) ? 
                                    $dawah_shovashomuho['iftar_number'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="iftar_present" data-title="Enter"><?php echo $iftar_present =  (isset($dawah_shovashomuho['iftar_present'])) ? 
                                    $dawah_shovashomuho['iftar_present'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($iftar_present != 0 && $iftar_number != 0)?$iftar_present / $iftar_number:0;  ?>
								</td>
							</tr>
							<tr>
								<td class="tg-pwj7  type_1">
									সাপ্তাহিক দারসূল কুরআন
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="dars_number" data-title="Enter"><?php echo $dars_number =  (isset($dawah_shovashomuho['dars_number'])) ? 
                                    $dawah_shovashomuho['dars_number'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="dars_present" data-title="Enter"><?php echo $dars_present =  (isset($dawah_shovashomuho['dars_present'])) ? 
                                    $dawah_shovashomuho['dars_present'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($dars_present != 0 && $dars_number != 0)?$dars_present / $dars_number:0;  ?>
								</td>
							</tr>
							<tr>
								<td class="tg-pwj7  type_1">
									দাওয়াতমূলক প্রতিযোগিতা
								</td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="dawat_number" data-title="Enter"><?php echo $dawat_number =  (isset($dawah_shovashomuho['dawat_number'])) ? 
                                    $dawah_shovashomuho['dawat_number'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="dawah_shovashomuho" 
                                    data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" 
                                    data-name="dawat_present" data-title="Enter"><?php echo $dawat_present =  (isset($dawah_shovashomuho['dawat_present'])) ? 
                                    $dawah_shovashomuho['dawat_present'] : 0; ?></a>
                                </td>
                                <td class="tg-0pky  type_4">
									<?php echo ($dawat_present != 0 && $dawat_number != 0)?$dawat_present / $dawat_number:0;  ?>
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
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
    }

    .tg .tg-0pky {
        border-color: black;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>