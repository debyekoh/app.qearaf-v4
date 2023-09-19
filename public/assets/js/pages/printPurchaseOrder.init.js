function PrintPO() {
    $.ajax({
        type: "POST",
        url: $("#BaseUrl").val()+'notification/read',
        dataType: "JSON",
        data: {
            data: a,
        },
        success: function(data) {
            // checkNotif();
            console.log("PRINT")
        }
    })
    console.log("PRINT")
    
}