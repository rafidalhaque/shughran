<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #PRData td:nth-child(10) {
        text-align: center;
    }

    #PRData th:nth-child(1) {
        width: 5%;
    }

    #PRData th:nth-child(2) {
        width: 20%;
    }

    #PRData th:nth-child(3) {
        width: 20%;
    }

    #PRData th:nth-child(4) {
        width: 20%;
    }

    #PRData th:nth-child(5) {
        width: 20%;
    }

    #PRData th:nth-child(6) {
        width: 7%;
    }



    .manpower_link {
        cursor: pointer;
    }
</style>



<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শিক্ষাপ্রতিষ্ঠানে সংগঠন ঘাটতি তালিকা ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">





                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("warehouses") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization/org_decrease_in_institution') ?>"><i
                                        class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/org_decrease_in_institution/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext hidden"><?= lang('list_results'); ?></p>




                <div class="table-responsive">
                    <table id="PRData" class="table table-bordered table-condensed table-hover table-striped">
                        <thead>
                            <tr class="primary">

                                <th><?= 'প্রতিষ্ঠানের কোড ' ?></th>
                                <th><?= 'প্রতিষ্ঠানের নাম ' ?></th>


                                <th><?= "ধরণ" ?></th>
                                <th><?= "উপ ধরণ" ?></th>
                                <th><?= 'শাখা কোড ' ?></th>
                                <th><?= 'সমর্থক' ?></th>
                                <th><?= 'অন্যান্য ছাত্র সংগঠনের কর্মী ' ?></th>
                                <th><?= 'মোট ছাত্রী সংখ্যা' ?></th>
                                <th><?= 'ছাত্রী সমর্থক' ?></th>
                                <th><?= 'অমুসলিম ছাত্রছাত্রী' ?></th>
                                <th><?= 'মোট ছাত্রছাত্রী সংখ্যা' ?></th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($records) == 0) { ?>
                                <tr>
                                    <td colspan="18" class="dataTables_empty"><?= lang('no_record_found'); ?></td>
                                </tr>
                            <?php } else {
                                foreach ($records as $row) { ?>
                                    <tr>
                                        <td><?= $row['code'] ?></td>
                                        <td><?= $row['institution_name'] ?></td>
                                        <td><?= $row['plname'] ?></td>
                                        <td><?= $row['rcname'] ?></td>
                                        <td><?= $row['branch_name'] ?></td>
                                        <td><?= $row['supporter'] ?></td>
                                        <td><?= $row['other_org_worker'] ?></td>
                                        <td><?= $row['total_female_student'] ?></td>
                                        <td><?= $row['female_student_supporter'] ?></td>
                                        <td><?= $row['non_muslim_student'] ?></td>
                                        <td><?= $row['total_student_number'] ?></td>


                                    </tr>
                                <?php }
                            } ?>

                        </tbody>

                        <tfoot class="dtFilter">
                            <tr class="active">

                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>