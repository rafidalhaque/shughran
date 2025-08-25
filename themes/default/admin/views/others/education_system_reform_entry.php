<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শিক্ষাব্যবস্থা সংস্কার উপকরণ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; $branch_code = $branch->code; ?>
              
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
     
                <?php  
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/others/education_system_reform'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
								
							<a href="#" onclick="doit('xlsx','testTable2');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_table1') ?> 	</a>	
							<a href="#" onclick="doit('xlsx','testTable3');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_table2') ?> 	</a>	
								
                        </li>	

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('others/education_system_reform') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('others/education_system_reform/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
					<div class="col-lg-12">
                <div class="table-responsive">
				
	
				  <?php $row_info = $education_system_reform_summary[0];?>
 
	 <table class="table table-bordered"  id="testTable2"  data-branch="<?php echo isset($branch_code) ? $branch_code.'_education_system_reform_1_' : 'central_education_system_reform_1'?>">
 
  
  <tbody>
    <tr >
      <td colspan="5">শিক্ষাব্যবস্থা সংস্কার সংক্রান্ত উপকরণ</td>
    </tr>
    <tr >
      <td colspan="5">হার্ডকপি উপকরণ</td>
    </tr>
    <tr >
      <td rowspan="2">উপকরণের নাম</td>
      <td colspan="2">কেন্দ্র থেকে প্রাপ্ত</td>
      <td colspan="2">শাখায় প্রেরণকৃত</td>
    </tr>
    <tr >
      <td>
        <p>কতজনকে</p>
      </td>
      <td>কতটি</td>
      <td>
        <p>কতজনকে</p>
      </td>
      <td>কতটি</td>
    </tr>
    <tr >
      <td>বুকলেট</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="booklet_center_person"
                                                data-title="Enter"><?=$row_info['booklet_center_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="booklet_center_number"
                                                data-title="Enter"><?=$row_info['booklet_center_number']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="booklet_branch_person"
                                                data-title="Enter"><?=$row_info['booklet_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="booklet_branch_number"
                                                data-title="Enter"><?=$row_info['booklet_branch_number']?></a>
      </td>
    </tr>
    <tr >
      <td>ম্যানুয়াল</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="manual_center_person"
                                                data-title="Enter"><?=$row_info['manual_center_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="manual_center_number"
                                                data-title="Enter"><?=$row_info['manual_center_number']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="manual_branch_person"
                                                data-title="Enter"><?=$row_info['manual_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="manual_branch_number"
                                                data-title="Enter"><?=$row_info['manual_branch_number']?></a>
      </td>
    </tr>
    <tr >
      <td>পোস্টার</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="poster_center_person"
                                                data-title="Enter"><?=$row_info['poster_center_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="poster_center_number"
                                                data-title="Enter"><?=$row_info['poster_center_number']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="poster_branch_person"
                                                data-title="Enter"><?=$row_info['poster_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="poster_branch_number"
                                                data-title="Enter"><?=$row_info['poster_branch_number']?></a>
      </td>
    </tr>
    <tr >
      <td>লিফলেট</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="leaflet_center_person"
                                                data-title="Enter"><?=$row_info['leaflet_center_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="leaflet_center_number"
                                                data-title="Enter"><?=$row_info['leaflet_center_number']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="leaflet_branch_person"
                                                data-title="Enter"><?=$row_info['leaflet_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="leaflet_branch_number"
                                                data-title="Enter"><?=$row_info['leaflet_branch_number']?></a>
      </td>
    </tr>
    <tr >
      <td>সামগ্রিক্য ম্যাগাজিন</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="magazine_center_person"
                                                data-title="Enter"><?=$row_info['magazine_center_person']?></a>
      </td>
      <td>
       <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="magazine_center_number"
                                                data-title="Enter"><?=$row_info['magazine_center_number']?></a> 
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="magazine_branch_person"
                                                data-title="Enter"><?=$row_info['magazine_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="magazine_branch_number"
                                                data-title="Enter"><?=$row_info['magazine_branch_number']?></a>
      </td>
    </tr>
    <tr >
      <td>প্রবন্ধ</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="article_center_person"
                                                data-title="Enter"><?=$row_info['article_center_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="article_center_number"
                                                data-title="Enter"><?=$row_info['article_center_number']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="article_branch_person"
                                                data-title="Enter"><?=$row_info['article_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="article_branch_number"
                                                data-title="Enter"><?=$row_info['article_branch_number']?></a>
      </td>
    </tr>
    <tr >
      <td>সংকলন</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="collection_center_person"
                                                data-title="Enter"><?=$row_info['collection_center_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="collection_center_number"
                                                data-title="Enter"><?=$row_info['collection_center_number']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="collection_branch_person"
                                                data-title="Enter"><?=$row_info['collection_branch_person']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="collection_branch_number"
                                                data-title="Enter"><?=$row_info['collection_branch_number']?></a>
      </td>
    </tr>
  </tbody>
</table>
 


 
				
				
				
				
				
                     
                </div>
           

					</div>
					
					
					<div class="col-lg-12">
                <div class="table-responsive">
				
	
				 
 

 
 
				 
 				 
 <table class="table table-bordered" id="testTable3"   data-branch="<?php echo isset($branch_code) ? $branch_code.'_education_system_reform_2_' : 'central_education_system_reform_2'?>">
 
  <tbody>
    <tr>
      <td colspan="3">অনলাইন কনটেন্ট</td>
      <td colspan="3">পত্রিকায় কনটেন্ট</td>
    </tr>
    <tr>
      <td>উপকরণের নাম</td>
      <td>কেন্দ্র থেকে</td>
      <td>শাখা থেকে</td>
      <td>উপকরণের নাম</td>
      <td>কেন্দ্র থেকে</td>
      <td>শাখা থেকে</td>
    </tr>
    <tr>
      <td>ডকুমেন্টারি</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="documentary_center"
                                                data-title="Enter"><?=$row_info['documentary_center']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="documentary_branch"
                                                data-title="Enter"><?=$row_info['documentary_branch']?></a>
      </td>
      <td>প্রবন্ধ</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="article_center"
                                                data-title="Enter"><?=$row_info['article_center']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="article_center"
                                                data-title="Enter"><?=$row_info['article_center']?></a>
      </td>
    </tr>
    <tr>
      <td>কালচারাল কনটেন্ট</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="cultural_content_center"
                                                data-title="Enter"><?=$row_info['cultural_content_center']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="cultural_content_branch"
                                                data-title="Enter"><?=$row_info['cultural_content_branch']?></a>
      </td>
      <td>নিবন্ধ</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="essay_center"
                                                data-title="Enter"><?=$row_info['essay_center']?></a>
      </td>
      <td>
      <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="essay_branch"
                                                data-title="Enter"><?=$row_info['essay_branch']?></a>  
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>কলাম&nbsp;</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="column_center"
                                                data-title="Enter"><?=$row_info['column_center']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="column_branch"
                                                data-title="Enter"><?=$row_info['column_branch']?></a>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>ফিচার</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="feature_center"
                                                data-title="Enter"><?=$row_info['feature_center']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="feature_branch"
                                                data-title="Enter"><?=$row_info['feature_branch']?></a>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>বিবৃতি</td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="statement_center"
                                                data-title="Enter"><?=$row_info['statement_center']?></a>
      </td>
      <td>
        <a href="#" class="editable editable-click" data-type="number"
                                                data-table="education_system_reform" data-pk="<?php echo $row_info['id']; ?>"
                                                data-url="<?php echo admin_url('organization/detailupdate'); ?>"
                                                data-name="statement_branch"
                                                data-title="Enter"><?=$row_info['statement_branch']?></a>
      </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>


 
 
					
				
				
				
                     
                </div>
           

					</div>
					
				</div>



				
				
				
				
			 


				
		   </div>
        </div>
    </div>
</div>
 
