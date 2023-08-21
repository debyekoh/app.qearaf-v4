function clickTab(params) {
    console.log(params)
    window.open($("#BaseUrl").val()+'sales?tab='+params+'&shop=AAA');
}