
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Email Verification | <?=ucfirst($titlepage)?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url()?>ad_assets/dist/assets/images/qearaf_32px.webp">

        <!-- Bootstrap Css -->
        <link href="<?=base_url()?>ad_assets/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=base_url()?>ad_assets/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=base_url()?>ad_assets/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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
                                <img src="<?=base_url()?>ad_assets/dist/assets/images/Logo Admin Dark 40px.webp" alt="Logo Admin Dark 40px" height="40" class="auth-logo-dark me-start">
                                <img src="<?=base_url()?>ad_assets/dist/assets/images/Logo Admin Dark 40px.webp" alt="Logo Admin Dark 40px" height="40" class="auth-logo-light me-start">
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="p-2 my-2 text-center">
                                    <div class="avatar-lg mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-1">
                                        <h4>Verify your email</h4>
                                        <p>We have sent you verification email <span class="fw-bold"><?=$email?></span> , Please check it</p>
                                        <!-- <div class="mt-4">
                                            <a href="index.html" class="btn btn-primary w-100">Verify email</a>
                                        </div> -->
                                    </div>

                                    <div class="mt-4 text-center">
                                        <?php if( $titlepage == "Recovery Password" ){ ?>
                                            <p class="mb-0">Didn't receive an email ? <a href="<?=base_url()?>forgot" class="text-primary fw-semibold"> Recovery Account </a> </p>
                                        <?php }else{ ?>
                                            <p class="mb-0">Didn't receive an email ? <a href="<?=base_url()?>registration" class="text-primary fw-semibold"> Re-registration </a> </p>
                                        <?php } ?>
                                    </div>

                                    <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="font-size-14 mb-3 mt-2 title"> Return to login after successful verification </h5>
                                            </div>
            
                                            <div class="mt-4">
                                                <a href="<?=base_url()?>signin" class="btn btn-primary w-100">Return to Log In</a>
                                            </div>
                                        </div>
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
        <script src="<?=base_url()?>ad_assets/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>ad_assets/dist/assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="<?=base_url()?>ad_assets/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?=base_url()?>ad_assets/dist/assets/libs/eva-icons/eva.min.js"></script>

    </body>

</html>