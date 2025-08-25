<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'বিজ্ঞান ম্যাগাজিন সংক্রান্তঃ' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addsciencemagazine/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="institution">প্রতিষ্ঠানের নাম </label>
                    <?php echo form_input('institution', '', 'class="form-control" required="required" id="institution"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-6 col-sm-6">
                     
                 <div class="form-group">
                                    
									<label for="magazine_number">কতটি ম্যাগাজিন সার্কুলেশন হয় </label>
                    <?php echo form_input('magazine_number', '', 'class="form-control" required="required" id="magazine_number"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="class_number">কতটি ক্লাসে এম্বাসাডর দেয়া হয়েছে</label>
                    <?php echo form_input('class_number', '', 'class="form-control"  id="class_number"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				  
                 
                 
            </div>
			
 
        </div>
        <div class="modal-footer">
            <?php echo form_submit('sciencemagazine', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
