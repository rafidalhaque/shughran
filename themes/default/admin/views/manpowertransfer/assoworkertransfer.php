<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>@font-face {
  font-family: 'SolaimanLipi';
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot');
  src: url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.woff') format('woff'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.ttf') format('truetype'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
       url('<?php echo site_url('assets/solaimanlipi/');?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}
#institution {
    font-family:  SolaimanLipi;
}

#institution td{ padding:2px; text-align: center;}
</style>

<style>
 .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    cursor: text;
    background-color: #fff;
    opacity: 1;
}
 
 </style>


<?php
if (!empty($variants)) {
    foreach ($variants as $variant) {
        $vars[] = addslashes($variant->name);
    }
} else {
    $vars = array();
}
?>
 
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'সাথী প্রার্থী/কর্মী স্থানান্তর'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form','autocomplete'=>'off');
                echo admin_form_open_multipart("manpowertransfer/add", $attrib)
                ?>

                <div class="col-md-6">
                     
                    <div class="form-group">
                        <?= lang("নাম", "name") ?>
						 
                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ''), 'class="form-control" id="name" required="required"'); ?>
                    </div>
					
					
                   
                  
                    
					<div class="form-group">
                        <?= lang('শ্রেণি/বর্ষ', 'sessionyear'); ?>
                        <?= form_input('sessionyear', set_value('sessionyear', ''), 'class="form-control tip" id="sessionyear" required="required" '); ?>
                    </div>

                     
					 
					  
					 
					 
					 
					   
                      
                    <div class="form-group">
                                    <?= lang("দায়িত্ব", "responsibility"); ?>
                                   
								 <?php
                                    $wrt[''] = lang('select').' '.lang('responsibility');
                                    foreach ($responsibilities as $responsibility){
                                           
                                   if( strpos($responsibility->orgstatus_id, '3,') !== false )
                                         $wrt[$responsibility->responsibility] = $responsibility->responsibility;

                                        }
                                   
                                    echo form_dropdown('responsibility', $wrt, (isset($_POST['responsibility']) ? $_POST['responsibility'] : ''), 'id="responsibility"   class="form-control select" style="width:100%;" ');
                                    ?>
								 
								 
								   <?php  //echo  form_input('responsibility', (isset($_POST['responsibility']) ? $_POST['responsibility'] : ''), 'class="form-control" id="responsibility" '); ?>
                                
								
								
								
								</div>
					
                 
					
					
					
                    
					<div class="form-group">
                                    <?= lang("বর্তমান শাখা", "branch"); ?>
                                    <?php
                                    $wh[''] = lang('select').' '.lang('branch');
                                   if($this->Admin || $this->Owner)
								     $flag = 1;
								   else
									   $flag = 2;
								   foreach ($branches as $branch) 
								   {	
								     if($flag == 1)
                                        $wh[$branch->id] = $branch->name;
									 elseif($branch->id==$this->session->userdata('branch_id')) 
										$wh[$branch->id] = $branch->name;
									
                                   }


                                  
                                    echo form_dropdown('branch', $wh, (isset($_POST['branch']) ? $_POST['branch'] : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
								





                       
					<div class="form-group">
                                    <?= lang("যে শাখায় স্থানান্তরিত হবে", "to_branch"); ?>
                                    <?php
                                    $wh = array();
                                    $wh[''] = lang('select').' '.lang('branch');
                                    
								   foreach ($branches as $branch) 
								   {	
								     if($flag == 1)
                                        $wh[$branch->id] = $branch->name;

									 elseif($branch->id != $this->session->userdata('branch_id')) 
										$wh[$branch->id] = $branch->name;
									
                                   }
                                    echo form_dropdown('to_branch', $wh, (isset($_POST['to_branch']) ? $_POST['to_branch'] : ''), 'id="to_branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>         
								
                   <div class="form-group">
                        <?php echo lang('সাথী প্রার্থী/কর্মী হওয়ার তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>
                </div>
               

                <div class="col-md-6">
                     
                   
					
					

                  
					 
					 <div class="form-group">
					 <?= lang('জনশক্তির মান', 'orgstatus_id'); ?>
					 
				<div class="radio">	 
                <input type="radio" class="checkbox" name="orgstatus_id" value="13"
                       id="associatecandidate" <?= 1 ? 'checked="checked"' : ''; ?>/>
				  <label for="associatecandidate" class="padding05"><?= 'সাথী প্রার্থী' ?></label>
				</div>	
					
					<div class="radio">	
                <input type="radio" class="checkbox" name="orgstatus_id" value="3"
                       id="worker" <?= 0 ? 'checked="checked"' : ''; ?>>
					   <label for="worker"  class="padding05"><?= 'কর্মী ' ?></label>
                
						</div>
					</div>
					 
                    
					 
                    <div class="form-group all">
                        <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>
                          
                                    <?php
                                    $it[''] = lang('select').' '.lang('institution_type');
                                    foreach ($institution_types as $institution_type)   
                                        $it[$institution_type->institution_type] = $institution_type->institution_type;
                                   
                                    echo form_dropdown('institution_type', $it, '', 'id="institution_type"  class="form-control select" style="width:100%;" required="required" ');
                                    ?>
                    </div>
					 
					
					 
					  
                      
					 
					
					
					
					
					
				 
								
								
						 	
					 
								
					  
					 
					
					
					
                    
                </div>
                 


				
				
				<div class="col-md-12">
                     

                   
                    

                    <div class="form-group all">
                        <?= lang("notes", "notes") ?>
                        <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : ''), 'class="form-control" id="notes"'); ?>
                    </div>
                    
 

                </div>

               



                  <div class="col-md-12">
                     

                   
                    
 
 
                     <div class="form-group">
                         <?php echo form_submit('add_transfer', 'Save', 'class="btn btn-primary"'); ?>
                     </div>
 
                 </div>





                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('form[data-toggle="validator"]').bootstrapValidator({ excluded: [':disabled'] });
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');
      
         

		 
 $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="token"]').attr('content')
    }
});
		 
	 
        
   

       
        
         
   
  

        var _URL = window.URL || window.webkitURL;
        
        var variants = <?=json_encode($vars);?>;
       
   
       

        
        
    });

 
    
    
     
</script>

 