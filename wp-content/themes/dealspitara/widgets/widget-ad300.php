<?php
/**
 * Plugin Name: Ad 300x250 Widget
 */

add_action( 'widgets_init', 'maxmag_ad300_load_widgets' );

function maxmag_ad300_load_widgets() {
	register_widget( 'maxmag_ad300_widget' );
}

class maxmag_ad300_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function maxmag_ad300_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'maxmag_ad300_widget', 'description' => __('A widget that displays a 300x250 ad.', 'maxmag_ad300_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_ad300_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'maxmag_ad300_widget', __('Max Mag: Ad 300x250 Widget', 'maxmag_ad300_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$code = $instance['code'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */

		?>


		<?php echo $code; ?>


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
		$instance['code'] = $new_instance['code'];


		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'code' => __('Enter ad code here'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Ad code -->
		<p>
			<label for="<?php echo $this->get_field_id( 'code' ); ?>">Ad code:</label>
			<textarea id="<?php echo $this->get_field_id( 'code' ); ?>" name="<?php echo $this->get_field_name( 'code' ); ?>" style="width:96%;" rows="6"><?php echo $instance['code']; ?></textarea>
		</p>


	<?php
	}
}

?>