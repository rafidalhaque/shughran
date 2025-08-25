<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= lang('edit_zone'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php echo lang('update_info'); ?></p>
                <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open("system_settings/edit_zone/" . $zone->id, $attrib); ?>
                <div class="col-md-5">
                    
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

                echo form_dropdown('district', $dt,   $zone->parent_top_level, ' id="district"  class="form-control select" style="width:100%;" ');
                ?>
            </div>
					 
					 
					 
            <div class="form-group">
                <?= lang("উপজেলা/থানা", "upazila"); ?>
                
                <?php 
                 $dt2[''] = 'Select';
                 foreach ($second_level as $second) 
                    $dt2[$second->id] = $second->name;

               echo form_dropdown('upazila', $dt2,   $zone->parent_second_level, ' id="upazila" class="form-control select" style="width:100%;" ');
               
                ?>
                    
 

            </div>




            <div class="form-group">
                    <?= lang("পৌরসভা /ইউনিয়ন", "union") ?>

                    <?php 
                    $dt3[''] = 'Select';
                 foreach ($third_level as $third)  
                    $dt3[$third->id] = $third->name;

                    echo form_dropdown('union', $dt3,   $zone->parent_third_level, ' id="union" class="form-control" style="width:100%;" ');
              

                    ?>
                    
                </div>




                <div class="form-group">
                        <input type="checkbox" class="checkbox" value="1" name="zone_type" id="zone_type" <?= $zone->zone_type==2 ? '' : 'checked="checked"' ?>/>
                        <label for="status" class="padding05">
                            <?= lang('Corporation?'); ?>
                        </label>
                    </div> 


					<div class="form-group">
                        <input type="checkbox" class="checkbox" value="1" name="status" id="status" <?= empty($zone->is_active) ? '' : 'checked="checked"' ?>/>
                        <label for="status" class="padding05">
                            <?= lang('status'); ?>
                        </label>
                    </div> 
					 
					  

                     
                </div>
                

                <div class="col-md-12">

                        
					
                    <div class="form-group">
                        <?php echo form_submit('edit_zone', $this->lang->line("edit_zone"), 'class="btn btn-primary"'); ?>
                    </div>

                </div>
                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>
 


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
                        var options = "<option selected><?= lang('select') . ' ' . lang('upazila'); ?></option>";
                        $.each(response, function(index, upazila) {
                            options += "<option value='" + upazila.id + "'>" + upazila.name + "</option>";
                        });
                        $('#upazila').select2('destroy').empty().append(options); 
                        $('#union').select2('destroy').empty(); 
                    },
                    error: function() {
                        console.log("Error fetching upazilas!");
                    }
                });
            } else {
                $('#upazila').select2('destroy').empty().append("<option selected ><?= lang('select') . ' ' . lang('upazila'); ?></option>");
                $('#union').select2('destroy').empty().append("<option selected ><?= lang('select') . ' ' . lang('union'); ?></option>"); 
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
                        var options = "<option selected ><?= lang('select') . ' ' . lang('union'); ?></option>";
                        $.each(response, function(index, union) {
                            options += "<option value='" + union.id + "'>" + union.name + "</option>";
                        });
                        $('#union').select2('destroy').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching unions!");
                    }
                });
            } else {
                $('#union').select2('destroy').empty().append("<option selected ><?= lang('select') . ' ' . lang('union'); ?></option>");
            }
        });




        










    });
</script>
