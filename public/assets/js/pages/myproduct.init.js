
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
            return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-md rounded p-1">')
            // return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>')
        }
    }, {
        name: "Product Name",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html('<span class="fw-semibold font-size-12">' + e + "</span>")
        }
    },{
        name: "Sku No",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html('<span class="skuno font-size-12">' + e + "</span>")
        }
    }, {
        name: "Price",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html('<span class="price font-size-12">Rp ' + e.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + "</span>")
            // switch (e) {
            // case ">= 1":
            //     return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">Active</span>');
            // case "0":
            //     return gridjs.html('<span class="badge badge-pill badge-soft-danger font-size-12">Off</span>');
            // }
        }
    }, {
        name: "Stock",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            // return gridjs.html('<span class="stock">' + e[0] + "</span>")
            if(parseInt(e[0]) <= parseInt(e[1]) ){
                return gridjs.html('<span class="stock badge border border-danger text-danger font-size-14">' + e[0] + ' Pcs</span>')
            }
            if(parseInt(e[0]) > parseInt(e[1]) && parseInt(e[0]) <= (parseInt(e[1])+5)){
                return gridjs.html('<span class="stock badge border border-warning text-warning font-size-14">' + e[0] + ' Pcs</span>')
            }
            if(parseInt(e[0]) > (parseInt(e[1])+5) && parseInt(e[0]) <= parseInt(e[2])){
                return gridjs.html('<span class="stock badge border border-dark text-dark font-size-14">' + e[0] + ' Pcs</span>')
            }
            if(parseInt(e[0]) > parseInt(e[2])){
                return gridjs.html('<span class="stock badge border border-primary text-primary font-size-14">' + e[0] + ' Pcs</span>')
            }
            // switch (e) {
            // case ">= 1":
            //     return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">Active</span>');
            // case "0":
            //     return gridjs.html('<span class="badge badge-pill badge-soft-danger font-size-12">Off</span>');
            // }
        }
    }, {
        name: "Status",
        hidden: true,
        sort: {
            enabled: !1
        },
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
            console.log(e);
            if(e[1]==true && e[2]==true){
            return gridjs.html(
                '<div class="dropstart">'+
                    '<button type="button" class="btn btn-soft-dark waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">'+
                        '<i class="mdi mdi-format-list-bulleted-square font-size-16 align-middle me-2"></i> Detail'+
                    '</button>'+
                    '<ul class="dropdown-menu dropdown-menu-end" style="">'+
                        '<li><a href="product/'+ e[0] +'" id="btnView" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                        '<li><a href="editproduct/'+ e[0] +'" id="btnEdit" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>'+
                        '<li><a href="duplicateproduct/'+ e[0] +'"  id="btnCop" role="button" class="dropdown-item fw-bold"><i class="far fa-copy font-size-16 text-info me-1"></i> Duplicate</a></li>'+
                        '<li><a href="javascript:void(0);" id="btnDel" role="button" class="dropdown-item fw-bold"><i class="far fa-trash-alt font-size-16 text-danger me-1"></i> Delete</a></li>'+
                    '</ul>'+
                '</div>'
            )
            }else{
                return gridjs.html(
                    '<div class="dropstart">'+
                        '<button type="button" class="btn btn-soft-dark waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">'+
                            '<i class="mdi mdi-format-list-bulleted-square font-size-16 align-middle me-2"></i> Detail'+
                        '</button>'+
                        '<ul class="dropdown-menu dropdown-menu-end" style="">'+
                            '<li><a href="product/'+ e[0] +'" id="btnView" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                            '<li><a href="editproduct/'+ e[0] +'" id="btnEdit" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>'+
                            '<li><a href="duplicateproduct/'+ e[0] +'"  id="btnCop" role="button" class="dropdown-item fw-bold"><i class="far fa-copy font-size-16 text-info me-1"></i> Duplicate</a></li>'+
                        '</ul>'+
                    '</div>'
                )
            }
        }
    }],
    pagination: {
        limit: 10
    },
    sort: !0,
    search: !0,
    server: {
        url: './myproducts/show',
        then: data => data.results.map(product => [product.image, product.name+' '+product.model, product.skuno, product.price , [product.stock, product.minstock , product.maxstock], product.statusproduct , [product.skuno,product.editable,product.deletable]])
      },
      style: {
        table: {
        },
        th: {
          'text-align': 'center'
        },
        td: {
          'text-align': 'center'
        }
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