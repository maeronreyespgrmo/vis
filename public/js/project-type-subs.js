/**
 * Author: dereltuazon
 * Published: February 23, 2021
 */
$( function() {

  var datatable = $('#tbl-project-type-subs').DataTable({
    paging: true,
    lengthChange: true,
    processing: true,
    serverSide: true,
    searchDelay: 500,
    pageLength: 10,
    ordering: false,
    ajax: {
        url: '/project-type-subs/'+projectType+'/datatable',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    "columnDefs": [
      { "className": "dt-body-center", "width": 20, "targets": 1 }
    ],
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
    pagingType: "full_numbers",
    columns: [
      {"data": "name"},
      {
        render: function ( data, type, row, meta ) {
          return '<a href="/project-type-subs/'+ row.id +'/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
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