/**
 * Author: dereltuazon
 * Published: April 1, 2020
 */
$( function() {

  $('#tbl-audit-trails').DataTable({
    paging: true,
    lengthChange: true,
    processing: true,
    serverSide: true,
    searchDelay: 500,
    pageLength: 10,
    ordering: false,
    ajax: {
        url: '/audit-trails/datatable',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    "columnDefs": [
      { "width": 20, "targets": 3 }
    ],
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
    pagingType: "full_numbers",
    columns: [
      {"data": "created_at"},
      {"data": "action_taken"},
      {"data": "user.full_name"},
      {
        render: function ( data, type, row, meta ) {
          return '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-show" data-id="'+ row.id +'"><i class="fa fa-folder-open"></i></button>';
        }
      },
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

$('#modal-show').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);

  $('.modal-table').empty();

  $.ajax({
    type: "GET",
    url: "/audit-trails/"+ button.data('id') +"/show",
    success: function(data){

      if (data) {

        data = data[0]
        table = '<thead><tr><th>Fields</th><th>Values</th>';

        console.log(data.id);

        if (data.id.length > 1) {
          table += '<th>Changes</th>';
        }

        table += '</tr></thead>';

        $.each( data, function( field, value ) {

          table += '<tr><td>'+field+'</td>';
                  
          if (data.id.length > 1) {

            table += '<td>'+value[0]+'</td><td>'+value[1]+'</td>';

          } else {

            table += '<td>'+value+'</td>';

          }

          table += '</tr>';

        });

        table += '</tbody>';

        $('.modal-table').append(table);

      }
      
    }
  });
});

/* 14HGDD!! */