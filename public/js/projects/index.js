/**
 * Author: dereltuazon
 * Published: April 16, 2020
 */
$( function() {

  loadDataTable();

  $('#select-district').select2({
      theme: 'bootstrap4',
      dropdownAutoWidth: true,
      width: '100%',
      placeholder: "DISTRICT",
  });

  $('#select-city-municipality').select2({
      theme: 'bootstrap4',
      dropdownAutoWidth: true,
      width: '100%',
      placeholder: "CITY/MUNICIPALITY",
  });

  $('#select-barangay').select2({
      theme: 'bootstrap4',
      dropdownAutoWidth: true,
      width: '100%',
      placeholder: "BARANGAY",
  });

  $('#select-project-type').select2({
      theme: 'bootstrap4',
      dropdownAutoWidth: true,
      width: '100%',
      placeholder: "PROJECT TYPE",
  });

  $('#select-project-status').select2({
      theme: 'bootstrap4',
      dropdownAutoWidth: true,
      width: '100%',
      placeholder: "PROJECT STATUS",
  });

  $('#select-district').change( function() {
    loadCitiesAndMunicipalities($(this).val());
  });

  $('#select-city-municipality').change( function() {
    loadBarangays($(this).val());
  });

  $('#btn-search').click( function() {
    loadDataTable();
  });

  $('#btn-clear').click( function() {
    $('#select-project-type').val("").trigger('change');
    $("#select-district").val("").trigger('change');
    $('#select-project-status').val("").trigger('change');
    $('#input-project-name').val("");
    loadDataTable();
  });

  function loadCitiesAndMunicipalities(district_no) {
    $("#select-city-municipality").empty();
    $("#select-city-municipality").append('<option value="" selected></option>');

    if (district_no) {
      $.ajax({
        type: "GET",
        url: "/districts/" + district_no + "/cities_and_municipalities",
        success: function (cities_and_municipalities) {
          $.each( cities_and_municipalities, function( key, city_and_municipality ) {

            return $("#select-city-municipality").append(
              '<option value="'+city_and_municipality.code+'">'+city_and_municipality.name+'</option>'
            );
          });
        }
      });
    }
  }

  function loadBarangays(city_and_municipality_code) {
    $("#select-barangay").empty();
    $("#select-barangay").append('<option value="" selected></option>');

    if (city_and_municipality_code) {
      $.ajax({
        type: "GET",
        url: "/cities_and_municipalities/" + city_and_municipality_code + "/barangays",
        success: function (barangays) {
          $.each( barangays, function( key, barangay ) {

            return $("#select-barangay").append(
              '<option value="'+barangay.code+'">'+barangay.name+'</option>'
            );
          });
        }
      });
    }
  }

  function loadDataTable() {

  var data = [];
  data["project"] = { 
    type : $('#select-project-type').val(),
    district : $('#select-district').val(),
    city_or_municipality : $('#select-city-municipality').val(),
    barangay : $('#select-barangay').val(),
    status : $('#select-project-status').val(),
    name : $('#input-project-name').val()
  };

  $('#tbl-projects').DataTable().clear();
  $('#tbl-projects').DataTable().destroy();
  $('#tbl-projects').DataTable({
    paging: true,
    lengthChange: false,
    processing: true,
    serverSide: true,
    searching: false,
    pageLength: 50,
    ordering: false,
    ajax: {
      url: '/projects/datatable',
      type: 'POST',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: data
    },
    "columnDefs": [
      { "className": "dt-body-center", "width": 70, "targets": 0 }, { "className": "dt-body-center", "width": 55, "targets": 4 }
    ],
    lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
    pagingType: "full_numbers",
    columns: [
      {"data": "district_no"},
      {"data": "location"},
      {"data": "name"},
      {"data": "current_status"},
      {
        render: function ( data, type, row, meta ) {
          $('#delete-'+row.id).click( function(){
            var OK = confirm("Are you do you want to DELETE this project'\s record?");
              if (OK) {
                return true;
              } else {
                return false;
              }
          });

          return '<a href="/projects/'+ row.id +'/show" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>\
                  <a href="/projects/'+ row.id +'/destroy" class="btn btn-default btn-sm" id="delete-'+row.id+'"> <i class="fa fa-trash"></i></a>';
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

  }

});
/* 14HGDD!! */