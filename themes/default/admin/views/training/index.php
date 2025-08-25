<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'Training' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>	
                            <a href="#" id="excel" data-action="export_excel">	
                                <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>	
                            </a>	
                        </li>	

                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('training') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('training/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
			.table-responsive{width: 1100px;
font: 18px SolaimanLipi, sans-serif;
			overflow: auto;}
			
			
			
				 </style>
				
				
                <div class="table-responsive">
				
	
				 
 


 <table class="table table-bordered">
<tbody>
<tr >
<td  colspan="2" rowspan="3">সংগঠন</td>
<td  colspan="4" rowspan="2" >প্রতিষ্ঠান</td>
<td colspan="5" rowspan="2" >সংগঠন<br /> (যে সকল প্রতিষ্ঠানে কমপক্ষে একটি উপশাখা আছে )</td>
<td  colspan="3" rowspan="2" >কোন মানের সংগঠন</td>
<td colspan="4" rowspan="2">উপশাখা</td>
<td colspan="4" rowspan="2" >সমর্থক সংগঠন</td>
<td colspan="8" >জনশক্তি</td>
<td  rowspan="3">সমর্থক</td>
<td  rowspan="3">অন্যান্য ছাত্র<br />সংগঠনের কর্মী</td>
<td rowspan="3" >মোট ছাত্রী সংখ্যা</td>
<td  rowspan="3">ছাত্রী সমর্থক</td>
<td rowspan="3" >অমুসলিম ছাত্র ছাত্রী</td>
<td  rowspan="3" >মোট ছাত্র-ছাত্রী সংখ্যা</td>
</tr>
<tr >
<td  colspan="2">কর্মী</td>
<td  colspan="2">সাথী</td>
<td  colspan="2">সদস্য</td>
<td  colspan="2">মোট</td>
</tr>
<tr >
<td >পূর্ব সংখ্যা</td>
<td>সংখ্যা</td>
<td >বৃৃদ্ধি</td>
<td >ঘাটতি</td>
<td>পূর্ব সংখ্যা</td>
<td >সংখ্যা</td>
<td >নেই</td>
<td >বৃৃদ্ধি</td>
<td >ঘাটতি</td>
<td >থানা</td>
<td >ওয়ার্ড</td>
<td>উপঃ</td>
<td >পূর্ব সংখ্যা</td>
<td >সংখ্যা</td>
<td >বৃৃদ্ধি</td>
<td >ঘাটতি</td>
<td >পূর্ব সংখ্যা</td>
<td>সংখ্যা</td>
<td>বৃৃদ্ধি</td>
<td >ঘাটতি</td>
<td >পূর্ব সংখ্যা</td>
<td >বর্তমান</td>
<td>পূর্ব সংখ্যা</td>
<td >বর্তমান</td>
<td >পূর্ব সংখ্যা</td>
<td >বর্তমান</td>
<td >পূর্ব সংখ্যা</td>
<td >বর্তমান</td>
</tr>


<?php foreach($institutions as $institution) {?>
<tr >
<td colspan="2"><?php echo $institution->institution_type?></td>
<td class="type_1"> 
<?php 
$increase = sum_org($org_summary,'institution_increase',$institution->id);
$prev =  sum_org($org_summary_sma,'institution',$institution->id); 
$decrease = sum_org($org_summary,'institution_decrease',$institution->id);
echo $prev;
?> 

</td>
<td class="type_2"><?php echo $prev+$increase-$decrease;?></td>
<td class="type_3"><?php echo $increase;?></td>
<td class="type_4"><?php echo $decrease;?></td>


<td class="type_5">
<?php 
$increase = sum_org($org_summary,'orgnization_increase',$institution->id);
$prev =  sum_org($org_summary_sma,'orgnization',$institution->id); 
$decrease = sum_org($org_summary,'orgnization_decrease',$institution->id);
echo $prev;
?>
</td>
<td class="type_6"><?php echo $prev+$increase-$decrease;?></td>
<td class="type_7"><?php echo no_org($nor_org,$institution->id);?></td>
<td class="type_8"><?php echo $increase;?></td>
<td class="type_9"><?php echo $decrease;?></td>



<td class="type_10"><?php echo sum_org($org_summary,'thana_org',$institution->id);?></td>
<td class="type_11"><?php echo sum_org($org_summary,'ward_org',$institution->id);?></td>
<td class="type_12"><?php echo sum_org($org_summary,'unit_org',$institution->id);?></td>





<td class="type_13">
<?php 
$increase = sum_org($org_summary,'unit_increase',$institution->id);
$prev =  sum_org($org_summary_sma,'unit',$institution->id); 
$decrease = sum_org($org_summary,'unit_decrease',$institution->id);
echo $prev;
?>
</td>
<td class="type_14"><?php echo $prev+$increase-$decrease;?></td>
<td class="type_15"><?php echo $increase;?></td>
<td class="type_16"><?php echo $decrease;?></td>

 




<td class="type_17">
<?php 
$increase = sum_org($org_summary,'supporter_org_increase',$institution->id);
$prev =  sum_org($org_summary_sma,'supporter_org',$institution->id); 
$decrease = sum_org($org_summary,'supporter_org_decrease',$institution->id);
echo $prev;
?>
</td>
<td class="type_18"><?php echo $prev+$increase-$decrease;?></td>
<td class="type_19"><?php echo $increase;?></td>
<td class="type_20"><?php echo $decrease;?></td>



 





<td class="type_21">
<?php 
$prev_w =  sum_org($org_summary_sma,'worker',$institution->id); 
echo $prev_w;
?></td>

<td class="type_22"><?php $worker =  sum_org($org_summary,'worker',$institution->id); echo $worker;?></td>
<td class="type_23">
<?php 
$prev_a =  sum_org($org_summary_sma,'associate',$institution->id); 
echo $prev_a;
?></td>
<td class="type_24"><?php $associate = sum_org($org_summary,'associate',$institution->id); echo $associate;?></td>

<td class="type_25">
<?php 
$prev_m =  sum_org($org_summary_sma,'member',$institution->id); 
echo $prev_m;
?></td>

<td class="type_26"><?php $member = sum_org($org_summary,'member',$institution->id); echo $member;?></td>


<td class="type_27"><?php echo $prev_m + $prev_a + $prev_w;?></td>

<td class="type_28"><?php echo $member + $associate + $worker;?></td>


<td class="type_29"><?php echo sum_org($org_summary,'supporter',$institution->id);?></td>
<td class="type_30"><?php echo sum_org($org_summary,'other_std_org',$institution->id);?></td>
<td class="type_31"><?php echo sum_org($org_summary,'total_female_std',$institution->id);?></td>
<td class="type_32"><?php echo sum_org($org_summary,'female_std_supporter',$institution->id);?></td>
<td class="type_33"><?php echo sum_org($org_summary,'non_mus_std',$institution->id);?></td>
<td class="type_34"><?php echo sum_org($org_summary,'total_std',$institution->id);?></td>
</tr>
<?php }?>

<tr>
<td colspan="2">Total</td>
<?php for($i=1;$i<=34;$i++) {?>
<td class="total_<?php echo $i;?>"></td>
<?php }?>


</tr>
</tbody>
</table>


 
				
				
				
				
				
                     
                </div>
            </div>
        </div>
    </div>
</div>
 
