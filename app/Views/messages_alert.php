<?php if (session('success')) { ?>
    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
        <i class="mdi mdi-check-all label-icon"></i><strong>Success</strong> - <?= session('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (session('error')) { ?>
    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
        <i class="mdi mdi-block-helper label-icon"></i><strong>Error</strong> - <?= session('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (session('warning')) { ?>
    <div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert">
        <i class="mdi mdi-alert-outline label-icon"></i><strong>Warning</strong> - <?= session('warning'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (session('info')) { ?>
    <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show" role="alert">
        <i class="mdi mdi-alert-circle-outline label-icon"></i><strong>Info</strong> - <?= session('info'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>