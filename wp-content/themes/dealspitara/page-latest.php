<?php

	/* Template Name: Latest News */

?>

<?php get_header(); ?>

<div id="main">
	<div id="post-area">
		<h1><?php the_title(); ?></h1>
		<ul class="archive">
			<?php
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args= array(
										'posts_per_page' => 14,
										'paged' => $paged
									);
									query_posts($args);
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<div class="archive-image">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('small-thumb'); ?></a>
				</div><!--archive-image-->
				<div class="archive-text">
					<a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a>
					<p><?php echo excerpt(38); ?></p>
					<div class="headlines-info">
						<ul class="headlines-info">
							<li><?php _e( 'Posted', 'mvp-text' ); ?> <?php the_time('F j, Y'); ?></li>
							<li class="comments-icon"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
						</ul>
					</div><!--headlines-info-->
				</div><!--archive-text-->
				<?php } else { ?>
				<div class="archive-text-noimg">
					<a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a>
					<p><?php echo excerpt(38); ?></p>
					<div class="headlines-info">
						<ul class="headlines-info">
							<li><?php _e( 'Posted', 'mvp-text' ); ?> <?php the_time('F j, Y'); ?></li>
							<li class="comments-icon"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
						</ul>
					</div><!--headlines-info-->
				</div><!--archive-text-noimg-->
				<?php } ?>
			</li>
			<?php endwhile; endif; ?>
		</ul>
		<div class="nav-links">
			<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
		</div><!--nav-links-->
	</div><!--post-area-->
</div><!--main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>