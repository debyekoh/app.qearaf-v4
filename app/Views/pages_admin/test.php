<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('contents'); ?>

<div class="container-fluid">

    <form id="productinfo" action="<?= base_url() ?>saveproduct" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="row">

            <!-- <div class="col-sm-12"> -->



            <!-- <form action="#" class="dropzone"> -->
            <!-- <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                                </div> -->
            <!-- </form> -->
            <input id="new_id" name="pro_id" type="text" class="form-control" hidden>
            <div class="row">
                <label for="propic1" class="form-label">Cover Image</label>
                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="img-thumbnail image-preview-propic1" alt="" style="width: 100px; height: 100px;">
                <div class="col-sm-10">
                    <input class="form-control file-input mt-3" type="file" id="propic1" name="propic[]" onchange="previewImage('propic1')" multiple>
                </div>
            </div>
            <div class="row mt-2">
                <label for="propic2" class="form-label">Cover Image</label>
                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="img-thumbnail image-preview-propic2" alt="" style="width: 100px; height: 100px;">
                <div class="col-10">
                    <input class="form-control file-input mt-3" type="file" id="propic2" name="propic[]" onchange="previewImage('propic2')" multiple>
                </div>
            </div>
            <div class="row mt-2">
                <label for="propic3" class="form-label">Cover Image</label>
                <img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="img-thumbnail image-preview-propic3" alt="" style="width: 100px; height: 100px;">
                <div class="col-10">
                    <input class="form-control file-input mt-3" type="file" id="propic3" name="propic[]" onchange="previewImage('propic3')" multiple>
                </div>
            </div>



            <!-- </div> -->
        </div>
        <!-- end row -->

        <div class="row mt-4 mb-4 ">
            <div class="col text-start">
                <!-- <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a> -->
                <!-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i class=" bx bx-file me-1"></i> Save </a> -->
                <!-- <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i class="bx bx-x me-1 align-middle"></i> Cancel</button> -->
                <button type="submit" class="btn btn-success"><i class="bx bx-check me-1 align-middle"></i> Submit</button>
            </div> <!-- end col -->
        </div> <!-- end row-->


    </form>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script>
    function previewImage(event) {
        console.log(event);
        const image = document.querySelector('#' + event + '');
        const imageLabel = document.querySelector('.' + event + '');
        const imgPreview = document.querySelector('.image-preview-' + event + '');

        // imageLabel.textContent = image.files[0].name

        const fileimg = new FileReader();
        fileimg.readAsDataURL(image.files[0]);

        fileimg.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }



    function generateUUID() {
        var d = new Date().getTime();
        var d2 = ((typeof performance !== ' undefined') && performance.now && (performance.now() * 1000)) || 0;
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

    $(document).ready(function() {
        var string = generateUUID().replace("-", "").substring(0, 8);
        $('#new_id').val(string.toUpperCase());
    });
</script>


<?= $this->endSection(); ?>