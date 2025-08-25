<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Guest' .  ': Entry'; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id'=>'add_guest');
        echo admin_form_open_multipart("guest/addguest" , $attrib); ?>
       
	   
		  
		
		<div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				 <div class="col-md-6 col-sm-6">
                     
                
                     <div class="form-group">
                                    
					<label for="guest_name">Guest Name</label>
                    <?php echo form_input('guest_name', '', 'class="form-control" required="required" id="guest_name"'); ?>                  
                </div>
				 
                  
                </div>
				
				
				<div class="col-md-3 col-sm-3">
                     
                
                     <div class="form-group">
                                    
						<label for="priority">Priority</label>
                    <?php echo form_input('priority', '', 'class="form-control" type="number" required="required" id="priority"'); ?>                  
             			 
                                </div>
				 
                  
                </div>
                 
				 <div class="col-md-3">	
			<div class="form-group">
                                    <?= lang("শাখা", "branch"); ?>
									
                                    <?php
                                    $wh[''] = lang('select').' '.lang('branch');
                                   
								   foreach ($branches as $branch) 
								   {	
								      
										$wh[$branch->id] = $branch->name;
									
                                   }
                                    echo form_dropdown('branch_id', $wh, (isset($_POST['branch']) ? $_POST['branch'] : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
				</div>
				 
				 
				 
                 
            </div>
 <div class="row">
<div class="col-md-3">
                    <div class="form-group">
                       
					    <label for="is_active">
                            <?= 'Active? :'; ?>
                        </label>
						
                        <input type="checkbox" class="checkbox" value="1" name="is_active" id="is_active" <?= $this->input->post('is_active') ? 'checked="checked"' : ''; ?>>
                        
					
					</div>
                </div>
				
				
				
				
			
				
				
				
				
				
<div class="col-md-3">
                    <div class="form-group">
                       
					    <label for="is_current">
                            <?= 'Current :'; ?>
                        </label>
						
                        <input type="checkbox" class="checkbox" value="1" name="is_current" id="is_current" <?= $this->input->post('is_current') ? 'checked="checked"' : ''; ?>>
                        
					
					</div>
                </div>				
				
				 </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('guest', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?= $modal_js ?>
 

 
<script>

 
 $("#add_guest1").submit(function(e) {


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

