<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="user-profile-img">
                        <img src="assets/images/pattern-bg.jpg" class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                        <div class="overlay-content rounded-top">
                            <div>
                                <div class="user-nav p-3">
                                    <div class="d-flex justify-content-end">
                                        <!-- <button type="button" class="btn btn-light waves-effect waves-light position-relative p-0 avatar-sm rounded-circle">
                                            <span class="avatar-title bg-transparent text-reset">
                                                <i class="bx bx-pencil font-size-18"></i>
                                            </span>
                                        </button>
                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm"><i class="bx bx-pencil font-size-18"></i></a> -->
                                        <a href="<?= base_url() ?>setting_account/change" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-1 btn btn-light waves-effect waves-light position-relative p-1 avatar-sm rounded-circle" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bx-edit font-size-24"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end user-profile-img -->


                    <div class="p-4 pt-0">

                        <div class="mt-n5 position-relative text-center border-bottom pb-3">
                            <img src="<?= base_url() ?>assets/images/users/<?= user()->user_image; ?>" alt="avatar.<?= user()->username; ?>" class="avatar-xl rounded-circle img-thumbnail">

                            <div class="mt-3">
                                <h5 class="mb-1"><?= user()->fullname; ?></h5>
                                <!-- <p class="text-muted mb-0">
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star-half text-warning font-size-14"></i>
                                </p> -->
                            </div>

                        </div>

                        <div class="table-responsive mt-3 border-bottom pb-3">
                            <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">
                                            Account ID</th>
                                        <th class="fw-bold">:</th>
                                        <td class="text-muted"><?= user()->member_id; ?></td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th class="fw-bold">
                                            Username :</th>
                                        <th class="fw-bold">:</th>
                                        <td class="text-muted"><?= user()->username; ?></td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th class="fw-bold">
                                            Email :</th>
                                        <th class="fw-bold">:</th>
                                        <td class="text-muted"><?= user()->email; ?></td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th class="fw-bold">Phone :</th>
                                        <th class="fw-bold">:</th>
                                        <td class="text-muted"><?= user()->phone; ?></td>
                                    </tr>
                                    <!-- end tr -->

                                    <tr>
                                        <th class="fw-bold">Address :</th>
                                        <th class="fw-bold">:</th>
                                        <td class="text-muted"><?= user()->address; ?></td>
                                    </tr>
                                    <!-- end tr -->

                                </tbody><!-- end tbody -->
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                                <span>Overview</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                <span>Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#post" role="tab">
                                <span>Post</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <!-- <div class="d-flex align-self-end">
                                <div class="mt-3 mt-md-0 mb-3">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInvoiceModal"><i class="mdi mdi-plus me-1"></i> Add Invoice</button>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="d-flex align-items-start">
                                    <h5 class="font-size-16">MyShop Summary</h5>
                                    <button type="button" class="btn btn-success btn-sm w-sm ms-auto waves-effect waves-light" onclick="onClick()" data-bs-toggle="modal" data-bs-target=".add-new"><i class="mdi mdi-plus me-1"></i> Add New Shop</button>
                                    <!-- <button type="button" class="btn btn-secondary btn-sm ms-auto waves-effect waves-light">Small button</button> -->
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-hover mb-1">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Shop</th>
                                                <th scope="col">Marketplace</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" style="width: 120px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($datashop as $shop) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><a href="#" class="text-dark"><?= $shop['name_shop']; ?></a></td>
                                                    <td>
                                                        <?= $shop['marketplace']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $shop['address_shop']; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($shop['name_shop'] == 1) { ?>
                                                            <span class="badge badge-soft-primary font-size-12">Active</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-soft-danger font-size-12">Off</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-2 text-primary" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bx-pencil font-size-18"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-2 text-danger" data-bs-original-title="Delete" aria-label="Delete"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="card">
                        <div class="card-body">

                            <div class="py-2">

                                <div class="mx-n4 px-4" data-simplebar="init" style="max-height: 360px;">
                                    <div class="simplebar-wrapper" style="margin: 0px -24px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px 24px;">
                                                        <div class="border-bottom pb-3">
                                                            <p class="float-sm-end text-muted font-size-13">12 July, 2021</p>
                                                            <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.1</div>
                                                            <p class="text-muted mb-4">Maecenas non vestibulum ante, nec efficitur orci. Duis eu ornare mi, quis bibendum quam. Etiam imperdiet aliquam purus sit amet rhoncus. Vestibulum pretium consectetur leo, in mattis ipsum sollicitudin eget. Pellentesque vel mi tortor.
                                                                Nullam vitae maximus dui dolor sit amet, consectetur adipiscing elit.</p>
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex">
                                                                        <img src="assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle" alt="">
                                                                        <div class="flex-1 ms-2 ps-1">
                                                                            <h5 class="font-size-15 mb-0">Samuel</h5>
                                                                            <p class="text-muted mb-0 mt-1">65 Followers, 86 Reviews</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex-shrink-0">
                                                                    <ul class="list-inline product-review-link mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a href="#"><i class="bx bx-like"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="#"><i class="bx bx-comment-dots"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="border-bottom py-3">
                                                            <p class="float-sm-end text-muted font-size-13">06 July, 2021</p>
                                                            <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.0</div>
                                                            <p class="text-muted mb-4">Cras ac condimentum velit. Quisque vitae elit auctor quam egestas congue. Duis eget lorem fringilla, ultrices justo consequat, gravida lorem. Maecenas orci enim, sodales id condimentum et, nisl arcu aliquam velit,
                                                                sit amet vehicula turpis metus cursus dolor cursus eget dui.</p>
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex">
                                                                        <img src="assets/images/users/avatar-3.jpg" class="avatar-sm rounded-circle" alt="">
                                                                        <div class="flex-1 ms-2 ps-1">
                                                                            <h5 class="font-size-15 mb-0">Joseph</h5>
                                                                            <p class="text-muted mb-0 mt-1">85 Followers, 102 Reviews</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex-shrink-0">
                                                                    <ul class="list-inline product-review-link mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a href="#"><i class="bx bx-like"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="#"><i class="bx bx-comment-dots"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="pt-3">
                                                            <p class="float-sm-end text-muted font-size-13">26 June, 2021</p>
                                                            <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.2</div>
                                                            <p class="text-muted mb-4">Aliquam sit amet eros eleifend, tristique ante sit amet, eleifend arcu. Cras ut diam quam. Fusce quis diam eu augue semper ullamcorper vitae sed massa. Mauris lacinia, massa a feugiat mattis, leo massa porta eros, sed congue arcu sem nec orci.
                                                                In ac consectetur augue. Nullam pulvinar risus non augue tincidunt blandit.</p>
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-grow-1">
                                                                    <div class="d-flex">
                                                                        <img src="assets/images/users/avatar-6.jpg" class="avatar-sm rounded-circle" alt="">
                                                                        <div class="flex-1 ms-2 ps-1">
                                                                            <h5 class="font-size-15 mb-0">Paul</h5>
                                                                            <p class="text-muted mb-0 mt-1">27 Followers, 66 Reviews</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex-shrink-0">
                                                                    <ul class="list-inline product-review-link mb-0">
                                                                        <li class="list-inline-item">
                                                                            <a href="#"><i class="bx bx-like"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="#"><i class="bx bx-comment-dots"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <div class="border rounded mt-4">
                                        <form action="#">
                                            <div class="px-2 py-1 bg-light">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-sm btn-link text-dark text-decoration-none"><i class="bx bx-link"></i></button>
                                                    <button type="button" class="btn btn-sm btn-link text-dark text-decoration-none"><i class="bx bx-smile"></i></button>
                                                    <button type="button" class="btn btn-sm btn-link text-dark text-decoration-none"><i class="bx bx-at"></i></button>
                                                </div>
                                            </div>
                                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your Message..."></textarea>
                                        </form>
                                    </div>

                                    <div class="text-end mt-3">
                                        <button type="button" class="btn btn-success w-sm text-truncate ms-2"> Send <i class="bx bx-send ms-2 align-middle"></i></button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="post" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="mx-n3 px-3" data-simplebar="init" style="max-height: 580px;">
                                <div class="simplebar-wrapper" style="margin: 0px -16px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px 16px;">
                                                    <div class="blog-post">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-3">
                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                                                            </div>
                                                            <div class="flex-1">
                                                                <h5 class="font-size-16 text-truncate mb-1"><a href="#" class="text-dark">Richard Johnson</a></h5>
                                                                <p class="font-size-13 text-muted mb-0">24 Mar, 2021</p>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <p class="text-muted">Aenean ornare mauris velit. Donec imperdiet, massa sit amet porta maximus, massa justo faucibus nisi,
                                                                eget accumsan nunc ipsum nec lacus. Etiam dignissim turpis sit amet lectus porttitor eleifend. Maecenas ornare molestie metus eget feugiat.
                                                                Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

                                                        </div>
                                                        <div class="position-relative mt-3">
                                                            <img src="assets/images/post-1.jpg" alt="" class="img-thumbnail">
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                                                                <div>
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item me-3">
                                                                            <a href="javascript: void(0);" class="text-muted">
                                                                                <i class="bx bx-purchase-tag-alt text-muted me-1"></i> Project
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item me-3">
                                                                            <a href="javascript: void(0);" class="text-muted">
                                                                                <i class="bx bx-like align-middle text-muted me-1"></i> 12 Like
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item">
                                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                                                                                </a>
                                                                            </div>
                                                                            <div class="avatar-group-item">
                                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="ms-2">
                                                                            <button type="button" class="btn btn-outline-primary btn-sm waves-effect">Share <i class="bx bx-share-alt align-middle ms-1"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end blog post -->

                                                    <div class="blog-post mt-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="me-3">
                                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
                                                            </div>
                                                            <div class="flex-1">
                                                                <h5 class="font-size-16 text-truncate mb-1"><a href="#" class="text-dark">James Delgado</a></h5>
                                                                <p class="font-size-13 text-muted mb-0">29 July, 2021</p>
                                                            </div>
                                                        </div>
                                                        <div class="pt-3">
                                                            <p class="text-muted">Aenean ornare mauris velit. Donec imperdiet, massa sit amet porta maximus, massa justo faucibus nisi,
                                                                eget accumsan nunc ipsum nec lacus. Etiam dignissim turpis sit amet lectus porttitor eleifend. Maecenas ornare molestie metus eget feugiat.
                                                                Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>

                                                        </div>
                                                        <div class="position-relative mt-3">
                                                            <img src="assets/images/post-2.jpg" alt="" class="img-thumbnail">
                                                        </div>
                                                        <div class="pt-3">
                                                            <div class="d-flex align-items-center justify-content-between border-bottom pb-3">
                                                                <div>
                                                                    <ul class="list-inline mb-0">
                                                                        <li class="list-inline-item me-3">
                                                                            <a href="javascript: void(0);" class="text-muted">
                                                                                <i class="bx bx-purchase-tag-alt text-muted me-1"></i> Project
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item me-3">
                                                                            <a href="javascript: void(0);" class="text-muted">
                                                                                <i class="bx bx-like align-middle text-muted me-1"></i> 12 Like
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-group">
                                                                            <div class="avatar-group-item">
                                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                                                                                </a>
                                                                            </div>
                                                                            <div class="avatar-group-item">
                                                                                <a href="javascript: void(0);" class="d-inline-block">
                                                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-sm">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="ms-2">
                                                                            <button type="button" class="btn btn-outline-primary btn-sm waves-effect">Share <i class="bx bx-share-alt align-middle ms-1"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end blog post -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                            </div>

                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- end row -->

    <!--  Extra Large modal example -->
    <div class="modal fade add-new" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <form action="<?= base_url() ?>setting_account/addshop/<?= user()->member_id; ?>" method="post">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Add New Shop</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="new_id" name="id_shop">
                                    <input type="hidden" class="form-control" name="member_id" value="<?= user()->member_id; ?>">
                                    <label class="form-label">Shop Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Shop Name" name="name_shop" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Marketplace</label>
                                    <select class="form-select" name="marketplace">
                                        <option selected>Select Marketplace</option>
                                        <option>Lazada</option>
                                        <option>Shopee</option>
                                        <option>Tokopedia</option>
                                        <option>Dropshiper</option>
                                        <option>Reseller</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address Shop</label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="address_shop" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i class="bx bx-x me-1 align-middle"></i> Cancel</button>
                                <button type="submit" class="btn btn-success"><i class="bx bx-check me-1 align-middle"></i> Submit</button>
                            </div>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </form>
    </div><!-- /.modal -->






</div>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

<script>
    function generateUUID() { // Public Domain/MIT
        var d = new Date().getTime(); //Timestamp
        var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0; //Time in microseconds since page-load or 0 if unsupported
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16; //random number between 0 and 16
            if (d > 0) { //Use timestamp until depleted
                r = (d + r) % 16 | 0;
                d = Math.floor(d / 16);
            } else { //Use microseconds since page-load if supported
                r = (d2 + r) % 16 | 0;
                d2 = Math.floor(d2 / 16);
            }
            return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
    }

    var onClick = function() {
        // document.getElementById('new_user_id').textContent = generateUUID().replace("-","").substring(0,8);
        // document.getElementById('new_user_id').val(generateUUID().replace("-","").substring(0,8));
        $('#new_id').val(generateUUID().replace("-", "").substring(0, 8));
        // $('#new_image_name_user').val(data.file_name);
    }
    // onClick();
</script>

<?= $this->endSection(); ?>