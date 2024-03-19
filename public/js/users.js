/**
 * Author: dereltuazon
 * Published: April 17, 2020
 */
$( function() {

  var datatable = $('#tbl-users').DataTable({
    paging: true,
    lengthChange: true,
    processing: true,
    serverSide: true,
    searchDelay: 500,
    pageLength: 10,
    ordering: false,
    ajax: {
        url: '/users/datatable',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    "columnDefs": [
      { "width": 20, "targets": 2 }
    ],
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
    pagingType: "full_numbers",
    columns: [
      {"data": "full_name"},
      {"data": "email"},
      {
        render: function ( data, type, row, meta ) {
          if (user_permission) {
            return '<a href="/users/'+ row.id +'/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> ';
          } else {
            return datatable.columns(4).visible(false);
          }
        }
      }
    ],
    language: {
      emptyTable:'<center>\
                  <span class="badge bg-red"> NO DATA AVAILABLE IN TABLE </span>\
                  </center>',
      zeroRecords:'<center>\
                  <span class="badge bg-red"> NO RECORDS FOUND </span>\
                  </center>'
    },
    scrollX: true
  });
  
});

/* 14HGDD!! */