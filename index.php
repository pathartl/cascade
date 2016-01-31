<?php get_header(); ?>

<?php
	include 'query/posts.php';
?>

<style type="text/css">
	article {
		display: none;
	}
</style>

<?php
?>

<var id="/"></var>
<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
	<var id="/page/<?php echo $i; ?>"></var>
<?php endfor; ?>

<?php foreach ( $posts as $post ) : ?>

	<?php
		if ( $index % ( $posts_per_page ) == 0 ) {
			$post_page++;
		}

		setup_postdata( $post );
	?>

	<div class="post">
		<?php
			// Render our variables and create our attributes
			do_action( 'article_meta_variables_' . $post->post_type, $post, $post_page );
			$attributes = apply_filters( 'article_meta_attributes_' . $post->post_type, array(), $post, $post_page );
		?>

		<article class="article" <?php the_attributes( $attributes ); ?>>

			<label for="post-id--<?php echo $post->ID; ?>">
				<a href="#/<?php echo $post->post_type; ?>/<?php echo $post->post_name; ?>">
					<h1>
						<?php the_title(); ?>
					</h1>
				</a>
			</label>
			<div class="article-excerpt">
				<?php the_content( '' ); ?>
			</div>
			<div class="article-content">
				<?php
					$content = $post->post_content;
					$content = apply_filters( 'the_content', $content );
					$content = str_replace( ']]>', ']]&gt;', $content );
					echo $content;
				?>
			</div>
		</article>
	</div>

	<?php
		wp_reset_postdata();

		$index++;
	?>
<?php endforeach; ?>

<div class="navigation">
	<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
		<?php if ( $i + 1 <= $total_pages ) : ?>
			<a class="next" href="#/page/<?php echo $i + 1; ?>">Older Posts -&gt;</a>
		<?php endif; ?>

		<?php if ( $i - 1 > 0 ) : ?>
			<a class="prev" href="#/page/<?php echo $i - 1; ?>">&lt;- Newer Posts</a>
		<?php endif; ?>
	<?php endfor; ?>
</div>

<?php get_footer(); ?>