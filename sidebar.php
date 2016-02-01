<div class="sidebar col-xs-12 col-md-4">
	<h1><?php echo get_bloginfo( 'name' ); ?></h1>
	<div class="list-group">
		<?php
			if ( has_nav_menu( 'sidebar-menu' ) ) {
			    $nav = wp_nav_menu(
			      	array(
			      		'theme_location' => 'sidebar-menu',
			      		'walker'         => new Cascade_Walker_Nav_Menu,
			      		'container'      => false,
			      		'container_class' => false,
			      		'echo'           => false,
			      	)
			    ); 

				echo preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $nav );
			}
		?>
		</div>
	</div>
</div>