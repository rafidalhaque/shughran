<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০৫(উচ্চশীক্ষা ও আদর্শ কলেজ) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
                            <li><a href="<?= admin_url('departmentsreport/professional-output05') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/professional-output05/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">জনশক্তি</td>
                                <td class="tg-pwj7" colspan="2">এম. ফিল</td>
                                <td class="tg-pwj7" colspan="2">পিএইচডি </td>
                                <td class="tg-pwj7" colspan="2"> বিদেশে উচ্চশীক্ষা  </td>
                                <td class="tg-pwj7" colspan="2">বিদেশে পিএইচডি  </td>
                                <td class="tg-pwj7" colspan="2">বিদেশী স্কলারশীপ  </td>
                                <td class="tg-pwj7" colspan="2">বিদেশী শিক্ষকতা </td>
                                <td class="tg-pwj7" colspan="2">বারএট'ল </td>
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
                                <td class="tg-pwj7 "><div><span>টার্গেট</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> সদস্য	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sodosso_mf_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_mf_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sodosso_mf_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_mf_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sodosso_phd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_phd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sodosso_phd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_phd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sodosso_bush_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bush_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sodosso_bush_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bush_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sodosso_bphd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bphd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sodosso_bphd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bphd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sodosso_bsksh_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bsksh_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sodosso_bsksh_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bsksh_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sodosso_bshk_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bshk_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $sodosso_bshk_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_bshk_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_13">
                                <?php echo $sodosso_brat_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_brat_target'] ?>
                                </td>
                                <td class="tg-0pky  type_14">
                                <?php echo $sodosso_brat_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sodosso_brat_orjon'] ?>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">সাথী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $sathi_mf_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_mf_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $sathi_mf_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_mf_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $sathi_phd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_phd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $sathi_phd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_phd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $sathi_bush_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bush_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $sathi_bush_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bush_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $sathi_bphd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bphd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $sathi_bphd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bphd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $sathi_bsksh_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bsksh_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $sathi_bsksh_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bsksh_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $sathi_bshk_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bshk_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $sathi_bshk_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_bshk_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_13">
                                <?php echo $sathi_brat_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_brat_target'] ?>
                                </td>
                                <td class="tg-0pky  type_14">
                                <?php echo $sathi_brat_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['sathi_brat_orjon'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $kormi_mf_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_mf_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormi_mf_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_mf_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $kormi_phd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_phd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $kormi_phd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_phd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $kormi_bush_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bush_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $kormi_bush_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bush_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $kormi_bphd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bphd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $kormi_bphd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bphd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $kormi_bsksh_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bsksh_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $kormi_bsksh_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bsksh_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $kormi_bshk_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bshk_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $kormi_bshk_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_bshk_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_13">
                                <?php echo $kormi_brat_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_brat_target'] ?>
                                </td>
                                <td class="tg-0pky  type_14">
                                <?php echo $kormi_brat_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['kormi_brat_orjon'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সমর্থক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $somorthok_mf_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_mf_target'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $somorthok_mf_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_mf_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $somorthok_phd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_phd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $somorthok_phd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_phd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $somorthok_bush_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bush_target'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $somorthok_bush_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bush_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $somorthok_bphd_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bphd_target'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $somorthok_bphd_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bphd_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo $somorthok_bsksh_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bsksh_target'] ?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo $somorthok_bsksh_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bsksh_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo $somorthok_bshk_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bshk_target'] ?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo $somorthok_bshk_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_bshk_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_13">
                                <?php echo $somorthok_brat_target=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_brat_target'] ?>
                                </td>
                                <td class="tg-0pky  type_14">
                                <?php echo $somorthok_brat_orjon=$total_profesonal_output_3_uccoshikkha_addarsho_college['somorthok_brat_orjon'] ?>
                                </td>
                            </tr>    
                            </tr>

                                <td class="tg-0pky"> মোট</td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_mf_target!=0)?($sodosso_mf_target+$sathi_mf_target+$kormi_mf_target+$somorthok_mf_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_mf_orjon!=0)? ($sodosso_mf_orjon+$sathi_mf_orjon+$kormi_mf_orjon+$somorthok_mf_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo  ($sodosso_phd_target!=0)?($sodosso_phd_target+$sathi_phd_target+$kormi_phd_target+$somorthok_phd_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_phd_orjon!=0)?($sodosso_phd_orjon+$sathi_phd_orjon+$kormi_phd_orjon+$somorthok_phd_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bush_target!=0)?($sodosso_bush_target+$sathi_bush_target+$kormi_bush_target+$somorthok_bush_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bush_orjon!=0)?($sodosso_bush_orjon+$sathi_bush_orjon+$kormi_bush_orjon+$somorthok_bush_orjon):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bphd_target!=0)?($sodosso_bphd_target+$sathi_bphd_target+$kormi_bphd_target+$somorthok_bphd_target):0?>
                                </td>
                                <td class="tg-0pky">
                                <?php echo ($sodosso_bphd_orjon!=0)?($sodosso_bphd_orjon+$sathi_bphd_orjon+$kormi_bphd_orjon+$somorthok_bphd_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($sodosso_bsksh_target!=0)?($sodosso_bsksh_target+$sathi_bsksh_target+$kormi_bsksh_target+$somorthok_bsksh_target):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($sodosso_bsksh_orjon!=0)?($sodosso_bsksh_orjon+$sathi_bsksh_orjon+$kormi_bsksh_orjon+$somorthok_bsksh_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_11">
                                <?php echo ($sodosso_bshk_target!=0)?($sodosso_bshk_target+$sathi_bshk_target+$kormi_bshk_target+$somorthok_bshk_target):0?>
                                </td>
                                <td class="tg-0pky  type_12">
                                <?php echo ($sodosso_bshk_orjon!=0)?($sodosso_bshk_orjon+$sathi_bshk_orjon+$kormi_bshk_orjon+$somorthok_bshk_orjon):0?>
                                </td>
                                <td class="tg-0pky  type_13">
                                <?php echo ($sodosso_brat_target!=0)?($sodosso_brat_target+$sathi_brat_target+$kormi_brat_target+$somorthok_brat_target):0?>
                                </td>
                                <td class="tg-0pky  type_14">
                                <?php echo ($sodosso_brat_orjon!=0)?($sodosso_brat_orjon+$sathi_brat_orjon+$kormi_brat_orjon+$somorthok_brat_orjon):0?>
                                </td>
                            </tr>         

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 
