
    new gridjs.Grid({
        columns: [{ 
            name: 'No',
            hidden: true,
        }, {
            name: "Description",
            formatter: function(e) {
                if(e[0]=="CHANGE-STOCK"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>Change Stock <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a></b>, from  <b><u>'+e[3]+' pcs</u> </b> to <b><u>'+e[4]+' pcs</u></b>'+
                        '</p>'
                        )
                    }
                if(e[0]=="SAMPEL"){
                    return gridjs.html(
                        // '<div class="fw-semibold">' + e + "</div>"
                        '<p class="mb-0 text-start">'+
                            '<b>SAMPEL '+e[2]+'</b> <b class="text-primary"><u>('+e[3]+' pcs)</u></b> Total Amount of Debt <b><u>Rp '+e[4]+'</u> </b>'+
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
            url: $("#BaseUrl").val()+'historyinoutLog',
            then: data => data.results.map(no => [no.no, [no.log_code,no.link,no.log_transaction,no.last_value,no.new_value],no.date,])
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
