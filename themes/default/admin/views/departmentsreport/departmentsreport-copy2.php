<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= 'departments report'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport') ?>"><i class="fa fa-building-o"></i>
                                    <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport?branch_id=' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <table id="example1" class="display table-bordered" style="width:100%">
                    <thead style="background-color:#428BCA;color:white;text-align: center;">
                        <tr>
                            <th width="5%"><?= $this->session->userdata('group_id') == 8 ? "শাখা" : "ক্রম"; ?></th>
                            <th width="20%">বিভাগ</th>
                            <th width="5%">সেরিয়াল দেওয়ার সময়</th>
                            <th width="8%">সিরিয়াল দেয়া হয়েছে?</th>
                            <th width="8%">রিপোর্ট চেক ?</th>
                            <th width="8%">রিপোর্ট ওকে?</th>
                            <th width="45%">বিভাগীয় রিভিউ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($branch_list) foreach ($branch_list as $row) { 
                            $i = 0;
                            foreach ($departments as $dept) {
                                $i++;
                                $record = serial_info($row->id, $dept->id, $serial_records); ?>
                                <tr>
                                    <td><?= $this->session->userdata('group_id') == 8 ? $row->id : $i; ?></td>
                                    <td><?= $dept->name ?></td>
                                    <td><?= isset($record['created_at']) ? $record['created_at'] : '' ?></td>
                                    <td><?= isset($record['is_checked']) ? '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>' ?></td>
                                    <td><?= isset($record['is_checked']) && $record['is_checked'] == 'YES' ? '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>' ?></td>
                                    <td><?= isset($record['is_reportok']) && $record['is_reportok'] == 'OK' ? '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>' ?></td>
                                    <td><?= isset($record['dept_review']) ? $record['dept_review'] : '' ?></td>
                                </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Custom sort for `created_at` column
    $.fn.dataTable.ext.type.order['date-custom-asc'] = function (a, b) {
        const dateA = parseDate(a);
        const dateB = parseDate(b);
        return dateA - dateB; // Ascending order
    };

    $.fn.dataTable.ext.type.order['date-custom-desc'] = function (a, b) {
        const dateA = parseDate(a);
        const dateB = parseDate(b);
        return dateB - dateA; // Descending order
    };

    // Function to parse date strings into timestamps
    function parseDate(dateStr) {
        if (!dateStr) return 0; // Handle empty values as the lowest value
        const now = new Date();

        // Check if the format is "X minute(s)/hour(s)/day(s) ago"
        const relativeTime = dateStr.match(/(\d+)\s+(minute|hour|day)s?\s+ago/);
        if (relativeTime) {
            const value = parseInt(relativeTime[1]);
            const unit = relativeTime[2];

            if (unit === "minute") return now - value * 60 * 1000;
            if (unit === "hour") return now - value * 60 * 60 * 1000;
            if (unit === "day") return now - value * 24 * 60 * 60 * 1000;
        }

        // Try to parse as ISO 8601 or other standard date format
        const parsedDate = new Date(dateStr);
        return isNaN(parsedDate) ? 0 : parsedDate.getTime();
    }

    // Initialize DataTable with custom sorting for `created_at`
    new DataTable('#example1', {
        order: [[2, 'asc']], // Default sort by the `created_at` column
        pageLength: 50,
        columnDefs: [
            {
                targets: 2, // The `created_at` column index
                type: 'date-custom' // Use the custom sort type
            }
        ]
    });
</script>
