

new gridjs.Grid({
    columns: ['Product Name', 'Director', 'Producer'],
    pagination: {
        limit: 5
    },
    sort: !0,
    search: !0,
    server: {
            url: 'http://localhost/app.qearaf-v4/public/myproducts/show',
            then: data => data.results.map(product => [product.name, product.model, product.image])
          } 
}).render(document.getElementById("table-gridjss"));

// const grid = new Grid({
//   search: true,
//   columns: ['Title', 'Director', 'Producer'],
//   server: {
//     url: 'https://swapi.dev/api/films/',
//     then: data => data.results.map(movie => [movie.title, movie.director, movie.producer])
//   } 
// });

new gridjs.Grid({
    columns: [{
        name: "#",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>')
        }
    }, {
        name: "Product Name",
        formatter: function(e) {
            return gridjs.html('<span class="fw-semibold">' + e + "</span>")
        }
    }, "Model", "Price", {
        name: "Status",
        formatter: function(e) {
            switch (e) {
            case "1":
                return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">Active</span>');
            case "0":
                return gridjs.html('<span class="badge badge-pill badge-soft-danger font-size-12">Off</span>');
            }
        }
    }, {
        name: "Action",
        sort: {
            enabled: !1
        },
        formatter: function(e) {
            return gridjs.html('<div class="dropdown"><button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="#">Edit</a></li><li><a class="dropdown-item" href="#">Print</a></li><li><a class="dropdown-item" href="#">Delete</a></li></ul></div>')
        }
    }],
    pagination: {
        limit: 10
    },
    sort: !0,
    search: !0,
    server: {
        url: 'http://localhost/app.qearaf-v4/public/myproducts/show',
        then: data => data.results.map(product => [product.no, product.name, product.model, product.price, product.statusproduct])
      } 
}).render(document.getElementById("table-gridjs")),
flatpickr("#datepicker-range", {
    mode: "range"
}),
flatpickr("#datepicker-invoice");
var currentTab = 0;
function showTab(e) {
    var t = document.getElementsByClassName("wizard-tab");
    t[e].style.display = "block",
    document.getElementById("prevBtn").style.display = 0 == e ? "none" : "inline",
    e == t.length - 1 ? document.getElementById("nextBtn").innerHTML = "Add" : document.getElementById("nextBtn").innerHTML = "Next",
    fixStepIndicator(e)
}
function nextPrev(e) {
    var t = document.getElementsByClassName("wizard-tab");
    t[currentTab].style.display = "none",
    (currentTab += e) >= t.length && (t[currentTab -= e].style.display = "block"),
    showTab(currentTab)
}
function fixStepIndicator(e) {
    for (var t = document.getElementsByClassName("list-item"), a = 0; a < t.length; a++)
        t[a].className = t[a].className.replace(" active", "");
    t[e].className += " active"
}
showTab(currentTab);
