$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
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
url: '/audit_trails/table',
type: 'POST',
},
columns: [
{ data: 'user_id'},
{ data: 'action'},
{ data: 'description'},

// {
// render: function ( data, type, row, meta ) {
// return '<C><a href="/storage/files/'+row.file+'" class="btn btn-info btn-xs mb-1"><i class="fa fa-file-alt"></i> View</a> '
// }
// }
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
