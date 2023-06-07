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
                            <div class="row">
                                <div class="d-flex align-items-start">
                                    <h5 class="font-size-16">MyShop Summary</h5>
                                    <?php if ($datashop != null) : ?>
                                        <button type="button" class="btn btn-success btn-sm w-sm ms-auto waves-effect waves-light" onclick="onClick()" data-bs-toggle="modal" data-bs-target=".add-new"><i class="mdi mdi-plus me-1"></i> Add New Shop</button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-4">
                                <?php if ($datashop != null) { ?>
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
                                                <form action="<?= base_url() ?>setting_account/change_status_shop/<?= user()->member_id; ?>" method="post">
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
                                                                <div class="d-flex flex-wrap gap-2">
                                                                    <form action="<?= base_url() ?>setting_account/change_status_shop/<?= $shop['id_shop']; ?>" method="post">
                                                                        <?= csrf_field(); ?>
                                                                        <input type="checkbox" id="switch<?= $shop['id_shop']; ?>" switch="bool" <?= $shop['active'] == 1 ? 'checked' : null ?> value="<?= $shop['active']; ?>">
                                                                        <label for="switch<?= $shop['id_shop']; ?>" data-on-label="ON" data-off-label="OFF"></label>
                                                                        <button type="submit" id="swts<?= $shop['id_shop']; ?>" class="btn btn-success" style="display: none;"><i class=" bx bx-check me-1 align-middle"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-2 text-primary" data-bs-toggle="modal" data-bs-target=".add-edit" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bx-pencil font-size-18"></i></a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-2 text-danger" data-bs-original-title="Delete" aria-label="Delete"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } else { ?>
                                    <div class="card-body overflow-hidden position-relative">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                        <i class="bx bx-question-mark"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="font-size-17">Do you want to make a shop?</h5>
                                                <p class="text-muted mt-2 mb-0"> You can make more than one, focus and enjoy.</p>

                                                <div class="mt-3 pt-1">
                                                    <button type="button" class="btn btn-success btn-sm w-sm ms-auto waves-effect waves-light" onclick="onClick()" data-bs-toggle="modal" data-bs-target=".add-new">Create Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }  ?>
                                <!-- end card body -->
                            </div>


                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="card">
                        <div class="card-body">

                            <div class="text-center">

                                <div class="row justify-content-center mt-5">
                                    <div class="col-sm-6">
                                        <div class="maintenance-img">
                                            <img src="http://localhost/app.qearaf-v4/public/assets/images/coming-soon.png" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-5">Message page is coming soon</h4>
                                <p class="text-muted">Look forward to its presence, and in the meantime visit another page.</p>

                                <div class="row justify-content-center mt-5">
                                    <div class="col-md-9">
                                        <div id="countdown" class="countdownlist"></div>
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="post" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">

                                <div class="row justify-content-center mt-5">
                                    <div class="col-sm-6">
                                        <div class="maintenance-img">
                                            <img src="http://localhost/app.qearaf-v4/public/assets/images/coming-soon.png" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-5">Post page is coming soon</h4>
                                <p class="text-muted">Look forward to its presence, and in the meantime visit another page.</p>

                                <div class="row justify-content-center mt-5">
                                    <div class="col-md-9">
                                        <div id="countdown" class="countdownlist"></div>
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

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
            <?= csrf_field(); ?>
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
    <div class="modal fade add-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <form action="<?= base_url() ?>setting_account/changeshop/<?= user()->member_id; ?>" method="post">
            <?= csrf_field(); ?>
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

    var onClick = function() {
        $('#new_id').val(generateUUID().replace("-", "").substring(0, 8));
    }

    $('#switch3').click(function() {
        var check = $("#switch3").prop("checked")
        var check = $(this).val();
        if (check == 0) {
            $("#switch3").val(1);
            console.log('Ganti 1')
        } else {
            $("#switch3").val(0);
            console.log('Ganti 0')
        }
    });
</script>

<?= $this->endSection(); ?>