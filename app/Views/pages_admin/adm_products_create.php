<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid">

    <form id="productinfo" action="<?= base_url() ?>saveproduct" method="POST" enctype="multipart/form-data">
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
                                            <input id="new_id" name="pro_id" type="text" class="form-control" hidden>
                                            <label class="form-label" for="productname">Product Name</label>
                                            <input id="productname" name="productname" placeholder="Enter Product Name" type="text" class="form-control <?= isset(session('_ci_validation_errors')['productname']) ? 'is-invalid' : '' ?>" value="<?= (old('productname')); ?>">
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
                                            <input id="productmodel" name="productmodel" placeholder="Enter Product Model" type="text" class="form-control <?= isset(session('_ci_validation_errors')['productmodel']) ? 'is-invalid' : '' ?>" value="<?= (old('productmodel')); ?>">
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
                                            <input id="skunumber" name="skunumber" placeholder="Enter SKU No." type="text" class="form-control <?= isset(session('_ci_validation_errors')['skunumber']) ? 'is-invalid' : '' ?>" value="<?= (old('skunumber')); ?>">
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
                                                    <option selected disabled value="">Choose...</option>
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
                                                    <option selected disabled value="">Choose...</option>
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
                                                    <option selected disabled value="">Choose...</option>
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
                                            <input id="currentstock" name="currentstock" placeholder="Enter Current Stock" type="number" class="form-control" value="<?= (old('currentstock')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="minstock">Minimum Stock</label>
                                            <input id="minstock" name="minstock" placeholder="Enter Minimum Stock" type="number" class="form-control" value="<?= (old('minstock')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="maxstock">Maximum Stock</label>
                                            <input id="maxstock" name="maxstock" placeholder="Maximum Stock" type="number" class="form-control" value="<?= (old('maxstock')); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="basicprice">Basic Price</label>
                                            <input id="basicprice" name="basicprice" placeholder="Enter Basic Price" type="number" class="form-control <?= isset(session('_ci_validation_errors')['basicprice']) ? 'is-invalid' : '' ?>" value="<?= (old('basicprice')); ?>">
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
                                            <input id="resellerprice" name="resellerprice" placeholder="Enter Reseller Price" type="number" class="form-control <?= isset(session('_ci_validation_errors')['resellerprice']) ? 'is-invalid' : '' ?>" value="<?= (old('resellerprice')); ?>">
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
                                            <input id="sellingprice" name="sellingprice" placeholder="Enter Selling Price" type="number" class="form-control <?= isset(session('_ci_validation_errors')['sellingprice']) ? 'is-invalid' : '' ?>" value="<?= (old('sellingprice')); ?>">
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['sellingprice']) ? session('_ci_validation_errors')['sellingprice'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label class="form-label" for="brandproduct">Brand Product</label>
                                            <input id="brandproduct" name="brandproduct" placeholder="Enter Brand Product" type="text" class="form-control" value="<?= (old('brandproduct')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label class="form-label" for="spesification">Spesification</label>
                                            <input id="spesification" name="spesification" placeholder="Enter Spesification" type="text" class="form-control" value="<?= (old('spesification')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label" for="price">Bundling Product</label>
                                        <div class="mt-2">
                                            <!-- <input id="price" name="price" placeholder="Enter Price" type="text" class="form-control"> -->
                                            <input type="checkbox" id="switch" name="bundingproduct" switch="bool" checked value="1" />
                                            <label for="switch" data-on-label="Yes" data-off-label="No"></label>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-0">
                                    <label class="form-label" for="productdesc">Product Description</label>
                                    <textarea class="form-control" id="productdesc" name="productdesc" placeholder="Enter Description" rows="4"></textarea>
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
                                <!-- <form action="#" class="dropzone"> -->
                                <!-- <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                                </div> -->
                                <!-- </form> -->


                                <div class="row row-cols-1 row-cols-md-5">
                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-body h-100">
                                                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="card-img-top image-preview-propic1" alt="">
                                            </div>
                                            <div class="card-footer" style="padding: 2px;">
                                                <label for="propic1" class="form-label">Cover Image</label>
                                                <input class="form-control form-control-sm" type="file" id="propic1" name="propic[]" onchange="previewImage('propic1')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-body h-100">
                                                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="card-img-top image-preview-propic2" alt="">
                                            </div>
                                            <div class="card-footer" style="padding: 2px;">
                                                <label for="propic2" class="form-label">Cover Image</label>
                                                <input class="form-control file-control-sm" type="file" id="propic2" name="propic[]" onchange="previewImage('propic2')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-body h-100">
                                                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="card-img-top image-preview-propic3" alt="">
                                            </div>
                                            <div class="card-footer" style="padding: 2px;">
                                                <label for="propic3" class="form-label">Cover Image</label>
                                                <input class="form-control file-control-sm" type="file" id="propic3" name="propic[]" onchange="previewImage('propic3')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-body h-100">
                                                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="card-img-top image-preview-propic4" alt="">
                                            </div>
                                            <div class="card-footer" style="padding: 2px;">
                                                <label for="propic4" class="form-label">Cover Image</label>
                                                <input class="form-control file-control-sm" type="file" id="propic4" name="propic[]" onchange="previewImage('propic4')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-body h-100">
                                                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="card-img-top image-preview-propic5" alt="">
                                            </div>
                                            <div class="card-footer" style="padding: 2px;">
                                                <label for="propic5" class="form-label">Cover Image</label>
                                                <input class="form-control file-control-sm" type="file" id="propic5" name="propic[]" onchange="previewImage('propic5')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div>
                                    <label for="propic1" class="form-label">Cover Image</label>
                                    <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="img-thumbnail image-preview-propic1" alt="" style="width: 100px; height: 100px;">
                                    <div class="col-sm-10">
                                        <input class="form-control file-input mt-3" type="file" id="propic1" name="propic[]" onchange="previewImage('propic1')" multiple>
                                    </div>
                                </div> -->
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
                <!-- <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a> -->
                <!-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i class=" bx bx-file me-1"></i> Save </a> -->
                <!-- <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i class="bx bx-x me-1 align-middle"></i> Cancel</button> -->
                <button type="submit" class="btn btn-success"><i class="bx bx-check me-1 align-middle"></i> Submit</button>
            </div> <!-- end col -->
        </div> <!-- end row-->


    </form>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    function previewImage(event) {
        console.log(event);
        const image = document.querySelector('#' + event + '');
        const imageLabel = document.querySelector('.' + event + '');
        const imgPreview = document.querySelector('.image-preview-' + event + '');

        // imageLabel.textContent = image.files[0].name

        const fileimg = new FileReader();
        fileimg.readAsDataURL(image.files[0]);

        fileimg.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    function generateUUID() {
        var d = new Date().getTime();
        var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0;
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16;
            if (d > 0) {
                r = (d + r) % 16 | 0;
                d = Math.floor(d / 16);
            } else {
                r = (d2 + r) % 16 | 0;
                d2 = Math.floor(d2 / 16);
            }
            return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
    }

    $(document).ready(function() {
        var string = generateUUID().replace("-", "").substring(0, 8);
        $('#new_id').val(string.toUpperCase());
    });

    // $("#submit").on('click', '#productinfo', function() {
    //     console.log('submit');
    // })

    // function formSubmit() {
    //     // console.log($("#productinfo").html(data));
    //     // $("#productinfo").serialize() // returns all the data in your form
    //     $.ajax({
    //         url: '<?= base_url() ?>saveproduct',
    //         type: 'POST',
    //         contentType: 'application/x-www-form-urlencoded',
    //         data: $("#productinfo").serialize(),
    //         success: function(data, textStatus, jqXHR) {
    //             console.info(data);
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             var errorMessage = jqXHR.responseText;
    //             if (errorMessage.length > 0) {
    //                 alert(errorMessage);
    //             }
    //         }
    //     });
    //     // $.ajax({
    //     //     type: "POST",
    //     //     url: 'your url',
    //     //     data: $("#registerSubmit").serialize(),
    //     //     success: function() {
    //     //         //success message mybe...
    //     //     }
    //     // });

    // }



    // $("productinfo").on("submit", function(event) {
    //     event.preventDefault();
    //     console.log($(this).serialize());
    // });
</script>

<!-- <script>
    function formSubmit() {
        if ($("#productinfo").length > 0) {
            $("#productinfo").validate({

                rules: {
                    productname: {
                        required: true,
                        maxlength: 50
                    },
                },
                messages: {
                    productname: {
                        required: "Please enter your name",
                        maxlength: "Name length should be 50 characters long."
                    },
                },
                submitHandler: function(form) {
                    $('.response-message').removeClass('d-none');
                    $('#submit-btn').html('Sending..');
                    $.ajax({
                        url: "<?= base_url() ?>saveproduct'",
                        type: "POST",
                        contentType: 'application/x-www-form-urlencoded',
                        data: $("#productinfo").serialize(),
                        dataType: "json",
                        success: function(response) {
                            $('#submit-btn').html('Submit');
                            $('.response-message').html(response?.message);
                            response?.status === 'success' && $('.response-message').addClass('text-success') || $('.response-message').addClass('text-danger');
                            $('.response-message').show();
                            $('.response-message').removeClass('d-none');

                            document.getElementById("registrationForm").reset();
                            setTimeout(function() {
                                $('.response-message').hide();
                            }, 5000);
                        }
                    });
                }
            })
        }
    }
</script> -->

<?= $this->endSection(); ?>