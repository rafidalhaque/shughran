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
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'সাথী মানোন্নয়ন'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete' => 'off');
                echo admin_form_open_multipart("associate/add", $attrib)
                ?>

                <div class="col-md-6">

                    <div class="form-group">
                        <?= lang("নাম", "name") ?>

                        <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : ''), 'class="form-control" id="name" required="required"'); ?>
                    </div>





                    <div class="form-group">
                        <?= lang('শ্রেণি/বর্ষ', 'sessionyear'); ?>
                        <?= form_input('sessionyear', set_value('sessionyear', ''), 'class="form-control tip" id="sessionyear" required="required" '); ?>
                    </div>












                    <div class="form-group">
                        <?= lang("জেলা", "district"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('district');
                        foreach ($districts as $district) if ($district->parent_id == 0)
                            $dt[$district->id] = $district->name;

                        echo form_dropdown('district', $dt, (isset($_POST['district']) ? $_POST['district'] : ''), 'id="district" required="required" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">
                        <?= lang("উপজেলা/থানা", "upazila"); ?>

                        <select id="upazila" name="upazila" class="form-control">

                            <option value="">--</option>
                            <?php
                            foreach ($districts as $district) if ($district->parent_id > 0) {
                                echo '<option  value="' . $district->id . '" data-chained="' . $district->parent_id . '">' . $district->name . '</option>';
                            }

                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <?= lang("দায়িত্ব *", "responsibility"); ?>
                        <?php
                        $rt[''] = lang('select') . ' ' . lang('responsibility');
                        foreach ($responsibilities as $responsibility)

                            if (strpos($responsibility->orgstatus_id, '2,') !== false)
                                $rt[$responsibility->id] = $responsibility->responsibility;


                        //  $rt[$responsibility->id] = $responsibility->responsibility;

                        echo form_dropdown('responsibility_id', $rt, (isset($_POST['responsibility_id']) ? $_POST['responsibility_id'] : ''), 'id="responsibility_id"   class="form-control select" style="width:100%;" required="required" ');
                        ?>
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
                        echo form_dropdown('branch', $wh, (isset($_POST['branch']) ? $_POST['branch'] : ''), 'id="branch" required="required" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                    <div class="form-group">
                        <?php echo lang('শপথের তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">










                    <div class="form-group">
                        <?= lang(' ছাত্র জীবন', 'studentlife'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="studentlife" value="1" id="running" <?= 1 ? 'checked="checked"' : ''; ?> />
                            <label for="running" class="padding05"><?= 'অব্যাহত' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="studentlife" value="2" id="completed" <?= 0 ? 'checked="checked"' : ''; ?>>
                            <label for="completed" class="padding05"><?= 'সমাপ্ত' ?></label>

                        </div>
                    </div>










                    <div class="form-group all">
                        <?= lang('বিভাগ/বিষয়', 'subject'); ?>
                        <?= form_input('subject', set_value('subject', ('')), 'class="form-control tip" id="subject" required="required" '); ?>
                    </div>






                    <div class="form-group all">
                        <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>

                        <?php
                        $it[''] = lang('select') . ' ' . lang('institution_type');
                        foreach ($institution_types as $institution_type)
                            $it[$institution_type->id] = $institution_type->institution_type;

                        echo form_dropdown('institution_type', $it, (''), 'id="institution_type"  class="form-control select" style="width:100%;" required="required" ');
                        ?>
                    </div>



                    <div class="form-group all">

                        <label for="institution_type_child">শিক্ষাপ্রতিষ্ঠানের সাব ধরন</label>

                        <select id="institution_type_child" name="institution_type_child" class="form-control">
                            <option value="">--</option>
                            <?php

                            foreach ($institutions as $institute) if ($institute->id > 0) {


                                echo '<option  value="' . $institute->id . '" data-chained="' . $institute->type_id . '">' . $institute->institution_type . '</option>';
                            }


                            //  echo form_dropdown('institution_type_id', $wh, (isset($_POST['institution_type_id']) ? $_POST['institution_type_id'] : ''), 'id="institution_type_id" required="required" class="form-control skip" style="width:100%;" ');
                            ?>
                        </select>
                    </div>





                    <div class="form-group all">
                        <?= lang("পেশাগত টার্গেট (সেক্টর)", "prossion_target_id") ?>

                        <?php
                        $targetar[''] = lang('select') . ' ' . lang('profession_target');

                        foreach ($targets as $target) {
                            if ($target->parent_id == 0)
                                $targetar[$target->id] = $target->name;
                        }
                        echo form_dropdown('prossion_target_id', $targetar, (''), 'id="prossion_target_id"  class="form-control select" style="width:100%;" required="required"  ');
                        ?>


                    </div>

                    <div class="form-group all">
                        <?= lang("সাব-সেক্টর", "prossion_target_sub_it") ?>
                        <select id="prossion_target_sub_it" name="prossion_target_sub_it" class="form-control select" required="required">
                            <option value="">--</option>
                            <?php
                            foreach ($targets as $target) {
                                if ($target->parent_id != 0)

                                    echo '<option  value="' . $target->id . '" data-chained="' . $target->parent_id . '">' . $target->name . '</option>';
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



                    <div class="form-group all">
                        <?= lang('থানা কোড', 'thana_code'); ?>


                        <?php $tc = array();
                        $tc[''] =  'থানা কোড';
                        for ($i = 1; $i <= 60; $i++) {
                            $tc[$i] =  $i;
                        }

                        $tc[100] =  100;

                        echo form_dropdown('thana_code', $tc, (''), 'id="thana_code"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                </div>

                <div class="col-md-12">


                    <div class="form-group all" id="institution">


                    </div>



                </div>





                <div class="col-md-12">





                    <div class="form-group all">
                        <?= lang("notes", "notes") ?>
                        <?= form_textarea('notes', (isset($_POST['notes']) ? $_POST['notes'] : ''), 'class="form-control" id="notes"'); ?>
                    </div>



                </div>





                <div class="col-md-12">






                    <div class="form-group">
                        <?php echo form_submit('add_manpower', 'Save', 'class="btn btn-primary"'); ?>
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




        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="token"]').attr('content')
            }
        });





        $('#institution_type').on('select2-selecting', function(e) {

            console.log(e);
            var institution_type_id = e.val;
            $.ajax({
                type: "get",
                async: false,
                url: "<?= admin_url('manpower/manpower_institution/') ?>" + institution_type_id,
                dataType: "json",
                success: function(data) {

                    $('#institution').html(data.html);
                }
            });

        });


        var _URL = window.URL || window.webkitURL;

        var variants = <?= json_encode($vars); ?>;


    });
</script>