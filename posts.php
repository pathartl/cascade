<div class="posts col-xs-12 col-md-8 col-lg-9">

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

				$thumb_id = get_post_thumbnail_id( $post->ID );
				$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'thumbnail-size', true );
				$thumb_url = $thumb_url_array[0];

			?>

			<article class="article" <?php the_attributes( $attributes ); ?>>

				<h1>
					<a href="#/<?php echo $post->post_type; ?>/<?php echo $post->post_name; ?>">
						<?php the_title(); ?>
					</a>
				</h1>

				<?php if ( strpos( $thumb_url, 'wp-includes' ) === false ) : ?>
					<img src="<?php echo $thumb_url; ?>" class="featured-image">
				<?php endif; ?>

				<div class="article-excerpt">
					<?php the_content( '' ); ?>
				</div>
				<div class="article-content">
					<img src="<?php echo $thumb_url; ?>" class="featured-image">
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

	<nav>
		<ul class="pager">
			<?php for ( $i = 1; $i <= $total_pages; $i++ ) : ?>
				<?php if ( $i + 1 <= $total_pages ) : ?>
					<li class="next" page="<?php echo $i + 1; ?>">
						<a href="#/page/<?php echo $i + 1; ?>">Older Posts</a>
					</li>
				<?php endif; ?>

				<?php if ( $i - 1 > 0 ) : ?>
					<li class="previous" page="<?php echo $i - 1; ?>">
						<a href="#/page/<?php echo $i - 1; ?>">Newer Posts</a>
					</li>
				<?php endif; ?>
			<?php endfor; ?>
		</ul>
	</nav>

</div>