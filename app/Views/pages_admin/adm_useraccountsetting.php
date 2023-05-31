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
                            <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xl rounded-circle img-thumbnail">

                            <div class="mt-3">
                                <h5 class="mb-1">Martin Gurley</h5>
                                <p class="text-muted mb-0">
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star text-warning font-size-14"></i>
                                    <i class="bx bxs-star-half text-warning font-size-14"></i>
                                </p>
                            </div>

                        </div>

                        <div class="table-responsive mt-3 border-bottom pb-3">
                            <table class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">
                                            City :</th>
                                        <td class="text-muted">New Your City</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th class="fw-bold">
                                            State :</th>
                                        <td class="text-muted">New Your</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th class="fw-bold">
                                            Country :</th>
                                        <td class="text-muted">USA</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th class="fw-bold">Pin Code :</th>
                                        <td class="text-muted">0005485</td>
                                    </tr>
                                    <!-- end tr -->

                                    <tr>
                                        <th class="fw-bold">Phone :</th>
                                        <td class="text-muted">+214 5632564</td>
                                    </tr>
                                    <!-- end tr -->

                                    <tr>
                                        <th class="fw-bold">Email :</th>
                                        <td class="text-muted">martingurley52@gmail.com</td>
                                    </tr>
                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table>
                        </div>



                        <div class="p-3 mt-3">
                            <div class="row text-center">
                                <div class="col-6 border-end">
                                    <div class="p-1">
                                        <h5 class="mb-1">1,269</h5>
                                        <p class="text-muted mb-0">Products</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-1">
                                        <h5 class="mb-1">5.2k</h5>
                                        <p class="text-muted mb-0">Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 text-center border-bottom pb-4">
                            <a href="" class="btn btn-primary waves-effect waves-light btn-sm">Send Message <i class="bx bx-send ms-1 align-middle"></i></a>
                        </div>

                        <div class="mt-3 pt-1 text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                        <i class="bx bxl-google"></i>
                                    </a>
                                </li>
                            </ul>
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
                            <h5 class="font-size-16 mb-3">Summary</h5>
                            <div class="mt-3">
                                <p class="font-size-15 mb-1">Hi my name is Jennifer Bennett.</p>
                                <p class="font-size-15">I'm the Co-founder and Head of Design at Company agency.</p>

                                <p class="text-muted">Been the industry's standard dummy text To an English person.
                                    Our team collaborators and clients to achieve cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences debitis aut rerum necessitatibus saepe eveniet ut et voluptates laborum growth.</p>

                                <h5 class="font-size-15">Experience :</h5>
                                <div class="row">
                                    <div class="col-4">
                                        <ul class="list-unstyled mb-0 pt-1">
                                            <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae libero venenatis faucibus</li>
                                            <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                            <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                        </ul>
                                    </div>

                                    <div class="col">
                                        <ul class="list-unstyled mb-0 pt-1">
                                            <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec vitae libero venenatis faucibus</li>
                                            <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque rutrum aenean imperdiet</li>
                                            <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer ante a consectetuer eget</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 class="font-size-16 mb-4">Projects</h5>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-hover mb-1">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Projects</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Budget</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" style="width: 120px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">01</th>
                                                <td><a href="#" class="text-dark">Brand Logo Design</a></td>
                                                <td>
                                                    18 Jun, 2021
                                                </td>
                                                <td>
                                                    $523
                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-primary font-size-12">Open</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">02</th>
                                                <td><a href="#" class="text-dark">Chat app Design</a></td>
                                                <td>
                                                    28 May, 2021
                                                </td>
                                                <td>
                                                    $356
                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-success font-size-12">Complete</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">03</th>
                                                <td><a href="#" class="text-dark">Minible Landing</a></td>
                                                <td>
                                                    13 May, 2021
                                                </td>
                                                <td>
                                                    $425
                                                </td>
                                                <td>
                                                    <span class="badge badge-soft-success font-size-12">Complete</span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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







</div>

<?= $this->endSection(); ?>