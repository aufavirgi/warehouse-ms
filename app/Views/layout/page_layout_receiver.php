<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Warehouse MS - Receiver</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
    <!-- Pignose Calender -->
    <link href="<?= base_url('assets/plugins/pg-calendar/css/pignose.calendar.min.css') ?>" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/chartist/css/chartist.min.css') ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') ?>">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="<?= base_url('assets/images/logo.png') ?>" alt=""> </b>
                    <span class="logo-compact"><img src="<?= base_url('assets/images/logo-compact.png') ?>"
                            alt=""></span>
                    <span class="brand-title">
                        <img src="<?= base_url('assets/images/logo-text.png') ?>" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">

                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?= base_url('assets/images/user/1.png') ?>" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href=""><i class="icon-user"></i>
                                                <span><?php $sesi = session(); echo "Hello, ".$sesi->get('pen_nama'); ?></span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href=""><i class="icon-lock"></i> <span>Lock
                                                    Screen</span></a>
                                        </li>
                                        <li><a href="<?=  base_url('login/logout')?>"><i class="icon-key"></i>
                                                <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <div class="nk-sidebar">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                <div class="nk-nav-scroll active" style="overflow: hidden; width: auto; height: 100%;">
                    <ul class="metismenu in" id="menu">

                        <li class="mega-menu mega-menu-sm">
                            <a href="<?=  base_url('dashboard/receiver')?>" aria-expanded="false">
                                <i class="icon-home menu-icon"></i><span class="nav-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-label">List Palette Masuk</li>
                        <li>
                            <a href="<?=  base_url('receive/putaway_list')?>" aria-expanded="false">
                                <i class="icon-note menu-icon"></i><span class="nav-text">Putaway Barang Masuk</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="slimScrollBar"
                    style="background: transparent; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 13705.8px;">
                </div>
                <div class="slimScrollRail"
                    style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">

                <?= $this->renderSection('content') ?>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <script src="<?= base_url('assets/plugins/common/common.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/settings.js') ?>"></script>
    <script src="<?= base_url('assets/js/gleek.js') ?>"></script>
    <script src="<?= base_url('assets/js/styleSwitcher.js') ?>"></script>


    <!-- Chartjs -->
    <script src="<?= base_url('./assets/plugins/chart.js/Chart.bundle.min.js') ?>"></script>
    <!-- Circle progress -->
    <script src="<?= base_url('./assets/plugins/circle-progress/circle-progress.min.js') ?>"></script>
    <!-- Datamap -->
    <script src="<?= base_url('./assets/plugins/d3v3/index.js') ?>"></script>
    <script src="<?= base_url('./assets/plugins/topojson/topojson.min.js') ?>"></script>
    <script src="<?= base_url('./assets/plugins/datamaps/datamaps.world.min.js') ?>"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url('./assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('./assets/plugins/morris/morris.min.js') ?>"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url('./assets/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('./assets/plugins/pg-calendar/js/pignose.calendar.min.js') ?>"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url('./assets/plugins/chartist/js/chartist.min.js') ?>"></script>
    <script src="<?= base_url('./assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') ?>">
    </script>
    <script src="<?= base_url('assets/plugins/validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/validation/jquery.validate-init.js') ?>"></script>

    <!-- Data table -->
    <script src="<?= base_url('assets/plugins/tables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/dashboard/dashboard-1.js') ?>"></script>

</body>

</html>