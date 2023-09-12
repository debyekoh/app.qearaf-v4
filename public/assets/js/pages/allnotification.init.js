	
// new DataTable('#tabellist_sales');
// $('#tabellist_sales').dataTable( {
//     "searching": false,
//     "pageinfo": false
//   } );

//   new DataTable('#tabellist_sales', {
//     info: false,
//     ordering: false,
//     paging: false,
//     searching: false
// });

new DataTable('#tabellist_sales', {
    dom: 'rt<"bottom"lp><"clear">'
});

new DataTable('#tabellist_sales_1', {
    dom: 'rt<"bottom"lp><"clear">'
});

$('.bottom').addClass('font-size-10');