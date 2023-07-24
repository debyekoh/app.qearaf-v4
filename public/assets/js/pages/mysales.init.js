
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
    renderSales(name)
    console.log(localStorage)
});

$(".nav-link").on('click', function() {
    // alert($(this).attr('id'));
    var a = $(this).attr('id');
    var regexPattern = /[^A-Za-z]/g;
    var name = $('button.nav-link.active > span.d-none.d-sm-block').text().replace(regexPattern, "");
    renderSales(name)
})

function renderSales(name) {
    $("#salestabcontent").remove();
    $("#tabcontent").append('<div id="salestabcontent"></div>');
    new gridjs.Grid({
        columns: [
            { 
                name: 'ID Sales',
                hidden: true,
            },{ 
                name: 'NO Sales',
                hidden: true,
            },{ 
                name: 'NO Resi',
                hidden: true,
            },{
            name: name,
            formatter: function(e) {
                var data_item = e[2]
                let itemdata = "";
                let paystatus = "";
                let salesstatus = "";
                let bill_value = "";
                let btn_goto = "";
                let btn_gocancel = "";
                let btn_goreturn = "";
                let btn_goedit = "";
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

                if(e[7]==1){
                    paystatus +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-2 rounded text-center">Online Payment <i class="mdi mdi-credit-card font-size-14 ms-1"></i></h5>' ;
                }
                if(e[7]==2){
                    paystatus +=
                        '<h5 class="font-size-14 mb-0 text-truncate w-xs p-0 fw-bold rounded text-center">Cash on Delivery <i class="mdi mdi-cash-multiple font-size-14 ms-1"></i></h5>' ;
                }

                
                
                const s_id = new String("'"+e[0]+"'");
                const s_name = new String("'"+e[8]+"'");
                const cancel = new String("'Cancel'");
                const goreturn = new String("'Return'");
                const goreceived = new String("'Received'");
                const toedit = new String(e[0].substr(0, 6)+e[0].substr(7, 1)+e[0].substr(9, 2)+e[0].substr(12));
                
                // if(e[8]!=null){
                //     btn_goedit +=
                //     '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    
                // }

                if(e[6]== "Process"){
                    salesstatus +=
                    '<span class="badge bg-warning bg-gradient fw-bold font-size-16">' + e[6] + '</span>';
                    btn_goedit +=
                    '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    btn_gocancel +=
                    '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                    // btn_goreturn +=
                    // '<li><a onclick="to('+s_id+','+goreturn+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-backup-restore font-size-16 text-danger me-1"></i> Return</a></li>';
                    btn_goto +=
                    '<li><a onclick="to('+s_id+','+s_name+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Go to ' + e[8] + '</a></li>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[5] + '</h5>';
                }

                if(e[6]== "Packaging"){
                    salesstatus +=
                    '<span class="badge bg-secondary bg-gradient fw-bold font-size-16">' + e[6] + '</span>';
                    btn_goedit +=
                    '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    btn_gocancel +=
                    '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                    // btn_goreturn +=
                    // '<li><a onclick="to('+s_id+','+goreturn+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-backup-restore font-size-16 text-danger me-1"></i> Return</a></li>';
                    btn_goto +=
                    '<li><a onclick="to('+s_id+','+s_name+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Go to ' + e[8] + '</a></li>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[5] + '</h5>';
                }

                if(e[6]== "Ready"){
                    salesstatus +=
                    '<span class="badge bg-info bg-gradient fw-bold font-size-16">' + e[6] + '</span>';
                    btn_goedit +=
                    '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    btn_gocancel +=
                    '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                    // btn_goreturn +=
                    // '<li><a onclick="to('+s_id+','+goreturn+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-backup-restore font-size-16 text-danger me-1"></i> Return</a></li>';
                    btn_goto +=
                    '<li><a onclick="to('+s_id+','+s_name+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Go to ' + e[8] + '</a></li>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[5] + '</h5>';
                }

                if(e[6]== "Delivery"){
                    salesstatus +=
                    '<span class="badge bg-primary bg-gradient fw-bold font-size-16">' + e[6] + '</span>';
                    btn_goedit +=
                    '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    // btn_gocancel +=
                    // '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                    btn_goreturn +=
                    '<li><a onclick="to('+s_id+','+goreturn+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-backup-restore font-size-16 text-danger me-1"></i> Return</a></li>';
                    btn_goto +=
                    '<li><a  onclick="vito('+s_id+','+goreceived+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Go to ' + e[8] + '</a></li>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[5] + '</h5>';
                    
                }

                if(e[6]== "Received"){
                    salesstatus +=
                    '<span class="badge bg-success bg-gradient fw-bold font-size-16">' + e[6] + '</span>';
                    btn_goedit +=
                    '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    // btn_gocancel +=
                    // '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                    btn_goreturn +=
                    '<li><a onclick="to('+s_id+','+goreturn+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-backup-restore font-size-16 text-danger me-1"></i> Return</a></li>';
                    btn_goto +=
                    '<li><a onclick="to('+s_id+','+s_name+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Go to ' + e[8] + '</a></li>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[11] + '</h5>';
                }

                if(e[6]== "Completed"){
                    salesstatus +=
                    '<span class="badge bg-dark bg-gradient fw-bold font-size-16">' + e[6] + '</span>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[11] + '</h5>';
                    // btn_goedit +=
                    // '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>';
                    // btn_gocancel +=
                    // '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>';
                    // btn_goreturn +=
                    // '<li><a onclick="to('+s_id+','+goreturn+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-backup-restore font-size-16 text-danger me-1"></i> Return</a></li>';
                    // btn_goto +=
                    // '<li><a onclick="to('+s_id+','+s_name+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-page-next-outline font-size-16 text-success me-1"></i> Go to ' + e[8] + '</a></li>';
                }

                if(e[6]== "Cancel" || e[6]== "Return"){
                    salesstatus +=
                    '<span class="badge bg-light bg-gradient fw-bold font-size-16 text-dark">' + e[6] + '</span>';
                    bill_value +=
                    '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[5] + '</h5>';
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
                                '<span class="badge bg-light bg-gradient fw-bold font-size-16 text-dark">' + e[10] + '</span>'+
                                // '<span class="badge bg-light bg-gradient fw-bold font-size-16 text-dark">' + e[6] + '</span>'+
                                // '<p class="fw-bold fst-italic font-size-14 text-truncate mb-0">#' + e[1] + '</p>'+
                                // '<p class="fw-bold text-secondary mb-0" style="font-size:10px;"><span class="badge bg-light bg-gradient fw-bold font-size-16 text-dark">' + e[6] + '</span></p>'+
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
                                            '<img src="./assets/images/services/' + e[3] + '" style="height: 1.4rem; width: auto;" class="img-fluid" alt="' + e[3] + '">'+
                                            '<p class="fw-bold fst-italic text-truncate mb-0">' + e[4] + '</p>'+
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                                            // '<h5 class="font-size-18 fw-bold mb-0 text-truncate w-xs p-1 rounded text-center">' + e[5] + '</h5>'+
                                            bill_value +
                                            paystatus +
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4 my-1">'+
                                    '<div class="d-flex align-items-center p-0">'+
                                        '<div class="flex-grow-1 ms-3 overflow-hidden text-center">'+
                                            salesstatus +
                                        '</div>'+
                                        '<div class="flex-grow-1 ms-3 text-center">'+
                                            '<span>'+
                                                '<div class="dropdown">'+
                                                    '<button type="button" class="btn btn-soft-dark waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">'+
                                                        '<i class="mdi mdi-format-list-bulleted-square font-size-16 align-middle me-2"></i> Detail'+
                                                    '</button>'+
                                                    '<ul class="dropdown-menu dropdown-menu-end" style="">'+
                                                        // btn_vito +
                                                        // '<li><a  onclick="vito('+s_id+')" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                                                        '<li><a href="detail/view/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-arrow-expand-all font-size-16 me-1"></i> View</a></li>'+
                                                        // '<li><a href="editsales/'+toedit+'" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-pencil font-size-16 text-primary me-1"></i> Edit</a></li>'+
                                                        // '<li><a onclick="to('+s_id+','+cancel+')" role="button" role="button" class="dropdown-item fw-bold"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Cancel</a></li>'+
                                                        btn_goedit +
                                                        btn_gocancel +
                                                        btn_goreturn +
                                                        btn_goto +
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
            url: './mysales/show/'+name,
            then: data => data.results.map(sales => [
                    sales.id_sales,            
                    sales.no_sales,
                    sales.no_resi,
                [   sales.id_sales ,            // 0 //
                    sales.no_sales ,            // 1 //
                    sales.item_detail ,         // 2 //
                    sales.delivery_services ,   // 3 //
                    sales.no_resi,              // 4 //
                    sales.bill,                 // 5 //
                    sales.statussales,          // 6 //
                    sales.paymethode,           // 7 //
                    sales.nextstatus,           // 8 //
                    sales.id_sales_noslash,     // 9 //
                    sales.shop_detail,          // 10 //
                    sales.payment               // 11 //
                ],
                    sales.shop_detail
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
                            renderSales(name)
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
    $('#viewSales').modal('show');
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
        url: "./mysales/detail",
        dataType: "JSON",
        data: {
            id: s_id,
            // name: s_name,
        },
        success: function(data) {
            console.log(data)
            $("#shp").html(data.detail.ifs.name_shop +" "+ data.detail.ifs.marketplace);
            $("#nos").html("#"+data.detail.ifs.no_sales);
            $("#ids").html(data.detail.ifs.id_sales);
            let itemrow = '';
            let subtotal = 0;
            for (l = 0; l < data.detail.dsl.length; l++) {
                // var a = data.detail.dsl[l].pro_price * data.detail.dsl[l].pro_qty
                subtotal += data.detail.dsl[l].pro_price * data.detail.dsl[l].pro_qty;
                itemrow += 
                    '<tr>'+
                        '<th scope="row">'+
                            // ' <div>'+
                                '<img src="assets/images/product/'+data.detail.dsl[l].pro_img+'" alt="" class="rounded avatar-md">'+
                            // '</div>'+
                        '</th>'+
                        '<td>'+
                            ' <div>'+
                                '<h5 class="text-truncate fw-bold font-size-14 mb-0">'+data.detail.dsl[l].pro_name+' '+data.detail.dsl[l].pro_model+''+
                                ' <p class="text-truncate mb-0">'+data.detail.dsl[l].pro_qty+' x Rp '+data.detail.dsl[l].pro_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</p>'+
                            '</div>'+
                        ' </td>'+
                        ' <td>Rp '+(data.detail.dsl[l].pro_qty * data.detail.dsl[l].pro_price).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</td>'+
                    '</tr>'
                ;
            }
            let tax = ((10/100)*subtotal).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            let pckgdesc = '';
            if(data.detail.ifs.packaging == 0){pckgdesc = "No Packaging"}
            if(data.detail.ifs.packaging == 1){pckgdesc = "Small 17x9x6cm"}
            if(data.detail.ifs.packaging == 2){pckgdesc = "Long 8x8x30cm"}
            $("#tabel_viewsales").html(
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
                        '<tr>'+
                            '<td colspan="2">'+
                                '<h6 class="m-0 text-right">Shipping:</h6>'+
                                '<p class="text-muted mb-0">'+
                                '<img src="./assets/images/services/'+data.detail.ifs.image_services+'" alt="'+data.detail.ifs.image_services+'" style="height: 1.4rem; width: auto;" class="img-fluid">'+
                                '</p>'+
                            ' </td>'+
                            '<td>'+
                                ' Free'+
                            '</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td colspan="2">'+
                                '<h6 class="m-0 text-right" id="td_tax">Estimated Tax (10%):</h6>'+
                            ' </td>'+
                            '<td class="text-danger" id="td_tax_val">'+
                                'Rp ('+tax+')'+
                            '</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td colspan="2">'+
                                '<h6 class="m-0 text-right">Packaging:</h6>'+
                                '<p class="text-muted mb-0">'+pckgdesc+'</p>'+
                            ' </td>'+
                            '<td>'+
                                ' Rp '+data.detail.ifs.packaging_charge.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+''+
                            '</td>'+
                        '</tr>'+
                        '<tr class="border-bottom-0">'+
                            '<td colspan="2">'+
                                '<h6 class="m-0 text-right">Discount:</h6>'+
                            ' </td>'+
                            '<td>'+
                                ' Free'+
                            '</td>'+
                        '</tr>'+
                        '<tr >'+
                            ' <td colspan="2" class="border-bottom-0">'+
                                '<h6 class="m-0 text-right" id="tdesc">Billing Information:</h6>'+
                            '</td>'+
                            '<td class="font-size-18 m-0 fw-bold border-bottom-0" id="tval">'+
                                'Rp '+((subtotal-((10/100)*subtotal))+parseInt(data.detail.ifs.packaging_charge)).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+''+
                            '</td>'+
                        '</tr>'+
                        paymentinput+
                    '</tbody>'+
                '</table>'
            )

            // const s_id = new String("'"+data.detail.ifs.id_sales+"'");
            // const s_name = new String("'Completed'");
            if(data.detail.ifs.status == "Delivery"){

                $("#ftmod").html(
                    '<div class="container">'+
                        '<div class="row">'+
                            '<div class="col-6 text-start">'+
                                '<button type="button" class="btn btn-secondary bg-gradient waves-effect" data-bs-dismiss="modal">Close</button>'+
                            '</div>'+
                            '<div class="col-6 text-end">'+
                                '<button type="button" id="presubmit" class="btn btn-primary bg-gradient waves-effect" data-dismiss="modal">Submit</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
            }

            if(data.detail.ifs.status == "Received" || data.detail.ifs.status == "Completed" ){
                let subtotal = 0;
                    for (l = 0; l < data.detail.dsl.length; l++) {
                        subtotal += data.detail.dsl[l].pro_price * data.detail.dsl[l].pro_qty;
                    }
                let pis = data.detail.ifs.payment;
                let as = (parseInt(subtotal)-parseInt(pis-data.detail.ifs.packaging_charge));
                let bs = (parseInt(as) / parseInt(subtotal))*100
                $("#td_tax").html("Tax ("+bs.toFixed(1)+"%)" )
                $("#td_tax_val").html("Rp ("+as.toFixed(0).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+")" )
                $("#tdesc").html("Payment")
                $("#tval").html("Rp "+pis.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
            }

            $('#viewSales').on('shown.bs.modal', function () {$("#payment").focus();});
            

            
            $("#payment").on('input', function() {
                console.log("diinput");
                var masked = IMask(document.getElementById("payment"), {
                    mask: "Rp. num",
                    blocks: {
                        num: {
                            mask: Number,
                            thousandsSeparator: " "
                        }
                    }
                })
                console.log(masked.unmaskedValue);
                if($('#payment').val().length > 4){
                    console.log($('#payment').val())
                    $('#payment').removeClass("is-invalid");
                    $('#payment').addClass("is-valid");
                    $('#paymentval').val(masked.unmaskedValue)
                    let subtotal = 0;
                    for (l = 0; l < data.detail.dsl.length; l++) {
                        subtotal += data.detail.dsl[l].pro_price * data.detail.dsl[l].pro_qty;
                    }
                    let pi = masked.unmaskedValue;
                    let a = (parseInt(subtotal)-parseInt(pi-data.detail.ifs.packaging_charge));
                    let b = (parseInt(a) / parseInt(subtotal))*100
                    console.log(b)
                    if(a >= 0 ) {
                        $('#profitstring').html("Rp. "+parseInt(a))
                        $('#payment').removeClass("is-invalid");
                        $('#payment').addClass("is-valid");
                        $("#td_tax").html("Tax ("+b.toFixed(1)+"%)" )
                        $("#td_tax_val").html("Rp ("+a.toFixed(0).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+")" )
                    }else{
                        $('#profitstring').html("Rp. "+parseInt(0))
                        $('#payment').removeClass("is-valid");
                        $('#payment').addClass("is-invalid");
                    }
                }else{
                    console.log($('#payment').val())
                    $('#payment').removeClass("is-valid");
                    $('#payment').addClass("is-invalid");
                }
            });


            $("#payment").keydown(function(event){
                if( (event.keyCode == 13)) {
                    event.preventDefault();
                    console.log("Enter SUBMIT")
                    if($('.is-invalid').length == 0) {
                        presubmit();
                    }
                  return false;
                }
            });

            $("#presubmit").on('click', function() {
                console.log("Click SUBMIT")
                console.log($('.is-invalid').length)
                if($('.is-invalid').length == 0) {
                    presubmit();
                }
            });

            
            function presubmit() {
                if($('#payment').val().length > 4){
                    $('#payment').removeClass("is-invalid");
                    $('#payment').addClass("is-valid");
                }else{
                    $('#payment').removeClass("is-valid");
                    $('#payment').addClass("is-invalid");
                }
            
                if($('#payment').val().length > 4){
                    console.log("SUBMITED")
                    console.log($('#paymentval').val())
                    
                    var s_id = data.detail.ifs.id_sales;
                    var s_name = "Received";
                    var s_paym = $('#paymentval').val();
                    console.log(s_id,s_name,s_paym)
                    to(s_id , s_name , s_paym)

            
                }else{
                    console.log("Belum Input")
                }
            }

            //   function to(s_id , s_name) {

            //   }

            // $("#payment").trigger("focus");

            
            
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