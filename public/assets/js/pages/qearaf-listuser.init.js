// var x = "<?php ex(); ??>";<?php print_r($_SESSION) ?>
// var user_id = parseInt("<?php echo $this->session->userdata('user_id');?>");
// var user_id = "<?php print_r($_SESSION); ?>";
// if (sessionValue == "NaN") sessionValue = 0;
// var user_id = "<?php $this->fungsi->user_login()->foto;??>";
// function ajaxCall() {
    // var data;
    // $.ajax({
    //     headers: { 'X-Auth-Token': 'my API key' },
    //     url: 'https://api.football-data.org/v2/competitions',
    //     dataType: 'json',
    //     type: 'GET',
    // }).done(function (response) {
    //     // do something with the response
    //     console.log(response);
    //     data = response;
    // });
// var list = []
// var result = $.ajax({
//         url: 'admin_control/users/users_list/get_datalist',
//         method: 'GET',
//         // data:{dates_find:date_string},
//         dataType: 'JSON',
//         async: false,
//         success: function (datalist) {
//         // console.log(datalist);
//             // resp.push(datalist);
//         // var listuser = datalist;
//         return datalist;
//     }
//     });
// console.log(result['responseJSON'].list);
// var resultData = result['responseJSON'].list.data;
// var list_data = resultData.map()
// console.log(resultData);

// var listdata
// $.ajax({
//     method: 'GET',
//     url: 'admin_control/users/users_list/get_datalist',
//     async: false,  //add
// }).done(function (response) {
//     result = response
// }).fail(function (error) {
//     console.log(error)
// })

// console.log()  //ajax result
// }
// ajaxCall();

// responseJSON.list.data

new gridjs.Grid({
    columns: [{
        name: "#",
        sort: {
            enabled: !1
        },
        fixedHeader: true,
        width: '40px',
        formatter: function (e) {
            return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>')
        }
    }, {
        name: ".",
        sort: {
            enabled: !1
        },
        fixedHeader: true,
        width: '70px',
        formatter: function (e) {
            // return gridjs.html('<span class="fw-semibold">' + e + "</span>")
            if(e != null){
                var image = e
            } else {
                var image = "Avatar.jpg"
            }
            
            // console.log(e);
            return gridjs.html('<img src="ad_assets/dist/assets/images/users/' + image +'" alt="" class="avatar rounded-circle img-thumbnail me-2">')
        }
    }, {
        name: "Name",
        fixedHeader: true,
        // hidden: true,
        // sort: {
        //     enabled: !1
        // },
        formatter: function (e) {
            return gridjs.html(e)
        }
    }, {
        name: "Position",
        fixedHeader: true,
        formatter: function (e) {
            switch (e) {
                case "Owner Shop":
                    return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">' + e + "</span>");
                case "Admin Shop":
                    return gridjs.html('<span class="badge badge-pill badge-soft-warning font-size-12">' + e + "</span>");
                default:
                    return gridjs.html('<span class="badge badge-pill badge-soft-info font-size-12">' + e + "</span>")
            }
        }
    }, "Email", "Region", {
        name: "Action",
        sort: {
            enabled: !1
        },
        formatter: function (e) {
            // return gridjs.html('<div class="dropdown"><button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="#">Edit</a></li><li><a class="dropdown-item" href="#">Print</a></li><li><a class="dropdown-item" href="#">Delete</a></li></ul></div>')
            return gridjs.html('<ul class="list-inline mb-0"><li class= "list-inline-item"><a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-2 text-primary"><i class="bx bx-pencil font-size-18"></i></a></li><li class="list-inline-item"><a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a></li></ul>')
        }
    }],
    pagination: {
        limit: 10
    },
    sort: !0,
    search: !0,
    // data: resultData,
    // server: {
    //     url: 'https://api.scryfall.com/cards/search?q=Inspiring',
    //     // then: data => data.data.map(card => [card.name, card.lang, card.released_at, card.artist])
    //     then: data => {
    //         console.log(data.data.map(card => [card.name, card.lang, card.released_at, card.artist]));
    //         // return data.data.map(card => [card.name, card.lang, card.released_at, card.artist])
    //     }
    // },
    server: {
        // headers: { 'Accept-Charset': 'utf-8', 'X-My-Custom-Header': 'cool' },
        url: 'api/users/usersapi/userslist?QEARAF-KEY=' + qearaf + '',
        // then: data => data.data.map(card => [card.name, card.lang, card.released_at, card.artist])
        then: data => {
            // console.log(data.data.map(card => [card.name, card.lang, card.released_at, card.artist]));
            return data.list.data.map(first_name => ["", first_name.avatar, first_name.first_name + ' ' + first_name.last_name, first_name.position, first_name.email, first_name.region])
        }
    },
    // server: {
    //     method: 'POST',
    //     url: 'http://localhost/qearaf-v1.5/api/users/usersapi/userslist?QEARAF-KEY=' + qearaf + '',
    //     // url: 'admin_control/users/users_list/get_datalist',
    //     then: data => {
    //         // console.log(data.list.data);
    //         // console.log(data);
    //         return data.list.data.map(first_name => ["", first_name.avatar, first_name.first_name + ' ' + first_name.last_name , first_name.position, first_name.email,  first_name.region])
    //     },
    //     // handle: (res) => {
    //     //     // no matching records found
    //     //     if (res.status === 404) return { data: [] };
    //     //     if (res.ok) return res.json();

    //     //     throw Error('oh no :(');
    //     // },
    //     data: (opts) => {
    //         return new Promise((resolve, reject) => {
    //             // let's implement our own HTTP client
    //             const xhttp = new XMLHttpRequest();
    //             xhttp.onreadystatechange = function () {
    //                 if (this.readyState === 4) {
    //                     if (this.status === 200) {
    //                         const resp = JSON.parse(this.response);
    //                         console.log(resp);
    //                         console.log(resp.list.data.length);
    //                         // make sure the output conforms to StorageResponse format: 
    //                         // https://github.com/grid-js/gridjs/blob/master/src/storage/storage.ts#L21-L24
    //                         resolve({
    //                             // data: resp.data.map(card => [card.name, card.lang, card.released_at, card.artist]),
    //                             // total: resp.total_cards,
    //                             data: resp.list.data.map(first_name => ["", first_name.avatar, first_name.first_name + ' ' + first_name.last_name, first_name.position, first_name.email, first_name.region]),
    //                             total: resp.list.data.length,
    //                         });
    //                     } else {
    //                         reject();
    //                     }
    //                 }
    //             };
    //             xhttp.open("GET", opts.url, true);
    //             xhttp.send();
    //         });
    //     }



    // },
}).render(document.getElementById("table-invoices-list")),
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
