<?php
/**
 * Plugin Name: Sidebar Category Widget
 */

add_action( 'widgets_init', 'maxmag_multicat_load_widgets' );

function maxmag_multicat_load_widgets() {
	register_widget( 'maxmag_multicat_widget' );
}

class maxmag_multicat_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function maxmag_multicat_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'maxmag_multicat_widget', 'description' => __('A widget that displays lists of posts from six categories of your choice.', 'maxmag_multicat_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'maxmag_multicat_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'maxmag_multicat_widget', __('Max Mag: Multi-Category Widget', 'maxmag_multicat_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title1 = $instance['title1'];
		$category1 = $instance['category1'];
		$title2 = $instance['title2'];
		$category2 = $instance['category2'];
		$title3 = $instance['title3'];
		$category3 = $instance['category3'];
		$title4 = $instance['title4'];
		$category4 = $instance['category4'];
		$title5 = $instance['title5'];
		$category5 = $instance['category5'];
		$title6 = $instance['title6'];
		$category6 = $instance['category6'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */

		?>


<div class="multi-category-container">
	<ul class="multi-category">
		<li>
			<?php $recent = new WP_Query(array( 'cat' => $category1, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<h3><a href="<?php echo get_category_link( $category1 ); ?>"><?php echo $title1; ?></a></h3>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
				<div class="multi-category-text">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div><!--multi-category-text-->
			</div><!--multi-category-image-->
			<?php endwhile; ?>
			<div class="multi-category-headlines">
				<ul class="multi-category-headlines">
					<?php $recent = new WP_Query(array( 'cat' => $category1, 'showposts' => '4', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div><!--multi-category-headlines-->
		</li>
		<li>
			<?php $recent = new WP_Query(array( 'cat' => $category2, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<h3><a href="<?php echo get_category_link( $category2 ); ?>"><?php echo $title2; ?></a></h3>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
				<div class="multi-category-text">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div><!--multi-category-text-->
			</div><!--multi-category-image-->
			<?php endwhile; ?>
			<div class="multi-category-headlines">
				<ul class="multi-category-headlines">
					<?php $recent = new WP_Query(array( 'cat' => $category2, 'showposts' => '4', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div><!--multi-category-headlines-->
		</li>
		<li>
			<?php $recent = new WP_Query(array( 'cat' => $category3, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<h3><a href="<?php echo get_category_link( $category3 ); ?>"><?php echo $title3; ?></a></h3>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
				<div class="multi-category-text">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div><!--multi-category-text-->
			</div><!--multi-category-image-->
			<?php endwhile; ?>
			<div class="multi-category-headlines">
				<ul class="multi-category-headlines">
					<?php $recent = new WP_Query(array( 'cat' => $category3, 'showposts' => '4', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div><!--multi-category-headlines-->
		</li>
		<li>
			<?php $recent = new WP_Query(array( 'cat' => $category4, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<h3><a href="<?php echo get_category_link( $category4 ); ?>"><?php echo $title4; ?></a></h3>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
				<div class="multi-category-text">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div><!--multi-category-text-->
			</div><!--multi-category-image-->
			<?php endwhile; ?>
			<div class="multi-category-headlines">
				<ul class="multi-category-headlines">
					<?php $recent = new WP_Query(array( 'cat' => $category4, 'showposts' => '4', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div><!--multi-category-headlines-->
		</li>
		<li>
			<?php $recent = new WP_Query(array( 'cat' => $category5, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<h3><a href="<?php echo get_category_link( $category5 ); ?>"><?php echo $title5; ?></a></h3>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
				<div class="multi-category-text">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div><!--multi-category-text-->
			</div><!--multi-category-image-->
			<?php endwhile; ?>
			<div class="multi-category-headlines">
				<ul class="multi-category-headlines">
					<?php $recent = new WP_Query(array( 'cat' => $category5, 'showposts' => '4', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div><!--multi-category-headlines-->
		</li>
		<li>
			<?php $recent = new WP_Query(array( 'cat' => $category6, 'showposts' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
			<h3><a href="<?php echo get_category_link( $category6 ); ?>"><?php echo $title6; ?></a></h3>
			<div class="multi-category-image">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>
				<?php } ?>
				<div class="multi-category-text">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</div><!--multi-category-text-->
			</div><!--multi-category-image-->
			<?php endwhile; ?>
			<div class="multi-category-headlines">
				<ul class="multi-category-headlines">
					<?php $recent = new WP_Query(array( 'cat' => $category6, 'showposts' => '4', 'offset' => '1'  )); while($recent->have_posts()) : $recent->the_post();?>
					<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div><!--multi-category-headlines-->
		</li>
	</ul>
</div><!--multi-category-container-->


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
		$instance['title1'] = $new_instance['title1'];
		$instance['category1'] = $new_instance['category1'];
		$instance['title2'] = $new_instance['title2'];
		$instance['category2'] = $new_instance['category2'];
		$instance['title3'] = $new_instance['title3'];
		$instance['category3'] = $new_instance['category3'];
		$instance['title4'] = $new_instance['title4'];
		$instance['category4'] = $new_instance['category4'];
		$instance['title5'] = $new_instance['title5'];
		$instance['category5'] = $new_instance['category5'];
		$instance['title6'] = $new_instance['title6'];
		$instance['category6'] = $new_instance['category6'];


		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Title 1: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title1' ); ?>">Category 1 Title:</label>
			<input id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo $instance['title1']; ?>" style="width:90%;" />
		</p>

		<!-- Category 1 -->
		<p>
			<label for="<?php echo $this->get_field_id('category1'); ?>">Select Category 1:</label>
			<select id="<?php echo $this->get_field_id('category1'); ?>" name="<?php echo $this->get_field_name('category1'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['category1']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category1']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Title 2: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title2' ); ?>">Category 2 Title:</label>
			<input id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo $instance['title2']; ?>" style="width:90%;" />
		</p>

		<!-- Category 2 -->
		<p>
			<label for="<?php echo $this->get_field_id('category2'); ?>">Select Category 2:</label>
			<select id="<?php echo $this->get_field_id('category2'); ?>" name="<?php echo $this->get_field_name('category2'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['category2']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category2']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Title 3: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title3' ); ?>">Category 3 Title:</label>
			<input id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" value="<?php echo $instance['title3']; ?>" style="width:90%;" />
		</p>

		<!-- Category 3 -->
		<p>
			<label for="<?php echo $this->get_field_id('category3'); ?>">Select Category 3:</label>
			<select id="<?php echo $this->get_field_id('category3'); ?>" name="<?php echo $this->get_field_name('category3'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['category3']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category3']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Title 4: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title4' ); ?>">Category 4 Title:</label>
			<input id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" value="<?php echo $instance['title4']; ?>" style="width:90%;" />
		</p>

		<!-- Category 4 -->
		<p>
			<label for="<?php echo $this->get_field_id('category4'); ?>">Select Category 4:</label>
			<select id="<?php echo $this->get_field_id('category4'); ?>" name="<?php echo $this->get_field_name('category4'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['category4']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category4']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Title 5: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title5' ); ?>">Category 5 Title:</label>
			<input id="<?php echo $this->get_field_id( 'title5' ); ?>" name="<?php echo $this->get_field_name( 'title5' ); ?>" value="<?php echo $instance['title5']; ?>" style="width:90%;" />
		</p>

		<!-- Category 5 -->
		<p>
			<label for="<?php echo $this->get_field_id('category5'); ?>">Select Category 5:</label>
			<select id="<?php echo $this->get_field_id('category5'); ?>" name="<?php echo $this->get_field_name('category5'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['category5']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category5']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Title 6: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title6' ); ?>">Category 6 Title:</label>
			<input id="<?php echo $this->get_field_id( 'title6' ); ?>" name="<?php echo $this->get_field_name( 'title6' ); ?>" value="<?php echo $instance['title6']; ?>" style="width:90%;" />
		</p>

		<!-- Category 6 -->
		<p>
			<label for="<?php echo $this->get_field_id('category6'); ?>">Select Category 6:</label>
			<select id="<?php echo $this->get_field_id('category6'); ?>" name="<?php echo $this->get_field_name('category6'); ?>" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['category6']) echo 'selected="selected"'; ?>>All Categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['category6']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

	<?php
	}
}

?>