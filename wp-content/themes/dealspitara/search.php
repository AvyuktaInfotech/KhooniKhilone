<?php get_header(); ?>

<div id="main">
	<div id="post-area">
		<div class="breadcrumb">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div><!--breadcrumb-->
		<h1 class="archive-header"><?php _e( 'Search results for', 'mvp-text' ); ?> "<?php the_search_query() ?>"</h1>
		<ul class="archive">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
				<div class="archive-image">
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('small-thumb'); ?></a>
					<?php } ?>
				</div><!--archive-image-->
				<div class="archive-text">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<p><?php echo excerpt(38); ?></p>
					<div class="headlines-info">
						<ul class="headlines-info">
							<li><?php _e( 'Posted', 'mvp-text' ); ?> <?php the_time('F j, Y'); ?></li>
							<li class="comments-icon"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
						</ul>
					</div><!--headlines-info-->
				</div><!--archive-text-->
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