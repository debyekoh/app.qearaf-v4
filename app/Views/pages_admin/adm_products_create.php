<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<!-- <div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
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
        </div>
    </div>

</div> -->

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div id="addproduct-accordion" class="custom-accordion">
                <div class="card">
                    <a href="#addproduct-productinfo-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="addproduct-productinfo-collapse">
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

                    <div id="addproduct-productinfo-collapse" class="collapse" data-bs-parent="#addproduct-accordion" style="">
                        <div class="p-4 border-top">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="productname">Product Name</label>
                                    <input id="productname" name="productname" placeholder="Enter Product Name" type="text" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturername">Manufacturer Name</label>
                                            <input id="manufacturername" name="manufacturername" placeholder="Enter Manufacturer Name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturerbrand">Manufacturer Brand</label>
                                            <input id="manufacturerbrand" name="manufacturerbrand" placeholder="Enter Manufacturer Brand" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="price">Price</label>
                                            <input id="price" name="price" placeholder="Enter Price" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label">Category</label>
                                            <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                <div class="choices__inner"><select class="form-control choices__input" data-trigger="" name="choices-single-category" id="choices-single-category" hidden="" tabindex="-1" data-choice="active">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__placeholder choices__item--selectable" data-item="" data-id="1" data-value="" data-custom-properties="null" aria-selected="true">Select</div>
                                                    </div>
                                                </div>
                                                <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="Select" placeholder="This is a search placeholder">
                                                    <div class="choices__list" role="listbox">
                                                        <div id="choices--choices-single-category-item-choice-4" class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted" role="option" data-choice="" data-id="4" data-value="" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Select</div>
                                                        <div id="choices--choices-single-category-item-choice-1" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="1" data-value="EL" data-select-text="Press to select" data-choice-selectable="">Electronic</div>
                                                        <div id="choices--choices-single-category-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="FA" data-select-text="Press to select" data-choice-selectable="">Fashion</div>
                                                        <div id="choices--choices-single-category-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="FI" data-select-text="Press to select" data-choice-selectable="">Fitness</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="choices-single-specifications" class="form-label">Specifications</label>
                                            <div class="choices" data-type="select-one" tabindex="0" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false">
                                                <div class="choices__inner"><select class="form-control choices__input" data-trigger="" name="choices-single-category" id="choices-single-specifications" hidden="" tabindex="-1" data-choice="active">
                                                        <option value="LE">Leather</option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="LE" data-custom-properties="null" aria-selected="true">Leather</div>
                                                    </div>
                                                </div>
                                                <div class="choices__list choices__list--dropdown" aria-expanded="false"><input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" aria-label="false" placeholder="This is a search placeholder">
                                                    <div class="choices__list" role="listbox">
                                                        <div id="choices--choices-single-specifications-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="DI" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Different Color</div>
                                                        <div id="choices--choices-single-specifications-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="HI" data-select-text="Press to select" data-choice-selectable="">High Quality</div>
                                                        <div id="choices--choices-single-specifications-item-choice-3" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="3" data-value="LE" data-select-text="Press to select" data-choice-selectable="">Leather</div>
                                                        <div id="choices--choices-single-specifications-item-choice-4" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="4" data-value="NO" data-select-text="Press to select" data-choice-selectable="">Notifications</div>
                                                        <div id="choices--choices-single-specifications-item-choice-5" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="5" data-value="SI" data-select-text="Press to select" data-choice-selectable="">Sizes</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <label class="form-label" for="productdesc">Product Description</label>
                                    <textarea class="form-control" id="productdesc" placeholder="Enter Description" rows="4"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-controls="addproduct-img-collapse">
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Dropzone File Upload</h4>
                                <p class="sub-header">
                                    DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                                </p>

                                <form action="/" method="post" class="dropzone dz-clickable" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">


                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                            <strong>not</strong> actually uploaded.)</span>
                                    </div>
                                </form>

                                <!-- Preview -->
                                <div class="dropzone-previews mt-3" id="file-previews">
                                </div>

                            </div> <!-- end card-body-->
                        </div>
                    </div>
                </div>

                <div class="card">
                    <a href="#addproduct-metadata-collapse" class="text-dark collapsed" data-bs-toggle="collapse" aria-haspopup="true" aria-expanded="false" aria-controls="addproduct-metadata-collapse">
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
                            <form>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row mb-4">
        <div class="col text-end">
            <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i class=" bx bx-file me-1"></i> Save </a>
        </div> <!-- end col -->
    </div> <!-- end row-->




</div>

<?= $this->endSection(); ?>