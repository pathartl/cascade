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

<?php do_action( 'archive_pages_target', $posts ); ?>

<div class="content">

	<div class="container">
		
		<?php include 'sidebar.php'; ?>

		<?php include 'posts.php'; ?>

	</div>

</div>

<?php get_footer(); ?>