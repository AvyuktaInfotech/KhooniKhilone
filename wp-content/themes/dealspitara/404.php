<?php get_header(); ?>

<div id="main">
	<div id="post-area">
		<div id="post-404">
			<h1><?php _e( 'Error', 'mvp-text' ); ?> 404!</h1>
			<?php _e( 'The page you requested does not exist or has moved.', 'mvp-text' ); ?>
		</div><!--post-404-->
	</div><!--post-area-->
</div><!--main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>