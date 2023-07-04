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
                return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-md rounded p-1">')
                // return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar rounded-circle img-thumbnail me-3">')
            }
        }, {
            name: "Description",
            formatter: function(e) {
                // return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                return gridjs.html('<h5 class="text-start font-size-12">' + e[0] + '</h5><p class="text-start font-size-12 text-muted mb-0">' + e[1] + "</p>")
            }
        }, "Stock", {
            name: "Select",
            formatter: function(e) {
                return gridjs.html(
                        '<li class="list-inline-item">' +
                            '<a href="product/'+ e +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bxs-detail font-size-12"></i></a>'+
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
            url: './listproduct',
            then: data => data.results.map(product => [product.image, [product.name+' '+product.model,product.skuno], product.current_stock, product.skuno])
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