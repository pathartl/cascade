<?php

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => -1,
);

$posts = get_posts( $args );

$posts_per_page = get_option( 'posts_per_page' );
$total_pages = ceil( count( $posts ) / $posts_per_page );
$post_page = 0;
$index = 0;

?>