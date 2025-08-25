<?php
function render_dept_report_serial_form($branch_id, $report_info, $department_id, $serial_info, $is_owner, $is_admin, $is_departmentuser) {
    // Ensure $serial_info is an object or provide default values
    $serial_info = is_object($serial_info) ? $serial_info : (object) [
        'branch_id' => null,
        'dept_id' => null,
        'serial_number' => null,
        'branch_comment' => null,
        'dept_review' => null,
        'is_checked' => null,
        'is_reportok' => null,
    ];

    ?>

<style>
.redactor_editor {
    min-height: 10px !important;
}
/* Green button  */
.btn-green {
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    border: none; /* Remove border */
    padding: 3px 5px; /* Add padding */
    font-size: 10px; /* Text size */
    border-radius: 5px; /* Rounded corners */
    cursor: not-allowed; /* Show not-allowed cursor */
    opacity: 1; /* Fully opaque */
}
/* red button */
.btn-red {
    background-color: #d9534f; /* red background */
    color: white; /* White text */
    border: none; /* Remove border */
    padding: 3px 5px; /* Add padding */
    font-size: 10px; /* Text size */
    border-radius: 5px; /* Rounded corners */
    cursor: not-allowed; /* Show not-allowed cursor */
    opacity: 1; /* Fully opaque */
}


</style>
    <div class="col-md-12" <?php if($is_owner || $is_admin || $is_departmentuser){ echo "style='display:none;margin-bottom:40px;'";} ?> >

        <?php echo form_open_multipart(base_url("index.php/admin/serialreport/sentserial/" . $branch_id), ['onsubmit' => 'return confirmSerialSubmit()']); ?>
            <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />
            <input type="hidden" name="dept_id" value="<?php echo $department_id; ?>" />
            <input type="hidden" name="report_type" value="<?php echo $report_info['type']; ?>" />

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width: 350px;vertical-align:middle;" rowspan="2">
                        এই বিভাগের রিপোর্ট পূরণ করা শেষ হলে বিভাগকে রিপোর্ট চেক করার জন্য সিরিয়াল দিন
                    </td>
                                              
                        <td rowspan="2" style="width: 100px;vertical-align:middle;" >

                            <?php if ((int) $serial_info->branch_id === (int) $branch_id && (int) $serial_info->dept_id === (int) $department_id || (int) $is_departmentuser === 1): ?>
                               
                                    <?php if ($serial_info->is_reportok !== 'OK'): ?>

                                            <?php if ($serial_info->is_checked === 'NO'): ?>                                     
                                                <small>
                                                    সিরিয়াল দেওয়া হয়েছে। <br>
                                                    <?= $serial_info->created_at ? $serial_info->created_at : "";?> <br>
                                                </small>
                                                
                                            <?php elseif ($serial_info->is_checked === 'YES'): ?>
                                                <!-- Input field for serial number -->
                                                <!-- The value of the input is set to the next serial number by adding 1 to the current serial number retrieved from $serial_info -->
                                                <input type="hidden" name="serial_number" value="<?= $serial_info->serial_number+1; ?>" />
                                                <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>" name="created_at" />
                                                <!-- Button to submit the form and allow the user to Serial again -->
                                                <button type="submit" class="btn btn-primary btn-sm mx-2 my-2 my-md-0">আবার সিরিয়াল দিন</button>                                    
                                            <?php endif ?>
                                       <?php endif ?>
                                
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary btn-sm mx-2 my-2 my-md-0">সিরিয়াল দিন</button>                           
                            <?php endif ?>

                        </td>
                    <td style="width: 50px;">চেক</td>
                    <td style="width: 50px;">রিপোর্ট ওকে?</td>
                </tr>
                <tr>
                    <td>
                        <?php if ($serial_info->is_checked === 'YES'): ?>
                            <button class="btn-green" disabled><?= 'YES'; ?></button>
                            <?php else: ?>
                            <button class="btn-red" disabled><?= 'NO'; ?></button>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($serial_info->is_reportok === 'OK'): ?>
                            <button class="btn-green" disabled><?= 'OK'; ?></button>
                            <?php else: ?>
                            <button class="btn-red" disabled><?= 'NOT OK'; ?></button>
                        <?php endif ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 100px;">বিভাগীয় রিভিউ 
                        <?= $serial_info->updated_at ? '( সর্বশেষ আপডেট '. $serial_info->updated_at.')'  : ""; ?> </td>
                    <td colspan="4" style="width: 500px; text-align: left;">
                        <?php echo $serial_info->dept_review; ?>
                    </td>
                </tr>
            </tbody>
            
        </table>
    <?php echo form_close(); ?>

        
    <?php echo form_open_multipart(base_url("index.php/admin/serialreport/sentserial/" . $branch_id), ['onsubmit' => 'return confirmCommentSubmit()']); ?>
                <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>" />
                <input type="hidden" name="dept_id" value="<?php echo $department_id; ?>" />
                <input type="hidden" name="report_type" value="<?php echo $report_info['type']; ?>" />
            
            <?php if ((int) $serial_info->branch_id === (int) $branch_id && (int) $serial_info->dept_id === (int) $department_id && $serial_info->is_reportok !== 'OK'): ?>
                <table class="table">
                 <div class="comment" >                    
                    <label for="branch_comment">মন্তব্য (যদি থাকে)</label>   
                        <div class="form-group"> 
                            <textarea class="form-control" id="branch_comment" name="branch_comment" rows="1" required="required"  placeholder="Enter your message here...">
                                <?php echo $serial_info->branch_comment; ?>
                            </textarea>
                        </div>   
                        <div class="form-group">   
                            <button type="submit" class="btn btn-primary btn-sm mx-2 my-2 my-md-0">Submit</button> 
                        </div> 
                    </div>
                </table>
        <?php endif ?>
        <?php echo form_close(); ?>
    </div>
    <script>
        function confirmSerialSubmit() {
            return confirm("আপনি কি নিশ্চিত যে এই বিভাগের রিপোর্টটি পূরণ সম্পন্ন হয়েছে?");
        }
        function confirmCommentSubmit() {
            return confirm("আপনি কি মন্তব্য করতে চান?");
        }
    </script>

    <?php if ($is_owner || $is_admin || $is_departmentuser): ?>
        <?php echo form_open_multipart(base_url("index.php/admin/serialreport/updateserial/" . $branch_id)); ?>

        <!-- Hidden Inputs -->
        <input type="hidden" value="<?php echo $branch_id; ?>" name="branch_id" />
        <input type="hidden" value="<?php echo $department_id; ?>" name="dept_id" />
        <input type="hidden" value="<?php echo $report_info['type']; ?>" name="report_type" />
        <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>" name="updated_at" />
        
        <!-- Check Field -->
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <label for="is_checked">চেক *</label>
            </div>
        </div>

        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="is_checked" id="is_checked" value="YES" required="required"<?= (isset($serial_info->is_checked) && $serial_info->is_checked == 'YES') ? 'checked' : ''; ?>>

                            <label class="form-check-label" for="is_checked">YES</label>
                        </div>
                    </div>
                </div>
         

        <!-- Report OK Field -->
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <label for="is_reportok">রিপোর্ট ওকে? *</label>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="form-group">
                <select class="form-select form-select-lg" required="required" style="width:100%;" name="is_reportok" id="is_reportok">
                    <option value="">Select</option>
                    <option value="OK">OK</option>
                    <option value="NOT OK">NOT OK</option>
                </select>
            </div>
        </div>

        <!-- Departmental Review -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="dept_review">বিভাগীয় রিভিউ</label>
                <textarea class="form-control" id="dept_review" name="dept_review" rows="1" placeholder="Enter your message here..." required>
                    <?php echo $serial_info->dept_review; ?>
                </textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-md-12 text-left">
            <div class="form-group">
                <?php echo form_submit('serialreport', 'Submit', 'class="btn btn-primary"'); ?>
            </div>
        </div>

        <?php echo form_close(); ?>
    <?php endif; ?>

<?php } ?>
