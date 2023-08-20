<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-dark border-dark text-light bg-gradient">
                <div class="card-body">
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-light rounded">
                                <div class="avatar-title rounded bg-soft-info">
                                    <i class="fas fa-warehouse fw-bolder font-size-24 mb-0 text-dark"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0 text-white font-size-15">Inventory QEARAF.COM</h6>
                            </div>
                        </div>

                        <div>
                            <h4 class="mt-2 mb-0 text-white fw-bolder font-size-22">Rp <?= number_format($invvalue, 0, ",", "."); ?>,-
                            </h4>
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
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>