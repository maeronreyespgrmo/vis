/**
 * Author: dereltuazon
 * Published: April 18, 2020
 */
 $( function() {

  bsCustomFileInput.init();

  /**
   * Program of Works Update Function
   */
  $('#modal-pow-update').on('show.bs.modal', function (event) {
    var pow_attachment  = $(event.relatedTarget).data('pow-attachment')
    var pow_remarks = $(event.relatedTarget).data('pow-remarks')

    if (pow_attachment) {
      $('#update-pow-attachment').text(pow_attachment);
    }
    if (pow_remarks) {
      $('#update-pow-remarks').val(pow_remarks);
    }
  });

  /**
   * SP Resolution Update Function
   */
  $('#modal-sp-reso-update').on('show.bs.modal', function (event) {
    var sp_reso_attachment  = $(event.relatedTarget).data('sp-reso-attachment')
    var sp_reso_remarks = $(event.relatedTarget).data('sp-reso-remarks')

    $('#update-sp-reso-remarks').empty();

    if (sp_reso_remarks == 'For Inclusion') {
      opt_1 = 'selected'; opt_2 = null;
    } else if (sp_reso_remarks == 'For Modification') {
      opt_1 = null; opt_2 = 'selected';
    } else {
      opt_1 = null; opt_2 = null;
    }

    console.log(opt_1, opt_2);

    $('#update-sp-reso-remarks').append(
      '<option></option>\
       <option '+opt_1+'>For Inclusion</option>\
       <option '+opt_2+'>For Modification</option>'
    );

    if (sp_reso_attachment) {
      $('#update-sp-reso-attachment').text(sp_reso_attachment);
    }    
  });

  /**
   * Proof Of Ownership Update Function
   */
  $('#modal-poo-update').on('show.bs.modal', function (event) {
    var poo_attachment  = $(event.relatedTarget).data('poo-attachment')
    var poo_remarks = $(event.relatedTarget).data('poo-remarks')

    if (poo_attachment) {
      $('#update-poo-attachment').text(poo_attachment);
    }
    if (poo_remarks) {
      $('#update-poo-remarks').text(poo_remarks);
    }
  });

  /**
   * Inspection Report Update Function
   */
  $('#modal-ir-update').on('show.bs.modal', function (event) {
    var ir_attachment  = $(event.relatedTarget).data('ir-attachment')
    var ir_remarks = $(event.relatedTarget).data('ir-remarks')

    if (ir_attachment) {
      $('#update-ir-attachment').text(ir_attachment);
    }
    if (ir_remarks) {
      $('#update-ir-remarks').text(ir_remarks);
    }
  });

  
  /**
   * Development Photos
   */
  $('#modal-modification').on('show.bs.modal', function (event) {

    $('#update-modification-type').val('').trigger('change');
    $('#modified_amount').hide();
    $('#modified_calendar_days').hide();
    $('#modified_target_date').hide();
    $('#modified_resume_date').hide();

    $('#update-modification-type').change( function() {
       if ( $(this).val() == "CHANGE ORDER") {
        $('#modified_amount').show();
        $('#modified_calendar_days').show();
        $('#modified_target_date').hide();
        $('#modified_resume_date').hide();
       } else if ( $(this).val() == "EXTENSION") {
        $('#modified_amount').hide();
        $('#modified_calendar_days').show();
        $('#modified_target_date').show();
        $('#modified_resume_date').hide();
       } else if ( $(this).val() == "SUSPENSION") {
        $('#modified_amount').hide();
        $('#modified_calendar_days').hide();
        $('#modified_target_date').show();
        $('#modified_resume_date').show();
       } else {
        $('#modified_amount').hide();
        $('#modified_calendar_days').hide();
        $('#modified_target_date').hide();
        $('#modified_resume_date').hide();
       }
    });

  });

  /**
   * Development Photos
   */
  $('#modal-development-photos-show').on('show.bs.modal', function (event) {
    var development_id  = $(event.relatedTarget).data('id')
    $('#development-photos').empty();
    $('#development-photos').append('<div class="form-group row" id="photos"></div>');

    $.ajax({
      type: "GET",
      url: "/projects/development/"+development_id+"/photos",
      success: function(developmentPhotos) {
        if (developmentPhotos.length) {
          $.each( developmentPhotos, function( key, developmentPhoto ) {
            return $('#photos').append(
                '<div class="col-sm-3 mt-2">\
                  <a href="/storage/development-photos/'+developmentPhoto.file+'" target="_blank">\
                  <img src="/storage/development-photos/'+developmentPhoto.file+'" alt="DEVELOPMENT" style="height: 180px; width: 100%;">\
                  </a>\
                </div>'
            );
          });
        } else {
          return $('#development-photos').append(
            '<div class="text-center"><span class="badge badge-danger">NO PHOTOS AVAILABLE!</span></div>'
          );
        }
      }
      
    });
  });

});
/* 14HGDD!! */