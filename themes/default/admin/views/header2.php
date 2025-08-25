<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <base href="<?= site_url() ?>" />
    <meta content="<?= $this->security->get_csrf_hash(); ?>" name="<?= $this->security->get_csrf_token_name() ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - <?= $Settings->site_name ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png" />
    <link href="<?= $assets ?>styles/theme.css?v=1" rel="stylesheet" />
    <link href="<?= $assets ?>styles/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />

    <link href="<?= $assets ?>styles/dataTables.fixedColumns.css" rel="stylesheet" />




    <script type="text/javascript" src="<?= $assets ?>js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?= $assets ?>js/jquery-migrate-1.2.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= $assets ?>js/jquery.js"></script>
    <![endif]-->
    <noscript>
        <style type="text/css">
            #loading {
                display: none;
            }
        </style>
    </noscript>
    <?php if ($Settings->user_rtl) { ?>
        <link href="<?= $assets ?>styles/helpers/bootstrap-rtl.min.css" rel="stylesheet" />
        <link href="<?= $assets ?>styles/style-rtl.css" rel="stylesheet" />
        <script type="text/javascript">
            $(document).ready(function () {
                $('.pull-right, .pull-left').addClass('flip');
            });
        </script>
    <?php } ?>
    <script type="text/javascript">
        $(window).load(function () {
            $("#loading").fadeOut("slow");
        });
    </script>

    <style>
        @font-face {
            font-family: SolaimanLipi;
            src: local('SolaimanLipi'),
                url('../fonts/solaimanlipi.woff') format('woff'),
                url('../fonts/solaimanlipi.woff2') format('woff2');
        }

        html,
        body {
            font-family: SolaimanLipi !important;
        }

        td,
        th {
            font-family: SolaimanLipi !important;
        }

        .editableform .form-control {
            max-width: 100px
        }


        #app_wrapper2 {
            width: 1340px;
            overflow-x: hidden
        }

        <?php if (0 && ($Owner || $Admin)) { ?>
            .tmp_hidden {
                display: none !important;
            }

        <?php } ?>
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PH97ELTK86"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-PH97ELTK86');
    </script>


</head>

<body>
    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p><strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled
                    in
                    your browser to utilize the functionality of this website.</p>
            </div>
        </div>
    </noscript>
    <div id="loadingOLD"></div>
    <div id="app_wrapper">
        <header id="header" class="navbar">
            <div class="container">
                <a class="navbar-brand" href="<?= admin_url() ?>"><span
                        class="logo"><?= $Settings->site_name ?></span></a>

                <div class="btn-group visible-xs pull-right btn-visible-sm">
                    <button class="navbar-toggle btn" type="button" data-toggle="collapse" data-target="#sidebar_menu">
                        <span class="fa fa-bars"></span>
                    </button>

                    <a href="<?= admin_url('calendar') ?>" class="btn">
                        <span class="fa fa-calendar"></span>
                    </a>
                    <a href="<?= admin_url('users/profile/' . $this->session->userdata('user_id')); ?>" class="btn">
                        <span class="fa fa-user"></span>
                    </a>
                    <a href="<?= admin_url('logout'); ?>" class="btn">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
                <div class="header-nav">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown">
                            <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
                                <img alt=""
                                    src="<?= $this->session->userdata('avatar') ? base_url() . 'assets/uploads/avatars/thumbs/' . $this->session->userdata('avatar') : base_url('assets/images/' . $this->session->userdata('gender') . '.png'); ?>"
                                    class="mini_avatar img-rounded">

                                <div class="user">
                                    <span><?= lang('welcome') ?> <?= $this->session->userdata('username'); ?></span>
                                </div>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="<?= admin_url('users/profile/' . $this->session->userdata('user_id')); ?>">
                                        <i class="fa fa-user"></i> <?= lang('profile'); ?>
                                    </a>
                                </li>
                                <li class="hidden">
                                    <a
                                        href="<?= admin_url('users/profile/' . $this->session->userdata('user_id') . '/#cpassword'); ?>"><i
                                            class="fa fa-key"></i> <?= lang('change_password'); ?>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?= admin_url('logout'); ?>">
                                        <i class="fa fa-sign-out"></i> <?= lang('logout'); ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown hidden-xs"><a class="btn tip" title="<?= lang('dashboard') ?>"
                                data-placement="bottom" href="<?= admin_url('welcome') ?>"><i
                                    class="fa fa-dashboard"></i></a></li>

                        <?php if ($Owner) { ?>
                            <li class="dropdown hidden-sm">
                                <a class="btn tip" title="<?= lang('settings') ?>" data-placement="bottom"
                                    href="<?= admin_url('system_settings') ?>">
                                    <i class="fa fa-cogs"></i>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="dropdown hidden-xs">
                            <a class="btn tip" title="<?= lang('calculator') ?>" data-placement="bottom" href="#"
                                data-toggle="dropdown">
                                <i class="fa fa-calculator"></i>
                            </a>
                            <ul class="dropdown-menu pull-right calc">
                                <li class="dropdown-content">
                                    <span id="inlineCalc"></span>
                                </li>
                            </ul>
                        </li>
                        <?php if ($info) { ?>
                            <li class="dropdown hidden-sm">
                                <a class="btn tip" title="<?= lang('notifications') ?>" data-placement="bottom" href="#"
                                    data-toggle="dropdown">
                                    <i class="fa fa-info-circle"></i>
                                    <span class="number blightOrange black"><?= sizeof($info) ?></span>
                                </a>
                                <ul class="dropdown-menu pull-right content-scroll">
                                    <li class="dropdown-header"><i class="fa fa-info-circle"></i>
                                        <?= lang('notifications'); ?></li>
                                    <li class="dropdown-content">
                                        <div class="scroll-div">
                                            <div class="top-menu-scroll">
                                                <ol class="oe">
                                                    <?php foreach ($info as $n) {
                                                        echo '<li>' . $n->comment . '</li>';
                                                    } ?>
                                                </ol>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <li class="dropdown hidden-sm">
                            <a class="btn tip" title="<?= lang('styles') ?>" data-placement="bottom"
                                data-toggle="dropdown" href="#">
                                <i class="fa fa-css3"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li class="bwhite noPadding">
                                    <a href="#" id="fixed" class="">
                                        <i class="fa fa-angle-double-left"></i>
                                        <span id="fixedText">Fixed</span>
                                    </a>
                                    <a href="#" id="cssLight" class="grey">
                                        <i class="fa fa-stop"></i> Grey
                                    </a>
                                    <a href="#" id="cssBlue" class="blue">
                                        <i class="fa fa-stop"></i> Blue
                                    </a>
                                    <a href="#" id="cssBlack" class="black">
                                        <i class="fa fa-stop"></i> Black
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="btn tip" title="<?= lang('language') ?>" data-placement="bottom"
                                data-toggle="dropdown" href="#">
                                <img src="<?= base_url('assets/images/' . $Settings->user_language . '.png'); ?>"
                                    alt="">
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <?php $scanned_lang_dir = array_map(function ($path) {
                                    return basename($path);
                                }, glob(APPPATH . 'language/*', GLOB_ONLYDIR));
                                foreach ($scanned_lang_dir as $entry) { ?>
                                    <li>
                                        <a href="<?= admin_url('welcome/language/' . $entry); ?>">
                                            <img src="<?= base_url('assets/images/' . $entry . '.png'); ?>"
                                                class="language-img">
                                            &nbsp;&nbsp;<?= ucwords($entry); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?= admin_url('welcome/toggle_rtl') ?>">
                                        <i class="fa fa-align-<?= $Settings->user_rtl ? 'right' : 'left'; ?>"></i>
                                        <?= lang('toggle_alignment') ?>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php if ($Owner || $Admin) { ?>

                            <li class="dropdown hidden-xs">
                                <a class="btn bred tip" title="<?= lang('clear_ls') ?>" data-placement="bottom" id="clearLS"
                                    href="#">
                                    <i class="fa fa-eraser"></i>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </header>
















        <section class="">




            <nav class="navbar navbar-default " role="navigation" style="z-index:1">
                <div class="container ">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-ex1-collapse">
                            Navigation
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo (!$this->uri->segment(2)) ? 'active' : '' ?>"><a href="##">Home</a>
                            </li>

                            <?php if ($Owner || $Admin) { ?>
                                <li class="<?php echo ($this->uri->segment(2) == 'manpower') ? 'active' : '' ?>"><a
                                        href="<?= admin_url('manpower'); ?>">জনশক্তি</a></li>
                            <?php } ?>



                            <?php if (1 || $Owner || $Admin) { ?>


                                <?php if ($Owner || $Admin) { ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false">
                                            দাওয়াত <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class=""><a href="<?= admin_url('dawat'); ?>">একনজরে </a></li>
                                            <li class=""><a href="<?= admin_url('dawat/element'); ?>">দাওয়াতী উপকরণ</a></li>
                                            <li class=""><a href="<?= admin_url('dawat/mosque'); ?>">মসজিদ ভিত্তিক কাজ</a></li>
                                            <li class=""><a href="<?= admin_url('dawat/extra'); ?>">অতিরিক্ত দাওয়াত</a></li>
                                            <li class=""><a href="<?= admin_url('dawat/detail'); ?>">বিস্তারিত দাওয়াত </a></li>
                                        </ul>
                                    </li>

                                <?php } ?>






                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        সংগঠন <span class="caret">
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= admin_url('organization'); ?>" class="line-height-lg">একনজরে </a>
                                        </li>
                                        <li><a href="<?= admin_url('organization/institutionlist'); ?>"
                                                class="line-height-lg">প্রতিষ্ঠান তালিকা</a></li>

                                        <li class="tmp_hidden"><a href="<?= admin_url('organization/institutionbutorg'); ?>"
                                                class="line-height-lg"> <?= "যে সব প্রতিষ্ঠানে সংগঠন নেই"; ?></a></li>
                                        <li><a href="<?= admin_url('others/administration'); ?>"
                                                class="line-height-lg">প্রশাসনিক বিবরণ</a></li>

                                        <li class="tmp_hidden"><a href="<?= admin_url('others/administrationbutorg'); ?>"
                                                class="line-height-lg">যে সব এলাকায় সংগঠন নেই</a></li>
                                        <li class="tmp_hidden"><a href="<?= admin_url('others/organizationinfo'); ?>"
                                                class="line-height-lg">সাংগঠনিক বিবরণ</a></li>
                                        <li class="tmp_hidden"><a href="<?= admin_url('organization/thanalist'); ?>"
                                                class="line-height-lg">থানা তালিকা</a></li>

                                    </ul>
                                </li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        প্রশাসনিক বিবরণ<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= admin_url('administrativedetail/district'); ?>"
                                                class="line-height-lg">জেলা </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/thana'); ?>"
                                                class="line-height-lg">সিটি থানা </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/upazila'); ?>"
                                                class="line-height-lg">উপজেলা </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/pourosova'); ?>"
                                                class="line-height-lg">পৌরসভা </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/union'); ?>"
                                                class="line-height-lg">ইউনিয়ন </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/cityward'); ?>"
                                                class="line-height-lg">সিটি ওয়ার্ড </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/pouroward'); ?>"
                                                class="line-height-lg">পৌর ওয়ার্ড </a></li>
                                        <li><a href="<?= admin_url('administrativedetail/unionward'); ?>"
                                                class="line-height-lg">ইউনিয়ন ওয়ার্ড </a></li>


                                    </ul>
                                </li>


                                <li class="tmp_hidden"><a href="<?= admin_url('others/program'); ?>">সভাসমূহ</a></li>
                                <li class="dropdown tmp_hidden">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        প্রশিক্ষণ <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= admin_url('others/centraltraining'); ?>"
                                                class="line-height-lg">কেন্দ্রীয় প্রশিক্ষণ </a></li>
                                        <li><a href="<?= admin_url('training'); ?>" class="line-height-lg">শাখা প্রশিক্ষণ
                                            </a></li>

                                        <li><a href="<?= admin_url('training/communication'); ?>"
                                                class="line-height-lg">যোগাযোগ </a></li>
                                        <li><a href="<?= admin_url('training/trainingelement'); ?>"
                                                class="line-height-lg">উপকরণ </a></li>

                                        <li><a href="<?= admin_url('training/library'); ?>" class="line-height-lg">পাঠাগার
                                            </a></li>
                                        <li class=""><a href="<?= admin_url('highersyllabus'); ?>">উচ্চতর সিলেবাস</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown tmp_hidden">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">
                                        অন্যান্য <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class=""><a href="<?= admin_url('bm'); ?>">বিএম </a></li>

                                        <li><a href="<?= admin_url('guest'); ?>" class="line-height-lg">সফর </a></li>
                                        <?php if ($Owner || $Admin) { ?>
                                            <li><a href="<?= admin_url('guest/guestlist'); ?>" class="line-height-lg">সফরকারী
                                                </a></li>

                                            <li><a href="<?= admin_url('training/communication'); ?>"
                                                    class="line-height-lg">যোগাযোগ </a></li>
                                            <li><a href="<?= admin_url('training/trainingelement'); ?>"
                                                    class="line-height-lg">উপকরণ </a></li>


                                        <?php } ?>


                                        <li
                                            class="hidden <?php echo ($this->uri->segment(3) == 'school-karjokrom-bivag') ? 'active' : '' ?>">
                                            <a href="<?= admin_url('departmentsreport/school-karjokrom-bivag'); ?>">স্কুল
                                                কার্যক্রম </a>
                                        </li>
                                    </ul>
                                </li>



                                <li class=" <?php echo ($this->uri->segment(2) == 'departmentsreport') ? 'active' : '' ?>">
                                    <a href="<?= admin_url('departmentsreport'); ?>">বিভাগীয় রিপোর্ট</a>
                                </li>






                            <?php } ?>









                            <?php
                            if ($Owner || $Admin || $this->session->userdata('group_id') == 8 || $this->session->userdata('branch_id')) {
                                ?>
                                <li class="tmp_hidden"><a href="<?= admin_url('reportsubmit'); ?>">ছাড়পত্র</a></li>
                                <?php
                            }
                            ?>


                            <li class=""><a href="<?= admin_url('support'); ?>">সহায়িকা</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <hr class="divider" />