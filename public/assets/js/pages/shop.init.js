
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
        
        var today = moment();
        // console.log("AWAL-"+today.format('YYYY-MM-DD'));
        gtdate()
        updatecharts(today,today)
        // gtdata(today,today)
    })

    var options = {
    
        series: [],
        chart: {
        height: 187,
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
            tickPlacement: 'on',
            labels: {
                maxHeight: 30,
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

    // function updatecharts(e) {
    //     if(e != undefined){
    //     $range = "/"+e
    //     }else{
    //         $range = ""
    //     }
    //     var shid = "/"+$("#shid").text()
    //     var url = $("#BaseUrl").val()+'chartsales'+shid+$range;
    //     $.getJSON(url, function(response) {
    //     var tsl_percent =  response.total_sales.tpcg
    //     var tod_percent =  response.total_order.tpcg
    //     var tpr_percent =  response.total_profit.tpcg
    //     var tex_percent =  response.total_expense.tpcg
    //     var tcs_percent =  response.total_consum.tpcg
    //     var tad_percent =  response.total_ads.tpcg
    //     var totpck = response.data_report.totalpackage
    //     var totinpr = response.data_report.totalinprocess
    //     var totcmpl = response.data_report.totalcompleted
    //     console.log(totpck,totinpr,totcmpl)
    //     if(tsl_percent !=0){tsl_html = ' <span class="fw-bold text-'+response.total_sales.tkey+' font-size-12"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_sales.tpcg+'%'}else{tsl_html =''}
    //     $("#tsl").html('Rp. '+response.total_sales.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tsl_html);

    //     if(tod_percent !=0){tod_html =' <span class="fw-bold text-'+response.total_order.tkey+' font-size-12"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_order.tpcg+'%</span>'}else{tod_html=''}
    //     $("#tod").html('Rp. '+response.total_order.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tod_html);

    //     if(tpr_percent !=0){tpr_html =' <span class="fw-bold text-'+response.total_profit.tkey+' font-size-12"><i class="bx bx-'+response.total_profit.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_profit.tpcg+'%</span>'}else{tpr_html =''}
    //     $("#tpr").html('Rp. '+response.total_profit.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tpr_html);
    //     if(response.total_profit.tvalue < 0){$("#tpr").addClass("text-danger")}else{$("#tpr").removeClass("text-danger")}

    //     if(tex_percent !=0){tex_html =' <span class="fw-bold text-'+response.total_expense.tkey+' font-size-12"><i class="bx bx-'+response.total_expense.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_expense.tpcg+'%</span>'}else{tex_html =''}
    //     $("#tex").html('Rp. '+response.total_expense.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tex_html);

    //     if(tcs_percent !=0){tcs_html =' <span class="fw-bold text-'+response.total_consum.tkey+' font-size-12"><i class="bx bx-'+response.total_consum.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_consum.tpcg+'%</span>'}else{tcs_html =''}
    //     $("#tcs").html('Rp. '+response.total_consum.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tcs_html);

    //     if(tad_percent !=0){tad_html =' <span class="fw-bold text-'+response.total_ads.tkey+' font-size-12"><i class="bx bx-'+response.total_ads.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_ads.tpcg+'%</span>'}else{tad_html =''}
    //     $("#tad").html('Rp. '+response.total_ads.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tad_html);

    //     $("#totpck").html(totpck+'<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Total Package</span>');
    //     $("#totinpr").html(totinpr+'<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Process</span>');
    //     $("#totcmpl").html(totcmpl+'<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Completed');
    //     console.log(response.total_ads.tpcg)

    //     // $("#tsl").html('Rp. '+response.total_sales.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_sales.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_sales.tpcg+'%</span>');
    //     // $("#tod").html('Rp. '+response.total_order.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_order.tkey+' font-size-18"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_order.tpcg+'%</span>');
    //     // $("#tpr").html('Rp. '+response.total_profit.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+' <span class="fw-medium text-'+response.total_profit.tkey+' font-size-18"><i class="bx bx-'+response.total_profit.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_profit.tpcg+'%</span>');
    //     chart.updateSeries([{
    //         name: 'Total',
    //         data: response.data_series
    //     },
    //     {
    //         name: 'Completed',
    //         data: response.data_series_completed
    //     }])
    //     }
    //     );
    // }

    

    function gtdate() {
        $('input[name="daterange"]').daterangepicker({
            "showDropdowns": true,
            // "autoApply": true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'This Week': [moment().startOf('week'), moment().endOf('week')],
                'Last Week': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')],
                // 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'Last 3 Month': [moment().subtract(3, 'month'), moment()],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            },
            "startDate": moment(),
            "endDate": moment()
        }, function(start, end, label) {
            // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            
            // gtdata(start,end,label)
            updatecharts(start,end,label)
        });
    }

    

    

    function updatecharts(start,end,label) {
        console.log("TEST DATA")
        var url = $("#BaseUrl").val()+"overview";

        $.ajax({
            method: 'POST',
            url: url,
            dataType: "JSON",
            data: {
                startdate: start.format('YYYY-MM-DD'),
                enddate: end.format('YYYY-MM-DD'),
                label: label,
                shop: $("#shid").text(),
            },
            }).then(function(response) {
                var tsl_percent =  response.total_sales.tpcg
                var tod_percent =  response.total_order.tpcg
                var tpr_percent =  response.total_profit.tpcg
                var tex_percent =  response.total_expense.tpcg
                var tcs_percent =  response.total_consum.tpcg
                var tad_percent =  response.total_ads.tpcg
                var totpck = response.data_report.totalpackage
                var totinpr = response.data_report.totalinprocess
                var totcmpl = response.data_report.totalcompleted
                if(tsl_percent !=0){tsl_html = ' <span class="fw-bold text-'+response.total_sales.tkey+' font-size-12"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_sales.tpcg+'%'}else{tsl_html =''}
                $("#tsl").html('Rp. '+response.total_sales.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tsl_html);

                if(tod_percent !=0){tod_html =' <span class="fw-bold text-'+response.total_order.tkey+' font-size-12"><i class="bx bx-'+response.total_order.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_order.tpcg+'%</span>'}else{tod_html=''}
                $("#tod").html('Rp. '+response.total_order.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tod_html);

                if(tpr_percent !=0){tpr_html =' <span class="fw-bold text-'+response.total_profit.tkey+' font-size-12"><i class="bx bx-'+response.total_profit.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_profit.tpcg+'%</span>'}else{tpr_html =''}
                $("#tpr").html('Rp. '+response.total_profit.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tpr_html);
                if(response.total_profit.tvalue < 0){$("#tpr").addClass("text-danger")}else{$("#tpr").removeClass("text-danger")}

                if(tex_percent !=0){tex_html =' <span class="fw-bold text-'+response.total_expense.tkey+' font-size-12"><i class="bx bx-'+response.total_expense.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_expense.tpcg+'%</span>'}else{tex_html =''}
                $("#tex").html('Rp. '+response.total_expense.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tex_html);

                if(tcs_percent !=0){tcs_html =' <span class="fw-bold text-'+response.total_consum.tkey+' font-size-12"><i class="bx bx-'+response.total_consum.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_consum.tpcg+'%</span>'}else{tcs_html =''}
                $("#tcs").html('Rp. '+response.total_consum.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tcs_html);

                if(tad_percent !=0){tad_html =' <span class="fw-bold text-'+response.total_ads.tkey+' font-size-12"><i class="bx bx-'+response.total_ads.tsym+'-arrow-alt font-size-16 align-middle"></i>'+response.total_ads.tpcg+'%</span>'}else{tad_html =''}
                $("#tad").html('Rp. '+response.total_ads.tvalue.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+tad_html);

                $("#totpck").html(totpck+'<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Total Package</span>');
                $("#totinpr").html(totinpr+'<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Process</span>');
                $("#totcmpl").html(totcmpl+'<span class="text-muted d-inline-block font-size-10 align-middle ms-2">Completed');
                topseller(response.top_seller)
                chart.updateSeries([{
                    name: 'Total',
                    data: response.data_series
                },
                {
                    name: 'Completed',
                    data: response.data_series_completed
                }])
            })
    }

    function topseller(data) {
        let itemrow = '';
        for (a = 0; a < data.length; a++) {
            if (a == 1) {
                cs = "danger";
            } else if (a == 2) {
                cs = "warning";
            } else if (a == 3) {
                cs = "primary";
            } else {
                cs = "secondary";
            }
            itemrow += 
            '<div class="simplebar-content p-1 px-3">'+
                '<div style="position: absolute;">'+
                    '<span class="badge bg-'+ cs +' font-size-14 fw-bolder">TOP '+ (a+1) +'</span>'+
                '</div>'+
                '<div class="popular-product-box py-1 rounded bg-soft-'+ cs +'" id="best-'+ cs +'">'+
                    '<div class="d-flex align-items-center">'+
                        '<div class="flex-shrink-0">'+
                            '<div class="avatar-md shadow-lg rounded">'+
                                '<img src="'+$("#BaseUrl").val()+'assets/images/product/'+ data[a].pro_image_name +'" class="img-fluid rounded" alt="'+ data[a].pro_image_name +'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="flex-grow-1 ms-3 overflow-hidden">'+
                            '<h5 class="mb-1 text-truncate"><a href="#" class="font-size-12 text-wrap text-dark">'+ data[a].pro_name +' '+ data[a].pro_model +'</a></h5>'+
                        '</div>'+
                        '<div class="flex-shrink-0 text-end ms-3">'+
                            '<h5 class="mb-1"><a href="" class="font-size-14 fw-bold text-dark">Rp '+ (data[a].pro_price_seller * data[a].total_qty).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +'</a></h5>'+
                            '<p class="text-dark fw-semibold mb-0"><u>'+ data[a].total_qty +' Sold</u></p>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
        }

        $("#topseller").html('<div>'+itemrow+'</div>');
    }

    
}