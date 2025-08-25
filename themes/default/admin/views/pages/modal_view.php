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
        <h4 class="modal-title" id="myModalLabel"><?= 'Pages'; ?></h4>
    </div>
        <div class="modal-body">

            <div class="row">
                 
                <div class="col-xs-7">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped dfTable table-right-left">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="background-color:#FFF;"></td>
                                </tr>
                                 <tr >
                                    <td style="width:20%"><?= lang("title"); ?></td>
                                    <td style="width:80%"><?= $page->title; ?></td>
                                </tr>
                                <tr >
                                    <td><?= lang("status"); ?></td>
                                    <td><?php echo  $page->status == 1 ? 'Active' : 'Inactive'; ?></td>
                                </tr>
                                
                                 
                                
                                 <tr>
                                    <td><?= 'Entry date'; ?></td>
                                    <td><?= $page->date; ?></td>
                                </tr>
                                     
								  
									 
									 
								 
								

								<tr>
                                    <td><?= 'priority'; ?></td>
                                    <td><?= $page->priority; ?></td>
                                </tr>
							 
								 							
									 
								 

									
 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
				 <div class="col-xs-5">
							 
                    
                </div>	
					
					
					<div class="clearfix"></div>
                    <div class="col-xs-12">
                        <div class="row">
                             
                    <div class="col-xs-12">
                       
                    <?= $page->notes ? '<div class="panel panel-success"><div class="panel-heading">Detail</div><div class="panel-body">' .  $page->notes . '</div></div>' : ''; ?>
         
            </div>
        </div>
    </div>

     
</div>
 
    <div class="buttons">
        <div class="btn-group btn-group-justified">
            
             
            <div class="btn-group">
                <a href="<?= admin_url('pages/edit/' . $page->id) ?>" class="tip btn btn-warning tip" title="<?= lang('edit_page') ?>">
                    <i class="fa fa-edit"></i>
                    <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                </a>
            </div>
            <div class="btn-group">
                <a href="#" class="tip btn btn-danger bpo" title="<b><?= lang("delete_page") ?></b>"
                    data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= admin_url('pages/delete/' . $page->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
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
