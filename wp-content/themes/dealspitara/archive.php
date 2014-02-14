<?php get_header(); ?>



<?php global $author; $userdata = get_userdata($author); ?>

<div id="social-box-vert">
			<div class="post-social-vert">
				<iframe src="http://www.facebook.com/plugins/like.php?&amp;href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:60px;" allowTransparency="true"></iframe>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="vertical">Tweet</a>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<g:plusone size="tall"></g:plusone>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
					<su:badge layout="5"></su:badge>
			</div><!--post-social-vert-->
		</div><!--social-box-vert-->

<div id="main">

	<div id="post-area">

		<?php if( is_tag() ) { ?><h1><?php _e( 'All posts tagged', 'mvp-text' ); ?> "<?php single_tag_title(); ?>"</h1>

		<?php } elseif( is_author() ) { ?><h1><?php _e( 'All posts by', 'mvp-text' ); ?> <?php echo $userdata->display_name; ?></h1>

		<?php } ?>

		<ul class="archive">

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