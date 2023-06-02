 <!-- jQuery-->
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
 <script type="text/javascript">
     toastr.options = {
         "closeButton": true,
         "debug": true,
         "newestOnTop": true,
         "progressBar": true,
         "positionClass": "toast-top-center",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "10000",
         "timeOut": "10000",
         "extendedTimeOut": "10000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "slideDown",
         "hideMethod": "slideUp"
     }
     // 
     <?php if (session('success')) { ?>
         toastr.success("<?= session('success'); ?>");
     <?php } else if (session('error')) {  ?>
         toastr.error("<?= session('error'); ?>");
     <?php } else if (session('warning')) {  ?>
         toastr.warning("<?= session('warning'); ?>");
     <?php } else if (session('info')) {  ?>
         toastr.info("<?= session('info'); ?>");
     <?php } ?>
 </script>