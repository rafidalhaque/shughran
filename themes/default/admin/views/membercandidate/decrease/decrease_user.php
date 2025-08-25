<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        cursor: text;
        background-color: #fff;
        opacity: 1;
    }
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'ঘাটতি ' . " (" . $manpower->associatecode . ")" . ': ' . (str_replace("বাতিল", "ফরম বাতিল", $process->process)); ?></h4>
        </div>

        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'decrease_membercandidate', 'autocomplete' => 'off');
        echo admin_form_open_multipart("membercandidate/membercandidatedecrease/" . $manpower->id . "/" . $process->id, $attrib); ?>


        <input type="hidden" value="<?php echo $process->id; ?>" name="process_id" />
        <input type="hidden" value="<?php echo $manpower->branch; ?>" name="branch_id" />
        <input type="hidden" value="<?php echo $manpower->id; ?>" name="manpower_id" />


        <div class="modal-body">
            <p><?= lang('enter_info'); ?></p>

            <div class="row">



                <div class="col-md-6 col-sm-6">


                    <div class="form-group">
                        <?php echo lang('তারিখ ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>



                </div>


                <div class="col-md-6 col-sm-6">

                    <?php if ($process->id == 15) { ?>
                        <div class="form-group">
                            <?= lang("কোন শাখায়", "new_branch_id"); ?>
                            <?php
                            $wh[''] = lang('select') . ' ' . lang('branch');
                            foreach ($branches as $branch) if ($branch->id != $manpower->branch) {
                                $wh[$branch->id] = $branch->name;
                            }
                            echo form_dropdown('new_branch_id', $wh, (isset($_POST['new_branch_id']) ? $_POST['new_branch_id'] : ''), 'id="new_branch_id" required="required" class="form-control select" style="width:100%;" ');
                            ?>
                        </div>
                    <?php } ?>

                </div>


            </div>



            <div class="row">
                <div class="col-md-6">
                    <?php if (in_array($process->id, array(12, 2))) { ?>
                        <div class="form-group all">
                            <?= lang('শ্রেণি/বর্ষ', 'sessionyear'); ?>
                            <?= form_input('sessionyear', set_value('sessionyear', ($manpower ? $manpower->sessionyear : '')), 'class="form-control tip" id="sessionyear" required="required" '); ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(2))) { ?>
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

                    <?php } ?>



                    <?php if (in_array($process->id, array(8))) { ?>
                        <div class="form-group all">
                            <?= lang('ছাত্র জীবন', 'studentlife'); ?>



                            <div class="radio">
                                <input type="radio" class="checkbox" name="studentlife" value="2" id="completed" checked="checked">
                                <label for="completed" class="padding05"><?= 'শেষ ' ?></label>

                            </div>
                        </div>

                    <?php } ?>






                    <?php if (!in_array($process->id, array(11, 14))) { ?>

                    <?php } ?>

                    <?php if (in_array($process->id, array(12, 2))) { ?>
                        <div class="form-group all">
                            <?= lang('বিভাগ/বিষয়', 'subject'); ?>
                            <?= form_input('subject', set_value('subject', ($manpower ? $manpower->subject : '')), 'class="form-control tip" id="subject" required="required" '); ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(2))) { ?>
                        <div class="form-group">
                            <?= lang("জেলা ", "district"); ?>
                            <?php
                            $dt[''] = lang('select') . ' ' . lang('district');
                            foreach ($districts as $district)
                                $dt[$district->id] = $district->name;

                            echo form_dropdown('district', $dt, ($manpower->district ? $manpower->district : ''), 'id="district" required="required" class="form-control select" style="width:100%;" required="required" ');
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (in_array($process->id, array(10, 9, 14, 11, 12, 8, 2))) { ?>

                        <div class="form-group">
                            <?= lang((in_array($process->id, array(9, 10, 11, 8, 14)) ? "সর্বশেষ দায়িত্ব" : "দায়িত্ব"), "responsibility"); ?>
                            <?php
                            $rt[''] = lang('select') . ' ' . lang('responsibility');
                            foreach ($responsibilities as $responsibility)
                                $rt[$responsibility->id] = $responsibility->responsibility;

                            echo form_dropdown('responsibility_id', $rt, ($manpower->responsibility_id ? $manpower->responsibility_id : ''), 'id="responsibility_id"   class="form-control select" style="width:100%;" required="required" ');
                            ?>
                        </div>
                    <?php } ?>

                    <?php if (!in_array($process->id, array(11, 14))) { ?>

                    <?php } ?>

                    <?php if (in_array($process->id, array(12, 2))) { ?>
                        <div class="form-group all">
                            <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>

                            <?php
                            $it[''] = lang('select') . ' ' . lang('institution_type');
                            foreach ($institution_types as $institution_type)
                                $it[$institution_type->id] = $institution_type->institution_type;

                            echo form_dropdown('institution_type', $it, ($manpower->institution_type ? $manpower->institution_type : ''), 'id="institution_type"  class="form-control select" style="width:100%;" required="required" ');
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (in_array($process->id, array(2))) { ?>
                        <div class="form-group all">
                            <?= lang("পেশাগত টার্গেট (সেক্টর)", "prossion_target_id") ?>

                            <?php
                            $targetar[''] = lang('select') . ' ' . lang('profession_target');

                            foreach ($targets as $target) {
                                if ($target->parent_id == 0)
                                    $targetar[$target->id] = $target->name;
                            }
                            echo form_dropdown('prossion_target_id', $targetar, ($manpower->prossion_target_id ? $manpower->prossion_target_id : ''), 'id="prossion_target_id"  class="form-control select" style="width:100%;" required="required"  ');
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
                    <?php } ?>

                    <?php if (in_array($process->id, array(8))) { ?>
                        <div class="form-group">
                            <?= lang("বর্তমান পেশা", "current_profession"); ?>
                            <?= form_input('current_profession', (isset($_POST['current_profession']) ? $_POST['current_profession'] : ($manpower ? $manpower->current_profession : '')), 'class="form-control" id="current_profession" required="required"  '); ?>
                        </div>
                    <?php } ?>
                    <?php if (in_array($process->id, array(8))) { ?>
                        <div class="form-group">
                            <?= lang("শিক্ষাগত যোগ্যতা", "education_qualification"); ?>
                            <?= form_input('education_qualification', (isset($_POST['education_qualification']) ? $_POST['education_qualification'] : ($manpower ? $manpower->education_qualification : '')), 'class="form-control" id="education_qualification" required="required" '); ?>
                        </div>
                    <?php } ?>
                    <?php if (in_array($process->id, array(8))) { ?>
                        <div class="form-group all">
                            <?= lang("বৃহত্তর আন্দোলনের মান", "orgstatus_at_forum") ?>


                            <?php $options = array(
                                'রুকন'         => 'রুকন',
                                'রুকনপ্রার্থী'           => 'রুকনপ্রার্থী',
                                'কর্মী'         => 'কর্মী',
                                'সহযোগী সদস্য'        => 'সহযোগী সদস্য',
                                'যুক্ত হয়নি'        => 'যুক্ত হয়নি',
                            );
                            ?>

                            <?= form_dropdown('orgstatus_at_forum', $options, (isset($_POST['orgstatus_at_forum']) ? $_POST['orgstatus_at_forum'] : ($manpower ? $manpower->orgstatus_at_forum : '')), 'class="form-control" id="orgstatus_at_forum" '); ?>


                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(14, 11, 8))) { ?>
                        <div class="form-group all">
                            <?= lang("মোবাইল নং", "mobile") ?>
                            <?= form_input('mobile', (isset($_POST['mobile']) ? $_POST['mobile'] : ($manpower ? $manpower->mobile : '')), 'class="form-control" id="mobile" required="required"  '); ?>
                        </div>

                    <?php } ?>

                    <?php if (in_array($process->id, array(11))) { ?>
                        <div class="form-group all">
                            <?= lang("ইমেইল", "email") ?>
                            <?= form_input('email', (isset($_POST['email']) ? $_POST['email'] : ($manpower ? $manpower->email : '')), 'class="form-control" id="email" required="required" '); ?>
                        </div>

                        <div class="form-group all">
                            <?= lang("শিক্ষা প্রতিষ্ঠানের নাম", "higher_education_institution") ?>
                            <?= form_input('higher_education_institution', (isset($_POST['higher_education_institution']) ? $_POST['higher_education_institution'] : ($manpower ? $manpower->higher_education_institution : '')), 'class="form-control" id="higher_education_institution" required="required" '); ?>
                        </div>
                        <div class="form-group all">
                            <?= lang("উচ্চশিক্ষার ধরন", "type_higher_education") ?>
                            <?= form_input('type_higher_education', (isset($_POST['type_higher_education']) ? $_POST['type_higher_education'] : ($manpower ? $manpower->type_higher_education : '')), 'class="form-control" id="type_higher_education" required="required" '); ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(11, 14))) { ?>
                        <div class="form-group">
                            <?= lang("দেশের নাম ", "foreign_country"); ?>
                            <?php
                            $ct[''] = lang('select') . ' ' . lang('country');
                            foreach ($countries as $country)
                                $ct[$country->id] = $country->name;

                            echo form_dropdown('foreign_country', $ct, ($manpower->foreign_country ? $manpower->foreign_country : ''), 'id="foreign_country"  class="form-control select" style="width:100%;" required="required" ');
                            ?>
                        </div>
                    <?php } ?>
                    <?php if (in_array($process->id, array(14))) { ?>
                        <div class="form-group all">
                            <?= lang("শহরের নাম", "foreign_address") ?>
                            <?= form_input('foreign_address', (isset($_POST['foreign_address']) ? $_POST['foreign_address'] : ($manpower ? $manpower->foreign_address : '')), 'class="form-control" id="foreign_address" required="required" '); ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(14))) { ?>
                        <div class="form-group all">
                            <?= lang("পেশার ধরন", "type_of_profession") ?>
                            <?= form_input('type_of_profession', (isset($_POST['type_of_profession']) ? $_POST['type_of_profession'] : ($manpower ? $manpower->type_of_profession : '')), 'class="form-control" id="type_of_profession" required="required"  '); ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(14, 11))) { ?>
                        <div class="form-group all">


                            <?= lang("ফোরামে যুক্ত হয়েছেন কিনা?", "is_forum") ?> <br />
                            <input type="checkbox" class="checkbox" value="1" name="is_forum" id="is_forum" <?= empty($manpower->is_forum) ? '' : 'checked="checked"' ?> />


                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(9, 10))) { ?>
                        <div class="form-group">

                            <?= lang(($process->id == 9 ? "ইন্তেকালের তারিখ" : "শাহাদাতের তারিখ"), "date_death"); ?>
                            <?= form_input('date_death', (isset($_POST['date_death']) ? $_POST['date_death'] : ($manpower ? $manpower->date_death : '')), 'class="form-control date" id="date_death" required="required"  '); ?>
                        </div>
                    <?php } ?>



                    <?php if (in_array($process->id, array(10))) { ?>
                        <div class="form-group all">
                            <?= lang("প্রতিপক্ষ", "opposition") ?>
                            <?= form_input('opposition', (isset($_POST['opposition']) ? $_POST['opposition'] : ($manpower ? $manpower->opposition : '')), 'class="form-control" id="opposition" required="required" '); ?>
                        </div>
                    <?php } ?>


                    <?php if (in_array($process->id, array(10))) { ?>
                        <div class="form-group all">
                            <?= lang("কততম শহিদ", "myr_serial") ?>
                            <?= form_input('myr_serial', (isset($_POST['myr_serial']) ? $_POST['myr_serial'] : ($manpower ? $manpower->myr_serial : '')), 'class="form-control" id="myr_serial" required="required"  '); ?>
                        </div>

                    <?php } ?>

                    <?php if (in_array($process->id, array(9))) { ?>
                        <div class="form-group all">
                            <?= lang("কীভাবে", "how_death") ?>
                            <?= form_input('how_death', (isset($_POST['how_death']) ? $_POST['how_death'] : ($manpower ? $manpower->how_death : '')), 'class="form-control" id="how_death"  required="required"  '); ?>
                        </div>

                    <?php } ?>



                    <?php if (in_array($process->id, array(8, 11, 14))) { ?>
                        <div class="form-group all">
                            <?= lang("কামিল/মাস্টার্স শেষ হয়ে থাকলে কত সালে শেষ হয়েছে", "masters_complete_status") ?>
                            <?= form_input('masters_complete_status', (isset($_POST['masters_complete_status']) ? $_POST['masters_complete_status'] : ($manpower ? $manpower->masters_complete_status : '')), 'class="form-control" id="masters_complete_status" required="required" '); ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array($process->id, array(8, 11, 14))) { ?>
                        <div class="form-group all">


                            <?= lang("অঞ্চল তত্ত্বাবধায়কের সাথে যোগাযোগ হয়েছে কিনা?", "caretaker_contact_status") ?> <br />
                            <input type="checkbox" class="checkbox" value="1" name="caretaker_contact_status" id="caretaker_contact_status" <?= empty($manpower->caretaker_contact_status) ? '' : 'checked="checked"' ?> />


                        </div>
                    <?php } ?>


                </div>

            </div>






            <?php if (in_array($process->id, array(1, 12))) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= lang("মন্তব্য ", "note"); ?>
                            <?php echo form_textarea('note', '', 'class="form-control" id="note" style="height:100px;" required="required" '); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>



            <?php if (in_array($process->id, array(15))) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= lang("মন্তব্য", "note"); ?>
                            <?php echo form_textarea('note', '', 'class="form-control" id="note" style="height:100px;" '); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>



            <?php if (in_array($process->id, array(8))) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?= lang("ছুটির প্রস্তাবের যৌক্তিকতা", "note"); ?>
                            <?php echo form_textarea('note', '', 'class="form-control" required="required" id="note" style="height:100px;" '); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="modal-footer">
            <?php echo form_submit('membercandidatedecrease', 'Submit', 'class="btn btn-primary membercandidatedecrease"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>


<script>
    $("#decrease_membercandidate2").submit(function(e) {


        var form = $(this);
        var url = form.attr('action');


        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                console.log(data); // show response from the php script.
            },
            error: function(jqxhr, status, exception) {
                console.log(jqxhr);
                console.log(status);
                console.log(exception);
            }
        });

        // e.preventDefault(); // avoid to execute the actual submit of the form.
    });
</script>