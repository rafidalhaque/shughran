<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'এ সেশনে উপশাখা ঘাটতি' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/adddecreasedsubbranch/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="increase_branch_name">শাখার নাম </label>
                    <?php echo form_input('decrease_branch_name', '', 'class="form-control" required="required" id="increase_branch_name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="member">সদস্য</label>
                    <?php echo form_input('member', '', 'class="form-control" required="required" id="member"'); ?>                  
                </div>
				 
                  
                </div>
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="associate">সাথী</label>
                    <?php echo form_input('associate', '', 'class="form-control" required="required" id="associate"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="worker">কর্মী</label>
                    <?php echo form_input('worker', '', 'class="form-control" required="required" id="worker"'); ?>                  
                </div>
				 
                  
                </div>
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="increase_number">বৃদ্ধির সংখ্যা</label>
                    <?php echo form_input('increase_number', '', 'class="form-control" required="required" id="increase_number"'); ?>                  
                </div>
				 
                  
                </div>
				
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="institutional">প্রাতিষ্ঠানিক</label>
                    <?php echo form_input('institutional', '', 'class="form-control" required="required" id="institutional"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="residential">আবাসিক</label>
                    <?php echo form_input('residential', '', 'class="form-control" required="required" id="residential"'); ?>                  
                </div>
				 
                  
                </div>
                 
                 
            </div>
			
 <div class="row">
<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("ঘাটতির কারন", "process"); ?>
                        <?php echo form_textarea('process', '', 'class="form-control" id="process" style="height:100px;"'); ?>
                    </div>
                </div>
				 </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('decreasedsubbranch', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
