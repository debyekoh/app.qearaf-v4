
    new gridjs.Grid({
        columns: [{ 
            name: 'No',
            hidden: true,
        }, {
            name: "Description",
            formatter: function(e) {
                if(e[0]=="TOP-DEB"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>Purchase <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a>  <u>Rp '+e[3]+'</u> </b>, Total Amount of Debt <b><u>Rp '+e[4]+' </u></b>'+
                        '</p>'
                        )
                    }
                if(e[0]=="IN-FEWAL"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>Incoming Balance from Withdraw E-Wallet '+e[2]+'</b> <b class="text-primary"><u>(Rp '+e[3]+')</u></b> Total Amount of Debt <b><u>Rp '+e[4]+'</u> </b>'+
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
            url: $("#BaseUrl").val()+'debtList',
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
