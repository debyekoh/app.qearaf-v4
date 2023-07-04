// flatpickr("#date_sales");
$("#adnpm").on('click', function() {
    console.log("test");
    // get the current row
    // var currentRow = $(this).closest("tr");
    // var s = currentRow.find(".switch").val();
    // if (s != 0) {
    //     var ss = 0;
    // } else {
    //     var ss = 1;
    // }
    // var d = currentRow.find(".d").text();
    // $.ajax({
    //     // type: "GET",
    //     url: "<?= base_url() ?>assets/js/pages/gridjs.init.js",
    //     // data: {
    //     //     d: d,
    //     //     ss: ss,
    //     // },
    //     success: function(data) {
    //         $('#btn-more').html("No Data");
    //     }
    // });
    new gridjs.Grid({
        columns: [{
            name: "Product",
            sort: {
                enabled: !1
            },
            // plugin: {
            //     component: RowSelection
            // },
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
                console.log(e);
                if(e[1]==true && e[2]==true){
                return gridjs.html(
                        '<li class="list-inline-item">' +
                            '<a href="product/'+ e[0] +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bxs-detail font-size-12"></i></a>'+
                        '</li>' +
                        '<li class="list-inline-item">' +
                            '<a href="editproduct/'+ e[0] +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-primary btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bx-edit-alt font-size-12"></i></a>'+
                        '</li>' +
                        '<li class="list-inline-item">' +
                            '<a href="duplicateproduct/'+ e[0] +'"  id="btnCop" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Duplicate" class="px-3 btn btn-sm btn-soft-warning btn-rounded waves-effect waves-dark" data-bs-original-title="Duplicate" aria-label="Duplicate"><i class="far fa-copy font-size-12"></i></a>' +
                        '</li>'+
                        '<li class="list-inline-item">' +
                            '<a href="javascript:void(0);" id="btnDel" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-3 btn btn-sm btn-soft-danger btn-rounded waves-effect waves-dark" data-bs-original-title="Delete" aria-label="Delete"><i class="far fa-trash-alt font-size-12"></i></a>' +
                        '</li>'
                    )
                } else if(e[1]==true){
                    return gridjs.html(
                        '<li class="list-inline-item">' +
                            '<a href="product/'+ e[0] +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bxs-detail font-size-12"></i></a>'+
                        '</li>' +
                        '<li class="list-inline-item">' +
                            '<a href="editproduct/'+ e[0] +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-primary btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bx-edit-alt font-size-12"></i></a>'+
                        '</li>'
                    )
                }else{
                    return gridjs.html(
                        '<li class="list-inline-item">' +
                            '<a href="product/'+ e[0] +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Detail" aria-label="Detail"><i class="bx bxs-detail font-size-12"></i></a>'+
                        '</li>' 
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
            then: data => data.results.map(product => [product.image, product.name+' '+product.model, product.skuno, product.price, product.statusproduct , [product.skuno,product.editable,product.deletable]])
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
});

// $( "#addNewProduct" ).on('shown', function(){
//     alert("I want this to appear after the modal has opened!");
// });

$('#addNewProduct').on('shown.bs.modal', function () {
    $('#table-gridjs > div > div.gridjs-head > div > input').trigger('focus')
    // alert("I want this to appear after the modal has opened!");
  })

$("#table_addnewproduct").on('click', function() {
    console.log("test");
    // get the current row
    // var currentRow = $(this).closest("tr");
    // var s = currentRow.find(".switch").val();
    // if (s != 0) {
    //     var ss = 0;
    // } else {
    //     var ss = 1;
    // }
    // var d = currentRow.find(".d").text();
    // $.ajax({
    //     type: "POST",
    //     url: "<?= base_url() ?>setting_account/csp",
    //     data: {
    //         d: d,
    //         ss: ss,
    //     },
    //     success: function(data) {
    //         location.reload();
    //     }
    // });
});