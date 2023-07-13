<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">


    <div class="card">
        <div class="card-body p-1">

            <ul class="nav nav-tabs nav-tabs-custom mt-1" id="salesTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span></span>
                        <span class="d-none d-sm-block">All</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="toprocess-tab" data-bs-toggle="tab" data-bs-target="#toprocess" type="button" role="tab" aria-controls="toprocess" aria-selected="true">
                        <span class="d-block d-sm-none proces_span_none"><i class="far fa-user"></i><?php if ($tabnotif['Process'] != 0) : ?><span class="process rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Process']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block proces_span_block">Process <?php if ($tabnotif['Process'] != 0) : ?><span class="process rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Process']; ?></span><?php endif; ?></span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="topackaging-tab" data-bs-toggle="tab" data-bs-target="#topackaging" type="button" role="tab" aria-controls="topackaging" aria-selected="true">
                        <span class="d-block d-sm-none packaging_span_none"><i class="far fa-envelope"></i> <?php if ($tabnotif['Packaging'] != 0) : ?><span class="packaging rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Packaging']; ?></span><?php endif; ?></i></span>
                        <span class="d-none d-sm-block packaging_span_block">Packaging <?php if ($tabnotif['Packaging'] != 0) : ?><span class="packaging rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Packaging']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="readytodelivery-tab" data-bs-toggle="tab" data-bs-target="#readytodelivery" type="button" role="tab" aria-controls="readytodelivery" aria-selected="true">
                        <span class="d-block d-sm-none ready_span_none"><i class="far fa-envelope"></i> <?php if ($tabnotif['Ready'] != 0) : ?><span class="ready rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Ready']; ?></span><?php endif; ?></i></span>
                        <span class="d-none d-sm-block ready_span_block">Ready <?php if ($tabnotif['Ready'] != 0) : ?><span class="ready rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Ready']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="delivery" aria-selected="true">
                        <span class="d-block d-sm-none delivery_span_none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Delivery'] != 0) : ?><span class="delivery rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Delivery']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block delivery_span_block">Delivery <?php if ($tabnotif['Delivery'] != 0) : ?><span class="delivery rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Delivery']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab" aria-controls="received" aria-selected="true">
                        <span class="d-block d-sm-none received_span_none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Received'] != 0) : ?><span class="received rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Received']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block received_span_block">Received <?php if ($tabnotif['Received'] != 0) : ?><span class="received rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Received']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="true">
                        <span class="d-block d-sm-none completed_span_none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Completed'] != 0) : ?><span class="completed rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Completed']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block completed_span_block">Completed <?php if ($tabnotif['Completed'] != 0) : ?><span class="completed rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Completed']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item d-none d-sm-block" role="presentation">
                    <button class="nav-link" id="cancel-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="cancel" aria-selected="true">
                        <span class="d-block d-sm-none cancel_span_none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Cancel'] != 0) : ?><span class="cancel rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Cancel']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block cancel_span_block">Cancel <?php if ($tabnotif['Cancel'] != 0) : ?><span class="cancel rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Cancel']; ?></span><?php endif; ?></span>
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" tyReturnpe="button" role="tab" aria-controls="return" aria-selected="true">
                        <span class="d-block d-sm-none return_span_none"><i class="fas fa-cog"></i> <?php if ($tabnotif['Return'] != 0) : ?><span class="return rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;"><?= $tabnotif['Return']; ?></span><?php endif; ?></span>
                        <span class="d-none d-sm-block return_span_block">Return <?php if ($tabnotif['Return'] != 0) : ?><span class="return rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;"><?= $tabnotif['Return']; ?></span><?php endif; ?></span>
                    </button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted py-0" id="salesTabContent">
                <div id="tabcontent">
                    <div id="salestabcontent"></div>
                </div>
            </div>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>