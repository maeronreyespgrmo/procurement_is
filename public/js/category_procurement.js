
function table(value){
$('#tbl-users').DataTable({
paging: false,
lengthChange: true,
processing: true,
searching: true,
autoWidth: true,
searchDelay: 100,
pageLength: 100,
bDestroy: true,
order: 'asc'
});
}

table(0)
