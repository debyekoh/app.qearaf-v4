// flatpickr("#date_sales");
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
    // $('#id_sales').val(string.toUpperCase());
    // $('#nso').html("#"+string.toUpperCase());
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

    Swal.fire({
        title: 'Are you sure?',
        html: "You want to <b>Change</b> Sales No:<b>"+$('#no_sales').val()+"</b>",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, <b>Change</b> it!'
      }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                html: "No Sales: "+$('#no_sales').val()+" Success to <b>Change</b>",
                showConfirmButton: false,
                timer: 500,
                timerProgressBar: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                        // console.log($(".norow").length)
                        if($('#no_sales').val() == ""){$('#no_sales').addClass("is-invalid");$('#no_sales').addClass("inewsalesinfo-is-invalid");}else{$('#no_sales').removeClass("is-invalid");}
                        if($('#date_sales').val() == ""){$('#date_sales').addClass("is-invalid");$('#date_sales').addClass("inewsalesinfo-is-invalid");}else{$('#date_sales').removeClass("is-invalid");}
                        if($('#shop').val() == null){$('#shop').addClass("is-invalid"); $('#shop').addClass("inewsalesinfo-is-invalid");}else{$('#shop').removeClass("is-invalid");}
                        if($(".norow").length > 0){
                            $('.productinfo ').addClass("bg-danger"); 
                            $('#adnpm').addClass("btn-outline-danger");
                            document.querySelector("#li2").style.borderColor = "red";}
                            else{
                                if($('.input-is-invalid').length == 0){$('.productinfo').removeClass("bg-danger");document.querySelector("#li2").style.borderColor = "#1f58c7";}else{$('.productinfo').addClass("bg-danger");document.querySelector("#li2").style.borderColor = "red";}
                            }
                        if($('#deliveryservices').val() == null){$('#deliveryservices').addClass("is-invalid");$('#deliveryservices').addClass("ideliveryinfo-is-invalid");}else{$('#deliveryservices').removeClass("is-invalid");}
                        if($('#no_resi').val() == ""){$('#no_resi').addClass("is-invalid");$('#no_resi').addClass("ideliveryinfo-is-invalid");}else{$('#no_resi').removeClass("is-invalid");}

                        // if($('#no_resi').val() == ""){$('#no_resi').addClass("is-invalid");}else{$('#no_resi').removeClass("is-invalid");}

                        // console.log($('[name=packaging-method]').length)
                        // console.log($("input[name='packagingmethod']:checked").val())
                        if($("input[name='packagingmethod']:checked").val() == null){
                            console.log("SALAH"); 
                            $('.packagingmethod').addClass("bg-danger is-invalid text-white");
                            $('.packaginginfo').addClass("bg-danger");
                            document.querySelector("#li4").style.borderColor = "red";
                        }else{
                            console.log("BENAR"); 
                            $('.packagingmethod').removeClass("bg-danger is-invalid text-white");
                            $('.packaginginfo').removeClass("bg-danger");
                            document.querySelector("#li4").style.borderColor = "#1f58c7";
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
                        
                        ///
                        if($('.inewsalesinfo-is-invalid').length != 0){$('.newsalesinfo').addClass("bg-danger");document.querySelector("#li1").style.borderColor = "red";} 
                        // if($('.input-is-invalid').length != 0){$('.productinfo').addClass("bg-danger");document.querySelector("#li2").style.borderColor = "red";}           //---OK---//
                        console.log("test "+$('.input-is-invalid').length);
                        // if($('.input-is-invalid').length == 0){$('.productinfo').removeClass("bg-danger");document.querySelector("#li2").style.borderColor = "#1f58c7";}else{$('.productinfo').addClass("bg-danger");document.querySelector("#li2").style.borderColor = "red";}
                        if($('.ideliveryinfo-is-invalid').length != 0){$('.deliveryinfo').addClass("bg-danger");document.querySelector("#li3").style.borderColor = "red";}           //---OK---//
                        ///


                        $('#listsalesproduct input[type=number]').each(function() {
                            if ($(this).val() != 0 ) {
                                $(this).removeClass("is-invalid");
                                $(this).removeClass("input-is-invalid");
                                console.log('all inputs filled');
                            }
                            else{
                                console.log('theres an zero qty');
                                $(this).addClass("is-invalid");
                                $(this).addClass("input-is-invalid");
                                // return false
                            }
                        });
                        
                        if($('.is-invalid').length == 0){
                            $("#submit" ).trigger( "click" );
                        }
                    }
                })
             
            }
        })
});

//\\//\\

$("#no_sales").on('input', function() {
    if($(this).val() != null){$('.no_sales').removeClass("is-invalid");$('.no_sales').removeClass("inewsalesinfo-is-invalid");}
    if($('.inewsalesinfo-is-invalid').length == 0){$('.newsalesinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
    
    // console.log("newsalesinfo "+ $('.inewsalesinfo-is-invalid').length);
    // console.log("newsalesinfo "+ $('#no_sales').val());
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'checksales',
        data: {
            nosales: $('#no_sales').val(),
        },
        
        success: function(respone) {
                console.log(respone.status);
                if(respone.status == "error"){$('#no_sales').addClass("is-invalid");$('#no_sales').addClass("inewsalesinfo-is-invalid");$('.no_sales-invalid-feedback').text("No Sales Already Exist.");}
                else
                {$('#no_sales').removeClass("is-invalid");$('.no_sales-invalid-feedback').text("Please Fill in No Sales.");}
            }
        });
    }
);
$('#date_sales').change(function() {
    if($(this).val() != null){$('.date_sales').removeClass("is-invalid");$('.date_sales').removeClass("inewsalesinfo-is-invalid");}
    if($('.inewsalesinfo-is-invalid').length == 0){$('.newsalesinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
    

    // datestring = $(this).val().substring(2, 4) + $(this).val().substring(5, 7) + $(this).val().substring(8, 10);
    // console.log($(this).val())
    var inputDate = $(this).val();
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'mysales/count',
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
            var string = formatDate(d)+"/S/"+set_no+"/"+generateUUID().replace("-", "").substring(0, 8);
            $('#idsales').val(string.toUpperCase());
            $('#nso').html("#"+string.toUpperCase());
        }
    });


    // console.log("newsalesinfo "+ $('.inewsalesinfo-is-invalid').length);
});
$('#shop').change(function() {
    // console.log($(this).val());
    var  s = $(this).val();
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'groupshop',
        data: {s: s,},
        success: function(data) {
            console.log(data.status);
            if(data.status == "Reseller"){
                var checkres = "true"
            }else {
                var checkres = "false"
            }

            if($("#bfr").val() == checkres){
                console.log("ITEM TIDAK DIHAPUS")
            }else{
                console.log("ITEM DIHAPUS")
                $(".listpro").remove();
                $(".listprosummary").remove();
                if($('.norow').length == 0){$('#listsalesproduct > tbody:last-child').append('<tr class="norow"><td colspan="4" class="text-center">-- NoProduct --</td></tr>')}
                if($('.norowsummary').length == 0){$(".lstr").before('<tr class="norowsummary"><td colspan="3" class="text-center">-- NoProduct --</td></tr>')}
            }
            // console.log($("#bfr").val())
            // $("#bfr").val()
        }
    });
    if($(this).val() != null){$('.shop').removeClass("is-invalid");$('.shop').removeClass("inewsalesinfo-is-invalid");}
    if($('.inewsalesinfo-is-invalid').length == 0){$('.newsalesinfo').removeClass("bg-danger");document.querySelector("#li1").style.borderColor = "#1f58c7";}
    // $(".listpro").remove();
    // $(".listprosummary").remove();
    // console.log("norow"+$(".norow").length)
    // if($('.norow').length == 0){$('#listsalesproduct > tbody:last-child').append('<tr class="norow"><td colspan="4" class="text-center">-- NoProduct --</td></tr>')}
    // if($('.norowsummary').length == 0){$(".lstr").before('<tr class="norowsummary"><td colspan="3" class="text-center">-- NoProduct --</td></tr>')}
    // console.log("newsalesinfo "+ $('.inewsalesinfo-is-invalid').length);
});



//\\//\\

$(document).on('keyup mouseup', '.qtyinput', function() {         
    $('#listsalesproduct input[type=number]').each(function() {
        if ($(this).val() != 0 ) {
            $(this).removeClass("is-invalid");
            $(this).removeClass("input-is-invalid");
            console.log('all inputs filled');
            console.log("ini baris ke: "+$(this).attr('id'));
        }
        else{
            console.log('theres an zero qty');
            $(this).addClass("is-invalid");
            $(this).addClass("input-is-invalid");
            // return false
        }
        if($("input[name='packagingmethod']:checked").val()==null){pckgid = 0}else{pckgid = $("input[name='packagingmethod']:checked").val()}
        if(pckgid == 0){pckgprice = 0 ; pckgdesc = "No Packaging"}
        if(pckgid == 1){pckgprice = 2000 ; pckgdesc = "Small 17x9x6cm"}
        if(pckgid == 2){pckgprice = 2000 ; pckgdesc = "Long 8x8x30cm"}
        $('.pckginfo').val(pckgid);
        $('#pckgval').val(pckgprice);
        $('.pckgdesc').text(pckgdesc);
        $('#pckg').text('Rp '+pckgprice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        $('#listsalesproduct input[type=number]').each(function() {
            const idrow = $(this).attr('id').substring(4)
            const valrow = $(this).val()
            const pricerow = $('#price'+$(this).attr('id').substring(3)+'').val()
            const pckgvalsum = parseInt($('#pckgval').val())
            calculate_1(idrow,valrow,pricerow,pckgvalsum)
    
    });
        
    }); 
    if($('.input-is-invalid').length == 0){$('.productinfo').removeClass("bg-danger");document.querySelector("#li2").style.borderColor = "#1f58c7";}else{$('.productinfo').addClass("bg-danger");document.querySelector("#li2").style.borderColor = "red";}                                                                                                           
    console.log('changed');

    // console.log($('#deliveryservices').val());

});
  
//\\//\\
$('#deliveryservices').change(function() {
    if($(this).val() != null){$('.deliveryservices').removeClass("is-invalid");$('.deliveryservices').removeClass("ideliveryinfo-is-invalid");}
    if($('.ideliveryinfo-is-invalid').length == 0){$('.newsalesinfo').removeClass("bg-danger");document.querySelector("#li3").style.borderColor = "#1f58c7";}
    console.log("deliveryinfo "+ $('.ideliveryinfo-is-invalid').length);
});
$("#no_resi").on('input', function() {
    if($(this).val() != null){$('.no_resi').removeClass("is-invalid");$('.no_resi').removeClass("ideliveryinfo-is-invalid");}
    if($('.ideliveryinfo-is-invalid').length == 0){$('.deliveryinfo').removeClass("bg-danger");document.querySelector("#li3").style.borderColor = "#1f58c7";}
    console.log("newsalesinfo "+ $('.ideliveryinfo-is-invalid').length);
});
//\\//\\
$('.ipackagingmethod').on('click',function() {
    console.log($("input[name='packagingmethod']:checked").val());
    $('.packagingmethod').removeClass("bg-danger is-invalid text-white");
    $('.packaginginfo').removeClass("bg-danger");
    document.querySelector("#li4").style.borderColor = "#1f58c7";
    var pckgid = $("input[name='packagingmethod']:checked").val()
    if(pckgid == 0){pckgprice = 0 ; pckgdesc = "No Packaging"}
    if(pckgid == 1){pckgprice = 2000 ; pckgdesc = "Small 17x9x6cm"}
    if(pckgid == 2){pckgprice = 2000 ; pckgdesc = "Long 8x8x30cm"}
    $('.pckginfo').val(pckgid);
    $('#pckgval').val(pckgprice);
    $('.pckgdesc').text(pckgdesc);
    $('#pckg').text('Rp '+pckgprice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    $('#listsalesproduct input[type=number]').each(function() {
        const idrow = $(this).attr('id').substring(4)
        const valrow = $(this).val()
        const pricerow = $('#price'+$(this).attr('id').substring(3)+'').val()
        const pckgvalsum = parseInt($('#pckgval').val())
        calculate_1(idrow,valrow,pricerow,pckgvalsum)
    
    });

});
//\\//\\
$('.ipaymethod').on('click',function() {
    console.log("BB");
    $('.paymethod').removeClass("bg-danger is-invalid text-white");
    $('.payinfo').removeClass("bg-danger");
});





$("#adnpm").on('click', function() {
    // var values = [];
    // $("input[name='iprorow[]']").each(function() {
    //     values.push($(this).val());
    // });
    // var maxrow = Math.max.apply(Math, values);
    // console.log(maxrow);

    // console.log($('#shop').val());
    if($('#shop').val() == null){
        $('#shop').addClass("is-invalid");
    }else{
        // console.log("Open modal & List Product");
        $('#shop').removeClass("is-invalid");
        $('#addNewProduct').modal('show');
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
                    return gridjs.html('<img src="'+$("#BaseUrl").val()+'assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-md rounded p-1">')
                    // return gridjs.html('<img src="'+$("#BaseUrl").val()+'assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar rounded-circle img-thumbnail me-3">')
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
                url: $("#BaseUrl").val()+'listproduct',
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
    if ($("#listsalesproduct > tbody > tr").hasClass(sku)) {
        Swal.fire({
        icon: 'error',
        title: 'Product Already Exist!',
        })
    } else {
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'selected',
        data: {
            sku: sku,
        },
        
        success: function(respone) {
                console.log("next: "+nextiprorow);
                console.log("Modal Closed");
                $('#adnpm').removeClass("btn-outline-danger");

                $('#addNewProduct').modal('hide');
                if ($("#listsalesproduct > tbody > tr").hasClass("norow")) {
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
                $('#listsalesproduct > tbody:last-child').append(
                    '<tr id="R'+nextiprorow+'" class="listpro rowprosales '+sku+'">'+
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
                    '<tr id="RS'+nextiprorow+'" class="listprosummary rowprosalessummary '+sku+'">'+
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

                


                $('#listsalesproduct input[type=number]').each(function() {
                    if ($(this).val() != 0 ) {
                        $(this).removeClass("is-invalid");
                        $(this).removeClass("input-is-invalid");
                        console.log('all inputs filled');
                    }
                    else{
                        console.log('theres an zero qty');
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
    console.log(rID);
    $("#R"+rID.substring(1)).remove();
    $("#RS"+rID.substring(1)).remove();
    if($('.listpro').length == 0){$('#listsalesproduct > tbody:last-child').append('<tr class="norow"><td colspan="4" class="text-center">-- NoProduct --</td></tr>')}
    if($('.listprosummary').length == 0){$(".lstr").before('<tr class="norowsummary"><td colspan="3" class="text-center">-- NoProduct --</td></tr>')}
    $('#listsalesproduct input[type=number]').each(function() {
        const idrow = $(this).attr('id').substring(4)
        const valrow = $(this).val()
        const pricerow = $('#price'+$(this).attr('id').substring(3)+'').val()
        const pckgvalsum = parseInt($('#pckgval').val())
        calculate_1(idrow,valrow,pricerow,pckgvalsum)
    
    });

}


// $('#productinfo').on('keyup change paste', 'input, select, textarea',  function(){
//     // console.log('Form changed!');
//     calculate_1();
// });

// $('#productinfo').bind('click dblclick', function(){
//     // console.log('Form changed! coy');
//     calculate_1();
// });

function calculate_1(idrow,valrow,pricerow,pckgvalsum) {
    console.log(idrow);
    console.log(valrow);
    console.log(pricerow);
    console.log(pckgvalsum);
    var sp = pricerow * valrow
    $('#RSsubprice'+idrow).text('Rp '+sp.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#RSpricetx'+idrow).text(valrow+' x Rp '+ pricerow.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#RSqty'+idrow).text(valrow)
    $('#RSsubpriceval'+idrow).text(sp)
    console.log("//////////////////////////////")

    var total_price = 0;
    $('.RSsubpriceval').each(function() {
        total_price += parseInt($(this).text());
    }); 

    var tax = total_price*(10/100);
    
    $('#subto').text('Rp '+total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#tax').text('(Rp '+tax.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+')')
    
    const grtot = parseInt(total_price)-parseInt(tax)+parseInt(pckgvalsum);
    $('#grtot').text('Rp '+grtot.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
    $('#grtotval').val(grtot)
    console.log(grtot)

    console.log("\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\")
    
   
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