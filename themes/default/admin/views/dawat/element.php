<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'দাওয়াতী উপকরণ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
               
       
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
                            <a class="hidden"  href="#" id="excel" data-action="export_excel">	
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
 //print_r($detailinfo);
 //echo "</pre>";
				?></p>

				 
				
				
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
<td colspan="2"><?php echo $detailinfo[0]['quran_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['quran_distribution']; ?></td>
<td colspan="5">কিশোর পত্রিকা বাংলা</td>
<td colspan="4"><?php echo $detailinfo[0]['kishore_bn_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['kishore_bn_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['kishore_bn_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['kishore_bn_client']; ?></td>
</tr>
<tr>
<td colspan="2" >হাদীস</td>
<td colspan="2"><?php echo $detailinfo[0]['hadith_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['hadith_distribution']; ?></td>
<td colspan="5">কিশোর পত্রিকা ইংরেজী</td>
<td colspan="4"><?php echo $detailinfo[0]['kishore_en_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['kishore_en_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['kishore_en_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['kishore_en_client']; ?></td>
</tr>
<tr>
 <td colspan="2">পরিচিতি</td>
<td colspan="2"><?php //echo $detailinfo[0]['porichiti_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['porichiti_distribution']; ?></td>  



<td colspan="5">ছাত্রসংবাদ</td>
<td colspan="4"><?php echo $detailinfo[0]['chhatrasangbad_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['chhatrasangbad_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['chhatrasangbad_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['chhatrasangbad_client']; ?></td>
</tr>
<tr>

<td colspan="2" >সাহিত্য</td>
<td colspan="2"><?php echo $detailinfo[0]['literature_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['literature_distribution']; ?></td>

<td colspan="5">ইংরেজী ম্যাগাজিন</td>
<td colspan="4"><?php echo $detailinfo[0]['eng_mag_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['eng_mag_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['eng_mag_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['eng_mag_client']; ?></td>
</tr>
<tr>

<td colspan="2" >স্টীকার/কার্ড</td>
<td colspan="2"><?php echo $detailinfo[0]['sticker_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['sticker_distribution']; ?></td>
<td colspan="5">সসাস পত্রিকা</td>
<td colspan="4"><?php echo $detailinfo[0]['sosas_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['sosas_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['sosas_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['sosas_client']; ?></td>
</tr>
<tr>

<td colspan="2">রুটিন</td>
<td colspan="2"><?php echo $detailinfo[0]['routine_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['routine_distribution']; ?></td>


<td colspan="5">মাদ্রাসা পত্রিকা</td>
<td colspan="4"><?php echo $detailinfo[0]['madrasha_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['madrasha_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['madrasha_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['madrasha_client']; ?></td>
</tr>
<tr>

<td colspan="2">ক্যালেন্ডার</td>
<td colspan="2"><?php echo $detailinfo[0]['calendar_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['calendar_distribution']; ?></td>


<td colspan="5">স্টুডেন্ট ভিউজ</td>
<td colspan="4"><?php echo $detailinfo[0]['std_view_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['std_view_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['std_view_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['std_view_client']; ?></td>
</tr>
<tr>


<td colspan="2">ডায়েরী/নোটবুক</td>
<td colspan="2"><?php echo $detailinfo[0]['diary_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['diary_distribution']; ?></td>


<td colspan="5">বিজ্ঞান ম্যাগাজিন</td>
<td colspan="4"><?php echo $detailinfo[0]['sci_mag_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['sci_mag_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['sci_mag_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['sci_mag_client']; ?></td>
</tr>
<tr>
<td colspan="2">অন্যান্য</td>
<td colspan="2"><?php echo $detailinfo[0]['cd_sale']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['cd_distribution']; ?></td>
<td colspan="5">শাখা থেকে প্রকাশিত পত্রিকা</td>
<td colspan="4"><?php echo $detailinfo[0]['branch_paper_number']; ?></td>
<td colspan="3"><?php echo $detailinfo[0]['branch_paper_sale']; ?></td>
<td colspan="5"><?php echo $detailinfo[0]['branch_paper_distribution']; ?></td>
<td colspan="2"><?php echo $detailinfo[0]['branch_paper_client']; ?></td>
</tr>
</tbody>
</table>
				
				
				
				
				
                   
                

				</div>
            </div>
        </div>
    </div>
</div>
 
