<?php

function posts_archive_pages_targets( $posts ) {

	$posts_per_page = get_option( 'posts_per_page' );
	$total_pages = ceil( count( $posts ) / $posts_per_page );

	for ( $i = 1; $i <= $total_pages; $i++ ) {
		echo '<var id="/page/' . $i . '"></var>';
	}
}

add_action( 'archive_pages_target', 'posts_archive_pages_targets', 10, 1 );