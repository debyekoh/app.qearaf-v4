// flatpickr("#date_purchase");
// function generateUUID() {
//     var d = new Date().getTime();
//     var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now() * 1000)) || 0;
//     return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
//         var r = Math.random() * 16;
//         if (d > 0) {
//             r = (d + r) % 16 | 0;
//             d = Math.floor(d / 16);
//         } else {
//             r = (d2 + r) % 16 | 0;
//             d2 = Math.floor(d2 / 16);
//         }
//         return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
//     });
// }
function formatDate(d)
{
    var month = d.getMonth();
    var day = d.getDate().toString().padStart(2, '0');
    var year = d.getFullYear();
    year = year.toString().substr(-2);
    month = (month + 1).toString().padStart(2, '0');
    // return month + day + year;
    return year + month + day;
}

$(document).ready(function() {
    // var d = new Date();
    // var string = formatDate(d)+"/S/"+generateUUID().replace("-", "").substring(0, 8);
    // $('#id_purchase').val(string.toUpperCase());
    // $('#npo').html("#"+string.toUpperCase());
    console.log($("#BaseUrl").val());

    $(window).keydown(function(event){
        if( (event.keyCode == 13)) {
          event.preventDefault();
          $("#presubmit" ).trigger( "click" );
          return false;
        }
      });

});




$("#presubmit").on('click', function() {
    if($('#purch_category').val() == null){$('#purch_category').addClass("is-invalid"); $('#purch_category').addClass("inewpurchaseinfo-is-invalid");}else{$('#purch_category').removeClass("is-invalid");}
    if($('#no_purchase').val() == ""){$('#no_purchase').addClass("is-invalid");$('#no_purchase').addClass("inewpurchaseinfo-is-invalid");}else{$('#no_purchase').removeClass("is-invalid");}
    if($('#date_purchase').val() == ""){$('#date_purchase').addClass("is-invalid");$('#date_purchase').addClass("inewpurchaseinfo-is-invalid");}else{$('#date_purchase').removeClass("is-invalid");}
    if($('#supplier').val() == null){$('#supplier').addClass("is-invalid"); $('#supplier').addClass("inewpurchaseinfo-is-invalid");}else{$('#supplier').removeClass("is-invalid");}
    if($(".norow").length > 0){
        $('.productinfo ').addClass("bg-danger"); 
        $('#adnpm').addClass("btn-outline-danger");
        document.querySelector("#li2").style.borderColor = "red";}
        else{
            if($('.input-is-invalid').length == 0){$('.productinfo').removeClass("bg-danger");document.querySelector("#li2").style.borderColor = "#1f58c7";}else{$('.productinfo').addClass("bg-danger");document.querySelector("#li2").style.borderColor = "red";}
        }
    if($('#payment').val() == ""){
        $('#payment').addClass("is-invalid");
    }else{
        $('#payment').removeClass("is-invalid");
    }
    if($('#paysource').val() == null){
        $('#paysource').addClass("is-invalid");
        $('.paymentfrom').addClass("bg-danger");
    }else{
        $('#paysource').removeClass("is-invalid");
        $('.paymentfrom').addClass("bg-danger");
    }
    if($('#ewalletmarketplace').val() == null){
        $('#ewalletmarketplace').addClass("is-invalid");
    }else{
        $('#ewalletmarketplace').removeClass("is-invalid");
    }
    
    if($("input[name='paymethod']:checked").val() == null){
        console.log("SALAH"); 
        $('.paymethod').addClass("bg-danger is-invalid text-white");
        $('.payinfo').addClass("bg-danger");
    }else{
        console.log("BENAR"); 
        $('.paymethod').removeClass("bg-danger is-invalid text-white");
        $('.payinfo').removeClass("bg-danger");
    }
    
    if($('.inewpurchaseinfo-is-invalid').length != 0){$('.newpurchaseinfo').addClass("bg-danger");document.querySelector("#li1").style.borderColor = "red";} 
    console.log("test "+$('.input-is-invalid').length);

    $('#listpurchaseproduct input[type=number]').each(function() {
        if ($(this).val() != 0 ) {
            $(this).removeClass("is-invalid");
            $(this).removeClass("input-is-invalid");
            console.log('all inputs filled');
        }
        else{
            console.log('theres an zero qty');
            $(this).addClass("is-invalid");
            $(this).addClass("input-is-invalid");
        }
    });
    
    if($('.is-invalid').length == 0){
        Swal.fire({
            title: 'Are you sure?',
            html: "You want to <b>Save</b> Purchase No:<b>"+$('#no_purchase').val()+"</b>",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, <b>Change</b> it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                html: "No Purchase: "+$('#no_purchase').val()+" Success to <b>Change</b>",
                showConfirmButton: false,
                timer: 500,
                timerProgressBar: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                        $("#submit" ).trigger( "click" );
                        
                    }
                })
                
            }
        })
    }

    
});

//\\//\\

$("#no_purchase").on('input', function() {
    if($(this).val() != null){$('.no_purchase').removeClass("is-invalid");$('.no_purchase').removeClass("inewpurchaseinfo-is-invalid");}
    if($('.inewpurchaseinfo-is-invalid').length == 0){$('.newpurchaseinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'checkpurchase',
        data: {
            nopurchase: $('#no_purchase').val(),
        },
        
        success: function(respone) {
                console.log(respone.status);
                if(respone.status == "error"){$('#no_purchase').addClass("is-invalid");$('#no_purchase').addClass("inewpurchaseinfo-is-invalid");$('.no_purchase-invalid-feedback').text("No Purchase Already Exist.");}
                else
                {$('#no_purchase').removeClass("is-invalid");$('.no_purchase-invalid-feedback').text("Please Fill in No Purchase.");}
            }
        });
    }
);
$('#purch_category').change(function pcchange() {
    if($(this).val() != null){$('.purch_category').removeClass("is-invalid");$('.purch_category').removeClass("inewpurchaseinfo-is-invalid");}
    if($('.inewpurchaseinfo-is-invalid').length == 0){$('.newpurchaseinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
    let pcid = $(this).val();
    let spel = "";
    console.log(pcid)
    $("#supplier option").each(function () {if (this.defaultSelected) {this.selected = true; return; } else {this.selected = false;}});
    if(pcid == 1) {
        $('.op_datasupplier').each(function() {
            $('.op_datasupplier').removeAttr("hidden")
        })
        $('.op_datashop').each(function() {
            $('.op_datashop').attr("hidden",true)
        })
        $('.op_dataconsumable').each(function() {
            $('.op_dataconsumable').attr("hidden",true)
        })
    }
    if(pcid == 2) {
        $('.op_datasupplier').each(function() {
            $('.op_datasupplier').attr("hidden",true)
        })
        $('.op_datashop').each(function() {
            $('.op_datashop').removeAttr("hidden")
        })
        $('.op_dataconsumable').each(function() {
            $('.op_dataconsumable').attr("hidden",true)
        })
    }
    if(pcid == 3) {
        $('.op_datasupplier').each(function() {
            $('.op_datasupplier').attr("hidden",true)
        })
        $('.op_datashop').each(function() {
            $('.op_datashop').attr("hidden",true)
        })
        $('.op_dataconsumable').each(function() {
            $('.op_dataconsumable').removeAttr("hidden")
        })
    }
    $(".listpro").remove();
    $(".listprosummary").remove();
    if($('.norow').length == 0){$('#listpurchaseproduct > tbody:last-child').append('<tr class="norow"><td colspan="4" class="text-center">-- NoProduct --</td></tr>')}
    if($('.norowsummary').length == 0){$(".lstr").before('<tr class="norowsummary"><td colspan="3" class="text-center">-- NoProduct --</td></tr>')}
    
});

$('#date_purchase').change(function dpchange() {
    if($(this).val() != null){$('.date_purchase').removeClass("is-invalid");$('.date_purchase').removeClass("inewpurchaseinfo-is-invalid");$('#no_purchase').removeClass("is-invalid");$('#no_purchase').removeClass("inewpurchaseinfo-is-invalid")}
    if($('.inewpurchaseinfo-is-invalid').length == 0){$('.newpurchaseinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
    
    var inputDate = $(this).val();
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'mypurchase/count',
        data: {
            date: inputDate,
        },
        success: function(respone) {
            var set_no = respone.set_no
            function generateUUID() {
                var d = new Date(inputDate);
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
            var d = new Date(inputDate);
            var string = formatDate(d)+"/P/"+set_no+"/"+generateUUID().replace("-", "").substring(0, 8);
            $('#no_purchase').val(string.toUpperCase());
            $('#npo').html("#"+string.toUpperCase());

            $.ajax({
                type: "POST",
                url: $("#BaseUrl").val()+'checkpurchase',
                data: {
                    nopurchase: string,
                },
                
                success: function(respone) {
                        console.log(respone.status);
                        if(respone.status == "error"){$('#no_purchase').addClass("is-invalid");$('#no_purchase').addClass("inewpurchaseinfo-is-invalid");$('.no_purchase-invalid-feedback').text("No Purchase Already Exist.");}
                        else
                        {$('#no_purchase').removeClass("is-invalid");$('.no_purchase-invalid-feedback').text("Please Fill in No Purchase.");}
                    }
                });
            
        }
    });


});
$('#supplier').change(function spchange() {
    if($(this).val() != null){$('.supplier').removeClass("is-invalid");$('.supplier').removeClass("inewpurchaseinfo-is-invalid");}
    if($('.inewpurchaseinfo-is-invalid').length == 0){$('.newpurchaseinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
});



//\\//\\

$(document).on('keyup mouseup', '.qtyinput', function() {         
    $('#listpurchaseproduct input[type=number]').each(function() {
        if ($(this).val() != 0 ) {
            $(this).removeClass("is-invalid");
            $(this).removeClass("input-is-invalid");
            $("#payment").removeClass("is-invalid");
        }
        else{
            $(this).addClass("is-invalid");
            $(this).addClass("input-is-invalid");
            $("#payment").addClass("is-invalid");
        }
        $('#listpurchaseproduct input[type=number]').each(function() {
            const idrow = $(this).attr('id').substring(4)
            const valrow = $(this).val()
            const pricerow = $('#price'+$(this).attr('id').substring(3)+'').val()
            calculate_1(idrow,valrow,pricerow)
    
    });
        
    }); 

    if($('.input-is-invalid').length == 0){$('.productinfo').removeClass("bg-danger");document.querySelector("#li2").style.borderColor = "#1f58c7";}else{$('.productinfo').addClass("bg-danger");document.querySelector("#li2").style.borderColor = "red";}                                                                                                           
});
  

$('.ipaymethod').on('click',function() {
    console.log("BB");
    console.log($(this).val());
    
    $('.paymethod').removeClass("bg-danger is-invalid text-white");
    $('.payinfo').removeClass("bg-danger");
    
    if($(this).val() == 1){
        document.getElementById("li3").style.borderColor = "#1f58c7";
        $("#li3pi").remove()
        $("#ol").append(
            '<li class="checkout-item pb-1" id="li4">'+
                '<div class="avatar checkout-icon p-1">'+
                    '<div class="avatar-title paymentfrom rounded-circle bg-primary">'+
                        '<h5 class="text-white font-size-16 mb-0">04</h5>'+
                    '</div>'+
                '</div>'+
                '<div class="feed-item-list">'+
                    '<div>'+
                        '<h5 class="font-size-20 pt-2 mb-2 text-muted"><u>Payment From</u></h5>'+
                        '<div class="mb-2">'+
                           ' <div class="row" id="li4sel">'+
                                '<div class="col-lg-6">'+
                                    '<div id="" class="form-floating mb-3">'+
                                        '<select class="form-select font-size-16 fw-bold sourcepayment" name="paysource" id="paysource" aria-label="Floating label select example">'+
                                            '<option selected disabled value>Select Source Payment</option>'+
                                            '<option value="ewallet">E-Wallet Marketplace</option>'+
                                            '<option value="balanceaccount">Balance QEARAF.COM</option>'+
                                        '</select>'+
                                        '<label for="deliveryservices">Payment Source</label>'+
                                        '<div class="invalid-feedback">'+
                                            'Please choose Payment Source.'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row justify-content-end" id="li4pi">'+
                                '<div class="col-lg-6 ">'+
                                    '<div class="form-floating">'+
                                        '<input type="text" min="4" class="form-control font-size-18 sourcepayment fw-bold" id="payment" name="payment" placeholder="Input Payment" disabled>'+
                                        '<label for="payment">Payment</label>'+
                                        '<div class="invalid-feedback">'+
                                            'Please Fill in Payment.'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-lg-6 mt-3">'+
                                    '<div class="form-check form-check-inline p-0 mx-0">'+
                                        '<input type="checkbox" id="switch1" switch="none" checked="">'+
                                        '<label for="switch1" data-on-label="On" data-off-label="Off"></label>'+
                                    '</div>'+
                                    '<span class="checkboxlabel fw-bold align-top">Payment Auto Input</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</li>'
        );
        spayonhange()
        console.log($("#li4pi"))
    }
    if($(this).val() == 3){
        
        $("#li4").remove()
        document.getElementById("li3").style.borderColor = null;
        console.log(document.getElementById('li3pi'))
        if(document.getElementById('li3pi')==null){
            $("#pi3").append(
                '<div class="row justify-content-end" id="li3pi">'+
                    '<div class="col-lg-6 ">'+
                        '<div class="form-floating">'+
                            '<input type="text" min="4" class="form-control font-size-18 fw-bold" id="payment" name="payment" placeholder="Input Payment" disabled>'+
                            '<label for="payment">Payment</label>'+
                            '<div class="invalid-feedback">'+
                                'Please Fill in Payment.'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-lg-6 mt-3">'+
                        '<div class="form-check form-check-inline p-0 mx-0">'+
                            '<input type="checkbox" id="switch1" switch="none" checked="">'+
                            '<label for="switch1" data-on-label="On" data-off-label="Off"></label>'+
                        '</div>'+
                        '<span class="checkboxlabel fw-bold align-top">Payment Auto Input</span>'+
                    '</div>'+
                '</div>'
            )

            
            
        }
        
    }

    $("#payment").val($("#paymentval").val());
    var masked = IMask(document.getElementById("payment"), {
        mask: "Rp. num",
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: " "
            }
        }
    })
    addeventcheckuncheck();
});

$('#paysource').change(function spayhange() {
    console.log($(this).val());
    $('.sourcepayment').each(function() {
        if ($(this).val() != 0 ) {
            $(".paymentfrom").removeClass("bg-danger");
        }
        else{
            // console.log('theres an zero qty');
            // $(".paymentfrom").addClass("bg-danger");
            // $(this).addClass("input-is-invalid");
            // return false
        }
    });
})
$('#ewalletmarketplace').change(function ewallchange() {
    // console.log($("#ewalletmarketplace").val());
    // $(this).removeClass("is-invalid")
    console.log($(this).val());
    $('.sourcepayment').each(function() {
        if ($(this).val() != 0 ) {
            $(".paymentfrom").removeClass("bg-danger");
            // $(this).removeClass("input-is-invalid");
            // console.log('all inputs filled');
        }
        else{
            // console.log('theres an zero qty');
            // $(".paymentfrom").addClass("bg-danger");
            // $(this).addClass("input-is-invalid");
            // return false
        }
    });
})
const id_shop = new String('id_shop');
const name_shop = new String('name_shop');
const marketplace = new String('marketplace');

function spayonhange(){
    document.getElementById('paysource').addEventListener('change',function spayhange() {
        console.log(id_shop)
        console.log($(this).val());
        if($(this).val() == "ewallet"){
            $.ajax({
                type: "GET",
                url: $("#BaseUrl").val()+'listmarketplace',
                success: function(data) {
                    $('#paysource').removeClass("is-invalid")
                    console.log(data.l[0])

                    let selop = "";
                    for (i = 0; i < data.l.length; i++) {
                        selop += 
                        '<option class="op_datashop" value="'+data.l[i]['id_shop']+'" >'+data.l[i]['name_shop']+' - '+data.l[i]['marketplace']+'</option>'
                        ;
                    }

                    console.log(selop)

                    $("#li4sel").append(
                        '<div class="col-lg-6" id="li4ewallet">'+
                            '<div id="" class="form-floating mb-3">'+
                                '<select class="form-select font-size-16 fw-bold sourcepayment" name="ewalletmarketplace" id="ewalletmarketplace" aria-label="Floating label select example">'+
                                    "<option selected disabled value>Select your E-wallet Marketplace</option>"+
                                    selop +
                                '</select>'+
                                '<label for="deliveryservices">E-wallet Marketplace</label>'+
                                '<div class="invalid-feedback">'+
                                    'Please choose E-wallet Marketplace.'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    )

                    $('#ewalletmarketplace').change(function ewallchange() {
                        $('#ewalletmarketplace').removeClass("is-invalid");
                        console.log($(this).val()+"AAAAA");
                        
                    })
                    $('.sourcepayment').each(function() {
                        if ($(this).val() != 0 ) {
                            $(".paymentfrom").removeClass("bg-danger");
                            // $(this).removeClass("input-is-invalid");
                            // console.log('all inputs filled');
                        }
                        else{
                            // console.log('theres an zero qty');
                            // $(".paymentfrom").addClass("bg-danger");
                            // $(this).addClass("input-is-invalid");
                            // return false
                        }
                    });
                }
            });
        }
        if($(this).val() == "balanceaccount"){
            $("#li4ewallet").remove()
        }


    }
)}


$("#adnpm").on('click', function() {
    console.log("cek"+$('#purch_category').val())
    // var values = [];purch_category
    // $("input[name='iprorow[]']").each(function() {
    //     values.push($(this).val());
    // });
    // var maxrow = Math.max.apply(Math, values);
    // console.log(maxrow);
    var category = $('#purch_category').val()
    if($('#purch_category').val() === null){
        $('#purch_category').addClass("is-invalid"); 
    }
    if($('#date_purchase').val() === ""){
        $('#date_purchase').addClass("is-invalid");
    }
    console.log($('#date_purchase').val());
    if($('#date_purchase').val() != "" && $('#purch_category').val() != ""){
        // console.log("Open modal & List Product");
        // $('#supplier').removeClass("is-invalid");
        $('#addNewProduct').modal('show');
        // $("#table-gridjs").empty();
        $("#table-gridjs").remove();
        $("#divtbl").append('<div id="table-gridjs"></div>');
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
                    return gridjs.html('<img src="'+$("#BaseUrl").val()+'assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-md rounded p-1">')
                    // return gridjs.html('<img src="'+$("#BaseUrl").val()+'assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar rounded-circle img-thumbnail me-3">')
                }
            }, { 
                name: 'SKU',
                hidden: true,
            }, {
                name: "Description",
                formatter: function(e) {
                    // return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                    return gridjs.html('<h5 class="text-start font-size-12">' + e[0] + '</h5><p class="text-start font-size-12 text-muted mb-0">' + e[1] + "</p>")
                }
            }, {
                name: "Stock",
                formatter: function(e) {
                    // return gridjs.html(
                    //         '<li class="list-inline-item">' +
                    //             '<a href="product/'+ e +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bxs-detail font-size-12"></i></a>'+
                    //         '</li>' 
                    //     )
                        if(e!=0){
                        return gridjs.html(e)}else{
                        return gridjs.html('<span class="stock badge rounded-pill bg-soft-danger text-danger fw-bold font-size-14">' + e + ' Pcs</span>')}
                        
                }
            }, {
                name: "Select",
                formatter: function(e) {
                    // return gridjs.html(
                    //         '<li class="list-inline-item">' +
                    //             '<a href="product/'+ e +'" id="btnEdit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-3 btn btn-sm btn-soft-dark btn-rounded waves-effect waves-dark" data-bs-original-title="Edit" aria-label="Edit"><i class="bx bxs-detail font-size-12"></i></a>'+
                    //         '</li>' 
                    //     )
                        const string4 = new String("'"+e[1]+"'");
                        // if(e[0]!=0){
                        return gridjs.html(
                            '<button type="button" onclick="addProduct('+string4+')" class="btn btn-sm btn-soft-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Add">'+
                                '<i class="mdi mdi-plus-box-multiple-outline font-size-12 align-middle me-2"></i> Add'+
                            '</button>'
                        )
                        // }else{
                        // return gridjs.html(
                        //     '<button type="button" class="btn btn-sm btn-soft-danger waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Add">'+
                        //         '<i class="mdi mdi-close-box-multiple-outline font-size-12 align-middle me-2"></i> Kosong'+
                        //     '</button>'
                        // )}
                        
                }
            }],
            pagination: {
                limit: 10
            },
            sort: !0,
            search: {
                selector: (cell, rowIndex, cellIndex) => cellIndex === 0 ? cell.skuno : cell
              },
            server: {
                url: $("#BaseUrl").val()+'listproductp/'+category,
                then: data => data.results.map(product => [product.image, product.skuno,[product.name+' '+product.model,product.skuno], product.current_stock, [product.current_stock,product.skuno]])
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
    }
    $('#addNewProduct').on('shown.bs.modal', function () {$(".gridjs-search-input").focus();});
});

function addProduct(sku) {
    // alert("I want this to appear after the modal has opened! "+ sku);
    var values = [];
    $("input[name='iprorow[]']").each(function() {
        values.push($(this).val());
    });
    if(values.length != 0){
        var maxrow = Math.max.apply(Math, values);
        var nextiprorow = maxrow + 1;
    } else {
        var nextiprorow = 0;
    }
    
    console.log(sku +" Selected Product");
    if ($("#listpurchaseproduct > tbody > tr").hasClass(sku)) {
        Swal.fire({
        icon: 'error',
        title: 'Product Already Exist!',
        })
    } else {
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'selectedPurch',
        data: {
            sku: sku,
        },
        
        success: function(respone) {
                console.log("next: "+nextiprorow);
                console.log("Modal Closed");
                $('#adnpm').removeClass("btn-outline-danger");

                $('#addNewProduct').modal('hide');
                if ($("#listpurchaseproduct > tbody > tr").hasClass("norow")) {
                    $(".norow").remove();
                }
                if ($("#summarytable > tbody > tr").hasClass("norowsummary")) {
                    $(".norowsummary").remove();
                }
                console.log("Norow Remove");
                console.log(respone.results);
                const rupiah = (number)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(number);
                }
                const stringrow = new String("'R"+nextiprorow+"'");
                $('#listpurchaseproduct > tbody:last-child').append(
                    '<tr id="R'+nextiprorow+'" class="listpro rowpropurchase '+sku+'">'+
                        '<th scope="row"><img src="'+$("#BaseUrl").val()+'assets/images/product/'+respone.results.image+'" alt="product-img" title="product-img" class="avatar-md"></th>'+
                        '<td>'+
                            '<h5 class="text-truncate mb-0"><a href="javascript: void(0);" class="font-size-14 text-dark">'+respone.results.name+'</a></h5>'+
                            '<p class="text-muted mb-0">SKU: '+sku+'</p>'+
                            '<p class="text-muted mb-0">@Rp '+respone.results.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</p>'+
                        '</td>'+
                        '<td >'+
                            '<input class="prorow" type="text" name="iprorow[]" value="'+nextiprorow+'" hidden></input>'+
                            '<input class="form-control" type="text" name=proid[] placeholder="0" value="'+respone.results.proid+'" style="display:none;">'+
                            '<input class="form-control" type="text" name=proimg[] placeholder="0" value="'+respone.results.image+'" style="display:none;">'+
                            '<input class="form-control" type="text" id="priceR'+nextiprorow+'" name=price[] placeholder="0" value="'+respone.results.price+'" style="display:none;">'+
                            '<input class="form-control qtyinput" id="qtyR'+nextiprorow+'" type="number" min="0" name=qty[] placeholder="0" value="0">'+
                        '</td>'+
                        '<td class="text-center"><button type="button" onclick="delProduct('+stringrow+')" class="btn btn-soft-danger waves-effect waves-light"><i class="mdi mdi-trash-can"></i></button></td>'+
                    '</tr>'
                );

                $(".lstr").before(
                    '<tr id="RS'+nextiprorow+'" class="listprosummary rowpropurchasesummary '+sku+'">'+
                        '<th scope="row"><img src="'+$("#BaseUrl").val()+'assets/images/product/'+respone.results.image+'" alt="'+respone.results.image+'" title="'+respone.results.image+'" class="avatar-md"></th>'+
                        '<td>'+
                        '<h5 class="text-truncate mb-0"><a href="javascript: void(0);" class="font-size-14 text-dark">'+respone.results.name+'</a></h5>'+
                            '<p class="text-muted mb-0 RSprice" id="RSprice'+nextiprorow+'" hidden>'+respone.results.price+'</p>'+
                            '<p class="text-muted mb-0 RSqty" id="RSqty'+nextiprorow+'" hidden>0</p>'+
                            '<p class="text-muted mb-0 RSsubpriceval" id="RSsubpriceval'+nextiprorow+'" hidden>0</p>'+
                            '<p class="text-muted mb-0" id="RSpricetx'+nextiprorow+'" >0 x Rp '+respone.results.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'</p>'+
                        '</td>'+
                        '<td id="RSsubprice'+nextiprorow+'">Rp 0</td>'+
                    '</tr>'
                );

                


                $('#listpurchaseproduct input[type=number]').each(function() {
                    if ($(this).val() != 0 ) {
                        $(this).removeClass("is-invalid");
                        $(this).removeClass("input-is-invalid");
                        // console.log('all inputs filled');
                    }
                    else{
                        // console.log('theres an zero qty');
                        $(this).addClass("is-invalid");
                        $(this).addClass("input-is-invalid");
                        // return false
                    }
                });
            }
        });
    }
}


function delProduct(rID) {
    // console.log(rID);
    $("#R"+rID.substring(1)).remove();
    $("#RS"+rID.substring(1)).remove();
    if($('.listpro').length == 0){$('#listpurchaseproduct > tbody:last-child').append('<tr class="norow"><td colspan="4" class="text-center">-- NoProduct --</td></tr>')}
    if($('.listprosummary').length == 0){$(".lstr").before('<tr class="norowsummary"><td colspan="3" class="text-center">-- NoProduct --</td></tr>')}
    const ates = $('#listpurchaseproduct input[type=number]').each(function() {
        const idrow = $(this).attr('id').substring(4)
        const valrow = $(this).val()
        const pricerow = $('#price'+$(this).attr('id').substring(3)+'').val()
        // const pckgvalsum = parseInt($('#pckgval').val())
        calculate_1(idrow,valrow,pricerow)
        
    });
    if(ates.length == 0){
        $('#paymentvaldefault').val("")
        $('#paymentval').val("")
        $('#payment').val("")
    }

}


function addeventcheckuncheck(){
    document.getElementById('switch1').addEventListener('click', event => {
        if(event.target.checked) {
            console.log("Checkbox checked!");
            $('#payment').val($('#paymentvaldefault').val())
            $('#payment').attr('disabled', 'disabled')
            var masked = IMask(document.getElementById("payment"), {
                mask: "Rp. num",
                blocks: {
                    num: {
                        mask: Number,
                        thousandsSeparator: " "
                    }
                }
            })
            $('#paymentval').val($('#paymentvaldefault').val())
            $('.checkboxlabel').removeClass('text-muted')
        }else{
            console.log("Checkbox Unchecked!");
            $('#payment').removeAttr('disabled')
            $('.checkboxlabel').addClass('text-muted')
        }
        $("#payment").on('input', function() {
            console.log($(this).val());
            var masked = IMask(document.getElementById("payment"), {
                mask: "Rp. num",
                blocks: {
                    num: {
                        mask: Number,
                        thousandsSeparator: " "
                    }
                }
            })
            $('#paymentval').val(masked.unmaskedValue)
        });
    });
}

addeventcheckuncheck();

$("#payment").on('input', function() {
    console.log($(this).val());
    var masked = IMask(document.getElementById("payment"), {
        mask: "Rp. num",
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: " "
            }
        }
    })
    $('#paymentval').val(masked.unmaskedValue)
});

function calculate_1(idrow,valrow,pricerow) {
    // console.log(idrow);
    // console.log(valrow);
    // console.log(pricerow);
    // console.log(pckgvalsum);
    var sp = pricerow * valrow
    $('#RSsubprice'+idrow).text('Rp '+sp.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#RSpricetx'+idrow).text(valrow+' x Rp '+ pricerow.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#RSqty'+idrow).text(valrow)
    $('#RSsubpriceval'+idrow).text(sp)
    var total_price = 0;
    $('.RSsubpriceval').each(function() {
        total_price += parseInt($(this).text());
    }); 

    $('#subto').text('Rp '+total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    const grtot = parseInt(total_price);
    $('#grtot').text('Rp '+grtot.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#payment').val(grtot)
    $('#paymentval').val(grtot)
    $('#paymentvaldefault').val(grtot)
    var masked = IMask(document.getElementById("payment"), {
        mask: "Rp. num",
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: " "
            }
        }
    })
    $('.sourcepayment').each(function() {
        if ($(this).val() != 0 ) {
            $(".paymentfrom").removeClass("bg-danger");
            // $(this).removeClass("input-is-invalid");
            // console.log('all inputs filled');
        }
        else{
            // console.log('theres an zero qty');
            // $(".paymentfrom").addClass("bg-danger");
            // $(this).addClass("input-is-invalid");
            // return false
        }
    });
    // console.log(grtot)
}
