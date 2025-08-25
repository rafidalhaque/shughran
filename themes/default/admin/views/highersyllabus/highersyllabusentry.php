<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Higher Syllabus' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_highersyllabus');
        echo admin_form_open_multipart("highersyllabus/addhighersyllabus" , $attrib); ?>
       
	   
		  
		
		<div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
					<label for="guest_name">Subject Name</label>
                    <?php echo form_input('highersyllabus_name', '', 'class="form-control" required="required" id="highersyllabus_name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				<div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
						<label for="priority">Priority</label>
                    <?php echo form_input('priority', '', 'class="form-control" type="number" required="required" id="priority"'); ?>                  
             			 
                                </div>
				 
                  
                </div>
                 
                 
            </div>
 <div class="row">
<div class="col-md-12">
                    <div class="form-group">
                       
					    <label for="is_active">
                            <?= 'Active? :'; ?>
                        </label>
						
                        <input type="checkbox" class="checkbox" value="1" name="is_active" id="is_active" <?= $this->input->post('is_active') ? 'checked="checked"' : ''; ?>>
                        
					
					</div>
                </div>
				 </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('highersyllabus', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
<script>

 
 $("#add_highersyllabus1").submit(function(e) {


    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               console.log(data); // show response from the php script.
           }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
 
 

  
 
</script>

