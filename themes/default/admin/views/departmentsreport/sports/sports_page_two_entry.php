<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্পোর্টস বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/sports-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                <p class="intronumber">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                                             
                                             <tr>
                                                 <td class="tg-pwj7" colspan="6"><b>স্পোর্টস ক্লাব</b></td>
                                                 <td class="tg-pwj7" colspan="">
                                                    <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Sports_স্পোর্টস ক্লাব_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                                </td>
                                             </tr>           
                                                   
                                           
                                            <tr>
                                                <td class="tg-pwj7" colspan="">ক্লাব সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">রেজিস্টার্ড কতটি  </td>
                                                <td class="tg-pwj7" colspan="">কমিটি আছে কতটিতে</td>
                                                <td class="tg-pwj7" colspan="">নিয়োজিক জনশক্তি</td>
                                                <td class="tg-pwj7" colspan="">খেলোয়াড় সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">প্রোগ্রাম সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">অংশগ্রহণকারী </td>
                                            </tr>
                                            <?php
                                                $pk = (isset($sports_club['id']))?$sports_club['id']:'';
                                            ?>

                                            <tr>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="club_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['club_num']))? $sports_club['club_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="registard_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['registard_num']))? $sports_club['registard_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="committee_te_koto_ti" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['committee_te_koto_ti']))? $sports_club['committee_te_koto_ti']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="niyojito_manpower" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['niyojito_manpower']))? $sports_club['niyojito_manpower']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="player_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['player_num']))? $sports_club['player_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="program_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['program_num']))? $sports_club['program_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_club" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="attendence" 
                                                        data-title="Enter"><?php echo (isset( $sports_club['attendence']))? $sports_club['attendence']:0; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                           
                         
                                         </table>
                                         <table class="tg table table-header-rotated" id="testTable2">
                                             
                                             <tr>
                                                 <td class="tg-pwj7" colspan="5"><b>টিমসংক্রান্ত </b></td>
                                                 <td class="tg-pwj7" colspan="">
                                                    <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Sports_টিমসংক্রান্ত_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                                </td>
                                             </tr>            
                                             <?php
                                                $pk = (isset($sports_team_number['id']))?$sports_team_number['id']:'';
                                            ?>

                                            <tr>
                                                <td class="tg-pwj7" colspan="">মাঠ সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">টিম সংখ্যা  </td>
                                                <td class="tg-pwj7" colspan="">জনশক্তি সংখ্যা</td>
                                                <td class="tg-pwj7" colspan="">কতটি মাঠে টিম নেই</td>
                                                <td class="tg-pwj7" colspan="">মাঠ কেন্দ্রিক কর্মসূচী বাস্তবায়ন কতটি?</td>
                                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                                            </tr>
                         
                                            <tr>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_team_number" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="math_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_team_number['math_num']))? $sports_team_number['math_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_team_number" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="team_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_team_number['team_num']))? $sports_team_number['team_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_team_number" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="manpower_num" 
                                                        data-title="Enter"><?php echo (isset( $sports_team_number['manpower_num']))? $sports_team_number['manpower_num']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_team_number" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="mathe_team_kototi" 
                                                        data-title="Enter"><?php echo (isset( $sports_team_number['mathe_team_kototi']))? $sports_team_number['mathe_team_kototi']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_team_number" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="math_kendrik_kormo" 
                                                        data-title="Enter"><?php echo (isset( $sports_team_number['math_kendrik_kormo']))? $sports_team_number['math_kendrik_kormo']:0; ?>
                                                    </a>
                                                </td>
                                                <td class="tg-0pky" > 
                                                    <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                                        data-table="sports_team_number" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                                        data-name="present" 
                                                        data-title="Enter"><?php echo (isset( $sports_team_number['present']))? $sports_team_number['present']:0; ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            
                         
                                         </table>

                            <table class="tg table table-header-rotated" id="testTable3">
                            <tr>
                                <td class="tg-pwj7" colspan='6'><b> স্বাস্থ্য সচেতনতা </b> </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Sports_স্বাস্থ্য সচেতনতা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan='2'> নিয়মিত হাঁটা ও শরীর চর্চা</td>
                                <td class="tg-pwj7" colspan='2'>সচেতনতামূলক প্রোগ্রাম </td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি ফার্স্ট  এইড কোর্স হয়েছে? </span></div></td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি সচেতনতামূলক ভিডিও তৈরি?  </span></div></td>
                                <td class="tg-pwj7 " rowspan='2'><div><span> কতটি সচেতনতামূলক স্টিকার তৈরি?   </span></div></td>
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7 type_1">গ্রুপ সংখ্যা </td>
                                <td class="tg-pwj7  type_1">
                                    অংশগ্রহণকারী
                                </td>
                                <td class="tg-pwj7 type_1">গ্রুপ সংখ্যা </td>
                                <td class="tg-pwj7  type_2">
                                    অংশগ্রহণকারী
                                </td>
                              
                            </tr>
                            <?php
                                $pk = (isset($sports_sastho_shochetonota['id']))?$sports_sastho_shochetonota['id']:'';
                            ?>

                            <tr>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hatahati_group_num" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['hatahati_group_num']))? $sports_sastho_shochetonota['hatahati_group_num']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="hatahati_attendance" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['hatahati_attendance']))? $sports_sastho_shochetonota['hatahati_attendance']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shochetonota_num" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['shochetonota_num']))? $sports_sastho_shochetonota['shochetonota_num']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shochetonota_attendance" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['shochetonota_attendance']))? $sports_sastho_shochetonota['shochetonota_attendance']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kototi_fast_aid" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['kototi_fast_aid']))? $sports_sastho_shochetonota['kototi_fast_aid']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kototi_shochetonotonota_video" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['kototi_shochetonotonota_video']))? $sports_sastho_shochetonota['kototi_shochetonotonota_video']:0; ?>
                                </a>
                            </td>
                            <td class="tg-0pky" > 
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                    data-table="sports_sastho_shochetonota" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kototi_shochetonotonota_sticker" 
                                    data-title="Enter"><?php echo (isset( $sports_sastho_shochetonota['kototi_shochetonotonota_sticker']))? $sports_sastho_shochetonota['kototi_shochetonotonota_sticker']:0; ?>
                                </a>
                            </td>
                               
                              
                            </tr>
                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable4">
                            <tr>
                                <td class="tg-pwj7" colspan='4'><b> যোগাযোগ </b> </td>
                                <td class="tg-pwj7" colspan="">
                                    <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Sports_যোগাযোগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                                <td class="tg-pwj7">
                                <a style="number-decoration:none;" href=<?php echo admin_url('departmentsreport/add-sports-contact/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"> ক্রম</td>
                                <td class="tg-pwj7"> ক্রীড়া ব্যক্তিত্বের নাম </td>
                                <td class="tg-pwj7 "><div><span> খেলার নাম </span></div></td>
                                <td class="tg-pwj7 "><div><span> ধরন  </span></div></td>
                                <td class="tg-pwj7 "><div><span> কতবার  </span></div></td>
                                <td class="tg-pwj7 "><div><span> Actions  </span></div></td>
                               
                            </tr>

                            <?php 
                                $i=0;
                            foreach($sports_contact->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['kria_bektir_nam'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['khelar_nam'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['dhoron'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['kotobar'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-sports-contact/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@sports_contact@".$row['kria_bektir_nam']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                            

                        </table>
                        <table class="tg table table-header-rotated" id="testTable10">
                      <tr>
                          <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                          <td class="tg-pwj7" colspan="1">
                              <a href="#" id='table_10' onclick="doit('xlsx','testTable10','<?php echo 'Sports_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                          </td>
                      </tr> 
                      <?php
                          $pk = (isset($sports_training_program['id']))?$sports_training_program['id']:'';
                          
                      ?>
                      <tr>
                          <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                          <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                          <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                          <td class="tg-pwj7" colspan=''>গড়</td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_s" 
                              data-title="Enter">
                              <?php echo $shikkha_central_s=(isset( $sports_training_program['shikkha_central_s']))? $sports_training_program['shikkha_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_central_p" 
                              data-title="Enter">
                              <?php echo $shikkha_central_p=(isset( $sports_training_program['shikkha_central_p']))? $sports_training_program['shikkha_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                          {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_s" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_s=(isset( $sports_training_program['shikkha_shakha_s']))? $sports_training_program['shikkha_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="shikkha_shakha_p" 
                              data-title="Enter">
                              <?php echo $shikkha_shakha_p=(isset( $sports_training_program['shikkha_shakha_p']))? $sports_training_program['shikkha_shakha_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                          {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_s=(isset( $sports_training_program['kormoshala_central_s']))? $sports_training_program['kormoshala_central_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_central_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_central_p=(isset( $sports_training_program['kormoshala_central_p']))? $sports_training_program['kormoshala_central_p']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_3">
                          <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                          {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                          </td>
                      </tr>
                      <tr>
                          <td class="tg-y698">কর্মশালা (শাখা)</td>
                          <td class="tg-0pky type_1">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_s" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_s=(isset( $sports_training_program['kormoshala_shakha_s']))? $sports_training_program['kormoshala_shakha_s']:'' ?>
                              </a>
                          </td>
                          <td class="tg-0pky  type_2">
                          <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                              data-table="sports_training_program" data-pk="<?php echo $pk ?>"
                              data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                              data-name="kormoshala_shakha_p" 
                              data-title="Enter">
                              <?php echo $kormoshala_shakha_p=(isset( $sports_training_program['kormoshala_shakha_p']))? $sports_training_program['kormoshala_shakha_p']:'' ?>
                              </a>
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
        number-align: center;
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