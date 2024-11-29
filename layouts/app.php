<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="enable" data-bs-theme="dark">

<head>

    <meta charset="utf-8" />
    <title><?= $title ?? 'Dashboard' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- Sweet Alert css-->
    <link href="<?= asset() ?><?= asset() ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= asset() ?><?= asset() ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= asset() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= asset() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= asset() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= asset() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php

        include 'partials/header.php';
        include 'partials/sidebar.php';
        ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <?= $slot ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="<?= asset() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= asset() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= asset() ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= asset() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= asset() ?>assets/js/plugins.js"></script>

    <!-- list.js min js -->
    <script src="<?= asset() ?>assets/libs/list.js/list.min.js"></script>

    <!--list pagination js-->
    <script src="<?= asset() ?>assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- titcket init js -->
    <script src="<?= asset() ?>assets/js/pages/tasks-list.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="<?= asset() ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="<?= asset() ?>assets/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/apps-tasks-list-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 13:04:45 GMT -->

</html>