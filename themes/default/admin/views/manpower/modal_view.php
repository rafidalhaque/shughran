<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="fa fa-2x">&times;</i>
        </button>
        <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
            <i class="fa fa-print"></i> <?= lang('print'); ?>
        </button>
        <h4 class="modal-title" id="myModalLabel"><?= $manpower->name; ?></h4>
    </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-xs-5">
                    <img id="pr-image" src="<?= base_url() ?>assets/uploads/<?= $manpower->image ?>"
                    alt="<?= $manpower->name ?>" class="img-responsive img-thumbnail"/>

                     
                </div>
                <div class="col-xs-7">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped dfTable table-right-left">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="background-color:#FFF;"></td>
                                </tr>
                                
                                <tr>
                                    <td><?= 'Org Status:'; ?></td>
                                    <td><?= $status; ?></td>
                                </tr>
                                <tr>
                                    <td><?= lang("name"); ?></td>
                                    <td><?= $manpower->name; ?></td>
                                </tr>
                                <tr>
                                    <td><?= lang("member Code"); ?></td>
                                    <td><?= $manpower->membercode; ?></td>
                                </tr>
                                 <tr>
                                    <td><?= lang("Associate Code"); ?></td>
                                    <td><?= $manpower->associatecode; ?></td>
                                </tr>
                                <tr>
                                    <td><?= 'Student Life'; ?></td>
                                    <td><?= $manpower->studentlife==1? 'Running': 'Completed'; ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                     
                    

     
</div> 
<?php if ($Owner || $Admin) { ?>
    <div class="buttons">
        <div class="btn-group btn-group-justified">
             
             
            <div class="btn-group">
                <a href="<?= admin_url('manpower/edit/' . $manpower->id) ?>" class="tip btn btn-warning tip" title="<?= lang('edit_manpower') ?>">
                    <i class="fa fa-edit"></i>
                    <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                </a>
            </div>
            <div class="btn-group hidden">
                <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("delete_manpower") ?></b>"
                    data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= admin_url('manpower/delete/' . $manpower->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                    data-html="true" data-placement="top">
                    <i class="fa fa-trash-o"></i>
                    <span class="hidden-sm hidden-xs"><?= lang('delete') ?></span>
                </a>
            </div>
			
			
			
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.tip').tooltip();
    });
    </script>
<?php } ?>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('.change_img').click(function(event) {
        event.preventDefault();
        var img_src = $(this).attr('href');
        $('#pr-image').attr('src', img_src);
        return false;
    });
});
</script>
