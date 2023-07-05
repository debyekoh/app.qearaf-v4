// flatpickr("#date_sales");
function generateUUID() {
    var d = new Date().getTime();
    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0;
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
function formatDate(d)
{
    var month = d.getMonth();
    var day = d.getDate().toString().padStart(2, '0');
    var year = d.getFullYear();
    year = year.toString().substr(-2);
    month = (month + 1).toString().padStart(2, '0');
    return month + day + year;
}

$(document).ready(function() {
    var d = new Date();
    var string = formatDate(d)+"/S/"+generateUUID().replace("-", "").substring(0, 8);
    $('#id_sales').val(string.toUpperCase());
    $('#nso').html("#"+string.toUpperCase());
});

$("#adnpm").on('click', function() {
    console.log("Open modal & List Product");
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
    $("#table-gridjs").empty();
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
                // return gridjs.html(
                //         '<li class="list-inline-item">' +
                //             '<a href="product/'+ e +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bxs-detail font-size-12"></i></a>'+
                //         '</li>' 
                //     )
                    const string4 = new String("'"+e+"'");
                    return gridjs.html(
                        '<button type="button" onclick="addProduct('+string4+')" class="btn btn-sm btn-soft-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Add">'+
                            '<i class="mdi mdi-plus-box-multiple-outline font-size-12 align-middle me-2"></i> Add'+
                        '</button>'
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

function addProduct(sku) {
    // alert("I want this to appear after the modal has opened! "+ sku);
    console.log(sku +" Selected Product");
    if ($("#listsalesproduct > tbody > tr").hasClass(sku)) {
        Swal.fire({
        icon: 'error',
        title: 'Product Already Exist!',
        })
    } else {
    $.ajax({
        type: "POST",
        url: './selected',
        data: {
            sku: sku,
        },
        
        success: function(respone) {
                console.log("Modal Closed");
                $('#addNewProduct').modal('hide');
                if ($("#listsalesproduct > tbody > tr").hasClass("norow")) {
                    $(".norow").remove();
                }
                console.log("Norow Remove");
                var i = $(".rowprosales").length;
                console.log(respone.results);
                const rupiah = (number)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(number);
                }
                $('#listsalesproduct > tbody:last-child').append(
                    '<tr id="R'+i+'" class="rowprosales '+sku+'">'+
                        '<th scope="row"><img src="./assets/images/product/'+respone.results.image+'" alt="product-img" title="product-img" class="avatar-md"></th>'+
                        '<td>'+
                            '<h5 class="font-size-15 text-truncate mb-0"><a href="javascript: void(0);" class="text-dark">'+respone.results.name+'</a></h5>'+
                            '<p class="text-muted mb-0">SKU: '+sku+'</p>'+
                            '<p class="text-muted mb-0">@'+rupiah(respone.results.price)+'</p>'+
                        '</td>'+
                        '<td >'+
                            '<input class="form-control" type="text" name=proid[] placeholder="0" value="'+respone.results.proid+'" style="display:none;">'+
                            '<input class="form-control" type="text" name=price[] placeholder="0" value="'+respone.results.price+'" style="display:none;">'+
                            '<input class="form-control" type="number" name=qty[] placeholder="0" value="">'+
                        '</td>'+
                        '<td class="text-center"><button type="button" class="btn btn-soft-danger waves-effect waves-light"><i class="mdi mdi-trash-can"></i></button></td>'+
                    '</tr>'
                );
            }
        });
    }
  }

// $( "#addNewProduct" ).on('shown', function(){
//     alert("I want this to appear after the modal has opened!");
// });

// $('#addNewProduct').on('shown.bs.modal', function () {
//     $('#table-gridjs > div > div.gridjs-head > div > input').trigger('focus')
//     alert("I want this to appear after the modal has opened!");
//   })

// $(".gridjs-table").on('click', function() {
//     console.log("Select Product");
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
// });