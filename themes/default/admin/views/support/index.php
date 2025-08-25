<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style type="text/css" media="screen">
    #ICData td:nth-child(7) {
        text-align: right;
    }

    .note-primary {
        background-color: #dfeefd;
        border-color: #176ac4;
    }

    .note {
        padding: 10px;
        border-left: 6px solid;
        border-radius: 5px;
    }


    .padding {
        padding: 10px;
    }

    /* GRID */
    .col {
        padding: 10px 20px;
        margin-bottom: 10px;
        background: #fff;
        color: #666666;
        text-align: center;
        font-weight: 400;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
    }

    .row h3 {
        color: #666666;
    }

    .row.grid {
        margin-left: 0;
    }

    .grid {
        position: relative;
        width: 100%;
        background: #fff;
        color: #666666;
        border-radius: 2px;
        margin-bottom: 25px;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
    }

    .grid .grid-header {
        position: relative;
        border-bottom: 1px solid #ddd;
        padding: 15px 10px 10px 20px;
    }

    .grid .grid-header:before,
    .grid .grid-header:after {
        display: table;
        content: " ";
    }

    .grid .grid-header:after {
        clear: both;
    }

    .grid .grid-header span,
    .grid .grid-header>.fa {
        display: inline-block;
        margin: 0;
        font-weight: 300;
        font-size: 1.5em;
        float: left;
    }

    .grid .grid-header span {
        padding: 0 5px;
    }

    .grid .grid-header>.fa {
        padding: 5px 10px 0 0;
    }

    .grid .grid-header>.grid-tools {
        padding: 4px 10px;
    }

    .grid .grid-header>.grid-tools a {
        color: #999999;
        padding-left: 10px;
        cursor: pointer;
    }

    .grid .grid-header>.grid-tools a:hover {
        color: #666666;
    }

    .grid .grid-body {
        padding: 15px 20px 15px 20px;
        font-size: 0.9em;
        line-height: 1.9em;
    }

    .grid .full {
        padding: 0 !important;
    }

    .grid .transparent {
        box-shadow: none !important;
        margin: 0px !important;
        border-radius: 0px !important;
    }

    .grid.top.black>.grid-header {
        border-top-color: #000000 !important;
    }

    .grid.bottom.black>.grid-body {
        border-bottom-color: #000000 !important;
    }

    .grid.top.blue>.grid-header {
        border-top-color: #007be9 !important;
    }

    .grid.bottom.blue>.grid-body {
        border-bottom-color: #007be9 !important;
    }

    .grid.top.green>.grid-header {
        border-top-color: #00c273 !important;
    }

    .grid.bottom.green>.grid-body {
        border-bottom-color: #00c273 !important;
    }

    .grid.top.purple>.grid-header {
        border-top-color: #a700d3 !important;
    }

    .grid.bottom.purple>.grid-body {
        border-bottom-color: #a700d3 !important;
    }

    .grid.top.red>.grid-header {
        border-top-color: #dc1200 !important;
    }

    .grid.bottom.red>.grid-body {
        border-bottom-color: #dc1200 !important;
    }

    .grid.top.orange>.grid-header {
        border-top-color: #f46100 !important;
    }

    .grid.bottom.orange>.grid-body {
        border-bottom-color: #f46100 !important;
    }

    .grid.no-border>.grid-header {
        border-bottom: 0px !important;
    }

    .grid.top>.grid-header {
        border-top-width: 4px !important;
        border-top-style: solid !important;
    }

    .grid.bottom>.grid-body {
        border-bottom-width: 4px !important;
        border-bottom-style: solid !important;
    }


    /* SUPPORT TICKET */
    .support ul {
        list-style: none;
        padding: 0px;
    }

    .support ul li {
        padding: 8px 10px;
    }

    .support ul li a {
        color: #999;
        display: block;
    }

    .support ul li a:hover {
        color: #666;
    }

    .support ul li.active {
        background: #0073b7;
    }

    .support ul li.active a {
        color: #fff;
    }

    .support ul.support-label li {
        padding: 2px 0px;
    }

    .support h2,
    .support-content h2 {
        margin-top: 5px;
    }

    .support-content .list-group li {
        padding: 15px 20px 12px 20px;
        cursor: pointer;
    }

    .support-content .list-group li:hover {
        background: #eee;
    }

    .support-content .fa-padding .fa {
        padding-top: 5px;
        width: 1.5em;
    }

    .support-content .info {
        color: #777;
        margin: 0px;
    }

    .support-content a {
        color: #111;
    }

    .support-content .info a:hover {
        text-decoration: underline;
    }

    .support-content .info .fa {
        width: 1.5em;
        text-align: center;
    }

    .support-content .number {
        color: #777;
    }

    .support-content img {
        margin: 0 auto;
        display: block;
    }

    .support-content .modal-body {
        padding-bottom: 0px;
    }

    .support-content-comment {
        padding: 10px 10px 10px 30px;
        background: #eee;
        border-top: 1px solid #ccc;
    }


    /* BACKGROUND COLORS */
    .bg-red,
    .bg-yellow,
    .bg-aqua,
    .bg-blue,
    .bg-light-blue,
    .bg-green,
    .bg-navy,
    .bg-teal,
    .bg-olive,
    .bg-lime,
    .bg-orange,
    .bg-fuchsia,
    .bg-purple,
    .bg-maroon,
    bg-gray,
    bg-black,
    .bg-red a,
    .bg-yellow a,
    .bg-aqua a,
    .bg-blue a,
    .bg-light-blue a,
    .bg-green a,
    .bg-navy a,
    .bg-teal a,
    .bg-olive a,
    .bg-lime a,
    .bg-orange a,
    .bg-fuchsia a,
    .bg-purple a,
    .bg-maroon a,
    bg-gray a,
    .bg-black a {
        color: #f9f9f9 !important;
    }

    .bg-white,
    .bg-white a {
        color: #999999 !important;
    }

    .bg-red {
        background-color: #f56954 !important;
    }

    .bg-yellow {
        background-color: #f39c12 !important;
    }

    .bg-aqua {
        background-color: #00c0ef !important;
    }

    .bg-blue {
        background-color: #0073b7 !important;
    }

    .bg-light-blue {
        background-color: #3c8dbc !important;
    }

    .bg-green {
        background-color: #00a65a !important;
    }

    .bg-navy {
        background-color: #001f3f !important;
    }

    .bg-teal {
        background-color: #39cccc !important;
    }

    .bg-olive {
        background-color: #3d9970 !important;
    }

    .bg-lime {
        background-color: #01ff70 !important;
    }

    .bg-orange {
        background-color: #ff851b !important;
    }

    .bg-fuchsia {
        background-color: #f012be !important;
    }

    .bg-purple {
        background-color: #932ab6 !important;
    }

    .bg-maroon {
        background-color: #85144b !important;
    }

    .bg-gray {
        background-color: #eaeaec !important;
    }

    .bg-black {
        background-color: #222222 !important;
    }
</style>

<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('pages/page_actions', 'id="action-form"');
} ?>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= lang('সহায়িকা'); ?>
        </h2>


    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext hidden"><?= lang('list_results'); ?></p>
                <ul class="list-unstyled">
                    <?php foreach ($supports as $row) { ?>
                        <li>
                            <h3 class="note note-primary"><a href="<?= admin_url('support/detail/' . $row['id']); ?>"><?php echo $row['title']; ?></a></h3>
                        </li>
                    <?php } ?>

                </ul>
                <br />
                <p class="text-right align-right">
                    <a class="tip  btn btn-primary" title="" href="<?= admin_url('support/add') ?>" data-toggle="modal" data-target="#myModal" data-original-title="New ticket"> <i class="icon fa fa-plus" data-placement="left" title="<?= lang("actions") ?>"><?= ' মেসেজ করুন' ?></i> </a>
                </p>
            </div>

            <div class="col-lg-12">

                <div class="row">
                    <!-- BEGIN NAV TICKETs -->
                    <div class="col-md-3">
                        <div class="grid support">
                            <div class="grid-body">
                                <h2>Browse</h2>

                                <hr>

                                <ul>
                                    <li class="active"><a href="#">All tickets<span class="pull-right hidden">142</span></a></li>
                                    <li class="hidden"><a href="#">Created by departments<span class="pull-right">52</span></a></li>
                                    <li class="hidden"><a href="#">Created by branches<span class="pull-right">18</span></a></li>
                                </ul>

                                <hr>
                                <div class="hidden">
                                    <p><strong>Labels</strong></p>
                                    <ul class="support-label">
                                        <li><a href="#"><span class="bg-blue">&nbsp;</span>&nbsp;&nbsp;&nbsp;Manpower<span class="pull-right">2</span></a></li>
                                        <li><a href="#"><span class="bg-red">&nbsp;</span>&nbsp;&nbsp;&nbsp;BM<span class="pull-right">7</span></a></li>
                                        <li><a href="#"><span class="bg-yellow">&nbsp;</span>&nbsp;&nbsp;&nbsp;Organization<span class="pull-right">128</span></a></li>
                                        <li><a href="#"><span class="bg-black">&nbsp;</span>&nbsp;&nbsp;&nbsp;Visit<span class="pull-right">41</span></a></li>
                                        <li><a href="#"><span class="bg-light-blue">&nbsp;</span>&nbsp;&nbsp;&nbsp;Program<span class="pull-right">22</span></a></li>
                                        <li><a href="#"><span class="bg-green">&nbsp;</span>&nbsp;&nbsp;&nbsp;Dawat<span class="pull-right">87</span></a></li>
                                        <li><a href="#"><span class="bg-purple">&nbsp;</span>&nbsp;&nbsp;&nbsp;Others<span class="pull-right">92</span></a></li>
                                        <li><a href="#"><span class="bg-teal">&nbsp;</span>&nbsp;&nbsp;&nbsp;Clearance<span class="pull-right">140</span></a></li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- END NAV TICKET -->
                    <!-- BEGIN TICKET -->
                    <div class="col-md-9">
                        <div class="grid support-content">
                            <div class="grid-body">
                                <h2>Tickets</h2>

                                <hr>

                                <div class="btn-group hidden">
                                    <button type="button" class="btn btn-default active">162 Open</button>
                                    <button type="button" class="btn btn-default">95,721 Closed</button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Sort: <strong>Newest</strong> <span class="caret"></span></button>
                                    <ul class="dropdown-menu fa-padding" role="menu">
                                        <li><a href="#"><i class="fa fa-check"></i> Newest</a></li>
                                        <li><a href="#"><i class="fa"> </i> Oldest</a></li>
                                        <li><a href="#"><i class="fa"> </i> Recently updated</a></li>
                                        <li><a href="#"><i class="fa"> </i> Least recently updated</a></li>
                                        <li><a href="#"><i class="fa"> </i> Most commented</a></li>
                                        <li><a href="#"><i class="fa"> </i> Least commented</a></li>
                                    </ul>
                                </div>


                                <!-- BEGIN NEW TICKET -->
                                <a class="tip  btn btn-primary pull-right" title="" href="<?= admin_url('support/add') ?>" data-toggle="modal" data-target="#myModal" data-original-title="New ticket"> <i class="icon fa fa-plus" data-placement="left" title="<?= lang("actions") ?>"><?= ' New ticket' ?></i> </a>

                                <!-- END NEW TICKET -->

                                <div class="btn-group pull-right" style="padding-right:5px">
                                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i></button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button>

                                </div>

                                <div class="btn-group pull-right" style="padding-right:5px">
                                    <button type="button" class="btn">Page: 5</button>

                                </div>

                                <div class="padding"></div>

                                <div class="row">
                                    <!-- BEGIN TICKET CONTENT -->
                                    <div class="col-md-12">
                                        <ul class="list-group fa-padding">

                                            <?php foreach ($tickets as $key => $row) { ?>
                                                <li class="list-group-item" <?php if ($row['is_read_admin'] == 'Yes' && $row['is_read_reply_admin'] == 'Yes') { ?> style="background:#eee" <?php } ?>>

                                                    <div class="media">

                                                        <i class="pull-left" style="width:20px; padding-right:20px; padding-top:2px;"><?= $row['code'] ?></i>

                                                        <div class="media-body">
                                                            <a href="<?= admin_url('support/ticketdetail/' . $row['id']) ?>" data-toggle="modal" data-target="#myModal"><strong><?= $row['ticket_caption'] ?></strong></a>
                                                            <span class="label label-<?= $row['is_status'] == 'New' ? 'primary' : ($row['is_status'] == 'Done' ? 'success' : ($row['is_status'] == 'Cancelled' ? 'danger' : 'warning')) ?>">

                                                                <a href="#" class="ticket_status  editable-click" data-type="select" data-table="support_ticket" data-pk="<?php echo  $row['id']; ?>" data-url="<?php echo admin_url('organization/ticketupdate'); ?>" data-name="is_status" data-title="Enter"><?= $row['is_status'] ?></a>


                                                            </span><span class="number pull-right"># <?= $row['id'] ?></span>
                                                            <p class="info">Opened by <a href="#"></a> <?= $row['entry_date'] ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                        <!-- BEGIN DETAIL TICKET -->
                                        <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="issue" aria-hidden="true">
                                            <div class="modal-wrapper">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-blue">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title"><i class="fa fa-cog"></i> Add drag and drop config import closes</h4>
                                                        </div>
                                                        <form action="#" method="post">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="assets/img/user/avatar01.png" class="img-circle" alt="" width="50">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <p>Issue <strong>#13698</strong> opened by <a href="#">jqilliams</a> 5 hours ago</p>
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row support-content-comment">
                                                                    <div class="col-md-2">
                                                                        <img src="assets/img/user/avatar02.png" class="img-circle" alt="" width="50">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <p>Posted by <a href="#">ehernandez</a> on 16/06/2014 at 14:12</p>
                                                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                        <a href="#"><span class="fa fa-reply"></span> &nbsp;Post a reply</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END DETAIL TICKET -->
                                    </div>
                                    <!-- END TICKET CONTENT -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TICKET -->
                </div>


            </div>


        </div>
    </div>
</div>
<?php if ($Owner || $GP['bulk_actions']) { ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action" />
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>
<?php } ?>