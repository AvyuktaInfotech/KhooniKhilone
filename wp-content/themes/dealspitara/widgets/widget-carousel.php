<?php

/**

 * Plugin Name: Homepage Carousel Widget

 */



add_action( 'widgets_init', 'maxmag_carousel_load_widgets' );



function maxmag_carousel_load_widgets() {

	register_widget( 'maxmag_carousel_widget' );

}



class maxmag_carousel_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function maxmag_carousel_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'maxmag_carousel_widget', 'description' => __('A carousel widget.', 'maxmag_carousel_widget') );



		/* Widget control settings. */

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_carousel_widget' );



		/* Create the widget. */

		$this->WP_Widget( 'maxmag_carousel_widget', __('Max Mag: Carousel Widget', 'maxmag_carousel_widget'), $widget_ops, $control_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$number = $instance['number'];

		$tags = $instance['tags'];



		/* Before widget (defined by themes). */

		echo $before_widget;

$googleadsenselinkunit = '
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7436765549181975";
/* PitaraLinkUnits */
google_ad_slot = "1205222049";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';


		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo $before_title . $title . $googleadsenselinkunit . $after_title;

		?>





			<div class="carousel small-cat-story es-carousel-wrapper">

				<div class="es-carousel">

					<ul>

					<?php $recent = new WP_Query(array( 'tag' => $tags, 'showposts' => $number)); while($recent->have_posts()) : $recent->the_post();?>

						<li>

							<div class="carousel-image">

								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>

								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>

								<?php } ?>

								<div class="carousel-text">

									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

								</div><!--carousel-text-->

							</div><!---carousel-image-->

						</li>

					<?php endwhile; ?>

					</ul>

				</div><!--es-carousel-->

			</div><!--carousel-->





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

		$instance['number'] = strip_tags( $new_instance['number'] );

		$instance['tags'] = $new_instance['tags'];





		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$defaults = array( 'title' => __('Widget Title'), 'number' => 20);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />

		</p>



		<!-- Maximum number of posts -->

		<p>

			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Maximum number of posts to show:</label>

			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />

		</p>



		<!-- Tag -->

		<p>

			<label for="<?php echo $this->get_field_id('tags'); ?>">Select Tag:</label>

			<select id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" style="width:100%;">

				<option value='all' <?php if ('all' == $instance['tags']) echo 'selected="selected"'; ?>>All Tags</option>

				<?php $tags = get_tags('hide_empty=0'); ?>

				<?php foreach($tags as $tag) { ?>

				<option value='<?php echo $tag->slug; ?>' <?php if ($tag->slug == $instance['tags']) echo 'selected="selected"'; ?>><?php echo $tag->name; ?></option>

				<?php } ?>

			</select>

		</p>





	<?php

	}

}



?>
