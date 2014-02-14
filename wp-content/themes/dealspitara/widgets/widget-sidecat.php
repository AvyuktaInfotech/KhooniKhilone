<?php

/**

 * Plugin Name: Sidebar Category Widget

 */



add_action( 'widgets_init', 'maxmag_sidecat_load_widgets' );



function maxmag_sidecat_load_widgets() {

	register_widget( 'maxmag_sidecat_widget' );

}



class maxmag_sidecat_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function maxmag_sidecat_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'maxmag_sidecat_widget', 'description' => __('A widget that displays a list of posts from a category of your choice.', 'maxmag_sidecat_widget') );



		/* Widget control settings. */

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_sidecat_widget' );



		/* Create the widget. */

		$this->WP_Widget( 'maxmag_sidecat_widget', __('Max Mag: Sidebar Category Widget', 'maxmag_sidecat_widget'), $widget_ops, $control_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$number = $instance['number'];

		$categories = $instance['categories'];



		/* Before widget (defined by themes). */

		echo $before_widget;



		/* Display the widget title if one was input (before and after defined by themes). */



		?>



		<h3><a href="<?php echo get_category_link( $categories ); ?>"><?php echo $title; ?></a></h3>

		<div class="widget-content">

			
				<?php $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => $number )); while($recent->have_posts()) : $recent->the_post();?>

				<div class="sidebar-cat-loop">

					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
										
						<div class="sidebar-cat-loop-img"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('small-thumb'); ?></a></div>							

						<div class="sidebar-cat-loop-text"><a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a></div>										

					

					<?php } else { ?>

					<div class="tabber-text-noimg">

						<a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a>

						<p><?php echo excerpt(10); ?></p>
					
					</div><!--tabber-text-noimg-->

					<?php } ?>

				</div>

				<?php endwhile; ?>
		
		</div><!--widget-content-->





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

		$instance['categories'] = $new_instance['categories'];





		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$defaults = array( 'title' => __('Widget Title'), 'number' => 3);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />

		</p>



		<!-- Number of posts -->

		<p>

			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to show:</label>

			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />

		</p>



		<!-- Category -->

		<p>

			<label for="<?php echo $this->get_field_id('categories'); ?>">Select Category:</label>

			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">

				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All Categories</option>

				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>

				<?php foreach($categories as $category) { ?>

				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>

				<?php } ?>

			</select>

		</p>





	<?php

	}

}



?>