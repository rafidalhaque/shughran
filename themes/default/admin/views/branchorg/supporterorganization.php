<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Support Organization Increase/Decrease'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/supporterorganization/" . $institution->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            

		<div class="row">

                 
				 <div class="col-md-12 col-sm-12">
                     
                
                     <div class="form-group">
                                    
				     <label for="institution_name">প্রতিষ্ঠানের নাম : </label>
                    <?php echo $institution->institution_name; ?>                  
					</div>
				 
				 
			 
								
                    <div class="form-group">
                        <?php echo lang('তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date"  readonly required="required"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo lang('বৃদ্ধি', 'supporter_org_increase'); ?>
                        <div class="controls">
                            <?php echo form_input('supporter_org_increase', $supporter_org_increase, 'class="form-control" required="required"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo lang('ঘাটতি', 'supporter_org_decrease'); ?>
                        <div class="controls">
                            <?php echo form_input('supporter_org_decrease', $supporter_org_decrease, 'class="form-control" required="required"'); ?>
                        </div>
                    </div>
								
                  
                </div>
				
				</div>
				
				
				
				<div class="row">
						<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("মন্তব্য", "note"); ?>
                        <?php echo form_textarea('notes', '', 'class="form-control" id="note" style="height:100px;"   '); ?>
                    </div>
                </div>
				 </div>


           
          

        </div>
        <div class="modal-footer">
            <?php echo form_submit('supporter_organization', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
