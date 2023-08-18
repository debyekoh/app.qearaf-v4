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
                                    <a href="debt/listdebt/<?= user_id(); ?>">
                                        <button type="button" class="btn btn-soft-light waves-effect waves-light"><i class="fas fa-expand-arrows-alt font-size-16 align-middle"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="mt-2 mb-0 fw-bolder font-size-22">Rp <?= number_format($datadebtaccount['value_debt'], 0, ",", "."); ?>,-
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
                <!-- <div class="card-header">
                    <h4 class="card-title mb-0">History Transaction</h4>
                </div> -->
                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>