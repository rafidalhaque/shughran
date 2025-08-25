<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Edit Schedule'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open("reportingtime/edit", $attrib); ?>
        <div class="modal-body">
            <p><?= lang('update_info'); ?></p>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo lang('Half yearly from', 'startdate_half'); ?>
                         <div class="controls">
                            <?php echo form_input('startdate_half', date($dateFormats['php_sdate'], strtotime($schedule->startdate_half)), 'class="form-control date" id="startdate_half" required="required"'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                       <?php echo lang('Half yearly to', 'enddate_half'); ?>
                         <div class="controls">
                            <?php echo form_input('enddate_half', date($dateFormats['php_sdate'], strtotime($schedule->enddate_half)), 'class="form-control date" id="enddate_half" required="required"'); ?>
                        </div>
                    </div>
                </div>
            </div>

			
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo lang('Annual from', 'startdate_annual'); ?>
                         <div class="controls">
                            <?php echo form_input('startdate_annual', date($dateFormats['php_sdate'], strtotime($schedule->startdate_annual)), 'class="form-control date" id="startdate_annual" required="required"'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                       <?php echo lang('Annual to', 'enddate_annual'); ?>
                         <div class="controls">
                            <?php echo form_input('enddate_annual', date($dateFormats['php_sdate'], strtotime($schedule->enddate_annual)), 'class="form-control date" id="enddate_annual" required="required"'); ?>
                        </div>
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
  'class' => 'form-control',
  'type' => 'number',    
 'pattern' => ".{4,}" ,
  'title' => 'Enter year',
'required' => 'required',
'value'=>$schedule->year
);
 
echo form_input($input_data);

  ?>
                      
                     
                </div>
			 
			 </div>
			
			
            

            <?php echo form_hidden('id', $id); ?>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('schedule', 'Save', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<script type="text/javascript" charset="UTF-8">
    $.fn.datetimepicker.dates['sma'] = <?=$dp_lang?>;
</script>
