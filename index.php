<?php get_header(); ?>

<?php

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => -1,
);

$posts = get_posts( $args );

?>

<style type="text/css">
	article {
		display: none;
	}

	<?php foreach ( $posts as $post ) : ?>
	
	input[id="post-id--<?php echo $post->ID; ?>"]:checked ~ article[post-id="<?php echo $post->ID; ?>"] {
		display: block;
	}

	<?php endforeach; ?>
</style>

<?php foreach ( $posts as $post ) : ?>
	<input type="radio" name="global-selector" id="post-id--<?php echo $post->ID; ?>">
<?php endforeach; ?>

<?php foreach ( $posts as $post ) : ?>
	<a href="#post-<?php echo $post->ID; ?>">
		<label for="post-id--<?php echo $post->ID; ?>">
			<?php echo $post->post_title; ?>
		</label>
	</a>
	<br>
<?php endforeach; ?>

<?php foreach ( $posts as $post ) : ?>

	<?php
		$attributes = array(
			'post-type'  => $post->post_type,
			'post-id'    => $post->ID,
			'post-title' => $post->post_title,
		);
	?>

	<article <?php the_attributes( $attributes ); ?>>
		<label for="post-id--<?php echo $post->ID; ?>">
			<h1>
				<?php echo $post->post_title; ?>
			</h1>
		</label>
		<?php echo $post->post_content; ?>
	</article>
<?php endforeach; ?>

<?php get_footer(); ?>