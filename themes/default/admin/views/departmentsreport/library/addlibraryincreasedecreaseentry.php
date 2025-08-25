<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'এ সেশনে পাঠাগার বৃদ্ধি ও ঘাটতি' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addlibraryincreasedecrease/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="thana_name">থানার নাম</label>
                    <?php echo form_input('thana_name', '', 'class="form-control" required="required" id="thana_name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="increase_number">বৃদ্ধির সংখ্যা</label>
                    <?php echo form_input('increase_number', '', 'class="form-control" id="increase_number"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
				  <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="reg_no">ঘাটতি সংখ্যা</label>
                    <?php echo form_input('decrease_number', '', 'class="form-control"  id="decrease_number"'); ?>                  
                </div>
				 
                  
                </div>
				 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="book_decrease">বই ঘাটতি</label>
                    <?php echo form_input('book_decrease', '', 'class="form-control"  id="book_decrease"'); ?>                  
                </div>
				 
                  
                </div>
				
				<div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="book_increase">বই বৃদ্ধি</label>
                    <?php echo form_input('book_increase', '', 'class="form-control"  id="book_increase"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				  
                 
                 
            </div>
			
 
  
 
 
 
 
 
 
        </div>
        <div class="modal-footer">
            <?php echo form_submit('libraryincreasedecrease', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
