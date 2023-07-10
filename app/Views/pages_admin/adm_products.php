<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">My<?= ucfirst($titlepage) ?></h4>
                </div>
                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">My<?= ucfirst($titlepage) ?></h4>
                </div>
                <div class="card-body">
                    <div id="table-gridjss"></div>
                </div>
            </div>
        </div>
    </div> -->

</div>

<?= $this->endSection(); ?>