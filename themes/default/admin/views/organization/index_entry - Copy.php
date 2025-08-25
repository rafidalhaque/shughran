<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>@font-face {
  font-family: 'SolaimanLipi';
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot');
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.woff') format('woff'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.ttf') format('truetype'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}
  
</style>
  
 <style>
 .table-responsive>.fixed-column {
    position: absolute;
    display: inline-block;
    width: auto;
    border-right: 1px solid #ddd;
}
@media(min-width:768px) {
    .table-responsive>.fixed-column {
        display: none;
    }
}


table.dataTable, table.dataTable th, table.dataTable td {
    font-family: SolaimanLipi;
}
 
#example th, #example td {
        white-space: nowrap;
        /*padding-left: 40px !important;
        padding-right: 40px !important;*/
    }
    div.dataTables_wrapper {
         width: 1000px;
        margin: 0 auto;
    }
	

.type_1 .editable-click,
.type_2 .editable-click,
.type_3 .editable-click,
.type_4 .editable-click,
.type_5 .editable-click,
.type_6 .editable-click,
.type_7 .editable-click,
.type_8 .editable-click,
.type_9 .editable-click,
.type_10 .editable-click,
.type_11 .editable-click,
.type_12 .editable-click,
.type_13 .editable-click,
.type_14 .editable-click,
.type_15 .editable-click,
.type_16 .editable-click,
.type_17 .editable-click,
.type_18 .editable-click,
.type_19 .editable-click,
.type_20 .editable-click,
.type_21 .editable-click,
 
.type_23 .editable-click,
.type_24 .editable-click,
.type_25 .editable-click,
.type_26 .editable-click,
.type_27 .editable-click,
.type_28 .editable-click,
 
.type_30 .editable-click,
.type_31 .editable-click,
.type_32 .editable-click,
.type_33 .editable-click,
.type_34 .editable-click 

 {
	
	display:none !important;

}	

 </style>
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সংগঠন ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; $branch_code = $branch->code; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        
            
        <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/organization'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/organization'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
	}

}



	?>
	&nbsp;&nbsp;



	<span class="dropdown">

	<button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		Archive
		<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" aria-labelledby="archive">
		 

		<?php 

		echo   ' <li>'.anchor('admin/organization'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/organization'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>

				
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>
                            <a class="hidden" href="#" id="excel" data-action="export_excel">
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
							
							<a href="#" onclick="doit('xlsx','example');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
							
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

				 
				 
				
				
                
                    <table id="example" class="stripe row-border order-column cell-border
" cellspacing="0" width="100%" data-branch="<?php echo isset($branch_code) ? $branch_code.'_organization_' : 'central_organization'?>">
                        <thead>
                        <tr >
                            <th  colspan="1" rowspan="3"  style='background:#bdb8b2'>সংগঠন</th>
                            <th  colspan="4" rowspan="2"   style='background:#f1ebeb'>প্রতিষ্ঠান</th>
                            <th colspan="5" rowspan="2"style="background:#cad3da">সংগঠন<br /> (যে সকল প্রতিষ্ঠানে কমপক্ষে একটি উপশাখা আছে )</th>
                            <th  colspan="3" rowspan="2" style='background:#eae6e0'>কোন মানের সংগঠন</th>
							<th colspan="4" rowspan="2" >সমর্থক সংগঠন<br />  (সংগঠন নেই এমন প্রতিষ্ঠানের কয়টিতে ন্যূনতম একটি সমর্থক সংগঠন আছে?) </th>
							
                            <th colspan="4" rowspan="2"  style='background:#ded3d3'>মোট উপশাখা সংখ্যা</th>
                            
                            <th colspan="8" style="background: #ccc; text-align:center" >উক্ত ক্যাটাগরির প্রতিষ্ঠানে অধ্যয়নরত জনশক্তি</th>
							
							<th colspan="6" rowspan="2" style="background: #ccc; text-align:center">শাখার অর্ধীনস্থ উক্ত শিক্ষা প্রতিষ্ঠানে অধ্যয়নরত</th>
							
                           
                        </tr>
                        <tr >
                            <th  colspan="2" style="background: #ccc;">কর্মী</th>
                            <th  colspan="2" style="background: #ccc;">সাথী</th>
                            <th  colspan="2" style="background: #ccc;">সদস্য</th>
                            <th  colspan="2" style="background: #ccc;">মোট</th>
                        </tr>
                        <tr >
                            <th style=''>পূর্ব সংখ্যা</th>
                            <th style=''>সংখ্যা</th>
                            <th style=''>বৃৃদ্ধি</th>
                            <th style=''>ঘাটতি</th>
                            <th style="">পূর্ব সংখ্যা</th>
                            <th style="">সংখ্যা</th>
                            <th style="">নেই</th>
                            <th style="">বৃৃদ্ধি</th>
                            <th style="">ঘাটতি</th>
                            <th style='background:#ccc'>থানা</th>
                            <th style='background:#ccc'>ওয়ার্ড</th>
                            <th style='background:#ccc'>উপঃ</th>
                            <th >পূর্ব সংখ্যা</th>
                            <th>সংখ্যা</th>
                            <th>বৃৃদ্ধি</th>
                            <th >ঘাটতি</th>
							
                            <th style=''>পূর্ব সংখ্যা</th>
                            <th style=''>সংখ্যা</th>
                            <th style=''>বৃৃদ্ধি</th>
                            <th style=''>ঘাটতি</th>
							
                            <th style="background: #ccc;">পূর্ব সংখ্যা</th>
                            <th style="background: #ccc;">বর্তমান</th>
                            <th style="background: #ccc;">পূর্ব সংখ্যা</th>
                            <th style="background: #ccc;">বর্তমান</th>
                            <th style="background: #ccc;">পূর্ব সংখ্যা</th>
                            <th style="background: #ccc;">বর্তমান</th>
                            <th style="background: #ccc;">পূর্ব সংখ্যা</th>
                            <th style="background: #ccc;">বর্তমান</th>
							<th style="background: #ccc;">সমর্থক</th>
<th style="background: #ccc;" >অন্যান্য ছাত্র<br />সংগঠনের কর্মী</th>
<th  style="background: #ccc;">মোট ছাত্রী সংখ্যা</th>
<th style="background: #ccc;">ছাত্রী সমর্থক</th>
<th  style="background: #ccc;">অমুসলিম ছাত্র ছাত্রী</th>
<th  style="background: #ccc;">মোট ছাত্র-ছাত্রী সংখ্যা</th>

                        </tr>
						 </thead>
						 <tbody>


                         <?php foreach($institutiontype as $institution_type) { ?>

<tr style="background: aqua;">
<td colspan="1">  <?php echo $institution_type->institution_type;?> </td>  

<?php for($i=1; $i<=34; $i++) { 
echo '<td class="type_"'.$i.'>  </td>';

} ?>

 </tr>





                        <?php foreach($institutions as $key=>$institution) if($institution->type_id == $institution_type->id) {?>
                            <tr >
                                <td colspan="1"><?php echo $institution->institution_type?></td>
                                <td class="type_1">
                                    <?php
                                    $row_info = row_info($org_summary,$institution->id);
                                    $increase = $row_info['institution_increase'];
                                    $prev =  sum_org($org_summary_sma,'institution',$institution->id);
                                    $decrease = $row_info['institution_decrease'];
                                      echo $prev;
                                    ?>
                                </td>
                                <td class="type_2"><?php    echo $prev+$increase-$decrease;?></td>
                                <td class="type_3"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="institution_increase" data-title="Enter"><?php echo $row_info['institution_increase'];?></a></td>
                                <td class="type_4"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="institution_decrease" data-title="Enter"><?php echo $row_info['institution_decrease'];?></a></td>
                                <td class="type_5">
                                    <?php
                                    $increase = $row_info['orgnization_increase'];
                                    $prev =  sum_org($org_summary_sma,'orgnization',$institution->id);
                                    $decrease = $row_info['orgnization_decrease'];
                                      echo $prev;
                                    ?>
                                </td>
                                <td class="type_6"><?php     echo $prev+$increase-$decrease;?></td>
                                <td class="type_7"><?php    echo no_org($nor_org,$institution->id);?></td>
                                <td class="type_8"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="orgnization_increase" data-title="Enter"><?php echo $row_info['orgnization_increase'];?></a></td>
                                <td class="type_9"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="orgnization_decrease" data-title="Enter"><?php echo $row_info['orgnization_decrease'];?></a></td>
                                <td class="type_10"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="thana_org" data-title="Enter"><?php echo $row_info['thana_org'];?></a></td>
                                <td class="type_11"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="ward_org" data-title="Enter"><?php echo $row_info['ward_org'];?></a></td>
                                <td class="type_12"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="unit_org" data-title="Enter"><?php echo $row_info['unit_org'];?></a></td>
                                
								
								
								
								<td class="type_13">
                                    <?php
                                    $increase = $row_info['supporter_org_increase'];
                                    $prev =  sum_org($org_summary_sma,'supporter_org',$institution->id);
                                    $decrease = $row_info['supporter_org_decrease'];
                                      echo $prev;
                                    ?>
                                </td>
                                <td class="type_14"><?php     echo $prev+$increase-$decrease;?></td>
                                <td class="type_15"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="supporter_org_increase" data-title="Enter"><?php echo $row_info['supporter_org_increase'];?></a></td>
                                <td class="type_16"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="supporter_org_decrease" data-title="Enter"><?php echo $row_info['supporter_org_decrease'];?></a></td>
								
								
								
								
								
								
								<td class="type_17">
                                    <?php
                                    $increase = $row_info['unit_increase'];
                                    $prev =  sum_org($org_summary_sma,'unit',$institution->id);
                                    $decrease = $row_info['unit_decrease'];
                                      echo $prev;
                                    ?>
                                </td>
                                <td class="type_18"><?php echo $prev+$increase-$decrease;?></td>
                                <td class="type_19"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="unit_increase" data-title="Enter"><?php echo $row_info['unit_increase'];?></a></td>
                                <td class="type_20"><a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="unit_decrease" data-title="Enter"><?php echo $row_info['unit_decrease'];?></a></td>
								
								
								
								
								
								
                                
								
								
								
								
                                <td class="type_21">
                                    <?php
                                    $prev_w =  sum_org($org_summary_sma,'worker',$institution->id);
                                     echo $prev_w;
                                    ?>
                                </td>
                                <td class="type_22"><?php $worker =  $row_info['worker'];  ?>
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="worker" data-title="Enter"><?php echo $row_info['worker'];?></a>
                                </td>
                                <td class="type_23">
                                    <?php
                                    $prev_a =  sum_org($org_summary_sma,'associate',$institution->id);
                                      echo $prev_a;
                                    ?>
                                </td>
                                <td class="type_24">
                                    <?php $associate = sum_institution($institution_manpower_record,'associate',$institution->id); ?>
                                    <?php echo $associate;?>
                                </td>
                                <td class="type_25">
                                    <?php
                                    $prev_m =  sum_org($org_summary_sma,'member',$institution->id);
                                       echo $prev_m;
                                    ?>
                                </td>
                                <td class="type_26"><?php $member = sum_institution($institution_manpower_record,'member',$institution->id);  ?>
                                    <?php echo $member;?>
                                </td>
                                <td class="type_27"><?php echo $prev_m + $prev_a + $prev_w;?></td>
                                <td class="type_28"><?php echo $member + $associate + $worker;?></td>
                                <td class="type_29">
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="supporter" data-title="Enter"><?php echo $row_info['supporter'];?></a>
                                </td>
                                <td class="type_30">
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="other_std_org" data-title="Enter"><?php echo $row_info['other_std_org'];?></a>
                                </td>
                                <td class="type_31">
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="total_female_std" data-title="Enter"><?php echo $row_info['total_female_std'];?></a>
                                </td>
                                <td class="type_32">
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="female_std_supporter" data-title="Enter"><?php echo $row_info['female_std_supporter'];?></a>
                                </td>
                                <td class="type_33">
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="non_mus_std" data-title="Enter"><?php echo $row_info['non_mus_std'];?></a>
                                </td>
                                <td class="type_34">
                                    <a href="#"  class="editable editable-click"   data-type="number" data-table="organization_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('organization/detailupdate');?>" data-name="total_std" data-title="Enter"><?php echo $row_info['total_std'];?></a>
                                </td>
                            </tr>
                            <?php }?>

                        <?php }?>
                        <tr>
                            <td colspan="1">Total</td>
                            <?php for($i=1;$i<=34;$i++) {?>
<td class="total_<?php echo $i;?>"></td>
<?php }?>
                        </tr>
                        </tbody>
                    </table>
                
            </div>
        </div>
    </div>
</div>
 
