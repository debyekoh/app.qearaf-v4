<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="card">
        <div class="card-body p-1">
            <ul class="nav nav-tabs nav-tabs-custom mt-1 mx-3" id="purchaseTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 active" id="all-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="all" aria-selected="true">
                        <span class="d-block d-sm-none">All</span></span>
                        <span class="d-none d-sm-block">All</span>
                    </button>
                </li>
                <?php
                foreach ($tabpurchase as $tbp) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-2" id="<?= $tbp['id']; ?>-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="<?= $tbp['category_name']; ?>" aria-selected="true">
                            <span class="d-block d-sm-none"><?= $tbp['category_name']; ?></span></span>
                            <span class="d-none d-sm-block"><?= $tbp['category_name']; ?></span>
                        </button>
                    </li>
                <?php } ?>
            </ul>


            <!-- Tab panes -->
            <!-- <div class="justify-content-end p-3" style="position: absolute;right: 0.5rem;top: 2.7rem;">
                <h5 id="tcard" class="card-title mb-0 pe-1"></h5>
            </div> -->
            <div class="tab-content p-3 text-muted py-0">
                <div id="tabcontent">
                    <div class="position-relative">
                        <div class="modal-button mt-2">
                            <div class="row align-items-start">
                                <div class="col-sm-auto">
                                    <div class="d-flex gap-1">
                                        <div class="input-group">
                                            <input type="text" class="form-control font-size-13 bg-soft-warning" style="width: 195px;" id="datepicker-range" placeholder="Date...">
                                            <span class="input-group-text"><i class="bx bx-calendar-event"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="purchasetabcontent"></div>
                </div>
            </div>

        </div>
        <div class="modal fade purchasedetailsModal" id="viewPurchase" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="purchasedetailsModalLabel" aria-modal="true" role="dialog">
            <!-- <div id="viewPurchase" class="modal fade purchasedetailsModal" tabindex="-1" role="dialog" aria-labelledby="purchasedetailsModalLabel" aria-hidden="true"> -->
            <div class="modal-dialog modal-fullscreen-sm-down" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purchasedetailsModalLabel">Purchase Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-1">
                        <table class="table align-middle table-sm table-nowrap table-borderless border-bottom table-centered p-1 mb-0">
                            <tbody>
                                <tr class="py-0">
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                    <td class="py-0 fw-bold" style="width:10%;">
                                        Buyer</td>
                                    <td class="py-0 fw-bold" style="width:1%;">:</td>
                                    <td class="py-0 text-muted">
                                        <h6 class="mb-0"><span id="byr" class="text-truncate"></span></h6>
                                    </td>
                                </tr>
                                <tr class="py-0">
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                    <td class="py-0 fw-bold">
                                        Purchase From</td>
                                    <td class="py-0 fw-bold">:</td>
                                    <td class="py-0 text-muted">
                                        <h6 class="mb-0"><span id="pfr" class="text-primary"></span></h6>
                                    </td>
                                </tr>
                                <tr class="py-0">
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                    <td class="py-0 fw-bold">
                                        Date Purchase </td>
                                    <td class="py-0 fw-bold">:</td>
                                    <td class="py-0 text-muted">
                                        <h6 class="mb-0"><span id="dpu" class="text-primary"></span></h6>
                                    </td>
                                </tr>
                                <tr class="py-0">
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                    <td class="py-0 fw-bold">
                                        No Purchase </td>
                                    <td class="py-0 fw-bold">:</td>
                                    <td class="py-0 text-muted">
                                        <h6 class="mb-0"><span id="npu" class="text-primary"></span></h6>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="table-responsive" id="tabel_viewpurchase">

                        </div>
                    </div>
                    <div class="modal-footer" id="ftmod">
                        <!-- <button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="btnsb" class="btn btn-primary bg-gradient waves-effect">Submit</button> -->
                        <div class="container">
                            <div class="row">
                                <div class="col-6 text-start">
                                    <button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" id="btnsb" class="btn btn-primary bg-gradient waves-effect" data-bs-dismiss="modal">Submit</button>
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