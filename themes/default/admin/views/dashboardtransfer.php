<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
function row_status($x)
{
    if ($x == null) {
        return '';
    } elseif ($x == 'pending') {
        return '<div class="text-center"><span class="label label-warning">' . lang($x) . '</span></div>';
    } elseif ($x == 'completed' || $x == 'paid' || $x == 'sent' || $x == 'received') {
        return '<div class="text-center"><span class="label label-success">' . lang($x) . '</span></div>';
    } elseif ($x == 'partial' || $x == 'transferring') {
        return '<div class="text-center"><span class="label label-info">' . lang($x) . '</span></div>';
    } elseif ($x == 'due') {
        return '<div class="text-center"><span class="label label-danger">' . lang($x) . '</span></div>';
    } else {
        return '<div class="text-center"><span class="label label-default">' . lang($x) . '</span></div>';
    }
}

?>

<style>
    #PRData th:nth-child(2),
    #PRData2 th:nth-child(2),
    #PRData3 th:nth-child(2),
    #PRData4 th:nth-child(2) {
        width: 20% !important;
    }

    #PRData th:nth-child(1),
    #PRData2 th:nth-child(1),
    #PRData3 th:nth-child(1),
    #PRData4 th:nth-child(1) {
        width: 5% !important;
    }
</style>





<div class="row" style="margin-bottom: 15px;">
    <div class="col-md-12">


        <?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
        <style type="text/css" media="screen">
            #PRData td:nth-child(1) {
                text-align: center;
                width: 5%;
            }

            #PRData td:nth-child(7) {
                text-align: center;
                width: 10%;
            }

            .manpower_link {
                cursor: pointer;
            }
        </style>
        <script>
            var oTable;
            $(document).ready(function() {














                var oTable4;

                oTable4 = $('#PRData4').dataTable({
                    "aaSorting": [
                        [2, "asc"],
                        [3, "asc"]
                    ],
                    "aLengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "<?= lang('all') ?>"]
                    ],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true,
                    'bServerSide': true,
                    'sAjaxSource': '<?= admin_url('manpowertransfer/getListAssWorkerPending' . ($branch_id ? '/' . $branch_id : '')) ?>',
                    'fnServerData': function(sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    'fnRowCallback': function(nRow, aData, iDisplayIndex) {
                        var oSettings = oTable4.fnSettings();
                        nRow.id = aData[0];
                        $(nRow).attr("status", '1');
                        //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
                        return nRow;
                    },
                    "aoColumns": [{
                        "bSortable": false,
                        "mRender": checkbox
                    }, null, null, null, null, null, null, null, null, null, {
                        "bSortable": false
                    }]
                }).fnSetFilteringDelay().dtFilter([{
                        column_number: 1,
                        filter_default_label: "[<?= 'নাম'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 2,
                        filter_default_label: "[<?= 'শাখা'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 3,
                        filter_default_label: "[<?= "শাখা"; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 4,
                        filter_default_label: "[<?= 'সাংগঠনিক অবস্থা'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                    {
                        column_number: 5,
                        filter_default_label: "[<?= 'নোট'; ?>]",
                        filter_type: "text",
                        data: []
                    },
                ], "footer");








            });
        </script>



    </div>




</div>






<?php if (!($Owner || $Admin)) { ?>




    <div class="row" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h2 class="blue"><i class="fa-fw fa fa-tasks"></i> <?= 'সাথী প্রার্থী/কর্মী স্থানান্তর পেন্ডিং তালিকা' ?></h2>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-12">



                            <div class="table-responsive">
                                <table id="PRData4" class="table table-bordered table-condensed table-hover table-striped">
                                    <thead>
                                        <tr class="primary">
                                            <th style="min-width:30px; width: 30px; text-align: center;">
                                                <input class="checkbox checkth" type="checkbox" name="check" />
                                            </th>
                                            <th><?= 'নাম' ?></th>
                                            <th><?= 'পুরাতন শাখা'  ?></th>
                                            <th><?= 'নতুন শাখা'  ?></th>
                                            <th><?= 'সাংগঠনিক অবস্থা' ?></th>
                                            <th><?= 'প্রার্থী/কর্মী' ?></th>
                                            <th><?= 'দায়িত্ব' ?></th>
                                            <th><?= 'সেশন' ?></th>
                                            <th>শিক্ষাপ্রতিষ্ঠানের ধরন</th>
                                            <th><?= 'নোট'  ?></th>
                                            <th style="min-width:65px; text-align:center;"><?= 'Action' ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="11" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                                        </tr>
                                    </tbody>

                                    <tfoot class="dtFilter">
                                        <tr class="active">
                                            <th style="min-width:30px; width: 30px; text-align: center;">
                                                <input class="checkbox checkft" type="checkbox" name="check" />
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="width:65px; text-align:center;"><?= lang("actions") ?></th>


                                </table>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

<?php  } ?>



