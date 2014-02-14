<?php get_header(); ?>

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

<div id="pitara-main-home">
	<div id="pitara-home-left">
		
		<h3 class="category-heading"><?php single_cat_title(); ?></h3>
		</br>	
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
						?>'>Buy Now</a></span>
					</div>
				</div>
			<?php endwhile; endif; ?>
			</div>		

		<div class="nav-links">
			<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
			<a rel="author" href="https://plus.google.com/118445273532974123790/posts?rel=author" target="_blank">Google+</a>
		</div><!--nav-links-->

<div class="category_leaderboard_ads">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Pitara Category Large Rectangle -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-7436765549181975"
     data-ad-slot="8106887646"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


<script id="mNCC" language="javascript">  medianet_width='336';  medianet_height= '280';  medianet_crid='161720647';  </script>  <script id="mNSC" src="http://contextual.media.net/nmedianet.js?cid=8CUW89A79" language="javascript"></script> 
</div>
 <div class="category_description">
                        <br />
                        <?php echo category_description(); ?>
                </div>

	</div><!--home-left-->
</div><!--main -->


<?php get_sidebar('category'); ?>

<?php get_footer(); ?>
