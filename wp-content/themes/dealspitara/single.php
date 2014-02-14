<?php get_header(); ?>



<div id="main">

	<div id="post-area" <?php post_class(); ?>>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="breadcrumb">

			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

		</div><!--breadcrumb-->

		<h1 class="headline entry-title"><?php the_title(); ?></h1>

		<div id="post-info">

			<div id="post-info-left">

				<?php _e( 'By', 'mvp-text' ); ?> <span class="vcard author"><span class="fn"><?php the_author_posts_link(); ?></span></span> <?php _e( 'on', 'mvp-text' ); ?> <span class="date updated"><?php the_time('F j, Y'); ?></span>

<div id="google-ads-1">
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
</div>
			</div><!--post-info-left-->

		</div><!--post-info-->



<div id="social-box">
    		<ul class="post-social-horz">
				<li>
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:100px; height:20px;">
</iframe>
				</li>
				<li>
					<a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal">Tweet</a>
				</li>
				<li>
					<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
				</li>
				<li>
				<g:plusone size="medium" annotation="inline" width="120"></g:plusone>
				</li>
				<li>
					<su:badge layout="2"></su:badge>
				</li>
			</ul>
		</div><!--social-box-->
			<div id="social-box-vert">
			<div class="post-social-vert">
				<iframe src="http://www.facebook.com/plugins/like.php?&amp;href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=box_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:60px;" allowTransparency="true"></iframe>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="vertical">Tweet</a>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
				<g:plusone size="tall"></g:plusone>
			</div><!--post-social-vert-->
			<div class="post-social-vert">
					<su:badge layout="5"></su:badge>
			</div><!--post-social-vert-->
		</div><!--social-box-vert-->




		<div id="content-area">

			<?php $mm_featured_img = get_option('mm_featured_img'); if ($mm_featured_img == "true") { ?>

				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>

				<div class="post-image">

					<?php the_post_thumbnail('post-thumb'); ?>

				</div><!--post-image-->

				<?php } ?>

			<?php } ?>

			<?php the_content(); ?>

			<?php wp_link_pages(); ?>

		</div><!--content-area-->
<div class="post-tags">
<?php $categories = get_the_category();
$separator = ' ';
$output = ' ';
if($categories){
        foreach($categories as $category) {
                $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">Deals and discount offers for '.$category->cat_name.'</a>'.$separator;
        }
echo trim($output, $separator);
} ?>
</div>
		<!--post-link-unit-->

		<div class="post-link-unit">

						

		</div><!--post-link-unit-->

               
		<div class="post-tags">

			<?php the_tags('','','') ?>

		</div><!--post-tags-->

			<?php $mm_author_box = get_option('mm_author_box'); if ($mm_author_box == "true") { ?>

			<div id="author-info">

				<div id="author-image">

					<?php echo get_avatar( get_the_author_meta('email'), '60' ); ?>

				</div><!--author-image-->

				<div id="author-desc">

					<h4><?php _e( 'About', 'mvp-text' ); ?> <?php the_author(); ?></h4>

					<?php the_author_meta('description'); ?>

				</div><!--author-desc-->

			</div><!--author-info-->

			<?php } ?>

<!-- amazon widget -->
<!--div id="amazon-electrnoics">
<SCRIPT charset="utf-8" type="text/javascript" src="http://ws-in.amazon-adsystem.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=IN&ID=V20070822%2FIN%2Fdealpita-21%2F8010%2F51b316ab-ba33-4158-a6cb-eb4bed941ba2&Operation=GetScriptTemplate"> </SCRIPT> <NOSCRIPT><A HREF="http://ws-in.amazon-adsystem.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=IN&ID=V20070822%2FIN%2Fdealpita-21%2F8010%2F51b316ab-ba33-4158-a6cb-eb4bed941ba2&Operation=NoScript">Amazon.in Widgets</A></NOSCRIPT>
</div-->
<!-- amazon widget -->

			<?php getRelatedPosts(); ?>

			<!--post-media-net-ad-->
               			<div class="post-media-net-ad">
					<script id="mNCC" language="javascript">  medianet_width='600';  medianet_height= '250';  medianet_crid='143753324';  </script>  <script id="mNSC" src="http://contextual.media.net/nmedianet.js?cid=8CUW89A79" language="javascript"></script> 
				</div><!--post-media-net-ad-->


			<?php comments_template(); ?>

		<?php endwhile; endif; ?>	

	</div><!--post-area-->



</div><!--main -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>
