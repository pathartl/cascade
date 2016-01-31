<div class="sidebar col-xs-12 col-md-4">
	<h1><?php echo get_bloginfo( 'name' ); ?></h1>
	<?php
		if ( has_nav_menu( 'sidebar-menu' ) ) {
		      wp_nav_menu(
		      	array(
		      		'theme_location' => 'sidebar-menu',
		      		'walker'         => new Cascade_Walker_Nav_Menu,
		      	)
		    ); 
		}
	?>
</div>