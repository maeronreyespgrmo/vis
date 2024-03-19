/**
 * Author: dereltuazon
 * Published: April 17, 2020
 */
$( function() {

  var datatable = $('#tbl-budgets').DataTable({
    paging: true,
    lengthChange: true,
    processing: true,
    serverSide: true,
    searchDelay: 500,
    pageLength: 10,
    ordering: false,
    ajax: {
        url: '/budgets/datatable',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    "columnDefs": [
      { "className": "dt-body-center", "width": 20, "targets": 2 }
    ],
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
    pagingType: "full_numbers",
    columns: [
      {"data": "year"},
      {"data": "total_amount"},
      {
        render: function ( data, type, row, meta ) {
          return '<a href="/budgets/'+ row.year +'/show" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>\
                  <a href="/budgets/'+ row.year +'/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>';
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