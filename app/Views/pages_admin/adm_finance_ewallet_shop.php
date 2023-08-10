<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <input type="text" class="form-control" id="page" value="<?= $subtitlepageid ?>" hidden>
                    <h4 class="card-title mb-0"><?= ucfirst($titlepage) ?> <?= ucfirst($subtitlepage) ?></h4>
                </div>
                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>