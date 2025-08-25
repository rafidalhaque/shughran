<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রোগ্রাম' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/social-program') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/social-program/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" > প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan="2"> উপস্থিতি   </td>
                                <td class="tg-pwj7" colspan="2">মন্তব্য </td>

                            </tr>

                            <tr>
                                <td class="tg-pwj7 " rowspan="2"><div><span>01</div></td>
                                <td class="tg-0pky " rowspan="2"><div><span> ফ্রী মেডিকেল ট্রিটমেন্ট ক্যাম্প </span></div></td>

                                <td class="tg-0pky "><div><span>আলিয়া</span></div></td>
                                
                                <td class="tg-0pky "><div><span> কাওমি </span></div></td>                                   
                                <td class="tg-0pky "colspan="2" rowspan="2"><div><span>  </span></div></td>
                                        
                            </tr>
                            <tr>
                                <td class="tg-0pky " ><div><span></div></td>
                                <td class="tg-0pky " ><div><span>  </span></div></td>                        
                                
                                        
                            </tr>




                                





                            <tr>
                                <td class="tg-y698">02 </td>
                                <td class="tg-0pky  type_1">
                                এতিম অনাথ শিশুদের মাঝে খাবার বিতরণ
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                
                            </tr>


                            <tr>
                                <td class="tg-y698">03 </td>
                                <td class="tg-0pky  type_1">
                                বিনামূল্যে বই বিতরণ
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2">কতটি</td>
                                <td class="tg-0pky  type_2">
                                
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698">04 </td>
                                <td class="tg-0pky  type_1">
                                বন্যার্তদের সাহায্য
                                </td>
                                <td class="tg-0pky  type_2" colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">05 </td>
                                <td class="tg-0pky  type_1">
                                রাস্তা মেরামত 
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">06 </td>
                                <td class="tg-0pky  type_1">
                                পরিষ্কার পরিচ্ছন্নতা অভিযান 
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698">07 </td>
                                <td class="tg-0pky  type_1">
                                মাদকের বিরুদ্ধে প্রচারণা 
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">08 </td>
                                <td class="tg-0pky  type_1">
                                সুবিধাবঞ্চিত শিশুদের নিয়ে স্কুল ক্রীড়া সামগ্রী বিতরণ 
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_2" colspan="2">কতটি / মোট ছাত্রছাত্রী</td>


                            </tr>
                            <tr>
                                <td class="tg-y698">09 </td>
                                <td class="tg-0pky  type_1">
                                সামাজিক দায়বদ্ধতা জায়গাতে সভা সমাবেশ
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>

                                
                            </tr>
                            <tr>
                                <td class="tg-y698">10 </td>
                                <td class="tg-0pky  type_1">
                                কুরবানী 
                                </td>
                                <td class="tg-0pky  type_2" colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2" colspan="2">
                                
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">11 </td>
                                <td class="tg-0pky  type_1">
                                ঈদ সামগ্রী প্রদান
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                

                            </tr>
                            <tr>
                                <td class="tg-y698" rowspan="2">12 </td>
                                <td class="tg-0pky  type_1" rowspan="2">
                                শিক্ষাবৃত্তি প্রদান 
                                </td>
                                <td class="tg-0pky  type_2"colspan="2" rowspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                কতজনকে
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_2">
                                কত টাকা
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">13 </td>
                                <td class="tg-0pky  type_1">
                                ঈদ সামগ্রী বিতরণ
                                </td>
                                <td class="tg-0pky  type_2"colspan="2">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>
                                <td class="tg-0pky  type_2">
                                
                                </td>

                            </tr>

            




                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
