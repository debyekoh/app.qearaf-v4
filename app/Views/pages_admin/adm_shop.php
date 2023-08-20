<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="container">
        <div class="row">
            <div class="col">
                Column
            </div>
            <div class="col">
                Column
            </div>
            <div class="col">
                Column
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-secondary bg-gradient">
                <div class="card-body" style="background-image: url(<?= base_url(); ?>assets/images/bg-4.jpg);background-position: center;background-repeat: no-repeat;background-size: cover;">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-sm-2">
                                    <div class="card">
                                        <a href="#">
                                            <div class="card-body">
                                                <div>

                                                    <div>
                                                        <h4 class="mt-2 mb-0 fw-bolder text-primary font-size-22">0</h4>
                                                    </div>
                                                    <h6 class="mb-0 font-size-15">Process</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="card">
                                        <a href="#">
                                            <div class="card-body">
                                                <div>

                                                    <div>
                                                        <h4 class="mt-2 mb-0 fw-bolder text-primary font-size-22">0</h4>
                                                    </div>
                                                    <h6 class="mb-0 font-size-15">Process</h6>
                                                </div>
                                            </div>
                                        </a>
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

<?= $this->endSection(); ?>