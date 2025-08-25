<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Increase Organization'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/increaseorganization/" . $institution->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            

		<div class="row">

                 
				 <div class="col-md-12 col-sm-12">
                     
                
                     <div class="form-group">
                                    
				 <label for="institution_name">প্রতিষ্ঠানের নাম : </label>
                    <?php echo $institution->institution_name; ?>                  
					</div>
				 
                    </div>

                  
                    <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <?php echo lang('তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date"  readonly required="required"'); ?>
                        </div>
                    </div>
                    </div>
                   
                   
                    <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <?php echo lang('কোন মানের সংগঠন', 'org_type'); ?>
                        <div class="controls">

                        <?php
                                    $whp[''] = lang('select');
                                    
                                    $whp['branch'] = 'শাখা';
                                    $whp['thana'] = 'থানা';
                                    $whp['ward'] = 'ওয়ার্ড';
                                    $whp['unit'] = 'উপশাখা';

                                    echo form_dropdown('org_type', $whp, (isset($_POST['org_type']) ? $_POST['org_type'] : ''), 'id="org_type" required="required" class="form-control skip" style="width:100%;" ');
                                    ?>

                            
                        </div>


                        
                    </div>
                    </div>



                    <div class="col-md-4 col-sm-4">				
                    <div class="form-group">
                        <?php echo lang('উপশাখা', 'unit_increase'); ?>
                        <div class="controls">
                            <?php echo form_input(array('name'=>'unit_increase', 'type'=>'number'), '', 'class="form-control" type="number" min="1" step="1" required="required"'); ?>
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
            <?php echo form_submit('edit_institution', 'Edit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
