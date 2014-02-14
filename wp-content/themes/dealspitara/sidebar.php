<div id="sidebar-wrapper">
	<div class="middle-side">
		<div class="middle-widget">
			<h3>Latest News</h3>
			<ul class="middle-widget">
				<?php $recent = new WP_Query('showposts=7'); while($recent->have_posts()) : $recent->the_post();?>
				<li>
					<a href="<?php the_permalink() ?>" rel="bookmark" class="main-headline"><?php the_title(); ?></a>
					<p><?php echo excerpt(11); ?></p>
					<div class="headlines-info">
						<ul class="headlines-info">
							<li>Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></li>
							<li class="comments-icon"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
						</ul>
					</div><!--headlines-info-->
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div><!--middle-side-->
	<div class="side">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widget Area')): endif; ?>
	</div><!--side-->
</div><!--sidebar-wrapper-->