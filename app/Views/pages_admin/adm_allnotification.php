<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">
    <!-- <div class="row d-block d-sm-none"> -->
    <!-- <div class="row d-none d-sm-block"> -->



    <div class="row d-none d-sm-block"> <!--//ON LARGE//-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 pe-4">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 shadow-lg position-relative border border border-light active" id="v-pills-sales-tab" data-bs-toggle="pill" href="#v-pills-sales" role="tab" aria-controls="v-pills-sales" aria-selected="true">Sales
                                    <?php if ($result['countunreadsales'] > 0) { ?>
                                        <span class="badge shadow rounded-pill m-1 bg-danger float-end"><?= $result['countunreadsales']; ?></span>
                                    <?php } else {
                                    }; ?>
                                </a>
                                <a class="nav-link mb-2 shadow-lg border border border-light" id="v-pills-purchase-tab" data-bs-toggle="pill" href="#v-pills-purchase" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase
                                    <?php if ($result['countunreadpurchase'] > 0) { ?>
                                        <span class="badge shadow rounded-pill m-1 bg-danger float-end"><?= $result['countunreadpurchase']; ?></span>
                                    <?php } else {
                                    }; ?>
                                </a>
                                <a class="nav-link mb-2 shadow-lg border border border-light" id="v-pills-product-tab" data-bs-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false">Product
                                    <?php if ($result['countunreadproduct'] > 0) { ?>
                                        <span class="badge shadow rounded-pill m-1 bg-danger float-end"><?= $result['countunreadproduct']; ?></span>
                                    <?php } else {
                                    }; ?>
                                </a>
                                <a class="nav-link shadow-lg border border border-light" id="v-pills-finance-tab" data-bs-toggle="pill" href="#v-pills-finance" role="tab" aria-controls="v-pills-finance" aria-selected="false">Finance
                                    <?php if ($result['countunreadfinance'] > 0) { ?>
                                        <span class="badge shadow rounded-pill m-1 bg-danger float-end"><?= $result['countunreadfinance']; ?></span>
                                    <?php } else {
                                    }; ?>
                                </a>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-10 p-0">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
                                    <div class="table-responsive">
                                        <table id="tabellist_sales" class="" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th hidden>no</th>
                                                    <th hidden>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result['sales'] as $list_row) :
                                                    if ($list_row['read_status'] == 0) {
                                                        $a = "light";
                                                    } else {
                                                        $a = "warning";
                                                    }; ?>
                                                    <tr>
                                                        <td class="p-0" hidden>
                                                            <?= $list_row['created_at']; ?>
                                                        </td>
                                                        <td class="p-0">
                                                            <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                                <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                                    <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                                    <div class="flex-grow-1">
                                                                        <p class="mb-1 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                                        <div class="font-size-12">
                                                                            <p class="mb-0 font-size-13"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
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
                                    <div class="table-responsive">
                                        <table id="tabellist_purchase" class="" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th hidden>no</th>
                                                    <th hidden>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result['purchase'] as $list_row) :
                                                    if ($list_row['read_status'] == 0) {
                                                        $a = "light";
                                                    } else {
                                                        $a = "warning";
                                                    }; ?>
                                                    <tr>
                                                        <td class="p-0" hidden>
                                                            <?= $list_row['created_at']; ?>
                                                        </td>
                                                        <td class="p-0">
                                                            <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                                <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                                    <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                                    <div class="flex-grow-1">
                                                                        <p class="mb-1 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                                        <div class="font-size-12">
                                                                            <p class="mb-0 font-size-13"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-0 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                                    <table id="tabellist_product" class="" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th hidden>no</th>
                                                <th hidden>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result['product'] as $list_row) :
                                                if ($list_row['read_status'] == 0) {
                                                    $a = "light";
                                                } else {
                                                    $a = "warning";
                                                }; ?>
                                                <tr>
                                                    <td class="p-0" hidden>
                                                        <?= $list_row['created_at']; ?>
                                                    </td>
                                                    <td class="p-0">
                                                        <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                            <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                                <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="mb-1 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                                    <div class="font-size-12">
                                                                        <p class="mb-0 font-size-13"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="v-pills-finance" role="tabpanel" aria-labelledby="v-pills-finance-tab">
                                    <table id="tabellist_finance" class="" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th hidden>no</th>
                                                <th hidden>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result['finance'] as $list_row) :
                                                if ($list_row['read_status'] == 0) {
                                                    $a = "light";
                                                } else {
                                                    $a = "warning";
                                                }; ?>
                                                <tr>
                                                    <td class="p-0" hidden>
                                                        <?= $list_row['created_at']; ?>
                                                    </td>
                                                    <td class="p-0">
                                                        <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                            <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                                <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                                <div class="flex-grow-1">
                                                                    <p class="mb-1 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                                    <div class="font-size-12">
                                                                        <p class="mb-0 font-size-13"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--  end col -->
                    </div><!-- end row -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    </div>

    <div class="row d-block d-sm-none"> <!--//ON SMALL//-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-2">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light font-size-8">
                            <a class="nav-link font-size-10 px-0 active" data-bs-toggle="tab" href="#sales-1" role="tab">
                                <span>Sales</span>
                                <?php if ($result['countunreadsales'] > 0) { ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $result['countunreadsales']; ?>
                                        <span class="visually-hidden">unread sales</span>
                                    </span>
                                <?php } else {
                                }; ?>
                            </a>
                        </li>
                        <li class=" nav-item waves-effect waves-light">
                            <a class="nav-link font-size-10 px-0 " data-bs-toggle="tab" href="#purchase-1" role="tab">
                                <span>Purchase</span>
                                <?php if ($result['countunreadpurchase'] > 0) { ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $result['countunreadpurchase']; ?>
                                        <span class="visually-hidden">unread purchase</span>
                                    </span>
                                <?php } else {
                                }; ?>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link font-size-10 px-0 " data-bs-toggle="tab" href="#product-1" role="tab">
                                <span>Product</span>
                                <?php if ($result['countunreadproduct'] > 0) { ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $result['countunreadproduct']; ?>
                                        <span class="visually-hidden">unread product</span>
                                    </span>
                                <?php } else {
                                }; ?>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link font-size-10 px-0 " data-bs-toggle="tab" href="#finance-1" role="tab">
                                <span>Finance</span>
                                <?php if ($result['countunreadfinance'] > 0) { ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $result['countunreadfinance']; ?>
                                        <span class="visually-hidden">unread finance</span>
                                    </span>
                                <?php } else {
                                }; ?>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-0 text-muted">
                        <div class="tab-pane active" id="sales-1" role="tabpanel">
                            <div class="table-responsive">
                                <table id="tabellist_sales_1" class="" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th hidden>no</th>
                                            <th hidden>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result['sales'] as $list_row) :
                                            if ($list_row['read_status'] == 0) {
                                                $a = "light";
                                            } else {
                                                $a = "warning";
                                            }; ?>
                                            <tr>
                                                <td class="p-0" hidden>
                                                    <?= $list_row['created_at']; ?>
                                                </td>
                                                <td class="p-0">
                                                    <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                        <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                            <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                            <div class="flex-grow-1">
                                                                <p class="mb-1 font-size-12 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                                <div class="font-size-10">
                                                                    <p class="mb-0 font-size-11"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0 font-size-10 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
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
                            <table id="tabellist_purchase_1" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th hidden>no</th>
                                        <th hidden>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result['purchase'] as $list_row) :
                                        if ($list_row['read_status'] == 0) {
                                            $a = "light";
                                        } else {
                                            $a = "warning";
                                        }; ?>
                                        <tr>
                                            <td class="p-0" hidden>
                                                <?= $list_row['created_at']; ?>
                                            </td>
                                            <td class="p-0">
                                                <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                    <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                        <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                        <div class="flex-grow-1">
                                                            <p class="mb-1 font-size-12 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                            <div class="font-size-10">
                                                                <p class="mb-0 font-size-11"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 font-size-10 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="product-1" role="tabpanel">
                            <table id="tabellist_product_1" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th hidden>no</th>
                                        <th hidden>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result['product'] as $list_row) :
                                        if ($list_row['read_status'] == 0) {
                                            $a = "light";
                                        } else {
                                            $a = "warning";
                                        }; ?>
                                        <tr>
                                            <td class="p-0" hidden>
                                                <?= $list_row['created_at']; ?>
                                            </td>
                                            <td class="p-0">
                                                <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                    <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                        <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                        <div class="flex-grow-1">
                                                            <p class="mb-1 font-size-12 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                            <div class="font-size-10">
                                                                <p class="mb-0 font-size-11"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 font-size-10 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="finance-1" role="tabpanel">
                            <table id="tabellist_finance_1" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th hidden>no</th>
                                        <th hidden>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result['finance'] as $list_row) :
                                        if ($list_row['read_status'] == 0) {
                                            $a = "light";
                                        } else {
                                            $a = "warning";
                                        }; ?>
                                        <tr>
                                            <td class="p-0" hidden>
                                                <?= $list_row['created_at']; ?>
                                            </td>
                                            <td class="p-0">
                                                <a href="<?= base_url() . $list_row['path_notif']; ?>" onclick="readNotif('<?= $list_row['id_notif']; ?>')" class="text-reset notification-item">
                                                    <div class="d-flex list-group-item list-group-item-action border-0  list-group-item-<?= $a; ?> py-1">
                                                        <div class="flex-shrink-0 align-self-center avatar-sm me-3"><span class="avatar-title bg-success rounded-circle font-size-16"><i class="bx bx-badge-check"></i></span></div>
                                                        <div class="flex-grow-1">
                                                            <p class="mb-1 font-size-12 fw-bolder"><?= $list_row['type_notif']; ?></p>
                                                            <div class="font-size-10">
                                                                <p class="mb-0 font-size-11"><strong class="text-primary"><u><?= $list_row['title_notif']; ?></u> </strong><?= $list_row['notification']; ?></p>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 font-size-10 fst-italic text-end"><span class=""><?= $list_row['created_at']; ?></span></p>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div><!-- end col -->
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>