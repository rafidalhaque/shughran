<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সোশ্যাল মিডিয়া বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : ''), 'ষান্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষান্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/it-bivag_sm' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষান্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/it-bivag_sm') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/it-bivag_sm/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="জনশক্তি ও রিসোর্স">
                            <tr>
                            <td class="tg-pwj7" colspan="8"><b>জনশক্তি ও রিসোর্স<b></td>
                                <td class="tg-pwj7" colspan="2">
                                    <a href="#" id='জনশক্তি ও রিসোর্স' onclick="doit('xlsx','জনশক্তি ও রিসোর্স','<?php echo 'SAM_জনশক্তি ও রিসোর্স_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        
                            <tr>
                            <td class="tg-pwj7" rowspan="2">জনশক্তি</td>
                            <td class="tg-pwj7 " rowspan="2"><div><span>সংখ্যা</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফেসবুক ক্যাম্পেইন করেন</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>টুইটার ক্যাম্পেইন করেন</span></div></td>
                                <td class="tg-pwj7 "rowspan="2"><div><span>উইকিপিডিয়াতে লিখেন</span></div></td>
                                <td class="tg-pwj7" colspan="2">নিয়মিত ব্লগ লিখেন</td>
                                <td class="tg-pwj7" rowspan="2">ভ্লগিং করেন</td>
                                <td class="tg-pwj7" rowspan="2">ফেসবুক পেইজ/গ্রুপ পরিচালনা করেন</td>
                                <td class="tg-pwj7" rowspan="2">ইউটিউব চ্যানেল পরিচালনা করেন</td>
                                
                            </tr>
                            <tr>
                            <td class="tg-pwj7 "><div><span>  বাংলা</span></div></td>
                                <td class="tg-pwj7 "><div><span> ইংরেজি</span></div></td>
                            </tr>
                           


                            <?php
                            $pk = (isset($sm_jonosokti['id']))?$sm_jonosokti['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                 <td class="tg-0pky  type_1">
                                 <?php echo $m_s =  (isset( $sm_jonosokti['m_s']))? $sm_jonosokti['m_s']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_fc =  (isset( $sm_jonosokti['m_fc']))? $sm_jonosokti['m_fc']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_tc =  (isset( $sm_jonosokti['m_tc']))? $sm_jonosokti['m_tc']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_wi =  (isset( $sm_jonosokti['m_wi']))? $sm_jonosokti['m_wi']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_bb =  (isset( $sm_jonosokti['m_bb']))? $sm_jonosokti['m_bb']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_be =  (isset( $sm_jonosokti['m_be']))? $sm_jonosokti['m_be']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_bng =  (isset( $sm_jonosokti['m_bng']))? $sm_jonosokti['m_bng']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_fgp =  (isset( $sm_jonosokti['m_fgp']))? $sm_jonosokti['m_fgp']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $m_up =  (isset( $sm_jonosokti['m_up']))? $sm_jonosokti['m_up']:0; ?>

                                </td>
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_s =  (isset( $sm_jonosokti['a_s']))? $sm_jonosokti['a_s']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_fc =  (isset( $sm_jonosokti['a_fc']))? $sm_jonosokti['a_fc']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_tc =  (isset( $sm_jonosokti['a_tc']))? $sm_jonosokti['a_tc']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_wi =  (isset( $sm_jonosokti['a_wi']))? $sm_jonosokti['a_wi']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_bb =  (isset( $sm_jonosokti['a_bb']))? $sm_jonosokti['a_bb']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_be =  (isset( $sm_jonosokti['a_be']))? $sm_jonosokti['a_be']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_bng =  (isset( $sm_jonosokti['a_bng']))? $sm_jonosokti['a_bng']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_fgp =  (isset( $sm_jonosokti['a_fgp']))? $sm_jonosokti['a_fgp']:0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $a_up =  (isset( $sm_jonosokti['a_up']))? $sm_jonosokti['a_up']:0; ?>

                                </td>

                               
                                
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_s = (isset($sm_jonosokti['w_s'])) ? $sm_jonosokti['w_s'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_fc = (isset($sm_jonosokti['w_fc'])) ? $sm_jonosokti['w_fc'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_tc = (isset($sm_jonosokti['w_tc'])) ? $sm_jonosokti['w_tc'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_wi = (isset($sm_jonosokti['w_wi'])) ? $sm_jonosokti['w_wi'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_bb = (isset($sm_jonosokti['w_bb'])) ? $sm_jonosokti['w_bb'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_be = (isset($sm_jonosokti['w_be'])) ? $sm_jonosokti['w_be'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_bng = (isset($sm_jonosokti['w_bng'])) ? $sm_jonosokti['w_bng'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_fgp = (isset($sm_jonosokti['w_fgp'])) ? $sm_jonosokti['w_fgp'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $w_up = (isset($sm_jonosokti['w_up'])) ? $sm_jonosokti['w_up'] : 0; ?>

                                </td>

                               

                               
                            </tr>
                            <tr>
                                <td class="tg-y698">মোট </td>
                                <td class="tg-0pky">
                                    <?php echo ($m_s+$a_s+$w_s)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_fc+$a_fc+$w_fc)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_tc+$a_tc+$w_tc)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_wi+$m_wi+$w_wi)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_bb+$a_bb+$w_bb)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_be+$a_be+$w_be)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_bng+$a_bng+$w_bng)?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($m_fgp+$a_fgp+$w_fgp)?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($m_up+$a_up+$w_up)?>
                                </td>

                               
                              
                            </tr>

                            

                        </table>
                        <table class="tg table table-header-rotated" id="সোশ্যাল মিডিয়া টিম">
                            <tr>
                           
                                <td class="tg-pwj7" colspan="5">
                                    <a href="#" id='সোশ্যাল মিডিয়া টিম' onclick="doit('xlsx','সোশ্যাল মিডিয়া টিম','<?php echo 'SAM_সোশ্যাল মিডিয়া টিম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        
                            <tr>
                            <td class="tg-pwj7" rowspan="2" >সোশ্যাল মিডিয়া টিম</td>
                            <td class="tg-pwj7 " colspan="2" ><div><span>আছে কিনা?</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>টিম সদস্য</span></div></td>
                                <td class="tg-pwj7 "  rowspan="2"><div><span>প্রোগ্রাম বাস্তবায়ন	</span></div></td>
                               
                                
                            </tr>
                           <tr>
                           <td class="tg-pwj7" >হ্যাঁ </td>
                           <td class="tg-pwj7"  >না </td>
                           </tr>

                            <?php
                            $pk = (isset($sm_social_meadia_team['id']))?$sm_social_meadia_team['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> ফেসবুক</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $f_yn_yes= (isset($sm_social_meadia_team['f_yn_yes'])) ? $sm_social_meadia_team['f_yn_yes'] : ''; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $f_yn_no= (isset($sm_social_meadia_team['f_yn_no'])) ? $sm_social_meadia_team['f_yn_no'] : ''; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $f_ts= (isset($sm_social_meadia_team['f_ts'])) ? $sm_social_meadia_team['f_ts'] : 0; ?>

                                </td>


                                <td class="tg-0pky  type_1">
                                <?php echo $f_pb= (isset($sm_social_meadia_team['f_pb'])) ? $sm_social_meadia_team['f_pb'] : 0; ?>

                                </td>
                                
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1"> টুইটার	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $tw_yn_yes = (isset($sm_social_meadia_team['tw_yn_yes'])) ? $sm_social_meadia_team['tw_yn_yes'] : ''; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $tw_yn_no = (isset($sm_social_meadia_team['tw_yn_no'])) ? $sm_social_meadia_team['tw_yn_no'] : ''; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $tw_ts = (isset($sm_social_meadia_team['tw_ts'])) ? $sm_social_meadia_team['tw_ts'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $tw_pb = (isset($sm_social_meadia_team['tw_pb'])) ? $sm_social_meadia_team['tw_pb'] : 0; ?>

                                </td>

                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> লেখালেখি/ব্লগ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $le_yn_yes = (isset($sm_social_meadia_team['le_yn_yes'])) ? $sm_social_meadia_team['le_yn_yes'] : ''; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $le_yn_no = (isset($sm_social_meadia_team['le_yn_no'])) ? $sm_social_meadia_team['le_yn_no'] : ''; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $le_ts = (isset($sm_social_meadia_team['le_ts'])) ? $sm_social_meadia_team['le_ts'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $le_pb = (isset($sm_social_meadia_team['le_pb'])) ? $sm_social_meadia_team['le_pb'] : 0; ?>

                                </td>

                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> ভ্লগ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $vu_yn_yes = (isset($sm_social_meadia_team['vu_yn_yes'])) ? $sm_social_meadia_team['vu_yn_yes'] : ''; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $vu_yn_no = (isset($sm_social_meadia_team['vu_yn_no'])) ? $sm_social_meadia_team['vu_yn_no'] : ''; ?>

                                </td>


                                <td class="tg-0pky  type_1">
                                <?php echo $vu_ts = (isset($sm_social_meadia_team['vu_ts'])) ? $sm_social_meadia_team['vu_ts'] : 0; ?>

                                </td>

                                <td class="tg-0pky  type_1">
                                <?php echo $vu_pb = (isset($sm_social_meadia_team['vu_pb'])) ? $sm_social_meadia_team['vu_pb'] : 0; ?>

                                </td>

                                
                                
                            </tr>
                           

                            

                        </table>
                        <table class="tg table table-header-rotated" id="শাখার অনলাইন রিসোর্স">
                            <tr>
                              
                                  <td class="tg-pwj7" colspan="9" >শাখার অনলাইন রিসোর্স	</td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='শাখার অনলাইন রিসোর্স' onclick="doit('xlsx','শাখার অনলাইন রিসোর্স','<?php echo 'SAM_শাখার অনলাইন রিসোর্স_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        
                            <tr>
                                <td class="tg-pwj7" >বিষয়</td>
                                <td class="tg-pwj7 " ><div><span>ওয়েবসাইট</span></div></td>
                                <td class="tg-pwj7 " ><div><span>ফেসবুক একাউন্ট</span></div></td>
                                <td class="tg-pwj7 " ><div><span>ফেসবুক পেইজ</span></div></td>
                                <td class="tg-pwj7" >ফেসবুক গ্রুপ</td>
                                <td class="tg-pwj7 " ><div><span>টুইটার</span></div></td>
                                <td class="tg-pwj7 " ><div><span>ইন্সটাগ্রাম  </span></div></td>
                                <td class="tg-pwj7 " ><div><span>ইউটিউব</span></div></td>
                                <td class="tg-pwj7 " ><div><span>মেইল</span></div></td>
                                <td class="tg-pwj7 " ><div><span>অন্যান্য স্যোশাল মিডিয়া</span></div></td>
                                
                            </tr>
                           

                            <?php
                            $pk = (isset($sm_shakhar_online_resourse['id']))?$sm_shakhar_online_resourse['id']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> সংখ্যা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_web = (isset($sm_shakhar_online_resourse['so_web'])) ? $sm_shakhar_online_resourse['so_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_fa = (isset($sm_shakhar_online_resourse['so_fa'])) ? $sm_shakhar_online_resourse['so_fa'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_fp= (isset($sm_shakhar_online_resourse['so_fp'])) ? $sm_shakhar_online_resourse['so_fp'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_fg = (isset($sm_shakhar_online_resourse['so_fg'])) ? $sm_shakhar_online_resourse['so_fg'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_tw = (isset($sm_shakhar_online_resourse['so_tw'])) ? $sm_shakhar_online_resourse['so_tw'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_in = (isset($sm_shakhar_online_resourse['so_in'])) ? $sm_shakhar_online_resourse['so_in'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_you = (isset($sm_shakhar_online_resourse['so_you'])) ? $sm_shakhar_online_resourse['so_you'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_ma = (isset($sm_shakhar_online_resourse['so_ma'])) ? $sm_shakhar_online_resourse['so_ma'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $so_ot = (isset($sm_shakhar_online_resourse['so_ot'])) ? $sm_shakhar_online_resourse['so_ot'] : 0; ?>

                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> বৃদ্ধি</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $bri_web = (isset($sm_shakhar_online_resourse['bri_web'])) ? $sm_shakhar_online_resourse['bri_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_fa = (isset($sm_shakhar_online_resourse['bri_fa'])) ? $sm_shakhar_online_resourse['bri_fa'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_fp = (isset($sm_shakhar_online_resourse['bri_fp'])) ? $sm_shakhar_online_resourse['bri_fp'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_fg = (isset($sm_shakhar_online_resourse['bri_fg'])) ? $sm_shakhar_online_resourse['bri_fg'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_tw = (isset($sm_shakhar_online_resourse['bri_tw'])) ? $sm_shakhar_online_resourse['bri_tw'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_in = (isset($sm_shakhar_online_resourse['bri_in'])) ? $sm_shakhar_online_resourse['bri_in'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_you = (isset($sm_shakhar_online_resourse['bri_you'])) ? $sm_shakhar_online_resourse['bri_you'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_ma = (isset($sm_shakhar_online_resourse['bri_ma'])) ? $sm_shakhar_online_resourse['bri_ma'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bri_ot = (isset($sm_shakhar_online_resourse['bri_ot'])) ? $sm_shakhar_online_resourse['bri_ot'] : 0; ?>

                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">ঘাটতি</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $gha_web = (isset($sm_shakhar_online_resourse['gha_web'])) ? $sm_shakhar_online_resourse['gha_web'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_fa = (isset($sm_shakhar_online_resourse['gha_fa'])) ? $sm_shakhar_online_resourse['gha_fa'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_fp = (isset($sm_shakhar_online_resourse['gha_fp'])) ? $sm_shakhar_online_resourse['gha_fp'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_fg = (isset($sm_shakhar_online_resourse['gha_fg'])) ? $sm_shakhar_online_resourse['gha_fg'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_tw = (isset($sm_shakhar_online_resourse['gha_tw'])) ? $sm_shakhar_online_resourse['gha_tw'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_in = (isset($sm_shakhar_online_resourse['gha_in'])) ? $sm_shakhar_online_resourse['gha_in'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_you = (isset($sm_shakhar_online_resourse['gha_you'])) ? $sm_shakhar_online_resourse['gha_you'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_ma = (isset($sm_shakhar_online_resourse['gha_ma'])) ? $sm_shakhar_online_resourse['gha_ma'] : 0; ?>

                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <?php echo $gha_ot = (isset($sm_shakhar_online_resourse['gha_ot'])) ? $sm_shakhar_online_resourse['gha_ot'] : 0; ?>

                                    </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1">একটিভ</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_web = (isset($sm_shakhar_online_resourse['act_web'])) ? $sm_shakhar_online_resourse['act_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_fa = (isset($sm_shakhar_online_resourse['act_fa'])) ? $sm_shakhar_online_resourse['act_fa'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_fp = (isset($sm_shakhar_online_resourse['act_fp'])) ? $sm_shakhar_online_resourse['act_fp'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_fg = (isset($sm_shakhar_online_resourse['act_fg'])) ? $sm_shakhar_online_resourse['act_fg'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_tw = (isset($sm_shakhar_online_resourse['act_tw'])) ? $sm_shakhar_online_resourse['act_tw'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_in = (isset($sm_shakhar_online_resourse['act_in'])) ? $sm_shakhar_online_resourse['act_in'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_you = (isset($sm_shakhar_online_resourse['act_you'])) ? $sm_shakhar_online_resourse['act_you'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_ma = (isset($sm_shakhar_online_resourse['act_ma'])) ? $sm_shakhar_online_resourse['act_ma'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $act_ot = (isset($sm_shakhar_online_resourse['act_ot'])) ? $sm_shakhar_online_resourse['act_ot'] : 0; ?>

                                </td>

                                
                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> ইন একটিভ</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $inact_web = (isset($sm_shakhar_online_resourse['inact_web'])) ? $sm_shakhar_online_resourse['inact_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_fa = (isset($sm_shakhar_online_resourse['inact_fa'])) ? $sm_shakhar_online_resourse['inact_fa'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_fp = (isset($sm_shakhar_online_resourse['inact_fp'])) ? $sm_shakhar_online_resourse['inact_fp'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_fg = (isset($sm_shakhar_online_resourse['inact_fg'])) ? $sm_shakhar_online_resourse['inact_fg'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_tw = (isset($sm_shakhar_online_resourse['inact_tw'])) ? $sm_shakhar_online_resourse['inact_tw'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_in = (isset($sm_shakhar_online_resourse['inact_in'])) ? $sm_shakhar_online_resourse['inact_in'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_you = (isset($sm_shakhar_online_resourse['inact_you'])) ? $sm_shakhar_online_resourse['inact_you'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_ma = (isset($sm_shakhar_online_resourse['inact_ma'])) ? $sm_shakhar_online_resourse['inact_ma'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $inact_ot = (isset($sm_shakhar_online_resourse['inact_ot'])) ? $sm_shakhar_online_resourse['inact_ot'] : 0; ?>

                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698 type_1"> পূর্ণাঙ্গ এক্সেস আছে</td>

                                <td class="tg-0pky  type_1">
                                <?php echo $pa_web = (isset($sm_shakhar_online_resourse['pa_web'])) ? $sm_shakhar_online_resourse['pa_web'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_fa = (isset($sm_shakhar_online_resourse['pa_fa'])) ? $sm_shakhar_online_resourse['pa_fa'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_fp = (isset($sm_shakhar_online_resourse['pa_fp'])) ? $sm_shakhar_online_resourse['pa_fp'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_fg = (isset($sm_shakhar_online_resourse['pa_fg'])) ? $sm_shakhar_online_resourse['pa_fg'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_tw = (isset($sm_shakhar_online_resourse['pa_tw'])) ? $sm_shakhar_online_resourse['pa_tw'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_in = (isset($sm_shakhar_online_resourse['pa_in'])) ? $sm_shakhar_online_resourse['pa_in'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_you = (isset($sm_shakhar_online_resourse['pa_you'])) ? $sm_shakhar_online_resourse['pa_you'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_ma = (isset($sm_shakhar_online_resourse['pa_ma'])) ? $sm_shakhar_online_resourse['pa_ma'] : 0; ?>

                                </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pa_ot = (isset($sm_shakhar_online_resourse['pa_ot'])) ? $sm_shakhar_online_resourse['pa_ot'] : 0; ?>

                                </td>

                                
                            </tr>


                          

                        </table>
                       
                       

                  <table class="tg table table-header-rotated" id="অফিসিয়াল প্লাটফর্ম">
                        <tr>
                                <td class="tg-pwj7" colspan="16">
                                    <a href="#" id='অফিসিয়াল প্লাটফর্ম' onclick="doit('xlsx','অফিসিয়াল প্লাটফর্ম','<?php echo 'SM_অফিসিয়াল প্লাটফর্ম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        <tr>
                                <td class="tg-pwj7" rowspan="5">অফিসিয়াল প্লাটফর্ম</td>
                                <td class="tg-pwj7" colspan="5" style="border-bottom: hidden;"> ফেসবুক পেইজ </td>
                                <td class="tg-pwj7" colspan="5"style="border-bottom: hidden;">ইউটিউব চ্যানেল</td>
                               
                                <td class="tg-pwj7" colspan="5"> টুইটার	</td>
                                
                            </tr>
                            <tr>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফলোয়ার সংখ্য </span></div></td>
                                <td class="tg-pwj7 " colspan="2"><div><span>একটিভ আছে কিনা?</span></div></td>
                                <td class="tg-pwj7 " colspan="2"><div><span>এক্সেস আছে কিনা?</span></div></td>

                                <td class="tg-pwj7 " rowspan="2"><div><span>সাবস্ক্রাইবার সংখ্যা </span></div></td>
                                <td class="tg-pwj7 " colspan="2"><div><span>একটিভ আছে কিনা?</span></div></td>
                                <td class="tg-pwj7 "colspan="2"><div><span>এক্সেস আছে কিনা?</span></div></td>
                                <td class="tg-pwj7 " rowspan="2"><div><span>ফলোয়ার সংখ্য </span></div></td>

                                <td class="tg-pwj7 "colspan="2"><div><span>একটিভ আছে কিনা?</span></div></td>
                                <td class="tg-pwj7 "colspan="2"><div><span>এক্সেস আছে কিনা?</span></div></td>
                               
                               
                            </tr>
                            
                            
                            <tr>
                            <td class="tg-pwj7">	হ্যাঁ</td>
                            <td class="tg-pwj7">	না</td>

                            <td class="tg-pwj7">	হ্যাঁ</td>
                            <td class="tg-pwj7">	না</td>

                            <td class="tg-pwj7">	হ্যাঁ</td>
                            <td class="tg-pwj7">	না</td>

                            <td class="tg-pwj7">	হ্যাঁ</td>
                            <td class="tg-pwj7">	না</td>

                            <td class="tg-pwj7">	হ্যাঁ</td>
                            <td class="tg-pwj7">	না</td>

                            <td class="tg-pwj7">	হ্যাঁ</td>
                            <td class="tg-pwj7">	না</td>



                            </tr>
                            <tr>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['facebook_fo']  ?></td> 
                            <td class="tg-0pky type_9"> <?php echo  $sm_official_platform['facebook_act_yes']  ?></td> 
                            <td class="tg-0pky type_9"> <?php echo  $sm_official_platform['facebook_act_no']  ?></td> 
                            <td class="tg-0pky type_9"> <?php  echo $sm_official_platform['facebook_acc_yes']  ?></td> 
                            <td class="tg-0pky type_9"> <?php  echo $sm_official_platform['facebook_acc_no']  ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['youtube_fo']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['youtube_act_yes']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['youtube_act_no']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['youtube_acc_yes']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['youtube_acc_no']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['twitter_fo']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['twitter_act_yes']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['twitter_act_no']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['twitter_acc_yes']; ?></td>
                            <td class="tg-0pky type_9"> <?php echo $sm_official_platform['twitter_acc_no']; ?></td>

                      
                        </tr>
                           
                           

                        </table>

                        <table class="tg table table-header-rotated" id="অফিসিয়াল প্লাটফর্ম (লিঙ্ক)<">
                        <tr>
                                  <td class="tg-pwj7"colspan="3"  > অফিসিয়াল প্লাটসমূহের লিংক</td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='অফিসিয়াল প্লাটফর্ম (লিঙ্ক)<' onclick="doit('xlsx','অফিসিয়াল প্লাটফর্ম (লিঙ্ক)<','<?php echo 'SM_অফিসিয়াল প্লাটফর্ম (লিঙ্ক)_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                             <tr>
                               <td class="tg-pwj7"  > শাখা আইডি</td>
                                <td class="tg-pwj7"  > ফেসবুক পেইজ </td>
                                <td class="tg-pwj7">ইউটিউব চ্যানেল</td>
                                <td class="tg-pwj7" > টুইটার	</td>
                                
                            </tr>
                            
                           
                           <?php
                            $i = 0;
                            foreach($sm_official_platform_link->result_array() as $row)  {
                            ?>

                                           <tr>
                                            <td class="tg-0pky type_1"><?php echo $row['branch_id'] ?>	</td>
                                            <td class="tg-0pky type_1"><?php echo $row['facebook_link'] ?>	</td>
                                            <td class="tg-0pky type_1"><?php echo $row['youtube_link'] ?>	</td>
                                            <td class="tg-0pky type_1"><?php echo $row['twitter_link'] ?>	</td>
                                        
            
                                        </tr>

                            <?php } ?>

                        </table>
                        <table class="tg table table-header-rotated" id="বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রামsm">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রামsm' onclick="doit('xlsx','বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রামsm','<?php echo 'IT_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                                <?php echo $shikkha_central_s=$sm_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky type_2">
                                <?php echo $shikkha_central_p=$sm_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$sm_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky type_2">
                                <?php echo $shikkha_shakha_p=$sm_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$sm_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky type_2">
                                <?php echo $kormoshala_central_p=$sm_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$sm_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky type_2">
                                <?php echo $kormoshala_shakha_p=$sm_training_program['kormoshala_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>

                    </table>
                  <table class="tg table table-header-rotated" id="প্রশিক্ষণ">
                        <tr>
                        <td class="tg-pwj7" colspan="5"><b>প্রশিক্ষণ<b></td>
                            <td class="tg-pwj7" colspan="3">
                                    <a href="#" id='প্রশিক্ষণ' onclick="doit('xlsx','প্রশিক্ষণ','<?php echo 'SM_প্রশিক্ষণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            $pk = (isset($sm_proshikkhon['id']))?$sm_proshikkhon['id']:'';
                            $total_s=0;
                            $total_upthi=0;
                            ?>


                   <tr>
                   <td class="tg-y698 type_1">ফেসবুক</td>
                    <td class="tg-0pky type_9">
                    <?php
                            $facebook_s = (isset($sm_proshikkhon['facebook_s'])) ? $sm_proshikkhon['facebook_s'] : 0;
                            $total_s += $facebook_s;
                            echo $facebook_s;
                            ?>
                    </td>
                    <td class="tg-0pky type_9">
                    <?php
                            $facebook_u= (isset($sm_proshikkhon['facebook_u'])) ? $sm_proshikkhon['facebook_u'] : 0;
                            $total_upthi += $facebook_u;
                            echo $facebook_u;
                            ?>
                    </td>
                    <td class="tg-0pky type_1">
                        <?php echo ($facebook_s != 0) ? ($facebook_u / $facebook_s) : 0 ?>
                    </td>

                       <td class="tg-y698 type_1"> ক্যাম্পেইন ওয়ার্কশপ</td>
                       <td class="tg-0pky type_9">
                       <?php
                            $camp_s = (isset($sm_proshikkhon['camp_s'])) ? $sm_proshikkhon['camp_s'] : 0;
                            $total_s += $camp_s;
                            echo $camp_s;
                            ?>
                    </td>
                    <td class="tg-0pky type_9">
                    <?php
                            $camp_u= (isset($sm_proshikkhon['camp_u'])) ? $sm_proshikkhon['camp_u'] : 0;
                            $total_upthi += $camp_u;
                            echo $camp_u;
                            ?>
                    </td>
                    <td class="tg-0pky type_1">
                        <?php echo ($camp_s != 0) ? ($camp_u / $camp_s) : 0 ?>
                    </td>

                      
                       
                   </tr>
                   <tr>
                       <td class="tg-y698 type_1">টুইটার</td>
                       <td class="tg-0pky type_9">
                       <?php
                            $twitter_s = (isset($sm_proshikkhon['twitter_s'])) ? $sm_proshikkhon['twitter_s'] : 0;
                            $total_s += $twitter_s;
                            echo $twitter_s;
                            ?>
                    </td>
                    <td class="tg-0pky type_9">
                    <?php
                            $twitter_u= (isset($sm_proshikkhon['twitter_u'])) ? $sm_proshikkhon['twitter_u'] : 0;
                            $total_upthi += $twitter_u;
                            echo $twitter_u;
                            ?>
                    </td>
                    <td class="tg-0pky type_1">
                        <?php echo ($twitter_s != 0) ? ($twitter_u / $twitter_s) : 0 ?>
                    </td>


                       <td class="tg-y698 type_1"> ভ্লগ	</td>
                       <td class="tg-0pky type_9">
                       <?php
                            $vul_s = (isset($sm_proshikkhon['vul_s'])) ? $sm_proshikkhon['vul_s'] : 0;
                            $total_s += $vul_s;
                            echo $vul_s;
                            ?>
                    </td>
                    <td class="tg-0pky type_9">
                    <?php
                            $vul_u= (isset($sm_proshikkhon['vul_u'])) ? $sm_proshikkhon['vul_u'] : 0;
                            $total_upthi += $vul_u;
                            echo $vul_u;
                            ?>
                    </td>
                    <td class="tg-0pky type_1">
                        <?php echo ($vul_s != 0) ? ($vul_u / $vul_s) : 0 ?>
                    </td>

                      
                       
                   </tr>
                 
                   <tr>
                       <td class="tg-y698 type_1"> ব্লগ (বাংলা/ ইংরেজি)	</td>
                       <td class="tg-0pky type_9">
                       <?php
                            $blog_s = (isset($sm_proshikkhon['blog_s'])) ? $sm_proshikkhon['blog_s'] : 0;
                            $total_s += $blog_s;
                            echo $blog_s;
                            ?>
                    </td>
                    <td class="tg-0pky type_9">
                    <?php
                            $blog_u= (isset($sm_proshikkhon['blog_u'])) ? $sm_proshikkhon['blog_u'] : 0;
                            $total_upthi += $blog_u;
                            echo $blog_u;
                            ?>
                    </td>
                    <td class="tg-0pky type_1">
                        <?php echo ($blog_s != 0) ? ($blog_u / $blog_s) : 0 ?>
                    </td>


                       <td class="tg-y698 type_1"> উইকিপিডিয়া</td>
                       <td class="tg-0pky type_9">
                       <?php
                            $wiki_s = (isset($sm_proshikkhon['wiki_s'])) ? $sm_proshikkhon['wiki_s'] : 0;
                            $total_s += $wiki_s;
                            echo $wiki_s;
                            ?>
                    </td>
                    <td class="tg-0pky type_9">
                    <?php
                            $wiki_u= (isset($sm_proshikkhon['wiki_u'])) ? $sm_proshikkhon['wiki_u'] : 0;
                            $total_upthi += $wiki_u;
                            echo $wiki_u;
                            ?>
                    </td>
                    <td class="tg-0pky type_1">
                        <?php echo ($wiki_s != 0) ? ($wiki_u / $wiki_s) : 0 ?>
                    </td>

                      
                       
                   </tr>
                 
                 
                 
                
                   <tr>
                  
                   <td class="tg-y698 type_1" > অনলাইন নীতিমালা</td>
                   <td class="tg-0pky type_9">
                   <?php
                        $onni_s = (isset($sm_proshikkhon['onni_s'])) ? $sm_proshikkhon['onni_s'] : 0;
                        $total_s += $onni_s;
                        echo $onni_s;
                        ?>
                </td>
                <td class="tg-0pky type_9">
                <?php
                        $onni_u= (isset($sm_proshikkhon['onni_u'])) ? $sm_proshikkhon['onni_u'] : 0;
                        $total_upthi += $onni_u;
                        echo $onni_u;
                        ?>
                </td>
                <td class="tg-0pky type_1">
                    <?php echo ($onni_s != 0) ? ($onni_u / $onni_s) : 0 ?>
                </td>

                       <td class="tg-y698 type_1" colspan="1"> মোট	</td>
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
                        
        

                   
                  
                   

                    </div>


                  
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
