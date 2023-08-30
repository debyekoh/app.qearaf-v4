<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">
    <form id="productinfo" action="<?= base_url() ?>savenewsales" method="POST" class="needs-validation">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body px-1">
                        <ol class="activity-checkout mb-0 px-2 mt-2">
                            <li class="checkout-item pb-0 ps-3" id="li1">
                                <div class="avatar checkout-icon p-1" style="height: 2rem; width: 2rem; left:-16px;">
                                    <div class="avatar-title newsalesinfo rounded-circle bg-primary">
                                        <h5 class="text-white font-size-12 mb-0">01</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>New Sales Info</u></h5>
                                        <div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4" hidden>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="idsales" name="id_sales">
                                                            <label>ID Sales</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control font-size-16 text-uppercase fw-bold no_sales inewsalesinfo" name="no_sales" id="no_sales" placeholder="Sales Number" value="">
                                                            <label for="no_sales">No Sales</label>
                                                            <div class="invalid-feedback no_sales-invalid-feedback">
                                                                Please Fill in No Sales.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="date" class="form-control flatpickr-input font-size-16 fw-bold date_sales inewsalesinfo" name="date_sales" id="date_sales" placeholder="Date" value="">
                                                            <label for="date_sales">Date Sales</label>
                                                            <div class="invalid-feedback">
                                                                Please choose Date.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">

                                                        <div id="slmp" class="form-floating mb-3">
                                                            <input type="text" class="form-control font-size-16" name="group_shop" id="group_shop" value="" hidden>
                                                            <select class="form-select font-size-16 fw-bold shop inewsalesinfo" name="shop" id="shop" aria-label="Floating label select example">
                                                                <option selected disabled value>Select your shop</option>
                                                                <?php foreach ($datashop as $ds) : ?>
                                                                    <option value="<?= $ds['id_shop']; ?>"><?= $ds['name_shop']; ?> - <?= $ds['marketplace']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <label for="shop">MarketPlace</label>
                                                            <div class="invalid-feedback">
                                                                Please choose Marketplace.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1 ps-3" id="li2" style="border-color: #1f58c7;">
                                <div class="avatar checkout-icon p-1" style="height: 2rem; width: 2rem; left:-16px;">
                                    <div class="avatar-title productinfo rounded-circle bg-primary">
                                        <h5 class="text-white font-size-12 mb-0">02</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Product Info</u></h5>
                                        <div class="mb-2">
                                            <div class="row mb-3">
                                                <div class="table-responsive ">
                                                    <table id="listsalesproduct" class="table table-sm rounded rounded-3 overflow-hidden table-striped table-hover align-middle mb-0">
                                                        <thead class="table-info">
                                                            <tr>
                                                                <th class="border-top-0" scope="col">Product</th>
                                                                <th class="border-top-0" scope="col">Product Desc</th>
                                                                <th class="border-top-0" scope="col">Qty</th>
                                                                <th class="border-top-0  text-center" scope="col"><i class="mdi mdi-apps"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="norow">
                                                                <td colspan="4" class="text-center">-- NoProduct --
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                            <div class="col text-center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-primary" id="adnpm">Add New Product</button>
                                                </div>
                                            </div>
                                            <div id="addNewProduct" class="modal fade" tabindex="-1" aria-labelledby="addNewProductLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen-sm-down">
                                                    <div class="modal-content">
                                                        <div class="modal-body px-1">
                                                            <div id="table-gridjs"></div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1 ps-3" id="li3" style="border-color: #1f58c7;">
                                <div class="avatar checkout-icon p-1" style="height: 2rem; width: 2rem; left:-16px;">
                                    <div class="avatar-title deliveryinfo rounded-circle bg-primary">
                                        <h5 class="text-white font-size-12 mb-0">03</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list" style="border-color: #f5f6f8;">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Delivery Info</u></h5>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <!-- <div class="form-floating mb-3">
                                                        <input type="text" class="form-control ideliveryinfo" id="service" name="service" placeholder="Service">
                                                        <label for="service">Service</label>
                                                    </div> -->
                                                    <div id="slds" class="form-floating mb-3">
                                                        <select class="form-select font-size-16 fw-bold deliveryservices ideliveryinfo" name="deliveryservices" id="deliveryservices" aria-label="Floating label select example">
                                                            <option selected disabled value>Select your Services</option>
                                                            <?php foreach ($listdeliveryservices as $ds) : ?>
                                                                <option value="<?= $ds['id']; ?>"><?= $ds['name_delivery_services']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <label for="deliveryservices">Delivery Services</label>
                                                        <div class="invalid-feedback">
                                                            Please choose Delivery Services.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control text-uppercase no_resi ideliveryinfo" id="no_resi" name="no_resi" placeholder="No Resi">
                                                        <label for="no_resi">No Resi</label>
                                                        <div class="invalid-feedback">
                                                            Please Fill in No Resi.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control ideliveryinfo" id="notes" name="notes" placeholder="Notes">
                                                        <label for="notes">Notes</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1 ps-3" id="li4" style="border-color: #1f58c7;">
                                <div class="avatar checkout-icon p-1" style="height: 2rem; width: 2rem; left:-16px;">
                                    <div class="avatar-title packaginginfo rounded-circle bg-primary">
                                        <h5 class="text-white font-size-12 mb-0">04</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Packaging Info</u></h5>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="packagingmethod" id="packaging-method1" class="card-radio-input ipackagingmethod" value="1">
                                                        <span class="card-radio packagingmethod py-0 text-center text-truncate">
                                                            <i class="mdi mdi-package-variant-closed fa-2x d-block"></i>
                                                            <span>Small 17x9x6cm</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="packagingmethod" id="packaging-method2" class="card-radio-input ipackagingmethod" value="2">
                                                        <span class="card-radio packagingmethod py-0 text-center text-truncate">
                                                            <i class="mdi mdi-package-variant-closed fa-2x d-block"></i>
                                                            Long 8x8x30cm
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="packagingmethod" id="packaging-method0" class="card-radio-input ipackagingmethod" value="0">
                                                        <span class="card-radio packagingmethod py-0 text-center text-truncate">
                                                            <i class="mdi mdi-package-variant-closed packagingmethod text-danger fa-2x d-block"></i>
                                                            <span>No Packaging</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1 pb-2 ps-3" id="li5">
                                <div class="avatar checkout-icon p-1" style="height: 2rem; width: 2rem; left:-16px;">
                                    <div class="avatar-title payinfo rounded-circle bg-primary">
                                        <h5 class="text-white font-size-12 mb-0">05</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Payment Info</u></h5>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="paymethod" id="pay-methodoption1" class="card-radio-input ipaymethod" value="1">
                                                        <span class="card-radio paymethod py-0 text-center text-truncate">
                                                            <i class="bx bx-credit-card fa-2x d-block"></i>
                                                            <span>Online Payment</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="paymethod" id="pay-methodoption2" class="card-radio-input ipaymethod" value="2">

                                                        <span class="card-radio paymethod py-0 text-center text-truncate">
                                                            <i class="bx bx-money fa-2x d-block"></i>
                                                            <span>Cash on Delivery</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>


            </div>
            <div class="col-xl-4">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="row p-3 bg-light mb-3">
                            <div class="col-md-6">
                                <h5 class="font-size-16 mb-0">Order Summary</h5>

                            </div>
                            <div class="col-md-6">
                                <h5 id="nso" class="font-size-16 mb-0"></h5>
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
                                    <tr class="norowsummary">
                                        <td colspan="3" class="text-center">-- NoProduct --</td>
                                    </tr>
                                    <tr class="lstr">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Sub Total :</h5>
                                        </td>
                                        <td id="subto">
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Discount :</h5>
                                        </td>
                                        <td id="disc">
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Estimated Tax (10%):</h5>
                                        </td>
                                        <td id="tax" class="text-danger">
                                            -
                                        </td>
                                    </tr>
                                    <tr class="pckg">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Packaging :</h5>
                                            <p class="text-muted mb-0 pckgdesc"></p>
                                            <input type="text" class="form-control pckgval" id="pckgval" name="pckgval" value="0" hidden>
                                        </td>
                                        <td id="pckg">
                                            -
                                        </td>
                                    </tr>

                                    <tr class="bg-light">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Total:</h5>
                                        </td>
                                        <td id="grtot" class="font-size-18 m-0 fw-bold">
                                            -
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="grtotval" name="grtotval" hidden>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row mb-4">
                <div class="col">
                    <a href="<?= base_url() ?>sales" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Cancel Input </a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end">
                        <!-- <a href="#" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i> Procced </a> -->
                        <button id="presubmit" type="button" class="btn btn-success"><i class="bx bx-check me-1 align-middle"></i> Procced</button>
                        <button id="submit" type="submit" class="btn btn-success" hidden><i class="bx bx-check me-1 align-middle"></i> Procced</button>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
    </form>

</div>

<script src="<?= base_url(); ?>assets/libs/jquery/jquery-1.12.4.js"></script>
<?= $this->endSection(); ?>