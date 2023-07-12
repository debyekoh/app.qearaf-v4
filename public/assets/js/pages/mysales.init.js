
$(document).ready(function() {
    // document.querySelector("#toprocess-tab > span.d-none.d-sm-block")
    $('#salesTab').on('click', function () {
        var regexPattern = /[^A-Za-z]/g;
        var a = $('button.nav-link.active').prop('id');
      })
    var regexPattern = /[^A-Za-z]/g;
    var name = $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, "");
    $('.gridjs-th-content').text($('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, ""))
    var a = $('button.nav-link.active').prop('id');
    new gridjs.Grid({
        columns: [
        {
            name: name,
            formatter: function(e) {
                var data_item = e[2]
                let itemdata = "";
                let paystatus = "";
                for (i = 0; i < data_item.length; i++) {
                    itemdata += 
                        '<div class="row align-items-center p-1">'+
                            '<div class="d-flex align-items-center p-0">'+
                                '<div class="flex-shrink-0">'+
                                    '<div class="avatar-md">'+
                                        '<div class="product-img avatar-title img-thumbnail bg-soft-secondary border-0">'+
                                            '<img src="./assets/images/product/'+data_item[i]['pro_img']+'" class="img-fluid" alt="'+data_item[i]['pro_img']+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                    '<h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-dark">'+data_item[i]['pro_name']+'</a></h5>'+
                                    '<p class="text-muted fw-semibold mb-0 text-truncate">'+data_item[i]['pro_sku']+'</p>'+
                                '</div>'+
                                '<div class="flex-shrink-0">'+
                                    '<h5 class="font-size-18 mb-0 text-truncate w-xs p-2 rounded text-center">'+
                                        'X '+data_item[i]['pro_qty']+'</h5>'+
                                '</div>'+
                                
                            '</div>'+
                        '</div>'
                    ;
                }

                if(e[7]==1){
                    paystatus +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-2 rounded text-center">Online Payment <i class="mdi mdi-credit-card font-size-14 ms-1"></i></h5>' ;
                }
                if(e[7]==2){
                    paystatus +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-2 fw-bold rounded text-center">Cash on Delivery <i class="mdi mdi-cash-multiple font-size-14 ms-1"></i></h5>' ;
                }

                return gridjs.html(
                '<div class="card border-dark border-gradient" style="margin-bottom: 0px;">'+
				 	'<div class="card-header bg-dark bg-gradient text-white px-2 py-1" >'+
                        '<div class="d-flex align-items-center p-0">'+
                            '<div class="flex-grow-1 overflow-hidden">'+
                            '<p class="fw-bold fst-italic font-size-14 text-truncate mb-0">#' + e[1] + '</p>'+
                                '<p class="fw-bold text-secondary mb-0" style="font-size:10px;">' + e[0] + '</p>'+
                            '</div>'+
                            '<div class="flex-shrink-0 ms-2">'+
                                '<span class="badge bg-light bg-gradient fw-bold font-size-16 text-dark">' + e[6] + '</span>'+
                            '</div>'+
                        '</div>'+
    				'</div>'+
    				'<div class="card-body p-0">'+
                            '<div class="row align-items-center m-0">'+
                                '<div class="col-md-4 my-1">'+
                                    itemdata +
                                '</div>'+
                                '<div class="col-md-4 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            '<img src="./assets/images/services/' + e[3] + '" style="height: 1.4rem; width: auto;" class="img-fluid" alt="' + e[3] + '">'+
                                            '<p class="fw-bold fst-italic text-truncate mb-0">' + e[4] + '</p>'+
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                            '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-2 rounded text-center">' + e[5] + '</h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            paystatus +
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 text-center">'+
                                            '<span>'+
                                                '<div class="dropdown">'+
                                                    '<button type="button" class="btn btn-outline-dark waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">'+
                                                        '<i class="mdi mdi-format-list-bulleted-square font-size-16 align-middle me-2"></i> Detail'+
                                                    '</button>'+
                                                    '<ul class="dropdown-menu dropdown-menu-end" style="">'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Next</a></li>'+
                                                    '</ul>'+
                                                '</div>'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                    '</div>'+
				'</div>'
                )
            }
        }],
        pagination: {
            limit: 10
        },
        // sort: !0,
        // search: !0,
        server: {
            url: './mysales/show/'+name,
            then: data => data.results.map(sales => [
                [   sales.id_sales ,            // 0 //
                    sales.no_sales ,            // 1 //
                    sales.item_detail ,         // 2 //
                    sales.delivery_services ,   // 3 //
                    sales.no_resi,              // 4 //
                    sales.bill,                 // 5 //
                    sales.statussales,          // 6 //
                    sales.paymethode            // 7 //
                ]
            ]),
            // then: data => data.results(),
          },
          style: {
            table: {
            },
            th: {
              'display': 'none'
            },
            td: {
            //   'text-align': 'center'
            //   'padding': '0px'
            }
          } ,
          className: {
            td: 'py-1 px-0'
          } 
          
    }).render(document.getElementById("salestabcontent"));
});

$(".nav-link").on('click', function() {
    // alert($(this).attr('id'));
    var a = $(this).attr('id');
    var regexPattern = /[^A-Za-z]/g;
    var name = $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, "");
    console.log(name)
    $("#salestabcontent").remove();
    $("#tabcontent").append('<div id="salestabcontent"></div>');
    new gridjs.Grid({
        columns: [
        {
            name: $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, ""),
            formatter: function(e) {
                var data_item = e[2]
                let itemdata = "";
                let paystatus = "";
                for (i = 0; i < data_item.length; i++) {
                    itemdata += 
                        '<div class="row align-items-center p-1">'+
                            '<div class="d-flex align-items-center p-0">'+
                                '<div class="flex-shrink-0">'+
                                    '<div class="avatar-md">'+
                                        '<div class="product-img avatar-title img-thumbnail bg-soft-secondary border-0">'+
                                            '<img src="./assets/images/product/'+data_item[i]['pro_img']+'" class="img-fluid" alt="'+data_item[i]['pro_img']+'">'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                    '<h5 class="mb-1 text-truncate"><a href="" class="font-size-15 text-dark">'+data_item[i]['pro_name']+'</a></h5>'+
                                    '<p class="text-muted fw-semibold mb-0 text-truncate">'+data_item[i]['pro_sku']+'</p>'+
                                '</div>'+
                                '<div class="flex-shrink-0">'+
                                    '<h5 class="font-size-18 mb-0 text-truncate w-xs p-2 rounded text-center">'+
                                        'X '+data_item[i]['pro_qty']+'</h5>'+
                                '</div>'+
                                
                            '</div>'+
                        '</div>'
                    ;
                }

                if(e[7]==1){
                    paystatus +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-2 rounded text-center">Online Payment <i class="mdi mdi-credit-card font-size-14 ms-1"></i></h5>' ;
                }
                if(e[7]==2){
                    paystatus +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-2 fw-bold rounded text-center">Cash on Delivery <i class="mdi mdi-cash-multiple font-size-14 ms-1"></i></h5>' ;
                }

                return gridjs.html(
                '<div class="card border-dark border-gradient" style="margin-bottom: 0px;">'+
				 	'<div class="card-header bg-dark bg-gradient text-white px-2 py-1" >'+
                        '<div class="d-flex align-items-center p-0">'+
                            '<div class="flex-grow-1 overflow-hidden">'+
                            '<p class="fw-bold fst-italic font-size-14 text-truncate mb-0">#' + e[1] + '</p>'+
                                '<p class="fw-bold text-secondary mb-0" style="font-size:10px;">' + e[0] + '</p>'+
                            '</div>'+
                            '<div class="flex-shrink-0 ms-2">'+
                                '<span class="badge bg-light bg-gradient fw-bold font-size-16 text-dark">' + e[6] + '</span>'+
                            '</div>'+
                        '</div>'+
    				'</div>'+
    				'<div class="card-body p-0">'+
                            '<div class="row align-items-center m-0">'+
                                '<div class="col-md-4 my-1">'+
                                    itemdata +
                                '</div>'+
                                '<div class="col-md-4 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            '<img src="./assets/images/services/' + e[3] + '" style="height: 1.4rem; width: auto;" class="img-fluid" alt="' + e[3] + '">'+
                                            '<p class="fw-bold fst-italic text-truncate mb-0">' + e[4] + '</p>'+
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                            '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-2 rounded text-center">' + e[5] + '</h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            paystatus +
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 text-center">'+
                                            '<span>'+
                                                '<div class="dropdown">'+
                                                    '<button type="button" class="btn btn-outline-dark waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">'+
                                                        '<i class="mdi mdi-format-list-bulleted-square font-size-16 align-middle me-2"></i> Detail'+
                                                    '</button>'+
                                                    '<ul class="dropdown-menu dropdown-menu-end" style="">'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>'+
                                                    '<li><a href="#" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Next</a></li>'+
                                                    '</ul>'+
                                                '</div>'+
                                            '</span>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                    '</div>'+
				'</div>'
                )
            }
        }],
        pagination: {
            limit: 10
        },
        // sort: !0,
        // search: !0,
        server: {
            url: './mysales/show/'+name,
            then: data => data.results.map(sales => [
                [   sales.id_sales ,            // 0 //
                    sales.no_sales ,            // 1 //
                    sales.item_detail ,         // 2 //
                    sales.delivery_services ,   // 3 //
                    sales.no_resi,              // 4 //
                    sales.bill,                 // 5 //
                    sales.statussales,          // 6 //
                    sales.paymethode            // 7 //
                ]
            ]),
            // then: data => data.results(),
          },
          style: {
            table: {
            },
            th: {
              'display': 'none'
            },
            td: {
            //   'text-align': 'center'
            //   'padding': '0px'
            }
          } ,
          className: {
            td: 'py-1 px-0'
          } 
          
    }).render(document.getElementById("salestabcontent"));

})




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