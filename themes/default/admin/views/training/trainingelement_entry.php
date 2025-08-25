<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'উপকরণ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')';  $branch_code = $branch->code;?>
               
                
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/training/trainingelement'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

		}
		?>
	 
		</ul>
	 </span> 
       
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                  <li>	
                            <a href="#" onclick="doit('xlsx','testTable1');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>	
								
                        </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('training/trainingelement') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('training/trainingelement/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
				
	   
 
	 
	 <table  class="table table-bordered table-striped" id="testTable1"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_training_element_' : 'central_training_element'?>">
	 <thead>
<tr>
<td colspan="2" width="15%">উপকরণ</td>
<td colspan="2" width="15%">উৎস</td>
<td colspan="5">সংখ্যা</td>
<td colspan="8" >বিষয়</td>
</tr>
</thead>

<tbody>

<tr>
<td colspan="2" rowspan="2">পোষ্টার</td>
<td colspan="2" width="84">কেন্দ্র</td>
<td colspan="5">
<a href="#"  class="editable editable-click"   data-type="number" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="poster_from_center" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->poster_from_center;?></a>
 
 </td>
<td colspan="8">
<a href="#"  class="editable editable-click"   data-type="text" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="poster_from_center_topic" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->poster_from_center_topic;?></a>
 

</td>
</tr>
<tr>
<td colspan="2" width="84">শাখা</td>
<td colspan="5">
<a href="#"  class="editable editable-click"   data-type="number" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="poster_from_branch" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->poster_from_branch;?></a>
 </td>
<td colspan="8">
<a href="#"  class="editable editable-click"   data-type="text" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="poster_from_branch_topic" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->poster_from_branch_topic;?></a>
 

</td>
</tr>
<tr>
<td colspan="2" rowspan="2">লিফলেট</td>
<td colspan="2" >কেন্দ্র</td>
<td colspan="5">
<a href="#"  class="editable editable-click"   data-type="number" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="leaflet_from_center" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->leaflet_from_center;?></a>
 </td>
<td colspan="8">
<a href="#"  class="editable editable-click"   data-type="text" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="leaflet_from_center_topic" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->leaflet_from_center_topic;?></a>
 

</td>
</tr>
<tr>
<td colspan="2" >শাখা</td>
<td colspan="5">
<a href="#"  class="editable editable-click"   data-type="number" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="leaflet_from_branch" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->leaflet_from_branch;?></a>
 </td>
<td colspan="8">
<a href="#"  class="editable editable-click"   data-type="text" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="leaflet_from_branch_topic" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->leaflet_from_branch_topic;?></a>
 
</td>
</tr>
<tr>
<td colspan="2" >দাওয়াতী ব্যানার</td>
<td colspan="2">&nbsp;</td>
<td colspan="5">
<a href="#"  class="editable editable-click"   data-type="number" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="dawat_banner" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->dawat_banner;?></a>
 </td>
<td colspan="8">
<a href="#"  class="editable editable-click"   data-type="text" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="dawat_banner_topic" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->dawat_banner_topic;?></a>
 

</td>
</tr>
<tr>
<td colspan="2" >দেয়ালিকা/বুলেটিন</td>
<td colspan="2">&nbsp;</td>
<td colspan="5">
<a href="#"  class="editable editable-click"   data-type="number" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="bulletin" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->bulletin;?></a>
 </td>
<td colspan="8">

<a href="#"  class="editable editable-click"   data-type="text" data-table="trainingelement" data-pk="<?php echo $detailinfo['trainingelementinfo']->id;?>" data-url="<?php echo admin_url('training/detailupdate');?>" data-name="bulletin_topic" data-title="Enter"><?php echo $detailinfo['trainingelementinfo']->bulletin_topic;?></a>
 
</td>
</tr>
</tbody>
</table>
 
 		
				
				
				
                   
                

				</div>
            </div>
        </div>
    </div>
</div>
 
