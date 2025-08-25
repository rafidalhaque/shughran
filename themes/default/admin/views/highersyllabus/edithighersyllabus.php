<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Edit Syllabus'; ?></h4>
			
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("highersyllabus/edithighersyllabus/" . $highersyllabus->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            

            <div class="row">
                <div class="col-md-12">
                     
                    <div class="form-group">
                        <?= lang("highersyllabus_name", "highersyllabus_name"); ?>
                        <?php echo form_input('highersyllabus_name', $highersyllabus->highersyllabus_name, 'class="form-control tip" id="highersyllabus_name" required="required"'); ?>
                    </div>
					
					 
					
					<div class="form-group person">
                        <?= lang("priority", "priority"); ?>
                        <?php echo form_input('priority', $highersyllabus->priority, 'class="form-control tip" id="priority" required="required"'); ?>
                    </div>
					
					
					 
					
					
					
					 <div class="form-group">
					 <label for="is_active">
                            <?= 'Active? : '; ?>
                        </label>
                        <input type="checkbox" class="checkbox" value="1" name="is_active" id="is_active" <?= $highersyllabus->is_active ? 'checked="checked"' : ''; ?>>
                        
                    </div>
					
					 
					
					
					
                    
                    
                    

                </div>
                
            </div>
          

        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_highersyllabus', 'Edit Syllabus', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
