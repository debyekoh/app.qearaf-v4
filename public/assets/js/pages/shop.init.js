$(document).ready(function() {
    showcharts()
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



// var options = {
//     series: [
//     //     {
//     //     data: [4, 6, 10, 17, 15, 19, 23, 27, 29, 25, 32, 35]
//     // }
// ],
//     chart: {
//         toolbar: {
//             show: !1
//         },
//         height: 323,
//         type: "bar",
//         events: {
//             click: function(e, r, t) {}
//         }
//     },
//     plotOptions: {
//         bar: {
//             columnWidth: "80%",
//             distributed: !0,
//             borderRadius: 8
//         }
//     },
//     fill: {
//         opacity: 1
//     },
//     stroke: {
//         show: !1
//     },
//     dataLabels: {
//         enabled: !1
//     },
//     legend: {
//         show: !1
//     },
//     // colors: barchartColors = getChartColorsArray("overview"),
//     // xaxis: {
//     //     categories: ["Jan", "Feb", "Mar", "Apr", "May", "jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
//     // }
// }
//   , chart = new ApexCharts(document.querySelector("#overview"),options);
// chart.render();

$("#drop").change(function () {
    var end = this.value;
    var firstDropVal = $('#pick').val();
});


function showcharts(e) {
    
    
var options = {
    // chart: {
    //     height: 350,
    //     type: 'bar',
        
    // },
    chart: {
        toolbar: {
            show: !1
        },
        height: 323,
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
            columnWidth: "50%",
            // distributed: !0,
            borderRadius: 3
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [],
    // title: {
    //     text: 'Ajax Example',
    // },
    noData: {
      text: 'Loading...'
    }
  }
  
  var chart = new ApexCharts(document.querySelector("#overview"),options);
  chart.render();

if(e != undefined){
  $range = "/"+e
}else{
    $range = ""
}
var url = $("#BaseUrl").val()+'chartsales'+$range;

$.getJSON(url, function(response) {
  chart.updateSeries([{
    name: 'Sales',
    data: response.data_series
  }])
});
}