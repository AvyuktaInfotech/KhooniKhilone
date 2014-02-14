<?php
/**
 * Plugin Name: Twitter Widget
 */

add_action( 'widgets_init', 'maxmag_twitter_load_widgets' );

function maxmag_twitter_load_widgets() {
	register_widget( 'maxmag_twitter_widget' );
}

class maxmag_twitter_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function maxmag_twitter_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'maxmag_twitter_widget', 'description' => __('A widget that displays a Twitter feed.', 'maxmag_twitter_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_twitter_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'maxmag_twitter_widget', __('Max Mag: Twitter Widget', 'maxmag_twitter_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		?>

		<div class="tweet"></div>


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
		$instance['username'] = $new_instance['username'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Twitter'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Username -->
		<p>This widget will use the Twitter username you provided in the Theme Options.
		</p>


	<?php
	}
}

?>