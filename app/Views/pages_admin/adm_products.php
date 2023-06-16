<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid">

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
                <div class="card-header">
                    <h4 class="card-title mb-0">My<?= ucfirst($titlepage) ?></h4>
                </div>
                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
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
    </div>

</div>

<?= $this->endSection(); ?>