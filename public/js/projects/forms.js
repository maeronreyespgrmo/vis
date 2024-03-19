/**
 * Author: dereltuazon
 * Published: April 16, 2020
 */
$( function() {

  bsCustomFileInput.init();
  checkStatus($('#status').val());

  loadCitiesAndMunicipalities(cityAndMunicipality);
  loadProjectTypeSubs(projectType);
  loadFundSourceSubs(fundSource);

  $('#city_and_municipality').change( function() {
    loadCitiesAndMunicipalities($(this).val());
  });

  $('#fund_source').change( function() {
    loadFundSourceSubs($(this).val());
  });

  $('#project_type').change( function() {
    loadProjectTypeSubs($(this).val());
  });

  $('#status').change( function() {
    checkStatus($(this).val());
  });

  function loadCitiesAndMunicipalities(cityAndMunicipality) {
    $("#barangay").empty();
    $("#barangay").append('<option selected></option>');

    if (cityAndMunicipality) {

      $.ajax({
        type: "GET",
        url: "/cities_and_municipalities/" + cityAndMunicipality + "/barangays",
        success: function (barangays) {
          $.each( barangays, function( key, barangay ) {

            if (barangay.code === barangay_code) {
              var selected = "selected";
            } else {
              var selected = null;
            }

            return $("#barangay").append(
              '<option value="'+barangay.code+'"'+selected+'>'+barangay.name+'</option>'
            );
          });
        }
      });

    }
  }

  function loadFundSourceSubs(fundSource) {
    $("#fund_source_sub").empty();
    $("#fund_source_sub").append('<option selected></option>');

    if (fundSource) {

      $.ajax({
        type: "GET",
        url: "/fund_sources/" + fundSource + "/fundSourceSubs",
        success: function (fundSourceSubs) {

          $.each( fundSourceSubs, function( key, fundSourceSub ) {

            if (fundSourceSub.id == fundSourceSub_id) {
              var selected = "selected";
            } else {
              var selected = null;
            }

            return $("#fund_source_sub").append(
              '<option value="'+fundSourceSub.id+'"'+selected+'>'+fundSourceSub.name+'</option>'
            );
          });
        }
      });

    }
  }

  function loadProjectTypeSubs(projectType) {
    $("#project_type_sub").empty();

    if (projectType) {

      $.ajax({
        type: "GET",
        url: "/project-types/" + projectType + "/subs",
        success: function (projectTypeSubs) {
          $.each( projectTypeSubs, function( key, projectTypeSub ) {

            if ( $.inArray(projectTypeSub.id, projectTypeSub_id) >= 0 ) {
              var selected = "selected";
            } else {
              var selected = null;
            }

            return $("#project_type_sub").append(
              '<option value="'+projectTypeSub.id+'"'+selected+'>'+projectTypeSub.name+'</option>'
            );
          });
        }
      });

    }
  }

  function checkStatus(status) {
    if ( status == "1" ){
      $('.status').hide();
    } else {
      $('.status').show();
    }
  }

});
/* 14HGDD!! */