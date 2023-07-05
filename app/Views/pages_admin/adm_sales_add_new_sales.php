<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid">
    <form id="productinfo" action="<?= base_url() ?>savenewsales" method="POST">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body px-1">
                        <ol class="activity-checkout mb-0 px-4 mt-2">
                            <li class="checkout-item pb-0">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <h5 class="text-white font-size-16 mb-0">01</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>New Sales Info</u></h5>
                                        <div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="id_sales">
                                                            <label for="id_sales">ID Sales</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control font-size-16 text-uppercase fw-bold" name="no_sales" id="no_sales" placeholder="Sales Number">
                                                            <label for="no_sales">No Sales</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating mb-3">
                                                            <input type="date" class="form-control flatpickr-input font-size-16 fw-bold" name="date_sales" id="date_sales" placeholder="Date">
                                                            <label for="date_sales">Date Sales</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">

                                                        <div class="form-floating mb-3">
                                                            <select class="form-select font-size-16 fw-bold" name="shop" id="shop" aria-label="Floating label select example">
                                                                <option selected>Select your shop</option>
                                                                <?php foreach ($datashop as $ds) : ?>
                                                                    <option value="<?= $ds['id_shop']; ?>"><?= $ds['name_shop']; ?> - <?= $ds['marketplace']; ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            <label for="shop">MarketPlace</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1" style="border-color: #1f58c7;">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <h5 class="text-white font-size-16 mb-0">02</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Product Info</u></h5>
                                        <div class="mb-2">
                                            <div class="row mb-3">
                                                <div class="table-responsive">
                                                    <table id="listsalesproduct" class="table align-middle mb-0 table-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="border-top-0" scope="col">Product</th>
                                                                <th class="border-top-0" scope="col">Product Desc</th>
                                                                <!-- <th class="border-top-0" scope="col">Price</th> -->
                                                                <th class="border-top-0" scope="col">Qty</th>
                                                                <th class="border-top-0  text-center" scope="col"><i class="mdi mdi-apps"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="norow">
                                                                <td colspan="4" class="text-center">-- NoProduct --</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                            <div class="col text-center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <!-- <button type="button" class="btn btn-outline-danger">Delete Last Item</button> -->
                                                    <button type="button" class="btn btn-outline-primary" id="adnpm" data-bs-toggle="modal" data-bs-target="#addNewProduct">Add New Product</button>
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
                            <li class="checkout-item pb-1" style="border-color: #1f58c7;">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <h5 class="text-white font-size-16 mb-0">03</h5>
                                    </div>
                                </div>
                                <div class="feed-item-list" style="border-color: #f5f6f8;">
                                    <div>
                                        <h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Delivery Info</u></h5>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="service" name="service" placeholder="Service">
                                                        <label for="service">Service</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="no_resi" name="no_resi" placeholder="No Resi">
                                                        <label for="no_resi">No Resi</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="notes" name="notes" placeholder="Notes">
                                                        <label for="notes">Notes</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1" style="border-color: #1f58c7;">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <h5 class="text-white font-size-16 mb-0">04</h5>
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
                                                        <input type="radio" name="packaging-method" id="packaging-method1" class="card-radio-input">
                                                        <span class="card-radio py-0 text-center text-truncate">
                                                            <i class="mdi mdi-package-variant-closed fa-2x d-block"></i>
                                                            <span>Small 17x9x6cm</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="packaging-method" id="packaging-method2" class="card-radio-input">
                                                        <span class="card-radio py-0 text-center text-truncate">
                                                            <i class="mdi mdi-package-variant-closed fa-2x d-block"></i>
                                                            Long 8x8x30cm
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="packaging-method" id="packaging-method3" class="card-radio-input" checked>

                                                        <span class="card-radio py-0 text-center text-truncate">
                                                            <i class="mdi mdi-package-variant-closed text-danger fa-2x d-block"></i>
                                                            <span>No Packaging</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item pb-1 pb-2">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <h5 class="text-white font-size-16 mb-0">05</h5>
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
                                                        <input type="radio" name="pay-method" id="pay-methodoption1" class="card-radio-input">
                                                        <span class="card-radio py-0 text-center text-truncate">
                                                            <i class="bx bx-credit-card d-block h2"></i>
                                                            Online Payment
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption3" class="card-radio-input" checked>

                                                        <span class="card-radio py-0 text-center text-truncate">
                                                            <i class="bx bx-money d-block h2"></i>
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
                        <div class="p-3 bg-light mb-3">
                            <h5 class="font-size-16 mb-0">Order Summary <span id="nso" class="float-end ms-2"></span></h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0" style="width: 90px;" scope="col">Product</th>
                                        <th class="border-top-0" scope="col">Product Desc</th>
                                        <th class="border-top-0" scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><img src="assets/images/product/img-1.png" alt="product-img" title="product-img" class="avatar-md"></th>
                                        <td>
                                            <h5 class="font-size-15 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Home & Office Chair Crime</a></h5>
                                            <p class="text-muted mb-0">$ 260 x 2</p>
                                        </td>
                                        <td>$ 520</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><img src="assets/images/product/img-2.png" alt="product-img" title="product-img" class="avatar-md"></th>
                                        <td>
                                            <h5 class="font-size-15 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark">Sofa Home Chair Black</a></h5>
                                            <p class="text-muted mb-0">$ 260 x 1</p>
                                        </td>
                                        <td>$ 260</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Sub Total :</h5>
                                        </td>
                                        <td>
                                            $ 780
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Discount :</h5>
                                        </td>
                                        <td>
                                            - $ 78
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Shipping Charge :</h5>
                                        </td>
                                        <td>
                                            $ 25
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Estimated Tax :</h5>
                                        </td>
                                        <td>
                                            $ 18.20
                                        </td>
                                    </tr>

                                    <tr class="bg-light">
                                        <td colspan="2">
                                            <h5 class="font-size-14 m-0">Total:</h5>
                                        </td>
                                        <td>
                                            $ 745.2
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
            <div class="row">
                <div class="col">
                    <a href="<?= base_url() ?>sales" class="btn btn-link text-muted">
                        <i class="mdi mdi-arrow-left me-1"></i> Cancel Input </a>
                </div> <!-- end col -->
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <!-- <a href="#" class="btn btn-success">
                            <i class="mdi mdi-cart-outline me-1"></i> Procced </a> -->
                        <button type="submit" class="btn btn-success"><i class="bx bx-check me-1 align-middle"></i> Procced</button>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row-->
        </div>
    </form>

</div>

<script src="<?= base_url(); ?>assets/libs/jquery/jquery-1.12.4.js"></script>
<!-- <script>
    $("#adnpm").on('click', function() {
        console.log("test");
        // get the current row
        // var currentRow = $(this).closest("tr");
        // var s = currentRow.find(".switch").val();
        // if (s != 0) {
        //     var ss = 0;
        // } else {
        //     var ss = 1;
        // }
        // var d = currentRow.find(".d").text();
        // $.ajax({
        //     // type: "GET",
        //     url: "<?= base_url() ?>assets/js/pages/gridjs.init.js",
        //     // data: {
        //     //     d: d,
        //     //     ss: ss,
        //     // },
        //     success: function(data) {
        //         $('#btn-more').html("No Data");
        //     }
        // });
        new gridjs.Grid({
            columns: ["Name", "Email", "Position", "Company", "Country"],
            pagination: {
                limit: 5
            },
            sort: !0,
            search: !0,
            data: [
                ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
                ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
                ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
                ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
                ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
                ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
                ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
                ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
                ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
                ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"]
            ]
        }).render(document.getElementById("table-gridjs"));
    });
    $("#table_addnewproduct").on('click', function() {
        console.log("test");
        // get the current row
        // var currentRow = $(this).closest("tr");
        // var s = currentRow.find(".switch").val();
        // if (s != 0) {
        //     var ss = 0;
        // } else {
        //     var ss = 1;
        // }
        // var d = currentRow.find(".d").text();
        // $.ajax({
        //     type: "POST",
        //     url: "<?= base_url() ?>setting_account/csp",
        //     data: {
        //         d: d,
        //         ss: ss,
        //     },
        //     success: function(data) {
        //         location.reload();
        //     }
        // });
    });
</script> -->
<?= $this->endSection(); ?>