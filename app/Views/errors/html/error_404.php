<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Qearaf Admin | Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Page For Admin" name="description" />
    <meta content="Qearaf.COM" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/qearaf_32px.webp">

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" crossorigin="anonymous" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

</head>


<body>

    <!-- <body data-layout="horizontal"> -->

    <div class="min-vh-100" style="background: url(<?= base_url() ?>assets/images/bg-2.png) top;">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-5 mt-5">
                        <div class="position-relative">
                            <h1 class="error-title error-text mb-0">404</h1>
                            <h4 class="error-subtitle text-uppercase mb-0">Opps, page not found</h4>
                            <!-- <p class="font-size-16 mx-auto text-muted w-50 mt-4">It will be as simple as Occidental in fact, it will Occidental to an English person</p> -->
                        </div>
                        <div class="mt-4 text-center">
                            <a class="btn btn-primary" href="<?= base_url() ?>dashboards">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/eva-icons/eva.min.js"></script>

</body>

</html>