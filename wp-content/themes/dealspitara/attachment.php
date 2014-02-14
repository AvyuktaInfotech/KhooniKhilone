<?php get_header(); ?>

<div id="main">
	<div id="post-area" <?php post_class(); ?>>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1 class="headline"><?php the_title(); ?></h1>
		<div id="content-area">
  			<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "large"); ?>
			<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" class="attachment-medium" alt="<?php the_title(); ?>" /></a>
			<?php else : ?>
			<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
			<?php endif; ?>
		</div><!--content-area-->
		<?php endwhile; endif; ?>
	</div><!--post-area-->
</div><!--main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>