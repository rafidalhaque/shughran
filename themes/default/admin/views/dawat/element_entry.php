<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'দাওয়াতী উপকরণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; $branch_code = $branch->code;?>
                 

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
    
                
                
                
				<?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
	if($report_info['type']=='annual'){
		echo anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').('?type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
		echo "&nbsp;|&nbsp;";   echo anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
		 echo anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
		echo  "&nbsp;|&nbsp;".anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
		
	}
}

else {

	if($report_info['type']=='annual'){
		 echo    anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
	}
	else{
	  
		echo   anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
		
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

		echo   ' <li>'.anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : ''),'বর্তমান ').' </li>';
		
		for($i = date('Y')-1; $i>=2019; $i-- ){
			echo   ' <li>'.anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').'?type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
		
		echo   ' <li>'.anchor('admin/dawat/element'.( $branch_id ? '/'.$branch_id : '').'?type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
		

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
                            <li><a href="<?= admin_url('dawat/element') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('dawat/element/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
 //print_r($detailinfo['university_dawat_reportinfo']);
 //echo "</pre>";

				?></p>

				 <style>
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				
                <div class="table-responsive">
				
	
	
	
 				 
<table class="table table-bordered"  id="testTable2" data-branch="<?php echo isset($branch_code) ? $branch_code.'_dawat_element_' : 'central_dawat_element'?>">
<tbody>
<tr>
<td colspan="2" >দাওয়াতী উপকরণ</td>
<td colspan="2" >বিক্রয়</td>
<td colspan="3">বিতরণ</td>
<td colspan="5" >দাওয়াতী উপকরণ</td>
<td colspan="4">সংখ্যা</td>
<td colspan="3">বিক্রয়</td>
<td colspan="5">বিতরণ</td>
<td colspan="2">গ্রাহক বৃদ্ধি</td>
</tr>
<tr>
<td colspan="2" >কুরআন</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="quran_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->quran_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="quran_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->quran_distribution;?></a></td>
<td colspan="5">কিশোর পত্রিকা বাংলা</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_bn_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_bn_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_bn_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_bn_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_bn_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_bn_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_bn_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_bn_client;?></a></td>
</tr>

<tr>
<td colspan="2" >হাদীস</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="hadith_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->hadith_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="hadith_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->hadith_distribution;?></a></td>
<td colspan="5">কিশোর পত্রিকা ইংরেজী</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_en_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_en_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_en_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_en_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_en_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_en_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="kishore_en_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->kishore_en_client;?></a></td>
</tr>

 <tr>
  <td colspan="2" >পরিচিতি</td>
<td colspan="2"></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="porichiti_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->porichiti_distribution;?></a></td>  


<td colspan="5">ছাত্রসংবাদ</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasangbad_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->chhatrasangbad_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasangbad_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->chhatrasangbad_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasangbad_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->chhatrasangbad_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="chhatrasangbad_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->chhatrasangbad_client;?></a></td>
</tr>

  <tr>
  <td colspan="2" >সাহিত্য</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="literature_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->literature_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="literature_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->literature_distribution;?></a></td>


<td colspan="5">ইংরেজী ম্যাগাজিন</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="eng_mag_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->eng_mag_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="eng_mag_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->eng_mag_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="eng_mag_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->eng_mag_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="eng_mag_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->eng_mag_client;?></a></td>
            </tr>


 <tr>


 <td colspan="2" >স্টীকার/কার্ড</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sticker_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sticker_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sticker_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sticker_distribution;?></a></td>

<td colspan="5">সসাস পত্রিকা</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sosas_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sosas_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sosas_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sosas_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sosas_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sosas_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sosas_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sosas_client;?></a></td>
</tr>

<tr>

<td colspan="2" >রুটিন</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="routine_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->routine_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="routine_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->routine_distribution;?></a></td>


<td colspan="5">মাদ্রাসা পত্রিকা</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="madrasha_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->madrasha_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="madrasha_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->madrasha_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="madrasha_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->madrasha_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="madrasha_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->madrasha_client;?></a></td>
</tr>


 <tr>


 <td colspan="2" >ক্যালেন্ডার</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="calendar_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->calendar_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="calendar_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->calendar_distribution;?></a></td>

<td colspan="5">স্টুডেন্ট ভিউজ</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="std_view_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->std_view_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="std_view_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->std_view_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="std_view_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->std_view_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="std_view_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->std_view_client;?></a></td>
</tr>
 
<tr>

<td colspan="2" >ডায়েরী/নোটবুক</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="diary_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->diary_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="diary_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->diary_distribution;?></a></td>


<td colspan="5">বিজ্ঞান ম্যাগাজিন</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sci_mag_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sci_mag_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sci_mag_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sci_mag_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sci_mag_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sci_mag_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="sci_mag_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->sci_mag_client;?></a></td>
</tr>

<tr>
<td colspan="2" >অন্যান্য</td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="cd_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->cd_sale;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="cd_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->cd_distribution;?></a></td>



<td colspan="5">শাখা থেকে প্রকাশিত পত্রিকা</td>
<td colspan="4"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="branch_paper_number" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->branch_paper_number;?></a></td>
<td colspan="3"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="branch_paper_sale" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->branch_paper_sale;?></a></td>
<td colspan="5"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="branch_paper_distribution" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->branch_paper_distribution;?></a></td>
<td colspan="2"><a href="#"  class="editable editable-click"   data-type="number" data-table="dawatelement" data-pk="<?php echo $detailinfo['dawatelementinfo']->id;?>" data-url="<?php echo admin_url('dawat/detailupdate');?>" data-name="branch_paper_client" data-title="Enter"><?php echo $detailinfo['dawatelementinfo']->branch_paper_client;?></a></td>
</tr>

 
 
</tbody>
</table>
		
	 
		 
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 

