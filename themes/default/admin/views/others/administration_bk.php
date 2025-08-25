<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রশাসনিক বিবরণ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
       
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     


                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/others/administration'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
								
							<a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/administration') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/administration/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

				 
				<style>
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				
                <div class="table-responsive">
				
	
				 
 
 
 
 <table class="table table-bordered" id="testTable2" data-branch="<?php echo isset($branch_code) ? $branch_code.'_administration_' : 'central_administration'?>">
<tbody>
<tr >
<td  colspan="6">প্রশাসনিক বিবরণঃ</td>
<td  colspan="5" >সংগঠন</td>
<td  colspan="9" style="background:#ccc">কোন মানের সংগঠন</td>
<td style="height: 36px; background:#ccc" colspan="2" rowspan="2" width="86" >সংগঠন নেই এমন কতটিতে ন্যূনতম একটি সমর্থক সংগঠন আছে?</td>
</tr>
<tr >
<td  colspan="2">&nbsp;</td>



<td  style="background:#ccc">পূর্ব</td>
<td  style="background:#ccc">বর্তমান সংখ্যা</td>
<td  style="background:#ccc">বৃদ্ধি</td>
<td  style="background:#ccc">ঘাটতি</td>







<td >পূর্ব </td>
<td >বর্তমান সংখ্যা</td>
<td >বৃদ্ধি</td>
<td >ঘাটতি</td>
<td >নেই</td>
<td  colspan="2" style="background:#ccc">শাখা</td>
<td  colspan="2" style="background:#ccc">থানা</td>
<td  colspan="2" style="background:#ccc">ওয়ার্ড</td>
<td  colspan="3" style="background:#ccc">উপশাখা</td>
</tr>


<?php foreach($administrations as $administration) {?>
<tr >
<td colspan="2"><?php echo $administration->administration_type?></td>

<td  >
<?php
$increase = sum_record($administration_summary,'organization_increase',$administration->id,'administration_id');
//$prev =     sum_record($administration_summary,'prev',$administration->id,'administration_id'); 
$decrease = sum_record($administration_summary,'organization_decrease',$administration->id,'administration_id');

$administrative_increase =     sum_record($administration_summary,'administrative_increase',$administration->id,'administration_id'); 
$administrative_decrease =     sum_record($administration_summary,'administrative_decrease',$administration->id,'administration_id'); 
$administrative_prev = administrative_details_prev($prev,'administration',$administration->id); 
 
$org_prev   = administrative_details_prev($prev,'organization',$administration->id);
 
 


if($report_info['prev_record'])
 echo $administrative_prev;


?>
</td>
<td><?php if($report_info['prev_record'])  echo $administrative_prev + $administrative_increase - $administrative_decrease;?></td>
<td><?php  echo $administrative_increase;?></td>
<td><?php  echo $administrative_decrease;?></td>


<td><?php 
if($report_info['prev_record'])
echo $org_prev;
?></td>
<td><?php 
if($report_info['prev_record'])
echo $org_prev+$increase-$decrease;
?></td>
<td><?php echo $increase;?></td>
<td><?php echo $decrease;?></td>
<td ><?php echo no_org_total($nor_org,'administration_id',$administration->id);?></td>

<td  colspan="2">
<?php 
echo sum_record($administration_summary,'branch',$administration->id,'administration_id');
?>
</td>

<td  colspan="2">
<?php 
echo org_info($org_info, 1, $administration->id);
?>
</td>


<td  colspan="2">
<?php 
echo org_info($org_info, 2, $administration->id);
?>
</td>
<td  colspan="3">
<?php 
echo org_info($org_info, 3, $administration->id);
?>
</td>
<td  colspan="2">
<?php 
echo sum_record($administration_summary,'supporter_org',$administration->id,'administration_id');
?>
</td>
</tr>
<?php }?>
</tbody>
</table>
 
 
 
 
				
				
				
				
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 
