<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<style>

</style>

<div class="box ">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সংগঠন ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



            &nbsp;&nbsp;






        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>
                    <a class="hidden" href="#" id="excel" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>

                    <a href="#" onclick="doit('xlsx','administrativedetail');  return false;"><i
                            class="icon fa fa-file-excel-o"></i>
                        <?= lang('export_to_excel') ?> </a>

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('administrativedetail/pouroward') ?>"><i class="fa fa-building-o"></i>
                                    <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('administrativedetail/pouroward/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext"><?php // lang('list_results'); ?></p>


                <style>
                    @font-face {
                        font-family: 'SolaimanLipi';
                        src: url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.eot');
                        src: url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.woff') format('woff'),
                            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.ttf') format('truetype'),
                            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
                            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
                        font-weight: normal;
                        font-style: normal;
                    }
                </style>


                <table class="table table-bordered" id="administrativedetail"
                    data-branch="<?= $branch_id ? $branch->name . '_City Thana Organization' : 'সকল শাখা_' . 'City Thana Organization' ?>">
                    <thead>
                        <tr>
                            <th colspan="12"> পৌর ওয়ার্ড তালিকা</th>
                        </tr>
                        <tr>
                            <th rowspan="2">ক্রমিক</th>
                            <th rowspan="2">জেলা</th>
                            <th rowspan="2">উপজেলা </th>
                            <th rowspan="2">পৌরসভা </th>
                            <th rowspan="2">ওয়ার্ড নম্বর</th> 
                            <th colspan="5">সাংগঠনিক বিবরণ</th>
                            <!-- <th rowspan="2">সমর্থক সংগঠন সংখ্যা</th>                            -->

                            <th rowspan="2">মন্তব্য</th>
                        </tr>
                        <tr>

                            <th>থানা সংখ্যা</th>
                            <th>ওয়ার্ড সংখ্যা</th>
                            <th>উপশাখা সংখ্যা</th>
                            <th>সংগঠন আছে/নেই</th>
                            <th>কোন মানের সংগঠন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($district_info as $key => $row) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['district_name'] ?></td>
                                <td><?= $row['thana_name'] ?></td>
                                <td><?= $row['pourosova_name'] ?></td>
                                <td><?= $row['ward_name'] ?></td>


                                <td><?= $row['org_thana'] ?></td>
                                <td><?= $row['org_ward'] ?></td>
                                <td><?= $row['org_unit'] ?></td>
                                <td><?= $row['org_unit'] > 0 ? 'আছে' : 'নেই' ?></td>

                                <td><?= ($row['org_thana'] > 0 ? 'থানা' : ($row['org_ward'] > 0 ? 'ওয়ার্ড' : ($row['org_unit'] > 0 ? 'উপশাখা' : ''))); ?>
                                </td>
                                <!-- <td><?= $row['supporter_organization'] ?></td> -->
                                

                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>








            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        oTable = $('#administrativedetail').dataTable({
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ]
        });
    });
</script>