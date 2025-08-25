<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'উচ্চতর সিলেবাস' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';  $branch_code = $branch->code;?>
               
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/highersyllabus'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span>
            </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                 <li>	
                            <a class="hidden" href="<?= admin_url('highersyllabus/export/'.$branch->id) ?>" >	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
								
							<a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>

				 							
                        </li>	

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('highersyllabus') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('highersyllabus/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
				<p style=" text-align: center; ">সম্পূর্ণ বছরের রিপোর্ট প্রদান করুণ</p>
				 
				<style>
			.table-responsive{width: 100%;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				<div class="row">
					<div class="col-lg-12">
                <div class="table-responsive">
				
	
				 
 <table class="table table-bordered" id="testTable1"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_highersyllabus_' : 'central_highersyllabus'?>">
<tbody>
 
<tr style="background:#ccc">
<td >নং</td>
<td  colspan="3">বিষয়ের নাম</td>
<td>কতজন অধ্যয়ন করেছেন</td>
<td>কতটি বই অধ্যয়ন করেছেন</td>
</tr>
 
 <?php  $total_book  = 0;  foreach($highersyllabuss as $key=>$highersyllabus){?>
  
<tr>
<td><?php echo $key+1;?></td>
<td  colspan="3" style="text-align:left"><?php echo $highersyllabus->highersyllabus_name?></td>
<td class="text-right">
<?php 
 
 $row_info = record_row($highersyllabus_summary,'highersyllabus_id',$highersyllabus->id);
 $reader_number = $row_info['reader_number'];
 $total_book +=$row_info['book_number'];
 
?> 
<a href="#"  class="editable editable-click"  data-id="<?php echo $highersyllabus->id;?>" data-idname="highersyllabus_id"   data-type="number" data-table="highersyllabus_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('highersyllabus/detailupdate');?>" data-name="reader_number" data-title="Enter"><?php echo $row_info['reader_number']=='' ? 0 : $row_info['reader_number'];?></a> 
 

</td>

<td class="text-right">
  
<a href="#"  class="editable editable-click"  data-id="<?php echo $highersyllabus->id;?>" data-idname="highersyllabus_id"   data-type="number" data-table="highersyllabus_record" data-pk="<?php echo $row_info['id'];?>" data-url="<?php echo admin_url('highersyllabus/detailupdate');?>" data-name="book_number" data-title="Enter"><?php echo $row_info['book_number']=='' ? 0 : $row_info['book_number'];?></a> 
 
</td>


</tr>

 <?php  } ?>

 <tr>

<td  colspan="5">মোট বই অধ্যয়ন</td>
 
<td class="text-right">
 <?php echo $total_book;?>
</td>
</tr>

 <tr><td  colspan="6"> </td>
 
</tr>



<tr><td colspan="2"> </td>
<td colspan="2"> </td>
<td> </td>
<td> </td>
 
</tr>


 <tr>
				
			<td  colspan="2">মোট  সদস্য</td>	
			<td  colspan="2">কতজন অধ্যয়ন করেছেন</td>	

			<td>কতটি বই</td>
			<td>গড় বই</td>
			</tr>
			<tr>
			<td  colspan="2">
			<?php  echo $current_member->member;?>
			</td>
			
			<td colspan="2">
			<?php 
	$total_reader = isset($highersyllabusinfo_summary[0]['total_reader']) ? $highersyllabusinfo_summary[0]['total_reader'] : 0;
 
 $id = isset($highersyllabusinfo_summary[0]['id']) ? $highersyllabusinfo_summary[0]['id'] : '';
 

	?>  
		
<a href="#"  class="editable editable-click"     data-type="number" data-table="highersyllabusinfo_record" data-pk="<?php echo $id;?>" data-url="<?php echo admin_url('highersyllabus/detailupdateinfo');?>" data-name="total_reader" data-title="Enter"><?php echo $total_reader;?></a> 
 		
		
		
		</td>
			<td><?php echo $total_book;?></td>
			<td class="text-right"><?php echo ($total_reader!=0) ? round($total_book/$total_reader,2) : 0;?></td>
			
			</tr>

</tbody>
</table>

 


 
				
				
				
				
				
                     
                </div>
           

					</div>
					
					
					 
					
				</div>



				
				
				
		 
	
				
				 


				
		   </div>
        </div>
    </div>
</div>
 
