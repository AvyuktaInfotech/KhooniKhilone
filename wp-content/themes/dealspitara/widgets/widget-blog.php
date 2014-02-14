<?php

/**

 * Plugin Name: Homepage Blog Widget

 */



add_action( 'widgets_init', 'maxmag_blog_load_widgets' );



function maxmag_blog_load_widgets() {

    register_widget( 'maxmag_blog_widget' );

}



class maxmag_blog_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function maxmag_blog_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'maxmag_blog_widget', 'description' => __('A widget that displays your latest posts on the homepage in a blog layout.', 'maxmag_blog_widget') );



		/* Widget control settings. */

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_blog_widget' );



		/* Create the widget. */

		$this->WP_Widget( 'maxmag_blog_widget', __('Max Mag: Homepage Blog Widget', 'maxmag_blog_widget'), $widget_ops, $control_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );



		/* Before widget (defined by themes). */

		echo $before_widget;

$googleadsenselinkunit = '
<div id="google-ads-1" align="right">
 <script type="text/javascript">
 
	adUnit   = document.getElementById("google-ads-1");
	adWidth  = adUnit.offsetWidth;
 
	/* Replace this with your AdSense Publisher ID */
	google_ad_client = "ca-pub-7436765549181975";
 
	if ( adWidth >= 480 ) {
	  /* PitaraLinkUnits */
	  google_ad_slot	= "1205222049";
	  google_ad_width	= 468;
	  google_ad_height 	= 15;
	} else {
	  /* PitaraVerticalLinkUnit */
	  google_ad_slot	= "9439839248";
	  google_ad_width 	= 200;
	  google_ad_height 	= 90;
	} 
 </script>
 
 <script type="text/javascript"    
   src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
 </script>
</div>';


		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo $before_title . $title . $googleadsenselinkunit . $after_title;

		?>


<div class="homwPageDealsGrid">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="homePageDeal" >
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
					<div style="height: 70px; font-size: 14px;line-height: normal;text-align: center;overflow: hidden;display: block;">
						<h2><a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a></h2>												
					</div><!--blog-text-->
					<div style="height: 140px; text-align: center;">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('small-thumb'); ?></a>
					</div><!--blog-image-->					
					<?php } else { ?>
					<div>
						<h2><a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a></h2>										
					</div><!--blog-text-noimg-->					
					<?php } ?>
					<div class="storename">
					<?php $var = get_post_custom_values("store");
					echo $var[0]; ?></div>
					<div class="price">
					<?php
					if(get_post_custom_values("Freebies"))
						echo '<div class="freebie">freebie</div>';
					else if (get_post_custom_values("Discount"))
					{
						echo '<div class="Discount">';
						$val = get_post_custom_values("Discount");
						echo $val[0].'% off</div>';
					}
					else if (get_post_custom_values("Text"))
					{
						echo '<div class="freebie">';
						$val = get_post_custom_values("Text");
						echo $val[0].'</div>';
					}
					else if (get_post_custom_values("OriginalPrice"))
					{
						echo '<div class="Original">Rs.';
						$var = get_post_custom_values("OriginalPrice");
						echo $var[0].'</div>';
						echo '<div class="Discounted">Rs.';
						$var = get_post_custom_values("DiscountedPrice");
						echo $var[0].'</div>';
					}
						?>
					</div>
					<div>
						<?php
							if(get_post_custom_values("CouponCode"))
							{
								?><span class="button blue coupon"><a href="<?php the_permalink() ?>">
								<?php $val = get_post_custom_values("CouponCode");
								echo $val[0]?></a></span><?php
							}
							else
							{
								?><span class="button blue coupon"><a href="<?php the_permalink() ?>">No Coupon</a></span><?php
							}
						?>
						<span class="button blue buy"><a href='<?php 
						$val = get_post_custom_values("url");
						echo $val[0];
						?>' target='_blank'>Buy Now</a></span>
					</div>
				</div>
			<?php endwhile; endif; ?>
			</div>


			<div class="nav-links">

				<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>

			</div><!--nav-links-->





		<?php



		/* After widget (defined by themes). */

		echo $after_widget;

	}



	/**

	 * Update the widget settings.

	 */

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		/* Strip tags for title and name to remove HTML (important for text inputs). */

		$instance['title'] = strip_tags( $new_instance['title'] );



		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$defaults = array( 'title' => __('Latest News'));

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />

		</p>





	<?php

	}

}



?>