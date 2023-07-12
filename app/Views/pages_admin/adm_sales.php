<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <!-- <div class="row"> -->
    <!-- <div class="col-lg-12"> -->
    <div class="card">
        <div class="card-body p-1">
            <!-- Nav tabs -->
            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div> -->

            <ul class="nav nav-tabs nav-tabs-custom mt-1" id="salesTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span></span>
                        <span class="d-none d-sm-block">All</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="toprocess-tab" data-bs-toggle="tab" data-bs-target="#toprocess" type="button" role="tab" aria-controls="toprocess" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i><?php if ($tabnotif['Process'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Process']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block">Process <?php if ($tabnotif['Process'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Process']; ?></span><?php endif; ?></span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="topackaging-tab" data-bs-toggle="tab" data-bs-target="#topackaging" type="button" role="tab" aria-controls="topackaging" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i> <?php if ($tabnotif['Packaging'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Packaging']; ?></span><?php endif; ?></i></span>
                        <span class="d-none d-sm-block">Packaging <?php if ($tabnotif['Packaging'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Packaging']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="readytodelivery-tab" data-bs-toggle="tab" data-bs-target="#readytodelivery" type="button" role="tab" aria-controls="readytodelivery" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i> <?php if ($tabnotif['Ready'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Ready']; ?></span><?php endif; ?></i></span>
                        <span class="d-none d-sm-block">Ready <?php if ($tabnotif['Ready'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Ready']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Delivery'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Delivery']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block">Delivery <?php if ($tabnotif['Delivery'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Delivery']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab" aria-controls="received" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Received'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Received']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block">Received <?php if ($tabnotif['Received'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Received']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Completed'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Completed']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block">Completed <?php if ($tabnotif['Completed'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Completed']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item d-none d-sm-block" role="presentation">
                    <button class="nav-link" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Cancel'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Cancel']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block">Cancel <?php if ($tabnotif['Cancel'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Cancel']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" tyReturnpe="button" role="tab" aria-controls="return" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Return'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Return']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block">Return <?php if ($tabnotif['Return'] != 0) : ?><span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Return']; ?></span><?php endif; ?></span>
                    </button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted py-0" id="salesTabContent">
                <!-- <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-4 pe-0">
                            <select class="form-select form-select-sm bg-light" id="search_salesby" style="border-radius: 0.5rem !important; border-bottom-right-radius: 0px !important;border-top-right-radius: 0px !important;" aria-label=".form-select-sm example">
                                <option value="bynosales" selected>No. Sales</option>
                                <option value="bynoresi">No. Resi</option>
                            </select>
                        </div>
                        <div class="col-8 ps-0">
                            <input type="text" id="search_sales" value="" class="form-control form-control-sm bg-light" style="border-radius: 0.5rem !important; border-bottom-left-radius: 0px !important;border-top-left-radius: 0px !important;" placeholder="Search...">
                            <span class="bx bx-search" style="position: absolute;z-index: 10;line-height: 2.2;right: 20px;top: 0;color: #a4a9b4;"></span>
                        </div>
                    </div>
                </div> -->
                <div id="tabcontent">
                    <div id="salestabcontent"></div>
                </div>
                <!-- <div class="tab-pane fade" id="toprocess" role="tabpanel" aria-labelledby="toprocess-tab">
                    <div id="sales-process"></div>
                </div>
                <div class="tab-pane fade" id="topackaging" role="tabpanel" aria-labelledby="topackaging-tab">
                    <div id="sales-packaging"></div>
                </div>
                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                    <div id="sales-delivery"></div>
                </div>
                <div class="tab-pane fade" id="received" role="tabpanel" aria-labelledby="received-tab">
                    <div id="sales-received"></div>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <div id="sales-completed"></div>
                </div>
                <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
                    <div id="sales-cancel"></div>
                </div>
                <div class="tab-pane fade" id="return" role="tabpanel" aria-labelledby="return-tab">
                    <div id="sales-return"></div>
                </div> -->




            </div>
        </div><!-- end card-body -->
    </div>
    <!-- </div> -->
    <!-- </div> -->

</div>

<?= $this->endSection(); ?>