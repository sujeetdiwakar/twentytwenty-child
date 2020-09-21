jQuery( function( $ ) {
	if($('#contact-from').length){

		$( 'form[id="contact-from"]' ).validate( {
			rules: {
				name: 'required',
				subject: 'required',
				email: {
					required: true,
					email: true,
				},
			},
			submitHandler: function( form ) {

				var data = {
					action: 'submit_form',
					data: $( form ).serialize(),
				};

				$.ajax( {
					url: variables.ajax_url,
					type: form.method,
					data: data,
					success: function( response ) {
						$( '#msg' ).html( response );
						$('#contact-from')[0].reset();
					}
				} );
			}
		} );
	}
} );
