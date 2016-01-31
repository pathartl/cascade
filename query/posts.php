<?php

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => -1,
);

$posts = get_posts( $args );

$posts_per_page = 5;
$total_pages = ceil( count( $posts ) / $posts_per_page );
$post_page = 0;
$index = 0;

?>