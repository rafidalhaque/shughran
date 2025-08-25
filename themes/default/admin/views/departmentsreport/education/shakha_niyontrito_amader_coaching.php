<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শাখা নিয়ন্ত্রিত আমাদের কোচিং সংক্রান্ত ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/shakha-niyontrito-amader-coaching') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/shakha-niyontrito-amader-coaching/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7">বিবরণ</td>
                                <td class="tg-pwj7"> ব্যাচ সংখ্যা </td>
                                <td class="tg-pwj7">ছাত্র সংখ্যা </td>
                                <td class="tg-pwj7"> সমস্যা </td>
                                <td class="tg-pwj7"> সম্ভাবনা </td>
                            </tr>


                            <tr>
                                <td class="tg-y698 type_1">৪র্থ-১০ম শ্রেণী</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $coturthodoshcreni_bcs=$total_shakha_niontrito_amader_cocing['coturthodoshcreni_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $coturthodoshcreni_chs=$total_shakha_niontrito_amader_cocing['coturthodoshcreni_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $coturthodoshcreni_soms=$total_shakha_niontrito_amader_cocing['coturthodoshcreni_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $coturthodoshcreni_somvb=$total_shakha_niontrito_amader_cocing['coturthodoshcreni_somvb'] ?>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">একাদশ-দ্বাদশ শ্রেণী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $akadoshdadoshcreni_bcs=$total_shakha_niontrito_amader_cocing['akadoshdadoshcreni_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $akadoshdadoshcreni_chs=$total_shakha_niontrito_amader_cocing['akadoshdadoshcreni_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $akadoshdadoshcreni_soms=$total_shakha_niontrito_amader_cocing['akadoshdadoshcreni_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $akadoshdadoshcreni_somvb=$total_shakha_niontrito_amader_cocing['akadoshdadoshcreni_somvb'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698"> বিশ্ববিদ্যালয় ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $universityvortiecchu_bcs=$total_shakha_niontrito_amader_cocing['universityvortiecchu_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $universityvortiecchu_chs=$total_shakha_niontrito_amader_cocing['universityvortiecchu_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $universityvortiecchu_soms=$total_shakha_niontrito_amader_cocing['universityvortiecchu_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $universityvortiecchu_somvb=$total_shakha_niontrito_amader_cocing['universityvortiecchu_somvb'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">মেডিকেলে ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $medicalevortiecchu_bcs=$total_shakha_niontrito_amader_cocing['medicalevortiecchu_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $medicalevortiecchu_chs=$total_shakha_niontrito_amader_cocing['medicalevortiecchu_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $medicalevortiecchu_soms=$total_shakha_niontrito_amader_cocing['medicalevortiecchu_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $medicalevortiecchu_somvb=$total_shakha_niontrito_amader_cocing['medicalevortiecchu_somvb'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">ইঞ্জিনিয়ারিং ভর্তিচ্ছু </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $engineyaringvortiecchu_bcs=$total_shakha_niontrito_amader_cocing['engineyaringvortiecchu_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $engineyaringvortiecchu_chs=$total_shakha_niontrito_amader_cocing['engineyaringvortiecchu_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $engineyaringvortiecchu_soms=$total_shakha_niontrito_amader_cocing['engineyaringvortiecchu_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $engineyaringvortiecchu_somvb=$total_shakha_niontrito_amader_cocing['engineyaringvortiecchu_somvb'] ?>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">প্রফেশনাল জব </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $profesonaljob_bcs=$total_shakha_niontrito_amader_cocing['profesonaljob_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $profesonaljob_chs=$total_shakha_niontrito_amader_cocing['profesonaljob_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $profesonaljob_soms=$total_shakha_niontrito_amader_cocing['profesonaljob_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $profesonaljob_somvb=$total_shakha_niontrito_amader_cocing['profesonaljob_somvb'] ?>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $onnoanno_bcs=$total_shakha_niontrito_amader_cocing['onnoanno_bcs'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $onnoanno_chs=$total_shakha_niontrito_amader_cocing['onnoanno_chs'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $onnoanno_soms=$total_shakha_niontrito_amader_cocing['onnoanno_soms'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $onnoanno_somvb=$total_shakha_niontrito_amader_cocing['onnoanno_somvb'] ?>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($coturthodoshcreni_bcs!=0)?($coturthodoshcreni_bcs+$akadoshdadoshcreni_bcs+$universityvortiecchu_bcs+$medicalevortiecchu_bcs+$engineyaringvortiecchu_bcs+$profesonaljob_bcs+$onnoanno_bcs):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($coturthodoshcreni_chs!=0)?($coturthodoshcreni_chs+$akadoshdadoshcreni_chs+$universityvortiecchu_chs+$medicalevortiecchu_chs+$engineyaringvortiecchu_chs+$profesonaljob_chs+$onnoanno_chs):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($coturthodoshcreni_soms!=0)?($coturthodoshcreni_soms+$akadoshdadoshcreni_soms+$universityvortiecchu_soms+$medicalevortiecchu_soms+$engineyaringvortiecchu_soms+$profesonaljob_soms+$onnoanno_soms):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($coturthodoshcreni_somvb!=0)?($coturthodoshcreni_somvb+$akadoshdadoshcreni_somvb+$universityvortiecchu_somvb+$medicalevortiecchu_somvb+$engineyaringvortiecchu_somvb+$profesonaljob_somvb+$onnoanno_somvb):0?>
                                </td>
                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
