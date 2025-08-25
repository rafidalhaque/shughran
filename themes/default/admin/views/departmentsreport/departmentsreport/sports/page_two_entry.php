<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্পোর্টস বিভাগ - পেইজ ০২' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        
                    </ul>
                </li>
               
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="intronumber">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable2">
                                             
                                             <tr>
                                                 <td class="tg-pwj7" colspan="7"><b>স্পোর্টস ক্লাব</b></td>
                                             </tr>           
                                           
                                            <tr>
                                                <td class="tg-pwj7" colspan="">ক্লাব সংখ্যা </td>
                                                <td class="tg-pwj7" colspan="">রেজিস্টার্ড কতটি  </td>
                                                <td class="tg-pwj7" colspan="">কমিটি আছে কতটিতে</td>
                                                <td class="tg-pwj7" colspan="">নিয়োজিক জনশক্তি</td>
                                                <td class="tg-pwj7" colspan="">খেলোয়ার সংখ্যা</td>
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
                                                 <td class="tg-pwj7" colspan="6"><b>টিমসংক্রান্ত </b></td>
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

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='7'><b> স্বাস্থ্য সচেতনতা </b> </td>
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
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan='5'><b> যোগাযোগ </b> </td>
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