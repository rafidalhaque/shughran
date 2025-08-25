<?php defined('BASEPATH') or exit('No direct script access allowed');
//var_dump($m);

?>
<div class="clearfix"></div>
<?= '</div></div></div></td></tr></table></div></div>'; ?>
<div class="clearfix"></div>
<footer>
    <a href="#" id="toTop" class="blue"
        style="position: fixed; bottom: 30px; right: 30px; font-size: 30px; display: none;">
        <i class="fa fa-chevron-circle-up"></i>
    </a>

    <p style="text-align:center;">&copy; <?= date('Y') . " " . $Settings->site_name; ?> (<a
            href="<?= base_url('documentation.pdf'); ?>" target="_blank">v<?= $Settings->version; ?></a>
        ) <?php if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1') {
            echo ' -ff Page rendered in <strong>{elapsed_time}</strong> seconds';
        } ?></p>
</footer>
<?= '</div>'; ?>
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="true"></div>
<div class="modal fade in" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
</div>
<div id="modal-loading" style="display: none;">
    <div class="blackbg"></div>
    <div class="loader"></div>
</div>
<div id="ajaxCall"><i class="fa fa-spinner fa-pulse"></i></div>
<?php unset($Settings->setting_id, $Settings->smtp_user, $Settings->smtp_pass, $Settings->smtp_port, $Settings->update, $Settings->reg_ver, $Settings->allow_reg, $Settings->default_email, $Settings->mmode, $Settings->timezone, $Settings->restrict_calendar, $Settings->restrict_user, $Settings->auto_reg, $Settings->reg_notification, $Settings->protocol, $Settings->mailpath, $Settings->smtp_crypto, $Settings->corn, $Settings->customer_group, $Settings->envato_username, $Settings->purchase_code); ?>
<script type="text/javascript">
    var dt_lang = <?= $dt_lang ?>,
        dp_lang = <?= $dp_lang ?>,
        site = <?= json_encode(array('url' => base_url(), 'base_url' => admin_url(), 'assets' => $assets, 'settings' => $Settings, 'dateFormats' => $dateFormats)) ?>;
    var lang = {
        paid: '<?= lang('paid'); ?>',
        pending: '<?= lang('pending'); ?>',
        completed: '<?= lang('completed'); ?>',
        ordered: '<?= lang('ordered'); ?>',
        received: '<?= lang('received'); ?>',
        partial: '<?= lang('partial'); ?>',
        sent: '<?= lang('sent'); ?>',
        r_u_sure: '<?= lang('r_u_sure'); ?>',
        due: '<?= lang('due'); ?>',
        returned: '<?= lang('returned'); ?>',
        transferring: '<?= lang('transferring'); ?>',
        active: '<?= lang('active'); ?>',
        inactive: '<?= lang('inactive'); ?>',
        unexpected_value: '<?= lang('unexpected_value'); ?>',
        select_above: '<?= lang('select_above'); ?>',
        download: '<?= lang('download'); ?>'
    };
</script>
<?php
$s2_lang_file = read_file('./assets/config_dumps/s2_lang.js');
foreach (lang('select2_lang') as $s2_key => $s2_line) {
    $s2_data[$s2_key] = str_replace(array('{', '}'), array('"+', '+"'), $s2_line);
}
$s2_file_date = $this->parser->parse_string($s2_lang_file, $s2_data, true);
?>
<script type="text/javascript" src="<?= $assets ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.dataTables.dtFilter.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/select2.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.calculator.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/core.js?v=90"></script>
<script type="text/javascript" src="<?= $assets ?>js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.ba-floatingscrollbar.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.chained.js"></script>


<script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
<script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>
<script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>


<?= ($m == 'purchases' && ($v == 'add' || $v == 'edit' || $v == 'purchase_by_csv')) ? '<script type="text/javascript" src="' . $assets . 'js/purchases.js"></script>' : ''; ?>
<?= ($m == 'transfers' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/transfers.js"></script>' : ''; ?>
<?= ($m == 'sales' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/sales.js"></script>' : ''; ?>
<?= ($m == 'returns' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/returns.js"></script>' : ''; ?>
<?= ($m == 'quotes' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/quotes.js"></script>' : ''; ?>
<?= ($m == 'products' && ($v == 'add_adjustment' || $v == 'edit_adjustment')) ? '<script type="text/javascript" src="' . $assets . 'js/adjustments.js"></script>' : ''; ?>
<?= 1 ? '<script type="text/javascript" src="' . $assets . 'plugins/xedit/bootstrap3-editable/js/bootstrap-editable.min.js"></script>' : ''; ?>





<script type="text/javascript" charset="UTF-8">
    var oTable = '',
        oTable2 = '',
        r_u_sure = "<?= lang('r_u_sure') ?>";
    <?= $s2_file_date ?>
    $.extend(true, $.fn.dataTable.defaults, {
        "oLanguage": <?= $dt_lang ?>
    });
    $.fn.datetimepicker.dates['sma'] = <?= $dp_lang ?>;
    $(window).load(function () {
        $('.mm_<?= $m ?>').addClass('active');
        $('.mm_<?= $m ?>').find("ul").first().slideToggle();
        $('#<?= $m ?>_<?= $v ?>').addClass('active');
        $('.mm_<?= $m ?> a .chevron').removeClass("closed").addClass("opened");
    });
</script>

<?= (DEMO) ? '<script src="' . $assets . 'js/ppp_ad.min.js"></script>' : ''; ?>




<script type="text/javascript" charset="UTF-8">
    $(function () {
        $("li.dropdown").hover(
            function () {
                $(this).addClass('open')
            },
            function () {
                $(this).removeClass('open')
            });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="token"]').attr('content')
        }
    });
    (function () {
        var original = $.fn.editableutils.setCursorPosition;
        $.fn.editableutils.setCursorPosition = function () {
            try {
                original.apply(this, Array.prototype.slice.call(arguments));
            } catch (e) {
                /* noop */
            }
        };
    })();



    $(document).ready(function () {
        <?php if (($this->input->get('type') != 'annual' && $this->input->get('type') != 'half_yearly') && (($this->Owner || $this->Admin) || $this->session->userdata('group_id') == 8 || ($entry_permission != false))) { ?>



            $('.editable').editable({
                mode: 'inline',
                showbuttons: false,
                params: function (params) {
                    // add additional params from data-attributes of trigger element
                    params.table = $(this).editable().data('table');
                    params.id = $(this).editable().data('id');
                    params.idname = $(this).editable().data('idname');
                    params.branch_id = <?php echo isset($branch->id) ? $branch->id : "''"; ?>;
                    params.token = $("meta[name=token]").attr("content");
                    return params;
                },
                success: function (response, config) {


                    console.log(config);
                    var data = $.parseJSON(response);

                    if (data.flag == 3)
                        location.reload();
                    else if (data.flag == 1) {
                        // config.error.call(this, data.msg);
                        alert(data.msg);
                        location.reload();
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });





            $('.yes_no').editable({
                mode: 'inline',
                prepend: "not selected",
                inputclass: 'form-control',
                source: [{
                    value: '1',
                    text: 'Yes'
                }, {
                    value: '0',
                    text: 'No'
                }],

                params: function (params) {
                    // add additional params from data-attributes of trigger element
                    params.table = $(this).editable().data('table');
                    params.id = $(this).editable().data('id');
                    params.idname = $(this).editable().data('idname');
                    params.branch_id = <?php echo isset($branch->id) ? $branch->id : "''"; ?>;
                    params.token = $("meta[name=token]").attr("content");
                    return params;
                },
                success: function (response) {
                    console.log('test', response);
                    var data = $.parseJSON(response);
                    if (data.flag == 3)
                        location.reload();
                    else if (data.flag == 1)
                        alert(data.msg);
                },
                error: function (response) {
                    console.log(response);
                }
            }






            );



            $('.yes_no_2').editable({
                mode: 'inline',
                prepend: "not selected",
                inputclass: 'form-control',
                source: [{
                    value: '1',
                    text: 'Yes'
                }, {
                    value: '0',
                    text: 'No'
                }],

                params: function (params) {
                    // add additional params from data-attributes of trigger element
                    params.table = $(this).editable().data('table');
                    params.id = $(this).editable().data('id');
                    params.idname = $(this).editable().data('idname');
                    params.branch_id = <?php echo isset($branch->id) ? $branch->id : "''"; ?>;
                    params.token = $("meta[name=token]").attr("content");
                    return params;
                },
                success: function (response) {
                    console.log('test', response);
                    var data = $.parseJSON(response);
                    if (data.flag == 3)
                        location.reload();
                    else if (data.flag == 1)
                        alert(data.msg);
                },
                error: function (response) {
                    console.log(response);
                }
            }






            );





            $('.ticket_status').editable({
                mode: 'popup',
                prepend: "not selected",
                inputclass: 'form-control',
                source: [{
                    value: 'New',
                    text: 'New'
                }, {
                    value: 'Received',
                    text: 'Received'
                }, {
                    value: 'In process',
                    text: 'In process'
                }, {
                    value: 'Done',
                    text: 'Done'
                }, {
                    value: 'Cancelled',
                    text: 'Cancelled'
                }, {
                    value: 'Closed',
                    text: 'Closed'
                }


                ],

                params: function (params) {
                    // add additional params from data-attributes of trigger element
                    params.table = $(this).editable().data('table');
                    params.id = $(this).editable().data('id');
                    params.idname = $(this).editable().data('idname');
                    params.branch_id = <?php echo isset($branch->id) ? $branch->id : "''"; ?>;
                    params.token = $("meta[name=token]").attr("content");
                    return params;
                },
                success: function (response) {
                    console.log('test', response);
                    var data = $.parseJSON(response);
                    if (data.flag == 3)
                        location.reload();
                    else if (data.flag == 1)
                        alert(data.msg);
                },
                error: function (response) {
                    console.log(response);
                }
            }






            );






        <?php } else if ($this->input->get('type') != 'annual' && $this->input->get('type') != 'half_yearly') { ?>

                $('.editable').click(function (e) {
                    e.preventDefault();

                });

        <?php } else { ?>

                $('.editable').click(function (e) {
                    return false;
                });


        <?php } ?>

        function sumcols(class_name, target_name) {

            var totalPrice = 0;
            $("." + class_name).each(function () {
                if (class_name == 'type_2') {

                }
                if (!isNaN(parseInt($(this).text())))
                    totalPrice += parseInt($(this).text());
            });
            if (class_name == 'type_7') {
                //totalPrice = 43;
                $("." + target_name).html(totalPrice / 5);
            } else
                $("." + target_name).html(totalPrice);
        }
        for (i = 1; i < 35; i++) {
            
            sumcols('type_' + i, 'total_' + i);
        }



        function sumcols_org(class_name, target_name) {

            var totalPrice = 0;
            $("." + class_name).each(function () {
                 
                if (!isNaN(parseInt($(this).text())))
                    totalPrice += parseInt($(this).text());
            });

            $("." + target_name).html(totalPrice);
            
        }



        for (i = 1; i < 35; i++) {
           
            sumcols_org('typeorg_' + i, 'totalorg_' + i);
        }



        Finalamount = parseInt($('.income').text()) - parseInt($('.total_2').text());
        $(".Finalamount").html(Math.abs(Finalamount));
        $("#Finalamount_label").html(Finalamount > 0 ? 'উদ্বৃত্ত' : 'ঘাটতি ');
        $("#Finalamount_label").addClass(Finalamount > 0 ? '' : 'text-danger');
        $("#Finalamount_label").closest('td').next('td').addClass(Finalamount > 0 ? '' : 'text-danger');


        $(".fa-barcode").click(function (e) {
            window.open('data:application/vnd.ms-excel,' + $("#testTable").html());
            e.preventDefault();
        });
    });




    <?php if ($this->uri->segment(2) != 'departmentsreport') { ?>

        $('form').submit(function () {
            $(this).find(':input[type=submit]').prop('disabled', true);
            $("#saving").removeClass('hidden');
        });

    <?php } ?>


    $("#prossion_target_sub_it").chained("#prossion_target_id");



    function doit(type, id, fn, dl) {
        var elt = document.getElementById(id);
        var file_name = document.getElementById(id).getAttribute('data-branch');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "Sheet 1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || (file_name + '.' + (type || 'xlsx')));
    }




    function tableau(pid, iid, fmt, ofile) {
        if (typeof Downloadify !== 'undefined') Downloadify.create(pid, {
            swf: 'downloadify.swf',
            downloadImage: 'download.png',
            width: 100,
            height: 30,
            filename: ofile,
            data: function () {
                return doit(fmt, ofile, true);
            },
            transparent: false,
            append: false,
            dataType: 'base64',
            onComplete: function () {
                alert('Your File Has Been Saved!');
            },
            onCancel: function () {
                alert('You have cancelled the saving of this file.');
            },
            onError: function () {
                alert('You must put something in the File Contents or there will be nothing to save!');
            }
        });
        else document.getElementById(pid).innerHTML = "";
    }
    //tableau('biff8btn', 'xportbiff8', 'biff8', 'SheetJSTableExport.xls');	
    //tableau('odsbtn',   'xportods',   'ods',   'SheetJSTableExport.ods');	
    //tableau('fodsbtn',  'xportfods',  'fods',  'SheetJSTableExport.fods');	
    //tableau('xlsbbtn',  'xportxlsb',  'xlsb',  'SheetJSTableExport.xlsb');	
    //tableau('xlsxbtn',  'xportxlsx',  'xlsx',  'exportedfile.xlsx');	
    var path = window.location.href;

    $(".box-header a[href='" + path + "']").addClass("btn btn-primary disabled");


    $(function () {
        // bind change event to select
        $('#nav_branch_id').on('change', function () {
            var url = $(this).val(); // get selected value
            if (url) { // require a URL
                window.location = url; // redirect
            }
            return false;
        });
    });



    $(document).on('click', '.ticket_reply_submit', function (e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $("#ticket_reply");
        var url = form.attr('action');

        if (!$("#reply_text").val()) {
            alert('Please write some text.');
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    if (data.error == 1) {
                        alert(data.msg);
                    } else {

                        $("#ticket_reply").html($("#reply_text").val());
                    }

                }
            });
        }


    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>


<script>
    function demo_create() {
        var ref = $('#jstree_demo').jstree(true),
            sel = ref.get_selected();
        if (!sel.length) {
            return false;
        }
        sel = sel[0];
        sel = ref.create_node(sel, {
            "type": "file"
        });
        if (sel) {
            ref.edit(sel);
        }
    };

    function demo_rename() {
        var ref = $('#jstree_demo').jstree(true),
            sel = ref.get_selected();
        if (!sel.length) {
            return false;
        }
        sel = sel[0];
        ref.edit(sel);
    };

    function demo_delete() {
        var ref = $('#jstree_demo').jstree(true),
            sel = ref.get_selected();
        if (!sel.length) {
            return false;
        }
        ref.delete_node(sel);
    };
    $(document).ready(function () {


        var to = false;
        $('#demo_q').keyup(function () {
            if (to) {
                clearTimeout(to);
            }
            to = setTimeout(function () {
                var v = $('#demo_q').val();
                $('#jstree_demo').jstree(true).search(v);
            }, 250);
        });

        $('#jstree_demo')
            .jstree({
                "core": {
                    "animation": 0,
                    "check_callback": true,
                    'force_text': true,
                    "themes": {
                        "stripes": true
                    },
                    'data': {
                        'url': function (node) {
                            return node.id === '#' ? '<?= admin_url('system_settings/getZones'); ?>' : '<?= admin_url('system_settings/getZones'); ?>';
                        },

                        // "success": function(data) {
                        //     // Modify the text fields in your data here
                        //     data.forEach(function(node) {
                        //         node.text = $('<div>').html(node.text).text(); // Parse and set HTML content
                        //     });
                        //     return data;
                        // },


                        // "dataType": "json",
                        'data': function (node) {
                            return {
                                'id': node.id
                            };
                        }
                    },
                    'escape': false,
                    'force_text': true,

                    // ,
                    // 'template': function(node) {

                    //     return `<span>${node.text}</span> 
                    // <button class="btn btn-sm btn-primary edit-btn" data-id="${node.id}">Edit</button> 
                    // <button class="btn btn-sm btn-danger delete-btn" data-id="${node.id}">Delete</button>`;
                    // }
                },
                "types": {
                    "#": {
                        "max_children": 1,
                        "max_depth": 4,
                        "valid_children": ["root"]
                    },
                    "root": {
                        "icon": '<?= base_url(); ?>' + "assets/tree_icon.png",
                        "valid_children": ["default"]
                    },
                    "default": {
                        "valid_children": ["default", "file"]
                    },
                    "file": {
                        "icon": "glyphicon glyphicon-file",
                        "valid_children": []
                    }
                },

                "plugins": ["contextmenu", "dnd", "search", "state", "types", "wholerow"]
            });

        //     .on("ready.jstree", function(e, data) {
        //         $('#jstree_demo').jstree().get_json('#', {
        //             'flat': true
        //         }).forEach(function(node) {
        //             var nodeElement = $('#' + node.id + '_anchor');
        //             nodeElement.append(`
        //     <button class="btn btn-sm btn-primary edit-btn" data-id="${node.id}" style="margin-left: 10px;">Edit</button>
        //     <button class="btn btn-sm btn-danger delete-btn" data-id="${node.id}" style="margin-left: 5px;">Delete</button>
        // `);
        //         });
        //     });



        $('#jstree_demo').bind("rename_node.jstree", function (e, data) {

            console.log(data);
            $.ajax({
                type: "POST",
                url: '<?= admin_url('system_settings/update_zone') ?>',
                data: {
                    "operation": "rename_node",
                    "id": data.node.id,
                    "title": data.text,
                    "<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
                },
                success: function (r) {
                    console.log(r);
                    if (1) { //!r.error
                        $('#jstree_demo').jstree(true).refresh()
                        alert('It works fine. ');
                    }
                }
            });




        });



    });
</script>
</body>

</html>