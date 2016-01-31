<?php

function posts_archive_pages_targets( $posts ) {

	$posts_per_page = 5;
	$total_pages = ceil( count( $posts ) / $posts_per_page );
	$post_page = 0;
	$index = 0;

	for ( $i = 1; $i <= $total_pages; $i++ ) {
		echo '<var id="/page/' . $i . '"></var>';
	}
}

add_action( 'archive_pages_target', 'posts_archive_pages_targets', 10, 1 );