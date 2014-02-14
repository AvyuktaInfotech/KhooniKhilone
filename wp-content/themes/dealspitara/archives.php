<?php

/*

Template Name: Archives

*/

?>



<?php get_header(); ?>

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

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h1><?php the_title(); ?></h1>

		<?php endwhile; endif; ?>

		<div id="content-area">

			<h5><?php _e( 'Archives by Month', 'mvp-text' ); ?>:</h5>

			<ul class="archives">

				<?php wp_get_archives('type=monthly'); ?>

			</ul>

		

			<h5><?php _e( 'Archives by Category', 'mvp-text' ); ?>:</h5>

			<ul class="archives">

				<?php wp_list_categories(); ?>

			</ul>

		</div>

	</div><!--post-area-->

</div><!--main -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>