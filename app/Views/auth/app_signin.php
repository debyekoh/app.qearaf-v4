<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Qearaf Admin | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Page For Admin" name="description" />
    <meta content="Qearaf.COM" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/qearaf_32px.webp">

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>


<body>

    <!-- <body data-layout="horizontal"> -->

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="mb-4 pb-2">
                            <a class="d-block auth-logo">
                                <img src="<?= base_url() ?>assets/images/Logo Admin Dark 40px.webp" alt="Logo Admin Dark 40px" height="40" class="auth-logo-dark me-start">
                                <img src="<?= base_url() ?>assets/images/Logo Admin Dark 40px.webp" alt="Logo Admin Dark 40px" height="40" class="auth-logo-light me-start">
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h3><?= lang('Auth.loginTitle') ?></h3>
                                    <p class="text-muted">Login to continue to Qearaf.Com.</p>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <div class="p-2">

                                    <form action="<?= url_to('login') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <!-- <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                                <span class="bx bx-user"></span>
                                            </div>
                                        </div> -->
                                        <?php if ($config->validFields === ['email']) : ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="login"><?= lang('Auth.email') ?></label>
                                                <div class="position-relative input-custom-icon">
                                                    <!-- <input type="email" class="form-control" id="username" name="username" placeholder="Enter username"> -->
                                                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                                    <span class="bx bx-user"></span>
                                                    <!-- <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div> -->
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="mb-3">
                                                <label class="form-label" for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                                <div class="position-relative input-custom-icon">
                                                    <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"> -->
                                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                                    <span class="bx bx-user"></span>
                                                    <!-- <div class="invalid-feedback">
                                                        <?= session('errors.login') ?>
                                                    </div> -->
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- <div class="mb-3">
                                            <div class="float-end">
                                                <a href="<?= site_url('forgot') ?>" class="text-muted text-decoration-underline">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <input type="password" class="form-control" id="password-input" name="password" autocomplete="Password" placeholder="Enter password">
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                            </div>
                                        </div> -->

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="<?= url_to('forgot') ?>" class="text-muted text-decoration-underline"><?= lang('Auth.forgotYourPassword') ?></a>
                                            </div>
                                            <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <!-- <input type="password" class="form-control" id="password-input" name="password" autocomplete="Password" placeholder="Enter password"> -->
                                                <input type="password" name="password" id="password-input" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <!-- <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div> -->
                                            </div>
                                        </div>
                                        <?php if ($config->allowRemembering) : ?>
                                            <div class="form-check py-1">
                                                <!-- <input type="checkbox" class="form-check-input" id="auth-terms-condition-check"> -->
                                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <label class="form-check-label" for="auth-terms-condition-check"><?= lang('Auth.rememberMe') ?></label>
                                            </div>
                                        <?php endif; ?>

                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"><?= lang('Auth.loginAction') ?></button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 mt-2 title"> or Create Account </h5>
                                            </div>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Don't have an account ? <a href="<?= url_to('register') ?>" class="fw-medium text-primary"> Signup now </a> </p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            2023 © Qearaf.COM <i>-</i> Version 1.5.0</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenujs/metismenujs.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script> -->
    <script src="<?= base_url() ?>assets/libs/eva-icons/eva.min.js"></script>

    <script src="<?= base_url() ?>assets/js/pages/pass-addon.init.js"></script>



</body>

</html>