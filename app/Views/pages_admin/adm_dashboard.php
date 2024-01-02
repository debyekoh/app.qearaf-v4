<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-sm-12">
            <p id="shid" hidden><?= $shop; ?></p>
            <div class="card mb-2">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Overview <?= $titlepage; ?></h5>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="sortby">Sort By:</label>
                                <select class="form-select" id="sortby">
                                    <option selected value="today">Today</option>
                                    <option value="tweek">This Weeks</option>
                                    <option value="tmonth">This Monthly</option>
                                    <option value="tyears">This Years</option>
                                    <option value="lweek">Last Weeks</option>
                                    <option value="lmonth">Last Monthly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row mb-2">
                        <div class="text-center">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Process'] != 0) { ?>
                                        <a class="btn btn-soft-warning waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Process')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Process']; ?></div>
                                            <strong>Process</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Process</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Packaging'] != 0) { ?>
                                        <a class="btn btn-soft-info waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Packaging')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Packaging']; ?></div>
                                            <strong>Packaging</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Packaging</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Ready'] != 0) { ?>
                                        <a class="btn btn-soft-success waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Ready')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Ready']; ?></div>
                                            <strong>Ready</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Ready</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Delivery'] != 0) { ?>
                                        <a class="btn btn-soft-dark waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Delivery')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Delivery']; ?></div>
                                            <strong>Delivery</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Delivery</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Received'] != 0) { ?>
                                        <a class="btn btn-soft-dark waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Received')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Received']; ?></div>
                                            <strong>Received</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Received</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Completed'] != 0) { ?>
                                        <a class="btn btn-soft-dark waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Completed')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Completed']; ?></div>
                                            <strong>Completed</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Completed</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Cancel'] != 0) { ?>
                                        <a class="btn btn-soft-danger waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Cancel')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Cancel']; ?></div>
                                            <strong>Cancel</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Cancel</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                                <li class="list-inline-item m-0">
                                    <?php if ($item['Return'] != 0) { ?>
                                        <a class="btn btn-soft-danger waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg" onclick=" clickTab('Return')" role="button">
                                            <div class="font-size-14 fw-bolder"><?= $item['Return']; ?></div>
                                            <strong>Return</strong>
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-soft-light waves-effect waves-light m-1 w-xs px-0 pt-1 font-size-12 shadow-lg text-muted " role="button">
                                            <div class="font-size-14 text-muted fw-bolder">0</div>
                                            <strong>Return</strong>
                                        </a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card mb-2 h-100">
                <div class="card-body pt-2">

                    <div class="card-body p-2 pb-0">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="text-primary font-size-12 ms-3 mb-0" id="totpck">0<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Total Package</span></h4>
                                <h4 class="text-primary font-size-12 ms-3 mb-0" id="totinpr">0<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Process</span></h4>
                                <h4 class="font-size-12 ms-3 mb-0" id="totcmpl">0<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Completed</span></span></h4>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <label class="input-group-text" style="font-size: 8px;" for="sortby"><i class="mdi mdi-calendar-month mb-0"></i></label>
                                    <input class="form-select" style="font-size: 8px;" type="text" name="daterange" value="" />
                                </div>

                            </div>
                        </div>
                        <div id="overview" data-colors='["#e6ecf9", "#e6ecf9", "#e6ecf9","#e6ecf9", "#e6ecf9", "#e6ecf9","#e6ecf9","#e6ecf9","#e6ecf9","#1f58c7","#1f58c7", "#1f58c7"]' class="apex-chart"></div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-1">
                                <div class="card-body py-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 fw-bolder" id="tsl">Rp. 0</p>
                                            <p class="text-muted text-truncate font-size-12 m-0">Total Sales</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-soft-primary">
                                                <i class="bx bx-check-shield h2 mb-0 text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-1">
                                <div class="card-body py-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 fw-bolder" id="tod">Rp. 0</p>
                                            <p class="text-muted text-truncate font-size-12 m-0">Total Orders</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-soft-warning">
                                                <i class="bx bx-cart-alt h2 mb-0 text-warning"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-1">
                                <div class="card-body py-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 fw-bolder" id="tpr">Rp. 0</p>
                                            <p class="text-muted text-truncate font-size-12 m-0">Total Profit</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-soft-success">
                                                <i class="fas fa-dollar-sign h2 mb-0 text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-1 bg-soft-danger bg-gradient">
                                <div class="card-body py-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 fw-bolder" id="tex">Rp. 0</p>
                                            <p class="text-truncate font-size-12 m-0">Total Expense</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-danger">
                                                <i class="bx bx-rocket h2 mb-0 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-1 bg-soft-danger bg-gradient">
                                <div class="card-body py-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 fw-bolder" id="tcs">Rp. 0</p>
                                            <p class="text-truncate font-size-12 m-0">Total Consumable</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-danger">
                                                <i class="bx bx-package h2 mb-0 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-6">
                            <div class="card mb-1 bg-soft-danger bg-gradient">
                                <div class="card-body py-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0 fw-bolder" id="tad">Rp. 0</p>
                                            <p class="text-truncate font-size-12 m-0">Total Ads</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title rounded bg-danger">
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
        <div class="col-sm-6">
            <div class="card mb-2 h-100">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-0">
                        <h5 class="card-title">Top Selling Product</h5>
                    </div>
                    <div class="mx-n4 px-4">
                        <div class="simplebar-wrapper" style="margin: 0px -24px;">
                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll; padding-right: 20px; padding-bottom: 0px;">
                                <?php $i = 1; ?>
                                <?php foreach ($topseller as $top) : ?>
                                    <?php $no = $i++; ?>
                                    <?php if ($no == 1) {
                                        $cs = "danger";
                                    } else if ($no == 2) {
                                        $cs = "warning";
                                    } else if ($no == 3) {
                                        $cs = "primary";
                                    } else {
                                        $cs = "secondary";
                                    };; ?>
                                    <div class="simplebar-content p-1 px-3">
                                        <div style="position: absolute;">
                                            <span class="badge bg-<?= $cs; ?> font-size-14 fw-bolder">TOP <?= $no; ?></span>
                                        </div>
                                        <div class="popular-product-box py-1 rounded bg-soft-<?= $cs; ?>" id="best-<?= $cs; ?>">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-md shadow-lg rounded">
                                                        <img src="<?= base_url(); ?>assets/images/product/<?= $top->pro_image_name; ?>" class="img-fluid rounded" alt="<?= $top->pro_image_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                                    <h5 class="mb-1 text-truncate"><a href="#" class="font-size-12 text-wrap text-dark"><?= $top->pro_name; ?> <?= $top->pro_model; ?></a></h5>
                                                </div>
                                                <div class="flex-shrink-0 text-end ms-3">
                                                    <h5 class="mb-1"><a href="" class="font-size-14 fw-bold text-dark">Rp <?= number_format($top->pro_price_seller * $top->total_qty, 0, ',', '.'); ?></a></h5>
                                                    <p class="text-dark fw-semibold mb-0"><u><?= $top->total_qty; ?> Sold</u></p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>



<?= $this->endSection(); ?>