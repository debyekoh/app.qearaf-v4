<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="row">

        <div class="col-lg-12">
            <p id="shid" hidden><?= $shop; ?></p>
            <div class="card">
                <div class="card-body p-0" style="background-image: url(<?= base_url(); ?>assets/images/login-img.png);background-position: center;background-repeat: no-repeat;background-size: cover;">
                    <!-- <div class="card-body p-0"> -->
                    <div class="text-center">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" <?php if ($item['Process'] != 0) { ?> onclick=" clickTab('Process')" <?php } ?> role="button">
                                    <?php if ($item['Process'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Process']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Process</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" <?php if ($item['Packaging'] != 0) { ?> onclick=" clickTab('Packaging')" <?php } ?> role="button">
                                    <?php if ($item['Packaging'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Packaging']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Packaging</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" <?php if ($item['Ready'] != 0) { ?> onclick=" clickTab('Ready')" <?php } ?> role="button">
                                    <?php if ($item['Ready'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Ready']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Ready</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" <?php if ($item['Delivery'] != 0) { ?> onclick=" clickTab('Delivery')" <?php } ?> role="button">
                                    <?php if ($item['Delivery'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Delivery']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Delivery</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" <?php if ($item['Received'] != 0) { ?> onclick=" clickTab('Received')" <?php } ?> role="button">
                                    <?php if ($item['Received'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Received']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Received</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" <?php if ($item['Completed'] != 0) { ?> onclick=" clickTab('Completed')" <?php } ?> role="button">
                                    <?php if ($item['Completed'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Completed']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Completed</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-danger waves-effect waves-light m-1 w-sm" <?php if ($item['Cancel'] != 0) { ?> onclick=" clickTab('Cancel')" <?php } ?> role="button">
                                    <?php if ($item['Cancel'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Cancel']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Cancel</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-danger waves-effect waves-light m-1 w-sm" <?php if ($item['Return'] != 0) { ?> onclick=" clickTab('Return')" <?php } ?> role="button">
                                    <?php if ($item['Return'] != 0) { ?>
                                        <div class="font-size-26 fw-bolder"><?= $item['Return']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-26 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Return</strong>
                                </a>
                            </li>
                        </ul>
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="col-sm-2">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>sales">
                                            <div class="card-body">
                                                <div>

                                                    <div>
                                                        <h4 class="mt-2 mb-0 fw-bolder text-primary font-size-22">0</h4>
                                                    </div>
                                                    <h6 class="mb-0 font-size-15">Process</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>sales">
                                            <div class="card-body">
                                                <div>

                                                    <div>
                                                        <h4 class="mt-2 mb-0 fw-bolder text-primary font-size-22">0</h4>
                                                    </div>
                                                    <h6 class="mb-0 font-size-15">Process</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Sales Report</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="sortby">Sort By:</label>
                                <select class="form-select" id="sortby">
                                    <option value="tweek">This Weeks</option>
                                    <option selected value="tmonth">This Monthly</option>
                                    <option value="tyears">This Years</option>
                                    <option value="lweek">Last Weeks</option>
                                    <option value="lmonth">Last Monthly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div id="overview" data-colors='["#e6ecf9", "#e6ecf9", "#e6ecf9","#e6ecf9", "#e6ecf9", "#e6ecf9","#e6ecf9","#e6ecf9","#e6ecf9","#1f58c7","#1f58c7", "#1f58c7"]' class="apex-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded bg-soft-primary">
                                                            <i class="bx bx-check-shield font-size-24 mb-0 text-primary"></i>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0 font-size-15">Total Sales</h6>
                                                    </div>

                                                    <!-- <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" id="drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal text-muted font-size-22"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item">Yearly</a>
                                                                <a class="dropdown-item">Monthly</a>
                                                                <a class="dropdown-item">Weekly</a>
                                                                <a class="dropdown-item">Today</a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22" id="tsl"></h4>
                                                    <div class="d-flex mt-1 align-items-end overflow-hidden">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-0 text-truncate">Total Sales World Wide</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div id="mini-1" data-colors='["#1f58c7"]' class="apex-charts"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded bg-soft-primary">
                                                            <i class="bx bx-cart-alt font-size-24 mb-0 text-primary"></i>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0 font-size-15">Total Orders</h6>
                                                    </div>

                                                    <!-- <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal text-muted font-size-22"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Yearly</a>
                                                                <a class="dropdown-item" href="#">Monthly</a>
                                                                <a class="dropdown-item" href="#">Weekly</a>
                                                                <a class="dropdown-item" href="#">Today</a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22">63,234.20 <span class="text-danger fw-medium font-size-13 align-middle"> <i class="mdi mdi-arrow-down"></i> 3.68% </span> </h4>
                                                    <div class="d-flex mt-1 align-items-end overflow-hidden">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-0 text-truncate">Total Orders World Wide</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div id="mini-2" data-colors='["#1f58c7"]' class="apex-charts"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded bg-soft-primary">
                                                            <i class="bx bx-package font-size-24 mb-0 text-primary"></i>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0 font-size-15">Today Visitor</h6>
                                                    </div>

                                                    <!-- <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal text-muted font-size-22"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Yearly</a>
                                                                <a class="dropdown-item" href="#">Monthly</a>
                                                                <a class="dropdown-item" href="#">Weekly</a>
                                                                <a class="dropdown-item" href="#">Today</a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22">425,34.45 <span class="text-danger fw-medium font-size-13 align-middle"> <i class="mdi mdi-arrow-down"></i> 2.64% </span> </h4>
                                                    <div class="d-flex mt-1 align-items-end overflow-hidden">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-0 text-truncate">Total Visitor World Wide</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div id="mini-3" data-colors='["#1f58c7"]' class="apex-charts"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded bg-soft-primary">
                                                            <i class="bx bx-rocket font-size-24 mb-0 text-primary"></i>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0 font-size-15">Total Expense</h6>
                                                    </div>

                                                    <!-- <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bx bx-dots-horizontal text-muted font-size-22"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Yearly</a>
                                                                <a class="dropdown-item" href="#">Monthly</a>
                                                                <a class="dropdown-item" href="#">Weekly</a>
                                                                <a class="dropdown-item" href="#">Today</a>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                </div>

                                                <div>
                                                    <h4 class="mt-4 pt-1 mb-0 font-size-22">6,482.46 <span class="text-success fw-medium font-size-13 align-middle"> <i class="mdi mdi-arrow-down"></i> 5.79% </span> </h4>
                                                    <div class="d-flex mt-1 align-items-end overflow-hidden">
                                                        <div class="flex-grow-1">
                                                            <p class="text-muted mb-0 text-truncate">Total Expense World Wide</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <div id="mini-4" data-colors='["#1f58c7"]' class="apex-charts"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>