<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'বায়তুল মাল ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/bm'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/bm'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/bm'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/bm'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>

        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                
						<li>	
                            <a href="<?= admin_url('bm/export').( $this->input->get('type') ?  '?type='.$this->input->get('type') : '') ?>" >	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
                        </li>
				
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('bm') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('bm/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
			.table-responsive{width: 100%;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				<div class="row">
					<div class="col-lg-6">
                <div class="table-responsive">
				
	
				 
 <table class="table table-bordered">
<tbody>
<tr>
<td colspan="3" >আয়</td>
</tr>
<tr>
<td >ক্রম</td>
<td>আয়ের উৎস</td>
<td>পরিমাণ</td>
</tr>
 
 <?php $icount=1; foreach($sources as $source) if($source->type==1 && ( $this->input->get('type') ||  $source->id != 32 )) { ?>
  
<tr>
<td><?php echo $icount++;?></td>
<td style="text-align:left"><?php echo $source->source?></td>
<td class="type_1">
<?php 
$amount = sum_record($bm_summary,'amount',$source->id,'source_id');
 echo $amount;
?> 

</td>
</tr>

 <?php  } ?>

<tr>
<td colspan="2" >সর্বমোট আয় =</td>
<td class="total_1 income"></td>
</tr>
</tbody>
</table>

 


 
				
				
				
				
				
                     
                </div>
           

					</div>
					
					
					<div class="col-lg-6">
               <div class="table-responsive">
				
	
				 
  

				 
 <table class="table table-bordered">
<tbody>
<tr>
<td colspan="3" >ব্যয় </td>
</tr>
<tr>
<td >ক্রম</td>
<td>ব্যয়ের উৎস</td>
<td>পরিমাণ</td>
</tr>
 
 <?php $icount=1; foreach($sources as $source) if($source->type==2 && ( $this->input->get('type') ||  $source->id != 73 )){?>
  
<tr>
<td><?php echo $icount++;?></td>
<td><?php echo $source->source?></td>
<td class="type_2">
<?php 
$amount = sum_record($bm_summary,'amount',$source->id,'source_id');
 echo $amount;
?> 

</td>
</tr>

 <?php  } ?>

<tr>
<td colspan="2" >সর্বমোট ব্যয় </td>
<td class="total_2"></td>
</tr>
<tr>
<td colspan="2" >সর্বমোট আয় </td>
<td class="total_1"></td>
</tr>
<tr>
<td colspan="2" id="Finalamount_label">উদ্বৃত্ত/ঘাটতি  </td>
<td class="Finalamount"></td>
</tr>
</tbody>
</table>

 
 
				
				
				
				
				
                     
                </div>
           

           

					</div>
					
				</div>



				
				
				
				
				
				<div class="row">
					<div class="col-lg-12">
               
           

		   
		   
		   
		   
		   
		  
		   
		   
		   
					</div>
					
					
					 
				</div>


				
		   </div>
        </div>
    </div>
</div>
 
