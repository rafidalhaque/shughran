<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'রেজিস্টার্ড/নন রেজিস্টার্ড সামাজিক সংগঠন রিপোর্ট' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addsocialorganization/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="organization_name">সংগঠনের নাম</label>
                    <?php echo form_input('organization_name', '', 'class="form-control" required="required" id="organization_name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-6 col-sm-6">
                     
                 <div class="form-group">
                                    
									<label for="chairman_name">চেয়ারম্যানের নাম </label>
                    <?php echo form_input('chairman_name', '', 'class="form-control" id="chairman_name"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="reg_no">রেজি: নং</label>
                    <?php echo form_input('reg_no', '', 'class="form-control"  id="reg_no"'); ?>                  
                </div>
				 
                  
                </div>
				
				<div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="contact">ফোন</label>
                    <?php echo form_input('contact', '', 'class="form-control"  id="contact"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				  
                 
                 
            </div>
			
 
  <div class="row">
<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("অফিসের ঠিকানা", "office_address"); ?>
                        <?php echo form_textarea('office_address', '', 'class="form-control" id="office_address" style="height:100px;"'); ?>
                    </div>
                </div>
				 </div>
 
 
 
 
 
 
        </div>
        <div class="modal-footer">
            <?php echo form_submit('socialorganization', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
