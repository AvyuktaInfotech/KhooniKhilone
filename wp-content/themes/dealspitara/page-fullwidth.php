<?php

	/* Template Name: Full Width */

?>

<?php get_header(); ?>

<div id="main" class="full">
	<div id="post-area" class="full">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="breadcrumb">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div><!--breadcrumb-->
		<h1><?php the_title(); ?></h1>
		<div id="content-area" class="full">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!--content-area-full-->
		<?php endwhile; endif; ?>
	</div><!--post-area-full-->
</div><!--main -->

<?php get_footer(); ?>