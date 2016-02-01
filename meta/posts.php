<?php

function render_meta_variables_post( $post, $post_page ) {

	$meta = array(
		'post/' . $post->post_name,
		$post->post_name,
		'post/id/' . $post->ID,
		'posts',
		'page/' . + $post_page,
	);

	foreach ( $meta as $id ) {
		echo '<var id="/' . $id . '"></var>';
	}

}

add_action( 'article_meta_variables_post', 'render_meta_variables_post', 10, 2 );

function generate_meta_attributes_post( $attributes, $post, $post_page ) {

	$categories = array();
	$category_objects = get_the_terms( $post, 'category' );

	foreach ($category_objects as $category) {
		array_push( $categories, $category->slug );
	}

	$categories = implode( ' ', $categories );

	$attributes = array(
		'post-type'  => $post->post_type,
		'post-id'    => $post->ID,
		'post-name'  => $post->post_name,
		'post-page'  => $post_page,
		'category'   => $categories,
	);

	return $attributes;
}

add_filter( 'article_meta_attributes_post', 'generate_meta_attributes_post', 10, 3 );

?>