function rendergridjs1() {
    new gridjs.Grid({
        columns: [{
            name: "Product",
            sort: {
                enabled: !1
            },
            formatter: function(e) {
                return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-lg rounded p-1">')
                // return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>')
            }
        }, {
            name: "Product Name",
            formatter: function(e) {
                return gridjs.html('<span class="fw-semibold">' + e + "</span>")
            }
        },{
            name: "SKU N0",
            formatter: function(e) {
                return gridjs.html('<span class="skuno">' + e + "</span>")
            }
        }, {
            name: "Stock",
            formatter: function(e) {
                // return gridjs.html('<button type="button" class="btn btn-primary"> 0 pcs</button>')
                const s_id = new String("'"+e[3]+"'");
                if(parseInt(e[0]) <= parseInt(e[1]) ){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-danger waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
                if(parseInt(e[0]) > parseInt(e[1]) && parseInt(e[0]) <= (parseInt(e[1])+5)){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-warning waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
                if(parseInt(e[0]) > (parseInt(e[1])+5) && parseInt(e[0]) < parseInt(e[2])){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-dark waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
                if(parseInt(e[0]) > parseInt(e[2])){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-primary waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
            }
        }],
        pagination: {
            limit: 10
        },
        sort: !0,
        search: !0,
        server: {
            url: $("#BaseUrl").val()+'stockShow/NotConsumable',
            then: data => data.results.map(product => [product.image, product.name+' '+product.model, product.skuno, [product.stock, product.minstock , product.maxstock, product.idpro]])
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
        
    }).render(document.getElementById("table-gridjs-1"));
}

function rendergridjs2() {
    new gridjs.Grid({
        columns: [{
            name: "Product",
            sort: {
                enabled: !1
            },
            formatter: function(e) {
                return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-lg rounded p-1">')
                // return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>')
            }
        }, {
            name: "Product Name",
            formatter: function(e) {
                return gridjs.html('<span class="fw-semibold">' + e + "</span>")
            }
        },{
            name: "SKU N0",
            formatter: function(e) {
                return gridjs.html('<span class="skuno">' + e + "</span>")
            }
        }, {
            name: "Stock",
            formatter: function(e) {
                // return gridjs.html('<button type="button" class="btn btn-primary"> 0 pcs</button>')
                const s_id = new String("'"+e[3]+"'");
                if(parseInt(e[0]) <= parseInt(e[1]) ){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-danger waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
                if(parseInt(e[0]) > parseInt(e[1]) && parseInt(e[0]) <= (parseInt(e[1])+5)){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-warning waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
                if(parseInt(e[0]) > (parseInt(e[1])+5) && parseInt(e[0]) < parseInt(e[2])){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-dark waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
                if(parseInt(e[0]) > parseInt(e[2])){
                    return gridjs.html('<button type="button" onclick="changestock('+s_id+')" class="stock btn btn-outline-primary waves-effect waves-light font-size-16 fw-bolder">' + e[0] + ' Pcs</button>')
                }
            }
        }],
        pagination: {
            limit: 10
        },
        sort: !0,
        search: !0,
        server: {
            url: $("#BaseUrl").val()+'stockShow/Consumable',
            then: data => data.results.map(product => [product.image, product.name+' '+product.model, product.skuno, [product.stock, product.minstock , product.maxstock, product.idpro]])
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
        
    }).render(document.getElementById("table-gridjs-2"));
}

rendergridjs1();
rendergridjs2();

async function changestock(s_id) {
    const ipAPI = $("#BaseUrl").val()+'gcs/'+s_id
    const aa = await fetch(ipAPI).then(response => response.json()).then(data => data.a)
    const bb = await fetch(ipAPI).then(response => response.json()).then(data => data.b)
      
    const { value: curstock } = await Swal.fire({
    title: 'Change Stock <b><u>'+ aa +'</u></b>',
    input: 'number',
    inputLabel: 'Current Stock : '+ bb +' pcs',
    inputValue: bb,
    showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
            return 'Please Input Stock!'
            }
        }
    })
      
      if (curstock) {
        const ipAPI = $("#BaseUrl").val()+'gcs/'+s_id
        const aa = await fetch(ipAPI).then(response => response.json()).then(data => data.a)
        const bb = await fetch(ipAPI).then(response => response.json()).then(data => data.b)
        Swal.fire({
            title: '<p>Change Stock <strong>'+aa+'</strong></p>'+
                    'to <u class="badge bg-soft-primary text-primary fw-bolder" style="font-size: 35px;">'+curstock+' pcs</u>',
            html: "<strong>Are you sure change stock product?</strong>",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Change Now!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: $("#BaseUrl").val()+"ucs/"+s_id,
                    dataType: "JSON",
                    data: {valstock: curstock},
                    success: function(result) {
                        console.log(result)
                        Swal.fire(
                                    'Success',
                                     '<b>'+aa+'</b> Successfully Change Stock.!',
                                    'success'
                                )
                        $("#table-gridjs-1").remove();
                        $("#table-gridjs-2").remove();
                        $("#body-gridjs-1").append('<div id="table-gridjs-1"></div>');
                        $("#body-gridjs-2").append('<div id="table-gridjs-2"></div>');
                        rendergridjs1();
                        rendergridjs2();
                        notifLaunch('success', '<b>'+aa+'</b> Successfully Change Stock.!');
                    },
                    error: function(result) {
                        // console.log(result)
                        Swal.fire(
                                    'Failed',
                                    '<b>'+aa+'</b> Failed Change Stock.!',
                                    'error'
                                )
                        notifLaunch('error', '<b>'+aa+'</b> Failed Change Stock.!');
                        // checkNotif();
                    }
                })

            }
        })
    }
}