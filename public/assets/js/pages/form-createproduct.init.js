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

