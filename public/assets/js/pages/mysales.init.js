
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
                // foreach (e[2]){

                // }
                // data_item.forEach(element => {
                    // console.log( e[2][0]['id_sales_detail'])
                    console.log(data_item[0])
                // });


                let itemdata = "";
                for (i = 0; i < data_item.length; i++) {
                    // itemdata += cars[i] + "<br>";
                    itemdata += 
                        '<div class="row align-items-center">'+
                            '<div class="col-10">'+
                                '<div class="user-block">'+
                                    '<img class="m-1" src="./assets/images/product/'+data_item[i]['pro_img']+'" alt="User Image" style="height: 60px; width: 60px;">'+
                                    '<span class="username"><b>PAKET KUNCI RODA TW19REH+HDX620-1</b></span>'+
                                    // '<span class="description" style="padding-left: 20px;">TW19REH-HDX620-1</span>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="col text-center">'+
                                '<h4>x<b>1</b></h4>'+
                            '</div>'+
                        '</div>'
                    ;
                }

                
                return gridjs.html(
                '<div class="card card-outline" style="margin-bottom: 0px;">'+
				 	'<div class="card-header" style="padding-bottom: 5px;padding-top: 5px;padding-left: 10px;background-color: rgb(228 228 228);">'+
                        '<span class="text-end"><h5 class="font-size-14 mb-0">#' + e[0] + '</h5><p class="font-size-14 text-muted mb-0">' + e[1] + '</p></span>'+
    				'</div>'+
    				'<div class="card-body" style="padding: 10px;">'+
                        '<div  class="d-none d-sm-block">'+
                            '<div class="row row align-items-center">'+
                                
                                '<div class="col-5">'+
                                    itemdata +
                                
                                    
                                    // '<div class="row row align-items-center">'+
                                    //     '<div class="col-10">'+
                                    //         '<div class="user-block">'+
                                    //             '<img class="" src="https://qearaf.com/uploads/produk_forging_standar/picture_product/product-6ffe1fb2-5ca2f.avif" alt="User Image" style="height: 60px; width: 60px;">'+
                                    //             '<span class="username" style="padding-left: 20px; min-height: 43.98px;"><b>PAKET KUNCI RODA TW19REH+HDX620-1</b></span>'+
                                    //             '<span class="description" style="padding-left: 20px;">TW19REH-HDX620-1</span>'+
                                    //         '</div>'+
                                    //     '</div>'+
                                        
                                    //     '<div class="col text-center">'+
                                    //         '<h4>x<b>1</b></h4>'+
                                    //     '</div>'+
                                    // '</div>'+
                            
                                    // '<div class="row row align-items-center">'+
                                    //     '<div class="col-10">'+
                                    //         '<div class="user-block">'+
                                    //             '<img class="" src="https://qearaf.com/uploads/produk_forging_standar/picture_product/product-676f7511-f5006.avif" alt="User Image" style="height: 60px; width: 60px;">'+
                                    //             '<span class="username" style="padding-left: 20px; min-height: 43.98px;"><b>PACKING KARDUS 8X8X30 cm ORDR-2</b></span>'+
                                    //             '<span class="description" style="padding-left: 20px;">PCKG-2-8X8X30</span>'+
                                    //         '</div>'+
                                    //     '</div>'+
                                        
                                    //     '<div class="col text-center">'+
                                    //         '<h4>x<b>1</b></h4>'+
                                    //     '</div>'+
                                    // '</div>'+
                            
                                '</div>'+
                                '<div class="col-3 text-center">'+
                                    '<p><img class="" src="https://qearaf.com/assets/dist/img/logo/Service_SHOPEEXPRESS.png" style="height: 25px;"></p>'+
                                    '<p><b>SPXID030559409967</b></p>'+
                                '</div>'+
                                '<div class="col">'+
                                    '<h5><b>81.500,00</b></h5>'+
                                '</div>'+
                                '<div class="col text-center">'+
                                    '<button type="button" class="btn btn-block btn-outline-primary" id="detailTrans" data-nosales_id="202307/10/S/012"><i class="fa fa-lg fa-external-link" aria-hidden="true"></i>' +
                                    '<br>'+
                                    'Detail</button>'+
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
            url: './mysales/show/'+a,
            then: data => data.results.map(sales => [[sales.id_sales , sales.no_sales , sales.item_detail , sales.item_detail]]),
            // then: data => data.results(),
          },
          style: {
            table: {
            },
            th: {
            //   'text-align': 'center'
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