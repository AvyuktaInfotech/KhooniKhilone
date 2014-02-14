<?php
# --------------------------------------------------------------------------------------
#
#	Simple:Press Theme custom function file
#	Theme		:	Default
#	File		:	custom functions
#	Author		:	Simple:Press
#
#	The 'functions' file can be used for custom functions & is loaded with each template
#
# --------------------------------------------------------------------------------------

add_action('init', 'spDefault_textdomain');

# load the theme textdomain for tranlations
function spDefault_textdomain() {
	sp_theme_localisation('spDefault');
}

if (function_exists('sp_FontResizer')) {
	add_action('sph_BeforeDisplayStart', 'spDefault_spShowFontResize');
}

function spDefault_spShowFontResize() {
	$tipMinus = __sp('decrease forum font size');
	$tipReset = __sp('reset forum font size');
	$tipPlus  = __sp('increase font size');
	sp_FontResizer('tagClass=spFontSizeControl spRight', $tipMinus, $tipReset, $tipPlus);
	sp_InsertBreak('direction-right');
}

?>