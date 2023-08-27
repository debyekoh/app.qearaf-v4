
function clickTab(params) {
    console.log(params)
    var url = window.location.href;
    var parts = url.split("/");
    if(atob(atob(parts[parts.length-1])) == "reseller"){
        var shop = parts[parts.length-1];
    }else{
        var shop = btoa(btoa(parts[parts.length-1]));
    }
    location.href = $("#BaseUrl").val()+'sales?tab='+params+'&ref='+shop;
}

// console.log(window.location.href.split("/")[window.location.href.split("/").length-2])
var pagecek = window.location.href.split("/")[window.location.href.split("/").length-2]
if(pagecek == 'myshops'){
    $(document).ready(function() {
        updatecharts()
    })

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
        var tsl_percent =  response.total_sales.tpcg
        var tod_percent =  response.total_order.tpcg
        var tpr_percent =  response.total_profit.tpcg
        var tex_percent =  response.total_expense.tpcg
        var tcs_percent =  response.total_consum.tpcg
        var tad_percent =  response.total_ads.tpcg
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