<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <form id="productinfo" action="<?= base_url() ?>updateproduct/<?= $DataProduct['pro_part_no']; ?>" method="POST">
        <?= csrf_field(); ?>

        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <a href="#addproduct-productinfo-collapse" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">01</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Product Info</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-productinfo-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <!-- <form id="productinfo" method="POST"> -->

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <input name="pro_id" type="text" class="form-control" value="<?= $DataProduct['pro_id']; ?>" hidden>
                                            <label class="form-label" for="productname">Product Name</label>
                                            <input id="productname" name="productname" placeholder="Enter Product Name" type="text" class="form-control <?= isset(session('_ci_validation_errors')['productname']) ? 'is-invalid' : '' ?>" value="<?= (old('productname')) ? (old('productname')) : $DataProduct['pro_name']; ?>" readonly>
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['productname']) ? session('_ci_validation_errors')['productname'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="productmodel">Product Model</label>
                                            <input id="productmodel" name="productmodel" placeholder="Enter Product Model" type="text" class="form-control <?= isset(session('_ci_validation_errors')['productmodel']) ? 'is-invalid' : '' ?>" value="<?= (old('productmodel')) ? (old('productmodel')) : $DataProduct['pro_model']; ?>" readonly>
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['productmodel']) ? session('_ci_validation_errors')['productmodel'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="skunumber">SKU No.</label>
                                            <input id="skunumber" name="skunumber" placeholder="Enter SKU No." type="text" class="form-control <?= isset(session('_ci_validation_errors')['skunumber']) ? 'is-invalid' : '' ?>" value="<?= (old('skunumber')) ? (old('skunumber')) : $DataProduct['pro_part_no']; ?>" readonly>
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['skunumber']) ? session('_ci_validation_errors')['skunumber'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="<?= isset(session('_ci_validation_errors')['productname']) ? '' : 'mb-3 ' ?>">
                                            <label for="choicesproductgroup" class="form-label">Product Group</label>
                                            <select class="form-control" data-trigger name="choicesproductgroup" id="choicesproductgroup">
                                                <?php if (session('failed')) { ?>
                                                    <option selected value="<?= (old('choicesproductgroup')); ?>"><?= (old('choicesproductgroup')); ?></option>
                                                <?php } else { ?>
                                                    <option selected value="<?= (old('choicesproductgroup')) ? (old('choicesproductgroup')) : $DataProduct['pro_group']; ?>"><?= (old('choicesproductgroup')) ? (old('choicesproductgroup')) : $DataProduct['pro_group']; ?></option>
                                                <?php }  ?>
                                                <?php foreach ($ProductsGroup as $Group) { ?>
                                                    <option value="<?= $Group['pro_name_group']; ?>"><?= $Group['pro_name_group']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php if (session('failed')) : ?>
                                            <div class="mb-3" style="width: 100%;margin-top: 0.25rem;font-size: 87.5%;color: #ed5555;">
                                                <?= isset(session('_ci_validation_errors')['choicesproductgroup']) ? session('_ci_validation_errors')['choicesproductgroup'] : null; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="<?= isset(session('_ci_validation_errors')['choicesproductcategory']) ? '' : 'mb-3 ' ?>">
                                            <label for="choicesproductcategory" class="form-label">Product Category</label>
                                            <select class="form-control" data-trigger name="choicesproductcategory" id="choicesproductcategory">
                                                <?php if (session('failed')) { ?>
                                                    <option selected value="<?= (old('choicesproductcategory')); ?>"><?= (old('choicesproductcategory')); ?></option>
                                                <?php } else { ?>
                                                    <option selected value="<?= (old('choicesproductcategory')) ? (old('choicesproductcategory')) : $DataProduct['pro_category']; ?>"><?= (old('choicesproductcategory')) ? (old('choicesproductcategory')) : $DataProduct['pro_category']; ?></option>
                                                <?php }  ?>
                                                <?php foreach ($ProductsCategory as $Category) { ?>
                                                    <option value="<?= $Category['pro_name_category']; ?>"><?= $Category['pro_name_category']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php if (session('failed')) : ?>
                                            <div class="mb-3" style="width: 100%;margin-top: 0.25rem;font-size: 87.5%;color: #ed5555;">
                                                <?= isset(session('_ci_validation_errors')['choicesproductcategory']) ? session('_ci_validation_errors')['choicesproductcategory'] : null; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="<?= isset(session('_ci_validation_errors')['choicesproductshow']) ? '' : 'mb-3 ' ?>">
                                            <label for="choicesproductshow" class="form-label">Product Show</label>
                                            <select class="form-control" data-trigger name="choicesproductshow" id="choicesproductshow">
                                                <?php if (session('failed')) { ?>
                                                    <option selected value="<?= (old('choicesproductshow')); ?>"><?= (old('choicesproductshow')); ?></option>
                                                <?php } else { ?>
                                                    <option selected value="<?= (old('choicesproductshow')) ? (old('choicesproductshow')) : $DataProduct['pro_show']; ?>"><?= (old('choicesproductshow')) ? (old('choicesproductshow')) : $DataProduct['pro_name_show']; ?></option>
                                                <?php }  ?>
                                                <?php foreach ($ProductsShow as $Show) { ?>
                                                    <option value="<?= $Show['pro_id_show']; ?>"><?= $Show['pro_name_show']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php if (session('failed')) : ?>
                                            <div class="mb-3" style="width: 100%;margin-top: 0.25rem;font-size: 87.5%;color: #ed5555;">
                                                <?= isset(session('_ci_validation_errors')['choicesproductshow']) ? session('_ci_validation_errors')['choicesproductshow'] : null; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="currentstock">Current Stock</label>
                                            <input id="currentstock" name="currentstock" placeholder="Enter Current Stock" type="number" class="form-control" value="<?= (old('currentstock')) ? (old('currentstock')) : $DataStock['pro_current_stock']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="minstock">Minimum Stock</label>
                                            <input id="minstock" name="minstock" placeholder="Enter Minimum Stock" type="number" class="form-control" value="<?= (old('minstock')) ? (old('minstock')) : $DataStock['pro_min_stock']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="maxstock">Maximum Stock</label>
                                            <input id="maxstock" name="maxstock" placeholder="Maximum Stock" type="number" class="form-control" value="<?= (old('maxstock')) ? (old('maxstock')) : $DataStock['pro_max_stock']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php if (in_groups('1') == true) : ?>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="basicprice">Basic Price</label>
                                                <input id="basicprice" name="basicprice" placeholder="Enter Basic Price" type="number" class="form-control <?= isset(session('_ci_validation_errors')['basicprice']) ? 'is-invalid' : '' ?>" value="<?= (old('basicprice')) ? (old('basicprice')) : $DataPrice['pro_price_basic']; ?>">
                                                <?php if (session('failed')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= isset(session('_ci_validation_errors')['basicprice']) ? session('_ci_validation_errors')['basicprice'] : null; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="resellerprice">Reseller Price</label>
                                                <input id="resellerprice" name="resellerprice" placeholder="Enter Reseller Price" type="number" class="form-control <?= isset(session('_ci_validation_errors')['resellerprice']) ? 'is-invalid' : '' ?>" value="<?= (old('resellerprice')) ? (old('resellerprice')) : $DataPrice['pro_price_reseler']; ?>">
                                                <?php if (session('failed')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= isset(session('_ci_validation_errors')['resellerprice']) ? session('_ci_validation_errors')['resellerprice'] : null; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="sellingprice">Selling Price</label>
                                                <input id="sellingprice" name="sellingprice" placeholder="Enter Selling Price" type="number" class="form-control <?= isset(session('_ci_validation_errors')['sellingprice']) ? 'is-invalid' : '' ?>" value="<?= (old('sellingprice')) ? (old('sellingprice')) : $DataPrice['pro_price_seller']; ?>">
                                                <?php if (session('failed')) : ?>
                                                    <div class="invalid-feedback">
                                                        <?= isset(session('_ci_validation_errors')['sellingprice']) ? session('_ci_validation_errors')['sellingprice'] : null; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label class="form-label" for="brandproduct">Brand Product</label>
                                            <input id="brandproduct" name="brandproduct" placeholder="Enter Brand Product" type="text" class="form-control" value="<?= (old('brandproduct')) ? (old('brandproduct')) : $DataProduct['pro_brand']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label class="form-label" for="spesification">Spesification</label>
                                            <input id="spesification" name="spesification" placeholder="Enter Spesification" type="text" class="form-control" value="<?= (old('spesification')) ? (old('spesification')) : $DataProduct['pro_spec']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="form-label" for="price">Bundling Product</label>
                                        <div class="mt-2">
                                            <!-- <input id="price" name="price" placeholder="Enter Price" type="text" class="form-control"> -->
                                            <input type="checkbox" id="switch" name="bundingproduct" switch="bool" <?= $DataProduct['pro_bundling'] == "1" ? "checked" : "" ?> value="<?= $DataProduct['pro_bundling']; ?>" />
                                            <label for="switch" data-on-label="Yes" data-off-label="No"></label>
                                        </div>
                                    </div>

                                </div>

                                <?php if ($DataProduct['pro_bundling'] == "1") : ?>
                                    <div class="row" id="row_bundling">
                                        <div id="div_tabel_bundling">
                                            <div class="mb-2" id="tbl_lpro_bundling">
                                                <div class="row mb-3">
                                                    <div class="table-responsive ">
                                                        <table id="listsalesproduct" class="table table-sm rounded rounded-3 overflow-hidden table-striped table-hover align-middle mb-0">
                                                            <thead class="table-info">
                                                                <tr>
                                                                    <th class="border-top-0" scope="col">Picture</th>
                                                                    <th class="border-top-0" scope="col">Product Name</th>
                                                                    <th class="border-top-0" scope="col">SKU No</th>
                                                                    <th class="border-top-0  text-center" scope="col"><i class="mdi mdi-apps"></i></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- '<tr id="R'+nextiprorow+'" class="listpro rowprosales '+sku+'">'+
                                                                    '<th scope="row"><img src="'+$(" #BaseUrl").val()+'assets/images/product/'+respone.results.image+'" alt="product-img" title="product-img" class="avatar-md"></th>'+
                                                                    '<td>'+
                                                                        '<input class="prorow" type="text" name="iprorow[]" value="'+nextiprorow+'" disabled hidden>'+
                                                                        '<h5 class="text-truncate mb-0"><a href="javascript: void(0);" class="font-size-14 text-dark">'+respone.results.name+'</a></h5>'+
                                                                        '<input name="bdl_proid[]" placeholder="Enter Brand Product" type="text" class="form-control" value="'+respone.results.proid+'" hidden>'+
                                                                        '<input name="bdl_proname[]" placeholder="Enter Brand Product" type="text" class="form-control" value="'+respone.results.name+'" disabled hidden>'+
                                                                        '</td>'+
                                                                    '<td>'+
                                                                        '<h5 class="text-truncate mb-0"><a href="javascript: void(0);" class="font-size-14 text-dark">'+sku+'</a></h5>'+
                                                                        '<input name="bdl_prosku[]" placeholder="Enter Brand Product" type="text" class="form-control" value="'+sku+'" hidden>'+
                                                                        '<input name="bdlbasicprice[]" placeholder="Enter Brand Product" type="number" class="form-control Bsp" value="'+respone.results.basicprice+'" hidden>'+
                                                                        '<input name="bdlpricereseler[]" placeholder="Enter Brand Product" type="number" class="form-control PRl" value="'+respone.results.reselerprice+'" hidden>'+
                                                                        '<input name="bdlpriceseller[]" placeholder="Enter Brand Product" type="number" class="form-control PSl" value="'+respone.results.sellerprice+'" hidden>'+
                                                                        '</td>'+
                                                                    '<td class="text-center"><button type="button" onclick="delProduct('+stringrow+')" class="btn btn-soft-danger waves-effect waves-light"><i class="mdi mdi-trash-can"></i></button></td>'+
                                                                    '</tr>' -->
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
                                <?php endif; ?>


                                <div class="mb-0">
                                    <label class="form-label" for="productdesc">Product Description</label>
                                    <textarea class="form-control" id="productdesc" name="productdesc" placeholder="Enter Description" rows="4"><?= (old('productdesc')) ? (old('productdesc')) : $DataProduct['pro_description']; ?></textarea>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-img-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">02</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Product Image</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <div class="row row-cols-1 row-cols-md-5 imagegroup">

                                    <?php if ($DataImage != null) {
                                        $a = 1;
                                        foreach ($DataImage as $img) {
                                            $i = $a++; ?>
                                            <div class="col imagecover p-1">
                                                <div class="card border-secondary h-100 text-center p-0 imagecard containerprd" style="border: dotted; margin:0px;">
                                                    <img src="<?= base_url() ?>assets/images/product/<?= $img['pro_image_name']; ?>" class="img-fluid rounded imageprd image-preview-image1 p-2 " style="aspect-ratio: 1/1;" alt="">
                                                    <small class="mt-2" hidden><label for="image<?= $i; ?>" class="form-label">Picture Product <?= $i; ?></label></small>
                                                    <input class="form-control form-control-sm" type="file" id="image<?= $i; ?>" name="image[]" onchange="previewImage('image<?= $i; ?>')" style="display:none;">
                                                </div>
                                            </div>
                                    <?php }
                                    } ?>

                                    <div class="col lastcol p-1">
                                        <div class="card h-100 btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
                                            <button type="button" onclick="imageRemove()" style="font-size:30px" class="btn btn-outline-danger waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Remove Picture">
                                                <i class="mdi mdi-image-remove align-middle"></i>
                                            </button>
                                            <button type="button" onclick="addCard()" style="font-size:30px" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Add New Picture">
                                                <i class="mdi mdi-image-plus align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <a href="#addproduct-metadata-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-haspopup="true" aria-controls="addproduct-metadata-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">03</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Meta Data</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <!-- <form> -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="metatitle">Meta Title</label>
                                            <input id="metatitle" name="metatitle" placeholder="Enter Title" type="text" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="metakeywords">Meta Keywords</label>
                                            <input id="metakeywords" name="metakeywords" placeholder="Enter Keywords" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <label class="form-label" for="metadescription">Meta Description</label>
                                    <textarea class="form-control" id="metadescription" placeholder="Enter Description" rows="4"></textarea>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row mb-4">
            <div class="col text-end">
                <a href="<?= base_url() ?>myproducts" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
                <!-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i class=" bx bx-file me-1"></i> Save </a> -->
                <!-- <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i class="bx bx-x me-1 align-middle"></i> Cancel</button> -->
                <button type="submit" class="btn btn-success"><i class="bx bx-check me-1 align-middle"></i> Submit</button>
            </div> <!-- end col -->
        </div> <!-- end row-->


    </form>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    function addCard() {
        const card = document.querySelectorAll('.imagecard').length + 1;
        var image = "'image" + card + "'";


        $(".lastcol").before(
            '<div class="col p-1 ancol">' +
            '<div class="card border-secondary h-100 text-center p-0 imagecard containerprd" style="border: dotted; margin:0px;">' +
            '<img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="img-fluid rounded imageprd image-preview-image' + card + ' p-2" style="aspect-ratio: 1/1;" alt="">' +
            '<small class="mt-2" hidden><label for="image' + card + '" class="form-label ">Picture Product ' + card + '</label></small>' +
            '<input class="form-control form-control-sm" type="file" id="image' + card + '" name="image[]" onchange="previewImage(' + image + ')" style="display:none;">' +
            '<div class="middle">' +
            '<button type="button" onclick=" clickImage(' + card + ')" class="btn btn-lg btn-soft-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Change Picture">' +
            '<i class="bx bx-edit font-size-16 align-middle"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>'
        );
        // console.log(image);

    }

    function clickImage(e) {
        console.log(e);
        $('#image' + e + '').trigger('click');
    }

    function previewImage(event) {
        console.log(event);
        const image = document.querySelector('#' + event + '');
        const imageLabel = document.querySelector('.' + event + '');
        const imgPreview = document.querySelector('.image-preview-' + event + '');

        const fileimg = new FileReader();
        fileimg.readAsDataURL(image.files[0]);
        console.log(fileimg)

        fileimg.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>