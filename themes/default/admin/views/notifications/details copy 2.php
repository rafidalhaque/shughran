<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('notification_details'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <?php if (!empty($group)) {
                    if (1) {

                        echo admin_form_open("system_settings/permissions/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped reports-table">

                                <thead>
                                    <tr>
                                        <th colspan="10" class="text-center">
                                            <?php echo $group->comment
                                                . ' ( ' . $group->from_date . ' ) '
                                                . 'to'
                                                . ' ( ' . $group->till_date . ' ) '; ?></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php $total_branches = count($branches);
                                    $num_columns = 5;
                                    $num_rows = ceil($total_branches / $num_columns);
                                    $index = 0;
                                    for ($i = 0; $i < $num_rows; $i++) : ?>
                                        <tr>
                                            <?php for ($j = 0; $j < $num_columns; $j++) : ?>
                                                <?php if ($index < $total_branches) : ?>
                                                    <td><?php echo $branches[$index]->name; ?></td>
                                                    <td class="text-center">
                                                        <input type="checkbox" value="1" class="checkbox" name="manpower-index" <?php echo (in_array($branches[$index]->id, $branch_permitted_comment) ? 'checked' : ''); ?>>
                                                    </td>
                                                <?php else : ?>
                                                    <td></td>
                                                    <td></td>
                                                <?php endif; ?>
                                                <?php $index++; ?>
                                            <?php endfor; ?>
                                        </tr>
                                    <?php endfor; ?>
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