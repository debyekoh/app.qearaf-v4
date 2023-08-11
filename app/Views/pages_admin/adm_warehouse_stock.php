<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Product for Sale</h4>
                </div>
                <div class="card-body" id="body-gridjs-1">
                    <div id="table-gridjs-1"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Consumable</h4>
                </div>
                <div class="card-body" id="body-gridjs-2">
                    <div id="table-gridjs-2"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>