<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'ফাউন্ডেশন বিভাগ' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addfoundationinfo/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="foundation_name">ফাউন্ডেশন/ট্রাস্ট/এসোসিয়েশন</label>
                    <?php echo form_input('foundation_name', '', 'class="form-control" required="required" id="foundation_name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-6 col-sm-6">
                 
                      
				   <div class="form-group">
				  <label for="registration_from">রেজিস্ট্রিকৃত</label><br/>
                <input type="radio" class="checkbox" name="registration_from" value="Joint Stock Company" ><label 
                                                                                                 class="padding05"><?= 'Joint Stock Company' ?></label>
                <input type="radio" class="checkbox" name="registration_from" value="Social Welfare" "><label 
                                                                                              class="padding05"><?='Social Welfare' ?></label>
                
            </div>
                  
                </div>
                 
				  <div class="col-md-4 col-sm-4">
                     
                
                  
				 
                 
                </div>
				 
                 
            </div>
			
			
			
			
			
			
			
			 <div class="row">

                 
				 
				
				  
                 
				  <div class="col-md-12 col-sm-12">
                     
                
                  
				 
                   <div class="form-group">
				  <label for="ca_audit">সি.এ কতৃক (আয়-ব্যয়) অডিট সম্পন্ন- হ্যাঁ/না</label><br/>
                <input type="radio" class="checkbox" name="ca_audit" value="Yes" ><label 
                                                                                                 class="padding05"><?= 'Yes' ?></label>
                <input type="radio" class="checkbox" name="ca_audit" value="No" "><label 
                                                                                              class="padding05"><?='No' ?></label>
                
            </div>
                </div>
				 
                 
            </div>
			
			
			
			
			
			
			
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     
				  <div class="form-group">
				  <label for="committee_resolution">কমিটি ও রেজুলেশন আপডেট- হ্যাঁ/না</label><br/>
                <input type="radio" class="checkbox" name="committee_resolution" value="Yes" ><label 
                                                                                                 class="padding05"><?= 'Yes' ?></label>
                <input type="radio" class="checkbox" name="committee_resolution" value="No" "><label 
                                                                                              class="padding05"><?='No' ?></label>
                
            </div>
                  
                </div>
				
				<div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="land_area">জমির পরিমান</label>
                    <?php echo form_input('land_area', '', 'class="form-control"  type="number" step=".001" id="land_area"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				  
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="land_to_foundation">ফাউন্ডেশনের নামে জমির পরিমান</label>
                    <?php echo form_input('land_to_foundation', '', 'class="form-control" type="number" step=".001"  id="land_to_foundation"'); ?>                  
                </div>
				 
                  
                </div>
				
				<div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
									<label for="land_to_person">ব্যাক্তির নামে জমির পরিমান</label>
                    <?php echo form_input('land_to_person', '', 'class="form-control" type="number" step=".001"  id="land_to_person"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				  
                 
                 
            </div>
			
 
  
 
			<div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                    
				  
				   <div class="form-group">
				   <label for="land_paper">জমির দলিল পত্রাদি  আপডেট-হ্যাঁ/না</label><br/>
                <input type="radio" class="checkbox" name="land_paper" value="Yes" ><label 
                                                                                                 class="padding05"><?= 'Yes' ?></label>
                <input type="radio" class="checkbox" name="land_paper" value="No" "><label 
                                                                                              class="padding05"><?='No' ?></label>
                
            </div>
				  
                  
                </div>
				
				<div class="col-md-6 col-sm-6">
                 
				 
                  
				   <div class="form-group">
				   <label for="land_tax">নিয়মিত খাজনা দেয়া হয় কিনা?</label> <br/>
                <input type="radio" class="checkbox" name="land_tax" value="Yes" ><label 
                                                                                                 class="padding05"><?= 'Yes' ?></label>
                <input type="radio" class="checkbox" name="land_tax" value="No" "><label 
                                                                                              class="padding05"><?='No' ?></label>
                
            </div>
				  
				  
				  
				  
				  
				  
                </div>
				
				
				  
                 
                 
            </div>
 
 
 
 
 
        </div>
        <div class="modal-footer">
            <?php echo form_submit('foundationinfo', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
