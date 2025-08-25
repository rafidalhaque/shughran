<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'মসজিদ ভিত্তিক কাজ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  



                
				<?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/dawat/mosque'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
                            <li><a href="<?= admin_url('dawat/mosque') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/mosque/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php 

// echo "<pre>";
// print_r($detailinfo);
 //echo "</pre>";
				?></p>

				
				
				
                <div class="table-responsive1">
				
	   
 
	 
	 
				 
<table class="table table-bordered" id="testTable2"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_mosque_' : 'central_dawat_mosque'?>">
<tbody>
<tr>
<td colspan="2" rowspan="2" width="94" style="background:#ccc;">মসজিদ ভিত্তিক কাজ</td>
<td colspan="3" style="background:#ccc;">মোট মসজিদ সংখ্যা</td>
<td colspan="3" style="background:#ccc;">পূর্বে কাজ হতো কতটিতে </td>


<td colspan="4" style="background:#ccc;">  বর্তমানে কাজ হয় কতটিতে </td>

<td colspan="3" style="background:#ccc;"> কাজ বৃদ্ধি কতটিতে</td>

<td colspan="3" style="background:#ccc;"> কাজ ঘাটতি কতটিতে</td>

<td colspan="4"style="background:#ccc;" >দারসে কুরআন</td>
<td colspan="3" style="background:#ccc;">হাদীস পাঠ</td>
<td colspan="4" style="background:#ccc;" >বক্তব্য</td>
<td colspan="3" style="background:#ccc;">অন্যান্য</td>
</tr>
<tr>
<td colspan="3"><?php echo $detailinfo[0]['mosque_number']; ?></td>
<td colspan="3" ><?php $prev = $lastyearmosque[0]['mosque_number']; if($report_info['prev_record'])  echo $prev; ?></td>
<td colspan="3"><?php if($report_info['prev_record'])  echo  $prev + $detailinfo[0]['work_increase_mosque'] - $detailinfo[0]['work_decrease_mosque']; ?></td>


<td colspan="4"><?php echo $detailinfo[0]['work_increase_mosque']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['work_decrease_mosque']; ?></td>
<td colspan="4"><?php echo $detailinfo[0]['dars_quran']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['dars_hadith']; ?></td>
<td colspan="4"><?php echo $detailinfo[0]['lecture']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['other']; ?></td>
</tr>
</tbody>
</table>
				
				
				
				
				
                   
                

				</div>
            </div>
        </div>
    </div>
</div>
 
