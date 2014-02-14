<?php
/**
 * Plugin Name: Homepage Category 4 Widget
 */

add_action( 'widgets_init', 'maxmag_cat4_load_widgets' );

function maxmag_cat4_load_widgets() {
	register_widget( 'maxmag_cat4_widget' );
}

class maxmag_cat4_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function maxmag_cat4_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'maxmag_cat4_widget', 'description' => __('A widget that displays four posts from a category of your choice.', 'maxmag_cat4_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_cat4_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'maxmag_cat4_widget', __('Max Mag: Category 4 Widget', 'maxmag_cat4_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$categories = $instance['categories'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */

		?>

			<h3><a href="<?php echo get_category_link( $categories ); ?>"><?php echo $title; ?></a></h3>
			<?php $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<div class="category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
			</div><!--category image-->
			<?php endwhile; ?>
			<div class="category-links">
				<ul>
				<?php $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li>
					<a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a>
					<p><?php echo excerpt(13); ?></p>
					</li>
				<?php endwhile; ?>
				</ul>
				<ul>
				<?php $recent = new WP_Query(array( 'cat' => $categories, 'showposts' => '3', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li>
					<a href="<?php the_permalink() ?>" class="headline-small"><?php the_title(); ?></a>
					</li>
				<?php endwhile; ?>
				</ul>
			</div><!--category-links-->


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
		$instance['categories'] = $new_instance['categories'];


		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Widget Title'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Category -->
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Select Category:</label>
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
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