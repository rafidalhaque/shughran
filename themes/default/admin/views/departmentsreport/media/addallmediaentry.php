<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'মিডিয়া বিভাগে বিভিন্ন পদে নিয়োগ ঃ' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_institute');
        echo admin_form_open_multipart("departmentsreport/addallmedia/" .$branch_id, $attrib); ?>
       
	   
		<input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id"/>
 
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="media_type">মিডিয়া টাইপ </label>
                    <select id="media_type" name="media_type" class="form-control">
                <option  >Select..</option>
                <option value="Electronics">Electronics</option>
                <option value="Print">Print</option>
                <option value="Online">Online</option>
				<option value="Local Media">Local Media</option>
				</select>
			  </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="post_name">পদের নাম</label>
                    <?php echo form_input('post_name', '', 'class="form-control" required="required" id="post_name"'); ?>                  
                </div>
                      
				 
                  
                </div>
				
                 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="tv">টিভি</label>
                    <?php echo form_input('tv', '', 'class="form-control"   id="tv"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
            </div>
			
			
			 
			 <div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="radio">রেডিও </label>
                    <?php echo form_input('radio', '', 'class="form-control"   id="radio"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="newspaper">পত্রিকা</label>
                    <?php echo form_input('newspaper', '', 'class="form-control"  id="newspaper"'); ?>                  
                </div>
                      
				 
                  
                </div>
				
                 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="publications">সাময়িকী/প্রকাশনা</label>
                    <?php echo form_input('publications', '', 'class="form-control"   id="publications"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
            </div>
			
  <div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="news_portal">নিউজ পের্টাল </label>
                    <?php echo form_input('news_portal', '', 'class="form-control"   id="news_portal"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="community_radio">কমিউনিটি রেডিও</label>
                    <?php echo form_input('community_radio', '', 'class="form-control"  id="community_radio"'); ?>                  
                </div>
                      
				 
                  
                </div>
				
                 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="other">অন্যান্য</label>
                    <?php echo form_input('other', '', 'class="form-control"   id="other"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
            </div>
		


 <div class="row">

                 
				 <div class="col-md-4 col-sm-4">
                     
                
                     <div class="form-group">
                                    
									<label for="category_a">category_a </label>
                    <?php echo form_input('category_a', '', 'class="form-control"   id="category_a"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="category_b">category_b</label>
                    <?php echo form_input('category_b', '', 'class="form-control"  id="category_b"'); ?>                  
                </div>
                      
				 
                  
                </div>
				
                 <div class="col-md-4 col-sm-4">
                     
                 <div class="form-group">
                                    
									<label for="category_c">category_c</label>
                    <?php echo form_input('category_c', '', 'class="form-control"   id="category_c"'); ?>                  
                </div>
                      
				 
                  
                </div>
                 
            </div>
	





		
        </div>
        <div class="modal-footer">
            <?php echo form_submit('allmedia', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
