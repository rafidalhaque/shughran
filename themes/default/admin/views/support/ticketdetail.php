<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>

             
            <h4 class="modal-title" id="myModalLabel"><?php echo 'শিরোনাম: ' . $ticketdetail->ticket_caption; ?> </h4>
        </div>

        
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <p><span class="label label-success"><?= $ticketdetail->is_status ?></span></p>
                    <p><?= $branch->code ?></p>

                    <p><?= $ticketdetail->page ?></p>
                    <p><?= $ticketdetail->category ?></p>



                </div>
                <div class="col-md-10">
                    <p>Ticket ID <strong># <?= $ticketdetail->id ?></strong> opened by <b><?= trim($user->first_name . ' ' . $user->last_name) ?></b> on <?= date("d M,Y h:i:s A", strtotime($ticketdetail->entry_date)) ?>
                        &nbsp; Admin: <?= ($ticketdetail->is_read_admin == 'Yes') ? '<i class="fa fa-check-circle-o"></i>' : '' ?> | &nbsp; Branch: <?= ($ticketdetail->is_read_branch == 'Yes') ? '<i class="fa fa-check-circle-o"></i>' : '' ?>

                    </p>
                    <hr />


                    <?= stripslashes(html_entity_decode($ticketdetail->ticket_detail, ENT_QUOTES | ENT_XHTML | ENT_HTML5, 'UTF-8')); ?>

                </div>
            </div>


            <?php foreach ($replies as $row) {

            ?>
                <div class="row support-content-comment">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        <p>Replied by <b><?= trim($row['first_name'] . ' ' . $row['last_name']) ?></b> on <?= date("d M,Y h:i:s A", strtotime($row['entry_date'])) ?>
                            &nbsp; Admin: <?= ($row['is_read_admin'] == 'Yes') ? '<i class="fa fa-check-circle-o"></i>' : '' ?> | &nbsp; Branch: <?= ($row['is_read_branch'] == 'Yes') ? '<i class="fa fa-check-circle-o"></i>' : '' ?>


                        </p>
                        <hr style="margin-top: 5px;margin-bottom: 5px; border-top: 1px solid #ca9999;" />
                        <?= stripslashes(html_entity_decode($row['ticket_detail'], ENT_QUOTES | ENT_XHTML | ENT_HTML5, 'UTF-8')); ?>

                    </div>
                </div>
            <?php } ?>
            <div class="row support-content-comment">
                <div class="col-md-2">
                </div>
                <div class="col-md-10">

                    <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'ticket_reply');
                    echo admin_form_open("support/reply", $attrib);
                    echo form_hidden('ticket_id', $ticketdetail->id);
                    echo form_hidden('branch_id', $ticketdetail->branch_id);
                    ?>



                    <textarea id="reply_text" name="reply_text" class="form-control"></textarea>
                    <br />
                    <button class="btn btn-primary ticket_reply_submit" type="submit"><span class="fa fa-reply"></span> &nbsp;Save</button>
                    <span class="hidden reply">Saving..</span>
                    <?php echo form_close(); ?>

                </div>
            </div>

        </div>



        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>         
             
        </div>
    </div>
    
</div>
<?= $modal_js ?>

 