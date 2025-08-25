<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('notification_details'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($group)) : ?>
                    <?php if (1) : ?>
                        <?= admin_form_open("notifications/details/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped reports-table">
                                <thead>
                                    <tr>
                                        <th colspan="9" class="text-center">
                                            <?= $group->comment ?> (<?= $group->from_date ?>) to (<?= $group->till_date ?>)
                                        </th>
                                        <th class="text-center">
                                            <input type="checkbox" id="checkAll">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_branches = count($branches);
                                    $num_columns = 5;
                                    $num_rows = ceil($total_branches / $num_columns);
                                    $index = 0;
                                    for ($i = 0; $i < $num_rows; $i++) :
                                    ?>
                                        <tr>
                                            <?php for ($j = 0; $j < $num_columns; $j++) : ?>
                                                <?php if ($index < $total_branches) : ?>
                                                    <td><?= $branches[$index]->name ?></td>
                                                    <td class="text-center">
                                                        <input type="checkbox" value="1" class="checkbox branch" id="branch<?= $branches[$index]->id ?>" name="branch<?= $branches[$index]->id ?>" <?= (is_array($branch_permitted_comment) && in_array($branches[$index]->id, $branch_permitted_comment) ? 'checked' : '') ?>>
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
                        <?= form_close(); ?>
                    <?php else : ?>
                        <?= $this->lang->line("group_x_allowed"); ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?= $this->lang->line("group_x_allowed"); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#checkAll').change(function() {
            $('.branch').prop('checked', $(this).prop('checked'));
        });
    });
</script>