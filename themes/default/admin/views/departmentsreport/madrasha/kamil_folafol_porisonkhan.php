<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'কামিল ফলাফল পরিসংখ্যান' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/kamil-folafol-porisonkhan') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/kamil-folafol-porisonkhan/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				
				
                <div class="table-responsive">
				
	
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
</style>
                    <div class="tg-wrap">
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                               <td class="tg-pwj7" >ক্রম</td>
                              
                                <td class="tg-pwj7" colspan="2" >জনশক্তি</td>
                                <td class="tg-pwj7" >মোট পরীক্ষার্থী </td>
                                <td class="tg-pwj7" >  জিপিএ 5</td>
                                <td class="tg-pwj7" > এ গ্রেড </td>
                                <td class="tg-pwj7" >এ- গ্রেড  </td>
                                <td class="tg-pwj7" >বি গ্রেড </td>
                                <td class="tg-pwj7" >সি গ্রেড </td>
                                <td class="tg-pwj7" >ডি গ্রেড </td>
                                <td class="tg-pwj7" >মোট</td>
                            </tr>



                            <tr>
                            
                            
                                
                                <td class="tg-y698 type_1"rowspan="4"> ১	</td>
                                <td class="tg-y698 type_1" rowspan="4"> হাদিস	</td>
                                <td class="tg-0pky"> সদস্য </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_mp=$total_kamil_folafol_proisonkhan['ha_so_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_gpa5=$total_kamil_folafol_proisonkhan['ha_so_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_agred=$total_kamil_folafol_proisonkhan['ha_so_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_a_gred=$total_kamil_folafol_proisonkhan['ha_so_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_bgred=$total_kamil_folafol_proisonkhan['ha_so_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_cgred=$total_kamil_folafol_proisonkhan['ha_so_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so_dgred=$total_kamil_folafol_proisonkhan['ha_so_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_so=($ha_so_mp!=0)?($ha_so_mp+$ha_so_gpa5+$ha_so_agred+$ha_so_a_gred+$ha_so_bgred+$ha_so_cgred+$ha_so_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সাথী</td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_mp=$total_kamil_folafol_proisonkhan['ha_sa_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_gpa5=$total_kamil_folafol_proisonkhan['ha_sa_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_agred=$total_kamil_folafol_proisonkhan['ha_sa_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_a_gred=$total_kamil_folafol_proisonkhan['ha_sa_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_bgred=$total_kamil_folafol_proisonkhan['ha_sa_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_cgred=$total_kamil_folafol_proisonkhan['ha_sa_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa_dgred=$total_kamil_folafol_proisonkhan['ha_sa_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_sa=($ha_sa_mp!=0)?($ha_sa_mp+$ha_sa_gpa5+$ha_sa_agred+$ha_sa_a_gred+$ha_sa_bgred+$ha_sa_cgred+$ha_sa_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">কর্মী</td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_mp=$total_kamil_folafol_proisonkhan['ha_ko_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_gpa5=$total_kamil_folafol_proisonkhan['ha_ko_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_agred=$total_kamil_folafol_proisonkhan['ha_ko_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_a_gred=$total_kamil_folafol_proisonkhan['ha_ko_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_bgred=$total_kamil_folafol_proisonkhan['ha_ko_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_cgred=$total_kamil_folafol_proisonkhan['ha_ko_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko_dgred=$total_kamil_folafol_proisonkhan['ha_ko_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_ko=($ha_ko_mp!=0)?($ha_ko_mp+$ha_ko_gpa5+$ha_ko_agred+$ha_ko_a_gred+$ha_ko_bgred+$ha_ko_cgred+$ha_ko_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সমর্থক</td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_mp=$total_kamil_folafol_proisonkhan['ha_som_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_gpa5=$total_kamil_folafol_proisonkhan['ha_som_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_agred=$total_kamil_folafol_proisonkhan['ha_som_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_a_gred=$total_kamil_folafol_proisonkhan['ha_som_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_bgred=$total_kamil_folafol_proisonkhan['ha_som_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_cgred=$total_kamil_folafol_proisonkhan['ha_som_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som_dgred=$total_kamil_folafol_proisonkhan['ha_som_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ha_som=($ha_som_mp!=0)?($ha_som_mp+$ha_som_gpa5+$ha_som_agred+$ha_som_a_gred+$ha_som_bgred+$ha_som_cgred+$ha_som_dgred):0?>
                                </td>
                            </tr>


                            <tr>
                            
                                <td class="tg-y698 type_1" rowspan="4"> ২	</td>
                                <td class="tg-y698 type_1" rowspan="4"> তাফসীর	</td>
                                
                                <td class="tg-0pky">সদস্য </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_mp=$total_kamil_folafol_proisonkhan['ta_so_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_gpa5=$total_kamil_folafol_proisonkhan['ta_so_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_agred=$total_kamil_folafol_proisonkhan['ta_so_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_a_gred=$total_kamil_folafol_proisonkhan['ta_so_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_bgred=$total_kamil_folafol_proisonkhan['ta_so_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_cgred=$total_kamil_folafol_proisonkhan['ta_so_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so_dgred=$total_kamil_folafol_proisonkhan['ta_so_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_so=($ta_so_mp!=0)?($ta_so_mp+$ta_so_gpa5+$ta_so_agred+$ta_so_a_gred+$ta_so_bgred+$ta_so_cgred+$ta_so_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সাথী</td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_mp=$total_kamil_folafol_proisonkhan['ta_sa_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_gpa5=$total_kamil_folafol_proisonkhan['ta_sa_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_agred=$total_kamil_folafol_proisonkhan['ta_sa_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_a_gred=$total_kamil_folafol_proisonkhan['ta_sa_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_bgred=$total_kamil_folafol_proisonkhan['ta_sa_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_cgred=$total_kamil_folafol_proisonkhan['ta_sa_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa_dgred=$total_kamil_folafol_proisonkhan['ta_sa_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_sa=($ta_sa_mp!=0)?($ta_sa_mp+$ta_sa_gpa5+$ta_sa_agred+$ta_sa_a_gred+$ta_sa_bgred+$ta_sa_cgred+$ta_sa_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">কর্মী</td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_mp=$total_kamil_folafol_proisonkhan['ta_ko_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_gpa5=$total_kamil_folafol_proisonkhan['ta_ko_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_agred=$total_kamil_folafol_proisonkhan['ta_ko_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_a_gred=$total_kamil_folafol_proisonkhan['ta_ko_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_bgred=$total_kamil_folafol_proisonkhan['ta_ko_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_cgred=$total_kamil_folafol_proisonkhan['ta_ko_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko_dgred=$total_kamil_folafol_proisonkhan['ta_ko_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_ko=($ta_ko_mp!=0)?($ta_ko_mp+$ta_ko_gpa5+$ta_ko_agred+$ta_ko_a_gred+$ta_ko_bgred+$ta_ko_cgred+$ta_ko_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সমর্থক</td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_mp=$total_kamil_folafol_proisonkhan['ta_som_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_gpa5=$total_kamil_folafol_proisonkhan['ta_som_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_agred=$total_kamil_folafol_proisonkhan['ta_som_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_a_gred=$total_kamil_folafol_proisonkhan['ta_som_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_bgred=$total_kamil_folafol_proisonkhan['ta_som_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_cgred=$total_kamil_folafol_proisonkhan['ta_som_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som_dgred=$total_kamil_folafol_proisonkhan['ta_som_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $ta_som=($ta_som_mp!=0)?($ta_som_mp+$ta_som_gpa5+$ta_som_agred+$ta_som_a_gred+$ta_som_bgred+$ta_som_cgred+$ta_som_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                            
                                <td class="tg-y698 type_1"rowspan="4"> ৩	</td>
                                <td class="tg-y698" rowspan="4">ফিকহ  </td>
                                
                                <td class="tg-0pky">সদস্য </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_mp=$total_kamil_folafol_proisonkhan['fik_so_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_gpa5=$total_kamil_folafol_proisonkhan['fik_so_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_agred=$total_kamil_folafol_proisonkhan['fik_so_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_a_gred=$total_kamil_folafol_proisonkhan['fik_so_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_bgred=$total_kamil_folafol_proisonkhan['fik_so_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_cgred=$total_kamil_folafol_proisonkhan['fik_so_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so_dgred=$total_kamil_folafol_proisonkhan['fik_so_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_so=($fik_so_mp!=0)?($fik_so_mp+$fik_so_gpa5+$fik_so_agred+$fik_so_a_gred+$fik_so_bgred+$fik_so_cgred+$fik_so_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সাথী</td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_mp=$total_kamil_folafol_proisonkhan['fik_sa_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_gpa5=$total_kamil_folafol_proisonkhan['fik_sa_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_agred=$total_kamil_folafol_proisonkhan['fik_sa_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_a_gred=$total_kamil_folafol_proisonkhan['fik_sa_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_bgred=$total_kamil_folafol_proisonkhan['fik_sa_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_cgred=$total_kamil_folafol_proisonkhan['fik_sa_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa_dgred=$total_kamil_folafol_proisonkhan['fik_sa_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_sa=($fik_sa_mp!=0)?($fik_sa_mp+$fik_sa_gpa5+$fik_sa_agred+$fik_sa_a_gred+$fik_sa_bgred+$fik_sa_cgred+$fik_sa_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">কর্মী</td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_mp=$total_kamil_folafol_proisonkhan['fik_ko_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_gpa5=$total_kamil_folafol_proisonkhan['fik_ko_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_agred=$total_kamil_folafol_proisonkhan['fik_ko_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_a_gred=$total_kamil_folafol_proisonkhan['fik_ko_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_bgred=$total_kamil_folafol_proisonkhan['fik_ko_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_cgred=$total_kamil_folafol_proisonkhan['fik_ko_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko_dgred=$total_kamil_folafol_proisonkhan['fik_ko_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_ko=($fik_ko_mp!=0)?($fik_ko_mp+$fik_ko_gpa5+$fik_ko_agred+$fik_ko_a_gred+$fik_ko_bgred+$fik_ko_cgred+$fik_ko_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সমর্থক</td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_mp=$total_kamil_folafol_proisonkhan['fik_som_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_gpa5=$total_kamil_folafol_proisonkhan['fik_som_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_agred=$total_kamil_folafol_proisonkhan['fik_som_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_a_gred=$total_kamil_folafol_proisonkhan['fik_som_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_bgred=$total_kamil_folafol_proisonkhan['fik_som_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_cgred=$total_kamil_folafol_proisonkhan['fik_som_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som_dgred=$total_kamil_folafol_proisonkhan['fik_som_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $fik_som=($fik_som_mp!=0)?($fik_som_mp+$fik_som_gpa5+$fik_som_agred+$fik_som_a_gred+$fik_som_bgred+$fik_som_cgred+$adob_so_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                            
                                <td class="tg-y698 type_1"rowspan="4"> ৪	</td>
                                <td class="tg-y698" rowspan="4">আসব  </td>
                                
                                <td class="tg-0pky">সদস্য </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_mp=$total_kamil_folafol_proisonkhan['adob_so_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_gpa5=$total_kamil_folafol_proisonkhan['adob_so_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_agred=$total_kamil_folafol_proisonkhan['adob_so_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_a_gred=$total_kamil_folafol_proisonkhan['adob_so_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_bgred=$total_kamil_folafol_proisonkhan['adob_so_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_cgred=$total_kamil_folafol_proisonkhan['adob_so_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so_dgred=$total_kamil_folafol_proisonkhan['adob_so_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_so=($adob_so_mp!=0)?($adob_so_mp+$adob_so_gpa5+$adob_so_agred+$adob_so_a_gred+$adob_so_bgred+$adob_so_cgred+$adob_so_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সাথী</td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_mp=$total_kamil_folafol_proisonkhan['adob_sa_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_gpa5=$total_kamil_folafol_proisonkhan['adob_sa_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_agred=$total_kamil_folafol_proisonkhan['adob_sa_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_a_gred=$total_kamil_folafol_proisonkhan['adob_sa_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_bgred=$total_kamil_folafol_proisonkhan['adob_sa_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_cgred=$total_kamil_folafol_proisonkhan['adob_sa_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa_dgred=$total_kamil_folafol_proisonkhan['adob_sa_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_sa=($adob_sa_mp!=0)?($adob_sa_mp+$adob_sa_gpa5+$adob_sa_agred+$adob_sa_a_gred+$adob_sa_bgred+$adob_sa_cgred+$adob_sa_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">কর্মী</td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_mp=$total_kamil_folafol_proisonkhan['adob_ko_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_gpa5=$total_kamil_folafol_proisonkhan['adob_ko_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_agred=$total_kamil_folafol_proisonkhan['adob_ko_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_a_gred=$total_kamil_folafol_proisonkhan['adob_ko_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_bgred=$total_kamil_folafol_proisonkhan['adob_ko_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_cgred=$total_kamil_folafol_proisonkhan['adob_ko_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko_dgred=$total_kamil_folafol_proisonkhan['adob_ko_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_ko=($adob_ko_mp!=0)?($adob_ko_mp+$adob_ko_gpa5+$adob_ko_agred+$adob_ko_a_gred+$adob_ko_bgred+$adob_ko_cgred+$adob_ko_dgred):0?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">সমর্থক</td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_mp=$total_kamil_folafol_proisonkhan['adob_som_mp'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_gpa5=$total_kamil_folafol_proisonkhan['adob_som_gpa5'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_agred=$total_kamil_folafol_proisonkhan['adob_som_agred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_a_gred=$total_kamil_folafol_proisonkhan['adob_som_a_gred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_bgred=$total_kamil_folafol_proisonkhan['adob_som_bgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_cgred=$total_kamil_folafol_proisonkhan['adob_som_cgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som_dgred=$total_kamil_folafol_proisonkhan['adob_som_dgred'] ?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $adob_som=($adob_som_mp!=0)?($adob_som_mp+$adob_som_gpa5+$adob_som_agred+$adob_som_a_gred+$adob_som_bgred+$adob_som_cgred+$adob_som_dgred):0?>
                                </td>
                            </tr>
                          
                            
                      
                            <tr>
                      
                                <td class="tg-0pky" colspan="3">মোট</td>    
                                <td class="tg-0pky" >
                                <?php echo $mp=($ha_so_mp!=0)?($ha_so_mp+$ha_sa_mp+$ha_ko_mp+$ha_som_mp+$ta_so_mp+$ta_sa_mp+$ta_ko_mp+$ta_som_mp+$fik_so_mp+$fik_sa_mp+$fik_ko_mp+$fik_som_mp+$adob_so_mp+$adob_sa_mp+$adob_ko_mp+$adob_som_mp):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $gpa5=($ha_so_gpa5!=0)?($ha_so_gpa5+$ha_sa_gpa5+$ha_ko_gpa5+$ha_som_gpa5+$ta_so_gpa5+$ta_sa_gpa5+$ta_ko_gpa5+$ta_som_gpa5+$fik_so_gpa5+$fik_sa_gpa5+$fik_ko_gpa5+$fik_som_gpa5+$adob_so_gpa5+$adob_sa_gpa5+$adob_ko_gpa5+$adob_som_gpa5):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $agred=($ha_so_agred!=0)?($ha_so_agred+$ha_sa_agred+$ha_ko_agred+$ha_som_agred+$ta_so_agred+$ta_sa_agred+$ta_ko_agred+$ta_som_agred+$fik_so_agred+$fik_sa_agred+$fik_ko_agred+$fik_som_agred+$adob_so_agred+$adob_sa_agred+$adob_ko_agred+$adob_som_agred):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $a_gred=($ha_so_a_gred!=0)?($ha_so_a_gred+$ha_sa_a_gred+$ha_ko_a_gred+$ha_som_a_gred+$ta_so_a_gred+$ta_sa_a_gred+$ta_ko_a_gred+$ta_som_a_gred+$fik_so_a_gred+$fik_sa_a_gred+$fik_ko_a_gred+$fik_som_a_gred+$adob_so_a_gred+$adob_sa_a_gred+$adob_ko_a_gred+$adob_som_a_gred):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $bgred=($ha_so_bgred!=0)?($ha_so_bgred+$ha_sa_bgred+$ha_ko_bgred+$ha_som_bgred+$ta_so_bgred+$ta_sa_bgred+$ta_ko_bgred+$ta_som_bgred+$fik_so_bgred+$fik_sa_bgred+$fik_ko_bgred+$fik_som_bgred+$adob_so_bgred+$adob_sa_bgred+$adob_ko_bgred+$adob_som_bgred):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $cgred=($ha_so_cgred!=0)?($ha_so_cgred+$ha_sa_cgred+$ha_ko_cgred+$ha_som_cgred+$ta_so_cgred+$ta_sa_cgred+$ta_ko_cgred+$ta_som_cgred+$fik_so_cgred+$fik_sa_cgred+$fik_ko_cgred+$fik_som_cgred+$adob_so_cgred+$adob_sa_cgred+$adob_ko_cgred+$adob_som_cgred):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $dgred=($ha_so_dgred!=0)?($ha_so_dgred+$ha_sa_dgred+$ha_ko_dgred+$ha_som_dgred+$ta_so_dgred+$ta_sa_dgred+$ta_ko_dgred+$ta_som_dgred+$fik_so_dgred+$fik_sa_dgred+$fik_ko_dgred+$fik_som_dgred+$adob_so_dgred+$adob_sa_dgred+$adob_ko_dgred+$adob_som_dgred):0?>
                                </td>
                                <td class="tg-0pky" >
                                <?php echo $total=($mp+$gpa5+$agred+$a_gred+$bgred+$cgred+$dgred)?>
                                </td>
                            </tr>
                            


                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
