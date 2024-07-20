
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
    url: '/procurements/table',
    type: 'POST',
    data: {alterproc: 1},
    },
    columns: [
    { data: 'parent'},
    { data: 'name'},
    // { data: 'publish'},
    {
    render: function ( data, type, row, meta ) {

    return row.publish == 1 ? "Published" : "Not Published";

    }
    },
    {
    render: function ( data, type, row, meta ) {

    return '<div class="d-flex justify-content-center"><a href="/storage/files/'+row.file+'" class="mr-2 edit btn btn-sm btn-success"><i class="fa fa-file-alt"></i> View</a> ' +
    '<a href="/procurements/alternative/'+row.id+'/edit" class="mr-2 edit btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> Edit</a> '+
    '<a href="/procurements/'+row.id+'/destroy" class="mr-2 edit btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Delete</a> </div>'

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
