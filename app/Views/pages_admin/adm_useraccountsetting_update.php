<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Forms Steps</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="<?= base_url() ?>setting_account/update/<?= user()->id; ?>/<?= user()->member_id; ?>" method="post">
                        <?= csrf_field(); ?>
                        <ul class="wizard-nav">
                            <li class="wizard-list-item">
                                <div class="list-item active">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Account Information">
                                        <i class="bx bx-user-circle"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="wizard-list-item">
                                <div class="list-item">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Picture">
                                        <i class="bx bx-image-alt"></i>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!-- wizard-nav -->

                        <div class="wizard-tab" style="display: block;">
                            <div class="text-center mb-4">
                                <h5>Account Information</h5>
                                <p class="card-title-desc">Fill all information below</p>
                                <input type="hidden" class="form-control" name="user_id" value="<?= user()->id; ?>">
                                <input type="hidden" class="form-control" name="member_id" value="<?= user()->member_id; ?>">
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-username-input" class="form-label">User
                                                Name</label>
                                            <input type="text" class="form-control <?= isset(session('_ci_validation_errors')['username']) ? 'is-invalid' : '' ?>" name="username" value="<?= (old('username')) ? old('username') : user()->username; ?>" placeholder="Enter User Name" id="basicpill-username-input">
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['username']) ? session('_ci_validation_errors')['username'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-fullname-input" class="form-label">Full
                                                Name</label>
                                            <input type="text" class="form-control  <?= isset(session('_ci_validation_errors')['fullname']) ? 'is-invalid' : '' ?>" name="fullname" value="<?= (old('fullname')) ? old('fullname') : user()->fullname; ?>" placeholder="Enter Full Name" id="basicpill-fullname-input">
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['fullname']) ? session('_ci_validation_errors')['fullname'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-phone-input" class="form-label">Phone</label>
                                            <input type="text" class="form-control <?= isset(session('_ci_validation_errors')['phone']) ? 'is-invalid' : '' ?>" name="phone" value="<?= (old('phone')) ? old('phone') : user()->phone; ?>" placeholder="Enter Phone" id="basicpill-phone-input">
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['phone']) ? session('_ci_validation_errors')['phone'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input" class="form-label">Email</label>
                                            <input type="email" class="form-control <?= isset(session('_ci_validation_errors')['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= (old('email')) ? old('email') : user()->email; ?>" placeholder="Enter Email" id="basicpill-email-input">
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['email']) ? session('_ci_validation_errors')['email'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="basicpill-address-input" class="form-label">Address</label>
                                            <input type="text" id="basicpill-address-input" class="form-control <?= isset(session('_ci_validation_errors')['address']) ? 'is-invalid' : '' ?>" name="address" value="<?= (old('address')) ? old('address') : user()->address; ?>" placeholder="Enter Address"></input>
                                            <?php if (session('failed')) : ?>
                                                <div class="invalid-feedback">
                                                    <?= isset(session('_ci_validation_errors')['address']) ? session('_ci_validation_errors')['address'] : null; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div>

                        </div>
                        <!-- wizard-tab -->

                        <div class="wizard-tab">
                            <div>
                                <div class="text-center mb-4">
                                    <h5>Picture</h5>
                                    <p class="card-title-desc">Uploads Your Picture</p>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" class="form-label">PAN
                                                    Card</label>
                                                <input type="text" class="form-control" placeholder="Enter Pan Card" id="basicpill-pancard-input">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input" class="form-label">VAT/TIN No.</label>
                                                <input type="text" class="form-control" placeholder="Enter VAT/TIN No." id="basicpill-vatno-input">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input" class="form-label">CST
                                                    No.</label>
                                                <input type="text" class="form-control" placeholder="Enter CST No." id="basicpill-cstno-input">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-servicetax-input" class="form-label">Service Tax No.</label>
                                                <input type="text" class="form-control" placeholder="Enter Service Tax No." id="basicpill-servicetax-input">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-companyuin-input" class="form-label">Company UIN</label>
                                                <input type="text" class="form-control" placeholder="Enter Company UIN" id="basicpill-companyuin-input">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-declaration-input" class="form-label">Declaration</label>
                                                <input type="text" class="form-control" placeholder="Enter Declaration" id="basicpill-declaration-input">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row-->
                                </div><!-- end form -->
                            </div>
                        </div>
                        <!-- wizard-tab -->


                        <!-- wizard-tab -->

                        <div class="d-flex align-items-start gap-3 mt-4">
                            <a href="<?= base_url() ?>/setting_account" id="cancelBtn" class="btn btn-danger w-sm" style="display: none;">Cancel</a>
                            <button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)" style="display: none;">Previous</button>
                            <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            <button type="submit" class="btn btn-primary w-sm ms-auto" id="submitBtn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->




</div>



<?= $this->endSection(); ?>