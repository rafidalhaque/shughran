<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 <style>    
   
 </style>
 
<div class="box ">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সংগঠন ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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
  
 
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi;
			overflow: auto;
            
            }
			
			.table-scroll2 {
  overflow-x: auto;
  width: 1024px;
  height: 500px;
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
        width: 1050px;
        /* margin: 0 auto; */
    }
			
				 </style>

			 
				 
 
	 <table   id="example" class="stripe row-border order-column cell-border
" cellspacing="0" width="100%"   data-branch="<?php echo isset($branch_code) ? $branch_code.'_organization_' : 'central_organization'?>">
    <thead>
  <tr >
<th  colspan="1" rowspan="3" style='background:#bdb8b2'>সংগঠন</th>
<th  colspan="4" rowspan="2" style='background:#f1ebeb' >প্রতিষ্ঠান</th>
<th colspan="5" rowspan="2" style="background:#cad3da">সংগঠন<br /> (যে সকল প্রতিষ্ঠানে কমপক্ষে একটি উপশাখা আছে )</th>
<th  colspan="4" rowspan="2" style='background:#eae6e0'>কোন মানের সংগঠন</th>
<th colspan="4" rowspan="2" >       সমর্থক সংগঠন<br />  (সংগঠন নেই এমন প্রতিষ্ঠানের কয়টিতে ন্যূনতম একটি সমর্থক সংগঠন আছে?) </th>

<th colspan="4" rowspan="2" style='background:#ded3d3'>মোট উপশাখা সংখ্যা</th>

<th colspan="8" >উক্ত ক্যাটাগরির প্রতিষ্ঠানে অধ্যয়নরত জনশক্তি</th>

<th colspan="6" rowspan="2" style="background: #bee8ea; text-align:center">শাখার অর্ধীনস্থ উক্ত শিক্ষা প্রতিষ্ঠানে অধ্যয়নরত</th>

</tr>
<tr >
<th  colspan="2">কর্মী</th>
<th  colspan="2">সাথী</th>
<th  colspan="2">সদস্য</th>
<th  colspan="2">মোট</th>
</tr>
<tr >
<th style='background:#f1ebeb'>পূর্ব সংখ্যা</th>
<th style='background:#f1ebeb'>সংখ্যা</th>
<th style='background:#f1ebeb'>বৃৃদ্ধি</th>
<th style='background:#f1ebeb'>ঘাটতি</th>


<th style="background:#cad3da">পূর্ব সংখ্যা</th>
<th style="background:#cad3da">সংখ্যা</th>
<th style="background:#cad3da">নেই</th>
<th style="background:#cad3da">বৃৃদ্ধি</th>
<th style="background:#cad3da">ঘাটতি</th>
<th style='background:#eae6e0'>শাখা</th>
<th style='background:#eae6e0'>থানা</th>
<th style='background:#eae6e0'>ওয়ার্ড</th>
<th style='background:#eae6e0'>উপঃ</th>
<th >পূর্ব সংখ্যা</th>
<th>সংখ্যা</th>
<th>বৃৃদ্ধি</th>
<th >ঘাটতি</th>


<th style='background:#ded3d3'>পূর্ব সংখ্যা</th>
<th style='background:#ded3d3'>সংখ্যা</th>
<th style='background:#ded3d3'>বৃৃদ্ধি</th>
<th style='background:#ded3d3'>ঘাটতি</th>
<th >পূর্ব সংখ্যা</th>
<th >বর্তমান</th>
<th>পূর্ব সংখ্যা</th>
<th >বর্তমান</th>
<th >পূর্ব সংখ্যা</th>
<th >বর্তমান</th>
<th >পূর্ব সংখ্যা</th>
<th >বর্তমান</th>

<th style="background: #bee8ea;">সমর্থক</th>
<th style="background: #bee8ea;" >অন্যান্য ছাত্র<br />সংগঠনের কর্মী</th>
<th  style="background: #bee8ea;">মোট ছাত্রী সংখ্যা</th>
<th style="background: #bee8ea;">ছাত্রী সমর্থক</th>
<th  style="background: #bee8ea;">অমুসলিম ছাত্র ছাত্রী</th>
<th  style="background: #bee8ea;">মোট ছাত্র-ছাত্রী সংখ্যা</th>

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


<?php foreach($institutions as $institution) if($institution->type_id == $institution_type->id) {?>
<tr >
<td colspan="1"><?php echo $institution->institution_type?></td>
<td class="type_1"> 
<?php  
$institution_row = institution_row($institution->id, $institution_number);
 
//var_dump($institution_row );
if($report_info['last_half'] != 1) 
echo $institution_row==null ? 0 :  $institution_row['prev_institution'];
?> 

</td>
<td class="type_2"> <?php if($report_info['last_half'] != 1)  echo $institution_row==null ? 0 :  $institution_row['prev_institution']+$institution_row['increase']-$institution_row['decrease']; ?></td>
<td class="type_3"><?php  echo $institution_row==null ? 0 : $institution_row['increase'];?></td>
<td class="type_4"><?php  echo $institution_row==null ? 0 : $institution_row['decrease'];?></td>


<td class="type_5">
<?php 
if($report_info['last_half'] != 1) 
 echo $organization_prev =  sum_org($org_summary_sma,'orgnization',$institution->id);

//echo " >> ". $institution->id;
?>
</td>

<?php  
$institutioninfo = institution_row($institution->id, $institution_info);
$organizationinfo = institution_row($institution->id, $organization_info);
$supporterorgbutorginfo = institution_row($institution->id, $supporter_org_but_org_info);
 
//var_dump($institution_row );

?> 
<td class="type_6"><?php if($report_info['last_half'] != 1)  echo $organization_prev+ (isset($organizationinfo['increase_organization']) ? $organizationinfo['increase_organization'] : 0) - (isset($organizationinfo['decrease_organization']) ? $organizationinfo['decrease_organization']: 0 ) ?></td>
<td class="type_7"><?php echo $institutioninfo==null ? 0 : $institutioninfo['no_organization']; ?></td>
<td class="type_8"><?php echo $organizationinfo==null ? 0 : $organizationinfo['increase_organization']; ?></td>
<td class="type_9"><?php echo $organizationinfo==null ? 0 : $organizationinfo['decrease_organization']; ?></td>


<td class="type_10"><?php echo $institutioninfo==null ? 0 : $institutioninfo['count_branch']; ?></td>
<td class="type_11"><?php echo $institutioninfo==null ? 0 : $institutioninfo['count_thana']; ?></td>
<td class="type_12"><?php echo $institutioninfo==null ? 0 : $institutioninfo['count_ward']; ?></td>
<td class="type_13"><?php echo $institutioninfo==null ? 0 : $institutioninfo['count_unit']; ?></td>





<td class="type_14">


<?php //echo $supporterorgbutorginfo_prev = $supporterorgbutorginfo ==null ? 0 : $supporterorgbutorginfo['prev_']; ?>

<?php 
  $supporterorgbutorginfo_prev = sum_org($org_summary_sma,'supporter_org',$institution->id);
 if($report_info['last_half'] != 1)  echo  $supporterorgbutorginfo_prev ;
 ?>
</td>
<td class="type_15"><?php if($report_info['last_half'] != 1) echo $supporterorgbutorginfo_prev + ( isset($supporterorgbutorginfo['support_increase_but_org']) ? $supporterorgbutorginfo['support_increase_but_org'] : 0) - ( isset($supporterorgbutorginfo['support_decrease_but_org']) ? $supporterorgbutorginfo['support_decrease_but_org'] : 0) ; ?></td>
<td class="type_16"><?php echo $supporterorgbutorginfo==null ? 0 : $supporterorgbutorginfo['support_increase_but_org']; ?></td>
<td class="type_17"><?php echo $supporterorgbutorginfo==null ? 0 : $supporterorgbutorginfo['support_decrease_but_org']; ?></td>

 




<td class="type_18">
<?php //echo $institutioninfo==null ? 0 : $institutioninfo['unit_prev']; ?>

<?php 
if($report_info['last_half'] != 1)
 echo    sum_org($org_summary_sma,'unit',$institution->id);
 ?>

</td>
<td class="type_19"><?php if($report_info['last_half'] != 1) echo $institutioninfo==null ? 0 : $institutioninfo['current_unit']; ?></td>
<td class="type_20"><?php echo $institutioninfo==null ? 0 : $institutioninfo['unit_increase']; ?></td>
<td class="type_21"><?php echo $institutioninfo==null ? 0 : $institutioninfo['unit_decrease']; ?></td>



 





<td class="type_22">
<?php 
$prev_w =  sum_org($org_summary_sma,'worker',$institution->id); 
echo $prev_w;
?>
</td>

<td class="type_23">
    
<?php   $worker =  sum_org($org_summary,'worker',$institution->id); 
 
?>
 <?php echo $worker;?></td>
                




</td>


<td class="type_24">
<?php 
$prev_a =  sum_org($org_summary_sma,'associate',$institution->id); 
echo $prev_a;
?></td>
<td class="type_25">
    <?php $associate = sum_institution($institution_manpower_record,'associate',$institution->id); echo $associate;?></td>

<td class="type_26">
<?php 
$prev_m =  sum_org($org_summary_sma,'member',$institution->id); 
echo $prev_m;
?></td>

<td class="type_27"><?php $member = sum_institution($institution_manpower_record,'member',$institution->id); echo $member;?></td>


<td class="type_28"><?php echo $prev_m + $prev_a + $prev_w;?></td>

<td class="type_29"><?php echo $member + $associate + $worker;?></td>


<td class="type_30"><?php echo $institutioninfo==null ? 0 : $institutioninfo['supporter']; ?></td>
<td class="type_31"><?php echo $institutioninfo==null ? 0 : $institutioninfo['other_org_worker']; ?></td>
<td class="type_32"><?php echo $institutioninfo==null ? 0 : $institutioninfo['total_female_student']; ?></td>
<td class="type_33"><?php echo $institutioninfo==null ? 0 : $institutioninfo['female_student_supporter']; ?></td>
<td class="type_34"><?php echo $institutioninfo==null ? 0 : $institutioninfo['non_muslim_student']; ?></td>
<td class="type_35"><?php echo $institutioninfo==null ? 0 : $institutioninfo['total_student_number']; ?></td>
</tr>
<?php }?>
<?php }?>



 <tr>
<td colspan="1">Total</td>
<?php for($i=1;$i<=35;$i++) {?>
<td class="total_<?php echo $i;?>"></td>
<?php }?>


</tr>
</tbody>


</table>
				 
				 
 		 
				 
				 
				
               
           


		   </div>
        </div>
    </div>
</div>
 
