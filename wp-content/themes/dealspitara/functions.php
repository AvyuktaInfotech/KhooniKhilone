<?php



/////////////////////////////////////

// Theme Setup

/////////////////////////////////////



add_action('after_setup_theme', 'mvp_setup');

function mvp_setup(){

	load_theme_textdomain('mvp-text', get_template_directory() . '/languages');



	$locale = get_locale();

	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable( $locale_file ) )

		require_once( $locale_file );

}



/////////////////////////////////////

// Enqueue Javascript Files

/////////////////////////////////////



function my_scripts_method() {

    	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'));

	wp_enqueue_script('elastislide', get_template_directory_uri() . '/js/jquery.elastislide.js', array('jquery'));

	wp_enqueue_script('maxmag', get_template_directory_uri() . '/js/scripts.js', array('jquery'));

	wp_enqueue_script('ticker', get_template_directory_uri() . '/js/ticker.js', array('jquery'));

	wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array('jquery'));

	wp_enqueue_script('twitter', get_template_directory_uri() . '/js/jquery.tweet.js', array('jquery'));

	wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.js', array('jquery'));

}

add_action('wp_enqueue_scripts', 'my_scripts_method');



/////////////////////////////////////

// Footer JS Code

/////////////////////////////////////



function my_wp_footer() {



echo "

<script type='text/javascript'>

jQuery(document).ready(function($){

  $(window).load(function(){

    $('.flexslider').flexslider({

	animation: 'slide',

	slideshowSpeed: 8000

    });

  });



	var aboveHeight = $('#leader-wrapper').outerHeight();

        $(window).scroll(function(){

                if ($(window).scrollTop() > aboveHeight){

                $('#nav').addClass('fixed-nav').css('top','0').next()

                .css('padding-top','43px');

                } else {

                $('#nav').removeClass('fixed-nav').next()

                .css('padding-top','0');

                }

        });



});

</script>";



}

add_action( 'wp_footer', 'my_wp_footer' );



/////////////////////////////////////

// Theme Options

/////////////////////////////////////



require_once(TEMPLATEPATH . '/admin/admin-functions.php');

require_once(TEMPLATEPATH . '/admin/admin-interface.php');

require_once(TEMPLATEPATH . '/admin/theme-settings.php');



function my_wp_head() {

	$bloginfo = get_template_directory_uri();

	$link = get_option('mm_link_color');

	$primarymenu = get_option('mm_primary_menu');

	$primarytheme = get_option('mm_primary_theme');

	$wallad = get_option('mm_wall_ad');

	echo "

		<style type='text/css'>

		a, a:visited, #twtr-widget-1 .twtr-tweet a { color: $link; }

		h3.category-heading, .toggle { background: $primarytheme; }

		.home-widget h3, .home-widget h3 a, .middle-widget h3, .middle-widget h3 a, .sidebar-widget h3, .sidebar-widget h3 a, .bottom-widget h3, .bottom-widget h3 a, .widget-container h3, .widget-container h3 a, .multi-category h3,  ul.tabs li.active h4 a, #related-posts h3, h3#reply-title, h2.comments { color: $primarytheme; }

		#main-nav ul li:hover, #main-nav .current-menu-item, #main-nav .current-post-parent { background: $primarytheme url($bloginfo/images/nav-bg.png) top repeat-x; }

		#main-nav ul li:hover ul { border-top: 5px solid $primarytheme; }

		#main-nav-wrapper { background: $primarymenu url($bloginfo/images/nav-bg.png) top repeat-x; border-bottom: 5px solid $primarytheme; }

		#nav-mobi select { background: $primarymenu  url($bloginfo/images/triangle-dark.png) no-repeat right; }

		ul.tabs li { background: $primarytheme; }

		#wallpaper { background: url($wallad) no-repeat 50% 0; }

		</style>";

}

add_action( 'wp_head', 'my_wp_head' );



/////////////////////////////////////

// Register Widgets

/////////////////////////////////////



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Homepage Widget Area',

		'before_widget' => '<div class="home-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h1>',

		'after_title' => '</h1>',

	));

}



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Middle Widget Area',

		'before_widget' => '<div class="middle-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h3>',

		'after_title' => '</h3>',

	));

}



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Sidebar Home Widget Area',

		'before_widget' => '<div class="sidebar-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h3>',

		'after_title' => '</h3>',

	));

}



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Sidebar Widget Area',

		'before_widget' => '<div class="sidebar-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h3>',

		'after_title' => '</h3>',

	));

}



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Homepage Bottom Widget Area',

		'before_widget' => '<div class="sidebar-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h3>',

		'after_title' => '</h3>',

	));

}



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Footer Widget Area',

		'before_widget' => '<div class="footer-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h3>',

		'after_title' => '</h3>',

	));

}



if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'name' => 'Category Middle Widget Area',

		'before_widget' => '<div class="middle-widget">',

		'after_widget' => '</div>',

		'before_title' => '<h3>',

		'after_title' => '</h3>',

	));

}



include("widgets/widget-2column.php");

include("widgets/widget-ad160.php");

include("widgets/widget-ad300.php");

include("widgets/widget-blog.php");

include("widgets/widget-carousel.php");

include("widgets/widget-cat4.php");

include("widgets/widget-catfeat.php");

include("widgets/widget-catlatest.php");

include("widgets/widget-catlist.php");

include("widgets/widget-facebook.php");

include("widgets/widget-multicat.php");

include("widgets/widget-recent.php");

include("widgets/widget-sidecat.php");

include("widgets/widget-tabs.php");

include("widgets/widget-tags.php");

include("widgets/widget-twitter.php");



/////////////////////////////////////

// Register Custom Menus

/////////////////////////////////////

function register_menus() {

	register_nav_menus(

		array(

			'main-menu' => __( 'Primary Menu' ),

			'secondary-menu' => __( 'Secondary Menu' ),

			'footer-menu' => __( 'Footer Menu' ),)

	  	);

	  }



add_action( 'init', 'register_menus' );



class select_menu_walker extends Walker_Nav_Menu{

 

	 function start_lvl(&$output, $depth) {

		$indent = str_repeat("\t", $depth);

		$output .= "";

	}

 

 

	function end_lvl(&$output, $depth) {

		$indent = str_repeat("\t", $depth);

		$output .= "";

	}

 

	 function start_el(&$output, $item, $depth, $args) {

		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

 

		$class_names = $value = '';

 

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = 'menu-item-' . $item->ID;

 

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		$class_names = ' class="' . esc_attr( $class_names ) . '"';

 

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

 

		//check if current page is selected page and add selected value to select element  

		  $selc = '';

		  $curr_class = 'current-menu-item';

		  $is_current = strpos($class_names, $curr_class);

		  if($is_current === false){

	 		  $selc = "";

		  }else{

	 		  $selc = "selected ";

		  }

 

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

 

		$sel_val =  ' value="'   . esc_attr( $item->url        ) .'"';

 

		//check if the menu is a submenu

		switch ($depth){

		  case 0:

			   $dp = "";

			   break;

		  case 1:

			   $dp = "-";

			   break;

		  case 2:

			   $dp = "--";

			   break;

		  case 3:

			   $dp = "---";

			   break;

		  case 4:

			   $dp = "----";

			   break;

		  default:

			   $dp = "";

		}

 

 

		$output .= $indent . '<option'. $sel_val . $id . $value . $selc . '>'.$dp;

 

		$item_output = $args->before;

		//$item_output .= '<a'. $attributes .'>';

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		//$item_output .= '</a>';

		$item_output .= $args->after;

 

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

 

	function end_el(&$output, $item, $depth) {

		$output .= "</option>\n";

	}

 

}



/////////////////////////////////////

// Register Thumbnails

/////////////////////////////////////

if ( function_exists( 'add_theme_support' ) ) {

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 420, 470, true );

add_image_size( 'slider-thumb', 420, 470, true );

add_image_size( 'post-thumb', 300, 336, true );

add_image_size( 'medium-thumb', 200, 224, true );

add_image_size( 'small-thumb', 120, 134, true );

}



/////////////////////////////////////

// Add Bread Crumbs

/////////////////////////////////////



function dimox_breadcrumbs() {



  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

  $delimiter = ' &nbsp; &gt; &nbsp; '; // delimiter between crumbs

  $home = 'Home'; // text for the 'Home' link

  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show

  $before = '<span class="current">'; // tag before the current crumb

  $after = '</span>'; // tag after the current crumb



  global $post;

  $homeLink = home_url();



  if (is_home() || is_front_page()) {



    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';



  } else {



    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';



    if ( is_category() ) {

      $thisCat = get_category(get_query_var('cat'), false);

      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');

      echo $before . single_cat_title('', false) . $after;



    } elseif ( is_search() ) {

      echo $before . 'Search results for "' . get_search_query() . '"' . $after;



    } elseif ( is_day() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';

      echo $before . get_the_time('d') . $after;



    } elseif ( is_month() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo $before . get_the_time('F') . $after;



    } elseif ( is_year() ) {

      echo $before . get_the_time('Y') . $after;



    } elseif ( is_single() && !is_attachment() ) {

      if ( get_post_type() != 'post' ) {

        $post_type = get_post_type_object(get_post_type());

        $slug = $post_type->rewrite;

        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';

        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

      } else {

        $cat = get_the_category(); $cat = $cat[0];

        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);

        echo $cats;

        if ($showCurrent == 1) echo $before . get_the_title() . $after;

      }



    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

      $post_type = get_post_type_object(get_post_type());

      echo $before . $post_type->labels->singular_name . $after;



    } elseif ( is_attachment() ) {

      $parent = get_post($post->post_parent);

      $cat = get_the_category($parent->ID); $cat = $cat[0];

      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';

      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;



    } elseif ( is_page() && !$post->post_parent ) {

      if ($showCurrent == 1) echo $before . get_the_title() . $after;



    } elseif ( is_page() && $post->post_parent ) {

      $parent_id  = $post->post_parent;

      $breadcrumbs = array();

      while ($parent_id) {

        $page = get_page($parent_id);

        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';

        $parent_id  = $page->post_parent;

      }

      $breadcrumbs = array_reverse($breadcrumbs);

      for ($i = 0; $i < count($breadcrumbs); $i++) {

        echo $breadcrumbs[$i];

        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';

      }

      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;



    } elseif ( is_tag() ) {

      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;



    } elseif ( is_author() ) {

       global $author;

      $userdata = get_userdata($author);

      echo $before . 'Articles posted by ' . $userdata->display_name . $after;



    } elseif ( is_404() ) {

      echo $before . 'Error 404' . $after;

    }



    if ( get_query_var('paged') ) {

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';

      echo __('Page') . ' ' . get_query_var('paged');

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';

    }



    echo '</div>';



  }

} // end dimox_breadcrumbs()



/////////////////////////////////////

// Add Custom Meta Box

/////////////////////////////////////

/* Fire our meta box setup function on the post editor screen. */

add_action( 'load-post.php', 'maxmag_post_meta_boxes_setup' );

add_action( 'load-post-new.php', 'maxmag_post_meta_boxes_setup' );



/* Meta box setup function. */

function maxmag_post_meta_boxes_setup() {



	/* Add meta boxes on the 'add_meta_boxes' hook. */

	add_action( 'add_meta_boxes', 'maxmag_add_post_meta_boxes' );



	/* Save post meta on the 'save_post' hook. */

	add_action( 'save_post', 'maxmag_save_featured_headline_meta', 10, 2 );

}



/* Create one or more meta boxes to be displayed on the post editor screen. */

function maxmag_add_post_meta_boxes() {



	add_meta_box(

		'maxmag-featured-headline',			// Unique ID

		esc_html__( 'Featured Headline', 'example' ),		// Title

		'maxmag_featured_headline_meta_box',		// Callback function

		'post',					// Admin page (or post type)

		'normal',					// Context

		'high'					// Priority

	);

}



/* Display the post meta box. */

function maxmag_featured_headline_meta_box( $object, $box ) { ?>



	<?php wp_nonce_field( basename( __FILE__ ), 'maxmag_featured_headline_nonce' ); ?>



	<p>

		<label for="maxmag-featured-headline"><?php _e( "Add a custom featured headline that will be displayed in the featured slider.", 'example' ); ?></label>

		<br />

		<input class="widefat" type="text" name="maxmag-featured-headline" id="maxmag-featured-headline" value="<?php echo esc_html__( get_post_meta( $object->ID, 'maxmag_featured_headline', true ) ); ?>" size="30" />

	</p>

<?php }



/* Save the meta box's post metadata. */

function maxmag_save_featured_headline_meta( $post_id, $post ) {



	/* Verify the nonce before proceeding. */

	if ( !isset( $_POST['maxmag_featured_headline_nonce'] ) || !wp_verify_nonce( $_POST['maxmag_featured_headline_nonce'], basename( __FILE__ ) ) )

		return $post_id;



	/* Get the post type object. */

	$post_type = get_post_type_object( $post->post_type );



	/* Check if the current user has permission to edit the post. */

	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )

		return $post_id;



	/* Get the posted data and sanitize it for use as an HTML class. */

	$new_meta_value = ( isset( $_POST['maxmag-featured-headline'] ) ? balanceTags( $_POST['maxmag-featured-headline'] ) : '' );



	/* Get the meta key. */

	$meta_key = 'maxmag_featured_headline';



	/* Get the meta value of the custom field key. */

	$meta_value = get_post_meta( $post_id, $meta_key, true );



	/* If a new meta value was added and there was no previous value, add it. */

	if ( $new_meta_value && '' == $meta_value )

		add_post_meta( $post_id, $meta_key, $new_meta_value, true );



	/* If the new meta value does not match the old value, update it. */

	elseif ( $new_meta_value && $new_meta_value != $meta_value )

		update_post_meta( $post_id, $meta_key, $new_meta_value );



	/* If there is no new meta value but an old value exists, delete it. */

	elseif ( '' == $new_meta_value && $meta_value )

		delete_post_meta( $post_id, $meta_key, $meta_value );

}



/////////////////////////////////////

// Add Content Limit

/////////////////////////////////////



function excerpt($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt).'...';

  } else {

    $excerpt = implode(" ",$excerpt);

  }

  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

  return $excerpt;

}



function content($limit) {

  $content = explode(' ', get_the_content(), $limit);

  if (count($content)>=$limit) {

    array_pop($content);

    $content = implode(" ",$content).'...';

  } else {

    $content = implode(" ",$content);

  }

  $content = preg_replace('/\[.+\]/','', $content);

  $content = apply_filters('the_content', $content);

  $content = str_replace(']]>', ']]&gt;', $content);

  return $content;

}



/////////////////////////////////////

// Comments

/////////////////////////////////////



function resport_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :

		case '' :

	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">





		<div class="comment-wrapper" id="comment-<?php comment_ID(); ?>">

			<div class="comment-inner">



				<div class="comment-avatar">

					<?php echo get_avatar( $comment, 40 ); ?>

				</div>



				<div class="commentmeta">

					<p class="comment-meta-1">

						<?php printf( __( '%s '), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>

					</p>

					<p class="comment-meta-2">

						<?php echo get_comment_date(); ?> <?php _e( 'at', 'advanced'); ?> <?php echo get_comment_time(); ?>

						<?php edit_comment_link( __( 'Edit', 'mvp-text'), '(' , ')'); ?>

					</p>



				</div>



				<div class="text">



					<?php if ( $comment->comment_approved == '0' ) : ?>

						<p class="waiting_approval"><?php _e( 'Your comment is awaiting moderation.', 'mvp-text' ); ?></p>

					<?php endif; ?>



					<div class="c">

						<?php comment_text(); ?>

					</div>



				</div><!-- .text  -->

				<div class="clear"></div>

				<div class="comment-reply"><span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span></div>

			</div><!-- comment-inner  -->

		</div><!-- comment-wrapper  -->

	<?php

			break;

		case 'pingback'  :

		case 'trackback' :

	?>

	<li class="post pingback">

		<p><?php _e( 'Pingback:', 'mvp-text' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'mvp-text' ), ' ' ); ?></p>

	<?php

			break;

	endswitch;

}



/////////////////////////////////////

// Popular Posts

/////////////////////////////////////



function popularPosts($num) {

    global $wpdb;



    $posts = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $num");



    foreach ($posts as $post) {

        setup_postdata($post);

        $id = $post->ID;

        $title = $post->post_title;

        $count = $post->comment_count;



        if ($count != 0) {

            $popular .= '<li>';

            $popular .= '<a href="' . get_permalink($id) . '" title="' . $title . '">' . $title . '</a> ';

            $popular .= '</li>';

        }

    }

    return $popular;

}



/////////////////////////////////////

// Related Posts

/////////////////////////////////////



function getRelatedPosts( $count=4) {

    global $post;

    $orig_post = $post;



    $tags = wp_get_post_tags($post->ID);

    if ($tags) {

        $tag_ids = array();

        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

        $args=array(

            'tag__in' => $tag_ids,

            'post__not_in' => array($post->ID),

            'posts_per_page'=> $count, // Number of related posts that will be shown.

            'ignore_sticky_posts'=>1

        );

        $my_query = new WP_Query( $args );

        if( $my_query->have_posts() ) { ?>

            <div id="related-posts">

            	<h3><?php _e( 'Related Posts', 'mvp-text' ); ?></h3>

			<ul>

            		<?php while( $my_query->have_posts() ) { $my_query->the_post(); ?>

            			<li>

                		<div class="related-image">

					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>

					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium-thumb'); ?></a>

					<?php } ?>

					<div class="related-text">

						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

					</div><!--related-text-->

				</div><!--related-image-->

				<div class="related-small">

					<a href="<?php the_permalink() ?>" class="main-headline"><?php the_title(); ?></a>

				</div><!--related-small-->

            			</li>

            		<?php }

            echo '</ul></div>';

        }

    }

    $post = $orig_post;

    wp_reset_query();

}



/////////////////////////////////////

// Theia Posts Slider

/////////////////////////////////////



define('TPS_PLUGINS_URL', get_template_directory_uri() . '/theia-post-slider/');

define('TPS_USE_AS_STANDALONE', false);

require_once 'theia-post-slider/main.php';

add_action('admin_menu', 'maxmag_tps_admin_menu');

function maxmag_tps_admin_menu() {

	add_theme_page('Theia Post Slider Settings', 'Theia Post Slider', 'manage_options', 'tps', 'TpsMenu::do_page');

}



/////////////////////////////////////

// Shortcodes

/////////////////////////////////////



add_action('init', 'add_button');



function add_button() {

   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )

   {

     add_filter('mce_external_plugins', 'add_plugin');

     add_filter('mce_buttons_3', 'register_button');

   }

}



// Button Shortcode //

add_shortcode('button', 'shortcode_button');

	function shortcode_button($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'color' => 'black',

				'link' => '#',

			), $atts);



			return '<span class="button ' . $atts['color'] . '"><a href="' . $atts['link'] . '" >' .do_shortcode($content). '</a></span>';

	}



// Colored Box Shortcode //

add_shortcode('colored_box', 'shortcode_colored_box');

	function shortcode_colored_box($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'color' => 'grey',

			), $atts);



			return '<div class="' . $atts['color'] . '-box"><div class="' . $atts['color'] . '-box-content">' .do_shortcode($content). '</div></div>';



	}



// Youtube Shortcode //

add_shortcode('youtube', 'shortcode_youtube');

	function shortcode_youtube($atts) {

		$atts = shortcode_atts(

			array(

				'id' => '',

				'width' => 620,

				'height' => 360

			), $atts);



			return '<div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div>';

	}



// Vimeo Shortcode //

add_shortcode('vimeo', 'shortcode_vimeo');

	function shortcode_vimeo($atts) {

		$atts = shortcode_atts(

			array(

				'id' => '',

				'width' => 620,

				'height' => 360

			), $atts);



			return '<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div>';

	}





// Dropcap Shortcode //

add_shortcode('dropcap', 'shortcode_dropcap');

	function shortcode_dropcap( $atts, $content = null ) {



		return '<span class="dropcap">' .do_shortcode($content). '</span>';



}



// Highlight Shortcode //

add_shortcode('highlight', 'shortcode_highlight');

	function shortcode_highlight($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'color' => 'yellow',

			), $atts);



			if($atts['color'] == 'black') {

				return '<span class="highlight-black">' .do_shortcode($content). '</span>';

			} else {

				return '<span class="highlight-yellow">' .do_shortcode($content). '</span>';

			}



	}



// Column One Half Shortcode //

add_shortcode('one_half', 'shortcode_one_half');

	function shortcode_one_half($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'last' => 'no',

			), $atts);



			if($atts['last'] == 'yes') {

				return '<div class="one_half last">' .do_shortcode($content). '</div><div class="clearboth"></div>';

			} else {

				return '<div class="one_half">' .do_shortcode($content). '</div>';

			}



	}



// Column One Third Shortcode //

add_shortcode('one_third', 'shortcode_one_third');

	function shortcode_one_third($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'last' => 'no',

			), $atts);



			if($atts['last'] == 'yes') {

				return '<div class="one_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';

			} else {

				return '<div class="one_third">' .do_shortcode($content). '</div>';

			}



	}



// Column Two Third Shortcode //

add_shortcode('two_third', 'shortcode_two_third');

	function shortcode_two_third($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'last' => 'no',

			), $atts);



			if($atts['last'] == 'yes') {

				return '<div class="two_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';

			} else {

				return '<div class="two_third">' .do_shortcode($content). '</div>';

			}



	}



// Column One Fourth Shortcode //

add_shortcode('one_fourth', 'shortcode_one_fourth');

	function shortcode_one_fourth($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'last' => 'no',

			), $atts);



			if($atts['last'] == 'yes') {

				return '<div class="one_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';

			} else {

				return '<div class="one_fourth">' .do_shortcode($content). '</div>';

			}



	}



// Column Three Fourth Shortcode //

add_shortcode('three_fourth', 'shortcode_three_fourth');

	function shortcode_three_fourth($atts, $content = null) {

		$atts = shortcode_atts(

			array(

				'last' => 'no',

			), $atts);



			if($atts['last'] == 'yes') {

				return '<div class="three_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';

			} else {

				return '<div class="three_fourth">' .do_shortcode($content). '</div>';

			}



	}



// Tabs Shortcode //

add_shortcode('tabs', 'shortcode_tabs');

	function shortcode_tabs( $atts, $content = null ) {

	extract(shortcode_atts(array(

    ), $atts));



	$out .= '<div class="tabber-container tab-shortcode">';

	$out .= '<ul class="tabs">';

	foreach ($atts as $key => $tab) {

		$out .= '<li><h4><a href="#' . $key . '">' . $tab . '</a></h4></li>';

	}

	$out .= '</ul>';

	$out .= '<div class="tabs_container">';

	$out .= do_shortcode($content) .'</div></div>';

	return $out;

}



add_shortcode('tab', 'shortcode_tab');

	function shortcode_tab( $atts, $content = null ) {

	extract(shortcode_atts(array(

    ), $atts));

	return '<div id="tab' . $atts['id'] . '" class="tabber-content tabber-content-shortcode">' . do_shortcode($content). '</div>';

}



// Toggle shortcode //

add_shortcode('toggle', 'shortcode_toggle');

	function shortcode_toggle( $atts, $content = null ) {

	extract(shortcode_atts(array(

        'title'      => '',

    ), $atts));

	$out .= '<h4 class="toggle"><a href="#">' .$title. '</a></h4>';

	$out .= '<div class="toggle-content">';

	$out .= '<div class="block">';

	$out .= do_shortcode($content);

	$out .= '</div></div>';

   return $out;

}



function register_button($buttons) {

   array_push($buttons, "button", "colored_box", "youtube", "vimeo", "dropcap", "highlight", "one_half", "one_third", "two_third", "one_fourth", "three_fourth", "tabs", "toggle");

   return $buttons;

}



function add_plugin($plugin_array) {

   $plugin_array['button'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['colored_box'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['youtube'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['vimeo'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['dropcap'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['highlight'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['one_half'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['one_third'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['two_third'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['one_fourth'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['three_fourth'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['tabs'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   $plugin_array['toggle'] = get_template_directory_uri().'/shortcodes/shortcodes.js';

   return $plugin_array;

}



add_filter(‘widget_text’, ‘do_shortcode’);



/////////////////////////////////////

// Pagination

/////////////////////////////////////



function pagination($pages = '', $range = 4)

{

     $showitems = ($range * 2)+1;



     global $paged;

     if(empty($paged)) $paged = 1;



     if($pages == '')

     {

         global $wp_query;

         $pages = $wp_query->max_num_pages;

         if(!$pages)

         {

             $pages = 1;

         }

     }



     if(1 != $pages)

     {

         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";



         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";

             }

         }



         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";

         echo "</div>\n";

     }

}



/////////////////////////////////////

// Miscellaneous

/////////////////////////////////////



// Set Content Width

if ( ! isset( $content_width ) ) $content_width = 620;



// Add RSS links to <head> section

add_theme_support( 'automatic-feed-links' );


function adsenseLargeRectangleads() {
    return '<div id="adsenseads" align="center">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7436765549181975";
/* Post 468x60 */
google_ad_slot = "1745340842";
google_ad_width = 336;
google_ad_height = 280;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>';
}
add_shortcode('largead', 'adsenseLargeRectangleads');


function nov13giveawaycode() {
    return '<div id="nov13giveaway" align="center"><script async src="//static.punchtab.com/js/pg.js" class="pt-giveaway" data-uuid="48ef0619-679d-4cfd-a520-64b196dc2f5b"></script></div>';
}
add_shortcode('nov13giveaway', 'nov13giveawaycode');


// Google adsense link unit
/*
function adsenseLinkUnit() {
    return '<div id="adsenseads" align="center">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7436765549181975";
/* PitaraLinkUnits */
/*google_ad_slot = "1205222049";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> 
</div>';
}
*/
//yahoo media net link unit
function adsenseLinkUnit() {
    return '<div id="adsenseads" align="center">
<script id="mNCC" language="javascript"> medianet_width="468"; medianet_height= "60"; medianet_crid="986138169"; </script> <script id="mNSC" src="http://contextual.media.net/nmedianet.js?cid=8CUW89A79" language="javascript"></script></div>';
}
add_shortcode('linkad', 'adsenseLinkUnit');
//------------------------- [ jQuery via Google CDN With Local Fall Back ] ------------------------//

$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'; // the URL to check against
$test_url = @fopen($url,'r'); // test parameters
if($test_url !== false) { // test if the URL exists
    function load_external_jQuery() { // load external file
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'); // register the external file
        wp_enqueue_script('jquery'); // enqueue the external file
    }
    add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function
} else {
    function load_local_jQuery() {
        wp_enqueue_script("jquery"); // enqueue the local file
    }
add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function
}



add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
		wp_deregister_script('heartbeat');
}


?>