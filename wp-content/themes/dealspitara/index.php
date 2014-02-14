<?php get_header(); ?>



<div id="pitara-main-home">

<!--social-box-->
    		<div id="social-box-vert">
			<div class="post-social-vert">
				<iframe src="http://www.facebook.com/plugins/like.php?&amp;href=http%3A%2F%2Fdealspitara.com&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:60px;" allowTransparency="true"></iframe>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="vertical">Tweet</a>
			</div><!--post-social-vert-->
			
			<div class="post-social-vert">
				<g:plusone size="tall"></g:plusone>
			</div><!--post-social-vert-->
		</div><!--social-box-vert-->

	<div id="pitara-home-left">

		<?php $featured_main = get_option('mm_slider_tags'); if ($featured_main == "Select a tag:") { ?>

		<?php } else { ?>

		<div id="featured-container">

			<div class="flexslider">

          			<ul class="slides">

					<?php $recent = new WP_Query(array( 'tag' => get_option('mm_slider_tags'), 'showposts' => get_option('mm_slider_num')  )); while($recent->have_posts()) : $recent->the_post();?>

					<li>

						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>

						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('slider-thumb'); ?></a>

						<?php } else { ?>

						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/images/noimg.jpg" /></a>

						<?php } ?>

						<div class="featured-box">

							<?php if(get_post_meta($post->ID, "maxmag_featured_headline", true)): ?>

							<h2><a href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID, "maxmag_featured_headline", true); ?></a></h2>

							<?php else: ?>

							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

							<?php endif; ?>

							<p><?php echo excerpt(17); ?></p>

						</div><!--featured-box-->

					</li>

					<?php endwhile; ?>

				</ul>

			</div><!--flexslider-->

		</div><!---featured-container-->

		<?php } ?>



		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widget Area')): endif; ?>



	</div><!--home-left-->

</div><!--main-home-->



<?php get_sidebar('home'); ?>



<div id="bottom-widget">

	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Bottom Widget Area')): endif; ?>

</div><!--bottom-widget-->



<?php get_footer(); ?>