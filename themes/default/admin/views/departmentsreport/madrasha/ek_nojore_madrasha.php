 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'এক নজরে মাদরাসাসমূহ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/ek-nojore-madrasha') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/ek-nojore-madrasha/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">মাদ্রাসা</td>
                               
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>সংগঠন আছে </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>থানা মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>ওয়ার্ড/জন্মমানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>উপশাখা মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি</span></div></td>
                                <td class="tg-pwj7 "><div><span>সমর্থক সংগঠন মানের </span></div></td>
                                <td class="tg-pwj7 "><div><span>বৃদ্ধি </span></div></td>
                                <td class="tg-pwj7 "><div><span>সংগঠন নেই </span></div></td>
                                
                                
                               
                            </tr>

                            <?php 
                              $ka_sa=  (isset( $total_ak_nojore_madrasa_somuho['ka_sa']))? $total_ak_nojore_madrasa_somuho['ka_sa']:'';
                              $ka_br1=  (isset( $total_ak_nojore_madrasa_somuho['ka_br1']))? $total_ak_nojore_madrasa_somuho['ka_br1']:'';
                              $ka_thm=  (isset( $total_ak_nojore_madrasa_somuho['ka_thm']))? $total_ak_nojore_madrasa_somuho['ka_thm']:'';
                              $ka_br2=  (isset( $total_ak_nojore_madrasa_somuho['ka_br2']))? $total_ak_nojore_madrasa_somuho['ka_br2']:'';
                              $ka_wjm=  (isset( $total_ak_nojore_madrasa_somuho['ka_wjm']))? $total_ak_nojore_madrasa_somuho['ka_wjm']:'';
                              $ka_br3=  (isset( $total_ak_nojore_madrasa_somuho['ka_br3']))? $total_ak_nojore_madrasa_somuho['ka_br3']:'';
                              $ka_upm=  (isset( $total_ak_nojore_madrasa_somuho['ka_upm']))? $total_ak_nojore_madrasa_somuho['ka_upm']:'';
                              $ka_br4=  (isset( $total_ak_nojore_madrasa_somuho['ka_br4']))? $total_ak_nojore_madrasa_somuho['ka_br4']:'';
                              $ka_ssm=  (isset( $total_ak_nojore_madrasa_somuho['ka_ssm']))? $total_ak_nojore_madrasa_somuho['ka_ssm']:'';
                              $ka_br5=  (isset( $total_ak_nojore_madrasa_somuho['ka_br5']))? $total_ak_nojore_madrasa_somuho['ka_br5']:'';
                              $ka_sn=  (isset( $total_ak_nojore_madrasa_somuho['ka_sn']))? $total_ak_nojore_madrasa_somuho['ka_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698 type_1"> কামিল	মাদরাসা</td>
                                <td class="tg-0pky  type_1">
                                <?php echo ($ka_sa!=0)?($ka_sa+$ka_br1+$ka_thm+$ka_br2+$ka_wjm+$ka_br3+$ka_upm+$ka_br4+$ka_ssm+$ka_br5+$ka_sn):0?>
                                </td>                                <td class="tg-0pky  type_2">
                                <?php echo $ka_sa=$total_ak_nojore_madrasa_somuho['ka_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ka_br1=$total_ak_nojore_madrasa_somuho['ka_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ka_thm=$total_ak_nojore_madrasa_somuho['ka_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ka_br2=$total_ak_nojore_madrasa_somuho['ka_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ka_wjm=$total_ak_nojore_madrasa_somuho['ka_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ka_br3=$total_ak_nojore_madrasa_somuho['ka_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ka_upm=$total_ak_nojore_madrasa_somuho['ka_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ka_br4=$total_ak_nojore_madrasa_somuho['ka_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ka_ssm=$total_ak_nojore_madrasa_somuho['ka_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ka_br5=$total_ak_nojore_madrasa_somuho['ka_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ka_sn=$total_ak_nojore_madrasa_somuho['ka_sn'] ?>
                                </td>

                            </tr>

                            <?php 
                              $fa_sa=  (isset( $total_ak_nojore_madrasa_somuho['fa_sa']))? $total_ak_nojore_madrasa_somuho['fa_sa']:'';
                              $fa_br1=  (isset( $total_ak_nojore_madrasa_somuho['fa_br1']))? $total_ak_nojore_madrasa_somuho['fa_br1']:'';
                              $fa_thm=  (isset( $total_ak_nojore_madrasa_somuho['fa_thm']))? $total_ak_nojore_madrasa_somuho['fa_thm']:'';
                              $fa_br2=  (isset( $total_ak_nojore_madrasa_somuho['fa_br2']))? $total_ak_nojore_madrasa_somuho['fa_br2']:'';
                              $fa_wjm=  (isset( $total_ak_nojore_madrasa_somuho['fa_wjm']))? $total_ak_nojore_madrasa_somuho['fa_wjm']:'';
                              $fa_br3=  (isset( $total_ak_nojore_madrasa_somuho['fa_br3']))? $total_ak_nojore_madrasa_somuho['fa_br3']:'';
                              $fa_upm=  (isset( $total_ak_nojore_madrasa_somuho['fa_upm']))? $total_ak_nojore_madrasa_somuho['fa_upm']:'';
                              $fa_br4=  (isset( $total_ak_nojore_madrasa_somuho['fa_br4']))? $total_ak_nojore_madrasa_somuho['fa_br4']:'';
                              $fa_ssm=  (isset( $total_ak_nojore_madrasa_somuho['fa_ssm']))? $total_ak_nojore_madrasa_somuho['fa_ssm']:'';
                              $fa_br5=  (isset( $total_ak_nojore_madrasa_somuho['fa_br5']))? $total_ak_nojore_madrasa_somuho['fa_br5']:'';
                              $fa_sn=  (isset( $total_ak_nojore_madrasa_somuho['fa_sn']))? $total_ak_nojore_madrasa_somuho['fa_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698">ফাজিল  মাদরাসা</td>
                                <td class="tg-0pky">
                                <?php echo ($fa_sa!=0)?($fa_sa+$fa_br1+$fa_thm+$fa_br2+$fa_wjm+$fa_br3+$fa_upm+$fa_br4+$fa_ssm+$fa_br5+$fa_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $fa_sa=$total_ak_nojore_madrasa_somuho['fa_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $fa_br1=$total_ak_nojore_madrasa_somuho['fa_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $fa_thm=$total_ak_nojore_madrasa_somuho['fa_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $fa_br2=$total_ak_nojore_madrasa_somuho['fa_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $fa_wjm=$total_ak_nojore_madrasa_somuho['fa_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $fa_br3=$total_ak_nojore_madrasa_somuho['fa_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $fa_upm=$total_ak_nojore_madrasa_somuho['fa_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $fa_br4=$total_ak_nojore_madrasa_somuho['fa_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $fa_ssm=$total_ak_nojore_madrasa_somuho['fa_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $fa_br5=$total_ak_nojore_madrasa_somuho['fa_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $fa_sn=$total_ak_nojore_madrasa_somuho['fa_sn'] ?>
                                </td>

                            </tr>
                            <?php 
                              $a_sa=  (isset( $total_ak_nojore_madrasa_somuho['a_sa']))? $total_ak_nojore_madrasa_somuho['a_sa']:'';
                              $a_br1=  (isset( $total_ak_nojore_madrasa_somuho['a_br1']))? $total_ak_nojore_madrasa_somuho['a_br1']:'';
                              $a_thm=  (isset( $total_ak_nojore_madrasa_somuho['a_thm']))? $total_ak_nojore_madrasa_somuho['a_thm']:'';
                              $a_br2=  (isset( $total_ak_nojore_madrasa_somuho['a_br2']))? $total_ak_nojore_madrasa_somuho['a_br2']:'';
                              $a_wjm=  (isset( $total_ak_nojore_madrasa_somuho['a_wjm']))? $total_ak_nojore_madrasa_somuho['a_wjm']:'';
                              $a_br3=  (isset( $total_ak_nojore_madrasa_somuho['a_br3']))? $total_ak_nojore_madrasa_somuho['a_br3']:'';
                              $a_upm=  (isset( $total_ak_nojore_madrasa_somuho['a_upm']))? $total_ak_nojore_madrasa_somuho['a_upm']:'';
                              $a_br4=  (isset( $total_ak_nojore_madrasa_somuho['a_br4']))? $total_ak_nojore_madrasa_somuho['a_br4']:'';
                              $a_ssm=  (isset( $total_ak_nojore_madrasa_somuho['a_ssm']))? $total_ak_nojore_madrasa_somuho['a_ssm']:'';
                              $a_br5=  (isset( $total_ak_nojore_madrasa_somuho['a_br5']))? $total_ak_nojore_madrasa_somuho['a_br5']:'';
                              $a_sn=  (isset( $total_ak_nojore_madrasa_somuho['a_sn']))? $total_ak_nojore_madrasa_somuho['a_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698">আলিম মাদরাসা</td>
                                <td class="tg-0pky">
                                <?php echo ($a_sa!=0)?($a_sa+$a_br1+$a_thm+$a_br2+$a_wjm+$a_br3+$a_upm+$a_br4+$a_ssm+$a_br5+$a_sn):0?>
                                </td>                            
                                <td class="tg-0pky  type_2">
                                <?php echo $a_sa=$total_ak_nojore_madrasa_somuho['a_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $a_br1=$total_ak_nojore_madrasa_somuho['a_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $a_thm=$total_ak_nojore_madrasa_somuho['a_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $a_br2=$total_ak_nojore_madrasa_somuho['a_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $a_wjm=$total_ak_nojore_madrasa_somuho['a_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $a_br3=$total_ak_nojore_madrasa_somuho['a_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $a_upm=$total_ak_nojore_madrasa_somuho['a_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $a_br4=$total_ak_nojore_madrasa_somuho['a_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $a_ssm=$total_ak_nojore_madrasa_somuho['a_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $a_br5=$total_ak_nojore_madrasa_somuho['a_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $a_sn=$total_ak_nojore_madrasa_somuho['a_sn'] ?>
                                </td>

                            </tr>
                            <?php 
                              $d_sa=  (isset( $total_ak_nojore_madrasa_somuho['d_sa']))? $total_ak_nojore_madrasa_somuho['d_sa']:'';
                              $d_br1=  (isset( $total_ak_nojore_madrasa_somuho['d_br1']))? $total_ak_nojore_madrasa_somuho['d_br1']:'';
                              $d_thm=  (isset( $total_ak_nojore_madrasa_somuho['d_thm']))? $total_ak_nojore_madrasa_somuho['d_thm']:'';
                              $d_br2=  (isset( $total_ak_nojore_madrasa_somuho['d_br2']))? $total_ak_nojore_madrasa_somuho['d_br2']:'';
                              $d_wjm=  (isset( $total_ak_nojore_madrasa_somuho['d_wjm']))? $total_ak_nojore_madrasa_somuho['d_wjm']:'';
                              $d_br3=  (isset( $total_ak_nojore_madrasa_somuho['d_br3']))? $total_ak_nojore_madrasa_somuho['d_br3']:'';
                              $d_upm=  (isset( $total_ak_nojore_madrasa_somuho['d_upm']))? $total_ak_nojore_madrasa_somuho['d_upm']:'';
                              $d_br4=  (isset( $total_ak_nojore_madrasa_somuho['d_br4']))? $total_ak_nojore_madrasa_somuho['d_br4']:'';
                              $d_ssm=  (isset( $total_ak_nojore_madrasa_somuho['d_ssm']))? $total_ak_nojore_madrasa_somuho['d_ssm']:'';
                              $d_br5=  (isset( $total_ak_nojore_madrasa_somuho['d_br5']))? $total_ak_nojore_madrasa_somuho['d_br5']:'';
                              $d_sn=  (isset( $total_ak_nojore_madrasa_somuho['d_sn']))? $total_ak_nojore_madrasa_somuho['d_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698">দাখিল মাদরাসা</td>
                                <td class="tg-0pky">
                                <?php echo ($d_sa!=0)?($d_sa+$d_br1+$d_thm+$d_br2+$d_wjm+$d_br3+$d_upm+$d_br4+$d_ssm+$d_br5+$d_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $d_sa=$total_ak_nojore_madrasa_somuho['d_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $d_br1=$total_ak_nojore_madrasa_somuho['d_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $d_thm=$total_ak_nojore_madrasa_somuho['d_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $d_br2=$total_ak_nojore_madrasa_somuho['d_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $d_wjm=$total_ak_nojore_madrasa_somuho['d_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $d_br3=$total_ak_nojore_madrasa_somuho['d_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $d_upm=$total_ak_nojore_madrasa_somuho['d_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $d_br4=$total_ak_nojore_madrasa_somuho['d_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $d_ssm=$total_ak_nojore_madrasa_somuho['d_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $d_br5=$total_ak_nojore_madrasa_somuho['d_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $d_sn=$total_ak_nojore_madrasa_somuho['d_sn'] ?>
                                </td>

                            </tr>

                            <?php 
                              $pvt_sa=  (isset( $total_ak_nojore_madrasa_somuho['pvt_sa']))? $total_ak_nojore_madrasa_somuho['pvt_sa']:'';
                              $pvt_br1=  (isset( $total_ak_nojore_madrasa_somuho['pvt_br1']))? $total_ak_nojore_madrasa_somuho['pvt_br1']:'';
                              $pvt_thm=  (isset( $total_ak_nojore_madrasa_somuho['pvt_thm']))? $total_ak_nojore_madrasa_somuho['pvt_thm']:'';
                              $pvt_br2=  (isset( $total_ak_nojore_madrasa_somuho['pvt_br2']))? $total_ak_nojore_madrasa_somuho['pvt_br2']:'';
                              $pvt_wjm=  (isset( $total_ak_nojore_madrasa_somuho['pvt_wjm']))? $total_ak_nojore_madrasa_somuho['pvt_wjm']:'';
                              $pvt_br3=  (isset( $total_ak_nojore_madrasa_somuho['pvt_br3']))? $total_ak_nojore_madrasa_somuho['pvt_br3']:'';
                              $pvt_upm=  (isset( $total_ak_nojore_madrasa_somuho['pvt_upm']))? $total_ak_nojore_madrasa_somuho['pvt_upm']:'';
                              $pvt_br4=  (isset( $total_ak_nojore_madrasa_somuho['pvt_br4']))? $total_ak_nojore_madrasa_somuho['pvt_br4']:'';
                              $pvt_ssm=  (isset( $total_ak_nojore_madrasa_somuho['pvt_ssm']))? $total_ak_nojore_madrasa_somuho['pvt_ssm']:'';
                              $pvt_br5=  (isset( $total_ak_nojore_madrasa_somuho['pvt_br5']))? $total_ak_nojore_madrasa_somuho['pvt_br5']:'';
                              $pvt_sn=  (isset( $total_ak_nojore_madrasa_somuho['pvt_sn']))? $total_ak_nojore_madrasa_somuho['pvt_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698">প্রাইভেট মাদরাসা</td>
                                <td class="tg-0pky">
                                <?php echo ($pvt_sa!=0)?($pvt_sa+$pvt_br1+$pvt_thm+$pvt_br2+$pvt_wjm+$pvt_br3+$pvt_upm+$pvt_br4+$pvt_ssm+$pvt_br5+$pvt_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pvt_sa=$total_ak_nojore_madrasa_somuho['pvt_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $pvt_br1=$total_ak_nojore_madrasa_somuho['pvt_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $pvt_thm=$total_ak_nojore_madrasa_somuho['pvt_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $pvt_br2=$total_ak_nojore_madrasa_somuho['pvt_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $pvt_wjm=$total_ak_nojore_madrasa_somuho['pvt_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $pvt_br3=$total_ak_nojore_madrasa_somuho['pvt_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $pvt_upm=$total_ak_nojore_madrasa_somuho['pvt_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $pvt_br4=$total_ak_nojore_madrasa_somuho['pvt_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $pvt_ssm=$total_ak_nojore_madrasa_somuho['pvt_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $pvt_br5=$total_ak_nojore_madrasa_somuho['pvt_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $pvt_sn=$total_ak_nojore_madrasa_somuho['pvt_sn'] ?>
                                </td>

                            </tr>
                            <?php 
                              $ko_sa=  (isset( $total_ak_nojore_madrasa_somuho['ko_sa']))? $total_ak_nojore_madrasa_somuho['ko_sa']:'';
                              $ko_br1=  (isset( $total_ak_nojore_madrasa_somuho['ko_br1']))? $total_ak_nojore_madrasa_somuho['ko_br1']:'';
                              $ko_thm=  (isset( $total_ak_nojore_madrasa_somuho['ko_thm']))? $total_ak_nojore_madrasa_somuho['ko_thm']:'';
                              $ko_br2=  (isset( $total_ak_nojore_madrasa_somuho['ko_br2']))? $total_ak_nojore_madrasa_somuho['ko_br2']:'';
                              $ko_wjm=  (isset( $total_ak_nojore_madrasa_somuho['ko_wjm']))? $total_ak_nojore_madrasa_somuho['ko_wjm']:'';
                              $ko_br3=  (isset( $total_ak_nojore_madrasa_somuho['ko_br3']))? $total_ak_nojore_madrasa_somuho['ko_br3']:'';
                              $ko_upm=  (isset( $total_ak_nojore_madrasa_somuho['ko_upm']))? $total_ak_nojore_madrasa_somuho['ko_upm']:'';
                              $ko_br4=  (isset( $total_ak_nojore_madrasa_somuho['ko_br4']))? $total_ak_nojore_madrasa_somuho['ko_br4']:'';
                              $ko_ssm=  (isset( $total_ak_nojore_madrasa_somuho['ko_ssm']))? $total_ak_nojore_madrasa_somuho['ko_ssm']:'';
                              $ko_br5=  (isset( $total_ak_nojore_madrasa_somuho['ko_br5']))? $total_ak_nojore_madrasa_somuho['ko_br5']:'';
                              $ko_sn=  (isset( $total_ak_nojore_madrasa_somuho['ko_sn']))? $total_ak_nojore_madrasa_somuho['ko_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698">ইবতেদায়ী মাদরাসা  </td>
                                <td class="tg-0pky">
                                <?php echo ($ko_sa!=0)?($ko_sa+$ko_br1+$ko_thm+$ko_br2+$ko_wjm+$ko_br3+$ko_upm+$ko_br4+$ko_ssm+$ko_br5+$ko_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ko_sa=$total_ak_nojore_madrasa_somuho['ko_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ko_br1=$total_ak_nojore_madrasa_somuho['ko_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ko_thm=$total_ak_nojore_madrasa_somuho['ko_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ko_br2=$total_ak_nojore_madrasa_somuho['ko_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ko_wjm=$total_ak_nojore_madrasa_somuho['ko_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ko_br3=$total_ak_nojore_madrasa_somuho['ko_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ko_upm=$total_ak_nojore_madrasa_somuho['ko_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ko_br4=$total_ak_nojore_madrasa_somuho['ko_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ko_ssm=$total_ak_nojore_madrasa_somuho['ko_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ko_br5=$total_ak_nojore_madrasa_somuho['ko_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ko_sn=$total_ak_nojore_madrasa_somuho['ko_sn'] ?>
                                </td>

                            </tr>
                                                        <?php 
                              $ha_sa=  (isset( $total_ak_nojore_madrasa_somuho['ha_sa']))? $total_ak_nojore_madrasa_somuho['ha_sa']:'';
                              $ha_br1=  (isset( $total_ak_nojore_madrasa_somuho['ha_br1']))? $total_ak_nojore_madrasa_somuho['ha_br1']:'';
                              $ha_thm=  (isset( $total_ak_nojore_madrasa_somuho['ha_thm']))? $total_ak_nojore_madrasa_somuho['ha_thm']:'';
                              $ha_br2=  (isset( $total_ak_nojore_madrasa_somuho['ha_br2']))? $total_ak_nojore_madrasa_somuho['ha_br2']:'';
                              $ha_wjm=  (isset( $total_ak_nojore_madrasa_somuho['ha_wjm']))? $total_ak_nojore_madrasa_somuho['ha_wjm']:'';
                              $ha_br3=  (isset( $total_ak_nojore_madrasa_somuho['ha_br3']))? $total_ak_nojore_madrasa_somuho['ha_br3']:'';
                              $ha_upm=  (isset( $total_ak_nojore_madrasa_somuho['ha_upm']))? $total_ak_nojore_madrasa_somuho['ha_upm']:'';
                              $ha_br4=  (isset( $total_ak_nojore_madrasa_somuho['ha_br4']))? $total_ak_nojore_madrasa_somuho['ha_br4']:'';
                              $ha_ssm=  (isset( $total_ak_nojore_madrasa_somuho['ha_ssm']))? $total_ak_nojore_madrasa_somuho['ha_ssm']:'';
                              $ha_br5=  (isset( $total_ak_nojore_madrasa_somuho['ha_br5']))? $total_ak_nojore_madrasa_somuho['ha_br5']:'';
                              $ha_sn=  (isset( $total_ak_nojore_madrasa_somuho['ha_sn']))? $total_ak_nojore_madrasa_somuho['ha_sn']:'';
                            ?>

                            <tr>
                                <td class="tg-y698">হাফিজি মাদরাসা (কওমি ছাড়া)</td>
                                <td class="tg-0pky">
                                <?php echo ($ha_sa!=0)?($ha_sa+$ha_br1+$ha_thm+$ha_br2+$ha_wjm+$ha_br3+$ha_upm+$ha_br4+$ha_ssm+$ha_br5+$ha_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ha_sa=$total_ak_nojore_madrasa_somuho['ha_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ha_br1=$total_ak_nojore_madrasa_somuho['ha_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ha_thm=$total_ak_nojore_madrasa_somuho['ha_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ha_br2=$total_ak_nojore_madrasa_somuho['ha_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ha_wjm=$total_ak_nojore_madrasa_somuho['ha_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ha_br3=$total_ak_nojore_madrasa_somuho['ha_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ha_upm=$total_ak_nojore_madrasa_somuho['ha_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ha_br4=$total_ak_nojore_madrasa_somuho['ha_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ha_ssm=$total_ak_nojore_madrasa_somuho['ha_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ha_br5=$total_ak_nojore_madrasa_somuho['ha_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ha_sn=$total_ak_nojore_madrasa_somuho['ha_sn'] ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">নূরানি মাদরাসা (কওমি ছাড়া)</td>
                                <td class="tg-0pky">
                                <?php echo ($ha_sa!=0)?($ha_sa+$ha_br1+$ha_thm+$ha_br2+$ha_wjm+$ha_br3+$ha_upm+$ha_br4+$ha_ssm+$ha_br5+$ha_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ha_sa=$total_ak_nojore_madrasa_somuho['ha_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ha_br1=$total_ak_nojore_madrasa_somuho['ha_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ha_thm=$total_ak_nojore_madrasa_somuho['ha_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ha_br2=$total_ak_nojore_madrasa_somuho['ha_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ha_wjm=$total_ak_nojore_madrasa_somuho['ha_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ha_br3=$total_ak_nojore_madrasa_somuho['ha_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ha_upm=$total_ak_nojore_madrasa_somuho['ha_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ha_br4=$total_ak_nojore_madrasa_somuho['ha_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ha_ssm=$total_ak_nojore_madrasa_somuho['ha_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ha_br5=$total_ak_nojore_madrasa_somuho['ha_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ha_sn=$total_ak_nojore_madrasa_somuho['ha_sn'] ?>
                                </td>

                            </tr>
           
                            <tr>
                                <td class="tg-y698">মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($ha_sa!=0)?($ha_sa+$ha_br1+$ha_thm+$ha_br2+$ha_wjm+$ha_br3+$ha_upm+$ha_br4+$ha_ssm+$ha_br5+$ha_sn):0?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ha_sa=$total_ak_nojore_madrasa_somuho['ha_sa'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ha_br1=$total_ak_nojore_madrasa_somuho['ha_br1'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ha_thm=$total_ak_nojore_madrasa_somuho['ha_thm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ha_br2=$total_ak_nojore_madrasa_somuho['ha_br2'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ha_wjm=$total_ak_nojore_madrasa_somuho['ha_wjm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ha_br3=$total_ak_nojore_madrasa_somuho['ha_br3'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ha_upm=$total_ak_nojore_madrasa_somuho['ha_upm'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ha_br4=$total_ak_nojore_madrasa_somuho['ha_br4'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ha_ssm=$total_ak_nojore_madrasa_somuho['ha_ssm'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ha_br5=$total_ak_nojore_madrasa_somuho['ha_br5'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ha_sn=$total_ak_nojore_madrasa_somuho['ha_sn'] ?>
                                </td>

                            </tr>

                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
