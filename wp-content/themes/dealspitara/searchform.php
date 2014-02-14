<!--
<form method="get" id="searchform" action="<?php echo home_url(); ?>/search-results/">

	<input type="text" name="q" id="q" value="<?php _e( 'Search site', 'mvp-text' ); ?>" onfocus='if (this.value == "<?php _e( 'Search site', 'mvp-text' ); ?>") { this.value = ""; }' onblur='if (this.value == "") { this.value = "<?php _e( 'Search site', 'mvp-text' ); ?>"; }' />

	<input type="hidden" id="search-button" />

</form> 
-->
<!-- to use original wordpress search -->
<form method="get" id="searchform" action="<?php echo home_url(); ?>/">

	<input type="text" name="s" id="s" value="<?php _e( 'Search site', 'mvp-text' ); ?>" onfocus='if (this.value == "<?php _e( 'Search site', 'mvp-text' ); ?>") { this.value = ""; }' onblur='if (this.value == "") { this.value = "<?php _e( 'Search site', 'mvp-text' ); ?>"; }' />

	<input type="hidden" id="search-button" />

</form>
