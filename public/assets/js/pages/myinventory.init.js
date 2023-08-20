function rendergridjs1() {
    new gridjs.Grid({
        columns: [{
            name: "Product",
            sort: {
                enabled: !1
            },
            formatter: function(e) {
                return gridjs.html('<img src="./assets/images/product/'+ e +'" alt="pic_'+ e +'" class="avatar-md rounded p-0">')
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
        },{
            name: "Stock",
            formatter: function(e) {
                return gridjs.html('<span class="skuno">' + e + "</span>")
            }
        },{
            name: "Value",
            formatter: function(e) {
                return gridjs.html('<span class="valinv">' + e + "</span>")
            }
        }],
        pagination: {
            limit: 10
        },
        sort: !0,
        search: !0,
        server: {
            url: $("#BaseUrl").val()+'inventorylist',
            then: data => data.results.map(product => [product.image, product.name+' '+product.model, product.skuno , product.stock , product.valinv])
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

rendergridjs1();

