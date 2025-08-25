<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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

    #institution {
        font-family: SolaimanLipi;
    }

    #institution td {
        padding: 2px;
        text-align: center;
    }

    .select2-selection.required {
        background-color: yellow !important;
    }
</style>

<style>
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        cursor: text;
        background-color: #fff;
        opacity: 1;
    }
</style>


<?php
if (!empty($variants)) {
    foreach ($variants as $variant) {
        $vars[] = addslashes($variant->name);
    }
} else {
    $vars = array();
}
?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'থানা'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">

            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'id'=>'form-submit', 'role' => 'form', 'autocomplete' => 'off');
                echo admin_form_open_multipart("organization/addthana/" . $branch_id . "/1", $attrib)
                    ?>

                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo lang('বৃদ্ধির তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>


                    <div class="form-group all">
                        <?= lang('থানা কোড', 'thana_code'); ?>


                        <?php $tc = array();
                        $tc[''] = 'থানা কোড';
                        for ($i = 1; $i <= 60; $i++) {
                            $tc[$i] = $i;
                        }

                        $tc[100] = 100;

                        echo form_dropdown('thana_code', $tc, (''), 'id="thana_code"  class="form-control select" required="required" style="width:100%;" ');
                        ?>
                    </div>


                    <div class="form-group">
                        <?= lang("সাংগঠনিক থানা শাখার নাম", "thana_name") ?>
                        <?= form_input('thana_name', '', 'class="form-control" id="thana_name" required="required"'); ?>
                    </div>



                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt, '', 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group organization_subtype_section">
                        <?= lang("সংগঠনের উপধরন", "prosasonik_details"); ?>
                        <?php
                        foreach (['' => 'Select','1' => 'প্রশাসনিক এলাকা ', '2' => 'মেস', '3' => 'হল/হোস্টেল', '4' => 'কোয়াটার', '5' => 'শিক্ষাপ্রতিষ্ঠান ', '6' => 'কোচিং/প্রাইভেট সেন্টার', '7' => 'ট্রেনিং সেন্টার'] as $key => $type)
                            $prosasonik_details[$key] = $type;

                        echo form_dropdown('prosasonik_details', $prosasonik_details, '', 'id="organization_subtype"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>



                    <hr>


                    <div class="form-group is_attached_section">
                        <?= lang('শিক্ষাপ্রতিষ্ঠানের সাথে সংযুক্ত', 'is_attached'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_attached" value="1" />
                            <label class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_attached" value="2" checked>
                            <label class="padding05"><?= 'না ' ?></label>

                        </div>
                    </div>


                    <div class="form-group district_section">
                        <?= lang("জেলা", "district"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('district');
                        foreach ($districts as $district)
                            if ($district->parent_id == 0)
                                $dt[$district->id] = $district->name;

                        echo form_dropdown('district', $dt, '', 'id="district"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group thana_section">
                        <?= lang("উপজেলা/থানা", "upazila"); ?>
                        <select id="upazila" name="upazila" class="form-control">
                        </select>

                    </div>

                    <div class="form-group union_section">
                        <?= lang("পৌরসভা /ইউনিয়ন", "union") ?>
                        <select id="union" name="union" class="form-control">
                        </select>
                    </div>

                    <div class="form-group ward_section">
                        <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "ward") ?>
                        <select id="ward" name="ward" class="form-control">
                        </select>
                    </div>










                    <div class="form-group institution_parent_section">
                        <label for="institution_parent_id">ক্যাটাগরি </label>
                        <?php
                        $whp[''] = lang('select') . ' ' . 'ক্যাটাগরি';
                        foreach ($institution_types as $institution_type) {
                            $whp[$institution_type->id] = $institution_type->institution_type;
                        }
                        echo form_dropdown('institution_parent_id', $whp, '', 'id="institution_parent_id"  class="form-control skip" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group sub_category_section">
                        <label for="sub_category">সাব ক্যাটাগরি </label>
                        <select id="sub_category" name="sub_category" class="form-control ">
                        </select>
                    </div>

                    <div class="form-group institution_section">
                        <?= lang("প্রতিষ্ঠানের নাম", "institutionlist"); ?>
                        <select id="institutionlist" name="institution_id" class="form-control">
                        </select>
                    </div>



                    <hr>




                    <div class="form-group">
                        <?= lang('সমর্থক সংগঠন সংখ্যা', 'supporter_organization'); ?>
                        <?= form_input('supporter_organization', set_value('supporter_organization', '0'), 'class="form-control tip" id="supporter_organization"  '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', '0'), 'class="form-control tip" id="worker_number"  '); ?>
                    </div>


                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', '0'), 'class="form-control tip" id="supporter_number"  '); ?>
                    </div>


                </div>


                <div class="col-md-6">





                    <div class="form-group">
                        <?= lang('আদর্শ থানা?', 'is_ideal_thana'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_ideal_thana" value="1" <?= 1 ? 'checked="checked"' : ''; ?> />
                            <label class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_ideal_thana" value="2" <?= 2 ? 'checked="checked"' : ''; ?>>
                            <label class="padding05"><?= 'না ' ?></label>

                        </div>
                    </div>





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



                        echo form_dropdown('branch_id', $wh, $branch_id, 'id="branch_id"  class="form-control select" style="width:100%;"  required="required" ');
                        ?>
                    </div>






                </div>


                <div class="col-md-6">





                    <div class="form-group all">
                        <?= lang("মন্তব্য", "note") ?>
                        <?= form_textarea('note', '', 'class="form-control" id="note"'); ?>
                    </div>



                </div>


                <div class="col-md-6">






                    <div class="form-group">
                        <?php echo form_submit('add_transfer', 'Save', 'class="btn btn-primary"'); ?>
                    </div>

                </div>


                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>









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

                $('#institution_parent_id').removeAttr('required');
                $('#sub_category').removeAttr('required');
                $('#institutionlist').removeAttr('required');


            } else if ($(this).val() === 'Institutional') {


                $('.is_attached_section').hide();
                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();

                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();

                $('#institution_parent_id').attr('required', 'required');
                $('#sub_category').attr('required', 'required');
                $('#institutionlist').attr('required', 'required');


                $('select[name="prosasonik_details"] option[value="1"], ' +
                    'select[name="prosasonik_details"] option[value="2"], ' +
                    'select[name="prosasonik_details"] option[value="3"], ' +
                    'select[name="prosasonik_details"] option[value="4"]')
                    .prop('disabled', true);

                // $('select[name="prosasonik_details"] option[value="1"], option[value="2"], option[value="3"], option[value="4"]').prop('disabled', true);

                $('select[name="prosasonik_details"] option[value="5"], ' +
                    'select[name="prosasonik_details"] option[value="6"], ' +
                    'select[name="prosasonik_details"] option[value="7"]')
                    .prop('disabled', false);

                //  $('select[name="prosasonik_details"] option[value="5"], option[value="6"], option[value="7"]').prop('disabled', false);

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

                $('#institution_parent_id').attr('required', 'required');
                $('#sub_category').attr('required', 'required');
                $('#institutionlist').attr('required', 'required');



                $('select[name="prosasonik_details"] option[value="1"], select[name="prosasonik_details"] option[value="2"], select[name="prosasonik_details"] option[value="3"], select[name="prosasonik_details"] option[value="4"]').prop('disabled', false);
                $('select[name="prosasonik_details"] option[value="5"], select[name="prosasonik_details"] option[value="6"], select[name="prosasonik_details"] option[value="7"]').prop('disabled', true);

                // Re-initialize Select2 to apply changes
                $('#organization_subtype').select2();

            }
        });









        $('input[type="radio"]').on('ifChecked', function (e) {
            e.preventDefault();
            var status_val = $(this).val();
            if (status_val == 1) {
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();
                $('#institution_parent_id').attr('required', 'required');
                $('#sub_category').attr('required', 'required');
                $('#institutionlist').attr('required', 'required');
            } else {
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();
                $('#institution_parent_id').removeAttr('required');
                $('#sub_category').removeAttr('required');
                $('#institutionlist').removeAttr('required');
            }
        });


        $('#organization_subtype').change(function () {



            $('input[name="is_attached"][value="2"]').iCheck('check');

            if ($(this).val() === '1') {
                $('.is_attached_section').hide();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('#institution_parent_id').removeAttr('required');
                $('#sub_category').removeAttr('required');
                $('#institutionlist').removeAttr('required');





                $('.district_section').show();
                $('.thana_section').show();
                $('.union_section').show();
                $('.ward_section').show();

            } else if ($(this).val() === '2') {
                $('.is_attached_section').show();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('#institution_parent_id').removeAttr('required');
                $('#sub_category').removeAttr('required');
                $('#institutionlist').removeAttr('required');


                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            } else if ($(this).val() === '3') {
                $('.is_attached_section').hide();
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();

                $('#institution_parent_id').attr('required', 'required');
                $('#sub_category').attr('required', 'required');
                $('#institutionlist').attr('required', 'required');



                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            } else if ($(this).val() === '4') {
                $('.is_attached_section').show();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('#institution_parent_id').removeAttr('required');
                $('#sub_category').removeAttr('required');
                $('#institutionlist').removeAttr('required');


                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();


            } else if ($(this).val() === '5') {
                $('.is_attached_section').hide();
                $('.institution_parent_section').show();
                $('.sub_category_section').show();
                $('.institution_section').show();
                $('#institution_parent_id').attr('required', 'required');
                $('#sub_category').attr('required', 'required');
                $('#institutionlist').attr('required', 'required');



                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            } else if ($(this).val() === '6') {
                $('.is_attached_section').show();
                $('.institution_parent_section').hide();
                $('.sub_category_section').hide();
                $('.institution_section').hide();

                $('#institution_parent_id').removeAttr('required');
                $('#sub_category').removeAttr('required');
                $('#institutionlist').removeAttr('required');



                $('.district_section').hide();
                $('.thana_section').hide();
                $('.union_section').hide();
                $('.ward_section').hide();
            }



        });




        $('#form-submit').on('submit', function(e) {
   

   if (!this.checkValidity()) {         
       e.preventDefault();

       let invalidSelect = $(this).find(':invalid.select2-hidden-accessible');
       if (invalidSelect.length) {
           invalidSelect.select2('open'); // Open the Select2 dropdown
       }



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

            if (district_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getUpazilas'); ?>",
                    method: "GET",
                    data: {
                        district_id: district_id
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
            if (upazila_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_unions'); ?>",
                    method: "GET",
                    data: {
                        upazila_id: upazila_id
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
            if (union_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_wards'); ?>",
                    method: "GET",
                    data: {
                        union_id: union_id
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
                        branch_id: '<?= $branch_id ?>'
                    },
                    dataType: 'json',
                    success: function (response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>";
                        $.each(response, function (index, institutionlist) {
                            options += "<option value='" + institutionlist.id + "'>" + institutionlist.institution_name + "</option>";
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