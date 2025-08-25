<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        cursor: text;
        background-color: #fff;
        opacity: 1;
    }

    #institution td {
        padding: 2px;
        text-align: center;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {



        $('#manpowercode').bind('keypress', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
    });
</script>
<style>
    .section-label {
        padding-left: 15px;
        font-size: 20px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-edit"></i><?= lang('edit_manpower'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext hidden"><?php echo lang('update_info'); ?></p>
                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                echo admin_form_open_multipart("manpowerlist/edit/" . $manpower->id, $attrib)



                ?>
                <input type="hidden" name="ref_id" value="<?php echo $ref_id ?>" />


                <div class="col-md-12  " style="font-size:14px; font-weight:800;">
                    শাখা কোড : <?php echo   $branch->code; ?> <br />
                    <?php echo  $manpower->orgstatus_id == 1 ? 'সদস্য কোড : ' . $manpower->membercode . '<br/>' : ''; ?>
                    <?php echo  $manpower->orgstatus_id == 2 || $manpower->orgstatus_id == 12 ? 'সাথী  কোড : ' . $manpower->associatecode : ''; ?> <br />

                    সাংগঠনিক মান : <?php echo  $manpower->orgstatus_id == 1 ? 'সদস্য' : ($manpower->orgstatus_id == 2 ? 'সাথী' : ($manpower->orgstatus_id == 12 ? 'সদস্য প্রার্থী' :  '')); ?>
                </div>

                <div class="col-md-12">
                    <div class="col-md-5">





                        <div class="form-group all">
                            <?= lang("জনশক্তির নাম", "name") ?>
                            <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ($manpower ? $manpower->name : '')), 'class="form-control" id="name" required="required"'); ?>
                        </div>



                        <div class="form-group all">
                            <?= lang('শ্রেণি/বর্ষ', 'sessionyear'); ?>
                            <?= form_input('sessionyear', set_value('sessionyear', ($manpower ? $manpower->sessionyear : '')), 'class="form-control tip" required="required" id="sessionyear"'); ?>
                        </div>



                        <div class="form-group all">
                            <?= lang('ছাত্র জীবন', 'studentlife'); ?>

                            <div class="radio">
                                <input type="radio" class="checkbox" name="studentlife" value="1" id="running" <?= $manpower->studentlife == 1 ? 'checked="checked"' : ''; ?> />
                                <label for="running" class="padding05"><?= 'অব্যাহত ' ?></label>
                            </div>

                            <div class="radio">
                                <input type="radio" class="checkbox" name="studentlife" value="2" id="completed" <?= $manpower->studentlife == 2 ? 'checked="checked"' : ''; ?>>
                                <label for="completed" class="padding05"><?= 'শেষ ' ?></label>

                            </div>
                        </div>







                        <div class="form-group all">
                            <?= lang('বিভাগ/বিষয়', 'subject'); ?>
                            <?= form_input('subject', set_value('subject', ($manpower ? $manpower->subject : '')), 'class="form-control tip" id="subject" required="required"'); ?>
                        </div>





                        <?php if ($manpower->orgstatus_id == 1) {
                            if (strtotime($manpower->member_oath_date) <= strtotime('2019-12-20')) { ?>
                                <div class="form-group all">
                                    <?= lang('সদস্য শপথের তারিখ', 'member_oath_date'); ?>
                                    <?= form_input('member_oath_date', set_value('member_oath_date', ($manpower ? $this->sma->hrsd($manpower->member_oath_date) : '')), 'class="form-control tip old_date" id="member_oath_date" readonly required="required"'); ?>
                                </div>

                            <?php }
                        } elseif ($manpower->orgstatus_id == 2) {
                            if (strtotime($manpower->associate_oath_date) <= strtotime('2019-12-20')) { ?>

                                <div class="form-group all">
                                    <?= lang('সাথী শপথের তারিখ', 'associate_oath_date'); ?>
                                    <?= form_input('associate_oath_date', set_value('associate_oath_date', ($manpower ? $this->sma->hrsd($manpower->associate_oath_date) : '')), 'class="form-control tip old_date" id="associate_oath_date" readonly required="required"'); ?>
                                </div>
                            <?php }
                        } elseif ($manpower->orgstatus_id == 12) {
                            if (strtotime($manpower->associate_oath_date) <= strtotime('2019-12-20')) { ?>

                                <div class="form-group all">
                                    <?= lang('সাথী শপথের তারিখ', 'associate_oath_date'); ?>
                                    <?= form_input('associate_oath_date', set_value('associate_oath_date', ($manpower ? $this->sma->hrsd($manpower->associate_oath_date) : '')), 'class="form-control tip old_date" id="associate_oath_date" readonly required="required"'); ?>
                                </div>
                            <?php }




                            if (strtotime($manpower->membercandidate_oath_date) <= strtotime('2019-12-20')) { ?>

                                <div class="form-group all">
                                    <?= lang('সদস্যপ্রার্থী বৃদ্ধির  তারিখ', 'membercandidate_oath_date'); ?>
                                    <?= form_input('membercandidate_oath_date', set_value('membercandidate_oath_date', ($manpower ? $this->sma->hrsd($manpower->membercandidate_oath_date) : '')), 'class="form-control tip old_date" id="membercandidate_oath_date" readonly required="required"'); ?>
                                </div>
                        <?php }
                        }   ?>



                        <div class="form-group all">
                            <?= lang('থানা কোড', 'thana_code'); ?>


                            <?php $tc = array();
                            $tc[''] =  'থানা কোড';
                            for ($i = 1; $i <= 60; $i++) {
                                $tc[$i] =  $i;
                            }

                            $tc[100] =  100;

                            echo form_dropdown('thana_code', $tc, ($manpower->thana_code ? $manpower->thana_code : ''), 'id="thana_code"  class="form-control select" required="required" style="width:100%;" ');
                            ?>
                        </div>


                    </div>
                    <div class="col-md-6 col-md-offset-1">




                        <div class="form-group">
                            <?= lang("জেলা ", "district"); ?>
                            <?php
                            $dt[''] = lang('select') . ' ' . lang('district');
                            foreach ($districts as $district) if ($district->parent_id == 0)
                                $dt[$district->id] = $district->name;

                            echo form_dropdown('district', $dt, ($manpower->district ? $manpower->district : ''), 'id="district"  class="form-control select" style="width:100%;" required="required"');
                            ?>
                        </div>




 
                        <div class="form-group all">
                            <?= lang("উপজেলা/থানা", "upazila"); ?>

                            <select id="upazila" name="upazila" class="form-control">
                                <option value="">--</option>
                                <?php

                                foreach ($upozillas as $upozilla) if ($upozilla->parent_id != 0) {
                                    if ($manpower->upazila == $upozilla->id)
                                        echo '<option selected  value="' . $upozilla->id . '" data-chained="' . $upozilla->parent_id . '">' . $upozilla->name . '</option>';
                                    else

                                        echo '<option  value="' . $upozilla->id . '" data-chained="' . $upozilla->parent_id . '">' . $upozilla->name . '</option>';
                                }


                                //  echo form_dropdown('institution_type_id', $wh, (isset($_POST['institution_type_id']) ? $_POST['institution_type_id'] : ''), 'id="institution_type_id" required="required" class="form-control skip" style="width:100%;" ');
                                ?>
                            </select>
                        </div>







































                        <div class="form-group">
                            <?= lang("দায়িত্ব", "responsibility_id"); ?>
                            <?php
                            $rt[''] = lang('select') . ' ' . lang('responsibility');
                            foreach ($responsibilities as $responsibility) {

                                if (strpos($responsibility->orgstatus_id, $manpower->orgstatus_id . ',') !== false)
                                    $rt[$responsibility->id] = $responsibility->responsibility;
                            }

                            echo form_dropdown('responsibility_id', $rt, ($manpower->responsibility_id ? $manpower->responsibility_id : ''), 'id="responsibility_id"   class="form-control select" style="width:100%;" required="required" ');
                            ?>
                        </div>




                        <?php if ($manpower->orgstatus_id != '' && $manpower->orgstatus_id != NULL) {  ?>
                            <div class="form-group all">
                                <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>

                                <?php

                                $it[''] = lang('select') . ' ' . lang('institution_type');
                                foreach ($institution_types as $institution_type)
                                    $it[$institution_type->id] = $institution_type->institution_type;

                                echo form_dropdown('institution_type', $it, ($manpower->institution_type ? $manpower->institution_type : ''), 'id="institution_type"  class="form-control select" style="width:100%;" required="required" ');
                                ?>
                            </div>

                        <?php  }  ?>

                        <?php if ($manpower->orgstatus_id != '' && $manpower->orgstatus_id != NULL) {  ?>
                            <div class="form-group all">

                                <label for="institution_type_child">শিক্ষাপ্রতিষ্ঠানের সাব ধরন</label>

                                <select id="institution_type_child" name="institution_type_child" class="form-control">
                                    <option value="">--</option>
                                    <?php

                                    foreach ($institutions as $institute) if ($institute->id > 0) {
                                        if ($manpower->institution_type_child == $institute->id)
                                            echo '<option selected  value="' . $institute->id . '" data-chained="' . $institute->type_id . '">' . $institute->institution_type . '</option>';
                                        else

                                            echo '<option  value="' . $institute->id . '" data-chained="' . $institute->type_id . '">' . $institute->institution_type . '</option>';
                                    }


                                    //  echo form_dropdown('institution_type_id', $wh, (isset($_POST['institution_type_id']) ? $_POST['institution_type_id'] : ''), 'id="institution_type_id" required="required" class="form-control skip" style="width:100%;" ');
                                    ?>
                                </select>
                            </div>


                        <?php  }  ?>


                        <div class="form-group all">
                            <?= lang("পেশাগত টার্গেট (সেক্টর)", "prossion_target_id") ?>

                            <?php
                            $targetar[''] = lang('select') . ' ' . lang('profession_target');

                            foreach ($targets as $target) {
                                if ($target->parent_id == 0)
                                    $targetar[$target->id] = $target->name;
                            }
                            echo form_dropdown('prossion_target_id', $targetar, ($manpower->prossion_target_id ? $manpower->prossion_target_id : ''), 'id="prossion_target_id"  class="form-control select" style="width:100%;" required="required"');
                            ?>


                        </div>
                        <div class="form-group all">
                            <?= lang("সাব-সেক্টর", "prossion_target_sub_it") ?>
                            <select id="prossion_target_sub_it" name="prossion_target_sub_it" class="form-control select" required="required">
                                <option value="">--</option>
                                <?php
                                foreach ($targets as $target) {
                                    if ($target->parent_id != 0)

                                        echo '<option ' . ($manpower->prossion_target_sub_it == $target->id ? "selected" : "") . ' value="' . $target->id . '" data-chained="' . $target->parent_id . '">' . $target->name . '</option>';
                                }
                                ?>

                            </select>


                        </div>





                        <div class="form-group all">
                            <?= lang("ব্লাড গ্রুপ", "blood_group") ?>
                            <select id="blood_group" name="blood_group" class="form-control select">
                                <option value="">Select..</option>
                                <?php

                                $groups = array('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-');


                                foreach ($groups as $group) {
                                    echo '<option ' . ($manpower->blood_group == $group ? "selected" : "") . ' value="' . $group . '">' . $group . '</option>';
                                }
                                ?>

                            </select>


                        </div>






                    </div>
                </div>

                <hr style="clear:both" />


                <?php if ($manpower->orgstatus_id == '' && $manpower->orgstatus_id == NULL) {  ?>
                    <div class="col-md-12">
                        <div class="">

                            <p class="section-label"><?php echo 'অন্যান্য '; ?></p>
                            <div class="col-md-5">



                                <div class="form-group">
                                    <?= lang("বর্তমান পেশা", "current_profession"); ?>
                                    <?= form_input('current_profession', (isset($_POST['current_profession']) ? $_POST['current_profession'] : ($manpower ? $manpower->current_profession : '')), 'class="form-control" id="current_profession" '); ?>
                                </div>
                                <div class="form-group">
                                    <?= lang("শিক্ষাগত যোগ্যতা", "education_qualification"); ?>
                                    <?= form_input('education_qualification', (isset($_POST['education_qualification']) ? $_POST['education_qualification'] : ($manpower ? $manpower->education_qualification : '')), 'class="form-control" id="education_qualification" '); ?>
                                </div>

                            </div>
                            <div class="col-md-6 col-md-offset-1">



                                <div class="form-group all">
                                    <?= lang("বৃহত্তর আন্দোলনের মান", "orgstatus_at_forum") ?>
                                    <?= form_input('orgstatus_at_forum', (isset($_POST['orgstatus_at_forum']) ? $_POST['orgstatus_at_forum'] : ($manpower ? $manpower->orgstatus_at_forum : '')), 'class="form-control" id="orgstatus_at_forum" '); ?>
                                </div>



                                <div class="form-group all">
                                    <?= lang("মোবাইল নং", "mobile") ?>
                                    <?= form_input('mobile', (isset($_POST['mobile']) ? $_POST['mobile'] : ($manpower ? $manpower->mobile : '')), 'class="form-control" id="mobile" '); ?>
                                </div>

                                <div class="form-group all">
                                    <?= lang("ইমেইল", "email") ?>
                                    <?= form_input('email', (isset($_POST['email']) ? $_POST['email'] : ($manpower ? $manpower->email : '')), 'class="form-control" id="email" '); ?>
                                </div>

                            </div>


                        </div>
                    </div>

                <?php  } ?>










                <hr style="clear:both" />

                <div class="col-md-12 hidden">
                    <div class="">

                        <p class="section-label"><?php echo 'বিদেশ (উচ্চশিক্ষা/চাকরি) '; ?></p>
                        <div class="col-md-5">

                            <div class="form-group all">
                                <?= lang("শিক্ষা প্রতিষ্ঠানের নাম", "higher_education_institution") ?>
                                <?= form_input('higher_education_institution', (isset($_POST['higher_education_institution']) ? $_POST['higher_education_institution'] : ($manpower ? $manpower->higher_education_institution : '')), 'class="form-control" id="higher_education_institution" '); ?>
                            </div>
                            <div class="form-group all">
                                <?= lang("উচ্চশিক্ষার ধরন", "type_higher_education") ?>
                                <?= form_input('type_higher_education', (isset($_POST['type_higher_education']) ? $_POST['type_higher_education'] : ($manpower ? $manpower->type_higher_education : '')), 'class="form-control" id="type_higher_education" '); ?>
                            </div>



                            <div class="form-group">
                                <?= lang("দেশের নাম ", "foreign_country"); ?>
                                <?php
                                $ct[''] = lang('select') . ' ' . lang('country');
                                foreach ($countries as $country)
                                    $ct[$country->id] = $country->name;

                                echo form_dropdown('foreign_country', $ct, ($manpower->foreign_country ? $manpower->foreign_country : ''), 'id="foreign_country"  class="form-control select" style="width:100%;" ');
                                ?>
                            </div>


                        </div>
                        <div class="col-md-6 col-md-offset-1">

                            <div class="form-group all">
                                <?= lang("শহরের নাম", "foreign_address") ?>
                                <?= form_input('foreign_address', (isset($_POST['foreign_address']) ? $_POST['foreign_address'] : ($manpower ? $manpower->foreign_address : '')), 'class="form-control" id="foreign_address" '); ?>
                            </div>

                            <div class="form-group all">
                                <?= lang("পেশার ধরন", "type_of_profession") ?>
                                <?= form_input('type_of_profession', (isset($_POST['type_of_profession']) ? $_POST['type_of_profession'] : ($manpower ? $manpower->type_of_profession : '')), 'class="form-control" id="type_of_profession" '); ?>
                            </div>


                            <div class="form-group all">


                                <?= lang("ফোরামে যুক্ত হয়েছেন কিনা?", "is_forum") ?> <br />
                                <input type="checkbox" class="checkbox" value="1" name="is_forum" id="is_forum" <?= empty($manpower->is_forum) ? '' : 'checked="checked"' ?> />


                            </div>




                        </div>


                    </div>
                </div>



                <hr style="clear:both" />



                <div class="col-md-12 hidden">
                    <div class="">

                        <p class="section-label"><?php echo 'ইন্তেকাল/শাহাদাত'; ?></p>
                        <div class="col-md-5">

                            <div class="form-group all">
                                <?= lang("প্রতিপক্ষ", "opposition") ?>
                                <?= form_input('opposition', (isset($_POST['opposition']) ? $_POST['opposition'] : ($manpower ? $manpower->opposition : '')), 'class="form-control" id="opposition" '); ?>
                            </div>



                            <div class="form-group">

                                <?= lang("তারিখ", "date_death"); ?>
                                <?= form_input('date_death', (isset($_POST['date_death']) ? $_POST['date_death'] : ($manpower ? $manpower->date_death : '')), 'class="form-control date" id="date_death" '); ?>
                            </div>


                        </div>
                        <div class="col-md-6 col-md-offset-1">

                            <div class="form-group all">
                                <?= lang("কততম শহিদ", "myr_serial") ?>
                                <?= form_input('myr_serial', (isset($_POST['myr_serial']) ? $_POST['myr_serial'] : ($manpower ? $manpower->myr_serial : '')), 'class="form-control" id="myr_serial" '); ?>
                            </div>

                            <div class="form-group all">
                                <?= lang("কীভাবে", "how_death") ?>
                                <?= form_input('how_death', (isset($_POST['how_death']) ? $_POST['how_death'] : ($manpower ? $manpower->how_death : '')), 'class="form-control" id="how_death" '); ?>
                            </div>







                        </div>


                    </div>
                </div>




                <div class="col-md-12">


                    <div class="form-group all" id="institution">


                    </div>



                </div>



                <div class="col-md-12">


                    <div class="form-group">
                        <?php echo form_submit('edit_manpower', $this->lang->line("edit_manpower"), 'class="btn btn-primary"'); ?>
                    </div>

                </div>





                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $("#institution_type_child").chained("#institution_type");
        $("#upazila").chained("#district");


        $('form[data-toggle="validator"]').bootstrapValidator({
            excluded: [':disabled']
        });
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');
        var items = {};






        $('form[data-toggle="validator"]').bootstrapValidator('removeField', 'add_item');









        var su = 2;


        var _URL = window.URL || window.webkitURL;
        $("input#images").on('change.bs.fileinput', function() {
            var ele = document.getElementById($(this).attr('id'));
            var result = ele.files;
            $('#img-details').empty();
            for (var x = 0; x < result.length; x++) {
                var fle = result[x];
                for (var i = 0; i <= result.length; i++) {
                    var img = new Image();
                    img.onload = (function(value) {
                        return function() {
                            ctx[value].drawImage(result[value], 0, 0);
                        }
                    })(i);

                    img.src = 'images/' + result[i];
                }
            }
        });



        var row, branches = <?= json_encode($branches); ?>;



    });
</script>


<script type="text/javascript">
    var single_digit = '<?php echo $manpower->single_digit; ?>'

    var jsc_jdc = '<?php echo $manpower->jsc_jdc; ?>'

    var ssc_dhakil = '<?php echo $manpower->ssc_dhakil; ?>'

    var hsc_alim = '<?php echo $manpower->hsc_alim; ?>'

    var department_position = '<?php echo $manpower->department_position; ?>'

    var department_position_private = '<?php echo $manpower->department_position_private; ?>'

    var influential = '<?php echo $manpower->influential; ?>'

    var hc_science = '<?php echo $manpower->hc_science; ?>'

    var madrasha = '<?php echo $manpower->madrasha; ?>'

    var medical_college = '<?php echo $manpower->medical_college; ?>'

    var ideal_college = '<?php echo $manpower->ideal_college; ?>'

    var engineeering = '<?php echo $manpower->engineeering; ?>'

    var agri = '<?php echo $manpower->agri; ?>'

    var science = '<?php echo $manpower->science; ?>'

    var business = '<?php echo $manpower->business; ?>'

    var arts = '<?php echo $manpower->arts; ?>'




    $(document).ready(function() {


        $('form[data-toggle="validator"]').bootstrapValidator({
            excluded: [':disabled']
        });
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');

        // var associatelog = '<?php //echo  json_encode($associatelog); ?>';


        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="token"]').attr('content')
            }
        });



        $('#institution_type').val(<?= $manpower->institution_type; ?>);

        $.ajax({
            type: "get",
            async: false,
            url: "<?= admin_url('manpower/manpower_institution/') ?>" + <?= $manpower->institution_type; ?>,
            dataType: "json",
            success: function(data) {

                $('#institution').html(data.html);
                if (single_digit == 1)
                    $("input[name='member_single_digit']").prop("checked", true);
                if (jsc_jdc == 1)
                    $("input[name='member_jsc_jdc']").prop("checked", true);
                if (ssc_dhakil == 1)
                    $("input[name='member_ssc_dhakil']").prop("checked", true);
                if (hsc_alim == 1)
                    $("input[name='member_hsc_alim']").prop("checked", true);
                if (department_position == 1)
                    $("input[name='member_department_position']").prop("checked", true);
                if (department_position_private == 1)
                    $("input[name='member_department_position_private']").prop("checked", true);
                if (influential == 1)
                    $("input[name='member_influential']").prop("checked", true);
                if (hc_science == 1)
                    $("input[name='member_hc_science']").prop("checked", true);
                if (madrasha == 1)
                    $("input[name='member_madrasha']").prop("checked", true);
                if (medical_college == 1)
                    $("input[name='member_medical_college']").prop("checked", true);
                if (ideal_college == 1)
                    $("input[name='member_ideal_college']").prop("checked", true);
                if (engineeering == 1)
                    $("input[name='member_engineeering']").prop("checked", true);

                if (agri == 1)
                    $("input[name='member_agri']").prop("checked", true);
                if (science == 1)
                    $("input[name='member_science']").prop("checked", true);
                if (business == 1)
                    $("input[name='member_business']").prop("checked", true);
                if (arts == 1)
                    $("input[name='member_arts']").prop("checked", true);




            }
        });





        $('#institution_type').on('change', function(e) {
            console.log(this.value);


            $.ajax({
                type: "get",
                async: false,
                url: "<?= admin_url('manpower/manpower_institution/') ?>" + this.value,
                dataType: "json",
                success: function(data) {

                    $('#institution').html(data.html);

                    if (single_digit == 1)
                        $("input[name='member_single_digit']").prop("checked", true);
                    if (jsc_jdc == 1)
                        $("input[name='member_jsc_jdc']").prop("checked", true);
                    if (ssc_dhakil == 1)
                        $("input[name='member_ssc_dhakil']").prop("checked", true);
                    if (hsc_alim == 1)
                        $("input[name='member_hsc_alim']").prop("checked", true);
                    if (department_position == 1)
                        $("input[name='member_department_position']").prop("checked", true);
                    if (department_position_private == 1)
                        $("input[name='member_department_position_private']").prop("checked", true);
                    if (influential == 1)
                        $("input[name='member_influential']").prop("checked", true);
                    if (hc_science == 1)
                        $("input[name='member_hc_science']").prop("checked", true);
                    if (madrasha == 1)
                        $("input[name='member_madrasha']").prop("checked", true);
                    if (medical_college == 1)
                        $("input[name='member_medical_college']").prop("checked", true);
                    if (ideal_college == 1)
                        $("input[name='member_ideal_college']").prop("checked", true);
                    if (engineeering == 1)
                        $("input[name='member_engineeering']").prop("checked", true);

                    if (agri == 1)
                        $("input[name='member_agri']").prop("checked", true);
                    if (science == 1)
                        $("input[name='member_science']").prop("checked", true);
                    if (business == 1)
                        $("input[name='member_business']").prop("checked", true);
                    if (arts == 1)
                        $("input[name='member_arts']").prop("checked", true);


                }
            });

        });



        var _URL = window.URL || window.webkitURL;





    });
</script>