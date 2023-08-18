<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-title rounded bg-soft-success">
                                    <i class="fas fa-dollar-sign fw-bolder font-size-24 mb-0 text-success"></i>
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 font-size-15">Balance Account</h6>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <a href="#">
                                        <button type="button" class="btn btn-soft-light waves-effect waves-light"><i class="fas fa-expand-arrows-alt font-size-16 align-middle"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="mt-2 mb-0 fw-bolder font-size-22" id="<?= base64_encode(base64_encode('TEST')); ?>">Rp <?= number_format($balance, 0, ",", "."); ?>,-</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                <h6 class="mb-0 font-size-15">E-Wallet Shop</h6>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <a href="#">
                                        <button type="button" class="btn btn-soft-light waves-effect waves-light"><i class="fas fa-expand-arrows-alt font-size-16 align-middle"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="mt-2 mb-0 fw-bolder font-size-22" id="<?= base64_encode(base64_encode('TEST')); ?>">Rp <?= number_format($ewallet, 0, ",", "."); ?>,-</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-title rounded bg-soft-info">
                                    <i class="fas fa-warehouse fw-bolder font-size-24 mb-0 text-dark"></i>
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 font-size-15">Inventori</h6>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <a href="#">
                                        <button type="button" class="btn btn-soft-light waves-effect waves-light"><i class="fas fa-expand-arrows-alt font-size-16 align-middle"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="mt-2 mb-0 fw-bolder font-size-22 " id="<?= base64_encode(base64_encode('TEST')); ?>">Rp <?= number_format($inventory, 0, ",", "."); ?>,-</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
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
                                <h6 class="mb-0 font-size-15">Debt</h6>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <a href="#">
                                        <button type="button" class="btn btn-soft-light waves-effect waves-light"><i class="fas fa-expand-arrows-alt font-size-16 align-middle"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="mt-2 mb-0 fw-bolder font-size-22 text-danger" id="<?= base64_encode(base64_encode('TEST')); ?>">Rp <?= number_format($debt, 0, ",", "."); ?>,-</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>