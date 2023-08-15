document.addEventListener("DOMContentLoaded", function() {
    var e = document.querySelectorAll("[data-trigger]");
    for (i = 0; i < e.length; ++i) {
        var a = e[i];
        new Choices(a,{
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder"
        })
    }
});

document.getElementById('switch').addEventListener('click', event => {
    if(event.target.checked) {
        console.log("Checkbox checked!");
        $("#currentstock").attr('readonly', true);
        $("#minstock").attr('readonly', true);
        $("#maxstock").attr('readonly', true);
        $("#currentstock").val('0');
        $("#minstock").val('0');
        $("#maxstock").val('0');
        $("#basicprice").attr('readonly', true);
        $("#resellerprice").attr('readonly', true);
        $("#sellingprice").attr('readonly', true);
        // $("#rstock").attr('hidden', true);
        $('#switch').val(1);
        $('#div_tabel_bundling').append('<div class="mb-2" id="tbl_lpro_bundling"></div>');
        $('#tbl_lpro_bundling').append(
                '<div class="row mb-3">'+
                    '<div class="table-responsive ">'+
                        '<table id="listsalesproduct" class="table table-sm rounded rounded-3 overflow-hidden table-striped table-hover align-middle mb-0">'+
                            '<thead class="table-info">'+
                                '<tr>'+
                                    '<th class="border-top-0" scope="col">Picture</th>'+
                                    '<th class="border-top-0" scope="col">Product Name</th>'+
                                    '<th class="border-top-0" scope="col">SKU No</th>'+
                                    '<th class="border-top-0  text-center" scope="col"><i class="mdi mdi-apps"></i></th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                                '<tr class="norow">'+
                                    '<td colspan="4" class="text-center">-- NoProduct --'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+

                    '</div>'+

                '</div>'+
                '<div class="col text-center">'+
                    '<div class="btn-group" role="group" aria-label="Basic outlined example">'+
                        '<button type="button" class="btn btn-outline-primary" id="adnpm">Add New Product</button>'+
                    '</div>'+
                '</div>'+
                '<div id="addNewProduct" class="modal fade" tabindex="-1" aria-labelledby="addNewProductLabel" aria-hidden="true">'+
                    '<div class="modal-dialog modal-fullscreen-sm-down">'+
                        '<div class="modal-content">'+
                            '<div class="modal-body px-1">'+
                                '<div id="table-gridjs"></div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancel</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'
        )
        
        funcaddproduct();
        
    }else{
        console.log("Checkbox Unchecked!");
        $("#currentstock").attr('readonly', false);
        $("#minstock").attr('readonly', false);
        $("#maxstock").attr('readonly', false);
        $("#currentstock").val('');
        $("#minstock").val('');
        $("#maxstock").val('');
        $("#basicprice").attr('readonly', false);
        $("#resellerprice").attr('readonly', false);
        $("#sellingprice").attr('readonly', false);
        // $("#rstock").attr('hidden', false);
        $('#switch').val(0);
        $('#tbl_lpro_bundling').remove()
    }
})

function funcaddproduct(){
    $("#adnpm").on('click', function() {
        console.log("BB")
        // if($('#shop').val() == null){
        //     $('#shop').addClass("is-invalid");
        // }else{
        //     $('#shop').removeClass("is-invalid");
            $('#addNewProduct').modal('show');
            $("#table-gridjs").empty();
            new gridjs.Grid({
                columns: [{
                    name: "Product",
                    sort: {
                        enabled: !1
                    },
                
                    formatter: function(e) {
                        return gridjs.html('<img src="'+$("#BaseUrl").val()+'assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-md rounded p-1">')
                    }
                }, { 
                    name: 'SKU',
                    hidden: true,
                }, {
                    name: "Description",
                    formatter: function(e) {
                        return gridjs.html('<h5 class="text-start font-size-12">' + e[0] + '</h5><p class="text-start font-size-12 text-muted mb-0">' + e[1] + "</p>")
                    }
                }, {
                    name: "Stock",
                    formatter: function(e) {
                            if(e!=0){
                            return gridjs.html(e)}else{
                            return gridjs.html('<span class="stock badge rounded-pill bg-soft-danger text-danger fw-bold font-size-14">' + e + ' Pcs</span>')}
                            
                    }
                }, {
                    name: "Select",
                    formatter: function(e) {
                            const string4 = new String("'"+e[1]+"'");
                            if(e[0]!=0){
                            return gridjs.html(
                                '<button type="button" onclick="addProduct('+string4+')" class="btn btn-sm btn-soft-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Add">'+
                                    '<i class="mdi mdi-plus-box-multiple-outline font-size-12 align-middle me-2"></i> Add'+
                                '</button>'
                            )}else{
                            return gridjs.html(
                                '<button type="button" class="btn btn-sm btn-soft-danger waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Add">'+
                                    '<i class="mdi mdi-close-box-multiple-outline font-size-12 align-middle me-2"></i> Kosong'+
                                '</button>'
                            )}
                            
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
                    url: $("#BaseUrl").val()+'listproduct',
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
        // }
        $('#addNewProduct').on('shown.bs.modal', function () {$(".gridjs-search-input").focus();});
    });
}

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
        url: $("#BaseUrl").val()+'selectedcp',
        data: {
            sku: sku,
        },
        
        success: function(respone) {
                console.log("next: "+nextiprorow);
                console.log("Modal Closed");
                // $('#adnpm').removeClass("btn-outline-danger");
                
                
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
                            '<input class="prorow" type="text" name="iprorow[]" value="'+nextiprorow+'" disabled hidden>'+
                            '<h5 class="text-truncate mb-0"><a href="javascript: void(0);" class="font-size-14 text-dark">'+respone.results.name+'</a></h5>'+
                            '<input name="bdl_proid[]" placeholder="Enter Brand Product" type="text" class="form-control" value="'+respone.results.proid+'" hidden>'+
                            '<input name="bdl_proname[]" placeholder="Enter Brand Product" type="text" class="form-control" value="'+respone.results.name+'" disabled hidden>'+
                        '</td>'+
                        '<td>'+
                            '<h5 class="text-truncate mb-0"><a href="javascript: void(0);" class="font-size-14 text-dark">'+sku+'</a></h5>'+
                            '<input name="bdl_prosku[]" placeholder="Enter Brand Product" type="text" class="form-control" value="'+sku+'" hidden>'+
                            '<input name="bdlbasicprice[]" placeholder="Enter Brand Product" type="number" class="form-control Bsp" value="'+respone.results.basicprice+'" hidden>'+
                            '<input name="bdlpricereseler[]" placeholder="Enter Brand Product" type="number" class="form-control PRl" value="'+respone.results.reselerprice+'" hidden>'+
                            '<input name="bdlpriceseller[]" placeholder="Enter Brand Product" type="number" class="form-control PSl" value="'+respone.results.sellerprice+'" hidden>'+
                        '</td>'+
                        '<td class="text-center"><button type="button" onclick="delProduct('+stringrow+')" class="btn btn-soft-danger waves-effect waves-light"><i class="mdi mdi-trash-can"></i></button></td>'+
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

                calculate_01();
            }
        });
    }
}


function calculate_01(){
    var basicpriceval = 0;
    var pricereselerval = 0;
    var pricesellerval = 0;
    $('.Bsp').each(function() {
        basicpriceval += parseInt($(this).val());
    });
    $('.PRl').each(function() {
        pricereselerval += parseInt($(this).val());
    }); 
    $('.PSl').each(function() {
        pricesellerval += parseInt($(this).val());
    }); 

    $('#basicprice').val(basicpriceval);
    $('#resellerprice').val(pricereselerval);
    $('#sellingprice').val(pricesellerval);

    var CurSto = new Array();
    $('.CurS').each(function(){
        CurSto.push($(this).val());
    })

    console.log(CurSto)
    console.log(Math.min(CurSto))

};

function addCard() {
    const card = document.querySelectorAll('.imagecard').length + 1;
    var image = "'image" + card + "'";


    $(".lastcol").before(
        '<div class="col p-1 ancol">' +
        '<div class="card border-secondary h-100 text-center p-0 imagecard containerprd" style="border: dotted; margin:0px;">' +
        '<img src="<?= base_url() ?>assets/images/product/no_image copy.avif" class="img-fluid rounded imageprd image-preview-image' + card + ' p-2" style="aspect-ratio: 1/1;" alt="">' +
        '<small class="mt-2" hidden><label for="image' + card + '" class="form-label ">Picture Product ' + card + '</label></small>' +
        '<input class="form-control form-control-sm" type="file" id="image' + card + '" name="image[]" onchange="previewImage(' + image + ')" style="display:none;">' +
        '<div class="middle">' +
        '<button type="button" onclick=" clickImage(' + card + ')" class="btn btn-lg btn-soft-info waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Change Picture">' +
        '<i class="bx bx-edit font-size-16 align-middle"></i>' +
        '</button>' +
        '</div>' +
        '</div>' +
        '</div>'
    );
    // console.log(image);

}

function delProduct(rID) {
    console.log(rID);
    $("#R"+rID.substring(1)).remove();
    $("#RS"+rID.substring(1)).remove();
    if($('.listpro').length == 0){$('#listsalesproduct > tbody:last-child').append('<tr class="norow"><td colspan="4" class="text-center">-- NoProduct --</td></tr>')}
    if($('.listprosummary').length == 0){$(".lstr").before('<tr class="norowsummary"><td colspan="3" class="text-center">-- NoProduct --</td></tr>')}
}

function imageRemove() {
    $(".ancol:last").remove();

}

function clickImage(e) {
    console.log(e);
    $('#image' + e + '').trigger('click');
}

function previewImage(event) {
    console.log(event);
    const image = document.querySelector('#' + event + '');
    const imageLabel = document.querySelector('.' + event + '');
    const imgPreview = document.querySelector('.image-preview-' + event + '');

    const fileimg = new FileReader();
    fileimg.readAsDataURL(image.files[0]);
    console.log(fileimg)

    fileimg.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

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

$(document).ready(function() {
    var string = generateUUID().replace("-", "").substring(0, 8);
    $('#new_id').val(string.toUpperCase());
});

