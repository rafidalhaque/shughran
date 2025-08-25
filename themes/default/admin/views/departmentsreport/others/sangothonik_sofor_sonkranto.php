<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সাংগঠনিক সফর সংক্রান্ত' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/sangothonik-sofor-sonkranto') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/sangothonik-sofor-sonkranto/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" colspan="3">সদস্য সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3">সাথী সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3" >করমী সমাবেশ</td>
                                <td class="tg-pwj7" colspan="3">সুধি সমাবেশ</td>
                                <td class="tg-pwj7" rowspan="3">পরিষদ সদস্য উপস্থিতি ছিলেন কতটি</td>
                                <td class="tg-pwj7" rowspan="3" >অন্যান্য দায়িত্বশীল উপস্থিতি ছিলেন কতটি </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7"  rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7"  colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্যা</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                                <td class="tg-pwj7" rowspan="2">সংখ্য</td>
                                <td class="tg-pwj7" colspan="2">উপস্থিতি</td>
                               
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট</span></div></td>
                                <td class="tg-pwj7 "><div><span>গড়</span></div></td>

                               
                            </tr>




                            <tr>
                                <td class="tg-0pky type_1">
                                    <?php echo $sodsb_s = $total_sangothonik_sofor_sonkarnto['sodsb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $sodsb_up_total = $total_sangothonik_sofor_sonkarnto['sodsb_up_total'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                    <?php echo ($sodsb_up_total!=0)?($sodsb_up_total/$sodsb_s):0?>
                                </td>
                                <td class="tg-0pky  type_3">
                                    <?php echo $satsb_s = $total_sangothonik_sofor_sonkarnto['satsb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                    <?php echo $satsb_up_total = $total_sangothonik_sofor_sonkarnto['satsb_up_total'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo number_format( ($satsb_s!=0)?$satsb_up_total/$satsb_s:0,2)?>
                                   
                                </td>
                                <td class="tg-0pky  type_6">
                                    <?php echo $korsb_s = $total_sangothonik_sofor_sonkarnto['korsb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                    <?php echo $korsb_up_total = $total_sangothonik_sofor_sonkarnto['korsb_up_total'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                    <?php echo ($korsb_up_total!=0)?($korsb_up_total/$korsb_s):0?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_9">
                                    <?php echo $sudhisb_s = $total_sangothonik_sofor_sonkarnto['sudhisb_s'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                    <?php echo $sudhisb_up_total = $total_sangothonik_sofor_sonkarnto['sudhisb_up_total'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_11">
                                    <?php echo ($sudhisb_up_total!=0)?($sudhisb_up_total/$sudhisb_s):0?>
                                </td>
                                <td class="tg-0pky  type_12">
                                    <?php echo $psodupchk = $total_sangothonik_sofor_sonkarnto['psodupchk'] ?>
                                </td>
                                </td>
                                <td class="tg-0pky  type_13">
                                    <?php echo $onnoannodshupchk = $total_sangothonik_sofor_sonkarnto['onnoannodshupchk'] ?>
                                </td>
                           
                            </tr>



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
