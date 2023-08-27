
// function myFunction() {
//     alert("I am an alert box!");
//   }

// $(function () {
//     $('[data-toggle="tooltip"]').tooltip()
// })

$(document).ready(function() {
    var pageid = $("#page").val()
    console.log("PAGE ID:")
    console.log(pageid)
    // var pageid = document.getElementById(page).text();
    renderList(pageid);
});

function renderList(pageid) {
    let page_id = btoa(btoa(pageid));
    new gridjs.Grid({
        columns: [{ 
            name: 'No',
            hidden: true,
        },{
            name: "Description",
            formatter: function(e) {
                if(e[0]=="IN-SALES"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>Completed Payment Sales <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a>  <u>Rp '+e[3]+'</u> </b>, This E-Wallet Balance <b><u>Rp '+e[4]+' </u></b>'+
                        '</p>'
                        )
                    }
                if(e[0]=="OP-EWAL"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>Completed Purchase Sales <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a>  <u>Rp '+e[3]+'</u> </b>, This E-Wallet Balance <b><u>Rp '+e[4]+' </u></b>'+
                        '</p>'
                        )
                    }
                if(e[0]=="OUT-EWAL"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>Withdraw E-Wallet Balance</b> <b class="text-danger">(Rp '+e[3]+')</b> This E-Wallet Balance <b>Rp '+e[4]+' </b>'+
                        '</p>'
                        )
                    }
            }
        },"Date"],
        pagination: {
            limit: 10
        },
        sort: !0,
        search: {
            selector: (cell, rowIndex, cellIndex) => cellIndex === 0 ? cell.log_transaction : cell
          },
        server: {
            url: $("#BaseUrl").val()+'ewalletList/'+page_id,
            then: data => data.results.map(no => [no.no, [no.log_code,no.link,no.log_transaction,no.trans_value,no.new_value],no.date,])
        },
        // style: {
        //     table: {
        //     },
        //     th: {
        //     'text-align': 'center'
        //     },
        //     td: {
        //     'text-align': 'center'
        //     }
        // } 
        
    }).render(document.getElementById("table-gridjs"));
}


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