<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'মেসেজ করুন '; ?></h4>
        </div>

        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'support_ticket');
        echo admin_form_open_multipart("support/add" . ($branch_id ? '/' . $branch_id : ''), $attrib); ?>




        <div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>


            <div class="row">
                <div class="col-md-12">

                    <?php if ($this->Owner || $this->Admin) { ?>
                        <div class="form-group">
                            <?= lang("শাখা", "branch_id"); ?>
                            <?php
                            $wh[''] = lang('select') . ' ' . lang('branch');
                            foreach ($branches as $branch) {
                                $wh[$branch->id] = $branch->name;
                            }
                            
                            echo form_dropdown('branch_id', $wh, (isset($_POST['branch_id']) ? $_POST['branch_id'] : ''), 'id="branch_id" required="required" class="form-control select" style="width:100%;" ');
                            ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <?php echo lang('শিরোনাম', 'ticket_caption'); ?>
                        <div class="controls">
                            <?php echo form_input('ticket_caption', '', 'class="form-control" id="ticket_caption" required="required"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo lang('Topic', 'page'); ?>
                        <div class="controls">





                            <?php
                            $opt = array(
                                '' => lang('choose'),
                                'জনশক্তি' => lang('জনশক্তি'),
                                'সংগঠন' => lang('সংগঠন'),
                                'অন্যান্য' => lang('অন্যান্য'),
                                'দাওয়াত' => lang('দাওয়াত'),
                                'বিভাগীয় রিপোর্ট' => lang('বিভাগীয় রিপোর্ট')
                            );
                            echo form_dropdown('page', $opt, (isset($_POST['page']) ? $_POST['page'] : ''), 'id="status" required="required" class="form-control select" style="width:100%;"');
                            ?>

                        </div>
                    </div>



                    <div class="form-group">
                        <?= lang("Section Name", "department"); ?>
                        <?php
                        $dept[''] = lang('select') . ' ' . lang('department');
                        foreach ($departments as $department) {
                            $dept[$department->name] = $department->name;
                        }
                        echo form_dropdown('department', $dept, (isset($_POST['department']) ? $_POST['department'] : ''), 'id="department" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">
                        <?= lang('status', 'status'); ?>
                        <?php
                        $opt = array('New' => lang('New'));
                        echo form_dropdown('status', $opt, (isset($_POST['status']) ? $_POST['status'] : ''), 'id="status"  class="form-control select" style="width:100%;"');
                        ?>
                    </div>



                    <div class="form-group">
                        <?= lang("সমস্যা এবং কি ধরণের সমাধান চান লিখুন ", "note"); ?>
                        <?php echo form_textarea('note', '', 'class="form-control" id="note" required style="height:100px;"'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('ticket', 'Submit', 'class="btn btn-primary ticket"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>





<script>
    $("#decrease_member1").submit(function(e) {


        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                console.log(data); // show response from the php script.
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>