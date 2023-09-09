<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="card">
        <div class="card-body p-1">
            <ul class="nav nav-tabs nav-tabs-custom mt-1 mx-3" id="salesTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="mdi mdi-order-bool-ascending mdi-24px"></i></span></span>
                        <span class="d-none d-sm-block">All</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="toprocess-tab" data-bs-toggle="tab" data-bs-target="#toprocess" type="button" role="tab" aria-controls="toprocess" aria-selected="true">
                        <span class="d-block d-sm-none proces_span_none"><i class="mdi mdi-application-settings mdi-24px"></i></span>
                        <span class="d-none d-sm-block proces_span_block">Process </span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="topackaging-tab" data-bs-toggle="tab" data-bs-target="#topackaging" type="button" role="tab" aria-controls="topackaging" aria-selected="true">
                        <span class="d-block d-sm-none packaging_span_none"><i class="mdi mdi-package-variant mdi-24px"></i></span>
                        <span class="d-none d-sm-block packaging_span_block">Packaging </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="readytodelivery-tab" data-bs-toggle="tab" data-bs-target="#readytodelivery" type="button" role="tab" aria-controls="readytodelivery" aria-selected="true">
                        <span class="d-block d-sm-none ready_span_none"><i class="mdi mdi-clipboard-check-multiple-outline mdi-24px"></i></span>
                        <span class="d-none d-sm-block ready_span_block">Ready </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="true">
                        <span class="d-block d-sm-none delivery_span_none"><i class="mdi mdi-truck-fast-outline mdi-24px"></i></span>
                        <span class="d-none d-sm-block delivery_span_block">Delivery </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab" aria-controls="received" aria-selected="true">
                        <span class="d-block d-sm-none received_span_none"><i class="mdi mdi-progress-check mdi-24px"></i></span>
                        <span class="d-none d-sm-block received_span_block">Received </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="true">
                        <span class="d-block d-sm-none completed_span_none"><i class="mdi mdi-check-decagram mdi-24px"></i></span>
                        <span class="d-none d-sm-block completed_span_block">Completed </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="true">
                        <span class="d-block d-sm-none cancel_span_none"><i class="mdi mdi-progress-close mdi-24px"></i></span>
                        <span class="d-none d-sm-block cancel_span_block">Cancel </span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="true">
                        <span class="d-block d-sm-none return_span_none"><i class="mdi mdi-backup-restore mdi-24px"></i></span>
                        <span class="d-none d-sm-block return_span_block">Return </span>
                    </button>
                </li>
            </ul>
            <div class="tab-content p-3 text-muted py-0" id="salesTabContent">
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
                    <div id="salestabcontent"></div>
                </div>
            </div>
            <div id="viewSales" class="modal fade salesdetailsModal" tabindex="-1" role="dialog" aria-labelledby="salesdetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-sm-down" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="salesdetailsModalLabel">Sales Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body font-size-12 py-1">
                            <table class="table align-middle table-sm table-nowrap table-borderless border-bottom table-centered p-1 mb-0">
                                <tbody>
                                    <tr class="py-0">
                                        <th class="py-0 ps-0 fw-bold" style="width:10%;">
                                            Shop</th>
                                        <td class="py-0 fw-bold" style="width:1%;">:</td>
                                        <td class="py-0 text-muted">
                                            <h6 class="mb-0"><span id="shp" class="text-dark font-size-13"></span></h6>
                                        </td>
                                    </tr>
                                    <tr class="py-0">
                                        <th class="py-0 ps-0 fw-bold">
                                            No Sales</th>
                                        <td class="py-0 fw-bold">:</td>
                                        <td class="py-0 text-muted">
                                            <h6 class="mb-0"><span id="nos" class="text-primary font-size-13"></span></h6>
                                        </td>
                                    </tr>
                                    <tr class="py-0">
                                        <th class="py-0 ps-0 fw-bold">
                                            Sales ID</th>
                                        <td class="py-0 fw-bold">:</td>
                                        <td class="py-0 text-muted">
                                            <h6 class="mb-0"><span id="ids" class="text-primary font-size-13"></span></h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <h6 class="mb-1">Shop: <span id="nos" class="text-primary">#Martin Gurley</span></h6>
                            <h6 class="mb-1">No Sales: <span id="nos" class="text-primary">#Martin Gurley</span></h6>
                            <h6 class="mb-3">Sales ID: <span id="ids" class="text-primary">SK2540</span></h6> -->
                            <div class="table-responsive" id="tabel_viewsales">

                            </div>
                        </div>
                        <div class="modal-footer" id="ftmod">
                            <button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Close</button>
                            <!-- <div class="container">
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-primary bg-gradient waves-effect" data-dismiss="modal">Submit</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<?= $this->endSection(); ?>