<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <!-- <div class="row"> -->
    <!-- <div class="col-lg-12"> -->
    <div class="card">
        <div class="card-body p-1">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">All <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#process" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">Process <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#packaging" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></i></span>
                        <span class="d-none d-sm-block">Packaging <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#delivery" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">Delivery <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#received" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">Received <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#completed" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">Completed <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#cancel" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">Cancel <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#return" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i> <span class="rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">2</span></span>
                        <span class="d-none d-sm-block">Return <span class="rounded-pill bg-primary bg-gradient" style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">2</span></span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <!-- <div class="col-xl-3 col-md-12">
                    <div class="pb-3 pb-xl-0">
                        <form class="email-search">
                            <div class="position-relative">
                                <input type="text" class="form-control bg-light" placeholder="Search...">
                                <span class="bx bx-search font-size-18"></span>
                            </div>
                        </form>
                    </div>
                </div> -->
                <div class="col-md-4 col-sm-12 mb-2">
                    <div class="row">
                        <div class="col-4 pe-0">
                            <select class="form-select form-select-sm bg-light" style="border-radius: 0.5rem !important; border-bottom-right-radius: 0px !important;border-top-right-radius: 0px !important;" aria-label=".form-select-sm example">
                                <option value="1" selected>No. Sales</option>
                                <option value="2">No. Resi</option>
                            </select>
                        </div>
                        <div class="col-8 ps-0">
                            <input type="text" class="form-control form-control-sm bg-light" style="border-radius: 0.5rem !important; border-bottom-left-radius: 0px !important;border-top-left-radius: 0px !important;" placeholder="Search...">
                            <span class="bx bx-search" style="position: absolute;z-index: 10;line-height: 2.2;right: 20px;top: 0;color: #a4a9b4;"></span>
                        </div>
                    </div>
                </div>

                <div class="tab-pane active" id="all" role="tabpanel">
                    <div id="sales-all"></div>
                </div>
                <div class="tab-pane" id="process" role="tabpanel">
                    <p class="mb-0">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                        single-origin coffee squid. Exercitation +1 labore velit, blog
                        sartorial PBR leggings next level wes anderson artisan four loko
                        farm-to-table craft beer twee. Qui photo booth letterpress,
                        commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                        vinyl cillum PBR. Homo nostrud organic, assumenda labore
                        aesthetic magna delectus.
                    </p>
                </div>
                <div class="tab-pane" id="packaging" role="tabpanel">
                    <p class="mb-0">
                        Etsy mixtape wayfarers, ethical wes anderson tofu before they
                        sold out mcsweeney's organic lomo retro fanny pack lo-fi
                        farm-to-table readymade. Messenger bag gentrify pitchfork
                        tattooed craft beer, iphone skateboard locavore carles etsy
                        salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                        Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                        mi whatever gluten-free carles.
                    </p>
                </div>
                <div class="tab-pane" id="delivery" role="tabpanel">
                    <p class="mb-0">
                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                        art party before they sold out master cleanse gluten-free squid
                        scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                        art party locavore wolf cliche high life echo park Austin. Cred
                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                        farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                        mustache readymade keffiyeh craft.
                    </p>
                </div>
            </div>
        </div><!-- end card-body -->
    </div>
    <!-- </div> -->
    <!-- </div> -->

</div>

<?= $this->endSection(); ?>