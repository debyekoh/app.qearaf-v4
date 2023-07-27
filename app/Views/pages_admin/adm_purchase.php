<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="card">
        <div class="card-body p-1">
            <ul class="nav nav-tabs nav-tabs-custom mt-1 mx-3" id="purchaseTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 active" id="all-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="all" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="mdi mdi-order-bool-ascending mdi-24px"></i></span></span>
                        <span class="d-none d-sm-block">All</span>
                    </button>
                </li>
                <?php
                foreach ($tabpurchase as $tbp) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2" id="<?= $tbp['id']; ?>-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="<?= $tbp['category_name']; ?>" aria-selected="true">
                            <span class="d-block d-sm-none"><i class="mdi mdi-order-bool-ascending mdi-24px"></i></span></span>
                            <span class="d-none d-sm-block"><?= $tbp['category_name']; ?></span>
                        </button>
                    </li>
                <?php } ?>
            </ul>


            <!-- Tab panes -->
            <div class="justify-content-end p-3" style="position: absolute;right: 0.5rem;top: 2.7rem;">
                <h5 id="tcard" class="card-title mb-0 pe-1"></h5>
            </div>
            <div class="tab-content p-3 text-muted py-0" id="purchaseTabContent">
                <div id="tabcontent">
                    <div id="purchasetabcontent"></div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>