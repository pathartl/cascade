<?php

function render_meta_variables_post( $post, $post_page ) {

	$meta = array(
		'post/' . $post->post_name,
		$post->post_name,
		'post/id/' . $post->ID,
		'posts',
		'page/' . + $post_page,
	);

	$categories = wp_get_post_terms( $post->ID, 'category' );

	foreach ( $categories as $category ) {
		array_push( $meta, 'category/' . $category->slug );
	}

	foreach ( $meta as $id ) {
		echo '<var id="/' . $id . '"></var>';
	}

}

add_action( 'article_meta_variables_post', 'render_meta_variables_post', 10, 2 );

function generate_meta_attributes_post( $attributes, $post, $post_page ) {
	$attributes = array(
		'post-type'  => $post->post_type,
		'post-id'    => $post->ID,
		'post-name'  => $post->post_name,
		'post-page'  => $post_page,
	);

	return $attributes;
}

add_filter( 'article_meta_attributes_post', 'generate_meta_attributes_post', 10, 3 );

?>