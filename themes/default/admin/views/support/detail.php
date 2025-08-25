<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #ICData td:nth-child(7) {
        text-align: right;
    }
 
</style>
 
<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('pages/page_actions', 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= lang('সহায়িকা')  ; ?>
        </h2>

         
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="introtext"><?php echo $supportdetail->title;?></h2>
				 <hr/>
				 
				<?php echo $supportdetail->notes;?>
				 
            </div>
        </div>
    </div>
</div>
<?php if ($Owner || $GP['bulk_actions']) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>
<?php } ?>
