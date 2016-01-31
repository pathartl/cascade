
<?php
	// global $posts;
?>

.article-excerpt,
.article-content,
.navigation > a {
	display: none;
}

#/:target ~ .post [post-page="1"],
#/:target ~ .post [post-page="1"] .article-excerpt,
#/:target ~ .navigation > a.next[href="#/page/2"] {
	display: block;
}

<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
#/page/<?php echo $i; ?>:target ~ .post [post-page="<?php echo $i; ?>"],
#/page/<?php echo $i; ?>:target ~ .post [post-page="<?php echo $i; ?>"] .article-excerpt {
	display: block;
}

#/page/<?php echo $i; ?>:target ~ .navigation > a.next[href="#/page/<?php echo $i + 1; ?>"],
#/page/<?php echo $i; ?>:target ~ .navigation > a.prev[href="#/page/<?php echo $i - 1; ?>"] {
	display: block;
}
<?php endfor; ?>

<?php foreach ( $posts as $post ) : ?>

#/<?php echo $post->post_type; ?>/<?php echo $post->post_name; ?>:target ~ [post-name="<?php echo $post->post_name; ?>"],
#/<?php echo $post->post_type; ?>/<?php echo $post->post_name; ?>:target ~ [post-name="<?php echo $post->post_name; ?>"] .article-content {
	display: block;
}

<?php endforeach; ?>