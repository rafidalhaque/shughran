<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'বৃদ্ধিকৃত থানা/আদর্শ থানা শাখা' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addstudentunionelection/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                  <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="institution_name">প্রতিষ্ঠানের নাম</label>
                    <?php echo form_input('institution_name', '', 'class="form-control" required="required" id="institution_name"'); ?>                  
                </div>
				 
                  
                </div>
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="single_election">একক নির্বাচন</label>
                    <?php echo form_input('single_election', '', 'class="form-control" required="required" id="single_election"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="united_elction">ঐক্যবদ্ধ নির্বাচন</label>
                    <?php echo form_input('united_elction', '', 'class="form-control" required="required" id="united_elction"'); ?>                  
                </div>
				 
                  
                </div>
                 
                 
            </div>
			
			
			<div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="participated_post">কতটি পদে অংশগ্রহণ</label>
                    <?php echo form_input('participated_post', '', 'class="form-control" required="required" id="participated_post"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="conquested">বিজয়(কয়টি)</label>
                    <?php echo form_input('conquested', '', 'class="form-control" required="required" id="conquested"'); ?>                  
                </div>
				 
                  
                </div>
                 
                 
            </div>
			
			<div class="row">
					<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("পদসমূহের নাম", "post_name"); ?>
                        <?php echo form_textarea('post_name', '', 'class="form-control" id="post_name" style="height:100px;"'); ?>
                    </div>
                </div>
				 </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('studentunionelection', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
