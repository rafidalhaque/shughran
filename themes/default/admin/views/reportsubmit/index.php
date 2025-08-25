<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-info-circle"></i><?= 'ছাড়পত্র'; ?></h2>


    </div>

<?php echo 11; ?>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                 

                <div id="form" class="hidden">

                    <?php echo admin_form_open("reportsubmit", array('method' => 'get')); ?>
                    <div class="row">





                        





                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="branch"><?= lang("Department"); ?></label>
                                <?php
                                $dpt[""] = lang('select') . ' ' . lang('branch');
                                foreach ($departments as $department) {
                                    $dpt[$department->id] = $department->name;
                                }
                                echo form_dropdown('department_id', $dpt, (isset($_GET['department_id']) ? $_GET['department_id'] : ""), 'class="form-control" required id="department_id" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("department") . '"');
                                ?>
                            </div>
                        </div>







                    </div>
                    <div class="form-group">
                        <div class="controls"> <?php echo form_submit('submit_report', $this->lang->line("submit"), 'class="btn btn-primary"'); ?> </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
                <div class="clearfix"></div>



                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-condensed reports-table">
                        <thead>
                            <tr>
                                <th width="20%"><?= lang("branch_name"); ?></th>
                                <th width="20%"><?= lang("branch_code"); ?></th>
                                <th width="10%"><?= lang("status"); ?></th>
                                <th><?= lang("branch_comment"); ?></th>
                                <th><?= lang("Department_comment"); ?></th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // $this->session->userdata('department_id')

                            if (isset($submitinfo)) {
                                foreach ($branches as $key => $row) {


                                    if ($this->Owner || $this->Admin || $this->session->userdata('group_id') == 8) {
                                        $value = report_submit($row->id, $submitinfo);

                                        // var_dump($value);

                                        //$comment = report_submit_comment($row->id,$submitinfo); 
                            ?>
                                        <tr>
                                            <td><?= $row->name ?></td>
                                            <td><?= $row->code ?></td>
                                            <td><a href="#" class="yes_no editable-click" data-id="" data-idname="" data-type="select" data-table="reportsubmit" data-pk="<?php echo $value->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="department_<?php echo $department_id ?>" data-title="Enter"><?php echo $value->department == 2 ? 'No' : 'Yes' ?></a></td>
                                            <td><?php echo empty($value->branch_comment) ? '..' : nl2br($value->branch_comment) ?></td>
                                            <td><a href="#" class="editable editable-click" data-id="" data-idname="" data-type="textarea" data-table="reportsubmit" data-pk="<?php echo $value->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="comment_<?php echo $department_id ?>" data-title="Enter"><?php echo empty($value->department_comment) ? 'Write your comment..' : nl2br($value->department_comment) ?></a></td>

                                        </tr>
                                    <?php } else if ( $this->session->userdata('branch_id') ) {
                                        $value = report_submit($branch_id, $submitinfo);

                                        //var_dump($value);
                                        // $comment = report_submit_comment($row->id, $submitinfo);
                                    ?>

                                        <tr>
                                            <td><?= $row->name ?></td>
                                            <td><?= $row->code ?></td>
                                            <td><a href="#" class="yes_no editable-click" data-id="" data-idname="" data-type="select" data-table="reportsubmit" data-pk="<?php echo $value->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="department_<?php echo $department_id ?>" data-title="Enter"><?php echo $value->department == 2 ? 'No' : 'Yes' ?></a></td>
                                            <td><a href="#" class="editable editable-click" data-id="" data-idname="" data-type="textarea" data-table="reportsubmit" data-pk="<?php echo $value->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="comment" data-title="Enter"><?php echo empty($value->comment) ? 'Write your comment..' : nl2br($value->comment) ?></a></td>
                                            <td><a href="#" class="editable editable-click" data-id="" data-idname="" data-type="textarea" data-table="reportsubmit" data-pk="<?php echo $value->id ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="comment_<?php echo $department_id ?>" data-title="Enter"><?php echo empty($value->department_comment) ? 'Write your comment..' : nl2br($value->department_comment) ?></a></td>

                                        </tr>

                            <?php

                                    }
                                }
                            } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


</div>