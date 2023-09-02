<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-12">
            <p id="shid" hidden><?= $shop; ?></p>
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Overview</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="sortby">Sort By:</label>
                                <select class="form-select" id="sortby">
                                    <option value="today">Today</option>
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
                <div class="card-body pt-2">
                    <div class="row mb-3">
                        <div class="text-center">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <?php if ($item['Process'] != 0) { ?>
                                        <a class="btn btn-soft-warning waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Process')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Process']; ?></div>
                                            <strong>Process</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Process</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Packaging'] != 0) { ?>
                                        <a class="btn btn-soft-info waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Packaging')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Packaging']; ?></div>
                                            <strong>Packaging</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Packaging</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Ready'] != 0) { ?>
                                        <a class="btn btn-soft-success waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Ready')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Ready']; ?></div>
                                            <strong>Ready</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Ready</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Delivery'] != 0) { ?>
                                        <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Delivery')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Delivery']; ?></div>
                                            <strong>Delivery</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Delivery</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Received'] != 0) { ?>
                                        <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Received')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Received']; ?></div>
                                            <strong>Received</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Received</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Completed'] != 0) { ?>
                                        <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Completed')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Completed']; ?></div>
                                            <strong>Completed</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Completed</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Cancel'] != 0) { ?>
                                        <a class="btn btn-soft-danger waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Cancel')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Cancel']; ?></div>
                                            <strong>Cancel</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Cancel</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item">
                                    <?php if ($item['Return'] != 0) { ?>
                                        <a class="btn btn-soft-danger waves-effect waves-light m-1 w-sm font-size-14 shadow-lg" onclick=" clickTab('Return')" role="button">
                                            <div class="font-size-20 fw-bolder"><?= $item['Return']; ?></div>
                                            <strong>Return</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-sm font-size-14 shadow-lg text-muted " role="button">
                                            <div class="font-size-20 text-muted fw-bolder">0</div>
                                            <strong>Return</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4 class="text-primary font-size-18" id="totpck">0<span class="text-muted d-inline-block font-size-14 align-middle ms-2">Total Package</span></h4>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="list-inline main-chart text-md-end mb-0">
                                                <li class="list-inline-item chart-border-left me-0 border-0">
                                                    <h4 class="text-primary font-size-18" id="totinpr">0<span class="text-muted d-inline-block font-size-14 align-middle ms-2">Process</span></h4>
                                                </li>
                                                <li class="list-inline-item chart-border-left me-0">
                                                    <h4 class="font-size-18" id="totcmpl">0<span class="text-muted d-inline-block font-size-14 align-middle ms-2">Completed</span></span>
                                                    </h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="overview" data-colors='["#e6ecf9", "#e6ecf9", "#e6ecf9","#e6ecf9", "#e6ecf9", "#e6ecf9","#e6ecf9","#e6ecf9","#e6ecf9","#1f58c7","#1f58c7", "#1f58c7"]' class="apex-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="mb-0" id="tsl">Rp. 0</h4>
                                                    <p class="text-muted text-truncate mb-0 mt-2">Total Sales</p>
                                                </div>
                                                <div class="avatar-md">
                                                    <div class="avatar-title rounded bg-soft-primary">
                                                        <i class="bx bx-check-shield h2 mb-0 text-primary"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="mb-0" id="tod">Rp. 0</h4>
                                                    <p class="text-muted text-truncate mb-0 mt-2">Total Orders</p>
                                                </div>
                                                <div class="avatar-md">
                                                    <div class="avatar-title rounded bg-soft-warning">
                                                        <!-- <i class="bx bx-check-shield h2 mb-0 text-primary"></i> -->
                                                        <i class="bx bx-cart-alt h2 mb-0 text-warning"></i>
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
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="mb-0" id="tpr">Rp. 0</h4>
                                                    <p class="text-muted text-truncate mb-0 mt-2">Total Profit</p>
                                                </div>
                                                <div class="avatar-md">
                                                    <div class="avatar-title rounded bg-soft-success">
                                                        <!-- <i class="bx bx-check-shield h2 mb-0 text-primary"></i> -->
                                                        <i class="fas fa-dollar-sign h2 mb-0 text-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="card bg-soft-danger bg-gradient">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="mb-0" id="tex">Rp. 0</h4>
                                                    <p class="text-truncate mb-0 mt-2">Total Expense</p>
                                                </div>
                                                <div class="avatar-md">
                                                    <div class="avatar-title rounded bg-danger">
                                                        <!-- <i class="bx bx-check-shield h2 mb-0 text-primary"></i> -->
                                                        <i class="bx bx-rocket h2 mb-0 text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card bg-soft-danger bg-gradient">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="mb-0" id="tcs">Rp. 0</h4>
                                                    <p class="text-truncate mb-0 mt-2">Total Consumable</p>
                                                </div>
                                                <div class="avatar-md">
                                                    <div class="avatar-title rounded bg-danger">
                                                        <!-- <i class="bx bx-check-shield h2 mb-0 text-primary"></i> -->
                                                        <i class="bx bx-package h2 mb-0 text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6">
                                    <div class="card bg-soft-danger bg-gradient">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h4 class="mb-0" id="tad">Rp. 0</h4>
                                                    <p class="text-truncate mb-0 mt-2">Total Ads</p>
                                                </div>
                                                <div class="avatar-md">
                                                    <div class="avatar-title rounded bg-danger">
                                                        <!-- <i class="bx bx-check-shield h2 mb-0 text-primary"></i> -->
                                                        <i class="mdi mdi-google-ads h2 mb-0 text-white"></i>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">

                        <div class="row justify-content-center mt-5">
                            <div class="col-sm-6">
                                <div class="maintenance-img">
                                    <img src="<?= base_url() ?>assets/images/coming-soon.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5"><?= ucfirst($titlepage) ?> page is coming soon</h4>
                        <p class="text-muted">Look forward to its presence, and in the meantime visit another page.</p>

                        <div class="row justify-content-center mt-5">
                            <div class="col-md-9">
                                <div id="countdown" class="countdownlist"></div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>