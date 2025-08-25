<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Confirm Report'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form','id'=>'confirm');
        echo admin_form_open("confirmreport/add", $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            <div class="row">
                <div class="col-sm-6">
                      <div class="form-group">
                                    <?= lang("branch", "branch"); ?>
                                    <?php
                                    $wh[''] = lang('select').' '.lang('branch');
                                    foreach ($branches as $branch) {
                                        $wh[$branch->id] = $branch->name;
                                    }
                                    echo form_dropdown('branch_id', $wh, (isset($_POST['branch']) ? $_POST['branch'] : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
								
								
                </div>
                <div class="col-sm-6">
                     <div class="form-group">
                                    <?= lang("report_type", "Type"); ?>
                                    <?php
                                    $rt[''] = lang('select').' Type';
									$types =  array(
									array('id'=>$report_type,'name'=>$report_type) 
									);
									 
									
                                    foreach ($types as $type) {
                                        $rt[$type['id']] = ucfirst($type['name']);
                                    }
                                    echo form_dropdown('report_type', $rt, (isset($_POST['report_type']) ? $_POST['report_type'] : ''), 'id="report_type" required="required" class="form-control select" style="width:100%;" ');
                                    ?>
                                </div>
                </div>
            </div>

            <div class="form-group">
                <?php echo lang('comment', 'comment'); ?>
                <div class="controls">
                    <?php echo form_textarea($comment); ?>
                </div>
            </div>

          <div class="form-group">
             
			  <?php echo lang('Year', 'year'); ?>
                <div class="controls">
				 <?php 
				 

$input_data = array(
  'name' => 'year',
  'id' => 'year',
  'value'=>$year,
  'class' => 'form-control',
  'type' => 'number',    
 'pattern' => ".{4,}" ,
  'title' => 'Enter year',
'required' => 'required' 
);
 
echo form_input($input_data);

  ?>
                      
                     
                </div>
			 
			 </div>

        </div>
        <div class="modal-footer">
            <?php echo form_submit('confirm', 'Confirm', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
 
<script>

  
 

  
 
</script>
