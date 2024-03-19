/**
 * Author: dereltuazon
 * Modified: February 2021
 */
$( function() {

	$('.btn-submit').click( function() {
		if ( this.form.checkValidity() ) {
			$(this).attr("disabled", "disabled");
			this.form.submit();
		}
	});
	
});