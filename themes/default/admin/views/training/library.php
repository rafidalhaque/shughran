<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'পাঠাগার' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
               
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/training/library'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>


            </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>	
                            <a class="hidden"  href="#" id="excel" data-action="export_excel">	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
								
								
							<a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('training/library') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('training/library/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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

 //echo "<pre>";
 //print_r($detailinfo);
 //echo "</pre>";
				?></p>

				 
				
				
                <div class="table-responsive">
				
	   
 
	 
	 
	 <table class="table table-bordered" id="testTable1"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_library_' : 'central_library'?>">
<tbody>
<tr>
<td >পাঠাগার</td>
<td >পূর্বসংখ্যা</td>
<td>বর্তমান</td>
<td colspan="2">বৃদ্ধি</td>
<td colspan="2" >ঘাটতি</td>
<td colspan="3">জনশক্তি</td>
	<td colspan="2"><?php echo $totalreader?></td>

 
<td colspan="3" style="background:#ccc">অনলাইন পাঠক</td>
<td colspan="2"><?php echo $detailinfo[0]['online_reader']; ?></td>
</tr>
<tr>
<td >সংখ্যা</td>
<td><?php   $prev_library =  isset($prev[0]['library_number'])? $prev[0]['library_number'] : 0; 
  echo $prev_library;?></td>
<td><?php    echo $prev_library +$detailinfo[0]['library_increase'] - $detailinfo[0]['library_decrease'];?></td>
<td colspan="2"><?php echo $detailinfo[0]['library_increase']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['library_decrease']; ?></td>
<td colspan="3" style="background:#ccc">পাঠক</td>
<td colspan="2"><?php echo $detailinfo[0]['reader']; ?></td>
<td colspan="3">অনলাইনে পঠিত বই</td>
<td colspan="2"><?php echo $detailinfo[0]['online_read_book']; ?></td>
</tr>
<tr>
<td >বই সংখ্যা</td>
<td><?php   $prev_book =  isset($prev[0]['book_number'])? $prev[0]['book_number'] : 0; 
 echo $prev_book;?></td>
<td><?php   echo $prev_book +$detailinfo[0]['book_increase'] - $detailinfo[0]['book_decrease'];?></td>
<td colspan="2"><?php echo $detailinfo[0]['book_increase']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['book_decrease']; ?></td>
<td colspan="3">ইস্যুকৃত বই</td>
<td colspan="2"><?php echo $detailinfo[0]['issued_book']; ?></td>
<td colspan="3">অনলাইনে প্রেরিত বই</td>
<td colspan="2"><?php echo $detailinfo[0]['online_sent_book']; ?></td>
</tr>
<tr>
<td >ব্যক্তিগত</td>
<td><?php   $prev_personal =  isset($prev[0]['personal'])? $prev[0]['personal'] : 0;
   echo $prev_personal;?></td>
<td><?php   echo $prev_personal +$detailinfo[0]['personal_increase'] - $detailinfo[0]['personal_decrease'];?></td>
<td colspan="2"><?php echo $detailinfo[0]['personal_increase']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['personal_decrease']; ?></td>
<td colspan="3">পঠিত বই</td>
<td colspan="2"><?php echo $detailinfo[0]['read_book']; ?></td>
<td colspan="3">অনলাইনে আপলোড</td>
<td colspan="2"><?php echo $detailinfo[0]['online_book_upload']; ?></td>
</tr>
</tbody>
</table>
	 
	 
	 
	 
	 
	 
	 
	 
 		
				
				
				
                   
                

				</div>
            </div>
        </div>
    </div>
</div>
 
