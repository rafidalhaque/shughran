<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo lang('edit_zone'); ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("system_settings/edit_zone/" . $id, $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>



            <div class="form-group">
                <?= lang('zone_name', 'zone_name'); ?>
                <?= form_input('zone_name', set_value('zone_name', $zone->name), 'class="form-control tip" id="zone_name" required="required"'); ?>
            </div>



            <div class="form-group">
                <?= lang("জেলা", "district"); ?>
                <?php
                $dt[''] = lang('select') . ' ' . lang('district');
                foreach ($districts as $district)  
                    $dt[$district->id] = $district->name;

                echo form_dropdown('district', $dt,   $zone->parent_top_level, ' id="district" required class="form-control select" style="width:100%;" ');
                ?>
            </div>


            <div class="form-group">
                <?= lang("উপজেলা/থানা", "upazila"); ?>
                
                <?php 
                 foreach ($second_level as $second) 
                    $dt2[$second->id] = $second->name;

               echo form_dropdown('upazila', $dt2,   $zone->parent_second_level, ' id="upazila" class="form-control select" style="width:100%;" ');
               
                ?>
                    
 

            </div>

             
                <div class="form-group">
                    <?= lang("পৌরসভা /ইউনিয়ন", "union") ?>

                    <?php 
                 foreach ($third_level as $third)  
                    $dt3[$third->id] = $third->name;

                    echo form_dropdown('union', $dt3,   $zone->parent_third_level, ' id="union" class="form-control select" style="width:100%;" ');
              

                    ?>
                    
                </div>
            

            <div class="form-group">
                <label class="control-label" for="address"><?php echo $this->lang->line("address"); ?></label>
                <?php echo form_textarea('address', $branch->address, 'class="form-control" id="address" required="required"'); ?>
            </div>
             
        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_branch', lang('edit_branch'), 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<?= $modal_js ?>



<script type="text/javascript">
    $(document).ready(function() {
 

        $('#district').change(function() {
            var district_id = $(this).val();

            if (district_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getUpazilas'); ?>",
                    method: "GET",
                    data: {
                        district_id: district_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('upazila'); ?></option>";
                        $.each(response, function(index, upazila) {
                            options += "<option value='" + upazila.id + "'>" + upazila.name + "</option>";
                        });
                        $('#upazila').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching upazilas!");
                    }
                });
            } else {
                $('#upazila').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('upazila'); ?></option>");
            }
        });


        $('#upazila').change(function() {
            var upazila_id = $(this).val();
            if (upazila_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_unions'); ?>",
                    method: "GET",
                    data: {
                        upazila_id: upazila_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('union'); ?></option>";
                        $.each(response, function(index, union) {
                            options += "<option value='" + union.id + "'>" + union.name + "</option>";
                        });
                        $('#union').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching unions!");
                    }
                });
            } else {
                $('#union').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('union'); ?></option>");
            }
        });




        










    });
</script>
