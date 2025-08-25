<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'EDIT GUEST'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("guest/editGuest/" . $guest->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            

            <div class="row">
                <div class="col-md-12">
                     
                    <div class="form-group">
                        <?= lang("guest_name", "guest_name"); ?>
                        <?php echo form_input('guest_name', $guest->guest_name, 'class="form-control tip" id="guest_name" required="required"'); ?>
                    </div>
					
					 
					
					<div class="form-group person">
                        <?= lang("priority", "priority"); ?>
                        <?php echo form_input('priority', $guest->priority, 'class="form-control tip" id="priority" required="required"'); ?>
                    </div>
					
					
					<div class="form-group">
                                    <?= lang("শাখা", "branch"); ?>
									
                                    <?php
                                    $wh[''] = lang('select').' '.lang('branch');
                                   
								   foreach ($branches as $branch) 
								   {	
								      
										$wh[$branch->id] = $branch->name;
									
                                   }
                                    echo form_dropdown('branch_id', $wh,  $guest->branch_id, 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
					
					
					
					
					 <div class="form-group">
					 <label for="is_active">
                            <?= 'Active? : '; ?>
                        </label>
                        <input type="checkbox" class="checkbox" value="1" name="is_active" id="is_active" <?= $guest->is_active ? 'checked="checked"' : ''; ?>>
                        
                    </div>
					
					 
					
					 <div class="form-group">
					 <label for="is_current">
                            <?= 'Current? : '; ?>
                        </label>
                        <input type="checkbox" class="checkbox" value="1" name="is_current" id="is_current" <?= ($guest->is_current ==1) ? 'checked="checked"' : ''; ?>>
                        
                    </div>
					
                    
                    
                    

                </div>
                
            </div>
          

        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_guest', 'Edit Guest', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
