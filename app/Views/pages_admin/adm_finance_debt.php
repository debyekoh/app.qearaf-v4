<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-title rounded bg-soft-danger">
                                    <i class="fas fa-dollar-sign fw-bolder font-size-24 mb-0 text-danger"></i>
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 font-size-15">Debt QEARAF.COM</h6>
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
                            <h4 class="mt-2 mb-0 fw-bolder font-size-22">Rp <?= number_format($databalanceaccount['value_debt'], 0, ",", "."); ?>,-
                                <!-- <span class="text-success fw-medium font-size-13 align-middle"><i class="mdi mdi-arrow-up"></i> 8.34% </span> -->
                            </h4>
                            <!-- <div class="d-flex mt-1 align-items-end overflow-hidden">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-0 text-truncate">Total Sales World Wide</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <div id="mini-1" data-colors='["#1f58c7"]' class="apex-charts"></div>
                                </div>
                            </div> -->
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