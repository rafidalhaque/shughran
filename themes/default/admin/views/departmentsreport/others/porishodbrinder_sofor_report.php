<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header" style="height:100px;">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'আমীরে জামায়াত, সাবেক কেন্দ্রীয় সভাপতি, সহ-সভাপতি, সেক্রেটারী জেনারেল ও সাবেক পরিষদ সদস্যবৃন্দের সফর রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                        
                        
                        
                        <li>
                            <a href="<?= admin_url('guest/export') ?>" >
                                <i class="fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                            </a>
                        </li>
                         
                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/porishodbrinder-sofor-report') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/porishodbrinder-sofor-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
				
	
				 
 <table class="table table-bordered">
<tbody>
 
<tr>
<td >নং</td>
<td>সফরকারীর নাম</td>
<td>কতবার</td>
<td>প্রোগ্রামের ধরণ</td>
</tr>
 
 <?php
$current_guest = array();

foreach($guest_summary as $row) if($row['guest_type']==1){
	$current_guest[] = $row['guest_id'];
}

 

 foreach($guests as $key=>$guest) if(in_array($guest->id,$current_guest)) {?>
  
<tr>
<td><?php echo $key+1;?></td>
<td><?php echo $guest->guest_name?></td>
<td >
<?php 
$number = sum_record($guest_summary,'number',$guest->id,'guest_id');
 echo $number;
?> 

</td>
<td ></td>
</tr>

 <?php  } ?>

 
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
 
