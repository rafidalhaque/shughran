<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .table td:first-child {
        font-weight: bold;
    }

    label {
        margin-right: 10px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('notification_details'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <?php if ( !empty($group)) {
                    if (1 ) {

                        echo admin_form_open("system_settings/permissions/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped reports-table">

                                <thead>
                                    <tr>
                                        <th colspan="6" class="text-center">
                                            <?php echo $group->comment 
                                            . ' ( ' . $group->from_date . ' ) ' 
                                            .'to'
                                            . ' ( ' . $group->till_date . ' ) ' 
                                            ; 
                                            
                                            ?></th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="text-center"><?= lang("branch_name"); ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center"><?= lang("view"); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($branches as $branch) : ?>
                                        <tr>
                                            <td><?php echo $branch->name; ?></td>
                                            <td class="text-center">
                                                <input type="checkbox" value="1" class="checkbox" name="manpower-index" <?php echo (in_array($branch->id, $branch_permitted_comment) ? 'checked' : ''); ?>>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?= lang('update') ?></button>
                        </div>
                <?php echo form_close();
                    } else {
                        echo $this->lang->line("group_x_allowed");
                    }
                } else {
                    echo $this->lang->line("group_x_allowed");
                } ?>


            </div>
        </div>
    </div>
</div>