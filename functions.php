<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'validation-js', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', [ 'jquery' ], '', true );

	$parenthandle = 'parent-style';
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
		[],
		$theme->parent()->get( 'Version' )
	);

	wp_enqueue_style( 'child-style', get_stylesheet_uri(),
		[ $parenthandle ],
		$theme->get( 'Version' )
	);
	wp_enqueue_script( 'scripts-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', [ 'jquery' ], '', true );

	wp_localize_script( 'scripts-js', 'variables', [
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	] );

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', [], '4.5.2' );
}

function submit_form() {

	$params = [];
	parse_str( $_POST['data'], $params );

	$name    = trim( $params['name'] );
	$email   = $params['email'];
	$message = $params['message'];
	$subject = $params['subject'];

	if ( ! empty( $name ) && ! empty( $email ) && ! empty( $subject ) ) {
		$headers = [ 'Content-Type: text/html; charset=UTF-8', 'From: My Site Name &lt;support@example.com' ];

		wp_mail( $email, $subject, $message, $headers );
		echo "<strong>We'll be in touch with you as soon as possible!</strong>";
	}

	wp_die();
}

add_action( 'wp_ajax_submit_form', 'submit_form' );
add_action( 'wp_ajax_nopriv_submit_form', 'submit_form' );
