<?php

include 'meta/posts.php';
include 'meta/archive-pages.php';
include 'query/menu-walker.php';

// Setup theme supports
add_theme_support( 'title-tag' );
add_theme_support( 'html5' );
add_theme_support( 'post-thumbnails' );

function enqueue_stylesheets() {
	wp_enqueue_style( 'behavior', '/style.css', false, '' );
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', false, '' );
	wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,300,300italic,100,100italic,700,700italic|Roboto+Condensed:300italic,400italic,700italic', false, '' );
	wp_enqueue_style( 'global', get_template_directory_uri() . '/style.css', false, '' );
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

function register_menu() {
	register_nav_menu( 'sidebar-menu', __('Sidebar Menu') );
}

add_action( 'init', 'register_menu' );

function hash_internal_image_content( $content ) {
	// href="(https?:\/\/[a-zA-Z\.\/\-\d]+.[jpg|png|gif|jpeg])"
	$content = preg_replace( "/href=\"(https?:\/\/[a-zA-Z\.\/\-\d]+.[jpg|png|gif|jpeg])\"/", "href=\"#$1\"", $content );
	return $content;
}

// add_filter( 'the_content', 'hash_internal_image_content', 20, 1 );

function wrap_iframe_embeds( $content ) {
	$content = preg_replace( "/(<iframe[\W\da-zA-Z]+<\/iframe>)/", "<div class=\"embed\">$1<div class=\"embed-spacer\"></div></div>", $content );
	return $content;
}

add_filter( 'the_content', 'wrap_iframe_embeds', 20, 1 );

?>