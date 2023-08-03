
$(document).ready(function() {
    // document.querySelector("#toprocess-tab > span.d-none.d-sm-block")
    $('#purchaseTab').on('click', function () {
        var regexPattern = /[^A-Za-z]/g;
        var a = $('button.nav-link.active').prop('id');
      })
    var regexPattern = /[^A-Za-z]/g;
    var name = $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, "");
    $('.gridjs-th-content').text($('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, ""))
    var a = $('button.nav-link.active').prop('id');
    renderPurchase(name)
    console.log(name)
});

$(".nav-link").on('click', function() {
    var a = $(this).attr('id');
    var regexPattern = /[^A-Za-z]/g;
    var name = $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, "");
    console.log(name)
    renderPurchase(name)
})

function renderPurchase(name) {
    $("#purchasetabcontent").remove();
    $("#tabcontent").append('<div id="purchasetabcontent"></div>');
    new gridjs.Grid({
        columns: [
            { 
                name: 'NO Purchase',
                hidden: true,
            },{
            name: name,
            formatter: function(e) {
                var data_item = e[2]
                let itemdata = "";
                let paystatus = "";
                let paymethode = "";
                let btn_gopayment = "";
                let btn_gocancel = "";
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
                                    '<h5 class="mb-1 text-truncate"><a class="font-size-15 text-dark">'+data_item[i]['pro_name']+'</a></h5>'+
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

                const id_detailview = new String(e[0].substr(0, 6)+e[0].substr(7, 1)+e[0].substr(9, 2)+e[0].substr(12));
                const pid = new String("'"+e[0]+"'");
                const gopayment = new String("'Payment'");
                const gocancel = new String("'Cancel'");
                
                if(e[4]=="Lunas"){
                    paystatus +=
                        '<span class="badge bg-success bg-gradient fw-bold font-size-16">' + e[4] + '</span>' ;
                    btn_gocancel +=
                        '<li><a onclick="to('+pid+','+gocancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                }
                if(e[4]=="Belum Lunas"){
                    paystatus +=
                        '<span class="badge bg-danger bg-gradient fw-bold font-size-16">' + e[4] + '</span>' ;
                    btn_gopayment +=
                        '<li><a onclick="vito('+pid+','+gopayment+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-cash-check font-size-16 text-primary me-1"></i> Payment</a></li>';
                    btn_gocancel +=
                        '<li><a onclick="to('+pid+','+gocancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                }

                if(e[5]==1){
                    paymethode +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-2 rounded text-center">Online Payment <i class="mdi mdi-credit-card font-size-14 ms-1"></i></h5>' ;
                }
                if(e[5]==3){
                    paymethode +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-0 fw-bold rounded text-center">Cash on Delivery <i class="fas fa-handshake font-size-14 ms-1"></i></h5>' ;
                }


                return gridjs.html(
                '<div class="card border-secondary border-gradient" style="margin-bottom: 0px;">'+
				 	'<div class="card-header bg-soft-warning bg-gradient text-white px-2 py-1" >'+
                        '<div class="d-flex align-items-center p-0">'+
                            '<div class="flex-grow-1 overflow-hidden">'+
                                '<p class="fw-bold fst-italic font-size-14 text-dark mb-0">#' + e[0] + '</p>'+
                            '</div>'+
                            '<div class="flex-shrink-0 ms-2">'+
                                paystatus+
                            '</div>'+
                        '</div>'+
    				'</div>'+
    				'<div class="card-body p-0">'+
                            '<div class="row align-items-center m-0">'+
                                '<div class="col-md-4 my-1">'+
                                    itemdata +
                                '</div>'+
                                '<div class="col-md-4 p-0 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            '<p class="fw-bold fst-italic text-truncate mb-0">' + e[6] + '</p>'+
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                            '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[3] + '</h5>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            paymethode +
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 text-center">'+
                                            '<span>'+
                                                '<div class="dropdown">'+
                                                    '<button type="button" class="btn btn-soft-dark waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">'+
                                                        '<i class="mdi mdi-format-list-bulleted-square font-size-16 align-middle me-2"></i> Detail'+
                                                    '</button>'+
                                                    '<ul class="dropdown-menu dropdown-menu-end" style="">'+
                                                        '<li><a href="detail/purchaseview/'+id_detailview+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                                                        btn_gopayment + 
                                                        btn_gocancel +
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
        search: {
            selector: (cell, rowIndex, cellIndex) => cellIndex === 0 ? cell.id_sales : cell
          },
        server: {
            url: './mypurchase/show/'+name,
            then: data => data.results.map(purchase => [
                    purchase.no_purchase,          // OK //
                [   purchase.no_purchase ,         // 0 // OK
                    purchase.date_purchase ,       // 1 // OK
                    purchase.item_detail ,         // 2 // OK
                    purchase.bill,                 // 3 // OK
                    purchase.statuspurchase,       // 4 // OK
                    purchase.paymethode,           // 5 // OK
                    purchase.supplier_detail,      // 6 // OK
                ],
            ]),
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
          
    }).render(document.getElementById("purchasetabcontent"));
    // $(".gridjs-container").addClass("row");
    $("#tcard").text(name);
    // $(".tab-content").css("position", "relative");
    // $(".tab-content").css("top", "-46px");
    $(".gridjs-head").addClass("m-0");
    // $('.gridjs-search').addClass('float-none float-md-start');
    $('.gridjs-search-input').attr('placeholder','SEARCH...');
    $(".gridjs-search-input").addClass("form-control text-uppercase fw-bold bg-soft-warning py-1");
    $(".gridjs-search-input").css("border-radius", "0.6rem");
    
  }


function to(s_id , s_name , s_paym) {
    console.log("TEST")
$('#viewSales').modal('hide');
    Swal.fire({
        title: 'Are you sure?',
        html: "You want to <b>"+s_name+"</b> Sales No:<b>"+s_id+"</b>",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, '+s_name+' it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                text: 'No Sales: '+s_id+' Change Status to '+s_name,
                showConfirmButton: false,
                timer: 500,
                timerProgressBar: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        $.ajax({
                            type: "POST",
                            url: "./mysales/nextto",
                            dataType: "JSON",
                            data: {
                                id: s_id,
                                name: s_name,
                                paymval: s_paym,
                            },
                            success: function(data) {
                                // console.log(data)
                                if (data.status == "success") {
                                var regexPattern = /[^A-Za-z]/g;
                                var name = $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, "")
                                renderPurchase(name)
                                if(data.datatab.Process!=0){
                                    $(".proces_span_none").html(
                                        '<i class="mdi mdi-application-settings mdi-24px"></i>'+
                                        '<span class="process rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Process+'</span>'
                                        );
                                    $(".proces_span_block").html(
                                        'Process <span class="process rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Process+'</span>'
                                        );
                                }else{
                                    $(".proces_span_none").html('<i class="mdi mdi-application-settings mdi-24px"></i>');
                                    $(".proces_span_block").html('Process');
                                }
                                // $('.packaging').text(data.datatab.Packaging);
                                if(data.datatab.Packaging!=0){
                                    $(".packaging_span_none").html(
                                        '<i class="mdi mdi-package-variant mdi-24px"></i>'+
                                        '<span class="packaging rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Packaging+'</span>'
                                        );
                                    $(".packaging_span_block").html(
                                        'Packaging <span class="packaging rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Packaging+'</span>'
                                        );
                                }else{
                                    $(".packaging_span_none").html('<i class="mdi mdi-package-variant mdi-24px"></i>');
                                    $(".packaging_span_block").html('Packaging');
                                }
                                // $('.ready').text(data.datatab.Ready);
                                if(data.datatab.Ready!=0){
                                    $(".ready_span_none").html(
                                        '<i class="mdi mdi-clipboard-check-multiple-outline mdi-24px"></i>'+
                                        '<span class="ready rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Ready+'</span>'
                                        );
                                    $(".ready_span_block").html(
                                        'Ready <span class="ready rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Ready+'</span>'
                                        );
                                }else{
                                    $(".ready_span_none").html('<i class="mdi mdi-clipboard-check-multiple-outline mdi-24px"></i>');
                                    $(".ready_span_block").html('Ready');
                                }
                                // $('.delivery').text(data.datatab.Delivery);
                                if(data.datatab.Delivery!=0){
                                    $(".delivery_span_none").html(
                                        '<i class="mdi mdi-truck-fast-outline mdi-24px"></i>'+
                                        '<span class="delivery rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Delivery+'</span>'
                                        );
                                    $(".delivery_span_block").html(
                                        'Delivery <span class="delivery rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Delivery+'</span>'
                                        );
                                }else{
                                    $(".delivery_span_none").html('<i class="mdi mdi-truck-fast-outline mdi-24px"></i>');
                                    $(".delivery_span_block").html('Delivery');
                                }
                                // $('.received').text(data.datatab.Received);
                                if(data.datatab.Received!=0){
                                    $(".received_span_none").html(
                                        '<i class="mdi mdi-progress-check mdi-24px"></i>'+
                                        '<span class="received rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Received+'</span>'
                                        );
                                    $(".received_span_block").html(
                                        'Received <span class="received rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Received+'</span>'
                                        );
                                }else{
                                    $(".received_span_none").html('<i class="mdi mdi-progress-check mdi-24px"></i>');
                                    $(".received_span_block").html('Received');
                                }
                                // $('.completed').text(data.datatab.Completed);
                                if(data.datatab.Completed!=0){
                                    $(".completed_span_none").html(
                                        '<i class="mdi mdi-check-decagram mdi-24px"></i>'+
                                        '<span class="completed rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Completed+'</span>'
                                        );
                                    $(".completed_span_block").html(
                                        'Completed <span class="completed rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Completed+'</span>'
                                        );
                                }else{
                                    $(".completed_span_none").html('<i class="mdi mdi-check-decagram mdi-24px"></i>');
                                    $(".completed_span_block").html('Completed');
                                }
                                // $('.cancel').text(data.datatab.Cancel);
                                if(data.datatab.Cancel!=0){
                                    $(".cancel_span_none").html(
                                        '<i class="mdi mdi-progress-close mdi-24px"></i>'+
                                        '<span class="cancel rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Cancel+'</span>'
                                        );
                                    $(".cancel_span_block").html(
                                        'Cancel <span class="cancel rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Cancel+'</span>'
                                        );
                                }else{
                                    $(".cancel_span_none").html('<i class="mdi mdi-progress-close mdi-24px"></i>');
                                    $(".cancel_span_block").html('Cancel');
                                }
                                // $('.return').text(data.datatab.Return);
                                if(data.datatab.Return!=0){
                                    $(".return_span_none").html(
                                        '<i class="mdi mdi-backup-restore mdi-24px"></i>'+
                                        '<span class="return rounded-pill bg-primary bg-gradient" style="position: absolute;padding: 0.25em 0.6em;'+
                                        'font-size: 70%;font-weight: 500;line-height: 1;color: #fff;text-align: center;'+
                                        'white-space: nowrap;vertical-align: baseline;top: 0;right: 1px;">'+data.datatab.Return+'</span>'
                                        );
                                    $(".return_span_block").html(
                                        'Return <span class="return rounded-pill bg-primary bg-gradient" '+
                                        'style="padding: 0.25em 0.6em;font-size: 75%;font-weight: 500;'+
                                        'line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;">'+data.datatab.Return+'</span>'
                                        );
                                }else{
                                    $(".return_span_none").html('<i class="mdi mdi-backup-restore mdi-24px"></i>');
                                    $(".return_span_block").html('Return');
                                }
                                }
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": true,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-center",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "3000",
                                    "timeOut": "3000",
                                    "extendedTimeOut": "3000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "slideDown",
                                    "hideMethod": "slideUp"
                                }
                                toastr["success"](data.id+" status changed to "+data.name)
                                checkNotif();
                            }
                        });
                    }
                })
                
        }
    })
  
}

function vito(s_id , s_name) {
    $('#viewPurchase').modal('show');
    console.log(s_name)
    let paymentinput = ''
    if(s_name != null){
        paymentinput +=
        '<tr>'+
            '<td colspan="3" class="font-size-18 m-0 fw-bold border-bottom-0">'+
                '<div class="form-floating mb-3">'+
                    '<input type="text" min="4" class="form-control is-invalid font-size-18 fw-bold" id="payment" name="payment" placeholder="Input Payment">'+
                    '<label for="payment">Payment</label>'+
                    '<div class="invalid-feedback">'+
                        'Please Fill in Payment.'+
                    '</div>'+
                    '<input type="number" class="form-control " id="paymentval" name="paymentval" placeholder="Payment Value" hidden>'+
                '</div>'+
            '</td>'+
        '</tr>';

    }
    $.ajax({
        type: "POST",
        url: "./mypurchase/detail",
        dataType: "JSON",
        data: {
            id: s_id,
            // name: s_name,
        },
        success: function(data) {
            console.log(data)
            $("#byr").html("QEARAF.COM");
            $("#pfr").html(data.detail.ifp.name_supplier);
            $("#dpu").html(data.detail.ifp.date_purchase);
            $("#npu").html("#"+data.detail.ifp.no_purchase);
            let itemrow = '';
            let subtotal = 0;
            for (l = 0; l < data.detail.dpl.length; l++) {
                subtotal += data.detail.dpl[l].pro_price * data.detail.dpl[l].pro_qty;
                itemrow += 
                    '<tr>'+
                        '<th scope="row">'+
                                '<img src="assets/images/product/'+data.detail.dpl[l].pro_img+'" alt="" class="rounded avatar-md">'+
                        '</th>'+
                        '<td>'+
                            ' <div>'+
                                '<h5 class="text-truncate fw-bold font-size-14 mb-0">'+data.detail.dpl[l].pro_name+' '+data.detail.dpl[l].pro_model+''+
                                ' <p class="text-truncate mb-0">'+data.detail.dpl[l].pro_qty+' x Rp '+data.detail.dpl[l].pro_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</p>'+
                            '</div>'+
                        ' </td>'+
                        ' <td>Rp '+(data.detail.dpl[l].pro_qty * data.detail.dpl[l].pro_price).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</td>'+
                    '</tr>'
                ;
            }
            // let tax = ((10/100)*subtotal).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            // let pckgdesc = '';
            // if(data.detail.ifs.packaging == 0){pckgdesc = "No Packaging"}
            // if(data.detail.ifs.packaging == 1){pckgdesc = "Small 17x9x6cm"}
            // if(data.detail.ifs.packaging == 2){pckgdesc = "Long 8x8x30cm"}
            $("#tabel_viewpurchase").html(
                '<table class="table align-middle table-nowrap" id="trfsi">'+
                    '<thead>'+
                        '<tr>'+
                            '<th scope="col">Product</th>'+
                            '<th scope="col">Product Name</th>'+
                            '<th scope="col">Price</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                        itemrow+
                        
                        '<tr>'+
                            '<td colspan="2">'+
                                '<h6 class="m-0 text-right">Sub Total:</h6>'+
                            '</td>'+
                            '<td>'+
                                'Rp '+subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+''+
                            '</td>'+
                        '</tr>'+
                        // '<tr>'+
                        //     '<td colspan="2">'+
                        //         '<h6 class="m-0 text-right">Shipping:</h6>'+
                        //         '<p class="text-muted mb-0">'+
                        //         '<img src="./assets/images/services/'+data.detail.ifp.image_services+'" alt="'+data.detail.ifp.image_services+'" style="height: 1.4rem; width: auto;" class="img-fluid">'+
                        //         '</p>'+
                        //     ' </td>'+
                        //     '<td>'+
                        //         ' Free'+
                        //     '</td>'+
                        // '</tr>'+
                        // '<tr>'+
                        //     '<td colspan="2">'+
                        //         '<h6 class="m-0 text-right" id="td_tax">Estimated Tax (10%):</h6>'+
                        //     ' </td>'+
                        //     '<td class="text-danger" id="td_tax_val">'+
                        //         'Rp ('+tax+')'+
                        //     '</td>'+
                        // '</tr>'+
                        // '<tr>'+
                        //     '<td colspan="2">'+
                        //         '<h6 class="m-0 text-right">Packaging:</h6>'+
                        //         '<p class="text-muted mb-0">'+pckgdesc+'</p>'+
                        //     ' </td>'+
                        //     '<td>'+
                        //         ' Rp '+data.detail.ifs.packaging_charge.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+''+
                        //     '</td>'+
                        // '</tr>'+
                        '<tr class="border-bottom-0">'+
                            '<td colspan="2">'+
                                '<h6 class="m-0 text-right">Discount:</h6>'+
                            ' </td>'+
                            '<td>'+
                                ' -'+
                            '</td>'+
                        '</tr>'+
                        '<tr >'+
                            ' <td colspan="2" class="border-bottom-0">'+
                                '<h6 class="m-0 text-right" id="tdesc">Billing Information:</h6>'+
                            '</td>'+
                            '<td class="font-size-18 m-0 fw-bold border-bottom-0" id="tval">'+
                                'Rp '+subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+''+
                            '</td>'+
                        '</tr>'+
                        paymentinput+
                    '</tbody>'+
                '</table>'
            )

            // if(data.detail.ifs.status == "Delivery"){

            //     $("#ftmod").html(
            //         '<div class="container">'+
            //             '<div class="row">'+
            //                 '<div class="col-6 text-start">'+
            //                     '<button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Close</button>'+
            //                 '</div>'+
            //                 '<div class="col-6 text-end">'+
            //                     '<button type="button" id="presubmit" class="btn btn-primary bg-gradient waves-effect" data-dismiss="modal">Submit</button>'+
            //                 '</div>'+
            //             '</div>'+
            //         '</div>'
            //     );
            // }

            // if(data.detail.ifs.status == "Received" || data.detail.ifs.status == "Completed" ){
            //     let subtotal = 0;
            //         for (l = 0; l < data.detail.dsl.length; l++) {
            //             subtotal += data.detail.dsl[l].pro_price * data.detail.dsl[l].pro_qty;
            //         }
            //     let pis = data.detail.ifs.payment;
            //     let as = (parseInt(subtotal)-parseInt(pis-data.detail.ifs.packaging_charge));
            //     let bs = (parseInt(as) / parseInt(subtotal))*100
            //     $("#td_tax").html("Tax ("+bs.toFixed(1)+"%)" )
            //     $("#td_tax_val").html("Rp ("+as.toFixed(0).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+")" )
            //     $("#tdesc").html("Payment")
            //     $("#tval").html("Rp "+pis.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
            // }

            // $('#viewSales').on('shown.bs.modal', function () {$("#payment").focus();});
            

            
            // $("#payment").on('input', function() {
            //     console.log("diinput");
            //     var masked = IMask(document.getElementById("payment"), {
            //         mask: "Rp. num",
            //         blocks: {
            //             num: {
            //                 mask: Number,
            //                 thousandsSeparator: " "
            //             }
            //         }
            //     })
            //     console.log(masked.unmaskedValue);
            //     if($('#payment').val().length > 4){
            //         console.log($('#payment').val())
            //         $('#payment').removeClass("is-invalid");
            //         $('#payment').addClass("is-valid");
            //         $('#paymentval').val(masked.unmaskedValue)
            //         let subtotal = 0;
            //         for (l = 0; l < data.detail.dsl.length; l++) {
            //             subtotal += data.detail.dsl[l].pro_price * data.detail.dsl[l].pro_qty;
            //         }
            //         let pi = masked.unmaskedValue;
            //         let a = (parseInt(subtotal)-parseInt(pi-data.detail.ifs.packaging_charge));
            //         let b = (parseInt(a) / parseInt(subtotal))*100
            //         console.log(b)
            //         if(a >= 0 ) {
            //             $('#profitstring').html("Rp. "+parseInt(a))
            //             $('#payment').removeClass("is-invalid");
            //             $('#payment').addClass("is-valid");
            //             $("#td_tax").html("Tax ("+b.toFixed(1)+"%)" )
            //             $("#td_tax_val").html("Rp ("+a.toFixed(0).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+")" )
            //         }else{
            //             $('#profitstring').html("Rp. "+parseInt(0))
            //             $('#payment').removeClass("is-valid");
            //             $('#payment').addClass("is-invalid");
            //         }
            //     }else{
            //         console.log($('#payment').val())
            //         $('#payment').removeClass("is-valid");
            //         $('#payment').addClass("is-invalid");
            //     }
            // });


            // $("#payment").keydown(function(event){
            //     if( (event.keyCode == 13)) {
            //         event.preventDefault();
            //         console.log("Enter SUBMIT")
            //         if($('.is-invalid').length == 0) {
            //             presubmit();
            //         }
            //       return false;
            //     }
            // });

            // $("#presubmit").on('click', function() {
            //     console.log("Click SUBMIT")
            //     console.log($('.is-invalid').length)
            //     if($('.is-invalid').length == 0) {
            //         presubmit();
            //     }
            // });

            
            // function presubmit() {
            //     if($('#payment').val().length > 4){
            //         $('#payment').removeClass("is-invalid");
            //         $('#payment').addClass("is-valid");
            //     }else{
            //         $('#payment').removeClass("is-valid");
            //         $('#payment').addClass("is-invalid");
            //     }
            
            //     if($('#payment').val().length > 4){
            //         console.log("SUBMITED")
            //         console.log($('#paymentval').val())
                    
            //         var s_id = data.detail.ifs.id_sales;
            //         var s_name = "Received";
            //         var s_paym = $('#paymentval').val();
            //         console.log(s_id,s_name,s_paym)
            //         to(s_id , s_name , s_paym)

            
            //     }else{
            //         console.log("Belum Input")
            //     }
            // }
        }

    })

    
}



  

  $("#salestabcontent").on('click', '.to-next', function() {
    console.log("AA");
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