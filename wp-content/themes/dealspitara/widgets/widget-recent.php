<?php
/**
 * Plugin Name: Homepage Recent Widget
 */

add_action( 'widgets_init', 'maxmag_recent_load_widgets' );

function maxmag_recent_load_widgets() {
	register_widget( 'maxmag_recent_widget' );
}

class maxmag_recent_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function maxmag_recent_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'maxmag_recent_widget', 'description' => __('A widget that displays a list of posts from a category of your choice.', 'maxmag_recent_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_recent_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'maxmag_recent_widget', __('Max Mag: Recent Posts Widget', 'maxmag_recent_widget'), $widget_ops, $control_ops );
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
		if ( $title )
			echo $before_title . $title . $after_title;
		?>


			<ul class="middle-widget">
				<?php $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => $number )); while($recent->have_posts()) : $recent->the_post();?>
				<li>
					<a href="<?php the_permalink() ?>" rel="bookmark" class="main-headline"><?php the_title(); ?></a>
					<p><?php echo excerpt(11); ?></p>
					<div class="headlines-info">
						<ul class="headlines-info">
							<li><?php the_time('F j, Y'); ?></li>
							<li class="comments-icon"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
						</ul>
					</div><!--headlines-info-->
				</li>
				<?php endwhile; ?>
			</ul>


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
		$defaults = array( 'title' => __('Latest News'), 'number' => 7);
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