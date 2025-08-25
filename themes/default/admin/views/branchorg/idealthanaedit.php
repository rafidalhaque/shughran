<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'EDIT ideal Thana Info'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/editidealinfo/" . $ideal_info->id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>



            <div class="row">


                <div class="col-md-6 col-sm-6">


                    <div class="form-group">

                        <label for="thana_name"> থানার নাম: </label>
                        <?php echo $thana->thana_name; ?>
                    </div>

                    
                        <div class="form-group">
                            <?php echo lang('তারিখ', 'date'); ?>
                            <div class="controls">
                                <?php echo form_input('date',  $this->sma->hrsd($ideal_info->date), 'class="form-control fixed_date_bk tmp_date" id="date" readonly required="required"'); ?>
                            </div>
                        </div>
                    


                </div>

                <div class="col-md-6 col-sm-6">










                </div>





            </div>







        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_ideal_thana', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>