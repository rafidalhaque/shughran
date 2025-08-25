<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .table td:first-child {
        font-weight: bold;
    }

    label {
        margin-right: 10px;
    }
</style>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-folder-open"></i><?= lang('group_permissions'); ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang("set_permissions"); ?></p>

                <?php if (!empty($p)) {
                    if ($p->group_id != 1) {

                        echo admin_form_open("system_settings/permissions/" . $id); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped reports-table">

                                <thead>
                                <tr> 
                                    <th colspan="6"
                                        class="text-center"><?php echo $group->description . ' ( ' . $group->name . ' ) ' . $this->lang->line("group_permissions"); ?></th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="text-center"><?= lang("module_name"); ?>
                                    </th>
                                    <th colspan="5" class="text-center"><?= lang("permissions"); ?></th>
                                </tr>
                                <tr>
                                    <th class="text-center"><?= lang("view"); ?></th>
                                    <th class="text-center"><?= lang("add"); ?></th>
                                    <th class="text-center"><?= lang("edit"); ?></th>
                                    <th class="text-center"><?= lang("delete"); ?></th>
                                    <th class="text-center"><?= lang("misc"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?= lang("manpower"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-index" <?php echo $p->{'manpower-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-add" <?php echo $p->{'manpower-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-edit" <?php echo $p->{'manpower-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-delete" <?php echo $p->{'manpower-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                         
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("manpower"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-index" <?php echo $p->{'manpower-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-add" <?php echo $p->{'manpower-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-edit" <?php echo $p->{'manpower-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpower-delete" <?php echo $p->{'manpower-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>

                                    </td>
                                </tr>

                                
                                  

                                <tr>
                                    <td><?= lang("branch"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="branch-index" <?php echo $p->{'branch-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="branch-add" <?php echo $p->{'branch-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="branch-edit" <?php echo $p->{'branch-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="branch-delete" <?php echo $p->{'branch-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                        
                                        <span style="display:inline-block;">
                                            <input type="checkbox" value="1" id="branch-pdf" class="checkbox" name="branch-pdf" <?php echo $p->{'branch-pdf'} ? "checked" : ''; ?>>
                                            <label for="branch-pdf" class="padding05"><?= lang('pdf') ?></label>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?= lang("dawat"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="dawat-index" <?php echo $p->{'dawat-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="dawat-add" <?php echo $p->{'dawat-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="dawat-edit" <?php echo $p->{'dawat-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="dawat-delete" <?php echo $p->{'dawat-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                         
                                        <span style="display:inline-block;">
                                            <input type="checkbox" value="1" id="dawat-pdf" class="checkbox" name="dawat-pdf" <?php echo $p->{'dawat-pdf'} ? "checked" : ''; ?>>
                                            <label for="dawat-pdf" class="padding05"><?= lang('pdf') ?></label>
                                        </span>
                                          
                                    </td>
                                </tr>

                                

                                <tr>
                                    <td><?= lang("organization"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="organization-index" <?php echo $p->{'organization-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="organization-add" <?php echo $p->{'organization-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="organization-edit" <?php echo $p->{'organization-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="organization-delete" <?php echo $p->{'organization-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                         
                                        <span style="display:inline-block;">
                                            <input type="checkbox" value="1" id="organization-pdf" class="checkbox" name="organization-pdf" <?php echo $p->{'organization-pdf'} ? "checked" : ''; ?>>
                                            <label for="organization-pdf" class="padding05"><?= lang('pdf') ?></label>
                                        </span>
                                    </td>
                                </tr>

                                
                                 
								 
								 
								<tr>
                                    <td><?= lang("training"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="training-index" <?php echo $p->{'training-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="training-add" <?php echo $p->{'training-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="training-edit" <?php echo $p->{'training-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="training-delete" <?php echo $p->{'training-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr> 
								 
                                <tr>
                                    <td><?= lang("Administrative Detail"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="administrativedetail-index" <?php echo $p->{'administrativedetail-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="administrativedetail-add" <?php echo $p->{'administrativedetail-add'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="administrativedetail-edit" <?php echo $p->{'administrativedetail-edit'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="administrativedetail-delete" <?php echo $p->{'administrativedetail-delete'} ? "checked" : ''; ?>>
                                    </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr> 
								 
								 
								 <tr>
                                    <td><?= lang("confirmreport"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="confirmreport-index" <?php echo $p->{'confirmreport-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                     </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                        </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr> 
								 
								 
								 
								 <tr>
                                    <td><?= lang("guest"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="guest-index" <?php echo $p->{'guest-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr> 
								 
								 <tr>
                                    <td><?= lang("bm"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="bm-index" <?php echo $p->{'bm-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr> 
								 
								  <tr>
                                    <td><?= lang("others"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="others-index" <?php echo $p->{'others-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr> 
								  <tr>
                                    <td><?= lang("highersyllabus"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="highersyllabus-index" <?php echo $p->{'highersyllabus-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr>
								 
 
                                <tr>
                                    <td><?= lang("Associate"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="associate-index" <?php echo $p->{'associate-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr>
								
								<tr>
                                    <td><?= lang("Member candidate"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="membercandidate-index" <?php echo $p->{'membercandidate-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr>
								
								<tr>
                                    <td><?= lang("Worker"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="worker-index" <?php echo $p->{'worker-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                        </td>
                                    <td class="text-center">
                                   </td>
                                    <td>
                                         
                                       
                                    </td>
                                </tr>
								
								 <tr>
                                    <td><?= lang("manpowertransfer"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpowertransfer-index" <?php echo $p->{'manpowertransfer-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                       </td>
                                    <td class="text-center">
                                     </td>
                                    <td>
                                         
                                        
                                    </td>
                                </tr>


										<tr>
                                    <td><?= lang("manpowerlist"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="manpowerlist-index" <?php echo $p->{'manpowerlist-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                       </td>
                                    <td class="text-center">
                                     </td>
                                    <td>
                                         
                                        
                                    </td>
                                </tr>



								
								
								 <tr>
                                    <td><?= lang("departmentsreport"); ?></td>
                                    <td class="text-center">
                                        <input type="checkbox" value="1" class="checkbox" name="departmentsreport-index" <?php echo $p->{'departmentsreport-index'} ? "checked" : ''; ?>>
                                    </td>
                                    <td class="text-center">
                                            </td>
                                    <td class="text-center">
                                       </td>
                                    <td class="text-center">
                                     </td>
                                    <td>
                                         
                                        
                                    </td>
                                </tr>

								
								
								
								

                                </tbody>
                            </table>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?=lang('update')?></button>
                        </div>
                        <?php echo form_close();
                    } else {
                        echo $this->lang->line("group_x_allowed");
                    }
                } else {
                    echo $this->lang->line("group_x_allowed");
                } ?>


            </div>
        </div>
    </div>
</div>
