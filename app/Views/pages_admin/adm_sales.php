<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="card">
        <div class="card-body p-1">

            <ul class="nav nav-tabs nav-tabs-custom mt-1 mx-3" id="salesTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="mdi mdi-order-bool-ascending mdi-24px"></i></span></span>
                        <span class="d-none d-sm-block">All</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="toprocess-tab" data-bs-toggle="tab" data-bs-target="#toprocess" type="button" role="tab" aria-controls="toprocess" aria-selected="true">
                        <span class="d-block d-sm-none proces_span_none"><i class="mdi mdi-application-settings mdi-24px"></i><?php if ($tabnotif['Process'] != 0) : ?><span class="process rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Process']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block proces_span_block">Process <?php if ($tabnotif['Process'] != 0) : ?><span class="process rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Process']; ?></span><?php endif; ?></span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="topackaging-tab" data-bs-toggle="tab" data-bs-target="#topackaging" type="button" role="tab" aria-controls="topackaging" aria-selected="true">
                        <span class="d-block d-sm-none packaging_span_none"><i class="mdi mdi-package-variant mdi-24px"></i> <?php if ($tabnotif['Packaging'] != 0) : ?><span class="packaging rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Packaging']; ?></span><?php endif; ?></i></span>
                        <span class="d-none d-sm-block packaging_span_block">Packaging <?php if ($tabnotif['Packaging'] != 0) : ?><span class="packaging rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Packaging']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="readytodelivery-tab" data-bs-toggle="tab" data-bs-target="#readytodelivery" type="button" role="tab" aria-controls="readytodelivery" aria-selected="true">
                        <span class="d-block d-sm-none ready_span_none"><i class="mdi mdi-clipboard-check-multiple-outline mdi-24px"></i> <?php if ($tabnotif['Ready'] != 0) : ?><span class="ready rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Ready']; ?></span><?php endif; ?></i></span>
                        <span class="d-none d-sm-block ready_span_block">Ready <?php if ($tabnotif['Ready'] != 0) : ?><span class="ready rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Ready']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="true">
                        <span class="d-block d-sm-none delivery_span_none"><i class="mdi mdi-truck-fast-outline mdi-24px"></i> <?php if ($tabnotif['Delivery'] != 0) : ?><span class="delivery rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Delivery']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block delivery_span_block">Delivery <?php if ($tabnotif['Delivery'] != 0) : ?><span class="delivery rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Delivery']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab" aria-controls="received" aria-selected="true">
                        <span class="d-block d-sm-none received_span_none"><i class="mdi mdi-progress-check mdi-24px"></i> <?php if ($tabnotif['Received'] != 0) : ?><span class="received rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Received']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block received_span_block">Received <?php if ($tabnotif['Received'] != 0) : ?><span class="received rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Received']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="true">
                        <span class="d-block d-sm-none completed_span_none"><i class="mdi mdi-check-decagram mdi-24px"></i> <?php if ($tabnotif['Completed'] != 0) : ?><span class="completed rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Completed']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block completed_span_block">Completed <?php if ($tabnotif['Completed'] != 0) : ?><span class="completed rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Completed']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="true">
                        <span class="d-block d-sm-none cancel_span_none"><i class="mdi mdi-progress-close mdi-24px"></i> <?php if ($tabnotif['Cancel'] != 0) : ?><span class="cancel rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Cancel']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block cancel_span_block">Cancel <?php if ($tabnotif['Cancel'] != 0) : ?><span class="cancel rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Cancel']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" role="tab" aria-controls="return" aria-selected="true">
                        <span class="d-block d-sm-none return_span_none"><i class="mdi mdi-backup-restore mdi-24px"></i> <?php if ($tabnotif['Return'] != 0) : ?><span class="return rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Return']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block return_span_block">Return <?php if ($tabnotif['Return'] != 0) : ?><span class="return rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Return']; ?></span><?php endif; ?></span>
                    </button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="justify-content-end p-3" style="position: absolute;right: 0.5rem;top: 2.7rem;">
                <h5 id="tcard" class="card-title mb-0 pe-1"></h5>
            </div>
            <div class="tab-content p-3 text-muted py-0" id="salesTabContent">
                <div id="tabcontent">
                    <div id="salestabcontent"></div>
                </div>
            </div>
            <!-- <div id="viewSales" class="modal fade" tabindex="-1" aria-labelledby="viewSalesLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-body px-1">
                            <div id="table-viewSales"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <div id="viewSales" class="modal fade salesdetailsModal" tabindex="-1" role="dialog" aria-labelledby="salesdetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen-sm-down" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="salesdetailsModalLabel">Sales Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-1">
                            <table class="table align-middle table-sm table-nowrap table-borderless border-bottom table-centered p-1 mb-0">
                                <tbody>
                                    <tr class="py-0">
                                        <th class="py-0 fw-bold" style="width:10%;">
                                            Shop</th>
                                        <td class="py-0 fw-bold" style="width:1%;">:</td>
                                        <td class="py-0 text-muted">
                                            <h6 class="mb-0"><span id="shp" class="text-truncate">#Martin Gurley</span></h6>
                                        </td>
                                    </tr>
                                    <tr class="py-0">
                                        <th class="py-0 fw-bold">
                                            No Sales</th>
                                        <td class="py-0 fw-bold">:</td>
                                        <td class="py-0 text-muted">
                                            <h6 class="mb-0"><span id="nos" class="text-primary">#Martin Gurley</span></h6>
                                        </td>
                                    </tr>
                                    <tr class="py-0">
                                        <th class="py-0 fw-bold">
                                            Sales ID</th>
                                        <td class="py-0 fw-bold">:</td>
                                        <td class="py-0 text-muted">
                                            <h6 class="mb-0"><span id="ids" class="text-primary">#Martin Gurley</span></h6>
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