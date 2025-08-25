<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'দাওয়াত ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

             

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     


                
				<?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/dawat'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
								
							<a href="#" onclick="doit('xlsx','rowspan-colspan-table-1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>	

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('dawat') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
				
	
				 
 



    <table class="table table-bordered" id="rowspan-colspan-table-1"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_' : 'central_dawat'?>">
<tbody>
<tr>
<td colspan="2" >দাওয়াত</td>
<td colspan="3" >পূর্বের সংখ্যা</td>
<td colspan="3">বর্তমান সংখ্যা</td>
<td colspan="2">মোট বৃদ্ধি</td>
<td colspan="2">ব্যক্তিগত দাওয়াত</td>
<td colspan="2">গ্রুপ দাওয়াত</td>
<td>দাওয়াতী গ্রুপ প্রেরন</td>
<!-- <td>স্কুল দাওয়াতী দশক</td> -->
<td>অনলাইন দাওয়াতি সপ্তাহ</td>
<td>উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি সপ্তাহ  </td>
<td>বিশ্ববিদ্যালয় ও অনার্স কলেজ দাওয়াতি সপ্তাহ </td>
<td colspan="2">দাওয়াতী পক্ষ/দশক</td>
<td colspan="2">চলো গ্রামে যাই</td>
<td>মাধ্যমিক দাওয়াতী দশক</td>
<td width="32">কওমি ও হাফেজি মাদরাসা দাওয়াতি সপ্তাহ</td>
<td width="32">টার্গেট</td>
<td width="30">বাস্তবায়ন হার %</td>
<td width="45">ঘাটতি</td>
</tr>
<tr>
<td colspan="2" >সমর্থক
<?php $total_sup = $dawat_personal_n_group[0]['group_dawat_supporter'] +  $dawat_personal_n_group[0]['personal_dawat_supporter'] + $dawatgroupsend[0]['supporter_increase'] + $online_dawat_report[0]['supporter_increase'] + $college_dawat_report[0]['supporter_increase'] + $university_dawat_report[0]['supporter_increase'] + $fortnight_dawat_report[0]['supporter_increase'] + $letgotovillage[0]['supporter_increase']+ $secondary_dawat_report[0]['supporter_increase'] + $madrasha_dawat_report[0]['supporter_increase']; 

//$dawat_summary[0]['personal_dawat_supporter']+ $dawat_summary[0]['group_dawat_supporter']
?>
</td>
<td colspan="3"><?php  if($report_info['prev_record'])  echo $lastyeardawat[0]['supporter'];?></td>
<td colspan="3">
<?php 
 if($report_info['prev_record'])   echo $lastyeardawat[0]['supporter'] + $total_sup - $dawat_summary[0]['supporter_decrease'];
?>
</td>
<td colspan="2">

<?php 
echo $total_sup;
?>
</td>
<td colspan="2"><?php echo $dawat_personal_n_group[0]['personal_dawat_supporter'];?></td>






<td colspan="2"><?php echo $dawat_personal_n_group[0]['group_dawat_supporter'];?></td>
<td><?php echo $dawatgroupsend[0]['supporter_increase'];?></td>
<td><?php echo $online_dawat_report[0]['supporter_increase'];?></td>
<td><?php echo $college_dawat_report[0]['supporter_increase'];?></td>
<td><?php echo $university_dawat_report[0]['supporter_increase'];?></td>
<td colspan="2"><?php echo $fortnight_dawat_report[0]['supporter_increase'];?></td>
<td colspan="2"><?php echo $letgotovillage[0]['supporter_increase'];?></td>

<td><?php echo $secondary_dawat_report[0]['supporter_increase'];?></td>
<td><?php echo $madrasha_dawat_report[0]['supporter_increase'];?></td>

<td><?php
//3:2:1
//$target = $lastyeardawat[0]['member'] * 12 +  $lastyeardawat[0]['associate'] *10+   $lastyeardawat[0]['worker'] *5 ;

 //temporary
 $target = $dawat_summary[0]['supporter_target'];

echo $target;
?></td>
<td>
<?php echo ($target > 0) ? round(100*$total_sup/$target,2) : 0;  
?>

</td>
<td><?php echo $dawat_summary[0]['supporter_decrease'];?></td>
</tr>







<tr>
<td colspan="2">বন্ধু
<?php $total_friend = $dawat_personal_n_group[0]['personal_dawat_friend']+ $dawat_personal_n_group[0]['group_dawat_friend'] + $dawatgroupsend[0]['friend_increase']  + $online_dawat_report[0]['friend_increase'] + $college_dawat_report[0]['friend_increase'] + $university_dawat_report[0]['friend_increase'] + $fortnight_dawat_report[0]['friend_increase'] + $letgotovillage[0]['friend_increase']+ $secondary_dawat_report[0]['friend_increase'] + $madrasha_dawat_report[0]['friend_increase']; 
?>
</td>
<td colspan="3"><?php  if($report_info['prev_record'])  echo $lastyeardawat[0]['friend'];?></td>
<td colspan="3">
<?php 
 if($report_info['prev_record'])  echo $lastyeardawat[0]['friend'] + $total_friend - $dawat_summary[0]['friend_decrease'];
?>
</td>
<td colspan="2">
<?php 
echo $total_friend;
?>

</td>
<td colspan="2"><?php echo $dawat_personal_n_group[0]['personal_dawat_friend'];?></td>
<td colspan="2"><?php echo $dawat_personal_n_group[0]['group_dawat_friend'];?></td>

<td><?php echo $dawatgroupsend[0]['friend_increase'];?></td>
<td><?php echo $online_dawat_report[0]['friend_increase'];?></td>
<td><?php echo $college_dawat_report[0]['friend_increase'];?></td>
<td><?php echo $university_dawat_report[0]['friend_increase'];?></td>
<td colspan="2"><?php echo $fortnight_dawat_report[0]['friend_increase'];?></td>
<td colspan="2"><?php echo $letgotovillage[0]['friend_increase'];?></td>
<td><?php echo $secondary_dawat_report[0]['friend_increase'];?></td>
<td><?php echo $madrasha_dawat_report[0]['friend_increase'];?></td>
<td>
<?php 
//3:2:1
//$target = $lastyeardawat[0]['member'] * 20 +  $lastyeardawat[0]['associate'] *15+   $lastyeardawat[0]['worker'] *10 ;

//temporary
$target = $dawat_summary[0]['friend_target'];
echo $target;
?></td>

<td>
<?php echo ($target > 0) ? round(100*$total_friend/$target,2): 0;  
?>

</td>
<td><?php echo $dawat_summary[0]['friend_decrease'];?></td>
</tr>
<tr>
<td colspan="2" >অমুসলিম সমর্থক
<?php $total_non_sup = $dawat_summary[0]['personal_dawat_non_sup']+ $dawat_summary[0]['group_dawat_non_sup'] + $dawatgroupsend[0]['nonmuslim_supporter_increase'] + $online_dawat_report[0]['nonmuslim_supporter_increase'] + $college_dawat_report[0]['nonmuslim_supporter_increase'] + $university_dawat_report[0]['nonmuslim_supporter_increase'] + $fortnight_dawat_report[0]['nonmuslim_supporter_increase'] + $dawat_summary[0]['letvillage_non_sup']+ $secondary_dawat_report[0]['nonmuslim_supporter_increase'] +$madrasha_dawat_report[0]['nonmuslim_supporter_increase'] ; 
?>
</td>

<td colspan="3"><?php  if($report_info['prev_record'])  echo $lastyeardawat[0]['non_muslim_supporter'];?></td>
<td colspan="3">

<?php 
 if($report_info['prev_record'])  echo $lastyeardawat[0]['non_muslim_supporter'] + $total_non_sup - $dawat_summary[0]['non_sup_decrease'];
?>

</td>
<td colspan="2">

<?php 
echo $total_non_sup;
?>
</td>
<td colspan="2"><?php echo $dawat_summary[0]['personal_dawat_non_sup'];?></td>
<td colspan="2"><?php echo $dawat_summary[0]['group_dawat_non_sup'];?></td>

<td><?php echo $dawatgroupsend[0]['nonmuslim_supporter_increase'];?></td>
<td><?php echo $online_dawat_report[0]['nonmuslim_supporter_increase'];?></td>
<td><?php echo $college_dawat_report[0]['nonmuslim_supporter_increase'];?></td>
<td><?php echo $university_dawat_report[0]['nonmuslim_supporter_increase'];?></td>
<td colspan="2"><?php echo $fortnight_dawat_report[0]['nonmuslim_supporter_increase'];?></td>
<td colspan="2"><?php echo $dawat_summary[0]['letvillage_non_sup'];?></td>
<td><?php echo $secondary_dawat_report[0]['nonmuslim_supporter_increase'];?></td>
<td><?php echo $madrasha_dawat_report[0]['nonmuslim_supporter_increase'];?></td>
<td><?php echo $dawat_summary[0]['non_supporter_target'];?></td>
<td>
<?php 
echo ($dawat_summary[0]['non_supporter_target'] > 0) ? round(100*$total_non_sup/$dawat_summary[0]['non_supporter_target'],2) : 0;
?>
</td>
<td><?php echo $dawat_summary[0]['non_sup_decrease'];?></td>
</tr>
<tr>
<td colspan="2" >অমুসলিম বন্ধু
<?php $total_non_friend = $dawat_summary[0]['personal_dawat_non_friend']+ $dawat_summary[0]['group_dawat_non_friend'] + $dawatgroupsend[0]['nonmuslim_friend_increase']  + $online_dawat_report[0]['nonmuslim_friend_increase'] + $college_dawat_report[0]['nonmuslim_friend_increase'] + $university_dawat_report[0]['nonmuslim_friend_increase'] + $fortnight_dawat_report[0]['nonmuslim_friend_increase'] + $dawat_summary[0]['letvillage_non_friend']+ $secondary_dawat_report[0]['nonmuslim_friend_increase']  + $madrasha_dawat_report[0]['nonmuslim_friend_increase'] ; 
?>
</td>
<td colspan="3"><?php  if($report_info['prev_record'])  echo $lastyeardawat[0]['non_muslim_friend'];?></td>
<td colspan="3">
<?php 
 if($report_info['prev_record'])  echo $lastyeardawat[0]['non_muslim_friend'] + $total_non_friend - $dawat_summary[0]['non_friend_decrease'];
?>
</td>
<td colspan="2">

<?php 
echo $total_non_friend;
?>
</td>
<td colspan="2"><?php echo $dawat_summary[0]['personal_dawat_non_friend'];?></td>
<td colspan="2"><?php echo $dawat_summary[0]['group_dawat_non_friend'];?></td>

<td><?php echo $dawatgroupsend[0]['nonmuslim_friend_increase'];?></td>
<td><?php echo $online_dawat_report[0]['nonmuslim_friend_increase'];?></td>
<td><?php echo $college_dawat_report[0]['nonmuslim_friend_increase'];?></td>
<td><?php echo $university_dawat_report[0]['nonmuslim_friend_increase'];?></td>
<td colspan="2"><?php echo $fortnight_dawat_report[0]['nonmuslim_friend_increase'];?></td>
<td colspan="2"><?php echo $dawat_summary[0]['letvillage_non_friend'];?></td>
<td><?php echo $secondary_dawat_report[0]['nonmuslim_friend_increase'];?></td>
<td><?php echo $madrasha_dawat_report[0]['nonmuslim_friend_increase'];?></td>
<td><?php echo $dawat_summary[0]['non_friend_target'];?></td>
<td>
<?php 
echo ($dawat_summary[0]['non_friend_target'] > 0) ? round(100*$total_non_friend/$dawat_summary[0]['non_friend_target'],2) : 0;
?>
</td>
<td><?php echo $dawat_summary[0]['non_friend_decrease'];?></td>
</tr>
<tr>
<td colspan="2">শুভাকাঙ্খী
<?php $total_ww = $dawat_summary[0]['personal_dawat_ww']+ $dawat_summary[0]['group_dawat_ww'] + $dawatgroupsend[0]['ww_increase']  + $online_dawat_report[0]['ww_increase'] + $college_dawat_report[0]['ww_increase'] + $university_dawat_report[0]['ww_increase'] + $fortnight_dawat_report[0]['ww_increase'] + $letgotovillage[0]['ww_increase']+ $secondary_dawat_report[0]['ww_increase'] + $madrasha_dawat_report[0]['ww_increase']  ; 
?>
</td>
<td colspan="3"><?php  if($report_info['prev_record'])  echo $lastyeardawat[0]['wellwisher'];?></td>
<td colspan="3">
<?php 
 if($report_info['prev_record'])  echo $lastyeardawat[0]['wellwisher'] + $total_ww - $dawat_summary[0]['ww_decrease'];
?>
</td>
<td colspan="2">
<?php 
echo $total_ww;
?>
</td>
<td colspan="2"><?php echo $dawat_summary[0]['personal_dawat_ww'];?></td>
<td colspan="2"><?php echo $dawat_summary[0]['group_dawat_ww'];?></td>

<td><?php echo $dawatgroupsend[0]['ww_increase'];?></td>
<td><?php echo $online_dawat_report[0]['ww_increase'];?></td>
<td><?php echo $college_dawat_report[0]['ww_increase'];?></td>
<td><?php echo $university_dawat_report[0]['ww_increase'];?></td>
<td colspan="2"><?php echo $fortnight_dawat_report[0]['ww_increase'];?></td>
<td colspan="2"><?php echo $letgotovillage[0]['ww_increase'];?></td>
<td><?php echo $secondary_dawat_report[0]['ww_increase'];?></td>
<td><?php echo $madrasha_dawat_report[0]['ww_increase'];?></td>
<td><?php echo $dawat_summary[0]['ww_target'];?></td>
<td>
<?php 
echo ($dawat_summary[0]['ww_target'] > 0) ? round(100*$total_ww/$dawat_summary[0]['ww_target'],2) : 0;
?>
</td>
<td><?php echo $dawat_summary[0]['ww_decrease'];?></td>
</tr>
</tbody>
</table>





 
				
				
				
				
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 
