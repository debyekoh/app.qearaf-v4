
$(document).ready(function() {
    // document.querySelector("#toprocess-tab > span.d-none.d-sm-block")
    $('#salesTab').on('click', function () {
        var regexPattern = /[^A-Za-z]/g;
        var a = $('button.nav-link.active').prop('id');
      })
    var regexPattern = /[^A-Za-z]/g;
    $('.gridjs-th-content').text($('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, ""))
    var a = $('button.nav-link.active').prop('id');
    new gridjs.Grid({
        columns: [
        {
            name: $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, ""),
            formatter: function(e) {
                var data_item = e[2]
                let itemdata = "";
                let status = "";
                for (i = 0; i < data_item.length; i++) {
                    itemdata += 
                        '<div class="row align-items-center p-1">'+
                            '<div class="d-flex align-items-center">'+
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

                return gridjs.html(
                '<div class="card card-outline" style="margin-bottom: 0px;">'+
				 	'<div class="card-header" style="padding-bottom: 5px;padding-top: 5px;padding-left: 10px;background-color: rgb(228 228 228);">'+
                        '<div class="d-flex align-items-start">'+
                            '<div class="flex-grow-1 overflow-hidden">'+
                                '<p class="fw-bold fst-italic font-size-14 text-truncate mb-0">#' + e[0] + '</p>'+
                            '</div>'+
                            '<div class="flex-shrink-0 ms-2">'+
                                '<p class="fw-bold font-size-14 text-truncate mb-0">' + e[1] + '</p>'+
                            '</div>'+
                        '</div>'+
    				'</div>'+
    				'<div class="card-body" style="padding: 10px;">'+
                        '<div  class="">'+
                            '<div class="row row align-items-center">'+
                                '<div class="col-md-4">'+
                                    itemdata +
                                '</div>'+
                                '<div class="col-md-8">'+
                                    '<div class="d-flex align-items-center">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            '<img src="./assets/images/services/' + e[3] + '" style="height: 1.4rem; width: auto;" class="img-fluid" alt="' + e[3] + '">'+
                                            '<p class="text-truncate mb-0">' + e[4] + '</p>'+
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                            '<span class="badge badge-soft-primary font-size-14">' + e[5] + '</span>'+
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                            '<h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">'+
                                                '4.7 <i class="bx bxs-star font-size-14 text-primary ms-1"></i></h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                // '<div class="col-3 text-center">'+
                                //     '<p><img class="" src="https://qearaf.com/assets/dist/img/logo/Service_SHOPEEXPRESS.png" style="height: 25px;"></p>'+
                                //     '<p><b>SPXID030559409967</b></p>'+
                                // '</div>'+
                                // '<div class="col">'+
                                //     '<h5><b>81.500,00</b></h5>'+
                                // '</div>'+
                                // '<div class="col text-center">'+
                                //     '<button type="button" class="btn btn-block btn-outline-primary" id="detailTrans" data-nosales_id="202307/10/S/012"><i class="fa fa-lg fa-external-link" aria-hidden="true"></i>' +
                                //     '<br>'+
                                //     'Detail</button>'+
                                // '</div>'+

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
            url: './mysales/show/'+a,
            then: data => data.results.map(sales => [
                [   sales.id_sales , 
                    sales.no_sales , 
                    sales.item_detail , 
                    sales.delivery_services , 
                    sales.no_resi,
                    sales.statussales
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
            }
          } 
          
    }).render(document.getElementById("sales-all"));
});






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