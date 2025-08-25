<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'ব্রিজিং প্রজেক্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/bridging-project') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/bridging-project/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">ব্রিজিং প্রজেক্টে শাখার কতজন জনশক্তি(তত্ত্বাবধায়ক)নিযুক্ত হয়েছেন ?</td>
                                <td class="tg-pwj7" colspan="3">কতজন ছাত্রকে নিয়মিত তত্ত্বাবধান করার কথা </td>
                                <td class="tg-pwj7" colspan="3">কতজন ছাত্রকে নিয়মিত তত্ত্বাবধান করা হচ্ছে</td>
                                <td class="tg-pwj7" colspan="2">ইন্টারমিডিয়েট/আলিম ছাত্রদের সাথে যোগাযোগ হয়েছে</td>

                                <td class="tg-pwj7" rowspan="2">কতজন জনশক্তি ইন্টারমেডিয়েট/আলিমের সাধারণ ছাত্র নিশ্চিত করতে পেরেছেন </td>
                                <td class="tg-pwj7" rowspan="2">কতজন জনশক্তি ইন্টারমেডিয়েট/আলিমের সাধারণ ছাত্র নিশ্চিত হয়েছে</td>
                            </tr>

                            <tr>
                               
                                <td class="tg-pwj7 "><div><span>সদস্য</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>সদস্য</span></div></td>
                                <td class="tg-pwj7 "><div><span>সাথী </span></div></td>
                                <td class="tg-pwj7 "><div><span>কর্মী </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট কতজনের সাথে </span></div></td>
                                <td class="tg-pwj7 "><div><span>মোট কতবার হয়েছে </span></div></td>
                                
                               
                            </tr>




                            <tr>
                                <td class="tg-0pky type_1"><?php echo $bpskjnh = $total_dept_bridging_project['bpskjnh'] ?>	</td>
                                <td class="tg-0pky  type_1">
                                    <?php echo $ktjnsntkk_sod = $total_dept_bridging_project['ktjnsntkk_sod'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                 <?php echo $kjsntkk_sat = $total_dept_bridging_project['kjsntkk_sat'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                 <?php echo $kjsntkk_kor = $total_dept_bridging_project['kjsntkk_kor'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                 <?php echo $ktjnsntkh_sod = $total_dept_bridging_project['ktjnsntkh_sod'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                 <?php echo $ktjnsntkh_sat = $total_dept_bridging_project['ktjnsntkh_sat'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                 <?php echo $ktjnsntkh_kor = $total_dept_bridging_project['ktjnsntkh_kor'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                 <?php echo $iassjh_mks = $total_dept_bridging_project['iassjh_mks'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                 <?php echo $iassjh_mkh = $total_dept_bridging_project['iassjh_mkh'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                 <?php echo $kjiassnkp = $total_dept_bridging_project['kjiassnkp'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $kjiassnh = $total_dept_bridging_project['kjiassnh'] ?>
                                </td>
                               
                              
                            </tr>


                           



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
