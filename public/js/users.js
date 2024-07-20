$('#user').DataTable({
    bStateSave: true,
    processing: true,
    serverSide: true,
    pageLength: 10,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    autoWidth: false,
    responsive: true,
    ajax: {
        url: '/users/table',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET'
    },
    "columnDefs": [{
        "searchable": true,
        "orderable": false,
    }],
    lengthMenu: [
        [10, 25, 50, 100],
        [10, 25, 50, 100],
        [10, 25, 50, 100]
    ],

    columns: [
        {data: 'username', name: 'username', className: 'text-center', searchable: true},
        {data: 'type', name: 'type', className: 'text-center', searchable: true},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ],
    language: {
        emptyTable: '<center><span>NO RECORDS FOUND</span></center>',
        zeroRecords: '<center>\
                    <span class="badge bg-red"> NO RECORDS FOUND </span>\
                </center>'
    },

})
