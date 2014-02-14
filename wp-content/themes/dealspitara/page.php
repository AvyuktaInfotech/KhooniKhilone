<?php get_header(); ?>

<div id="main">
	<div id="post-area">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="breadcrumb">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div><!--breadcrumb-->
		<h1><?php the_title(); ?></h1>
		<div id="content-area">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!--content-area-->
		<?php endwhile; endif; ?>
	</div><!--post-area-->
</div><!--main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>