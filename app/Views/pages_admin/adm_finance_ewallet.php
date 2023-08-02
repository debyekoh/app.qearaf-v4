<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <?php foreach ($databalanceewallet as $ds) { ?>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-soft-info">
                                        <i class="bx bx-wallet-alt font-size-24 fw-bolder mb-0 text-primary"></i>
                                    </div>
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0 font-size-15"><?= $ds->name_shop; ?> <?= $ds->marketplace; ?></h6>
                                </div>

                                <div class="flex-shrink-0">
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
                                </div>
                            </div>

                            <div>
                                <h4 class="mt-2 mb-0 fw-bolder font-size-22">Rp <?= number_format($ds->value_ewallet, 0, ",", "."); ?>,-
                                    <!-- <span class="text-success fw-medium font-size-13 align-middle"> <i class="mdi mdi-arrow-up"></i> 8.34% </span> -->
                                </h4>
                                <div class="d-flex mt-1 align-items-end overflow-hidden">
                                    <div class="flex-grow-1">
                                        <p class="text-muted mb-0 text-truncate">Total Saldo</p>
                                    </div>
                                    <!-- <div class="flex-shrink-0">
                                        <div id="mini-1" data-colors='["#1f58c7"]' class="apex-charts"></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- <div class="col-xl-6">
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

                            <div class="flex-shrink-0">
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
                            </div>
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
        </div> -->
    </div>


</div>

<?= $this->endSection(); ?>