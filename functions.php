<?php

include 'meta/posts.php';

// Setup theme supports
add_theme_support( 'title-tag' );
add_theme_support( 'html5' );
add_theme_support( 'post-thumbnails' );

function enqueue_stylesheets() {
	wp_enqueue_style( 'global', '/style.css', false, '' );
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', false, '' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_stylesheets' );

function get_the_attributes( $attributes = array() ) {

	$attribute_string = '';

	foreach ( $attributes as $name => $value ) {
		$attribute_string .= $name . '="' . $value . '" ';
	}

	return trim( $attribute_string );

}

function the_attributes( $attributes = array() ) {
	echo get_the_attributes( $attributes );
}

function global_stylesheet() {
	if ( strpos($_SERVER['REQUEST_URI'], '/style.css') === 0 ) {
		http_response_code( 200 );
		header( 'Content-Type: text/css' );

		ob_start();
		include 'query/posts.php';
		include 'stylesheets/posts.php';
		$stylesheet = ob_get_contents();
		ob_end_clean();

		echo preg_replace( '/\//', '\\\/', $stylesheet );

		exit();
	}
}

add_action( 'template_redirect', 'global_stylesheet' );

?>