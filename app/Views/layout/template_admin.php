<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Qearaf Admin | <?= ucfirst($titlepage) ?></title>
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

    <?php
    if (isset($head_page)) { ?>
        <!-- Additional_header -->
    <?php
        echo ($head_page);
    }
    ?>


</head>


<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar" class="isvertical-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                        <i class="bx bx-menu align-middle"></i>
                    </button>

                    <!-- start page title -->
                    <div class="page-title-box align-self-center d-none d-md-block">
                        <h4 class="page-title mb-0"><?= ucfirst($titlepage) ?></h4>
                    </div>
                    <!-- end page title -->

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-search icon-sm align-middle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                            <form class="p-2">
                                <div class="search-box">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                        <i class="bx bx-search search-icon"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/images/users/<?= user()->user_image; ?>" width="42" height="42" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15"><?= user()->email; ?></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="p-3 border-bottom">
                                <?php if (user()->fullname != null) : ?>
                                    <h6 class="mb-0"><?= user()->fullname; ?></h6>
                                <?php else : ?>
                                    <h6 class="mb-0"><?= user()->username; ?></h6>
                                <?php endif; ?>
                                <p class="mb-0 font-size-11 text-muted"><?= user()->email; ?></p>
                            </div>
                            <!-- <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span class="align-middle me-3">Settings</span><span class="badge badge-soft-success ms-auto">New</span></a> -->
                            <a class="dropdown-item" href="<?= base_url() ?>setting_account"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span class="align-middle">Account Setting</span></a>
                            <a class="dropdown-item" href="<?= url_to('') ?>"><i class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i> <span class="align-middle">Change Passwords</span></a>
                            <!-- <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted font-size-16 align-middle me-2"></i> <span class="align-middle">Messages</span></a> -->
                            <!-- <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted font-size-16 align-middle me-2"></i> <span class="align-middle">Help</span></a> -->
                            <!-- <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock text-muted font-size-16 align-middle me-2"></i> <span class="align-middle">Lock screen</span></a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= url_to('logout') ?>"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span class="align-middle">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu" style="background: url(<?= base_url() ?>assets/images/bg-4.jpg)  no-repeat top; background-size: cover;">

            <!-- LOGO -->
            <div class="navbar-brand-box" style="background-color: #503b3b00;">
                <a href="<?= base_url() ?>dashboards" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/qearaf_32px.webp" alt="qearaf_32px" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/Logo Admin Dark.webp" alt="Logo Admin Dark" height="26">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="bx bx-menu align-middle"></i>
            </button>

            <div data-simplebar class="sidebar-menu-scroll">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Dashboards</li>

                        <li>
                            <a href="<?= base_url() ?>dashboards">
                                <i class="bx bxs-dashboard icon nav-icon"></i>
                                <span class="menu-item" data-key="t-dashboard">Dashboards</span>
                            </a>
                        </li>

                        <li class="menu-title" data-key="t-shopmenu">Shop</li>
                        <?php if ($tabshop == null) { ?>
                            <li>
                                <a href="<?= base_url() ?>myshop">
                                    <i class="bx bxs-store icon nav-icon"></i>
                                    <span class="menu-item" data-key="t-myshop">MyShop</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i class="bx bxs-cuboid icon nav-icon"></i>
                                    <span class="menu-item" data-key="t-myshop">MyShop</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php foreach ($tabshop as $shop) : ?>
                                        <li><a href="<?= base_url() ?>myshops/<?= $shop['id_shop'] ?>" data-key="t-myshop-<?= $shop['marketplace'] ?>-<?= $shop['name_shop'] ?>"><?= $shop['marketplace'] ?> <?= $shop['name_shop'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="bx bxs-cuboid icon nav-icon"></i>
                                <span class="menu-item" data-key="t-products">Products</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url() ?>myproducts" data-key="t-myproducts">MyProducts</a></li>
                                <?php if (has_permission('Create')) : ?>
                                    <li><a href="<?= base_url() ?>createproduct" data-key="t-createproduct">Create Product</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>


                        <li class="menu-title" data-key="t-applications">Applications</li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="bx bxs-analyse icon nav-icon"></i>
                                <span class="menu-item" data-key="t-ecommerce">Ecommerce</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url() ?>sales" data-key="t-sales">Sales</a></li>
                                <li><a href="<?= base_url() ?>addnewsales" data-key="t-addnewsales">Add New Sales</a></li>
                                <li><a href="<?= base_url() ?>purchase" data-key="t-purchase">Purchase</a></li>
                                <li><a href="<?= base_url() ?>addnewpurchase" data-key="t-addnewsales">Add New Purchase</a></li>
                                <li><a href="<?= base_url() ?>invoice" data-key="t-invoice">Invoice</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="<?= base_url() ?>delivery">
                                <i class="bx bxs-truck icon nav-icon"></i>
                                <span class="menu-item" data-key="t-delivery">Delivery</span>
                            </a>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="bx bxs-factory icon nav-icon"></i>
                                <span class="menu-item" data-key="t-ecommerce">Warehouse</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url() ?>stock" data-key="t-sales">Stock</a></li>
                                <li><a href="<?= base_url() ?>historyinout" data-key="t-inputsales">History InOut</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i class="bx bxs-wallet-alt icon nav-icon"></i>
                                <span class="menu-item" data-key="t-contacts">Finances</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url() ?>summaryfinance" data-key="t-finance-summary">Summary Finance</a></li>
                                <li><a href="<?= base_url() ?>balance" data-key="t-finance-balance">Balance</a></li>
                                <li><a href="<?= base_url() ?>ewallet" data-key="t-finance-ewallet">E Wallet</a></li>
                                <li><a href="<?= base_url() ?>incomeprofit" data-key="t-finance-incomeprofit">Income & Profit</a></li>
                                <li><a href="<?= base_url() ?>debt" data-key="t-finance-debt">Debt</a></li>
                                <li><a href="<?= base_url() ?>inventoryvalue" data-key="t-finance-inventoryvalue">Inventory Value</a></li>
                            </ul>
                        </li>

                        <?php if (in_groups('SuAdmin')) : ?>

                            <li class="menu-title" data-key="t-admin">Administrator Page</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i class="bx bxs-group icon nav-icon"></i>
                                    <span class="menu-item" data-key="t-contacts">Users</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?= base_url() ?>userslist" data-key="t-user-list">Users List</a></li>
                                </ul>
                            </li>

                        <?php endif; ?>



                    </ul>
                </div>
                <div id="sidebar-setting">
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <header class="ishorizontal-topbar">
            <div class="navbar-header">



            </div>

            <div class="topnav">

            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                <!-- container-fluid -->
                <div class="container-fluid">
                    <?= $this->include('messages'); ?>
                    <?= $this->include('messages_alert'); ?>
                </div>
                <?= $this->renderSection('contents'); ?>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2023 © Qearaf.COM <i>-</i> Version 1.5.0</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Version 1.5.0
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <!-- <a href="#" class="right-bar-toggle layout-setting-btn" id="right-bar-toggle" hidden>
        <i class="bx bx-cog icon-sm font-size-18" hidden></i> <span hidden>Settings</span>
    </a> -->

    <!-- JAVASCRIPT -->
    <?php
    $someVar = 1;
    ?>

    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/eva-icons/eva.min.js"></script>


    <script src="<?= base_url() ?>assets/js/app_qearaf.js"></script>

    <?php
    if (isset($js_page)) { ?>
        <!-- Additional_footerJAVASCRIPT -->
    <?php
        echo ($js_page);
    }
    ?>


</body>

</html>

<script>
    document.body.onload = function() {
        startFrame()
    };

    function startFrame() {
        let win = this;
        if (win.innerWidth > 992) {
            // console.log(win.innerWidth);
            // console.log("sidebar-enable");
            // document.body.removeAttribute("data-sidebar-size", "sm");
        } else if (win.innerWidth <= 992 && win.innerWidth > 412) {
            // console.log(win.innerWidth);
            // console.log("medium");
            document.body.setAttribute("data-sidebar-size", "sm");
            // document.body.setAttribute("data-sidebar-size", "sm")
        } else if (win.innerWidth <= 412) {
            // console.log("small");
            // console.log(win.innerWidth);
            // element.classList.remove("sidebar-enable");
            document.body.setAttribute("data-sidebar-size", "sm");
            document.getElementsByClassName('footer')[0].style.left = "0px";
            // document.footer.style.left="0px";
        }
    }


    window.addEventListener('resize', function() {
        let win = this;
        if (win.innerWidth > 992) {
            // console.log(win.innerWidth);
            // console.log("sidebar-enable");
            // document.body.removeAttribute("data-sidebar-size", "sm");
            document.getElementsByClassName('footer')[0].style.removeProperty("left")
        } else if (win.innerWidth <= 992 && win.innerWidth > 412) {
            // console.log(win.innerWidth);
            // console.log("medium");
            // document.body.setAttribute("data-sidebar-size", "sm")
        } else if (win.innerWidth <= 412) {
            // console.log("small");
            // console.log(win.innerWidth);
            document.body.setAttribute("data-sidebar-size", "sm")
            document.getElementsByClassName('footer')[0].style.left = "0px";
            // document.getElementById("p2").style.left = "0px";
        }
    });
</script>