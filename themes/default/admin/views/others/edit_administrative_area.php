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
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'প্রশাসনিক এলাকা তথ্য সম্পাদনা'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">

            <div class="col-lg-12">
                <p class="introtext"><?= 'এখানে আপনার শাখার অন্তর্গত এলাকা গুলো ( পৌরসভা /ইউনিয়ন এবং ওয়ার্ড   ) যুক্ত করবেন।  '; ?></p>



                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete' => 'off');
                echo admin_form_open_multipart("others/areaedit/" . $administrativearea->id, $attrib); ?>


                <div class="col-md-6">


                    <!-- for আবাসিক -->









                    <div class="form-group">
                        <?= lang("জেলা", "district"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('district');
                        foreach ($districts as $district) if ($district->parent_id == 0)
                            $dt[$district->id] = $district->name;

                        echo form_dropdown('district', $dt,  $administrativearea->district_id, 'id="district"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">
                        <?= lang("উপজেলা/থানা", "upazila"); ?>
                        <select id="upazila" name="upazila" class="form-control">
                             

                            <?php foreach ($thanas as $row) {
                                if ($administrativearea->thana_upazila_id == $row->id)
                                    echo '<option selected value="' . $row->id . '">' . $row->name . '</option>';
                                else
                                    echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                            } ?>

                        </select>

                    </div>

                    <div class="form-group">
                        <?= lang("পৌরসভা / ইউনিয়ন", "union") ?>
                        <select id="union" name="union" class="form-control">
                            

                            <?php foreach ($unions as $row) {
                                if ($administrativearea->pourashava_union_id == $row->id)
                                    echo '<option selected value="' . $row->id . '">' . $row->name . '</option>';
                                else
                                    echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                            } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "ward") ?>
                        <select id="ward" name="ward" class="form-control skip">
                            
                            <?php foreach ($wards as $row) {
                                if ($administrativearea->ward_id == $row->id)
                                    echo '<option selected value="' . $row->id . '">' . $row->name . '</option>';
                                else
                                    echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                            } ?>
                        </select>
                    </div>











                </div>


                <div class="col-md-6">








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



                        echo form_dropdown('branch_id', $wh, $administrativearea->branch_id, 'id="branch_id"  class="form-control select" required style="width:100%;" ');
                        ?>
                    </div>






                </div>





                <div class="col-md-6">






                    <div class="form-group">
                        <?php echo form_submit('edit_administrative_area', 'Save', 'class="btn btn-primary"'); ?>
                    </div>

                </div>


                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>









<script type="text/javascript">
    $(document).ready(function() {



        $('#thana_id').change(function() {
            var thana_id = $(this).val();

            if (thana_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getWardList'); ?>",
                    method: "GET",
                    data: {
                        thana_id: thana_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function(index, wards) {
                            options += "<option value='" + wards.id + "'>" + wards.thana_name + "</option>";
                        });
                        $('#ward_id').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward_id').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });


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




        $('#union').change(function() {
            var union_id = $(this).val();
            if (union_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_wards'); ?>",
                    method: "GET",
                    data: {
                        union_id: union_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function(index, ward) {
                            options += "<option value='" + ward.id + "'>" + ward.name + "</option>";
                        });
                        $('#ward').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward').empty().append("<option selected><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });











    });
</script>