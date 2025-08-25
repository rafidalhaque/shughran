<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'সাবেক কেউ কোন এম্বাসীতে যব করে কিনা?' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addembassyjob/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="name">নাম </label>
                    <?php echo form_input('name', '', 'class="form-control" required="required" id="name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-6 col-sm-6">
                     
                 <div class="form-group">
                                    
									<label for="education">এম্বাসী </label>
                    <?php echo form_input('embassy', '', 'class="form-control"  id="embassy"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="last_responsibility">পূর্বের দায়িত্ব</label>
                    <?php echo form_input('last_responsibility', '', 'class="form-control"  id="last_responsibility"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				  
                 
                 
            </div>
			
 <div class="row">
<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("যোগাযোগ", "contact_info"); ?>
                        <?php echo form_textarea('contact_info', '', 'class="form-control" id="contact_info" style="height:100px;"'); ?>
                    </div>
                </div>
				 </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('embassyjob', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
