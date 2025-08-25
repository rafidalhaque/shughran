<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('update_manpower_info'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("manpower/update_info/".$branch.'/'.$org, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-small">
                        <a href="<?php echo admin_url('manpowerlist/download/'.$branch.'/'.$org); ?>"
                           class="btn btn-primary pull-right"><i
                           class="fa fa-download"></i> <?= lang("download_file") ?></a>
                           <span class="text-warning">You must follow correct order of columns.</span><br/> <span
                           class="text-info">Please make sure the xlsx file is UTF-8 encoded and not saved with byte order mark (BOM).
                       </span>  

                       </div>

                       <div class="form-group">
                        <label for="xlsx_file"><?= lang("upload_file"); ?></label>
                        <input type="file" data-browse-label="<?= lang('browse'); ?>" name="userfile" class="form-control file" data-show-upload="false"
                        data-show-preview="false" id="xlsx_file" required="required"/>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('update_info', lang('update_manpower_info'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>