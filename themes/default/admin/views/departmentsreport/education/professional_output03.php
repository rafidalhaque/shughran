<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০৩(সমাজসেবা) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/professional-output03') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/professional-output03/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="3">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="6" style="text-align:center;">কমিশনার </td>
                                <td class="tg-pwj7" colspan="6" style="text-align:center;">সৈনিক  </td>
                                
                            </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="2">সেনা </td>
                                <td class="tg-pwj7" colspan="2">নৌ </td>
                                <td class="tg-pwj7" colspan="2">বিমান</td>
                                <td class="tg-pwj7" colspan="2">সেনা </td>
                                <td class="tg-pwj7" colspan="2">নৌ </td>
                                <td class="tg-pwj7" colspan="2"> বিমান </td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_k_s_target=$total_profesonal_output_3['sodosso_k_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_k_s_orjon=$total_profesonal_output_3['sodosso_k_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_k_n_target=$total_profesonal_output_3['sodosso_k_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_k_n_orjon=$total_profesonal_output_3['sodosso_k_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_k_b_target=$total_profesonal_output_3['sodosso_k_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sodosso_k_b_orjon=$total_profesonal_output_3['sodosso_k_b_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sodosso_s_s_target=$total_profesonal_output_3['sodosso_s_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_s_s_orjon=$total_profesonal_output_3['sodosso_s_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sodosso_s_n_target=$total_profesonal_output_3['sodosso_s_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sodosso_s_n_orjon=$total_profesonal_output_3['sodosso_s_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sodosso_s_b_target=$total_profesonal_output_3['sodosso_s_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $sodosso_s_b_orjon=$total_profesonal_output_3['sodosso_s_b_orjon'] ?>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sathi_k_s_target=$total_profesonal_output_3['sathi_k_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_k_s_orjon=$total_profesonal_output_3['sathi_k_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_k_n_target=$total_profesonal_output_3['sathi_k_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sathi_k_n_orjon=$total_profesonal_output_3['sathi_k_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sathi_k_b_target=$total_profesonal_output_3['sathi_k_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sathi_k_b_orjon=$total_profesonal_output_3['sathi_k_b_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sathi_s_s_target=$total_profesonal_output_3['sathi_s_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sathi_s_s_orjon=$total_profesonal_output_3['sathi_s_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sathi_s_n_target=$total_profesonal_output_3['sathi_s_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sathi_s_n_orjon=$total_profesonal_output_3['sathi_s_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sathi_s_b_target=$total_profesonal_output_3['sathi_s_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $sathi_s_b_orjon=$total_profesonal_output_3['sathi_s_b_orjon'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kormi_k_s_target=$total_profesonal_output_3['kormi_k_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_k_s_orjon=$total_profesonal_output_3['kormi_k_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_k_n_target=$total_profesonal_output_3['kormi_k_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kormi_k_n_orjon=$total_profesonal_output_3['kormi_k_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $kormi_k_b_target=$total_profesonal_output_3['kormi_k_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $kormi_k_b_orjon=$total_profesonal_output_3['kormi_k_b_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $kormi_s_s_target=$total_profesonal_output_3['kormi_s_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $kormi_s_s_orjon=$total_profesonal_output_3['kormi_s_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kormi_s_n_target=$total_profesonal_output_3['kormi_s_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $kormi_s_n_orjon=$total_profesonal_output_3['kormi_s_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $kormi_s_b_target=$total_profesonal_output_3['kormi_s_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $kormi_s_b_orjon=$total_profesonal_output_3['kormi_s_b_orjon'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $somorthok_k_s_target=$total_profesonal_output_3['somorthok_k_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $somorthok_k_s_orjon=$total_profesonal_output_3['somorthok_k_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $somorthok_k_n_target=$total_profesonal_output_3['somorthok_k_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $somorthok_k_n_orjon=$total_profesonal_output_3['somorthok_k_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $somorthok_k_b_target=$total_profesonal_output_3['somorthok_k_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $somorthok_k_b_orjon=$total_profesonal_output_3['somorthok_k_b_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $somorthok_s_s_target=$total_profesonal_output_3['somorthok_s_s_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $somorthok_s_s_orjon=$total_profesonal_output_3['somorthok_s_s_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $somorthok_s_n_target=$total_profesonal_output_3['somorthok_s_n_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $somorthok_s_n_orjon=$total_profesonal_output_3['somorthok_s_n_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $somorthok_s_b_target=$total_profesonal_output_3['somorthok_s_b_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $somorthok_s_b_orjon=$total_profesonal_output_3['somorthok_s_b_orjon'] ?>
                                </td>
                            </tr>    
                            </tr>

                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_s_target!=0)?($sodosso_k_s_target+$sathi_k_s_target+$kormi_k_s_target+$somorthok_k_s_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_s_orjon!=0)?($sodosso_k_s_orjon+$sathi_k_s_orjon+$kormi_k_s_orjon+$somorthok_k_s_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_n_target!=0)?($sodosso_k_n_target+$sathi_k_n_target+$kormi_k_n_target+$somorthok_k_n_target):0?>
                               </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_n_orjon!=0)?($sodosso_k_n_orjon+$sathi_k_n_orjon+$kormi_k_n_orjon+$somorthok_k_n_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_b_target!=0)?($sodosso_k_b_target+$sathi_k_b_target+$kormi_k_b_target+$somorthok_k_b_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_k_b_orjon!=0)?($sodosso_k_b_orjon+$sathi_k_b_orjon+$kormi_k_b_orjon+$somorthok_k_b_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_s_s_target!=0)?($sodosso_s_s_target+$sathi_s_s_target+$kormi_s_s_target+$somorthok_s_s_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_s_s_orjon!=0)?($sodosso_s_s_orjon+$sathi_s_s_orjon+$kormi_s_s_orjon+$somorthok_s_s_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sodosso_s_n_target!=0)?($sodosso_s_n_target+$sathi_s_n_target+$kormi_s_n_target+$somorthok_s_n_target):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sodosso_s_n_orjon!=0)?($sodosso_s_n_orjon+$sathi_s_n_orjon+$kormi_s_n_orjon+$somorthok_s_n_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($sodosso_s_b_target!=0)?($sodosso_s_b_target+$sathi_s_b_target+$kormi_s_b_target+$somorthok_s_b_target):0?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sodosso_s_b_orjon!=0)?($sodosso_s_b_orjon+$sathi_s_b_orjon+$kormi_s_b_orjon+$somorthok_s_b_orjon):0?>
                                </td>
                            </tr>



                            

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
