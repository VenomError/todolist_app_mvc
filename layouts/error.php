<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-bs-theme="dark">


<!-- Mirrored from themesbrand.com/velzon/html/material/auth-404-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 13:05:15 GMT -->

<head>

    <meta charset="utf-8" />
    <title><?= $title ?? 'error' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?= asset() ?>assets/js/layout.js"></script>
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

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <?= $slot ?>
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= asset() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= asset() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= asset() ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= asset() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= asset() ?>assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?= asset() ?>assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= asset() ?>assets/js/pages/particles.app.js"></script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/auth-404-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jun 2024 13:05:16 GMT -->

</html>