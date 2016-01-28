<?php

// Setup theme supports
add_theme_support( 'title-tag' );
add_theme_support( 'html5' );
add_theme_support( 'post-thumbnails' );

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

?>