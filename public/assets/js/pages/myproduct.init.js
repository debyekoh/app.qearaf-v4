
// function myFunction() {
//     alert("I am an alert box!");
//   }

// $(function () {
//     $('[data-toggle="tooltip"]').tooltip()
// })

new gridjs.Grid({
    columns: [{
        name: "Product",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-lg rounded p-1">')
            // return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>')
        }
    }, {
        name: "Product Name",
        formatter: function(e) {
            return gridjs.html('<span class="fw-semibold">' + e + "</span>")
        }
    },{
        name: "SKU N0",
        formatter: function(e) {
            return gridjs.html('<span class="skuno">' + e + "</span>")
        }
    }, "Price", {
        name: "Status",
        formatter: function(e) {
            switch (e) {
            case "1":
                return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">Active</span>');
            case "0":
                return gridjs.html('<span class="badge badge-pill badge-soft-danger font-size-12">Off</span>');
            }
        }
    }, {
        name: "Action",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html(
                    '<li class="list-inline-item">' +
                        // '<form action="editproduct/'+ e +'" method="GET">'+
                        //     '<input name="_var" value="'+ e +'" hidden>'+
                        //     '<button type="submit" class="btn btn-soft-primary btn-rounded waves-effect waves-dark" title="Edit"><i class="far fa-edit font-size-12 align-middle"></i></button>'+
                        // '</form>'+
                        '<a href="editproduct/'+ e +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-primary btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bx-edit-alt font-size-12"></i></a>'+
                    '</li>' +
                    '<li class="list-inline-item">' +
                        // '<form action="duplicateproduct/'+ e +'" method="GET">'+
                        //     '<input name="_var" value="'+ e +'" hidden>'+
                        //     '<button type="submit" class="btn btn-soft-warning btn-rounded waves-effect waves-dark" title="Duplicate"><i class="far fa-copy font-size-12 align-middle"></i></button>'+
                        // '</form>'+
                        // '<button type="button" class="btn btn-soft-warning btn-rounded waves-effect waves-dark" title="Duplicate"><i class="far fa-edit font-size-16 align-middle"></i></button>'+
                        '<a href="duplicateproduct/'+ e +'"  id="btnCop" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Duplicate" class="px-3 btn btn-sm btn-soft-warning btn-rounded waves-effect waves-dark" data-bs-original-title="Duplicate" aria-label="Duplicate"><i class="far fa-copy font-size-12"></i></a>' +
                    '</li>'+
                    '<li class="list-inline-item">' +
                        '<a href="javascript:void(0);" id="btnDel" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-3 btn btn-sm btn-soft-danger btn-rounded waves-effect waves-dark" data-bs-original-title="Delete" aria-label="Delete"><i class="far fa-trash-alt font-size-12"></i></a>' +
                    '</li>'
                )
        }
    }],
    pagination: {
        limit: 10
    },
    sort: !0,
    search: !0,
    server: {
        url: './myproducts/show',
        then: data => data.results.map(product => [product.image, product.name+' '+product.model, product.skuno, product.price, product.statusproduct , product.skuno])
      } 
}).render(document.getElementById("table-gridjs"));


// $("#table-gridjs").on('click', '#btnEdit', function() {
//     $('#modalEdit').modal('show');
//     var currentRow = $(this).closest("tr");
//     var d = currentRow.find(".fw-semibold").text();
//     console.log(d);
//     // $.ajax({
//     //     type: "POST",
//     //     url: "<?= base_url() ?>setting_account/eds",
//     //     dataType: "JSON",
//     //     data: {
//     //         d: d,
//     //     },
//     //     success: function(data) {
//     //         // console.log(data.data.id_shop);
//     //         $('#id_shop').val(data.data.id_shop);
//     //         $('#name_shop').val(data.data.name_shop);
//     //         $('#marketplace').val(data.data.marketplace);
//     //         $('#phone').val(data.data.phone);
//     //         $('#address_shop').val(data.data.address_shop);
//     //         // location.reload();
//     //     }
//     // });
// });

$("#table-gridjs").on('click', '#btnDel', function() {
    var currentRow = $(this).closest("tr");
    var d = currentRow.find(".skuno").text();
    $.ajax({
        type: "GET",
        url: "./deleteproduct",
        dataType: "JSON",
        data: {
            d: d,
        },
        success: function(data) {
            var ns = data.name_shop;
            if (data.respone == "success") {
                Swal.fire({
                    title: 'Are you sure?',
                    html: "Do you want to Remove <u><b>" + data.name_shop + "</b></u> ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "./deleteproduct",
                            dataType: "JSON",
                            data: {
                                d: d,
                                getResp: data.respone,
                            },
                            success: function(data) {
                                if (data.respone == "deleted") {
                                    Swal.fire({
                                        // position: 'top-end',
                                        icon: 'success',
                                        title: data.name_shop+' has been successfully remove',
                                        showConfirmButton: false,
                                        timer: 1000
                                    })
                                    // location.reload();
                                    // Swal.fire(
                                    //     'Deleted!',
                                    //     '<u><b>' + data.name_shop + '</b></u> was successfully removed.',
                                    //     'success', {
                                    //         showConfirmButton: false,
                                    //     }
                                    // )
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                        showConfirmButton: false,
                                    })
                                }
                            }
                        });
                    }
                })
            }

        }
    });

});