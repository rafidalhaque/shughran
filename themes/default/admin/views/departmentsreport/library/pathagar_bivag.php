<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'পাঠাগার বিভাগ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

                
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/pathagar-bivag' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                            <li><a href="<?= admin_url('departmentsreport/pathagar-bivag') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/pathagar-bivag/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                    
                    
                       <!--  <td class="tg-0pky  type_2">
                                    <?php echo $pk_sts = $pathagar_birdhi_garthi['dec_p_t'] ?>
                                </td>  -->

                 <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="10"><b>সংগঠনের স্তরভিত্তিক পাঠাগার সংক্রান্ত তথ্য </b></td>
                            
                            <td class="tg-pwj7" colspan="5">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Library_এ সেশনে পাঠাগার বৃদ্ধি ও ঘাটতি.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        
                        <tr>
                             <td class="tg-pwj7"  rowspan="2">সংগঠনের ধরন</td>
                             <td class="tg-pwj7  type_1" rowspan="2">মোট সংখ্যা</td>
                             <td class="tg-pwj7" colspan='4'>পাঠাগার সংখ্যা</td>
                             <td class="tg-pwj7" colspan='4'>বই সংখ্যা</td>
                             <td class="tg-pwj7  type_1" rowspan="2">রেজিস্ট্রার সংরক্ষণ করা হয় কতটি পাঠাগারে ?</td>
                             <td class="tg-pwj7" rowspan="2">ইস্যুকৃত বই</td>
                             <td class="tg-pwj7  type_1" rowspan="2">পঠিত বই</td>
                        </tr>

                        <tr>
                            <td class="tg-pwj7" >পূর্ব </td>
                            <td class="tg-pwj7  type_1">বর্তমান </td>
                            <td class="tg-pwj7" >বৃদ্ধি </td>
                            <td class="tg-pwj7  type_1">ঘাটতি</td>
                            <td class="tg-pwj7" >পূর্ব  </td>
                            <td class="tg-pwj7  type_1">বর্তমান </td>
                            <td class="tg-pwj7" >বৃদ্ধি </td>
                            <td class="tg-pwj7  type_1">ঘাটতি</td>
                            
                        </tr>	
                        <?php
                                $pk = (isset($pathagar_birdhi_garthi['id']))?$pathagar_birdhi_garthi['id']:'';

                                ?>		
                        <tr>
                            <td class="tg-pwj7" >শাখা </td>
                            <td class="tg-0pky">
                               <?php echo $total_s=(isset( $pathagar_birdhi_garthi['total_s']))? $pathagar_birdhi_garthi['total_s']:0 ?>
                            </td>
                            <td class="tg-0pky">
                               <?php echo $pre_p_s=(isset( $pathagar_birdhi_garthi['pre_p_s']))? $pathagar_birdhi_garthi['pre_p_s']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $now_p_s=(isset( $pathagar_birdhi_garthi['now_p_s']))? $pathagar_birdhi_garthi['now_p_s']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $inc_p_s=(isset( $pathagar_birdhi_garthi['inc_p_s']))? $pathagar_birdhi_garthi['inc_p_s']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $dec_p_s=(isset( $pathagar_birdhi_garthi['dec_p_s']))? $pathagar_birdhi_garthi['dec_p_s']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $boi_s_pre=(isset( $pathagar_birdhi_garthi['boi_s_pre']))? $pathagar_birdhi_garthi['boi_s_pre']:0 ?>
                              </td>
                            <td class="tg-0pky">
                            <?php echo $boi_s=(isset( $pathagar_birdhi_garthi['boi_s']))? $pathagar_birdhi_garthi['boi_s']:0 ?>
                              </td>
                              <td class="tg-0pky">
                              <?php echo $boi_inc_s=(isset( $pathagar_birdhi_garthi['boi_inc_s']))? $pathagar_birdhi_garthi['boi_inc_s']:0 ?>
                               </td>
                               <td class="tg-0pky">
                               <?php echo $dec_boi_s=(isset( $pathagar_birdhi_garthi['dec_boi_s']))? $pathagar_birdhi_garthi['dec_boi_s']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_st_s=(isset( $pathagar_birdhi_garthi['reg_st_s']))? $pathagar_birdhi_garthi['reg_st_s']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_is_s=(isset( $pathagar_birdhi_garthi['reg_is_s']))? $pathagar_birdhi_garthi['reg_is_s']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_re_s=(isset( $pathagar_birdhi_garthi['reg_re_s']))? $pathagar_birdhi_garthi['reg_re_s']:0 ?>
                                 </td>
                            
                        </tr>
                        
                        <tr>
                            <td class="tg-pwj7" >থানা </td>
                            <td class="tg-0pky">
                            <?php echo $total_t=(isset( $pathagar_birdhi_garthi['total_t']))? $pathagar_birdhi_garthi['total_t']:0 ?>
                            </td>
                            
                            <td class="tg-0pky">
                            <?php echo $pre_p_t=(isset( $pathagar_birdhi_garthi['pre_p_t']))? $pathagar_birdhi_garthi['pre_p_t']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $t_boi_s=(isset( $pathagar_birdhi_garthi['t_boi_s']))? $pathagar_birdhi_garthi['t_boi_s']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $inc_p_t=(isset( $pathagar_birdhi_garthi['inc_p_t']))? $pathagar_birdhi_garthi['inc_p_t']:0 ?>
                            </td>
                            <td class="tg-0pky">
                            <?php echo $dec_p_t=(isset( $pathagar_birdhi_garthi['dec_p_t']))? $pathagar_birdhi_garthi['dec_p_t']:0 ?>
                             </td>
                             <td class="tg-0pky">
                             <?php echo $boi_t_pre=(isset( $pathagar_birdhi_garthi['boi_t_pre']))? $pathagar_birdhi_garthi['boi_t_pre']:0 ?>
                              </td>
                             <td class="tg-0pky">
                             <?php echo $boi_t=(isset( $pathagar_birdhi_garthi['boi_t']))? $pathagar_birdhi_garthi['boi_t']:0 ?>
                              </td>
                              <td class="tg-0pky">
                              <?php echo $boi_inc_t=(isset( $pathagar_birdhi_garthi['boi_inc_t']))? $pathagar_birdhi_garthi['boi_inc_t']:0 ?>
                               </td>
                               <td class="tg-0pky">
                               <?php echo $dec_boi_t=(isset( $pathagar_birdhi_garthi['dec_boi_t']))? $pathagar_birdhi_garthi['dec_boi_t']:0 ?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo $reg_st_t=(isset( $pathagar_birdhi_garthi['reg_st_t']))? $pathagar_birdhi_garthi['reg_st_t']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_is_t=(isset( $pathagar_birdhi_garthi['reg_is_t']))? $pathagar_birdhi_garthi['reg_is_t']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_re_t=(isset( $pathagar_birdhi_garthi['reg_re_t']))? $pathagar_birdhi_garthi['reg_re_t']:0 ?>
                                 </td>

                        </tr> 
                        <tr>
                            <td class="tg-pwj7" >ওয়ার্ড </td>
                            <td class="tg-0pky">
                            <?php echo $total_w=(isset( $pathagar_birdhi_garthi['total_w']))? $pathagar_birdhi_garthi['total_w']:0 ?>
                             </td>
                            
                            <td class="tg-0pky">
                            <?php echo $pre_p_w=(isset( $pathagar_birdhi_garthi['pre_p_w']))? $pathagar_birdhi_garthi['pre_p_w']:0 ?>
                             </td>
                            <td class="tg-0pky">
                            <?php echo $w_boi_s=(isset( $pathagar_birdhi_garthi['w_boi_s']))? $pathagar_birdhi_garthi['w_boi_s']:0 ?>
                             </td>
                            <td class="tg-0pky">
                            <?php echo $inc_p_w=(isset( $pathagar_birdhi_garthi['inc_p_w']))? $pathagar_birdhi_garthi['inc_p_w']:0 ?>
                             </td>
                             <td class="tg-0pky">
                             <?php echo $dec_p_w=(isset( $pathagar_birdhi_garthi['dec_p_w']))? $pathagar_birdhi_garthi['dec_p_w']:0 ?>
                             </td>
                             <td class="tg-0pky">
                             <?php echo $boi_w_pre=(isset( $pathagar_birdhi_garthi['boi_w_pre']))? $pathagar_birdhi_garthi['boi_w_pre']:0 ?>
                              </td>
                             <td class="tg-0pky">
                             <?php echo $boi_w=(isset( $pathagar_birdhi_garthi['boi_w']))? $pathagar_birdhi_garthi['boi_w']:0 ?>
                              </td>
                              <td class="tg-0pky">
                              <?php echo $boi_inc_w=(isset( $pathagar_birdhi_garthi['boi_inc_w']))? $pathagar_birdhi_garthi['boi_inc_w']:0 ?>
                               </td>
                                <td class="tg-0pky">
                                <?php echo $dec_boi_w=(isset( $pathagar_birdhi_garthi['dec_boi_w']))? $pathagar_birdhi_garthi['dec_boi_w']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_st_w=(isset( $pathagar_birdhi_garthi['reg_st_w']))? $pathagar_birdhi_garthi['reg_st_w']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_is_w=(isset( $pathagar_birdhi_garthi['reg_is_w']))? $pathagar_birdhi_garthi['reg_is_w']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_re_w=(isset( $pathagar_birdhi_garthi['reg_re_w']))? $pathagar_birdhi_garthi['reg_re_w']:0 ?>
                                 </td> 

                        </tr>
                        <tr>
                            <td class="tg-pwj7" >উপশাখা </td>
                            <td class="tg-0pky">
                            <?php echo $total_u=(isset( $pathagar_birdhi_garthi['total_u']))? $pathagar_birdhi_garthi['total_u']:0 ?>
                               </td>
                            
                            <td class="tg-0pky">
                            <?php echo $pre_p_u=(isset( $pathagar_birdhi_garthi['pre_p_u']))? $pathagar_birdhi_garthi['pre_p_u']:0 ?>
                               </td>
                            <td class="tg-0pky">
                            <?php echo $u_boi_s=(isset( $pathagar_birdhi_garthi['u_boi_s']))? $pathagar_birdhi_garthi['u_boi_s']:0 ?>
                              </td>
                              <td class="tg-0pky">
                              <?php echo $inc_p_u=(isset( $pathagar_birdhi_garthi['inc_p_u']))? $pathagar_birdhi_garthi['inc_p_u']:0 ?>
                               </td>
                               <td class="tg-0pky">
                               <?php echo $dec_p_u=(isset( $pathagar_birdhi_garthi['dec_p_u']))? $pathagar_birdhi_garthi['dec_p_u']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $boi_u_pre=(isset( $pathagar_birdhi_garthi['boi_u_pre']))? $pathagar_birdhi_garthi['boi_u_pre']:0 ?>
                                  </td>
                                 <td class="tg-0pky">
                                 <?php echo $boi_u=(isset( $pathagar_birdhi_garthi['boi_u']))? $pathagar_birdhi_garthi['boi_u']:0 ?>
                                  </td>
                                  <td class="tg-0pky">
                                  <?php echo $boi_inc_u=(isset( $pathagar_birdhi_garthi['boi_inc_u']))? $pathagar_birdhi_garthi['boi_inc_u']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $dec_boi_u=(isset( $pathagar_birdhi_garthi['dec_boi_u']))? $pathagar_birdhi_garthi['dec_boi_u']:0 ?>
                                 </td>
                                 <td class="tg-0pky">
                                 <?php echo $reg_st_u=(isset( $pathagar_birdhi_garthi['reg_st_u']))? $pathagar_birdhi_garthi['reg_st_u']:0 ?>
                                 </td>

                                 <td class="tg-0pky">
                                 <?php echo $reg_is_u=(isset( $pathagar_birdhi_garthi['reg_is_u']))? $pathagar_birdhi_garthi['reg_is_u']:0 ?>
                                 </td>

                                 <td class="tg-0pky">
                                 <?php echo $reg_re_u=(isset( $pathagar_birdhi_garthi['reg_re_u']))? $pathagar_birdhi_garthi['reg_re_u']:0 ?>
                                 </td>


                        </tr>

                        <tr>
                            <td class="tg-pwj7" >মোট </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $total_s+$total_t+$total_w+$total_u ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $pre_p_s+$pre_p_t+$pre_p_w+$pre_p_u ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $now_p_s+$t_boi_s+$w_boi_s+$u_boi_s ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $inc_p_s+$inc_p_t+$inc_p_w+$inc_p_u ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $dec_p_s+$dec_p_t+$dec_p_w+$dec_p_u?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $boi_s_pre+$boi_t_pre+$boi_w_pre+$boi_u_pre ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $boi_s+$boi_t+$boi_w+$boi_u ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $boi_inc_s+$boi_inc_t+$boi_inc_w+$boi_inc_u?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $dec_boi_s+$dec_boi_t+$dec_boi_w+$dec_boi_u?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $reg_st_s+$reg_st_t+$reg_st_w+$reg_st_u ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $reg_is_s+$reg_is_t+$reg_is_w+$reg_is_u ?>
                            </td>
                            <td class="tg-0pky  type_2">
                                    <?php echo $reg_re_s+$reg_re_t+$reg_re_w+$reg_re_u ?>
                            </td>
                        </tr>
                       
                        </table>     
                    
                        <table class="tg table table-header-rotated" id="স্তরভিত্তিক পাঠাগার">
                        <tr>
                            <td class="tg-pwj7" colspan="10"><b>স্তরভিত্তিক পাঠাগার </b></td>
                            
                            <td class="tg-pwj7" colspan="2">
                                <a href="#" id='স্তরভিত্তিক পাঠাগার' onclick="doit('xlsx','স্তরভিত্তিক পাঠাগার','<?php echo 'Library_স্তরভিত্তিক পাঠাগার_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        
                        <tr>
                             <td class="tg-pwj7"  rowspan="2">সংগঠনের ধরন</td>
                             <td class="tg-pwj7  type_1" rowspan="2">মোট সংখ্যা</td>
                             <td class="tg-pwj7" colspan='2'>উচ্চতর সিলেবাস </td>
                             <td class="tg-pwj7" colspan='2'>সদস্য  সিলেবাস    </td>
                             <td class="tg-pwj7" colspan='2'>সাথী সিলেবাস</td>
                             <td class="tg-pwj7" colspan='2'>কর্মী সিলেবাস</td>
                             <td class="tg-pwj7" colspan='2'>স্কুল সিলেবাস</td>
                             
                        </tr>

                       <tr>
                            <td class="tg-pwj7" >রয়েছে কতটিতে?    </td>
                            <td class="tg-pwj7  type_1"> বৃদ্ধি  </td>
                            <td class="tg-pwj7" >রয়েছে কতটিতে?   </td>
                            <td class="tg-pwj7  type_1"> বৃদ্ধি </td>
                            <td class="tg-pwj7" >রয়েছে কতটিতে?   </td>
                            <td class="tg-pwj7  type_1"> বৃদ্ধি </td>
                            <td class="tg-pwj7" >রয়েছে কতটিতে?  </td>
                            <td class="tg-pwj7  type_1"> বৃদ্ধি</td>
                            <td class="tg-pwj7" >রয়েছে কতটিতে?  </td>
                            <td class="tg-pwj7  type_1"> বৃদ্ধি </td>
                            
                        </tr>	
                       	
                        <tr>
                            <td class="tg-pwj7" >শাখা </td>
                            <td class="tg-0pky">
                            <?php echo $total_s=(isset( $pathagar_sthorvittik_pathagar['shakha_total']))? $pathagar_sthorvittik_pathagar['shakha_total']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_higher_ache=(isset( $pathagar_sthorvittik_pathagar['shakha_higher_ache']))? $pathagar_sthorvittik_pathagar['shakha_higher_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_higher_briddi=(isset( $pathagar_sthorvittik_pathagar['shakha_higher_briddi']))? $pathagar_sthorvittik_pathagar['shakha_higher_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_member_ache=(isset( $pathagar_sthorvittik_pathagar['shakha_member_ache']))? $pathagar_sthorvittik_pathagar['shakha_member_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_member_briddi=(isset( $pathagar_sthorvittik_pathagar['shakha_member_briddi']))? $pathagar_sthorvittik_pathagar['shakha_member_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_sathi_ache=(isset( $pathagar_sthorvittik_pathagar['shakha_sathi_ache']))? $pathagar_sthorvittik_pathagar['shakha_sathi_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_sathi_briddi=(isset( $pathagar_sthorvittik_pathagar['shakha_sathi_briddi']))? $pathagar_sthorvittik_pathagar['shakha_sathi_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_kormi_ache=(isset( $pathagar_sthorvittik_pathagar['shakha_kormi_ache']))? $pathagar_sthorvittik_pathagar['shakha_kormi_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_kormi_briddi=(isset( $pathagar_sthorvittik_pathagar['shakha_kormi_briddi']))? $pathagar_sthorvittik_pathagar['shakha_kormi_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_school_ache=(isset( $pathagar_sthorvittik_pathagar['shakha_school_ache']))? $pathagar_sthorvittik_pathagar['shakha_school_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $shakha_school_briddi=(isset( $pathagar_sthorvittik_pathagar['shakha_school_briddi']))? $pathagar_sthorvittik_pathagar['shakha_school_briddi']:0 ?>

                            </td>
                           

                            
                        </tr>
                        
                        <tr>
                        <td class="tg-pwj7" >থানা </td>
                        <td class="tg-0pky">
                        <?php echo $total_s=(isset( $pathagar_sthorvittik_pathagar['thana_total']))? $pathagar_sthorvittik_pathagar['thana_total']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_higher_ache=(isset( $pathagar_sthorvittik_pathagar['thana_higher_ache']))? $pathagar_sthorvittik_pathagar['thana_higher_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_higher_briddi=(isset( $pathagar_sthorvittik_pathagar['thana_higher_briddi']))? $pathagar_sthorvittik_pathagar['thana_higher_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_member_ache=(isset( $pathagar_sthorvittik_pathagar['thana_member_ache']))? $pathagar_sthorvittik_pathagar['thana_member_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_member_briddi=(isset( $pathagar_sthorvittik_pathagar['thana_member_briddi']))? $pathagar_sthorvittik_pathagar['thana_member_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_sathi_ache=(isset( $pathagar_sthorvittik_pathagar['thana_sathi_ache']))? $pathagar_sthorvittik_pathagar['thana_sathi_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_sathi_briddi=(isset( $pathagar_sthorvittik_pathagar['thana_sathi_briddi']))? $pathagar_sthorvittik_pathagar['thana_sathi_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_kormi_ache=(isset( $pathagar_sthorvittik_pathagar['thana_kormi_ache']))? $pathagar_sthorvittik_pathagar['thana_kormi_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_kormi_briddi=(isset( $pathagar_sthorvittik_pathagar['thana_kormi_briddi']))? $pathagar_sthorvittik_pathagar['thana_kormi_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_school_ache=(isset( $pathagar_sthorvittik_pathagar['thana_school_ache']))? $pathagar_sthorvittik_pathagar['thana_school_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $thana_school_briddi=(isset( $pathagar_sthorvittik_pathagar['thana_school_briddi']))? $pathagar_sthorvittik_pathagar['thana_school_briddi']:0 ?>

                        </td>

                               
                        </tr> 
                        <tr>
                        <td class="tg-pwj7" >ওয়ার্ড/ইউনিয়ন </td>
                        <td class="tg-0pky">
                        <?php echo $total_s=(isset( $pathagar_sthorvittik_pathagar['oard_total']))? $pathagar_sthorvittik_pathagar['oard_total']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_higher_ache=(isset( $pathagar_sthorvittik_pathagar['oard_higher_ache']))? $pathagar_sthorvittik_pathagar['oard_higher_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_higher_briddi=(isset( $pathagar_sthorvittik_pathagar['oard_higher_briddi']))? $pathagar_sthorvittik_pathagar['oard_higher_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_member_ache=(isset( $pathagar_sthorvittik_pathagar['oard_member_ache']))? $pathagar_sthorvittik_pathagar['oard_member_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_member_briddi=(isset( $pathagar_sthorvittik_pathagar['oard_member_briddi']))? $pathagar_sthorvittik_pathagar['oard_member_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_sathi_ache=(isset( $pathagar_sthorvittik_pathagar['oard_sathi_ache']))? $pathagar_sthorvittik_pathagar['oard_sathi_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_sathi_briddi=(isset( $pathagar_sthorvittik_pathagar['oard_sathi_briddi']))? $pathagar_sthorvittik_pathagar['oard_sathi_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_kormi_ache=(isset( $pathagar_sthorvittik_pathagar['oard_kormi_ache']))? $pathagar_sthorvittik_pathagar['oard_kormi_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_kormi_briddi=(isset( $pathagar_sthorvittik_pathagar['oard_kormi_briddi']))? $pathagar_sthorvittik_pathagar['oard_kormi_briddi']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_school_ache=(isset( $pathagar_sthorvittik_pathagar['oard_school_ache']))? $pathagar_sthorvittik_pathagar['oard_school_ache']:0 ?>

                        </td>
                        <td class="tg-0pky">
                        <?php echo $oard_school_briddi=(isset( $pathagar_sthorvittik_pathagar['oard_school_briddi']))? $pathagar_sthorvittik_pathagar['oard_school_briddi']:0 ?>

                        </td>

                                 

                        </tr>
                        <tr>
                        <td class="tg-pwj7" >উপশাখা </td>
                            <td class="tg-0pky">
                            <?php echo $total_s=(isset( $pathagar_sthorvittik_pathagar['uposhaka_total']))? $pathagar_sthorvittik_pathagar['uposhaka_total']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_higher_ache=(isset( $pathagar_sthorvittik_pathagar['uposhaka_higher_ache']))? $pathagar_sthorvittik_pathagar['uposhaka_higher_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_higher_briddi=(isset( $pathagar_sthorvittik_pathagar['uposhaka_higher_briddi']))? $pathagar_sthorvittik_pathagar['uposhaka_higher_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_member_ache=(isset( $pathagar_sthorvittik_pathagar['uposhaka_member_ache']))? $pathagar_sthorvittik_pathagar['uposhaka_member_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_member_briddi=(isset( $pathagar_sthorvittik_pathagar['uposhaka_member_briddi']))? $pathagar_sthorvittik_pathagar['uposhaka_member_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_sathi_ache=(isset( $pathagar_sthorvittik_pathagar['uposhaka_sathi_ache']))? $pathagar_sthorvittik_pathagar['uposhaka_sathi_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_sathi_briddi=(isset( $pathagar_sthorvittik_pathagar['uposhaka_sathi_briddi']))? $pathagar_sthorvittik_pathagar['uposhaka_sathi_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_kormi_ache=(isset( $pathagar_sthorvittik_pathagar['uposhaka_kormi_ache']))? $pathagar_sthorvittik_pathagar['uposhaka_kormi_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_kormi_briddi=(isset( $pathagar_sthorvittik_pathagar['uposhaka_kormi_briddi']))? $pathagar_sthorvittik_pathagar['uposhaka_kormi_briddi']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_school_ache=(isset( $pathagar_sthorvittik_pathagar['uposhaka_school_ache']))? $pathagar_sthorvittik_pathagar['uposhaka_school_ache']:0 ?>

                            </td>
                            <td class="tg-0pky">
                            <?php echo $uposhaka_school_briddi=(isset( $pathagar_sthorvittik_pathagar['uposhaka_school_briddi']))? $pathagar_sthorvittik_pathagar['uposhaka_school_briddi']:0 ?>

                            </td>
 

                        </tr>
                       <tr>
                          <td style="border:none;text-align:left" colspan="12"> <b>বিশেষ দ্রষ্টব্য :</b> উপরিউক্ত ছকে সিলেবাসের সেট সংখ্যা লিখতে হবে, বই সংখ্যা নয়। <br>
                           থানা, ওয়ার্ড/ইউনিয়ন ও উপশাখার ক্ষেত্রে <b>কতটির পাঠাগারে সংশ্লিষ্ট সিলেবাসের বই</b> আছে, সে সংখ্যা লিখতে হবে; সেট সংখ্যা কিংবা বই সংখ্যা নয়।
                          </td>
                       </tr>
                      
                            
                        </table>

                        <table class="tg table table-header-rotated" id="testTable1">
                        <tr>
                            <td class="tg-pwj7" colspan="6"><b>বিভিন্ন ধরনের পাঠাগার সংক্রান্ত তথ্য</b></td>
                            
                            <td class="tg-pwj7" colspan="3">
                            <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Library_মসজিদভিত্তিক পাঠাগার.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                            </td>
                        </tr>
                        
                        <tr>
                             <td class="tg-pwj7"  rowspan="2">সংগঠনের ধরন</td>
                             <td class="tg-pwj7" colspan='4'>পাঠাগার সংখ্যা</td>
                             <td class="tg-pwj7" colspan='4'>বই সংখ্যা</td>
                             
                        </tr>

                        <tr>
                            <td class="tg-pwj7" >পূর্ব </td>
                            <td class="tg-pwj7  type_1">বর্তমান </td>
                            <td class="tg-pwj7" >বৃদ্ধি </td>
                            <td class="tg-pwj7  type_1">ঘাটতি</td>
                            <td class="tg-pwj7" >পূর্ব  </td>
                            <td class="tg-pwj7  type_1">বর্তমান </td>
                            <td class="tg-pwj7" >বৃদ্ধি </td>
                            <td class="tg-pwj7  type_1">ঘাটতি</td>
                            
                        </tr>	
                       	
                       <tr>
                            <td class="tg-pwj7">মসজিদভিত্তিক পাঠাগার </td>

                            <td class="tg-0pky">
                                <?php echo $mos_p_s_pre=(isset($pathagar_mosque['mos_p_s_pre']))? $pathagar_mosque['mos_p_s_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $mos_p_s=(isset($pathagar_mosque['mos_p_s']))? $pathagar_mosque['mos_p_s']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $mos_inc_p=(isset($pathagar_mosque['mos_inc_p']))? $pathagar_mosque['mos_inc_p']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $dec_p_mos=(isset($pathagar_mosque['dec_p_mos']))? $pathagar_mosque['dec_p_mos']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $mos_boi_s_pre=(isset($pathagar_mosque['mos_boi_s_pre']))? $pathagar_mosque['mos_boi_s_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $mos_boi_s=(isset($pathagar_mosque['mos_boi_s']))? $pathagar_mosque['mos_boi_s']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $mos_inc_boi=(isset($pathagar_mosque['mos_inc_boi']))? $pathagar_mosque['mos_inc_boi']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $dec_boi_mos=(isset($pathagar_mosque['dec_boi_mos']))? $pathagar_mosque['dec_boi_mos']:0 ?>
                            </td>
                        </tr>

                        <tr> 
                            <td class="tg-pwj7">লেন্ডিং  লাইব্রেরী </td>

                            <td class="tg-0pky">
                                <?php echo $lal_p_pre=(isset($pathagar_mosque['lal_p_pre']))? $pathagar_mosque['lal_p_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_p_now=(isset($pathagar_mosque['lal_p_now']))? $pathagar_mosque['lal_p_now']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_p_inc=(isset($pathagar_mosque['lal_p_inc']))? $pathagar_mosque['lal_p_inc']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_p_dec=(isset($pathagar_mosque['lal_p_dec']))? $pathagar_mosque['lal_p_dec']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_bo_pre=(isset($pathagar_mosque['lal_bo_pre']))? $pathagar_mosque['lal_bo_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_bo_now=(isset($pathagar_mosque['lal_bo_now']))? $pathagar_mosque['lal_bo_now']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_bo_inc=(isset($pathagar_mosque['lal_bo_inc']))? $pathagar_mosque['lal_bo_inc']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $lal_bo_dec=(isset($pathagar_mosque['lal_bo_dec']))? $pathagar_mosque['lal_bo_dec']:0 ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="tg-pwj7">উন্মক্তু পাঠাগার </td>
                            <td class="tg-0pky">
                                <?php echo $ul_p_pre=(isset($pathagar_mosque['ul_p_pre']))? $pathagar_mosque['ul_p_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_p_now=(isset($pathagar_mosque['ul_p_now']))? $pathagar_mosque['ul_p_now']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_p_inc=(isset($pathagar_mosque['ul_p_inc']))? $pathagar_mosque['ul_p_inc']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_p_dec=(isset($pathagar_mosque['ul_p_dec']))? $pathagar_mosque['ul_p_dec']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_bo_pre=(isset($pathagar_mosque['ul_bo_pre']))? $pathagar_mosque['ul_bo_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_bo_now=(isset($pathagar_mosque['ul_bo_now']))? $pathagar_mosque['ul_bo_now']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_bo_inc=(isset($pathagar_mosque['ul_bo_inc']))? $pathagar_mosque['ul_bo_inc']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $ul_bo_dec=(isset($pathagar_mosque['ul_bo_dec']))? $pathagar_mosque['ul_bo_dec']:0 ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="tg-pwj7">সেলুন পাঠাগার </td>
                            
                            <td class="tg-0pky">
                                <?php echo $sep_p_pre=(isset($pathagar_mosque['sep_p_pre']))? $pathagar_mosque['sep_p_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_p_now=(isset($pathagar_mosque['sep_p_now']))? $pathagar_mosque['sep_p_now']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_p_inc=(isset($pathagar_mosque['sep_p_inc']))? $pathagar_mosque['sep_p_inc']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_p_dec=(isset($pathagar_mosque['sep_p_dec']))? $pathagar_mosque['sep_p_dec']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_bo_pre=(isset($pathagar_mosque['sep_bo_pre']))? $pathagar_mosque['sep_bo_pre']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_bo_now=(isset($pathagar_mosque['sep_bo_now']))? $pathagar_mosque['sep_bo_now']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_bo_inc=(isset($pathagar_mosque['sep_bo_inc']))? $pathagar_mosque['sep_bo_inc']:0 ?>
                            </td>

                            <td class="tg-0pky">
                                <?php echo $sep_bo_dec=(isset($pathagar_mosque['sep_bo_dec']))? $pathagar_mosque['sep_bo_dec']:0 ?>
                            </td>
                        </tr>

                        <tr>
                                <td class="tg-pwj7">রিকশা পাঠাগার </td>
                            
                                <td class="tg-0pky">
                                    <?php echo $rip_p_pre=(isset($pathagar_mosque['rip_p_pre']))? $pathagar_mosque['rip_p_pre']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_p_now=(isset($pathagar_mosque['rip_p_now']))? $pathagar_mosque['rip_p_now']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_p_inc=(isset($pathagar_mosque['rip_p_inc']))? $pathagar_mosque['rip_p_inc']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_p_dec=(isset($pathagar_mosque['rip_p_dec']))? $pathagar_mosque['rip_p_dec']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_bo_pre=(isset($pathagar_mosque['rip_bo_pre']))? $pathagar_mosque['rip_bo_pre']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_bo_now=(isset($pathagar_mosque['rip_bo_now']))? $pathagar_mosque['rip_bo_now']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_bo_inc=(isset($pathagar_mosque['rip_bo_inc']))? $pathagar_mosque['rip_bo_inc']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $rip_bo_dec=(isset($pathagar_mosque['rip_bo_dec']))? $pathagar_mosque['rip_bo_dec']:0 ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-pwj7">অন্যান্য পাঠগার </td>
                                
                                <td class="tg-0pky">
                                    <?php echo $op_p_pre=(isset($pathagar_mosque['op_p_pre']))? $pathagar_mosque['op_p_pre']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_p_now=(isset($pathagar_mosque['op_p_now']))? $pathagar_mosque['op_p_now']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_p_inc=(isset($pathagar_mosque['op_p_inc']))? $pathagar_mosque['op_p_inc']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_p_dec=(isset($pathagar_mosque['op_p_dec']))? $pathagar_mosque['op_p_dec']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_bo_pre=(isset($pathagar_mosque['op_bo_pre']))? $pathagar_mosque['op_bo_pre']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_bo_now=(isset($pathagar_mosque['op_bo_now']))? $pathagar_mosque['op_bo_now']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_bo_inc=(isset($pathagar_mosque['op_bo_inc']))? $pathagar_mosque['op_bo_inc']:0 ?>
                                </td>

                                <td class="tg-0pky">
                                    <?php echo $op_bo_dec=(isset($pathagar_mosque['op_bo_dec']))? $pathagar_mosque['op_bo_dec']:0 ?>
                                </td>
                            </tr>


                        </table>  

                        <table class="tg table table-header-rotated" id="testTable10">
                        <tr>
                            <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                            <td class="tg-pwj7" colspan="1">
                                <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Library_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
                            <?php echo $shikkha_central_s=$pathagar_training_program['shikkha_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_central_p=$pathagar_training_program['shikkha_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                            {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $shikkha_shakha_s=$pathagar_training_program['shikkha_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $shikkha_shakha_p=$pathagar_training_program['shikkha_shakha_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                            {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_central_s=$pathagar_training_program['kormoshala_central_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_central_p=$pathagar_training_program['kormoshala_central_p'] ?>
                            </td>
                            <td class="tg-0pky  type_3">
                            <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                            {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tg-y698">কর্মশালা (শাখা)</td>
                            <td class="tg-0pky type_1">
                            <?php echo $kormoshala_shakha_s=$pathagar_training_program['kormoshala_shakha_s'] ?>
                            </td>
                            <td class="tg-0pky  type_2">
                            <?php echo $kormoshala_shakha_p=$pathagar_training_program['kormoshala_shakha_p'] ?>
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
 
