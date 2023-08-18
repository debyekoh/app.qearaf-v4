<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid ps-0 pe-0">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Detail List <?= ucfirst($titlepage) ?></h4>
                </div>
                <div class="card-body">
                    <div id="tabcontent">
                        <div id="purchasetabcontent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade purchasedetailsModal" id="viewPurchase" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="purchasedetailsModalLabel" aria-modal="true" role="dialog">
        <!-- <div id="viewPurchase" class="modal fade purchasedetailsModal" tabindex="-1" role="dialog" aria-labelledby="purchasedetailsModalLabel" aria-hidden="true"> -->
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchasedetailsModalLabel">Purchase Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-1">
                    <table class="table align-middle table-sm table-nowrap table-borderless border-bottom table-centered p-1 mb-0">
                        <tbody>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold" style="width:10%;">
                                    Buyer</td>
                                <td class="py-0 fw-bold" style="width:1%;">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="byr" class="text-truncate"></span></h6>
                                </td>
                            </tr>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold">
                                    Purchase From</td>
                                <td class="py-0 fw-bold">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="pfr" class="text-primary"></span></h6>
                                </td>
                            </tr>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold">
                                    Date Purchase </td>
                                <td class="py-0 fw-bold">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="dpu" class="text-primary"></span></h6>
                                </td>
                            </tr>
                            <tr class="py-0">
                                <th class="py-0 fw-bold" style="width:1%;" hidden>2</th>
                                <td class="py-0 fw-bold">
                                    No Purchase </td>
                                <td class="py-0 fw-bold">:</td>
                                <td class="py-0 text-muted">
                                    <h6 class="mb-0"><span id="npu" class="text-primary"></span></h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-responsive" id="tabel_viewpurchase">

                    </div>
                </div>
                <div class="modal-footer" id="ftmod">
                    <!-- <button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="btnsb" class="btn btn-primary bg-gradient waves-effect">Submit</button> -->
                    <div class="container">
                        <div class="row">
                            <div class="col-6 text-start">
                                <button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6 text-end">
                                <button type="button" id="btnsb" class="btn btn-primary bg-gradient waves-effect" data-bs-dismiss="modal">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>