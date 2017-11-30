<?php
function language_theme_support()
{
	load_theme_textdomain( 'yomee-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'language_theme_support' );

?>