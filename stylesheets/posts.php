
<?php
	// global $posts;
?>

.article-excerpt,
.article-content,
nav .pager > li {
	display: none;
}

#/:target ~ .content .post [post-page="1"],
#/:target ~ .content .post [post-page="1"] .article-excerpt,
#/:target ~ nav .pager .next[page="2"] {
	display: block;
}

<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
#/page/<?php echo $i; ?>:target ~ .content .post [post-page="<?php echo $i; ?>"],
#/page/<?php echo $i; ?>:target ~ .content .post [post-page="<?php echo $i; ?>"] .article-excerpt {
	display: block;
}

#/page/<?php echo $i; ?>:target ~ .content nav .pager .next[page="<?php echo $i + 1; ?>"],
#/page/<?php echo $i; ?>:target ~ .content nav .pager .previous[page="<?php echo $i - 1; ?>"] {
	display: block;
}
<?php endfor; ?>

<?php foreach ( $posts as $post ) : ?>

#/<?php echo $post->post_type; ?>/<?php echo $post->post_name; ?>:target ~ [post-name="<?php echo $post->post_name; ?>"],
#/<?php echo $post->post_type; ?>/<?php echo $post->post_name; ?>:target ~ [post-name="<?php echo $post->post_name; ?>"] .article-content {
	display: block;
}

<?php endforeach; ?>

<?php
	$categories = array();
	$category_objects = get_terms( 'category' );

	foreach ( $category_objects as $category ) {
		array_push( $categories, $category->slug );
	}
?>

<?php foreach ( $categories as $category ) : ?>
#/category/<?php echo $category; ?>:target ~ [category~="<?php echo $category; ?>"],
#/category/<?php echo $category; ?>:target ~ [category~="<?php echo $category; ?>"],
#/category/<?php echo $category; ?>:target ~ [category~="<?php echo $category; ?>"] .article-excerpt {
	display: block;
}
<?php endforeach; ?>