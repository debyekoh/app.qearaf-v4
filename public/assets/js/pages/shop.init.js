
function clickTab(params) {
    console.log(params)
    var url = window.location.href;
    var parts = url.split("/");
    var _a = parts[parts.length-1];
    // console.log(_a)
    // console.log(atob(_a))
    if(_a == "Y21WelpXeHNaWEk9"){
        var shop = parts[parts.length-1];
    }else if(_a == "dashboards"){
        var shop = 1;
    }
    else{
        var shop = btoa(btoa(parts[parts.length-1]));
    }
    location.href = $("#BaseUrl").val()+'sales?tab='+params+'&ref='+shop;
}

// console.log(window.location.href.split("/")[5])
// var pagecek = window.location.href.split("/")[window.location.href.split("/").length-2]

if(window.location.href.split("/")[5]==""){
    location.href = $("#BaseUrl").val()+'dashboards'
}else{
    var pagecek = window.location.href.split("/")[5]
}
if(pagecek == 'myshops' || pagecek == 'dashboards'){
// if(pagecek == 'myshops'){
    $(document).ready(function() {
        updatecharts()
    })

    var options = {
    
    series: [],
    chart: {
    height: 300,
    type: 'area',
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        area: {
        borderRadius: 5,
        distributed: false,
        dataLabels: {
            position: 'center', // top, center, bottom
        },
        }
    },
    dataLabels: {
        enabled: false,
        formatter: function (val, opts) {
            return val
        },
        textAnchor: 'middle',
        distributed: false,
        offsetX: 0,
        offsetY: 0,
        style: {
        fontSize: '12px',
        // colors: ["#304758"]
        }
    },
    noData: {
        text: 'Loading...'
    },
    
    xaxis: {
        categories: [],
        position: 'bottom',
        labels: {
            maxHeight: 20,
            style: {
                fontSize: '30px',
            },
            show: true,
                formatter: function (val) {
                    return val;
                }
            },
        axisBorder: {
            show: true,
            color: '#78909C',
            height: 1,
            width: '100%',
            offsetX: 0,
            offsetY: 0
        },
        axisTicks: {
            show: true,
            borderType: 'solid',
            color: '#78909C',
            height: 6,
            offsetX: 0,
            offsetY: 0
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
                }
            }
        },
    },
    yaxis: {
        axisBorder: {
        show: false
        },
        axisTicks: {
        show: false,
        },
        labels: {
        show: false,
            formatter: function (val) {
                return val;
            }
        }
    
    },
    // title: {
    //     text: 'Monthly Inflation in Argentina, 2002',
    //     floating: true,
    //     offsetY: 320,
    //     align: 'center',
    //     style: {
    //     color: '#444'
    //     }
    // }
    };

      var chart = new ApexCharts(document.querySelector("#overview"), options);
      chart.render();

    // var chart = new ApexCharts(
    //     document.querySelector("#overview"),
    //     options
    // );

    // chart.render();

    $('#sortby').change(function sortby() {
        updatecharts($(this).val())
    })

    function updatecharts(e) {
        if(e != undefined){
        $range = "/"+e
        }else{
            $range = ""
        }
        var shid = "/"+$("#shid").text()
        var url = $("#BaseUrl").val()+'chartsales'+shid+$range;
        $.getJSON(url, function(response) {
        var tsl_percent =  response.total_sales.tpcg
        var tod_percent =  response.total_order.tpcg
        var tpr_percent =  response.total_profit.tpcg
        var tex_percent =  response.total_expense.tpcg
        var tcs_percent =  response.total_consum.tpcg
        var tad_percent =  response.total_ads.tpcg
        var totpck = response.data_report.totalpackage
        var totinpr = response.data_report.totalinprocess
        var totcmpl = response.data_report.totalcompleted
        console.log(totpck,totinpr,totcmpl)
        if(tsl_percent !=0){tsl_html = ' <span class="fw-bold text-'+response.total_sales.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_sales.tpcg+'%'}else{tsl_html =''}
        $("#tsl").html('Rp. '+response.total_sales.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tsl_html);

        if(tod_percent !=0){tod_html =' <span class="fw-bold text-'+response.total_order.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_order.tpcg+'%</span>'}else{tod_html=''}
        $("#tod").html('Rp. '+response.total_order.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tod_html);

        if(tpr_percent !=0){tpr_html =' <span class="fw-bold text-'+response.total_profit.tkey+' font-size-18"><i class="bx bx-'+response.total_profit.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_profit.tpcg+'%</span>'}else{tpr_html =''}
        $("#tpr").html('Rp. '+response.total_profit.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tpr_html);
        if(response.total_profit.tvalue < 0){$("#tpr").addClass("text-danger")}else{$("#tpr").removeClass("text-danger")}

        if(tex_percent !=0){tex_html =' <span class="fw-bold text-'+response.total_expense.tkey+' font-size-18"><i class="bx bx-'+response.total_expense.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_expense.tpcg+'%</span>'}else{tex_html =''}
        $("#tex").html('Rp. '+response.total_expense.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tex_html);

        if(tcs_percent !=0){tcs_html =' <span class="fw-bold text-'+response.total_consum.tkey+' font-size-18"><i class="bx bx-'+response.total_consum.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_consum.tpcg+'%</span>'}else{tcs_html =''}
        $("#tcs").html('Rp. '+response.total_consum.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tcs_html);

        if(tad_percent !=0){tad_html =' <span class="fw-bold text-'+response.total_ads.tkey+' font-size-18"><i class="bx bx-'+response.total_ads.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_ads.tpcg+'%</span>'}else{tad_html =''}
        $("#tad").html('Rp. '+response.total_ads.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tad_html);

        $("#totpck").html(totpck+'<span class="text-muted d-inline-block font-size-14 align-middle ms-2">Total Package</span>');
        $("#totinpr").html(totinpr+'<span class="text-muted d-inline-block font-size-14 align-middle ms-2">Process</span>');
        $("#totcmpl").html(totcmpl+'<span class="text-muted d-inline-block font-size-14 align-middle ms-2">Completed');
        console.log(response.total_ads.tpcg)

        // $("#tsl").html('Rp. '+response.total_sales.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_sales.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_sales.tpcg+'%</span>');
        // $("#tod").html('Rp. '+response.total_order.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_order.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_order.tpcg+'%</span>');
        // $("#tpr").html('Rp. '+response.total_profit.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_profit.tkey+' font-size-18"><i class="bx bx-'+response.total_profit.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_profit.tpcg+'%</span>');
        chart.updateSeries([{
            name: 'Sales',
            data: response.data_series
        }])
        }
        );
    }
}