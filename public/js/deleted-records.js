/**
 * Author: dereltuazon
 * Published: February 25, 2021
 */
$( function() {

  $('#tbl-deleted-records').DataTable({
      paging: true,
      lengthChange: true,
      processing: true,
      serverSide: true,
      searching: false,
      pageLength: 10,
      ordering: false,
      ajax: {
        url: '/deleted-records/datatable',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      },
      "columnDefs": [
        { "className": "dt-body-center", "targets": 1 },
        { "className": "dt-body-center", "width": 20, "targets": 5 }
      ],
      lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
      pagingType: "full_numbers",
      columns: [
        {
          render: function ( data, type, row, meta ) {
              return moment(row.deleted_at).format("Y-MM-DD H:mm:ss");
          }
        },
        {"data": "district_no"},
        {"data": "location"},
        {"data": "name"},
        {"data": "current_status"},
        {
          render: function ( data, type, row, meta ) {
            $('#restore-'+row.id).click( function(){
              var OK = confirm("Are you do you want to RESTORE this project'\s record?");
                if (OK) {
                  return true;
                } else {
                  return false;
                }
            });

            return '<a href="/deleted-records/'+ row.id +'/restore" class="btn btn-success btn-sm" id="restore-'+row.id+'"><i class="fa fa-trash-restore"></i></a>';
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

/* 14JACU!! */