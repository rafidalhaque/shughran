<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'EDIT'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("others/editadministration/" . $administration->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            

		<div class="row">

                 
				 <div class="col-md-12 col-sm-12">
                     
                
				 <div class="form-group">
                                    
									<label for="administration_name">প্রশাসনিক এলাকার নাম </label>
                    <?php echo form_input('administration_name', $administration->administration_name, 'class="form-control" required="required" id="administration_name"'); ?>                  
                </div>
				 
				
				
				
				
				 <div class="form-group">
                                    
									<label for="administration_id">ধরণ</label>
                                    <?php
                                    $wh[''] = lang('select').' '.'Type';
                                    foreach ($administrations as $adminis)  {
                                        $wh[$adminis->id] = $adminis->administration_type;
                                    }
                                    echo form_dropdown('administration_id', $wh, $administration->administration_id , 'id="administration_id" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
				
				 
				 
				  
								
								
					 


								
                  
                </div>
				
				</div>
				
				
				
				<div class="row">
						<div class="col-md-12">
                    <div class="form-group">
                        <?= lang("কারণ", "note"); ?>
                        <?php echo form_textarea('notes', $administration->notes, 'class="form-control" id="note" style="height:100px;" required="required" '); ?>
                    </div>
                </div>
				 </div>


           
          

        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_administration', 'Edit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
