<?php defined('BASEPATH') or exit('No direct script access allowed');?>



<link href="<?=$assets?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?='স্পোর্টস বিভাগ - পেইজ ০১' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/sports-page-one' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) {?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?="সকল শাখা"?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?=admin_url('departmentsreport/sports-page-one')?>"><i class="fa fa-building-o"></i> <?="সকল শাখা"?></a></li>
                            <li class="divider"></li>
                            <?php
foreach ($branches as $branch) {
    echo '<li><a href="' . admin_url('departmentsreport/sports-page-one/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
}
    ?>
                        </ul>
                    </li>
                <?php }?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


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

                <div class="table-responsive">


				<style type="text/css">
                    #export_all_table{
                        cursor: pointer;
                    }
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
</style>
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                            <tr>
                            <td class="tg-pwj7 " colspan='12'><div><b> টুর্নামেন্ট-সংক্রান্ত  </b></div></td>
                            <td class="tg-pwj7" colspan="4">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Sports_টুনার্মেন্ট সংক্রন্ত.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" rowspan="2"> ধরন </td>

                                <td class="tg-pwj7" rowspan="2"> টুর্নামেন্ট সংখ্যা </td>
                                <td class="tg-pwj7 " colspan='2'><div><span> ফুটবল </span></div></td>
                                <td class="tg-pwj7 " colspan='2'><div><span> ক্রিকেট </span></div></td>
                                <td class="tg-pwj7 " colspan='2'><div><span> ব্যাডমিন্টন </span></div></td>
                                <td class="tg-pwj7 " colspan='2'><div><span> ভলিবল </span></div></td>
                                <td class="tg-pwj7 " colspan='2'><div><span> হা-ডু-ডু </span></div></td>
                                <td class="tg-pwj7 " colspan='2'><div><span> হ্যান্ডবল </span></div></td>
                                <td class="tg-pwj7 " colspan='2'><div><span> অন্যান্য </span></div></td>
                            </tr>

                            <tr>

                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                                <td class="tg-pwj7 "><div><span> ম্যাচ </span></div></td>
                                <td class="tg-pwj7 "><div><span> অংশগ্রহণ </span></div></td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_"> আন্তঃথানা </td>
                                <td class="tg-0pky  type_0">
                                <?php echo $thana_tour_num = $sports_tournament['thana_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_football_match = $sports_tournament['thana_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_football_atten = $sports_tournament['thana_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_cricket_match = $sports_tournament['thana_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_cricket_atten = $sports_tournament['thana_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_badminton_match = $sports_tournament['thana_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_badminton_atten = $sports_tournament['thana_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_volleyball_match = $sports_tournament['thana_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $thana_volleyball_atten = $sports_tournament['thana_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_hadudu_match = $sports_tournament['thana_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_hadudu_atten = $sports_tournament['thana_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_handball_match = $sports_tournament['thana_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_handball_atten = $sports_tournament['thana_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_other_match = $sports_tournament['thana_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $thana_other_atten = $sports_tournament['thana_other_atten'] ?>
                                </td>



                            </tr>


                            <tr>
                                <td class="tg-y698">আন্তঃওয়ার্ড</td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $ward_tour_num = $sports_tournament['ward_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_football_match = $sports_tournament['ward_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_football_atten = $sports_tournament['ward_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_cricket_match = $sports_tournament['ward_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_cricket_atten = $sports_tournament['ward_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_badminton_match = $sports_tournament['ward_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_badminton_atten = $sports_tournament['ward_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_volleyball_match = $sports_tournament['ward_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $ward_volleyball_atten = $sports_tournament['ward_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_hadudu_match = $sports_tournament['ward_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_hadudu_atten = $sports_tournament['ward_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_handball_match = $sports_tournament['ward_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_handball_atten = $sports_tournament['ward_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_other_match = $sports_tournament['ward_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $ward_other_atten = $sports_tournament['ward_other_atten'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃউপশাখা</td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $uposhakha_tour_num = $sports_tournament['uposhakha_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_football_match = $sports_tournament['uposhakha_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_football_atten = $sports_tournament['uposhakha_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_cricket_match = $sports_tournament['uposhakha_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_cricket_atten = $sports_tournament['uposhakha_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_badminton_match = $sports_tournament['uposhakha_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_badminton_atten = $sports_tournament['uposhakha_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_volleyball_match = $sports_tournament['uposhakha_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_volleyball_atten = $sports_tournament['uposhakha_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_hadudu_match = $sports_tournament['uposhakha_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_hadudu_atten = $sports_tournament['uposhakha_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_handball_match = $sports_tournament['uposhakha_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_handball_atten = $sports_tournament['uposhakha_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_other_match = $sports_tournament['uposhakha_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $uposhakha_other_atten = $sports_tournament['uposhakha_other_atten'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃবিশ্ববিদ্যালয় </td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $univer_tour_num = $sports_tournament['univer_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_football_match = $sports_tournament['univer_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_football_atten = $sports_tournament['univer_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_cricket_match = $sports_tournament['univer_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_cricket_atten = $sports_tournament['univer_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_badminton_match = $sports_tournament['univer_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_badminton_atten = $sports_tournament['univer_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_volleyball_match = $sports_tournament['univer_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $univer_volleyball_atten = $sports_tournament['univer_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_hadudu_match = $sports_tournament['univer_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_hadudu_atten = $sports_tournament['univer_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_handball_match = $sports_tournament['univer_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_handball_atten = $sports_tournament['univer_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_other_match = $sports_tournament['univer_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $univer_other_atten = $sports_tournament['univer_other_atten'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃকলেজ </td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $college_tour_num = $sports_tournament['college_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_football_match = $sports_tournament['college_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_football_atten = $sports_tournament['college_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_cricket_match = $sports_tournament['college_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_cricket_atten = $sports_tournament['college_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_badminton_match = $sports_tournament['college_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_badminton_atten = $sports_tournament['college_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_volleyball_match = $sports_tournament['college_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $college_volleyball_atten = $sports_tournament['college_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_hadudu_match = $sports_tournament['college_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_hadudu_atten = $sports_tournament['college_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_handball_match = $sports_tournament['college_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_handball_atten = $sports_tournament['college_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_other_match = $sports_tournament['college_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $college_other_atten = $sports_tournament['college_other_atten'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃস্কুল </td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $school_tour_num = $sports_tournament['school_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_football_match = $sports_tournament['school_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_football_atten = $sports_tournament['school_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_cricket_match = $sports_tournament['school_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_cricket_atten = $sports_tournament['school_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_badminton_match = $sports_tournament['school_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_badminton_atten = $sports_tournament['school_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_volleyball_match = $sports_tournament['school_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $school_volleyball_atten = $sports_tournament['school_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_hadudu_match = $sports_tournament['school_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_hadudu_atten = $sports_tournament['school_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_handball_match = $sports_tournament['school_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_handball_atten = $sports_tournament['school_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_other_match = $sports_tournament['school_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $school_other_atten = $sports_tournament['school_other_atten'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃমাদরাসা </td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $madrasah_tour_num = $sports_tournament['madrasah_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_football_match = $sports_tournament['madrasah_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_football_atten = $sports_tournament['madrasah_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_cricket_match = $sports_tournament['madrasah_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_cricket_atten = $sports_tournament['madrasah_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_badminton_match = $sports_tournament['madrasah_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_badminton_atten = $sports_tournament['madrasah_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_volleyball_match = $sports_tournament['madrasah_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_volleyball_atten = $sports_tournament['madrasah_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_hadudu_match = $sports_tournament['madrasah_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_hadudu_atten = $sports_tournament['madrasah_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_handball_match = $sports_tournament['madrasah_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_handball_atten = $sports_tournament['madrasah_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_other_match = $sports_tournament['madrasah_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $madrasah_other_atten = $sports_tournament['madrasah_other_atten'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তঃপ্রতিষ্ঠান </td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $protishthan_tour_num = $sports_tournament['protishthan_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_football_match = $sports_tournament['protishthan_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_football_atten = $sports_tournament['protishthan_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_cricket_match = $sports_tournament['protishthan_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_cricket_atten = $sports_tournament['protishthan_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_badminton_match = $sports_tournament['protishthan_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_badminton_atten = $sports_tournament['protishthan_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_volleyball_match = $sports_tournament['protishthan_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_volleyball_atten = $sports_tournament['protishthan_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_hadudu_match = $sports_tournament['protishthan_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_hadudu_atten = $sports_tournament['protishthan_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_handball_match = $sports_tournament['protishthan_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_handball_atten = $sports_tournament['protishthan_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_other_match = $sports_tournament['protishthan_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $protishthan_other_atten = $sports_tournament['protishthan_other_atten'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                         <td class="tg-0pky  type_0">
                                <?php echo $other_tour_num = $sports_tournament['other_tour_num'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_football_match = $sports_tournament['other_football_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_football_atten = $sports_tournament['other_football_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_cricket_match = $sports_tournament['other_cricket_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_cricket_atten = $sports_tournament['other_cricket_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_badminton_match = $sports_tournament['other_badminton_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_badminton_atten = $sports_tournament['other_badminton_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_volleyball_match = $sports_tournament['other_volleyball_match'] ?>
                                </td>

                               <td class="tg-0pky  type_10">
                                <?php echo $other_volleyball_atten = $sports_tournament['other_volleyball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_hadudu_match = $sports_tournament['other_hadudu_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_hadudu_atten = $sports_tournament['other_hadudu_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_handball_match = $sports_tournament['other_handball_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_handball_atten = $sports_tournament['other_handball_atten'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_other_match = $sports_tournament['other_other_match'] ?>
                                </td>
                               <td class="tg-0pky  type_10">
                                <?php echo $other_other_atten = $sports_tournament['other_other_atten'] ?>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_tour_num +$ward_tour_num + $uposhakha_tour_num +$univer_tour_num +$college_tour_num +$school_tour_num +$madrasah_tour_num +$protishthan_tour_num +$other_tour_num) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_football_match +$ward_football_match + $uposhakha_football_match +$univer_football_match +$college_football_match +$school_football_match +$madrasah_football_match +$protishthan_football_match +$other_football_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_football_atten +$ward_football_atten + $uposhakha_football_atten +$univer_football_atten +$college_football_atten +$school_football_atten +$madrasah_football_atten +$protishthan_football_atten +$other_football_atten) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_cricket_match +$ward_cricket_match + $uposhakha_cricket_match +$univer_cricket_match +$college_cricket_match +$school_cricket_match +$madrasah_cricket_match +$protishthan_cricket_match +$other_cricket_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_cricket_atten +$ward_cricket_atten + $uposhakha_cricket_atten +$univer_cricket_atten +$college_cricket_atten +$school_cricket_atten +$madrasah_cricket_atten +$protishthan_cricket_atten +$other_cricket_atten) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_badminton_match +$ward_badminton_match + $uposhakha_badminton_match +$univer_badminton_match +$college_badminton_match +$school_badminton_match +$madrasah_badminton_match +$protishthan_badminton_match +$other_badminton_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_badminton_atten +$ward_badminton_atten + $uposhakha_badminton_atten +$univer_badminton_atten +$college_badminton_atten +$school_badminton_atten +$madrasah_badminton_atten +$protishthan_badminton_atten +$other_badminton_atten) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_volleyball_match +$ward_volleyball_match + $uposhakha_volleyball_match +$univer_volleyball_match +$college_volleyball_match +$school_volleyball_match +$madrasah_volleyball_match +$protishthan_volleyball_match +$other_volleyball_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_volleyball_atten +$ward_volleyball_atten + $uposhakha_volleyball_atten +$univer_volleyball_atten +$college_volleyball_atten +$school_volleyball_atten +$madrasah_volleyball_atten +$protishthan_volleyball_atten +$other_volleyball_atten) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_hadudu_match +$ward_hadudu_match + $uposhakha_hadudu_match +$univer_hadudu_match +$college_hadudu_match +$school_hadudu_match +$madrasah_hadudu_match +$protishthan_hadudu_match +$other_hadudu_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_hadudu_atten +$ward_hadudu_atten + $uposhakha_hadudu_atten +$univer_hadudu_atten +$college_hadudu_atten +$school_hadudu_atten +$madrasah_hadudu_atten +$protishthan_hadudu_atten +$other_hadudu_atten) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_handball_match +$ward_handball_match + $uposhakha_handball_match +$univer_handball_match +$college_handball_match +$school_handball_match +$madrasah_handball_match +$protishthan_handball_match +$other_handball_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_handball_atten +$ward_handball_atten + $uposhakha_handball_atten +$univer_handball_atten +$college_handball_atten +$school_handball_atten +$madrasah_handball_atten +$protishthan_handball_atten +$other_handball_atten) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_other_match +$ward_other_match + $uposhakha_other_match +$univer_other_match +$college_other_match +$school_other_match +$madrasah_other_match +$protishthan_other_match +$other_other_match) ?>
                                </td>
                                <td class="tg-0pky  type_0">
                                <?php echo ($thana_other_atten +$ward_other_atten + $uposhakha_other_atten +$univer_other_atten +$college_other_atten +$school_other_atten +$madrasah_other_atten +$protishthan_other_atten +$other_other_atten) ?>
                                </td>
                                
                            </tr>

                        </table>
                <table class="tg table table-header-rotated" id="testTable2">

                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>স্পোর্টস প্রোগ্রাম </b></td>
                        <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Sports_স্পোর্টস প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                    </tr>

                   <tr>
                       <td class="tg-pwj7" colspan="">সাংগঠনিক স্তর  </td>
                       <td class="tg-pwj7" colspan="">স্পোর্টস গ্রুপ  </td>
                       <td class="tg-pwj7" colspan="">প্রোগ্রাম সংখ্যা</td>
                       <td class="tg-pwj7" colspan="">অংশগ্রহণকারী</td>
                       <td class="tg-pwj7" colspan="">ক্রীড়া সামগ্রী বিতরণ</td>
                   </tr>

                   <tr>
                       <td class="tg-0pky type_">
                        শাখা
                       </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $shaka_sports_group = $sports_program['shaka_sports_group'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $shaka_program_num = $sports_program['shaka_program_num'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $shaka_attendence = $sports_program['shaka_attendence'] ?>
                     </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $shaka_kria_shamogri_bitoron = $sports_program['shaka_kria_shamogri_bitoron'] ?>
                     </td>
                   </tr>
                   <tr>
                       <td class="tg-0pky type_">
                        থানা
                       </td>
                        <td class="tg-0pky  type_10">
                        <?php echo $thana_sports_group = $sports_program['thana_sports_group'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $thana_program_num = $sports_program['thana_program_num'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $thana_attendence = $sports_program['thana_attendence'] ?>
                     </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $thana_kria_shamogri_bitoron = $sports_program['thana_kria_shamogri_bitoron'] ?>
                     </td>
                   </tr>
                   <tr>
                       <td class="tg-0pky type_">
                        ওয়ার্ড
                       </td>
                        <td class="tg-0pky  type_10">
                        <?php echo $ward_sports_group = $sports_program['ward_sports_group'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $ward_program_num = $sports_program['ward_program_num'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $ward_attendence = $sports_program['ward_attendence'] ?>
                     </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $ward_kria_shamogri_bitoron = $sports_program['ward_kria_shamogri_bitoron'] ?>
                     </td>
                   </tr>
                   <tr>
                       <td class="tg-0pky type_">
                       উপশাখা
                       </td>
                        <td class="tg-0pky  type_10">
                        <?php echo $uposhakha_sports_group = $sports_program['uposhakha_sports_group'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $uposhakha_program_num = $sports_program['uposhakha_program_num'] ?>
                      </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $uposhakha_attendence = $sports_program['uposhakha_attendence'] ?>
                     </td>
                      <td class="tg-0pky  type_10">
                        <?php echo $uposhakha_kria_shamogri_bitoron = $sports_program['uposhakha_kria_shamogri_bitoron'] ?>
                     </td>
                   </tr>

                </table>
                <!-- Hide this table জনশক্তির ব্যক্তিগত দক্ষতা -->
                <table class="tg table table-header-rotated" id="testTable3" style="display:none;">
                            <tr>
                                <td class="tg-pwj7" colspan='5'><b> জনশক্তির ব্যক্তিগত দক্ষতা  </b> </td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Sports_জনশক্তির ব্যক্তিগত দক্ষতা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">মান </td>
                                <td class="tg-pwj7"> জনশক্তির সংখ্যা </td>
                                <td class="tg-pwj7 "><div><span> সাইকেল চালাতে জানেন কতজন? </span></div></td>
                                <td class="tg-pwj7 "><div><span> মোটর সাইকেল চালাতে জানেন কতজন?  </span></div></td>
                                <td class="tg-pwj7 "><div><span> কারাতে/তায়কোয়ান্দো জানেন কতজন?  </span></div></td>
                                <td class="tg-pwj7 "><div><span>সাঁতার জানেন কতজন? </span></div></td>

                            </tr>

                            <tr>
                                <td class="tg-y698 type_"> সদস্য </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_total_num = $sports_bektigoto_dokkhota['mem_total_num'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_cycle = $sports_bektigoto_dokkhota['mem_cycle'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_motorcycle = $sports_bektigoto_dokkhota['mem_motorcycle'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_karate = $sports_bektigoto_dokkhota['mem_karate'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_swim = $sports_bektigoto_dokkhota['mem_swim'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_"> সাথী </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $sathi_total_num = $sports_bektigoto_dokkhota['sathi_total_num'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_cycle = $sports_bektigoto_dokkhota['sathi_cycle'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_motorcycle = $sports_bektigoto_dokkhota['sathi_motorcycle'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_karate = $sports_bektigoto_dokkhota['sathi_karate'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_swim = $sports_bektigoto_dokkhota['sathi_swim'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698 type_"> কর্মী </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kormi_total_num = $sports_bektigoto_dokkhota['kormi_total_num'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_cycle = $sports_bektigoto_dokkhota['kormi_cycle'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_motorcycle = $sports_bektigoto_dokkhota['kormi_motorcycle'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_karate = $sports_bektigoto_dokkhota['kormi_karate'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_swim = $sports_bektigoto_dokkhota['kormi_swim'] ?>
                                </td>

                            </tr>

 
                            <tr>
                                <td class="tg-y698"> মোট</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($mem_total_num + $sathi_total_num +$kormi_total_num ) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($mem_cycle + $sathi_cycle +$kormi_cycle ) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($mem_motorcycle + $sathi_motorcycle +$kormi_motorcycle ) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($mem_karate + $sathi_karate +$kormi_karate ) ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ($mem_swim + $sathi_swim +$kormi_swim ) ?>
                                </td>
                              
                            </tr>


                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan='15'><b> ক্রীড়া জনশক্তির পরিসংখ্যান  </b> </td>
                                <td class="tg-pwj7" colspan="3">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Sports_ক্রীড়া জনশক্তির পরিসংখ্যান.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">মান</td>
                                <td class="tg-pwj7">ক্রীড়া জনশক্তি কতজন</td>
                                <td class="tg-pwj7"> ক্রিকেট কতজন</td>
                                <td class="tg-pwj7"> ফুটবল কতজন</td>
                                <td class="tg-pwj7"> অন্যান্য কতজন</td>
                                <td class="tg-pwj7"> ইন্টার স্কুল</td>
                                <td class="tg-pwj7"> বিকেএসপি </td>
                                <td class="tg-pwj7 "><div><span> ডিভিশন </span></div></td>
                                <td class="tg-pwj7 "><div><span> জেলা পর্যায়ে  </span></div></td>
                                <td class="tg-pwj7 "><div><span> বিভাগীয় পর্যায়ে  </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -১৫ </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -১৬ </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -১৭ </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -১৮ </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -১৯ </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -২০ </span></div></td>
                                <td class="tg-pwj7 "><div><span>অনূর্ধ্ব -২১ </span></div></td>
                                <td class="tg-pwj7 "><div><span>জাতীয় দল </span></div></td>
                            </tr>

                            <tr>
                                <td class="tg-0pky type_">সদস্য </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $mem_kria_manpower = $sports_kria_jonoshoktir_porishokngkhan['mem_kria_manpower'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_cricket = $sports_kria_jonoshoktir_porishokngkhan['mem_cricket'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_football = $sports_kria_jonoshoktir_porishokngkhan['mem_football'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_other = $sports_kria_jonoshoktir_porishokngkhan['mem_other'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_inter_school = $sports_kria_jonoshoktir_porishokngkhan['mem_inter_school'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_bksp = $sports_kria_jonoshoktir_porishokngkhan['mem_bksp'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_division = $sports_kria_jonoshoktir_porishokngkhan['mem_division'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_jela_porjay = $sports_kria_jonoshoktir_porishokngkhan['mem_jela_porjay'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_bivag_porjay = $sports_kria_jonoshoktir_porishokngkhan['mem_bivag_porjay'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_15 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_15'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_16 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_16'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_17 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_17'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_18 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_18'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_19 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_19'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_20 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_20'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_under_21 = $sports_kria_jonoshoktir_porishokngkhan['mem_under_21'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $mem_national_team = $sports_kria_jonoshoktir_porishokngkhan['mem_national_team'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-0pky type_"> সাথী</td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $sathi_kria_manpower = $sports_kria_jonoshoktir_porishokngkhan['sathi_kria_manpower'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_cricket = $sports_kria_jonoshoktir_porishokngkhan['sathi_cricket'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_football = $sports_kria_jonoshoktir_porishokngkhan['sathi_football'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_other = $sports_kria_jonoshoktir_porishokngkhan['sathi_other'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_inter_school = $sports_kria_jonoshoktir_porishokngkhan['sathi_inter_school'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_bksp = $sports_kria_jonoshoktir_porishokngkhan['sathi_bksp'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_division = $sports_kria_jonoshoktir_porishokngkhan['sathi_division'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_jela_porjay = $sports_kria_jonoshoktir_porishokngkhan['sathi_jela_porjay'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_bivag_porjay = $sports_kria_jonoshoktir_porishokngkhan['sathi_bivag_porjay'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_15 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_15'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_16 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_16'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_17 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_17'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_18 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_18'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_19 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_19'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_20 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_20'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_under_21 = $sports_kria_jonoshoktir_porishokngkhan['sathi_under_21'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $sathi_national_team = $sports_kria_jonoshoktir_porishokngkhan['sathi_national_team'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-0pky type_">কর্মী </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $kormi_kria_manpower = $sports_kria_jonoshoktir_porishokngkhan['kormi_kria_manpower'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_cricket = $sports_kria_jonoshoktir_porishokngkhan['kormi_cricket'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_football = $sports_kria_jonoshoktir_porishokngkhan['kormi_football'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_other = $sports_kria_jonoshoktir_porishokngkhan['kormi_other'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_inter_school = $sports_kria_jonoshoktir_porishokngkhan['kormi_inter_school'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_bksp = $sports_kria_jonoshoktir_porishokngkhan['kormi_bksp'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_division = $sports_kria_jonoshoktir_porishokngkhan['kormi_division'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_jela_porjay = $sports_kria_jonoshoktir_porishokngkhan['kormi_jela_porjay'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_bivag_porjay = $sports_kria_jonoshoktir_porishokngkhan['kormi_bivag_porjay'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_15 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_15'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_16 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_16'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_17 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_17'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_18 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_18'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_19 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_19'] ?>
                                </td>

                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_20 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_20'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_under_21 = $sports_kria_jonoshoktir_porishokngkhan['kormi_under_21'] ?>
                                </td>
                                  <td class="tg-0pky  type_10">
                                    <?php echo $kormi_national_team = $sports_kria_jonoshoktir_porishokngkhan['kormi_national_team'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky type_">মোট </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_kria_manpower + $sathi_kria_manpower + $kormi_kria_manpower )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_cricket + $sathi_cricket + $kormi_cricket )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_football + $sathi_football + $kormi_football )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_other + $sathi_other + $kormi_other )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_inter_school + $sathi_inter_school + $kormi_inter_school )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_bksp + $sathi_bksp + $kormi_bksp )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_jela_porjay + $sathi_jela_porjay + $kormi_jela_porjay )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_division + $sathi_division + $kormi_division )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_bivag_porjay + $sathi_bivag_porjay + $kormi_bivag_porjay )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_15 + $sathi_under_15 + $kormi_under_15 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_16 + $sathi_under_16 + $kormi_under_16 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_17 + $sathi_under_17 + $kormi_under_17 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_18 + $sathi_under_18 + $kormi_under_18 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_19 + $sathi_under_19 + $kormi_under_19 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_20 + $sathi_under_20 + $kormi_under_20 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_under_21 + $sathi_under_21 + $kormi_under_21 )  ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo ( $mem_national_team + $sathi_national_team + $kormi_national_team )  ?>
                                </td>

                            </tr>

                        </table>

                    </div>




			   </div>
            </div>
        </div>
    </div>
</div>

