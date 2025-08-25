<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<?php
// Retrieve the current user's group ID from the session to manage display logic, 
// such as hiding department-specific elements and adjusting width dynamically
$group_id = NULL; 
$group_id = $this->session->userdata('group_id');
?>
<style>
    /* Green button  */
.btn-green {
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    border: none; /* Remove border */
    padding: 3px 5px; /* Add padding */
    font-size: 10px; /* Text size */
    border-radius: 5px; /* Rounded corners */
    cursor: not-allowed; /* Show not-allowed cursor */
    opacity: 1; /* Fully opaque */
}


</style>
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
                        <th width="5%"><?= "ক্রম"; ?></th>
                        <th width="5%"><?= "শাখা" ; ?></th>

                        <th <?= $group_id == 8 ? "style='display:none'" : "width='20%'"; ?> >বিভাগ </th>
                       
                        <th <?= $group_id == 8 ? "width='15%'" : "width='5%'"; ?> >সিরিয়াল দেওয়ার সময়</th>
                        
                        
                        <th width="8%">সিরিয়াল দেয়া হয়েছে?</th>
                        <th width="8%">রিপোর্ট চেক?</th>
                        <th width="8%">রিপোর্ট ওকে?</th>
                        <th width="20%"> শাখার মন্তব্য</th>
                        <th <?= $group_id == 8 ? "width='40%'" : "width='25%'"; ?>  >বিভাগীয় রিভিউ</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                            <td></td>
                            <td <?= $group_id == 8 ? "style='display:none'" : ""; ?>></td>
                            <td></td>
                            <td style="text-align:center;">
                                <?php   
                                if($serial_records){
                                    echo $yes =  count($serial_records);
                                }else{echo '0';} 
                                ?>
                            </td>
                            <td style="text-align:center;"> 
                                <?php
                                $yesCount = count(array_filter($serial_records, function ($record_check) {
                                    return isset($record_check['is_checked']) && $record_check['is_checked'] === 'YES';
                                }));

                                echo $yesCount;
                                ?>
                            </td>
                           
                            <td style="text-align:center;"> 
                                <?php
                                $okCount = count(array_filter($serial_records, function ($record_ok) {
                                    return isset($record_ok['is_reportok']) && $record_ok['is_reportok'] === 'OK';
                                }));

                                echo $okCount;
                                ?>
                            </td>
                           
                            <td></td>
                            <td></td>
                            
                        </tr>
                </thead>
                    <tbody>
                        <?php if ($branch_list) foreach ($branch_list as $row) {
                            
                            foreach ($departments as $key=>$dept) { 
                                
                                $record = serial_info($row->id, $dept->id, $serial_records); ?>
                                
                                
                                <tr>
                                    <td><?= $group_id == 8 ? $row->code : $key+1 ; ?></td>

                                    <td><?=  $row->code ; ?></td>
                                    
                                    <td width="20%" <?php if($group_id == 8 ) { echo "style='display:none'";} ?>> <?= $dept->name ?> </td>
                                   
                                    <td data-order="<?= isset($record['created_at']) ? strtotime($record['created_at']) : 0 ?>">
                                        <?= isset($record['created_at']) ? $record['created_at'] : '' ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?= isset($record['is_checked']) ? '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>' ?>
                                        <?php if ($record['serial_number'] > 1): ?>
                                            <button class="btn-green" disabled><?= $record['serial_number']; ?></button>
                                        <?php endif ?>
                                    </td>
                                    <td class="center"><?= isset($record['is_checked']) && $record['is_checked'] == 'YES' ? '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>' ?></td>
                                    <td class="center"><?= isset($record['is_reportok']) && $record['is_reportok'] == 'OK' ? '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>' : '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>' ?></td>
                                    <td><?= isset($record['branch_comment']) ? $record['branch_comment'] : '' ?></td>
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
    // Initialize DataTable
    new DataTable('#example1', {
        <?php if($group_id==8) {?>
        order: [[2, 'desc']], // Sort by `created_at` column 
        <?php } else  {?>
            order: [[0, 'asc']], // Sort by `created_at` column 
            <?php } ?>
       
        pageLength: 50,
        
});

</script>
