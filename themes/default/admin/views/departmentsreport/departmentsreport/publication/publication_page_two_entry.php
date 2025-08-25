<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রকাশনা বিভাগ - পেইজ ০২'  . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/publication-page-two') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/publication-page-two/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='5'><b>কেন্দ্র হতে বিবিধ/অন্যান্য প্রকাশনা সামগ্রী সংগ্রহ</b></td>
                                <td class="tg-pwj7">
                                <a style="text-decoration:none;" href=<?php echo admin_url('departmentsreport/add-publication-bibidh/'. $branch_id) ?> ><i class="fa fa-plus-square" aria-hidden="true"></i> তথ্য যুক্ত করুন</a>
                                </td>
                            </tr>
                            <tr> 

                                <td class="tg-pwj7" colspan=''>  ক্রম </td>
                                <td class="tg-pwj7" colspan=''>  উপকরণ </td>
                                <td class="tg-pwj7" colspan=''>  সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>  বিক্রি </td>
                                <td class="tg-pwj7" colspan=''>  বিতরণ </td>
                                <td class="tg-pwj7" colspan=''>  Actions </td>

                            </tr>
                            <?php 
                                $i=0;
                            foreach($publication_bibidh->result_array() as $row) 
                                    {
                                        $i++;
                            ?>

                                <tr>
                                    <td class="tg-0pky type_1"><?php echo $i ?>	</td>
                                    <td class="tg-0pky type_1"><?php echo $row['upokoron'] ?>	</td>
                                    <td class="tg-0pky  type_2">
                                    <?php echo $row['number'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bikri'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_3">
                                    <?php echo $row['bitoron'] ?>      
                                    </td>
                                    <td class="tg-0pky  type_1">
                                    <button class='btn btn-info'>
                                    <a class='action_class' href=<?php echo admin_url('departmentsreport/add-publication-bibidh/'. $row['branch_id'].'?type=edit&id='. $row['id']) ?>>Edit</a>
                                    </button>
                                    <button  class='btn btn-danger' id='<?php echo "delete@publication_bibidh@".$row['upokoron']."@".$row['id'] ?>'>Delete</button>
                                    </td>
                                
                                </tr>

                        <?php } ?>
                        </table>


                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>                           
                                <td class="tg-pwj7" colspan='5'><b>প্রকাশনা সংক্রান্ত আয়-ব্যয়</b></td>
                               
                            </tr>
                            <tr> 
                                <td class="tg-pwj7" colspan=''> বিবরণ</td>
                                <td class="tg-pwj7" colspan=''>  টাকার পরিমাণ </td>
                                <td class="tg-pwj7" colspan=''>  মন্তব্য </td>
                            </tr>
                            <?php
                                $pk = (isset($publication_ay_bey['id']))?$publication_ay_bey['id']:'';

                                ?>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                অধস্তন শাখায় বিক্রয়
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bikroy_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bikroy_amount']))? $publication_ay_bey['odh_shakhar_bikroy_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bikroy_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bikroy_com']))? $publication_ay_bey['odh_shakhar_bikroy_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                অধস্তন শাখার বাহিরে বিক্রয়
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bahire_bikroy_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bahire_bikroy_amount']))? $publication_ay_bey['odh_shakhar_bahire_bikroy_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="odh_shakhar_bahire_bikroy_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['odh_shakhar_bahire_bikroy_com']))? $publication_ay_bey['odh_shakhar_bahire_bikroy_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                প্রকাশনা হতে মোট আয় 
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_ay_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_ay_amount']))? $publication_ay_bey['pro_hote_total_ay_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_ay_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_ay_com']))? $publication_ay_bey['pro_hote_total_ay_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                প্রকাশনা হতে মোট ব্যায় 
                                </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_bay_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_bay_amount']))? $publication_ay_bey['pro_hote_total_bay_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_total_bay_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_total_bay_com']))? $publication_ay_bey['pro_hote_total_bay_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                 প্রকাশনা সামগ্রী হতে লাভ
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_lav_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_lav_amount']))? $publication_ay_bey['pro_hote_lav_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="pro_hote_lav_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['pro_hote_lav_com']))? $publication_ay_bey['pro_hote_lav_com']:'' ?>
                                        </a>
                                    </td>
                            </tr>
                            <tr>                                                     
                                <td class="tg-y698 type_1">
                                 শাখা হতে ভর্তুকী
                                 </td>
                                 <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="shakha_hote_vortuki_amount" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['shakha_hote_vortuki_amount']))? $publication_ay_bey['shakha_hote_vortuki_amount']:'' ?>
                                        </a>
                                    </td>
                                    <td class="tg-0pky" > 
                                        <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="text" 
                                            data-table="publication_ay_bey" data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                            data-name="shakha_hote_vortuki_com" 
                                            data-title="Enter"><?php echo (isset( $publication_ay_bey['shakha_hote_vortuki_com']))? $publication_ay_bey['shakha_hote_vortuki_com']:'' ?>
                                        </a>
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
    }.action_class{
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