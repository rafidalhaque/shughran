<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
 .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    cursor: text;
    background-color: #fff;
    opacity: 1;
}
 
 </style>


<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'আদর্শ থানা ঘাটতি' . " (" . $thana->thana_name . ")" ; ?></h4>
        </div>
        
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form','id'=>'decrease_member' , 'autocomplete'=>'off');
        echo admin_form_open_multipart("organization/idealthanadecrease/" . $thana->id, $attrib); ?>
       
	   
		 
		<input type="hidden" value="<?php echo $thana->branch_id; ?>" name="branch_id"/>
		<input type="hidden" value="<?php echo $thana->id; ?>" name="thana_id"/>
		 
		
		<div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">

                 
				
				<div class="col-md-6 col-sm-6">
                     

                    <div class="form-group">
                        <?php echo lang('তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>

                  
                </div>
				
				
				<div class="col-md-6 col-sm-6">
                     
                
                  
                </div>
                 
                 
            </div>
			
			
		 <div class="row">
<div class="col-md-6">
				 
				   
							
				  
					 
					
					
								
								 
								
	 </div>
                 
 </div>




	 		
			
 <div class="row">
<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("মন্তব্য ", "note"); ?>
                        <?php echo form_textarea('note', '', 'class="form-control" id="note" style="height:100px;" required="required" ' ); ?>
                    </div>
                </div>
				 </div>
			 
				 
 		 
				 
        </div>
        <div class="modal-footer">
            <?php echo form_submit('idealthanadecrease', 'Submit', 'class="btn btn-primary idealthanadecrease"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
 <?=$modal_js ?>
 
 