			</div><!--container-->

		</div><!--inner-wrapper-->

	</div><!--wrapper-->

	<div id="footer-top-wrapper">

		<div id="footer-top">

			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget Area')): endif; ?>

		</div><!--footer-top-->

	</div><!--footer-top-wrapper-->

	<div id="footer-bottom-wrapper">

		<div id="footer-bottom">

			<div id="footer-nav1">

				<?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>

			</div><!--footer-nav1-->

			<div id="copyright">

				<p><?php echo get_option('mm_copyright'); ?></p>

			</div><!--copyright-->

		</div><!--footer-bottom-->

	</div><!--footer-bottom-wrapper-->

</div><!--site-->



<?php wp_footer(); ?>



<script type="text/javascript">

jQuery(document).ready(function($){

$('.carousel').elastislide({

	imageW 	: 120,

	minItems	: 2,

	margin		: 10

});

});

</script>



<script type="text/javascript">

jQuery(function($){

        $(".tweet").tweet({

            username: "<?php echo get_option('mm_twitter'); ?>",

            join_text: null,

            avatar_size: 32,

            count: 3,

            loading_text: "loading tweets..."

        });

});

</script>



<script type="text/javascript">

(function() {

    window.PinIt = window.PinIt || { loaded:false };

    if (window.PinIt.loaded) return;

    window.PinIt.loaded = true;

    function async_load(){

        var s = document.createElement("script");

        s.type = "text/javascript";

        s.async = true;

        s.src = "http://assets.pinterest.com/js/pinit.js";

        var x = document.getElementsByTagName("script")[0];

        x.parentNode.insertBefore(s, x);

    }

    if (window.attachEvent)

        window.attachEvent("onload", async_load);

    else

        window.addEventListener("load", async_load, false);

})();

</script>



<script type="text/javascript">

  (function() {

    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;

    po.src = 'https://apis.google.com/js/plusone.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

  })();

</script>



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.async=true; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



<script type="text/javascript">

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

</script>

<!-- Place this snippet wherever appropriate -->
<script type="text/javascript">
  (function() {
    var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true;
    li.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//platform.stumbleupon.com/1/widgets.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s);
  })();
</script>


<!-- <script type="text/javascript" src="http://www.adcash.com/script/java.php?option=rotateur&r=211715"></script> -->

<?php $analytics = get_option('mm_tracking'); if ($analytics) { echo stripslashes($analytics); } ?>

</body>

</html>