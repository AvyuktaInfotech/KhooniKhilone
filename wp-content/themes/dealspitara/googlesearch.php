<?php
/*
Template Name: Google Search
*/
?>
<?php get_header(); ?>



<div id="main">

	<div id="post-area">


		<h1 class="archive-header"><?php _e( 'Search results for', 'mvp-text' ); ?> "<?php echo $_GET['q']; ?>"</h1>

		<ul class="archive">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<script>
  (function() {
    var cx = '017095709842041464758:ldriwp_nbho';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>
			<?php endwhile; endif; ?>

		</ul>

		<div class="nav-links">

			<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>

		</div><!--nav-links-->

	</div><!--post-area-->

</div><!--main -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>

