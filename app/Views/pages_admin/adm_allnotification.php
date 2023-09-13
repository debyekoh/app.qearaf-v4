<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">
    <!-- <div class="row d-block d-sm-none"> -->
    <!-- <div class="row d-none d-sm-block"> -->

    <div class="row d-block d-sm-none">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-2">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light font-size-8">
                            <a class="nav-link font-size-10 px-0 active" data-bs-toggle="tab" href="#sales-1" role="tab">
                                <span>Sales</span>
                            </a>
                        </li>
                        <li class=" nav-item waves-effect waves-light">
                            <a class="nav-link font-size-10 px-0 " data-bs-toggle="tab" href="#purchase-1" role="tab">
                                <span>Purchase</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link font-size-10 px-0 " data-bs-toggle="tab" href="#product-1" role="tab">
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link font-size-10 px-0 " data-bs-toggle="tab" href="#finance-1" role="tab">
                                <span>Finance</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="sales-1" role="tabpanel">
                            <div class="table-responsive">
                                <table id="tabellist_sales_1" class="" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th hidden>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result['sales'] as $list_sales) : ?>
                                            <tr>
                                                <td class="p-0">
                                                    <a href="http://localhost/app.qearaf-v4/public/detail/view/230911S0703EE8754" onclick="readNotif('507')" class="text-reset notification-item">
                                                        <div class="d-flex list-group-item list-group-item-action list-group-item-warning py-1">
                                                            <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-1 font-size-12 fw-bolder">New Sales</p>
                                                                <div class="font-size-12">
                                                                    <p class="mb-0 font-size-12"><strong class="text-primary"><u>GDDAGGAG</u> </strong>from Millio Tokopedia Confirmed</p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0 font-size-10 fst-italic text-end"><span class="">2023-09-11 14:33:09</span></p>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="purchase-1" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna 8-bit.
                            </p>
                        </div>
                        <div class="tab-pane" id="product-1" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free.
                            </p>
                        </div>
                        <div class="tab-pane" id="finance-1" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table.
                            </p>
                        </div>
                    </div>


                </div><!-- end col -->
            </div>
        </div>
    </div>

    <div class="row d-none d-sm-block">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-sales-tab" data-bs-toggle="pill" href="#v-pills-sales" role="tab" aria-controls="v-pills-sales" aria-selected="true">Sales</a>
                                <a class="nav-link mb-2" id="v-pills-purchase-tab" data-bs-toggle="pill" href="#v-pills-purchase" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
                                <a class="nav-link mb-2" id="v-pills-product-tab" data-bs-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false">Product</a>
                                <a class="nav-link" id="v-pills-finance-tab" data-bs-toggle="pill" href="#v-pills-finance" role="tab" aria-controls="v-pills-finance" aria-selected="false">Finance</a>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-10">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
                                    <div class="table-responsive">
                                        <table id="tabellist_sales" class="" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th hidden>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result['sales'] as $list_sales) : ?>
                                                    <tr>
                                                        <td class="p-0">
                                                            <a href="<?= base_url() . $list_sales['path_notif']; ?>" onclick="readNotif('<?= $list_sales['id_notif']; ?>')" class="text-reset notification-item">
                                                                <div class="d-flex list-group-item list-group-item-action list-group-item-warning py-1">
                                                                    <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                                    <div class="flex-grow-1">
                                                                        <p class="mb-1 fw-bolder"><?= $list_sales['type_notif']; ?></p>
                                                                        <div class="font-size-12">
                                                                            <p class="mb-0 font-size-13"><strong class="text-primary"><u><?= $list_sales['title_notif']; ?></u> </strong><?= $list_sales['notification']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0 fst-italic text-end"><span class=""><?= $list_sales['created_at']; ?></span></p>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">
                                    <p>
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                        single-origin coffee squid. Exercitation +1 labore velit, blog
                                        sartorial PBR leggings next level wes anderson artisan four loko
                                        farm-to-table craft beer twee. Qui photo booth letterpress,
                                        commodo enim craft beer mlkshk.
                                    </p>
                                    <p class="mb-0"> Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna 8-bit</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                                    <p>
                                        Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                        sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                        farm-to-table readymade. Messenger bag gentrify pitchfork
                                        tattooed craft beer, iphone skateboard locavore carles etsy
                                        salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                        Leggings gentrify squid 8-bit cred.
                                    </p>
                                    <p class="mb-0">DIY synth PBR banksy irony.
                                        Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                        mi whatever gluten-free.</p>
                                </div>
                                <div class="tab-pane fade" id="v-pills-finance" role="tabpanel" aria-labelledby="v-pills-finance-tab">
                                    <p>
                                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                        art party before they sold out master cleanse gluten-free squid
                                        scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                        art party locavore wolf cliche high life echo park Austin. Cred
                                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                        farm-to-table.
                                    </p>
                                    <p class="mb-0">Fanny pack portland seitan DIY,
                                        art party locavore wolf cliche high life echo park Austin. Cred
                                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                        farm-to-table.
                                    </p>
                                </div>
                            </div>
                        </div><!--  end col -->
                    </div><!-- end row -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>

</div>

<?= $this->endSection(); ?>