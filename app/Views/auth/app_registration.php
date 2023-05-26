<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Qearaf Admin | Registration</title>
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
                                    <h5><?= lang('Auth.register') ?> Account</h5>
                                    <p class="text-muted">Get your free webadmin account now.</p>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <div class="p-2 mt-4">
                                    <form action="<?= url_to('register') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <div class="mb-3" hidden>
                                            <label class="form-label" for="id">UserID</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" id="new_id" name="member_id" placeholder="ID">
                                                <span class="bx bx-user"></span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="email"><?= lang('Auth.email') ?></label>
                                            <div class="position-relative input-custom-icon">
                                                <!-- <input type="email" class="form-control" name="email" placeholder="Enter email"> -->
                                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                                <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
                                                <span class="bx bx-mail-send"></span>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="username"><?= lang('Auth.username') ?></label>
                                            <div class="position-relative input-custom-icon">
                                                <!-- <input type="text" class="form-control" name="username" placeholder="Enter username"> -->
                                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                                <span class="bx bx-user"></span>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-email-input">Full Name</label>
                                                    <input type="text" class="form-control text-capitalize" name="first_name" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-email-input">Last Name</label>
                                                    <input type="text" class="form-control text-capitalize" name="last_name" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="mb-3">
                                            <label class="form-label" for="password"><?= lang('Auth.password') ?></label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <!-- <input type="password" class="form-control" name="password" id="password-input" autocomplete="Password" placeholder="Enter password" required> -->
                                                <input type="password" name="password" id="password-input" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <!-- <input type="password" class="form-control" name="password" id="password-input" autocomplete="Password" placeholder="Enter password" required> -->
                                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- <div class="form-check py-1">
                                            <input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                            <label class="form-check-label" for="auth-terms-condition-check">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                        </div> -->

                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"><?= lang('Auth.register') ?></button>
                                        </div>

                                        <!-- <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 mt-2 title"> Sign in with </h5>
                                            </div>
            
                                            <ul class="list-inline mt-2">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="bx bxl-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                                        <i class="bx bxl-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="bx bxl-google"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Already have an account ? <a href="<?= url_to('login') ?>" class="fw-medium text-primary"> Login</a></p>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

    <script>
        function generateUUID() { // Public Domain/MIT
            var d = new Date().getTime(); //Timestamp
            var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0; //Time in microseconds since page-load or 0 if unsupported
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16; //random number between 0 and 16
                if (d > 0) { //Use timestamp until depleted
                    r = (d + r) % 16 | 0;
                    d = Math.floor(d / 16);
                } else { //Use microseconds since page-load if supported
                    r = (d2 + r) % 16 | 0;
                    d2 = Math.floor(d2 / 16);
                }
                return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
            });
        }

        var onClick = function() {
            // document.getElementById('new_user_id').textContent = generateUUID().replace("-","").substring(0,8);
            // document.getElementById('new_user_id').val(generateUUID().replace("-","").substring(0,8));
            $('#new_id').val(generateUUID().replace("-", "").substring(0, 8));
            // $('#new_image_name_user').val(data.file_name);
        }
        onClick();
    </script>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/eva-icons/eva.min.js"></script>

    <script src="<?= base_url() ?>assets/js/pages/pass-addon.init.js"></script>

</body>

</html>