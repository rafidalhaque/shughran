<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'EDIT Thana'; ?></h4>
        </div>
        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form');
        echo admin_form_open_multipart("organization/editbranch/" . $thana->id . '/0', $attrib); ?>
        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>



            <div class="row">


                <div class="col-md-6 col-sm-6">


                    <div class="form-group">

                        <label for="thana_name">সাংগঠনিক শাখার নাম</label>
                        <?php echo form_input('thana_name', $thana->thana_name, 'class="form-control" required="required" id="thana_name"'); ?>
                    </div>

                    <?php if (1 || $this->Owner || $this->Admin) { ?>

                        <div class="form-group">
                            <?php echo lang('তারিখ', 'date'); ?>
                            <div class="controls">
                                <?php echo form_input('date', $this->sma->hrsd($thana->date), 'class="form-control fixed_date_bk tmp_date" id="date" readonly required="required"'); ?>
                            </div>
                        </div>
                    <?php } ?>

                     



                    <div class="form-group" style="<?=($thana->is_attached==null)?'none':'' ?>">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt, $thana->org_type, 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                    <?php  
  $prosasonik_display =($thana->org_type == 'Departmental')  ? 1 : 0;
     ?>

                    <div class="form-group organization_subtype_section"  style="<?= $prosasonik_display == 1 ? 'display:none;' : '' ?>">
                        <?= lang("সংগঠনের উপধরন", "prosasonik_details"); ?>
                        <?php
                        foreach (['1' => 'প্রশাসনিক এলাকা ', '2' => 'মেস', '3' => 'হল/হোস্টেল', '4' => 'কোয়াটার', '5' => 'শিক্ষাপ্রতিষ্ঠান ', '6' => 'কোচিং/প্রাইভেট সেন্টার', '7' => 'ট্রেনিং সেন্টার'] as $key => $type)
                            $prosasonik_details[$key] = $type;

                        echo form_dropdown('prosasonik_details', $prosasonik_details, $thana->prosasonik_details, 'id="organization_subtype"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <hr>

                    <div class="form-group is_attached_section" style="<?= $thana->is_attached ==1  || $thana->is_attached ==2 ? '' : 'display:none;' ?>">
                        <?= lang('শিক্ষাপ্রতিষ্ঠানের সাথে সংযুক্ত', 'is_attached'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_attached" value="1"
                                <?= $thana->is_attached == 1 ? 'checked' : '' ?> />
                            <label class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_attached" value="2"
                                <?= $thana->is_attached == 2 ? 'checked' : '' ?>>
                            <label class="padding05"><?= 'না ' ?></label>

                        </div>
                    </div>


                    <?php  

                  //  echo $thana->prosasonik_details.($thana->org_type == 'Residential' && $thana->is_attached !=1 && in_array($thana->prosasonik_details, [2,3,4])).'DM';
  $zone_display =($thana->org_type == 'Departmental') ||  ($thana->org_type == 'Residential' && $thana->is_attached !=1 && in_array($thana->prosasonik_details, [2,3,4])) ||    ($thana->org_type == 'Institutional' && in_array($thana->prosasonik_details, [5,6,7])) ? 1 : 0;
   
  ?>


                    <div class="form-group district_section" style="<?= $zone_display == 1 ? 'display:none;' : '' ?>">
                        <?= lang("জেলা", "district"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('district');
                        foreach ($districts as $district)
                            if ($district->parent_id == 0)
                                $dt[$district->id] = $district->name;

                        echo form_dropdown('district', $dt, $thana->district, 'id="district"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group thana_section" style="<?= $zone_display == 1 ? 'display:none;' : '' ?>">
                        <?= lang("উপজেলা/থানা", "upazila"); ?>

                        <?php
                        $dt2[''] = 'Select';

                        if($second_level)
                        foreach ($second_level as $second)
                            $dt2[$second->id] = $second->name;

                        echo form_dropdown('upazila', $dt2, $thana->upazila, ' id="upazila" class="form-control select" style="width:100%;" ');

                        ?>

                    </div>

                    <div class="form-group union_section" style="<?= $zone_display == 1 ? 'display:none;' : '' ?>">
                        <?= lang("পৌরসভা /ইউনিয়ন", "union") ?>

                        <?php
                        $dt3[''] = 'Select';

                        if($third_level)
                        foreach ($third_level as $third)
                            $dt3[$third->id] = $third->name;

                        echo form_dropdown('union', $dt3, $thana->union, ' id="union" class="form-control" style="width:100%;" ');


                        ?>
                    </div>

                    <div class="form-group ward_section" style="<?= $zone_display == 1 ? 'display:none;' : '' ?>">
                        <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "ward") ?>


                        <?php
                        $dt4[''] = 'Select';
                        if($fourth_level)
                        foreach ($fourth_level as $fourth)
                            $dt4[$fourth->id] = $fourth->name;

                        echo form_dropdown('ward', $dt4, $thana->ward, ' id="ward" class="form-control" style="width:100%;" ');


                        ?>
                    </div>




                   

<?php 
  
$category_display =($thana->org_type == 'Departmental' &&  $thana->is_attached !=1) ||  ($thana->org_type == 'Institutional' && $thana->prosasonik_details==6 && $thana->is_attached !=1) ||  ($thana->org_type == 'Residential' && $thana->prosasonik_details==3) || ($thana->org_type == 'Residential' && $thana->is_attached !=1 && in_array($thana->prosasonik_details, [1,2,3,4])) ? 1 : 0;
 
?>
                    <div class="form-group institution_parent_section" style="<?= $category_display == 1 ? 'display:none;' : '' ?>">
                        <label for="institution_parent_id">ক্যাটাগরি </label>
                        <?php
                        $whp[''] = lang('select') . ' ' . 'ক্যাটাগরি';
                        foreach ($institution_types as $institution_type) {
                            $whp[$institution_type->id] = $institution_type->institution_type;
                        }
                        echo form_dropdown('institution_parent_id', $whp, $thana->institution_parent_id, 'id="institution_parent_id"  class="form-control skip" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group sub_category_section" style="<?= $category_display == 1 ? 'display:none;' : '' ?>">
                        <label for="sub_category">সাব ক্যাটাগরি </label>

                        <?php
                        $subcat[''] = lang('select') . ' ' . 'সাব ক্যাটাগরি';
                        foreach ($sub_category as $sub) {
                            $subcat[$sub->id] = $sub->institution_type;
                        }
                        echo form_dropdown('sub_category', $subcat, $thana->sub_category, 'id="sub_category"  class="form-control skip" style="width:100%;" ');
                        ?>




                    </div>

                    <div class="form-group institution_section" style="<?= $category_display == 1 ? 'display:none;' : '' ?>">
                        <?= lang("প্রতিষ্ঠানের নাম", "institutionlist"); ?>
                        <?php
                        $inst[''] = lang('select') . ' ' . 'প্রতিষ্ঠান';
                        foreach ($institutionlist as $institution) {
                            $inst[$institution->id] = $institution->institution_name;
                        }
                        echo form_dropdown('institution_id', $inst, $thana->institution_id, 'id="institutionlist"  class="form-control skip" style="width:100%;" ');
                        ?>



                    </div>

                 

                    
                    




                </div>

                <div class="col-md-6 col-sm-6">







                    <div class="form-group">
                        <?= lang("শাখা", "branch"); ?>
                        <?php
                        $wh[''] = lang('select') . ' ' . lang('branch');
                        if ($this->Admin || $this->Owner)
                            $flag = 1;
                        else
                            $flag = 2;
                        foreach ($branches as $branch) {
                            if ($flag == 1)
                                $wh[$branch->id] = $branch->name;
                            elseif ($branch->id == $this->session->userdata('branch_id'))
                                $wh[$branch->id] = $branch->name;
                        }



                        echo form_dropdown('branch_id', $wh, $thana->branch_id, 'id="branch_id" required="required" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>







                </div>





            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= lang("মন্তব্য", "note"); ?>
                        <?php echo form_textarea('note', $thana->note, 'class="form-control" id="note" style="height:100px;"   '); ?>
                    </div>
                </div>
            </div>





        </div>
        <div class="modal-footer">
            <?php echo form_submit('edit_thana', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>



<script type="text/javascript">
    $(document).ready(function () {






        $('#org_type').change(function () {



            if ($(this).val() === 'Departmental') {
                $('.organization_subtype_section').hide();
                $('.is_attached_section').show();
                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

            } else if ($(this).val() === 'Institutional') {


                $('.is_attached_section').hide();
                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();

                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();

                $('select[name="prosasonik_details"] option[value="1"], ' +
                    'select[name="prosasonik_details"] option[value="2"], ' +
                    'select[name="prosasonik_details"] option[value="3"], ' +
                    'select[name="prosasonik_details"] option[value="4"]')
                    .prop('disabled', true);
                //$('select[name="prosasonik_details"] option[value="1"], option[value="2"], option[value="3"], option[value="4"]').prop('disabled', true);
                //$('select[name="prosasonik_details"] option[value="5"], option[value="6"], option[value="7"]').prop('disabled', false);
                $('select[name="prosasonik_details"] option[value="5"], ' +
                    'select[name="prosasonik_details"] option[value="6"], ' +
                    'select[name="prosasonik_details"] option[value="7"]')
                    .prop('disabled', false);
                // Re-initialize Select2 to apply changes
                $('#organization_subtype').select2();



            } else if ($(this).val() === 'Residential') {
                if ( $('#organization_subtype').val() == 2 || $('#organization_subtype').val() == 4 || $('#organization_subtype').val() == 6 || $('#organization_subtype').val() == 7)
                    $('.is_attached_section').show();
                else
                    $('.is_attached_section').hide();

                $('.organization_subtype_section').show();
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();

               // $('select[name="prosasonik_details"] option[value="1"], option[value="2"], option[value="3"], option[value="4"]').prop('disabled', false);

               // $('select[name="prosasonik_details"] option[value="5"], option[value="6"], option[value="7"]').prop('disabled', true);
               $('select[name="prosasonik_details"] option[value="1"], select[name="prosasonik_details"] option[value="2"], select[name="prosasonik_details"] option[value="3"], select[name="prosasonik_details"] option[value="4"]').prop('disabled', false);
                $('select[name="prosasonik_details"] option[value="5"], select[name="prosasonik_details"] option[value="6"], select[name="prosasonik_details"] option[value="7"]').prop('disabled', true);


                
                // Re-initialize Select2 to apply changes
                $('#organization_subtype').select2();

            }
        });



 
        
        $('input[type="radio"]').on('ifChecked', function(e) {
            e.preventDefault();
            var status_val = $(this).val();
            if(status_val==1){
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();
            }else{
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();
            }
        });
 

        $('#organization_subtype').change(function() {


             
           // $('input[name="is_attached"][value="2"]').iCheck('check');

            if ($(this).val() === '1') {
                $('.is_attached_section').hide();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('.district_section').show();
                $('.thana_section').show();
                $('.union_section').show();
                $('.ward_section').show();

            } else if ($(this).val() === '2') {
                $('.is_attached_section').show();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            } else if ($(this).val() === '3') {
                $('.is_attached_section').hide();
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();

                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            } else if ($(this).val() === '4') {
                $('.is_attached_section').show();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();


                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();


            } else if ($(this).val() === '5') {
                $('.is_attached_section').hide();
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();

                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            } else if ($(this).val() === '6') {
                $('.is_attached_section').show();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            }



        });






        $('#thana_id_tauhid').change(function () {
            var thana_id = $(this).val();

            if (thana_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getWardList'); ?>",
                    method: "GET",
                    data: {
                        thana_id: thana_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function (index, wards) {
                            options += "<option value='" + wards.id + "'>" + wards.thana_name + "</option>";
                        });
                        $('#ward_id').empty().append(options);
                    },
                    error: function () {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward_id').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });


        $('#district').change(function () {
            var district_id = $(this).val();
            var branch_id = $('#branch_id').val();

            if (district_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getUpazilasOwn'); ?>",
                    method: "GET",
                    data: {
                        district_id: district_id,
                        branch_id: branch_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('upazila'); ?></option>";
                        $.each(response, function (index, upazila) {
                            options += "<option value='" + upazila.id + "'>" + upazila.name + "</option>";
                        });
                        $('#upazila').empty().append(options);
                    },
                    error: function () {
                        console.log("Error fetching upazilas!");
                    }
                });
            } else {
                $('#upazila').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('upazila'); ?></option>");
            }
        });


        $('#upazila').change(function () {
            var upazila_id = $(this).val();
             var branch_id = $('#branch_id').val();
            if (upazila_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_unions_own'); ?>",
                    method: "GET",
                    data: {
                        upazila_id: upazila_id,
                        branch_id: branch_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('union'); ?></option>";
                        $.each(response, function (index, union) {
                            options += "<option value='" + union.id + "'>" + union.name + "</option>";
                        });
                        $('#union').empty().append(options);
                    },
                    error: function () {
                        console.log("Error fetching unions!");
                    }
                });
            } else {
                $('#union').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('union'); ?></option>");
            }
        });




        $('#union').change(function () {
            var union_id = $(this).val();
             var branch_id = $('#branch_id').val();
            if (union_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_wards_own'); ?>",
                    method: "GET",
                    data: {
                        union_id: union_id,
                        branch_id: branch_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function (index, ward) {
                            options += "<option value='" + ward.id + "'>" + ward.name + "</option>";
                        });
                        $('#ward').empty().append(options);
                    },
                    error: function () {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });



        $('#institution_parent_id').change(function () {
            var institution_parent_id = $(this).val();
            if (institution_parent_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_sub_categoryList'); ?>",
                    method: "GET",
                    data: {
                        institution_parent_id: institution_parent_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>";
                        $.each(response, function (index, sub_category) {
                            options += "<option value='" + sub_category.id + "'>" + sub_category.institution_type + "</option>";
                        });
                        $('#sub_category').empty().append(options);
                    },
                    error: function () {
                        console.log("Error fetching sub_categorys!");
                    }
                });
            } else {
                $('#sub_category').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>");
            }
        });



        $('#sub_category').change(function () {
            var sub_category = $(this).val();

            // alert(sub_category);


            if (sub_category) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_institutionlist'); ?>",
                    method: "GET",
                    data: {
                        sub_category: sub_category,
                        branch_id: $('#branch_id').val()
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>";
                        $.each(response, function (index, institutionlist) {
                            options += "<option value='" + institutionlist.id + "'>" + institutionlist.ins_name + "</option>";
                        });
                        $('#institutionlist').empty().append(options);
                    },
                    error: function () {
                        console.log("Error fetching institutionlists!");
                    }
                });
            } else {
                $('#institutionlist').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('institutionlist'); ?></option>");
            }
        });







    });
</script>