$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$( "#procurement" ).click(()=> {
let get = $("procurement").attr('href');
document.getElementById('header-text').innerHTML = 'Procurement Activities'
console.log(get)
table(0)
});

$( "#alternative" ).click(()=> {
let get = $("alternative").attr('href');
document.getElementById('header-text').innerHTML = 'Alternative Mode Activities'
console.log(get)
table(1)
});

function table(value){
$('#tbl-users').dataTable({
paging: true,
lengthChange: true,
processing: true,
searching: true,
serverSide: true,
autoWidth: true,
searchDelay: 100,
pageLength: 10,
bDestroy: true,
order: [],
ajax: {
url: '/landing/table',
type: 'POST',
data: {alterproc: value},
},
columns: [
{ data: 'parent'},
{ data: 'name'},
{
render: function ( data, type, row, meta ) {
return '<C><a href="/storage/files/'+row.file+'" class="btn btn-info btn-xs mb-1"><i class="fa fa-file-alt"></i> View</a> '
}
}
],
language: {
emptyTable: '<center>NO RECORDS FOUND</center>',
zeroRecords: '<center>NO MATCHING RECORDS FOUND</center>',
processing: 'PROCESSING...',
},
scrollX: true,
});

}

table(0)
