<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
#PRData th:nth-child(2),#PRData2 th:nth-child(2),#PRData3 th:nth-child(2),#PRData4 th:nth-child(2) { width: 20% !important; }
#PRData th:nth-child(1),#PRData2 th:nth-child(1),#PRData3 th:nth-child(1),#PRData4 th:nth-child(1) { width: 5% !important; }
 
</style>



<script>
    
    var oTable3;

    $(document).ready(function () {
       

    

oTable3 = $('#PRData3').dataTable({
    "aaSorting": [[2, "asc"], [3, "asc"]],
    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
    "iDisplayLength": <?= $Settings->rows_per_page ?>,
    'bProcessing': true, 'bServerSide': true,
   
    'sAjaxSource': '<?= admin_url('manpowertransfer/getListassocandidatearrival'.($branch_id ? '/'.$branch_id : '').( $this->input->get('type') ? '?type='.$this->input->get('type') : '' ).( $this->input->get('year') ? '&year='.$this->input->get('year') : '' )  ) ?>',
            
  
    'fnServerData': function (sSource, aoData, fnCallback) {
        aoData.push({
            "name": "<?= $this->security->get_csrf_token_name() ?>",
            "value": "<?= $this->security->get_csrf_hash() ?>"
        });
        $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
    },
    'fnRowCallback': function (nRow, aData, iDisplayIndex) {
        var oSettings = oTable3.fnSettings();
        nRow.id = aData[0];
        $(nRow).attr("status",'1');
        //if(aData[7] > aData[9]){ nRow.className = "product_link warning"; } else { nRow.className = "product_link"; }
        return nRow;
    },
    "aoColumns": [
        {"bSortable": false, "mRender": checkbox},   null, null,null, null, null, null, null, null, null 
    ]
}).fnSetFilteringDelay().dtFilter([
    {column_number: 1, filter_default_label: "[<?='নাম';?>]", filter_type: "text", data: []},
    {column_number: 2, filter_default_label: "[<?='শাখা';?>]", filter_type: "text", data: []},
    {column_number: 3, filter_default_label: "[<?="শাখা";?>]", filter_type: "text", data: []},
    {column_number: 4, filter_default_label: "[<?='সাংগঠনিক অবস্থা';?>]", filter_type: "text", data: []},
    {column_number: 5, filter_default_label: "[<?='নোট';?>]", filter_type: "text", data: []},
], "footer");





    });
</script>



<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('associate/associate_actions'.($branch_id ? '/'.$branch_id : ''), 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'সাথীপ্রার্থী আগমন  ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        
        
        
        
                <?php 

				 
if($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if($report_info['type']=='annual'){
        echo anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).('type=half_yearly&year='.$report_info['year']),'ষাণ্মাসিক '.$report_info['year']); 
        echo  "&nbsp;|&nbsp;".anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : ''),'জুন-নভেম্বর\''.$report_info['year']); 
        echo "&nbsp;|&nbsp;";   echo anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).'type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
    }
    else{
         echo anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : ''),'ষাণ্মাসিক '.$report_info['year']); 
        echo  "&nbsp;|&nbsp;".anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).'type=annual&year='.$report_info['last_year'],'বার্ষিক '.$report_info['last_year']);
        
    }
}

else {

    if($report_info['type']=='annual'){
         echo    anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).'type=annual&year='.$report_info['year'],'বার্ষিক '.$report_info['year']);
    }
    else{
      
        echo   anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).'type=half_yearly&year='.$report_info['year'],'ষাণ্মাসিক '.$report_info['year']);
        
    }

}



    ?>
    &nbsp;&nbsp;



    <span class="dropdown">

    <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Archive
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="archive">
         

        <?php 

        echo   ' <li>'.anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : ''),'বর্তমান ').' </li>';
        
        for($i = date('Y')-1; $i>=2019; $i-- ){
        echo   ' <li>'.anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).'type=annual&year='.$i,'বার্ষিক '.$i).' </li>';
        echo   ' <li>'.anchor('admin/manpowertransfer/assocandidatearrivallist'.( $branch_id ? '?branch_id='.$branch_id : '').($branch_id ? '&' : '?' ).'type=half_yearly&year='.$i,'ষাণ্মাসিক '.$i).' </li>';
        

        }
        ?>
     
        </ul>
     </span>

        
        
        
        
        
        
            </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
			
              <li class="dropdown">
                    <a href="<?= admin_url('manpowertransfer/add') ?>">
                        <i class="icon fa fa-tasks" data-placement="left" title="<?= lang("actions") ?>"><?= 'সাথী প্রার্থী/কর্মী স্থানান্তর করুন' ?></i>
                    </a>
                     
                </li>
		 
			
			 
               
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang("শাখা") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('manpowertransfer/assocandidatearrivallist') ?>"><i class="fa fa-building-o"></i> <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('manpowertransfer/assocandidatearrivallist/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <table id="PRData3" class="table table-bordered table-condensed table-hover table-striped">
                        <thead>
                        <tr class="primary">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkth" type="checkbox" name="check"/>
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
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="10" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                        </tr>
                        </tbody>

                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkft" type="checkbox" name="check"/>
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
                           
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($Owner || $GP['bulk_actions']) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>
<?php } ?>
