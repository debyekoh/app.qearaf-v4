<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <table id="list_user" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datausers as $list) : ?>
                                <tr>
                                    <td><?= $list->member_id ?></td>
                                    <td><?= $list->usersemail ?></td>
                                    <td><?= $list->description ?></td>
                                    <td><a href="<?= base_url('userview/' . $list->member_id); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-2 text-primary" data-bs-original-title="User Detail" aria-label="User Detail"><i class="bx bxs-user-detail font-size-18"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>