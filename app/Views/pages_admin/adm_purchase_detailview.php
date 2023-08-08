<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <!-- <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">

                        <div class="row justify-content-center mt-5">
                            <div class="col-sm-6">
                                <div class="maintenance-img">
                                    <img src="<?= base_url() ?>assets/images/coming-soon.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-5"><?= ucfirst($titlepage) ?> page is coming soon</h4>
                        <p class="text-muted">Look forward to its presence, and in the meantime visit another page.</p>

                        <div class="row justify-content-center mt-5">
                            <div class="col-md-9">
                                <div id="countdown" class="countdownlist"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-8">
            <div class="card">
                <!-- <div class="modal-content"> -->
                <!-- <div class="modal-header">
                        <h5 class="modal-title" id="salesdetailsModalLabel">Sales Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> -->
                <div class="card-body py-3">
                    <table class="table align-middle table-sm table-nowrap table-borderless border-bottom table-centered p-1 mb-0">
                        <tbody>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>1</th>
                                <td class="py-0 fw-bold" style="width:10%;">Buyer</td>
                                <td class="py-0 fw-bold" style="width:1%;">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="shp" class="text-truncate">QEARAF.COM</span></h6>
                                </td>
                            </tr>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold" style="width:10%;">Purchase From</td>
                                <td class="py-0 fw-bold" style="width:1%;">:</td>
                                <td class="py-0 text-muted">
                                    <?php
                                    $pid = $datadetail['ifp']->purch_category;
                                    if ($pid == 2) { ?>
                                        <h6 class="mb-0"><span id="shp" class="text-wrap"><?= $datadetail['ifp']->name_shop; ?> <?= $datadetail['ifp']->marketplace; ?></span></h6>
                                    <?php } else { ?>
                                        <h6 class="mb-0"><span id="shp" class="text-wrap"><?= $datadetail['ifp']->name_supplier; ?></span></h6>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold" style="width:10%;">Date Purchase</td>
                                <td class="py-0 fw-bold" style="width:1%;">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="shp" class="text-truncate"><?= $datadetail['ifp']->date_purchase; ?></span></h6>
                                </td>
                            </tr>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold" style="width:10%;">No Purchase</td>
                                <td class="py-0 fw-bold" style="width:1%;">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="shp" class="text-truncate">#<?= $datadetail['ifp']->no_purchase; ?></span></h6>
                                </td>
                            </tr>

                            <!-- <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>3</th>
                                <td class="py-0 fw-bold" style="width:10%;">Sales ID</td>
                                <td class="py-0 fw-bold" style="width:1%;">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="ids" class="text-primary"></span></span></h6>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                    <div id="tabel_viewsales">

                        <table class="table align-middle table-nowrap" id="trfsi">
                            <thead>
                                <tr>
                                    <th scope="col" hidden>#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0; ?>
                                <?php foreach ($datadetail['dpl'] as $ds) {
                                    $subtotal += (($ds->pro_qty) * ($ds->pro_price));
                                ?>
                                    <tr>
                                        <th class="py-0 fw-bold" style="width:1%;" hidden>1</th>
                                        <td scope="row"><img src="<?= base_url(); ?>assets/images/product/<?= $ds->pro_img; ?>" alt="<?= $ds->pro_img; ?>" class="rounded avatar-md"></td>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate fw-bold font-size-14 mb-0"><?= $ds->pro_name; ?> <?= $ds->pro_model; ?><p class="text-truncate mb-0"><?= $ds->pro_qty; ?> x Rp <?= number_format($ds->pro_price, 0, ",", "."); ?></p>
                                                </h5>
                                            </div>
                                        </td>
                                        <td>Rp <?= number_format(($ds->pro_qty) * ($ds->pro_price), 0, ",", "."); ?></td>
                                    </tr>

                                <?php } ?>
                                <!-- <tr>
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>1</th>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>Rp <?= number_format($subtotal, 0, ",", "."); ?></td>
                                </tr> -->
                                <!-- <tr class="border-bottom-0">
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>1</th>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Discount:</h6>
                                    </td>
                                    <td>Rp <?= number_format($subtotal - $datadetail['ifp']->payment, 0, ",", "."); ?></td>
                                </tr> -->
                                <tr>
                                    <th class="py-0 fw-bold" style="width:1%;" hidden>1</th>
                                    <td colspan="2" class="border-bottom-0">
                                        <h6 class="m-0 text-right" id="tdesc">Billing Information:</h6>
                                    </td>
                                    <td class="font-size-18 m-0 fw-bold border-bottom-0" id="tval">Rp <?= number_format($subtotal, 0, ",", "."); ?></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- </div> -->
            </div>

        </div>
        <div class="col-xl-4">
            <div>
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="row p-3 bg-light mb-3">
                            <div class="col-md-6">
                                <h5 class="font-size-16 mb-0">Order Summary</h5>

                            </div>
                            <div class="col-md-6">
                                <h5 id="nso" class="font-size-16 mb-0"></h5>
                                <!-- <h5 class="font-size-16 mb-0"><span id="nso" class="float-end ms-2"></span></h5> -->

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="summarytable" class="table align-middle mb-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 90px;" scope="col">Product</th>
                                        <th class="border-top-0" scope="col">Product Desc</th>
                                        <th class="border-top-0" scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $subtotal = 0; ?>
                                    <?php foreach ($datadetail['dpl'] as $ds) {
                                        $subtotal += (($ds->pro_qty) * ($ds->pro_price));
                                    ?>
                                        <tr class="listprosummary rowprosalessummary TW21RHB-00">
                                            <td scope="row"><img src="<?= base_url(); ?>assets/images/product/<?= $ds->pro_img; ?>" alt="<?= $ds->pro_img; ?>" class="rounded avatar-md"></td>
                                            <td>
                                                <h5 class="text-truncate fw-bold font-size-14 mb-0"><?= $ds->pro_name; ?> <?= $ds->pro_model; ?></h5>
                                                <!-- <p class="text-muted mb-0 RSprice" id="RSprice0" hidden="">40000</p>
                                                <p class="text-muted mb-0 RSqty" id="RSqty0" hidden="">6</p>
                                                <p class="text-muted mb-0 RSsubpriceval" id="RSsubpriceval0" hidden="">240000</p> -->
                                                <p class="text-muted mb-0" id="RSpricetx0">6 x Rp 40.000</p>
                                            </td>
                                            <td id="RSsubprice0">Rp <?= number_format(($ds->pro_qty) * ($ds->pro_price), 0, ",", "."); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="lstr">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Sub Total :</h5>
                                        </td>
                                        <td id="subto">Rp <?= number_format($subtotal, 0, ",", "."); ?></td>
                                    </tr>
                                    <?php if ($datadetail['ifp']->status == "Lunas") { ?>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Discount :</h5>
                                            </td>
                                            <td id="disc">
                                                Rp <?= number_format($subtotal - $datadetail['ifp']->payment, 0, ",", "."); ?>
                                            </td>
                                        </tr>

                                        <tr class="bg-success text-light">
                                            <td colspan="2">
                                                <h5 class="font-size-14 text-light m-0">Total Payment:</h5>
                                            </td>
                                            <td id="grtot" class="font-size-18 m-0 fw-bold">Rp <?= number_format($datadetail['ifp']->payment, 0, ",", "."); ?></td>
                                        </tr>
                                    <?php }
                                    if ($datadetail['ifp']->status == "Belum Lunas") { ?>
                                        <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Discount :</h5>
                                            </td>
                                            <td id="disc">
                                                -
                                            </td>
                                        </tr>
                                        <tr class="bg-danger text-light">
                                            <td colspan="2">
                                                <h5 class="font-size-14 text-light m-0">Total Bill:</h5>
                                            </td>
                                            <td id="grtot" class="font-size-18 text-light m-0 fw-bold">Rp <?= number_format($subtotal, 0, ",", "."); ?></td>
                                        </tr>
                                    <?php }
                                    if ($datadetail['ifp']->status == "Cancel") { ?>
                                        <tr class="bg-dark text-light">
                                            <td colspan="2">
                                                <h5 class="font-size-14 text-light m-0">Total:</h5>
                                            </td>
                                            <td id="grtot" class="font-size-18 m-0 fw-bold">Rp <?= number_format($subtotal, 0, ",", "."); ?></td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <?php if ($datadetail['ifp']->status == "Lunas") { ?>
                            <h1 style="position: absolute;bottom: 170px;rotate: -40deg;opacity: 100%;font-size: 65px;"><span class="badge badge-soft-success fw-bolder">PAID</span></h1>
                        <?php }
                        if ($datadetail['ifp']->status == "Belum Lunas") { ?>
                            <h1 style="position: absolute;bottom: 170px;rotate: -40deg;opacity: 70%;font-size: 65px;"><span class="badge badge-soft-danger border border-danger fw-bolder">UNPAID</span></h1>
                        <?php }
                        if ($datadetail['ifp']->status == "Cancel") { ?>
                            <h1 style="position: absolute;bottom: 170px;rotate: -40deg;opacity: 100%;font-size: 65px;"><span class="badge badge-soft-dark fw-bolder">CANCEL</span></h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>