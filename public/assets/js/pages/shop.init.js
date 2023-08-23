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



function getChartColorsArray(e) {
    if (null !== document.getElementById(e)) {
        var r = document.getElementById(e).getAttribute("data-colors");
        return (r = JSON.parse(r)).map(function(e) {
            var r = e.replace(" ", "");
            if (-1 == r.indexOf("--"))
                return r;
            var t = getComputedStyle(document.documentElement).getPropertyValue(r);
            return t || void 0
        })
    }
}
var barchartColors = getChartColorsArray("mini-1")
  , sparklineoptions1 = {
    series: [{
        data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14]
    }],
    chart: {
        type: "area",
        width: 110,
        height: 35,
        sparkline: {
            enabled: !0
        }
    },
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .45,
            opacityTo: .05,
            stops: [20, 100, 100, 100]
        }
    },
    stroke: {
        curve: "smooth",
        width: 2
    },
    colors: barchartColors,
    tooltip: {
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
}
  , sparklinechart1 = new ApexCharts(document.querySelector("#mini-1"),sparklineoptions1);
sparklinechart1.render();
sparklineoptions1 = {
    series: [{
        data: [65, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14]
    }],
    chart: {
        type: "area",
        width: 110,
        height: 35,
        sparkline: {
            enabled: !0
        }
    },
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .45,
            opacityTo: .05,
            stops: [20, 100, 100, 100]
        }
    },
    stroke: {
        curve: "smooth",
        width: 2
    },
    colors: barchartColors = getChartColorsArray("mini-2"),
    tooltip: {
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
};
(sparklinechart1 = new ApexCharts(document.querySelector("#mini-2"),sparklineoptions1)).render();
sparklineoptions1 = {
    series: [{
        data: [12, 75, 2, 47, 42, 15, 47, 75, 65, 19, 14]
    }],
    chart: {
        type: "area",
        width: 110,
        height: 35,
        sparkline: {
            enabled: !0
        }
    },
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .45,
            opacityTo: .05,
            stops: [20, 100, 100, 100]
        }
    },
    stroke: {
        curve: "smooth",
        width: 2
    },
    colors: barchartColors = getChartColorsArray("mini-3"),
    tooltip: {
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
};
(sparklinechart1 = new ApexCharts(document.querySelector("#mini-3"),sparklineoptions1)).render();
sparklineoptions1 = {
    series: [{
        data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 70]
    }],
    chart: {
        type: "area",
        width: 110,
        height: 35,
        sparkline: {
            enabled: !0
        }
    },
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            inverseColors: !1,
            opacityFrom: .45,
            opacityTo: .05,
            stops: [20, 100, 100, 100]
        }
    },
    stroke: {
        curve: "smooth",
        width: 2
    },
    colors: barchartColors = getChartColorsArray("mini-4"),
    tooltip: {
        fixed: {
            enabled: !1
        },
        x: {
            show: !1
        },
        y: {
            title: {
                formatter: function(e) {
                    return ""
                }
            }
        },
        marker: {
            show: !1
        }
    }
};
(sparklinechart1 = new ApexCharts(document.querySelector("#mini-4"),sparklineoptions1)).render();

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
            columnWidth: "80%",
            // distributed: !0,
            borderRadius: 3
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [],
    title: {
        text: 'Overview',
    },
    noData: {
      text: 'Loading...'
    },
    xaxis: {
        type: 'category',
        tickPlacement: 'on',
        // labels: {
        //   rotate: -45,
        //   rotateAlways: true
        // }
      }
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
var url = $("#BaseUrl").val()+'chartsales'+$range;
$.getJSON(url, function(response) {
  $("#tsl").html('Rp. '+response.total_sales.thisvalue+' <span class="text-success fw-medium font-size-13 align-middle"> <i class="mdi mdi-arrow-up"></i> 8.34% </span>');
  chart.updateSeries([{
    name: 'Sales',
    data: response.data_series
  }])
}
);
}