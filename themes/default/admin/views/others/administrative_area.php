<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রশাসনিক এলাকা একনজরে ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

             

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     


                
				<?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/others/administrative_area'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
                            <li><a href="<?= admin_url('others/administrative_area') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/administrative_area/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                
                <p class="introtext"><?= 'এখানে আপনার শাখার অন্তর্গত এলাকা ( পৌরসভা /ইউনিয়ন এবং ওয়ার্ড   )।  '; ?></p>

				
				
                <div class="table-responsive">
				
	
				 
 

                


    <table class="table table-bordered" id="rowspan-colspan-table-1"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_' : 'central_dawat'?>">
<tbody>
<tr>
<th class="text-center">স্তর</th>
<th class="text-center">পূর্বের সংখ্যা</th>
<th class="text-center">বর্তমান সংখ্যা</th>
<th class="text-center">বৃদ্ধি</th>
<th class="text-center">ঘাটতি</th>
<th class="text-center"> সমর্থক সংগঠন</th>
</tr>
<tr>
<td>থানা/ উপজেলা</td>
<td></td>
<td></td>
<td ></td>
<td></td>
<td></td>
</tr>
<tr>
<td>পৌরসভা</td>
<td></td>
<td></td>
<td ></td>
<td></td>
<td></td>
</tr>
<tr>
<td>ইউনিয়ন</td>
<td></td>
<td></td>
<td ></td>
<td></td>
<td></td>
</tr>
<tr>
<td>ওয়ার্ড সিটি</td>
<td></td>
<td></td>
<td ></td>
<td></td>
<td></td>
</tr>
<tr>
<td>ওয়ার্ড পৌর</td>
<td></td>
<td></td>
<td ></td>
<td></td>
<td></td>
</tr>
<tr>
<td>ওয়ার্ড ইউনিয়ন</td>
<td></td>
<td></td>
<td ></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>





 
				
				
				
				
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 
