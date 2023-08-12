
    new gridjs.Grid({
        columns: [{ 
            name: 'No',
            hidden: true,
        }, {
            name: "Description",
            formatter: function(e) {
                if(e[0]=="CHANGE-STOCK"){
                    return gridjs.html(
                        '<p class="mb-0 text-start">'+
                            '<b>Change Stock <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a></b>, from  <b><u>'+e[3]+' pcs</u> </b> to <b><u>'+e[4]+' pcs</u></b>.'+
                        '</p>')}
                if(e[0]=="PURCHASE"){
                    return gridjs.html(
                        '<p class="mb-0 text-start">'+
                            '<b>Purchase <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[6]+'</a></b>. <b>Change Stock <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a></b>, Qty: <u class="text-success"><b>( +'+e[5]+' )pcs</b></u> Change from  <b><u>'+e[3]+' pcs</u> </b> to <b><u>'+e[4]+' pcs</u></b>.'+
                        '</p>')}
                if(e[0]=="SALES"){
                    return gridjs.html(
                        '<p class="mb-0 text-start">'+
                            '<b>Sales <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[6]+'</a></b>. <b>Change Stock <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a></b>, Qty: <u class="text-danger"><b>( -'+e[5]+' )pcs</b></u> Change from  <b><u>'+e[3]+' pcs</u> </b> to <b><u>'+e[4]+' pcs</u></b>.'+
                        '</p>')}
                if(e[0]=="CANCEL-SALES"){
                    return gridjs.html(
                        '<p class="mb-0 text-start">'+
                            '<b>Cancel Sales <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[6]+'</a></b>. <b>Change Stock <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a></b>, Qty: <u class="text-success"><b>( +'+e[5]+' )pcs</b></u> Change from  <b><u>'+e[3]+' pcs</u> </b> to <b><u>'+e[4]+' pcs</u></b>.'+
                        '</p>')}
                if(e[0]=="RETURN-SALES"){
                    return gridjs.html(
                        '<p class="mb-0 text-start">'+
                            '<b>Return Sales <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[6]+'</a></b>. <b>Change Stock <a href="'+$("#BaseUrl").val()+''+e[1]+'">#'+e[2]+'</a></b>, Qty: <u class="text-success"><b>( +'+e[5]+' )pcs</b></u> Change from  <b><u>'+e[3]+' pcs</u> </b> to <b><u>'+e[4]+' pcs</u></b>.'+
                        '</p>')}
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
            then: data => data.results.map(no => [no.no, [no.log_code,no.link,no.log_transaction,no.last_value,no.new_value,no.trans_value,no.no_transaction],no.date,])
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
