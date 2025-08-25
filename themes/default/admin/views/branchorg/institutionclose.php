<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Decrease Institution'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/decreaseinstitution/" . $institution->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            

		<div class="row">

                 
				 <div class="col-md-12 col-sm-12">
                     
                
                     <div class="form-group">
                                    
					<label for="institution_name">প্রতিষ্ঠানের নাম</label>
                    <?php echo $institution->institution_name; ?>                  
					</div>
				 
				 
				 
								
								
                    <div class="form-group">
                                    
									<label for="date">বন্ধের তারিখ</label>
                    <?php echo form_input('date', '' , 'class="form-control fixed_date" required="required" id="date"'); ?>                  
					</div>


								
                  
                </div>
				
				</div>
				
				
				
				<div class="row">
						<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("কারণ", "note"); ?>
                        <?php echo form_textarea('notes', $institution->notes, 'class="form-control" id="note" style="height:100px;" required="required" '); ?>
                    </div>
                </div>
				 </div>


           
          

        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_institution', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
