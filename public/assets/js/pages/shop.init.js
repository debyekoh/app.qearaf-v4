$(document).ready(function() {
    updatecharts()
})
function clickTab(params) {
    console.log(params)
    var url = window.location.href;
    var parts = url.split("/");
    var shop = btoa(btoa(parts[parts.length-1]));
    location.href = $("#BaseUrl").val()+'sales?tab='+params+'&ref='+shop;
}


var options = {
    chart: {
        toolbar: {
            show: !1
        },
        height: 340.5,
        type: "bar",
        events: {
            click: function(e, r, t) {}
        }
    },
    fill: {
        opacity: 1
    },
    stroke: {
        show: !1
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
            dataLabels: {
            position: 'center', // top, center, bottom
            },
        }
    },
    dataLabels: {
        enabled: true,
        enabledOnSeries: undefined,
        formatter: function (val, opts) {
            return val
        },
        textAnchor: 'middle',
        distributed: false,
        offsetX: 0,
        offsetY: 0,
        style: {
            fontSize: '18px',
            fontFamily: 'Helvetica, Arial, sans-serif',
            fontWeight: 'bold',
        },
    },
    title: {
        text: 'Overview',
    },
    noData: {
        text: 'Loading...'
    },
    series: [],
    xaxis: {
        type: 'category',
        categories: [],
        tickPlacement: 'on',
        position: 'bottom',
        labels: {
            show: true,
            style: {
                fontSize: '14px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 'bold',
                colors: undefined
            },
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

}

var chart = new ApexCharts(
document.querySelector("#overview"),
options
);

chart.render();

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
  $("#tsl").html('Rp. '+response.total_sales.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_sales.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_sales.tpcg+'%</span>');
  $("#tod").html('Rp. '+response.total_order.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_order.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_order.tpcg+'%</span>');
  $("#tpr").html('Rp. '+response.total_profit.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_profit.tkey+' font-size-18"><i class="bx bx-'+response.total_profit.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_profit.tpcg+'%</span>');
  chart.updateSeries([{
    name: 'Sales',
    data: response.data_series
  }])
}
);
}