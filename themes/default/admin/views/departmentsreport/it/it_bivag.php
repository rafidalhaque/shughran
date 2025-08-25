<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'তথ্যপ্রযুক্তি বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/it-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/it-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
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
                    <table class="tg table table-header-rotated" id="জনশক্তির দক্ষতা - ১">
                            <tr>
                            <td class="tg-pwj7" colspan="12"><b>জনশক্তির দক্ষতা - ১(সংরক্ষিত তালিকার আলোকে)<b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='জনশক্তির দক্ষতা - ১' onclick="doit('xlsx','জনশক্তির দক্ষতা - ১','<?php echo 'IT_জনশক্তির দক্ষতা - ১(সংরক্ষিত তালিকার আলোকে)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        
                            <tr>
                            <td class="tg-pwj7" rowspan="2">জনশক্তি</td>
                            <td class="tg-pwj7 " rowspan="2"><div><span>আইটি এক্সপার্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>হার্ডওয়্যার এক্সপার্ট</span></div></td>
                                <td class="tg-pwj7 " colspan="5"><div><span>ডিজাইন প্রোডাকশন</span></div></td>
                                <td class="tg-pwj7 " colspan="4"><div><span>ভিডিও প্রোডাকশন	</span></div></td>
                               <td class="tg-pwj7" rowspan="2">ডেটা ম্যানেজমেন্ট ও অ্যানালিটিক্স</td>
                                <td class="tg-pwj7" rowspan="2">ফটো ও ভিডিওগ্রাফি</td>
                                
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  ফটোশপ</span></div></td>
                                <td class="tg-pwj7 "><div><span> ইলাস্ট্রেটর</span></div></td>
                                <td class="tg-pwj7 "><div><span>  টাইপোগ্রাফি</span></div></td>
                                <td class="tg-pwj7 "><div><span> UI/UX</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোবাইল ডিজাইন</span></div></td>
                                <td class="tg-pwj7 "><div><span> প্রিমিয়ার প্রো</span></div></td>
                                <td class="tg-pwj7 "><div><span> আফটার ইফেক্ট</span></div></td>
                                <td class="tg-pwj7 "><div><span> অ্যানিমেশন</span></div></td>
                                <td class="tg-pwj7 "><div><span> মোবাইল ভিডিও</span></div></td>
    
                               
                            </tr>


                            <?php
                            $pk = (isset($it_jonosokti_dokkhotota['id']))?$it_jonosokti_dokkhotota['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                 <td class="tg-0pky  type_1">
                                 <?php echo $m_it =  (isset( $it_jonosokti_dokkhotota['m_it']))? $it_jonosokti_dokkhotota['m_it']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_hardware =  (isset( $it_jonosokti_dokkhotota['m_hardware']))? $it_jonosokti_dokkhotota['m_hardware']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_photoshop =  (isset( $it_jonosokti_dokkhotota['m_photoshop']))? $it_jonosokti_dokkhotota['m_photoshop']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_ilustrator =  (isset( $it_jonosokti_dokkhotota['m_ilustrator']))? $it_jonosokti_dokkhotota['m_ilustrator']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_typography =  (isset( $it_jonosokti_dokkhotota['m_typography']))? $it_jonosokti_dokkhotota['m_typography']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_uiux =  (isset( $it_jonosokti_dokkhotota['m_uiux']))? $it_jonosokti_dokkhotota['m_uiux']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_mobiledesign =  (isset( $it_jonosokti_dokkhotota['m_mobiledesign']))? $it_jonosokti_dokkhotota['m_mobiledesign']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_premiarpro =  (isset( $it_jonosokti_dokkhotota['m_premiarpro']))? $it_jonosokti_dokkhotota['m_premiarpro']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_aftereffect =  (isset( $it_jonosokti_dokkhotota['m_aftereffect']))? $it_jonosokti_dokkhotota['m_aftereffect']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_animation =  (isset( $it_jonosokti_dokkhotota['m_animation']))? $it_jonosokti_dokkhotota['m_animation']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_mobilevideo =  (isset( $it_jonosokti_dokkhotota['m_mobilevideo']))? $it_jonosokti_dokkhotota['m_mobilevideo']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_datamanagementAnalysis =  (isset( $it_jonosokti_dokkhotota['m_datamanagementAnalysis']))? $it_jonosokti_dokkhotota['m_datamanagementAnalysis']:0; ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_photovideography =  (isset( $it_jonosokti_dokkhotota['m_photovideography']))? $it_jonosokti_dokkhotota['m_photovideography']:0; ?>

                                </td>
                                
                                
                               

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_it = (isset($it_jonosokti_dokkhotota['a_it'])) ? $it_jonosokti_dokkhotota['a_it'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_hardware = (isset($it_jonosokti_dokkhotota['a_hardware'])) ? $it_jonosokti_dokkhotota['a_hardware'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_photoshop = (isset($it_jonosokti_dokkhotota['a_photoshop'])) ? $it_jonosokti_dokkhotota['a_photoshop'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_ilustrator = (isset($it_jonosokti_dokkhotota['a_ilustrator'])) ? $it_jonosokti_dokkhotota['a_ilustrator'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_typography = (isset($it_jonosokti_dokkhotota['a_typography'])) ? $it_jonosokti_dokkhotota['a_typography'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_uiux = (isset($it_jonosokti_dokkhotota['a_uiux'])) ? $it_jonosokti_dokkhotota['a_uiux'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_mobiledesign = (isset($it_jonosokti_dokkhotota['a_mobiledesign'])) ? $it_jonosokti_dokkhotota['a_mobiledesign'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_premiarpro = (isset($it_jonosokti_dokkhotota['a_premiarpro'])) ? $it_jonosokti_dokkhotota['a_premiarpro'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_aftereffect = (isset($it_jonosokti_dokkhotota['a_aftereffect'])) ? $it_jonosokti_dokkhotota['a_aftereffect'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_animation = (isset($it_jonosokti_dokkhotota['a_animation'])) ? $it_jonosokti_dokkhotota['a_animation'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_mobilevideo = (isset($it_jonosokti_dokkhotota['a_mobilevideo'])) ? $it_jonosokti_dokkhotota['a_mobilevideo'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_datamanagementAnalysis = (isset($it_jonosokti_dokkhotota['a_datamanagementAnalysis'])) ? $it_jonosokti_dokkhotota['a_datamanagementAnalysis'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_photovideography = (isset($it_jonosokti_dokkhotota['a_photovideography'])) ? $it_jonosokti_dokkhotota['a_photovideography'] : 0; ?>

                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <!-- For w_ columns -->
                                <td class="tg-0pky  type_1">
                                <?php echo $w_it = (isset($it_jonosokti_dokkhotota['w_it'])) ? $it_jonosokti_dokkhotota['w_it'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_hardware = (isset($it_jonosokti_dokkhotota['w_hardware'])) ? $it_jonosokti_dokkhotota['w_hardware'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_photoshop = (isset($it_jonosokti_dokkhotota['w_photoshop'])) ? $it_jonosokti_dokkhotota['w_photoshop'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_ilustrator = (isset($it_jonosokti_dokkhotota['w_ilustrator'])) ? $it_jonosokti_dokkhotota['w_ilustrator'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_typography = (isset($it_jonosokti_dokkhotota['w_typography'])) ? $it_jonosokti_dokkhotota['w_typography'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_uiux = (isset($it_jonosokti_dokkhotota['w_uiux'])) ? $it_jonosokti_dokkhotota['w_uiux'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_mobiledesign = (isset($it_jonosokti_dokkhotota['w_mobiledesign'])) ? $it_jonosokti_dokkhotota['w_mobiledesign'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_premiarpro = (isset($it_jonosokti_dokkhotota['w_premiarpro'])) ? $it_jonosokti_dokkhotota['w_premiarpro'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_aftereffect = (isset($it_jonosokti_dokkhotota['w_aftereffect'])) ? $it_jonosokti_dokkhotota['w_aftereffect'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_animation = (isset($it_jonosokti_dokkhotota['w_animation'])) ? $it_jonosokti_dokkhotota['w_animation'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_mobilevideo = (isset($it_jonosokti_dokkhotota['w_mobilevideo'])) ? $it_jonosokti_dokkhotota['w_mobilevideo'] : 0; ?>

                                </td>

                                 <td class="tg-0pky  type_1">
                                <?php echo $w_datamanagementAnalysis = (isset($it_jonosokti_dokkhotota['w_datamanagementAnalysis'])) ? $it_jonosokti_dokkhotota['w_datamanagementAnalysis'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_photovideography = (isset($it_jonosokti_dokkhotota['w_photovideography'])) ? $it_jonosokti_dokkhotota['w_photovideography'] : 0; ?>

                                </td>


                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo ($m_it+$a_it+$w_it)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_hardware+$a_hardware+$w_hardware)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_photoshop+$a_photoshop+$w_photoshop)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_ilustrator+$m_ilustrator+$w_ilustrator)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_typography+$a_typography+$w_typography)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_uiux+$a_uiux+$w_uiux)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_mobiledesign+$a_mobiledesign+$w_mobiledesign)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_premiarpro+$a_premiarpro+$w_premiarpro)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($m_aftereffect+$a_aftereffect+$w_aftereffect)?>
                                </td>

                                <td class="tg-0pky  type_9">
                                <?php echo ($m_animation+$a_animation+$w_animation)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($m_mobilevideo+$a_mobilevideo+$w_mobilevideo)?>
                                </td>
                                 <td class="tg-0pky  type_9">
                                <?php echo ($m_datamanagementAnalysis+$a_datamanagementAnalysis+$w_datamanagementAnalysis)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($m_photovideography+$a_photovideography+$w_photovideography)?>
                                </td>
                              
                            </tr>

                            

                        </table>
                        <table class="tg table table-header-rotated" id="CSE/IT তে অধ্যয়নরত জনশক্তি">
                        
                        <tr>
                        <td class="tg-pwj7" colspan="11"><b>জনশক্তির দক্ষতা - ২(সংরক্ষিত তালিকার আলোকে)<b></td>
                        <td class="tg-pwj7" colspan="2"><b>CSE/IT তে অধ্যয়নরত জনশক্তি<b></td>   
                        <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='CSE/IT তে অধ্যয়নরত জনশক্তি' onclick="doit('xlsx','CSE/IT তে অধ্যয়নরত জনশক্তি','<?php echo 'IT_CSE/IT তে অধ্যয়নরত জনশক্তি_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                       
                            <tr>
                                <td class="tg-pwj7" rowspan="2">জনশক্তি</td>
                                <td class="tg-pwj7 " colspan="3"><div><span>মাইক্রোসফট/গুগল প্রোডাক্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>প্রোগ্রামিং</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ওয়েব ডেভেলপমেন্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>অ্যাপ ডেভেলপমেন্ট</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ডিভাইস সিকিউরিটি</span></div></td>
                                <td class="tg-pwj7"  rowspan="2">ইথিক্যাল হ্যাকিং</td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ডিজিটাল মার্কেটিং</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> গেম ডেভেলপমেন্ট</span></div></td>
                                <td class="tg-pwj7 " colspan="2"><div><span>বিশ্ববিদ্যালয়</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span> ডিপ্লোমা ইন্সটি.</span></div></td>
                            </tr>
                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>  ওয়ার্ড/ডক </span></div></td>
                                <td class="tg-pwj7 "><div><span> এক্সেল/ স্প্রেডশীট</span></div></td>
                                <td class="tg-pwj7 "><div><span> পাওয়ারপয়েন্ট/ স্লাইড </span></div></td>
                                <td class="tg-pwj7 "><div><span> সরকারি</span></div></td>
                                <td class="tg-pwj7 "><div><span>  বেসরকারি </span></div></td>
                               
                      
                            </tr>



                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_micro_oarddoc= (isset($it_jonosokti_dokkhotota['m_micro_oarddoc'])) ? $it_jonosokti_dokkhotota['m_micro_oarddoc'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_micro_exel= (isset($it_jonosokti_dokkhotota['m_micro_exel'])) ? $it_jonosokti_dokkhotota['m_micro_exel'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_micro_pawerpoint= (isset($it_jonosokti_dokkhotota['m_micro_pawerpoint'])) ? $it_jonosokti_dokkhotota['m_micro_pawerpoint'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_programing= (isset($it_jonosokti_dokkhotota['m_programing'])) ? $it_jonosokti_dokkhotota['m_programing'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_web= (isset($it_jonosokti_dokkhotota['m_web'])) ? $it_jonosokti_dokkhotota['m_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_app= (isset($it_jonosokti_dokkhotota['m_app'])) ? $it_jonosokti_dokkhotota['m_app'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_deviceSecurity= (isset($it_jonosokti_dokkhotota['m_deviceSecurity'])) ? $it_jonosokti_dokkhotota['m_deviceSecurity'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_ethical= (isset($it_jonosokti_dokkhotota['m_ethical'])) ? $it_jonosokti_dokkhotota['m_ethical'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_digitalmarketing= (isset($it_jonosokti_dokkhotota['m_digitalmarketing'])) ? $it_jonosokti_dokkhotota['m_digitalmarketing'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_game= (isset($it_jonosokti_dokkhotota['m_game'])) ? $it_jonosokti_dokkhotota['m_game'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_sorkari= (isset($it_cseit_jonosokti['m_sorkari'])) ? $it_cseit_jonosokti['m_sorkari'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $m_besorkari= (isset($it_cseit_jonosokti['m_besorkari'])) ? $it_cseit_jonosokti['m_sorkari'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_diploma= (isset($it_cseit_jonosokti['m_diploma'])) ? $it_cseit_jonosokti['m_diploma'] : 0; ?>

                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_micro_oarddoc= (isset($it_jonosokti_dokkhotota['a_micro_oarddoc'])) ? $it_jonosokti_dokkhotota['a_micro_oarddoc'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_micro_exel= (isset($it_jonosokti_dokkhotota['a_micro_exel'])) ? $it_jonosokti_dokkhotota['a_micro_exel'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_micro_pawerpoint= (isset($it_jonosokti_dokkhotota['a_micro_pawerpoint'])) ? $it_jonosokti_dokkhotota['a_micro_pawerpoint'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_programing= (isset($it_jonosokti_dokkhotota['a_programing'])) ? $it_jonosokti_dokkhotota['a_programing'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_web= (isset($it_jonosokti_dokkhotota['a_web'])) ? $it_jonosokti_dokkhotota['a_web'] : 0; ?>

                                </td>
                               
                                 <td class="tg-0pky  type_1">
                                <?php echo $a_app= (isset($it_jonosokti_dokkhotota['a_app'])) ? $it_jonosokti_dokkhotota['a_app'] : 0; ?>

                                </td>
                                 <td class="tg-0pky  type_1">
                                <?php echo $a_deviceSecurity= (isset($it_jonosokti_dokkhotota['a_deviceSecurity'])) ? $it_jonosokti_dokkhotota['a_deviceSecurity'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_ethical= (isset($it_jonosokti_dokkhotota['a_ethical'])) ? $it_jonosokti_dokkhotota['a_ethical'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_digitalmarketing= (isset($it_jonosokti_dokkhotota['a_digitalmarketing'])) ? $it_jonosokti_dokkhotota['a_digitalmarketing'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_game= (isset($it_jonosokti_dokkhotota['a_game'])) ? $it_jonosokti_dokkhotota['a_game'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_sorkari= (isset($it_cseit_jonosokti['a_sorkari'])) ? $it_cseit_jonosokti['a_sorkari'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $a_besorkari= (isset($it_cseit_jonosokti['a_besorkari'])) ? $it_cseit_jonosokti['a_sorkari'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_diploma= (isset($it_cseit_jonosokti['a_diploma'])) ? $it_cseit_jonosokti['a_diploma'] : 0; ?>

                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_micro_oarddoc= (isset($it_jonosokti_dokkhotota['w_micro_oarddoc'])) ? $it_jonosokti_dokkhotota['w_micro_oarddoc'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_micro_exel= (isset($it_jonosokti_dokkhotota['w_micro_exel'])) ? $it_jonosokti_dokkhotota['w_micro_exel'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_micro_pawerpoint= (isset($it_jonosokti_dokkhotota['w_micro_pawerpoint'])) ? $it_jonosokti_dokkhotota['w_micro_pawerpoint'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_programing= (isset($it_jonosokti_dokkhotota['w_programing'])) ? $it_jonosokti_dokkhotota['w_programing'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_web= (isset($it_jonosokti_dokkhotota['w_web'])) ? $it_jonosokti_dokkhotota['w_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_app= (isset($it_jonosokti_dokkhotota['w_app'])) ? $it_jonosokti_dokkhotota['w_app'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_deviceSecurity= (isset($it_jonosokti_dokkhotota['w_deviceSecurity'])) ? $it_jonosokti_dokkhotota['w_deviceSecurity'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_ethical= (isset($it_jonosokti_dokkhotota['w_ethical'])) ? $it_jonosokti_dokkhotota['w_ethical'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_digitalmarketing= (isset($it_jonosokti_dokkhotota['w_digitalmarketing'])) ? $it_jonosokti_dokkhotota['w_digitalmarketing'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_game= (isset($it_jonosokti_dokkhotota['w_game'])) ? $it_jonosokti_dokkhotota['w_game'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_sorkari= (isset($it_cseit_jonosokti['w_sorkari'])) ? $it_cseit_jonosokti['w_sorkari'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $w_besorkari= (isset($it_cseit_jonosokti['w_besorkari'])) ? $it_cseit_jonosokti['w_sorkari'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_diploma= (isset($it_cseit_jonosokti['w_diploma'])) ? $it_cseit_jonosokti['w_diploma'] : 0; ?>

                                </td>

                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo ($m_micro_oarddoc+$a_micro_oarddoc+$w_micro_oarddoc)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_micro_exel+$a_micro_exel+$w_micro_exel)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_micro_pawerpoint+$a_micro_pawerpoint+$w_micro_pawerpoint)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_programing+$a_programing+$w_programing)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_web+$a_web+$w_web)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_app+$a_app+$w_app)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_deviceSecurity+$a_deviceSecurity+$w_deviceSecurity)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_ethical+$a_ethical+$w_ethical)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_digitalmarketing+$a_digitalmarketing+$w_digitalmarketing)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_game+$a_game+$w_game)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_sorkari+$a_sorkari+$w_sorkari)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_besorkari+$a_besorkari+$w_besorkari)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_diploma+$a_diploma+$w_diploma)?>
                                </td>
                                
                              
                            </tr>

                           
                            </tr>


                        </table>
                        <table class="tg table table-header-rotated" id="ক্যাটাগরিভিত্তিক টিম আউটপুট">
                      <tr>
                          <td class="tg-pwj7" colspan="4"><b>ক্যাটাগরিভিত্তিক টিম আউটপুট</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='ক্যাটাগরিভিত্তিক টিম আউটপুট' onclick="doit('xlsx','ক্যাটাগরিভিত্তিক টিম আউটপুট','<?php echo 'IT_ক্যাটাগরিভিত্তিক টিম আউটপুট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($it_category_team_output['id']))?$it_category_team_output['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''> ক্যাটাগরির নাম</td>
                          <td class="tg-pwj7" rowspan=''> প্রতি ক্যাটাগরির টিমে কত জন রয়েছে?</td>
                          <td class="tg-pwj7" colspan=''>টিম মিটিং কতটি</td>
                          <td class="tg-pwj7" colspan=''> নতুন কাজ সম্পন্ন হয়েছে কতটি</td>
                          <td class="tg-pwj7" colspan=''>এ বছরের উল্লেখযোগ্য বাস্তবায়িত কাজসমূহ লিখুন</td>
                      </tr>
                      <tr>
                      <td class="tg-y698">ডিজাইন প্রোডাকশন</td>
                      <td class="tg-0pky type_1">
                      <?php echo $design_ps = (isset($it_category_team_output['design_ps'])) ? $it_category_team_output['design_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $design_ms = (isset($it_category_team_output['design_ms'])) ? $it_category_team_output['design_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $design_cs = (isset($it_category_team_output['design_cs'])) ? $it_category_team_output['design_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $design_mont = (isset($it_category_team_output['design_mont'])) ? $it_category_team_output['design_mont'] : ''; ?>
                        </td>

                      </tr>
                      <tr>
                      <td class="tg-y698">ভিডিও প্রোডাকশন</td>
                        <td class="tg-0pky type_1">
                        <?php echo $video_ps = (isset($it_category_team_output['video_ps'])) ? $it_category_team_output['video_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $video_ms = (isset($it_category_team_output['video_ms'])) ? $it_category_team_output['video_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $video_cs = (isset($it_category_team_output['video_cs'])) ? $it_category_team_output['video_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $video_mont = (isset($it_category_team_output['video_mont'])) ? $it_category_team_output['video_mont'] : ''; ?>
                        </td>



                      </tr>
                      <tr>
                      <td class="tg-y698">ওয়েব ডেভেলপমেন্ট</td>
                        <td class="tg-0pky type_1">
                        <?php echo $web_ps = (isset($it_category_team_output['web_ps'])) ? $it_category_team_output['web_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $web_ms = (isset($it_category_team_output['web_ms'])) ? $it_category_team_output['web_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $web_cs = (isset($it_category_team_output['web_cs'])) ? $it_category_team_output['web_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $web_mont = (isset($it_category_team_output['web_mont'])) ? $it_category_team_output['web_mont'] : ''; ?>
                        </td>

                      </tr>
                     
                       <tr>
                       <td class="tg-y698">অ্যাপ ডেভেলপমেন্ট</td>
                            <td class="tg-0pky type_1">
                            <?php echo $app_ps = (isset($it_category_team_output['app_ps'])) ? $it_category_team_output['app_ps'] : ''; ?>
                            </td>

                            <td class="tg-0pky type_1">
                            <?php echo $app_ms = (isset($it_category_team_output['app_ms'])) ? $it_category_team_output['app_ms'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $app_cs = (isset($it_category_team_output['app_cs'])) ? $it_category_team_output['app_cs'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $app_mont = (isset($it_category_team_output['app_mont'])) ? $it_category_team_output['app_mont'] : ''; ?>
                            </td>

                       </tr>
                       <tr>
                       <td class="tg-y698">প্রোগ্রামিং </td>
                            <td class="tg-0pky type_1">
                            <?php echo $programing_ps = (isset($it_category_team_output['programing_ps'])) ? $it_category_team_output['programing_ps'] : ''; ?>
                            </td>

                            <td class="tg-0pky type_1">
                            <?php echo $programing_ms = (isset($it_category_team_output['programing_ms'])) ? $it_category_team_output['programing_ms'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $programing_cs = (isset($it_category_team_output['programing_cs'])) ? $it_category_team_output['programing_cs'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $programing_mont = (isset($it_category_team_output['programing_mont'])) ? $it_category_team_output['programing_mont'] : ''; ?>
                            </td>

                       </tr>
                        <tr>
                        <td class="tg-y698">টেকনিক্যাল সাপোর্ট</td>
                        <td class="tg-0pky type_1">
                        <?php echo $tech_ps = (isset($it_category_team_output['tech_ps'])) ? $it_category_team_output['tech_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $tech_ms = (isset($it_category_team_output['tech_ms'])) ? $it_category_team_output['tech_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $tech_cs = (isset($it_category_team_output['tech_cs'])) ? $it_category_team_output['tech_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $tech_mont = (isset($it_category_team_output['tech_mont'])) ? $it_category_team_output['tech_mont'] : ''; ?>
                        </td>

                        </tr>
                        <tr>
                        <td class="tg-y698">মাইক্রোসফট/ গুগল প্রোডাক্ট</td>
                            <td class="tg-0pky type_1">
                            <?php echo $migo_ps = (isset($it_category_team_output['migo_ps'])) ? $it_category_team_output['migo_ps'] : ''; ?>
                            </td>

                            <td class="tg-0pky type_1">
                            <?php echo $migo_ms = (isset($it_category_team_output['migo_ms'])) ? $it_category_team_output['migo_ms'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $migo_cs = (isset($it_category_team_output['migo_cs'])) ? $it_category_team_output['migo_cs'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $migo_mont = (isset($it_category_team_output['migo_mont'])) ? $it_category_team_output['migo_mont'] : ''; ?>
                            </td>

                        </tr>
                        <tr>
                        <td class="tg-y698">ফটো ও ভিডিওগ্রাফি</td>
                            <td class="tg-0pky type_1">
                            <?php echo $phvi_ps = (isset($it_category_team_output['phvi_ps'])) ? $it_category_team_output['phvi_ps'] : ''; ?>
                            </td>

                            <td class="tg-0pky type_1">
                            <?php echo $phvi_ms = (isset($it_category_team_output['phvi_ms'])) ? $it_category_team_output['phvi_ms'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $phvi_cs = (isset($it_category_team_output['phvi_cs'])) ? $it_category_team_output['phvi_cs'] : ''; ?>
                            </td>
                            <td class="tg-0pky type_1">
                            <?php echo $phvi_mont = (isset($it_category_team_output['phvi_mont'])) ? $it_category_team_output['phvi_mont'] : ''; ?>
                            </td>

                        </tr>
                        <tr>
                        <td class="tg-y698">সাইবার সিকিউরিটি</td>
                        <td class="tg-0pky type_1">
                        <?php echo $onse_ps = (isset($it_category_team_output['onse_ps'])) ? $it_category_team_output['onse_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $onse_ms = (isset($it_category_team_output['onse_ms'])) ? $it_category_team_output['onse_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $onse_cs = (isset($it_category_team_output['onse_cs'])) ? $it_category_team_output['onse_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $onse_mont = (isset($it_category_team_output['onse_mont'])) ? $it_category_team_output['onse_mont'] : ''; ?>
                        </td>
  
                        </tr>

                        <tr>
                        <td class="tg-y698">রিসার্চ এণ্ড ডেভেলপমেন্ট</td>
                        <td class="tg-0pky type_1">
                        <?php echo $rede_ps = (isset($it_category_team_output['rede_ps'])) ? $it_category_team_output['rede_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $rede_ms = (isset($it_category_team_output['rede_ms'])) ? $it_category_team_output['rede_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $rede_cs = (isset($it_category_team_output['rede_cs'])) ? $it_category_team_output['rede_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $rede_mont = (isset($it_category_team_output['rede_mont'])) ? $it_category_team_output['rede_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         <tr>
                        <td class="tg-y698">ডিভাইস সিকিউরিটি</td>
                        <td class="tg-0pky type_1">
                        <?php echo $deviceSecurity_ps = (isset($it_category_team_output['deviceSecurity_ps'])) ? $it_category_team_output['deviceSecurity_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $deviceSecurity_ms = (isset($it_category_team_output['deviceSecurity_ms'])) ? $it_category_team_output['deviceSecurity_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $deviceSecurity_cs = (isset($it_category_team_output['deviceSecurity_cs'])) ? $it_category_team_output['deviceSecurity_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $deviceSecurity_mont = (isset($it_category_team_output['deviceSecurity_mont'])) ? $it_category_team_output['deviceSecurity_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         
                         <tr>
                        <td class="tg-y698">ইউআই/ইউএক্স ডিজাইন</td>
                        <td class="tg-0pky type_1">
                        <?php echo $uiuxDesign_ps = (isset($it_category_team_output['uiuxDesign_ps'])) ? $it_category_team_output['uiuxDesign_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $uiuxDesign_ms = (isset($it_category_team_output['uiuxDesign_ms'])) ? $it_category_team_output['uiuxDesign_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $uiuxDesign_cs = (isset($it_category_team_output['uiuxDesign_cs'])) ? $it_category_team_output['uiuxDesign_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $uiuxDesign_mont = (isset($it_category_team_output['uiuxDesign_mont'])) ? $it_category_team_output['uiuxDesign_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         <tr>
                        <td class="tg-y698">অ্যানিমেশন</td>
                        <td class="tg-0pky type_1">
                        <?php echo $animation_ps = (isset($it_category_team_output['animation_ps'])) ? $it_category_team_output['animation_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $animation_ms = (isset($it_category_team_output['animation_ms'])) ? $it_category_team_output['animation_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $animation_cs = (isset($it_category_team_output['animation_cs'])) ? $it_category_team_output['animation_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $animation_mont = (isset($it_category_team_output['animation_mont'])) ? $it_category_team_output['animation_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         <tr>
                        <td class="tg-y698">আর্টিফিশিয়াল ইন্টেলিজেন্স</td>
                        <td class="tg-0pky type_1">
                        <?php echo $artifacialIntelligence_ps = (isset($it_category_team_output['artifacialIntelligence_ps'])) ? $it_category_team_output['artifacialIntelligence_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $artifacialIntelligence_ms = (isset($it_category_team_output['artifacialIntelligence_ms'])) ? $it_category_team_output['artifacialIntelligence_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $artifacialIntelligence_cs = (isset($it_category_team_output['artifacialIntelligence_cs'])) ? $it_category_team_output['artifacialIntelligence_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $artifacialIntelligence_mont = (isset($it_category_team_output['artifacialIntelligence_mont'])) ? $it_category_team_output['artifacialIntelligence_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         <tr>
                        <td class="tg-y698">ডিজিটাল মার্কেটিং</td>
                        <td class="tg-0pky type_1">
                        <?php echo $digitalMarketing_ps = (isset($it_category_team_output['digitalMarketing_ps'])) ? $it_category_team_output['digitalMarketing_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $digitalMarketing_ms = (isset($it_category_team_output['digitalMarketing_ms'])) ? $it_category_team_output['digitalMarketing_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $digitalMarketing_cs = (isset($it_category_team_output['digitalMarketing_cs'])) ? $it_category_team_output['digitalMarketing_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $digitalMarketing_mont = (isset($it_category_team_output['digitalMarketing_mont'])) ? $it_category_team_output['digitalMarketing_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         <tr>
                        <td class="tg-y698">ডেটা ম্যানেজমেন্ট ও অ্যানালিটিক্স</td>
                        <td class="tg-0pky type_1">
                        <?php echo $dataManagementAnalysis_ps = (isset($it_category_team_output['dataManagementAnalysis_ps'])) ? $it_category_team_output['dataManagementAnalysis_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $dataManagementAnalysis_ms = (isset($it_category_team_output['dataManagementAnalysis_ms'])) ? $it_category_team_output['dataManagementAnalysis_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $dataManagementAnalysis_cs = (isset($it_category_team_output['dataManagementAnalysis_cs'])) ? $it_category_team_output['dataManagementAnalysis_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                        <?php echo $dataManagementAnalysis_mont = (isset($it_category_team_output['dataManagementAnalysis_mont'])) ? $it_category_team_output['dataManagementAnalysis_mont'] : ''; ?>
                        </td>
   
                        </tr>
                         <tr>
                        <td class="tg-y698">গেম ডেভেলপমেন্ট</td>
                        <td class="tg-0pky type_1">
                        <?php echo $gameDevelopment_ps = (isset($it_category_team_output['gameDevelopment_ps'])) ? $it_category_team_output['gameDevelopment_ps'] : ''; ?>
                        </td>

                        <td class="tg-0pky type_1">
                        <?php echo $gameDevelopment_ms = (isset($it_category_team_output['gameDevelopment_ms'])) ? $it_category_team_output['gameDevelopment_ms'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                            <?php echo $gameDevelopment_cs = (isset($it_category_team_output['gameDevelopment_cs'])) ? $it_category_team_output['gameDevelopment_cs'] : ''; ?>
                        </td>
                        <td class="tg-0pky type_1">
                            <?php echo $gameDevelopment_mont = (isset($it_category_team_output['gameDevelopment_mont'])) ? $it_category_team_output['gameDevelopment_mont'] : ''; ?>
                        </td>
   
                        </tr>


                  </table><table class="tg table table-header-rotated" id="আইসিটি সেন্টার এবং প্রশিক্ষক এবং শাখার তথ্যপ্রযুক্তি রিসোর্স">
                      <tr>
                      <td class="tg-pwj7" colspan="4"><b>আইসিটি সেন্টার </b></td>
                          <td class="tg-pwj7" colspan="2"><b> প্রশিক্ষক</b></td>

                          <td class="tg-pwj7" colspan="7"><b> শাখার তথ্যপ্রযুক্তি রিসোর্স</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='আইসিটি সেন্টার এবং প্রশিক্ষক এবং শাখার তথ্যপ্রযুক্তি রিসোর্স' onclick="doit('xlsx','আইসিটি সেন্টার এবং প্রশিক্ষক এবং শাখার তথ্যপ্রযুক্তি রিসোর্স','<?php echo 'IT_আইসিটি সেন্টার এবং প্রশিক্ষক এবং শাখার তথ্যপ্রযুক্তি রিসোর্স_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($it_ictcenter_prosikkhok['id']))?$it_ictcenter_prosikkhok['id']:'';
                          
                      ?>
                      <?php
                          $pk1 = (isset($it_shakhar_totto_resource['id']))?$it_shakhar_totto_resource['id']:'';
                          
                          ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>"বর্তমান অবস্থা(আছে/নেই)"</td>
                          <td class="tg-pwj7" colspan=''> ল্যাপটপ/ ডেস্কটপ সংখ্যা</td>
                          <td class="tg-pwj7" colspan=''>ক্লাস/ ওয়ার্কশপ আয়োজন</td>
                          <td class="tg-pwj7" colspan=''>গড় উপস্থিতি</td>
                          <td class="tg-pwj7" rowspan=''>বিষয়</td>
                          <td class="tg-pwj7" colspan=''>কতজন</td>
                          <td class="tg-pwj7" colspan=''>ল্যাপটপ/ ডেস্কটপ </td>
                          <td class="tg-pwj7" colspan=''>স্মার্টফোন</td>
                          <td class="tg-pwj7" rowspan=''>পোর্টেবল হার্ডডিস্ক</td>
                          <td class="tg-pwj7" colspan=''> পেনড্রাইভ</td>
                          <td class="tg-pwj7" colspan=''>অনলাইন স্টোরেজ</td>
                          <td class="tg-pwj7" colspan=''>প্রজেক্টর</td>
                          <td class="tg-pwj7" colspan=''>ক্যামেরা</td>
                          <td class="tg-pwj7" colspan=''>পাওয়ারব্যাংক</td>
                      </tr>
                      <tr>
                         <td class="tg-0pky type_1">
                          <?php echo $it_presentyn=(isset( $it_ictcenter_prosikkhok['it_presentyn']))? $it_ictcenter_prosikkhok['it_presentyn']:'' ?>
                          </td>
                      
                          <td class="tg-0pky type_1">
                          <?php echo $it_laptopdesktop=(isset( $it_ictcenter_prosikkhok['it_laptopdesktop']))? $it_ictcenter_prosikkhok['it_laptopdesktop']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $it_classworkshoop=(isset( $it_ictcenter_prosikkhok['it_classworkshoop']))? $it_ictcenter_prosikkhok['it_classworkshoop']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $it_gor=(isset( $it_ictcenter_prosikkhok['it_gor']))? $it_ictcenter_prosikkhok['it_gor']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $pro_bisoy=(isset( $it_ictcenter_prosikkhok['pro_bisoy']))? $it_ictcenter_prosikkhok['pro_bisoy']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $pro_jon=(isset( $it_ictcenter_prosikkhok['pro_jon']))? $it_ictcenter_prosikkhok['pro_jon']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $laptopdesktop=(isset( $it_shakhar_totto_resource['laptopdesktop']))? $it_shakhar_totto_resource['laptopdesktop']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $smartphone=(isset( $it_shakhar_totto_resource['smartphone']))? $it_shakhar_totto_resource['smartphone']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $portabledisk=(isset( $it_shakhar_totto_resource['portabledisk']))? $it_shakhar_totto_resource['portabledisk']:'' ?>
                            
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $pendribe=(isset( $it_shakhar_totto_resource['pendribe']))? $it_shakhar_totto_resource['pendribe']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $onlinestorage=(isset( $it_shakhar_totto_resource['onlinestorage']))? $it_shakhar_totto_resource['onlinestorage']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $projector =(isset( $it_shakhar_totto_resource['projector']))? $it_shakhar_totto_resource['projector']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $camera=(isset( $it_shakhar_totto_resource['camera']))? $it_shakhar_totto_resource['camera']:'' ?>
                          </td>
                          <td class="tg-0pky type_1">
                          <?php echo $powerbank=(isset( $it_shakhar_totto_resource['powerbank']))? $it_shakhar_totto_resource['powerbank']:'' ?>
                          </td>

                          
                      </tr>
                      
                  </table>
                  <table class="tg table table-header-rotated" id="testTable4">
                        <tr>
                        <td class="tg-pwj7" colspan="5"><b>বিভাগীয় ওয়ার্কশপ<b></td>
                            <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'IT_প্রশিক্ষণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                        </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>

                       <td class="tg-pwj7" colspan="">ক্লাসের বিষয়  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                       <td class="tg-pwj7" colspan="">গড়</td>
  
                       
                   </tr>
                

                   <?php
                            $total_s=0;
                            $total_upthi=0;
                            ?>


                   <tr>
                       <td class="tg-y698 type_1">বেসিক কম্পিউটার 	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $bscmput_s =  (isset( $it_proshikkhon['bscmput_s']))? $it_proshikkhon['bscmput_s']:0; $total_s=$total_s+$bscmput_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $bscmput_upthi =  (isset( $it_proshikkhon['bscmput_upthi']))? $it_proshikkhon['bscmput_upthi']:0; $total_upthi=$total_upthi+$bscmput_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bscmput_s!=0)?($bscmput_upthi/$bscmput_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ফটোশপ	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $msford_s =  (isset( $it_proshikkhon['msford_s']))? $it_proshikkhon['msford_s']:0; $total_s=$total_s+ $msford_s; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $msford_upthi =  (isset( $it_proshikkhon['msford_upthi']))? $it_proshikkhon['msford_upthi']:0; $total_upthi=$total_upthi+ $msford_upthi; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msford_s!=0)?($msford_upthi/$msford_s):0?>
                       </td>
                      
                       
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">বেসিক মোবাইল (অ্যান্ড্রোয়েড) 	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $bsmobile_s =  (isset( $it_proshikkhon['bsmobile_s']))? $it_proshikkhon['bsmobile_s']:0; $total_s=$total_s+ $bsmobile_s; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $bsmobile_upthi =  (isset( $it_proshikkhon['bsmobile_upthi']))? $it_proshikkhon['bsmobile_upthi']:0; $total_upthi=$total_upthi+$bsmobile_upthi; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsmobile_s!=0)?($bsmobile_upthi/$bsmobile_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ইলাস্ট্রেটর	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $eltt_s =  (isset( $it_proshikkhon['eltt_s']))? $it_proshikkhon['eltt_s']:0; $total_s=$total_s+ $eltt_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $eltt_upthi =  (isset( $it_proshikkhon['eltt_upthi']))? $it_proshikkhon['eltt_upthi']:0; $total_upthi=$total_upthi+ $eltt_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($eltt_s!=0)?($eltt_upthi/$eltt_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">মাইক্রোসফট ওয়ার্ড/গুগল ডক</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $msword_s =  (isset( $it_proshikkhon['msword_s']))? $it_proshikkhon['msword_s']:0; $total_s=$total_s+$msword_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $msword_upthi =  (isset( $it_proshikkhon['msword_upthi']))? $it_proshikkhon['msword_upthi']:0; $total_upthi=$total_upthi+$msword_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msword_s!=0)?($msword_upthi/$msword_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ভিডিও এডিটিং	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $video_s =  (isset( $it_proshikkhon['video_s']))? $it_proshikkhon['video_s']:0; $total_s=$total_s+ $video_s; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $video_upthi =  (isset( $it_proshikkhon['video_upthi']))? $it_proshikkhon['video_upthi']:0; $total_upthi=$total_upthi+$video_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($video_s!=0)?($video_upthi/$video_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">এক্সেল/ স্প্রেডশীট</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $msfexl_s =  (isset( $it_proshikkhon['msfexl_s']))? $it_proshikkhon['msfexl_s']:0; $total_s=$total_s+  $msfexl_s; ?>
                        
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $msfexl_upthi =  (isset( $it_proshikkhon['msfexl_upthi']))? $it_proshikkhon['msfexl_upthi']:0; $total_upthi=$total_upthi+ $msfexl_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($msfexl_s!=0)?($msfexl_upthi/$msfexl_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> ওয়েব ডেভেলপমেন্ট	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $web_s =  (isset( $it_proshikkhon['web_s']))? $it_proshikkhon['web_s']:0; $total_s=$total_s+$web_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $web_upthi =  (isset( $it_proshikkhon['web_upthi']))? $it_proshikkhon['web_upthi']:0; $total_upthi=$total_upthi+$web_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($web_s!=0)?($web_upthi/$web_s):0?>
                       </td>
                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1">  পাওয়ারপয়েন্ট/ স্লাইড</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $pwrp_s =  (isset( $it_proshikkhon['pwrp_s']))? $it_proshikkhon['pwrp_s']:0; $total_s=$total_s+ $pwrp_s; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $pwrp_upthi =  (isset( $it_proshikkhon['pwrp_upthi']))? $it_proshikkhon['pwrp_upthi']:0; $total_upthi=$total_upthi+ $pwrp_upthi; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($pwrp_s!=0)?($pwrp_upthi/$pwrp_s):0?>
                       </td>

                       <td class="tg-y698 type_1"> অ্যাপ ডেভেলপমেন্ট  </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $apsdpm_s =  (isset( $it_proshikkhon['apsdpm_s']))? $it_proshikkhon['apsdpm_s']:0; $total_s=$total_s+$apsdpm_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $apsdpm_upthi =  (isset( $it_proshikkhon['apsdpm_upthi']))? $it_proshikkhon['apsdpm_upthi']:0; $total_upthi=$total_upthi+$apsdpm_upthi ; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($apsdpm_s!=0)?($apsdpm_upthi/$apsdpm_s):0?>
                       </td>
                      
                       
                   </tr>

                   <tr>
                     <td class="tg-y698 type_1"> অনলাইন নীতিমালা	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $onlineni_s =  (isset( $it_proshikkhon['onlineni_s']))? $it_proshikkhon['onlineni_s']:0; $total_s=$total_s+ $onlineni_s; ?>
                    
                           
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $onlineni_upthi =  (isset( $it_proshikkhon['onlineni_upthi']))? $it_proshikkhon['onlineni_upthi']:0; $total_upthi=$total_upthi+ $onlineni_upthi; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlineni_s!=0)?($onlineni_upthi/$onlineni_s):0?>
                       </td>
                       <td class="tg-y698 type_1">হার্ডওয়্যার সংক্রান্ত		</td>
                        <td class="tg-0pky  type_9">
                        <?php echo $hardware_s = (isset($it_proshikkhon['hardware_s'])) ? $it_proshikkhon['hardware_s'] : 0; $total_s = $total_s + $hardware_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $hardware_upthi = (isset($it_proshikkhon['hardware_upthi'])) ? $it_proshikkhon['hardware_upthi'] : 0; $total_upthi = $total_upthi + $hardware_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($hardware_s != 0) ? ($hardware_upthi / $hardware_s) : 0 ?>
                        </td>


                      
                       
                   </tr>

                   <tr>
                   <td class="tg-y698 type_1"> অনলাইন নিরাপত্তা	</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $onlinept_s =  (isset( $it_proshikkhon['onlinept_s']))? $it_proshikkhon['onlinept_s']:0; $total_s=$total_s+$onlinept_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $onlinept_upthi =  (isset( $it_proshikkhon['onlinept_upthi']))? $it_proshikkhon['onlinept_upthi']:0; $total_upthi=$total_upthi+ $onlinept_upthi; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($onlinept_s!=0)?($onlinept_upthi/$onlinept_s):0?>
                       </td>
                       <td class="tg-y698 type_1">প্রোগ্রামিং 	</td>
                        <td class="tg-0pky  type_9">
                        <?php echo $programing_s = (isset($it_proshikkhon['programing_s'])) ? $it_proshikkhon['programing_s'] : 0; $total_s = $total_s + $programing_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $programing_upthi = (isset($it_proshikkhon['programing_upthi'])) ? $it_proshikkhon['programing_upthi'] : 0; $total_upthi = $total_upthi + $programing_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($programing_s != 0) ? ($programing_upthi / $programing_s) : 0 ?>
                        </td>

                       
                   </tr>
                   <tr>
                   <td class="tg-y698 type_1">ইন্টারনেট সংক্রান্ত</td>
                       <td class="tg-0pky  type_9">
                       <?php echo $bsicint_s =  (isset( $it_proshikkhon['bsicint_s']))? $it_proshikkhon['bsicint_s']:0; $total_s=$total_s+$bsicint_s ; ?>
                        </td>
                       <td class="tg-0pky  type_9">
                       <?php echo $bsicint_upthi =  (isset( $it_proshikkhon['bsicint_upthi']))? $it_proshikkhon['bsicint_upthi']:0; $total_upthi=$total_upthi+ $bsicint_upthi; ?>
                        </td>
                       <td class="tg-0pky  type_1">
                       <?php echo ($bsicint_s!=0)?($bsicint_upthi/$bsicint_s):0?>
                       </td>
                       <td class="tg-y698 type_1">মোবাইল ডিজাইন </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $mobiledesign_s = (isset($it_proshikkhon['mobiledesign_s'])) ? $it_proshikkhon['mobiledesign_s'] : 0; $total_s = $total_s + $mobiledesign_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $mobiledesign_upthi = (isset($it_proshikkhon['mobiledesign_upthi'])) ? $it_proshikkhon['mobiledesign_upthi'] : 0; $total_upthi = $total_upthi + $mobiledesign_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($mobiledesign_s != 0) ? ($mobiledesign_upthi / $mobiledesign_s) : 0 ?>
                        </td>


                       
                   </tr>

                   <tr>
                   <td class="tg-y698 type_1"><!-- গুগল ফর্ম  -->অনলাইন ফর্ম	</td>
                    <td class="tg-0pky  type_9">
                    <?php echo $googleform_s = (isset($it_proshikkhon['googleform_s'])) ? $it_proshikkhon['googleform_s'] : 0; $total_s = $total_s + $googleform_s; ?>
                    </td>
                    <td class="tg-0pky  type_9">
                    <?php echo $googleform_upthi = (isset($it_proshikkhon['googleform_upthi'])) ? $it_proshikkhon['googleform_upthi'] : 0; $total_upthi = $total_upthi + $googleform_upthi; ?>
                    </td>
                    <td class="tg-0pky  type_1">
                        <?php echo ($googleform_s != 0) ? ($googleform_upthi / $googleform_s) : 0 ?>
                    </td>

                    <td class="tg-y698 type_1">মোবাইল ভিডিও এডিটিং</td>
                        <td class="tg-0pky  type_9">
                        <?php echo $mobileve_s = (isset($it_proshikkhon['mobileve_s'])) ? $it_proshikkhon['mobileve_s'] : 0; $total_s = $total_s + $mobileve_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $mobileve_upthi = (isset($it_proshikkhon['mobileve_upthi'])) ? $it_proshikkhon['mobileve_upthi'] : 0; $total_upthi = $total_upthi + $mobileve_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($mobileve_s != 0) ? ($mobileve_upthi / $mobileve_s) : 0 ?>
                        </td>


                   </tr>

                   <tr>
                   <td class="tg-y698 type_1"> পিডিএফ কাস্টমাইজেশন</td>
                    <td class="tg-0pky  type_9">
                    <?php echo $pdf_s = (isset($it_proshikkhon['pdf_s'])) ? $it_proshikkhon['pdf_s'] : 0; $total_s = $total_s + $pdf_s; ?>
                    </td>
                    <td class="tg-0pky  type_9">
                    <?php echo $pdf_upthi = (isset($it_proshikkhon['pdf_upthi'])) ? $it_proshikkhon['pdf_upthi'] : 0; $total_upthi = $total_upthi + $pdf_upthi; ?>
                    </td>
                    <td class="tg-0pky  type_1">
                        <?php echo ($pdf_s != 0) ? ($pdf_upthi / $pdf_s) : 0 ?>
                    </td>
                    <td class="tg-y698 type_1">উইন্ডোজ ট্রাবলশুটিং	</td>
                        <td class="tg-0pky  type_9">
                        <?php echo $windows_s = (isset($it_proshikkhon['windows_s'])) ? $it_proshikkhon['windows_s'] : 0; $total_s = $total_s + $windows_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $windows_upthi = (isset($it_proshikkhon['windows_upthi'])) ? $it_proshikkhon['windows_upthi'] : 0; $total_upthi = $total_upthi + $windows_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($windows_s != 0) ? ($windows_upthi / $windows_s) : 0 ?>
                        </td>


                   </tr>
                    <tr>
                   <td class="tg-y698 type_1"> টাস্ক ম্যানেজমেন্ট টুলস</td>
                    <td class="tg-0pky  type_9">
                    <?php echo $taskManagementTool_s = (isset($it_proshikkhon['taskManagementTool_s'])) ? $it_proshikkhon['taskManagementTool_s'] : 0; $total_s = $total_s + $taskManagementTool_s; ?>
                    </td>
                    <td class="tg-0pky  type_9">
                    <?php echo $taskManagementTool_upthi = (isset($it_proshikkhon['taskManagementTool_upthi'])) ? $it_proshikkhon['taskManagementTool_upthi'] : 0; $total_upthi = $total_upthi + $taskManagementTool_upthi; ?>
                    </td>
                    <td class="tg-0pky  type_1">
                        <?php echo ($taskManagementTool_s != 0) ? ($taskManagementTool_upthi / $taskManagementTool_s) : 0 ?>
                    </td>
                    <td class="tg-y698 type_1">টাইপিং স্কিল	</td>
                        <td class="tg-0pky  type_9">
                        <?php echo $typingSkill_s = (isset($it_proshikkhon['typingSkill_s'])) ? $it_proshikkhon['typingSkill_s'] : 0; $total_s = $total_s + $typingSkill_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $typingSkill_upthi = (isset($it_proshikkhon['typingSkill_upthi'])) ? $it_proshikkhon['typingSkill_upthi'] : 0; $total_upthi = $total_upthi + $typingSkill_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($typingSkill_s != 0) ? ($typingSkill_upthi / $typingSkill_s) : 0 ?>
                        </td>


                   </tr>
                    <tr>
                   <td class="tg-y698 type_1"> এআই ও এর ব্যবহার</td>
                    <td class="tg-0pky  type_9">
                    <?php echo $AiUse_s = (isset($it_proshikkhon['AiUse_s'])) ? $it_proshikkhon['AiUse_s'] : 0; $total_s = $total_s + $AiUse_s; ?>
                    </td>
                    <td class="tg-0pky  type_9">
                    <?php echo $AiUse_upthi = (isset($it_proshikkhon['AiUse_upthi'])) ? $it_proshikkhon['AiUse_upthi'] : 0; $total_upthi = $total_upthi + $AiUse_upthi; ?>
                    </td>
                    <td class="tg-0pky  type_1">
                        <?php echo ($AiUse_s != 0) ? ($AiUse_upthi / $AiUse_s) : 0 ?>
                    </td>
                    <td class="tg-y698 type_1">টেক ক্যারিয়ার	</td>
                        <td class="tg-0pky  type_9">
                        <?php echo $techCareer_s = (isset($it_proshikkhon['techCareer_s'])) ? $it_proshikkhon['techCareer_s'] : 0; $total_s = $total_s + $techCareer_s; ?>
                        </td>
                        <td class="tg-0pky  type_9">
                        <?php echo $techCareer_upthi = (isset($it_proshikkhon['techCareer_upthi'])) ? $it_proshikkhon['techCareer_upthi'] : 0; $total_upthi = $total_upthi + $techCareer_upthi; ?>
                        </td>
                        <td class="tg-0pky  type_1">
                            <?php echo ($techCareer_s != 0) ? ($techCareer_upthi / $techCareer_s) : 0 ?>
                        </td>


                   </tr>
                  
                 
                
                   <tr>
         
                       <td class="tg-y698 type_1" colspan="5"> মোট	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $total_s; ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $total_upthi; ?>
                       </td>
                       <td class="tg-0pky  type_1">
                        <?php echo ($total_upthi!=0 && $total_s!=0)?round(($total_upthi/$total_s),2):0?>
                       </td>
                      
                       
                   </tr>
                 
                  

                        </table>
                        
        

                    <table class="tg table table-header-rotated" id="কাজের বিবরণ">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>কাজের বিবরণ</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='কাজের বিবরণ' onclick="doit('xlsx','কাজের বিবরণ','<?php echo 'IT_কাজের বিবরণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($it_kajer_biboron['id']))?$it_kajer_biboron['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''> বিষয় </td>
                          <td class="tg-pwj7" colspan=''>মোট সংখ্যা</td>
                          <td class="tg-pwj7" colspan=''> বিষয় </td>
                          <td class="tg-pwj7" colspan=''>মোট সংখ্যা</td>
                      </tr>
                      <tr>
                      <td class="tg-y698">ওয়ার্ড ডকুমেন্ট</td>
                        <td class="tg-0pky type_1">
                        <?php echo $oard_s = (isset($it_kajer_biboron['oard_s'])) ? $it_kajer_biboron['oard_s'] : '0'; ?>
                        </td>

                        <td class="tg-y698">পোস্টার</td>
                        <td class="tg-0pky type_1">
                        <?php echo $poster_s = (isset($it_kajer_biboron['poster_s'])) ? $it_kajer_biboron['poster_s'] : '0'; ?>
                        </td>

                      </tr>
                      <tr>
                      <td class="tg-y698">এক্সেল ফাইল</td>
                        <td class="tg-0pky type_1">
                        <?php echo $exel_s = (isset($it_kajer_biboron['exel_s'])) ? $it_kajer_biboron['exel_s'] : '0'; ?>
                        </td>

                        <td class="tg-y698"> ব্যানার </td>
                        <td class="tg-0pky type_1">
                        <?php echo $banner_s = (isset($it_kajer_biboron['banner_s'])) ? $it_kajer_biboron['banner_s'] : '0'; ?>
                        </td>


                      </tr>
                      <tr>
                      <td class="tg-y698">পাওয়ারপয়েন্ট প্রেজেন্টেশন	</td>
                        <td class="tg-0pky type_1">
                        <?php echo $powerpoint_s = (isset($it_kajer_biboron['powerpoint_s'])) ? $it_kajer_biboron['powerpoint_s'] : '0'; ?>
                        </td>

                        <td class="tg-y698"> ভিডিও </td>
                        <td class="tg-0pky type_1">
                        <?php echo $video_s = (isset($it_kajer_biboron['video_s'])) ? $it_kajer_biboron['video_s'] : '0'; ?>
                        </td>
                      </tr>
                     
                       <tr>
                       <td class="tg-y698">পিডিএফ কাস্টমাইজেশন	</td>
                            <td class="tg-0pky type_1">
                            <?php echo $pdf_s = (isset($it_kajer_biboron['pdf_s'])) ? $it_kajer_biboron['pdf_s'] : '0'; ?>
                            </td>

                            <td class="tg-y698"> ওয়েবসাইট ডেভেলপমেন্ট		</td>
                            <td class="tg-0pky type_1">
                            <?php echo $web_s = (isset($it_kajer_biboron['web_s'])) ? $it_kajer_biboron['web_s'] : '0'; ?>
                            </td>
                       </tr>
                      

                       <tr>
                       <td class="tg-y698"><!-- গুগল ফরম --> অনলাইন ফরম	</td>
                            <td class="tg-0pky type_1">
                            <?php echo $google_s = (isset($it_kajer_biboron['google_s'])) ? $it_kajer_biboron['google_s'] : '0'; ?>
                            </td>

                            <td class="tg-y698">  সার্ভিসিং			</td>
                            <td class="tg-0pky type_1">
                            <?php echo $servicing_s = (isset($it_kajer_biboron['servicing_s'])) ? $it_kajer_biboron['servicing_s'] : '0'; ?>
                            </td>
                       </tr>
                       <tr>
                           <td class="tg-y698">টেক ম্যাটেরিয়ালস	</td>
                           <td class="tg-0pky type_1">
                               <?php echo $techMaterial_s = (isset($it_kajer_biboron['techMaterial_s'])) ? $it_kajer_biboron['techMaterial_s'] : '0'; ?>
                           </td>

                           <td class="tg-y698"> সিকিউরিটি		</td>
                           <td class="tg-0pky type_1">
                               <?php echo $security_s = (isset($it_kajer_biboron['security_s'])) ? $it_kajer_biboron['security_s'] : '0'; ?>
                           </td>
                       </tr>

                  </table>
                  <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'IT_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr> 
                        <tr>
                            <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                            <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                            <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                            <td class="tg-pwj7" colspan=''>গড়</td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_central_s=$it_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$it_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$it_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$it_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$it_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$it_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$it_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$it_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                            {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                    </table>
                   

                    </div>


                  
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
