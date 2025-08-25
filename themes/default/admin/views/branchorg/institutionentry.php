<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo 'Institution' .  ': Entry'; ?></h4>
        </div>

        <?php $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'id' => 'add_institute');
        echo admin_form_open_multipart("organization/addinstitution/" . $branch_id, $attrib); ?>


        <input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id" />



        <div class="modal-body">
            <p class="hidden"><?= lang('enter_info'); ?></p>

            <div class="row">


                <div class="col-md-12 col-sm-12">


                    <div class="form-group">

                        <label for="institution_name">প্রতিষ্ঠানের নাম </label>
                        <?php echo form_input('institution_name', '', 'class="form-control" required="required" id="institution_name"'); ?>
                    </div>


                </div>

            </div>

            <div class="row">

                <div class="col-md-6 col-sm-6">

                    <div class="form-group">
                        <?php echo lang('তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date"  readonly required="required"'); ?>
                        </div>
                    </div>



                    <div class="form-group">

                        <label for="institution_parent_id">ক্যাটাগরি </label>
                        <?php
                        $whp[''] = lang('select') . ' ' . 'ক্যাটাগরি';
                        foreach ($institution_types as $institution_type) {
                            $whp[$institution_type->id] = $institution_type->institution_type;
                        }
                        echo form_dropdown('institution_parent_id', $whp, (isset($_POST['institution_parent_id']) ? $_POST['institution_parent_id'] : ''), 'id="institution_parent_id" required="required" class="form-control skip" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">

                        <label for="institution_type_id">সাব ক্যাটাগরি </label>

                        <select id="institution_type_id" name="institution_type_id" class="form-control skip" required="required">
                            <option value="">--</option>
                            <?php

                            foreach ($institutions as $institution) {
                                echo '<option  value="' . $institution->id . '" data-chained="' . $institution->type_id . '">' . $institution->institution_type . '</option>';

    

                                // $wh[$institution->id] = $institution->institution_type;
                            }


                            //  echo form_dropdown('institution_type_id', $wh, (isset($_POST['institution_type_id']) ? $_POST['institution_type_id'] : ''), 'id="institution_type_id" required="required" class="form-control skip" style="width:100%;" ');
                            ?>
                        </select>
                    </div>


                    <div class="form-group">


                        <label for="supporter">সমর্থক সংগঠন সংখ্যা</label>
                        <?php echo form_input('supporter_org_number', '0', 'class="form-control" pattern="[0-9]+"   id="supporter_org_number"'); ?>


                    </div>


                    <div class="form-group all">
                        <?= lang('থানা কোড', 'thana_code'); ?>


                        <?php $tc = array();
                        $tc[''] =  'থানা কোড';
                        for ($i = 1; $i <= 60; $i++) {
                            $tc[$i] =  $i;
                        }

                        $tc[100] =  100;

                        echo form_dropdown('thana_code', $tc, '', 'id="thana_code"  class="form-control select"   style="width:100%;" ');
                        ?>
                    </div>



                </div>


                <div class="col-md-6 col-sm-6">


                    <div class="form-group">


                        <label for="supporter">সমর্থক</label>
                        <?php echo form_input('supporter', '0', 'class="form-control"  pattern="[0-9]+" required="required" id="supporter"'); ?>


                    </div>


                    <div class="form-group">


                        <label for="other_org_worker">অন্যান্য ছাত্র সংগঠনের কর্মী</label>
                        <?php echo form_input('other_org_worker', '0', 'class="form-control"  pattern="[0-9]+" required="required" id="other_org_worker"'); ?>


                    </div>


                    <div class="form-group">


                        <label for="total_female_student">মোট ছাত্রী সংখ্যা</label>
                        <?php echo form_input('total_female_student', '0', 'class="form-control"  pattern="[0-9]+" required="required" id="total_female_student"'); ?>


                    </div>




                    <div class="form-group">


                        <label for="female_student_supporter">ছাত্রী সমর্থক</label>
                        <?php echo form_input('female_student_supporter', '0', 'class="form-control"  pattern="[0-9]+" required="required" id="female_student_supporter"'); ?>


                    </div>




                    <div class="form-group">


                        <label for="non_muslim_student">অমুসলিম ছাত্রছাত্রী</label>
                        <?php echo form_input('non_muslim_student', '0', 'class="form-control"  pattern="[0-9]+" required="required" id="non_muslim_student"'); ?>


                    </div>

                    <div class="form-group">


                        <label for="total_student_number">মোট ছাত্র-ছাত্রী সংখ্যা</label>
                        <?php echo form_input('total_student_number', '', 'class="form-control"  pattern="[0-9]+" required="required" id="total_student_number"'); ?>


                    </div>
                </div>



            </div>







            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= lang("মন্তব্য", "note"); ?>
                        <?php echo form_textarea('notes', '', 'class="form-control" id="note" style="height:100px;"  '); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo form_submit('orginstitution', 'Submit', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?= $modal_js ?>