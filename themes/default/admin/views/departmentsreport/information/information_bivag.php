<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'তথ্য বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/information-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/information-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/information-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    <table class="tg table table-header-rotated" id="testTable1" style="text align: start;">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>নিজ শাখা থেকে প্রকাশিত প্রকাশনা </b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Information_নিজ শাখা থেকে প্রকাশিত প্রকাশনা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">উপকরণ </td>
                                <td class="tg-pwj7" colspan="">প্রকাশিত সংখ্যা</td>
                                <td class="tg-pwj7" colspan="">সংরক্ষিত সংখ্যা </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1"> পত্রিকা /ম্যাগাজিন	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pk_sts = $information_nij_shakha_theke_prokashito_prokashona['pk_bn'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo $pk_sts = $information_nij_shakha_theke_prokashito_prokashona['pk_sts'] ?>
                                </td>
                        
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7">ক্যালেন্ডার </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pk_sts = $information_nij_shakha_theke_prokashito_prokashona['kdr_bn'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kdr_sts = $information_nij_shakha_theke_prokashito_prokashona['kdr_sts'] ?>
                                </td>
                       
                              
                            </tr>
                              <tr>
                                <td class="tg-pwj7">বুকলেট </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pk_sts = $information_nij_shakha_theke_prokashito_prokashona['bul_bn'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $bul_sts = $information_nij_shakha_theke_prokashito_prokashona['bul_sts'] ?>
                                </td>
                           
                            </tr>
                            <tr>
                                <td class="tg-pwj7">পোস্টার/লিফলেট   </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pk_sts = $information_nij_shakha_theke_prokashito_prokashona['pt_bn'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $pt_sts = $information_nij_shakha_theke_prokashito_prokashona['pt_sts'] ?>
                                </td>
                         
                            </tr>
                        
                            <tr>
                                <td class="tg-pwj7"> অন্যান্য</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pk_sts = $information_nij_shakha_theke_prokashito_prokashona['onnoanno_bn'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $onnoanno_sts = $information_nij_shakha_theke_prokashito_prokashona['onnoanno_sts'] ?>
                                </td>
                            
                            </tr>   

                        </table>
         
                        <table class="tg table table-header-rotated" id="testTable2" style="text align: start;">
                            <tr>
                                <td class="tg-pwj7" colspan="4"><b>স্মারক</b></td>
                                <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Information_স্মারক.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="tg-pwj7">ক্রম </td>
                                <td class="tg-pwj7">শাখা আইডি </td>
                                <td class="tg-pwj7">বিষয় </td>
                                <td class="tg-pwj7" colspan="">স্মারকের নাম  </td>
                                <td class="tg-pwj7" colspan=""> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=""> সংরক্ষিত সংখ্যা </td>
                            </tr>
                            <?php 
                                $i=0;
                            foreach($information_sharok->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['sharok_type'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['sharok_name'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['sharok_s'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['sharok_ss'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>
 
                        </table>
                       
                        <table class="tg table table-header-rotated" id="testTable3">
                        <tr>
                                <td class="tg-pwj7" colspan="3"><b>ছবি সংগ্রহ </b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Information_ছবি সংগ্রহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        <tr>
                                <td class="tg-pwj7"> প্রোগ্রাম </td>
                                <td class="tg-pwj7" colspan="">বাস্তবায়িত প্রোগ্রাম সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">কতটি প্রোগ্রামের ছবি সংগ্রহ আছে </td>
                                <td class="tg-pwj7" colspan=""> সংগৃহীত ছবি সংখ্যা </td>
                           
                            </tr>
                            <tr>
                          
                            </tr>




                            <tr>
                                <td class="tg-pwj7 type_1">  শাখা	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $shkh_bps = $information_chobi_songroho['shkh_bps'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $shkh_kpchshho = $information_chobi_songroho['shkh_kpchshho'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $shkh_shichs = $information_chobi_songroho['shkh_shichs'] ?>
                                </td>
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-pwj7">থানা/ ওয়ার্ড </td>
                                <td class="tg-0pky  type_1">
                                   <?php echo $thnord_bps = $information_chobi_songroho['thnord_bps'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $thnord_kpchshho = $information_chobi_songroho['thnord_kpchshho'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $thnord_shichs = $information_chobi_songroho['thnord_shichs'] ?>
                                </td>
                            
                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                        <tr>
                                <td class="tg-pwj7" colspan="3"><b>ভিডিও সংরক্ষণ  </b></td>
                                <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Information_ভিডিও সংরক্ষণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                        <tr>
                                <td class="tg-pwj7"> প্রোগ্রাম </td>
                                <td class="tg-pwj7" colspan="">বাস্তবায়িত প্রোগ্রাম সংখ্যা </td>
                                <td class="tg-pwj7" colspan="">কতটি প্রোগ্রামের ভিডিও সংগ্রহ আছে </td>
                                <td class="tg-pwj7" colspan=""> সংগৃহীত ভিডিও সংখ্যা </td>
                           
                            </tr>
                            <tr>
                          
                            </tr>




                            <tr>
                                <td class="tg-pwj7 type_1">  শাখা	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $br_p_s = $information_vedio_sonrokkhon['br_p_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $br_p_v_s = $information_vedio_sonrokkhon['br_p_v_s'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $br_v_s = $information_vedio_sonrokkhon['br_v_s'] ?>
                                </td>
                              
                                
                            </tr>


                            <tr>
                                <td class="tg-pwj7">থানা/ ওয়ার্ড </td>
                                <td class="tg-0pky  type_1">
                                   <?php echo $th_p_s = $information_vedio_sonrokkhon['th_p_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                   <?php echo $th_p_v_s = $information_vedio_sonrokkhon['th_p_v_s'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                   <?php echo $th_v_s = $information_vedio_sonrokkhon['th_v_s'] ?>
                                </td>
                            
                            </tr>

                        </table>
                    <table class="tg table table-header-rotated" id="testTable5">
                    <tr>
                        <td class="tg-pwj7" colspan="3"><b>পত্রিকা/ অনলাইন/ টিভি কাটিং সংগ্রহ </b></td>
                        <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Information_পত্রিকা/ অনলাইন/ টিভি কাটিং সংগ্রহ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                    </tr>
                   <tr>
                       <td class="tg-pwj7" rowspan=""> উপকরণ</td>
                       <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                       <td class="tg-pwj7" colspan="">নিউজ সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">নিউজ আর্কাইভ</td>
                  
                   </tr>


                   <tr>
                       <td class="tg-y698 type_1"> পত্রিকা	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pk_potvs = $information_potrika_online_tv_kating_songroho['pk_potvs'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                           <?php echo $pk_ns = $information_potrika_online_tv_kating_songroho['pk_ns'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                           <?php echo $pk_arc = $information_potrika_online_tv_kating_songroho['pk_arc'] ?>
                       </td>
                   </tr>


                   <tr>
                       <td class="tg-y698">অনলাইন পত্রিকা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $onlinepk_potvs = $information_potrika_online_tv_kating_songroho['onlinepk_potvs'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $onlinepk_ns = $information_potrika_online_tv_kating_songroho['onlinepk_ns'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                           <?php echo $onlinepk_arc = $information_potrika_online_tv_kating_songroho['onlinepk_arc'] ?>
                       </td>
                 
                   </tr>
                   

                   <tr>
                       <td class="tg-y698">টিভি </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tv_potvs = $information_potrika_online_tv_kating_songroho['tv_potvs'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                         <?php echo $tv_ns = $information_potrika_online_tv_kating_songroho['tv_ns'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                           <?php echo $tv_arc = $information_potrika_online_tv_kating_songroho['tv_arc'] ?>
                       </td>                   
                   </tr>

                </table>

                <table class="tg table table-header-rotated" id="testTable6" style="text align: start;">
                    <tr>
                        <td class="tg-pwj7" colspan="2"><b>কার্যবিবরণী সংরক্ষণ  </b></td>
                        <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Information_কার্যবিবরণী সংরক্ষণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                    </tr>
                    <tr>
                    <td class="tg-pwj7">বিষয়</td>
                    <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                    <td class="tg-pwj7" colspan="">সংরক্ষিত সংখ্যা </td>
                </tr>

                    <tr>
                        <td class="tg-pwj7 type_1"> সেক্রেটারিয়েট বৈঠকের  	</td>
                        <td class="tg-0pky  type_2">
                            <?php echo $syb_s = $information_karjobiboroni_sonrokkhon['syb_s'] ?>
                        </td>
                
                        <td class="tg-0pky  type_2">
                            <?php echo $syb_ss = $information_karjobiboroni_sonrokkhon['syb_ss'] ?>
                        </td>
                
                        
                    </tr>


                    <tr>
                        <td class="tg-pwj7">সদস্য বৈঠকের কার্যবিবরণী  </td>
                        <td class="tg-0pky  type_1">
                        <?php echo $sbkb_s = $information_karjobiboroni_sonrokkhon['sbkb_s'] ?>
                        </td>
                        <td class="tg-0pky  type_2">
                            <?php echo $sbkb_ss = $information_karjobiboroni_sonrokkhon['sbkb_ss'] ?>
                        </td>
                    
                    </tr>
                    <tr>
                        <td class="tg-pwj7">থানা/ওয়ার্ড শাখার তথ্য সংরক্ষণ </td>
                        <td class="tg-0pky  type_2">
                            <?php echo $thoshts_s = $information_karjobiboroni_sonrokkhon['thoshts_s'] ?>
                        </td>
                
                        <td class="tg-0pky  type_2">
                        <?php echo $thoshts_ss = $information_karjobiboroni_sonrokkhon['thoshts_ss'] ?>
                        </td>
                
                        
                    </tr>
                

                </table>

                <table class="tg table table-header-rotated" id="testTable7">
                    <tr>
                        <td class="tg-pwj7" colspan=""><b>শহীদ ভাইদের তথ্যাবলী সংগৃহীত থাকলে তার বর্ণনা  </b></td>
                        <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_7' onclick="doit('xlsx','testTable7','<?php echo 'Information_শহীদ ভাইদের তথ্যাবলী সংগৃহীত থাকলে তার বর্ণনা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan="">উপকরন</td>
                        <td class="tg-pwj7" colspan="">সংরক্ষিত সংখ্যা </td>
                   </tr>

                   <tr>
                       <td class="tg-y698 type_1">  ছবি	</td>
                       <td class="tg-0pky  type_1">
                           <?php echo $ch_ss = $information_shohid_vaideri_songrihito['ch_ss'] ?>
                       </td>
                      
                 
                     
                       
                   </tr>


                   <tr>
                       <td class="tg-y698"> ভিডিও </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $vdo_ss = $information_shohid_vaideri_songrihito['vdo_ss'] ?>
                       </td>
                      
                     
                   
                   </tr>
                   

                   <tr>
                       <td class="tg-y698">শার্ট/ প্যান্ট   </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $shpnt_ss = $information_shohid_vaideri_songrihito['shpnt_ss'] ?>
                       </td>
                      
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ডায়েরি  </td>
                       <td class="tg-0pky  type_1">
                        <?php echo $dr_ss = $information_shohid_vaideri_songrihito['dr_ss'] ?>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">শহীদের জীবন বৃত্তান্ত</td>
                       <td class="tg-0pky  type_1">
                        <?php echo $shjbr_ss = $information_shohid_vaideri_songrihito['shjbr_ss'] ?>
                       </td>
                     
                   
                   </tr>
                    

                </table>
              
                <table class="tg table table-header-rotated" id="testTable8">
                    <tr>
                        <td class="tg-pwj7" colspan="4"><b>ফাইল সংরক্ষণ  </b></td>
                        <td class="tg-pwj7" colspan="2">
                                <a href="#" id='table_8' onclick="doit('xlsx','testTable8','<?php echo 'Information_ফাইল সংরক্ষণ.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                    </tr>
                   <tr>
                       <td class="tg-pwj7">ক্রম </td>
                       <td class="tg-pwj7">শাখা আইডি </td>
                       <td class="tg-pwj7" rowspan=""> বিষয়		</td>
                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan=""> সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">স্ক্যান কপি (হ্যাঁ/না)</td>
                  
                   </tr>

                   <?php 
                                $i=0;
                            foreach($information_file_sonrokkhon->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo  $row['branch_id'] ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['file_type'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['file_des'] ?>      
                                    </td>

                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['file_s'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_4">
                                    <?php echo $row['file_scan'] ?>       
                                    </td>
                                </tr>

                        <?php } ?>

                </table>
                    </div>
                <table class="tg table table-header-rotated" id="testTable9">
                    <tr>
                        <td class="tg-pwj7" colspan="2"><b>শাখায় তথ্য সংগ্রহশালা</b></td>
                        <td class="tg-pwj7" colspan="">
                                <a href="#" id='table_9' onclick="doit('xlsx','testTable9','<?php echo 'Information_শাখায় তথ্য সংগ্রহশালা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                    </tr>
                    <tr>
                        <td class="tg-pwj7" rowspan="2">আপনার শাখায় তথ্য সংগ্রহশালা আছে কি না?</td>
                        <td class="tg-pwj7">হ্যাঁ </td>
                        <td class="tg-0pky  type_3">
                            <?php echo $info_house = $information_house['info_house'] ?>
                        </td>
                   </tr>
                   <tr>
                       <td  class="tg-pwj7" colspan=""> না</td>
                       <td class="tg-0pky  type_3">
                            <?php echo $total_information_house_row-$information_house['info_house'] ?>
                        </td>
                   </tr>

               </table>
				
               <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Information_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$information_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$information_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$information_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$information_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$information_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$information_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$information_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$information_training_program['kormoshala_shakha_p'] ?>
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
 
