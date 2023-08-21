<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0" style="background-image: url(<?= base_url(); ?>assets/images/login-img.png);background-position: center;background-repeat: no-repeat;background-size: cover;">
                    <!-- <div class="card-body p-0"> -->
                    <div class="text-center">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" onclick=" clickTab('Process')" role="button">
                                    <?php if ($item['Process'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder">0</div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Process</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Process'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Process']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Packaging</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Ready'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Ready']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Ready</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Delivery'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Delivery']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Delivery</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Received'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Received']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Received</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-dark waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Completed'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Completed']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Completed</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-danger waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Cancel'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Cancel']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Cancel</strong>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-soft-danger waves-effect waves-light m-1 w-sm" href="<?= base_url(); ?>sales" role="button">
                                    <?php if ($item['Return'] != 0) { ?>
                                        <div class="font-size-20 fw-bolder"><?= $item['Return']; ?></div>
                                    <?php } else { ?>
                                        <div class="font-size-20 text-muted fw-bolder">0</div>
                                    <?php } ?>
                                    <strong>Return</strong>
                                </a>
                            </li>
                        </ul>
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="col-sm-2">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>sales">
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
                                        <a href="<?= base_url(); ?>sales">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>