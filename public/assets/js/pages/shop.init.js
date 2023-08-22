function clickTab(params) {
    console.log(params)
    var url = window.location.href;
    var parts = url.split("/");
    var shop = btoa(btoa(parts[parts.length-1]));
    location.href = $("#BaseUrl").val()+'sales?tab='+params+'&ref='+shop;
}